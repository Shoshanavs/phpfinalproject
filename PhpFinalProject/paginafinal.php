<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi catalogo de productos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
	<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>	
        <script type="text/javascript" src="scripts.js"></script>
	<script type="text/javascript">
		var url = 'list.php?marca=';
                var urlWhatsApp = 'https://wa.me/51986140626?text='
		$(document).ready(function(){
                    var showProducts = function(marca){
                        /*$.getJSON(url+marca).done(function(response){
                            var productList = '';
                            $.each(response, function(index, prod){
                                    //console.log(index + '] ' + prod.nom);
                                    productList += '<div class="col-sm-4">';
                                    productList += '<p><b>' + prod.nom + '</b><br>' + prod.mar + '</p>';
                                    productList += '<img src="img/'+ prod.img + '" class="img-responsive" style="width:100%" />';
                                    productList += '<p>Precio:' + prod.pre + '</p>';
                                    productList += '<p>Cantidad:' + prod.can + '</p>';
                                    productList += '<button>Comprar</button><br><br>';
                                    productList += '</div>';
                            });
                            $('#products').html(productList);
                        });*/
                        
                        $.post("listpost.php", {marca: marca}, function(result){
                            var list = JSON.parse(result);
                            //var productList = '';
                            $('#products').empty();
                            $.each(list, function(index, prod){
                                
                                    //productList += '<div class="col-sm-4">';
                                    //productList += '<p><b>' + prod.nom + '</b><br>' + prod.mar + '</p>';
                                    //productList += '<img src="img/'+ prod.img + '" class="img-responsive" style="width:100%" />';
                                    //productList += '<p>Precio:' + prod.pre + '</p>';
                                    //productList += '<p>Cantidad:' + prod.can + '</p>';
                                    //productList += '<button>Comprar</button><br><br>';
                                    //productList += '</div>';
                                    
                                    var product = $("<div></div>");
                                    product.attr("class","col-sm-4");
                                    var prodContent = $("<p></p>");
                                    var prodContentTitle = $("<b></b>");
                                    prodContentTitle.html(prod.nom);
                                    
                                    var prodImg = $("<img></img>");
                                    prodImg.attr("src","img/"+prod.img);
                                    prodImg.attr("class","img-responsive");
                                    prodImg.attr("style","width:100%");
                                    
                                    var prodPrecio = $("<p></p>");
                                    prodPrecio.html("Precio:" + prod.pre);
                                    var prodCantidad = $("<p></p>");
                                    prodCantidad.html("Cantidad:" + prod.can);
                                    var prodButton= $("<button></button>");
                                    prodButton.html("Comprar");
                                    prodButton.attr("data-nombre",prod.nom);
                                    prodButton.click(function(){
                                        var nombre = $(this).data('nombre');
                                        window.open(urlWhatsApp + "Deseo el producto " + nombre);
                                    });
                                    
                                    prodContent.append(prodContentTitle, "<br>", prod.mar, "<br>", "Precio:" + prod.pre, 
                                        "<br>", "Cantidad:" + prod.can);
                                    product.append(prodContent, prodImg, prodButton,"<br><br>");
                                    product.appendTo('#products'); 
                                    
                            });
                        });
                    }
                    
                    $(".selMarca").click(function(){
                        var marca = $(this).data('marca');
                        showProducts(marca);
                    });
                    
                    showProducts('');
                    
		});
                
	</script>
	<style type="text/css">
		.navbar{
			margin-bottom: 0;
			border-radius: 0; 
		}
		footer{
			background-color: #f2f2f2;
			padding: 25px;
		}
	</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
            <a class="navbar-brand" href="paginafinal.php">Techomies</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"> 
                          <a class="nav-link" href="paginafinal.php">Inicio</a> 
                        </li>
                        <li class="nav-item"> 
                                <a class="nav-link" href='https://wa.me/51986140626?text='>Contacto</a> 
                        </li>
                    </ul>
            </div>
    </nav>
    <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Studio Wireless</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Siente La Música, No Los Cables.</p>
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href='https://wa.me/51986140626?text='>
                        <i class="fas fa-download mr-2"></i>
                        Comprar!
                    </a>
                </div>
            </div>
        </header>
    <div class="container-fluid bg-3 text-center">
        <h3>Catálogo</h3>
        <a href="#" class="selMarca" data-marca="A">Laptops</a> &nbsp;&nbsp; 
        <a href="#" class="selMarca" data-marca="B">Videojuegos</a> &nbsp;&nbsp; 
        <a href="#" class="selMarca" data-marca="C">Celulares y otros</a> &nbsp;&nbsp; 
        <br><br>
        <div id="products" class="row">

        </div>
    </div>

    <br><br>
<!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Somos Techomies</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ml-auto"><p class="lead">Somos el portal interdimensional de las compras. Queremos hacer tu vida más sencilla, tú solo preocúpate de encontrar al elegido entre nuestros megatones de productos.</p></div>
                    <div class="col-lg-4 mr-auto"><p class="lead">Tus compras son protegidas por el mismisimo olimpo. Tus compras entregadas a velocidad astronómicas. Visión de rayos X para checar tu pedido en tiempo real. Devoluciones fáciles y gratis.Tenemos todos los métodos de pago.</p></div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="">
                        <i class="fas fa-download mr-2"></i>
                        Ir a comprar!
                    </a>
                </div>
            </div>
        </section>
<!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Visítanos</h4>
                        <p class="lead mb-0">
                            2215 John Daniel Drive
                            <br />
                            Clark, MO 65243
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Contáctanos</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/1024px-Facebook_Logo_%282019%29.png"height="20px">
                        </a>
                       
                        <a class="btn btn-outline-light btn-social mx-1" href='https://wa.me/51986140626?text='><i class="fab fa-fw fa-dribbble"></i>
                            <img src="https://logodownload.org/wp-content/uploads/2015/04/whatsapp-logo-1-1.png"height="20px">
                        </a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Techomies</h4>
                        <p class="lead mb-0">
                            el portal interdimensional de las compras
                       
                        </p>
                    </div>
                </div>
            </div>
        </footer>
</body>
</html>

