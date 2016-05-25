<?php /* Smarty version 2.6.6, created on 2016-05-25 22:14:38
         compiled from index.html */ ?>
<!DOCTYPE html><!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es-CO"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="es-CO"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="es-CO"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es-CO"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title>Nestlé Galletas Fitness</title>
  <meta name="description" content="Reúne 3 multipacks + 10000 y escoge una camiseta">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Accept-CH" content="DPR, Width, Viewport-Width">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/drift-basic.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,300" rel="stylesheet" type="text/css"><!--[if lt IE]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script src="js/libs/modernizr-2.6.2.min.js"></script>
</head>
<body>
  <!--Header-->
  <header class="container-fluid">
    <section class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
        <div class="logo"><img src="images/logo-fitness.svg" alt="Nestlé Galletas Fitness" title="Nestlé Galletas Fitness" class="img-responsive"></div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs pull-right">
        <ul class="social">
          <li class="icon icon-fb"><a href="https://www.facebook.com/NestleFitnessCo" rel="nofollow noopener noreferrer" target="_blank"></a></li>
          <li class="icon icon-tw"><a href="https://twitter.com/NestleFitnessCo" rel="nofollow noopener noreferrer" target="_blank"></a></li>
        </ul>
      </div>
    </section>
  </header>
  <!--/-Header-->
  
  
  <section class="container-fluid">
    <div class="row">
      <!--info-->
      <article class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><img src="images/info.png" alt="Reúne 3 multipacks + 10000 y escoge una camiseta" title="Reúne 3 multipacks + 10000 y escoge una camiseta" class="img-responsive img-info"></article>
      <!--/-info-->
      <!--Selector de camiseta-->
      <article class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-camisetas">
        <div class="tipo-camiseta">
          <label for="selector-camiseta">Camiseta:</label>
          <select name="selector-camiseta" id="selector-camiseta" class="form-control">
            <option value="aa7145" data-color="unico">Adizero Tee</option>
            <option value="ak0077" data-color="naranja">Aerok Tee</option>
            <option value="ab5697" data-color="naranja">Aop Tee</option>
            <option value="ao4918" data-color="rosa">Athletic Tee</option>
            <option value="aj5366" data-color="azul">Basic 3S Tee</option>
            <option value="aj5357" data-color="unico">Basic Solid Tee</option>
            <option value="ai0877" data-color="verde">Climachill Tee</option>
            <option value="aj4999" data-color="naranja">Club Tee</option>
            <option value="aj4999" data-color="rosa">ESS 3S Slim Tee</option>
            <option value="ab5823" data-color="unico">GS Edge Tee</option>
            <option value="aa5619" data-color="negro">RS Cap SS W</option>
            <option value="aa2630" data-color="unico">Run SS Laye Tee</option>
            <option value="ak2106" data-color="naranja">SN S-S W</option>
            <option value="ab6463" data-color="azul">Unctl Clmch Tee</option>
          </select>
        </div>
        <div class="contenedor-camiseta"><img id="camiseta" data-zoom class="img-responsive">
          <div class="detalle-camiseta"></div>
        </div>
        <div class="controles-camiseta">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h3>Color</h3>
            <div class="colores">
              <button type="button" class="color color-azul color-active"></button>
              <button type="button" class="color color-blanco"></button>
              <button type="button" class="color color-rojo"></button>
              <button type="button" class="color color-cyan"></button>
              <button type="button" class="color color-magenta"></button>
              <button type="button" class="color color-amarillo"></button>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h3>Talla</h3>
            <div class="tallas">
              <button type="button" class="talla-active talla">xs</button>
              <button type="button" class="talla">s</button>
              <button type="button" class="talla">m</button>
              <button type="button" class="talla">l</button>
              <button type="button" class="talla">xl</button>
            </div>
          </div>
        </div>
      </article>
      <!--Selector de camiseta-->
    </div>
  </section>
  <form id="registro" class="container-fluid">
    <article class="row multipacks">
      <h2 class="text-center">Registra los múltipacks</h2>
      <!--Numeros de paquetes-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label for="multi1">Multipack 1 (# de lote)</label>
        <input type="text" id="multi1" name="multi1" class="form-control">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label for="multi2">Multipack 2 (# de lote)</label>
        <input type="text" id="multi2" name="multi2" class="form-control">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label for="multi3">Multipack 3 (# de lote)</label>
        <input type="text" id="multi3" name="multi3" class="form-control">
      </div>
      <!--Numeros de paquetes-->
    </article>
    <article class="row">
      <h2 class="text-center">Registra tus datos</h2>
      <!--Nombres-->
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <label for="nombres">Nombre(s)</label>
        <input type="text" id="nombres" name="nombres" class="form-control">
      </div>
      <!--/-Nombres-->
      <!--Apellidos-->
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" class="form-control">
      </div>
      <!--/-Apellidos			-->
      <!--Email-->
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control">
      </div>
      <!--/-Email-->
      <!--Teléfono-->
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" name="telefono" class="form-control">
      </div>
      <!--/-Teléfono-->
      <div class="clearfix"></div>
      <!--Género-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <p>Género</p>
        <div class="radio">
          <label for="m">
            <input type="radio" name="genero" id="m" /> Másculino
            
          </label>
        </div>
        <div class="radio">
          <label for="f">
            <input type="radio" name="genero" id="f" /> Femenino
            
          </label>
        </div>
      </div>
      <!--/-Género-->
      <!--Departamento-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 select">
        <select name="departamento" class="form-control">
          <option value="">Departamento</option>
          <option value="">Departamento</option>
          <?php if (count($_from = (array)$this->_tpl_vars['regiones'])):
    foreach ($_from as $this->_tpl_vars['depto']):
?>
          <option value="<?php echo $this->_tpl_vars['depto']->idDepto; ?>
"><?php echo $this->_tpl_vars['depto']->nombre; ?>
</option>
          <?php endforeach; unset($_from); endif; ?>
        </select>
      </div>
      <!--/-Departamento-->
      <!--Ciudad-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 select">
        <select name="ciudad" class="form-control">
          <option value="">Ciudad</option>
          <option value="">Ciudad</option>
          <option value="">Ciudad</option>
          <option value="">Ciudad</option>
        </select>
      </div>
      <!--/-Ciudad-->
      <div class="clearfix"></div>
      <div class="tipo-docu">
        <!--Tipo de documento-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 select">
          <select name="tipodoc" class="form-control">
            <option value="">Tipo de documento</option>
            <option value="">CC</option>
            <option value="">CE</option>
            <option value="">TI</option>
          </select>
        </div>
        <!--/-Tipo de documento-->
        <!--Número de documento-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <label for="documento">Número de documento</label>
          <input type="text" id="documento" name="documento" class="form-control">
        </div>
        <!--/-Número de documento-->
        <!--Fecha de nacimiento-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <label for="nacimiento">Fecha de nacimiento</label>
          <input type="text" id="nacimiento" name="nacimiento" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control">
        </div>
        <!--/-Fecha de nacimiento-->
      </div>
      <div class="clearfix"></div>
      <!--recibir informacion-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center recibir-info">
        <p>Deseo recibir información</p>
        <div class="checkbox">
          <label for="iemail">
            <input type="checkbox" name="iemail" id="iemail" /> Email
            
          </label>
        </div>
        <div class="checkbox">
          <label for="itelefono">
            <input type="checkbox" name="itelefono" id="itelefono" /> Teléfono
            
          </label>
        </div>
      </div>
      <!--/-recibir informacion-->
      <!--autorizacion de datos-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 autorizo">
        <div class="checkbox">
          <label for="autorizo">
            <input type="checkbox" name="autorizo" id="autorizo" /> Autorizo a NESTLÉ<sup>®</sup> para el tratamiento de mis datos personales.
            
          </label>
        </div>
      </div>
      <!--/-autorizacion de datos-->
      <!--Términos y Condiciones-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 autorizo">
        <div class="checkbox">
          <label for="terminos"><input type="checkbox" name="terminos" id="terminos" /> Acepto los términos y condiciones de la actividad</label>
        </div>
      </div>
      <!--/-Términos y Condiciones-->
      <div class="clearfix"></div>
      <button class="btn btn-registro">Registrar</button>
    </article>
  </form>
  <!--Footer-->
  <footer class="container-fluid">
    <div class="row text-center">
      <article class="col-lg-12">
        <p>
          NESTLÉ ® Colombia 2016 · Todos los derechos reservados - <a href="files/terminos.pdf" target="_blank">Términos y condiciones</a>
          
        </p>
      </article>
    </div>
  </footer>
  <!--/-Footer-->
  <!--Scripts-->
  <script src="js/libs/jquery.js"></script>
  <script src="js/libs/jquery.validate.js"></script>
  <script src="js/libs/Drift.min.js"></script>
  <script src="js/libs/bootstrap.min.js"></script>
  <script src="js/fitness-adidas.ini.js"></script>
</body></html>