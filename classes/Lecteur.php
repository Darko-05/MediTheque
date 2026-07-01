<?php

    namespace classes;

    class Lecteur extends Utilisateur
    {
        public function role(): string
        {
            return "lecteur";
        }
    }