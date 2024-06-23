
<?php
if(isset($_GET['butt'])){
try {
    
    $pdo = new PDO("mysql:host=localhost;dbname=projet_site_web", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Initialize the SQL query
    $sql = "SELECT idvoit, discription, prix, name, catalogue FROM voitures WHERE afficher='oui'";
    $params = [];

    // Check if a car type is selected
    if (isset($_GET['categ']) && !empty($_GET['categ'])) {
        $sql .= " AND catalogue = :categ";
        $params[':categ'] = $_GET['categ'];
    }

    $reqe = $pdo->prepare($sql);
    $reqe->execute($params);
    $VOITURES = $reqe->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Erreur: " . $e->getMessage());
    echo "An error occurred while fetching the data. Please try again later.";
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
    <title>Modification</title>
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
#logo{
    margin-left: 50px;
    margin-top: 10px;
}
#id4{
    position: absolute;
    background-color: white;
    margin-left:20%;
    margin-top:200px;
    width: 77%;
    border-radius:10px;
}
table{
    position: relative;
    width: 95%;
}
#m{
    font-size:15px;
}
#n{
    font-size:15px;
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
#butt{
    width: 100px;
    height: 30px;
    border:0;
    margin-left:10px;
    background-color: #2c2cc48a;
    border-radius:20px;
    cursor:pointer;

}
#butt:hover{
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6);
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

    <div id="id4">
        <form method="GET" action="">
            <label for="categ">Select car type:</label>
            <select name="categ" id="categ">
                <option value="">All</option>
                <option value="Tesla" <?php if (isset($_GET['categ']) && $_GET['categ'] == 'Tesla') echo 'selected'; ?>>Tesla</option>
                <option value="BYD" <?php if (isset($_GET['categ']) && $_GET['categ'] == 'BYD') echo 'selected'; ?>>BYD</option>
                <option value="Audi" <?php if (isset($_GET['categ']) && $_GET['categ'] == 'Audi') echo 'selected'; ?>>Audi</option>
                <option value="Mercedes" <?php if (isset($_GET['categ']) && $_GET['categ'] == 'Mercedes') echo 'selected'; ?>>Mercedes</option>
                <option value="Xpeng" <?php if (isset($_GET['categ']) && $_GET['categ'] == 'Xpeng') echo 'selected'; ?>>Xpeng</option>
                <option value="Lucid" <?php if (isset($_GET['categ']) && $_GET['categ'] == 'Lucid') echo 'selected'; ?>>Lucid</option>
            </select>
            <button type="submit" name="butt" id="butt">Show Cars</button>
        </form>
        
        <div id="id5">
            
                
                <?php if (!empty($VOITURES)): ?>
                    <table id="tab">
                    <tr>
                    <th>#id</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Name</th>
                    <th>Catalogue</th>
                    <th>Modification</th>
                    <th>Supprimer</th>
                </tr>
                    <?php foreach ($VOITURES as $V): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($V['idvoit']); ?></td>
                            <td><?php echo htmlspecialchars($V['discription']); ?></td>
                            <td><?php echo htmlspecialchars($V['prix']); ?></td>
                            <td><?php echo htmlspecialchars($V['name']); ?></td>
                            <td><?php echo htmlspecialchars($V['catalogue']); ?></td>
                            <td id="mod"><a href="traitmodification.php?idvoit=<?php echo htmlspecialchars($V['idvoit']); ?>"><i id="m" class="fa-solid fa-gear"></i>Modify</a></td>
                            <td id="suprimer"><a href="deletevoit.php?idvoit=<?php echo htmlspecialchars($V['idvoit']); ?>"><i id="n" class="fa-solid fa-trash"></i>Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <tr>
                        <td colspan="7"><b>No cars found !!</b></td>
                    </tr>
                <?php endif; ?>
            
        </div>
    </div>
</body>
</html>
