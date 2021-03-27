<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 function __construct() {
        $this->middleware( 'permission:list_contacts', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:show_contacts', [ 'only' => [ 'show'] ] );
        $this->middleware( 'permission:replay_contacts', [ 'only' => [ 'replay'] ] );
        $this->middleware( 'permission:destory_contacts', [ 'only' => [ 'destory'] ] );
    }

    public function index()
    {
        $contacts= Contact::latest()->get();
         return view('dashboard.contacts.index', compact('contacts'));
    }

   
    public function replay()
    {
        //
    }

   
    public function show($id)
    {
                $contact= Contact::find($id);
         return view('dashboard.contacts.show', compact('contact'));
    }

   
    public function destroy($id)
    {
        
        $contact= Contact::findOrFail($id);
        $contact->delete();
        toast(__('back.Contact Deleted successfully'),'success');
        return redirect(route('system.contacts.index'));
    }
}
