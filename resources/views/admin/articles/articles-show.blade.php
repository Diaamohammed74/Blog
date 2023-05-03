@extends('admin.layouts.app')

@section('PageHeader')
    View-Article
@endsection

@section('PageTitle')
    Show-{{ $article->title }}-Article
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $article->title }}</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title ." :"}}</h5>
                                <p class="card-text">{!! $article->content !!}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img class="card-img" src="{{ asset('imgs/' . $article->cover) }}" alt="{{ $article->title }}"
                                style="width: 100px; height: 110px;">
                        </div>
                        <div class="card-footer">
                            <div>
                                <small class="text-muted mx-auto">{{ 'Writer :' . $article->user->name }}</small>
                                <small class="text-muted mx-10">{{ $article->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
