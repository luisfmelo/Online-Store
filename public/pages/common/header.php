<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

  $categories = getBookCategories();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Flourish and Blotts</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?=$BASE_URL?>/css/style.css">
  </head>
  <body>
    <header>
      <div class="row">

        <div class="logo">
          <a href="<?=$BASE_URL?>/index.php"><img src="<?=$BASE_URL?>/images/logo.png" alt="" /></a>
        </div>

        <div class="searchBar">
          <form action="<?=$BASE_URL?>/actions/books/search.php" method="get">
            <input type="text" name="search" placeholder="Pesquise aqui...">
            <input type="submit" name="submit" value="Search">
          </form>
        </div>

        <div class="userMenu">
          <span>Bom Dia,</span>
          <form action="<?=$BASE_URL?>/actions/users/login.php" method="post">
            <input type="text" name="username" value="" placeholder="username">
            <input type="password" name="password" value="" placeholder="password">
            <input type="submit" name="login" value="Login">
          </form>
          <span style="">Registar</span>
        </div>

      </div>
      <div class="row" style="margin: 2% 5%">
        <?php
        foreach ($categories as $cat) {
          echo "<div class='category'><a href='../books/list_by_category.php?id=" . $cat['ref'] . "'>";
            echo $cat['categoryname'];
          echo "</a></div>";
        }
        ?>
      </div>
    </header>
