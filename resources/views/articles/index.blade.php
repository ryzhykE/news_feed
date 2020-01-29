@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card filter-card mb-3">
            <div class="card-header d-flex justify-content-between filter-expander m-0" data-target="#filter-body" aria-expanded="true" data-toggle="collapse" aria-controls="test-block">
                <span>Фильтр</span>
                <button class="btn btn-outline-dark btn-sm"><i class="fa fa-arrow-up"></i></button>
            </div>
            <div id="filter-body" class="collapse show">
                <div class="card-body mt-3">
                    <form method="GET" action="{{ route('articles') }}" accept-charset="UTF-8" class="js-filter-form">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="filter_rubric_id">Категория</label>
                                    <select class="form-control select2-hidden-accessible" name="category" tabindex="-1" aria-hidden="true">
                                        <option value="" selected="selected">Выберите категорию</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="filter-control-buttons">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp;Найти</button>
                                    <a href="{{ route('articles') }}" class="btn btn-outline-secondary" data-toggle="tooltip"
                                       data-original-title="Очистить фильтр" aria-describedby="tooltip497362">
                                        <i class="fa fa-eraser"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-deck mb-3 text-center">
            @forelse($articles as $article)
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">
                            <a href="{{ route('articles.inner', $article->slug) }}">{{ $article->title }}</a>
                            <span class="head-content__date">{{ $article->formatted_date }}</span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title pricing-card-title">
                            Категория:  {{ $article->category->title }}
                        </h6>
                        <div class="text-muted">{{ str_limit(strip_tags($article->text), 100) }}</div>
                        <a href="{{ route('articles.inner', $article->slug) }}" type="button" class="btn btn-lg btn-block btn-primary">Перети</a>
                    </div>
                </div>
            @empty
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Нет публикаций</h4>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="mt-2 scrollable-auto-x">
            {!! $articles->links() !!}
        </div>
    </div>
@endsection

