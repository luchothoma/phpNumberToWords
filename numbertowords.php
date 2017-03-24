<?php
//
// Based at JAVA class shown here http://www.lawebdelprogramador.com/codigo/Java/338-Convertir-numeros-a-letras.html
// Migrated to be used with PHP, also added the use of cents
// Author: www.github.com/luchothoma  ||  luchothoma@gmail.com || www.LucianoThoma.xyz
// 
// use it as:
// $num = 12345.67;
// echo (new NumberToWords($num))->convert();
// "doce mil trescientos cuarenta y cinco pesos con sesenta y siete centavos"
// 
// MAX VALUE ACEPPTED IS: 99.999.9999,99 --AsFloatOfCourse--> 99999999.99
class NumberToWords {
	private $flag;
	public $numero;
	public $importe_parcial;
	public $num;
	public $num_letra;
	public $num_letras;
	public $num_letram;
	public $num_letradm;
	public $num_letracm;
	public $num_letramm;
	public $num_letradmm;
	
	public function __construct( $n = 0){
		$this->numero = floatval($n);
		$this->flag=0;
	}
	
	private function intdiv($a, $b){
		//Php version >= 7.0 contiene la operacion division entera, las versiones anteriores NO.
		// echo phpversion(); imprime '5.6.8' o nada si la extensión no está habilitada
    	if (phpversion()[0] == '7')
    	{
    		return intdiv($a,$b);
    	}
    	else
    	{
    		return (($a - $a % $b) / $b);
    	}
	}

	private function unidad($numero){
		
		switch ($numero){
		case 9:
				$this->num = "nueve";
				break;
		case 8:
				$this->num = "ocho";
				break;
		case 7:
				$this->num = "siete";
				break;
		case 6:
				$this->num = "seis";
				break;
		case 5:
				$this->num = "cinco";
				break;
		case 4:
				$this->num = "cuatro";
				break;
		case 3:
				$this->num = "tres";
				break;
		case 2:
				$this->num = "dos";
				break;
		case 1:
				if ($this->flag == 0)
					$this->num = "uno";
				else 
					$this->num = "un";
				break;
		case 0:
				$this->num = "";
				break;
		}
		return $this->num;
	}
	
	private function decena($numero){
	
		if ($numero >= 90 && $numero <= 99)
		{
			$this->num_letra = "noventa ";
			if ($numero > 90)
				$this->num_letra = $this->num_letra.("y ").($this->unidad($numero - 90));
		}
		else if ($numero >= 80 && $numero <= 89)
		{
			$this->num_letra = "ochenta ";
			if ($numero > 80)
				$this->num_letra = $this->num_letra.("y ").($this->unidad($numero - 80));
		}
		else if ($numero >= 70 && $numero <= 79)
		{
			$this->num_letra = "setenta ";
			if ($numero > 70)
				$this->num_letra = $this->num_letra.("y ").($this->unidad($numero - 70));
		}
		else if ($numero >= 60 && $numero <= 69)
		{
			$this->num_letra = "sesenta ";
			if ($numero > 60)
				$this->num_letra = $this->num_letra.("y ").($this->unidad($numero - 60));
		}
		else if ($numero >= 50 && $numero <= 59)
		{
			$this->num_letra = "cincuenta ";
			if ($numero > 50)
				$this->num_letra = $this->num_letra.("y ").($this->unidad($numero - 50));
		}
		else if ($numero >= 40 && $numero <= 49)
		{
			$this->num_letra = "cuarenta ";
			if ($numero > 40)
				$this->num_letra = $this->num_letra.("y ").($this->unidad($numero - 40));
		}
		else if ($numero >= 30 && $numero <= 39)
		{
			$this->num_letra = "treinta ";
			if ($numero > 30)
				$this->num_letra = $this->num_letra.("y ").($this->unidad($numero - 30));
		}
		else if ($numero >= 20 && $numero <= 29)
		{
			if ($numero == 20)
				$this->num_letra = "veinte ";
			else
				$this->num_letra = "veinti".($this->unidad($numero - 20));
		}
		else if ($numero >= 10 && $numero <= 19)
		{
			switch ($numero){
			case 10:

				$this->num_letra = "diez ";
				break;

			case 11:

				$this->num_letra = "once ";
				break;

			case 12:

				$this->num_letra = "doce ";
				break;

			case 13:

				$this->num_letra = "trece ";
				break;

			case 14:

				$this->num_letra = "catorce ";
				break;

			case 15:
			
				$this->num_letra = "quince ";
				break;
			
			case 16:
			
				$this->num_letra = "dieciseis ";
				break;
			
			case 17:
			
				$this->num_letra = "diecisiete ";
				break;
			
			case 18:
			
				$this->num_letra = "dieciocho ";
				break;
			
			case 19:
			
				$this->num_letra = "diecinueve ";
				break;
			
			}	
		}
		else
			$this->num_letra = $this->unidad($numero);

	return $this->num_letra;
	}	

