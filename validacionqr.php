<?php require_once('php/conexion.php');
if (!isset($_SESSION)) {
    session_start();
} ?>
<?php
$codunicoinfor = '';
$accion = '';
if (isset($_GET['clave'])) {
    $codunicoinfor = $_GET['clave'];
}
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}

$query_lista = "SELECT bien.*,biencatalogo.nombien,  proveedor.codproveedor, proveedor.razonsocial, familiabien.codfamiliabien, 
familiabien.familiabien FROM bien 
inner join biencatalogo on bien.codbiencat = biencatalogo.codbiencat   
inner join proveedor on bien.idproveedor = proveedor.idproveedor 
inner join familiabien on bien.idfamiliabien = familiabien.idfamiliabien WHERE bien.codunicoinfor ='$codunicoinfor'";
$lista = mysqli_query($conexion, $query_lista) or die(mysqli_error());
$roowfila = mysqli_fetch_array($lista);
$totalRows_lista = mysqli_num_rows($lista);

?>
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
                        Empresa: <td><?php echo $roowfila['razonsocial']; ?></td>
                    </h2>
                </div>

                <form action="" class="fomulario-info">
                    <table>
                        <tr>
                            <td>No. de informe:</td>
                            <td><?php echo $roowfila['codbieninv']; ?></td>
                        </tr>
                        <tr>
                            <td>Clave:</td>
                            <td><?php echo $roowfila['codunicoinfor']; ?></td>
                        </tr>
                        <tr>
                            <td>Nombre Item:</td>
                            <td><?php echo $roowfila['nombien']; ?></td>
                        </tr>
                        <tr>
                            <td>Marca:</td>
                            <td><?php echo $roowfila['codmarca']; ?></td>
                        </tr>
                        <tr>
                            <td>Modelo:</td>
                            <td><?php echo $roowfila['codmodelo']; ?></td>
                        </tr>
                        <tr>
                            <td>Fecha de emisión:</td>
                            <td><?php echo $roowfila['fechaadq']; ?></td>
                        </tr>
                        <tr>
                            <td>Fecha vigencia:</td>
                            <td><?php echo $roowfila['tiempovida']; ?></td>
                        </tr>
                        <tr>
                            <td>Norma:</td>
                            <td><?php echo $roowfila['codfamiliabien']; ?></td>
                        </tr>
                        <tr>
                            <td>Ing. laboratorista:</td>

                        </tr>
                        <tr>
                            <td>Supervisor:</td>

                        </tr>
                        <tr>
                            <td>Estatus:</td>
                            <td class="estatus">Vigente</td>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d940.1567275952947!2d-99.1040339708082!3d19.51468099917737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f9e3ad19305b%3A0x897133b397a7bbf7!2sLaboratorio%20Teso%20de%20M%C3%A9xico!5e0!3m2!1ses!2smx!4v1636335669271!5m2!1ses!2smx" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="footer-container">
            © Copyright 2021 - Laboratorio Teso de México S.A. de C.V.<br>
            Todos los derechos reservados.
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <!-- <script type="text/javascript" src="js/index.js"></script> -->
</body>

</html>