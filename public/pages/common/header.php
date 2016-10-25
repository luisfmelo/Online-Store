<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/books.php');

  $books = getAllBooks();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Blook</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/style.css">
  </head>
  <body>
