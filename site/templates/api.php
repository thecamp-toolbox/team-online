<?php
header('Content-type: application/json; charset=utf-8');


function childrenRecursiveContent($data) {

$json = array();

$json['name']  = (string) $data->title();
$json['children']  = array();
$json['params']  = array();

$childs = $data->children();

$i = 0;

  foreach($childs as $key => $article) {

    $images = array();

    foreach($article->images() as $image) {

      //this is Bastians snippet about gathering image data
      $images[] = array(
        'url'    => $image->url(),
        'width'  => $image->width(),
        'height' => $image->height(),
        'thumb' => thumb($image, array('width' => 290, 'height' => 290, 'crop' => true))->url()
      );
    }

    $json['children'][$i] = array(
      'name' => (string)$article->title(),
      'size' => '200',
      'text'  => (string)$article->text(),
      'images'  => $images
    );

    $j = 0;
    foreach ($article->children() as $childKey => $child) {

        $json['children'][$i]["children"][$j] = childrenRecursiveContent($article);
        ++$j;

    }

    // this cleans up JSONS code so there is no empty entries inside objects
    $cleanData = array_filter($json['children'][$i]);
    $json['children'][$i] = $cleanData;

    $foo = $json['params'];

    //just example of boolean. in blueprints its type: checkboxes
    if ((string)$article->adress()) { 
        $foo['adress'] = true;
    }

  //example of string as param. in blueprints its type: number
  if ((string)$article->time()) {
        $foo['time'] = (string)$article->time();
    }

    $json['params'] = (object)$foo;

    ++$i;
  }


  return $json;

}


//this is the magic command which grabs all data from pages. If You wanna grab specific page articles, look at the base example mentioned above
$data = page('cercles');


$json = childrenRecursiveContent($data);


echo json_encode($json);
?>