<?php
require_once('redireccionar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riffs</title>
  <link rel="stylesheet" href="estilos/navbar.css">
  <link rel="stylesheet" href="estilos/colores.css">
  <link rel="stylesheet" href="estilos/sesionadmin.css">
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
      <a href="sesion.php"><i class="bi bi-person-fill"></i></a>
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
          <!-- 
          <ul class="submenu">
            <ul class="categoria">
              <li><a href="productos.php" class="menu-link">Guitarra</a></li>
              <li><a href="productos.php" class="menu-link">Nose</a></li>
              <li><a href="productos.php" class="menu-link">Nose2</a></li>
              <li><a href="productos.php" class="menu-link">Nose3</a></li>
            </ul>
          </ul>
           -->
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
    <section class="nombre">
      <article class="articulonombre">
        <h1>¡Hola
          <?php echo $_SESSION['nombre'] ?>!
        </h1>
        <h2>Desde aquí podrás administrar tu cuenta</h2>
      </article>
      <article class="logout">
        <a href="cerrarsesion.php">Cerrar sesión<i class="bi bi-chevron-right"></i></a>
      </article>
    </section>
    <section class="eleccion">
      <article class='columnas'>
        <a href="historial.php">
          <h3><i class="i bi-box-seam"></i></h3>
          <a href="historial.php">Detalles de mis pedidos</a>
        </a>
      </article>
      <article class='columnas'>
        <a href="carrito.php">
          <h3><i class="bi bi-bag"></i></h3>
          <a href="carrito.php">Carrito</a>
      </article>
      <article class='columnas'>
        <a href="informacion.php">
          <h3><i class="bi bi-info-circle"></i></h3>
          <a href="informacion.php">Información</a>
        </a>
      </article>
      <article class='columnas'>
        <a href="misdatos.php">
          <h3><i class="i bi-emoji-smile"></i></h3>
          <a href="misdatos.php">Mis datos personales</a>
        </a>
      </article>

      <article class='columnas'>
        <a href="admininstrumentos.php">
          <h3><i class="bi bi-plus-square"></i></h3>
          <a href="admininstrumentos.php">Administración de la web</a>
        </a>
      </article>

      <article class='columnas'>
        <a href="estadisticas.php">
          <h3><i class="bi bi-graph-up"></i></h3>
          <a href="estadisticas.php">Estadisticas</a>
        </a>
      </article>
    </section>



  </main>
  <script src="javascript/navbar.js"></script>
</body>

</html>