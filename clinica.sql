-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-06-2017 a las 14:12:02
-- Versión del servidor: 5.7.15-1
-- Versión de PHP: 7.0.12-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendas`
--

CREATE TABLE `agendas` (
  `id` int(10) UNSIGNED NOT NULL,
  `hora_inicio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_fin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `turno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cupo_turnos` int(11) NOT NULL,
  `lunes` tinyint(1) NOT NULL,
  `martes` tinyint(1) NOT NULL,
  `miercoles` tinyint(1) NOT NULL,
  `jueves` tinyint(1) NOT NULL,
  `viernes` tinyint(1) NOT NULL,
  `sabado` tinyint(1) NOT NULL,
  `domingo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `agendas`
--

INSERT INTO `agendas` (`id`, `hora_inicio`, `hora_fin`, `turno`, `cupo_turnos`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `created_at`, `updated_at`) VALUES
(1, '08:00', '12:00', 'mañana', 10, 1, 1, 1, 1, 1, 1, 1, '2017-06-17 10:19:34', '2017-06-17 10:19:34'),
(2, '16:00', '20:00', 'tarde', 10, 1, 1, 1, 1, 1, 1, 1, '2017-06-20 18:41:16', '2017-06-20 18:41:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apodo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apodo_abreviado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localidad_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`id`, `nombre`, `telefono`, `telefono_contacto`, `email`, `direccion`, `descripcion`, `logo`, `apodo`, `apodo_abreviado`, `localidad_id`, `created_at`, `updated_at`) VALUES
(1, 'Clínica Benitez', '3764159803', '3764852585', 'clinica@gmail.com', 'General paz 2012', 'Pensando en su salud', 'configuracion_1495834433.jpg', 'Clínica Gestion', 'cas', 2, '2017-05-20 18:13:43', '2017-05-26 21:33:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorios`
--

CREATE TABLE `consultorios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `consultorios`
--

INSERT INTO `consultorios` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'A1', NULL, '2017-06-17 10:22:42', '2017-06-17 10:22:42'),
(2, 'A2', NULL, '2017-06-20 18:38:53', '2017-06-20 18:38:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeros`
--

