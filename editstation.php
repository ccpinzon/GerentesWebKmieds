
<?php 

include_once 'source/Station.php';
// conexion bd
$bd = array('hostname' => 'localhost','username' => 'root','password' => 'root','name' => 'juan_miedsV3');

// tarea : traer de login el id de la estacion 
$idest = 5005;

$station = new Station($bd,$idest);

$stationName = $station->getStationName();
$stationSupplierId = $station->getStationSupplierId();
$stationpay = $station->getStationPay();
$telf = $station->getStationLandline();
$telm = $station->getStationMobile();
$direccion = $station->getStationAddress();
$descripcion = $station->getStationDescription();



?>
<!DOCTYPE html>

<html lang="es">

<head>
    <title>Iniciar Sesion -  - Mi Eds App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <meta charset="utf-8">
</head>

<body>
    <!--nav-bar-->

    <nav>
        <div class="nav-wrapper #00838f cyan darken-3">
            <a href="#!" class="brand-logo center">Mi EDS App</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="login.php"><i class="material-icons left">home</i>Inicio</a></li>
                <!-- <li><a href="mobile.html"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li> -->
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="login.php"><i class="material-icons right">home</i>Inicio</a></li>
                <!-- <li><a href="mobile.html"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li> -->
            </ul>
        </div>
    </nav>

    <!--fin-nav-bar-->


    <!--LOGIN-->
    <div class="container">

        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m4 l12">
                    <div class="card-panel">
                        <h4 class="header2">Datos de la estacion <?php echo $idest; ?></h4>
                        <form>
                        <!-- FILA 1 -->
                        <div class="row">
                                 <div class="input-field col s6">
                                <?php 
                                    $pay = ($stationpay === 0) ? 'Inactiva    
                                        <i class="material-icons">warning</i>' : 'Activada   
                                        <i class="material-icons">star</i>' ;

                                 ?>
                                     <blockquote class="flow-text">
                                        Estado del pago: <?php echo $pay; ?>
                                    </blockquote>   


                                </div>
                                <div class="input-field col s6">

                                   <h4><?php echo $stationSupplierId ?></h4>
                                
                                </div>
                        </div>

                        <!-- FILA 2 -->

                        <div class="row">
                            <!-- aqui -->

                            
                                <div class="input-field col s6">

                                    <input id="namestation" value='<?php echo $stationName  ?>' type="text" >
                                    <label>Nombre de la estacion</label>

                                </div>
                               
                                <?php $telf = ($telf =="NULL") ? "" : $telf; ?>
                                <div class="input-field col s6">

                                    <input id="telf" value="<?php echo $telf; ?>" type="tel" >
                                    <label>Telefono Fijo</label>
                                
                                </div>
                        </div>

                        <!-- FILA 3 -->

                        <div class="row">
                           
                               <?php $telm = ($telm =="NULL") ? "" : $telm; ?>
                                <div class="input-field col s6">

                                    <input id="telm" value="<?php echo $telm; ?>" type="tel" >
                                    <label>Telefono Movil</label>
                                
                                </div>
                                <?php $direccion = ($direccion =="NULL") ? "" : $direccion; ?>
                                <div class="input-field col s6">

                                   <input id="direccion" value="<?php echo $direccion; ?>" type="text" >
                                    <label>Direccion</label>
                                
                                </div>
                        </div>
                        <!-- FILA DESC -->
                        <?php $descripcion = ($descripcion === "NULL") ? "" : $descripcion;  ?>
                        <div class="row">

                            <div class="input-field col s12">
                                <textarea id="descripcion" value="<?php echo $descripcion; ?>" class="materialize-textarea"><?php echo $descripcion; ?></textarea>
                                <label>Descripcion de la estacion</label>
                            </div>
                        </div>

                        <!-- boton editar -->


                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                                        Modificar
                                        <i class="material-icons right">mode_edit</i>
                                    </button>
                                </div>
                            </div>
                        <!-- XX -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


    <!-- FIN LOGIN      -->

<!--footer-->
<main></main>
 <footer class="page-footer #00838f cyan darken-3">
          <div class="container">
            <div class="row">
              <div class="col l6 m12">
                <h5 class="white-text">Mi eds App</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 m12">
                <h5 class="white-text">Redes Sociales</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 KnowLine S.A.S
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>

<!--fin footer-->


<!--imports js-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
<!--fin imports js-->
    <!--nav lateral responsivo-->
    <script>
        $(document).ready(function () {

            $(".button-collapse").sideNav();

        })
    </script>

    <!--fin nav lateral responsivo-->
</body>

</html>