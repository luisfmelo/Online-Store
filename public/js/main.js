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
