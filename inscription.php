<?php

    session_start();

    require_once __DIR__. "/config/Database.php";
    require_once __DIR__. "/repositories/UtilisateurRepository.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["email"], $_POST["nom"], $_POST["mot_de_passe"], $_POST["role"])) {
            $email = trim($_POST["email"]);
            $nom = trim($_POST["nom"]);
            $password = $_POST["mot_de_passe"];
            $role = $_POST["role"];

            if (!empty($email)
                && !empty($nom)
                && !empty($password)
                && !empty($role)
                && filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $pdo = Database::getConnection();
                $utilisateurRepository = new \repositories\UtilisateurRepository($pdo);

                $findEmail = $utilisateurRepository->findByEmail($email);

                if ($findEmail === null) {
                    $isCreated = $utilisateurRepository->create([
                            "nom" => $nom,
                            "email" => $email,
                            "mot_de_passe" => $password,
                            "role" => $role
                    ]);
                    if ($isCreated > 0) {

                        $_SESSION["email"] = $email;
                        $_SESSION["mot_de_passe"] = $password;

                        header("Location: connexion.php");
                        exit();
                    } else {
                        echo "<p class='text-red-600 font-medium'>
                        Erreur lors de la création du compte</p>";
                    }
                } else {
                    echo "<p class='text-red-600 font-medium'>
                    Erreur lors de la création de compte, un compte existe déja avec cet email</p>";
                }

            } else {
                echo "<p class='text-red-600 font-medium'>Email invalide, veuillez réessayer</p>";
            }

        } else {
            echo "<p class='text-red-600 font-medium'>Veuillez remplir tout les champs.</p>";
        }
    }
    
?>

<head>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Page d'Inscription</title>
</head>

<div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-8">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Inscription
    </h2>

    <form action="inscription.php" method="post" class="space-y-5">

        <div>
            <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">
                Nom
            </label>
            <input
                type="text"
                name="nom"
                id="nom"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                Email
            </label>
            <input
                type="email"
                name="email"
                id="email"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
        </div>

        <div>
            <label for="mot_de_passe" class="block text-sm font-medium text-gray-700 mb-1">
                Mot de passe
            </label>
            <input
                type="password"
                name="mot_de_passe"
                id="mot_de_passe"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
        </div>

        <div>
            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">
                Rôle
            </label>
            <select
                name="role"
                id="role"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
                <option value="lecteur">Lecteur</option>
                <option value="auteur">Auteur</option>
            </select>
        </div>

        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition"
        >
            S'inscrire
        </button>

    </form>

</div>
