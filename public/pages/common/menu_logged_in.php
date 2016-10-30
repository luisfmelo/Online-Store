<?php
  include_once('../../config/init.php');
?>

<a href="<?=$BASE_URL?>/actions/users/logout.php">Logout</a>
<span class="username"> <a href='../users/view_profile.php'> <?=$_SESSION['username']?> </a></span>
<a href="<?=$BASE_URL?>/pages/orders/shopping_cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>

<?php
  include_once('error_success_msgs.php');
?>
