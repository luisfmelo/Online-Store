<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

//  $categories = getBookCategories();
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

    <div class="wrapper">
    <header>
      <div class="row upper-bar">
        <div class="leftMenu">
          <ul class="navbar">
            <li>
              <a href="<?=$BASE_URL?>/index.php">
                <i class="fa fa-home" aria-hidden="true"></i>
              </a>
            </li>

            <li>
              <a href="#">
                <i class="fa fa-envelope" aria-hidden="true"></i> Contactem-nos
              </a>
            </li>
<!--
            <li>
              <a href="$BASE_URL?>/pages/common/faq.php">
                FAQ
              </a>
            </li>-->
          </ul>
        </div>
        <div class="rightMenu">
          <ul class="navbar">
          <?php
            if ( isset($_SESSION['username']) )
              include '../common/menu_logged_in.php';
            else
              include '../common/menu_logged_out.php';
          ?>
          </ul>
        </div>
      </div>

      <div class="row bottom-bar">
        <div class="content">
          <div class="logo">
            <a href="<?=$BASE_URL?>/index.php"><img src="<?=$BASE_URL?>/images/logo.png" alt="" /></a>
          </div>
            <form id="searchForm" action="<?=$BASE_URL?>/actions/books/search.php" method="get">
              <a class="divlink" id="lupa" onclick="toggleSearchBar()"><i class="fa fa-search" aria-hidden="true"></i></a>
              <input id="searchBar" name="search" type="search" placeholder="Pesquise aqui...">
            </form>
        </div>
      </div>

      <div class="messages" style="margin-bottom: 20px;">
        <?php include_once('../common/error_success_msgs.php'); ?>
        <?php include_once('../common/msg_cart_added.php'); ?>
      </div>
    </header>
