<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorsController extends Controller
{

    public function index()
    {
        $authors=Author::all();
        $authors=Author::orderBy('created_at','desc')->orderBy('id')->paginate(10);
        return view("authors.index" , compact("authors"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("authors.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authors=$request->all();
        if($authorimg=$request->file('image_author')){

            $infoimg=$authorimg->getClientOriginalName();

            $authorimg->move('images', $infoimg);

            $authors['route_image_author']=$infoimg;

        }
        Author::create($authors);

        return redirect("/admin/authors");

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author=Author::findOrFail($id);

        return view("authors.show" , compact("author"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author=Author::findOrFail($id);

        return view("authors.edit", compact("author"));
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
        $authors=Author::findOrFail($id);
        if($authorimg=$request->file('image_author')){

            $infoimg=$authorimg->getClientOriginalName();

            $authorimg->move('images', $infoimg);

            $enter['route_image_author']=$infoimg;

        }

        $authors->update($enter);

        return redirect("/admin/authors");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author=Author::findOrFail($id);
        $author->delete();
        return redirect("/admin/authors");
    }
}
