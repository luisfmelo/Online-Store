<?php
  include_once('../../config/init.php');
?>
<ul>
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
      <a href="#">Ver Perfil</a>
      <a href="#">Editar Perfil</a>
      <a href="#">Minhas Encomendas</a>
      <?php
        if ( $_SESSION['admin'])
        {
          echo "<a href='#'>Gerir Produtos</a>";
          echo "<a href='#'>Gerir Encomendas</a>";
          echo "<a href='#'>Gerir Clientes</a>";
        }
      ?>

      <a href="<?=$BASE_URL?>/actions/users/logout.php">Logout</a>
    </div>
  </li>

  <li>
    <a href="<?=$BASE_URL?>/pages/orders/shopping_cart.php">
      <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    </a>
  </li>
</ul>
