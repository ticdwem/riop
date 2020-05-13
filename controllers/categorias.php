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
}

