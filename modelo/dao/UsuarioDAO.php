<?php
require_once("dataSource.php");
require_once(__DIR__."/../entidad/Usuario.php");

class UsuarioDAO{
    public function autenticarUsuario($Email,$Password){
        $data_Source = new DataSource();
        $data_Table=$data_Source->ejecutarConsulta("SELECT * FROM usuario WHERE Email=:Email and Password=:Password",array(':Email'=>$Email,':Password'=>$Password));
        //$data_Table=$data_Source->consultar(" SELECT * FROM usuario WHERE email='$Email' and password='$Password'");
        $usuario=null;
        
        if(count($data_Table)==1){
            foreach($data_Table as $indice=>$valor){

            $usuario= new Usuario(
                $data_Table[$indice]["idusuario"],
                $data_Table[$indice]["nombre_completo"],
                $data_Table[$indice]["usuario"],
                $data_Table[$indice]["email"],
                $data_Table[$indice]["password"],
                $data_Table[$indice]["administrador"]);
            }
        }else{
            $usuario= new Usuario(
                1,
                "Deimer",
                "nota",
                "deimer@gmail.com",
                "contra",
                0);
            
        }
        return $usuario;
    }
    public function registrarUsuario(Usuario $usuario){
        $data_Source= new DataSource();
        $stmt1="INSERT INTO usuario VALUES (NULL,:nombre_completo,:usuario,:correo,:contrasena,:Administrador)";
        $resultado=$data_Source->ejecutarActulizacion($stmt1, array(':nombre_completo'=>$usuario->getnombre_completo(),
        ':usuario'=>$usuario->getusuario(),
        ':correo'=>$usuario->getEmail(),
        ':contrasena'=>$usuario->getPassword(),
        ':Administrador'=>$usuario->getAdministrador()));
        return $resultado;
    }
    public function VerUsuario(){
        $data_Source=new DataSource();
        $data_Table=$data_Source->ejecutarConsulta("SELECT * FROM usuario",NULL);
        $usuario=null;
        $usuarios=array();

        foreach($data_Table as $indice => $valor){
            $usuario=new Usuario(
                $data_Table[$indice]["id"],
                $data_Table[$indice]["nombre_completo"],
                $data_Table[$indice]["usuario"],
                $data_Table[$indice]["correo"],
                $data_Table[$indice]["contrasena"],
                $data_Table[$indice]["Administrador"]);
                array_push($usuarios,$usuario);            
        }
        return $usuario;
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
            $usuario=new Usuario(
            $data_Table[0]["id"],
            $data_Table[0]["nombre_completo"],
            $data_Table[0]["usuario"],
            $data_Table[0]["correo"],
            $data_Table[0]["contrasena"],
            $data_Table[0]["Administrador"]);
        }
        return $usuario;
    }
    public function editarUsuario($usuario){
        $data_Source=new DataSource();
        $stmt1="UPDATE usuario SET nombre_completo=:nombre_completo,usuario=:usuario,correo=:correo,contrasena=:contrasena,Administrador=:Administrador WHERE id=:idUsuario";
        $resultado=$data_Source->ejecutarActulizacion($stmt1, array('nombre_completo'=>$usuario->getnombre_completo(),
        'usuario'=>$usuario->getusuario(),
        'correo'=>$usuario->getEmail(),
        'contrasena'=>$usuario->getPassword(),
        'Administrador'=>$usuario->getAdministrador(),
        'idUsuario'=>$usuario->getId()));
        return $resultado;

    }
}
?>