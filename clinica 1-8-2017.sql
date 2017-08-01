-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-08-2017 a las 00:14:43
-- Versión del servidor: 5.7.15-1
-- Versión de PHP: 7.0.16-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes`
--

CREATE TABLE `antecedentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `diabetes` tinyint(1) DEFAULT NULL,
  `tipo_diabetes` enum('tipo 1','tipo 2') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medicacion_dbt2` enum('comprimidos','comprimidos e insulina','insulina') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiempo_dbt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acv` tinyint(1) DEFAULT NULL,
  `tiempo_acv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insuficiencia_cardiaca` tinyint(1) DEFAULT NULL,
  `insuficiencia_renal` tinyint(1) DEFAULT NULL,
  `hemodialisis` tinyint(1) DEFAULT NULL,
  `tiempo_hemodialisis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insuficiencia_venosa` tinyint(1) DEFAULT NULL,
  `tratamiento_insuficiencia_venosa` tinyint(1) DEFAULT NULL,
  `tipo_tratamiento_insuficiencia_venosa` enum('drogas','cirugía') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arteriopatia_periferica` tinyint(1) DEFAULT NULL,
  `tratamiento_arteriopatia_periferica` tinyint(1) DEFAULT NULL,
  `tipo_tratamiento_arteriopatia_periferica` enum('by pass','angioplastía','prostaglandía') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neuropatia` tinyint(1) DEFAULT NULL,
  `hipertension` tinyint(1) DEFAULT NULL,
  `tratamiento_hipertension` tinyint(1) DEFAULT NULL,
  `tvp` tinyint(1) DEFAULT NULL,
  `tiempo_tvp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complicaciones`
--

CREATE TABLE `complicaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `complicaciones`
--

INSERT INTO `complicaciones` (`id`, `nombre`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(2, 'Fractura expuesta', 'feo feo', 1, '2017-07-23 22:19:57', '2017-07-23 22:19:57');

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
(1, 'A5', NULL, '2017-07-23 22:09:21', '2017-07-23 22:09:21'),
(2, 'A6', NULL, '2017-07-23 22:09:28', '2017-07-23 22:09:28'),
(3, 'A1', NULL, '2017-07-23 22:09:32', '2017-07-23 22:09:32');

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
(2, '457885', 4, NULL, '2017-05-22 02:02:20', '2017-05-22 02:02:20'),
(3, '123123123', 5, NULL, '2017-06-11 15:46:04', '2017-06-11 15:46:04'),
(4, '608541', 10, NULL, '2017-07-09 21:07:38', '2017-07-09 21:07:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `id` int(10) UNSIGNED NOT NULL,
  `ecografia` tinyint(1) DEFAULT NULL,
  `eco_doppler` tinyint(1) DEFAULT NULL,
  `rayos_x` tinyint(1) DEFAULT NULL,
  `arteriografia` tinyint(1) DEFAULT NULL,
  `adjunto_arteriografia` tinyint(1) DEFAULT NULL,
  `resonancia_magnetica` tinyint(1) DEFAULT NULL,
  `centellograma` tinyint(1) DEFAULT NULL,
  `cultivo_antibiograma` tinyint(1) DEFAULT NULL,
  `biopsia` tinyint(1) DEFAULT NULL,
  `observaciones` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factores`
--

CREATE TABLE `factores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `factores`
--

INSERT INTO `factores` (`id`, `nombre`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 'Obesidad', 'Pacientes con indice de masa corporal superior a 30', '2017-07-10 09:00:00', NULL),
(2, 'Hipertensión', 'Afección en la que la presión de la sangre hacia las paredes de la arteria es demasiado alta.', '2017-07-10 09:00:00', NULL),
(3, 'Tabaquismo', 'Intoxicación aguda o crónica producida por el consumo abusivo de tabaco.', '2017-07-10 09:00:00', NULL),
(4, 'Sedentarismo', 'Potencia riesgo en el desarrollo de la enfermedad cardiaca e incluso se ha establecido una relación directa entre el estilo de vida sedentario y la mortalidad cardiovascular.', '2017-07-10 09:00:00', NULL),
(5, 'Alcoholismo', 'Dependencia al alcohol, físicamente deriva en problemas gastro-intestinales', '2017-07-10 09:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factorespaciente`
--

