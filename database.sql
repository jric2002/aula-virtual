CREATE DATABASE IF NOT EXISTS aula_virtual;
USE aula_virtual;
CREATE TABLE IF NOT EXISTS professor (
  id_professor INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username TEXT NOT NULL,
  name TEXT NOT NULL,
  password TEXT NOT NULL
);
INSERT INTO professor (username, name, password) VALUES
("admin", "Administrador", "admin"),
("docente", "Docente", "docente"),
("miguel", "Miguel Angel", "miguel");
CREATE TABLE IF NOT EXISTS exam (
  id_professor INT NOT NULL,
  id_examen INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title TEXT NOT NULL,
  description TEXT,
  number_questions INT,
  FOREIGN KEY (id_professor) REFERENCES professor(id_professor);
);
INSERT INTO exam (id_professor, title, description, number_questions) VALUES
(1, "Examen 1", "Descripción del examen", 3),
(1, "Examen 2", "Descripción del examen", 3),
(2, "Examen 1", "Descripcion del examen", 3),
(2, "Examen 2", "Descripcion del examen", 3);
CREATE TABLE IF NOT EXISTS question (
  id_examen INT NOT NULL,
  id_question INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  question TEXT NOT NULL,
  FOREIGN KEY (id_examen) REFERENCES exam(id_examen)
);
INSERT INTO question (id_examen, question) VALUES
(1, "Pregunta 1 del examen 1"),
(1, "Pregunta 2 del examen 1"),
(1, "Pregunta 3 del examen 1"),
(2, "Pregunta 1 del examen 2"),
(2, "Pregunta 2 del examen 2"),
(2, "Pregunta 3 del examen 2");
CREATE TABLE IF NOT EXISTS option (
  id_question INT NOT NULL,
  id_option INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  option TEXT NOT NULL,
  answer BOOLEAN,
  FOREIGN KEY (id_question) REFERENCES question(id_question)
);
INSERT INTO option (id_question, option, answer) VALUES
(1, "Opción de la pregunta 1", 0),
(1, "Opción de la pregunta 1", 0),
(1, "Opción de la pregunta 1", 1),
(2, "Opción de la pregunta 2", 0),
(2, "Opción de la pregunta 2", 1),
(2, "Opción de la pregunta 2", 0);
CREATE TABLE IF NOT EXISTS student (
  id_student INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username TEXT NOT NULL,
  name TEXT NOT NULL,
  password TEXT NOT NULL
);
INSERT INTO student (username, name, password) VALUES
("estudiante", "Estudiante", "estudiante"),
("jose", "José Rodolfo", "jose"),
("Joshua", "Joshua", "joshua");