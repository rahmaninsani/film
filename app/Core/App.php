<?php

class App {
  // Properti -> untuk menentukan controller method & param default
  protected $controller = "Home";
  protected $method = "index";
  protected $params = [];

  public function __construct() {
    $url = $this->parseURL();

    // controller
    if($url != null && file_exists("../app/Controllers/" . $url[0] . ".php")) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    require_once "../app/Controllers/" . $this->controller . ".php";
    $this->controller = new $this->controller;

    // method
    if(isset($url[1])) {
      if(method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    // parameter
    if(!empty($url)) {
      $this->params = array_values($url);
    }

    // jalankan controller dan method, serta kirim params jika ada
    // hasil dibawah sama dengan manggil method dengan params ($controller->index(paramsJikAda))
    call_user_func_array([$this->controller, $this->method], $this->params); // untuk ngejalanin controller method dan kirim params

  }

  // Mengambil URL lalu memecah sesuai keinginan kita
  public function parseURL() {
    if(isset($_GET["url"])) {
      $url = rtrim($_GET["url"], '/'); // HAPUS / DI AKHIR (RTRIM -> RIGHT/KANAN)
      $url = filter_var($url, FILTER_SANITIZE_URL); // bersihkan karakter ngaco/dihack
      $url = explode('/', $url); // pecah url menjadi array
      return $url;
    }
  }

}