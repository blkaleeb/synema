<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Songs;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $this->data['songs'] = Songs::orderBy('title', 'ASC')->paginate(10);
        return view('admin.songs.index', $this->data);
    }
}
