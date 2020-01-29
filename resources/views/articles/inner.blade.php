@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-deck mb-3 text-center">
            <h1 class="mt-5">
                {{ $article->title }}
            </h1>
            <span class="head-content__date">{{ $article->formatted_date }}</span>
            <p class="lead">
                {{ $article->text }}
            </p>
    </div>
@endsection


