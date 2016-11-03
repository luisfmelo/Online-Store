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

function sortTheBooksNow (){
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

function toggleSearchBar(){
  var elem = document.getElementById("searchBar");

  if ( elem.style.visibility == "hidden" )
  {
    elem.style.width= "300px";
    elem.style.visibility = "visible";
    elem.focus();
    document.getElementById("searchForm").classList.add("expanded");
  }
  else
  {
    elem.style.width= "1px";
    elem.style.visibility = "hidden";
    document.getElementById("searchForm").classList.remove("expanded");
  }
};


function deleteBookAlert(book_ref) {
    
    var r = confirm("Tem a certeza que pretende remover o livro com a referência " + book_ref +  "?" );
	if (r == true) {
		window.location.assign("../../actions/books/delete_book.php?ref=" + book_ref);
	} 
}

function deleteCustomerAlert(username) {
    
    var r = confirm("Tem a certeza que pretende remover o cliente com a referência " + username +  "?" );
	if (r == true) {
		window.location.assign("../../actions/users/eliminate_account.php?ref=" + username);
	} 
}

function stockChangeCheck(ref, page_number) {
	
	console.log(page_number);
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
			window.location.assign("../../actions/books/update_book.php?ref=" + ref + "&price=" + price + "&stock=" + stock + "&page_number=" + page_number);
	}

}



//~ function checkNewBook(title, author, category, price, description, stock){
	
	//~ if ( (title.length < 1) OR (author.lenght < 1) )
		//~ alert("Title and Author must have more than one character");
		
	//~ if (stock < 0)
		//~ alert("Check stock - it must be greater or equal to 0");
	
	//~ price = price.replace(/,/g, '.');
		
	//~ if (price < 0)
		//~ alert("Check price - it must be greater or equal to 0");
	
//~ }	


