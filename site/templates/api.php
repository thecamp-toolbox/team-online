<?php
header('Content-type: application/json; charset=utf-8');

function childrenRecursiveContent($data, $site) {

$json = array();

$json['name']  = (string) $data->title();
$json['children']  = array();
$json['params']  = array();

$childs = $data->children();


$i = 0;

  foreach($childs as $key => $article) {

    $images = array();

    $json['children'][$i] = array(
      'name' => (string)$article->title(),
      'size' => '200',
      'text'  => (string)$article->text()
    );


    $j = 0;

    foreach ($article->children() as $childKey => $child) {

        $json['children'][$i]["children"][$j] = childrenRecursiveContent($article, $site);
        ++$j;


          $leadName = getLeadNameFromCircle($article);
          $avatar = getAvatarUrlFromUser($leadName, $site);

          if($avatar){

              $json['children'][$i]["children"][$j] = array(
                'name' => $leadName,
                'size' => '100',
                'text'  => $leadName,
                'images'  => $avatar->url(),
              );

              ++$j;
          }
    }

    if(empty($json['children'][$i]["children"])){

        $leadName = getLeadNameFromCircle($article);
        $avatar = getAvatarUrlFromUser($leadName, $site);

          if($avatar){

              $json['children'][$i]["children"][] = array(
                'name' => $leadName,
                'size' => '100',
                'text'  => $leadName,
                'images'  => $avatar->url(),
              );
          }
    }


    // this cleans up JSONS code so there is no empty entries inside objects

    if(!empty($json['children'][$i])){
          $cleanData = array_filter($json['children'][$i]);
           $json['children'][$i] = $cleanData;
    }

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


$json = childrenRecursiveContent($data, $site);

echo json_encode($json);
?>