<?php 

function translate($text)
{
  $text = urlencode($text);
  $request = "https://clients5.google.com/translate_a/t?client=dict-chrome-ex&sl=auto&tl=id&q=$text";
  $json = file_get_contents($request);
  $arr = json_decode($json, TRUE);
  $result = $arr['sentences'][0]['trans'];

  return $result;

}

?>