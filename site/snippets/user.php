<div class="mb-4">
	<?php snippet('user-avatar', array('user'=>$user, 'site'=>$site, 'lead'=>$lead)) ?>
	<h4 class="text-center pt-2">
		<a href="<?php echo $site->url().'/staff/'.$user->username() ?>">
			<?= $user->firstName() ?> <?= $user->lastName() ?>
		</a>
	</h4>
	<?php if ($user->aka() != '') : ?>
		<h6 class="text-center">
			<a href="<?php echo $site->url().'/staff/'.$user->username() ?>">
				AKA <?= $user->aka() ?> 
			</a>
		</h6>
	<?php endif ?>
</div>
