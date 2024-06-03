-- Crear la base de datos --

CREATE DATABASE IF NOT EXISTS kyg_forum;

USE kyg_forum;

-- Crear las tablas --

CREATE TABLE users_db (
    username VARCHAR(50) PRIMARY KEY,
    name VARCHAR(100),
    pass VARCHAR(100),
    mail VARCHAR(100)
);

CREATE TABLE games (
    idgame INT PRIMARY KEY,
    title VARCHAR(100)
);

CREATE TABLE collections (
    idcollection INT PRIMARY KEY,
    idgame INT,
    category VARCHAR(100),
    FOREIGN KEY (idgame) REFERENCES games (idgame) ON DELETE CASCADE
);

CREATE TABLE portals (
    idportal INT PRIMARY KEY,
    idgame INT,
    name VARCHAR(100),
    description VARCHAR(255),
    FOREIGN KEY (idgame) REFERENCES games (idgame) ON DELETE CASCADE
);

CREATE TABLE wikis (
    idwiki INT PRIMARY KEY,
    idportal INT,
    title VARCHAR(100),
    FOREIGN KEY (idportal) REFERENCES portals (idportal) ON DELETE CASCADE
);

CREATE TABLE news (
    idnews INT PRIMARY KEY,
    idportal INT,
    FOREIGN KEY (idportal) REFERENCES portals (idportal) ON DELETE CASCADE
);

CREATE TABLE forums (
    idforum INT PRIMARY KEY,
    idportal INT,
    title VARCHAR(100),
    img VARCHAR(255),
    FOREIGN KEY (idportal) REFERENCES portals (idportal) ON DELETE CASCADE
);

CREATE TABLE publications (
    idnews INT,
    idportal INT,
    idgame INT,
    title VARCHAR(100),
    content TEXT,
    date DATE,
    PRIMARY KEY (idnews),
    FOREIGN KEY (idnews) REFERENCES news (idnews) ON DELETE CASCADE
);

CREATE TABLE articles (
    idarticle INT PRIMARY KEY,
    idwiki INT,
    title VARCHAR(100),
    FOREIGN KEY (idwiki) REFERENCES wikis (idwiki) ON DELETE CASCADE
);

CREATE TABLE discussions (
    iddiscussion BIGINT PRIMARY KEY,
    idforum INT,
    username VARCHAR(50),
    date DATE,
    title VARCHAR(100),
    content TEXT,
    FOREIGN KEY (idforum) REFERENCES forums (idforum) ON DELETE CASCADE,
    FOREIGN KEY (username) REFERENCES users_db (username) ON DELETE CASCADE
);

CREATE TABLE sections (
    idsection INT PRIMARY KEY,
    idarticle INT,
    content TEXT,
    FOREIGN KEY (idarticle) REFERENCES articles (idarticle) ON DELETE CASCADE
);

CREATE TABLE replies (
    idreply BIGINT PRIMARY KEY,
    iddiscussion BIGINT,
    username VARCHAR(50),
    date DATE,
    content TEXT,
    FOREIGN KEY (iddiscussion) REFERENCES discussions (iddiscussion) ON DELETE CASCADE,
    FOREIGN KEY (username) REFERENCES users_db (username) ON DELETE CASCADE
);

CREATE TABLE menus (
    menuid INT PRIMARY KEY,
    name VARCHAR(100)
);

CREATE TABLE roles (
    idrole INT PRIMARY KEY AUTO_INCREMENT,
    description VARCHAR(100)
);

CREATE TABLE menuroles (
    idrole INT,
    menuid INT,
    PRIMARY KEY (idrole, menuid),
    FOREIGN KEY (idrole) REFERENCES roles (idrole) ON DELETE CASCADE,
    FOREIGN KEY (menuid) REFERENCES menus (menuid) ON DELETE CASCADE
);

CREATE TABLE userroles (
    username VARCHAR(50),
    idrole INT,
    PRIMARY KEY (username, idrole),
    FOREIGN KEY (username) REFERENCES users_db (username) ON DELETE CASCADE,
    FOREIGN KEY (idrole) REFERENCES roles (idrole) ON DELETE CASCADE
);

