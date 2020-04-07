<?php

//Récupérattion de l'id de la personne à supprimer
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//Récuperation de l'instance de PDO
$pdo = getPDO();

//Suppression des adresses de la personnes
$sql = "DELETE FROM addresses WHERE person_id = ?";

//Préparation de la requête
$statement = $pdo->prepare($sql);

//Exécution de la requête en passant le paramètre
$statement->execute([$id]);

//Suppression de la personnes
$sql = "DELETE FROM persons WHERE person_id = ?";

//Préparation de la requête
$statement = $pdo->prepare($sql);

//Exécution de la requête en passant le paramètre
$statement->execute([$id]);

//Redirection vers la liste des personnes
header("location:/?page=personList");