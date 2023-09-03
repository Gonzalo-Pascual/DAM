<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riffs</title>
  <link rel="stylesheet" href="estilos/productos.css">
  <link rel="stylesheet" href="estilos/navbar.css">
  <link rel="stylesheet" href="estilos/footer.css">
  <link rel="stylesheet" href="estilos/colores.css">
  <link rel="stylesheet" href="bootstrap/bootstrap-icons.css">
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
      <a href="redireccionar.php"><i class="bi bi-person"></i></a>
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
          <a href="productos.php" class="menu-link link active submenu-btn">Productos</a>
        </li>
        <li class="menu-item"><a href="musica.php" class="menu-link">Música</a></li>
      </div>
      <div class="opcion">
        <a href="redireccionar.php"><i class="bi bi-person"></i></a>
        <a href="favoritos.php"><i class="bi bi-heart"></i></a>
        <a href="carrito.php"><i class="bi bi-bag"></i></a>
      </div>
    </ul>
  </nav>


  <main>
    <ul class="margen">
      <li></li>
    </ul>
    <div class="todofiltros">

      <div class="filtros">
        <td>

          <?php
          session_start();
          require "conexion.php";
          mysqli_select_db($conexion, $basededatos);
          mysqli_set_charset($conexion, "utf8");

          // Procesar formulario de ordenar
          if (isset($_POST['ordenar'])) {
            $_SESSION['ordenar_por'] = $_POST['ordenar'];
            header("Location: productos.php");
            exit;
          }

          // Procesar formulario de categoría
          if (isset($_POST['categoria'])) {
            $_SESSION['categoria'] = $_POST['categoria'];
            header("Location: productos.php");
            exit;
          }

          // Procesar formulario de precio
          if (isset($_POST['precio'])) {
            $_SESSION['precio'] = $_POST['precio'];
            header("Location: productos.php");
            exit;
          }

          $ordenar_por = isset($_SESSION['ordenar_por']) ? $_SESSION['ordenar_por'] : 1;
          $categoria = isset($_SESSION['categoria']) ? $_SESSION['categoria'] : 0;
          $precio = isset($_SESSION['precio']) ? $_SESSION['precio'] : 0;
          ?>

          <form id="ordenar-form" method="post" action="productos.php">
            <p>Ordenar por: </p>
            <select name="ordenar" id="ordenar-select">
              <option value="1" <?php if ($ordenar_por == 1)
                echo 'selected'; ?>>Relevancia</option>
              <option value="2" <?php if ($ordenar_por == 2)
                echo 'selected'; ?>>A-Z</option>
              <option value="3" <?php if ($ordenar_por == 3)
                echo 'selected'; ?>>Z-A</option>
              <option value="4" <?php if ($ordenar_por == 4)
                echo 'selected'; ?>>Precio: Más a menos</option>
              <option value="5" <?php if ($ordenar_por == 5)
                echo 'selected'; ?>>Precio: Menos a más</option>
            </select>
          </form>

          <form id="categoria-form" method="post" action="productos.php">
            <p>Categoría: </p>
            <select name="categoria" id="categoria-select">
              <option value="0" <?php if ($categoria == 0)
                echo 'selected'; ?>>Todas</option>
              <option value="1" <?php if ($categoria == 1)
                echo 'selected'; ?>>Guitarra española</option>
              <option value="2" <?php if ($categoria == 2)
                echo 'selected'; ?>>Guitarra acustica</option>
              <option value="3" <?php if ($categoria == 3)
                echo 'selected'; ?>>Guitarra electrica</option>
              <option value="4" <?php if ($categoria == 4)
                echo 'selected'; ?>>Amplificadores</option>
              <option value="5" <?php if ($categoria == 5)
                echo 'selected'; ?>>Cables</option>
              <option value="6" <?php if ($categoria == 6)
                echo 'selected'; ?>>Fundas</option>
              <option value="7" <?php if ($categoria == 7)
                echo 'selected'; ?>>Accesorios</option>
            </select>
          </form>
          <?php
          if ($categoria == 0) {
            $categoria_final = "instrumento.categoria = 1 OR instrumento.categoria = 2 OR instrumento.categoria = 3 OR instrumento.categoria = 4 OR instrumento.categoria = 5 OR instrumento.categoria = 6 OR instrumento.categoria = 7";
          } elseif ($categoria == 1) {
            $categoria_final = "instrumento.categoria = 1";
          } elseif ($categoria == 2) {
            $categoria_final = "instrumento.categoria = 2";
          } elseif ($categoria == 3) {
            $categoria_final = "instrumento.categoria = 3";
          } elseif ($categoria == 4) {
            $categoria_final = "instrumento.categoria = 4";
          } elseif ($categoria == 5) {
            $categoria_final = "instrumento.categoria = 5";
          } elseif ($categoria == 6) {
            $categoria_final = "instrumento.categoria = 6";
          } elseif ($categoria == 7) {
            $categoria_final = "instrumento.categoria = 7";
          }
          ?>

          <form id="precio-form" method="post" action="productos.php">
            <p>Precio: </p>
            <select name="precio" id="precio-select">
              <option value="0" <?php if ($precio == 0)
                echo 'selected'; ?>>Todos los precios</option>
              <option value="1" <?php if ($precio == 1)
                echo 'selected'; ?>>0€ - 100€</option>
              <option value="2" <?php if ($precio == 2)
                echo 'selected'; ?>>100€ - 400€</option>
              <option value="3" <?php if ($precio == 3)
                echo 'selected'; ?>>400€ - 700€</option>
              <option value="4" <?php if ($precio == 4)
                echo 'selected'; ?>>700€ - 1000€</option>
              <option value="5" <?php if ($precio == 5)
                echo 'selected'; ?>>1000€ - 2000€</option>
              <option value="6" <?php if ($precio == 6)
                echo 'selected'; ?>>+2000€</option>
            </select>
          </form>
          <?php
          $rango_precio = "";
          if ($precio == 0) {
            $rango_precio = "instrumento.precio >0 ";
          } elseif ($precio == 1) {
            $rango_precio = "instrumento.precio >= 0 and instrumento.precio <= 100";
          } elseif ($precio == 2) {
            $rango_precio = "instrumento.precio >= 100 and instrumento.precio <= 400";
          } elseif ($precio == 3) {
            $rango_precio = "instrumento.precio >= 400 and instrumento.precio <= 700";
          } elseif ($precio == 4) {
            $rango_precio = "instrumento.precio >= 700 and instrumento.precio <= 1000";
          } elseif ($precio == 5) {
            $rango_precio = "instrumento.precio >= 1000 and instrumento.precio <= 2000";
          } elseif ($precio == 6) {
            $rango_precio = "instrumento.precio > 2000";
          }
          ?>

          <script>
            // Detectar cambios en la selección y enviar automáticamente el formulario
            document.getElementById('ordenar-select').addEventListener('change', function () {
              document.getElementById('ordenar-form').submit();
            });

            document.getElementById('categoria-select').addEventListener('change', function () {
              document.getElementById('categoria-form').submit();
            });

            document.getElementById('precio-select').addEventListener('change', function () {
              document.getElementById('precio-form').submit();
            });
          </script>

        </td>

      </div>
    </div>
    <section class="todo">
      <section id="imagenes">
        <?php
        // Verificar si se ha enviado el formulario
        if (isset($_POST['ordenar'])) {
          $_SESSION['ordenar_por'] = $_POST['ordenar'];
          header("Location: productos.php");
          exit;
        }

        require "conexion.php";
        mysqli_select_db($conexion, $basededatos);
        mysqli_set_charset($conexion, "utf8");

        // Obtener el filtro de la sesión o establecer un valor predeterminado
        $ordenar_por = isset($_SESSION['ordenar_por']) ? $_SESSION['ordenar_por'] : 1;
        if ($ordenar_por == 1) {
          $consulta = "SELECT * FROM instrumento INNER JOIN caracteristica ON instrumento.id_instrumento = caracteristica.id_caracteristica INNER JOIN categoria ON instrumento.categoria = categoria.id_categoria where ($categoria_final) and $rango_precio ORDER BY id_instrumento DESC";
        } else if ($ordenar_por == 2) {
          $consulta = "SELECT * FROM instrumento INNER JOIN caracteristica ON instrumento.id_instrumento = caracteristica.id_caracteristica INNER JOIN categoria ON instrumento.categoria = categoria.id_categoria where ($categoria_final) and $rango_precio ORDER BY marca";
        } else if ($ordenar_por == 3) {
          $consulta = "SELECT * FROM instrumento INNER JOIN caracteristica ON instrumento.id_instrumento = caracteristica.id_caracteristica INNER JOIN categoria ON instrumento.categoria = categoria.id_categoria where ($categoria_final) and $rango_precio ORDER BY marca DESC";
        } else if ($ordenar_por == 4) {
          $consulta = "SELECT * FROM instrumento INNER JOIN caracteristica ON instrumento.id_instrumento = caracteristica.id_caracteristica INNER JOIN categoria ON instrumento.categoria = categoria.id_categoria where ($categoria_final) and $rango_precio ORDER BY precio DESC";
        } else if ($ordenar_por == 5) {
          $consulta = "SELECT * FROM instrumento INNER JOIN caracteristica ON instrumento.id_instrumento = caracteristica.id_caracteristica INNER JOIN categoria ON instrumento.categoria = categoria.id_categoria where ($categoria_final) and $rango_precio ORDER BY precio";
        } else {
          $consulta = "SELECT * FROM instrumento INNER JOIN caracteristica ON instrumento.id_instrumento = caracteristica.id_caracteristica INNER JOIN categoria ON instrumento.categoria = categoria.id_categoria where ($categoria_final) and $rango_precio ORDER BY id_instrumento DESC";
        }



        $resultado = mysqli_query($conexion, $consulta);

        if (mysqli_num_rows($resultado) == 0) {
          ?>
          <article class="total vacio">
            <div class="textototal">
              <p class="titulototal">No se ha encontrado ningún resultado</p>
            </div>
          </article>
          <?php
        } else {

          while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            ?>

            <article class="etiquetas">
              <div class="card">
                <div class="card-img"><a href="articulo.php?id=<?php echo $registro["id_instrumento"]; ?>"> <img
                      class="fotoarticulos" src="<?php echo $registro["foto1"]; ?>" alt="foto"></a>
                  <?php
                  /* $resultado2 = mysqli_query($conexion, $consulta2);

                  while ($registro2 = mysqli_fetch_array($resultado2, MYSQLI_ASSOC)) { */
                  ?>
                  <a class="favoritos" href="añadirfavorito.php?id=<?php echo $registro["id_instrumento"]; ?>"><i
                      class="bi bi-heart  carritoinicio1"></i></a>
                  <?php
                  /* } */
                  ?>
                </div>

                <div class="card-info">
                  <a class="text-title" href="articulo.php?id=<?php echo $registro["id_instrumento"]; ?>"><?php echo $registro['marca'] ?></a>
                  </br> <a class="text-title" href="articulo.php?id=<?php echo $registro["id_instrumento"]; ?>">
                    <?php echo $registro['modelo'] ?>
                  </a>
                </div>
                <div class="card-footer">
                  <?php echo $registro['precio'] ?>€
                  <a class="carritoinicio" href="añadircarrito.php?id=<?php echo $registro["id_instrumento"]; ?>"><i
                      class="bi bi-bag carritoinicio1"></i></a>
                </div>
              </div>
            </article>
            <?php
          }
        }
        ?>
      </section>
    </section>


    <script src="lb/js/bootstrap.min.js"></script>
    <script>
      const ordenarSelect = document.getElementById('ordenar-select');
      const ordenarForm = document.getElementById('ordenar-form');
      ordenarSelect.addEventListener('change', function () {
        ordenarForm.submit();
      });
    </script>
    </section>




  </main>
  <script src="javascript/navbar.js"></script>
  <footer>

    <section class="info1">

      <article class="columna">
        <div class="centradofooter1">
          <h2 class="titulofooter">Empresa</h2>
          <a class="foot">Sobre nosotros</a>
          <a class="foot">Trabaja con nostros</a>
          <a class="foot">Contacto</a>
          <!--<a href="mailto:riffs@gmail.com?subject=Asunto del correo&body=Hola,%20quiero%20enviarte%20un%20mensaje.">Enviar correo</a>-->
          <a class="foot">Prensa</a>
        </div>
      </article>
      <article class="columna">
        <div class="centradofooter2">
          <h2 class="titulofooter">Productos</h2>
          <a class="foot">Guitarras</a>
          <a class="foot">Amplificadores</a>
          <a class="foot">Fundas</a>
          <a class="foot">Accesirios</a>
        </div>
      </article>
      <article class="columna">
        <div class="centradofooter3">
          <h2 class="titulofooter">Social</a>
            <a class="foot" href="https://www.instagram.com/"><i class="bi bi-instagram"></i> Instagram</a>
            <a class="foot" href="https://www.youtube.com/"><i class="bi bi-youtube"></i> Youtube</a>
            <a class="foot" href="https://www.linkedin.com/"><i class="bi bi-linkedin"></i> Linkedin</a>
            <a class="foot" href="https://www.twitter.com/"><i class="bi bi-twitter"></i> Twitter</a>
            <a class="foot" href="https://www.pinterest.com/"><i class="bi bi-pinterest"></i> Pinterest</a>
        </div>
      </article>
      <article class="columna">
        <div class="centradofooter4">
          <p class="titulofooter">¡No te lo pierdas!</p>
          <p class="textofooter">¡Sé el primero en enterarte de los nuevos productos y todas las ofertas exclusivas!</p>
          <div class="suscripcion">
            <div class="input-container">
              <form action="suscribirse.php" class="form" method="post" enctype="multipart/form-data">
                <input required="" placeholder="Email" type="email" name="correo">
                <button class="invite-btn" type="submit" name="enviar">
                  registrarse
                </button>
              </form>

            </div>
          </div>
        </div>
      </article>
    </section>



    <div class="copyright">
      © 2023 Copyright: Gonzalo Pascual Romero
    </div>

  </footer>
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