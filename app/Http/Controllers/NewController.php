<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Filters\PostFilter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request): View
    {
        $news = News::latest()->paginate(10);

        return view('new.index', compact('news'))
            ->with('i', (request()->input('page', 1) -1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(): View
    {
        $data = Category::all();
        return view('new.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => '',
            'cid' => 'required',
            'uid' => '',
            'status' => 'required',
            'timestamps' => ''
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        News::create($request->all());

        return redirect()->route('news.index')->with('success','Post has been created successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show(News $news): View
    {
        return view('new.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(News $news): View
    {
        $data = Category::all();
        return view('new.edit',['data'=>$data],compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, News $news): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => '',
            'cid' => 'required',
            'uid' => '',
            'status' => 'required',
            'timestamps' => ''
        ]);

        $news->update($request->all());

        return redirect()->route('news.index')
            ->with('success','Post Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return redirect()->route('news.index')
            ->with('success','Post has been deleted successfully');
    }
}


