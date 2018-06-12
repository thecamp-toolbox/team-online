<?php snippet('header') ?>

<h1><?php echo $page->title()->html() ?></h1>

<?php foreach ($page->children()->visible()->sortBy('title') as $role) : ?>
	<a href="<?= $role->url() ?>">
		<h4>
			<?= $role->title() ?>
			<?php if ($lead = $role->lead()) : ?>
				<?php $lead = $site->user($lead) ?>
				<i class="fa fa-user"></i> 
				<?php echo $lead->firstName().' '.$lead->lastName() ?>
			<?php endif ?>
		</h4>
	</a>
	<?php foreach ($role->children() as $r) : ?>
		<?php snippet('role-card', array('r' => $r, 'site' => $site)) ?>
	<?php endforeach ?>
<?php endforeach ?>


<?php snippet('footer') ?>