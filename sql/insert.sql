INSERT INTO Etudiant (
	NCE,
	nom,
	prenom,
	classe
) VALUES (
	'123',
	'Riahi',
	'Ahmed',
	'DSI31'
),
(
	'456',
	'Ben Salem',
	'Serine',
	'DSI22'
),
(
	'789',
	'Gharbi',
	'Faten',
	'RSI21'
),
(
	'963',
	'Ben Amor',
	'Tarek',
	'TI101'
);

INSERT INTO Enseignant (
	Matricule,
	nom_Ens,
	prenom_Ens
) VALUES (
	'0001',
	'Ben Ali',
	'Amira'
),
(
	'0002',
	'Khelifi',
	'Youssef'
),
(
	'0003',
	'Jendoubi',
	'Noura'
),
(
	'0004',
	'Bouazizi',
	'Mehdi'
);

INSERT INTO Administrateur (
	id_admin,
	login,
	mot_de_passe
) VALUES (
	'0001',
	'admin',
	'password'
),
(
	'0002',
	'wassim',
	'password'
)