<?php


function getLeadNameFromCircle ($circle) {

	$leadStructure = $circle->lead()->toStructure();
	if (!empty($leadStructure)){
        $leadName = $leadStructure->first()->value;
        return $leadName;
     }

}

function getAvatarUrlFromUser ($userId, $site) {

	$leadUser = $site->user($userId);
 	if($leadUser) return $leadUser->avatar();

}

function getPeopleFromCircle ($circle) {

	$people = $circle->people()->toStructure();
	$peopleArray = array();

	foreach ($people as $key => $staff) {

		$staffName = $staff->staff()->first()->value;
		$peopleArray[$key]["name"] = $staff->staff()->first()->value;
		$peopleArray[$key]["job"] = $staff->job()->first()->value;

	}

	return $peopleArray;

}

function getNiceNameFromUser ($userId, $site) {

	$user = $site->user($userId);
	
 	if($user) return $user->firstname()." ".$user->lastname();

}