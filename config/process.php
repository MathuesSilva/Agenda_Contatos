<?php

session_start();

include_once("connection.php");
include_once("URL.php");

$data= $_POST;
//MODIFICAÇÂO NO BANCO
if(!empty($data)){



    //seleção de dados

    //Criar contato
    if($data["type"] === "create"){
        $name = $data["name"];
        $phone = $data["phone"];
        $observation = $data["observation"];

        $query = "INSERT INTO contacts (name, phone, observation) VALUES (:name, :phone, :observation)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observation", $observation);

     try{
          $stmt->execute();
          $_SESSION["msg"] = "Contato criado com sucesso!";

            
      }catch(PDOException $e){
                // erro de  conexão
            
                $error = $e->getMessage();
                echo "Erro: $error";
            }
                    //edit
    }else if($data["type"] === "edit"){

        $name = $data["name"];
        $phone = $data["phone"];
        $observation = $data["observation"];
        $id = $data["id"];

        $query = "UPDATE contacts
                    SET name= :name, phone = :phone, observation = :observation
                    WHERE id = :id";
                    
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name" , $name);
        $stmt->bindParam(":phone" , $phone);
        $stmt->bindParam(":observation" , $observation);
        $stmt->bindParam(":id" , $id);


        try{
            $stmt->execute();
            $_SESSION["msg"] = "Contato editado com sucesso!";
  
              
        }catch(PDOException $e){
                  // erro de  conexão
              
                  $error = $e->getMessage();
                  echo "Erro: $error";
              }



    }else if($data["type"] === "delete"){

        $id= $data["id"];

        $query = "DELETE FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id" , $id);

       

        try{
            $stmt->execute();
            $_SESSION["msg"] = "Contato deletado com sucesso!";
  
              
        }catch(PDOException $e){
                  // erro de  conexão
              
                  $error = $e->getMessage();
                  echo "Erro: $error";
              }

    }
// redirect HOME

header("location:" . $BASE_URL . "../index.php");

} else{
    $id;
    if(!empty($_GET)){
        $id = $_GET["id"];
    }
    //RETORNA O DADO DE UM CONTATO
    if(!empty($id)){
       $query = "SELECT * FROM contacts WHERE id = :id"; 
    
       $stmt = $conn->prepare($query);
    
       $stmt ->bindParam(":id", $id);
    
       $stmt ->execute();
    
       $contact = $stmt ->fetch();
    }
    
    //RETORNA OS CONTATOS
    $contacts = [];
    
    $query = "SELECT * FROM contacts";
    
    $stmt = $conn->prepare($query);
    
    $stmt->execute();
    
    $contacts = $stmt->fetchALL();
}

// FECHAR CONEXÂO

$conn = null;
