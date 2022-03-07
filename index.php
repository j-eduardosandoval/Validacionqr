<?php
$servidor = 'localhost';
$base_datos = 'nea';
$usuario = 'root';
$clave = '';
/* Dos métodos de poner el juego de caracteres en utf-8 */
$conexion = new PDO(
  "mysql:host=${servidor};dbname=${base_datos};charset=utf8",
  $usuario,
  $clave,
  [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
  ]
);
/* No es necesario y no es recomendable hacerlo así */
/*$conexion->exec("SET CHARACTER SET utf8");*/
/* Preparamos la consulta SQL */
$res = $conexion->prepare('
  SELECT *
  FROM caratulasalida
  WHERE DN = :codigo
');
/* Asignamos el parámetro al valor enviado por POST */
$res->bindValue(
  ':codigo',
  $_POST['codigo'],
  PDO::PARAM_STR
);
/* Ejecutamos la consulta */
$res->execute();
/* Devolvemos el registro obtenido como respuesta en JSON */
header("Content-type: application/json; charset=utf-8");
echo json_encode($res->fetch(PDO::FETCH_ASSOC)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validadar QR</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <div class="nav-barr">
            <section class="header-section-logo">
                <img src="assets/images/logo-navbar.png" alt="">
            </section>
            <section class="tittle-valid">
                <h1>Validación de Documentos</h1>
            </section>
        </div>
    </header>
    <main>
        <section class="section-one">
            <div class="container-valid-info">
                <div class="tittle-table">
                    <h2>
                        Empresa: ANTEK IMPORT MEXICO S. DE R.L. DE C.V. 
                    </h2>
                </div>
                <form action="" class="fomulario-info">
                    <table>
                        <tr>
                            <td>No. de informe:</td>
                            <td>TESO0021422</td>
                        </tr>
                        <tr>
                            <td>Clave:</td>
                            <td>TESO0FxR02142dR34defdf67gfhhg34DDFDrFFr4DfT3DF34cf&gdsdf$%3fddfdsdpo$2</td>
                        </tr>
                        <tr>
                            <td>Nombre Item:</td>
                            <td>ROUTER DE CONEXION A INTERNET</td>
                        </tr>
                        <tr>
                            <td>Marca:</td>
                            <td>TPLINK</td>
                        </tr>
                        <tr>
                            <td>Modelo:</td>
                            <td>TP89L3</td>
                        </tr>
                        <tr>
                            <td>Fecha de emisión:</td>
                            <td>30/01/2022</td>
                        </tr>
                        <tr>
                            <td>Fecha vigencia:</td>
                            <td>30/03/2022</td>
                        </tr>
                        <tr>
                            <td>Norma:</td>
                            <td>NOM-019-SCFI-1998</td>
                        </tr>
                        <tr>
                            <td>Ing. laboratorista:</td>
                            <td>ING. ENRIQUE SOTO VILLEGAS</td>
                        </tr>
                        <tr>
                            <td>Supervisor:</td>
                            <td>ING. EDGAR JESUS SOTO VILLEGAS</td>
                        </tr>                        
                        <tr>
                            <td>Estatus:</td>
                            <td class="estatus">Vencido</td>
                        </tr>
                    </table>
                </form>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer-contact">
            <div class="container-footer">
                <div class="contact-form">
                    <div class="direction">
                        <h2>Dirección</h2>
                        <div class="direction-text">
                            <p>
                                Jacinto Canek 15-A <br>
                                Col. San Juan Ixhuatepec, C.P. 54180, <br>
                                Tlalnepantla, Edo. de México. <br>
                                <br>
                                <strong>TELS.: </strong> (55) 4426-1914, (55) 4426-4362, <br> (55) 4426-1034
                                Y (55) 4426-3060 <br>
                                <strong>Email: </strong> atencionaclientes@labteso.com
                            </p>
                            <!-- <a href="#">Aviso de privacidad</a> -->
                        </div>
                    </div>
                </div>
                <div class="google-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d940.1567275952947!2d-99.1040339708082!3d19.51468099917737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f9e3ad19305b%3A0x897133b397a7bbf7!2sLaboratorio%20Teso%20de%20M%C3%A9xico!5e0!3m2!1ses!2smx!4v1636335669271!5m2!1ses!2smx"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="footer-container">
            © Copyright 2021 - Laboratorio Teso de México S.A. de C.V.<br>
            Todos los derechos reservados.
        </div>
    </footer>
</body>
</html>