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
  <link rel="stylesheet" href="estilos/administracion.css">
  <link rel="stylesheet" href="bootstrap/bootstrap-icons.css">
  <link rel="stylesheet" href="lb/css/bootstrap.min.css">
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
      <a href="sesion.php"><i class="bi bi-person-fill"></i></a>
      <a href="favoritos.php"><i class="bi bi-heart"></i></a>
      <a href="carrito.php"><i class="bi bi-bag"></i></a>
    </div>
  </span>


  <nav class="main-nav">
    <ul class="menu list-unstyled" id="menu">
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
    <!-- Tabla -->
    <?php
    if (isset($_GET["btnbusq"])) {
      $busqueda = $_GET["buscar"];
      require "conexion.php";
      mysqli_select_db($conexion, $basededatos);
      mysqli_set_charset($conexion, "utf8");
      $consulta = "SELECT * FROM instrumento INNER JOIN caracteristica ON instrumento.id_instrumento = caracteristica.id_caracteristica INNER JOIN categoria ON instrumento.categoria = categoria.id_categoria
        WHERE instrumento.id_instrumento LIKE '$busqueda' || marca LIKE '$busqueda' || modelo LIKE '$busqueda' || descripcion LIKE '$busqueda%' || precio LIKE '$busqueda'";
      $resultado = mysqli_query($conexion, $consulta);
    } else {
      require "conexion.php";
      mysqli_select_db($conexion, $basededatos);
      mysqli_set_charset($conexion, "utf8");
      $consulta = "SELECT * FROM instrumento INNER JOIN caracteristica ON instrumento.id_instrumento = caracteristica.id_caracteristica INNER JOIN categoria ON instrumento.categoria = categoria.id_categoria ORDER BY instrumento.id_instrumento DESC";
      $resultado = mysqli_query($conexion, $consulta);
    }


    ?>

    <section id="resultados">

      <div class="elecciontabla">
        <a href="admininstrumentos.php" class="link active">Instrumentos</a>
        <a href="adminpersonas.php" class="">Personas</a>
      </div>

      <div class="busqueda">
        <div class="final">
          <a href="agregarinstrumento.php" class="form-field agregar2"><i class="bi bi-plus-lg"></i></a>
          <a href="agregarinstrumento.php" class="form-field agregar">Añadir instrumento</a>

        </div>
        <div class="buscar">
          <form class="form" role="search" method="get">
            <button name="btnbusq" type="submit">
              <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                aria-labelledby="search">
                <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                  stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </button>
            <input class="input" placeholder="Buscar" type="text" name="buscar">
            <button class="reset" type="reset">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </form>
        </div>
      </div>

      
      <?php
      while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        ?>
        <div class="table">
          <div class="item">
            <div class="row titulocolor">
              <div class="thead ">Id</div>
              <div class="tbody">
                <?php echo $registro["id_instrumento"]; ?>
              </div>
            </div>
            
            <div class="row">
              <div class="thead">Marca</div>
              <div class="tbody">
                <?php echo $registro["marca"]; ?>
              </div>
            </div>
            <div class="row">
              <div class="thead">Modelo</div>
              <div class="tbody">
                <?php echo $registro["modelo"]; ?>
              </div>
            </div>
            <div class="row">
              <div class="thead">Descripción</div>
              <div class="tbody">
                <?php echo $registro["descripcion"]; ?>
              </div>
            </div>
            <div class="row">
              <div class="thead">Categoría</div>
              <div class="tbody">
                <?php echo $registro["nombre"]; ?>
              </div>
            </div>
            <div class="row">
              <div class="thead">Precio</div>
              <div class="tbody">
                <?php echo $registro["precio"]; ?>€
              </div>
            </div>
            <div class="row">
              <div class="thead">Caract 1</div>
              <div class="tbody">
                <?php echo $registro["caracteristica1"]; ?>
              </div>
            </div>
            <div class="row">
              <div class="thead">Caract 2</div>
              <div class="tbody">
                <?php echo $registro["caracteristica2"]; ?>
              </div>
            </div>
            <div class="row">
              <div class="thead">Caract 3</div>
              <div class="tbody">
                <?php echo $registro["caracteristica3"]; ?>
              </div>
            </div>
            <div class="row">
              <div class="thead">Caract 4</div>
              <div class="tbody">
                <?php echo $registro["caracteristica4"]; ?>
              </div>
            </div>
            <div class="row">
              <div class="thead">Caract 5</div>
              <div class="tbody">
                <?php echo $registro["caracteristica5"]; ?>
              </div>
            </div>
            <div class="row">
              <div class="thead">Caract 6</div>
              <div class="tbody">
                <?php echo $registro["caracteristica6"]; ?>
              </div>
            </div>
            <div class="row">
              <div class="thead">Editar</div>
              <div class="tbody">
                <a class="edit" href="editarinstrumento.php?id=<?php echo $registro["id_instrumento"]; ?>"><i
                    class="bi bi-pencil-square"></i></a>
              </div>
            </div>

          </div>


        </div>
        <?php
      }
      ?>




    </section>



    <script src="lb/js/bootstrap.min.js"></script>



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