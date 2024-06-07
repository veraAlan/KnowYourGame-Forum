-- Datos para la tabla games
INSERT INTO
    games (idgame, title)
VALUES
    (1, 'Counter-Strike 2'),
    (2, 'Minecraft'),
    (3, 'League of Legends');


-- Insertar datos en las tablas
INSERT INTO
    collections (
        idcollection,
        category,
        idgame
    )
VALUES
    (1, 'Shooter', 1),
    (2, 'Survival', 2),
    (3, 'Moba', 3);


-- Datos para la tabla portals
INSERT INTO
    portals (
        idportal,
        idgame,
        name,
        description
    )
VALUES
    (
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
VALUES
    (1, 1, 'CS2 Wiki'),
    (2, 2, 'Minecraft Wiki'),
    (3, 3, 'LoL Wiki');


-- Datos para la tabla articles
INSERT INTO
    articles (idarticle, idwiki, title)
VALUES
    (1, 1, 'Guía de Armas'),
    (2, 2,'Construcciones Impresionantes'),
    (3, 3, 'Personajes Destacados');


-- Datos para la tabla sections
INSERT INTO
    sections (idsection, idarticle, content)
VALUES
    (
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
    ),
        (
        4,
        1,
        'Nose'
    );


-- Datos para la tabla news
INSERT INTO
    news (idnew, idportal)
VALUES
    (1, 1),
    (2, 2),
    (3, 3);


    -- Datos para la tabla publications
INSERT INTO
    publications (
        idpublication,
        idnew,
        idgame,
        title,
        content,
        date
    )
VALUES
    (
        1,
        1,
        1,
        'Nuevo Parche CS2',
        'Se ha lanzado un nuevo parche para CS2.',
        '2024-05-01'
    ),
    (
        2,
        2,
        2,
        'Nuevo Parche Minecarft',
        '¡Evento especial de Minecraft este fin de semana!',
        '2024-05-15'
    ),
    (
        3,
        3,
        3,
        'Nuevo Parche LoL',
        'Resultados del Campeonato Mundial de LoL.',
        '2024-04-28'
    ),
    (
        4,
        1,
        1,
        'Nueva Skin CS2',
        'Horrible!!!',
        '2024-04-28'
    );


-- Datos para la tabla forums
INSERT INTO
    forums (idforum, idportal, title, img)
VALUES
    (
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


-- Datos para la tabla users
-- Password: Aaron: 41837661
--           Alan: 123456789
--           Santi: M123456789
INSERT INTO
    users (id, name, email, password)
VALUES
    (
        1,
        'Aaron',
        'nero14nz@gmail.com',
        '$2y$12$jU5EloTvepsMu1LeGrh2tuyLxj9GbjxlZT0HYU/hCT/yIEQdBIHOm'
    ),
    (
        2,
        'Santi',
        'santiago.yaitul@gmail.com',
        '$2y$12$l5lC9h0QcvzcJfrmFklbyungTqacPgCQg24k1ZxTA9vpKD5J/QHs.'
    ),
    (
        3,
        'Alan',
        'alan.vera@est.fi.uncoma.edu.ar',
        '$2y$12$uUldIGMFwjTPvUmOtAL37O3/s8j5cqJAv1tSAJq4E0TPimkYRXDeC'
    )
;


-- Datos para la tabla discussions
INSERT INTO
    discussions (
        iddiscussion,
        idforum,
        id_user,
        date,
        title,
        content
    )
VALUES
    (
        1,
        1,
        1,
        '2024-05-02',
        'Discusión sobre el nuevo parche',
        '¿Qué opinas sobre los cambios?'
    ),
    (
        2,
        2,
        2,
        '2024-05-16',
        'Comparte tus construcciones',
        '¡Muéstranos tus mejores creaciones!'
    ),
    (
        3,
        3,
        3,
        '2024-04-29',
        'Anuncios Importantes',
        'Por favor, revisa las nuevas reglas del foro.'
    ),
        (
        4,
        1,
        1,
        '2024-04-29',
        'Queja',
        'No quedan usuarios.'
    );


-- Datos para la tabla replies
INSERT INTO
    replies (
        idreply,
        iddiscussion,
        id_user,
        date,
        content
    )
VALUES
    (
        1,
        1,
        1,
        '2024-05-03',
        'Creo que los cambios son positivos.'
    ),
    (
        2,
        2,
        2,
        '2024-05-17',
        'Aquí está mi construcción favorita: [imagen]'
    ),
    (
        3,
        3,
        3,
        '2024-04-30',
        'Gracias por mantenernos informados.'
    ),
        (
        4,
        1,
        3,
        '2024-04-30',
        'De nada.'
    );


-- Datos para la tabla roles
INSERT INTO
    roles (idrole, description)
VALUES
    (1, 'admin'),
    (2, 'moderator'),
    (3, 'user');


-- Asignación de roles a usuarios
INSERT INTO
    userroles (id_user, idrole)
VALUES
    (1, 2),
    (2, 3),
    (3, 1);





















