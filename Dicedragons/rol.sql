-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2021 a las 19:35:29
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `nombre`, `descripcion`) VALUES
(1, 'BÁRBARO', 'Acostumbrados a territorios salvajes, los bárbaros se han curtido con cientos de peligros que los han hecho más y más duros. Son luchadores, diestros con todo tipo de armas y capaces de dejarse llevar por una tremenda furia salvaje cuando es preciso.'),
(2, 'BARDO', 'Ya sea un erudito, un poeta o un canalla, un bardo teje su magia a través de sus palabras y su música para inspirar a los aliados, desmoralizar a los enemigos, manipular mentes, crear ilusiones e incluso sanar heridas.'),
(3, 'BRUJO', 'Los brujos son buscadores del conocimiento que se encuentra escondido en el multiverso. A través de pactos hechos con seres poderosos de poder sobrenatural, los brujos desatan efectos mágicos tanto sutiles como espectaculares y recolectan secretos arcanos para potenciar su propio poder.'),
(4, 'CLÉRIGO', 'Los clérigos son intermediarios entre el mundo mortal y los distantes planos divinos. Tan diferentes entre ellos como los dioses a los que sirven, los clérigos se esfuerzan por personificar las obras de sus deidades. No son sacerdotes ordinarios, un clérigo se encuentra imbuido de magia divina.'),
(5, 'DRUIDA', 'Ya sea invocando a las fuerzas elementales o emulando a las criaturas del mundo animal, los druidas son la personificación de la resistencia, astucia y furia de la naturaleza. Dicen no tener un dominio sobre la naturaleza. En lugar de eso, se ven como una extensión de la voluntad indomable de la misma.'),
(6, 'EXPLORADOR', 'Los exploradores son aventureros acostumbrados a viajar por territorios inhóspitos y a enfrentarse a los peligros. A diferencia de los bárbaros, motivados por la mera supervivencia, los exploradores son hábiles cazadores capaces de sobrevivir por sí solos en plena naturaleza y de lanzar algunos conjuros.'),
(7, 'GUERRERO', 'Entrenados con el único fin de derrotar a sus enemigos, los guerreros son los combatientes perfectos: están acostumbrados a resistir el daño, saben manejar todo tipo de armas y armaduras, y conocen algunos trucos que les ayudan en combate.'),
(8, 'HECHICERO', 'La mayor parte de los lanzadores de conjuros han hecho alguna clase de sacrificio para obtener sus poderes, sea un estudio disciplinado o una alianza con un ser de más allá de este mundo. Al hechicero, en cambio, el poder le corre por las venas desde su mismo nacimiento y ha debido aprender a dominarlo.'),
(9, 'MAGO', 'Los magos son los lanzadores de conjuros por antonomasia. Gracias a un profundo estudio y disciplina, han conseguido dominar las artes arcanas. Aunque las exigencias del aprendizaje de la magia los han hecho sabios, también les ha impedido saber defenderse con las armas como otras clases de personaje.'),
(10, 'MONJE', 'Los monjes son aventureros que se han centrado en el descubrimiento de sí mismos. Mediante la autocontemplación y la disciplina, han perfeccionado su cuerpo y su alma, de forma que combaten con las manos desnudas con la misma habilidad que un soldado lo hace con su espada.'),
(11, 'PALADÍN', 'Garantes de la justicia y el bien, los paladines son guerreros que se han consagrado a una causa divina. Aunque no sean combatientes tan versátiles como los guerreros, los paladines son capaces realizar algunos conjuros y poner en práctica otras capacidades para ayudar a sus compañeros y salvar a los inocentes. Si quieres interpretar a un personaje destinado a luchar contra el mal y proteger a los débiles, elige paladín como clase de personaje.\r\n\r\nEn Voldor, todas las razas adoran a El Peregrino, un dios todopoderoso. Sin embargo, con el transcurso de los años, algunas de estas razas (especialmente las tribales) han creado sus propios dioses, que no son sino diferentes aspectos de El Peregrino. El jugador que interprete a un paladín puede decidir si sigue los dictados de El Peregrino o de una falsa deidad (que será un aspecto de El Peregrino concediéndole conjuros).'),
(12, 'PÍCARO', 'Los pícaros son hábiles pasando desapercibidos, entrando en lugares inaccesibles y llevándose las pertenencias de los demás antes de que sepas qué ha sucedido. Un pícaro no siempre actúa por codicia, sino que puede utilizar ese talento natural para ayudar a los demás.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210727191009', '2021-07-27 21:10:37', 50),
('DoctrineMigrations\\Version20210728161803', '2021-07-28 18:18:36', 52),
('DoctrineMigrations\\Version20210729181825', '2021-07-29 20:18:33', 79),
('DoctrineMigrations\\Version20210730145701', '2021-07-30 16:57:14', 447),
('DoctrineMigrations\\Version20210829131937', '2021-08-29 15:19:50', 413),
('DoctrineMigrations\\Version20210901173144', '2021-09-01 19:31:51', 223);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE `partida` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `proxima_sesion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `partida`
--

INSERT INTO `partida` (`id`, `usuario_id`, `proxima_sesion`) VALUES
(2, 1, '2021-09-06 14:00:00'),
(3, 1, '2016-01-01 00:00:00'),
(4, 8, '2021-09-10 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida_personaje`
--

