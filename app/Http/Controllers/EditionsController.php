<?php

namespace App\Http\Controllers;

use App\Edition;
use Illuminate\Http\Request;
use App\Http\Requests\EditionRequest;

class EditionsController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $editions=Edition::all();
        $editions=Edition::orderBy('id')->paginate(15);
        return view("editions.index", compact("editions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        return view("editions.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $enter=$request->all();

        //carga de imagen de articulo en español
        if($editionimg=$request->file('edition_image')){

            $imges=$editionimg->getClientOriginalName();

            $editionimg->move('images', $imges);

            $enter['edition_route_image']=$imges;

        }


        //carga de archivo de articulo en español
        if($archivoedition=$request->file('edition_full_file')){

            $fileedit=$archivoedition->getClientOriginalName();

            $archivoedition->move('files', $fileedit);

            $enter['edition_route_full_file']=$fileedit;

        }

        Edition::create($enter);

        return redirect("/admin/editions");

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editions=Edition::findOrFail($id);
        return view("editions.show" , compact("editions"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editions=Edition::findOrFail($id);

        return view("editions.edit" , compact("editions"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $enter=$request->all();

        $editions=Edition::findOrFail($id);

        //carga de imagen de articulo en español
        if($editionimg=$request->file('edition_image')){

            $imges=$editionimg->getClientOriginalName();

            $editionimg->move('images', $imges);

            $enter['edition_route_image']=$imges;

        }

        //carga de archivo de articulo en español
        if($archivoedition=$request->file('edition_full_file')){

            $fileedit=$archivoedition->getClientOriginalName();

            $archivoedition->move('files', $fileedit);

            $enter['edition_route_full_file']=$fileedit;

        }

        $editions->update($enter);

        return redirect("/admin/editions");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editions=Edition::findOrFail($id);

        $editions->delete();

        return redirect("/admin/editions");
    }
}
