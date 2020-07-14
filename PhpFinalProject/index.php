<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <title>Velez Figueroa</title>
        <script type="text/javascript">
		var url = 'list.php?marca=';
                var urlWhatsApp = 'https://wa.me/51997702315?text='
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
                        
                        $.post("listPost.php", {marca: marca}, function(result){
                            var list = JSON.parse(result);
                            //var productList = '';
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
		footer{
			background-color: #f2f2f2;
			padding: 25px;
		}
	</style>
    </head>
    <body>
        <section class="main"id="overlay">
           <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">VF AUDITORES CONSULTORES SAC</a>
            </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Quiénes somos</a></li>
      <li><a href="#">Servicios</a></li>
      <li><a href="#">Contacto</a></li>
    </ul>
  </div>
</nav>
            <div class="container-main-description">
            <h1>Outsourcing Contable</h1>
            <h2>Servicios de contabilidad para empresas</h2>
            </div>
        </section>
        <?php
        // put your code here
        ?>
    </body>
</html>
