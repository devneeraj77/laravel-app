@extends('admin.layouts.app')

@section('title', 'Edit Category: ' . $category->name)
@section('breadcrumb')
    <span class="text-slate-500">Blog / Category / Edit</span>
@endsection

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Edit Category: {{ $category->name }}</h1>
    
    <form action="{{ route('admin.blog.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- The form partial handles all fields -->
        @include('admin.blog.categories.partials.form', ['category' => $category])
    </form>
</div>
@endsection