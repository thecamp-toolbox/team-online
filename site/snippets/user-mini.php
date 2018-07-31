<div class="media mb-3">
  <?= snippet('user-avatar', array('user'=>$theuser, 'lead'=>$lead, 'mini'=>true)) ?>
  <div class="media-body pl-2">
    <h5 class="mt-0 mb-0">
    	<a href="<?php echo $site->url().'/staff/'.$theuser->username() ?>">
			<?= $theuser->firstName().' '.$theuser->lastName() ?>
		</a>
    </h5>
   	<?php if ($job != '') : ?>
		<?= $job ?>
	<?php endif ?>
	<?php if ($theuser->username() == $lead) : ?>
		Lead
	<?php endif ?>
  </div>
</div>
<div class="clearfix"></div>


