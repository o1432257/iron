@extends('.layouts.app')


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('main')

<div class="container">
    <h2>編輯類別</h2>
    <hr>

    <form action="/admin/news_type/update/{{$newsType->id}}" method="POST" onsubmit="this.b1.disabled=true">
        @csrf
        <div class="form-group">
            <label for="name">類別</label>

            <input class="form-control form-control-lg"  id="name" name="name" value='{{$newsType->name}}' required maxlength="255">
        </div>

        <div class="form-group">
            <label for="en_name">類別</label>

            <input class="form-control form-control-lg"  id="en_name" name="en_name" value='{{$newsType->en_name}}' required maxlength="255">
        </div>


        <button type="submit" class="btn btn-primary" name="b1">送出</button>
    </form>
</div>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote();
            $('#en_content').summernote();
        });
    </script>
@endsection
