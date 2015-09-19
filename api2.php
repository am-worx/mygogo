<?php

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
        echo $item->name;
        echo $item->tel;
    }
}

file_put_contents($file, json_encode($json));

?>