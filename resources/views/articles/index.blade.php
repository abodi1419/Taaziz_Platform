@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <form action="{{asset('/search/articles')}}" method="get" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                           placeholder="{{__('Search')}}" @isset($q) value="{{$q}}" @endisset>
                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="fa fa-search"></span>
                    </button>
                </span>
                </div>
            </form>
        </div>
        <br>
        <a href="{{route('articles.create')}}" class= "btn btn-lg btn-primary">{{__('Post +')}}</a>
        <br><br>
        <hr>
        <h3 class="text-primary text-center">{{__('All Articles | Discussions | Events')}}</h3> <br>
     <div class="row">

        @forelse($articles as $article)

        <div class="col-md-4 pb-5">

            <div class="card">

                <div class="card-header  d-flex justify-content-center align-items-center">
                    @if($article->image!==null)
                        <img src="{{$article->image}}" height="250" width="100%" alt="">
                    @else
                    <i class="fa fa-5x fa-picture-o"></i>
                    @endif
                </div>

                <div class="card-body">
                   <h5> <a class="text-dark" href="{{route('articles.show', $article->id)}}">{{$article->title}}</a></h5>
                </div>

                <div class="card-footer">
{{--                    <i class="fa fa-commenting" aria-hidden="true"></i>--}}

                    {{__('Author')}}: {{$article->user->name}}
                    <br>
                    {{__('Tags')}}: @foreach($article->categories as $cat)
                                        {{$cat->title.', '}}
                                    @endforeach
                    <hr>
{{--                    like count in articles section--}}
                    @php
                        $comment_count = 0;
                    @endphp

                    @foreach($article->comments as $comment)
                        @php
                            if(true){
                                 $comment_count++;
                            }
                        @endphp

                    @endforeach
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <span> {{count($article->likes)}}</span>
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
        {!! $articles->render() !!}
    </div>
    @endsection
