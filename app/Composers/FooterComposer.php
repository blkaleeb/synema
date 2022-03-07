<?php

namespace App\Composers;

use App\Models\Contact;
use App\Models\Songs;

class FooterComposer
{

  private $allsongs;

  public function __construct()
  {
    $this->allsongs = Songs::all()->take(5);
  }

  public function compose($view)
  {
    $allsongs = $this->allsongs;

    $view->with('allsongs', $allsongs);
  }
}
