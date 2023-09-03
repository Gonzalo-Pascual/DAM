<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riffs</title>
  <link rel="stylesheet" href="estilos/index.css">
  <link rel="stylesheet" href="estilos/navbar.css">
  <link rel="stylesheet" href="estilos/productos.css">
  <link rel="stylesheet" href="estilos/colores.css">
  <link rel="stylesheet" href="estilos/footer.css">
  <link rel="stylesheet" href="flexslider.css" type="text/css">
  <link rel="stylesheet" href="bootstrap/bootstrap-icons.css">
  <link rel="shortcut icon" href="img/riffs.png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="javascript/jquery.flexslider.js"></script>
  <script src="javascript/index.js"></script>
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
        <li class="menu-item"><a href="index.php" class="menu-link link active">Inicio</a></li>
        <li class="menu-item conteiner-submenu">
          <a href="productos.php" class="menu-link submenu-btn">Productos</a>
        </li>
        <li class="menu-item"><a href="musica.php" class="menu-link">Música</a></li>
      </div>
      <div class="opcion">
        <!-- <a href=""><i class="bi bi-search"></i></a>  -->
        <a href="sesion.php"><i class="bi bi-person"></i></a>
        <a href="favoritos.php"><i class="bi bi-heart"></i></a>
        <a href="carrito.php"><i class="bi bi-bag"></i></a>
      </div>
    </ul>
  </nav>
  <script src="javascript/navbar.js"></script>
  <main>
    <ul class="margen">
      <li></li>
    </ul>
    <div class="flexslider slider1">
      <ul class="slides">
        <li>
          <img src="img/slider1.jpg" alt="">
          <section class="flex-caption">
            <p></p>
          </section>
        </li>
        <li>
          <img src="img/slider2.jpg" alt="">
          <section class="flex-caption">
            <p></p>
          </section>
        </li>
        <li>
          <img src="img/slider3.jpg" alt="">
          <section class="flex-caption">
            <p></p>
          </section>
        </li>
        <li>
          <img src="img/slider4.jpg" alt="">
          <section class="flex-caption">
            <p></p>
          </section>
        </li>
      </ul>
    </div>
    <div class="flexslider slider2">
      <ul class="slides">
        <li>
          <img src="img/slider11.png" alt="">
          <section class="flex-caption">
            <p></p>
          </section>
        </li>
        <li>
          <img src="img/slider22.png" alt="">
          <section class="flex-caption">
            <p></p>
          </section>
        </li>
        <li>
          <img src="img/slider33.png" alt="">
          <section class="flex-caption">
            <p></p>
          </section>
        </li>
        <li>
          <img src="img/slider44.png" alt="">
          <section class="flex-caption">
            <p></p>
          </section>
        </li>
      </ul>
    </div>
    </section>
      <div class="cuerpo">
        <p class="titulo">Sobre nosotros</p>
        <p class="texto">Bienvenidos a Riffs: ¡Tu destino en línea para todo lo relacionado con las guitarras!
          <br>
          Somos una empresa fundada por expertos en guitarras con una pasión profunda por el instrumento. Nuestra
          misión es ofrecer una amplia
          selección de guitarras y accesorios, junto con enlaces exclusivos a tutoriales y partituras. Nos enorgullece
          brindar un servicio personalizado y ser tu recurso musical de confianza. Únete a nosotros en esta aventura
          musical y descubre el mundo de las guitarras en su máximo esplendor.
        </p>
      </div>
    </section>
    <div class="tituloprodutos">
      <p class="tituloprodutos1">Nuevos productos</p>
    </div>
    <section class="todo">
      <section id="imagenes">
        <?php
        require "conexion.php";
        mysqli_select_db($conexion, $basededatos);
        mysqli_set_charset($conexion, "utf8");
        $consulta = "SELECT * FROM instrumento INNER JOIN caracteristica ON instrumento.id_instrumento = caracteristica.id_caracteristica INNER JOIN categoria ON instrumento.categoria = categoria.id_categoria ORDER BY id_instrumento desc";
        $resultado = mysqli_query($conexion, $consulta);
        $conteo = 0;
        while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
          if ($conteo >= 4) {
            break;
          }
          $conteo++;
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
        ?>
      </section>
      <div class="tituloprodutos">
        <p class="tituloprodutos1">Productos más vendidos</p>
      </div>
      <section id="imagenes">
        <?php
        require "conexion.php";
        mysqli_select_db($conexion, $basededatos);
        mysqli_set_charset($conexion, "utf8");
        $consulta = "SELECT instrumento.*, SUM(compra.cantidad) AS total_vendido 
        FROM instrumento 
        INNER JOIN caracteristica ON instrumento.id_instrumento = caracteristica.id_caracteristica 
        INNER JOIN categoria ON instrumento.categoria = categoria.id_categoria 
        INNER JOIN compra ON instrumento.id_instrumento = compra.id_instrumento 
        GROUP BY instrumento.id_instrumento 
        ORDER BY total_vendido DESC";
        $resultado = mysqli_query($conexion, $consulta);
        $conteo = 0;
        while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
          if ($conteo >= 4) {
            break;
          }
          $conteo++;
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
        ?>

        <script src="lb/js/bootstrap.min.js"></script>
      </section>


  </main>
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