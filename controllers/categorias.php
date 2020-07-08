<?php 
/**
 * 
 */
class LineaSublinea
{
	
	public function getCategoria()
	{
		require_once 'models/modeloBd.php';

		$where = "ORDER BY nombreLinea ASC";
		$linea = new ModeloBase();
		$query = $linea->conseguirTodos('linea',$where);
		foreach ($query as $linea) {
	?>
		<div class="form-check col-lg-6">
			<input type="radio" name="lineaPr" class="form-check-input" value="<?php echo $linea["idLinea"]; ?>">
			<label class="form-check-label" for="exampleCheck1"><?php echo $linea["nombreLinea"]?> </label>
		</div>
	<?php 
		}
	}

	public function mostrarSublineas($valTabla,$valTabla2,$valId){
		$tabla1 = $valTabla;
		$tabla2 = $valTabla2;
		$id = $valId;
		$subLn = new CatLineaSub();
		$querySub = $subLn->conseguirSublinea($tabla1,$tabla2,$id);
		if(!empty($querySub)){
			$result = array();
			foreach ($querySub as $sublinea) {
				$data = array(
					'idSubLn'    =>$sublinea["idSublinea"],
		            'nombre' => $sublinea["nombreSublinea"]	
	         	);
	         array_push($result,$data);
	    	}
	    	 header('Content-type: application/json; charset=utf-8');
	    	 echo json_encode($result);
	    	 exit();
	    	}else{
	    		echo 0;
	    	}
	}

	public function showbrand($marca){
		$validar = new Validacion();
		$val = $validar->pregmatchletras($marca);

		if($val != 1 || $val != 0){
			$val = strtolower($val);
			$marcas = new ModeloBase();
			$ver = $marcas->conseguirTodos($val);				
		
			foreach ($ver as $registros) {
				$retVal = ($val == "sublinea") ? $registros[2] : $registros[1] ;
				echo "<option value='".$registros[0]."'>".$retVal ."</option>";
			}

		}else{
			echo '<div class="alert alert-danger" role="alert">ALGO SALIO MAL. LLAMA AL ADMINISTRADOR</div>';
		}
	}
}

