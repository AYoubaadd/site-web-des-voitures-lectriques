
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
                #id1{
    position: absolute;
    width: 77%;
    height: 12%;
    text-align: center;
    margin-top: 20px;
    color: black;
    margin-left: 20%;
    font-size:x-large;
    background-color: aliceblue;
    border-radius: 10px;
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
#heada:hover{
    width: 20%;
    transition: 1s;
}
#azer{
    display:flex;
    
    flex-direction: column;
    justify-content: flex-end;
    justify-content: center; 
    
    
    margin-right: 10px;
    height: 90%;
    
}


body{
    background-color: rgba(128, 128, 128, 0.438);
}
#dec{
    position: relative;
    margin-top: 90%;
    margin-right: 80px;
    
}
#chif{
    position: absolute;
    margin-left:20px;
    margin-top:-300px;
    
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
#dash{
    position: absolute;
    margin-left:20px;
    margin-top:140px;
    width: 200px;
    font-size: larger;
}
#logo{
margin-left: 50px;
    margin-top: 10px;
}


#id2{
    position: absolute;
    background-color: white;
    border-radius:10px;
    margin-top: 150px;
    margin-left:20%;
    width: 69%;
    height: 68%;
    padding: 20px 50px;
}
#id3{
    margin:20px ;
    font-size:x-large;
    color:#2c2cc48a;
}
#butt{
    background-color:#2c2cc48a;
    width: 200px;
    height: 40px;
    margin-left:38%;
    margin-top: 60px;
    font-size: large;
    border-radius: 15px;
    cursor:pointer;
    border:0;
}
#butt:hover{
    transform: translateY(-6px);
    box-shadow: 2px 6px 6px rgba(0, 0, 0, 0.9);
}
.sp li {
    font-size: larger;
}
.inputnv{
    position: absolute;
    margin-left: 40px;
}

/* General styles */
.aa {
    
    text-decoration: none;
    padding: 10px 15px;
    display: inline-block;
    transition: background-color 0.3s, color 0.3s;
    margin-top:15px;
}

.aa:hover {
    background-color: #555;
    color: #fff;
}




#azer {
    display: flex;
    gap: 15px;
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
    font-size:27px;
}

.aa {
    display: flex;
    align-items: center; /* Alignement vertical des éléments */
}

/* Marge entre l'icône et le texte */
.aa i {
    margin-right: 5px; /* Ajustez la marge selon vos préférences */
}
    </style>
    <title>Admin</title>
</head>
<body>
<div id="id1"> <h3>Your welcome to the admin space </h3>
    <div>Ajouter Voiture</div>
</div>
<div id="heada">
    <div id="logo"><i class="fa-solid fa-screwdriver-wrench"></i></div>

        <div id="azer">
        <div id="chif"><a class="aa" href="admin.php"><i class="fa-solid fa-plus"></i><span> Ajouter</span></a></div>
        <div id="modi"><a class="aa" href="modification.php"> <i class="fa-solid fa-pen"></i><span> Modification</span></a></div>
        <div id="dash"><a class="aa" href="emporium_en_chiffres.php"> <i class="fa-solid fa-chart-line"></i><span> Daschboard</span></a></div>
        <div id="dec"><a class="aa" href="deconexion_admin.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Deconexion</span></a></div>
        </div>
        </div>
    
    <div id="id2">
        <div id="id3">Ajouter voiture</div>
        <form action="admin.php" method="post" enctype="multipart/form-data">

            <span class="sp"><li> nom de voiture :</span><input type="text" class="inputnv" name="namev" id="nom"><br>
            <span class="sp"><li>Prix :</span><input type="number" class="inputnv" name="prixv" min="200000" id="pre"><br>
            <span class="sp"><li>Description :</span><textarea name="descV" id="descV" ></textarea><br>
            <span class="sp"><li>Catégorie :</span><select name="categ" id="categ">
                                <option value="Tesla" selected>Tesla</option> 
                                <option value="BYD">BYD</option>
                                <option value="Audi">Audi</option>
                                <option value="Mercedes">Mercedes</option>
                                <option value="Xpeng">Xpeng</option>
                                <option value="Lucid">Lucid</option>
                                </select><br>
            <span class="sp"><li>Importer l'image 1:</span><input type="file" name="image1" class="image"><br>
            <span class="sp"><li>Importer l'image 2:</span><input type="file" name="image2" class="image"><br>
            <span class="sp"><li>Importer l'image 3:</span><input type="file" name="image3" class="image"><br>
            <input type="submit" value="Ajouter" name="butt" id="butt">

        </form>
    </div>

</body>
</html>

<?php

    if(isset($_POST['butt']))
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=projet_site_web","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        $oui='oui';
        $reqe = $pdo->prepare("INSERT INTO voitures (discription, prix, image1, image2, image3, name,catalogue,afficher) values(:discription,:prix,:image1,:image2,:image3,:name,:catalogue,:affiche)");

        $reqe->bindParam(':discription', $_POST["descV"]);
        $reqe->bindParam(':prix', $_POST["prixv"]);
        $reqe->bindParam(':catalogue', $_POST["categ"]);
        $reqe->bindParam(':affiche',$oui );

            // Lire les données binaires de chaque image téléchargée
        $image1_data = file_get_contents($_FILES['image1']['tmp_name']);
        $image2_data = file_get_contents($_FILES['image2']['tmp_name']);
        $image3_data = file_get_contents($_FILES['image3']['tmp_name']);

        // Associer les données binaires avec les paramètres de la requête
        $reqe->bindParam(':image1', $image1_data, PDO::PARAM_LOB);
        $reqe->bindParam(':image2', $image2_data, PDO::PARAM_LOB);
        $reqe->bindParam(':image3', $image3_data, PDO::PARAM_LOB);

        $reqe->bindParam(':name', $_POST["namev"]);

        $reqe->execute();
        echo "<script>alert(Ajout avec succès)</script>";
        header("Locale:admin.php");
    }catch(PDOException $e){
        echo "Ereeur :". $e->getMessage();
    }
?>