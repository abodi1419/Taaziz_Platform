@extends('layouts.app')

@section('title',__('Edit article/discussion'))


@section('content')

    <div class="container">
    <h2>{{__('Edit article/discussion')}}: {{$article->title}} </h2>

    <form action="{{route('articles.update', $article)}}" method="post">
        @method('PATCH')
        @include('articles._form', ['submitText' =>__('Edit')])

    </form>
    </div>

@endsection
