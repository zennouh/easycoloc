<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $user = auth()->user();


        $colocation = $user->colocations()
            ->with([
                "categories" => function ($query) {
                    $query->with('expenses')
                        ->withCount('expenses')
                        ->withSum('expenses as total', 'amount');
                }
            ])
            ->withCount(['categories', 'expenses'])
            ->orderBy('name')
            ->first();



        // dd($colocation->toArray());

        return view('categories', compact('colocation'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'colocation_id' => 'required|exists:colocations,id',
        ]);

        $category = Category::create($data);

        // dd($category->toArray());

        return back()->with('success', 'Category created successfully');
    }




}
