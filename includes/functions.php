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

    function estConnecter():bool
    {
        return isset($_SESSION["utilisateur"]);
    }