-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2020 a las 17:35:05
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `konectadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `documento` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('A','I','T') NOT NULL DEFAULT 'A',
  `idcreador` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `direccion`, `email`, `created_at`, `updated_at`, `status`, `idcreador`) VALUES
(1, 'cliente 1', 'z12344', 'poblado', 'cliente1@gmail.com', '2020-12-04 14:18:58', '2020-12-04', 'A', 2),
(2, 'cliente2', 'z123456', 'robledo', 'cliente2@gmail.com', '2020-12-04 14:19:33', '2020-12-04', 'A', 2),
(3, 'cliente 3', 'z0987', 'italia', 'cliente3@gmail.com', '2020-12-04 14:19:55', '2020-12-04', 'A', 2),
(4, 'cliente 4', 'z657', 'barbosa', 'cliente4@gmail.com', '2020-12-04 14:20:18', '2020-12-04', 'A', 2),
(5, 'cliente 5', 'z90123', 'tucacas', 'cliente5@gmail.com', '2020-12-04 14:42:36', '2020-12-04', 'T', 2),
(6, 'stefan', '090', 'stefan', 'stefan@gmail.com', '2020-12-04 15:42:20', '2020-12-04', 'A', 6),
(7, 'alessandro', 'alessandro', 'merida', 'ale@gmail.com', '2020-12-04 15:43:01', '2020-12-04', 'T', 2),
(8, 'cliente 1', 'z12344', 'poblado', 'cliente1@gmail.com', '2020-12-04 16:08:06', '2020-12-04', 'A', 2),
(9, 'cliente6', '9wo00sskdkjiu', 'medellin', 'cliente6@gmail.com', '2020-12-04 16:11:58', '2020-12-04', 'A', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ko_users`
--

CREATE TABLE `ko_users` (
  `id` int(11) NOT NULL,
  `documento` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `Nombres` varchar(200) NOT NULL,
  `Apellidos` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('A','T') NOT NULL DEFAULT 'A',
  `rol` enum('A','V') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ko_users`
--

INSERT INTO `ko_users` (`id`, `documento`, `username`, `Nombres`, `Apellidos`, `email`, `password`, `token`, `created_at`, `updated_at`, `status`, `rol`) VALUES
(1, '18878021', 'admin', 'admin', 'admin', 'admin@gmail.com', '1234567890', 'qwerty', '2020-12-03 13:35:31', '2020-12-03 13:35:31', 'A', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `documento` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `Nombres` varchar(200) NOT NULL,
  `Apellidos` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('A','T') NOT NULL DEFAULT 'A',
  `rol` enum('A','V') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `documento`, `username`, `Nombres`, `Apellidos`, `email`, `password`, `token`, `created_at`, `updated_at`, `status`, `rol`) VALUES
(2, '1234567890', 'adminultra', 'Nombres', 'Apellidos', 'adminz20@gmail.com', '$2y$10$Ju1MLXKWbXm6DuNAlBJYheUjRoz051vEeqMo.3IkXMlzMcyk9Tjge', '3487', '2020-12-03 20:32:39', '2020-12-04 12:10:14', 'A', 'A'),
(3, '924379704031990', 'paulina', 'felipe 20', 'rivero 20', 'felipe.riverot@gmail.com', '$2y$10$HSg20GwBOsCfvzacT73LxekHTUCXhnQ8A.PDLSdaz025S5A1PSVJy', '3487', '2020-12-04 00:09:17', '2020-12-04 11:57:05', 'A', 'A'),
(4, '103920202903', 'rafacar', 'rafacar', 'rafacar', 'rafacar@gmail.com', '$2y$10$SzKmnsfuQ/..pjLorLy2xu9ST7GKkcafp./pBArAp8EPy.gC5LkFG', '3487', '2020-12-04 00:19:19', '2020-12-04 00:19:19', 'A', 'V'),
(5, '102928384', 'felipez20', 'felipez20', 'felipez20', 'felipe.riverot100@gmail.com', '$2y$10$YcNqcLrONMo8LzhjBcG27.PWmUihEwX5QvZCO5CwXQ9n2EDbxv4m2', '3487', '2020-12-04 11:58:10', '2020-12-04 12:28:13', 'T', 'V'),
(6, '29820190', 'rivero', 'rivero', 'rivero', 'rivero@gmail.com', '$2y$10$IWIID.5SaAXvyeJ5q4MrReMI0ncwdZgJ2aIurwTfkbQbzwUcOIUJ.', '3487', '2020-12-04 12:36:45', '2020-12-04 15:14:29', 'A', 'V'),
(7, '019283', 'silvia', 'silvia', 'silvia', 'silvia@gmail.com', '$2y$10$HZNh9C1e0pSbNTF66dk7qOteAc8rp7x.ZYcYy0bEqe8d4whFcWJcG', '3487', '2020-12-04 12:37:38', '2020-12-04 12:37:38', 'A', 'A'),
(8, '2937469889202', 'albert', 'alebert', 'albert', 'albert@gmail.com', '$2y$10$SuVWXV0rN.8rjisS31lX2O80Qd33WaY6B9xd.4POmCmU6a8mZ0pe.', '3487', '2020-12-04 12:38:44', '2020-12-04 12:39:09', 'T', 'V');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ko_users`
--
ALTER TABLE `ko_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento` (`documento`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento` (`documento`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ko_users`
--
ALTER TABLE `ko_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
