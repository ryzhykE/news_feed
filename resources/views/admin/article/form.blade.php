<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mb-3">
            <div class="card-header">
                <h4>
                    <a href="{{ route('manager.index') }}">
                        Публикации
                    </a>
                </h4>
            </div>
            <div class="card-body">
                @include('admin.partials.errors')
                <div class="form-group">
                    <div class="row">
                        {!! Form::label('title', 'Название', ['class' => 'col-sm-3']) !!}
                        <div class="col-sm-9">{!! Form::text('title') !!}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        {!! Form::label('slug', 'Слаг', ['class' => 'col-sm-3']) !!}
                        <div class="col-sm-9">{!! Form::text('slug') !!}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        {!! Form::label('text', 'Текст', ['class' => 'col-sm-3']) !!}
                        <div class="col-sm-9">{!! Form::textarea('text') !!}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        {!! Form::label('category_id', 'Категория', ['class' => 'col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="pull-right dib">
                    <button {!! Html::attributes(['class' => 'btn btn-primary','type' => 'submit',]) !!}>Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</div>



