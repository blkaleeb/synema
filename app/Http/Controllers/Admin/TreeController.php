<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tree;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['trees'] = Tree::orderBy('judul', 'ASC')->paginate(10);

        // dd($this->data['trees']);

        return view('admin.tree.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tree.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trees = new Tree();
        $trees->judul = $request->judul;
        $trees->link = $request->link;
        $trees->save();

        return redirect('admin/tree')->with(['success' => 'Tombol baru berhasil disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data["tree"] = Tree::where("id", $id)->first();

        return view("admin.tree.form", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["tree"] = Tree::where("id", $id)->first();

        return view("admin.tree.form", $data);
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
        $trees = Tree::where("id", $id)->first();
        $trees->judul = $request->judul;
        $trees->link = $request->link;
        $trees->save();

        return redirect()
            ->back()
            ->with([
                "success" => ">Sukses! Tombol {$trees->judul} berhasil diubah",
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trees = Tree::find($id);
        $trees->delete();

        return redirect()
            ->back()
            ->with([
                "success" => "Sukses! Tombol {$trees->judul} berhasil dihapus",
            ]);
    }
}
