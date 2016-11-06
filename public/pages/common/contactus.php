<?php
  include_once '../common/header.php';
    include_once '../../config/init.php';
?>


<div class="row">
  <div class="leftContent team" style="width:60%;">
    <div class="memberInfo">
      <img src="../../images/lidia.png" alt="Lídia Cerqueira" />
      <p>
        Lídia Cerqueira
      </p>
      <p>
        ee12023@fe.up.pt
      </p>
      <p>
        up201205960
      </p>
    </div>
    <div class="memberInfo">
      <img src="../../images/luis.png" alt="Luís Melo" />
      <p>
        Luís Melo
      </p>
      <p>
        ee12103@fe.up.pt
      </p>
      <p>
        up201206020
      </p>
    </div>
    <p>
      Mestrado Integrado Em engenharia Eletrotécnica e de Computadores
    </p>
    <p>
      <strong>FEUP</strong>
    </p>
  </div>
  <div class="rightContent info" style="width:40%;">
    <div class="map">
      <iframe frameborder="0" style="border:0"
              src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJe-0hW0BkJA0RCSzGfvIWkwg&key=<?=$GMAPS_API_KEY?>" allowfullscreen>
      </iframe>
    </div>
    <div class="additionalInfo">
      <p>
        <strong>Estado do Trabalho 2: </strong> Concluído
      </p>
      <!--<p>
        <strong>Estado do Trabalho 3: </strong> A Desenvolver
      </p>-->
      <p>
        <strong>Optimizado para: </strong> Chrome &amp; Brave Browser com monitor 15''
      </p>
    </div>
    <div class="row linkButtons">
      <a href="../downloads/201206020_SIEM_ppt.pptx" target="_blank" download>
          <span>PPT</span>
      </a>
      <a href="../downloads/201206020_SIEM_css.css" target="_blank" download>
          CSS
      </a>
      <a href="../downloads/201206020_SIEM_T1.rar" target="_blank" download>
          ZIP
      </a>
    </div>
  </div>
</div>

<?php include '../common/footer.php';?>
