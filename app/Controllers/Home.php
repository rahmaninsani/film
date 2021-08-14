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
    $detail = $this->moviesModel->getMovieDetails($id);
    $video = $this->moviesModel->getVideos($id);
    $credit = $this->moviesModel->getCredits($id);
    $review = $this->moviesModel->getReviews($id);
    $recommendation = $this->moviesModel->getRecommendations($id);
    
    for($i = 0; $i < count($detail["spoken_languages"]); $i++) {
      $detail["spoken_languages"][$i]["english_name"] = translate($detail["spoken_languages"][$i]["english_name"]);
    }

    for($i = 0; $i < count($detail["production_countries"]); $i++) {
      $detail["production_countries"][$i]["name"] = translate($detail["production_countries"][$i]["name"]);
    }

    $detail["overview"] = translate($detail["overview"]);

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

}

?>