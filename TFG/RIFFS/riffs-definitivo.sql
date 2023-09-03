-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2023 a las 23:29:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `riffs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristica`
--

CREATE TABLE `caracteristica` (
  `id_caracteristica` int(5) NOT NULL,
  `caracteristica1` varchar(100) NOT NULL,
  `caracteristica2` varchar(100) NOT NULL,
  `caracteristica3` varchar(100) NOT NULL,
  `caracteristica4` varchar(100) NOT NULL,
  `caracteristica5` varchar(100) NOT NULL,
  `caracteristica6` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caracteristica`
--

INSERT INTO `caracteristica` (`id_caracteristica`, `caracteristica1`, `caracteristica2`, `caracteristica3`, `caracteristica4`, `caracteristica5`, `caracteristica6`) VALUES
(1, 'Ash Body', 'Gloss Polyurethane Finish', 'Pure Vintage \'73 Single-Coil Strat® pickups', '“C”-Shaped Neck Profile', 'Pure Vintage Synchronized Tremolo with Bent Steel Saddles', 'Pure Vintage Single-Line “Fender Deluxe” Tuners'),
(3, 'Cuerpo de álamo', 'Color : Olympic White', 'Trastes: 21 trastes medium-jumbo', 'Pastillas: cerámicas de bobina simple y humbucking Squier', 'Escala: 25.5', 'Selector de pastillas de 5 posiciones'),
(7, 'Combo de guitarra eléctrica', '50W', 'Altavoz de 12', '100 presets ajustables', '14 modelos de preamplificador', '4 modelos de amplificador'),
(8, 'Terminación Deluxe', 'Conectores Jack recto a Jack recto', 'Contactos bañados en oro de 24 K', 'Longitud: 3 m', 'Funda de 8 mm de PVC para evitar ruido asociado', 'Apantallado: 95% de cobre'),
(9, 'Tapa de pícea de Sitka maciza', 'Refuerzos en \'X\' con alivio (relief route)', 'Aros y fondo de palisandro en capas', 'Mástil de sapeli', 'Diapasón de ébano', 'Inlays de puntos'),
(10, 'Guitarra flamenca nivel estudiante.', 'Tapa: Abeto Alemán Macizo', 'Aros y fondo: Sicomoro Contrachapado', 'Mango: Samanguila', 'Diapason: Ébano', 'Clavijero: Dorados'),
(11, 'Guitarra eléctrica con cuerpo de caoaba', 'Mástil de caoba', 'Medida: 628 mm', 'Diapasón de ebano', '24 trastes extra jumbo', 'Ancho de cejuela: 42,0 mm'),
(34, 'Para guitarra clásica', 'Construido en madera', 'Exterior imitación de piel negra', 'Interior de terciopelo negro', 'Material rígido ', 'Color negro'),
(35, 'Seis voces distintas con boost', 'Graba fácilmente con la interfaz USB', 'Fácil conectividad para dispositivos externos con el FX Loop', 'Entrada de Power Amp', 'Resistente y portátil para un uso fiable en todo momento', 'Reverb independientes'),
(37, 'Color:Tidepool', 'Cuerpo:Alder', 'Acabado del cuerpo:Gloss Polyester', 'Material del mástil:Maple', 'Máximo sonido', 'Forma del mástil:Modern '),
(38, 'Tipo de cuerpo: Dreadnought con cutaway', 'Tapa: Abeto maciza', 'Aros y fondo: Caoba', 'Sistema de varetaje: Escalopado en forma de ', 'Mástil: Caoba', 'Forma de mástil: Fender Easy-to-play'),
(39, 'Material: Nylon negro ligeramente acolchado', 'Para: transportar y proteger tu guitarra dondequiera que vayas', 'Desarrolladas y probadas por los maestros luthiers de Gibson', 'Color: Negro', 'Incluye: Bolsillo exterior y correa para el hombro', 'Máxima calidad'),
(40, 'Artist Signature Serie', 'Cuerpo de caoba', 'Modern C Shape', 'Mástil de arce', '22 trastes Jumbo', 'Diapasón de ébano'),
(41, 'Tamaño 4/4.', 'Escala de 650 mm x 52 mm.', 'Color natural relicado.', 'Herrajes cromados.', 'Longitud de la escala es de 650 mm', 'Anchura es de 52 mm'),
(42, 'Trasera del cuerpo: Sapelli laminado', 'Laterales del cuerpo: Arce', 'Tapa del cuerpo: Maciza de cedro ', 'Clavijeros: Niquelados básicos', 'Mástil: Samanguila', 'Diapasón: Palosanto de India'),
(44, 'Totalmente diseñado por Fender', 'Dos pastillas Telecaster de bobina simple', 'Cuerpo delgado y ligero', 'Pastillas: cerámicas de bobina simple y humbucking Squier', 'Pure Vintage Synchronized Tremolo with Bent Steel Saddles', 'Color negro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(5) NOT NULL,
  `id_instrumento` int(5) NOT NULL,
  `id_persona` int(5) NOT NULL,
  `cantidad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `id_instrumento`, `id_persona`, `cantidad`) VALUES
