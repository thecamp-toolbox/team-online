<?php snippet('header') ?>

<div class="row">
	<div class="col-md-4">
		<h1><?php echo $page->title()->html() ?></h1>
		<?php if ($page->but() != '') : ?>
			<h3>But</h3>
			<?= $page->but()->kirbytext() ?>
		<?php endif ?>
		<?php if ($page->perimetre() != '') : ?>
			<h3>Périmètre</h3>
			<?= $page->perimetre()->kirbytext() ?>
		<?php endif ?>
		<?php if ($page->text() != '') : ?>
			<h3>Redevabilités</h3>
			<?= $page->text()->kirbytext() ?>
		<?php endif ?>
	</div>
	<div class="col-md-8">
		<h4>Lead : </h4>
		<?php $lead = $page->lead() ?>
		<?php $user = $site->user($lead) ?>
		<?php snippet('user', array('user' => $user)) ?>
		<?php foreach ($page->children() as $r) : ?>
			<?= $r->title() ?>
		<?php endforeach ?>
	</div>
</div>

<?php snippet('footer') ?>