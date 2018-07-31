<?php $pages = $site->pages() ?>
<?php snippet('header', array('pages'=>$pages, 'site'=>$site)) ?>

<?php $staff = $site->users()->sortBy('firstName') ?>

<h5 class="mb-3">Staff (<?= $staff->count() ?>)</h5>

<div class="row">
	<?php foreach ($staff as $user) : ?>
		<div class="col-2 user">
			<?php snippet('user', array('user' => $user, 'site'=>$site)) ?>
		</div>
	<?php endforeach ?>
</div>

<?php snippet('footer') ?>