CREATE TABLE `partida_personaje` (
  `partida_id` int(11) NOT NULL,
  `personaje_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `partida_personaje`
--

INSERT INTO `partida_personaje` (`partida_id`, `personaje_id`) VALUES
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 3),
(3, 4),
(3, 7),
(4, 3),
(4, 4),
(4, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaje`
--

CREATE TABLE `personaje` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `raza_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alienacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trasfondo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fuerza` int(11) NOT NULL,
  `Destreza` int(11) NOT NULL,
  `Constitucion` int(11) NOT NULL,
  `Inteligencia` int(11) NOT NULL,
  `Sabiduria` int(11) NOT NULL,
  `Carisma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personaje`
--

INSERT INTO `personaje` (`id`, `usuario_id`, `raza_id`, `nombre`, `alienacion`, `trasfondo`, `Fuerza`, `Destreza`, `Constitucion`, `Inteligencia`, `Sabiduria`, `Carisma`) VALUES
(1, 1, 3, 'Fruad', 'Caotico Neutral', 'Forastero', 0, 0, 0, 0, 0, 0),
(3, 1, 4, 'Loona', 'Bueno legal', 'Noble', 0, 0, 0, 0, 0, 0),
(4, 1, 10, 'Voltaire', 'Caotico legal', 'Noble', 0, 0, 0, 0, 0, 0),
(5, 1, 9, 'Nathan', 'Caotico legal', 'Noble', 0, 0, 0, 0, 0, 0),
(6, 7, 11, 'Skully', 'Legal malvado', 'Ermitaño', 0, 0, 0, 0, 0, 0),
(7, 7, 9, 'Greg ', 'Legal malvado', 'puto', 3, 3, 3, -1, -1, -1),
(11, 7, 1, 'Nathan', 'Neutro', 'Noble', 3, 3, 3, -1, -1, -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaje_clases`
--

CREATE TABLE `personaje_clases` (
  `personaje_id` int(11) NOT NULL,
  `clases_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personaje_clases`
--

INSERT INTO `personaje_clases` (`personaje_id`, `clases_id`) VALUES
(1, 2),
(1, 10),
(3, 10),
(3, 11),
(4, 3),
(5, 1),
(6, 3),
(7, 2),
(11, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'FÓRMIGO', 'Los hombres hormiga son de los seres más extraordinarios de Voldor por su inteligencia, carácter práctico, paciencia, responsabilidad y laboriosidad. Son criaturas pacíficas, solo preocupadas por la prosperidad de sus colonias. Rara vez iniciarán un conflicto, pero se defenderán de manera implacable llegado el caso.\r\n'),
(2, 'BATROK', 'Los batrok son una temida raza palustre. Su apariencia, de sapos antropomorfos, su idioma gutural y su tendencia belicosa los hacen criaturas peligrosas con las que encontrarse. Los batrok llevan tanto tiempo defendiendo sus territorios de criaturas salvajes que han olvidado que en tiempos fueron seres civilizados.'),
(3, 'CENTAURO', 'Los centauros son mitad hombres y mitad caballos: la parte superior de su cuerpo es humanoide, mientras que de cintura para abajo tienen un cuerpo equino con cuatro fuertes patas que les permiten correr a gran velocidad.'),
(4, 'ELFO', 'De entre todas las razas creadas por los Peregrinos en Voldor, los elfos sobresalían por encima de todas las demás. Eran y son criaturas hermosas, pero inquietantes y crueles, pues eran conscientes de su superioridad al poder medrar bajo la protección de sus creadores sin sufrir su desprecio y su cólera.'),
(5, 'ENANO', 'Tal y como su nombre evoca, los enanos parecen humanos achaparrados, corpulentos y velludos, hasta el punto de que los varones han convertido el cuidado de sus barbas en todo un arte.'),
(6, 'GNOMO', 'Pequeños y optimistas, los gnomos son criaturas con gran voluntad. Sus orejas puntiagudas son como las de los elfos, pero su rostro recuerda más al de un niño humano. Tras esta apariencia inofensiva se encuentran unas criaturas sumamente inteligentes y con un talento extraordinario para el saber, la creación y la magia.'),
(7, 'HUMANO', 'Considerados inferiores por algunas otras razas, los humanos tienen en su número y en su adaptabilidad su gran fuerza, esa que los convierte en una raza a tener en cuenta. Su apariencia es muy variada, especialmente en lo referido al tono de piel, de pelo y color de ojos.'),
(8, 'MEDIANO', 'Conocidos también como «mediohombres», los medianos pa- recen humanos en miniatura. Apenas se diferencian de niños humanos por su rostro de adulto y, en el caso de los varones, por el abundante vello en todo el cuerpo, especialmente en los pies. Comparten buena parte de la cultura de sus «hermanos mayores» e incluso sus lenguas tienen abundantes paralelismos.'),
(9, 'ORCO', 'De piel verdosa o negra y grandes colmillos que les sobresalen de la boca, los orcos son una raza tribal para la que la lucha es la única forma de vida, educada en torno a la batalla y el conflicto. Entre los orcos, los sabios son escasos: en su lugar veneran a aquel que es capaz de derrotar a los demás, sea mediante las armas o la magia.'),
(10, 'SEMIELFO', 'Los semielfos son una raza bastarda, fruto del apareamiento de elfo y humano. A diferencia de los semiorcos, en los que el vástago manifiesta los rasgos de uno de los progenitores, los semielfos son humanos de orejas levemente puntiagudas y con muy escaso vello facial, lo que les da una apariencia única.'),
(11, 'SEMIORCO', 'Al igual que los semielfos, los semiorcos son testimonio viviente de la interacción entre dos razas. En este caso, además, dos que suelen tener un pasado como adversarios más que como aliados: humanos y orcos. Los semiorcos suelen tener rasgos que recuerdan más a una de las dos especies, aparentando ser o bien humanos anormalmente corpulentos y desgarbados, bien orcos achaparrados, de piel pálida y rasgos suavizados.'),
(12, 'TIEFLING', 'Los tieflings son, posiblemente, una de las razas más peculiares de cuantas pueblan los universos de fantasía. Su apariencia es humana, al menos principalmente, pero todos ellos tienen algún rasgo que delata su parentesco con alguna clase de demonio: cuernos de muy variadas formas, ojos de algún color intenso que llena toda la cuenca ocular y, en ocasiones, algún que otro pequeño signo menos llamativo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `password`, `roles`, `is_verified`) VALUES
(1, 'Jordan', 'ascologo@gmail.com', '$2y$13$MFRCsiyyrw60DwkUKIS.QeF/rFLJrRqyrCx19nLN2pqnzvut11CUq', '[\"ROLE_ADMIN\"]', 1),
(4, 'DJSkully', 'creacuenta2010@hotmail.com', '$2y$10$AT6p2wFNl4NUg9V997YyQ.GStZVwBZ0BBRTCH0czpjC/h33P288PO', '[\"ROLE_PLAYER\"]', 0),
(6, 'Jordan', 'ascologo2@gmail.com', '$2y$10$pRIeFqF7zOU/8wlljnBZ3uK0IFWDKMDxMYduY8SFXEP.JZ/RcbYWS', '[\"ROLE_ADMIN\"]', 0),
(7, 'Aurelio', 'voltaire@outlook.es', '$2y$10$8uKkOaUK8bTXlvRcXejDzOynlfD9uMR/j4.WfKSKTJZCTQKB8ewWe', '[\"ROLE_PLAYER\"]', 0),
(8, 'Gerard', 'gerardnp@yahoo.com', '$2y$10$FwjlDe6QvqaW4oYA6BCnAu63HkMefEr.rXS/CmqwpO92ZlGbuMtrq', '[\"ROLE_ADMIN\"]', 0),
(9, 'Jhon', 'jhon@gmail.com', '$2y$10$PWvwJyNAuv.OBbytzqFa6ezAbWmbBNR9SukwCIAGA9pqF4RtP0to6', '[\"ROLE_ADMIN\"]', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A9C1580CDB38439E` (`usuario_id`);

--
-- Indices de la tabla `partida_personaje`
--
ALTER TABLE `partida_personaje`
  ADD PRIMARY KEY (`partida_id`,`personaje_id`),
  ADD KEY `IDX_A9B16361F15A1987` (`partida_id`),
  ADD KEY `IDX_A9B16361121EFAFB` (`personaje_id`);

--
-- Indices de la tabla `personaje`
--
ALTER TABLE `personaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_53A41088DB38439E` (`usuario_id`),
  ADD KEY `IDX_53A410888CCBB6A9` (`raza_id`);

--
-- Indices de la tabla `personaje_clases`
--
ALTER TABLE `personaje_clases`
  ADD PRIMARY KEY (`personaje_id`,`clases_id`),
  ADD KEY `IDX_7AC86787121EFAFB` (`personaje_id`),
  ADD KEY `IDX_7AC86787158CCF68` (`clases_id`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `partida`
--
ALTER TABLE `partida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personaje`
--
ALTER TABLE `personaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `FK_A9C1580CDB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `partida_personaje`
--
ALTER TABLE `partida_personaje`
  ADD CONSTRAINT `FK_A9B16361121EFAFB` FOREIGN KEY (`personaje_id`) REFERENCES `personaje` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A9B16361F15A1987` FOREIGN KEY (`partida_id`) REFERENCES `partida` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personaje`
--
ALTER TABLE `personaje`
  ADD CONSTRAINT `FK_53A410888CCBB6A9` FOREIGN KEY (`raza_id`) REFERENCES `razas` (`id`),
  ADD CONSTRAINT `FK_53A41088DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `personaje_clases`
--
ALTER TABLE `personaje_clases`
  ADD CONSTRAINT `FK_7AC86787121EFAFB` FOREIGN KEY (`personaje_id`) REFERENCES `personaje` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7AC86787158CCF68` FOREIGN KEY (`clases_id`) REFERENCES `clases` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