CREATE TABLE `factorespaciente` (
  `id` int(10) UNSIGNED NOT NULL,
  `paciente_id` int(10) UNSIGNED DEFAULT NULL,
  `factor_id` int(10) UNSIGNED DEFAULT NULL,
  `observaciones` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `hora_inicio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_fin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `turno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cupo_turnos` int(11) NOT NULL,
  `lunes` tinyint(1) DEFAULT NULL,
  `martes` tinyint(1) DEFAULT NULL,
  `miercoles` tinyint(1) DEFAULT NULL,
  `jueves` tinyint(1) DEFAULT NULL,
  `viernes` tinyint(1) DEFAULT NULL,
  `sabado` tinyint(1) DEFAULT NULL,
  `domingo` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `hora_inicio`, `hora_fin`, `turno`, `cupo_turnos`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `created_at`, `updated_at`) VALUES
(2, '08:00', '23:00', 'nada de nadafdgdfgdfgd', 20, 1, 1, 1, 1, 1, 1, 0, '2017-07-29 20:16:22', '2017-07-29 22:13:32');

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
-- Estructura de tabla para la tabla `medicacion`
--

CREATE TABLE `medicacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `paciente_id` int(10) UNSIGNED DEFAULT NULL,
  `medicamento_id` int(10) UNSIGNED DEFAULT NULL,
  `observaciones` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_comercial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_droga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `nombre_comercial`, `nombre_droga`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'NORMON 650 mg comprimidos EFG', 'Paracetamol', NULL, '2017-07-19 00:28:24', '2017-07-19 00:28:24'),
