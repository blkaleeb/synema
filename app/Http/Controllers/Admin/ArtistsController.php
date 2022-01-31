<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Carbon\Carbon;

class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['artists'] = Artist::orderBy('id', 'ASC')->paginate(10);

        return view('admin.artist.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artist = new Artist();
        $artist->name = $request->name;
        $artist->role = $request->role;
        $artist->description = $request->description;

        $file = $request->input('images');
        for ($i = 0; $i < count($file); $i++) {
            $pathRemoveQuote = trim($file[$i], '"');
            $imagePath = trim(substr($file[$i], strpos($file[$i], "/") + 1), '"');
            $temporaryFile = TemporaryFile::where('filename', $imagePath)->first();
            if ($temporaryFile) {
                if ($i === 0) {
                    $artist->image = 'images/' . $pathRemoveQuote;
                } else if ($i === 1) {
                    $artist->image = 'images/' . $pathRemoveQuote;
                } else if ($i === 2) {
                    $artist->image = 'images/' . $pathRemoveQuote;
                }
                $temporaryFile->delete();
            }
        }

        $artist->save();

        return redirect('admin/artists')->with(['success' => 'Penambahan artist berhasil!']);
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
        $this->data['artists'] = Artist::where('id', $id)->first();

        return view('admin.artist.form', $this->data);
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
        $artist = Artist::where('id', $id)->first();
        $artist->name = $request->name;
        $artist->role = $request->role;
        $artist->description = $request->description;
        $file = $request->input('images');
        for ($i = 0; $i < count($file); $i++) {
            $pathRemoveQuote = trim($file[$i], '"');
            $imagePath = trim(substr($file[$i], strpos($file[$i], "/") + 1), '"');
            $temporaryFile = TemporaryFile::where('filename', $imagePath)->first();
            if ($temporaryFile) {
                if ($i === 0) {
                    $artist->image = 'images/' . $pathRemoveQuote;
                } else if ($i === 1) {
                    $artist->image = 'images/' . $pathRemoveQuote;
                } else if ($i === 2) {
                    $artist->image = 'images/' . $pathRemoveQuote;
                }
                $temporaryFile->delete();
            }
        }

        $artist->save();

        return redirect('admin/artists')->with(['success' => 'Perubahan artist berhasil!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::find($id);
        $artist->delete();

        return redirect('admin/artists')->with(['success' => 'Artists berhasil dihapus!']);
    }
}
