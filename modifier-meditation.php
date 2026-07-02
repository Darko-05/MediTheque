<link rel="stylesheet" href="public/css/style.css">
<?php

    require_once "header.php";
    require_once "includes/variables.php";
    require_once "includes/functions.php";
    require_once "config/Database.php";
    require_once "repositories/MeditationRepository.php";
    require_once "repositories/UtilisateurRepository.php";

    $meditation = null;

    if (isset($_GET["id"])) {

        $id = $_GET["id"];

        $pdo = Database::getConnection();

        $meditationRepository = new \repositories\MeditationRepository($pdo);

        $meditation = $meditationRepository->findById($id);

        if (!$meditation) {
            echo "<p class='text-red-600 font-medium'>Une erreur s'est produite, veuillez réessayer !</p>";
            exit();
        }

    } else {
        echo "<p class='text-red-600 font-medium'>Une erreur s'est produite, veuillez réessayer !</p>";
    }

?>

<head>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Publication de méditation</title>
</head>

<?php if (isset($_SESSION["is_connected"], $_SESSION["role"]) && $_SESSION["role"] === "auteur") : ?>
    <section class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">

        <h2 class="text-2xl font-bold mb-6">Ajouter une méditation</h2>

        <form action="ajouter-meditation.php" method="post" enctype="multipart/form-data" class="space-y-4">

            <div>
                <label for="titre" class="block font-medium mb-1">Titre</label>
                <input type="text" name="titre" id="titre" class="w-full border rounded p-2 focus:outline-none focus:ring-2
                focus:ring-blue-500" value="<?php echo $meditation['titre'] ?>">
            </div>

            <div>
                <label for="contenu" class="block font-medium mb-1">Contenu</label>
                <textarea name="contenu" rows="6" id="contenu" class="w-full border rounded p-2 focus:outline-none focus:ring-2
                focus:ring-blue-500"><?php echo $meditation['contenu'] ?></textarea>
            </div>

            <div>
                <label for="categorie" class="block font-medium mb-1">Catégorie</label>
                <select name="categorie" id="categorie" class="w-full border rounded p-2 focus:outline-none focus:ring-2
                focus:ring-blue-500">
                    <?php foreach ($categories as $key => $value) :  ?>
                        <option value="<?= $key == $meditation['categorie'] ? "selected" : "" ?>"><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block font-medium mb-1">Image</label>

                <label class="cursor-pointer inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Choisir une image
                    <input type="file" name="image" class="hidden">
                </label>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Enregistrer
            </button>

        </form>

    </section>

<?php else : ?>

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md text-center max-w-md">
            <h1 class="text-2xl font-bold text-red-600 mb-4">
                Accès refusé
            </h1>

            <p class="text-gray-700">
                Vous n’êtes pas autorisé à être sur cette page.
            </p>

            <a href="index.php" class="inline-block mt-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Retour à l’accueil
            </a>
        </div>
    </div>

<?php endif; ?>