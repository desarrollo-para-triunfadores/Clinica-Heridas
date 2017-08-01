-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2017 a las 00:48:55
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.2

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
(1, 'Clínica Benitez', '3764159803', '3764852585', 'clinica@gmail.com', 'General Paz 2012', 'Pensando en su salud', 'configuracion_1499641921.jpg', 'Clínica Heridas', 'CAS', 2, '2017-05-20 18:13:43', '2017-07-09 23:12:01');

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
(3, '123123123', 5, NULL, '2017-06-11 09:46:04', '2017-06-11 09:46:04'),
(4, '608541', 10, NULL, '2017-07-09 15:07:38', '2017-07-09 15:07:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factores_riesgo`
--

CREATE TABLE `factores_riesgo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factores_riesgo`
--

INSERT INTO `factores_riesgo` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Obesidad', 'Pacientes con indice de masa corporal superior a 30', '2017-07-10 03:00:00', NULL),
(2, 'Hipertensión', 'Afección en la que la presión de la sangre hacia las paredes de la arteria es demasiado alta.', '2017-07-10 03:00:00', NULL),
(3, 'Tabaquismo', 'Intoxicación aguda o crónica producida por el consumo abusivo de tabaco.', '2017-07-10 03:00:00', NULL),
(4, 'Sedentarismo', 'Potencia riesgo en el desarrollo de la enfermedad cardiaca e incluso se ha establecido una relación directa entre el estilo de vida sedentario y la mortalidad cardiovascular.', '2017-07-10 03:00:00', NULL),
(5, 'Alcoholismo', 'Dependencia al alcohol, físicamente deriva en problemas gastro-intestinales', '2017-07-10 03:00:00', NULL);

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
(3, 'Swiss Medical', NULL, '2017-05-26 21:30:48', '2017-07-09 23:02:21'),
(4, 'IPSM', NULL, '2017-07-09 23:05:00', '2017-07-09 23:05:00'),
(5, 'INSEEEP', NULL, '2017-07-09 23:05:15', '2017-07-09 23:05:15'),
(6, 'OSPAT', NULL, '2017-07-09 23:05:29', '2017-07-09 23:05:29');

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
(1, 1, 6, 3, NULL, '2017-05-21 16:05:42', '2017-07-09 23:23:03'),
(2, 7, 1, 1, NULL, '2017-07-09 15:02:09', '2017-07-09 15:02:09'),
(3, 8, 1, 3, NULL, '2017-07-09 15:03:52', '2017-07-09 15:03:52'),
(4, 11, 5, 3, NULL, '2017-07-09 23:21:22', '2017-07-09 23:21:22'),
(5, 12, 5, 1, NULL, '2017-07-11 00:10:15', '2017-07-11 00:10:15'),
(6, 13, 6, 2, NULL, '2017-07-11 00:12:29', '2017-07-11 00:12:29'),
(7, 14, 5, 1, NULL, '2017-07-11 11:38:06', '2017-07-11 11:38:06');

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
(1, 'Omar', 'Bauerfeind', 'Masculino', '34448004', '19/05/1989', '3764241905', '3764159803', 'omar.bauer@gmail.com', 1, 1, 'persona_1499642583.', 'Eldorado 1200', NULL, '2017-05-21 16:05:42', '2017-07-09 23:23:03'),
(4, 'Guillen', 'Gabriel', 'Masculino', '34845209', '09/02/1989', '3743558941', NULL, 'gabi_guillen@hotmail.com', 1, 1, 'persona_1498741938.', 'Av. Corrientes 2247', NULL, '2017-05-21 20:02:20', '2017-06-29 13:12:18'),
(5, 'Coronel', 'Melisa', 'Masculino', '28444433', '06/11/1971', '3743029844d', NULL, 'meli_coronel@hotmail.com', 1, 3, 'persona_1497179718.', 'Rademacher 1108', NULL, '2017-06-11 09:46:04', '2017-06-29 13:14:44'),
(6, 'Silvia', 'Ott', 'Femenino', '27412564', '05/09/1971', '3745879461', '362484648', 'silvia-mendendez-ott@gmail.com', 1, 1, 'persona_1499612468.jpg', 'Juan de Dios Mena 125', NULL, '2017-07-09 15:01:08', '2017-07-09 15:01:08'),
(7, 'Silvia', 'Ott', 'Femenino', '27412564', '05/09/1971', '3745879461', '362484648', 'silvia-mendendez-ott@gmail.com', 1, 1, 'persona_1499612528.jpg', 'Juan de Dios Mena 125', NULL, '2017-07-09 15:02:08', '2017-07-09 15:02:08'),
(8, 'Mauricio', 'Tomasella', 'Masculino', '33994045', '13/11/1988', '3743499305', NULL, 'maurit@gmail.com', 1, 1, 'persona_1499612632.jpg', 'Mitre 166', NULL, '2017-07-09 15:03:52', '2017-07-09 15:03:52'),
(9, 'Nadia', 'Tischauser', 'Femenino', '32117089', '15/02/1986', '3743052397', NULL, 'nadiatischa@gmail.com', 1, 1, 'persona_1499612801.', 'Los Proceres 1870', NULL, '2017-07-09 15:06:41', '2017-07-09 15:06:41'),
(10, 'Nadia', 'Tischauser', 'Femenino', '32117089', '15/02/1986', '3743052397', NULL, 'nadiatischa@gmail.com', 1, 1, 'persona_1499612858.', 'Los Proceres 1870', NULL, '2017-07-09 15:07:38', '2017-07-09 15:07:38'),
(11, 'Paulo', 'Garnier', 'Masculino', '29566108', '02/09/1982', '3764284190', NULL, 'garnier@gmail.com', 1, 1, 'persona_1499642482.jpg', 'Los Lapachos 955', NULL, '2017-07-09 23:21:22', '2017-07-09 23:21:22'),
(12, 'Maria', 'Menéndez', 'Femenino', '31684098', '30/01/1985', '3764587744', NULL, 'mariamenendez@hotmail.com', 1, 1, 'persona_1499731815.jpg', '9 de Julio 1455', NULL, '2017-07-11 00:10:15', '2017-07-11 00:10:15'),
(13, 'Hilda', 'Lizarazú', 'Femenino', '2774605', '09/09/1975', '37627804', NULL, NULL, 2, 1, 'persona_1499731949.jpg', 'Catamarca 674', NULL, '2017-07-11 00:12:29', '2017-07-11 00:12:29'),
(14, 'Juan Pablo', 'Cáceres', 'Masculino', '34478385', '10/05/1989', '3743499820', NULL, 'jpcaceres.nea@gmail.com', 1, 1, 'persona_1499773086.jpg', 'Monteagudo 695', NULL, '2017-07-11 11:38:06', '2017-07-11 11:38:06');

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
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `modulos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `modulos`, `created_at`, `updated_at`) VALUES
(1, 'Secreataria', ' Obras Sociales | Pacientes | Gestión de Turnos | Enfermeros | Médicos |', '2017-06-29 14:08:13', '2017-06-29 14:08:13');

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
(27, '20/06/2017', 'reprogramado', '. El turno fue reprogramado para la fecha: 12/07/2017', 1, 1, NULL, NULL, '2017-06-20 18:39:19', '2017-07-12 12:44:49'),
(30, '09/07/2017', 'pendiente', NULL, 1, 2, NULL, NULL, '2017-07-09 15:15:45', '2017-07-09 15:15:45'),
(31, '10/07/2017', 'pendiente', NULL, 1, 3, NULL, NULL, '2017-07-09 15:32:28', '2017-07-09 15:32:28'),
(32, '12/07/2017', 'esperando', 'El ingeniero que viene desde Porto Alegre', 1, 1, NULL, NULL, '2017-07-12 12:44:49', '2017-07-12 12:46:35'),
(33, '07/12/2017', 'pendiente', NULL, 1, 5, NULL, NULL, '2017-07-12 13:17:01', '2017-07-12 13:17:01'),
(34, '12/07/2017', 'pendiente', NULL, 1, 6, NULL, NULL, '2017-07-12 13:20:09', '2017-07-12 13:20:09');

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
  `rol_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `imagen`, `remember_token`, `rol_id`, `created_at`, `updated_at`) VALUES
