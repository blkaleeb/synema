<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Songs;
use App\Models\Tags;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['banners'] = Banners::orderBy('id', 'ASC')->paginate(10);
        $this->data['Songs'] = Songs::orderBy('id', 'ASC')->paginate(10);

        return view('admin.banner.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['songs'] = Songs::pluck('title', 'id');

        return view('admin.banner.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Banners();
        $banner->name = $request->name;
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->songs_id = $request->songs;
        $banner->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));
        $banner->description = $request->description;

        $file = $request->input('images');
        for ($i = 0; $i < count($file); $i++) {
            $pathRemoveQuote = trim($file[$i], '"');
            $imagePath = trim(substr($file[$i], strpos($file[$i], "/") + 1), '"');
            $temporaryFile = TemporaryFile::where('filename', $imagePath)->first();
            if ($temporaryFile) {
                if ($i === 0) {
                    $banner->image = 'images/' . $pathRemoveQuote;
                } else if ($i === 1) {
                    $banner->image = 'images/' . $pathRemoveQuote;
                } else if ($i === 2) {
                    $banner->image = 'images/' . $pathRemoveQuote;
                }
                $temporaryFile->delete();
            }
        }

        $banner->save();

        return redirect('admin/banners')->with(['success' => 'Banner berhasil dibuat!']);
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
        $this->data['banner'] = Banners::where('id', $id)->first();

        $this->data['songs'] = Songs::pluck('title', 'id');

        $this->data['songsId'] = $this->data['banner']->songs_id;
        // dd($this->data['songsId']);

        $this->data['tags'] = Tags::pluck('name', 'id');

        return view('admin.banner.form', $this->data);
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
        $banner = Banners::where('id', $id)->first();
        $banner->name = $request->name;
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->songs_id = $request->songs;
        $banner->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));
        $banner->description = $request->description;

        $file = $request->input('images');
        for ($i = 0; $i < count($file); $i++) {
            $pathRemoveQuote = trim($file[$i], '"');
            $imagePath = trim(substr($file[$i], strpos($file[$i], "/") + 1), '"');
            $temporaryFile = TemporaryFile::where('filename', $imagePath)->first();
            if ($temporaryFile) {
                if ($i === 0) {
                    $banner->image = 'images/' . $pathRemoveQuote;
                } else if ($i === 1) {
                    $banner->image = 'images/' . $pathRemoveQuote;
                } else if ($i === 2) {
                    $banner->image = 'images/' . $pathRemoveQuote;
                }
                $temporaryFile->delete();
            }
        }

        $banner->save();

        return redirect('admin/banners')->with(['success' => 'Banner berhasil dibuat!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banners::find($id);
        $banner->delete();

        return redirect('admin/banners')->with(['success' => 'Banner berhasil dihapus!']);
    }
}
