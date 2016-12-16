$(setup2);

function setup2() {
    $(".messages").children().slideDown()

    /* Show/Hide Search Bar */
    $('#lupa').click(function() {
        $('.searchBar').toggleClass('expanded')
        $('.searchBar').focus();
    });

    /* Filter Books: number per page & order*/
    $('.filter div select').change(function() {
        var params = get_url_params();

        params['sort'] = $('#changeOrderBooks option:selected').val();
        params['number_Books'] = $('#changeNoBooks option:selected').val();
        var url = get_new_url(params);

        $.get("../../api/getBooks.php?" + url, function(data) {
            $('#books').html(data);
        });

    });

    /* Sort Order Client*/
    $(".sortOrders").click(function() {
        var params = get_url_params();

        params['sort'] = $(this).hasClass('fa-arrow-down')
            ? "down"
            : "up";
        var url = get_new_url(params);
        window.location.assign(window.location.href.split('?')[0] + '?' + url);
    });

    $(".favourite").click(function() {
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
    })

    $('.dropdown').hover(function() {
        $('.dropdown-content').slideDown("slow");
    }, function() {
        $('.dropdown-content').slideUp("slow");
    });

    /* Remove Item from Cart */
    $(".cartRemove").click(function() {
        url = window.location.origin + "/Online-Store/public/actions/orders/delete_book.php?ref=" + $(this).attr('ref');
        $(this).parent().parent().fadeOut("fast", function() {
            window.location.assign(url);
        });
    });

    /* Atualiza Carrinho de Compras */
    $('#refresh').click(function() {
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
    $('#checkoutBtn').click(function() {
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

    $('.stateChange').click(function() {
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

    $('.close').click(function() {
        $(this).parent().slideUp("slow");
    });

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
