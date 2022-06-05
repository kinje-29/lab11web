<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="<?= base_url('public/style.css'); ?>">
</head>

<body>
  <div id="container">
    <header>
      <h1>Layout Sederhana</h1>
    </header>
    <nav>
      <a href="<?= base_url('index.php/Home'); ?>" class="active">Home</a>
      <a href="<?= base_url('public/artikel'); ?>">Artikel</a>
      <a href="<?= base_url('public/about'); ?>">About</a>

      <a href="<?= base_url('public/contact'); ?>">Kontak</a>
    </nav>
    <section id="wrapper">
      <section id="main">