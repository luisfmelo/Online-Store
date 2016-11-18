<div class="row">
  {include file='common/left_menu.tpl'}

  <div class="rightContent">
    <h2 class="bigTitle">
    {if $USERNAME != $smarty.get.user && $smarty.get.user != ''}
      <span>{$PROFILE.0.name}</span>
    {else}
      <span>O meu perfil
        <a href="{$BASE_URL}/pages/users/edit_profile.php?id={$USERNAME}">
          <i class='fa fa-pencil' aria-hidden='true'></i>
        </a>
      </span>
      {/if}
    </h2>

    <section id = "content">
      <div class="left">
        <span>
          <strong>Username:</strong>	{$PROFILE.0.username} <br />
        </span>
        <span>
          <strong>Nome:</strong>	  	{$PROFILE.0.name} <br />
        </span>
        <span>
          <strong>Email:</strong>		  {$PROFILE.0.email} <br />
        </span>
        <span>
          <strong>Telefone:</strong>	{$PROFILE.0.phone} <br />
        </span>
        <span>
          <strong>Morada:</strong>		{$PROFILE.0.address} <br />
        </span>
      </div>
      <div class="right">
        <div class="photo">
          <img src="{$PHOTO}" alt="" />
        </div>
        <div class="changePhoto">
        <!--  <input type="file" id="photoUp" multiple size="50" onchange="uploadPhoto()">-->
        </div>
      </div>
    </section>

    <div class="messages" style="margin-bottom: 20px;">
      {include file='_messages/warn_msgs.tpl'}
    </div>
  </div>
</div>
