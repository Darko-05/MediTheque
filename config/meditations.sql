create table meditations
(
    id               serial
        primary key,
    titre            varchar(150) not null,
    contenu          text         not null,
    categorie        varchar(50)  not null,
    image            varchar(255),
    vues             integer   default 0,
    auteur_id        integer      not null
        constraint fk_auteur
            references utilisateurs
            on delete cascade,
    date_publication timestamp default CURRENT_TIMESTAMP
);

alter table meditations
    owner to postgres;

INSERT INTO public.meditations (id, titre, contenu, categorie, image, vues, auteur_id, date_publication) VALUES (1, 'Le bon berger', 'Un berger veritable ne se contente pas de compter son troupeau, il connait chaque brebis par son nom. Cette image rappelle qu''aucune situation personnelle n''echappe a l''attention divine, et que la relation proposee est faite de proximite, pas de distance.', 'jean', 'uploads/images.jpg', 0, 1, '2026-07-01 15:23:28.735653');
INSERT INTO public.meditations (id, titre, contenu, categorie, image, vues, auteur_id, date_publication) VALUES (2, 'La lumiere du monde', 'Dans un monde souvent plonge dans l''incertitude, la promesse d''une lumiere qui ne s''eteint jamais resonne comme un ancrage. Celui qui choisit de suivre cette lumiere ne marche plus a tatons : il avance avec la certitude d''etre guide, meme dans les nuits les plus sombres.', 'jean', 'uploads/images.jpg', 0, 1, '2026-07-01 15:23:28.735653');
INSERT INTO public.meditations (id, titre, contenu, categorie, image, vues, auteur_id, date_publication) VALUES (3, 'poihyjgfrdegtfrhjk', 'rdetgyuijopk^l', 'jean', 'uploads/images.png', 0, 7, '2026-07-02 15:00:24.628051');
INSERT INTO public.meditations (id, titre, contenu, categorie, image, vues, auteur_id, date_publication) VALUES (4, 'Revetir l''homme nouveau', 'Changer d''habitude demande d''abord de changer de regard sur soi-meme. Se defaire des anciens reflexes n''est pas un acte ponctuel, mais un choix renouvele chaque jour, comme on choisit chaque matin les vetements que l''on porte.', 'ephesiens', 'uploads/images.jpg', 0, 1, '2026-07-01 15:23:28.735653');
INSERT INTO public.meditations (id, titre, contenu, categorie, image, vues, auteur_id, date_publication) VALUES (5, 'La confiance en l''Eternel', 'S''appuyer sur sa propre comprehension mene souvent a l''epuisement, car l''esprit humain ne voit jamais toute l''image. Remettre ses choix entre des mains plus grandes que soi libere d''un poids que l''on n''etait jamais destine a porter seul.', 'proverbes', 'uploads/images.jpg', 0, 2, '2026-07-01 15:23:28.735653');
INSERT INTO public.meditations (id, titre, contenu, categorie, image, vues, auteur_id, date_publication) VALUES (6, 'La valeur d''une parole douce', 'Un mot peut apaiser une tension que des heures de discussion n''auraient pas resolue. Choisir la douceur dans la maniere de s''exprimer n''est pas une faiblesse, mais une force qui desamorce les conflits avant qu''ils ne s''enveniment.', 'proverbes', 'uploads/images.jpg', 0, 3, '2026-07-01 15:23:28.735653');
INSERT INTO public.meditations (id, titre, contenu, categorie, image, vues, auteur_id, date_publication) VALUES (7, 'Prier sans cesse', 'La priere n''est pas reservee a un moment fixe de la journee. Elle peut habiter chaque instant, un trajet, une pause, un silence, devenant moins un rendez-vous ponctuel qu''une maniere constante de rester connecte.', 'priere', 'uploads/images.jpg', 0, 3, '2026-07-01 15:23:28.735653');
INSERT INTO public.meditations (id, titre, contenu, categorie, image, vues, auteur_id, date_publication) VALUES (8, 'Crier vers Dieu dans la detresse', 'La priere n''a pas besoin d''etre polie ou parfaitement formulee pour etre entendue. Les mots bruts de la detresse, du doute ou de la fatigue trouvent leur place dans une relation qui accueille l''honnetete plutot que les formules toutes faites.', 'psaumes', 'uploads/images.jpg', 0, 2, '2026-07-01 15:23:28.735653');
INSERT INTO public.meditations (id, titre, contenu, categorie, image, vues, auteur_id, date_publication) VALUES (9, 'Le casque du salut', 'Proteger son esprit est aussi essentiel que proteger son corps. Dans les moments de doute ou de combat interieur, garder a l''esprit la certitude du salut agit comme une protection contre le decouragement qui cherche a s''installer.', 'ephesiens', 'uploads/images.jpg', 0, 1, '2026-07-01 15:23:28.735653');
INSERT INTO public.meditations (id, titre, contenu, categorie, image, vues, auteur_id, date_publication) VALUES (10, 'L''Eternel est mon berger', 'Il y a un repos particulier a savoir que l''on n''est jamais vraiment seul. Cette confiance ne supprime pas les vallees obscures de la vie, mais elle assure une presence qui traverse ces vallees aux cotes de celui qui les vit.', 'psaumes', 'uploads/images.jpg', 0, 2, '2026-07-01 15:23:28.735653');
INSERT INTO public.meditations (id, titre, contenu, categorie, image, vues, auteur_id, date_publication) VALUES (11, 'Perseverer dans la foi', 'La foi ne se mesure pas a l''absence de doute, mais a la capacite de continuer a avancer malgre lui. Chaque pas fait dans l''incertitude, sans certitude totale du resultat, est deja un acte de confiance en soi.', 'foi', 'uploads/images.png', 0, 3, '2026-07-01 15:23:28.735653');