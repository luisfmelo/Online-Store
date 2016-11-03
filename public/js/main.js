/*var url = window.location.search;
url = url.substring(1);
var elems = url.split('&');
var params;

var data = {
    selectionID: selectedID
};

for (var i = 0; i < elems.length; i++)
{
    params = elems[i].split("=");
    data[params[0]] = params[1];
}*/

function sortTheBooksNow() {
    var selectedID = event.target.value;
    var url = window.location.href;
    var cleanURL = url.replace(/\?*sort=\w+&/g, "");
    var cleanURL = url.replace(/\&*sort=\w+&*/g, "");

    console.log(cleanURL);

    if (cleanURL.substring(cleanURL.length - 3) == 'php')
        cleanURL += '?sort=' + selectedID;
    else
        cleanURL += '&sort=' + selectedID;
    window.location.assign(cleanURL);
};

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


function deleteBookAlert(book_ref) {

    var r = confirm("Tem a certeza que pretende remover o livro com a referência " + book_ref + "?");
    if (r == true) {
        window.location.assign("../../actions/books/delete_book.php?ref=" + book_ref);
    }
}

function deleteCustomerAlert(username) {

    var r = confirm("Tem a certeza que pretende remover o cliente com a referência " + username + "?");
    if (r == true) {
        window.location.assign("../../actions/users/eliminate_account.php?ref=" + username);
    }
}

function stockChangeCheck(ref, page) {
	
	var row = document.getElementsByClassName(ref)[0];
	var price = row.getElementsByTagName('input')[0].value;
	var stock = row.getElementsByTagName('input')[1].value;
	var can_update = 1;
	
	/* price - replace , for . */
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


