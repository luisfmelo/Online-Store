<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

  $categories = getBookCategories();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Blooks</title>
    <meta charset="utf-8">

    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="<?=$BASE_URL?>/css/style.css">
    <link rel="stylesheet" href="<?=$BASE_URL?>/libs/font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <div class="row upper-bar">
        <div class="left">
          <a href="<?=$BASE_URL?>/index.php"><i class="fa fa-home" aria-hidden="true"></i> </a>
          <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Contactem-nos </a>
          <a href="#">FAQ</a>
        </div>
        <div class="right">
          <?php
            if ( isset($_SESSION['username']) )
              include '../common/menu_logged_in.php';
            else
              include '../common/menu_logged_out.php';
          ?>
        </div>
      </div>

      <div class="row bottom-bar">
        <div class="content">
          <div class="logo">
            <a href="<?=$BASE_URL?>/index.php"><img src="<?=$BASE_URL?>/images/logo.png" alt="" /></a>
          </div>
            <form id="searchForm" action="<?=$BASE_URL?>/actions/books/search.php" method="get">
              <div id="lupa" onclick="toggleSearchBar()"><i class="fa fa-search" aria-hidden="true"></i></div>
              <input id="searchBar" name="search" type="search" placeholder="Pesquise aqui...">
            </form>
        </div>
      </div>




<!--
        <div class="userMenu">
          <span>Bom Dia, </span>

        </div>

      </div>-->

      <!--<div class="row" style="margin: 2% 5%">
        <?php
        /**foreach ($categories as $cat) {
          echo "<div class='category'><a href='../books/list_books.php?id=" . $cat['ref'] . "'>";
            echo $cat['categoryname'];
          echo "</a></div>";
        }*/
        ?>
      </div>-->
    </header>
