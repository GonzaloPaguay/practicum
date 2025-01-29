CREATE TABLE medicos(
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  apellidos VARCHAR(50),
  nombres VARCHAR(50),
  ci VARCHAR(10),
  especialidad VARCHAR(70),
  registro VARCHAR(15),
  telefono VARCHAR(15),
  direccion VARCHAR(60),
  contacto VARCHAR(50),
  email	VARCHAR(50),
  user_id BIGINT(20) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;