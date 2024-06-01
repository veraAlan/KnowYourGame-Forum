-- Crear la base de datos --

CREATE DATABASE IF NOT EXISTS kyg_forum;

USE kyg_forum;

-- Crear las tablas --

CREATE TABLE games (
    idgame INT PRIMARY KEY,
    title VARCHAR(100)
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
    id_user VARCHAR(50),
    date DATE,
    title VARCHAR(100),
    content TEXT,
    FOREIGN KEY (idforum) REFERENCES forums (idforum) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES users (id) ON DELETE CASCADE
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
    id_user VARCHAR(50),
    date DATE,
    content TEXT,
    FOREIGN KEY (iddiscussion) REFERENCES discussions (iddiscussion) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES users (id) ON DELETE CASCADE
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
    FOREIGN KEY (username) REFERENCES users (username) ON DELETE CASCADE,
    FOREIGN KEY (idrole) REFERENCES roles (idrole) ON DELETE CASCADE
);