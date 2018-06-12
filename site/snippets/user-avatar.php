<?php if ($avatar = $user->avatar()) : ?>
	<?php $avatar = $avatar->crop(400,400) ?>
	<img src="<?php echo $avatar->url() ?>" class="img-fluid circle">
<?php else : ?>
	<img src="<?php $site->url() ?>/assets/images/avatar.jpeg" class="img-fluid circle">
<?php endif ?>