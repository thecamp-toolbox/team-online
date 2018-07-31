<?php snippet('header', array('site'=>$site)) ?>

<div class="row">
	<div class="col-sm-3 p-3">
		<?php if ($page->hasImages()) : ?>
			<img src="<?= $page->images()->first()->url() ?>"> 
		<?php endif ?>

		<h1><?= $page->title() ?></h1>
		<?php if ($page->website() != '') : ?>
			<a href="<?= $page->website() ?>" target="_blank">
				<?= $page->website() ?>
			</a><br>
		<?php endif ?>

		<?php if ($page->lead() != '') : ?>
			<?php $lead = $page->lead() ?>
			<?php $lead = $site->user($lead) ?>
			<i class="fa fa-user"></i> lead : 
			<a href="<?php echo $site->url().'/staff/'.$site->user($lead)->username() ?>">
				<?= $site->user($lead)->firstName().' '.$site->user($lead)->lastName() ?>
			</a><br>
		<?php endif ?>

		<?php if ($page->text() != '') : ?>
			<h2 class="pt-4">Mission</h2>
			<?= $page->text()->kirbytext() ?>
		<?php endif ?>


	</div>
	<div class="col-sm-9 p-3">
		<?php $users = $site->users()->filterBy('org',$page->uid())->sortBy('firstName') ?>
		<div class="row">
			<?php foreach ($users as $user) : ?>
				<?php $user = $site->user($user) ?>
				<div class="col-3 user">
					<?php snippet('user', array('user'=>$user, 'lead'=>$lead)) ?> 
				</div>
			<?php endforeach ?>
		</div>
	</div>

</div>

<?php snippet('footer') ?>