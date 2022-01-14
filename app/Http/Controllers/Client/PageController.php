<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Songs;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $this->data['banners'] = Banners::orderBy('id', 'ASC')->with("songs")->get();
        $this->data['songs'] = Songs::orderBy('id', 'ASC')->get();

        return view('client.home', $this->data);
    }
}