(2, 'ASPIRINA Comp. 500 mg', 'Acido acetilsalicílico', NULL, '2017-07-19 00:30:28', '2017-07-19 00:30:28');

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
(12, '2017_06_03_225926_create_consultorios_table', 1),
(13, '2017_06_03_225926_create_feriados_table', 1),
(14, '2017_06_04_225926_create_agendas_table', 1),
(15, '2017_06_11_160848_create_turnos_table', 1),
(16, '2017_07_07_183354_create_complicaciones_table', 1),
(17, '2017_07_08_120348_create_medicamentos_table', 1),
(18, '2017_07_08_120758_create_estudios_table', 1),
(19, '2017_07_08_121244_create_antecedentes_table', 1),
(20, '2017_07_08_122940_create_factores_table', 1),
(21, '2017_07_08_125449_create_valoracion_table', 1),
(22, '2017_07_08_172528_create_medicacion_table', 1),
(23, '2017_07_18_193951_create_factores_paciente_table', 1),
(24, '2017_07_20_183136_create_tratamientos_table', 1),
(25, '2017_07_20_183653_create_seguimientos_table', 1),
(26, '2017_07_20_183834_create_tratamientosseguimientos_table', 1);

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
(1, 'OSDE', NULL, '2017-05-21 22:04:52', '2017-05-21 22:04:52'),
(2, 'PAMI', NULL, '2017-05-21 22:04:59', '2017-05-21 22:04:59'),
(3, 'Swiss Medical', NULL, '2017-05-27 03:30:48', '2017-07-10 05:02:21'),
(4, 'IPSM', NULL, '2017-07-10 05:05:00', '2017-07-10 05:05:00'),
(5, 'INSEEEP', NULL, '2017-07-10 05:05:15', '2017-07-10 05:05:15'),
(6, 'OSPAT', NULL, '2017-07-10 05:05:29', '2017-07-10 05:05:29');

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
(1, 1, 1, 1, NULL, '2017-05-21 22:05:42', '2017-07-29 07:51:20'),
(2, 7, 1, 1, NULL, '2017-07-09 21:02:09', '2017-07-09 21:02:09'),
(3, 8, 1, 1, NULL, '2017-07-09 21:03:52', '2017-07-29 07:48:03'),
(4, 11, 1, 1, NULL, '2017-07-10 05:21:22', '2017-07-29 07:48:45'),
(5, 12, 1, 1, NULL, '2017-07-11 06:10:15', '2017-07-29 07:51:59'),
(6, 13, 1, 1, NULL, '2017-07-11 06:12:29', '2017-07-29 07:49:25'),
(7, 14, 1, 1, NULL, '2017-07-11 17:38:06', '2017-07-29 07:50:34'),
(8, 15, 5, 3, NULL, '2017-08-01 05:39:03', '2017-08-01 05:39:03');

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
(1, 'Omar', 'Bauerfeind', 'Masculino', '34448004', '19/05/1989', '3764241905', '3764159803', 'omar.bauer@gmail.com', 1, 1, 'persona_1501303941.', 'Eldorado 1200', NULL, '2017-05-21 22:05:42', '2017-07-29 07:52:22'),
(4, 'Guillen', 'Gabriel', 'Masculino', '34845209', '09/02/1989', '3743558941', NULL, 'gabi_guillen@hotmail.com', 1, 1, 'persona_1498741938.jpg', 'Av. Corrientes 2247', NULL, '2017-05-22 02:02:20', '2017-06-29 19:12:18'),
(5, 'Coronel', 'Melisa', 'Masculino', '28444433', '06/11/1971', '3743029844d', NULL, 'meli_coronel@hotmail.com', 1, 3, 'persona_1501304030.', 'Rademacher 1108', NULL, '2017-06-11 15:46:04', '2017-07-29 07:53:50'),
(6, 'Silvia', 'Ott', 'Femenino', '27412569', '05/09/1971', '3745879461', '362484648', 'silvia-mendendez-ott@gmail.com', 1, 1, 'persona_1499612468.jpg', 'Juan de Dios Mena 125', NULL, '2017-07-09 21:01:08', '2017-07-09 21:01:08'),
(7, 'Silvia', 'Ott', 'Femenino', '27412564', '05/09/1971', '3745879461', '362484648', 'silvia-mendendez-ott@gmail.com', 1, 1, 'persona_1501303641.', 'Juan de Dios Mena 125', NULL, '2017-07-09 21:02:08', '2017-07-29 07:47:21'),
(8, 'Mauricio', 'Tomasella', 'Masculino', '33994045', '13/11/1988', '3743499305', NULL, 'maurit@gmail.com', 1, 1, 'persona_1501303683.', 'Mitre 166', NULL, '2017-07-09 21:03:52', '2017-07-29 07:48:03'),
(9, 'Nadia', 'Tischauser', 'Femenino', '32117081', '15/02/1986', '3743052397', NULL, 'nadiatischa@gmail.com', 1, 1, 'persona_1499612801.', 'Los Proceres 1870', NULL, '2017-07-09 21:06:41', '2017-07-09 21:06:41'),
(10, 'Nadia', 'Tischauser', 'Femenino', '32117089', '15/02/1986', '3743052397', NULL, 'nadiatischa@gmail.com', 1, 1, 'persona_1501303985.', 'Los Proceres 1870', NULL, '2017-07-09 21:07:38', '2017-07-29 07:53:05'),
(11, 'Paulo', 'Garnier', 'Masculino', '29566108', '02/09/1982', '3764284190', NULL, 'garnier@gmail.com', 1, 1, 'persona_1501303725.', 'Los Lapachos 955', NULL, '2017-07-10 05:21:22', '2017-07-29 07:48:45'),
(12, 'Maria', 'Menéndez', 'Femenino', '31684098', '30/01/1985', '3764587744', NULL, 'mariamenendez@hotmail.com', 1, 1, 'persona_1501303919.', '9 de Julio 1455', NULL, '2017-07-11 06:10:15', '2017-07-29 07:51:59'),
(13, 'Hilda', 'Lizarazú', 'Femenino', '2774605', '09/09/1975', '37627804', NULL, NULL, 2, 1, 'persona_1501303765.', 'Catamarca 674', NULL, '2017-07-11 06:12:29', '2017-07-29 07:49:25'),
(14, 'Juan Pablo', 'Cáceres', 'Masculino', '34478385', '10/05/1989', '3743499820', NULL, 'jpcaceres.nea@gmail.com', 1, 1, 'persona_1501303833.', 'Monteagudo 695', NULL, '2017-07-11 17:38:06', '2017-07-29 07:50:34'),
(15, 'Jorge', 'Strumia', 'Masculino', '21568490', '05/08/1957', '3752658907', NULL, 'jorge.strumia@gmail.com', 1, 1, 'persona_1501555143.', 'Bolivar 855', NULL, '2017-08-01 05:39:03', '2017-08-01 05:39:03');

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
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nivel_acceso` int(11) DEFAULT NULL,
  `modulos` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `nivel_acceso`, `modulos`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 1, 'Usuarios_Roles | Parametros | Insumos_Compras | Articulos | Proveedores_Rubros |  Clientes | Ventas | Cajas | Auditorias | AdminWeb', '2016-12-04 03:00:00', NULL),
(2, 'Administrador Web', 2, 'Parametros | AdminWeb', '2016-12-04 03:00:00', NULL),
(3, 'Vendedor', 3, '| Articulos | Clientes | Ventas |', '2017-02-03 13:20:05', '2017-02-03 13:20:05'),
(4, 'Cajero', 4, '| Articulos | Clientes | Ventas | Cajas |', '2017-02-03 13:20:06', '2017-02-03 13:20:06'),
(15, 'Repositor', NULL, ' Parametros | Insumos_Compras | Proveedores_Rubros |', '2017-02-26 14:41:06', '2017-02-26 14:41:06'),
(16, 'Fulanito', NULL, ' Insumos_Compras | Articulos | Ventas |', '2017-02-27 20:22:17', '2017-02-27 20:22:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos`
--

