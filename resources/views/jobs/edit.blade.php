@extends('layouts.app')

@section('title',__('Post a new job'))


@section('content')
        <div class="container card"  style="width: 50rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <h2 class="m-auto p-3" >{{__('Edit job')}}</h2>
            <hr>
            <form action="{{route('jobs.update',$job)}}" method="post" class="m-auto">
                @method('PUT')
                @include('jobs._form', ['submitText' =>__('Update')])
            </form>
        </div>

@endsection
