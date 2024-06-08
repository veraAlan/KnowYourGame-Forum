-- Datos para la tabla games
INSERT INTO
    games (game_id, title, img)
VALUES (1, 'Counter-Strike 2', 1),
    (2, 'Minecraft', 1),
    (3, 'League of Legends', 1);

-- Insertar datos en las tablas
INSERT INTO
    collections (
        collection_id,
        category,
        game_id
    )
VALUES (1, 'Shooter', 1),
    (2, 'Survival', 2),
    (3, 'Moba', 3);

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
        date,
        img
    )
VALUES (
        1,
        1,
        1,
        'Nuevo Parche CS2',
        'Se ha lanzado un nuevo parche para CS2.',
        '2024-05-01',
        1
    ),
    (
        2,
        2,
        2,
        'Nuevo Parche Minecarft',
        '¡Evento especial de Minecraft este fin de semana!',
        '2024-05-15',
        1
    ),
    (
        3,
        3,
        3,
        'Nuevo Parche LoL',
        'Resultados del Campeonato Mundial de LoL.',
        '2024-04-28',
        1
    ),
    (
        4,
        1,
        1,
        'Nueva Skin CS2',
        'Horrible!!!',
        '2024-04-28',
        1
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
        date,
        title,
        content
    )
VALUES (
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
        reply_id,
        discussion_id,
        user_id,
        date,
        content
    )
VALUES (
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