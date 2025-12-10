@extends('admin.layouts.app')

@section('title', 'Create New Category')
@section('breadcrumb')
    <span class="text-slate-500">Blog / Category / Create</span>
@endsection

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Create New Category</h1>
    
    <form action="{{ route('admin.blog.categories.store') }}" method="POST">
        @csrf
        
        <!-- The form partial handles all fields -->
        @include('admin.blog.categories.partials.form', ['category' => $category])
    </form>
</div>
@endsection