<?php

function connect() {
	global $pdo;
	$pdo = new PDO("mysql:host=localhost;dbname=htmlcssj_sakila", "htmlcssj_root", "Keya5392");
}

function get_actors_by_last_name($letter) {
	global $pdo;

	$stmt = $pdo->prepare('
	SELECT actor_id, first_name, last_name 
	from actor
	WHERE last_name LIKE :letter
	LIMIT 50');

	$stmt->execute( array(':letter' => $letter . '%'));

	return $stmt->fetchAll( PDO::FETCH_OBJ );

}

function get_info_by_id($actor_id) {
	global $pdo;

	$stmt = $pdo->prepare('
	SELECT film_info, first_name, last_name 
	from actor_info
	WHERE actor_id LIKE :actor_id
	LIMIT 50');

	$stmt->execute( array(':actor_id' => $actor_id));

	return $stmt->fetchAll( PDO::FETCH_OBJ );

}