create table utilisateurs
(
    id               serial
        primary key,
    nom              varchar(100) not null,
    email            varchar(150) not null
        unique,
    mot_de_passe     varchar(255) not null,
    role             varchar(20)  not null
        constraint utilisateurs_role_check
            check ((role)::text = ANY ((ARRAY ['lecteur'::character varying, 'auteur'::character varying])::text[])),
    date_inscription date default CURRENT_DATE
);

alter table utilisateurs
    owner to postgres;

INSERT INTO public.utilisateurs (id, nom, email, mot_de_passe, role, date_inscription) VALUES (1, 'Jean', 'jean@example.com', 'motdepasse', 'auteur', '2026-07-01');
INSERT INTO public.utilisateurs (id, nom, email, mot_de_passe, role, date_inscription) VALUES (2, 'Paul', 'paul@example.com', 'motdepasse', 'auteur', '2026-07-01');
INSERT INTO public.utilisateurs (id, nom, email, mot_de_passe, role, date_inscription) VALUES (3, 'Pierre', 'pierre@example.com', 'motdepasse', 'auteur', '2026-07-01');
INSERT INTO public.utilisateurs (id, nom, email, mot_de_passe, role, date_inscription) VALUES (4, 'HOUNSOUNON TOLIN Cléanthe', 'cleanhsn073@gmail.com', 'motdepasse', 'lecteur', '2026-07-02');