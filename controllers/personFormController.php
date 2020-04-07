<?php

$isPosted = filter_has_var(INPUT_POST, "submit");

if($isPosted){
    //Récupération de la saisie
    $person = filter_input(INPUT_POST, "person", 
                            FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    $address = filter_input(INPUT_POST, "address", 
                            FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    //Insertion dans la base de données
    $pdo = getPDO();
    //Insertion de la personne
    $sql = "INSERT INTO persons (first_name, person_name, profession)
            VALUES (:firstName, :personName, :profession)";
    $statement = $pdo->prepare($sql);
    $statement->execute($person);
    //Récupération de l'identifiant de la nouvelle personne
    $personId = $pdo->lastInsertId();
    //Insertion de l'adresse
    $sql = "INSERT INTO addresses (address, zip_code, city, person_id)
            VALUES (:street, :zipcode, :city, :personId)";
    //Injection de l'id dans les données de la requête
    $address["personId"] = $personId;
    $statement = $pdo->prepare($sql);
    $statement->execute($address);
    //Redirection vers la liste des personnes
    header("location:/?age=personList");
}

$pageTitle = "Nouvelle personne";
$content = "../views/personForm.php";

require "../views/baseLayout.php";