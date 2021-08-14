<?php

class App {
  protected $controller = "Home";
  protected $method = "index";
  protected $params = [];

  public function __construct() {
    $url = $this->parseURL();

    // Controller
    if($url != null && file_exists("../app/Controllers/" . $url[0] . ".php")) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    require_once "../app/Controllers/" . $this->controller . ".php";
    $this->controller = new $this->controller;

    // Method
    if(isset($url[1])) {
      if(method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    // Params
    if(!empty($url)) {
      $this->params = array_values($url);
    }

    // Jalankan controller dan method, serta kirim params jika ada
    call_user_func_array([$this->controller, $this->method], $this->params);

  }

  // Mengambil URL lalu memecah sesuai keinginan kita
  public function parseURL() {
    if(isset($_GET["url"])) {
      $url = rtrim($_GET["url"], '/'); // Hapus '/' di akhir (rtrim -> right/kanan)
      $url = filter_var($url, FILTER_SANITIZE_URL); // Bersihkan karakter berbahaya
      $url = explode('/', $url); // Pecah url menjadi array
      return $url;
    }
  }

}

?>