<?php snippet('header') ?>

<div class="card-columns">
	<?php foreach ($page->children()->visible()->sortBy('title') as $role) : ?>
		<div class="card border-dark">
			<?php snippet('role-card', array('r' => $role, 'site' => $site)) ?>
		</div>
	<?php endforeach ?>
</div>

<?php snippet('footer') ?>