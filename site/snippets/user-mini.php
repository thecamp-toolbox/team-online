<div class="media">
  <?= snippet('user-avatar', array('user'=>$theuser, 'mini'=>true)) ?>
  <div class="media-body pl-2">
    <h5 class="mt-0">
    	<a href="<?php echo $site->url().'/staff/'.$theuser->username() ?>">
			<?= $theuser->firstName().' '.$theuser->lastName() ?>
		</a>
    </h5>
  </div>
</div>
<div class="clearfix"></div>


