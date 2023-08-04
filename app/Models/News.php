<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        $news = News::orderBy('id', 'desc')->paginate(5);

        return view('new.index', compact('news'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(): View
    {
        return view('new.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'cid' => 'required',
            'uid' => 'required',
            'status' => 'required',
            'created' => 'required',
            'modified' => 'required'
        ]);

        News::create($request->all());

        return redirect()->route('news.index')->with('success','Post has been created successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show(News $news): View
    {
        return view('new.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(News $news): View
    {
        return view('new.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, News $news): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'connect' => 'required',
            'slug' => 'required',
            'cid' => 'required',
            'uid' => 'required',
            'status' => 'required',
            'created' => 'required',
            'modified' => 'required'
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
