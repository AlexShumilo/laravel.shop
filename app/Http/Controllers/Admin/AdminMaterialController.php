<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Material;

class AdminMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::paginate(5);

        return view('admin.admin_materials', ['materials'=>$materials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.material_create');
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
            'mat_name' => 'required|max:25',
            'mat_code' => 'required|unique:materials',
        ];
        $messages = [
            'required' => 'Все поля формы должны быть заполнены!',
            'unique' => 'ЧПУ-код материала должен быть уникальным!',
            'max' => 'Размеры полей не должны превышать установленного значения!',
        ];
        $this->validate($request, $rules, $messages);

        Material::create([
            'mat_name' => $request->mat_name,
            'mat_code' => $request->mat_code,
        ]);

        return view('admin.material_store');
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
        $material = Material::find($id);

        return view('admin.material_edit', ['material'=>$material]);
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
            'mat_name' => 'required|max:25',
            'mat_code' => 'required|unique:materials',
        ];
        $messages = [
            'required' => 'Все поля формы должны быть заполнены!',
            'unique' => 'ЧПУ-код материала должен быть уникальным!',
            'max' => 'Размеры полей не должны превышать установленного значения!',
        ];
        $this->validate($request, $rules, $messages);

        $material = Material::find($id);

        $material->mat_name = $request->mat_name;
        $material->mat_code = $request->mat_code;
        $material->save();

        return view('admin.material_updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedMaterial = Material::find($id);
        $deletedMaterial->delete();

        return back();
    }
}
