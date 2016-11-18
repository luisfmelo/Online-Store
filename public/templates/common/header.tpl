<!DOCTYPE html>
<html>
  <head>
    <title>Blooks</title>
    <meta charset="utf-8">

    <!-- Include da font-stack escolhida -->
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Quicksand" rel="stylesheet">
    <!-- Include da nossa folha de estilos CSS -->
    <link rel="stylesheet" href="{$BASE_URL}/css/style.css">
    <!-- Include Font Awesome lib - for icons -->
    <link rel="stylesheet" href="{$BASE_URL}/libs/font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="wrapper">
      <header>
        <div class="row upper-bar">
          <div class="leftMenu">
            <ul class="navbar">
              <li>
                <a href="{$BASE_URL}/pages/books/list_books.php">
                  <i class="fa fa-home" aria-hidden="true"></i>
                </a>
              </li>

              <li>
                <a href="{$BASE_URL}/index.php">
                  <i class="fa fa-envelope" aria-hidden="true"></i> Contactem-nos
                </a>
              </li>
  <!-- A implementar: não critico
              <li>
                <a href="$BASE_URL?>/pages/common/faq.php">
                  FAQ
                </a>
              </li>-->
            </ul>
          </div>
          <div class="rightMenu">
            <ul class="navbar">
            {if $USERNAME != ''}
              {include file='common/menu_logged_in.tpl'}
            {else}
              {include file='common/menu_logged_out.tpl'}
            {/if}
            </ul>
          </div>
        </div>

        <div class="row bottom-bar">
          <div class="content">
            <div class="logo">
              <a href="{$BASE_URL}/pages/books/list_books.php"><img src="{$BASE_URL}/images/logo.png" alt="" /></a>
            </div>
              <form id="searchForm" action="{$BASE_URL}/actions/books/search.php" method="get">
                <a class="divlink" id="lupa" onclick="toggleSearchBar()"><i class="fa fa-search" aria-hidden="true"></i></a>
                <input id="searchBar" name="search" type="search" placeholder="Pesquise aqui...">
              </form>
          </div>
        </div>

        <div class="messages" style="margin-bottom: 20px;">
          {include file='_messages/error_success_msgs.tpl'}
          {include file='_messages/msg_cart_added.tpl'}
        </div>
      </header>
