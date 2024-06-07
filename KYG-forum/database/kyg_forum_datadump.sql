-- Insertar datos en las tablas --
INSERT INTO
    collections (
        idcollection,
        category,
        idgame
    )
VALUES ()
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

-- Datos para la tabla users
INSERT INTO
    users (id, name, pass, mail)
VALUES (
        'admin_user',
        'Admin User',
        'adminpass123',
        'admin@example.com'
    ),
    (
        'regular_user',
        'Regular User',
        'userpass456',
        'user@example.com'
    ),
    (
        'moderator_user',
        'Moderator User',
        'moderatorpass789',
        'moderator@example.com'
    );

-- Asignación de roles a usuarios
INSERT INTO userroles (user_id, idrole) VALUES (1, 1);

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
        user_id,
        date,
        title,
        content
    )
VALUES (
        1,
        1,
        'regular user',
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