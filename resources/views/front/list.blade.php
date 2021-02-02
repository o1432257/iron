@extends('.layouts.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/02-list_page.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

@endsection
@section('main')
    <!-- 上方banner -->
    <section class="banner">
        <!-- 左圖 -->
        <!-- 沒有用button包住，一進來的畫面沒有黑色遮罩，有黃框 -->
        <div class="pic_man" style="background-image: url('{{ asset('images/列表-左.jpg') }}');">
            <div class="yellow_border_man ">
                鋼鐵人
            </div>
        </div>
        <!-- 右圖 -->
        <div class="pic" style="background-image: url('{{ asset('images/列表-右.jpg') }}');">
            @if (Session::get('local') == 'zhtw')
                <a href="/zhtw/tool" class="banner_mask">
                @else
                    <a href="/en/tool" class="banner_mask">
            @endif
            <button class="yellow_border meet">精品工具機</button>
            </a>
        </div>
    </section>
    <section class="content">
        <!-- 背景 -->
        <div class="background">
            <div class="triangle_bg">
                <div class="all_big " data-aos="fade-right" style="transition: 0.5s;">
                    <img class="big_triangle" src="{{ asset('images/列表頁/三角-左.jpg') }}" alt="">
                    <div class="big_mask"></div>

                </div>

                <div class="all_small_top" data-aos="fade-left" style="transition: 0.5s;">
                    <img class="top_small_triangle" src="{{ asset('images/列表頁/三角-右上.jpg') }}" alt="">
                    <div class="small_top_bg"></div>
                </div>

                <div class="all_small_bt" data-aos="fade-left" style="transition: 0.5s;">
                    <img class="bt_small_triangle" src="{{ asset('images/列表頁/三角-右下.jpg') }}" alt="">
                    <div class="small_bottom_bg"></div>
                </div>
                <!-- 白色背景 -->
                <div class="bg_white"></div>
            </div>
        </div>
        <!-- 引導頁 -->
        <div class="page ">
            <div class="mycontainer">
                <div class="now_page animate__animated  animate__fadeInUp">
                    @if (Session::get('local') == 'zhtw')
                        <a href="/" style="text-decoration: none;">
                        @else
                            <a href="/en" style="text-decoration: none;">
                    @endif
                    <span class="index">首頁</span>
                    </a>

                    <span class="arrow"> ></span>
                    <span class="in_page">鋼鐵人</span>
                </div>
            </div>
        </div>
        <div class="all_btns ">
            <div class="mycontainer">
                <div class="search  animate__animated  animate__fadeInUp ">
                    <input id="search_input" class="btn" type="text" placeholder="請輸入關鍵字" @if (isset($keyword)) value = {{$keyword}} @endif>
                    <i id='search_btn' class="fas fa-search"></i>
                </div>
                <select class="btn_selector  animate__animated  animate__fadeInUp ">
                    <option class="opt" value="0">全部</option>
                    @if (Session::get('local') == 'zhtw')
                        @foreach ($newsType as $data)
                            <option class="opt" value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    @else
                        @foreach ($newsType as $data)
                            <option class="opt" value="{{ $data->id }}">{{ $data->en_name }}</option>
                        @endforeach
                    @endif
                </select>
                <div class="btns animate__animated  animate__fadeInUp  ">
                    <div class="btn_classification type_btn" data-id="0">全部</div>
                    @if (Session::get('local') == 'zhtw')
                        @foreach ($newsType as $data)
                            <div class="btn_classification type_btn" data-id="{{ $data->id }}">{{ $data->name }}
                            </div>
                        @endforeach
                    @else
                        @foreach ($newsType as $data)
                            <div class="btn_classification type_btn" data-id="{{ $data->id }}">{{ $data->en_name }}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- 卡片內容146 -->
        <div class="all_cards">
            <div id="cardBox" class="mycontainer ">
                @if (Session::get('local') == 'zhtw')
                    @foreach ($news as $new)
                        <div class="card " data-aos="fade-up" style="transition: 0.5s;">
                            <div class="pic">
                                <img src="{{ $new->img }}" alt="">
                                <div class="card_classification">{{ $new->ironmanNewsType->name }}</div>
                            </div>
                            <div class="card_container">
                                <div class="day">
                                    <span class="date">{{ $new->date }}</span>
                                    <span class="new">{{ $new->showNew }}</span>
                                </div>
                                <a href="/zhtw/ironman/{{ $new->id }}">
                                    <div class="title">{{ $new->title }}</div>
                                </a>
                                <div class="card_content">{{ $new->preview }}</div>
                                <a href="/zhtw/ironman/{{ $new->id }}">
                                    <div class="more">繼續閱讀</div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($news as $new)
                        <div class="card " data-aos="fade-up" style="transition: 0.5s;">
                            <div class="pic">
                                <img src="{{ $new->img }}" alt="">
                                <div class="card_classification">{{ $new->ironmanNewsType->en_name }}</div>
                            </div>
                            <div class="card_container">
                                <div class="day">
                                    <span class="date">{{ $new->date }}</span>
                                    <span class="new">{{ $new->showNew }}</span>
                                </div>
                                <a href="/en/ironman/{{ $new->id }}">
                                    <div class="title">{{ $new->en_title }}</div>
                                </a>
                                <div class="card_content">{{ $new->en_preview }}</div>
                                <a href="/en/ironman/{{ $new->id }}">
                                    <div class="more">繼續閱讀</div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div id="cardMore" class="btn_more " data-aos="fade-up" style="transition: 0.5s;">
                <div class="btn_show_more">
                    <div class="text">展開更多</div>
                    <div class="arrow"><i class="fas fa-chevron-down"></i></div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



    {{-- 判斷目前是哪個語言 --}}
    @if (Session::get('local') == 'zhtw')
        <script>
            var local = 'zhtw'

        </script>
    @else
        <script>
            var local = 'en'

        </script>
    @endif

    <script>
        var cardMore = document.querySelector('#cardMore');
        var cardBox = document.querySelector('#cardBox');
        var type_btns = document.querySelectorAll('.type_btn');
        var frequency = 1;
        var type_id = 0;
        var _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var search_btn = document.querySelector('#search_btn');
        var search_input = document.querySelector('#search_input');
        // 預設為false,搜尋狀態為真
        var checkSearching = false;



        //沒有更多消息時 跳出提示
        function checkLength(data) {
            if (data.length == 0) {
                Swal.fire('沒有更多消息了')
            }
        }

        //清空狀態
        function clear() {
            cardBox.innerHTML = '';
            cardMore.style.display = 'flex'
            frequency = 1
            checkSearching = false;
        }
        //搜尋關鍵字
        function searchKeyword(searchValue) {
            var formData = new FormData;
            formData.append('_token', _token);
            formData.append('local', local);
            formData.append('keyword', searchValue);
            fetch('/list/news/search', {
                    method: 'post',
                    body: formData,
                })
                .then(response => response.json())
                .catch(error => console.error('Error:', error))
                .then(function(data) {
                    console.log(data);
                    checkSearching = true;
                    console.log(checkSearching);
                    cardBox.innerHTML = '';
                    showCard(data);
                });
        }

        search_btn.onclick = function() {
            searchKeyword(search_input.value);
        }

        //展開更多按鈕綁定onclick事件,再獲得9筆資料
        cardMore.onclick = function() {
            if (checkSearching == false) {
                var formData = new FormData;
                formData.append('frequency', frequency);
                formData.append('_token', _token);
                formData.append('id', type_id);
                formData.append('local', local);
                fetch('/list/news', {
                        method: 'post',
                        body: formData,
                    })
                    .then(response => response.json())
                    .catch(error => console.error('Error:', error))
                    .then(function(data) {
                        checkLength(data);
                        showCard(data);
                    });
                frequency += 1;
            } else {
                Swal.fire('沒有更多消息了');
            }
        }

        //種類按鈕綁定onclick事件,切換種類獲得9筆資料
        type_btns.forEach(
            function(type_btn) {
                type_btn.onclick = function() {
                    // 清空
                    clear()
                    type_id = this.getAttribute('data-id');

                    var formData = new FormData;
                    var id = this.getAttribute('data-id')
                    var _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

                    formData.append('id', id);
                    formData.append('local', local);
                    formData.append('_token', _token);
                    fetch('/list/news/type', {
                            method: 'post',
                            body: formData,
                        })
                        .then(response => response.json())
                        .catch(error => console.error('Error:', error))
                        .then(function(data) {
                            showCard(data);
                        });
                }
            }
        )

        //種類選項綁定切換事件,切換種類獲得9筆資料
        var btn_selector = document.querySelector('.btn_selector')
        btn_selector.onchange = function() {
            clear()
            type_id = this.value;
            var formData = new FormData;
            var id = this.value
            var _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            formData.append('id', id);
            formData.append('local', local);
            formData.append('_token', _token);
            fetch('/list/news/type', {
                    method: 'post',
                    body: formData,
                })
                .then(response => response.json())
                .catch(error => console.error('Error:', error))
                .then(function(data) {
                    showCard(data);
                });
        }

    </script>

    {{-- 根據語言長出對應的卡片 --}}
    @if (Session::get('local') == 'zhtw')
        <script>
            //長出卡片
            function showCard(data) {
                data.forEach(
                    function(data) {
                        cardBox.innerHTML += `
                                                            <div class="card" data-aos="fade-up" style="transition: 0.5s;">
                                                            <div class="pic">
                                                                <img src="${ data.img }" alt="">
                                                                <div class="card_classification">${ data.ironman_news_type.name }</div>
                                                            </div>
                                                            <div class="card_container">
                                                                <div class="day">
                                                                    <span class="date">${ data.date }</span>
                                                                    <span class="new">${ data.showNew }</span>
                                                                </div>
                                                                <a href="/zhtw/ironman/${ data.id }"><div class="title">${ data.title }</div></a>
                                                                <div class="card_content">${ data.preview }</div>
                                                                <a href="/zhtw/ironman/${ data.id }"><div class="more">繼續閱讀</div></a>
                                                            </div>
                                                        </div>`
                    }
                )
            }

        </script>
    @else
        <script>
            //長出卡片
            function showCard(data) {
                data.forEach(
                    function(data) {
                        cardBox.innerHTML +=
                            `
                                                            <div class="card" data-aos="fade-up" style="transition: 0.5s;">
                                                            <div class="pic">
                                                                <img src="${ data.img }" alt="">
                                                                <div class="card_classification">${ data.ironman_news_type.en_name }</div>
                                                            </div>
                                                            <div class="card_container">
                                                                <div class="day">
                                                                    <span class="date">${ data.date }</span>
                                                                    <span class="new">${ data.showNew }</span>
                                                                </div>
                                                                <a href="/en/ironman/${ data.id }"><div class="title">${ data.en_title }</div></a>
                                                                <div class="card_content">${ data.en_preview }</div>
                                                                <a href="/en/ironman/${ data.id }"><div class="more">繼續閱讀</div></a>
                                                            </div>
                                                        </div>`
                    }
                )
            }

        </script>
    @endif
    @if (isset($keyword))
        <script>
            searchKeyword(search_input.value);
        </script>
    @endif
@endsection
