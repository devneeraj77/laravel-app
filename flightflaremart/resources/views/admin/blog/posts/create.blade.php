@extends('admin.layouts.app')

@section('title', 'Create New Blog Post')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Create New Post</h1>

    <form action="{{ route('admin.blog.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- The form partial handles all fields and TinyMCE initialization -->
        @include('admin.blog.posts.partials.form', ['post' => $post, 'categories' => $categories, 'authors' => $authors])
  <body>
    
    </form>
</div>
@endsection