(147, 1, 1, 1),
(151, 39, 12, 1),
(155, 41, 1, 2),
(156, 41, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(5) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'Guitarra española'),
(2, 'Guitarra acustica'),
(3, 'Guitarra electrica'),
(4, 'Amplificadores'),
(5, 'Cables'),
(6, 'Fundas'),
(7, 'Accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(5) NOT NULL,
  `id_instrumento` int(5) NOT NULL,
  `id_persona` int(5) NOT NULL,
  `cantidad` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `postal` int(6) DEFAULT NULL,
  `telefono` int(14) DEFAULT NULL,
  `nombre_envio` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `nbancario` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `id_instrumento`, `id_persona`, `cantidad`, `fecha`, `direccion`, `municipio`, `postal`, `telefono`, `nombre_envio`, `tipo`, `nbancario`) VALUES
(18, 11, 1, 1, '2023-03-07', 'Calle Santillana del Mar Nº 21 chalet 45', 'Boadilla del Monte', 28660, 648052682, 'Gon', 'Visa', 0),
(19, 41, 6, 1, '2023-02-15', 'Calle Murcia', 'Alcorcon', 28562, 673829384, 'Maria Rodriguez', 'Mastercard', 2147483647),
(20, 39, 6, 1, '2023-04-27', 'Calle Murcia', 'Alcorcon', 28562, 673829384, 'Maria Rodriguez', 'Mastercard', 2147483647),
(21, 8, 1, 2, '2023-05-15', 'Calle Santillana del Mar Nº 21 chalet 45', 'Boadilla del Monte', 28660, 648052682, 'Gonzalo Pascual Romero', 'Visa', 2147483647),
(22, 3, 1, 8, '2023-03-30', 'Calle Santillana del Mar Nº 21 chalet 45', 'Boadilla del Monte', 28660, 648052682, 'Gonzalo Pascual Romero', 'Visa', 2147483647),
(23, 7, 1, 5, '2023-01-20', 'Calle Santillana del Mar Nº 21 chalet 45', 'Boadilla del Monte', 28660, 648052682, 'Gonzalo Pascual Romero', 'Visa', 2147483647),
(24, 34, 1, 1, '2023-04-12', 'Calle Santillana del Mar Nº 21 chalet 45', 'Boadilla del Monte', 28660, 648052682, 'Gonzalo Pascual Romero', 'Visa', 2147483647),
(25, 41, 1, 1, '2023-05-20', 'Calle Santillana del Mar Nº 21 chalet 45', 'Boadilla del Monte', 28660, 648052682, 'Gonzalo Pascual Romero', 'Visa', 2147483647),
(27, 8, 1, 1, '2023-05-20', 'Calle Santillana del Mar Nº 21 chalet 45', 'Boadilla del Monte', 28660, 648052682, 'Gonzalo Pascual Romero', 'Visa', 2147483647),
(28, 37, 1, 1, '2023-05-21', 'Calle Santillana del Mar Nº 21 chalet 45', 'Boadilla del Monte', 28660, 648052682, 'Gonzalo Pascual Romero', 'Visa', 2147483647),
(29, 42, 1, 3, '2023-06-04', 'Calle Santillana del Mar Nº 21 chalet 45', 'Boadilla del Monte', 28660, 648052682, 'Gonzalo Pascual Romero', 'Visa', 2147483647),
(30, 40, 1, 1, '2023-06-20', 'Calle Santillana del Mar Nº 21 chalet 45', 'Boadilla del Monte', 28660, 648052682, 'Gonzalo Pascual Romero', 'Visa', 2147483647),
(31, 11, 4, 1, '2023-06-20', 'Calle Jose Camilo', 'Madrid', 29093, 68943298, 'Mario Perez Garcia', 'Mastercard', 2147483647),
(32, 37, 4, 2, '2023-06-20', 'Calle Jose Camilo', 'Madrid', 29093, 68943298, 'Mario Perez Garcia', 'Mastercard', 2147483647),
(33, 41, 1, 1, '2023-06-20', 'Calle Hercules Nº 4 chalet 12', 'Boadilla del Monte', 28660, 2147483647, 'Gonzalo Pascual Romero', 'Visa', 2147483647),
(34, 35, 1, 1, '2023-06-20', 'Calle Hercules Nº 4 chalet 12', 'Boadilla del Monte', 28660, 2147483647, 'Gonzalo Pascual Romero', 'Visa', 2147483647),
(36, 40, 12, 1, '2023-06-20', 'Calle Mayor', 'Pozuelo', 28660, 123456789, 'Martina', 'Mastercard', 2147483647),
(37, 41, 12, 1, '2023-06-20', 'Calle Mayor', 'Pozuelo', 28660, 123456789, 'Martina', 'Mastercard', 2147483647),
(38, 35, 12, 2, '2023-06-20', 'Calle Mayor', 'Pozuelo', 28660, 123456789, 'Martina', 'Mastercard', 2147483647),
(39, 38, 13, 1, '2023-06-20', 'Calle Fabial', 'Madrid', 12345, 123456789, 'Pedro', 'Mastercard', 2147483647),
(40, 8, 13, 1, '2023-06-20', 'Calle Fabial', 'Madrid', 12345, 123456789, 'Pedro', 'Mastercard', 2147483647),
(41, 7, 13, 1, '2023-06-20', 'Calle Fabial', 'Madrid', 12345, 123456789, 'Pedro', 'Mastercard', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `id_persona` int(5) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `postal` int(5) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `telefono` int(14) DEFAULT NULL,
  `nombre_tarjeta` varchar(150) DEFAULT NULL,
  `nbancario` bigint(20) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`id_persona`, `direccion`, `postal`, `municipio`, `telefono`, `nombre_tarjeta`, `nbancario`, `tipo`) VALUES
