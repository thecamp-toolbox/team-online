<?php snippet('header') ?>

<?php $staff = $site->users()->sortBy('firstName') ?>

<h2>Staff (<?= $staff->count() ?>)</h2>

<div class="row">
	<?php foreach ($staff as $user) : ?>
		<div class="col-2 user">
			<?php snippet('user', array('user' => $user, 'site'=>$site)) ?>
		</div>
	<?php endforeach ?>
</div>

<?php snippet('footer') ?>