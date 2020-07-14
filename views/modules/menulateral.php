<div class="wrapper d-flex align-items-stretch">
<nav id="sidebar">
  <div class="custom-menu">
    <a href=""><button type="button" id="sidebarCollapse" class="btn btn-primary">
    </button></a>
  </div>
  <div class="img bg-wrap text-center py-4" style="background-image: url(<?=base_url?>images/logo.png);">
    <div class="user-logo">
    <div class="img" style="background-image: url(<?=base_url?>images/logo.png);"></div>
      <h3>Catriona Henderson</h3>
    </div>
  </div>
  <ul class="list-unstyled components mb-5">
    <li>
      <a href="<?=base_url?>downloadExcel"><span class="fa fa-download mr-2"><small class="d-flex align-items-center justify-content-center"></small></span> MODIFICAR POR CATEGORIA</a>
    </li>
    <li>
      <a href="<?=base_url?>updateDatos"><span class="fa fa-cloud-upload mr-2"></span>SUBIR CAMBIOS EXCEL</a>
    </li>
    <li>
      <a href="<?=base_url?>registro"><span class="fa fa-user-plus mr-2"></span>NUEVO USUARIO</a>
    </li>
    <li>
      <a href="#" id="close" data-id="<?=SED::encryption('usuario');?>"><span class="fa fa-sign-out mr-2"></span>CERRAR SESSION</a>
    </li>
  </ul>

</nav>