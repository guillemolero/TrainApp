<?php


function connectDB(){
    
    try
    {
            $bdd = new PDO('mysql:host=localhost;dbname=trainapp;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    
    return $bdd;
    
}