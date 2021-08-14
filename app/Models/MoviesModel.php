<?php 

namespace App\Models;

class MoviesModel 
{
  public function getNowPlaying()
  {
    $request = "https://api.themoviedb.org/3/movie/now_playing?api_key=469d97658ba36c86f1add30db4d49b25&language=en-US&page=1";
    $json = file_get_contents($request);
    $arr = json_decode($json, TRUE);
    $result = $arr["results"];
    
    return $result;
  }

  public function getPopularMovies()
  {
    $request = "https://api.themoviedb.org/3/movie/popular?api_key=469d97658ba36c86f1add30db4d49b25&language=en-US&page=1";
    $json = file_get_contents($request);
    $arr = json_decode($json, TRUE);
    $result = $arr["results"];

    return $result; 

  }
}


?>