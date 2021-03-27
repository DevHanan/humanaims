<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactMsgType;
use App\Http\Requests\ContactTypeRequest;


class ContactMsgTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 function __construct() {
        $this->middleware( 'permission:list_contact_msg_types', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:add_contact_msg_types', [ 'only' => [ 'create','store'] ] );
        $this->middleware( 'permission:replay_contacts', [ 'only' => [ 'edit','update'] ] );
        $this->middleware( 'permission:delete_contact_msg_types', [ 'only' => [ 'destory'] ] );
    }

    public function index()
    {
        $contacts= ContactMsgType::latest()->get();
         return view('dashboard.ContactMsgType.index', compact('contacts'));
    }

      public function create()
    {
        return view('dashboard.ContactMsgType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(ContactTypeRequest $request)
    {

        $contact = ContactMsgType::create($request->all());
        
        toast(__('back.ContactMsgType Added successfully'),'success');
        return redirect(route('system.contacttypes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $contact = ContactMsgType::findOrFail($id);
        return view('dashboard.ContactMsgType.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $contact = ContactMsgType::findOrFail($id);
        return view('dashboard.ContactMsgType.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,LineRequest $request)
    {

        $contact = ContactMsgType::find($id);
        $contact->fill($request->all())->save();
        toast(__('back.ContactMsgType Edited successfully'),'success');
        return redirect(route('system.contacttypes.index'));
    }

   
    public function destroy($id)
    {
        
        $contact= ContactMsgType::findOrFail($id);
        $contact->delete();
        toast(__('back.ContactMsgType Deleted successfully'),'success');
        return redirect(route('system.contacttypes.index'));
    }
}
