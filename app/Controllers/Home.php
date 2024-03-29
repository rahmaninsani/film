<?php

use JetBrains\PhpStorm\Language;

class Home extends Controller
{
  public function index()
  {
    //var_dump($this->getPopularMovies()); die;
    $data = [
      'title' => 'Home',
      'nowPlaying' => $this->getNowPlaying(),
      'popular' => $this->getPopularMovies(),
    ];
    
    $this->view('layout/header', $data);
    $this->view('home/index', $data);
    $this->view('layout/footer');
  }

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
    
    // foreach($result as $r) {
    //   $r['overview'] = $this->detectLanguange($r['overview']);
    // }

    return $result; 

  }

  private function detectLanguange($text)
  {
    $text = urlencode($text);

    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://google-translate1.p.rapidapi.com/language/translate/v2/detect",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "q=$text",
      CURLOPT_HTTPHEADER => [
        "accept-encoding: application/gzip",
        "content-type: application/x-www-form-urlencoded",
        "x-rapidapi-host: google-translate1.p.rapidapi.com",
        "x-rapidapi-key: 100c74d725msh3f95fe0d7126a2dp15ff62jsnefdced790d12"
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
      return;
    } 
    
    $arr = json_decode($response, TRUE);
    $language = $arr["data"]["detections"][0][0]["language"];
    
    $this->translate($text, $language);
    
  }

  private function translate($text, $language)
  {
    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://google-translate1.p.rapidapi.com/language/translate/v2",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "q=$text&target=id&source=$language",
      CURLOPT_HTTPHEADER => [
        "accept-encoding: application/gzip",
        "content-type: application/x-www-form-urlencoded",
        "x-rapidapi-host: google-translate1.p.rapidapi.com",
        "x-rapidapi-key: 100c74d725msh3f95fe0d7126a2dp15ff62jsnefdced790d12"
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
      return;
    }
      
    $arr = json_decode($response, TRUE);
    $result = $arr["data"]["translations"][0]["translatedText"];
    
    echo $result; 
  }

  public function getVideo($keyword)
  {
    $keyword = urlencode($keyword);

    // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=1&q=$keyword&key=AIzaSyCNw7S2IYVqIv-AL2g3eLVfXQwi6ttotIg");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    // $headers[] = 'Authorization: Bearer [YOUR_ACCESS_TOKEN]';
    $headers[] = 'Accept: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    var_dump(json_decode($result, true));
  }

}

?>