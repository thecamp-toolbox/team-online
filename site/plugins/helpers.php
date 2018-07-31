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
		
     	if($leadUser) 
     	 	return $leadUser->avatar();

}