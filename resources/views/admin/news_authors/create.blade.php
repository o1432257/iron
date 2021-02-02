@extends('.layouts.app')


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('main')

<div class="container">
    <h2>新增作者</h2>
    <hr>

    <form action="/admin/news_author/store" method="POST" enctype="multipart/form-data" onsubmit="this.b1.disabled=true">
        @csrf

        <div class="form-group">
            <label for="name">作者</label>
            <input type="text" class="form-control" id="name" name="name" required maxlength="255">
        </div>
        <div class="form-group">
            <label for="en_name">作者英文</label>
            <input type="text" class="form-control" id="en_name" name="en_name" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="company">公司</label>
            <input type="text" class="form-control" id="company" name="company" required >
        </div>

        <div class="form-group">
            <label for="en_company">公司英文</label>
            <input rows="3" class="form-control" id="en_company" name="en_company" required>
        </div>
        <div class="form-group">
            <label for="companySummary">公司簡介</label>
            <input rows="3" class="form-control" id="companySummary" name="companySummary" required>
        </div>

        <div class="form-group">
            <label for="en_companySummary">公司簡介英文</label>
            <input type="text" class="form-control" id="en_companySummary" name="en_companySummary" required>
        </div>
        <div class="form-group">
            <label for="companyWebsite">公司網站</label>
            <input type="text" class="form-control" id="companyWebsite" name="companyWebsite" required>
        </div>
        <div class="form-group">
            <label for="img">產品型錄</label>
            <input type="file" class="form-control" name="catalogue" required>
        </div>

        <button type="submit" name="b1" class="btn btn-primary">送出</button>
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
