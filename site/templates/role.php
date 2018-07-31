<?php snippet('header') ?>

<div class="row">
	<div class="col-md-4 p-3">
		<h1><?php echo $page->title()->html() ?></h1>


		<?php if ($page->lead() != '') : ?>
		<?php $lead = $page->lead() ?>
		<?php $lead = $site->user($lead) ?>
		<i class="fa fa-user"></i> lead : 
			<a href="<?php echo $site->url().'/staff/'.$site->user($lead)->username() ?>">
				<?= $site->user($lead)->firstName().' '.$site->user($lead)->lastName() ?>
			</a>
		<?php endif ?>

		<hr>

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
	<div class="col-md-8 p-3">
		<h2>Roles</h2>

		<?php if ($page->lead() != '') : ?>
			<h5>
				<i class="fa fa-user"></i> lead : 
				<a href="<?php echo $site->url().'/staff/'.$site->user($lead)->username() ?>">
					<?= $site->user($lead)->firstName().' '.$site->user($lead)->lastName() ?>
				</a>
			</h5>
		<?php endif ?>

		<?php foreach ($page->children()->sortBy('title') as $role) : ?>
			<?php snippet('role-card', array('r' => $role, 'site' => $site)) ?>
		<?php endforeach ?>
	</div>
</div>

<?php snippet('footer') ?>