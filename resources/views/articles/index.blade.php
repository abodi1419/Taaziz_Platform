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
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                    </svg>
                </div>

                <div class="card-body">
                   <h5> <a class="text-dark" href="{{route('articles.show', $article->id)}}">{{$article->title}}</a></h5>
                </div>

                <div class="card-footer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>
                            </div>
                            <div class="col">
                                <span>{{$comment_count}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-text-fill" viewBox="0 0 16 16">
                                    <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"/>
                                </svg>
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
