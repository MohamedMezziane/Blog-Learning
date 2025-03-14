@extends('adminlte::page')

@section('title', 'Create Category')

@section('content_header')
    <h1>Create New Category</h1>
@stop

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-success">Create Category</button>
    </form>
@stop

@section('css')
    {{-- Add extra stylesheets if necessary --}}
@stop

@section('js')
    <script> console.log("Creating Category!"); </script>
@stop
