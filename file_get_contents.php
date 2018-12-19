<?php

$url = "http://www.zgdbsxww.com/";
$str = file_get_contents($url);
$preg = '/<img[^>]*\/>/';
preg_match_all($preg, $str, $matches);
$matches = $matches[0];

$arr = [];
foreach($matches as $v){
    $preg = '/http:\/\/.*.jpg/';
    preg_match_all($preg, $v, $match);
    $arr[] = $match[0][0];
}

$dir = './imgs';

foreach($arr as $k => $v){

    $name = $dir . $k . '.jpg';

    download($name, $v);
}
function download($name, $url){
    if(!is_dir(dirname($name))){
        mkdir(dirname($name));
    }
    $str = file_get_contents($url);
    file_put_contents($name, $str);
    echo strlen($str);
    echo "\n";
}