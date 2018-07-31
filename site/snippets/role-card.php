<div class="card-header pb-0 pt-2">
	<h4 class="pb-0">
		<a href="<?= $r->url() ?>">
			<?= $r->title() ?>
		</a>
	</h4>
</div>

<div class="card-body">
	<?php if ($r->lead() != '') : ?>
		<?php $lead = $r->lead() ?>
		<?php $lead = $site->user($lead) ?>
		<?php snippet('user-mini', array('theuser'=>$lead, 'user'=>$user, 'lead'=>$lead)) ?>
	<?php endif ?>

	<?php if ($r->hasChildren()) : ?>
		<div class="row">
			<?php foreach ($r->children() as $role) : ?>
				<div class="col mt-3 mb-1">
					<div class="card">
						<?php snippet('role-card', array('r'=>$role, 'site'=>$site)) ?>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	<?php endif ?>

	<?php if ($r->people() != '') : ?>
		<h5 class="mt-3"></h5>
			<?php $staff = $r->people() ?>
			<?php foreach ($staff->toStructure() as $user) : ?>
				<?php $theuser = $site->user($user->staff()) ?>
				<?php $job = $user->job() ?>
				<?php snippet('user-mini', array('theuser'=>$theuser, 'job'=>$job, 'lead'=>$lead)) ?>

			<?php endforeach ?>
	<?php endif ?>

</div>
<div class="card-footer">
	Role
</div>