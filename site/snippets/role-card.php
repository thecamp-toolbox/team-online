<h4 class="card-title">
	<a href="<?= $r->url() ?>">
		<?= $r->title() ?>
	</a>
</h4>

<?php if ($r->lead() != '') : ?>
	<?php $lead = $r->lead() ?>
	<?php $lead = $site->user($lead) ?>
	<i class="fa fa-user"></i> lead : 
	<a href="<?php echo $site->url().'/staff/'.$site->user($lead)->username() ?>">
		<?= $site->user($lead)->firstName().' '.$site->user($lead)->lastName() ?>
	</a>
<?php endif ?>

<?php if ($r->hasChildren()) : ?>
	<div class="row">
		<?php foreach ($r->children() as $role) : ?>
			<div class="col mt-3 mb-1">
				<div class="card pb-1">
					<div class="card-header">
						Role
					</div>
					<div class="card-body">
						<?php snippet('role-card', array('r'=>$role, 'site'=>$site)) ?>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if ($r->people() != '') : ?>
	<h5 class="mt-3">Équipe</h5>
		<?php $staff = $r->people() ?>
		<?php foreach ($staff->toStructure() as $user) : ?>
			<?php $theuser = $site->user($user->staff()) ?>

				<?php if ($user->job() != '') : ?>
					<?= $user->job() ?> - 
				<?php endif ?>
				<?php snippet('user-mini', array('theuser'=>$theuser)) ?>

		<?php endforeach ?>
<?php endif ?>