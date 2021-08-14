<?php

use App\Models\MoviesModel;

class Home extends Controller
{
  protected $moviesModel;

  public function __construct()
  {
    $this->moviesModel = new MoviesModel();
  }

  public function index()
  {
    $nowPlaying = $this->moviesModel->getNowPlaying();
    $popular = $this->moviesModel->getPopularMovies();

    for($i = 0; $i < count($popular); $i++) {
      $popular[$i]["overview"] = translate($popular[$i]['overview']);
    } 

    $data = [
      'title' => 'Home',
      'nowPlaying' => $nowPlaying,
      'popular' => $popular,
    ];
    
    $this->view('layout/header', $data);
    $this->view('home/index', $data);
    $this->view('layout/footer');
  }

  
}

?>