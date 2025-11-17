<div x-data="flightSearchForm()" class="mt-14 min-h-60 md:h-72 lg:h-96 flex justify-center ">
  <div class="w-full max-w-4xl">
    <form @submit.prevent="handleSubmit" 
          class="bg-secondary dark:bg-trans dark:text-black rounded-lg shadow-xl p-2 sm:p-6 lg:p-8 space-y-6 w-full">

      <!-- Trip Details -->
      <fieldset class="grid grid-cols-1 sm:grid-cols-3 gap-3">
        <legend class="sr-only">Trip Details</legend>

        <div class="form-control">
          <label class="label"><span class="label-text">Trip Type</span></label>
          <select x-model="form.tripType" class="select select-bordered  w-full">
            <option value="round-trip">Round trip</option>
            <option value="one-way">One way</option>
            <option value="multi-city">Multi-city</option>
          </select>
        </div>

        <div class="form-control">
          <label class="label"><span class="label-text">Passengers</span></label>
          <select x-model="form.passengers" class="select select-bordered w-full">
            <option value="1">1 Passenger</option>
            <option value="2">2 Passengers</option>
            <option value="3">3 Passengers</option>
            <option value="4">4 Passengers</option>
            <option value="5+">5+ Passengers</option>
          </select>
        </div>

        <div class="form-control">
          <label class="label"><span class="label-text">Class</span></label>
          <select x-model="form.class" class="select select-bordered w-full">
            <option value="economy">Economy</option>
            <option value="premium-economy">Premium Economy</option>
            <option value="business">Business</option>
            <option value="first">First Class</option>
          </select>
        </div>
      </fieldset>

      <!-- Origin / Destination + Dates -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-3 items-end">
        <div class="form-control sm:col-span-2">
          <label class="label"><span class="label-text">Origin / Destination</span></label>
          <div class="flex gap-2">
            <select x-model="form.from" class="select select-bordered w-full">
              <option value="">From...</option>
              <option value="YUL">Montreal (YUL)</option>
              <option value="YYZ">Toronto (YYZ)</option>
              <option value="YVR">Vancouver (YVR)</option>
              <option value="JFK">New York (JFK)</option>
              <option value="LAX">Los Angeles (LAX)</option>
              <option value="LHR">London (LHR)</option>
            </select>
            <button type="button" @click="swapLocations" 
                    class="btn btn-circle btn-primary text-black shrink-0 self-center">
              ⇄
            </button>
            <select x-model="form.to" class="select select-bordered w-full">
              <option value="">To...</option>
              <option value="YUL">Montreal (YUL)</option>
              <option value="YYZ">Toronto (YYZ)</option>
              <option value="YVR">Vancouver (YVR)</option>
              <option value="JFK">New York (JFK)</option>
              <option value="LAX">Los Angeles (LAX)</option>
              <option value="LHR">London (LHR)</option>
            </select>
          </div>
        </div>

        <div class="form-control">
          <label class="label"><span class="label-text">Departure Date</span></label>
          <input type="date" x-model="form.departureDate" :min="today" class="input input-bordered w-full" />
        </div>

        <div class="form-control" x-show="form.tripType === 'round-trip'">
          <label class="label"><span class="label-text">Return Date</span></label>
          <input type="date" x-model="form.returnDate" :min="form.departureDate || today" class="input input-bordered w-full" />
        </div>
      </div>

      <!-- Submit -->
      <div class="text-right">
        <button class="bg-accent hover:bg-accent/50 text-primary active:scale-95 rounded-md px-7 h-11">
            Get started
          </button>
      </div>
    </form>
  </div>

  <script>
    function flightSearchForm() {
      return {
        today: new Date().toISOString().split('T')[0],
        form: {
          tripType: 'round-trip',
          passengers: '1',
          class: 'economy',
          from: '',
          to: '',
          departureDate: '',
          returnDate: '',
          stops: 'any',
          duration: 'any',
          more: 'any',
        },
        results: [],
        loading: false,

        swapLocations() {
          const temp = this.form.from;
          this.form.from = this.form.to;
          this.form.to = temp;
        },

        async handleSubmit() {
          if (!this.form.from || !this.form.to) {
            alert('Please select both departure and destination locations');
            return;
          }
          if (!this.form.departureDate) {
            alert('Please select a departure date');
            return;
          }

          this.loading = true;
          this.results = [];

          try {
            const response = await fetch('{{ route("flights.search") }}', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              body: JSON.stringify(this.form)
            });

            const data = await response.json();

            if (response.ok) {
              this.results = data["flights_results"] || [];
            } else {
              alert(data.error || 'Failed to search flights.');
            }
          } catch (error) {
            console.error(error);
            alert('An error occurred. Please try again.');
          } finally {
            this.loading = false;
          }
        }
      };
    }
  </script>
</div>
