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
    ),
    (
        6,
        'Valorant',
        'games/images/Valorant-1718002530.jpg',
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP
    ),
    (
        7,
        'Stack Overflow',
        'games/images/Stack-Overflow-1718002519.png',
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
    (15, 'Free to Play', 1),
    (16, 'First Person Shooter', 6),
    (17, 'Multiplayer', 6),
    (18, 'Free to Play', 6),
    (19, 'Coding', 7);

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
        'Portal of Counter-Strike 2'
    ),
    (
        2,
        2,
        'Minecraft Portal',
        'Portal of Minecraft'
    ),
    (
        3,
        3,
        'LoL Portal',
        'Portal of League of Legends'
    ),
    (
        4,
        4,
        'Doom Eternal Portal',
        'Portal of Doom Eternal'
    ),
    (
        5,
        6,
        'Valorant Portal',
        'Portal of Valorant'
    ),
    (
        6,
        7,
        'Stack Overflow Portal',
        'Portal of Valorant'
    );

-- Datos para la tabla wikis
INSERT INTO
    wikis (wiki_id, portal_id, title)
VALUES (1, 1, 'CS2 Wiki'),
    (2, 2, 'Minecraft Wiki'),
    (3, 3, 'LoL Wiki'),
    (4, 4, 'Doom Eternal Wiki'),
    (5, 5, 'Valorant Wiki'),
    (6, 6, 'Stack Overflow Wiki');

-- Datos para la tabla articles
INSERT INTO
    articles (article_id, wiki_id, title)
VALUES (1, 1, 'Guía de Armas'),
    (
        2,
        2,
        'How to make Impressive Constructions'
    ),
    (3, 3, 'Best Champions'),
    (
        4,
        4,
        'How to kill the Marauder'
    ),
    (5, 4, 'Weapons and Perks'),
    (
        6,
        6,
        'Learn your Ascent Line-ups!'
    );

-- Datos para la tabla sections
INSERT INTO
    sections (
        section_id,
        article_id,
        title,
        content,
        img
    )
VALUES (
        1,
        1,
        'Spray Control',
        'Your must know the spray pattern and how to control it for these weapons.',
        NULL
    ),
    (
        2,
        1,
        'M4A4',
        'The spray pattern on this gun is quite simple but tricky at stressful situations.',
        NULL
    ),
    (
        3,
        1,
        'AK-47',
        'Arguably the hardest gun in the game. Although, the spray control is quite rewarding when used correctly',
        NULL
    ),
    (
        4,
        2,
        'Symmetry',
        'Mantaining symmetry creates a sounding and easy to keep up base for your structure, starting with a simple squared based divided in four will keep you in a good path!',
        NULL
    ),
    (
        5,
        3,
        'Teemo',
        'Best champion ever.',
        NULL
    ),
    (
        6,
        4,
        'Marauder',
        'The Marauders are humanoids wearing Sentinel armor. Their armor is an earthy green, with a plate on the left of their chests, with a red glow in the center.',
        NULL
    ),
    (
        7,
        4,
        'Stagger',
        'The best way to beat a Marauder at speed is to master the stagger and stunlock him. ',
        NULL
    ),
    (
        8,
        4,
        'Quick Combo Staggered',
        'Stagger with the Super Shotgun, then blast him with the Ballista or the BFG. Rinse and repeat and he should fall fairly quickly.',
        NULL
    ),
    (
        9,
        5,
        'BFG 9000',
        'The BFG 9000 makes a powerful comeback in Doom Eternal, found on the Phobos Base as the main power source of the BFG 10000 superweapon, which is part of the anti-demonic defense grid and is used by the Doom Slayer to shoot a hole into the surface of Mars.',
        NULL
    ),
    (
        10,
        5,
        'Ballista',
        'The Ballista is a weapon in Doom Eternal. It is similar to the previous games Gauss Cannon, and runs on Energy cells.',
        NULL
    ),
    (
        11,
        6,
        'Iso Attacking',
        'In the reference image you can find the best places to use Isos abilities.',
        NULL
    );

-- Datos para la tabla news
INSERT INTO
    news (news_id, portal_id, title)
VALUES (1, 1, 'CS2 News'),
    (2, 2, 'Minecraft News'),
    (3, 3, 'LoL News'),
    (4, 4, 'Doom Eternal News'),
    (5, 5, 'Valorant News'),
    (6, 6, 'Stack Overflow News');

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
        5,
        2,
        2,
        'Aviso! Se busca urgente',
        'Aaron perdio su pico de diamante, si alguien lo encuentra que avise',
        'publications/images/Aviso!-Se-busca-urgente-1717905070.png',
        '2024-06-09 03:43:55',
        '2024-06-09 03:44:55'
    ),
    (
        6,
        6,
        7,
        'ArchLinux Memes',
        'I USE LINUX BTW!',
        'publications/images/Stack-Overflow-1717905070.png',
        '2024-06-09 03:43:55',
        '2024-06-09 03:44:55'
    );

-- Datos para la tabla forums
INSERT INTO
    forums (forum_id, portal_id, title)
VALUES (1, 1, 'CS2 Forum'),
    (2, 2, 'Minecraft Forum'),
    (3, 3, 'LoL Forum'),
    (4, 4, 'Doom Eternal Forum'),
    (5, 5, 'Valorant Forum'),
    (6, 6, 'Stack Overflow Forum');

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
    ),
    (
        4,
        'John Greene',
        'user@justUser.com',
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
    (3, 1),
    (4, 1);