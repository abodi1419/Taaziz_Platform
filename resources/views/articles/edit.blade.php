@extends('layouts.app')

@section('title',__('Edit article/discussion'))


@section('content')

    <div class="container">
    <h2>{{__('Edit article/discussion')}}: {{$article->title}} </h2>

<<<<<<< HEAD
    <form action="{{route('articles.update', $article)}}" method="post" onsubmit="onSubmit(this)">
=======
    <form action="{{route('articles.update', $article)}}" method="post">
>>>>>>> b963276e398391f613e84ab070690262fa0f214d
        @method('PATCH')
        @include('articles._form', ['submitText' =>__('Edit')])

    </form>
    </div>
<<<<<<< HEAD
    <script src="{{asset('js/quill.min.js')}}"></script>
    <script src="{{asset('js/image-resize.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>

        var quill = new Quill('#editor-container', {
            modules: {
                imageResize: {
                    displaySize: true
                },
                formula: true,
                syntax: true,
                toolbar: '#toolbar-container'

            },
            placeholder: 'Compose an epic...',
            theme: 'snow',

        });
        @isset($article)
            const delta = quill.clipboard.convert('{!! nl2br($article->content) !!}')
            quill.setContents(delta, 'silent')
        @endisset
        //var form = document.querySelector('form');
        function onSubmit(e) {
            // Populate hidden form on submit
            // e.preventDefault();
            var about = document.getElementById('content');
            about.innerHTML = document.getElementsByClassName('ql-editor')[0].innerHTML;

        }
    </script>
=======

>>>>>>> b963276e398391f613e84ab070690262fa0f214d
@endsection
