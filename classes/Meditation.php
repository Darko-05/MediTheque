<?php

    namespace classes;

    require_once __DIR__. "/../interface/Publiable.php";

    use interface\Publiable;

    class Meditation implements Publiable
    {
        private string $titre;
        private string $contenu;
        private string $categorie;
        private string $image;
        private int $auteurId;
        private static int $totalPubliees = 0;

        /**
         * @param string $titre
         * @param string $contenu
         * @param string $categorie
         * @param string $image
         * @param int $auteurId
         */
        public function __construct(string $titre, string $contenu, string $categorie, string $image, int $auteurId)
        {
            $this->titre = $titre;
            $this->contenu = $contenu;
            $this->categorie = $categorie;
            $this->image = $image;
            $this->auteurId = $auteurId;
        }

        public function getTitre(): string
        {
            return $this->titre;
        }

        public function setTitre(string $titre): void
        {
            $this->titre = $titre;
        }

        public function getContenu(): string
        {
            return $this->contenu;
        }

        public function setContenu(string $contenu): void
        {
            $this->contenu = $contenu;
        }

        public function getCategorie(): string
        {
            return $this->categorie;
        }

        public function setCategorie(string $categorie): void
        {
            $this->categorie = $categorie;
        }

        public function getImage(): string
        {
            return $this->image;
        }

        public function setImage(string $image): void
        {
            $this->image = $image;
        }

        public function getAuteurId(): int
        {
            return $this->auteurId;
        }

        public function setAuteurId(int $auteurId): void
        {
            $this->auteurId = $auteurId;
        }

        public static function getTotalPubliees(): int
        {
            return self::$totalPubliees;
        }

        public static function setTotalPubliees(int $totalPubliees): void
        {
            self::$totalPubliees = $totalPubliees;
        }

        public function publier():bool
        {
            self::$totalPubliees++;
            return true;
        }
    }