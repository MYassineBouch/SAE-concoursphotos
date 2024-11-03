CREATE DATABASE concours_photo

CREATE TABLE user (
id INT PRIMARY KEY AUTO_INCREMENT, 
nom VARCHAR (30) NOT NULL,
prenom VARCHAR (30) NOT NULL,
departement VARCHAR (30) NOT NULL,
);

CREATE TABLE photo (
id INT PRIMARY KEY AUTO_INCREMENT,
legende VARCHAR (200) NOT NULL,
user_id1 INT,
FOREIGN KEY(user_id1) REFERENCES user(id)
);
ALTER TABLE photo
ADD COLUMN file_path VARCHAR(255) NOT NULL,
ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;


CREATE TABLE vote(
id INT PRIMARY KEY AUTO_INCREMENT,
user_id2 INT,
FOREIGN KEY(user_id2) REFERENCES user(id)
FOREIGN KEY(photo_id) REFERENCES photo(id)
);


--jeu  d'insertion des clients 


INSERT INTO user (nom, prenom, departement)
VALUES
  ('Dupont', 'Jean', 'Paris'),
  ('Martin', 'Sophie', 'Marseille'),
  ('Lefebvre', 'Pierre', 'Lyon'),
  ('Garcia', 'Laura', 'Bordeaux'),
  ('Roux', 'Thomas', 'Lille');
  
INSERT INTO photo (legende, user_id1, file_path)
VALUES
  ("Magnifique coucher de soleil", 1, "/photos/sunset.jpg"),
  ("Paysage de montagne enneigé", 2, "/photos/mountain.png"),
  ("Portrait d'un vieil homme", 3, "/photos/portrait.jpeg"),
  ("Champ de lavande en Provence", 4, "/photos/lavender.jpg"),
  ("Vue de la Tour Eiffel", 1, "/photos/eiffel_tower.png");

INSERT INTO vote (user_id2, photo_id)
VALUES
  (1, 2), -- Jean Dupont vote pour la photo de Sophie Martin
  (1, 3), -- Jean Dupont vote aussi pour la photo de Pierre Lefebvre
  (2, 1), -- Sophie Martin vote pour la photo de Jean Dupont
  (3, 1), -- Pierre Lefebvre vote pour la photo de Jean Dupont
  (3, 2), -- Pierre Lefebvre vote pour la photo de Sophie Martin
  (4, 3), -- Laura Garcia vote pour la photo de Pierre Lefebvre
  (4, 5), -- Laura Garcia vote pour la photo de Jean Dupont
  (5, 4); -- Thomas Roux vote pour la photo de Laura Garcia




ALTER TABLE vote ADD COLUMN validated BOOLEAN DEFAULT 0;
ALTER TABLE photo ADD COLUMN validated BOOLEAN DEFAULT 0;