    	<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top" itemscope itemtype="http://schema.org/HardwareStore">
  <div class="container">
    <a class="navbar-brand text-white" href="#">
    <img src="<?=base_url?>images/logo1.png" class="text-white" width="50" height="50"  alt="ferretera" itemprop="legalName">Ferretera Rio Pisue&ntilde;a
    </a>
    <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    	<ul class=" navbar-nav ml-auto" >
      <li>
        <div class="" id="animacion7"> 
    	<a href="inicio" class="imagelog text-white" itemprop="logo"><img src="<?=base_url?>images/logo1.png" alt="logo_roipizuena"></a>
    		</div>
      </li>
    		<li>	<div class="ferre" id="animacion6"> <a class="nav-link text-white" href="?p=inicio"></a></div></li>
    		</ul>
    <ul class="navbar-nav ml-auto ">
     <li class="nav-item">
    	 <a class="nav-link text-white text-center" id="animacion8" href="tel://5558500140"><i class="fa fa-phone" aria-hidden="true" itemprop="telephone"></i> Tel: (55) 58-50-01-40
       </a>
       <p class="nav-link text-white text-center"><img src="<?=base_url?>images/whats-app-logo.png" alt="contacto" id="" width="20" height="20"> <a href="https://wa.link/30zod7" class="text-white"> 55.91.99.62.45</p></a>
       <p class="ser-dom-txt text-white text-center">Servicio a Domicilio</p>
        <p class="ser-dom-txt2 text-white text-center">A partir de $1,000.00 mx </p>
     </li>
    </ul>
    <ul class="nav-stil navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url?>inicio"><i class="fa fa-home" aria-hidden="true"></i> Inicio         </a>
      </li>
        <li class="nav-item ">
        <a class="nav-link animated pulse infinite" href="<?=base_url?>catalogo-productos"><i class="fa fa-wrench " aria-hidden="true"></i> Nuestros Productos </a>
      </li>
    	<li class="nav-item ">
    		<a class="nav-link" href="<?=base_url?>conocenos"><!-- <i class="fa fa-question white" aria-hidden="true"></i>  -->¿Quienes Somos?   </a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=base_url?>contacto"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ventas a Industrias  </a>
      </li>
      <?php $stats = Utls::statCarrito();?>
      <li class="nav-item shopping">
        <a href="<?=base_url?>catalogo">
          <i class="fas fa-shopping-cart fa-2x"></i>
          <div class="circulo" id="circulo"><p><?=$stats['count'];?></p></div>
        </a>
      </li>
     
              
    </ul>
    </div>
  <!--   <div class="imagf" id="animacion7">
    	<a href="inicio" class="imagelog" itemprop="logo"><img src="<?php //echo $especifDato; ?>images/logo1.png" alt="logo_roipizuena"></a>
    		</div> -->
  </div>
</nav>