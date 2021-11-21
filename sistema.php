<?php require_once('./connection/conexionbd.php');?>
<?php

$query_Recordset1 = sprintf("SELECT * FROM productos;");
$Recordset1 = $cnx->query($query_Recordset1) or die(msj("[ERROR]","En SQL lista $query_Recordset1"));


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CYHSTORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="static/img/logo/logo-dino.png" alt="logo">
      <strong>C&H STORE</strong>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">CATALOGO</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            REGISTRO
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">USUARIO</a></li>
            <li><a class="dropdown-item" href="#">PRODUCTOS</a></li>
          </ul> 
        </li>
      </ul>
    <button class="btn btn-outline-success" type="submit">CARRITO</button>
    </div>
  </div>
</nav>


<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">CATALOGO DE PRODUCTOS</h1>
        <p class="lead text-muted">Ofrecemos la más grande variedad de Laptops, Computadoras, Impresoras, Tablets, Accesorios, Zona Gamer, Software, Equipos de Bioseguridad, Herramientas para trabajar y estudiar en casa.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Contactos</a>
          <a href="#" class="btn btn-secondary my-2">Mas Info</a>
        </p>
      </div>
    </div>
  </section>
<br>

  <main>
    <div class="container" style="border: 3px solid red;">
    <!-- TITULO -->
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light text-center">CATALOGO DE PRODUCTOS</h1>
      </div>
    </div>
    <!-- =================== CONTENIDO PRODUCTOS =================== -->
      
    
    
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        <!-- bucle -->
        <?php
        while ($row = $Recordset1->fetch_assoc()) {  //fetch_assoc Nombre de campo
        echo("<div class='col'>
            <div class='card shadow-sm'>
              
              <img class='card-img-top' src='static/img/laptops/".$row["imagen"]."' alt='laptop'>
             
              <div class='card-body'>
                <h5 class='card-text'>".$row["marca"]."</h5>
                <p class='card-text'>".$row["descripcion"]."</p>
                <h5 class='card-text'>S/.".$row["precio_f"]."</h5>
                <div class='d-flex justify-content-between align-items-center'>
                    <button type='button' class='btn btn-sm btn-outline-primary' >Detalles</button>
                    <button type='button' class='btn btn-sm btn-outline-success'>Agregar</button>
                </div>
              </div>
            </div>
          </div>");
        }
        ?>
        <!-- bucle cierre -->
    <!-- ============================================================ -->


      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-1">
          <img src="static/img/laptops/imagen.png" alt="visulizador">
        </div>
        <div class="col-md-6 order-md-2">
          <div class="row">

            <div class="col">
                <h5>Marca</h5>
                <h5>Modelo</h5>
                <h5>procesador</h5>
                <h5>Memoria RAM</h5>
                <h5>Almacenamiento</h5>
                <h5>T. Video</h5>
                <h5>Pantalla</h5>
                <h5>Teclado</h5>
                <h5>S.O</h5>
          </div>
          <div class="col" style="color:#6F6F6F">
                <h5>:ACER</h5>
                <h5>:ASPIRE 1</h5>
                <h5>:N4500U</h5>
                <h5>:8GB</h5>
                <h5>:HDD+SSD</h5>
                <h5>:INTEGRADA</h5>
                <h5>:15.6"</h5>
                <h5>:Ingles</h5>
                <h5>:Windows</h5>
          </div>
        </div>
        <br>
          <div class="d-grid gap-3 col-10 mx-auto">
            <button class="btn btn-primary" type="button">Comprar ahora</button>
            <button class="btn btn-outline-primary" type="button">Agregar al Carrito</button>
          </div>
        </div>
      </div>

    </div>
    <br>
    <footer class="footer-cat bg-dark">
      <div class="container">
            <div class="row pt-5">
          <div class="col flex-none">
            <i class="bi bi-facebook" style="font-size: 2rem; color: cornflowerblue; margin-right:1rem;"></i>
            <i class="bi bi-twitter" style="font-size: 2rem; color: cornflowerblue; margin-right:1rem;"></i>
            <i class="bi bi-youtube" style="font-size: 2rem; color: cornflowerblue; margin-right:1rem;"></i>
            <p>Servicio al Cliente</p>
            <p>(+51)9712 662 516</p>
            <p>Tienda - C.C. Compuplaza
              Calle Octavio Muños Najar
              Int 103 - 107 - 111 - 121
            </p>
          </div>
          <div class="col" style="text-align: center;">
            <i class="bi bi-shield-lock-fill" style="font-size: 2rem; color: cornflowerblue; margin-right:1rem;"></i>
            <i class="bi bi-question-circle-fill" style="font-size: 2rem; color: cornflowerblue; margin-right:1rem;"></i>
            <i class="bi bi-info-circle-fill" style="font-size: 2rem; color: cornflowerblue; margin-right:1rem;"></i>
            <p>Preguntas más Frecuentes</p>
            <p>Envíos & Devoluciones</p>
            <p>Polìtica de la Tienda</p>
          </div>
          <div class="col" style="text-align: end;">
            <i class="bi bi-laptop" style="font-size: 2rem; color: cornflowerblue; margin-right:1rem;"></i>
            <i class="bi bi-pc-display" style="font-size: 2rem; color: cornflowerblue; margin-right:1rem;"></i>
            <i class="bi bi-arrow-down-left-circle-fill" style="font-size: 2rem; color: cornflowerblue; margin-right:1rem;"></i>
            <p>Laptops y Notebook</p>
            <p>Computadoras , All in One</p>
            <p>Nosotros</p>
          </div>

        </div>
      </div>
    <p>&copy; 2021–2021 Company, Inc.</p>
  </footer>
  </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>