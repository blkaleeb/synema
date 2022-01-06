<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tags;
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
        $this->data['articles'] = Article::orderBy('parent_id', 'ASC')->paginate(10);

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
        $this->data['tagss'] = Tags::get()->all();

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
        $createdAt =  Carbon::now()->format('d-m-Y');

        $article = new Article();
        $article->title = $request->title;
        $article->subtitle = $request->subtitle;
        $article->category_id = $request->articleCategory;
        $article->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));
        $article->title = $request->title;
        $description = $request->description;
        $dom = new \DomDocument();
        @$dom->loadHtml('<?xml encoding="utf-8" ?>' . $description);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $imgeData = base64_decode($data);
            $image_name = "/upload/article/" . $createdAt . '_' . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        $description = $dom->saveHTML();
        $article->description = $request->description;

        $article->benefits = $request->benefits;
        $article->conclusion = $request->conclusion;

        $file = $request->input('images');
        for ($i = 0; $i < count($file); $i++) {
            $pathRemoveQuote = trim($file[$i], '"');
            $imagePath = trim(substr($file[$i], strpos($file[$i], "/") + 1), '"');
            $temporaryFile = TemporaryFile::where('filename', $imagePath)->first();
            if ($temporaryFile) {
                if ($i === 0) {
                    $article->main_image = 'images/' . $pathRemoveQuote;
                } else if ($i === 1) {
                    $article->first_image = 'images/' . $pathRemoveQuote;
                } else if ($i === 2) {
                    $article->second_image = 'images/' . $pathRemoveQuote;
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
        //
    }
}
