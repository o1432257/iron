@extends('.layouts.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/03-Inside_page.css') }}">
@endsection

@section('main')
    <section class="banner">
        <div class="inside_banner">
        </div>
        <!-- 麵包屑 -->
        <div class="page">
            <div class="mycontainer">
                <div class="now_page">
                    @if (Session::get('local') == 'zhtw')
                        <a href="/">
                        @else
                            <a href="/en">
                    @endif
                    <span class="index">首頁</span>
                    </a>
                    <span class="arrow"> ></span>
                    <span class="in_page font_bold">{{ $data->title }}</span>
                </div>
            </div>
        </div>

        <div class="inside_page_title_position">
            <div class="inside_page_title font_bold">
                {{ $data->title }}
            </div>
        </div>
    </section>
    <section class="content">
        <!-- 卡片 -->
        <div class="inside_container" data-aos="fade-up" data-aos-delay="5">

            <div class="intro_pic">
                <img src="{{ $data->img }}" alt="">
            </div>
            @if (Session::get('local') == 'zhtw')
            <div class="small_intro_card">
                <div class="tr">
                    <div class="detail font_bold">作&emsp;&emsp;者:</div>
                    <div class="input ">{{ $data->newsAuthor->name }}</div>
                </div>
                <div class="tr">
                    <div class="detail font_bold">文章日期:</div>
                    <div class="input ">{{ $data->date }}</div>
                </div>
                <div class="tr">
                    <div class="detail font_bold">公司名稱:</div>
                    <div class="input ">{{ $data->newsAuthor->company }}</div>
                </div>
                <div class="tr">
                    <div valign="top" class="detail font_bold">公司簡介:</div>
                    <div class="input">
                        <div class="input_content">
                            {{ $data->newsAuthor->companySummary }}
                        </div>

                    </div>
                </div>
                <div class="tr">
                    <div class="detail font_bold">網&emsp;&emsp;址:</div>
                    <div class="input "> <a href="{{ $data->newsAuthor->companyWebsite }}" class="input_net">{{ $data->newsAuthor->companyWebsite }}</a></div>
                </div>
                <div class="tr">
                    <div class="detail font_bold">產品型錄:</div>
                    <div class="input "> <a href="/download/{{ $data->newsAuthor->id }}" class="input_net">{{ $data->newsAuthor->catalogue_name }}</a></div>
                </div>
            </div>
            @else
            <div class="small_intro_card">
                <div class="tr">
                    <div class="detail font_bold">作&emsp;&emsp;者:</div>
                    <div class="input ">{{ $data->newsAuthor->en_name }}</div>
                </div>
                <div class="tr">
                    <div class="detail font_bold">文章日期:</div>
                    <div class="input ">{{ $data->date }}</div>
                </div>
                <div class="tr">
                    <div class="detail font_bold">公司名稱:</div>
                    <div class="input ">{{ $data->newsAuthor->en_company }}</div>
                </div>
                <div class="tr">
                    <div valign="top" class="detail font_bold">公司簡介:</div>
                    <div class="input">
                        <div class="input_content">
                            {{ $data->newsAuthor->en_companySummary }}
                        </div>
                    </div>
                </div>
                <div class="tr">
                    <div class="detail font_bold">網&emsp;&emsp;址:</div>
                    <div class="input "> <a href="{{ $data->newsAuthor->companyWebsite }}" class="input_net">{{ $data->newsAuthor->companyWebsite }}</a></div>
                </div>
                <div class="tr">
                    <div class="detail font_bold">產品型錄:</div>
                    <div class="input "> <a href="/download/{{ $data->newsAuthor->id }}" class="input_net">{{ $data->newsAuthor->catalogue_name }}</a></div>
                </div>
            </div>
            @endif


        </div>
    </section>
    <section class="DIY_content">
        <div class="DIY" data-aos="fade-up" data-aos-delay="5">
            @if (Session::get('local') == 'zhtw')
                {!! $data->content !!}
            @else
                {!! $data->en_content !!}
            @endif
        </div>
        <div class="serch_word_box" data-aos="fade-up" data-aos-delay="5">
            <div class="serch_word">關鍵字：</div>
            @if (Session::get('local') == 'zhtw')
                @if (count($keyword) == 1)
                    @foreach ($keyword as $item)
                        <a href="/{{Session::get('local')}}/keyword{{$website}}/{{$item}}"> <span>{{ $item }}</span> </a>
                    @endforeach
                @else
                    @foreach ($keyword as $item)
                        @if ($loop->last)
                            <a href="/{{Session::get('local')}}/keyword{{$website}}/{{$item}}"> <span>{{ $item }}</span> </a>
                        @else
                            <a href="/{{Session::get('local')}}/keyword{{$website}}/{{$item}}"> <span>{{ $item }}</span> </a>
                            <span class="color_red">、</span>
                        @endif
                    @endforeach
                @endif
            @else
                @if (count($en_keyword) == 1)
                    @foreach ($en_keyword as $item)
                        <a href="/{{Session::get('local')}}/keyword{{$website}}/{{$item}}"> <span>{{ $item }}</span> </a>
                    @endforeach
                @else
                    @foreach ($en_keyword as $item)
                        @if ($loop->last)
                            <a href="/{{Session::get('local')}}/keyword{{$website}}/{{$item}}"> <span>{{ $item }}</span> </a>
                        @else
                            <a href="/{{Session::get('local')}}/keyword{{$website}}/{{$item}}"> <span>{{ $item }}</span> </a>
                            <span class="color_red">、</span>
                        @endif
                    @endforeach
                @endif
            @endif
        </div>
    </section>
@endsection
@section('js')
    <script>
        var footer = document.querySelector('footer')
        //設定列表頁的footer樣式
        footer.classList.add('inside_style')
    </script>
@endsection
