$(setup);

/*Verifica se a sting é nula */
function isEmpty(str) {
    return (!str || 0 === str.length);
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


validateUserData = function(){
  var tmp = $(this)[0];
  var UserForm = {};
  var msg = "";

  for (var i= 0; i < 6; i++)
    UserForm[tmp[i].name] = tmp[i].value;

console.log(UserForm)


  if( UserForm.name.length === 0 )
    msg = "O Nome deve ser preenchido.";
  else if( UserForm.name.length > 32 )
    msg = "O Nome não pode exceder 32 caracteres.";
  else if( UserForm.address.length === 0 )
    msg = "A morada deve ser preenchido.";
  else if( UserForm.phone.length === 0 )
    msg = "O Telefone deve ser preenchido.";
  else if (isNaN(Number(UserForm.phone)) || UserForm.phone.length !== 9)
    msg = "Número de telefone Inválido.";
  else if( UserForm.email.length === 0 )
    msg = "O Email deve ser preenchido.";
  else if (!validateEmail(UserForm.email))
    msg = "Email Inválido.";
  else
    return;

  $('.formMessages').html("<div class='errorMsg'><i class='fa fa-exclamation-circle' aria-hidden='true'></i> "+msg+"</div>");

  event.preventDefault();
};




function setup(){
	/**
	  * TESTA FORMULARIO
	  *   -> Todos os dados devem ser preenchidos
	  *   -> minimo 5 caracteres para user
	  * 	-> maximo de 15 carateres para o nome
	  *   -> telefone deve ter 9 caracteres (numéricos)
	  *   -> formato de email correto
	  */
	$( "#newRegist" ).submit( validateUserData );
  $( "#editProfile" ).submit( validateUserData );


	/* Verificação dos dados de um novo livro do lado do administrador */
	function NewBookCheck(){
		var tmp = $('#newBook')[0];
		var BookForm = {};
		var msg = "";

		for (var i= 0; i < 6; i++)
			BookForm[tmp[i].name] = tmp[i].value;

		BookForm.price = BookForm.price.replace(/,/g, '.');

		if( (BookForm.title.length === 0) || (BookForm.author.length === 0) )
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

		var r = confirm("Confirma que pretende criar um novo livro com o titulo \'" +
								 BookForm.title + "\', o autor " + BookForm.author + ", com stock de " +
								 BookForm.stock + " e o preço " + BookForm.price + " ?");
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

		if( (BookForm.title.length === 0) || (BookForm.author.length === 0) )
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

}
