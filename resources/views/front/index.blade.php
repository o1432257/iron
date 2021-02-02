@extends('.layouts.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/01-index.css') }}">
@endsection
@section('main')
    <section class="banner_outside">
        <section class="banner_group">
            <img src="./images/Banner.jpg" alt="" class="img_banner">
            <section class="banner" style="background-image: url(../images/Banner.jpg);">
            </section>
            <div class="word_banner">
                <p class="word_industry">INDUSTRY</p>
                <p class="word_in">in</p>
                <p class="word_taiwan">TAIWAN</p>
                <div class="icon_banner">
                    <div class="scroll_word">向下捲動</div>
                    <div class="scroll_img">
                        <img src="./images/Banner 下.svg" alt="" class="img_scroll">
                    </div>
                </div>
                <div class="icon_banner_arrow">
                    <i class="fas fa-angle-down"></i>
                </div>
        </section>

        <section class="bg_group">
            <div class="left_triangle" data-aos="fade-right" data-aos-offset="100" data-aos-easing="ease-in-sine">
                <img class="big_triangle" src="./images/列表頁/三角-左.jpg" alt="">
                <div class="big_bg"></div>
            </div>
            <div id="example-anchor-top" class="right_top_triangle" data-aos="fade-left"
                data-aos-anchor="#example-anchor-top" data-aos-offset="100" data-aos-duration="100">
                <img class="top_small_triangle" src="./images/列表頁/三角-右上.jpg" alt="">
                <div class="small_top_bg"></div>
            </div>
            <div id="example-anchor-bt" class="right_bottom_triangle" data-aos="fade-left"
                data-aos-anchor="#example-anchor-bt" data-aos-offset="100" data-aos-duration="100">
                <img class="bt_small_triangle" src="./images/列表頁/三角-右下.jpg" alt="">
                <div class="small_bottom_bg"></div>
            </div>
        </section>
        <!-- 白色的背景 -->
        <section class="bg_white"></section>
    </section>
    <!-- Banner一樣大小的空白框，要定位內文用的 -->
    <section class="banner_group_size_block"></section>


    <section class="container_group">
        <section class="my-container" data-aos="fade-up" data-aos-duration="500">
            <div class="logo_group logo_group_first">
                <div class="logo">
                    <img src="/images/標題 齒輪.svg" alt="">
                </div>
                <div class="logo_title font_bold">
                    <div class="logo_title_line"></div>
                    <div class="logo_title_word  ">產品簡介</div>
                    <div class="logo_title_line"></div>
                </div>
            </div>
            <article class="text">
                台灣工業發展年代
                <hr>
                民國50年以後 紡織、食品、電子零件組裝等勞力密集工業興起，成為臺灣主要外銷產品。
                <hr>
                民國70年以後 十大建設完成後，鋼鐵、機械、石化等重工業發展快速；電子資訊業也開始蓬勃發展。
                <hr>
                民國80年以後 面對國際市場的競爭，產業外移。
            </article>
        </section>

        <!-- 文章資訊 -->
        <section class="my-container">
            <div class="logo_group logo_group_second" data-aos="fade-up" data-aos-duration="500">
                <div class="logo">
                    <img src="/images/標題 齒輪.svg" alt="">
                </div>
                <div class="logo_title">
                    <div class="logo_title_line"></div>
                    <div class="logo_title_word font_bold">文章資訊</div>
                    <div class="logo_title_line"></div>
                </div>
            </div>
            <!-- 三張圖內容 -->
            <article class="cards_info">
                <div class="cards_group_title" data-aos="fade-up" data-aos-duration="500">
                    <div class="cards_group_title_line short_word_line"></div>
                    <div class="cards_group_title_word short_word font_bold">
                        鋼鐵人
                    </div>
                    <div class="cards_group_title_line short_word_line"></div>
                </div>

                <div class="cards_group">
                    @if (Session::get('local') == 'zhtw')
                        @foreach ($news as $new)
                            <div class="card disapear" data-aos="fade-up" data-aos-duration="500">
                                <div class="card_classification">{{ $new->ironmanNewsType->name }}</div>
                                <div class="card_picture" style="background-image: url({{ $new->img }});"></div>
                                <div class="card_padding">
                                    <div class="card_date">
                                        <P>{{ $new->date }}</P>
                                        <div class="new_word_group">
                                            <P class="verticle_line"></P>
                                            <P class="card_new_word">{{ $new->showNew }}</P>
                                        </div>
                                    </div>
                                    <a href="/zhtw/ironman/{{ $new->id }}">
                                        <div class="card_introduction font_bold">
                                            {{ $new->title }}
                                        </div>
                                    </a>
                                    <div class="card_content">
                                        {{ $new->preview }}
                                    </div>
                                </div>
                                <a href="/zhtw/ironman/{{ $new->id }}">
                                    <div class="btn_continue">繼續閱讀</div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        @foreach ($news as $new)
                            <div class="card disapear" data-aos="fade-up" data-aos-duration="500">
                                <div class="card_classification">{{ $new->ironmanNewsType->en_name }}</div>
                                <div class="card_picture" style="background-image: url({{ $new->img }});"></div>
                                <div class="card_padding">
                                    <div class="card_date">
                                        <P>{{ $new->date }}</P>
                                        <div class="new_word_group">
                                            <P class="verticle_line"></P>
                                            <P class="card_new_word">{{ $new->showNew }}</P>
                                        </div>
                                    </div>
                                    <a href="/en/ironman/{{ $new->id }}">
                                        <div class="card_introduction font_bold">
                                            {{ $new->en_title }}
                                        </div>
                                    </a>
                                    <div class="card_content">
                                        {{ $new->en_preview }}
                                    </div>
                                </div>
                                <a href="/en/ironman/{{ $new->id }}">
                                    <div class="btn_continue">繼續閱讀</div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if (Session::get('local') == 'zhtw')
                    <a href="/zhtw/ironman">
                    @else
                    <a href="/en/ironman">
                @endif
                <div class="btn_more btn_word_position" data-aos="fade-up" data-aos-duration="500">
                    更多文章<i class="fas fa-angle-right"></i>
                </div>
                </a>
            </article>
            <!-- 六張圖內容 -->
            <article class="cards_info ">
                <div class="cards_group_title" style="margin-top:80px;" data-aos="fade-up" data-aos-duration="500">
                    <div class="cards_group_title_line long_word_line"></div>
                    <div class="cards_group_title_word long_word font_bold ">
                        精品工具機
                    </div>
                    <div class="cards_group_title_line long_word_line"></div>
                </div>
                <div class="cards_group">
                    @if (Session::get('local') == 'zhtw')
                        @foreach ($toolNews as $toolNew)
                            <div class="card" data-aos="fade-up" data-aos-duration="500">
                                <div class="card_classification">{{ $toolNew->toolNewsType->name }}</div>
                                <div class="card_picture" style="background-image: url({{ $toolNew->img }});"></div>
                                <div class="card_padding">
                                    <div class="card_date">
                                        <P>{{ $toolNew->date }}</P>
                                        <div class="new_word_group nw_active">
                                            <P class="verticle_line"></P>
                                            <P class="card_new_word">{{ $toolNew->showNew }}</P>
                                        </div>
                                    </div>
                                    <a href="/zhtw/tool/{{ $toolNew->id }}">
                                        <div class="card_introduction font_bold">
                                            {{ $toolNew->title }}
                                        </div>
                                    </a>
                                    <div class="card_content">
                                        {{ $toolNew->preview }}
                                    </div>
                                </div>
                                <a href="/zhtw/tool/{{ $toolNew->id }}">
                                    <div class="btn_continue">繼續閱讀</div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        @foreach ($toolNews as $toolNew)
                            <div class="card" data-aos="fade-up" data-aos-duration="500">
                                <div class="card_classification">{{ $toolNew->toolNewsType->en_name }}</div>
                                <div class="card_picture" style="background-image: url({{ $toolNew->img }});"></div>
                                <div class="card_padding">
                                    <div class="card_date">
                                        <P>{{ $toolNew->date }}</P>
                                        <div class="new_word_group nw_active">
                                            <P class="verticle_line"></P>
                                            <P class="card_new_word">{{ $toolNew->showNew }}</P>
                                        </div>
                                    </div>
                                    <a href="/en/tool/{{ $toolNew->id }}">
                                        <div class="card_introduction font_bold">
                                            {{ $toolNew->en_title }}
                                        </div>
                                    </a>
                                    <div class="card_content">
                                        {{ $toolNew->en_preview }}
                                    </div>
                                </div>
                                <a href="/en/tool/{{ $toolNew->id }}">
                                    <div class="btn_continue">繼續閱讀</div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if (Session::get('local') == 'zhtw')
                    <a href="/zhtw/tool">
                    @else
                    <a href="/en/tool">
                @endif
                    <div class="btn_more" style="margin-bottom:150px;" data-aos="fade-up" data-aos-duration="500">
                        更多文章<i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </article>
        </section>
    </section>
@endsection

@section('js')
    <script>
        var nav = document.querySelector('nav')
        nav.classList.remove('list_style')
    </script>
@endsection
