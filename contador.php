<?php
    include '../API/database.php';

    // conecta con la base de datos
    
   
    	$db = new DataBase();

   		$res = $db->query("SELECT * FROM `botellas`");//Realizo la consulta SQL

   		$botellas= mysqli_num_rows($res);
        // $botellas= 1001;	

        if($botellas >=1000){
            $botellas="Botella llena";
            header('Content-Type: application/json');
        
            echo json_encode(['botellas' => $botellas]);
        }
        else{
            header('Content-Type: application/json');
        
            echo json_encode(['botellas' => $botellas]);
        }

    


?>