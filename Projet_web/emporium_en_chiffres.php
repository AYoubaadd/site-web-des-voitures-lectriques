<?php
    
            try{
                
                $pdo = new PDO("mysql:host=localhost;dbname=projet_site_web","root","");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $reqe = $pdo->query("SELECT count(*) FROM voitures " );
                
                $nbr_v = $reqe->fetch(PDO::FETCH_ASSOC);

                $res = $pdo->prepare("SELECT count(*) FROM clients ");
                $res->execute();
                $nbr_p = $res->fetch(PDO::FETCH_ASSOC); 



    // Sum of car prices
    $prixtout = "SELECT SUM(c.prix)
                FROM voitachat v
                JOIN voitures c ON v.idcar = c.idvoit";
    $reqeuuu = $pdo->prepare($prixtout);
    $reqeuuu->execute();
    $result = $reqeuuu->fetch(PDO::FETCH_ASSOC);
    $price = $result['total_prix'] ?? 0; // Default to 0 if no result


        // Sum of car purchases for the current date
        $prixjour = "SELECT SUM(c.prix) 
        FROM voitachat v
        JOIN voitures c ON v.idcar = c.idvoit
        WHERE v.date_achat = CURDATE()";
        $aaaa = $pdo->prepare($prixjour);
        $aaaa->execute();
        $resulte = $aaaa->fetch(PDO::FETCH_ASSOC);
        $total_prix = $resulte['SUM(c.prix)'] ?? 0;



                $Date = isset($_GET['date']) ? $_GET['date'] : '';
                $params = [];
                if (isset($_GET['choix'])) {
                if ($_GET['choix']=='Voiture'){
                $carSql = "SELECT v.idcar, v.idP, v.date_achat, COUNT(*) AS NbrCar, c.name 
                FROM voitachat v
                JOIN voitures c ON v.idcar = c.idvoit";

                if (!empty($Date)) {
                    $carSql .= " WHERE date_achat =:sdate ";
                
                    $params[':sdate'] = $Date;
                    
                }
                $carSql .= " GROUP BY v.idcar";
                $reqeu = $pdo->prepare($carSql);
                $reqeu->execute($params);
                $achat = $reqeu-> fetchAll(PDO::FETCH_ASSOC);
                }

                if ($_GET['choix']=='Personne'){
                    $carSql = "SELECT  v.idP, v.date_achat, COUNT(*) AS NbrCar, c.nom,c.prenom 
                    FROM voitachat v
                    JOIN clients c ON v.idP = c.id";
    
                    if (!empty($Date)) {
                        $carSql .= " WHERE date_achat =:sdate ";
                    
                        $params[':sdate'] = $Date;
                        
                    }
                    $carSql .= " GROUP BY v.idP";
                    $reqeu = $pdo->prepare($carSql);
                    $reqeu->execute($params);
                    $achat = $reqeu-> fetchAll(PDO::FETCH_ASSOC);
                    }
                }


            }catch(PDOException $e){
                echo "Ereeur :". $e->getMessage();
            }
        
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Emporium en Chiffres </title>
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
            height: 110%;
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
#ttt{
    position: absolute;
    background-color:white;
    margin-top: 450px;
    margin-left: 20%;
    width: 77%;
    border-radius: 10px;
    font-size:larger;
}
#totaldiv{
    position: absolute;
    background-color:white;
    margin-top: 150px;
    margin-left: 20%;
    border-radius: 10px;
    width:74%;
    height: 35%;
    padding: 15px 20px;
}
#nbrV{
    position: absolute;
    background-color:red;
    padding: 4px 10px;
    border-radius: 10px;
    width: 190px;
    height: 90px;
    margin-left: 15%;
    cursor: pointer;
}
#nbrV:hover{
    transform: translateY(-10px);
}
#nbrP{
    position: absolute;
    background-color:pink;
    padding: 4px 10px;
    border-radius: 10px;
    width: 190px;
    height: 90px;
    margin-left: 60%;
    cursor: pointer;
}
#nbrP:hover{
    transform: translateY(-10px);
}
body{
    background-color: rgba(128, 128, 128, 0.438);
}
#dec{
    position: relative;
    margin-top: 90%;
    margin-right: 80px;
    
}
#results{
    position: absolute;
    margin-top:600px;
    margin-left: 20%;
    background-color:white;
    width:77%;
    border-radius: 10px;
}
th{
    margin-left: 10px;
}
td {
    margin-left: 10px;
}
#chif{
    position: absolute;
    margin-left:20px;
    margin-top:-300px;
    
    width: 180px;
    font-size: larger;
}
.aa{
    margin-left: 20px;
}
#modi{
    position: absolute;
    margin-left:20px;
    margin-top:-90px;
    
    width: 250px;
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
    margin-left:40%;
    padding: 5px 2px;
    width:150px;
    cursor:pointer;
    background-color:#2c2cc48a;
    border-radius:15px;
    border:0;
    font-size: large;

}
#sub:hover{
    transform: translateY(-5px);
    box-shadow: 2px 6px 6px rgba(0, 0, 0, 0.9);
}
#totalPrix{
    position: absolute;
    background-color:green;
    padding: 4px 10px;
    border-radius: 10px;
    width: 190px;
    height: 90px;
    margin-left: 15%;
    cursor: pointer;
    margin-top:120px
}
#totalPrix:hover{
    transform: translateY(-10px);
}

