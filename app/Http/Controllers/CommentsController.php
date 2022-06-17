<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use App\User;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{
   
    public function index(){
        $comments = Comment::orderBy('created_at','desc')->orderBy('id')->paginate(8);
        return view('admin.comments.index',compact('comments'));
    }

    public function store(Request $request, $article_id){
        $this->validate($request, array(
            'comment' => 'required|min:5|max:2000'
        ));

        $article = Article::find($article_id);
        $user = User::find(Auth::user()->id);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->approved = false;
        $comment->users_id = $user->id;
        $comment->articles_id = $article->id;

        $comment->save();

        return redirect('/art/'.$article->slug);
    }
    
    public function approved(Comment $comment){
        $comment->approved = true;
        $comment->save();
        return redirect('/admin/comments');
    }

  
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment){
        $comment->delete();
        return redirect('/admin/comments');
    }
}
