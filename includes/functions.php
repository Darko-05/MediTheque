<?php

    function formaterExtrait(string $texte, int $longueur):string {
        return strlen($texte) > $longueur ? $texte. "..." : $texte;
    }

    function estAuteur(array|null $utilisateurs):bool
    {
        return $utilisateurs["role"] === "auteur";
    }

    function nomCategorie(string $cle, array $categories):string
    {
        if (array_key_exists($cle, $categories)) {
            return $categories[$cle];
        }
        return "Categorie non trouvée";
    }

    function checkImage(array $file, int $size, array $authorized_extensions, string $save_files_path):bool
    {
        if (isset($file) && $file["error"] === 0) {

            // Le fichier n'est pas volumineux
            if ($file["size"] > 1_024_000) {
                echo "<p class='text-red-600 font-medium'>Fichier trop volumineux, veuillez réessayer !</p>";
            }

            // L'extension du fichier est autorisés
            $nomDuFichier = $file["name"];
            $extensionDuFichier = pathinfo($nomDuFichier)["extension"];
            if (!in_array($extensionDuFichier, $authorized_extensions)) {
                echo "Erreur de chargement du fichier, seulement les images sont autorisés";
            }

            // Verifier que le dossier d'enregistrement est existant
            $path = __DIR__. "/../". $save_files_path;
            if (!is_dir($path)) {
                echo "<p class='text-red-600 font-medium'>Erreur du server : le dossier d'enregistrement est inexistant</p>";
                exit();
            }

            // Envoie du fichier
            move_uploaded_file($file["tmp_name"], $path. basename($file["name"]));

            return true;

        }

        return false;
    }

    function estConnecter():bool
    {
        return isset($_SESSION["utilisateur"]);
    }