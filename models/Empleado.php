<?php

require_once "database.php";

class Empleado {


    static public function createEmpleados($tabla, $data)
    {

        $stmt = Conexion::db()->prepare("SELECT * FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $data['id'], PDO::PARAM_INT);
		$stmt ->execute(); 
        if ($stmt->rowCount() > 0) { 
            # code...


            $stmt = Conexion::db()->prepare("UPDATE $tabla SET fecha_ingreso = :fecha_ingreso, nombre = :nombre, salario = :salario, estado = 1 WHERE id = :id");

            $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
            $stmt->bindParam(":fecha_ingreso", $data["fecha_ingreso"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":salario", $data["salario"], PDO::PARAM_STR);
            
			if($stmt->execute()){

				return "ok";
	
			}else{
	
				return "error";
			
			}

        }
     
        else
         {

            $stmt = Conexion::db()->prepare("INSERT INTO $tabla(fecha_ingreso, nombre,salario,estado) 
            VALUES(:fecha_ingreso, :nombre, :salario,1)");
            
            $stmt->bindParam(":fecha_ingreso", $data["fecha_ingreso"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":salario", $data["salario"], PDO::PARAM_STR);
            //$stmt->bindParam(":estado", $data["estado"], PDO::PARAM_INT);
            if($stmt->execute()){

				return "ok";
	
			}else{
	
				return "error";
			
			}

        }
        $stmt->close();
        $stmt =null;

    }


    static public function contSolicitudes($tabla, $item)
    {
        
        if ($item != null) {
            # code...
            $stmt = Conexion::db()->prepare("SELECT COUNT(solicitud.id) AS solicitudes FROM $tabla JOIN solicitud ON $tabla.id = solicitud.empleado_id WHERE empleado_id = :id");
            $stmt -> bindParam(":id", $item, PDO::PARAM_INT);
            $stmt -> execute();
    
            return $stmt -> fetch();
        }
        

        $stmt->close();
        $stmt = null;


    }

    static public function showEmpleados($tabla, $item)
    {

        if ($item != null) {
            # code...
            $stmt = Conexion::db()->prepare("SELECT * FROM $tabla WHERE id = :id");
            $stmt -> bindParam(":id", $item, PDO::PARAM_INT);
            $stmt -> execute();
    
            return $stmt -> fetch();
        }
        else { //
           // $stmt = Conexion::db()->prepare("SELECT * FROM $tabla CROSS JOIN empleado ON empleado.id = solicitud.empleado_id");
           
            $stmt = Conexion::db()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();
    
            return $stmt -> fetchAll();
        } 

        $stmt->close();
        $stmt = null;
    }


    static public function deleteSoftEmpleado($tabla, $item)
    {
        $stmt = Conexion::db()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $item, PDO::PARAM_INT);
        $stmt -> execute();

		$stmt -> close();
		$stmt = null;
    }

 

}