CREATE TABLE `seguimientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `grado` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimesion` enum('0-4 cm°','4-16 cm°','16-36 cm°','36-64 cm°','64-100 cm°','mayor a 100 cm°') COLLATE utf8mb4_unicode_ci NOT NULL,
  `profundidad` enum('Cicatrizada','Epidermis-Dermis','Hipodermis','Músculo','Hueso/Tejido anexo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bordes` enum('No distinguible','Difuso','Delimitados','Dañados','Engrosado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipotejido` enum('Cicatrización','Epitelial','Granulación','Necrótico y/o Esfacelo','Necrótico') COLLATE utf8mb4_unicode_ci NOT NULL,
  `exudado` enum('Húmedo','Mojado','Saturado','Con Fuga','Seco') COLLATE utf8mb4_unicode_ci NOT NULL,
  `edema` enum('Ausente','+','++','+++','++++') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dolor` enum('0-1','2-3','4-5','6-7','9-10') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pielcircundante` enum('Sana','Descamada','Eritematosa','Macerada','Gangrenosa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valoracion_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id`, `nombre`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(2, 'Vendaje copado', 'etc', 1, '2017-07-23 22:21:36', '2017-07-23 22:21:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientosseguimientos`
--

CREATE TABLE `tratamientosseguimientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `seguimiento_id` int(10) UNSIGNED NOT NULL,
  `tratamiento_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('pendiente','esperando','atendido','reprogramado','cancelado','ausente') COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_llegado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horario_id` int(10) UNSIGNED NOT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `enfermero_id` int(10) UNSIGNED DEFAULT NULL,
  `consultorio_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `fecha`, `estado`, `comentario`, `hora_llegado`, `horario_id`, `paciente_id`, `enfermero_id`, `consultorio_id`, `created_at`, `updated_at`) VALUES
(6, '01/08/2017', 'esperando', NULL, NULL, 2, 1, 3, 1, '2017-08-01 03:12:25', '2017-08-01 03:13:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `imagen`, `password`, `rol_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hacho Kuszniruk', 'hacho_k@outlook.com', 'usuario_1488286701.jpg', '$2y$10$neE/ldNdmdO9X8.SUCgCg.W..XdiOORJTICaj35gkJ7ojByimSNyS', 1, 'PfXKHnQ9eemkluQrtAHH6KvzPbnAzuQ4CzUV4hsD5MKJup7d29DgphZlYEJQ', '2016-12-05 02:16:40', '2017-07-04 02:54:32'),
(2, 'Moira Ronconi', 'info@gnsoluciones.com', 'usuario_1486845052.jpg', '$2y$10$ENB3o1uIwb/Ub1b0WjRYJevMnzwXqavsL35qmqvHDRQqBjRJ0uZqm', 1, 't1fWCtNMzNSXoi3lrDN2FnraJe2AoQnFxaSpZvMx3xsIz3RAQm0HwoqoXD3g', '2016-12-05 02:16:42', '2017-07-04 01:31:56'),
(3, 'Cranson Brian', 'bcranson@mallcom.com', 'usuario_1486128533.jpg', '$2y$10$V1inJuY.Rh5oQmDNZieTl.1L9yhgecXAH1t6yNo0oGvMAfByUxLNq', 2, 'D317Xw6qN66eIgd91YON58emcdweUVG5SBgeYC9cY5lwKD3vTziaMbeSno4l', '2017-02-03 13:28:53', '2017-03-20 20:54:03'),
(4, 'Donaruma Julian', 'ventas@gmail.com', 'usuario_1488134988.jpg', '$2y$10$MTJb4fx2j5KQhuoUMtKtze26wMZoYOSsM0xatrgB19S7k5lEtPS0i', 4, NULL, '2017-02-26 18:49:49', '2017-02-26 18:49:49'),
(5, 'Porzingis Kristaps', 'porzingis@gmail.com', 'usuario_1489775444.jpg', '$2y$10$chVaVwPHaU7xou648V36C.dqdIceKxrEJX3HfsYN0pqT4kPHxr7.K', 3, 'd6Ckp1bbMDCAn0jVqXhj9z5p1I0kNP1QFyh5xuuzTUzuJ2LEkKLWo9i05qJr', '2017-03-17 18:30:44', '2017-03-20 21:54:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `diagnostico` enum('presuntivo','definitivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desencadenante` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complicacion_id` int(10) UNSIGNED NOT NULL,
  `factoresriesgo` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signossintomas` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `antecedentes_paciente_id_foreign` (`paciente_id`);

--
-- Indices de la tabla `complicaciones`
--
ALTER TABLE `complicaciones`
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
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudios_paciente_id_foreign` (`paciente_id`);

--
-- Indices de la tabla `factores`
--
ALTER TABLE `factores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factorespaciente`
--
ALTER TABLE `factorespaciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factorespaciente_paciente_id_foreign` (`paciente_id`),
  ADD KEY `factorespaciente_factor_id_foreign` (`factor_id`);

--
-- Indices de la tabla `feriados`
--
ALTER TABLE `feriados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `localidades_provincia_id_foreign` (`provincia_id`);

--
-- Indices de la tabla `medicacion`
--
ALTER TABLE `medicacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicacion_paciente_id_foreign` (`paciente_id`),
  ADD KEY `medicacion_medicamento_id_foreign` (`medicamento_id`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguimientos_valoracion_id_foreign` (`valoracion_id`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tratamientosseguimientos`
--
ALTER TABLE `tratamientosseguimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tratamientosseguimientos_seguimiento_id_foreign` (`seguimiento_id`),
  ADD KEY `tratamientosseguimientos_tratamiento_id_foreign` (`tratamiento_id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turnos_agenda_id_foreign` (`horario_id`),
  ADD KEY `turnos_paciente_id_foreign` (`paciente_id`),
  ADD KEY `turnos_enfermero_id_foreign` (`enfermero_id`),
  ADD KEY `turnos_consultorio_id_foreign` (`consultorio_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_nivel_acceso_id_foreign` (`rol_id`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `valoraciones_complicacion_id_foreign` (`complicacion_id`),
  ADD KEY `valoraciones_paciente_id_foreign` (`paciente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `complicaciones`
--
ALTER TABLE `complicaciones`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `factores`
--
ALTER TABLE `factores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `factorespaciente`
--
ALTER TABLE `factorespaciente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `feriados`
--
ALTER TABLE `feriados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `medicacion`
--
ALTER TABLE `medicacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tratamientosseguimientos`
--
ALTER TABLE `tratamientosseguimientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD CONSTRAINT `antecedentes_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

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
-- Filtros para la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD CONSTRAINT `estudios_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `factorespaciente`
--
ALTER TABLE `factorespaciente`
  ADD CONSTRAINT `factorespaciente_factor_id_foreign` FOREIGN KEY (`factor_id`) REFERENCES `factores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `factorespaciente_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `localidades_provincia_id_foreign` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `medicacion`
--
ALTER TABLE `medicacion`
  ADD CONSTRAINT `medicacion_medicamento_id_foreign` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamentos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicacion_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

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
-- Filtros para la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD CONSTRAINT `seguimientos_valoracion_id_foreign` FOREIGN KEY (`valoracion_id`) REFERENCES `valoraciones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tratamientosseguimientos`
--
ALTER TABLE `tratamientosseguimientos`
  ADD CONSTRAINT `tratamientosseguimientos_seguimiento_id_foreign` FOREIGN KEY (`seguimiento_id`) REFERENCES `seguimientos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tratamientosseguimientos_tratamiento_id_foreign` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamientos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_agenda_id_foreign` FOREIGN KEY (`horario_id`) REFERENCES `horarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `turnos_consultorio_id_foreign` FOREIGN KEY (`consultorio_id`) REFERENCES `consultorios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `turnos_enfermero_id_foreign` FOREIGN KEY (`enfermero_id`) REFERENCES `enfermeros` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `turnos_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_complicacion_id_foreign` FOREIGN KEY (`complicacion_id`) REFERENCES `complicaciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `valoraciones_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
