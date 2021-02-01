<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>GSB</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
  <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
  <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#563d7c">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    .container {
      padding-top: 80px;
    }

    @media (min-width: 768) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="starter-template.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <a href="home"><img src="<?= App::$root . 'images/logo.jpg' ?>" alt="" /></a>
    <a class="navbar-brand" href="home"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?= App::$root ?>home">Home</a>
        </li>
        <?php if (isset($_SESSION['auth'])) : ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?= App::$root ?>frais">Frais</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= App::$root ?>gestionVisiteurs">Gestion des visiteurs</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= App::$root ?>ajout">Création d'une note de frais</a>
          </li>
        <?php endif ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
      <?php if (!isset($_SESSION['auth'])) : ?>
        <form action="<?php App::$root ?>register" class="form-inline my-2 my-lg-0" style="margin-right:5px" method="POST">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Créer un compte</button>
        </form>
        <form action="<?php App::$root ?>login" class="form-inline my-2 my-lg-0" method="POST">
          <button class="btn btn-dark my-2 my-sm-0" type="submit">Se connecter</button>
        </form>
      <?php else : ?>
        <form action="<?php App::$root ?>logout" class="form-inline my-2 my-lg-0" method="POST">
          <button class="btn btn-dark my-2 my-sm-0" type="submit">Se déconnecter</button>
        </form>
      <?php endif ?>
    </div>
  </nav>

  <main role="main" class="container" style="margin-top: 2em;">