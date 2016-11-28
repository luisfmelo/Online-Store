<div class="row">
  {include file='common/left_menu.tpl'}

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Editar Perfil</span>
    </h2>

    <section id = "content">
      <div class="left">
        <form method="POST" action= "{$BASE_URL}/actions/users/change_profile.php" class="myForms" id="editProfile">
    			Nome:  <br />
          <input type = "text" name="name" value="{$PROFILE.0.name}"/><br>
    			Email:  <br />
          <input type = "text"		name="email"	value="{$PROFILE.0.email}"/><br>
    			Telefone:  <br />
          <input type = "text"		name="phone"	value="{$PROFILE.0.phone}"/><br>
    			Morada:  <br />
          <input type = "text"		name="address"	value="{$PROFILE.0.address}"/><br>
    			Password:  <br />
          <input type = "password"	name="password"/><br>
    			Confirmar Password:  <br />
          <input type = "password"	name="confirmPassword"/><br>

          <div class="messages formMessages" style="margin-top: 20px;">
            {*include file='_messages/warn_msgs.tpl'*}
              {include file='_messages/error_msgs.tpl'}
          </div>

          <input type = "submit" name="cmdsubmit" value="Alterar"/>
      	</form>

      </div>
    </section>

  </div>
</div>
