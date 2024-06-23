<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Vérifie si le paramètre choix est défini dans l'URL
    if (isset($_GET["choix"])) {
        
        // Récupère la valeur de choix
        $choix = $_GET["choix"];

        try{
            $pdo = new PDO("mysql:host=localhost;dbname=projet_site_web","root","");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $reqe = $pdo->prepare("SELECT * FROM voitures where catalogue=? and afficher='oui'");

            $reqe->execute([$choix]);

            $voiture = $reqe->fetchAll(PDO::FETCH_ASSOC);
            
            session_start();  



        }catch(PDOException $e){
            echo "Ereeur :". $e->getMessage();
        }

    }
}
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Catégorie</title>
    <style>
        #brand{
    position: absolute;
    background-color: aliceblue;
    margin-left: 23%;
    border-radius:20px;
    width: 72%;
    text-align: center;

}
        #heada{
            position: absolute;
            margin-left: -8px;
            margin-top: -7px;
            width: 10%;
            height: 100%;
            background-color: #2c2cc48a;
            box-shadow: 2px 6px 6px rgba(0, 0, 0, 0.9);
            cursor: pointer;
            transition: 1s;

}

#chif{
    position: absolute;
    margin-left:20px;
    margin-top:10px;
    
    width: 150px;
    font-size: larger;
}
.aa{
    margin-left: 20px;
}
#modi{
    position: absolute;
    margin-left:20px;
    margin-top:-100px;
    
    width: 200px;
    font-size: larger;
}
#dec{
    position: absolute;
    margin-top:300px;
    
    width: 200px;
    font-size: larger;
    margin-left:20px;
    margin-bottom: -200px;

}



#heada:hover{
    width: 20%;
    transition: 1s;
}
/* General styles */
.aa {
    
    text-decoration: none;
    padding: 10px 15px;
    display: inline-block;
    transition: background-color 0.3s, color 0.3s;
    margin-top:10px;
}

.aa:hover {
    background-color: #555;
    color: #fff;
}




#azer {
    display: flex;
    gap: 15px;
    
}
#azer{
    display:flex;
    
    flex-direction: column;
    justify-content: flex-end;
    justify-content: center; 
    
    
    margin-right: 10px;
    height: 90%;
    
}
#logo{
    margin-left: 50px;
    margin-top: 10px;
}



/* Hover effect */
#azer > div:hover .aa {
    background-color: #444;
}

/* Optional: For more interactive hover effect */
#azer > div::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    background-color: #fff;
    bottom: 0;
    left: 50%;
    transition: all 0.3s;
}

#azer > div:hover::after {
    width: 100%;
    left: 0;
}


.aa span {
    display: none;
}

/* Hover state: show text */
#heada:hover .aa span {
    display: inline;
    transition: 3s;
}
i{
    font-size:25px;
}

.aa {
    display: flex;
    align-items: center; /* Alignement vertical des éléments */
}

/* Marge entre l'icône et le texte */
.aa i {
    margin-right: 5px; /* Ajustez la marge selon vos préférences */
}

body{
    background-color: rgba(128, 128, 128, 0.438);
}
table{
    position: absolute;
    margin-left: 5%;
    width: 80%;
}

td {
    text-align:center;
}
#chif{
    position: absolute;
    margin-left:20px;
    margin-top:-300px;
    
    width: 150px;
    font-size: larger;
}


#id6{
    position: absolute;
    margin-left: 20%;
    margin-top:150px;
    
}
    </style>
</head>
<body>
<div id="brand">
            <h1>GreenDrive Emporium :</h1>
            <h2>Parcourez Notre Collection de Voitures Électriques</h2>

        </div>
        <div id="heada">
    <div id="logo"><i class="fa-solid fa-screwdriver-wrench"></i></div>

        <div id="azer">
        <div id="chif"><a class="aa" href="Acceuil.php"><i class="fa-solid fa-house"></i><span>Acceuil</span></a></div>
        <div id="modi"><a class="aa" href="mailto:addichaneayoub@gmail.com" target="_blank"> <i class="fa-solid fa-address-book"></i><span>CONTACTER-NOUS</span></a></div>
        
        <div id="dec"><a class="aa" href="deconexion_admin.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Deconexion</span></a></div>
        </div>
        </div>
        
        
        
        
        <div id="id6">
    <?php
    if (isset($_SESSION['prenom'])) 
    echo "<h3>"."Bienvenu, <i class=\"fa-solid fa-user\"></i>" . $_SESSION['prenom']." ".$_SESSION['nom']."</h3>";
    ?></div>
    <main id="mmmain">

    <div class="row">
        <?php foreach($voiture as $v): ?>
        <div class="col-md-5"> <!-- Utilisez col-md-6 pour que chaque carte occupe la moitié de la largeur sur les écrans moyens et plus grands -->
            <div class="card mb-3" id="card">
                <img id="dataimg" src="data:image/jpg;base64,<?php echo base64_encode($v['image1']);?>" class="card-img-top" alt="image voiture">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $v['name'] ?></h5>
                    <p class="card-text"><?php echo $v['discription'] ?></p>
                    <p class="card-text"><small class="text-body-secondary"><?php echo $v['prix'] ?> MAD</small> <div><a href="gestion_achat.php?idv=<?php echo $v['idvoit']?>">Acheter</a></div></p>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>

</main>
</body>
</html>