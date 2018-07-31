<?php snippet('header') ?>

<div class="row">
	<div class="col-md-4 p-3">
		<h2>Organisations</h2>
		<ul>
			<?php foreach (page('organisations')->children() as $c) : ?>
				<li>
					<a href="<?= $c->url() ?>"><?= $c->title() ?> (<?= $site->users()->filterBy('org','*=',$c->uid())->count() ?>)</a>
				</li>
			<?php endforeach ?>
		</ul>

		<h2>
			<a href="<?= $site->url().'/cercles' ?>">
				Cercles
			</a>
		</h2>
		<ul>
		<?php foreach (page('cercles')->children()->visible() as $c) : ?>
			<li><a href="<?= $c->url() ?>"><?= $c->title() ?></a></li>
		<?php endforeach ?>
		</ul>
	</div>
	<div class="col-md-8 p-3">
		<div class="row">
			<?php foreach ($site->users()->sortBy('firstName') as $user) : ?>
				<div class="col-2 user">
					<?php snippet('user', array('user' => $user)) ?>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>

<?php snippet('footer') ?>