<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Material;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->paginate(5);

        return view('admin.admin_products', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $materials = Material::all();
        return view('admin.product_create', ['categories'=>$categories, 'materials'=>$materials]);
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
            'prod_name' => 'required|max:25',
            'prod_firm' => 'required|max:25',
            'prod_code' => 'required|unique:products',
            'cost' => 'required',
            'category' => 'required',
            'material' => 'required',
            'prod_description' => 'required',
            'image' => 'file|image|required'
        ];
        $messages = [
            'required' => 'Все поля формы должны быть заполнены!',
            'unique' => 'ЧПУ-код товара должен быть уникальным!',
            'max' => 'Размеры полей не должны превышать установленного значения!',
            'image' => 'Файл должен быть изображением с форматом jpeg, png, bmp, gif или svg!'
        ];
        $this->validate($request, $rules, $messages);

        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $imagePath = 'img/products';

        Product::create([
            'prod_name' => $request->prod_name,
            'prod_firm' => $request->prod_firm,
            'prod_code' => $request->prod_code,
            'prod_description' => $request->prod_description,
            'cost' => $request->cost,
            'preview' => '/'.$imagePath .'/'. $imageName,
            'category_id' => $request->category,
            'material_id' => $request->material
        ]);

        $image->move($imagePath, $imageName);

        return view('admin.product_store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('category', 'material')->where('id', $id)->first();

        return view('admin.product_show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $materials = Material::all();

        return view('admin.product_edit', [
            'product'=>$product,
            'categories'=>$categories,
            'materials'=>$materials
        ]);
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
            'prod_name' => 'required|max:25',
            'prod_firm' => 'required|max:25',
            'prod_code' => 'required|unique:products,id,'. $id,
            'cost' => 'required',
            'category' => 'required',
            'material' => 'required',
            'prod_description' => 'required',
            'image' => 'file|image'
        ];
        $messages = [
            'required' => 'Все поля формы должны быть заполнены!',
            'unique' => 'ЧПУ-код товара должен быть уникальным!',
            'max' => 'Размеры полей не должны превышать установленного значения!',
            'image' => 'Файл должен быть изображением с форматом jpeg, png, bmp, gif или svg!'
        ];
        $this->validate($request, $rules, $messages);

        $product = Product::find($id);

        $product->prod_name = $request->prod_name;
        $product->prod_firm = $request->prod_firm;
        $product->prod_code = $request->prod_code;
        $product->prod_description = $request->prod_description;
        $product->cost = $request->cost;
        $product->category_id = $request->category;
        $product->material_id = $request->material;

        if($request->file('image')){
            $image = $request->file('image');
            $imagePath = 'img/products';
            $imageName = time() . $image->getClientOriginalName();
            $product->preview = '/'.$imagePath .'/'. $imageName;
            $image->move($imagePath, $imageName);
        }

        $product->save();

        return view('admin.product_updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedProduct = Product::find($id);
        unlink(public_path($deletedProduct->preview));
        $deletedProduct->delete();

        return back();
    }
}
