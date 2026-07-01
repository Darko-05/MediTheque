<?php

    session_start();

    require_once __DIR__. "/config/Database.php";
    require_once __DIR__. "/repositories/UtilisateurRepository.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $email = $_POST["email"];
        $password = $_POST["mot_de_passe"];
        $remember = $_POST["remember"];

        $pdo = Database::getConnection();
        $userRepository = new \repositories\UtilisateurRepository($pdo);

        $findEmail = $userRepository->findByEmail($email);

        if ($findEmail && $findEmail["mot_de_passe"] === $password){
            if ($remember === "1") {
                setcookie(
                    "email",
                    $email,
                    [
                        "expires" => time() + 30 * 24 * 60 * 60,
                        "secure" => false,
                        "httponly" => true
                    ]
                );
            }
            header("Location: index.php");
            exit();
        } else {
            echo "<p class='text-red-600 font-medium'>Email ou Mot de passe incorrect, Veuillez réessayer</p>";
        }

    }

?>

<head>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Page Connexion</title>
</head>

<div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-8">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Connexion
    </h2>

    <form action="connexion.php" method="post" class="space-y-5">

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
                value="<?php
                    if (isset($_SESSION["email"])) {
                        echo $_SESSION["email"];
                    } elseif (isset($_COOKIE["email"])) {
                        echo $_COOKIE["email"];
                    }
                ?>"
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
                value="<?php
                    if (isset($_SESSION["mot_de_passe"])) {
                        echo $_SESSION["mot_de_passe"];
                } ?>"
            >
        </div>

        <div class="flex items-center justify-between">

            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input
                    type="checkbox"
                    name="remember"
                    value="1"
                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                >
                Se souvenir de moi
            </label>

        </div>

        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition"
        >
            Se connecter
        </button>

    </form>

</div>
