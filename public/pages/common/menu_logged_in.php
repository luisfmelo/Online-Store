<?php
  include_once('../../config/init.php');
?>

<a href="<?=$BASE_URL?>/actions/users/logout.php">Logout</a>
<span class="username"><?=$_SESSION['username']?></span>

<?php
  include_once('error_success_msgs.php');
?>
