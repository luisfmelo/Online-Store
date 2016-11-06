<?php
  include '../common/header.php';
  include_once('../../database/users.php');

  $username = $_SESSION['username'];

  $userProfile = getUserByUsername($username);
  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
?>

<div class="row">
  <?php   include '../common/left_menu.php';  ?>

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Editar Perfil</span>
    </h2>

    <section id = "content">
      <div class="left">
        <form method="POST" action= "<?=$BASE_URL?>/actions/users/change_profile.php" class="myForms" id="editProfile">
    			Nome:  <br />
          <input type = "text" name="name" value="<?=$userProfile[0]['name']?>"/><br>
    			Email:  <br />
          <input type = "text"		name="email"	value="<?=$userProfile[0]['email']?>"/><br>
    			Telefone:  <br />
          <input type = "text"		name="phone"	value="<?=$userProfile[0]['phone']?>"/><br>
    			Morada:  <br />
          <input type = "text"		name="address"	value="<?=$userProfile[0]['address']?>"/><br>
    			Password:  <br />
          <input type = "password"	name="password"/><br>
    			Confirmar Password:  <br />
          <input type = "password"	name="confirmPassword"/><br>

    			<input type = "submit" name="cmdsubmit" value="Alterar"/>

    		</form>
      </div>
    </section>

    <div class="messages" style="margin-bottom: 20px;">
      <?php include_once('../_messages/warn_msgs.php'); ?>
    </div>

  </div>
</div>
<?php include '../common/footer.php';?>
