<?php
  include_once('../../config/init.php');
  $profilePic = file_exists($IMG_DIR . '/profiles/' . $_SESSION['username'] . '.png')      ?
                                  $IMG_DIR . '/profiles/' . $_SESSION['username'] . '.png' :
                                  $IMG_DIR . '/profiles/default.png' ;
?>
  <li>
    <a href="<?=$BASE_URL?>/actions/users/logout.php">
      <i class="fa fa-sign-out" aria-hidden="true"></i>
    </a>
  </li>

  <li class="dropdown">
    <a href='../users/view_profile.php'>
      <?=$_SESSION['username']?>
    </a>
    <div class="dropdown-content">
      <a href="<?=$BASE_URL?>/pages/users/view_profile.php">Ver Perfil</a>
      <a href="<?=$BASE_URL?>/pages/users/edit_profile.php">Editar Perfil</a>
      <?php
        if ( $_SESSION['admin'])
        {
          echo "<a href='$BASE_URL/pages/orders/view_orders.php'>Gerir Encomendas</a>";
          echo "<a href='$BASE_URL/pages/users/stock_management.php'>Gerir Stock</a>";
          echo "<a href='$BASE_URL/pages/users/view_customers.php'>Gerir Clientes</a>";
        }
        else
          echo "<a href='$BASE_URL/pages/orders/view_orders.php'>Minhas Encomendas</a>";
      ?>

      <a href="<?=$BASE_URL?>/actions/users/logout.php">Logout</a>
    </div>
  </li>

  <li>
    <?php
    if ( !$_SESSION['admin'])
      echo "<a href='$BASE_URL/pages/orders/shopping_cart.php'>
              <i class='fa fa-shopping-cart' aria-hidden='true'></i>
            </a>";
     ?>
  </li>
