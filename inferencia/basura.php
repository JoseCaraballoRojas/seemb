// se escoje un menu en caso de que sea el primer dia de la semana
if (!isset($menu_anterior)) {
	
	//agregar primer plato al menu
	$menu_generado[0]= Elegir_primer_plato($platos_disponibles);
	//agregar segundo plato al menu
	$menu_generado[1]= Elegir_segundo_plato($platos_disponibles);
	// agregar tercer plato al menu
 	//$menu_generado[2]= Elegir_tercer_plato($platos_disponibles);
 	//agregar ensalada al menu
 	$menu_generado[3]= Elegir_ensalada($platos_disponibles);
 	//agregar fruta al menu
 	$menu_generado[4]= Elegir_fruta($platos_disponibles);
 	//agregar bebida al menu
 	$menu_generado[5]= Elegir_bebida($platos_disponibles);
 	
 }


	//agregar primer plato al menu
	$menu_generado[0]= Elegir_primer_plato($platos_disponibles);
	//agregar segundo plato al menu
	//$menu_generado[1]= Elegir_segundo_plato($platos_disponibles);
	// agregar tercer plato al menu
 	$menu_generado[2]= Elegir_tercer_plato($platos_disponibles);
 	//agregar ensalada al menu
 	$menu_generado[3]= Elegir_ensalada($platos_disponibles);
 	//agregar fruta al menu
 	$menu_generado[4]= Elegir_fruta($platos_disponibles);
 	//agregar bebida al menu
 	$menu_generado[5]= Elegir_bebida($platos_disponibles);

