<?php snippet('header') ?>

<h1><?php echo $page->title()->html() ?></h1>

<h2>Staff</h2>
<div class="row">
	<?php foreach ($site->users()->sortBy('firstName') as $user) : ?>
		<div class="col-md-2">
			<?php snippet('user', array('user' => $user)) ?>
		</div>
	<?php endforeach ?>
</div>

<?php snippet('footer') ?>