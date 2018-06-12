<h5>
	<?= $r->title() ?>
	<?php if ($r->lead() != '') : ?>
		<?php $lead = $r->lead() ?>
		<?php $lead = $site->user($lead) ?>
		<i class="fa fa-user"></i> 
		<?= $site->user($lead)->firstName().' '.$site->user($lead)->lastName() ?>
	<?php endif ?>
</h5>
<?php if ($r->hasChildren()) : ?>
	<ul>
		<?php foreach ($r->children() as $role) : ?>
			<li><?php snippet('role-card', array('r'=>$role, 'site'=>$site)) ?></li>
		<?php endforeach ?>
	</ul>
<?php endif ?>

<?php if ($r->people() != '') : ?>
	<?php $staff = $r->people() ?>
	<?php foreach ($staff->toStructure() as $user) : ?>
		<?php $user = $site->user($user) ?>
		<?= $user ?>
	<?php endforeach ?>
<?php endif ?>