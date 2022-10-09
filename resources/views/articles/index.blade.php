@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('articles.create')}}" class= "btn btn-lg btn-primary">{{__('Add a new article/discussion')}}</a>
        <br><br>
        <hr>
        <h3 class="text-primary text-center">{{__('All articles/discussions')}}</h3> <br>
    <div class="row">

        @forelse($articles as $article)

        <div class="col-md-4 pb-5">

            <div class="card">

                <div class="card-header  d-flex justify-content-center align-items-center">
                    <i class="fa fa-5x fa-picture-o"></i>
                </div>

                <div class="card-body">
                   <h5> <a class="text-dark" href="{{route('articles.show', $article->id)}}">{{$article->title}}</a></h5>
                </div>

                <div class="card-footer">
{{--                    <i class="fa fa-commenting" aria-hidden="true"></i>--}}

                    {{__('Author')}}: {{$article->user->name}} <hr>

{{--                    like count in articles section--}}
                    @php
                        $like_count = 0;
                        $comment_count = 0;
                    @endphp

                    @foreach($article->likes as $like)
                        @php
                            if($like->like == 1){
                                $like_count++;
                            }
                        @endphp

                    @endforeach
                    @foreach($article->comments as $comment)
                        @php
                            if($comment->id >=1){
                                 $comment_count++;
                            }
                        @endphp

                    @endforeach
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <span> {{$like_count}}</span>
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="col">
                                <span>{{$comment_count}}</span>
                                <i class="fa fa-commenting"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        {{__('No articles yet')}}

       @endforelse
        </div>
    </div>
    @endsection
