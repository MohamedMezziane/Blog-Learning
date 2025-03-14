@extends('public.layouts.app')

@section('title', $article->title)

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">{{ $article->title }}</h1>
                        <p class="card-text text-muted">
                            {{ $article->content }}
                        </p>
                    </div>
                    <div class="card-footer bg-transparent text-center">
                        <a href="{{ route('articles.index') }}" class="btn btn-primary btn-sm">
                            Back to Articles
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card-title {
            font-size: 2rem;
            font-weight: bold;
        }
        .card-text {
            line-height: 1.6;
        }
        .btn-primary {
            padding: 0.5rem 1rem;
            font-size: 1rem;
        }
    </style>
@stop

@section('js')
    {{-- Additional custom JS if needed --}}
@stop
