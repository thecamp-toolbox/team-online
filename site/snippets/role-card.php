<h5>
	<a href="<?= $r->url() ?>">
		<?= $r->title() ?>
	</a>
	<?php if ($r->lead() != '') : ?>
		<?php $lead = $r->lead() ?>
		<?php $lead = $site->user($lead) ?>
		<i class="fa fa-user"></i> lead : 
		<a href="<?php echo $site->url().'/staff/'.$site->user($lead)->username() ?>">
			<?= $site->user($lead)->firstName().' '.$site->user($lead)->lastName() ?>
		</a>
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
	<ul>
		<?php $staff = $r->people() ?>
		<?php foreach ($staff->toStructure() as $user) : ?>
			<?php $theuser = $site->user($user->staff()) ?>
			<li>
				<a href="<?php echo $site->url().'/staff/'.$theuser->username() ?>">
					<?= $theuser->firstName().' '.$theuser->lastName() ?>
				</a>
				<?php if ($user->job() != '') : ?>
					- <?= $user->job() ?>
				<?php endif ?>
			</li>
		<?php endforeach ?>
	</ul>
<?php endif ?>