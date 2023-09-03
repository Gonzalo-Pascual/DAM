<?php
require('sesionphp.php');
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riffs</title>
  <link rel="stylesheet" href="estilos/index.css">
  <link rel="stylesheet" href="estilos/navbar.css">
  <link rel="stylesheet" href="estilos/colores.css">
  <link rel="stylesheet" href="estilos/carrito.css">
  <link rel="stylesheet" href="bootstrap/bootstrap-icons.css">
  <link rel="shortcut icon" href="img/riffs.png" />
</head>

<body>


  <span class="nav-bar">

    <div class="logo-nav">
      <label class="btnMenu" for="btnMenu">
        <input type="checkbox" id="btnMenu">
        <span></span>
        <span></span>
        <span></span>
      </label>

      <img src="img/riffs-blanco.png">
      <label>riffs</label>
    </div>
    <div class="opcion-nav">
      <a href="sesion.php"><i class="bi bi-person"></i></a>
      <a href="favoritos.php"><i class="bi bi-heart"></i></a>
      <a href="carrito.php"><i class="bi bi-bag"></i></a>
    </div>
  </span>


  <nav class="main-nav">
    <ul class="menu" id="menu">
      <div class="logo">
        <img src="img/riffs-blanco.png" alt="logo">
        <label class="ocultar">riffs</label>
      </div>
      <div class="medio">
        <li class="menu-item"><a href="index.php" class="menu-link">Inicio</a></li>
        <li class="menu-item conteiner-submenu">
          <a href="productos.php" class="menu-link submenu-btn">Productos</a>
        </li>
        <li class="menu-item"><a href="musica.php" class="menu-link">Música</a></li>
      </div>
      <div class="opcion">
        <a href="sesion.php"><i class="bi bi-person-fill"></i></a>
        <a href="favoritos.php"><i class="bi bi-heart"></i></a>
        <a href="carrito.php"><i class="bi bi-bag"></i></a>
      </div>
    </ul>
  </nav>
  <main>
    <ul class="margen">
      <li></li>
    </ul>
    <section class="aunmastodos">
      <section class="todos">
        <p class="nombre">Historial</p>
        <?php
        require "conexion.php";
        mysqli_select_db($conexion, $basededatos);
        mysqli_set_charset($conexion, "utf8");
        $consulta = "SELECT * FROM compra INNER JOIN instrumento ON compra.id_instrumento = instrumento.id_instrumento INNER JOIN persona ON compra.id_persona = persona.id_persona WHERE persona.id_persona = '{$_SESSION['id']}' ORDER BY fecha DESC";
        $resultado = mysqli_query($conexion, $consulta);
        if (mysqli_num_rows($resultado) == 0) { // Si no hay resultados, muestra el artículo vacío
          ?>
          <article class="total vacio">
            <div class="textototal">
              <p class="titulototal">Aun no hay ninguna compra</p>
            </div>
          </article>
          <?php
        }
        while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
          ?>
          <article class="producto">
            <div class="menoscerrar">
              <a href="articulo.php?id=<?php echo $registro["id_instrumento"]; ?>"><img
                  src="<?php echo $registro["foto2"]; ?>" alt="foto"></a>
              <div class="texto">
                <a  class="sinmargen" href="articulo.php?id=<?php echo $registro["id_instrumento"]; ?>" class="titulo">
                  <?php echo $registro["marca"]; ?>
                </a></br>
                <a  class="sinmargen" href="articulo.php?id=<?php echo $registro["id_instrumento"]; ?>" class="titulo">
                  <?php echo $registro["modelo"]; ?>
                </a>
                <div class="cantidad">
                  <label>
                    Cantidad:
                    <?php echo $registro["cantidad"]; ?>
                  </label>
                </div>
                <div class="cantidad">

                </div>

                <p class="precio">
                  <?php echo $registro["precio"]; ?>€
                </p>
              </div>

            </div>
            <div class="fecha">
              <?php echo date("d-m-Y", strtotime($registro["fecha"])); ?>
            </div>



          </article>
          <!-- <div class="card-footer">
            </div> -->
          <?php

        }
        ?>


      </section>
    </section>




  </main>
  <script src="javascript/navbar.js"></script>
</body>

</html>