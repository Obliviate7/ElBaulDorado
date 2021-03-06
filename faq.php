<?php
    session_start();
    require_once "users.php";
?>
<?php include("header.php"); ?>
    <div class="containerFaqs">
      <h2 class="titleFaqs">FAQ'S</h2>
      <p>Tienes preguntas? aca te respondemos las mas frecuentes, si no encuentras tu pregunta aca, envianos un mail a "consultas@elbauldorado.com"</p>
      <div class="panel-group" id="accordion">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">1) Quiero vender, Como puedo publicar?</a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">Es muy facil, tienes que seguir los siguientes pasos:
              <ol>
                <li>Seleccionar la ropa que quieras enviar, tiene que estar limpia y en perfectas condiciones.</li>
                <li>Enviarnos un correo a “publicaciones@elbauldorado.com” con fotos de cada prenda individualmente por frente y por detrás, y  con el precio que pienses que es adecuado por cada prenda.</li>
                <li>Te enviaremos un correo en las próximas 24 horas con nuestros comentarios acerca del precio y de las condiciones de las prendas.</li>
                <li>Cuando estés de acuerdo con los comentarios enviados, envías la ropa por OCA o la podes dejar en nuestro depósito por Cabildo y Juramento (CABA).</li>
                <li>En 5 días publicamos la ropa en nuestro portal.</li>
                <li>Cuando tu ropa se venda tendrás tu dinero en las próximas 12 horas siguientes, por el método que elijas previamente (efectivo, transferencia bancaria, mercado pago.)</li>
              <ol>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">2) Quiero vender, Donde se puede dejar la ropa?</a>
            </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">Por OCA o dejarla en nuestro depósito por Cabildo y Juramento (barrio Belgrano, CABA).</div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">3) Quiero comprar, Donde puedo retirar la ropa?</a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">Te las podemos enviar por OCA o la podes retirar por nuestro deposito en Cabildo y Juramento (barrio Belgrano, CABA).</div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">4) Quiero comprar, Qué métodos de pago se ofrecen?</a>
            </h4>
          </div>
          <div id="collapse4" class="panel-collapse collapse">
            <div class="panel-body">Transferencia bancaria, pagofacil o MercadoPago.</div>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">5) Quiero comprar, puedo cambiar alguna prenda ya comprada?</a>
            </h4>
          </div>
          <div id="collapse5" class="panel-collapse collapse">
            <div class="panel-body">Ya que nuestra plataforma funciona como intermediaria entre dos partes no hacemos reembolsos.</div>
          </div>
        </div>
      </div>
    </div>

    <footer class="footerMain">
      <ul class="footerUl">
        <li>2017</li>
      </ul>
    </footer>

  </body>
</html>
