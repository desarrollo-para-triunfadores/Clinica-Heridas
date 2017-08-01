-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2017 a las 13:17:44
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

--
-- Volcado de datos para la tabla `antecedentes`
--

INSERT INTO `antecedentes` (`id`, `diabetes`, `tipo_diabetes`, `medicacion_dbt2`, `tiempo_dbt`, `acv`, `tiempo_acv`, `insuficiencia_cardiaca`, `insuficiencia_renal`, `hemodialisis`, `tiempo_hemodialisis`, `insuficiencia_venosa`, `tratamiento_insuficiencia_venosa`, `tipo_tratamiento_insuficiencia_venosa`, `arteriopatia_periferica`, `tratamiento_arteriopatia_periferica`, `tipo_tratamiento_arteriopatia_periferica`, `neuropatia`, `hipertension`, `tratamiento_hipertension`, `tvp`, `tiempo_tvp`, `observaciones`, `paciente_id`, `created_at`, `updated_at`) VALUES
(4, 1, 'tipo 1', 'comprimidos', NULL, 1, NULL, 1, 1, 1, NULL, 1, 1, 'drogas', 1, 1, 'angioplastía', 1, 1, 1, 1, NULL, NULL, 1, '2017-07-23 23:24:29', '2017-07-23 23:24:29');

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
(1, 'Fractura codo izquierdo', 'descripción', 0, '2017-07-31 03:00:00', NULL),
(2, 'Fractura pie derecho', 'feo feo', 1, '2017-07-23 22:19:57', '2017-07-23 22:19:57');

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
(1, 'Clínica Benitez', '3764159803', '3764852585', 'clinica@gmail.com', 'General Paz 2012', 'Pensando en su salud', 'configuracion_1499641921.jpg', 'Clínica Heridas', 'CAS', 1, '2017-05-20 21:13:43', '2017-07-31 00:56:51');

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
(2, '457885', 4, NULL, '2017-05-21 23:02:20', '2017-05-21 23:02:20'),
(3, '123123123', 5, NULL, '2017-06-11 12:46:04', '2017-06-11 12:46:04'),
(4, '608541', 10, NULL, '2017-07-09 18:07:38', '2017-07-09 18:07:38');

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

--
-- Volcado de datos para la tabla `estudios`
--

