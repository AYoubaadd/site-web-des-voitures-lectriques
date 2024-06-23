
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Style.css" />
    <style>
        #login{
    position: absolute;
    margin: 10% 30%;
    padding: 1% 1%;
    justify-content: center;
    text-align: center;
    height: 50%;
    width: 40%;
    background-color:rgba(12, 10, 10, 0.678);
    box-shadow: 4px 4px 6px 0px rgba(0, 0, 0, 0.4);
    border-radius:20px;
    color:green;
}
#auth {
            background-image: url('images_acceuil/Acceuil4.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            width: 100%;
            height: 100vh; 
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
#log{
    color:white;
    font-size: xx-large;
}
    </style>
</head>
<body  id="auth" > 
    
    
    <div id="login">
        <form action="page_authentification.php" method="post">
            <div id="log">Sign in</div>
            <p class="textlog">login :</p><input type="text" id="inputlog"  name="username" class="inputl"><br>
            <p class="textlog">Mots de pass:</p><input type="password" id="inputpass" name="password" class="inputl"><br>
            <button type="submit" id="submitbutt" name="valider" onclick="isempty()">Valider</button><br>
            <input type="checkbox" name="check" value="checked">Se sevenir de moi?
        </form>
        <div id="vnvc">
            <a href="enregistrer.php"><sub>  vous n'avez pas de compte?</sub></a>
        </div>
    </div>

    <script>

        function isempty(){
            let login = document.getElementById('inputlog').value;
            let pass = document.getElementById('inputpass').value;
        
        if(login=="" && pass!="")alert("Entrer le login s'il vous plais");
        if(login!="" && pass=="")alert("Entrer le mots de pass s'il vous plais");
        if(login=="" && pass=="")alert("Entrer le login et le mots de passs'il vous plais");
    }
    </script>
</body>
</html>
<?php
if(isset($_POST['valider'])){

try {
    $pdo = new PDO("mysql:host=localhost;dbname=projet_site_web", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $reqe = $pdo->prepare("SELECT * FROM clients WHERE user_name = :username");

    $reqe->bindParam(':username', $_POST['username']);
    
    $reqe->execute();
    
    $lgne = $reqe->fetch(PDO::FETCH_ASSOC);

    if($_POST['username']=='admin' && password_verify($_POST['password'], $lgne['pass_word'])){
        header('Location:admin.php');
        exit();
    }

    if ($lgne && password_verify($_POST['password'], $lgne['pass_word'])) {

        session_start();
        
        $_SESSION['id'] = $lgne['id'];
        $_SESSION['nom'] = $lgne['nom'];
        $_SESSION['prenom'] = $lgne['prenom'];
        $_SESSION['email'] = $lgne['e-mail'];
        if(isset($_POST['check'])){
            setcookie('username',$_POST['username'],time()+365*24*3600,"/",null,isset($_SERVER['HTTPS']),true);
            setcookie('password',$_POST['password'],time()+365*24*3600,"/",null,isset($_SERVER['HTTPS']),true);
        }

        header("Location: Acceuil.php");
        exit();
    } else {
        echo '<script>alert(Nom d utilisateur ou mot de passe incorrect.) </script>';
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
}
?>
