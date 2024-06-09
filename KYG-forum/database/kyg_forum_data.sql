-- Datos para la tabla games
INSERT INTO
    games (
        game_id,
        title,
        img,
        created_at,
        updated_at
    )
VALUES (
        1,
        'Counter-Strike 2',
        'games/images/Counter-Strike-2-1717902887.png',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP
    ),
    (
        2,
        'Minecraft',
        'games/images/Minecraft-1717902941.png',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP
    ),
    (
        3,
        'League of Legends',
        'games/images/League-of-Legends-1717902960.png',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP
    ),
    (
        4,
        'Doom Eternal',
        'games/images/Doom-Eternal-1717904156.png',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP
    ),
    (
        5,
        'Kirby Angry Edition',
        'games/images/Kirby-Angry-Edition-1717903088.png',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP
    );

-- Insertar datos en las tablas
INSERT INTO
    tags (tag_id, category, game_id)
VALUES (1, 'First Person Shooter', 1),
    (2, 'Survival', 2),
    (3, 'Moba', 3),
    (4, '2.5D', 5),
    (5, 'Isometric Camera', 3),
    (6, 'Multiplayer', 1),
    (7, 'Multiplayer', 2),
    (8, 'Free to Play', 3),
    (9, 'Action', 3),
    (10, 'Rol', 3),
    (11, 'Adventure', 5),
    (12, 'RPG', 3),
    (13, 'Sandbox', 2),
    (14, 'Multiplayer', 4),
    (15, 'Free to Play', 1);

-- Datos para la tabla portals
INSERT INTO
    portals (
        portal_id,
        game_id,
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
    wikis (wiki_id, portal_id, title)
VALUES (1, 1, 'CS2 Wiki'),
    (2, 2, 'Minecraft Wiki'),
    (3, 3, 'LoL Wiki');

-- Datos para la tabla articles
INSERT INTO
    articles (article_id, wiki_id, title)
VALUES (1, 1, 'Guía de Armas'),
    (
        2,
        2,
        'Construcciones Impresionantes'
    ),
    (3, 3, 'Personajes Destacados');

-- Datos para la tabla sections
INSERT INTO
    sections (
        section_id,
        article_id,
        content,
        img
    )
VALUES (
        1,
        1,
        'Descripción de las armas principales',
        1
    ),
    (
        2,
        2,
        'Instrucciones para construir una mansión',
        1
    ),
    (
        3,
        3,
        'Resumen de los campeones más destacados',
        1
    ),
    (4, 1, 'Nose', 1);

-- Datos para la tabla news
INSERT INTO
    news (news_id, portal_id, title)
VALUES (1, 1, 'Title CS2'),
    (2, 2, 'Title Minecraft'),
    (3, 3, 'Title LoL');

-- Datos para la tabla publications
INSERT INTO
    publications (
        publication_id,
        news_id,
        game_id,
        title,
        content,
        img,
        created_at,
        updated_at
    )
VALUES (
        1,
        1,
        1,
        'Nuevo Parche CS2',
        'Se ha lanzado un nuevo parche para CS2.',
        'publications/images/Nuevo-Parche-CS2-1717904338.jpg',
        '2024-06-09 03:43:55',
        '2024-06-09 03:44:55'
    ),
    (
        2,
        2,
        2,
        'Nuevo Parche Minecarft',
        '¡Evento especial de Minecraft este fin de semana!',
        'publications/images/Nuevo-Parche-Minecarft-1717904726.png',
        '2024-06-09 03:43:55',
        '2024-06-09 03:44:55'
    ),
    (
        3,
        3,
        3,
        'Nuevo Parche LoL',
        'Resultados del Campeonato Mundial de LoL.',
        1,
        '2024-06-09 03:43:55',
        '2024-06-09 03:44:55'
    ),
    (
        4,
        1,
        1,
        'Nueva Skin CS2',
        'Horrible!!!',
        'publications/images/Nueva-Skin-CS2-1717904635.png',
        '2024-06-09 03:43:55',
        '2024-06-09 03:44:55'
    ),
    (
        2,
        2,
        2,
        'Aviso! Se busca urgente',
        'Aaron perdio su pico de diamante, si alguien lo encuentra que avise',
        'publications/images/Aviso!-Se-busca-urgente-1717905070.png',
        '2024-06-09 03:43:55',
        '2024-06-09 03:44:55'
    );

-- Datos para la tabla forums
INSERT INTO
    forums (forum_id, portal_id, title)
VALUES (1, 1, 'CS2 Forum'),
    (2, 2, 'Minecraft Forum'),
    (3, 3, 'LoL Forum');

-- Datos para la tabla users
-- Password: Aaron: 41837661
--           Alan: 123456789
--           Santi: M123456789
INSERT INTO
    users (id, name, email, password)
VALUES (
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
    );

-- Datos para la tabla discussions
INSERT INTO
    discussions (
        discussion_id,
        forum_id,
        user_id,
        title,
        content
    )
VALUES (
        1,
        1,
        1,
        'Discusión sobre el nuevo parche',
        '¿Qué opinas sobre los cambios?'
    ),
    (
        2,
        2,
        2,
        'Comparte tus construcciones',
        '¡Muéstranos tus mejores creaciones!'
    ),
    (
        3,
        3,
        3,
        'Anuncios Importantes',
        'Por favor, revisa las nuevas reglas del foro.'
    ),
    (
        4,
        1,
        1,
        'Queja',
        'No quedan usuarios.'
    );

-- Datos para la tabla replies
INSERT INTO
    replies (
        reply_id,
        discussion_id,
        user_id,
        content
    )
VALUES (
        1,
        1,
        1,
        'Creo que los cambios son positivos.'
    ),
    (
        2,
        2,
        2,
        'Aquí está mi construcción favorita: [imagen]'
    ),
    (
        3,
        3,
        3,
        'Gracias por mantenernos informados.'
    ),
    (4, 1, 3, 'De nada.');

-- Datos para la tabla roles
INSERT INTO
    roles (role_id, description)
VALUES (1, 'admin'),
    (2, 'moderator'),
    (3, 'user');

-- Asignación de roles a usuarios
INSERT INTO
    userroles (user_id, role_id)
VALUES (1, 2),
    (2, 3),
    (3, 1);