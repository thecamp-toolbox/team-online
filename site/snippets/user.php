<?php snippet('user-avatar', array('user'=>$user, 'site'=>$site)) ?>
<h4>
	<a href="<?php echo $site->url().'/staff/'.$user->username() ?>">
		<?= $user->firstName() ?> <?= $user->lastName() ?>
	</a>
</h4>
