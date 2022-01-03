<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Links;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function index()
    {
        $this->data['links'] = Links::orderBy('name', 'ASC')->paginate(10);

        // dd($data['countMainslide']);

        return view("admin.links.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.links.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $links = new Links();
        $links->name = $request->name;
        $links->description = $request->description;
        $links->keywords = $request->keywords;
        $links->script = $request->script;
        $links->save();

        return redirect('admin/links')->with(['success' => 'Link berhasil disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["links"] = Link::where("id", $id)->first();

        return view("admin.links.form", $data);
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
        $links = Link::where("id", $id)->first();
        $links->name = $request->name;
        $links->description = $request->description;
        $links->keywords = $request->keywords;
        $links->script = $request->script;
        $links->save();

        return redirect()
            ->back()
            ->with([
                "success" => "<strong>Sukses!</strong> Links {$links->name} berhasil diubah",
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input("id");
        $links = Link::find($id);
        $links->delete();

        return redirect()
            ->back()
            ->with([
                "success" => "<strong>Sukses!</strong> links {$links->name} berhasil dihapus",
            ]);
    }
}
