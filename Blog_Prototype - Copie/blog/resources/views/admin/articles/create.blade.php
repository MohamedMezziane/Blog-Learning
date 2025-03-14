@extends('adminlte::page')

@section('title', 'Create Article')

@section('content_header')
    <h1>Create New Article</h1>
@stop

@section('content')
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create Article</button>
    </form>
@stop

@section('css')
    {{-- Add extra stylesheets if necessary --}}
@stop

@section('js')
    <script> console.log("Creating Article!"); </script>
@stop
