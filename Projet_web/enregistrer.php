<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer</title>
    <link rel="stylesheet" type="text/css" href="Style.css" />
    <style>

#login{
    position: absolute;
    margin: 3% 30%;
    padding: 5px 1%;
    justify-content: center;
    text-align: center;
    height: 90%;
    width: 40%;
    background-color:rgba(12, 10, 10, 0.678);
    box-shadow: 4px 4px 6px 0px rgba(0, 0, 0, 0.4);
    border-radius:20px;
    color:green;
}
#auth {
            background-image: url('images_acceuil/Accueil1.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            width: 100%;
            height: 100vh; 
        }
#welcom{
    color:white;
    margin-top:3px;
    margin-left: 46%;
    font-size:xx-large;
}
.inputl{
    height: 30px;
    border-radius:15px;
}
#submitbutt{
    font-size: x-large;
    width: 150px;
    border-radius:20px;
    background-color:green;
    border:0;
}
#submitbutt:hover{
    transform: translateY(-5px);
    box-shadow: 2px 6px 6px rgba(0, 0, 0, 0.9);
}
    </style>
</head>
<body  id="auth">
    
    <h3 id="welcom"> Sign up </h3>
    <div id="login">
        <form action="enregistrer.php" method="post">
            <p class="textlog">Nom :</p><input type="text" id="inputNom" name="nom" class="inputl"><br>
            <p class="textlog">Prénom :</p><input type="text" id="inputprenom" name="prenom" class="inputl"><br>
            <p class="textlog">login :</p><input type="text" id="inputlog" name="login" class="inputl"><br> 
            <p class="textlog">e-mail :</p><input type="text" id="inputimail" name="e-mail" class="inputl"><br>           
            <p class="textlog">Mots de pass:</p><input type="password" name="motdepass" id="inputpass" class="inputl"><br>
            <p class="textlog">Verfier le mots de pass:</p><input type="password"  id="Verpass" class="inputl"><br>
            <button type="submit" id="submitbutt" name="submitbutt"onclick="isempty()">Enregistrer</button><br>

        </form>

    </div>

    <script>

        function isempty(){
            let login = document.getElementById('inputlog').value;
            let pass = document.getElementById('inputpass').value;
            let verpass = document.getElementById('Verpass').value;
            let inputNom = document.getElementById('inputNom').value;
            let inputprenom = document.getElementById('inputprenom').value;

        if(login=="" && pass!="")alert("Entrer le login s'il vous plais !!!");
        if(login!="" && pass=="")alert("Entrer le mots de pass s'il vous plais !!!");
        if(login=="" && pass=="")alert("Entrer le login et le mots de passs'il vous plais !!!");
        if(login!="" && pass!="" && verpass=="")alert("s'il vous plais verfier le mots de pass !!!");
        if(login!="" && pass!="" && verpass!=""){
            if(pass!=verpass)alert(" les mots de pass sont différent !!!");
        }
        if(inputNom=="" && inputprenom!="")alert("Entrer le nom s'il vous plais !!!");
        if(inputNom=="" && inputprenom=="")alert("Entrer le nom et le prenom s'il vous plais !!!");
        if(inputNom!="" && inputprenom=="")alert("Entrer le prenom s'il vous plais !!!");
    }
    </script>
</body>
</html>

<?php
    if(isset($_POST['submitbutt'])){
try {
    $pdo = new PDO("mysql:host=localhost;dbname=projet_site_web", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $reqe = $pdo->prepare("INSERT INTO clients (nom, prenom, `e-mail`, user_name, pass_word) VALUES (:nom, :prenom, :email, :user_name, :pass_word)");

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["e-mail"];
    $username = $_POST["login"];
    $hashed_password = password_hash($_POST["motdepass"], PASSWORD_DEFAULT);

    $reqe->bindParam(':nom', $nom);
    $reqe->bindParam(':prenom', $prenom);
    $reqe->bindParam(':email', $email);
    $reqe->bindParam(':user_name', $username);
    $reqe->bindParam(':pass_word', $hashed_password);

    $reqe->execute();

    // Redirection vers la page d'accueil
    header("Location: page_authentification.php");
    exit();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
}
?>