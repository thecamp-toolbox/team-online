<?php snippet('header') ?>

<ul>
	<?php foreach ($page->children() as $o) : ?>
		<li><a href="<?= $o->url() ?>"><?= $o->title() ?> (<?= $site->users()->filterBy('org','*=',$o->uid())->count() ?>)</a></li>
	<?php endforeach ?>
</ul>

<?php snippet('footer') ?>