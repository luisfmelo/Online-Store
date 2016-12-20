$(setup2);

function setup2() {
    $(".messages").children().slideDown()

    /* Show/Hide Search Bar */
    $('#lupa').on('click', function() {
        $('.searchBar').toggleClass('expanded')
        $('.searchBar').focus();
    });

    /* Sort Order Client*/
    $(".sortOrders").on('click', function() {
        var params = get_url_params();

        params['sort'] = $(this).hasClass('fa-arrow-down')
            ? "down"
            : "up";
        var url = get_new_url(params);
        window.location.assign(window.location.href.split('?')[0] + '?' + url);
    });


// Handle livros Favoritos - same as .click() -> data loaded by ajax call
    $(document).delegate(".favourite","click",function(){
        $(this).find(">:first-child").toggleClass('fa-heart-o').toggleClass('fa-heart');
        var url;
        url = "func=" + (($(this).find(">:first-child").hasClass('fa-heart-o'))
                                                                ? 'unfavourite'
                                                                : 'favourite');
        var ref = $(this).find(">span").html();
        url = url + "&ref=" + ref;

        $.get("../../actions/users/change_favourites.php?" + url, function(data) {
            console.log(data);
        });
    });

    $('.dropdown').hover(function() {
        $('.dropdown-content').slideDown("slow");
    }, function() {
        $('.dropdown-content').slideUp("slow");
    });

    /* Remove Item from Cart */
    $(".cartRemove").on('click', function() {
        url = window.location.origin + "/Online-Store/public/actions/orders/delete_book.php?ref=" + $(this).attr('ref');
        $(this).parent().parent().fadeOut("fast", function() {
            window.location.assign(url);
        });
    });

    /* Atualiza Carrinho de Compras */
    $('#refresh').on('click', function() {
        var cart = $('#cart :input');
        var err = 0;
        var url = "../../actions/orders/update_cart.php?";

        cart.each(function() {
            if (Number($(this).val()) >= 0)
                url += $(this)[0].name + "=" + $(this).val() + '&';
            else {
                err = 1;
            }
        }).promise().done(function() {
            err
                ? window.location.assign("../../actions/orders/update_cart.php?error")
                : window.location.assign(url);
        });

    });

    /* Checkout */
    $('#checkoutBtn').on('click', function() {
        var inputs,
            index;
        var cart = $('#cart :input');
        var url = "../../actions/orders/checkout.php?";

        cart.each(function() {
            if (Number($(this).val()) >= 0)
                url += $(this)[0].name + "=" + $(this).val() + '&';
            }
        );
        window.location.assign(url);
    });

    $('.stateChange').on('click', function() {
        var book_ref = $(this).parent().parent().attr('class');
        $.get("../../actions/books/changeBookState.php?ref=" + book_ref);
        $(this).toggleClass('fa-trash').toggleClass('fa-plus-circle');

        var msg = ' Livro com referência ' + book_ref;
            msg += $(this).hasClass('fa-trash') ? 'novamente disponivel' : ' descontinuado';

        var tpl = "<div class='infoMsg' style='display:none'>";
        tpl += "<i class='fa fa-exclamation-circle' aria-hidden='true'></i>";
        tpl += msg;
        tpl += "<a class='close' href='#'>X</a>";
        tpl += "</div>";

      // Adiciona mensagem de informaçao
        $('.messages').html(tpl);

      // animações
        $(".messages").animate({
            'margin-bottom': '-20px'
        }, {
            duration: 1500,
            queue: false,
            complete: function() {
                $(this).animate({
                    'margin-bottom': '20px'
                }, {
                    duration: 1500,
                    queue: false
                });
            }
        });

        $(".messages").children().slideDown({
            duration: 1500,
            queue: false,
            complete: function() {
                $(this).slideUp({duration: 1500, queue: false});
            }
        });
    });

    $('.close').on('click', function() {
        $(this).parent().slideUp("slow");
    });



        $(document).delegate('.arrows .pageNumber', 'click', function(){
            $('#futurePage').html($(this).html());
        });

        $(document).delegate('.arrows a .fa-angle-double-right', 'click', function(){
            var pg = Number($('#futurePage').html());
            $('#futurePage').html(pg + 1);
        });

        $(document).delegate('.arrows a .fa-angle-double-left', 'click', function(){
            var pg = Number($('#futurePage').html());
            $('#futurePage').html(pg - 1);
        });



//
    $(document).delegate('.arrows a:not(.pageNumberSelected)', 'click', ajaxCall);


    /* Filter Books: number per page & order*/
    $('.filter div select').change(ajaxCall);




}
/* End of jquery functionalities */

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
    var url = "" //window.location.href.split('?')[0] + '?';
    $.each(params, function(key, value) {
        url += key + "=" + value + "&";
    });
    return url;
    //window.location.assign(url);
}


