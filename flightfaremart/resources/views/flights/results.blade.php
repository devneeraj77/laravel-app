<!DOCTYPE html>
@include('layouts.htmlcore')

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flight Search Results - {{ config('app.name', 'Laravel') }}</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @include('layouts.head')
</head>

<body class="antialiased bg-primary dark:bg-black dark:text-secondary px-2">
  @include('layouts.navmanu')

  <main class="max-w-7xl mx-auto py-8">
    <h1 class="text-3xl font-bold text-accent dark:text-secondary mb-6">Flight Search Results</h1>

    @if (isset($error))
      <div class="bg-red-500 text-white p-4 rounded-lg">
        <p>{{ $error }}</p>
      </div>
    @elseif (isset($results) && (isset($results['best_flights']) || isset($results['other_flights'])))
      <div class="space-y-6">
        @if (isset($results['best_flights']))
          <h2 class="text-2xl font-semibold text-accent dark:text-secondary">Best Flights</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($results['best_flights'] as $flight)
              <div class="bg-base-200 dark:bg-accent/10 p-4 rounded-lg shadow">
                @foreach ($flight['flights'] as $segment)
                    <div class="mb-2">
                        <p class="font-bold">{{ $segment['departure_airport']['id'] }} -> {{ $segment['arrival_airport']['id'] }}</p>
                        <p>{{ $segment['airline'] }} - Flight {{ $segment['flight_number'] }}</p>
                        <p>{{ $segment['duration'] }} mins</p>
                    </div>
                @endforeach
                <p class="text-lg font-bold text-right mt-2">{{ $flight['price'] }} {{ $results['search_parameters']['currency'] ?? '' }}</p>
              </div>
            @endforeach
          </div>
        @endif

        @if (isset($results['other_flights']))
          <h2 class="text-2xl font-semibold text-accent dark:text-secondary mt-8">Other Flights</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($results['other_flights'] as $flight)
              <div class="bg-base-200 dark:bg-accent/10 p-4 rounded-lg shadow">
                 @foreach ($flight['flights'] as $segment)
                    <div class="mb-2">
                        <p class="font-bold">{{ $segment['departure_airport']['id'] }} -> {{ $segment['arrival_airport']['id'] }}</p>
                        <p>{{ $segment['airline'] }} - Flight {{ $segment['flight_number'] }}</p>
                        <p>{{ $segment['duration'] }} mins</p>
                    </div>
                @endforeach
                <p class="text-lg font-bold text-right mt-2">{{ $flight['price'] }} {{ $results['search_parameters']['currency'] ?? '' }}</p>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    @else
      <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
        <p class="font-bold">No results</p>
        <p>No flights found for your search criteria. Please try again.</p>
      </div>
    @endif
  </main>

  @include('layouts.footer')
</body>

</html>