INSERT INTO `estudios` (`id`, `ecografia`, `eco_doppler`, `rayos_x`, `arteriografia`, `adjunto_arteriografia`, `resonancia_magnetica`, `centellograma`, `cultivo_antibiograma`, `biopsia`, `observaciones`, `paciente_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, '2017-07-23 23:24:29', '2017-07-23 23:24:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factores`
--

CREATE TABLE `factores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `factores`
--

INSERT INTO `factores` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Obesidad', 'Pacientes con indice de masa corporal superior a 30', '2017-07-10 06:00:00', NULL),
(2, 'Hipertensión', 'Afección en la que la presión de la sangre hacia las paredes de la arteria es demasiado alta.', '2017-07-10 06:00:00', NULL),
(3, 'Tabaquismo', 'Intoxicación aguda o crónica producida por el consumo abusivo de tabaco.', '2017-07-10 06:00:00', NULL),
(4, 'Sedentarismo', 'Potencia riesgo en el desarrollo de la enfermedad cardiaca e incluso se ha establecido una relación directa entre el estilo de vida sedentario y la mortalidad cardiovascular.', '2017-07-10 06:00:00', NULL),
(5, 'Alcoholismo', 'Dependencia al alcohol, físicamente deriva en problemas gastro-intestinales', '2017-07-10 06:00:00', NULL);

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

--
-- Volcado de datos para la tabla `factorespaciente`
--

INSERT INTO `factorespaciente` (`id`, `paciente_id`, `factor_id`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2017-07-23 23:24:29', '2017-07-23 23:24:29');

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

--
-- Volcado de datos para la tabla `medicacion`
--

INSERT INTO `medicacion` (`id`, `paciente_id`, `medicamento_id`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2017-07-23 23:24:29', '2017-07-23 23:24:29'),
(2, 1, 2, NULL, '2017-07-23 23:24:29', '2017-07-23 23:24:29');

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
(1, 'Héctor Plasznikowski', NULL, '2017-05-21 16:05:07', '2017-05-21 16:05:07'),
(2, 'Ramón Valdés', NULL, '2017-05-21 16:05:12', '2017-05-21 16:05:12'),
(3, 'Carlos Villagrán', NULL, '2017-05-21 21:10:02', '2017-05-21 21:10:02');

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
(1, 'OSDE', NULL, '2017-05-21 19:04:52', '2017-05-21 19:04:52'),
(2, 'PAMI', NULL, '2017-05-21 19:04:59', '2017-05-21 19:04:59'),
(3, 'Swiss Medical', NULL, '2017-05-27 00:30:48', '2017-07-10 02:02:21'),
(4, 'IPSM', NULL, '2017-07-10 02:05:00', '2017-07-10 02:05:00'),
(5, 'INSEEEP', NULL, '2017-07-10 02:05:15', '2017-07-10 02:05:15'),
(6, 'OSPAT', NULL, '2017-07-10 02:05:29', '2017-07-10 02:05:29');

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
(1, 1, 1, 1, NULL, '2017-05-21 19:05:42', '2017-07-29 04:51:20'),
(2, 7, 1, 1, NULL, '2017-07-09 18:02:09', '2017-07-09 18:02:09'),
(3, 8, 1, 1, NULL, '2017-07-09 18:03:52', '2017-07-29 04:48:03'),
(4, 11, 1, 1, NULL, '2017-07-10 02:21:22', '2017-07-29 04:48:45'),
(5, 12, 1, 1, NULL, '2017-07-11 03:10:15', '2017-07-29 04:51:59'),
(6, 13, 1, 1, NULL, '2017-07-11 03:12:29', '2017-07-29 04:49:25'),
(7, 14, 1, 1, NULL, '2017-07-11 14:38:06', '2017-07-29 04:50:34');

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
(1, 'Omar', 'Bauerfeind', 'Masculino', '34448004', '19/05/1989', '3764241905', '3764159803', 'omar.bauer@gmail.com', 1, 1, 'persona_1501303941.', 'Eldorado 1200', NULL, '2017-05-21 19:05:42', '2017-07-29 04:52:22'),
(4, 'Guillen', 'Gabriel', 'Masculino', '34845209', '09/02/1989', '3743558941', NULL, 'gabi_guillen@hotmail.com', 1, 1, 'persona_1498741938.jpg', 'Av. Corrientes 2247', NULL, '2017-05-21 23:02:20', '2017-06-29 16:12:18'),
(5, 'Coronel', 'Melisa', 'Masculino', '28444433', '06/11/1971', '3743029844d', NULL, 'meli_coronel@hotmail.com', 1, 3, 'persona_1501304030.', 'Rademacher 1108', NULL, '2017-06-11 12:46:04', '2017-07-29 04:53:50'),
(6, 'Silvia', 'Ott', 'Femenino', '27412564', '05/09/1971', '3745879461', '362484648', 'silvia-mendendez-ott@gmail.com', 1, 1, 'persona_1499612468.jpg', 'Juan de Dios Mena 125', NULL, '2017-07-09 18:01:08', '2017-07-09 18:01:08'),
(7, 'Silvia', 'Ott', 'Femenino', '27412564', '05/09/1971', '3745879461', '362484648', 'silvia-mendendez-ott@gmail.com', 1, 1, 'persona_1501303641.', 'Juan de Dios Mena 125', NULL, '2017-07-09 18:02:08', '2017-07-29 04:47:21'),
(8, 'Mauricio', 'Tomasella', 'Masculino', '33994045', '13/11/1988', '3743499305', NULL, 'maurit@gmail.com', 1, 1, 'persona_1501303683.', 'Mitre 166', NULL, '2017-07-09 18:03:52', '2017-07-29 04:48:03'),
(9, 'Nadia', 'Tischauser', 'Femenino', '32117089', '15/02/1986', '3743052397', NULL, 'nadiatischa@gmail.com', 1, 1, 'persona_1499612801.', 'Los Proceres 1870', NULL, '2017-07-09 18:06:41', '2017-07-09 18:06:41'),
(10, 'Nadia', 'Tischauser', 'Femenino', '32117089', '15/02/1986', '3743052397', NULL, 'nadiatischa@gmail.com', 1, 1, 'persona_1501303985.', 'Los Proceres 1870', NULL, '2017-07-09 18:07:38', '2017-07-29 04:53:05'),
(11, 'Paulo', 'Garnier', 'Masculino', '29566108', '02/09/1982', '3764284190', NULL, 'garnier@gmail.com', 1, 1, 'persona_1501303725.', 'Los Lapachos 955', NULL, '2017-07-10 02:21:22', '2017-07-29 04:48:45'),
(12, 'Maria', 'Menéndez', 'Femenino', '31684098', '30/01/1985', '3764587744', NULL, 'mariamenendez@hotmail.com', 1, 1, 'persona_1501303919.', '9 de Julio 1455', NULL, '2017-07-11 03:10:15', '2017-07-29 04:51:59'),
(13, 'Hilda', 'Lizarazú', 'Femenino', '2774605', '09/09/1975', '37627804', NULL, NULL, 2, 1, 'persona_1501303765.', 'Catamarca 674', NULL, '2017-07-11 03:12:29', '2017-07-29 04:49:25'),
(14, 'Juan Pablo', 'Cáceres', 'Masculino', '34478385', '10/05/1989', '3743499820', NULL, 'jpcaceres.nea@gmail.com', 1, 1, 'persona_1501303833.', 'Monteagudo 695', NULL, '2017-07-11 14:38:06', '2017-07-29 04:50:34');

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
(1, 'Secreataria', NULL, ' Obras Sociales | Pacientes | Gestión de Turnos | Enfermeros | Médicos |', '2017-06-29 17:08:13', '2017-06-29 17:08:13');

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

--
-- Volcado de datos para la tabla `seguimientos`
--

INSERT INTO `seguimientos` (`id`, `grado`, `dimesion`, `profundidad`, `bordes`, `tipotejido`, `exudado`, `edema`, `dolor`, `pielcircundante`, `observacion`, `valoracion_id`, `created_at`, `updated_at`) VALUES
(1, '1', '0-4 cm°', 'Cicatrizada', 'No distinguible', 'Cicatrización', 'Húmedo', 'Ausente', '0-1', 'Sana', 'dfgdfgdfg', 3, '2017-07-24 01:52:34', '2017-07-24 01:52:34'),
(2, '4', '0-4 cm°', 'Cicatrizada', 'No distinguible', 'Granulación', 'Saturado', 'Ausente', '9-10', 'Sana', NULL, 4, '2017-07-24 23:45:22', '2017-07-24 23:45:22'),
(3, '1', '0-4 cm°', 'Cicatrizada', 'No distinguible', 'Cicatrización', 'Húmedo', 'Ausente', '0-1', 'Sana', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', 5, '2017-07-24 23:49:34', '2017-07-24 23:49:34'),
(4, '1', '0-4 cm°', 'Cicatrizada', 'No distinguible', 'Cicatrización', 'Húmedo', 'Ausente', '0-1', 'Sana', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', 1, '2017-07-26 01:35:48', '2017-07-26 01:35:48'),
(5, '1', '0-4 cm°', 'Cicatrizada', 'No distinguible', 'Cicatrización', 'Húmedo', 'Ausente', '0-1', 'Sana', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', 1, '2017-07-26 01:36:25', '2017-07-26 01:36:25'),
(6, '1', '0-4 cm°', 'Cicatrizada', 'No distinguible', 'Cicatrización', 'Húmedo', 'Ausente', '0-1', 'Sana', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen', 6, '2017-07-27 14:28:13', '2017-07-27 14:28:13');

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

--
-- Volcado de datos para la tabla `tratamientosseguimientos`
--

INSERT INTO `tratamientosseguimientos` (`id`, `seguimiento_id`, `tratamiento_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2017-07-24 23:49:34', '2017-07-24 23:49:34'),
(2, 4, 2, '2017-07-26 01:35:48', '2017-07-26 01:35:48'),
(3, 5, 2, '2017-07-26 01:36:25', '2017-07-26 01:36:25'),
(4, 6, 2, '2017-07-27 14:28:13', '2017-07-27 14:28:13');

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
  `agenda_id` int(10) UNSIGNED NOT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `enfermero_id` int(10) UNSIGNED DEFAULT NULL,
  `consultorio_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Hacho Kuszniruk', 'hacho_k@outlook.com', 'usuario_1497175470.', '$2y$10$Hjtb1zy/en6c017.MKW/g.isHckkTIhatU8RsABmYMFQd7F1bVABW', 0, 'IQiUWlNjjvW8eJG9Sv9jftwrWfcTFUDr4bPwDsmyVLDmSrW2pIhtsamRUj8m', '2017-05-20 21:10:21', '2017-06-11 13:04:30'),
(2, 'Juan Pablo Cáceres', 'jpcaceres.nea@gmail.com', 'usuario_1498741414.', '$2y$10$uGIlOHvcvfPstL0H5A6jiuHrh/wwOpsRBkeZjLCg/6zoN94K9oCya', 0, 'IQiUWlNjjvW8eJG9Sv9jftwrWfcTFUDr4bPwDsmyVLDmSrW2pIhtsamRUj8m', '2017-05-21 23:08:20', '2017-06-29 16:03:35'),
(9, 'Tury Antunez', 'tury.aa@gmail.com', 'usuario_1498742651.', '$2y$10$LPdVxHzS72iqZRrIJylVFOHFiix.rH.DPGKJphuvmjmQI7Gglv0NK', 0, 'IQiUWlNjjvW8eJG9Sv9jftwrWfcTFUDr4bPwDsmyVLDmSrW2pIhtsamRUj8m', '2017-05-29 01:40:55', '2017-06-29 16:24:11'),
(26, 'Gigi Donnarumma', 'dona@gmail.com', 'usuario_1498741507.', '$2y$10$4OWFMUuHT3XsF3yD4NeEnOEOTJ8H9s0L0yf92HKkaCyuhGirXbVJG', 0, 'IQiUWlNjjvW8eJG9Sv9jftwrWfcTFUDr4bPwDsmyVLDmSrW2pIhtsamRUj8m', '2017-06-10 21:19:06', '2017-06-29 16:05:07');

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
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`id`, `diagnostico`, `fecha`, `desencadenante`, `complicacion_id`, `factoresriesgo`, `signossintomas`, `observaciones`, `paciente_id`, `created_at`, `updated_at`) VALUES
(1, 'presuntivo', '12/07/2017', 'se cayó por la escalera por mamerto', 2, 'es alsjkdnikadfjnskdjfnskdjn', 'sjkdfosjdfiosdofsdf', 'sdjfosidjfosdjfosidjfosdf', 1, '2017-07-24 01:45:28', '2017-07-24 01:45:28'),
(2, 'presuntivo', '23/07/2017', 'asdasdas', 2, 'dasdasda', 'sdasdasd', 'asdasd', 1, '2017-07-24 01:51:51', '2017-07-24 01:51:51'),
(3, 'presuntivo', '23/07/2017', 'dfgdfgdfg', 2, 'dfgdfgd', 'fgdfgd', 'fgdfgdfg', 1, '2017-07-24 01:52:34', '2017-07-24 01:52:34'),
(4, 'definitivo', NULL, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 2, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', 1, '2017-07-24 23:45:22', '2017-07-24 23:45:22'),
(5, 'presuntivo', '19/07/2017', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 2, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue p', 1, '2017-07-24 23:49:34', '2017-07-24 23:49:34'),
(6, 'definitivo', '27/07/2017', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen', 2, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen', 1, '2017-07-27 14:28:13', '2017-07-27 14:28:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `complicaciones`
--
ALTER TABLE `complicaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
