


<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="view/css/index.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="img/dino.png" />
    <title>Home</title>

   


    <!-- <script src="View/js/js_bootstrap"></script> -->
    <link href="View/css/index.css" rel="stylesheet" type="text/css" />
    <script src="View/js/index.js"></script>
    <link rel="shortcut icon" href="View/img/dino.png" />
    <title>Home</title>

</head>
<body>

         <!-- Modal de inicio de sesion -->
         
         <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-login">
                    <div class="modal-content">
                       
                      <div class="modal-header">

                        <h4 class="modal-title"> 
                        
                        	<!-- Cambia texto si estas conectado -->
                        	
                        	<?php 
                                session_start();
                                if(isset($_SESSION['email'])){
                                    echo  "¡Bienvenido ".$_SESSION["email"];
                                }else{
                                    echo "¡Bienvenidos a EMPRESAURIOS GAMING!";
                                }
                                
                            ?>
						</h4>

                        

                      </div>
                      <div class="modal-body">
                      
                        <!-- Logo que te envia al login -->
                        
                        <a href="View/login.html" ><img id="modal-img" src="View/img/empresauiros_logo.png" /></a><br><br>
                        Clicka en la imagen de arriba para empezar con tu experiencia gamer
                      </div>
                    </div>
                </div>
            </div>
            
	<!-- Navbar -->
	
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Logo -->
        <div class="logo_titulo">
            <img id="logo" src="View/img/empresauiros_logo.png" />
            <img id="titulo" src="View/img/title.png" />
        </div>
            
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
          
            <!-- Boton -->
            
            <li class="nav-item active">
              <a class="nav-link" href="#">Noticias <span class="sr-only">(current)</span></a>
            </li>
            
            <!-- Boton -->
            
            <li class="nav-item">
              <a class="nav-link" href="View/pago.html">Centro</a>
            </li>
            
            <!-- Dropdown -->
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                <!-- Cambia texto si estas conectado -->
                
                <?php 
                    
                    if(isset($_SESSION['email'])){
                        echo $_SESSION["email"];
                    }else{
                        
                        echo "Usuario";
                    }
                    
                ?>
                
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a id="logout" class="dropdown-item">Cerrar Sesión </a>
              </div>
            </li>
            
            <!-- Fin Dropdown -->
            
            <!-- Iconos de redes sociales -->
            
            <li class="redes nav-item">
              <img src="View/img/insta_icon.png" />
              <img src="View/img/twit_icon.png" />
              <img src="View/img/face_icon.png" />
            </li>
          </ul>         
        </div>
      </nav>
	  <!-- Fin navbar -->
	  
	  <!-- Carousel -->

      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="View/img/1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="View/img/2.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="View/img/3.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
       </div>
        
        <!-- Fin Carousel -->
        
        <!-- Texto -->
        
        <div class="midel-text">
        <b>¿QUÉ ES EMPRESAURIOS GAMING CENTER?</b><br>
        Empresaurios Gaming Center es la primera franquicia de centros de alto rendimiento en España,<br>
        un lugar único dedicado a los videojuegos competitivos donde los jugadores encontrarán <br>
        ordenadores de última generación y las mejores instalaciones para disfrutar de los deportes <br>
        electrónicos de manera profesional.
        </div>

        

		<!-- 3 textos en un div -->

        <div class="triple-text">
                    
            <img src="View/img/empresauiros_logo.png" />
                    
                <div class="text">
                    <b>GAMING</b><br>
                    Nuestro centro aúna todo lo que un gamer busca para su diversión y 
                    desarrollo; comunidad, ordenadores gaming de última generación, la 
                    mejor conexión a internet o los mismos periféricos que usan los profesionales.
                </div>
                <div class="text">
                    <b>COMPETICIÓN</b><br>
                    En Empresaurios encontrarás un lugar único donde desarrollar tus habilidades 
                    como jugador así como un rincón donde poder disputar y vivir la 
                    competición como nunca antes la habías experimentado.
                </div>
                <div class="text">
                    <b>E-SPORTS</b><br>
                    Los deportes electrónicos son el centro de nuestro modelo de negocio, 
                    si buscas vivir experiencias únicas, sensaciones nunca antes vividas, 
                    sentimientos que no sabías que existían.
                </div>
                    
                    <img src="View/img/empresauiros_logo.png" />
                    
            </div>

            <iframe src="https://www.youtube.com/embed/bwFRGcq2TJc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        
        
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
        <script src="View/js/index.js"></script>
    
</body>
</html>
