<?php

namespace App\Http\Controllers;

use App\ToolNews;
use Carbon\Carbon;
use App\IronmanNews;
use App\ToolNewsType;
use App\NewsAuthor;
use App\IronmanNewsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function index($local = 'zhtw')
    {
        Session::put('local', $local);
        //英文資料為空不拿
        if ($local == 'zhtw') {
            $news = IronmanNews::orderBy('created_at', 'desc')->limit(3)->get();
            $toolNews = ToolNews::orderBy('created_at', 'desc')->limit(6)->get();
        } else {
            $news = IronmanNews::orderBy('created_at', 'desc')->where([['en_title', '<>', ''], ['en_content', '<>', ''], ['en_preview', '<>', '']])->limit(3)->get();
            $toolNews = ToolNews::orderBy('created_at', 'desc')->where([['en_title', '<>', ''], ['en_content', '<>', ''], ['en_preview', '<>', '']])->limit(6)->get();
        }
        // 根據建立時間是否在7天內,是的話顯示NEW!
        foreach ($news as $data) {
            $data->showNew = $this->newCheck($data->created_at);
        }
        // 根據建立時間是否在7天內,是的話顯示NEW!
        foreach ($toolNews as $data) {
            $data->showNew = $this->newCheck($data->created_at);
        }
        return view('front.index', compact('news', 'toolNews'))->with('website', '');
    }


    public function news($local = 'zhtw')
    {
        Session::put('local', $local);
        //英文資料為空不拿
        if ($local == 'zhtw') {
            $news = IronmanNews::orderBy('created_at', 'desc')->limit(9)->get();
        } else {
            $news = IronmanNews::orderBy('created_at', 'desc')->where([['en_title', '<>', ''], ['en_content', '<>', ''], ['en_preview', '<>', '']])->limit(9)->get();
        }
        // 根據建立時間是否在7天內,是的話顯示NEW!
        foreach ($news as $data) {
            $data->showNew = $this->newCheck($data->created_at);
        }
        $newsType = IronmanNewsType::get();

        return view('front.list', compact('news', 'newsType'))->with('website', '/ironman');
    }


    public function newsMore(Request $request)
    {
        $frequency = $request->frequency * 9;
        if ($request->local == 'zhtw') {
            if ($request->id == 0) {
                $news = IronmanNews::orderBy('created_at', 'desc')->with('ironmanNewsType')->skip($frequency)->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            } else {
                $news = IronmanNews::orderBy('created_at', 'desc')->where('type_id', $request->id)->with('ironmanNewsType')->skip($frequency)->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            }
        } else {
            if ($request->id == 0) {
                $news = IronmanNews::orderBy('created_at', 'desc')->where([['en_title', '<>', ''], ['en_content', '<>', ''], ['en_preview', '<>', '']])->with('ironmanNewsType')->skip($frequency)->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            } else {
                $news = IronmanNews::orderBy('created_at', 'desc')->where([['en_title', '<>', ''], ['en_content', '<>', ''], ['en_preview', '<>', ''], ['type_id', $request->id]])->with('ironmanNewsType')->skip($frequency)->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            }
        }
    }

    public function newsType(Request $request)
    {
        if ($request->local == 'zhtw') {
            if ($request->id == 0) {
                $news = IronmanNews::orderBy('created_at', 'desc')->with('ironmanNewsType')->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            } else {
                $news = IronmanNews::orderBy('created_at', 'desc')->where('type_id', $request->id)->with('ironmanNewsType')->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            }
        } else {
            if ($request->id == 0) {
                $news = IronmanNews::orderBy('created_at', 'desc')->where([['en_title', '<>', ''], ['en_content', '<>', ''], ['en_preview', '<>', '']])->with('ironmanNewsType')->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            } else {
                $news = IronmanNews::orderBy('created_at', 'desc')->where([['en_title', '<>', ''], ['en_content', '<>', ''], ['en_preview', '<>', ''], ['type_id', $request->id]])->with('ironmanNewsType')->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            }
        }
    }
    public function newsSearch(Request $request)
    {
        $keyword = $request->keyword;
        if ($request->local == 'zhtw') {
            $news = IronmanNews::with('ironmanNewsType')->where('title', 'LIKE', "%{$keyword}%")->orWhere('content', 'like', "%{$keyword}%")->orWhere('keyword', 'like', "%{$keyword}%")->get();
        } else {
            $news = IronmanNews::with('ironmanNewsType')->where('en_title', 'LIKE', "%{$keyword}%")->orWhere('en_content', 'like', "%{$keyword}%")->orWhere('en_keyword', 'like', "%{$keyword}%")->get();
        }
        foreach ($news as $data) {
            $data->showNew = $this->newCheck($data->created_at);
        }
        return $news;
    }
    public function ironmanKeyword($local = 'zhtw', $id,$keyword){
        Session::put('local', $local);
        $news = IronmanNews::orderBy('created_at', 'desc')->limit(9)->get();
        $newsType = IronmanNewsType::get();

        return view('front.list',compact('newsType','news'))->with('website', '/ironman')->with('keyword', $keyword);
    }
    public function toolNews($local = 'zhtw')
    {
        Session::put('local', $local);
        if ($local == 'zhtw') {
            $news = ToolNews::orderBy('created_at', 'desc')->limit(9)->get();
        } else {
            $news = ToolNews::orderBy('created_at', 'desc')->where([['en_title', '<>', ''], ['en_content', '<>', ''], ['en_preview', '<>', '']])->limit(9)->get();
        }
        // 根據建立時間是否在7天內,是的話顯示NEW!
        foreach ($news as $data) {
            $data->showNew = $this->newCheck($data->created_at);
        }
        $newsType = ToolNewsType::get();

        return view('front.toolList', compact('news', 'newsType'))->with('website', '/tool');
    }


    public function toolNewsMore(Request $request)
    {

        $frequency = $request->frequency * 9;
        if ($request->local == 'zhtw') {
            if ($request->id == 0) {
                $news = ToolNews::orderBy('created_at', 'desc')->with('toolNewsType')->skip($frequency)->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            } else {
                $news = ToolNews::orderBy('created_at', 'desc')->where('type_id', $request->id)->with('toolNewsType')->skip($frequency)->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            }
        } else {
            if ($request->id == 0) {
                $news = ToolNews::orderBy('created_at', 'desc')->where([['en_title', '<>', ''], ['en_content', '<>', ''], ['en_preview', '<>', '']])->with('toolNewsType')->skip($frequency)->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            } else {
                $news = ToolNews::orderBy('created_at', 'desc')->where([['en_title', '<>', ''], ['en_content', '<>', ''], ['en_preview', '<>', ''], ['type_id', $request->id]])->with('toolNewsType')->skip($frequency)->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            }
        }
    }

    public function toolNewsType(Request $request)
    {
        if ($request->local == 'zhtw') {
            if ($request->id == 0) {
                $news = ToolNews::orderBy('created_at', 'desc')->with('toolNewsType')->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            } else {
                $news = ToolNews::orderBy('created_at', 'desc')->where('type_id', $request->id)->with('toolNewsType')->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            }
        } else {
            if ($request->id == 0) {
                $news = ToolNews::orderBy('created_at', 'desc')->where([['en_title', '<>', ''], ['en_content', '<>', ''], ['en_preview', '<>', '']])->with('toolNewsType')->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            } else {
                $news = ToolNews::orderBy('created_at', 'desc')->where([['en_title', '<>', ''], ['en_content', '<>', ''], ['en_preview', '<>', ''], ['type_id', $request->id]])->with('toolNewsType')->limit(9)->get();
                // 根據建立時間是否在7天內,是的話顯示NEW!
                foreach ($news as $data) {
                    $data->showNew = $this->newCheck($data->created_at);
                }
                return $news;
            }
        }
    }
    public function newsDetail($local = 'zhtw', $id)
    {
        Session::put('local', $local);
        $data = IronmanNews::find($id);
        $keyword = explode(":", $data->keyword);
        $en_keyword = explode(":", $data->en_keyword);
        $website = '/ironman/' . $id;
        return view('front.insider', compact('data', 'keyword', 'en_keyword', 'website'));
    }
    public function toolNewsDetail($local = 'zhtw', $id)
    {
        Session::put('local', $local);
        $data = ToolNews::find($id);
        $keyword = explode(":", $data->keyword);
        $en_keyword = explode(":", $data->en_keyword);
        $website = '/tool/' . $id;
        return view('front.insider', compact('data', 'keyword', 'en_keyword', 'website'));
    }
    public  function newCheck($created_at, $day = 7)
    {
        if ($created_at->gt(Carbon::now()->subDays($day))) {
            return 'NEW!';
        } else {
            return '';
        }
    }
    public function toolNewsSearch(Request $request)
    {
        // dd($request->all());
        $keyword = $request->keyword;
        if ($request->local == 'zhtw') {
            $news = ToolNews::with('toolNewsType')->where('title', 'LIKE', "%{$keyword}%")->orWhere('content', 'like', "%{$keyword}%")->orWhere('keyword', 'like', "%{$keyword}%")->get();
        } else {
            $news = ToolNews::with('toolNewsType')->where('en_title', 'LIKE', "%{$keyword}%")->orWhere('en_content', 'like', "%{$keyword}%")->orWhere('en_keyword', 'like', "%{$keyword}%")->get();
        }
        foreach ($news as $data) {
            $data->showNew = $this->newCheck($data->created_at);
        }
        return $news;
    }

    public function toolKeyword($local = 'zhtw', $id,$keyword){
        Session::put('local', $local);
        $news = ToolNews::orderBy('created_at', 'desc')->limit(9)->get();
        $newsType = ToolNewsType::get();

        return view('front.toolList',compact('newsType','news'))->with('website', '/tool')->with('keyword', $keyword);
    }
    public function download( $id){
        $data=NewsAuthor::find($id);
        $filePath = storage_path('app/public/' . $data->catalogue_url);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];
        return response()->download($filePath, $data->catalogue_name, $headers);

    }

}
