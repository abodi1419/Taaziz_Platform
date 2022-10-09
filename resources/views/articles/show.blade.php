@extends('layouts.app')


@section('title', $article->title)


@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h4 class="text-center">{{$article->title}}</h4>
                <div><b>{{__('Author')}}: </b> {{$article->user->name}}</div>
                <div><b>{{__('Created at')}}: </b> {{$article->created_at}}, <b>{{__('Updated at')}}: </b> {{$article->updated_at}}</div>
                <hr>



                @auth()
                @php
                    $like_count = 0;
                    $comment_count = 0;
                    $like_status = "btn-secondary";
                @endphp

                @foreach($article->likes as $like)
                    @php
                        if($like->like == 1){
                            $like_count++;
                        }

                        if ($like->like == 1 && $like->user_id == Auth::user()->id){
                            $like_status = "btn-success";
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

                <button id="like-btn"  type="button" data-like="{{$like_status}}" data-article_id="{{$article->id}}" class="btn {{$like_status}}">
                    <span>{{$like_count}}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg> {{__('Like')}} </button>
{{--                Comments number--}}
                    <button type="button" class="btn btn-outline-secondary disabled">
                        <span>{{$comment_count}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-text-fill" viewBox="0 0 16 16">
                            <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"/>
                        </svg> {{__('Comments')}} </button>
                @endauth

            </div>

            <div class="card-body">
                {!! nl2br($article->content) !!}
            </div>

            <div class="card-footer">

            </div>

        </div>
    </div>

    {{--    See comments Section--}}
    <h3 class="container mt-5">{{__('Comments')}}</h3>
    <div id="comments" class="container mt-4">

        @forelse($article->comments as $comment)

            <div class="card p-3">
                {{$comment->content}}
            </div>
            <div class="card-footer  mb-3">
                <p>{{__('Author')}}: {{$comment->user}}</p> {{-- ->name--}}

{{--                <button>delete</button>--}}
            </div>

        @empty
            {{__('No comments yet')}}
        @endforelse

    </div>


    {{--    Type comments Section--}}
{{--    To allow only auth users to type comments by using @auth & @endauth --}}
    @auth()
    <div id="commentForm" class="container mt-5">

        <div class="card">
            <h5 class="card-header bg-secondary text-white">{{__('Type your comment here')}}</h5>
            <div class="card-body">
                <form action="{{route('comments.store', $article->id)}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="content"></label>
                        <textarea class="form-control" placeholder="{{__('Type your comment here')}}" name="content" id="content" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
        <p>{{__('Login to type comment')}}</p>
    @endauth

@endsection