#totalPrixjour{
    position: absolute;
    background-color:blue;
    padding: 4px 10px;
    border-radius: 10px;
    width: 190px;
    height: 90px;
    margin-left: 68%;
    cursor: pointer;
    margin-top:300px
}
#totalPrixjour:hover{
    transform: translateY(-10px);
}
table{
    width: 90%;
}
td{
    width:200px;
    text-align:center;
}
#azer a:active{
    background-color: white;
}
#logo{
    margin-left: 50px;
    margin-top: 10px;
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
</head>
<body>
<div id="id1"> <h3>Your welcome to the admin space </h3>
    <div>Daschboard</div>
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
<div id="totaldiv">
    Today's Data <br>
        <div id="nbrV">
            <p><b>Nombre des voitures </b> <i class="fa-solid fa-car"></i></p>
            <?php
    echo "<B>".$nbr_v['count(*)']."</B>";
    ?><br>
    **** **** **** **** ****
    </div>
            <div id="nbrP">
            <p><b>Nombre des personnes</b>  <i class="fa-solid fa-person"></i></p>
                <?php
            
    echo "<B>".$nbr_p['count(*)']."</B>";

    ?><br>
    **** **** **** **** ****
    </div>
                <div id="totalPrix">
            <p><b>Total </b> <i class="fa-solid fa-money-bill"></i></p>
                <?php
            echo "<B>".$result['SUM(c.prix)']." DH</B>";
    ?>
    <br>
    **** **** **** **** ****</div>
    </div>
    <div id="totalPrixjour">
            <p><b>Total de jour</b> <i class="fa-solid fa-money-bill"></i></p>
                <?php
            echo "<B>".$total_prix." DH</B>";
    ?>
    <br>
    **** **** **** **** ****</div>
    </div>
    
<form method="GET" action="">
    <div id="ttt">
        <span>Pour afficher les voitures vendu dans une date données <br></span>
        <span>Selectioner la date :</span>
    
    <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($Date); ?>"> <br><br>
    <span> Trier par:</span>
    <select name="choix" id="choix">
        <option value="Voiture" selected>Voiture</option>
        <option value="Personne">Clients</option>
    </select>

    <br><br>

    
    <button id="sub" type="submit" name="submit">Filter</button>
    </div>
</form>
<?php if (isset($_GET['choix'])): ?>
<?php if ($_GET['choix']=='Voiture'): ?>
<div id="results">
    
        
        <?php if (!empty($achat)): ?>
            <table >
            <tr>
                <th>Car ID</th>
                <th>Libelle</th>
                <th>nbre de voitures</th>
                <th>Date of Purchase</th>
            </tr>
            <?php foreach ($achat as $a): ?>
                <tr>
                    <td><?php echo htmlspecialchars($a['idcar']); ?></td>
                    <td><?php echo htmlspecialchars($a['name']); ?></td>
                    <td><?php echo htmlspecialchars($a['NbrCar']); ?></td>
                    <td><?php echo htmlspecialchars($a['date_achat']); ?></td>
                    
                </tr>
            <?php endforeach; ?>
            </table>
        <?php else: ?>
            <tr>
                <td colspan="3">No purchases found for the selected date.</td>
            </tr>
        <?php endif; ?>
        <?php endif; ?>


<?php if ($_GET['choix']=='Personne'): ?>
    <div id="results">
    
        
        <?php if (!empty($achat)): ?>
            <table>
            <tr>
                <th>#ID clients</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>nbre de voitures</th>
                
            </tr>
            <?php foreach ($achat as $a): ?>
                <tr>
                    <td><?php echo htmlspecialchars($a['idP']); ?></td>
                    <td><?php echo htmlspecialchars($a['nom']); ?></td>
                    <td><?php echo htmlspecialchars($a['prenom']); ?></td>
                    <td><?php echo htmlspecialchars($a['NbrCar']); ?></td>
                    
                    
                </tr>
            <?php endforeach; ?>
            </table>
        <?php else: ?>
            <tr>
                <td colspan="3">No purchases found for the selected date.</td>
            </tr>
        <?php endif; ?>
        <?php endif; ?>
        <?php endif; ?>
</div>
</body>
</html>