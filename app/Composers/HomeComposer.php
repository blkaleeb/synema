<?php

namespace App\Composers;

use App\Models\Contact;

class HomeComposer
{

  private $compro;

  public function __construct()
  {
    $this->compro = Contact::get()->first();
  }

  public function compose($view)
  {
    $compro = $this->compro;

    $view->with('compro', $compro);
  }
}
