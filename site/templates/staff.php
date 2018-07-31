<?php $pages = $site->pages() ?>
<?php snippet('header', array('pages'=>$pages, 'site'=>$site)) ?>

<?php $staff = $site->users()->sortBy('firstName') ?>

<?php if($org = param('org')) {
  $staff = $staff->filterBy('org', $org);
  $theorg = page('organisations')->find($org);
  $lead = $theorg->lead();
} ?>


<ul class="nav nav-pills mb-4 mt-4">
	<li class="nav-item">
	    <a class="nav-link <?php e($org == '','active') ?>" href="/staff">Tous</a>
	</li>
	<?php foreach (page('organisations')->children() as $o) : ?>
		<li class="nav-item">
			<a class="nav-link <?php e($org == $o->uid(), 'active') ?>" href="/staff/org:<?= $o->uid() ?>"><?= $o->title() ?></a>
		</li>
	<?php endforeach ?> 
	<li class="nav-item">
	    <a class="nav-link disabled" href="#">Staff : <?= $staff->count() ?></a>
	</li>
</ul>


<div class="row">
	<?php foreach ($staff as $user) : ?>
		<div class="col-2 user">
			<?php snippet('user', array('user' => $user, 'site'=>$site, 'lead'=>$lead)) ?>
		</div>
	<?php endforeach ?>
</div>

<?php snippet('footer') ?>