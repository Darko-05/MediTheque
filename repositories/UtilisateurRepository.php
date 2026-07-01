<?php

    namespace repositories;

    class UtilisateurRepository
    {
        private \PDO|null $pdo = null;

        public function __construct(\PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function findByEmail(string $email):array|null
        {
            $stmt = $this->pdo->prepare("
                SELECT * FROM utilisateurs WHERE email = :email;
            ");
            $stmt->execute([":email" => $email]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $result === false ? null : $result;
        }

        public function create(array $donnees):int
        {
            $stmt = $this->pdo->prepare("
                INSERT INTO utilisateurs (nom, email, mot_de_passe, role, date_inscription) VALUES (:nom, :email, :mot_de_passe, :role, :date_inscription);
            ");
            $stmt->execute([
                ":nom" => $donnees["nom"],
                ":email" => $donnees["email"],
                ":mot_de_passe" => $donnees["mot_de_passe"],
                ":role" => $donnees["role"],
                ":date_inscription" => date("Y-m-d")
            ]);
            return (int) $this->pdo->lastInsertId();
        }
    }