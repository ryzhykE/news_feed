@extends('layouts.app')

@section('content')
    {!! Form::model($obj, ['route' => [$routeName . '.store', $obj->id], 'id' => 'form', 'enctype' => 'multipart/form-data']) !!}
    @include($viewPath . '.form')
    {!! Form::close() !!}
@endsection
