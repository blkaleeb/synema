<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Songs;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use DB;
use Auth;
use Session;

class SongsController extends Controller
{

    public function __construct()
    {
        $this->data['group'] = Songs::group();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['songs'] = Songs::orderBy('title', 'ASC')->paginate(10);
        return view('admin.songs.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.songs.form', $this->data);
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
            'title' => 'required|unique:songs|max:255',
            'artists' => 'required',
            'description' => 'required',
            'genre' => 'required',
        ]);

        $songs = new Songs();
        $songs->title = $request->title;
        $songs->artists = $request->artists;
        $songs->genre = $request->genre;
        $songs->description = $request->description;
        $songs->likes = 0;
        $songs->group = $request->group;
        $songs->slug = Str::slug($request->title);

        $file = $request->input('images');
        // dd($file);
        for ($i = 0; $i < count($file); $i++) {
            $pathRemoveQuote = trim($file[$i], '"');
            $imagePath = trim(substr($file[$i], strpos($file[$i], "/") + 1), '"');
            $temporaryFile = TemporaryFile::where('filename', $imagePath)->first();
            if ($temporaryFile) {
                if ($i === 0) {
                    $songs->song = $pathRemoveQuote;
                } else if ($i === 1) {
                    $songs->song = $pathRemoveQuote;
                } else if ($i === 2) {
                    $songs->song = $pathRemoveQuote;
                }
                $temporaryFile->delete();
            }
        }
        $file1 = $request->input('thumbnail');
        for ($i = 0; $i < count($file1); $i++) {
            $pathRemoveQuote = trim($file1[$i], '"');
            $substr = "/";
            $pathRemoveQuote = str_replace($substr, $substr . 'thumbnail/', $pathRemoveQuote);
            $imagePath = trim(substr($file1[$i], strpos($file1[$i], "/") + 1), '"');
            $temporaryFile = TemporaryFile::where('filename', $imagePath)->first();
            if ($temporaryFile) {
                if ($i === 0) {
                    $songs->image = $pathRemoveQuote;
                } else if ($i === 1) {
                    $songs->image = $pathRemoveQuote;
                } else if ($i === 2) {
                    $songs->image = $pathRemoveQuote;
                }
                $temporaryFile->delete();
            }
        }


        $songs->save();

        return redirect('admin/songs')->with(['success' => 'Lagu berhasil disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data['songs'] = Songs::where('id', $id)->get();

        // return view('admin.songs.form', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['songs'] = Songs::where('id', $id)->first();

        return view('admin.songs.form', $this->data);
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
            'artists' => 'required',
            'genre' => 'required',
        ]);

        // dd($request);

        $songs = Songs::where('id', $id)->first();
        $songs->title = $request->title;
        $songs->artists = $request->artists;
        $songs->genre = $request->genre;
        $songs->description = $request->description;
        $songs->likes = 0;
        $songs->group = $request->group;
        $songs->slug = Str::slug($request->title);

        $file = $request->input('images');
        // dd($file);
        for ($i = 0; $i < count($file); $i++) {
            $pathRemoveQuote = trim($file[$i], '"');
            $imagePath = trim(substr($file[$i], strpos($file[$i], "/") + 1), '"');
            $temporaryFile = TemporaryFile::where('filename', $imagePath)->first();
            if ($temporaryFile) {
                if ($i === 0) {
                    $songs->song = $pathRemoveQuote;
                } else if ($i === 1) {
                    $songs->song = $pathRemoveQuote;
                } else if ($i === 2) {
                    $songs->song = $pathRemoveQuote;
                }
                $temporaryFile->delete();
            }
        }
        $file1 = $request->input('thumbnail');
        for ($i = 0; $i < count($file1); $i++) {
            $pathRemoveQuote = trim($file1[$i], '"');
            $substr = "/";
            $pathRemoveQuote = str_replace($substr, $substr . 'thumbnail/', $pathRemoveQuote);
            $imagePath = trim(substr($file1[$i], strpos($file1[$i], "/") + 1), '"');
            $temporaryFile = TemporaryFile::where('filename', $imagePath)->first();
            if ($temporaryFile) {
                if ($i === 0) {
                    $songs->image = $pathRemoveQuote;
                } else if ($i === 1) {
                    $songs->image = $pathRemoveQuote;
                } else if ($i === 2) {
                    $songs->image = $pathRemoveQuote;
                }
                $temporaryFile->delete();
            }
        }


        $songs->save();

        return redirect('admin/songs')->with(['success' => 'Lagu berhasil diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $songs = Songs::find($id);
        $songs->delete();

        return redirect('admin/songs')->with(['success' => 'Lagu berhasil dihapus!']);
    }
}
