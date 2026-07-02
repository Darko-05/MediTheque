<?php

    require_once __DIR__. "/config/Database.php";
    require_once __DIR__ . "/classes/Meditation.php";
    require_once __DIR__. "/repositories/MeditationRepository.php";

    $pdo = Database::getConnection();
    $meditationRepository = new \repositories\MeditationRepository($pdo);

    if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
        echo "Une erreur s'est produite, veuillez réessayer !";
        exit();
    } else {
        $id = $_GET['id'];
        try {
            $meditationRepository->incrementerVues($_GET['id']);
            $meditation = $meditationRepository->findById($id);
        } catch (Error $e) {
            die("Erreur de chargement : ". $e->getMessage());
        }
    }

    $thinking = new \classes\Meditation($meditation['titre'], $meditation['contenu'], $meditation['categorie'], $meditation['image'], $meditation['auteur_id']);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $thinking->getTitre() ?></title>
</head>
<body>

<?php require_once "header.php" ?>

<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="bg-white rounded-xl shadow-md overflow-hidden">

        <img
            src="/uploads/images.jpg"
            alt="Image de la méditation"
            class="w-full h-72 object-cover"
        >

        <div class="p-8">

            <span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full mb-4">
                Méditation
            </span>

            <h1 class="text-3xl font-bold text-gray-800 mb-4">
                <?= $thinking->getTitre() ?>
            </h1>

            <p class="text-gray-700 leading-relaxed mb-6">
                <?= $thinking->getContenu() ?>
            </p>

            <a
                href="index.php"
                class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-lg transition"
            >
                Retour
            </a>

        </div>

    </div>

    <div class="text-sm text-gray-500 mb-4">
        <?= $meditation["vues"] ?> vues
    </div>

    <?php if (isset($_SESSION["is_connected"], $_SESSION["role"]) && $_SESSION["role"] === "auteur") : ?>
    <a href="modifier-meditation.php?id=<?= $meditation["id"] ?>"
       class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
        Modifier
    </a>
    <?php endif; ?>


</div>

</body>
</html>
