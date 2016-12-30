<div class="row">
	{include file='common/left_menu.tpl'}

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Gerir Clientes</span>
    </h2>
		<table class="gerir gerirClientes">
			<tr>
				<th> Username	</th>
				<th> Name		</th>
				<th> Email		</th>
				<th> Telefone	</th>
				<th> Morada		</th>
			</tr>
			{foreach $CUSTOMERS as $customer}
				<tr>
					<td class='linkToUser'><a href='view_profile.php?user={$customer.username}'>{$customer.username}</a></td>
					<td>{$customer.name}</td>
					<td>{$customer.email}</td>
					<td>{$customer.phone}</td>
					<td>{$customer.address}</td>
				</tr>
			{/foreach}
		</table>
</div>
