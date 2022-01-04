<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ComproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['contacts'] = Contact::all()->first();

        return view('admin.compro.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|unique:contact'
        ]);

        $contacts = new Contact();
        $contacts->phone_number = $request->phone_number;
        $contacts->address = $request->address;
        $contacts->email = $request->email;
        $contacts->instagram = $request->instagram;
        $contacts->spotify = $request->spotify;
        $contacts->facebook = $request->facebook;
        $contacts->twitter = $request->twitter;

        $contacts->save();


        return redirect('admin/compro')->with(['success' => 'Berhasil menyimpan data!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $request->validate([
            'address' => 'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $contacts = Contact::where('id', $id)->first();
        $contacts->phone_number = $request->phone_number;
        $contacts->address = $request->address;
        $contacts->email = $request->email;
        $contacts->instagram = $request->instagram;
        $contacts->spotify = $request->spotify;
        $contacts->facebook = $request->facebook;
        $contacts->twitter = $request->twitter;

        $contacts->save();


        return redirect('admin/compro')->with(['success' => 'Berhasil menyimpan data!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
