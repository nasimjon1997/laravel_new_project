<?php

namespace App\Http\Controllers;

use App\Models\New;
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
        $news = Post::orderBy('id', 'desc')->paginate(5);

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

        Post::create($request->all());

        return redirect()->route('news.index')->with('success','Post has been created successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show(Post $post): View
    {
        return view('new.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Post $post): View
    {
        return view('new.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Post $post): RedirectResponse
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

        $post->update($request->all());

        return redirect()->route('news.index')
            ->with('success','Post Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('news.index')
            ->with('success','Post has been deleted successfully');
    }
}
