<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;
use App\Http\Requests\InformationRequest;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information=Information::all();
        $information=Information::orderBy('created_at','desc')->orderBy('id')->paginate(15);
        return view("information.index" , compact("information"));
    }
    public function create()
    {
        return view("information.create");
    }
    public function store(Request $request)
    {
        $enter=$request->all();
        //carga de imagen de articulo en español
        if($archivoinfo=$request->file('info_file')){

        $infoes=$archivoinfo->getClientOriginalName();

        $archivoinfo->move('files', $infoes);

        $enter['ruta_info_file']=$infoes;

    }

    //carga de imagen de articulo en español
    if($archivoinfoen=$request->file('info_en_file')){

        $infoen=$archivoinfoen->getClientOriginalName();

        $archivoinfoen->move('files', $infoen);

        $enter['ruta_info_en_file']=$infoen;

    }

        Information::create($enter);

        return redirect("/admin/information/");
    }

    public function show($id)
    {
        $information=Information::findOrFail($id);

        return view("information.show" , compact("information"));
    }

    public function edit($id)
    {
        $information=Information::findOrFail($id);

        return view("information.edit" , compact("information"));
    }

    public function update(Request $request, $id)
    {
        $information=Information::findOrFail($id);

        $information->update($request->all());

        return redirect("/admin/information");
    }

    public function destroy($id)
    {
        $information=Information::findOrFail($id);
        $information->delete();
        return redirect("/admin/information");
    }
}
