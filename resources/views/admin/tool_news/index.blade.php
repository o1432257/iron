@extends('.layouts.app')


@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">


@endsection
@section('main')
<div class="container">
    <a class="btn btn-success mb-3" href="/admin/toolnews/create">新增最新工具消息</a>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>類別</th>
                <th>作者</th>
                <th>標題</th>
                <th>日期</th>
                <th style="width: 100px">功能</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($news as $item)

            <tr>
                <td>{{$item->toolNewsType->name}}</td>
                <td>{{$item->newsAuthor->name}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->date}}</td>
                <td>
                    <a class="btn btn-success" href="/admin/toolnews/edit/{{$item->id}}">編輯</a>
                    <span class="btn btn-danger" data-id="{{$item->id}}">刪除</span>
                </td>
            </tr>

            @endforeach
        </tbody>



    </table>
</div>

@endsection
@section('js')
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
            $('#myTable').DataTable();
        } );

    //抓刪除按鈕
    var btns = document.querySelectorAll(".btn-danger")
    //綁定點擊事件
    btns.forEach(element => {
        element.addEventListener('click',()=> {
            console.log(element.getAttribute('data-id'));
            //sweetAlert重複確認是否刪除
            Swal.fire({
                title: '你確定嗎?',
                text: "您將無法還原它！",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor:'#d33',
                cancelButtonColor:'#3085d6',
                confirmButtonText:'確定刪除',
                cancelButtonText: '取消'
            }).then((result) => {
                //如果按下確認後呼叫刪除功能，並傳要被刪除的資料過去
                if (result.isConfirmed) {
                    delete_news(element.getAttribute('data-id'));
                    element.parentElement.parentElement.parentElement.remove();
                    // display.update();
                    Swal.fire(
                        '刪除成功!',
                        '你的檔案已刪除',
                        '成功'
                    )
                    location.reload()
                }

            })
        })
    });
    //刪除功能
    function delete_news(id) {
        console.log(id);
        //建立刪除請求的表單
        var formData =new FormData
        var _token=document.querySelector('meta[name="csrf-token"]').getAttribute('content')

        formData.append('_token',_token);
        formData.append('id',id);
        //送出表單
        fetch('/admin/toolnews/delete/',{
        method:'POST',
        body:formData,
        }).then((response)=> {
            //刪除畫面上的舊資料...你自己來
            btns.forEach(btn => {
                // response=>btn.getAttribute('data-id').remove();
                delete btn.parentElement;
            });
        }).catch(error=>console.error("Error",error))
    }
</script>

@endsection
