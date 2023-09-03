<?php
require('sesionphp.php');
$total = 0;

if (isset($_SESSION['lastScrollPos'])) {
  echo '<script>window.scrollTo(0, ' . $_SESSION['lastScrollPos'] . ');</script>';
}
if (isset($_GET['scrollPos'])) {
  $_SESSION['lastScrollPos'] = $_GET['scrollPos'];
}
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
  <!--   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 -->
  <link rel="shortcut icon" href="img/riffs.png" />
  <style>
    .hide-body {
      visibility: hidden;
      opacity: 0;
      transition: visibility 0s linear 100ms, opacity 100ms;

    }
  </style>
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
      <a href="carrito.php"><i class="bi bi-bag-fill"></i></a>
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
        <a href="sesion.php"><i class="bi bi-person"></i></a>
        <a href="favoritos.php"><i class="bi bi-heart"></i></a>
        <a href="carrito.php"><i class="bi bi-bag-fill"></i></a>
      </div>
    </ul>
  </nav>
  <main>
    <ul class="margen">
      <li></li>
    </ul>
    <section class="aunmastodos">
      <section class="todos">
        <p class="nombre">Carrito</p>
        <?php
        require "conexion.php";
        mysqli_select_db($conexion, $basededatos);
        mysqli_set_charset($conexion, "utf8");
        $consulta = "SELECT * FROM carrito INNER JOIN instrumento ON carrito.id_instrumento = instrumento.id_instrumento INNER JOIN persona ON carrito.id_persona = persona.id_persona WHERE persona.id_persona = '{$_SESSION['id']}'";
        $resultado = mysqli_query($conexion, $consulta);
        while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
          ?>
          <article class="producto">
            <div class="menoscerrar">
              <a href="articulo.php?id=<?php echo $registro["id_instrumento"]; ?>"><img
                  src="<?php echo $registro["foto2"]; ?>" alt="foto"></a>
              <div class="texto">
                <a class="sinmargen" href="articulo.php?id=<?php echo $registro["id_instrumento"]; ?>" class="titulo">
                  <?php echo $registro["marca"]; ?>
                </a></br>
                <a    class="sinmargen" href="articulo.php?id=<?php echo $registro["id_instrumento"]; ?>" class="titulo">
                  <?php echo $registro["modelo"]; ?>
                </a>
                <div class="cantidad">
                  <a
                    href="cantidadmenos.php?id=<?php echo $registro["id_instrumento"]; ?>&scrollPos=<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>"><i
                      class="bi bi-dash-circle menos"></i></a>
                  <label>
                    <?php echo $registro["cantidad"]; ?>
                  </label>
                  <a
                    href="cantidadmas.php?id=<?php echo $registro["id_instrumento"]; ?>&scrollPos=<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>"><i
                      class="bi bi-plus-circle mas"></i></a>
                </div>
                <p class="precio">
                  <?php echo $registro["precio"]; ?>€
                </p>
              </div>
            </div>
            <div class="cerrar">
              <a href="eliminarcarrito.php?id=<?php echo $registro["id_instrumento"]; ?>"
                onclick="return confirmarEliminacion(event)"><i class="bi bi-x-lg"></i></a>
            </div>

            <script>
              function confirmarEliminacion(event) {
                if (!confirm("¿Estás seguro de que quieres borrar este producto?")) {
                  event.preventDefault();
                  return false;
                }
                return true;
              }
            </script>


          </article>


          <?php

          $total = $registro["precio"] * $registro["cantidad"] + $total; ?>
          <?php

        }

        $consulta2 = "SELECT id_persona FROM persona WHERE id_persona = '{$_SESSION['id']}' ";
        $resultado2 = mysqli_query($conexion, $consulta2);
        $registro2 = mysqli_fetch_array($resultado2, MYSQLI_ASSOC);
        $persona = $registro2["id_persona"];
        if (mysqli_num_rows($resultado) == 0) { // Si no hay resultados, muestra el artículo vacío
          ?>
          <article class="total vacio">
            <div class="textototal">
              <p class="titulototal">El carrito esta vacio</p>
            </div>
          </article>
          <?php
        } else {
          ?>
          <article class="total lleno">
            <div class="card-footer">
              <div class="textototal">
                <p class="titulototal">Total:
                  <?php echo $total ?>€
                </p>
                <a class="comprar" href="comprar.php?id=<?php echo $persona ?>">Comprar</a>
              </div>
            </div>
          </article>

          <?php
        }
        ?>

      </section>
    </section>




  </main>
  <script src="javascript/navbar.js"></script>
  <script>
    // Ocultar el cuerpo de la página mientras se carga
    document.body.classList.add('hide-body');

    // Guardar la posición del scroll antes de redirigir
    window.onbeforeunload = function () {
      var scrollPos = window.pageYOffset || document.documentElement.scrollTop;
      sessionStorage.setItem('scrollPos', scrollPos);
    };

    // Restaurar la posición del scroll y mostrar el cuerpo de la página
    document.addEventListener('DOMContentLoaded', function () {
      var scrollPos = sessionStorage.getItem('scrollPos');
      if (scrollPos) {
        setTimeout(function () {
          window.scrollTo(0, scrollPos);
          sessionStorage.removeItem('scrollPos');
          document.body.classList.remove('hide-body');
        }, 0);
      } else {
        document.body.classList.remove('hide-body');
      }
    });
  </script>
</body>

</html>