<?php

    namespace classes;

    class Auteur extends Utilisateur
    {
        public function role():string
        {
            return "auteur";
        }
    }