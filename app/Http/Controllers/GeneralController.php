<?php

namespace App\Http\Controllers;

use App\Author;
use App\Article;
use App\Edition;
use App\Information;
use App\About;
use App\Comment;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        $edition= Edition::orderBy('id', 'desc')->get()->first();
        if ($edition){
            $articles = Article::where('edition_id', (int) $edition->id)->orderBy('id','asc')->limit(10)->get();
        }else{
            $articles = [];
        }
        $articlesData = [];
        foreach ($articles as $article){
            $article->author = Author::where('id', (int) $article->author_id)->get()->first();
            $articlesData[] = $article;
        }
//        echo(json_encode($articlesData[0]->author,JSON_PRETTY_PRINT));
//        die();
        $articles = $articlesData;
        return view('/welcome',compact('articles', 'edition'));
	}

    public function arti($slug){
        $article = Article::where('slug',$slug)->get()->first();
        $article->author = Author::where('id', (int) $article->author_id)->get()->first();
        return view('/articulos',compact('article'));
    }

    public function authors(){
        $authors=Author::with(['articles'])->orderBy('name_author')->get();
        return view('/authorsCatalog',compact('authors'));
    }

    public function show($slug){
        $authors=Author::orderBy('id', 'desc')->take(1)->get();
        $article=Article::with(['comment','comment.user'])->where('slug',$slug)->first();
        return view("/art", compact('article', 'authors'));

    }

    public function informacion(){
        $information=Information::all();
        return view('/informacion',compact('information'));
    }

    public function edicion(){
        $editions=Edition::orderBy('id', 'desc')->paginate(10);
        return view('/edicion', compact('editions'));
    }
    public function fulledicion($id){
        $editions=Edition::where('id', (int) $id)->with(['articles'])->get()->first();
       // dd($editions->articles);
       // $editions->article = Article::where('edition_id', (int) $edition->id)->orderBy('id','asc')->limit(10)->get();
        return view('/fulledition', compact('editions'));
    }

    public function sobre(){
        $abouts=About::all();
        return view('/sobrenosotros',compact('abouts'));
    }

	public function setlocale($locale){
        \App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function search(Request $request){
        $search_text = $_GET['query'];
        $articles = Article::where('title', 'LIKE', '%'.$search_text.'%')
            ->orWhere('en_title', 'LIKE', '%'.$search_text.'%')
            ->paginate(10);
        $authors = Author::where('name_author', 'LIKE', '%'.$search_text.'%')
            ->paginate(10);

        return view('/search', compact('articles','authors'));
    }

    public function store(Request $request)
    {
        $this->validate($request, array(

            'comment' => 'required|min:5|max:2000'
        ));

        if(Auth::user()->id== $id){
        $user = User::find($id);
        $article = Article::find($article_id);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->article()->associate($id);
        $comment->user()->associate($id);

        $comment->save();

        }
        return redirect()->route('/art/{article}', [$article->id]);
    }
}
