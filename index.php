<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="jquery-3..1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="view/css/index.css" rel="stylesheet" type="text/css" />
    <script src="view/js/index.js"></script>
    <link rel="shortcut icon" href="img/dino.png" />
    <title>Home</title>

    <script>
    $( document ).ready(function() {
        $('#myModal').modal('toggle')
    });
    </script>

</head>
<body>
        <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-login">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Sign In</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="/examples/actions/confirmation.php" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="text" class="form-control" name="password" placeholder="Password" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">Sign In</button>
                                </div>
                                <p class="hint-text"><a href="#">Forgot Password?</a></p>
                            </form>
                        </div>
                        <div class="modal-footer">Don't have an account? <a href="#"> Create one</a></div>
                    </div>
                </div>
            </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       
        <div class="logo_titulo">
            <img id="logo" src="view/img/empresauiros_logo.png" />
            <img id="titulo" src="view/img/title.png" />
        </div>
            
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Noticias <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Centro</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Usuario
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Cerrar Sesión</a>
              </div>
            </li>
            <li class="redes nav-item">
              <img src="view/img/insta_icon.png" />
              <img src="view/img/twit_icon.png" />
              <img src="view/img/face_icon.png" />
            </li>
          </ul>         
        </div>
      </nav>


      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="view/img/1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="view/img/2.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="view/img/3.jpg" class="d-block w-100" alt="...">
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
        
        <div class="midel-text">
        <b>¿QUÉ ES EMPRESAURIOS GAMING CENTER?</b><br>
        Empresaurios Gaming Center es la primera franquicia de centros de alto rendimiento en España,<br>
        un lugar único dedicado a los videojuegos competitivos donde los jugadores encontrarán <br>
        ordenadores de última generación y las mejores instalaciones para disfrutar de los deportes <br>
        electrónicos de manera profesional.
        </div>

            <!-- <div class="triple-text row justify-content-center">
                <div class="col col-1">
                    <img src="img/empresauiros_logo.png" />
                </div>
                <div class="col col-3">
                    <b>GAMING</b><br>
                    Nuestro centro aúna todo lo que un gamer busca para su diversión y desarrollo; comunidad, ordenadores gaming de última generación, la mejor conexión a internet o los mismos periféricos que usan los profesionales.
                </div>
                <div class="col col-3">
                    <b>COMPETICIÓN</b><br>
                    En Elite encontrarás un lugar único donde desarrollar tus habilidades como jugador así como un rincón donde poder disputar y vivir la competición como nunca antes la habías experimentado.
                </div>
                <div class="col col-3 ">
                    <b>E-SPORTS</b><br>
                    Los deportes electrónicos son el centro de nuestro modelo de negocio, si buscas vivir experiencias únicas, sensaciones nunca antes vividas, sentimientos que no sabías que existían, Elite Gaming Center es tu centro de eSports.
                </div>
                <div class="col col-1 ">
                <img src="img/empresauiros_logo.png" />
                </div>
            </div> -->

        <div class="triple-text">
                    
            <img src="view/img/empresauiros_logo.png" />
                    
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
                    
                    <img src="view/img/empresauiros_logo.png" />
                    
            </div>

            <iframe src="https://www.youtube.com/embed/bwFRGcq2TJc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>
</html>