@extends('layouts.app')

@section('title',__('Create article/discussion'))


@section('content')
<<<<<<< HEAD
    <style>
        body > #standalone-container {
            margin: 50px auto;
            max-width: 720px;
        }
        #editor-container {
            height: 350px;
        }
    </style>
    <div class="container">
    <h2>{{__('Create article/discussion')}}</h2>

    <form action="{{route('articles.store')}}" method="post" onsubmit="onSubmit(this)">
=======

    <div class="container">
    <h2>{{__('Create article/discussion')}}</h2>

    <form action="{{route('articles.store')}}" method="post">
>>>>>>> b963276e398391f613e84ab070690262fa0f214d
        @include('articles._form', ['submitText' =>__('Save')])
    </form>
    </div>

<<<<<<< HEAD
    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

    <script src="{{asset('js/quill.min.js')}}"></script>
    <script src="{{asset('js/image-resize.min.js')}}"></script>

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
        //var form = document.querySelector('form');
        function onSubmit(e) {
            // Populate hidden form on submit
            // e.preventDefault();
            var about = document.getElementById('content');
            about.innerHTML = document.getElementsByClassName('ql-editor')[0].innerHTML;

        }


    </script>
@endsection

{{--<div class="ql-editor" data-gramm="false" data-placeholder="Compose an epic..." contenteditable="true">--}}
{{--    <ul>--}}
{{--        <li>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</li>--}}
{{--        <li>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</li>--}}
{{--        <li>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</li><li>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</li>--}}
{{--        <li>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</li>--}}
{{--    </ul>--}}
{{--</div>--}}
{{--<div class="ql-clipboard" tabindex="-1" contenteditable="true">--}}

{{--</div>--}}
{{--<div class="ql-tooltip ql-hidden">--}}
{{--    <a class="ql-preview" target="_blank" href="about:blank">--}}

{{--    </a>--}}
{{--    <input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL">--}}
{{--    <a class="ql-action"></a>--}}
{{--    <a class="ql-remove"></a>--}}
{{--</div>--}}

=======
@endsection
>>>>>>> b963276e398391f613e84ab070690262fa0f214d