-- Insertar datos en las tablas --

-- Datos para la tabla games
INSERT INTO
    games (idgame, title)
VALUES (1, 'Counter-Strike 2'),
    (2, 'Minecraft'),
    (3, 'League of Legends');

-- Datos para la tabla roles
INSERT INTO
    roles (description)
VALUES ('admin'),
    ('user'),
    ('moderator');

-- Datos para la tabla portals
INSERT INTO
    portals (
        idportal,
        idgame,
        name,
        description
    )
VALUES (
        1,
        1,
        'CS2 Portal',
        'Portal de Counter-Strike 2'
    ),
    (
        2,
        2,
        'Minecraft Portal',
        'Portal de Minecraft'
    ),
    (
        3,
        3,
        'LoL Portal',
        'Portal de League of Legends'
    );

-- Datos para la tabla wikis
INSERT INTO
    wikis (idwiki, idportal, title)
VALUES (1, 1, 'CS2 Wiki'),
    (2, 2, 'Minecraft Wiki'),
    (3, 3, 'LoL Wiki');

-- Datos para la tabla news
INSERT INTO news (idnews, idportal) VALUES (1, 1), (2, 2), (3, 3);

-- Datos para la tabla forums
INSERT INTO
    forums (idforum, idportal, title, img)
VALUES (
        1,
        1,
        'CS2 Forum',
        'cs2_forum.jpg'
    ),
    (
        2,
        2,
        'Minecraft Forum',
        'minecraft_forum.jpg'
    ),
    (
        3,
        3,
        'LoL Forum',
        'lol_forum.jpg'
    );

-- Datos para la tabla publications
INSERT INTO
    publications (
        idpublications,
        idnews,
        idgame,
        title,
        content,
        date
    )
VALUES (
        1,
        1,
        1,
        'Nuevo Parche',
        'Se ha lanzado un nuevo parche para CS2.',
        '2024-05-01'
    ),
    (
        2,
        2,
        2,
        'Evento Especial',
        '¡Evento especial de Minecraft este fin de semana!',
        '2024-05-15'
    ),
    (
        3,
        3,
        3,
        'Campeonato Mundial',
        'Resultados del Campeonato Mundial de LoL.',
        '2024-04-28'
    );

-- Datos para la tabla articles
INSERT INTO
    articles (idarticle, idwiki, title)
VALUES (1, 1, 'Guía de Armas'),
    (
        2,
        2,
        'Construcciones Impresionantes'
    ),
    (3, 3, 'Personajes Destacados');

-- Datos para la tabla discussions
INSERT INTO
    discussions (
        iddiscussion,
        idforum,
        username,
        date,
        title,
        content
    )
VALUES (
        1,
        1,
        'regular_user',
        '2024-05-02',
        'Discusión sobre el nuevo parche',
        '¿Qué opinas sobre los cambios?'
    ),
    (
        2,
        2,
        'moderator_user',
        '2024-05-16',
        'Comparte tus construcciones',
        '¡Muéstranos tus mejores creaciones!'
    ),
    (
        3,
        3,
        'admin_user',
        '2024-04-29',
        'Anuncios Importantes',
        'Por favor, revisa las nuevas reglas del foro.'
    );

-- Datos para la tabla sections
INSERT INTO
    sections (idsection, idarticle, content)
VALUES (
        1,
        1,
        'Descripción de las armas principales'
    ),
    (
        2,
        2,
        'Instrucciones para construir una mansión'
    ),
    (
        3,
        3,
        'Resumen de los campeones más destacados'
    );

-- Datos para la tabla replies
INSERT INTO
    replies (
        idreply,
        iddiscussion,
        username,
        date,
        content
    )
VALUES (
        1,
        1,
        'regular_user',
        '2024-05-03',
        'Creo que los cambios son positivos.'
    ),
    (
        2,
        2,
        'regular_user',
        '2024-05-17',
        'Aquí está mi construcción favorita: [imagen]'
    ),
    (
        3,
        3,
        'moderator_user',
        '2024-04-30',
        'Gracias por mantenernos informados.'
    );