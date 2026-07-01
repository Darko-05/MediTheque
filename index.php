<link rel="stylesheet" href="public/css/style.css">

<?php

    require_once __DIR__. "/config/Database.php";
    require_once __DIR__. "/repositories/MeditationRepository.php";
    require_once "includes/variables.php";
    require_once "includes/functions.php";

    $pdo = Database::getConnection();
    $meditationRepository = new \repositories\MeditationRepository($pdo);
    $meditations = null;

    if (isset($_POST["recherche"], $_POST["categorie"])) {
        $recherche = $_POST["recherche"];
        $categorie = $_POST["categorie"];
        $meditations = $meditationRepository->findByMotCleEtCategorie($recherche, $categorie
        );
    } else if (isset($_POST["recherche"])) {
        $recherche = trim($_POST["recherche"]);
        $meditations = $meditationRepository->findByMotCle($recherche);
    } else if (isset($_POST["categorie"])) {
        $categorie = trim($_POST["categorie"]);
        $meditations = $meditationRepository->findByCategorie($categorie);
    } else {
        $meditations = $meditationRepository->findAll();
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'Acceuil</title>
</head>
<body>

<div class="max-w-7xl mx-auto px-6 py-10">

    <form action="index.php" method="post" enctype="multipart/form-data"
          class="bg-white rounded-xl shadow-md p-6 mb-10 flex flex-col md:flex-row gap-4 items-end">

        <div class="flex-1">
            <label for="rechercher" class="block text-sm font-medium text-gray-700 mb-2">
                Rechercher par mot-clé
            </label>

            <input
                    type="text"
                    name="rechercher"
                    id="rechercher"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Ex : Foi, Prière..."
            >
        </div>

        <div class="w-full md:w-64">
            <label for="categorie" class="block text-sm font-medium text-gray-700 mb-2">
                Catégorie
            </label>

            <select
                    name="categorie"
                    id="categorie"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
                <?php foreach ($categories as $key => $value): ?>
                    <option value="<?= $key ?>"><?= $value ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition"
        >
            Rechercher
        </button>

    </form>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

        <?php foreach ($meditations as $meditation): ?>

            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition">

                <img
                        src="<?= $meditation['image'] ?>"
                        alt="Image de la méditation"
                        class="w-full h-56 object-cover"
                >

                <div class="p-6">

                <span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full mb-4">
                    <?= $categories[$meditation['categorie']] ?>
                </span>

                    <h2 class="text-xl font-bold text-gray-800 mb-3">
                        <?= $meditation['titre'] ?>
                    </h2>

                    <p class="text-gray-600 mb-6 line-clamp-4">
                        <?= htmlspecialchars($meditation['contenu']) ?>
                    </p>

                    <a
                            href="meditation.php?id=<?= $meditation['id'] ?>"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition"
                    >
                        Lire la suite
                    </a>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

</div>

</body>
</html>
