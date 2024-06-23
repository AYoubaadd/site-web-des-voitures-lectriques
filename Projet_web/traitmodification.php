<?php

    if(isset($_GET['idvoit'])){
        try{
            
            $pdo = new PDO("mysql:host=localhost;dbname=projet_site_web","root","");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $reqe = $pdo->prepare("SELECT * FROM voitures WHERE idvoit=:voi");
            $reqe->bindParam(':voi',$_GET['idvoit']);
        
            $reqe->execute();

            $VOITURES=$reqe->fetch(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            echo "Ereeur :". $e->getMessage();
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Traitement Modification</title>
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
#sub{
    position: relative;
    margin-left:80px;
    padding: 5px 2px;
    width:100px;
    cursor:pointer;

}


#azer a:active{
    background-color: white;
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
    font-size:larger;
    color:#2c2cc48a;
}
#logo{
        margin-left: 50px;
        margin-top: 10px;
    }
.sp li {
    font-size: larger;
}
.inputnv{
    position: absolute;
    margin-left: 40px;
}
#butt{ 
    background-color:#2c2cc48a;
    width: 200px;
    height: 40px;
    margin-left:38%;
    margin-top: 15px;
    font-size: large;
    border-radius: 15px;
    cursor:pointer;
    border:0;
}
#butt:hover{
    transform: translateY(-6px);
    box-shadow: 2px 6px 6px rgba(0, 0, 0, 0.9);
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
    </style>
</head>
<body>
<div id="id1"> Your welcome to the admin space 
    <div>Modification</div>
</div>
<div id="heada">
    <div id="logo"><i class="fa-solid fa-screwdriver-wrench"></i></div>

        <div id="azer">
        <div id="chif"><a class="aa" href="admin.php"><i class="fa-solid fa-plus"></i><span>Ajouter</span></a></div>
        <div id="modi"><a class="aa" href="modification.php"> <i class="fa-solid fa-pen"></i><span> Modification</span></a></div>
        <div id="dash"><a class="aa" href="emporium_en_chiffres.php"> <i class="fa-solid fa-chart-line"></i><span> Daschboard</span></a></div>
        <div id="dec"><a class="aa" href="deconexion_admin.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Deconexion</span></a></div>
        </div>
        </div>

    
    <div id="id2">
        <div id="id3"><h2>Modification Voiture</h2></div>
        <form  action="" method="post" enctype="multipart/form-data">

            <input type="hidden" name="idvoit" value="<?php echo $_GET['idvoit']; ?>">
            <span class="sp"><li>Nom de voiture :</span><input type="text" class="inputnv" name="namev" id="nom" value="<?php echo $VOITURES['name']?>"><br>
            <span class="sp"><li>Prix :</span><input type="number" class="inputnv" name="prixv" min="200000" id="pre" value="<?php echo $VOITURES['prix']?>"><br>
            <span class="sp"><li>Description :</span><textarea name="descV" id="descV" ><?php echo $VOITURES['discription']?></textarea><br>
            <span class="sp"><li>Catégorie :</span><select name="categ" id="categ">
                                <option value="Tesla" <?php if( $VOITURES['catalogue']=='Tesla') echo 'selected'?>>Tesla</option> 
                                <option value="BYD" <?php if( $VOITURES['catalogue']=='BYD') echo 'selected'?>>BYD</option>
                                <option value="Audi" <?php if( $VOITURES['catalogue']=='Audi') echo 'selected'?>>Audi</option>
                                <option value="Mercedes" <?php if( $VOITURES['catalogue']=='Mercedes') echo 'selected'?>>Mercedes</option>
                                <option value="Xpeng" <?php if( $VOITURES['catalogue']=='Xpeng') echo 'selected'?>>Xpeng</option>
                                <option value="Lucid" <?php if( $VOITURES['catalogue']=='Lucid') echo 'selected'?>>Lucid</option>
                                </select><br>
            <span class="sp"><li>Importer l'image 1:</span><input type="file" name="image1" class="image" ><br>
            <span class="sp"><li>Importer l'image 2:</span><input type="file" name="image2" class="image"><br>
            <span class="sp"><li>Importer l'image 3:</span><input type="file" name="image3" class="image"><br>
            <input type="submit" value="Valider la modification" name="butt" id="butt">

        </form>
    </div>
    <
</body>
</html>
<?php
    if(isset($_POST['butt'])){
        try{
            echo $_POST['idvoit']; 
            $pdo = new PDO("mysql:host=localhost;dbname=projet_site_web","root","");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $reqe = $pdo->prepare("UPDATE  voitures SET name=:nam,prix=:pre,name=:nam, discription=:descr ,catalogue=:catalo, image1=im1:, image2=:im2, image3=:im3  WHERE idvoit=:voi");

            $reqe->bindParam(':voi',$_POST['idvoit']);
            $reqe->bindParam(':nam',$_POST['name']);
            $reqe->bindParam(':descr',$_POST['description']);
            $reqe->bindParam(':pre',$_POST['prix']);
            $reqe->bindParam(':catalo',$_POST['catalogue']);

            $image1_data = file_get_contents($_FILES['image1']['tmp_name']);
            $image2_data = file_get_contents($_FILES['image2']['tmp_name']);
            $image3_data = file_get_contents($_FILES['image3']['tmp_name']);

            $reqe->bindParam(':im1',$image1_data, PDO::PARAM_LOB);
            $reqe->bindParam(':im2',$image2_data, PDO::PARAM_LOB);
            $reqe->bindParam(':im3',$image3_data, PDO::PARAM_LOB);
        
            $reqe->execute();
            echo "<script>alert(Modification avec succès)</script>";
            header("Locale:modification.php");

        }catch(PDOException $e){
            echo 'Erreur'.$e->getMessage();
        }

    }



?>