<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;
use App\Models\Tags;
use App\Models\TemporaryFile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['articles'] = Article::orderBy('id', 'ASC')->paginate(10);

        return view('admin.articles.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['tags'] = Tags::pluck('name', 'id');
        $this->data['categories'] = ArticleCategory::pluck('name', 'id');

        return view('admin.articles.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $createdAt =  Carbon::now()->format('d-m-Y');

        // dd($request);

        $article = new Article();
        $article->title = $request->title;
        $article->subtitle = $request->subtitle;
        $article->category_id = $request->category;
        $article->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));
        $article->title = $request->title;
        $article->description = $request->description;

        $file = $request->input('images');
        for ($i = 0; $i < count($file); $i++) {
            $pathRemoveQuote = trim($file[$i], '"');
            $imagePath = trim(substr($file[$i], strpos($file[$i], "/") + 1), '"');
            $temporaryFile = TemporaryFile::where('filename', $imagePath)->first();
            if ($temporaryFile) {
                if ($i === 0) {
                    $article->image = 'images/' . $pathRemoveQuote;
                } else if ($i === 1) {
                    $article->image = 'images/' . $pathRemoveQuote;
                } else if ($i === 2) {
                    $article->image = 'images/' . $pathRemoveQuote;
                }
                $temporaryFile->delete();
            }
        }

        $article->save();

        if (isset($request->tags)) {
            foreach ($request->tags as $tag) {
                $articleTag = new ArticleTag();
                $articleTag->article_id = $article->id;
                $articleTag->tag_id = $tag;
                $articleTag->save();
            }
        }

        return redirect('admin/articles')->with(['success' => 'Artikel berhasil dibuat!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['articles'] = Article::where('id', $id);

        $this->data['tags'] = Tags::pluck('name', 'id');
        $this->data['categories'] = ArticleCategory::pluck('name', 'id');

        return view('admin.articles.form', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['articles'] = Article::where('id', $id)->first();

        $this->data['tags'] = Tags::pluck('name', 'id');
        $this->data['categories'] = ArticleCategory::pluck('name', 'id');

        return view('admin.articles.form', $this->data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('admin/articles')->with(['success' => 'Artikel berhasil dihapus!']);
    }
}
