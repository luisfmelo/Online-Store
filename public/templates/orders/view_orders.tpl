<div class="row">
	<div class="rightContent">

		<h2 class="bigTitle">
		  
		  {if ($ISADMIN)}
			<span>Gerir Encomendas</span>
		  {else}
			<span>Minhas Encomendas</span>
		  {/if}
		  
		</h2>


		<table class="gerir">
				<tr>
					<th> Referência			</th>

					{if ($ISADMIN == 1)}
						<th> Cliente
								<i class='fa fa-arrow-down' aria-hidden='true' onclick='sortOrders("down")'></i>
								<i class='fa fa-arrow-up' aria-hidden='true' onclick='sortOrders("up")'></i>
						</th>
					{/if }
						<th> Data de encomenda	</th>
						<th> Data de entrega	</th>
						<th> Estado				</th>
						<th style="border-bottom:0x;"> </th>

				</tr>
				
				{if (count($ORDERS) == 0)}
					<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
				{/if}
				
				
				{foreach $ORDERS as $order} 
					<tr>
						<td class='linkToUser'> <a href='../orders/view_order.php?id={$order.ref}'> {$order.ref} </a></td>
						
						{if ($ISADMIN)}
							<td class='linkToUser'><a href='../users/view_profile.php?user={$order.username}'> {$order.username} </a></td>
						{/if}
			
						<td> {$order.orderdate}			</td>
						<td> {$order.deliverydate}	   	</td>
						<td> {$order.orderstatename}	</td>
				

						{if ( $ISADMIN && ($order.orderstatename == "PENDENTE"))}
							<td style='border-bottom:0x;'><a class='btn' onclick="alertStateChange({$order.ref}, {$ISADMIN} )" > Enviar </td>
						{else if ( !$ISADMIN && ($order.orderstatename == "ENVIADO"))}
							<td style='border-bottom:0x;'><a class='btn' onclick="alertStateChange({$order.ref}, {$ISADMIN} )" > Receber </td>
						{else}
							<td> </td>
						{/if}
	
					</tr>
				
			   {/foreach}

		</table>

	</div>
</div>
