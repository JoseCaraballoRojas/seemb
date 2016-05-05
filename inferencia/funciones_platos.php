<?php
// FUNCION PARA ELEGIR DE TODOS LOS PLATOS DISPONIBLES LO DE TIPO PRIMER PLATO
function Elegir_primer_plato()
{
	$tipo="PRIMER PLATO";
	//se crea un objeto de la clase menu
	$busca_primer_plato= new Menu();
	//se recorre el array que posee todos lo platos disponibles en inventario
	foreach ($platos_disponibles as $v) {
		//se asigna en un nuevo array solo los platos de tipo primer plato
		$primeros_platos_disponibles[]=$busca_primer_plato->Buscar_plato($v,$tipo);
	}
	//se escoje aleatoriamente un plato de los que ya se habian filtrado anteriormente
	$plato_elegido1=$primeros_platos_disponibles[array_rand($primeros_platos_disponibles)];
	//se retorna el plato elegido 
	return $plato_elegido1;
}

// FUNCION PARA ELEGIR DE TODOS LOS PLATOS DISPONIBLES LO DE TIPO SEGUNDO PLATO
 function Elegir_segundo_plato()
{
	$tipo="SEGUNDO PLATO";
	//se crea un objeto de la clase menu
	$busca_segundo_plato= new Menu();
	//se recorre el array que posee todos lo platos disponibles en inventario
	foreach ($platos_disponibles as $v) {
		//se asigna en un nuevo array solo los platos de tipo segundo plato
		$segundos_platos_disponibles[]=$busca_segundo_plato->Buscar_plato($v,$tipo);
	}
	//se escoje aleatoriamente un plato de los que ya se habian filtrado anteriormente
	$plato_elegido2=$segundos_platos_disponibles[array_rand($segundos_platos_disponibles)];
	//se retorna el plato elegido 
	return $plato_elegido2;
}

// FUNCION PARA ELEGIR DE TODOS LOS PLATOS DISPONIBLES LO DE TIPO TERCER PLATO
 function Elegir_tercer_plato()
{
	$tipo="TERCER PLATO";
	//se crea un objeto de la clase menu
	$busca_tercer_plato= new Menu();
	//se recorre el array que posee todos lo platos disponibles en inventario
	foreach ($platos_disponibles as $v) {
		//se asigna en un nuevo array solo los platos de tipo tercer plato
		$terceros_platos_disponibles[]=$busca_tercer_plato->Buscar_plato($v,$tipo);
	}
	//se escoje aleatoriamente un plato de los que ya se habian filtrado anteriormente
	$plato_elegido3=$terceros_platos_disponibles[array_rand($terceros_platos_disponibles)];
	//se retorna el plato elegido 
	return $plato_elegido3;
}

// FUNCION PARA ELEGIR DE TODOS LOS PLATOS DISPONIBLES LO DE TIPO ENSALADA 
 function Elegir_ensalada()
{
	$tipo="ENSALADA";
	//se crea un objeto de la clase menu
	$busca_ensalada= new Menu();
	//se recorre el array que posee todos lo platos disponibles en inventario
	foreach ($platos_disponibles as $v) {
		//se asigna en un nuevo array solo los platos de tipo tercer plato
		$ensaladas_disponibles[]=$busca_ensalada->Buscar_plato($v,$tipo);
	}
	//se escoje aleatoriamente un plato de los que ya se habian filtrado anteriormente
	$ensalda=$ensaladas_disponibles[array_rand($ensaladas_disponibles)];
	//se retorna el plato elegido 
	return $ensalada;
}

// FUNCION PARA ELEGIR DE TODOS LOS PLATOS DISPONIBLES LO DE TIPO FRUTA 
 function Elegir_fruta()
{
	$tipo="FRUTA";
	//se crea un objeto de la clase menu
	$busca_fruta= new Menu();
	//se recorre el array que posee todos lo platos disponibles en inventario
	foreach ($platos_disponibles as $v) {
		//se asigna en un nuevo array solo los platos de tipo tercer plato
		$frutas_disponibles[]=$busca_fruta->Buscar_plato($v,$tipo);
	}
	//se escoje aleatoriamente un plato de los que ya se habian filtrado anteriormente
	$fruta=$frutas_disponibles[array_rand($frutas_disponibles)];
	//se retorna el plato elegido 
	return $fruta;
}

// FUNCION PARA ELEGIR DE TODOS LOS PLATOS DISPONIBLES LO DE TIPO BEBIDA 
 function Elegir_bebida()
{
	$tipo="BEBIDA";
	//se crea un objeto de la clase menu
	$busca_bebida= new Menu();
	//se recorre el array que posee todos lo platos disponibles en inventario
	foreach ($platos_disponibles as $v) {
		//se asigna en un nuevo array solo los platos de tipo tercer plato
		$bebidas_disponibles[]=$busca_bebida->Buscar_plato($v,$tipo);
	}
	//se escoje aleatoriamente un plato de los que ya se habian filtrado anteriormente
	$bebida=$bebidas_disponibles[array_rand($bebidas_disponibles)];
	//se retorna el plato elegido 
	return $bebida;
}
?>