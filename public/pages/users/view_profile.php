<?php
  include '../common/header.php';
  include_once('../../database/users.php');

  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if ( !isAdmin($_SESSION['username']) && isset($_GET['user']) && $_SESSION['username'] !== $_GET['user'] )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php');
    exit;
  }

  $username = isset($_GET['user']) ? $_GET['user'] :
                                     $_SESSION['username'];
  $userProfile = getUserByUsername($username);
  $photo =
    file_exists($IMG_DIR . '/profiles/' . $username . '.png')   ?
                $IMG_DIR . '/profiles/' . $username . '.png'    :
                $IMG_DIR . '/profiles/default.png' ;
?>

<div class="row">
  <?php   include '../common/left_menu.php';  ?>

  <div class="rightContent">
    <h2 class="bigTitle">
      <?php
        if ( $_SESSION['username'] !== $_GET['user'] && isset($_GET['user'])) //é admin a ver outro perfil
          echo "<span>".$userProfile[0]['name']."</span>";
        else
          echo "<span>O meu perfil
                  <a href=\"$BASE_URL/pages/users/edit_profile.php?id=$username\">
                    <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                  </a>
                </span>";
      ?>
    </h2>

    <section id = "content">
      <div class="left">
        <span>
          <strong>Username:</strong>	<?=$userProfile[0]['username'];?> <br />
        </span>
        <span>
          <strong>Nome:</strong>	  	<?=$userProfile[0]['name'];?> <br />
        </span>
        <span>
          <strong>Email:</strong>		  <?=$userProfile[0]['email'];?> <br />
        </span>
        <span>
          <strong>Telefone:</strong>	<?=$userProfile[0]['phone'];?> <br />
        </span>
        <span>
          <strong>Morada:</strong>		<?=$userProfile[0]['address'];?> <br />
        </span>
      </div>
      <div class="right">
        <div class="photo">
          <img src="<?=$photo?>" alt="" />
        </div>
        <div class="changePhoto">
        <!--  <input type="file" id="photoUp" multiple size="50" onchange="uploadPhoto()">-->
        </div>
      </div>
    </section>

    <div class="messages" style="margin-bottom: 20px;">
      <?php include_once('../common/cart_msgs.php'); ?>
    </div>

  </div>
</div>


<?php include '../common/footer.php';?>
