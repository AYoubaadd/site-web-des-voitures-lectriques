


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>GreenDrive Emporium</title>
    
    <style>
        main{
            background-image: url('images_acceuil/Acceuil7.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            width: 100%;
            
            height: 110vh; 
        }
        #id7{
            position: absolute;
            color:white;
            margin-left:39%;
            margin-top:18%;
        }
    </style>
</head> 
<body>
    <header>
        <div class="branding">
            <h1>GreenDrive Emporium :</h1>
            <h2>Parcourez Notre Collection de Voitures Électriques</h2>

        </div>
        <hr id="hrac">
        <div class="menu">
        
        <a id="menu1" href="#"><i class="fa-solid fa-list"></i>Catalogue</a>
        <div id="menucatal" class="hidden">
            <a class="cat" href="affichvoit.php?choix=Tesla"><li>Tesla</li></a>
            <a class="cat" href="affichvoit.php?choix=BYD"><li>BYD</li> </a>
            <a class="cat" href="affichvoit.php?choix=Audi"><li>Audi</li></a>
            <a class="cat" href="affichvoit.php?choix=Mercedes"><li>Mercedes</li></a>
            <a class="cat" href="affichvoit.php?choix=Xpeng"><li>Xpeng</li></a>
            <a class="cat" href="affichvoit.php?choix=Lucid"><li>Lucid</li></a>
        </div>
        <a id="menu2" href="Acceuil.php"><i class="fa-solid fa-house"></i>Acceuil</a>
        <a id="menu3" href="historique.php"><i class="fa-solid fa-clock-rotate-left"></i>Vous Achat</a>
        <a href="deconexion_admin.php"><i id="deco" class="fa-solid fa-arrow-right-from-bracket"></i>Deconexion</a>
        <a id="menu5" href="mailto:addichaneayoub@gmail.com" target="_blank">CONTACTER-NOUS</a>
        </div>
        
    </header>
    <?php
    session_start(); 
    if (isset($_SESSION['prenom'])) {
        echo "<h3>"."Bonjour,<i class=\"fa-solid fa-user\"></i> " . $_SESSION['prenom']." ".$_SESSION['nom'] ."</h3>"; 
    } else {
        echo "Bonjour, visiteur";
    }
?>

    <div id="icones">
        <div class="icon"><a class="lein"  href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f" ></i></a>
            <span> Facebook</span>
        </div>
        <div class="icon"><a class="lein" href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram" ></i></a>
            <span>Instagram</span>
        </div>
        <div class="icon"><a class="lein" href="https://api.whatsapp.com" target="_blank"><i class="fab fa-whatsapp" ></i></a>
            <span>Whatsapp</span>
        </div>
        <div class="icon"><a class="lein" href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in" ></i></a>
            <span>linkdIn</span>
        </div>
    </div>
    
    
        <div class="slider">
            
        

                
                <div class="slide">
                    <img src="images_acceuil\Accueil1.jpg" alt="image">
                </div>
        
                <div class="slide">
                    <img src="images_acceuil\Accueil2.jpg" alt="image">
                </div>
        
                <div class="slide">
                    <img src="images_acceuil\Acceuil3.jpg" alt="image">
                </div>
        
                <div class="slide">
                    <img src="images_acceuil\Acceuil4.jpg" alt="image">
                </div>
            
        

        </div>
        
        
        
<main>
    <div id="info_gene" class="infor">
        <b> Les voitures électriques </b>sont des véhicules qui utilisent des moteurs électriques ou des systèmes de propulsion électriques pour fonctionner, plutôt que des moteurs à combustion interne alimentés par des carburants fossiles comme l'essence ou le diesel. Voici quelques informations générales sur les voitures électriques et leur importance :
    </div>
    
    <div id="fonction" class="infor">
        <b> Fonctionnement :</b> Les voitures électriques utilisent des batteries rechargeables pour stocker l'électricité, qui est ensuite utilisée pour alimenter les moteurs électriques. Contrairement aux véhicules à essence, les voitures électriques n'émettent pas de gaz d'échappement lorsqu'elles fonctionnent
    </div>

    <div id="avantag" class="infor">
        <b> Avantages environnementaux : </b>Les voitures électriques contribuent à réduire les émissions de gaz à effet de serre et la pollution de l'air, car elles ne brûlent pas de carburants fossiles. Elles peuvent aider à atténuer les problèmes de qualité de l'air dans les zones urbaines et à lutter contre le changement climatique.
    </div>

    <div id="econo" class="infor">
        <b> Économies sur le long terme : </b>Bien que les voitures électriques puissent avoir un coût initial plus élevé que les voitures à essence, elles peuvent offrir des économies sur le long terme en termes de carburant et de coûts d'entretien. L'électricité est souvent moins chère que l'essence ou le diesel, et les moteurs électriques ont tendance à nécessiter moins d'entretien que les moteurs à combustion interne.
    </div>

    <div id="techno" class="infor">
        <b> Technologie émergente :</b> Les voitures électriques représentent une avancée majeure dans la technologie des transports. Les progrès dans les batteries, les systèmes de charge et les moteurs électriques ont rendu les véhicules électriques plus pratiques, plus abordables et plus attrayants pour les consommateurs.
    </div>

    <div id="diver" class="infor">
        <b>Diversité des modèles :</b>Le marché des voitures électriques propose désormais une variété de modèles, des petites voitures citadines aux SUV et aux véhicules de luxe. Cette diversité offre aux consommateurs plus d'options pour trouver un véhicule électrique qui répond à leurs besoins en termes de taille, de performances et de budget.
    </div>

    <footer>
        <div id="id7">
            © 2024 Copyright: Ayoub Addichane
        </div>
    </footer>
</main>


</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var radios = document.querySelectorAll('input[name="radiobtn"]');
        var slides = document.querySelectorAll('.slide');
        
        radios.forEach(function(radio, index) {
            radio.addEventListener('change', function() {
                slides.forEach(function(slide, slideIndex) {
                    slide.style.display = index === slideIndex ? 'block' : 'none';
                });
            });
        });
    });



    document.addEventListener('DOMContentLoaded', function() {
        var menuToggle = document.getElementById('menu1');
        var menu = document.getElementById('menucatal');
    
        menuToggle.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche le lien vide de suivre le lien par défaut
    
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    function updateSlide() {
        slides.forEach((slide, index) => {
            slide.style.display = index === currentIndex ? 'block' : 'none';
        });
    }

    updateSlide(); // Affiche la première image au chargement de la page

    function nextSlide() {
        if (currentIndex < totalSlides - 1) {
            currentIndex++;
        } else {
            currentIndex = 0; // Réinitialise à zéro pour boucler
        }
        updateSlide();
    }

    // Défilement automatique toutes les 3 secondes
    setInterval(nextSlide, 3000);
});


</script>