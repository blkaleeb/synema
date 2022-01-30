<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Banners;
use App\Models\Songs;
use App\Models\Tags;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $this->data['banners'] = Banners::orderBy('id', 'ASC')->with("songs")->get();
        $this->data['songs'] = Songs::orderBy('id', 'ASC')->get();

        return view('client.home', $this->data);
    }

    public function blog(Request $request)
    {
        $this->data['articles'] = Article::latest()->with('category')->get();
        $this->data['newArticles'] = Article::orderBy('created_at', 'DESC')->get();
        $this->data['articleCategories'] = ArticleCategory::orderBy('id', 'ASC')->get();
        $articleTag = Tags::all();
        $this->data['tags'] = $articleTag;

        $article = Article::latest()->with("category");

        if ($request->has("search")) {
            $searchValues = $article->where(
                "title",
                "like",
                "%" . $request->search . "%"
            );
            $this->data['articles'] = $searchValues->get();
        }

        // dd($this->data['articleCategories']);

        return view('client.blog', $this->data);
    }

    public function blogShow($id)
    {
        $this->data['article'] = Article::where('id', $id)->first();
        $this->data['newArticles'] = Article::orderBy('created_at', 'DESC')->get();
        $this->data['articleCategories'] = ArticleCategory::orderBy('id', 'ASC')->get();
        $articleTag = Tags::all();
        $this->data['tags'] = $articleTag;

        return view('client.blog-item', $this->data);
    }

    public function song($group)
    {
        if ($group == 'inema') {
            $this->data['newSongs'] = Songs::where('group', 0)->latest()->first();
            $this->data['songs'] = Songs::where('group', 0)->latest()->get();
        } else {
            $this->data['newSongs'] = Songs::where('group', 1)->latest()->first();
            $this->data['songs'] = Songs::where('group', 1)->latest()->get();
        }

        return view('client.songs', $this->data);
    }

    public function songShow($id)
    {
        $this->data['songs'] = Songs::where('id', $id)->first();
        $this->data['newSongs'] = Songs::orderBy('created_at', 'DESC')->get();

        $this->data['allSongs'] = Songs::all();

        // dd($this->data['allSongs']);

        return view('client.songs-item', $this->data);
    }
}
