<?php
    
    $arrProduct = null;
    session_start();
    if(!isset($_SESSION["products"])){
        $arrProduct = [
    ["id"=>1, "nom"=>"Audifonos Beat","mar"=>"marca C","pre"=>350,"can"=>10,"img"=>"0001.jpg"],
    ["id"=>2, "nom"=>"Iphone 11","mar"=>"marca C","pre"=>2010,"can"=>25,"img"=>"0002.jpg"],
    ["id"=>3, "nom"=>"Playstation","mar"=>"marca B","pre"=>1080,"can"=>28,"img"=>"0003.jpg"],
    ["id"=>4, "nom"=>"Kindle","mar"=>"marca C","pre"=>500,"can"=>35,"img"=>"0004.jpg"],
    ["id"=>5, "nom"=>"Lenovo laptop","mar"=>"marca A","pre"=>3000,"can"=>15,"img"=>"0005.jpg"],
    ["id"=>6, "nom"=>"Nintendo switch","mar"=>"marca B","pre"=>1800,"can"=>5,"img"=>"0006.jpg"],
    ["id"=>7, "nom"=>"Airpods","mar"=>"marca C","pre"=>500,"can"=>75,"img"=>"0007.jpg"],
            ];
    }else{
        $arrProduct = $_SESSION["products"];
    }
    
    $marca = "";
    if(isset($_POST["marca"])){
        $marca = $_POST["marca"];
    }

    if($marca != "")
    {
        $arrProduct = array_filter($arrProduct, function($array){ 
            global $marca;
            return (strpos($array["mar"], $marca) !== false); 
            
        });
    }

    echo json_encode($arrProduct);
    
?>
    
    
