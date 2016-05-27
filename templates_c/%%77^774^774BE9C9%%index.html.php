<?php /* Smarty version 2.6.6, created on 2016-05-28 01:21:46
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strtolower', 'index.html', 50, false),)), $this); ?>
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
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/fitness-adidas.min.css">
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
          <select name="selector-camiseta" id="selector-camiseta" class="form-control" value="" data-cod="">
            <option value="" >Selecciona una</option>

            <?php if (count($_from = (array)$this->_tpl_vars['camisetasini'])):
    foreach ($_from as $this->_tpl_vars['camiseta']):
?>
             <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['camiseta']->articuloSerial)) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
" data-cod="<?php echo $this->_tpl_vars['camiseta']->idRefe; ?>
"><?php echo $this->_tpl_vars['camiseta']->nombre; ?>
</option>
             <?php endforeach; unset($_from); endif; ?>
          </select>
        </div>
        <div class="contenedor-camiseta"><img src="images/base-camiseta.png" id="camiseta" data-zoom class="img-responsive">
          <div class="detalle-camiseta"></div>
        </div>
        <div class="controles-camiseta">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h3>Color</h3>
            <div class="colores" style="display:none;">
             
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h3>Talla</h3>
            <div class="tallas" style="display:none;">
            </div>
          </div>
        </div>
      </article>
      <!--Selector de camiseta-->
    </div>
  </section>
  <form id="registro" class="container-fluid">
    <article class="row">
      <h2 class="text-center">Ingresa tu número de documento</h2>
      <div class="col-lg-4 col-md-4 col-sm-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-2">
        <label for="documentoValidate">Número de documento</label>
        <input type="text" id="documentoValidate" name="documentoValidate" class="form-control">
      </div>
    </article>
    <!--Registro exitoso-->
    <article class="row hidden exitoso">
      <h2 class="text-center">Tus datos fueron guardados.</h2>
    </article>
    <!--/-Registro exitoso-->
    <article class="row multipacks">
      <h2 class="text-center">Registra los múltipacks</h2>
      <!--Numeros de paquetes-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label for="multi1">Multipack 1 (# de lote)</label>
        <input type="text" id="multi1" name="multi1" class="form-control" value="">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label for="multi2">Multipack 2 (# de lote)</label>
        <input type="text" id="multi2" name="multi2" class="form-control"value="" disabled="disabled">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label for="multi3">Multipack 3 (# de lote)</label>
        <input type="text" id="multi3" name="multi3" class="form-control" value=""disabled="disabled">
      </div>
      <!--Numeros de paquetes-->
      <div class="clearfix"></div>
      <button class="btn btn-registro" id="btn-redime">Redimir</button>
    </article>
    <article class="row registrousu" style="display:none;">
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
            <input type="radio" name="genero" id="genero" value="m" /> Másculino
            
          </label>
        </div>
        <div class="radio">
          <label for="f">
            <input type="radio" name="genero" id="genero" value="f" /> Femenino
            
          </label>
        </div>
      </div>
      <!--/-Género-->
      <!--Departamento-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 select">
        <select name="departamento" id="departamento" class="form-control">
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
        <select name="ciudad" id="ciudad" class="form-control">
          <option value="">Ciudad</option>
        </select>
      </div>
      <!--/-Ciudad-->
      <div class="clearfix"></div>
      <div class="tipo-docu">
        <!--Tipo de documento-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 select">
          <select name="tipodoc" id="tipodoc" class="form-control">
            <option value="">Tipo de documento</option>
            <option value="cc">CC</option>
            <option value="ce">CE</option>
            <option value="ti">TI</option>
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
            <input type="checkbox" name="iemail" id="iemail" value="E"/> Email
            
          </label>
        </div>
        <div class="checkbox">
          <label for="itelefono">
            <input type="checkbox" name="itelefono" id="itelefono" value="T"/> Teléfono
            
          </label>
        </div>
      </div>
      <!--/-recibir informacion-->
      <!--autorizacion de datos-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 autorizo">
        <div class="checkbox">
          <label for="autorizo">
            <input type="checkbox" name="autorizo" id="autorizo" value="S" /> Autorizo a NESTLÉ<sup>®</sup> para el tratamiento de mis datos personales.
            
          </label>
        </div>
      </div>
      <!--/-autorizacion de datos-->
      <!--Términos y Condiciones-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 autorizo">
        <div class="checkbox">
          <label for="terminos"><input type="checkbox" name="terminos" id="terminos"  value="S"/> Acepto los términos y condiciones de la actividad</label>
        </div>
      </div>
      <!--/-Términos y Condiciones-->
      <div class="clearfix"></div>
      <button class="btn btn-registro" id="btn-registro">Registrar</button>
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
  <script src="js/libs.fitness-adidas.min.js"></script>
  <script src="js/fitness-adidas.ini.js"></script>
  <script src="js/fitness-eventos.js"></script>
</body></html>