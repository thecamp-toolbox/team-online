<?php
header('Content-type: application/json; charset=utf-8');

function childrenRecursiveContent($data, $site) {

  $json = array();

  $json['name']  = (string) $data->title();
  $json['text']  = (string)$data->text();
  $json['size']  = 100;

  $i = 0;

  //Adding circle leader
  $leadName = getLeadNameFromCircle($data);
  $niceName = getNiceNameFromUser($leadName, $site);
  $avatar = getAvatarUrlFromUser($leadName, $site);
  if($niceName){
     
     $json['children'][$i]["name"] = $niceName;
     $json['children'][$i]["username"] = $leadName;
     $json['children'][$i]["text"] = $niceName;
     $json['children'][$i]["size"] = 50;

     if($avatar) $json['children'][$i]["image"] = $avatar->crop(75,75)->url();

     else $json['children'][$i]["image"] = $site->url().'/assets/images/avatar.jpeg';

     ++$i;
  }

  //Adding circle staff
  $peopleCircle = getPeopleFromCircle($data);

  foreach ($peopleCircle as $people) {

    if($people["name"]){
      $avatar = getAvatarUrlFromUser($people["name"], $site);
      $niceName = getNiceNameFromUser($people["name"], $site);

      $json['children'][$i]["name"] = $niceName;
      $json['children'][$i]["username"] = $people["name"];
      $json['children'][$i]["text"] = $people["job"];
      $json['children'][$i]["size"] = 25;

      if($avatar) $json['children'][$i]["image"] = $avatar->crop(75,75)->url();

      else $json['children'][$i]["image"] = $site->url().'/assets/images/avatar.jpeg';

      ++$i;
    }

  }

  //Adding circle childs
  $childs = $data->children();
  foreach($childs as $key => $article) {

    $json['children'][$i] = childrenRecursiveContent($article, $site);

    ++$i;
  }

  return $json;

}


//this is the magic command which grabs all data from pages. If You wanna grab specific page articles, look at the base example mentioned above
$data = page('cercles');

$json = childrenRecursiveContent($data, $site);

echo json_encode($json);
?>