(1, 'Hacho Kuszniruk', 'hacho_k@outlook.com', '$2y$10$Hjtb1zy/en6c017.MKW/g.isHckkTIhatU8RsABmYMFQd7F1bVABW', 'usuario_1497175470.', 'IQiUWlNjjvW8eJG9Sv9jftwrWfcTFUDr4bPwDsmyVLDmSrW2pIhtsamRUj8m', NULL, '2017-05-20 18:10:21', '2017-06-11 10:04:30'),
(2, 'Juan Pablo Cáceres', 'jpcaceres.nea@gmail.com', '$2y$10$uGIlOHvcvfPstL0H5A6jiuHrh/wwOpsRBkeZjLCg/6zoN94K9oCya', 'usuario_1498741414.', 'IQiUWlNjjvW8eJG9Sv9jftwrWfcTFUDr4bPwDsmyVLDmSrW2pIhtsamRUj8m', NULL, '2017-05-21 20:08:20', '2017-06-29 13:03:35'),
(9, 'Tury Antunez', 'tury.aa@gmail.com', '$2y$10$LPdVxHzS72iqZRrIJylVFOHFiix.rH.DPGKJphuvmjmQI7Gglv0NK', 'usuario_1498742651.', 'IQiUWlNjjvW8eJG9Sv9jftwrWfcTFUDr4bPwDsmyVLDmSrW2pIhtsamRUj8m', NULL, '2017-05-28 22:40:55', '2017-06-29 13:24:11'),
(26, 'Gigi Donnarumma', 'dona@gmail.com', '$2y$10$4OWFMUuHT3XsF3yD4NeEnOEOTJ8H9s0L0yf92HKkaCyuhGirXbVJG', 'usuario_1498741507.', 'IQiUWlNjjvW8eJG9Sv9jftwrWfcTFUDr4bPwDsmyVLDmSrW2pIhtsamRUj8m', NULL, '2017-06-10 18:19:06', '2017-06-29 13:05:07');

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
-- Indices de la tabla `factores_riesgo`
--
ALTER TABLE `factores_riesgo`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `factores_riesgo`
--
ALTER TABLE `factores_riesgo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
