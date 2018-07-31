<?php snippet('header') ?>

<h1><?php echo $page->title()->html() ?></h1>

<div class="row">
<?php foreach ($page->children()->visible()->sortBy('title') as $role) : ?>
	<div class="col-md-6 mt-3 mb-3">
		<div class="card border-dark">
			<div class="card-body">
				<?php snippet('role-card', array('r' => $role, 'site' => $site)) ?>
			</div>
		</div>
	</div>
<?php endforeach ?>
</div>



<?php snippet('footer') ?>