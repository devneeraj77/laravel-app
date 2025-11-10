<!DOCTYPE html>

@include('layouts.htmlcore')

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @include('layouts.head')
  <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class="bg-gray-100 text-gray-200 antialiased bg-primary dark:bg-dark dark:text-secondary text-[#1b1b18] flex px-2  items-center lg:justify-center min-h-screen flex-col">
  @include('layouts.navmanu')
  <main>
    <div class="min-h-screen md:flex flex-1 ">
      <div class="relative isolate px-6 lg:px-8 ">
        <div aria-hidden="true" class="absolute border inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
          <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-secondary to-priamry opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"></div>
        </div>
        <div class="mx-auto  max-w-2xl py-4 sm:py-6 lg:py-10">
          <div class="hidden sm:mb-8 sm:flex sm:justify-center">
            <div class="relative rounded-full px-3 py-1 text-sm/6 text-gray-400 ring-1 ring-seconadary hover:ring-scondary/10">
              Announcing our next round of funding. <a href="#" class="font-semibold text-accent dark:text-secondary"><span aria-hidden="true" class="absolute inset-0"></span>Read more <span aria-hidden="true">&rarr;</span></a>
            </div>
          </div>
          <div class="text-center">
            <h1 class="text-4xl font-semibold tracking-tight text-balance text-accent dark:text-primary sm:text-6xl">Data to enrich  <span class="dark:text-secondary">your online business</span></h1>
            <p class="mt-8 text-lg  font-medium text-pretty text-gray-500 sm:text-xl/8">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">

              <!-- From Uiverse.io by mahiatlinux -->
              <div class="flex justify-center items-center gap-12 h-full">
                <div
                  class="bg-gradient-to-b from-trans to-transparent p-[4px] rounded-[16px]">
                  <button
                    class="group p-[4px] rounded-[12px] bg-gradient-to-b from-trans to-trans shadow-[0_2px_4px_rgba(0,0,0,0.7)] hover:shadow-[0_4px_8px_rgba(0,0,0,0.6)] active:shadow-[0_0px_1px_rgba(0,0,0,0.8)] active:scale-[0.995] transition-all duration-200">
                    <div
                      class="bg-gradient-to-b from-accent to-accent rounded-[8px] px-3 py-2">
                      <div class="flex gap-2 items-center">
                        <span class="font-semibold text-white">Get Started</span>
                      </div>
                    </div>
                  </button>
                </div>
              </div>



            </div>
          </div>
        </div>
      </div>
      <div class="bg-secondary text-black min-w-80 m-4 min-h-60 md:h-72 lg:h-96 px-6 lg:px-8 mx-4 md:mx-6">
      add flights Results Section
      </div>
    </div>
  </main>

  @if (Route::has('login'))
  <div class="h-14.5 hidden lg:block"></div>
  @endif
  @include('layouts.footer')

</body>

</html>