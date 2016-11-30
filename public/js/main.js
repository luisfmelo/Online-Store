$(setup2);

function setup2(){
  /* Show/Hide Search Bar */
  $("#lupa").click(function() {
      $('.searchBar').toggleClass('expanded')
      $('.searchBar').focus();
  });

  /* Filter Books: number per page & order*/
  $('.filter div select').change(function() {
      var params = get_url_params();

      params['sort'] = $("#changeOrderBooks option:selected").val();
      params['number_Books'] = $("#changeNoBooks option:selected").val();
      var url = get_new_url(params);

      $.get( "../../api/getBooks.php?" + url, function( data ) {
          $('#books').html(data);
      });

  });

  /* Sort Order Client*/
  $(".sortOrders").click(function() {
      var params = get_url_params();

      params['sort'] = $(this).hasClass('fa-arrow-down') ? "down" :
                                                           "up";
      var url = get_new_url(params);
      window.location.assign(window.location.href.split('?')[0] + '?' + url);
  });

  $(".favourite").click(function(){
    $(this).find(">:first-child").toggleClass('fa-heart-o').toggleClass('fa-heart');
    var url;
    url = "func=" + (($(this).find(">:first-child").hasClass('fa-heart-o')) ? 'unfavourite' :
                                                                              'favourite');
    var ref = $(this).find(">span").html();
    url = url + "&ref=" + ref;

    $.get( "../../actions/users/change_favourites.php?" + url, function(data){
      console.log(data);
    });
  })

  $('.dropdown').hover(function(){
    $( '.dropdown-content' ).slideDown( "slow" );
  }, function(){
    $( '.dropdown-content' ).slideUp( "slow" );
  });
}

/* Get each GET parameter from URL*/
function get_url_params() {
    var params = {};
    var search = location.search.substring(1);
    search = search.split('&');
    $.each(search, function(key, value) {
        if (value != "") {
            temp = value.split('=');
            params[temp[0]] = temp[1];
        }
    });
    return params;
}

/* Reconstruct URL with old and new parameters*/
function get_new_url(params) {
    var url = ""//window.location.href.split('?')[0] + '?';
    $.each(params, function(key, value) {
        url += key + "=" + value + "&";
    });
    return url;
    //window.location.assign(url);
}










/******************************************************************************/
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
    if (confirm(confirm_str))
        window.location.assign("../../actions/books/delete_book.php?ref=" + book_ref);
}

/* Pede confirmação para eliminar um user */
function deleteCustomerAlert(username) {
    var confirm_str = "Tem a certeza que pretende remover o cliente com a referência " + username + "?";
    if (confirm(confirm_str))
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
    if (isNaN(Number(price)) || isNaN(Number(stock))) {
        alert("O preço e o stock não devem conter letras.");
        can_update = 0;
    }

    /* price must be greater than 0*/
    if (price <= 0) {
        alert("O preço deve ser maior que 0.");
        can_update = 0;
    }

    /* stock must be equal or greater than 0*/
    if (stock < 0) {
        alert("O stock deve ser um número não-negativo");
        can_update = 0;
    }

    if (can_update == 1) {
        var r = confirm("Pretende gravar o livro (referência " + ref + ") com stock=" + stock + " e preço=" + price + " ?");
        if (r == true)
            window.location.assign("../../actions/books/update_book.php?ref=" + ref + "&price=" + price + "&stock=" + stock + "&page=" + page);
    }
}

/* Pede confirmação para mudança de estado de uma encomenda */
function alertStateChange(orderRef, isAdmin) {

    var r;

    r = (isAdmin == 1) ? confirm("Pretende alterar o estado da encomenda " + orderRef + " para ENVIADO?") :
                         confirm("Confirma que recebeu a encomenda " + orderRef + "?");

    if (r == true)
        window.location.assign("../../actions/orders/change_order_state.php?&isAdmin=" + isAdmin +
            "&orderref=" + orderRef);
}