	private function centena($numero){
		if ($numero >= 100)
		{
			if ($numero >= 900 && $numero <= 999)
			{
				$this->num_letra = "novecientos ";
				if ($numero > 900)
					$this->num_letra = $this->num_letra.($this->decena($numero - 900));
			}
			else if ($numero >= 800 && $numero <= 899)
			{
				$this->num_letra = "ochocientos ";
				if ($numero > 800)
					$this->num_letra = $this->num_letra.($this->decena($numero - 800));
			}
			else if ($numero >= 700 && $numero <= 799)
			{
				$this->num_letra = "setecientos ";
				if ($numero > 700)
					$this->num_letra = $this->num_letra.($this->decena($numero - 700));
			}
			else if ($numero >= 600 && $numero <= 699)
			{
				$this->num_letra = "seiscientos ";
				if ($numero > 600)
					$this->num_letra = $this->num_letra.($this->decena($numero - 600));
			}
			else if ($numero >= 500 && $numero <= 599)
			{
				$this->num_letra = "quinientos ";
				if ($numero > 500)
					$this->num_letra = $this->num_letra.($this->decena($numero - 500));
			}
			else if ($numero >= 400 && $numero <= 499)
			{
				$this->num_letra = "cuatrocientos ";
				if ($numero > 400)
					$this->num_letra = $this->num_letra.($this->decena($numero - 400));
			}
			else if ($numero >= 300 && $numero <= 399)
			{
				$this->num_letra = "trescientos ";
				if ($numero > 300)
					$this->num_letra = $this->num_letra.($this->decena($numero - 300));
			}
			else if ($numero >= 200 && $numero <= 299)
			{
				$this->num_letra = "doscientos ";
				if ($numero > 200)
					$this->num_letra = $this->num_letra.($this->decena($numero - 200));
			}
			else if ($numero >= 100 && $numero <= 199)
			{
				if ($numero == 100)
					$this->num_letra = "cien ";
				else
					$this->num_letra = "ciento ".($this->decena($numero - 100));
			}
		}
		else
			$this->num_letra = $this->decena($numero);
		
		return $this->num_letra;	
	}	

	private function miles($numero){
		if ($numero >= 1000 && $numero <2000){
			$this->num_letram = ("mil ").($this->centena($numero%1000));
		}
		if ($numero >= 2000 && $numero <10000){
			$this->flag=1;
			$this->num_letram = $this->unidad($this->intdiv($numero,1000)).(" mil ").($this->centena($numero%1000));
		}
		if ($numero < 1000)
			$this->num_letram = $this->centena($numero);
		
		return $this->num_letram;
	}		

	private function decmiles($numero){
		if ($numero == 10000)
			$this->num_letradm = "diez mil";
		if ($numero > 10000 && $numero <20000){
			$this->flag=1;
			$this->num_letradm = $this->decena($this->intdiv($numero,1000)).("mil ").($this->centena($numero%1000));		
		}
		if ($numero >= 20000 && $numero <100000){
			$this->flag=1;
			$this->num_letradm = $this->decena($this->intdiv($numero,1000)).(" mil ").($this->miles($numero%1000));		
		}
		
		
		if ($numero < 10000)
			$this->num_letradm = $this->miles($numero);
		
		return $this->num_letradm;
	}		

	private function cienmiles($numero){
		if ($numero == 100000)
			$this->num_letracm = "cien mil";
		if ($numero >= 100000 && $numero <1000000){
			$this->flag=1;
			$this->num_letracm = $this->centena($this->intdiv($numero,1000)).(" mil ").($this->centena($numero%1000));		
		}
		if ($numero < 100000)
			$this->num_letracm = $this->decmiles($numero);
		return $this->num_letracm;
	}		

	private function millon($numero){
		if ($numero >= 1000000 && $numero <2000000){
			$this->flag=1;
			$this->num_letramm = ("Un millon ").($this->cienmiles($numero%1000000));
		}
		if ($numero >= 2000000 && $numero <10000000){
			$this->flag=1;
			$this->num_letramm = unidad($this->intdiv($numero,1000000)).(" millones ").($this->cienmiles($numero%1000000));
		}
		if ($numero < 1000000)
			$this->num_letramm = $this->cienmiles($numero);
		
		return $this->num_letramm;
	}		
	
	private function decmillon($numero){
		if ($numero == 10000000)
			$this->num_letradmm = "diez millones";
		if ($numero > 10000000 && $numero <20000000){
			$this->flag=1;
			$this->num_letradmm = $this->decena($this->intdiv($numero,1000000)).("millones ").($this->cienmiles($numero%1000000));		
		}
		if ($numero >= 20000000 && $numero <100000000){
			$this->flag=1;
			$this->num_letradmm = $this->decena($this->intdiv($numero,1000000)).(" milllones ").($this->millon($numero%1000000));		
		}
		
		
		if ($numero < 10000000)
			$this->num_letradmm = $this->millon($numero);
		
		return $this->num_letradmm;
	}		

	private function decimales($parteDecimal)
	{
		return ( $parteDecimal > 0 ? 
			" con ".$this->decena($parteDecimal).($parteDecimal > 1 ?
													" centavos"
													:" centavo"
												)
			:"");
	}
	
	public function convert($monedaTipo = 'pesos'){
		$num = explode(",",number_format($this->numero, 2, ',', ''));
		$parteEntera = intval($num[0]);
		$parteDecimal = intval($num[1]);
		return ($parteEntera == 0 ? "cero" : $this->decmillon($parteEntera) ).' '.$monedaTipo.' '.$this->decimales($parteDecimal);
	} 	
}
?>