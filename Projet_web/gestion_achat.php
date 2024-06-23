<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if(isset($_GET['idv'])){
        session_start();
        $date_achat = date('Y-m-d H:i:s');
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=projet_site_web","root","");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $reqe = $pdo->prepare("INSERT INTO voitachat (idcar, idP, date_achat) VALUES (:idc,:client,:dstamp)");
            
            $reqe->bindParam(':idc', $_GET['idv']);
            $reqe->bindParam(':client', $_SESSION['id']);
            $reqe->bindParam(':dstamp', $date_achat);

            $reqe->execute();            
            header('Location: send_email.php');
        }catch(PDOException $e){
            echo "Erreur :". $e->getMessage();
        }

    }
}
?>