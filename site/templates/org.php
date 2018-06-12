<?php snippet('header', array('site'=>$site)) ?>

<div class="row">
	<div class="col-sm-4">
		<h1><?= $page->title() ?></h1>
		<?php if ($page->text() != '') : ?>
			<?= $page->text()->kirbytext() ?>
		<?php endif ?>
	</div>
	<div class="col-sm-8">
		<?php $users = $site->users()->filterBy('org',$page->uid()) ?>
		<div class="row">
			<?php foreach ($users as $user) : ?>
				<?php $user = $site->user($user) ?>
				<div class="col-md-3">
					<?php snippet('user', array('user'=>$user)) ?> 
				</div>
			<?php endforeach ?>
		</div>
	</div>

</div>

<?php snippet('footer') ?>