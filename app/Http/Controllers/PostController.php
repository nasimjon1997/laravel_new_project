<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Post;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     */
    public function index(Request $request)
    {
        $post = DB::table('news')
            ->leftJoin('categories', 'news.cid', '=', 'categories.id')
            ->select('news.id', 'news.title as titles', 'news.content', 'news.created', 'categories.title')
            ->orderBy('created', 'desc')
            ->when($request->categories_title, function ($query) use ($request) {
                $query->where('categories_title', $request->categories_title);
            })
            ->paginate(10);

        return view('post.index', compact('post', 'request'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
