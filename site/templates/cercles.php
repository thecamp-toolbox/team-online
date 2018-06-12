<?php snippet('header') ?>

<h1><?php echo $page->title()->html() ?></h1>

<?php foreach ($page->children()->visible()->sortBy('title') as $role) : ?>
	<?php snippet('role-card', array('r' => $role, 'site' => $site)) ?>
<?php endforeach ?>



<?php snippet('footer') ?>