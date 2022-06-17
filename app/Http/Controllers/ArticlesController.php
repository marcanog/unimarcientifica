<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use App\Edition;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{

    public function index()
    {
        $articles=Article::all();
        $articles=Article::orderBy('id')->paginate(10);
        $authors=Author::all();

        return view("articles.index" , compact("articles", "authors"));
    }

    public function create()
    {
        $editions=Edition::all();
        $authors=Author::all();
        return view('articles.create', compact("editions", "authors"));
    }

    public function seccion($seccion){
        $articles=Article::all();
        $authors=Author::all();
        $editions=Edition::all();
        $articles=Article::where('section',$seccion)->paginate(10);
        return view("articulos" , compact("articles","editions", "authors"));
    }

    public function store(ArticleRequest $request)
    {
        $enter=$request->all();
        $enter['slug'] = str_slug($enter['title']);

        //carga de imagen de articulo en español
        if($archivoimges=$request->file('image')){

            $infoimges=$archivoimges->getClientOriginalName();

            $archivoimges->move('images', $infoimges);

            $enter['ruta_image']=$infoimges;

        }


        //carga de archivo de articulo en español
        if($archivofilees=$request->file('file')){

            $infofilees=$archivofilees->getClientOriginalName();

            $archivofilees->move('files', $infofilees);

            $enter['ruta_file']=$infofilees;

        }

        Article::create($enter);

        return redirect("/admin/article/");
    }

    public function show($article){

        $article=Article::with(['comment','comment.user'])->where('slug',$article)->first();

        return view("articles.show" , compact("article", "editions", "authors"));

    }

    public function edit($id)
    {
        $article=Article::findOrFail($id);
        $editions=Edition::all();
        $authors=Author::all();
        return view("articles.edit" , compact("article","editions", "authors"));
    }

    public function update(Request $request, $id)
    {
        $enter=$request->all();
        $article=Article::findOrFail($id);
        $enter['slug'] = str_slug($enter['title']);

        //carga de imagen de articulo en español
        if($archivoimges=$request->file('image')){
            $infoimges=$archivoimges->getClientOriginalName();

            $archivoimges->move('images', $infoimges);

            $enter['ruta_image']=$infoimges;

        }

        //carga de archivo de articulo en español
        if($archivofilees=$request->file('file')){

            $infofilees=$archivofilees->getClientOriginalName();

            $archivofilees->move('files', $infofilees);

            $enter['ruta_file']=$infofilees;

        }

        $article->update($enter);

        return redirect("/admin/article");
    }

    public function destroy(Article $article){
        $article->delete();
        return redirect("/admin/article");
    }
}
