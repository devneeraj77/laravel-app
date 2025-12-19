@php
    $destinations = [
        [
            'city' => 'Bali',
            'image' => 'https://images.unsplash.com/photo-1562619371-b67725b6fde2?q=80&w=600&h=900&auto=format&fit=crop',
        ],
        [
            'city' => 'Tokyo',
            'image' => 'https://images.unsplash.com/photo-1633983482450-bfb7b566fe6a?q=80&w=600&h=900&auto=format&fit=crop',
        ],
        [
            'city' => 'Paris',
            'image' => 'https://plus.unsplash.com/premium_photo-1671209879721-3082e78307e3?q=80&w=600&h=900&auto=format&fit=crop',
        ],
        [
            'city' => 'New York',
            'image' => 'https://images.unsplash.com/photo-1563089145-599997674d42?q=80&w=600&h=900&auto=format&fit=crop',
        ],
    ];
@endphp

<div class="flex flex-wrap items-center justify-center mt-10 mx-auto gap-4">

    @foreach ($destinations as $d)
        <div class="relative">
            <img 
                class="max-w-56 h-80 object-cover rounded-lg hover:-translate-y-1 transition-all duration-300 cursor-pointer"
                src="{{ $d['image'] }}"
                alt="{{ $d['city'] }}"
            >

            <p class="absolute bottom-2 left-2 text-white bg-black/40 backdrop-blur-sm px-3 py-1 rounded text-sm font-medium">
                {{ $d['city'] }}
            </p>
        </div>
    @endforeach

</div>
