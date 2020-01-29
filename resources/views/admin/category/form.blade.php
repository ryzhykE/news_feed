<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card mb-3">
            <div class="card-header">
                <h4>
                    <a href="{{ route('categories.index') }}">
                        Категории
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
            </div>
            <div class="card-footer">
                <div class="pull-right dib">
                    <button {!! Html::attributes(['class' => 'btn btn-primary','type' => 'submit',]) !!}>Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</div>



