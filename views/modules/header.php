<?php $especifDato = "";if(isset($_GET["n"])){$especifDato="../";}?>
    	<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top" itemscope itemtype="http://schema.org/HardwareStore">
  <div class="container">
    <a class="navbar-brand" href="#">
    <img src="<?php echo $especifDato; ?>images/logo1.png" width="50" height="50"  alt="ferretera" itemprop="legalName">Ferretera Rio Pisue&ntilde;a
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    	<ul class=" navbar-nav ml-auto" >
      <li>
            <div class="" id="animacion7">  <!--  -->
    	<a href="inicio" class="imagelog" itemprop="logo"><img src="<?php echo $especifDato; ?>images/logo1.png" alt="logo_roipizuena"></a>
    		</div>
      </li>
    		<li>	<div class="ferre" id="animacion6"> <a class="nav-link text-white " href="?p=inicio"></a></div></li>
    		</ul>
    <ul class="navbar-nav ml-auto ">
     <li class="nav-item">
    	 <a class="nav-link text-white" id="animacion8" href="tel://5558500140"><i class="fa fa-phone" aria-hidden="true" itemprop="telephone"></i> Tel: (55) 58-50-01-40
       </a>
       <p class="text-white text-center">Servicio a Domicilio</p>
     </li>
    </ul>
    <ul class="nav-stil navbar-nav ml-auto">
      <li class="nav-item  <?php echo $pagina == 'inicio' ? 'active': '';?>">
        <a class="nav-link" href="<?php echo $especifDato;?>inicio"><i class="fa fa-home" aria-hidden="true"></i> Inicio  |            </a>
      </li>
    	<li class="nav-item <?php echo $pagina == 'conocenos' ? 'active': '';?>">
    		<a class="nav-link" href="<?php echo $especifDato;?>conocenos"><i class="fa fa-question white" aria-hidden="true"></i> ¿Quienes Somos?  | </a>
    	</li>
      <li class="nav-item <?php echo $pagina == 'productos' ? 'active': '';?>">
        <a class="nav-link" href="<?php echo $especifDato;?>catalogo-productos"><i class="fa fa-wrench" aria-hidden="true"></i> Productos  | </a>
      </li>
      <li class="nav-item <?php echo $pagina == 'encuentranos' ? 'active': '';?>">
        <a class="nav-link" href="<?php echo $especifDato;?>encuentranos"><i class="fa fa-map-marker" aria-hidden="true"></i> Encuentranos  | </a>
      </li>
      <li class="nav-item  <?php echo $pagina == 'contacto' ? 'active': '';?>">
        <a class="nav-link" href="<?php echo $especifDato;?>contacto"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Contacto  | </a>
      </li>
     
              
    </ul>
    </div>
  <!--   <div class="imagf" id="animacion7">
    	<a href="inicio" class="imagelog" itemprop="logo"><img src="<?php echo $especifDato; ?>images/logo1.png" alt="logo_roipizuena"></a>
    		</div> -->
  </div>
</nav>