@csrf
<div class="form-group">
    <label for="title">{{__('Title')}}</label>
    <input type="text" name="title" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
</div>

<div class="form-group">
    @foreach($categories as $key => $title)

        <label for="category_{{$key}}">{{$title}}</label>
        <input id="category_{{$key}}" type="checkbox" name="categories[]" value="{{$key}}"
                @if(isset($article) && in_array($key, $articleCategories)) checked @endif
        >

    @endforeach
</div>

<div class="form-group">
    <label for="content">{{__('Content')}}</label>
    <textarea class="form-control" name="content" id="content" cols="30" rows="10"> @isset($article) {{$article->content}} @endisset </textarea>
</div>

<div class="form-group">
    <button class="btn btn-success">{{$submitText}}</button>
</div>
