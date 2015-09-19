<?php

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$id = $_POST["id"];
	$newName = $_POST["name"];
	$newTel = $_POST["tel"];

	$file = "js/phonebook.json";
	$json = json_decode(file_get_contents($file));

	foreach($json as $item) {
	    if($item->id == $id)
	    {
	    		$item->name = $newName;
	    		$item->tel = $newTel;
	    }
	}

	file_put_contents($file, json_encode($json));
} 



// if ( $_SERVER['REQUEST_METHOD'] == 'PUT' ) {
// 	$id = $_PUT->id;
// 	$newName = $_PUT->name;
// 	$newTel = $_PUT->tel;

// 	$req = json_decode($_PUT);
// 	$newName = $req->name;


// 	$file = "js/phonebook.json";
// 	$json = json_decode(file_get_contents($file));

// 	foreach($json as $item) {
// 	    if($item->id == 2)
// 	    {
// 	    		$item->name = $newName;
// 	    		$item->tel = $newTel;
// 	    }
// 	}

// 	file_put_contents("js/phonebook2.json", json_encode($json));
// } 

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
	$file = "js/phonebook.json";
	$data = file_get_contents($file);
	header('Content-Type: application/json');
	echo $data;
}

?>