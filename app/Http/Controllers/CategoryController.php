<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);

        return view('category.index', compact('categories'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(): View
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => '',
        ]);


        Category::create($request->all());

        return redirect()->route('categories.index')->with('success','Category has been created successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show(Category $category): View
    {
        return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Category $category): View
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => '',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success','Category Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success','Category has been deleted successfully');
    }
}