(1, 'Calle Hercules Nº 4 chalet 12', 28660, 'Boadilla del Monte', 2147483647, 'Gonzalo Pascual Romero', 1234567890124, 'Visa'),
(4, 'Calle Jose Camilo', 29093, 'Madrid', 68943298, 'Mario Perez Garcia', 2147483647234, 'Mastercard'),
(6, 'Calle Murcia', 28562, 'Alcorcon', 673829384, 'Maria Rodriguez', 2147483647234234, 'Mastercard'),
(9, 'Calle Santillana del Mar Nº 21 chalet 45', 28660, 'Boadilla del Monte', 648052682, 'Manuel Sanchez', 2147483647, 'MasterCard'),
(11, 'Calle Jose Camilo', 29093, 'Madrid', 68943298, 'Mario Perez Garcia', 23423423, 'Mastercard'),
(12, 'Calle Mayor', 28660, 'Pozuelo', 123456789, 'Martina', 12345678901234, 'Mastercard'),
(13, 'Calle Fabial', 12345, 'Madrid', 123456789, 'Pedro', 12345678901234, 'Mastercard'),
(14, '', NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE `favorito` (
  `id_favorito` int(5) NOT NULL,
  `id_instrumento` int(5) NOT NULL,
  `id_persona` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `favorito`
--

INSERT INTO `favorito` (`id_favorito`, `id_instrumento`, `id_persona`) VALUES
(18, 41, 4),
(19, 37, 4),
(28, 37, 5),
(29, 35, 5),
(43, 7, 1),
(47, 11, 4),
(48, 40, 12),
(49, 41, 12),
(50, 37, 12),
(51, 35, 12),
(52, 10, 12),
(53, 8, 12),
(54, 3, 12),
(55, 38, 13),
(56, 8, 13),
(57, 34, 13),
(58, 35, 13),
(59, 11, 13),
(60, 7, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumento`
--

CREATE TABLE `instrumento` (
  `id_instrumento` int(5) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `descripcion` varchar(600) NOT NULL,
  `precio` float NOT NULL,
  `categoria` int(5) NOT NULL,
  `foto1` varchar(60) NOT NULL,
  `foto2` varchar(60) NOT NULL,
  `foto3` varchar(60) NOT NULL,
  `foto4` varchar(60) NOT NULL,
  `vistas` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `instrumento`
--

INSERT INTO `instrumento` (`id_instrumento`, `marca`, `modelo`, `descripcion`, `precio`, `categoria`, `foto1`, `foto2`, `foto3`, `foto4`, `vistas`) VALUES
(1, 'Fender', 'American Vintage', 'The Fender® American Vintage II series presents a remarkably accurate take on the revolutionary designs that altered the course of musical history. Built with period-accurate bodies, necks and hardware, premium finishes and meticulously voiced, year-specific pickups, each instrument captures the essence of authentic Fender craftsmanship and tone.', 2549, 3, 'fotos/americanvintage.png', 'fotos/americanvintage1.png', 'fotos/americanvintage2.png', 'fotos/americanvintage3.png', 35),
(3, 'Squier', 'FSR Affinity Strato', 'La serie Affinity es una de las series de mayor venta de Squier. Ideales para principiantes que buscan encontrar una guitarra de gran calidad desde el primer momento. Son guitarras caracterizadas por su facilidad de ejecución, su increíble tono legendario y el estilo atemporal. Los instrumentos de la serie Affinity de Squier están pensados para adaptarse a los aficionados domésticos y a los profesionales experimentados que buscan su próximo sonido inspirador. Esta guitarra es una opción estupenda para los nuevos aspirantes.', 289, 3, 'fotos/affinity.png', 'fotos/affinity1.png', 'fotos/affinity2.png', 'fotos/affinity3.png', 27),
(7, 'Marshall', 'CODE 50 112 Combo', 'Marshall Code es la nueva serie de amplificación de modelado de Marshall que ofrece los sonidos clásicos de los amplificadores insignia de la marca. Los amplificadores de la serie CODE son controlables desde la app Marshall Gateway (para iOS o Android) con la que además podemos compartir presets con otros usuarios. La misma tecnología Bluetotth sirve además para poder enviar audio inalámbricamente al amplificador para, por ejemplo, reproducir música utilizando los altavoces del ampli o para practicar sobre una base gracias a su salida mp3. Por último, su conexión USB permite utilizar los ampli', 285, 4, 'fotos/code50.png', 'fotos/code501.png', 'fotos/code502.png', 'fotos/code503.png', 16),
(8, 'Fender', 'Deluxe BTweed', 'Fender Deluxe Series 3M BTweed para un sonido excelente y blablablabla', 16.9, 5, 'fotos/Delux3M.png', 'fotos/Delux3M1.png', 'fotos/Delux3M2.png', 'fotos/Delux3M3.png', 9),
(9, 'Taylor', 'GS Rosewood', 'La acústica Taylor GS Mini es una guitarra muy popular de gran sonido pese a su reducido tamaño. Concebida como guitarra de viaje, esta acústica es mucho más que eso, ya que su pequeño cuerpo es capaz de entregar buenas dosis de volumen. Ni que decir tiene que en su construcción se emplea la calidad de las maderas y construcción que caracterizan a las guitarras acústicas Taylor.', 629, 2, 'fotos/rosewood.png', 'fotos/rosewood1.png', 'fotos/rosewood2.png', 'fotos/rosewood3.png', 9),
(10, 'Alhambra', '4F', 'Al igual que su homólogo clásico, el modelo 4 P, la flamenca 4 F es un instrumento muy equilibrado.\r\nEste modelo es la versión mejorada del modelo 3 F. En este caso con clavijero dorado y diapasón de ébano, además de su atractivo color anaranjado en toda la caja de resonancia. Una cualidad que confiere a este instrumento un valor añadido y lo convierte en una pieza que se diferencia del resto.', 632, 2, 'fotos/fender.png', 'fotos/fender1.png', 'fotos/fender2.png', 'fotos/fender3.png', 5),
(11, 'Esp Ltd', 'EC-1000VBDR Duncan', 'Las guitarras de la serie LTD EC-1000 están diseñadas para ofrecer el tono, la sensación, la apariencia y la calidad que los músicos profesionales que trabajan necesitan en un instrumento ', 1059, 3, 'fotos/duncan.png', 'fotos/duncan1.png', 'fotos/duncan2.png', 'fotos/duncan3.png', 24),
(34, 'CNB', 'CC20 Rígido', 'Protege al máximo tu guitarra clásica con este estupendo estuche rígido de guitarra clásica de la marca CNB. Está construido en su totalidad en madera, y en el exterior cuenta con una imitación a piel negra. El interior del estuche está forrado de terciopelo negro. En Musicopolix tenemos todos los accesorios que puedas necesitar. ', 119, 6, 'fotos/CC20.png', 'fotos/CC201.png', 'fotos/CC202.png', 'fotos/CC203.png', 11),
(35, 'Line 6', 'Catalyst 60', 'El Line 6 Catalyst 60W 1x12 Combo Amp combina las cualidades tonales de un amplificador de guitarra tradicional con la funcionalidad ampliada de los amplificadores de modelado para ofrecer realmente lo mejor de ambos mundos. Ofrece seis diseños de amplificador originales que van desde limpios prístinos con una claridad excepcional, pasando por tonos más crujientes sensibles al tacto, hasta una ganancia alta moderna; nunca ha sido tan fácil marcar un tono que sea perfecto para cualquier situación. Para agravar esta versatilidad hay un circuito de Boost personalizado para cada tipo de amplificad', 283, 4, 'fotos/Catalyst.png', 'fotos/Catalyst1.png', 'fotos/Catalyst2.png', 'fotos/Catalyst3.png', 6),
(37, 'Fender', 'Telecaster Player Mn', 'Audaz, innovadora y resistente, la Player Telecaster es una auténtica Fender, de principio a fin. La sensación, el estilo y, lo más importante, el sonido: lo tiene todo, esperando que la utilices para hacer tu música. Lo suficientemente versátil para casi cualquier cosa que puedas crear y lo suficientemente resistente como para sobrevivir a cualquier concierto, esta herramienta musical es una fiel compañera en tu viaje musical.', 745, 3, 'fotos/telecasterplayer.png', 'fotos/telecasterplayer1.png', 'fotos/telecasterplayer2.png', 'fotos/telecasterplayer3.png', 40),
(38, 'Fender', 'CD-60SCE', 'Combina un potente sistema electrónico integrado -incluido un afinador- con un gran tono y una gran facilidad de ejecución, es ideal para los músicos de nivel principiante e intermedio que están listos para conectarse. Con un cuerpo de corte veneciano para facilitar el acceso a los trastes superiores, una tapa de abeto macizo para aumentar el volumen y un sonido nítido, un mástil fácil de tocar y un fondo y unos aros de caoba, la guitarra CD-60SCE es perfecta para el sofá, la hoguera o la cafetería, en cualquier lugar en el que desee una capacidad de ejecución y un sonido Fender clásicos.', 259, 2, 'fotos/CD-60SCE.png', 'fotos/CD-60SCE1.png', 'fotos/CD-60SCE2.png', 'fotos/CD-60SCE3.png', 21),
(39, 'CNB', 'DB400', 'No dejes pasar esta oportunidad de proteger tu guitarra cuando slagas de casa con ella con las fantásticas fundas de CNB. Hecha con materiales de calidad que aseguran el cuidado tu guitarra de la mejor forma. Si tienes dudas es que no has probado estas fundas.', 21, 6, 'fotos/DB400.png', 'fotos/DB4001.png', 'fotos/DB4002.png', 'fotos/DB4003.png', 34),
(40, 'Fender', 'Jim Root', 'Para un estilo de nu-metal Stratocaster, la guitarra eléctrica Jim Root Stratocaster ofrece un sonido aplastante con una estética contundente y práctica a la vez. El imponente guitarrista de Slipknot ha colaborado con Fender para crear un modelo Stratocaster firma que complementa su estilo de guitarra pesada, y que es una guitarra completa, ya desde su diapasón de radio compuesto (12 \"a 16\"), las pastillas activas EMG® o la disposición de controles simplificada, y mucho más. Brutal. No dejes pasar esta oportunidad y ven a Musicopolix para probar esta maravilla. ', 1880, 3, 'fotos/JimRoot.png', 'fotos/Jim Root Stratocaster1.png', 'fotos/Jim Root Stratocaster2.png', 'fotos/Jim Root Stratocaster3.png', 73),
(41, 'Valencia', 'VC404', 'La guitarra clásica VC404 pertenece a la serie 400, y cuenta con un tamaño de 4/4.Entre sus características encontramos una cubierta de abeto Sitka, trasera y lateralea de Nato,  mástil de caoba con diapasón de palisandro y 19 trastes de níquel.\r\n\r\nLa longitud de la escala es de 650 mm y la anchura es de 52 mm.También cuenta con puente de palo rosa, oro plateado en los clavijeros tradicionales con palomillas perladas, puntos laterales del cuello, de 5 capas negras / unión en el lado superior, el cuello ABS negro y vinculante lado y de 5 capas negro / blanco ABS volver franja central ABS blanco', 119, 1, 'fotos/ValenciaVC404.png', 'fotos/ValenciaVC4041.png', 'fotos/ValenciaVC4042.png', 'fotos/ValenciaVC4043.png', 74),
(42, 'Alhambrassssss', '2C', 'Esta guitarra pertenece a la línea de estudio de guitarras Alhambra, garantizando una gran calidad y óptimo trabajo. La guitarra Alhambra 2C está compuesta por tapa de cedro macizo, mástil de samanguila, fondo de sapelli laminado y su diapasón de pavonaste de India.\r\n\r\nDestacan sus clavijeros niquelados. La guitarra Alhambra 2C es una muy buena opción para principiantes ya que, al estar construida de cedro, nos asegura que el sonido será cada vez mejor, cuanto más la toques, mejor sonará. Tiene una gran calidad y volumen de sonido, en parte, gracias a su diapasón de palosanto.  En síntesis, la', 415, 1, 'fotos/Alhambra2C.png', 'fotos/Alhambra2C1.png', 'fotos/Alhambra2C2.png', 'fotos/Alhambra2C3.png', 19),
(44, 'Squier ', 'Bullet Telecaster LRL', 'Diseñado para guitarristas que buscan un instrumento asequible, elegante y versátil, la Bullet® Telecaster® adquiere el aspecto y el sonido clásicos que hicieron de Tele® un verdadero ícono. En particular, presenta un cuerpo delgado y liviano, un mástil de perfil en \"C\" fácil de manejar, dos pastillas de bobina simple con un interruptor de tres posiciones que le dan una gran variedad tonal, así como un puente de cuerdas a través fijo que garantiza una perfecta estabilidad de afinación.', 189, 1, 'fotos/bullet.png', 'fotos/bullet1.png', 'fotos/bullet2.png', 'fotos/bullet3.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `acceso` int(1) NOT NULL,
  `fnac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `correo`, `clave`, `acceso`, `fnac`) VALUES
(1, 'Gonzalo', 'Pascual', 'gonzalo.pascualromero@gmail.com', 'Gonzalo', 1, NULL),
(4, 'Mario', 'Perez', 'marioperez@gmail.com', 'Mario', 0, NULL),
(6, 'Maria', 'Rodriguez', 'mariarodriguez@gmail.com', 'Maria', 0, '2004-02-05'),
(9, 'Manuel', 'Sanchez', 'manuel@gmail.com', 'Manuel', 1, NULL),
(11, 'Lucia', 'Perez', 'luciaperez@gmail.com', 'Lucia', 0, '1998-04-16'),
(12, 'Martina', 'Rodriguez', 'martinarodriguez@gmail.com', 'Martina', 0, NULL),
(13, 'Pedro', 'Alonso', 'pedroalonso@gmail.com', 'Pedro', 0, NULL),
(14, 'Sofia', 'Perez', 'sofiaperez@gmail.com', 'Sofia', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseña`
--

CREATE TABLE `reseña` (
  `id_reseña` int(5) NOT NULL,
  `id_instrumento` int(5) NOT NULL,
  `id_persona` int(5) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `estrellas` int(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscripciones`
--

CREATE TABLE `subscripciones` (
  `id_sub` int(6) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `subscripciones`
--

INSERT INTO `subscripciones` (`id_sub`, `correo`) VALUES
(1, 'gonzalo.pascualromero@gmail.com'),
(2, 'juanmartin234@gmail.com'),
(3, 'elenaperez22@gmail.com'),
(4, 'marioperez@gmail.com'),
(5, 'maria.lopezgomez@gmail.com'),
(6, 'pedrito@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  ADD PRIMARY KEY (`id_caracteristica`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_instrumento` (`id_instrumento`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_instrumento` (`id_instrumento`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`id_favorito`);

--
-- Indices de la tabla `instrumento`
--
ALTER TABLE `instrumento`
  ADD PRIMARY KEY (`id_instrumento`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD PRIMARY KEY (`id_reseña`),
  ADD KEY `id_instrumento` (`id_instrumento`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `subscripciones`
--
ALTER TABLE `subscripciones`
  ADD PRIMARY KEY (`id_sub`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  MODIFY `id_caracteristica` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `id_persona` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `favorito`
--
ALTER TABLE `favorito`
  MODIFY `id_favorito` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `instrumento`
--
ALTER TABLE `instrumento`
  MODIFY `id_instrumento` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `reseña`
--
ALTER TABLE `reseña`
  MODIFY `id_reseña` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subscripciones`
--
ALTER TABLE `subscripciones`
  MODIFY `id_sub` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_instrumento`) REFERENCES `instrumento` (`id_instrumento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_instrumento`) REFERENCES `instrumento` (`id_instrumento`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `instrumento`
--
ALTER TABLE `instrumento`
  ADD CONSTRAINT `instrumento_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD CONSTRAINT `reseña_ibfk_1` FOREIGN KEY (`id_instrumento`) REFERENCES `instrumento` (`id_instrumento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
