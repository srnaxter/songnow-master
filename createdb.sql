-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2017 at 06:55 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `songnow`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `listmusic_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `listmusic_id`, `user`, `email`, `ip`, `text`, `approved`, `created_at`, `updated_at`) VALUES
  (6, 16, 'Juanjo Naxter', 'sr.naxter@gmail.com', '::1', 'La musica es vida.', 1, '2017-12-06 13:01:15', '2017-12-06 13:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `listmusic`
--

CREATE TABLE `listmusic` (
  `id` int(11) NOT NULL,
  `image` tinytext,
  `name` tinytext NOT NULL,
  `genero` tinytext NOT NULL,
  `anio` tinytext NOT NULL,
  `origin` tinytext NOT NULL,
  `creado` tinytext NOT NULL,
  `duracion` tinytext NOT NULL,
  `lugarencontrado` tinytext NOT NULL,
  `aniocreation` tinytext NOT NULL,
  `recomiendas` tinytext,
  `album` tinytext NOT NULL,
  `youtube` tinytext,
  `valoracion` tinytext,
  `link` tinytext,
  `lyrics` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listmusic`
--


INSERT INTO `listmusic` (`id`, `image`, `name`, `genero`, `anio`, `origin`, `creado`, `duracion`, `lugarencontrado`, `aniocreation`, `recomiendas`, `album`, `youtube`, `valoracion`, `link`, `lyrics`, `created_at`, `updated_at`) VALUES
(2, 'https://pm1.narvii.com/6308/5b10b41cc5aac5d252be831ce7fd4d495ec3e5cf_128.jpg', 'Bab Bunny', 'Trap', '2017', 'Puerto rico', 'Crieta record', '3:45', 'Youtube', '2016', 'Si', 'No tiene', 'https://www.youtube.com/watch?v=ws00k_lIQ9U', '10', '', 'Salí jodido la última vez que en alguien yo confie. Me compre una fory y a Cupido se la vacié. No me vuelvo a enamorar, no. No me vuelvo a enamorar. Sigue tu camino que sin ti me va mejor. Ahora tengo a otras que me lo hacen mejor. Si antes yo era un hijo de puta, ahora soy peor, Ahora soy peor, ahora soy peor, por ti, Sigue tu camino que sin ti me va mejor, Ahora tengo a otras que me lo hacen mejor, Si antes yo era un hijo de puta, ahora soy peor, Ahora soy peor, ahora soy peor, por ti.', '0000-00-00 00:00:00', '2017-11-29 15:21:02'),
(50, 'https://pm1.narvii.com/6450/9a5ca02f7e018acaf9382ca5eb600753f6d941f7_128.jpg', 'Ricky Martin', 'Reggaeton', '2015', 'España', 'Mambo King', '4:00', 'Radio', '2017', 'si', 'No tiene', 'https://www.youtube.com/watch?v=iOe6dI2JhgU', '8', '', 'Ven te cuento de una vez. Tu descanso está en la cama de mis pies. Ven te cuento, un, dos, tres. Mis pasitos son descansos sin estrés. Dime si hay otro lugar para dejar mi corazón. Ay, tienes razón. Mejor por qué no, nos vamos los dos. Si tú quieres nos bañamos. Si tú quieres nos soplamos. Pa secarnos lo mojao. Si tu boca quiere beso. Y tu cuerpo quiere de eso. Arreglamos. Si tú quieres un atajo. Y lo quieres por abajo yo te llevo bien callao. Vente pa'' ''ca. Vente pa'' ''ca. Vente pa'' ''ca ah.', '2017-11-30 20:34:36', '2017-12-05 22:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
  (8, 'srnaxter', 'sr.naxter@gmail.com', '123456789jj', '2017-12-05 22:06:44', '2017-12-05 22:06:44');

--
-- Indexes for dumped tables
--
CREATE TABLE invitations
(
  id INT(11)NOT NULL ,
  email VARCHAR(50)NOT NULL ,
  used VARCHAR(20)NOT NULL ,
  created_at DATETIME NOT NULL ,
  updated_at DATETIME NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listmusic`
--
ALTER TABLE `listmusic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `listmusic`
--
ALTER TABLE `listmusic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `invitations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;