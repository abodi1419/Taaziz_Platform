@extends('layouts.app')

@section('title',__('Create article/discussion'))


@section('content')

    <div class="container">
    <h2>{{__('Create article/discussion')}}</h2>

    <form action="{{route('articles.store')}}" method="post">
        @include('articles._form', ['submitText' =>__('Save')])
    </form>
    </div>

@endsection
