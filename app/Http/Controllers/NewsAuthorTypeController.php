<?php

namespace App\Http\Controllers;

use App\NewsAuthor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class NewsAuthorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $newsTypes = ToolNewsType::with('toolNews')->get();
        // $newsTypes =IronmanNewsType::get();
        $newsAuthors = NewsAuthor::get();

        return view('admin.news_authors.index', compact('newsAuthors'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.news_authors.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (NewsAuthor::find($request->id)) {
            return redirect('/admin/news_author');
        }
        $NewsAuthor = new NewsAuthor(array(
            'name' => $request->get('name'),
            'en_name'  => $request->get('en_name'),
            'company'  => $request->get('company'),
            'en_company'  => $request->get('en_company'),
            'companySummary'  => $request->get('companySummary'),
            'en_companySummary'  => $request->get('en_companySummary'),
            'companyWebsite'  => $request->get('companyWebsite'),
            'catalogue_url'  => Storage::disk('public')->put('/files', $request->catalogue),
            'catalogue_name'  => $request->file('catalogue')->getClientOriginalName(),

        ));
        $NewsAuthor->save();
        return redirect('/admin/news_author');
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
        $newsAuthor = NewsAuthor::find($id);

        return view('admin.news_authors.edit', compact('newsAuthor'));
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
        $NewsAuthor = NewsAuthor::find($id);
        $NewsAuthor->name = $request->name;
        $NewsAuthor->en_name = $request->en_name;
        $NewsAuthor->company = $request->company;
        $NewsAuthor->en_company = $request->en_company;
        $NewsAuthor->companySummary = $request->companySummary;
        $NewsAuthor->en_companySummary = $request->en_companySummary;
        $NewsAuthor->companyWebsite = $request->companyWebsite;

        if ($request->hasfile('catalogue')) {
            if (Storage::disk('public')->exists($NewsAuthor->catalogue_url)) {
                Storage::disk('public')->delete($NewsAuthor->catalogue_url);
            }
            $NewsAuthor->catalogue_url = Storage::disk('public')->put('/files', $request->catalogue);
            $NewsAuthor->catalogue_name = $request->file('catalogue')->getClientOriginalName();
        }
        $NewsAuthor->save();

        // dd($NewsAuthor);
        // NewsAuthor::find($id)->update($NewsAuthor);

        return redirect('/admin/news_author');
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

        if (NewsAuthor::find($request->id)) {
            NewsAuthor::find($request->id)->delete();
        }
        return redirect('/admin/news_author');
    }
}
