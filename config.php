<?php

//Infos de connexion à la base de données
define("DSN", "mysql:host=mysql-driifti.alwaysdata.net;dbname=driifti_formation;charset=utf8");
define("DB_USER", "driifti");
define("DB_PASS", "Driifti1993!");

//Liste des liens de la barre de navigation
$navbarLinks = [
    "Liste des personnes" => "personList",
    "Contact" => "contact",
    "Test PDO" => "pdo",
    "Produits" => "product"
];