<!DOCTYPE html>
<html lang="es">

<head>
  <title>Fisioscan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- FAVICON -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">
  <!-- ICOMOON -->
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <!-- OWL CAROUSEL -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- FLATICON -->
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <!-- ANIMATE ON SCROLL -->
  <link rel="stylesheet" href="css/aos.css">
  <!-- RANGESLIDER - CONTADOR DE POR QUE ELEGIRNOS -->
  <link rel="stylesheet" href="css/rangeslider.css">
  <!-- MAIN STYLESHEET -->
  <link rel="stylesheet" href="css/style.css">

  <!-- SCRIPT DEFER INIT -->
  <script defer src="js/jquery-3.3.1.min.js"></script>
  <script defer src="js/jquery-migrate-3.0.1.min.js"></script>
  <script defer src="js/jquery-ui.js"></script>
  <script defer src="js/popper.min.js"></script>
  <script defer src="js/bootstrap.min.js"></script>
  <script defer src="js/owl.carousel.min.js"></script>
  <script defer src="js/jquery.stellar.min.js"></script>
  <script defer src="js/jquery.countdown.min.js"></script>
  <script defer src="js/jquery.magnific-popup.min.js"></script>
  <script defer src="js/jquery.animateNumber.min.js"></script>
  <script defer src="js/jquery.waypoints.min.js"></script>
  <script defer src="js/aos.js"></script>
  <script defer src="js/rangeslider.min.js"></script>
  <script defer src="js/typed.js"></script>
  <script defer src="js/main.js"></script>

</head>

<body>

  <div class="site-wrap">
    <section id="home">

      <!-- MENU MOBILE HAMBURGUER -->
      <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <!-- HEADER -->
        <?php include 'header.php';?>

    </section>
  </div>

 


  <?php

  // Asigno variables a los datos que vienen del formulario
  $nombre =  $_POST["fname"];
  $apellido = $_POST["lname"];
  $email = $_POST["email"];
  $mensaje = $_POST["message"];

  $cuerpoMensaje = "Nombre: ".$nombre."<br>Apellido: ".$apellido."<br>Email: ".$email."<br>Mensaje: ".$mensaje; 

  $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
  $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $cabeceras .= 'From: Fisioscan Formulario <webmaster@fisioscan.com>' . "\r\n";


  // Configuro la funcion mail()
  $envio = mail("santiagobotalla@gmail.com", "Contacto Formulario Web", $cuerpoMensaje, $cabeceras);

  // Evaluar si el correo fue enviado
  if($envio == true){
    echo "Gracias por contactarnos";
  }else{
    echo "Hubo un error en el envio";
  }

  // Carga de datos a una base MySQL
  // Paso los parametros de conexión como variables de entorno

  $servername = getenv('FISIOSCAN_SERVER_NAME');
  $username = getenv('FISIOSCAN_USER_NAME');
  $password = getenv('FISIOSCAN_PASSWORD');
  $dbname = getenv('FISIOSCAN_DB_NAME');

  // Conexion MySQL
/*   $conexion = mysqli_connect("localhost", "root", "", "fisioscan") 
  or die("Error de conexion a la base de datos"); */

  $conexion = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conexion->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "INSERT INTO pacientes VALUES (0, '$nombre', '$apellido', 12, '$email', '$mensaje')";

if ($conexion->query($query) === TRUE) {
  echo "<br> Se ha almacenado su información en la base de pacientes";
} else {
  echo "Error: " . $query . "<br>" . $conexion->error;
}

$conexion->close();


/*   // Consulta MySQL
  $query = "INSERT INTO pacientes VALUES (0, '$nombre', '$apellido', 'edad', '$email', '121414123')";
  $consulta = mysqli_query($conexion, $query1);

  // Verificar si los datos se subieron a la base
  if($consulta == true){
    echo "Se guardaron los datos en la base de datos!";
  } */
  

  ?> 
  


  <div class="site-blocks-cover overlay" style="background-image: url(images/background1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-10">

          <div class="row justify-content-center mb-4">
            <div class="col-md-10 text-center">
              <h1 data-aos='fade-up' class='mb-5'>Gracias!<br> <span class='typed-words'></span></h1>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  

  <!-- FOOTER -->

  <section id=footer>
    <?php include 'footer.php';?>
  </section>
  </div>

  <script src="js/typed.js"></script>
  <script>
    var typed = new Typed('.typed-words', {
      strings: ["En breve te contestamos"],
      typeSpeed: 80,
      backSpeed: 80,
      backDelay: 4000,
      startDelay: 1000,
      loop: false,
      showCursor: true
    });
  </script>

  <script src="js/main.js"></script>

</body>

</html>