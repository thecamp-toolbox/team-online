<?php if ($alead != '') : ?>
	<?php foreach ($alead as $o) : ?>
		<?php if ($o->depth() > 2 && $o->depth() < 4) : ?>
			<a href="<?= $o->parent()->url() ?>"><?= $o->parent()->title() ?></a> →
		<?php endif ?>
		<?php if ($o->depth() > 3 && $o->depth() < 5) : ?>
			<a href="<?= $o->parent()->parent()->url() ?>"><?= $o->parent()->parent()->title() ?></a> →
			<a href="<?= $o->parent()->url() ?>"><?= $o->parent()->title() ?></a> →
		<?php endif ?>
		<i class="fa fa-user"></i> Lead <a href="<?= $o->url() ?>"><?= $o->title() ?></a><br>
	<?php endforeach ?>
<?php endif ?>