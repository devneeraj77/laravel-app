{{-- Extend your Admin Layout --}}
@extends('admin.layouts.app') 

@section('title', 'All Blog Posts')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Blog Posts</h1>
        {{-- Button to create a new post --}}
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add New Post
        </a>
    </div>

    {{-- Posts Table --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Post List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Created On</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->created_at->format('M d, Y') }}</td>
                            <td>
                                @if($post->is_published)
                                    <span class="badge badge-success">Published</span>
                                @else
                                    <span class="badge badge-secondary">Draft</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.blog.posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('admin.blog.posts.toggle-publish', $post->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $post->is_published ? 'btn-success' : 'btn-warning' }}" onclick="return confirm('Are you sure you want to {{ $post->is_published ? 'draft' : 'publish' }} this post?')">
                                        {{ $post->is_published ? 'Published' : 'Draft' }}
                                    </button>
                                </form>
                                <form action="#" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{-- Optional: Pagination Links --}}
            {{-- {{ $posts->links() }} --}}
        </div>
    </div>
</div>
@endsection