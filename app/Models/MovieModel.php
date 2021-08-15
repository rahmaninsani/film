<?php 

namespace App\Models;

class MovieModel 
{
  public function getNowPlaying()
  {
    $request = "https://api.themoviedb.org/3/movie/now_playing?api_key=".APIKEY."&language=en-US&page=1";
    $json = file_get_contents($request);
    $arr = json_decode($json, TRUE);
    $result = $arr["results"];
    
    return $result;
  }

  public function getPopularMovies()
  {
    $request = "https://api.themoviedb.org/3/movie/popular?api_key=".APIKEY."&language=en-US&page=1";
    $json = file_get_contents($request);
    $arr = json_decode($json, TRUE);
    $result = $arr["results"];

    return $result; 

  }

  public function getMovieDetails($id)
  {
    $request = "https://api.themoviedb.org/3/movie/$id?api_key=".APIKEY."&language=en-US";
    $json = file_get_contents($request);
    $result = json_decode($json, TRUE);
    
    return $result; 

  }

  public function getVideos($id)
  {
    $request = "https://api.themoviedb.org/3/movie/$id/videos?api_key=".APIKEY."&language=en-US";
    $json = file_get_contents($request);
    $arr = json_decode($json, TRUE);
    $result = $arr['results'][0]['key'];

    return $result; 

  }

  public function getCredits($id)
  {  
    $request = "https://api.themoviedb.org/3/movie/$id/credits?api_key=".APIKEY."&language=en-US";
    $json = file_get_contents($request);
    $result = json_decode($json, TRUE);
    
    return $result; 

  }

  public function getRecommendations($id)
  { 
    $request = "https://api.themoviedb.org/3/movie/$id/recommendations?api_key=".APIKEY."&language=en-US";
    $json = file_get_contents($request);
    $arr = json_decode($json, TRUE);
    $result = $arr['results'];

    return $result; 

  }

  public function getReviews($id)
  { 
    $request = "https://api.themoviedb.org/3/movie/$id/reviews?api_key=".APIKEY."&language=en-US";
    $json = file_get_contents($request);
    $arr = json_decode($json, TRUE);
    $result = $arr['results'];

    return $result; 

  }

  public function getSearch()
  {
    $keyword = $_POST['keyword'];
    $keyword = urlencode($keyword);
    $request = "https://api.themoviedb.org/3/search/movie?api_key=".APIKEY."&language=en-US&query=".$keyword."&page=1&include_adult=false";
    $json = file_get_contents($request);
    $arr = json_decode($json, TRUE);
    $result = $arr['results'];

    return $result; 
  }
}

?>