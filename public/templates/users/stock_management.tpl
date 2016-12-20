<div class="row">
	{include file='common/left_menu.tpl'}

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>Gerir Stock</span>
    </h2>
		<table class="gerir">
			<tr>
				<th> Ref	</th>
				<th> Título		</th>
				<th> Preço 		</th>
				<th> Stock		</th>
				<th> 			</th>
				<th> 			</th>
				<th> 			</th>
			</tr>
			{foreach $BOOKS as $book}
				<tr class='{$book.ref}'>
					<td class='linkToUser'><a href='{$BASE_URL}/pages/books/view_book.php?id={$book.ref}'>{$book.ref}</a></td>
					<td class='linkToUser'><a href='{$BASE_URL}/pages/books/view_book.php?id={$book.ref}'>{$book.title}</a></td>
					<td> <input class='stock_input' type='text' name='stock' value='{$book.price}'> </td>
					<td> <input class='stock_input' type='text' name='stock' value='{$book.stock}'> </td>
				{if !$book.active}
					<td> <i class="fa fa-plus-circle stateChange" aria-hidden="true"></i> </td>
				{else}
					<td> <i class="fa fa-trash stateChange" aria-hidden="true"></i> </td></td>
				{/if}
					<td> <i onclick="stockChangeCheck('{$book.ref}', '{$PAGE}')" class="fa fa-floppy-o" aria-hidden="true"> </i> </td>
			 </tr>
			{/foreach}
		</table>

		<div class="row arrows">

		{if $PAGE != 1}
			<a href="{$BASE_URL}/pages/users/stock_management.php?page={$PREVIOUS}">
				<i class='fa fa-angle-double-left' aria-hidden='true'></i>
			</a>
		{/if}
		{if $MAX_NO_PAGE > 1}
			{for $i=1 to $MAX_NO_PAGE}
				{if $i == $PAGE}
					<a class="pageNumberSelected" href="{$BASE_URL}/pages/users/stock_management.php?page={$i}"> {$i} </a>
				{else}
					<a class="pageNumber" href="{$BASE_URL}/pages/users/stock_management.php?page={$i}"> {$i} </a>
				{/if}
			{/for}
		{/if}
		{if $NEXT != "NOTHING_TO_SHOW"}
			<a href="{$BASE_URL}/pages/users/stock_management.php?page={$NEXT}">
				<i class='fa fa-angle-double-right' aria-hidden='true'></i>
			</a>
		{/if}
		</div>
		<a class="divlink row" href="{$BASE_URL}/pages/books/new_book.php" id="registLink" > Novo Livro </a>
</div>
