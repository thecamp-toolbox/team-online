<?php foreach ($ateam as $o): ?>
	
	<?php $people = $o->people()->toStructure() ?>
	<?php $people = $people->filterBy('staff',$user) ?>
	<?php if ($people->first() != '') : ?>

			<?php if ($o->depth() > 2 && $o->depth() < 4) : ?>
				<a href="<?= $o->parent()->url() ?>"><?= $o->parent()->title() ?></a> →
			<?php endif ?>
			<?php if ($o->depth() > 3 && $o->depth() < 5) : ?>
				<a href="<?= $o->parent()->parent()->url() ?>"><?= $o->parent()->parent()->title() ?></a> →
				<a href="<?= $o->parent()->url() ?>"><?= $o->parent()->title() ?></a> →
			<?php endif ?>

		<a href="<?= $o->url() ?>">
			<?= $o->title() ?>
		</a> → 
		<?php if ($people->first()->job() != '') : ?>
			<?php echo $people->first()->job() ?>
		<?php else : ?>
			staff
		<?php endif ?>
	<?php endif ?>
	<br>
<?php endforeach ?>