@extends('adminlte::page')

@section('title', 'Articles')

@section('content_header')
    <h1>{{ __('messages.title') }}</h1>
@stop

@section('content')
    <a href="{{ route('articles.create') }}" class="btn btn-success mb-3">{{ __('messages.createArticleButton') }}</a>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('messages.tableTitle') }}</th>
                <th>{{ __('messages.tableCategory') }}</th>
                <th>{{ __('messages.tableActions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this article?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    {{-- Add extra stylesheets if necessary --}}
@stop

@section('js')
    <script> console.log("Managing Articles!"); </script>
@stop