CREATE TABLE `enfermeros` (
  `id` int(10) UNSIGNED NOT NULL,
  `matricula` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `enfermeros`
--

INSERT INTO `enfermeros` (`id`, `matricula`, `persona_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(2, '457885', 4, NULL, '2017-05-21 20:02:20', '2017-05-21 20:02:20'),
(3, '123123123', 5, NULL, '2017-06-11 09:46:04', '2017-06-11 09:46:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feriados`
--

CREATE TABLE `feriados` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id`, `nombre`, `provincia_id`, `created_at`, `updated_at`) VALUES
(1, 'Posadas', 1, '2017-05-20 18:13:32', '2017-05-20 18:13:32'),
(2, 'Oberá', 1, '2017-05-20 22:18:35', '2017-05-20 22:18:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Carlos Villagrán', NULL, '2017-05-21 16:05:07', '2017-05-21 16:05:07'),
(2, 'Ramón Valdés', NULL, '2017-05-21 16:05:12', '2017-05-21 16:05:12'),
(3, 'Carlos Villagrán (DNI: 34448004)', NULL, '2017-05-21 21:10:02', '2017-05-21 21:10:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_03_225842_create_paises_table', 1),
(4, '2017_05_03_225907_create_provincias_table', 1),
(5, '2017_05_03_225923_create_localidades_table', 1),
(6, '2017_05_03_225925_create_obrassociales_table', 1),
(7, '2017_05_03_225926_create_medicos_table', 1),
(8, '2017_05_03_225941_create_personas_table', 1),
(9, '2017_05_03_230040_create_enfermeros_table', 1),
(10, '2017_05_03_230133_create_pacientes_table', 1),
(11, '2017_05_03_230306_create_configuraciones_table', 1),
(12, '2017_06_03_225926_create_consultorios_table', 2),
(13, '2017_06_03_225926_create_feriados_table', 2),
(14, '2017_06_04_225926_create_agendas_table', 2),
(15, '2017_06_11_160848_create_turnos_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras_sociales`
--

CREATE TABLE `obras_sociales` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `obras_sociales`
--

INSERT INTO `obras_sociales` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'OSDE', NULL, '2017-05-21 16:04:52', '2017-05-21 16:04:52'),
(2, 'PAMI', NULL, '2017-05-21 16:04:59', '2017-05-21 16:04:59'),
(3, 'medical', NULL, '2017-05-26 21:30:48', '2017-05-26 21:30:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `obrasocial_id` int(10) UNSIGNED NOT NULL,
  `medico_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `persona_id`, `obrasocial_id`, `medico_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, '2017-05-21 16:05:42', '2017-05-21 16:05:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Argentina', '2017-05-20 18:12:33', '2017-05-20 18:12:33'),
(2, 'Brasil', '2017-05-25 23:54:53', '2017-05-25 23:54:53'),
(3, 'Paraguay', '2017-05-25 23:55:18', '2017-05-25 23:55:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nac` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localidad_id` int(10) UNSIGNED NOT NULL,
  `pais_id` int(10) UNSIGNED NOT NULL,
  `foto_perfil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `sexo`, `dni`, `fecha_nac`, `telefono`, `telefono_contacto`, `email`, `localidad_id`, `pais_id`, `foto_perfil`, `direccion`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Horacio Alejandro', 'Kuszniruk', 'Masculino', '34448004', '19/05/2017', '3764241905', '3764159803', 'hacho.kuszniruk@gmail.com', 1, 1, 'persona_1498085358.', 'Av. Corrientes 2247', NULL, '2017-05-21 16:05:42', '2017-06-21 22:49:18'),
(4, 'George', 'Cloney', 'Masculino', '15459635', '09/02/2017', '3764241905', '3764159803', 'hacho_kuszniruk@hotmail.com', 1, 1, 'persona_1495396940.jpg', 'Av. Corrientes 2247', NULL, '2017-05-21 20:02:20', '2017-05-21 20:02:20'),
(5, 'Lionel', 'Messi', 'Masculino', '34444433', '06/14/2017', '123123', '123123', 'hacho_kuszniruk@hotmail.com', 1, 1, 'persona_1497179718.', 'asdasdasd', NULL, '2017-06-11 09:46:04', '2017-06-11 11:44:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `nombre`, `pais_id`, `created_at`, `updated_at`) VALUES
(1, 'Misiones', 1, '2017-05-20 18:12:45', '2017-05-20 18:12:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('pendiente','esperando','atendido','reprogramado','cancelado','ausente') COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agenda_id` int(10) UNSIGNED NOT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `enfermero_id` int(10) UNSIGNED DEFAULT NULL,
  `consultorio_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `fecha`, `estado`, `comentario`, `agenda_id`, `paciente_id`, `enfermero_id`, `consultorio_id`, `created_at`, `updated_at`) VALUES
(1, '20/06/2017', 'esperando', 'nada', 1, 1, NULL, NULL, '2017-06-17 10:24:03', '2017-06-21 22:53:47'),
(2, '13/06/2017', 'esperando', 'nada', 1, 1, 2, NULL, '2017-06-17 10:24:11', '2017-06-21 22:54:04'),
(3, '13/06/2017', 'cancelado', 'nada', 1, 1, NULL, NULL, '2017-06-17 10:24:18', '2017-06-17 10:24:18'),
(4, '20/06/2017', 'pendiente', 'nada', 1, 1, NULL, NULL, '2017-06-17 10:26:01', '2017-06-17 10:26:01'),
(5, '25/12/2017', 'reprogramado', 'nada', 1, 1, NULL, NULL, '2017-06-17 10:26:09', '2017-06-17 10:26:09'),
(6, '12/06/2017', 'atendido', 'nada', 1, 1, 2, NULL, '2017-06-17 10:26:52', '2017-06-17 10:26:52'),
(7, '12/06/2017', 'atendido', 'nada', 1, 1, 2, NULL, '2017-06-17 10:27:00', '2017-06-17 10:27:00'),
(8, '12/06/2017', 'ausente', 'nada', 1, 1, NULL, NULL, '2017-06-17 10:27:07', '2017-06-17 10:27:07'),
(9, '13/06/2017', 'esperando', 'nada', 1, 1, 2, NULL, '2017-06-17 10:37:42', '2017-06-20 22:48:24'),
(10, '22/06/2017', 'pendiente', 'nada', 1, 1, NULL, NULL, '2017-06-17 10:41:20', '2017-06-17 10:41:20'),
(11, '22/06/2017', 'pendiente', 'nada', 1, 1, NULL, NULL, '2017-06-17 10:41:25', '2017-06-17 10:41:25'),
(12, '13/06/2017', 'esperando', 'nada', 1, 1, 2, 1, '2017-06-17 10:43:32', '2017-06-21 22:54:33'),
(13, '13/06/2017', 'esperando', 'nada', 1, 1, 3, NULL, '2017-06-17 10:43:35', '2017-06-20 22:48:34'),
(14, '13/06/2017', 'esperando', 'nada', 1, 1, 2, NULL, '2017-06-17 10:43:37', '2017-06-20 22:48:44'),
(15, '13/06/2017', 'esperando', 'nada', 1, 1, 3, 2, '2017-06-17 10:43:38', '2017-06-21 22:53:47'),
(20, '17/06/2017', 'atendido', 'nada', 1, 1, 2, NULL, '2017-06-17 10:47:33', '2017-06-17 10:47:33'),
(21, '20/06/2017', 'atendido', 'nada', 1, 1, 2, NULL, '2017-06-17 10:47:35', '2017-06-17 10:47:35'),
(22, '20/06/2017', 'atendido', 'nada', 1, 1, 2, NULL, '2017-06-17 10:47:37', '2017-06-17 10:47:37'),
(23, '17/06/2017', 'atendido', 'nada', 1, 1, 2, NULL, '2017-06-17 10:47:39', '2017-06-17 10:47:39'),
(24, '17/06/2017', 'atendido', 'nada', 1, 1, 2, NULL, '2017-06-17 10:47:41', '2017-06-17 10:47:41'),
(25, '07/06/2017', 'reprogramado', '. El turno fue reprogramado para la fecha: 21/09/2017', 1, 1, NULL, NULL, '2017-06-20 17:25:29', '2017-06-20 17:26:16'),
(26, '21/09/2017', 'cancelado', NULL, 1, 1, NULL, NULL, '2017-06-20 17:26:16', '2017-06-20 17:26:24'),
(27, '20/06/2017', 'pendiente', 'NINGUNO', 1, 1, NULL, NULL, '2017-06-20 18:39:19', '2017-06-20 18:39:19'),
(28, '23/06/2017', 'pendiente', 'se parece a brad pitt', 1, 1, NULL, NULL, '2017-06-20 22:20:37', '2017-06-20 22:20:37'),
(29, '14/06/2017', 'pendiente', NULL, 1, 1, NULL, NULL, '2017-06-21 22:50:59', '2017-06-21 22:50:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `imagen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hacho Kuszniruk', 'hacho_k@outlook.com', '$2y$10$Hjtb1zy/en6c017.MKW/g.isHckkTIhatU8RsABmYMFQd7F1bVABW', 'usuario_1497175470.', 'IQiUWlNjjvW8eJG9Sv9jftwrWfcTFUDr4bPwDsmyVLDmSrW2pIhtsamRUj8m', '2017-05-20 18:10:21', '2017-06-11 10:04:30'),
(2, 'Brad Pitt', 'brad@gmail.com', '$2y$10$uGIlOHvcvfPstL0H5A6jiuHrh/wwOpsRBkeZjLCg/6zoN94K9oCya', 'usuario_1497095222.', NULL, '2017-05-21 20:08:20', '2017-06-10 11:47:02'),
(9, 'Vigo Mortensen', 'vigo@gmail.com', '$2y$10$LPdVxHzS72iqZRrIJylVFOHFiix.rH.DPGKJphuvmjmQI7Gglv0NK', 'usuario_1496011255.', NULL, '2017-05-28 22:40:55', '2017-05-28 22:40:55'),
(26, 'George Cloney', 'george.g@gmail.com', '$2y$10$4OWFMUuHT3XsF3yD4NeEnOEOTJ8H9s0L0yf92HKkaCyuhGirXbVJG', 'usuario_1497118761.', NULL, '2017-06-10 18:19:06', '2017-06-10 18:19:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `configuraciones_localidad_id_foreign` (`localidad_id`);

--
-- Indices de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enfermeros_persona_id_foreign` (`persona_id`);

--
-- Indices de la tabla `feriados`
--
ALTER TABLE `feriados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `localidades_provincia_id_foreign` (`provincia_id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pacientes_persona_id_foreign` (`persona_id`),
  ADD KEY `pacientes_obrasocial_id_foreign` (`obrasocial_id`),
  ADD KEY `pacientes_medico_id_foreign` (`medico_id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personas_dni_unique` (`dni`),
  ADD KEY `personas_localidad_id_foreign` (`localidad_id`),
  ADD KEY `personas_pais_id_foreign` (`pais_id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provincias_pais_id_foreign` (`pais_id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turnos_agenda_id_foreign` (`agenda_id`),
  ADD KEY `turnos_paciente_id_foreign` (`paciente_id`),
  ADD KEY `turnos_enfermero_id_foreign` (`enfermero_id`),
  ADD KEY `turnos_consultorio_id_foreign` (`consultorio_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `feriados`
--
ALTER TABLE `feriados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD CONSTRAINT `configuraciones_localidad_id_foreign` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  ADD CONSTRAINT `enfermeros_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `localidades_provincia_id_foreign` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_obrasocial_id_foreign` FOREIGN KEY (`obrasocial_id`) REFERENCES `obras_sociales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_localidad_id_foreign` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personas_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `provincias_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_agenda_id_foreign` FOREIGN KEY (`agenda_id`) REFERENCES `agendas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `turnos_consultorio_id_foreign` FOREIGN KEY (`consultorio_id`) REFERENCES `consultorios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `turnos_enfermero_id_foreign` FOREIGN KEY (`enfermero_id`) REFERENCES `enfermeros` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `turnos_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
