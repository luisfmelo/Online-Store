/*Verifica se a sting é nula */
function isEmpty(str) {
    return (!str || 0 === str.length);
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
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
