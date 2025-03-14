@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div>
        <a href="{{ route('articles.index') }}" class="btn btn-primary">Manage Articles</a>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Manage Categories</a>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
