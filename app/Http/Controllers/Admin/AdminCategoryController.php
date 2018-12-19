<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin.admin_categories', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'cat_name' => 'required|max:25',
            'cat_code' => 'required|unique:categories',
        ];
        $messages = [
            'required' => 'Все поля формы должны быть заполнены!',
            'unique' => 'ЧПУ-код категории должен быть уникальным!',
            'max' => 'Размеры полей не должны превышать установленного значения!',
        ];
        $this->validate($request, $rules, $messages);

        Category::create([
            'cat_name' => $request->cat_name,
            'cat_code' => $request->cat_code,
        ]);

        return view('admin.category_store');
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
        $category = Category::find($id);

        return view('admin.category_edit', ['category'=>$category]);
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
        $rules = [
            'cat_name' => 'required|max:25',
            'cat_code' => 'required|unique:categories,id,'. $id,
        ];
        $messages = [
            'required' => 'Все поля формы должны быть заполнены!',
            'unique' => 'ЧПУ-код товара должен быть уникальным!',
            'max' => 'Размеры полей не должны превышать установленного значения!',
        ];
        $this->validate($request, $rules, $messages);

        $category = Category::find($id);

        $category->cat_name = $request->cat_name;
        $category->cat_code = $request->cat_code;
        $category->save();

        return view('admin.category_updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedCategory = Category::find($id);
        $deletedCategory->delete();

        return back();
    }
}
