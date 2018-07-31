<?php snippet('header') ?>

<h1><?php echo $page->title()->html() ?></h1>

<ul>
	<?php foreach ($page->children() as $o) : ?>
		<li><a href="<?= $o->url() ?>"><?= $o->title() ?></a></li>
	<?php endforeach ?>
</ul>

<?php snippet('footer') ?>