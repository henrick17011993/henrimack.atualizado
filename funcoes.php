<?php 

function conect(){
    return new PDO("mysql:host=localhost;dbname=cadeira","root","admin");
}

function show(){
    $conn = conect();
    $SQL = "SELECT * FROM henrimack";
    return $conn->query($SQL,PDO::FETCH_ASSOC)->fetchall();
}

                     // funçoes / insere=>banco de dado/delete/editar/banco de dados=>tabela

// bancodedados=>tabela

function BuscaDados($id) {
    $conn = conect();
    $SQL = "SELECT * FROM henrimack WHERE IDTIPO = :id";
    $query = $conn->prepare($SQL);
    $query->bindParam(":id", $id);
    $query->execute();
    return $query->fetchALL(PDO::FETCH_ASSOC)[0]; 
}

// html<=>bancodedados/editar

function editar ($post){
   
    $conn = conect();
    $SQL = "UPDATE henrimack 
            SET TIPO = :TIPO , MODELOS = :MODELOS , COR = :COR, VALOR = :VALOR 
            WHERE IDTIPO = :id";            
    $query = $conn->prepare($SQL);
    $query->bindParam(":id", $post["id"]);
    $query->bindParam(":TIPO", $post["tipo"]);
    $query->bindParam(":MODELOS", $post["modelos"]);
    $query->bindParam(":COR", $post["cor"]);
    $query->bindParam(":VALOR", $post["valor"]);
    $query->execute();
}




function Deleta($post){
    $conn = conect();
    $SQL ="DELETE FROM henrimack WHERE IDTIPO = :id";
    $query = $conn->prepare($SQL);
    $query->bindParam(":id", $post["id"]);
    $query->execute();  

}

// dados=>bancodedados

function insere($post){
    
    $conn = conect();
    $SQL = "INSERT INTO henrimack (TIPO, MODELOS, COR, VALOR)
            VALUES (:TIPO, :MODELOS, :COR, :VALOR)";

    $query = $conn->prepare($SQL);
    $query->bindParam(":TIPO", $post["tipo"]);
    $query->bindParam(":MODELOS", $post["modelos"]);
    $query->bindParam(":COR", $post["cor"]);
    $query->bindParam(":VALOR", $post["valor"]);
    $query->execute();
}

if (array_key_exists('funcao', $_GET))
    $_GET['funcao']($_POST); 
    
// if (property_exists('funcao', $_GET))
// $_GET['funcao']($_POST); 

// if (isset($_GET['funcao']))
//     $_GET['funcao']($_POST); 

// error_reporting=E_ALL & ~E_DEPRECATED & ~E_NOTICE  //php/php.ini