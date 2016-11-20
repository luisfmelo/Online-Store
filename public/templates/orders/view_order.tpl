<div class ="row">
	{include file='common/left_menu.tpl'}
	
	<div class="rightContent">
		
		<h2 class="bigTitle">
		  <span>Encomenda: {$ID} </span>
		</h2>
		
		<table class="gerir gerirClientes">
			<tr>
				<th> Livro	</th>
				<th> Titulo		</th>
				<th> Preço		</th>
				<th> Quantidade	</th>
			</tr>
		
			{foreach $ORDER as $info}
				<tr>
					<td class='linkToUser'> <a href='../books/view_book.php?id={$info.ref}'> {$info.ref} </a></td>			
					<td> {$info.title}		</td>
					<td> {$info.price}€		</td>
					<td> {$info.quantity}	</td>
				 </tr>
			{/foreach}
		</table>
		
		
		<div class="orderInfo left">
			<span>
				<strong> Data da encomenda: </strong> {$ORDER[0].orderdate} <br />
			</span>
			
			{if ( !is_null($ORDER[0].deliverydate) )}
				<span>
					<strong>Data de entrega:</strong> {$ORDER[0].deliverydate} <br />
				</span>
			{/if}
			<span>
				<strong>Valor Total:</strong> {$ORDER[0].price} €<br />
			</span>
		</div>
	
	</div>
</div>


