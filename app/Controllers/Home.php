<?php

use App\Models\MovieModel;
use App\Models\TranslateModel;

class Home extends Controller
{
  protected 
    $movieModel,
    $translateModel;

  public function __construct()
  {
    $this->movieModel = new MovieModel();
    $this->translateModel = new TranslateModel();
  }

  public function index()
  {
    $nowPlaying = $this->movieModel->getNowPlaying();
    $popular = $this->movieModel->getPopularMovies();

    $data = [
      'title' => 'Home | Film',
      'nowPlaying' => $nowPlaying,
      'popular' => $popular,
    ];
    
    $this->view('layout/header', $data);
    $this->view('home/index', $data);
    $this->view('layout/footer');

  }

  public function detail($id)
  {
    $detail = $this->movieModel->getMovieDetails($id);

    if(! $detail) {
      $data = [
        'title' => 'Detail Film Tidak Ditemukan',
        'message' => "Detail film dengan ID $id tidak ditemukan",
      ];
      
      $this->view('layout/header', $data);
      $this->view('home/404', $data);
      $this->view('layout/footer');

      exit;
    }

    $video = $this->movieModel->getVideos($id);
    $credit = $this->movieModel->getCredits($id);
    $review = $this->movieModel->getReviews($id);
    $recommendation = $this->movieModel->getRecommendations($id);
    
    for($i = 0; $i < count($detail["spoken_languages"]); $i++) {
      $detail["spoken_languages"][$i]["english_name"] = $this->translateModel->translate($detail["spoken_languages"][$i]["english_name"]);
    }

    for($i = 0; $i < count($detail["production_countries"]); $i++) {
      $detail["production_countries"][$i]["name"] = $this->translateModel->translate($detail["production_countries"][$i]["name"]);
    }

    $detail["overview"] = $this->translateModel->translate($detail["overview"]);

    $data = [
      'title' => 'Detail Film',
      'detail' => $detail,
      'video' => $video,
      'credit' => $credit,
      'review' => $review,
      'recommendation' => $recommendation,
    ];
    
    $this->view('layout/header', $data);
    $this->view('home/detail', $data);
    $this->view('layout/footer');

  }

  public function cari()
  {
    if(! isset($_POST['submit'])) {
      header('Location: /');
      exit;
    }

    $results = $this->movieModel->getSearch();

    if(! $results) {
      $data = [
        'title' => 'Film Tidak Ditemukan',
        'message' => "Film " . $_POST['keyword'] . " tidak ditemukan",
      ];
      
      $this->view('layout/header', $data);
      $this->view('home/404', $data);
      $this->view('layout/footer');

      exit;
    }

    $data = [
      'title' => 'Hasil Pencarian Film',
      'results' => $results,
    ];
    
    $this->view('layout/header', $data);
    $this->view('home/cari', $data);
    $this->view('layout/footer');
  }

}

?>