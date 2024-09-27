<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="es"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylemenu.css">
    <title>Menu</title>
    
</head>

<body>
  <header>
    <div class="container" >
      <p class="msj">HECHO EN <br> MADERA</p>
      <nav>
        <a href="#"><svg width="15px" height="15px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g fill="none" fill-rule="evenodd" id="页面-1" stroke="none" stroke-width="1"> <g id="导航图标" transform="translate(-325.000000, -80.000000)"> <g id="编组" transform="translate(325.000000, 80.000000)"> <polygon fill="#FFFFFF" fill-opacity="0.01" fill-rule="nonzero" id="路径" points="24 0 0 0 0 24 24 24"></polygon> <polygon id="路径" points="22 7 12 2 2 7 2 17 12 22 22 17" stroke="#212121" stroke-linejoin="round" stroke-width="1.5"></polygon> <line id="路径" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="2" x2="12" y1="7" y2="12"></line> <line id="路径" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="12" x2="12" y1="22" y2="12"></line> <line id="路径" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="22" x2="12" y1="7" y2="12"></line> <line id="路径" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="17" x2="7" y1="4.5" y2="9.5"></line> </g> </g> </g> </g></svg> Productos</a>
        <a href="#"><svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 1C1.44772 1 1 1.44772 1 2C1 2.55228 1.44772 3 2 3H3.21922L6.78345 17.2569C5.73276 17.7236 5 18.7762 5 20C5 21.6569 6.34315 23 8 23C9.65685 23 11 21.6569 11 20C11 19.6494 10.9398 19.3128 10.8293 19H15.1707C15.0602 19.3128 15 19.6494 15 20C15 21.6569 16.3431 23 18 23C19.6569 23 21 21.6569 21 20C21 18.3431 19.6569 17 18 17H8.78078L8.28078 15H18C20.0642 15 21.3019 13.6959 21.9887 12.2559C22.6599 10.8487 22.8935 9.16692 22.975 7.94368C23.0884 6.24014 21.6803 5 20.1211 5H5.78078L5.15951 2.51493C4.93692 1.62459 4.13696 1 3.21922 1H2ZM18 13H7.78078L6.28078 7H20.1211C20.6742 7 21.0063 7.40675 20.9794 7.81078C20.9034 8.9522 20.6906 10.3318 20.1836 11.3949C19.6922 12.4251 19.0201 13 18 13ZM18 20.9938C17.4511 20.9938 17.0062 20.5489 17.0062 20C17.0062 19.4511 17.4511 19.0062 18 19.0062C18.5489 19.0062 18.9938 19.4511 18.9938 20C18.9938 20.5489 18.5489 20.9938 18 20.9938ZM7.00617 20C7.00617 20.5489 7.45112 20.9938 8 20.9938C8.54888 20.9938 8.99383 20.5489 8.99383 20C8.99383 19.4511 8.54888 19.0062 8 19.0062C7.45112 19.0062 7.00617 19.4511 7.00617 20Z" fill="#0F0F0F"></path> </g></svg> Compras</a>
        <a href="#"><svg width="15px" height="15px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>support</title> <rect width="24" height="24" fill="none"></rect> <path d="M12,2a8,8,0,0,0-8,8v1.9A2.92,2.92,0,0,0,3,14a2.88,2.88,0,0,0,1.94,2.61C6.24,19.72,8.85,22,12,22h3V20H12c-2.26,0-4.31-1.7-5.34-4.39l-.21-.55L5.86,15A1,1,0,0,1,5,14a1,1,0,0,1,.5-.86l.5-.29V11a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1v5H13.91a1.5,1.5,0,1,0-1.52,2H20a2,2,0,0,0,2-2V14a2,2,0,0,0-2-2V10A8,8,0,0,0,12,2Z"></path> </g></svg> Apoyo</a>
        <a href="logout.php">Cerrar Sesión</a>
      </nav>
      <p>Bienvenido, <?= htmlspecialchars($_SESSION['user_email']) ?>!</p>
    </div>
  </header>

    <section id="medio"> 
    <div class="container">
      <div class="logo"><img src="img/LogoMADEFER.png" alt="logo empresa">
      </div>
      <div class="contenido">
      <h1>M A D E F E R</h1>
      <p>
        Empresa dedicada a la fabricacion, comercializacion y diseño de productos artesanales en madera para uso personal cuyo fin es dar un toque extra a la manera de vestir 
      </p>
      <a href="#" target="_self"> <button>Conocenos...</button></a>
      </div>
    </div>
    </section>

    <section id="nuestros-productos">
      <h2>Nuestros Productos</h2>
      <div class="container">
        <div class="opc">
        <h3>ARETES</h3>
        <p>Desde su origen como amuletos de protección y símbolos de estatus social, hasta su uso actual como expresión de estilo y personalidad, los aretes tienen un impacto en la presencia de las personas</p>
        <a href="#" target="_self"><button>+ Info</button></a>
        </div>
      
        <div class="opc">
        <h3>PULSERAS</h3>
        <p>Una pulsera es un aro que se lleva en la muñeca para representar algo ante alguien. Las pulseras artesanales son importantes accesorios en la joyería y en la industria de la moda. Las pulseras artesanales pueden ser usadas para mostrar la importancia de algo significativo</p>
        <a href="#" target="_self"><button>+ Info</button></a>
        </div>
      
        <div class="opc">
        <h3>COLLARES</h3>
        <p>los collares suelen ser utilizados por mujeres. De todos modos, también existen los collares para hombres y los collares unisex. Las diferencias suelen estar centradas en el diseño y los materiales</p>
        <a href="#" target="_self"><button>+ Info</button></a>
        </div>
      </div>
     </section>

     <?php include 'partials/footer.php'; ?>

</body>
</html>