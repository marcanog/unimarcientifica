<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{

    public function index()
    {
        $contacts=Contact::orderBy('id','desc')->paginate(8);

        return view("admin.contacts.index" , compact("contacts"));

    }

    
    public function create()
    {
        return view('admin.contacts.create');
    }

    
    public function store(Request $request)
    {
        $contact=new Contact;

        /**español**/
        $contact->contact_title=$request->contact_title;
        $contact->contact_text=$request->contact_text;

        /**english**/
        $contact->en_contact_title=$request->en_contact_title;
        $contact->en_contact_text=$request->en_contact_text;


        $contact->save(); 

        return redirect("/admin/contact");
    }

    
    public function show($id)
    {
        $contact=Contact::findOrFail($id);

        return view("contacts.show" , compact("contact"));
    }

    
    public function edit($id)
    {
        $contact=Contact::findOrFail($id);

        return view("admin.contacts.edit" , compact("contact"));
    }

   
    public function update(Request $request, $id)
    {
        $contact=Contact::findOrFail($id);

        $contact->update($request->all());

        return redirect("/admin/contact");
    }

    
    public function destroy($id)
    {
        $contact=Contact::findOrFail($id);

        $contact->delete();

        return redirect("/admin/contact");
    }
}
