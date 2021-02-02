@extends('.layouts.app')


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('main')

    <div class="container">
        <h2>新增最新消息</h2>
        <hr>

        <form action="/admin/news/store" method="POST" enctype="multipart/form-data" onsubmit="this.b1.disabled=true">
            @csrf
            <div class="form-group">
                <label for="type_id">類別</label>

                <select class="form-control form-control-lg" id="type_id" name="type_id" required>
                    @foreach ($newsTypes as $newsType)

                        <option value="{{ $newsType->id }}">{{ $newsType->name }}</option>

                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="author_id">作者</label>

                <select class="form-control form-control-lg" id="author_id" name="author_id" required>
                    @foreach ($newsAuthors as $newsAuthor)

                        <option value="{{ $newsAuthor->id }}">{{ $newsAuthor->name }}</option>

                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="img">圖片</label>
                <input type="file" class="form-control" id="img" name="img" required>
            </div>
            <div class="form-group">
                <label for="date">時間</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label for="title">標題</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="255" required>
            </div>
            <div class="form-group">
                <label for="content">內文預覽</label>
                <textarea rows="2" class="form-control" id="preview" name="preview" maxlength="50" required></textarea>
            </div>
            <div class="form-group">
                <label for="content">內文</label>
                <textarea rows="3" class="form-control" id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <label for="keyword">關鍵字(可上傳多個，請用一個分號把每個關鍵字隔開)</label>
                <input type="text" class="form-control" id="keyword" name="keyword" required maxlength="255">
            </div>
            <hr>
            <div class="form-group">
                <label for="en_title">英文標題</label>
                <input type="text" class="form-control" id="en_title" name="en_title" maxlength="255">
            </div>
            <div class="form-group">
                <label for="content">英文內文預覽</label>
                <textarea rows="2" class="form-control" id="preview" name="en_preview" maxlength="50"></textarea>
            </div>
            <div class="form-group">
                <label for="en_content">英文內文</label>
                <textarea rows="3" class="form-control" id="en_content" name="en_content"></textarea>
            </div>

            <div class="form-group">
                <label for="en_keyword">英文關鍵字(可上傳多個，請用一個分號把每個關鍵字隔開)</label>
                <input type="text" class="form-control" id="en_keyword" name="en_keyword" maxlength="255">
            </div>
            <button type="submit" class="btn btn-primary" name="b1">送出</button>
        </form>
    </div>

@endsection

@section('js')
    {{-- summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#content').summernote({
                fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22', '24',
                    '28', '32', '36', '40', '48'
                ],
                followingToolbar: false,
                dialogsInBody: true,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style'],
                    ['style', ['clear', 'bold', 'italic', 'underline']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['codeview']]
                ],
                height: 450,
                lang: 'zh-TW',
                fontSize: 20,
                callbacks: {
                    onImageUpload: function(files) {
                        for (let i = 0; i < files.length; i++) {
                            $.upload(files[i], '#content');
                        }
                    },
                    onMediaDelete: function(target) {
                        $.delete(target[0].getAttribute("src"));
                    }
                },
            });
            $('#en_content').summernote({
                fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22', '24',
                    '28', '32', '36', '40', '48'
                ],
                followingToolbar: false,
                dialogsInBody: true,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style'],
                    ['style', ['clear', 'bold', 'italic', 'underline']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['codeview']]
                ],
                height: 450,
                lang: 'zh-TW',
                fontSize: 20,
                callbacks: {
                    onImageUpload: function(files) {
                        for (let i = 0; i < files.length; i++) {
                            $.upload(files[i], '#en_content');
                        }
                    },
                    onMediaDelete: function(target) {
                        $.delete(target[0].getAttribute("src"));
                    }
                },
            });
            $('.note-editable').css('font-size', '20px');


            $.upload = function(file, imageTarget) {
                let out = new FormData();
                out.append('file', file, file.name);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_upload_img',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: out,
                    success: function(img) {
                        $(imageTarget).summernote('insertImage', img, 'img');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            };

            $.delete = function(file_link) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_delete_img',
                    data: {
                        file_link: file_link
                    },
                    success: function(img) {
                        console.log("delete:", img);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            }
        });

    </script>
@endsection
