<?php snippet('header', array('site'=>$site)) ?>

<?php $user = $site->user($uid) ?>
<div class="row">
	<div class="col-sm-4">
		<?php snippet('user-avatar', array('user'=>$user, 'site'=>$site)) ?>
		<h1><?= $user->firstName().'  '.$user->lastName() ?></h1>
		<?php if ($user->org() != '') : ?>
			<?php $org = $user->org() ?>
			<?php $theorg = page('organisations')->children()->find($org) ?>
			<a href="<?= $theorg->url() ?>">
				<?= $theorg->title() ?>
			</a>
		<?php endif ?>
		<?php if ($user->twitter() != '') : ?>
			<?= twitter($user->twitter()) ?>
		<?php endif ?>
	</div>
	<div class="col-sm-8">
		<?php if ($user->text() != '') : ?>
			<?= $user->text()->kirbytext() ?>
		<?php endif ?>
	</div>

</div>

<?php snippet('footer') ?>