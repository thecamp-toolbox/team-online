<?php snippet('header') ?>

<h1 class="p-3"><?php echo $page->title()->html() ?></h1>

<div class="card-columns">
	<?php foreach ($page->children()->visible()->sortBy('title') as $role) : ?>
		<div class="card border-dark">
			<?php snippet('role-card', array('r' => $role, 'site' => $site)) ?>
		</div>
	<?php endforeach ?>
</div>



<?php snippet('footer') ?>