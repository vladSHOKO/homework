CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (1,'admin','$2y$10$N1UZ5zBceOLIvCx8IchuqulK4pc5vfukO0bMyyPqVAobpVGZH.EVO','Владимир','Кизилов','Иванович','kizilov_vladimir@mail.ru','89182040068'),(2,'user123','$2y$10$N1UZ5zBceOLIvCx8IchuqulK4pc5vfukO0bMyyPqVAobpVGZH.EVO','Виктор','Иванов','Иванович','ivanovviktor@mail.ru','89185247000'),(3,'user321','$2y$10$N1UZ5zBceOLIvCx8IchuqulK4pc5vfukO0bMyyPqVAobpVGZH.EVO','Ирина','Иванова','Вячеславовна','ivanovairina@mail.ru','89880101105'),(4,'anotherUser321','$2y$10$N1UZ5zBceOLIvCx8IchuqulK4pc5vfukO0bMyyPqVAobpVGZH.EVO','Дарья','Чекалова','Алексеевна','aloeessketic@gmail.com','89185555555');
UNLOCK TABLES;
