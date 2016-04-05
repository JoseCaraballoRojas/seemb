<?php 

        /** clase para  realizar la conexion a la base de datos y procesar las consultas requeridas. **/
        class MySQL1{
                private $dbhost;
                private $dbusuario;
                private $dbclave;
                private $dbnombre;
                private $conexion;
                
                //se ejecuta la funcuncion costructor para cargar los valores a las variables.
                function __construct(){
                    $this->dbhost="localhost";
                    $this->dbusuario="seemb";
                    $this->dbclave="seemb";
                    $this->dbnombre="seemb";
                }

                //funcion para realizar la conexion con la base de datos.
                public function MySQL(){
                        
                        if (!isset($this->conexion)){
                                
                                $this->conexion=mysqli_connect($this->dbhost,$this->dbusuario,$this->dbclave,$this->dbnombre);
                                
                                 if (mysqli_connect_errno()) 
                                        {
                                        die('Error al conectar con mysql');
                                }
                        }

                }
                //funcion para realizar las CRUD acciones en la bases de datos.
                public  function consultar($sql)
                        {
                                /** se declara una variable a la que se le asigna la ejecucion de la consulta**/
                                $result=mysqli_query($this->conexion,$sql);
                                /** se comprueba que la variable tenga algun valor si no tiene se prensenta un mensaje de error**/
                                if(!$result)
                                { 
                                
                        echo "MySQL Error:".mysqli_error($this->conexion)."\n";
                        }       
                        else
                        {
                        /** se retorna el resultado de la consulta**/
                        return $result;
                        }
                        }
                //funcion para retornar lo valores en un array
                public  function busca_array($consulta)
                        {
                                return mysqli_fetch_array($consulta);
                        }
                //funcion para saber el numero de filas encontradas
                public function num_filas($consulta)
                {
                        return mysqli_num_rows($consulta);
                }

                //funcion para cerrar la conexion a la base de datos
                public function desconectar()
                        {
                                mysqli_close($this->conexion);
                        }


                        

                        

        }

        
 ?>
