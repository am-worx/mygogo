<?php

// if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
// 	$id = $_POST["personId"];
// 	$newName = $_POST["personName"];
// 	$newTel = $_POST["personTel"];

// 	$file = "js/phonebook.json";
// 	$json = json_decode(file_get_contents($file));

// 	foreach($json as $item) {
// 	    if($item->id == $id)
// 	    {
// 	    		$item->name = $newName;
// 	    		$item->tel = $newTel;
// 	    }
// 	}

// 	file_put_contents($file, json_encode($json));
// } 



if ( $_SERVER['REQUEST_METHOD'] == 'PUT' ) {
	$id = $_POST["personId"];
	$newName = $_POST["personName"];
	$newTel = $_POST["personTel"];

	$file = "js/phonebook.json";
	$json = json_decode(file_get_contents($file));

	foreach($json as $item) {
	    if($item->id == $id)
	    {
	    		$item->name = $newName;
	    		$item->tel = $newTel;
	    }
	}

	file_put_contents("js/phonebook2.json", json_encode($json));
} 

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
	$file = "js/phonebook.json";
	$data = file_get_contents($file);
	header('Content-Type: application/json');
	echo $data;
}

?>