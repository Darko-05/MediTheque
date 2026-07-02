<?php

    namespace repositories;

    class MeditationRepository
    {
        private \PDO|null $pdo = null;

        public function __construct(\PDO $pdo) {
            $this->pdo = $pdo;
        }

        public function findAll():array
        {
            return $this->pdo->query("
                SELECT * FROM meditations; 
            ")->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function findById(int $id):array|null
        {
            $stmt = $this->pdo->prepare("
                SELECT * FROM meditations WHERE id = :id;
            ");
            $stmt->execute([":id" => $id]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $result === false ? null : $result;
        }

        public function findByCategorie(string $categorie):array
        {
            $stmt = $this->pdo->prepare("
                SELECT * FROM meditations WHERE categorie = :categorie;
            ");
            $stmt->execute([":categorie" => $categorie]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function findByMotCle(string $motCle):array
        {
            $stmt = $this->pdo->prepare("
                SELECT * FROM meditations WHERE titre LIKE :titre;
            ");
            $stmt->execute([":titre" => "%$motCle%"]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function findByMotCleEtCategorie(string $motCle, string $categorie):array
        {
            $stmt = $this->pdo->prepare("
                SELECT * FROM meditations WHERE titre LIKE :titre AND categorie = :categorie;
            ");
            $stmt->execute([
                ":titre" => "%$motCle%",
                ":categorie" => $categorie
            ]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function create(array $donnees):int
        {
            $stmt = $this->pdo->prepare("
                INSERT INTO meditations (titre, contenu, categorie, image, auteur_id) VALUES (:titre, :contenu, :categorie, :image, :auteur_id);
            ");
            $stmt->execute([
                ":titre" => $donnees["titre"],
                ":contenu" => $donnees["contenu"],
                ":categorie" => $donnees["categorie"],
                ":image" => $donnees["image"],
                ":auteur_id" => $donnees["auteur_id"]
            ]);
            return $this->pdo->lastInsertId();
        }

        public function incrementerVues(int $id):bool
        {
            $stmt = $this->pdo->prepare("
                UPDATE meditations SET vues = vues + 1 WHERE id = :id;
            ");
            $stmt->execute([":id" => $id]);
            return $stmt->rowCount() > 0;
        }

        public function delete(int $id):bool
        {
            $stmt = $this->pdo->prepare("
                DELETE FROM meditations WHERE id = :id;
            ");
            $stmt->execute([":id" => $id]);
            return $stmt->rowCount() > 0;
        }

    }