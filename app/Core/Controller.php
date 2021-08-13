<?php

// namespace App\Controllers;

class Controller 
{
  public function view($view, $data = []) {
    require_once "../app/Views/" . $view . ".php";
  }

}
