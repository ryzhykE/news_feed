@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="pull-left">Список категорий</h4>
                        @include('admin.partials.success')
                        <div class="pull-right dib">
                            <a href="{{ route('categories.create') }}" class="btn btn-success"
                               title="Добавить"><i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th width="1%">#</th>
                                    <th>Название</th>
                                    <th>Слаг</th>
                                    <th width="1%" class="text-center">Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($result as $obj)
                                    @php /** @var \App\Model\Category $obj  */@endphp
                                    <tr>
                                        <th scope="row">{{ $obj->id }}</th>
                                        <td>
                                            {{ $obj->title }}
                                        </td>
                                        <td>
                                            {{ $obj->slug }}
                                        </td>
                                        <td>
                                            <div class="btn-group list-control-buttons" role="group">
                                                <a href="{{ route('categories.edit', $obj->id) }}" class="btn btn-primary"
                                                   title="Редактировать"><i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('categories.destroy', $obj->id) }}" method="POST">
                                                    {!! method_field('DELETE') !!}
                                                    {!! csrf_field() !!}
                                                    <button class="btn btn-danger" title="@lang('cms-core::admin.layout.Delete')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2 scrollable-auto-x">
                            {!! $result->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

