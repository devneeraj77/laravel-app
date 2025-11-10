<div class=" mx-auto bg-white dark:bg-gray-900 shadow-xl rounded-2xl p-6 md:p-8 mt-10">
    <!-- Top Selectors -->
    <div class="flex flex-wrap gap-3 mb-6">
        <select id="tripType" class="border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 text-gray-700 dark:text-gray-200">
            <option value="round-trip">Round trip</option>
            <option value="one-way">One way</option>
            <option value="multi-city">Multi-city</option>
        </select>

        <select id="passengers" class="border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 text-gray-700 dark:text-gray-200">
            <option>1 Passenger</option>
            <option>2 Passengers</option>
            <option>3 Passengers</option>
            <option>4+ Passengers</option>
        </select>

        <select id="class" class="border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 text-gray-700 dark:text-gray-200">
            <option>Economy</option>
            <option>Premium Economy</option>
            <option>Business</option>
            <option>First Class</option>
        </select>
    </div>

    <!-- Flight Search Fields -->
    <form id="flightForm" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-7 gap-3">
        <!-- From -->
        <div class="col-span-1 sm:col-span-1 lg:col-span-1">
            <label class="text-sm font-semibold text-gray-600 dark:text-gray-300">From</label>
            <input type="text" id="from" name="from" placeholder="e.g. Montreal (YUL)"
                class="w-full mt-1 border border-gray-300 dark:border-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>

        <!-- To -->
        <div class="col-span-1 sm:col-span-1 lg:col-span-1">
            <label class="text-sm font-semibold text-gray-600 dark:text-gray-300">To</label>
            <input type="text" id="to" name="to" placeholder="e.g. Paris (CDG)"
                class="w-full mt-1 border border-gray-300 dark:border-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>

        <!-- Departure -->
        <div class="col-span-1 sm:col-span-1 lg:col-span-2">
            <label class="text-sm font-semibold text-gray-600 dark:text-gray-300">Departure Date</label>
            <input type="date" id="departure" name="departure"
                class="w-full mt-1 border border-gray-300 dark:border-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>

        <!-- Return -->
        <div class="col-span-1 sm:col-span-1 lg:col-span-1">
            <label class="text-sm font-semibold text-gray-600 dark:text-gray-300">Stay</label>
            <select id="stay" class="w-full mt-1 border border-gray-300 dark:border-gray-700 rounded-lg px-3 py-2">
                <option>1-3 Days</option>
                <option>4-7 Days</option>
                <option>8-14 Days</option>
                <option>15+ Days</option>
            </select>
        </div>

        <!-- Stops -->
        <div class="col-span-1 sm:col-span-1 lg:col-span-1">
            <label class="text-sm font-semibold text-gray-600 dark:text-gray-300">Stops</label>
            <select id="stops" class="w-full mt-1 border border-gray-300 dark:border-gray-700 rounded-lg px-3 py-2">
                <option>Any</option>
                <option>Non-stop</option>
                <option>1 Stop</option>
                <option>2+ Stops</option>
            </select>
        </div>

        <!-- Search Button -->
        <div class="col-span-1 flex items-end">
            <button type="submit"
                class="w-full bg-blue-600 text-white rounded-lg px-6 py-3 font-semibold hover:bg-blue-700 transition">
                Search Flights
            </button>
        </div>
    </form>

    <!-- Results -->
    <div id="results" class="mt-6"></div>
</div>

<script>
document.getElementById('flightForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const params = {
        tripType: document.getElementById('tripType').value,
        from: document.getElementById('from').value,
        to: document.getElementById('to').value,
        departure: document.getElementById('departure').value,
        stay: document.getElementById('stay').value,
        stops: document.getElementById('stops').value,
        passengers: document.getElementById('passengers').value,
        class: document.getElementById('class').value
    };

    const resContainer = document.getElementById('results');
    resContainer.innerHTML = "<p class='text-gray-600 dark:text-gray-300'>Searching flights...</p>";

    try {
        const response = await fetch(`/api/search-flights?${new URLSearchParams(params)}`);
        const data = await response.json();

        if (data.length === 0) {
            resContainer.innerHTML = "<p class='text-red-500 mt-3'>No flights found.</p>";
        } else {
            resContainer.innerHTML = data.map(f => `
                <div class="border dark:border-gray-700 rounded-lg p-4 mb-2">
                    <p class="font-semibold">${f.airline} — ${f.flightNumber}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">${f.from} → ${f.to}</p>
                    <p class="text-sm text-gray-500">${f.departureTime} - ${f.arrivalTime}</p>
                </div>
            `).join('');
        }
    } catch (error) {
        resContainer.innerHTML = "<p class='text-red-500 mt-3'>Error fetching flight data.</p>";
    }
});
</script>
