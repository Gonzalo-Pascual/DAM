<?php
$contrasena = '';
$usuario = 'root';
$nombreBD = 'riffs';
try {
  $bd = new PDO('mysql:host=localhost;
            dbname=' . $nombreBD,
    $usuario,
    $contrasena
  );
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
$id = $_GET['id'];
$sql = $bd->prepare("SELECT * FROM instrumento INNER JOIN caracteristica ON instrumento.id_instrumento = caracteristica.id_caracteristica INNER JOIN categoria ON instrumento.categoria = categoria.id_categoria
WHERE id_instrumento = ?;");
$sql->execute([$id]);
$instrumento = $sql->fetch(PDO::FETCH_OBJ);
require 'conexion.php';
mysqli_select_db($conexion, $basededatos);
mysqli_set_charset($conexion, "utf8");
$consulta = "SELECT * FROM instrumento ";
$resultado = mysqli_query($conexion, $consulta);
$registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
mysqli_query($conexion, "UPDATE instrumento SET vistas = vistas+1 WHERE id_instrumento = $id ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riffs</title>
  <link rel="stylesheet" href="estilos/articulo.css">
  <link rel="stylesheet" href="estilos/footer.css">
  <link rel="stylesheet" href="estilos/navbar.css">
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
      <a href="loginphp.php"><i class="bi bi-person"></i></a>
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

    <section class="aunmastodo">
      <section class="todo">
        <section class="arriba">
          <article class="foto">
            <a class="favoritos" href="añadirfavorito.php?id=<?php echo $instrumento->id_instrumento; ?>"><i
                class="bi bi-heart  carritoinicio1"></i></a>
            <?php
            $rutaFotoPrincipal = $instrumento->foto2;
            $rutaFoto1 = $instrumento->foto2;
            $rutaFoto2 = $instrumento->foto3;
            $rutaFoto3 = $instrumento->foto4;
            $rutaFotoPorDefecto = 'fotos/defecto.png';

            if (file_exists($rutaFotoPrincipal)) {
              echo '<img id="principal" src="' . $rutaFotoPrincipal . '" alt="principal">';

            } else {
              echo '<img id="principal" src="' . $rutaFotoPorDefecto . '" alt="principal">';
            }
            ?>

            <div class="otrasfotos">
              <?php
              if (file_exists($rutaFoto1)) {
                echo '<img class="otrafoto" src="' . $rutaFoto1 . '" alt="primera">';
              } else {
                echo '<img class="otrafoto" src="' . $rutaFotoPorDefecto . '" alt="primera">';
              }

              if (file_exists($rutaFoto2)) {
                echo '<img class="otrafoto" src="' . $rutaFoto2 . '" alt="segunda">';
              } else {
                echo '<img class="otrafoto" src="' . $rutaFotoPorDefecto . '" alt="segunda">';
              }

              if (file_exists($rutaFoto3)) {
                echo '<img class="otrafoto" src="' . $rutaFoto3 . '" alt="tercera">';
              } else {
                echo '<img class="otrafoto" src="' . $rutaFotoPorDefecto . '" alt="tercera">';
              }
              ?>
            </div>
          </article>
          <article class="texto">
            <p class="titulo">
              <?php echo $instrumento->marca ?>
            </p>
            <p class="titulo">
              <?php echo $instrumento->modelo ?>
            </p>
            <p class="precio">
              <?php echo $instrumento->precio ?>€
            </p>
            <a class="carrito" href="añadircarrito.php?id=<?php echo $instrumento->id_instrumento; ?>">Añadir al
              carrito</a>
            <a class="comprar" href="comprarahora.php?id=<?php echo $instrumento->id_instrumento; ?>">Comprar ahora</a>
            <p class="descripcion">
              Categoría: <?php echo $instrumento->nombre ?>
            </p>
            <p class="descripcion">
              <?php echo $instrumento->descripcion ?>
            </p>
          </article>
        </section>
        <section class="caracteristicas">
          <p class="titulo">
            Caracteristicas
          </p>
          <div class="card-footer">
            <p>
              <i class="bi bi-dot"></i>
              <?php echo $instrumento->caracteristica1 ?>
            </p>
          </div>
          <div class="card-footer">
            <p>
              <i class="bi bi-dot"></i>
              <?php echo $instrumento->caracteristica2 ?>
            </p>
          </div>
          <div class="card-footer">
            <p>
              <i class="bi bi-dot"></i>
              <?php echo $instrumento->caracteristica3 ?>
            </p>
          </div>
          <div class="card-footer">
            <p>
              <i class="bi bi-dot"></i>
              <?php echo $instrumento->caracteristica4 ?>
            </p>
          </div>
          <div class="card-footer">
            <p>
              <i class="bi bi-dot"></i>
              <?php echo $instrumento->caracteristica5 ?>
            </p>
          </div>
          <div class="card-footer">
            <p>
              <i class="bi bi-dot"></i>
              <?php echo $instrumento->caracteristica6 ?>
            </p>
          </div>
          <div class="card-footer">
          </div>
        </section>
      </section>
    </section>

  </main>
  <script src="javascript/navbar.js"></script>
  <script>
    const otrasfotos = document.querySelectorAll('.otrafoto');

    // Agrega un evento clic a cada imagen
    otrasfotos.forEach(imagen => {
      imagen.addEventListener('click', () => {
        // Obtiene la URL de la imagen clickeada
        const url = imagen.getAttribute('src');
        // Selecciona la imagen principal y actualiza su URL
        const principal = document.querySelector('#principal');
        principal.setAttribute('src', url);
      });
    });
  </script>
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
</body>

</html>