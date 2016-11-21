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
