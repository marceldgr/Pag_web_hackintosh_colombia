<?php
require_once("dataSource.php");
require_once(__DIR__."/../entidad/Usuario.php");

class UsuarioDAO{
    public function autenticarUsuario($Email,$Password){
<<<<<<< HEAD
        //echo '  <script> alert("entro en dao"); </script>';
=======
        
>>>>>>> 159eed4193ef3bc980880d60deed445098270990
        $data_Source = new DataSource();
        $data_Table=$data_Source->ejecutarConsulta("SELECT * FROM usuario WHERE Password=:Password and (Email=:Email or Usuario=:Email )",array(':Email'=>$Email,':Password'=>$Password));
        
       
        $usuario=null;
        
        if(count($data_Table)==1){
            foreach($data_Table as $indice=>$valor){

            $usuario= new usuario(
                $data_Table[$indice]["id"],
                $data_Table[$indice]["Nombre"],
                $data_Table[$indice]["Apellido"],
                $data_Table[$indice]["Email"],
                $data_Table[$indice]["Usuario"],  
                $data_Table[$indice]["Password"],
                $data_Table[$indice]["Administrador"]);
            }
        }else{
                      
        }
        return $usuario;
    }
    public function registrarUsuario(Usuario $usuario){
        $data_Source= new DataSource();
        $stmt1="INSERT INTO usuario VALUES (NULL,:Nombre,:Apellido,:Email,:Usuario,:Password,:Administrador)";

        $resultado=$data_Source->ejecutarActulizacion($stmt1, array(
        ':Nombre'=>$usuario->getNombre(),
        ':Apellido'=>$usuario->getApellido(),
        ':Email'=>$usuario->getEmail(),
        ':Usuario'=>$usuario->getUsuario(),
        ':Password'=>$usuario->getPassword(),
        ':Administrador'=>$usuario->getAdministrador()));
        return $resultado;
    }
    public function VerUsuario(){
        $data_Source=new DataSource();
        $data_Table=$data_Source->ejecutarConsulta("SELECT * FROM usuario",NULL);
        $usuario=null;
        $usuarios=array();

        foreach($data_Table as $indice => $valor){
            $usuario=new usuario(
                $data_Table[$indice]["idUsuario"],
                $data_Table[$indice]["Nombre"],
                $data_Table[$indice]["Apellido"],
                $data_Table[$indice]["Email"],
                $data_Table[$indice]["Usuario"],
                $data_Table[$indice]["Password"],
                $data_Table[$indice]["Administrador"]);
                array_push($usuarios,$usuario);            
        }
        return $usuarios;
    }
    public function eliminarUsuario($idUsuario){
        $data_Source=new DataSource();
        $stmt1 = "DELETE FROM usuario WHERE id = :idUsuario";
        $resultado=$data_Source->ejecutarActulizacion($stmt1,array(':idUsuario'=>$idUsuario));
        return $resultado;
    }
    public function VerUsuarios_id($idUsuario){
        $data_Source=new DataSource();
        $data_Table=$data_Source->ejecutarConsulta("SELECT * FROM usuarios WHERE id = :idUsuario",array(':idUsuario'=>$idUsuario));
        $usuario=null;
        if(count($data_Table)==1){
            $usuario=new usuario(
            $data_Table[0]["id"],
            $data_Table[0]["Nombre"],
            $data_Table[0]["Apellido"],
            $data_Table[0]["Email"],
            $data_Table[0]["Usuario"],
            $data_Table[0]["Password"],
            $data_Table[0]["Administrador"]);
        }
        return $usuario;
    }
    public function editarUsuario($usuario){
        $data_Source=new DataSource();
        $stmt1="UPDATE usuario SET Nombre=:Nombre,Apellido=:Apellido,Usuario=:Usuario,Email=:Email,Password=:Password,Administrador=:Administrador WHERE id=:idUsuario";
        $resultado=$data_Source->ejecutarActulizacion($stmt1, array(
        'Nombre'=>$usuario->getNombre(),
        'Apellido'=>$usuario->getApellido(),
        'Email'=>$usuario->getEmail(),
        'Usuario'=>$usuario->getUsuario(),
        'Password'=>$usuario->getPassword(),
        'Administrador'=>$usuario->getAdministrador(),
        'idUsuario'=>$usuario->getId()));
        return $resultado;

    }
}
?>