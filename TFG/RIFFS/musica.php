<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riffs</title>
  <link rel="stylesheet" href="estilos/index.css">
  <link rel="stylesheet" href="estilos/navbar.css">
  <link rel="stylesheet" href="estilos/musica.css">
  <link rel="stylesheet" href="estilos/footer.css">
  <link rel="stylesheet" href="estilos/colores.css">
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
        <li class="menu-item"><a href="musica.php" class="menu-link link active">Música</a></li>
      </div>
      <div class="opcion">
        <a href="sesion.php"><i class="bi bi-person"></i></a>
        <a href="favoritos.php"><i class="bi bi-heart"></i></a>
        <a href="carrito.php"><i class="bi bi-bag"></i></a>
      </div>
    </ul>
  </nav>
  <main>
    <ul class="margen">
      <li></li>
    </ul>

    <section class="eleccion">
      <article class='columnas'>
        <a href="https://www.guitarristas.info/noticias"><img class="tamaño" src="img/noticias.png" alt=""></a>
      </article>
      <article class='columnas'>
        <a href="https://www.cifraclub.com/"><img class="tamaño" src="img/partituras.png" alt=""></a>
      </article>
      <article class='columnas'>
        <a href="https://www.youtube.com/@guitarraviva"><img class="tamaño" src="img/tutoriales.png" alt=""></a>
      </article>
      <article class='columnas'>
        <a href="https://tuner-online.com/es/"><img class="tamaño" src="img/afinador.png" alt=""></a>
      </article>

      <article class='columnas'>
        <a href="https://open.spotify.com/playlist/3lRvb9RIb0MyUTU4O0IZAv?si=d09702c4a7fe451a"><img class="tamaño"
            src="img/musica.png" alt=""></a>
      </article>

      <article class='columnas'>
        <a href="https://festivalguitarramadrid.com/conciertos/"><img class="tamaño" src="img/conciertos.png" alt=""></a>
      </article>
    </section>



  </main>
  <script src="javascript/navbar.js"></script>
</body>
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

</html>