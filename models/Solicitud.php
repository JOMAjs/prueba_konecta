<?php

require_once "database.php";

class Solicitud {

    static public function createSolicitud($tabla, $data)
    {

        $stmt = Conexion::db()->prepare("SELECT * FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $data['id'], PDO::PARAM_INT);
		$stmt ->execute(); 
        if ($stmt->rowCount() > 0) { 
            # code...

            $stmt = Conexion::db()->prepare("UPDATE $tabla SET codigo = :codigo, descripcion = :descripcion, resumen = :resumen, empleado_id = :empleado_id WHERE  id = :id");

            $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
            $stmt->bindParam(":codigo", $data["codigo"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $data["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":resumen", $data["resumen"], PDO::PARAM_STR);
            $stmt->bindParam(":empleado_id", $data["empleado_id"], PDO::PARAM_INT);
            
			if($stmt->execute()){

				return "ok";
	
			}else{
	
				return "error";
			
			}

        }
     
        else
         {

            $stmt = Conexion::db()->prepare("INSERT INTO $tabla (codigo, descripcion,resumen,empleado_id) 
            VALUES(:codigo, :descripcion, :resumen, :empleado_id)");
            
            $stmt->bindParam(":codigo", $data["codigo"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $data["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":resumen", $data["resumen"], PDO::PARAM_STR);
            $stmt->bindParam(":empleado_id", $data["empleado_id"], PDO::PARAM_INT);

            if($stmt->execute()){

				return "ok";
	
			}else{
	
				return "error";
			
			}

        }
        $stmt->close();
        $stmt =null;

    }


    static public function showSolicitud($tabla, $item)
    {

        if ($item != null) {
            # code...
            $stmt = Conexion::db()->prepare("SELECT * FROM $tabla WHERE id = :id");
            $stmt -> bindParam(":id", $item, PDO::PARAM_INT);
            $stmt -> execute();
    
            return $stmt -> fetch();
        }
        else {
            $stmt = Conexion::db()->prepare("SELECT solicitud.id as soli, empleado.nombre, solicitud.codigo,solicitud.descripcion,solicitud.resumen FROM $tabla JOIN empleado ON empleado.id = $tabla.empleado_id");

            $stmt -> execute();
    
            return $stmt -> fetchAll();
        } 

        $stmt->close();
        $stmt = null;
    }


    static public function deleteSoftSolicitud($tabla, $item)
    {
        $stmt = Conexion::db()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $item, PDO::PARAM_INT);
        $stmt -> execute();

		//$stmt -> close();
		$stmt = null;
    }

 

}