/* Show/Hide Search Bar */
$("#lupa").click(function() {
  $('.searchBar').toggleClass('expanded')
  $('.searchBar').focus();
});

/* Filter Books: number per page & order*/
$('.filter div select').change(function(){
  var params = get_url_params();

  params['sort'] = $( "#changeOrderBooks option:selected" ).val();
  params['number_Books'] = $( "#changeNoBooks option:selected" ).val();
  redirect_url(params);
});

/* Sort Order Client*/
$(".sortOrders").click(function() {
  var params = get_url_params();

  params['sort'] = $(this).hasClass('fa-arrow-down')? "down" :
                                                      "up";
  redirect_url(params);
});


/* Get each GET parameter from URL*/
function get_url_params(){
  var params = {};
  var search = location.search.substring(1);
  search = search.split('&');
  $.each( search, function( key, value ) {
    if ( value != "" )
    {
      temp = value.split('=');
      params[temp[0]] = temp[1];
    }
  });
  return params;
}

/* Reconstruct URL with old and new parameters*/
function redirect_url(params){
  var url = window.location.href.split('?')[0] + '?';
  $.each( params, function( key, value ) {
    url += key + "=" + value + "&";
  });
  window.location.assign(url);
}


/* Informa a action sobre o modo a proceder */
function updateCart(checkout) {
    var inputs, index;
    var cart = document.getElementById('cart');
    var url = "../../actions/orders/update_cart.php?";

    inputs = cart.getElementsByTagName('input');

    for (index = 0; index < inputs.length; ++index)
        if (Number(inputs[index].value) >= 0)
            url += inputs[index].name + "=" + inputs[index].value + '&';

    if (inputs.length == 0)
        url += "checkout=-1";
    else if (checkout == 1)
        url += "checkout=1"
    else
        url += "checkout=0";

    window.location.assign(url);
};

/* Pede confirmação para eliminar um livro */
function deleteBookAlert(book_ref) {
    var confirm_str = "Tem a certeza que pretende remover o livro com a referência " + book_ref + "?";
    if ( confirm(confirm_str) )
        window.location.assign("../../actions/books/delete_book.php?ref=" + book_ref);
}

/* Pede confirmação para eliminar um user */
function deleteCustomerAlert(username) {
    var r = confirm("Tem a certeza que pretende remover o cliente com a referência " + username + "?");
    if ( r )
        window.location.assign("../../actions/users/eliminate_account.php?ref=" + username);
}

function stockChangeCheck(ref, page) {
	var row = document.getElementsByClassName(ref)[0];
	var price = row.getElementsByTagName('input')[0].value;
	var stock = row.getElementsByTagName('input')[1].value;
	var can_update = 1;

	/* price - replace ',' for '.' */
    price = price.replace(/,/g, '.');

	/* check if price and stock contain letters */
	if (isNaN(Number(price)) || isNaN(Number(stock)) ){
		alert("O preço e o stock não devem conter letras.");
		can_update = 0;
	}

	/* price must be greater than 0*/
	if ( price <= 0){
		alert ("O preço deve ser maior que 0.");
		can_update = 0;
	}

	/* stock must be equal or greater than 0*/
	if ( stock < 0 ){
		alert ("O stock deve ser um número não-negativo");
		can_update = 0;
	}

	if (can_update == 1){
		var r = confirm("Pretende gravar o livro (referência " + ref + ") com stock=" + stock + " e preço=" + price +" ?");
		if (r == true)
			window.location.assign("../../actions/books/update_book.php?ref=" + ref + "&price=" + price + "&stock=" + stock + "&page=" + page);
	}
}

/* Verificação dos dados de um novo livro do lado do cliente */
function NewBookCheck(){

	var title 		= BookForm.title.value;
	var author 		= BookForm.author.value;
	var description = BookForm.description.value;
	var category	= BookForm.category.value;
	var price 		= BookForm.price.value;
	var stock 		= BookForm.stock.value;

	var can_create = 1;

	/* title and author can't be null */
	if( (title.length==0) || (author.length==0) ){
		alert("Titulo e Autor têm de ser preenchidos obrigatoriamente.");
		can_create = 0;
	}

	/* price - replace , for . */
    price = price.replace(/,/g, '.');
    console.log(price);

	/* check if stock and price are not letters */
	if (isNaN(Number(price)) || isNaN(Number(stock)) ){
		alert("O preço e o stock não devem conter letras.");
		can_update = 0;
	}

	/* stock must be a positive value */
	if (stock < 0){
		alert("Stock deve ser um número positivo.");
		can_create = 0;
	}

	/*price must be a positive value */
	if (price <= 0){
		alert("Preço deve ser um valor positivo.");
		can_create = 0;
	}

	if (can_create == 1){
		var r = confirm("Confirma que pretende criar um novo livro com o titulo "
        				+ title + ", o autor " + author + ", com stock de "
        				+ stock + " e o preço " + price + " ?");
		if (r == true)
			window.location.assign("../../actions/books/add_book.php?&title=" + title
									+ "&author=" + author + "&description=" + description
									+ "&category=" + category + "&price=" + price
									+ "&stock=" + stock);
	}
}

/* Pede confirmação para mudança de estado de uma encomenda */
function alertStateChange(orderRef, isAdmin){

	var r;

	if (isAdmin == 1)
		r = confirm("Pretende alterar o estado da encomenda " + orderRef + " para ENVIADO?");
	else
		r = confirm("Confirma que recebeu a encomenda " + orderRef + "?");

	console.log(isAdmin);
	console.log(orderRef);
	if (r==true)
		window.location.assign("../../actions/orders/change_order_state.php?&isAdmin=" + isAdmin
									+ "&orderref=" + orderRef);
}
