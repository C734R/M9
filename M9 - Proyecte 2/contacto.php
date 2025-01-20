<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/M9/M9 - Proyecte 2/global.php';
?>

<html lang="es">
<link rel="shortcut icon" href="<?=URL_Proyecto?>img/logo.ico" />
<head>
    <meta charset="UTF-8">
    <title>Contacto - Underground Workshop</title>
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/estilos.css">
    <link rel="stylesheet" href="<?=URL_Proyecto?>estilos/contacto.css">
</head>
<!-- Cabecera insertada -->
<?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'cabecera.php'); ?>
<body>
    <main>
        <h1>
            CONTACTO
        </h1>
        <!-- Grid de dos columnas con los diferentes centros -->
        <section class="gridcontactos">
            <div>
                <h2>Sede de Barcelona</h2>
                <section class="contacto">
                    <img src="<?=URL_Proyecto?>img/barcelona.webp" alt="Taller Barcelona">
                    <div>
                        <p>Dirección: </p>
                        <p>Avenida Diagonal, 640, 08017 Barcelona</p>
                        <p>Teléfono: </p>
                        <p>934 567 891</p>
                        <p>Email: </p>
                        <p>info@barcelonaUGWS.com</p>
                    </div>
                </section>
            </div>
            <div>
                <h2>Sede de Montcada</h2>
                <section class="contacto">
                    <img src="<?=URL_Proyecto?>img/montcada.webp" alt="Taller Montcada">
                    <div>
                        <p>Dirección: </p>
                        <p>Carrer Major, 45, 08110 Montcada i Reixac</p>
                        <p>Teléfono: </p>
                        <p>935 674 321</p>
                        <p>Email: </p>
                        <p>info@montcadaUGWS.com</p>
                    </div>
                </section>
            </div>
            <div>
                <h2>Sede de Madrid</h2>
                <section class="contacto">
                    <img src="<?=URL_Proyecto?>img/madrid.webp" alt="Taller Madrid">
                    <div>
                        <p>Dirección: </p>
                        <p>Calle Gran Vía, 28, 28013 Madrid</p>
                        <p>Teléfono: </p>
                        <p>911 234 567</p>
                        <p>Email: </p>
                        <p>info@madridUGWS.com</p>
                    </div>
                </section>
            </div>
            <div>
                <h2>Sede de Sevilla</h2>
                <section class="contacto">
                    <img src="<?=URL_Proyecto?>img/sevilla.webp" alt="Taller Sevilla">
                    <div>
                        <p>Dirección: </p>
                        <p>Avenida de la Constitución, 12, 41004 Sevilla</p>
                        <p>Teléfono: </p>
                        <p>954 678 912</p>
                        <p>Email: </p>
                        <p>info@sevillaUGWS.com</p>
                    </div>
                </section>
            </div>
        </section>
    </main>
</body>
<!-- Pie insertado -->
<?php include($_SERVER['DOCUMENT_ROOT'].URL_Proyecto.'pie.php'); ?>
</html>