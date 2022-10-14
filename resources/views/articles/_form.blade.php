<style>
    body > #standalone-container {
        margin: 50px auto;
        max-width: 720px;
    }
    #editor-container {
        height: 350px;
    }
</style>
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
    <textarea class="form-control" name="content" id="content" cols="30" rows="10" hidden> @isset($article) {{$article->content}} @endisset </textarea>

    <div id="standalone-container" dir="ltr">
        <div id="toolbar-container">
    <span class="ql-formats">
      <select class="ql-font"></select>
      <select class="ql-size"></select>
    </span>
            <span class="ql-formats">
      <button class="ql-bold"></button>
      <button class="ql-italic"></button>
      <button class="ql-underline"></button>
      <button class="ql-strike"></button>
    </span>
            <span class="ql-formats">
      <select class="ql-color"></select>
      <select class="ql-background"></select>
    </span>
            <span class="ql-formats">
      <button class="ql-script" value="sub"></button>
      <button class="ql-script" value="super"></button>
    </span>
            <span class="ql-formats">
      <button class="ql-header" value="1"></button>
      <button class="ql-header" value="2"></button>
      <button class="ql-blockquote"></button>
    </span>
            <span class="ql-formats">
      <button class="ql-list" value="ordered"></button>
      <button class="ql-list" value="bullet"></button>
      <button class="ql-indent" value="-1"></button>
      <button class="ql-indent" value="+1"></button>
    </span>
            <span class="ql-formats">
      <button class="ql-direction" value="rtl"></button>
      <select class="ql-align"></select>
    </span>
            <span class="ql-formats">
      <button class="ql-link"></button>
      <button class="ql-image"></button>
      <button class="ql-formula"></button>
    </span>
            <span class="ql-formats">
      <button class="ql-clean"></button>
    </span>
        </div>
        <div id="editor-container"></div>
    </div>




</div>

<div class="form-group">
    <button class="btn btn-success">{{$submitText}}</button>
</div>
