@extends('public.layouts.app')

@section('title', 'Articles')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">All Articles</h1>
        <div class="row">
            @forelse ($articles as $article)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('articles.show', $article->id) }}" class="text-decoration-none text-dark">
                                    {{ $article->title }}
                                </a>
                            </h5>
                            <p class="card-text text-muted">
                                {{ Str::limit($article->content, 150) }}
                            </p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary btn-sm">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No articles available.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@stop

@section('css')
    <style>
        .card-title a:hover {
            color: #007bff;
            text-decoration: underline;
        }
    </style>
@stop

@section('js')
    {{-- Additional custom JS if needed --}}
@stop
