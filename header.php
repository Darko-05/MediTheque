<?php session_start(); ?>

<header class="bg-blue-600 text-white shadow-md">
    <div class="max-w-6xl mx-auto flex items-center justify-between p-4">

        <h1 class="text-xl font-bold">Mon Site</h1>

        <?php if (isset($_SESSION["is_connected"]) && $_SESSION["role"] === "auteur") : ?>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="index.php" class="hover:text-gray-200">Accueil</a></li>
                    <li><a href="ajouter-meditation.php" class="hover:text-gray-200">Publier une méditation</a></li>
                    <li><a href="deconnexion.php" class="hover:text-gray-200">Deconnexion</a></li>
                </ul>
            </nav>
        <?php elseif (isset($_SESSION["is_connected"]) && $_SESSION["role"] === "lecteur") : ?>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="index.php" class="hover:text-gray-200">Accueil</a></li>
                    <li><a href="deconnexion.php" class="hover:text-gray-200">Deconnexion</a></li>
                </ul>
            </nav>
        <?php else : ?>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="index.php" class="hover:text-gray-200">Accueil</a></li>
                    <li><a href="inscription.php" class="hover:text-gray-200">Inscription</a></li>
                    <li><a href="connexion.php" class="hover:text-gray-200">Connexion</a></li>
                </ul>
            </nav>
        <?php endif; ?>

    </div>
</header>