function ajaxCall() {
    var params = get_url_params();

    params['sort']          = $('#changeOrderBooks option:selected').val();
    params['number_Books']  = $('#changeNoBooks option:selected').val();
    params['page']          = ($('#futurePage').html() == undefined) ? 1 :
                                                                       $('#futurePage').html();

console.log($('#futurePage').html())
    var url = get_new_url(params);
    var html = "";
    var pag = "";

    $.get("../../api/getBooks.php?" + url, function(data) {
        json = JSON.parse(data);

        console.log(json);
        var favs = $.map(json.fav, function(value, index) {
                        return [value];
                    });
        $.each( json.livros, function( i, book ) {

            $.get("../../images/covers/" + book.ref + ".png")
                .done(function() {
                    src = "../../images/covers/" + book.ref + ".png";
                }).fail(function() {
                    src = "../../images/covers/default.png";
                }).always(function(){

                    html += "<article class='book'>";
                    html +=   "<a href='../../pages/books/view_book.php?id=" + book.ref + "'>";
                    html +=     "<img class='cover' src='"+src+"'>";
                    html +=   "</a>";
                    html +=   "<div class='book-data'>";
                    html +=   "<span class='title'>";
                    html +=     "<a href='../../pages/books/view_book.php?id="+book.ref+"' class='titleLink'>";
                    html +=       book.title;
                    html +=     "</a>";
                    html +=     "</span><br />";
                    html +=     "<span class='author'>"+book.author+"</span><br />";
                    html +=     "<span class='descript'>"+book.description+"</span><br />";
                    html +=   "</div>";
                    html +=   "<div class='addBtn'>";
                    html +=     "<span class='price'>€ "+book.price+"</span><br />";
                  if ( json.admin == 0){
                    if ( book.stock != 0 ){
                    html +=     "<a class='btn' href='../../actions/orders/add_book_to_cart.php?id="+book.ref+"'>";
                    html +=         "<i class='fa fa-cart-plus' aria-hidden='true'></i>";
                    html +=         "Adicionar";
                    html +=     "</a>";
                    html +=     "<span class='inStock'>";
                    html +=        "<small>Em Stock</small>";
                    html +=     "</span>";
                    }else {
                    html +=     "<span class='soldOut'>";
                    html +=         "<small>Esgotado</small>";
                    html +=     "</span>";
                    }
                 }

                  // Favoritos
                  html +=     "<a class= 'favourite'>";
                  if ( favs.indexOf(book.ref) != -1 )
                    html +=       "<i class='fa fa-heart' aria-hidden='true'></i>";
                  else
                    html +=       "<i class='fa fa-heart-o' aria-hidden='true'></i>";
                  html +=          "<span hidden>"+book.ref+"</span>"
                  html +=      "</a>";
                  html +=   "</div>";
                  html += "</article>";

                  $('#books').html(html);
                });

      });

      var content = "";
      var max_no_page = Math.ceil(Number(json.totalBooks)/ Number(json.nbooks));

      console.log(max_no_page)

      if ( json.page != 1 ){
        content += "<a>";
        content +=     "<i class='fa fa-angle-double-left' aria-hidden='true'></i>";
        content += "</a>";
      }

      if (max_no_page > 1 )
          for (var i = 1; i<= max_no_page; i++){
            if ( i == json.page )
            //console.log("ATUAL")
              content += "<a class='pageNumberSelected'> " + i + " </a>";
            else
            //console.log("OUTRAS");//
                content += "<a class='pageNumber'> " + i + " </a>";
          }

      if (json.page != max_no_page){
          content += "<a>";
          content +=   "<i class='fa fa-angle-double-right' aria-hidden='true'></i>";
          content += "</a>";
      }
      $('.arrows').html(content);

    });
}

/******************************************************************************/
/* Informa a action sobre o modo a proceder *
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

    r = (isAdmin == 1)
        ? confirm("Pretende alterar o estado da encomenda " + orderRef + " para ENVIADO?")
        : confirm("Confirma que recebeu a encomenda " + orderRef + "?");

    if (r == true)
        window.location.assign("../../actions/orders/change_order_state.php?&isAdmin=" + isAdmin + "&orderref=" + orderRef);
    }
