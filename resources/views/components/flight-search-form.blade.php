<div x-data="flightSearchForm()" class=" m-2">
  <div class="w-full">
    <form @submit.prevent="handleSubmit" 
          class="bg-accent dark:bg-accent/60 rounded-lg dark:text-secondary text-base-300  backdrop-blur-sm shadow-xl p-4 sm:p-6 lg:p-8 space-y-6 w-full">
      
      <!-- Trip Details -->
      <fieldset class="grid grid-cols-1 sm:grid-cols-3 gap-3">
        <legend class="sr-only">Trip Details</legend>

        <div class="form-control">
          <label class="label"><span class="label-text">Trip Type</span></label>
          <select x-model="form.tripType" class="select select-bordered w-full text-accent ">
            <option value="round-trip">Round trip</option>
            <option value="one-way">One way</option>
            <option value="multi-city" disabled>Multi-city</option>
          </select>
        </div>

        <div class="form-control">
          <label class="label"><span class="label-text">Passengers</span></label>
          <select x-model="form.passengers" class="select select-bordered w-full text-accent ">
            <option value="1">1 Passenger</option>
            <option value="2">2 Passengers</option>
            <option value="3">3 Passengers</option>
            <option value="4">4 Passengers</option>
            <option value="5+">5+ Passengers</option>
          </select>
        </div>

        <div class="form-control">
          <label class="label"><span class="label-text">Class</span></label>
          <select x-model="form.class" class="select select-bordered w-full text-accent ">
            <option value="economy">Economy</option>
            <option value="premium-economy">Premium Economy</option>
            <option value="business">Business</option>
            <option value="first">First Class</option>
          </select>
        </div>
      </fieldset>

      <!-- Origin / Destination + Dates -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 items-end">
        <div class="form-control sm:col-span-2">
          <label class="label"><span class="label-text">Origin / Destination</span></label>
          <div class="flex gap-2">
            <div class="relative w-full">
                <input type="text"
                       x-model="fromSearch"
                       @input.debounce.300ms="filterFromAirports"
                       @focus="fromActive = true"
                       @click.away="fromActive = false"
                       placeholder="From..."
                       class="input input-bordered w-full text-accent">
                <div x-show="fromActive && fromResults.length > 0" class="absolute z-10 w-full bg-white rounded-md shadow-lg mt-1 max-h-60 overflow-y-auto">
                    <ul>
                        <template x-for="airport in fromResults" :key="airport.code">
                            <li @click="selectFrom(airport)" class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-gray-900">
                                <span x-text="`${airport.name} (${airport.code})`"></span>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
            <button type="button" @click="swapLocations" 
                    class="btn btn-circle btn-primary shrink-0 self-center">
              ⇄
            </button>
            <div class="relative w-full">
                <input type="text"
                       x-model="toSearch"
                       @input.debounce.300ms="filterToAirports"
                       @focus="toActive = true"
                       @click.away="toActive = false"
                       placeholder="To..."
                       class="input input-bordered w-full text-accent">
                <div x-show="toActive && toResults.length > 0" class="absolute z-10 w-full bg-white rounded-md shadow-lg mt-1 max-h-60 overflow-y-auto">
                    <ul>
                        <template x-for="airport in toResults" :key="airport.code">
                            <li @click="selectTo(airport)" class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-gray-900">
                                <span x-text="`${airport.name} (${airport.code})`"></span>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
          </div>
        </div>

        <div class="form-control">
          <label class="label"><span class="label-text">Departure Date</span></label>
          <input type="date" x-model="form.departureDate" :min="today" class="input input-bordered w-full text-accent " />
        </div>

        <div class="form-control" x-show="form.tripType === 'round-trip'">
          <label class="label"><span class="label-text">Return Date</span></label>
          <input type="date" x-model="form.returnDate" :min="form.departureDate || today" class="text-accent  input input-bordered w-full" />
        </div>
      </div>

      <!-- Submit -->
      <div class="text-right">
        <button class="btn btn-secondary dark:btn-primary text-accent px-7 h-11">
          Search flights
        </button>
      </div>
    </form>
  </div>
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
        },
        airports: [
            { code: 'YUL', name: 'Montréal-Trudeau International Airport', city: 'Montreal', country: 'Canada' },
            { code: 'YYZ', name: 'Toronto Pearson International Airport', city: 'Toronto', country: 'Canada' },
            { code: 'YVR', name: 'Vancouver International Airport', city: 'Vancouver', country: 'Canada' },
            { code: 'JFK', name: 'John F. Kennedy International Airport', city: 'New York', country: 'USA' },
            { code: 'LAX', name: 'Los Angeles International Airport', city: 'Los Angeles', country: 'USA' },
            { code: 'LHR', name: 'London Heathrow Airport', city: 'London', country: 'United Kingdom' },
            { code: 'CDG', name: 'Charles de Gaulle Airport', city: 'Paris', country: 'France' },
            { code: 'HND', name: 'Tokyo Haneda Airport', city: 'Tokyo', country: 'Japan' },
            { code: 'DXB', name: 'Dubai International Airport', city: 'Dubai', country: 'UAE' },
            { code: 'AMS', name: 'Amsterdam Airport Schiphol', city: 'Amsterdam', country: 'Netherlands' },
            { code: 'FRA', name: 'Frankfurt Airport', city: 'Frankfurt', country: 'Germany' },
            { code: 'SFO', name: 'San Francisco International Airport', city: 'San Francisco', country: 'USA' },
            { code: 'MIA', name: 'Miami International Airport', city: 'Miami', country: 'USA' },
            { code: 'DEL', name: 'Indira Gandhi International Airport', city: 'New Delhi', country: 'India' },
            { code: 'SYD', name: 'Sydney Kingsford Smith Airport', city: 'Sydney', country: 'Australia' },
            { code: 'ICN', name: 'Incheon International Airport', city: 'Seoul', country: 'South Korea' },
            { code: 'SIN', name: 'Singapore Changi Airport', city: 'Singapore', country: 'Singapore' },
            { code: 'BKK', name: 'Suvarnabhumi Airport', city: 'Bangkok', country: 'Thailand' },
            { code: 'HKG', name: 'Hong Kong International Airport', city: 'Hong Kong', country: 'China' },
            { code: 'IST', name: 'Istanbul Airport', city: 'Istanbul', country: 'Turkey' },
            { code: 'MUC', name: 'Munich Airport', city: 'Munich', country: 'Germany' },
            { code: 'BCN', name: 'Barcelona–El Prat Airport', city: 'Barcelona', country: 'Spain' },
            { code: 'FCO', name: 'Leonardo da Vinci–Fiumicino Airport', city: 'Rome', country: 'Italy' },
            { code: 'ZRH', name: 'Zurich Airport', city: 'Zurich', country: 'Switzerland' },
            { code: 'CPH', name: 'Copenhagen Airport', city: 'Copenhagen', country: 'Denmark' },
            { code: 'VIE', name: 'Vienna International Airport', city: 'Vienna', country: 'Austria' },
            { code: 'DUB', name: 'Dublin Airport', city: 'Dublin', country: 'Ireland' },
            { code: 'GRU', name: 'São Paulo/Guarulhos–Governador André Franco Montoro International Airport', city: 'São Paulo', country: 'Brazil' },
            { code: 'MEX', name: 'Mexico City International Airport', city: 'Mexico City', country: 'Mexico' },
            { code: 'EZE', name: 'Ministro Pistarini International Airport', city: 'Buenos Aires', country: 'Argentina' },
            { code: 'JNB', name: 'O. R. Tambo International Airport', city: 'Johannesburg', country: 'South Africa' },
            { code: 'CAI', name: 'Cairo International Airport', city: 'Cairo', country: 'Egypt' },
            { code: 'BOM', name: 'Chhatrapati Shivaji Maharaj International Airport', city: 'Mumbai', country: 'India' },
            { code: 'HNL', name: 'Daniel K. Inouye International Airport', city: 'Honolulu', country: 'USA' },
            { code: 'CUN', name: 'Cancún International Airport', city: 'Cancún', country: 'Mexico' },
            { code: 'PUJ', name: 'Punta Cana International Airport', city: 'Punta Cana', country: 'Dominican Republic' },
            { code: 'MBJ', name: 'Sangster International Airport', city: 'Montego Bay', country: 'Jamaica' },
            { code: 'ATH', name: 'Athens International Airport', city: 'Athens', country: 'Greece' },
            { code: 'LIS', name: 'Lisbon Airport', city: 'Lisbon', country: 'Portugal' },
            { code: 'PRG', name: 'Václav Havel Airport Prague', city: 'Prague', country: 'Czech Republic' },
            { code: 'BUD', name: 'Budapest Ferenc Liszt International Airport', city: 'Budapest', country: 'Hungary' },
            { code: 'KUL', name: 'Kuala Lumpur International Airport', city: 'Kuala Lumpur', country: 'Malaysia' },
            { code: 'DPS', name: 'Ngurah Rai International Airport', city: 'Denpasar', country: 'Indonesia' },
            { code: 'ORD', name: 'O\'Hare International Airport', city: 'Chicago', country: 'USA' },
            { code: 'DFW', name: 'Dallas/Fort Worth International Airport', city: 'Dallas', country: 'USA' },
            { code: 'ATL', name: 'Hartsfield-Jackson Atlanta International Airport', city: 'Atlanta', country: 'USA' },
            { code: 'PEK', name: 'Beijing Capital International Airport', city: 'Beijing', country: 'China' },
            { code: 'PVG', name: 'Shanghai Pudong International Airport', city: 'Shanghai', country: 'China' },
            { code: 'CAN', name: 'Guangzhou Baiyun International Airport', city: 'Guangzhou', country: 'China' },
            { code: 'SZX', name: 'Shenzhen Bao\'an International Airport', city: 'Shenzhen', country: 'China' },
            { code: 'AUH', name: 'Abu Dhabi International Airport', city: 'Abu Dhabi', country: 'UAE' },
            { code: 'BRU', name: 'Brussels Airport', city: 'Brussels', country: 'Belgium' },
            { code: 'NRT', name: 'Narita International Airport', city: 'Tokyo', country: 'Japan' }
        ],
        fromSearch: '',
        toSearch: '',
        fromResults: [],
        toResults: [],
        fromActive: false,
        toActive: false,

        filterFromAirports() {
            if (this.fromSearch === '') {
                this.fromResults = [];
                return;
            }
            this.fromResults = this.airports.filter(airport => {
                const search = this.fromSearch.toLowerCase();
                return airport.name.toLowerCase().includes(search) ||
                       airport.city.toLowerCase().includes(search) ||
                       airport.code.toLowerCase().includes(search);
            });
            this.fromActive = true;
        },

        selectFrom(airport) {
            this.form.from = airport.code;
            this.fromSearch = `${airport.name} (${airport.code})`;
            this.fromActive = false;
        },

        filterToAirports() {
            if (this.toSearch === '') {
                this.toResults = [];
                return;
            }
            this.toResults = this.airports.filter(airport => {
                const search = this.toSearch.toLowerCase();
                return airport.name.toLowerCase().includes(search) ||
                       airport.city.toLowerCase().includes(search) ||
                       airport.code.toLowerCase().includes(search);
            });
            this.toActive = true;
        },

        selectTo(airport) {
            this.form.to = airport.code;
            this.toSearch = `${airport.name} (${airport.code})`;
            this.toActive = false;
        },

        swapLocations() {
          const tempForm = this.form.from;
          this.form.from = this.form.to;
          this.form.to = tempForm;

          const tempSearch = this.fromSearch;
          this.fromSearch = this.toSearch;
          this.toSearch = tempSearch;
        },

        handleSubmit() {
          if (!this.form.from || !this.form.to) {
            alert('Please select both departure and destination locations');
            return;
          }
          if (!this.form.departureDate) {
            alert('Please select a departure date');
            return;
          }
          
          if (this.form.tripType === 'round-trip' && !this.form.returnDate) {
            alert('Please select a return date for a round trip');
            return;
          }
          
          if (this.form.tripType === 'multi-city') {
            alert('Multi-city flights are not supported with this form.');
            return;
          }

          const baseUrl = '/flights';
          const params = new URLSearchParams(this.form);
          const searchUrl = `${baseUrl}?${params.toString()}`;

          // Open in a new tab
          window.open(searchUrl, '_blank');
        }
      };
    }
  </script>
</div>

