<!DOCTYPE html>
<html lang="en">
<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
  
  <?= css('assets/css/main.css') ?>

  <?php $kirby = kirby(); ?>
  <?php $site = $kirby->site(); ?>

  <title>
  	<?php echo $site->title()->html() ?>
  </title>

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light mb-3 ">
    <a class="navbar-brand" href="<?= $site->url() ?>">
       <img src="<?= $site->url() ?>/assets/images/galet.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      <?= $site->title() ?>  
     </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="<?= $site->url() ?>/staff">Staff</a>
        </li>

        <?php foreach ($pages->visible() as $p) : ?>
          <li class="nav-item <?php e($p->isOpen(),'active') ?>">
            <a class="nav-link" href="<?= $p->url() ?>"><?= $p->title() ?></a>
          </li>
        <?php endforeach ?>

      </ul>
    </div>
  </nav>

  <div class="container-fluid">
