CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirm_password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `date_register` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `confirm_password`, `date_register`) VALUES
(1, 'Administrador', 'adm@adm.com', '25d55ad283aa400af464c76d713c07ad', '25d55ad283aa400af464c76d713c07ad', '2020-11-07 08:48:40'),
(2, 'Maria Matos de Souza', 'mariams@gmail.com', '25d55ad283aa400af464c76d713c07ad', '25d55ad283aa400af464c76d713c07ad', '2020-11-07 09:38:59');

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

