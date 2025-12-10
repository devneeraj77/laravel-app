@extends('admin.layouts.app')
@cloudinaryJS

@section('title', 'Test Cloudinary Widget')

...

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Cloudinary Upload Widget Test</h1>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Upload Widget</h2>
        <p class="mb-4">If you see an "Upload" button below, the Cloudinary widget is working correctly.</p>
        <!-- <x-cloudinary::widget /> -->
    </div>
</div>
@endsection