<?php snippet('header', array('site'=>$site)) ?>

<?php $user = $site->user($uid) ?>
<div class="row">
	<div class="col-3 p-3 text-center">
		<?php snippet('user-avatar', array('user'=>$user, 'site'=>$site)) ?>
		<h1><?= $user->firstName().'  '.$user->lastName() ?></h1>

		<?php if ($user->aka() != '') : ?>
			AKA <?= $user->aka()  ?>
		<?php endif ?>

		<div class="clearfix"></div>

		<?php if ($user->twitter() != '') : ?>
			<a href="http://twitter.com/<?= $user->twitter() ?>" target="_blank">
				<i class="fa fa-twitter"></i>
			</a> 
		<?php endif ?>

		<?php if ($user->linkedin() != '') : ?>
			<a href="<?= $user->linkedin() ?>" target="_blank">
				<i class="fa fa-linkedin"></i>
			</a>
		<?php endif ?>

		<div class="clearfix"></div>

		<?php if ($user->tags() != ''): ?>
			<?= $user->tags() ?>
		<?php endif ?>

		<div class="clearfix"></div>

		<?php if ($user->org() != '') : ?>
			<?php $org = $user->org() ?>
			<?php $theorg = page('organisations')->children()->find($org) ?>
			<?php if ($theorg->lead() == $user->username()) : ?>
				<i class="fa fa-user"></i> Lead
			<?php endif ?>
			<a href="<?= $theorg->url() ?>">
				<?= $theorg->title() ?>
			</a>
		<?php endif ?>

	</div>
	<div class="col-6 p-3">
		<?php if ($user->text() != '') : ?>
			<h2>Bio</h2>
			<?= $user->text() ?>
		<?php endif ?>

		<h2>Rôles</h2>
		<?php $alead = page('cercles')->children()->filterBy('lead',$user) ?>
		<?php if ($alead != '') : ?>
			<?php foreach ($alead as $o) : ?>
				<i class="fa fa-user"></i> Lead <a href="<?= $o->url() ?>"><?= $o->title() ?></a>
			<?php endforeach ?>
		<?php endif ?>

		<div class="clearfix"></div>
		<?php $alead2 = page('cercles')->children()->children()->filterBy('lead',$user) ?>
		<?php if ($alead2 != '') : ?>
			<?php foreach ($alead2 as $o) : ?>
				<a href="<?= $o->parent()->url() ?>"><?= $o->parent()->title() ?></a> →
				<i class="fa fa-user"></i> Lead <a href="<?= $o->url() ?>"><?= $o->title() ?></a>
			<?php endforeach ?>
		<?php endif ?>

	</div>

</div>

<?php snippet('footer') ?>