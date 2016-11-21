/*Verifica se a sting é nula */
function isEmpty(str) {
    return (!str || 0 === str.length);
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

/* Cria um novo url com um parametro para ordenar os livros*/
function sortTheBooksNow() {
    var selectedID = event.target.value;
    var url = window.location.href;
    var cleanURL = url.replace(/\?*sort=\w+&/g, "");
    var cleanURL = url.replace(/\&*sort=\w+&*/g, "");

    if (cleanURL.substring(cleanURL.length - 3) == 'php')
        cleanURL += '?sort=' + selectedID;
    else
        cleanURL += '&sort=' + selectedID;
    window.location.assign(cleanURL);
};

/* Cria um novo url com um parametro para ordenar as encomendas*/
function sortOrders(pos){
    var url = window.location.href;
    var cleanURL = url.replace(/\?*sort=\w+&/g, "");
    var cleanURL = url.replace(/\&*sort=\w+&*/g, "");

    if (cleanURL.substring(cleanURL.length - 3) == 'php')
        cleanURL += '?sort=' + pos;
    else
        cleanURL += '&sort=' + pos;
    window.location.assign(cleanURL);
}

/* Cria um novo url com um parametro para numero de livros*/
function sortTheNumberBooksNow() {
    var selectedID = event.target.value;
    var url = window.location.href;
    var cleanURL = url.replace(/\?*number_Books=\w+&/g, "");
    var cleanURL = url.replace(/\&*number_Books=\w+&*/g, "");

    if (cleanURL.substring(cleanURL.length - 3) == 'php')
        cleanURL += '?number_Books=' + selectedID;
    else
        cleanURL += '&number_Books=' + selectedID;

    window.location.assign(cleanURL);
};

/* Faz Toggle à visibilidade da caixa de texto quando deteta click na lupa*/
function toggleSearchBar() {
    var elem = document.getElementById("searchBar");

    if (elem.style.visibility == "hidden") {
        elem.style.width = "300px";
        elem.style.visibility = "visible";
        elem.focus();
        document.getElementById("searchForm").classList.add("expanded");
    } else {
        elem.style.width = "1px";
        elem.style.visibility = "hidden";
        document.getElementById("searchForm").classList.remove("expanded");
    }
};

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
    var r = confirm("Tem a certeza que pretende remover o livro com a referência " + book_ref + "?");
    if ( r )
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

function validateRegister(){
	
	var check = 0;
	
	var username		= document.forms["NewRegist"]["username"].value;
	var name 			= document.forms["NewRegist"]["nome"].value;
	var address			= document.forms["NewRegist"]["morada"].value;
	var phone			= document.forms["NewRegist"]["telefone"].value;
	var email			= document.forms["NewRegist"]["email"].value;
	var password		= document.forms["NewRegist"]["password"].value;
	var confirmPassword	= document.forms["NewRegist"]["confirmPassword"].value;
	

	/**
    * TESTA FORMULARIO
    *   -> Todos os dados devem ser preenchidos
    *   -> passwords iguais
    *   -> minimo 5 caracteres para user e pass
    * 	-> maximo de 15 carateres para o nome
    *   -> telefone deve ter 9 caracteres (numéricos)
    *   -> formato de email correto
    *   -> user unico
    */
    
    if (isEmpty(username) || isEmpty(name) || isEmpty(address)
	    ||isEmpty(phone)  || isEmpty(email)|| isEmpty(password)
	    ||isEmpty(confirmPassword))
			alert("Alguns campos não foram preenchidos");
	
	else if (password !== confirmPassword)
		alert("Passwords não são iguais");
		
	else if (username.length < 6)
		alert("O Username deve ter pelo menos 5 caracteres");
	
	else if (name.length > 15)
		alert("O nome não deve conter mais de 15 carateres");
		
	if (isNaN(Number(phone)) || phone.length !== 9)
		alert("O seu telefone não tem 9 digitos ou contém caracteres inválidos");
		
	else if (password.length < 6)
		alert("A Password deve ter pelo menos 5 caracteres");
	
	else if (!validateEmail(email))
		alert("Email inválido");
		
	else 
		check = 1;
		
	//~ if (check === 1)
		//~ window.location.assign("../../actions/users/register.php?&isAdmin=" + isAdmin
									//~ + "&orderref=" + orderRef);
	
    

}

function validateImage(){
	alert("OLA");
}
