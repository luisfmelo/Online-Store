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



/* Verificação dos dados de um novo livro do lado do administrador */
function NewBookCheck(){
	var tmp = $('#newBook')[0];
	var BookForm = {};
	var msg = "";

	for (var i= 0; i < 6; i++)
		BookForm[tmp[i].name] = tmp[i].value;

	BookForm.price = BookForm.price.replace(/,/g, '.');

	if( (BookForm.title.length == 0) || (BookForm.author.length == 0) )
		msg = "Titulo e Autor têm de ser preenchidos obrigatoriamente.";
	else if ( BookForm.price === "" || BookForm.stock === "" )
		msg = "O preço e o stock devem ser preenchidos.";
	else if ( isNaN(Number(BookForm.price)) || isNaN(parseInt(BookForm.stock) ) )
		msg = "O preço e o stock não devem conter letras.";
	else if (BookForm.stock < 0)
		msg = "Stock deve ser um número positivo ou 0.";
	else if (BookForm.price <= 0)
		msg = "Preço deve ser um valor positivo.";

	if ( msg !== "" )
	{
		$('.formMessages').html("<div class='errorMsg'><i class='fa fa-exclamation-circle' aria-hidden='true'></i> "+msg+"</div>");
		return;
	}

	$('.formMessages').html("");

	var r = confirm("Confirma que pretende criar um novo livro com o titulo \'"
							+ BookForm.title + "\', o autor " + BookForm.author + ", com stock de "
							+ BookForm.stock + " e o preço " + BookForm.price + " ?");
	if ( r )
		window.location.assign("../../actions/books/add_book.php?title=" + encodeURIComponent(BookForm.title) +
																													 "&author=" + encodeURIComponent(BookForm.author) +
																													 "&description=" + encodeURIComponent(BookForm.description) +
																													 "&category=" + encodeURIComponent(BookForm.category) +
																													 "&price=" + encodeURIComponent(BookForm.price) +
																													 "&stock=" + encodeURIComponent(BookForm.stock));
}



/* Verificação dos dados de um livro editado por um administrador */
function EditBookCheck(ref){
	var tmp = $('#editBook')[0];
	var BookForm = {};
	var msg = "";

	for (var i= 0; i < 6; i++)
		BookForm[tmp[i].name] = tmp[i].value;

	BookForm.price = BookForm.price.replace(/,/g, '.');

	if( (BookForm.title.length == 0) || (BookForm.author.length == 0) )
		msg = "Titulo e Autor têm de ser preenchidos obrigatoriamente.";
	else if ( BookForm.price === "" || BookForm.stock === "" )
		msg = "O preço e o stock devem ser preenchidos.";
	else if ( isNaN(Number(BookForm.price)) || isNaN(parseInt(BookForm.stock) ) )
		msg = "O preço e o stock não devem conter letras.";
	else if (BookForm.stock < 0)
		msg = "Stock deve ser um número positivo ou 0.";
	else if (BookForm.price <= 0)
		msg = "Preço deve ser um valor positivo.";

	if ( msg !== "" )
	{
		$('.formMessages').html("<div class='errorMsg'><i class='fa fa-exclamation-circle' aria-hidden='true'></i> "+msg+"</div>");
		return;
	}

	$('.formMessages').html("");

	var r = confirm("Confirma as alterações?");
	if ( r )
		window.location.assign("../../actions/books/change_book.php?id=" + encodeURIComponent(ref) +
																													  "&title=" + encodeURIComponent(BookForm.title) +
																													  "&author=" + encodeURIComponent(BookForm.author) +
																												 	  "&description=" + encodeURIComponent(BookForm.description) +
																												 	  "&category=" + encodeURIComponent(BookForm.category) +
																													  "&price=" + encodeURIComponent(BookForm.price) +
																													  "&stock=" + encodeURIComponent(BookForm.stock));
}
