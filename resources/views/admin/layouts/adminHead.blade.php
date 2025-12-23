<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
@vite(['resources/css/app.css', 'resources/js/app.js'])
@else
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
@endif
@props([
'title' => null,
'canonical' => null,
])

@php
// Generate canonical URL
$canonicalUrl = $canonical
?? url()->current();
@endphp
{{-- Canonical URL --}}
<link rel="canonical" href="{{ $canonicalUrl }}">

{{-- Meta --}}
<meta name="robots" content="noindex, follow">
<style>
    /* CSS to hide Alpine.js elements until they are initialized */
    [x-cloak] {
        display: none !important;
    }
</style>