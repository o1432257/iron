<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>鋼鐵人</title>
    <link rel="stylesheet" href="{{ asset('css/00-template.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- 動畫 --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    @yield('css')
</head>

<body id="top">
    <!-- 首頁 -->
    <nav class="list_style">
        <!-- 列表頁及內頁class加上list_style -->
        <!-- <nav class="list_style" id="top"> -->
        <!-- 商標 -->
        <div class="trademark home_style">
            @if (Session::get('local') == 'zhtw')
                <a href="/zhtw">
                @else
                    <a href="/en">
            @endif
            <div class="logo"></div>
            </a>
        </div>
        <!-- 漢堡標 -->
        <div id="nav-icon3" class="burger">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- nav的連結們 -->
        <div class="nav_right_link_box" id="navlinks">
            @if (Session::get('local') == 'zhtw')
                <div class="home_page font_bold nav_link_1"><a href="/zhtw"><i class="eff_1"></i> 首頁</a></div>
                <div class="ironman_page font_bold nav_link_2"><a href="/zhtw/ironman"><i class="eff_2"></i> 鋼鐵人</a>
                </div>
                <div class="work_machine_page font_bold nav_link_3"><a href="/zhtw/tool"><i class="eff_3"></i> 精品工具機</a>
                </div>
            @else
                <div class="home_page font_bold nav_link_1"><a href="/en"><i class="eff_1"></i> 首頁</a></div>
                <div class="ironman_page font_bold nav_link_2"><a href="/en/ironman"><i class="eff_2"></i> 鋼鐵人</a></div>
                <div class="work_machine_page font_bold nav_link_3"><a href="/en/tool"><i class="eff_3"></i> 精品工具機</a>
                </div>
            @endif
            @if (Session::get('local') == 'zhtw')
                <div class="language_change" id="lang">
                    <div class="chinese">中文<i class="fas fa-chevron-down pl-3"></i></div>
                    <a href="/en{{$website}}" class="english" id="eng">EN</a>
                </div>
            @else
                <div class="language_change" id="lang">
                    <div class="chinese">EN<i class="fas fa-chevron-down pl-3"></i></div>
                    <a href="/zhtw{{$website}}" class="english" id="eng">中文</a>
                </div>
            @endif
            <div class="nav_shadow_yellow" id="shadow"></div>
        </div>

    </nav>

    <main>
        @yield('main')
    </main>

    <footer>
        <!-- 內頁的footer -->
        <!-- <footer class="inside_style"> -->
        <!-- 列表頁的footer -->
        <!-- <footer class="list_style"> -->
        <div class="trademark_footer">
            <div class="logo_footer"></div>
        </div>
        <div class="infor_footer">
            <div class="phone">電話:04-22793832</div>
            <div class="mail">信箱:ABC123456@gmail.com</div>
            <div class="address">地址:台中市太平區東平路1巷28號</div>
        </div>
        <div class="share_links_box">
            <div class="share_links">
                <img src="/images/分享.svg" alt="" class="share_mark">
            </div>
            <div class="share_links font_bold">分享文章連結</div>

            <div class="share_links">
                <img src="/images/Facebook.svg" alt="" class="img_facebook share_article_button" data-type="fb">
            </div>
            <div class="share_links">
                <img src="/images/Twitter.svg" alt="" class="img_twitter share_article_button" data-type="twitter">
            </div>
            <div class="share_links ">
                <img src="/images/Line.svg" alt="" class="img_line share_article_button" data-type="line">
            </div>
        </div>
        <div class="copyright">Copyright © 2020 All Rights Reserve</div>
        <div class="set_to_top">
            <a href="#top" class="footer_to_top_mark" target="_self"></a>
        </div>
    </footer>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('js/00-template.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();

    var shareType
    var pageUrl = location.href
    var fbLink = 'https://www.facebook.com/sharer.php?u=' + pageUrl
    var lineLink = 'https://lineit.line.me/share/ui?url=' + pageUrl
    var twitterLink = 'http://twitter.com/home/?status=' + pageUrl
    var openFrame = '_blank';
    var share_article_buttons = document.querySelectorAll(".share_article_button")

    console.log(share_article_buttons);
    share_article_buttons.forEach(function(share_article_button) {
        share_article_button.onclick = function() {
            shareType = this.getAttribute('data-type')

            switch (shareType) {
                case ('fb'):
                    window.open(fbLink, openFrame)
                    break;
                case ('line'):
                    window.open(lineLink, openFrame);
                    break;
                case ('twitter'):
                    window.open(twitterLink, openFrame);
                    break;
                default:
                    return false;
            }

        }

    })

</script>
@yield('js')

</html>
