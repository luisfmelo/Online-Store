<div class="row">
  {include file='common/left_menu.tpl'}

  <div class="rightContent">
    <h2 class="bigTitle">
      <span>O meu Carrinho de Compras</span>
      <i class="fa fa-refresh" aria-hidden="true" onclick="updateCart(false)"></i>
    </h2>

    <section id="cart">
    {*if $CART_COUNTER != 0 *}
      {foreach $CART_ITEMS as $item}
        <article class='cartItem row'>
          <img class='cover' src='{$item.cover}'/>

          <div class='book-data'>
            <span class='title'>{$item.title}</span>
              <i class='fa fa-trash' aria-hidden='true' onclick="deleteItem('{$item.ref}', '{$item.title}')"></i><br />
              <span class='author'>{$item.author}</span><br /><br />
              <small class='cartQtt'>
                Quantidade:
                <input type='text' name='{$item.ref}' value='{$item.qnt}'>
              </small>
          </div>

          <div class='addBtn'>
          {if $item.stock == 0}
            {*}<span class='price'>€ 0</span><br />*}
            <span class='soldOut'>
              <small>Esgotado</small>
            </span>
            {$WARN_MESSAGE = "Nem todos os livros serão expedidos"}
          {else if $item.stock < $item.qnt }
            <span class='price'>€ {$item.price * $item.stock}</span><br />
            <span class='warningStock'>
              <small>Stock Insuficiente<br />({$item.stock} unidades)</small>
            </span>
            {$WARN_MESSAGE = "Nem todos os livros serão expedidos"}
          {else}
            <span class='price'>€ {$item.price * $item.qnt} </span><br / />
            <span class='inStock'>
              <small>Em Stock</small>
            </span>
          {/if}
          </div>
        </article>
      {/foreach}
    {*/if*}
    </section>

    <div class="messages" style="margin-bottom: 20px;">
      {include file='_messages/warn_msgs.tpl'}
    </div>
  </div>
</div>


<div class="checkout">
  <div class="checkoutRow">
    <div>
      <strong>Portes de Envio: </strong>
    </div>
    <div>
      Grátis <br />
    </div>
  </div>
  <div class="checkoutRow">
    <div>
      <strong>Total: </strong>
    </div>
    <div>
      {$TOTAL} €
    </div>
  </div>
  <div>
    <a onclick="updateCart(1)" id="checkoutBtn" class='btn'>
      Checkout
    </a>
  </div>
</div>
