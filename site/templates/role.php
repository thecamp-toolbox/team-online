<?php snippet('header') ?>

<div class="row">
	<div class="col-md-4 p-3">
		<?php if ($page->depth() > 1) : ?>
			<a href="<?= $page->parent()->url() ?>">
				← <?= $page->parent()->title() ?>
			</a>
		<?php endif ?>

		<h1><?= $page->title()->html() ?></h1>


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
			<?php $lead = $page->lead() ?>
			<?php $lead = $site->user($lead) ?>
			<?php snippet('user-mini', array('theuser'=>$lead, 'user'=>$user, 'lead'=>$lead)) ?>
		<?php endif ?>

		<div class="card-columns">
			<?php foreach ($page->children()->sortBy('title') as $role) : ?>
					<div class="card">
						<?php snippet('role-card', array('r' => $role, 'site' => $site)) ?>
					</div>
			<?php endforeach ?>
		</div>

		<?php if ($page->people() != '') : ?>
			<h5 class="mt-3"></h5>
			<?php $staff = $page->people() ?>
			<?php foreach ($staff->toStructure() as $user) : ?>
				<?php $theuser = $site->user($user->staff()) ?>
				<?php $job = $user->job() ?>
				<?php snippet('user-mini', array('theuser'=>$theuser, 'job'=>$job, 'lead'=>$lead)) ?>

			<?php endforeach ?>
		<?php endif ?>

	</div>
</div>

<?php snippet('footer') ?>