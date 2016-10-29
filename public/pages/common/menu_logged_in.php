<?php
  include_once('../../config/init.php');
?>

<a href="<?=$BASE_URL?>/actions/users/logout.php">Logout</a>
<span class="username"> <a href='../users/view_profile.php'> <?=$_SESSION['username']?> </a></span>

<?php
  include_once('error_success_msgs.php');
?>
