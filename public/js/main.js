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

//~ function checkNewBook(title, author, category, price, description, stock){
	
	//~ if ( (title.length < 1) OR (author.lenght < 1) )
		//~ alert("Title and Author must have more than one character");
		
	//~ if (stock < 0)
		//~ alert("Check stock - it must be greater or equal to 0");
	
	//~ price = price.replace(/,/g, '.');
		
	//~ if (price < 0)
		//~ alert("Check price - it must be greater or equal to 0");
	
//~ }	


