<?php
    if(isset($_GET['idvoit'])){
        try{
            
            $pdo = new PDO("mysql:host=localhost;dbname=projet_site_web","root","");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $reqe = $pdo->prepare("UPDATE voitures SET afficher='non' WHERE idvoit=:voi");
            $reqe->bindParam(':voi',$_GET['idvoit']);
        
            $reqe->execute();
            
            echo '<script>alert("La voiture a été supprimée");</script>';
            
            header('Refresh:1; modification.php');
            exit();
        }catch(PDOException $e){
            echo "Ereeur :". $e->getMessage();
        }
    }
?>