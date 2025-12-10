@extends('admin.layouts.app')

@section('title', 'Edit Post: ' . Str::limit($post->title, 30))
@section('breadcrumb')
    <span class="text-slate-500">Blog / Post / Edit</span>
@endsection

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Edit Post: {{ $post->title }}</h1>

    <form action="{{ route('admin.blog.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- The form partial handles all fields and TinyMCE initialization -->
        @include('admin.blog.posts.partials.form', ['post' => $post, 'categories' => $categories, 'authors' => $authors])

    </form>
</div>
@endsection