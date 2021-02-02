<?php

namespace App\Http\Controllers;

use App\ToolNews;
use App\NewsAuthor;
use App\ToolNewsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ToolNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $newsAuthors = NewsAuthor::get();
        $newsTypes = ToolNewsType::get();
        $news = ToolNews::get();
        return view('admin.tool_news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $newsAuthors = NewsAuthor::get();
        $newsTypes = ToolNewsType::get();
        return view('admin.tool_news.create', compact('newsTypes', 'newsAuthors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $news = ToolNews::create($request->all());
        if ($request->hasFile('img')) {

            // $filePath = $request->file('img')->store('images','public');
            // $filePath = Storage::putFile('images', $request->file('img'));

            $filePath = Storage::disk('public')->put('/images', $request->file('img'));

            // $news->img='/storage/'.$filePath;
            // 跟下面那行一樣

            $news->img = Storage::url($filePath);
            $news->save();
        } else {
            $news->img = '/images/none.jpg';
            $news->save();
        }

        return redirect('/admin/toolnews');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $newsAuthors = NewsAuthor::get();
        $newsTypes = ToolNewsType::get();
        $news = ToolNews::find($id);
        return view('admin.tool_news.edit', compact('news', 'newsTypes', 'newsAuthors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        //
        // ToolNews::find($id)->update($request->all());
        $news = ToolNews::find($id);
        $news->author_id = $request->author_id;
        $news->type_id = $request->type_id;
        $news->title = $request->title;
        $news->en_title = $request->en_title;
        $news->preview = $request->preview;
        $news->en_preview = $request->en_preview;
        $news->content = $request->content;
        $news->en_content = $request->en_content;
        $news->keyword = $request->keyword;
        $news->en_keyword = $request->en_keyword;
        $news->date = $request->date;
        if ($request->hasfile('img')) {
            if (file_exists(public_path() . $news->img)) {
                File::delete(public_path() . $news->img);
            }
            $filePath = Storage::disk('public')->put('/images', $request->file('img'));
            $news->img = Storage::url($filePath);
        }
        $news->save();


        return redirect('/admin/toolnews');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

        if (ToolNews::find($request->id)) {
            $news = ToolNews::find($request->id);
            if (file_exists(public_path() . $news->img)) {
                File::delete(public_path() . $news->img);
            }
            ToolNews::find($request->id)->delete();
        }

        return redirect('/admin/toolnews');
    }
}
