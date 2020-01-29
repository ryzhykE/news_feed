@extends('layouts.app')

@section('content')
    {!! Form::model($obj, ['route' => [$routeName . '.update', $obj->id], 'method' => 'put', 'id' => 'form', 'enctype' => 'multipart/form-data']) !!}
    @include($viewPath . '.form')
    {!! Form::close() !!}
@endsection
