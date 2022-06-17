<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutsController extends Controller
{
    
    public function index()
    {
        $abouts=About::orderBy('id','desc')->paginate(8);

        return view("admin.abouts.index" , compact("abouts"));
    }

   
    public function create()
    {
         return view('admin.abouts.create');
    }

    
    public function store(Request $request)
    {
        $about=new About;

        /**español**/
        $about->about_title=$request->about_title;
        $about->about_text=$request->about_text;

        

        /**english**/
        $about->en_about_title=$request->en_about_title;
        $about->en_about_text=$request->en_about_text;

        

        $about->save();

        return redirect("/admin/about"); 
    }

    
    public function show($id)
    {
        $about=About::findOrFail($id);

        return view("abouts.show" , compact("about"));

    }

    
    public function edit($id)
    {
        $about=About::findOrFail($id);

        return view("admin.abouts.edit" , compact("about"));
    }


    
    public function update(Request $request, $id)
    {
        $about=About::findOrFail($id);

        $about->update($request->all());

        return redirect("/admin/about");
    }

    
    public function destroy($id)
    {
        $about=About::findOrFail($id);

        $about->delete();

        return redirect("/admin/about");
    }
}
