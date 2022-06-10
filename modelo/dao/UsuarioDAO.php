<?php
require_once("dataSource.php");
require_once(__DIR__."/../entidad/Usuario.php");

class UsuarioDAO{
    public function autenticarUsuario($Email,$Password){
        //echo '  <script> alert("entro en dao"); </script>';
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
                $data_Table[$indice]["Img_perfil"],
                $data_Table[$indice]["Administrador"],
                $data_Table[$indice]["Estado"]);
            }
        }else{
                      
        }
        return $usuario;
    }
    public function registrarUsuario(Usuario $usuario){
        $data_Source= new DataSource();
        $stmt1="INSERT INTO usuario VALUES (NULL,:Nombre,:Apellido,:Usuario,:Email,:Password,:Img_perfil,:Administrador,:Estado)";

        $resultado=$data_Source->ejecutarActulizacion($stmt1, array(
        ':Nombre'=>$usuario->getNombre(),
        ':Apellido'=>$usuario->getApellido(),
        ':Email'=>$usuario->getEmail(),
        ':Usuario'=>$usuario->getUsuario(),
        ':Password'=>$usuario->getPassword(),
        ':Img_perfil'=>$usuario->getImg_perfil(),
        ':Administrador'=>$usuario->getAdministrador(),
        ':Estado'=>$usuario->getEstado()));
        
        return $resultado;
    }
    public function VerUsuario(){
        $data_Source=new DataSource();
        $Estado=1;
        $data_Table=$data_Source->ejecutarConsulta("SELECT * FROM usuario WHERE Estado=:Estado",array(':Estado'=>$Estado));
        $usuario=null;
        $usuarios=array();

        foreach($data_Table as $indice => $valor){
            $usuario=new usuario(
                $data_Table[$indice]["id"],
                $data_Table[$indice]["Nombre"],
                $data_Table[$indice]["Apellido"],
                $data_Table[$indice]["Email"],
                $data_Table[$indice]["Usuario"],  
                $data_Table[$indice]["Password"],
                $data_Table[$indice]["Img_perfil"],
                $data_Table[$indice]["Administrador"],
                $data_Table[$indice]["Estado"]);
                array_push($usuarios,$usuario);            
        }
        return $usuarios;
    }
    public function eliminarUsuario($idUsuario){
        $data_Source=new DataSource();
        $Estado=0;
        $stmt1 = "UPDATE usuario SET Estado=:Estado WHERE id=:idUsuario";
        $resultado=$data_Source->ejecutarActulizacion($stmt1,array(':idUsuario'=>$idUsuario,':Estado'=>$Estado));
        return $resultado;
    }
    public function VerUsuarios_id($idUsuario){
        $data_Source=new DataSource();
        $data_Table=$data_Source->ejecutarConsulta("SELECT * FROM usuario WHERE id = :idUsuario",array(':idUsuario'=>$idUsuario));
        $usuario=null;
        if(count($data_Table)>0){
            $usuario=new usuario(
                $data_Table[0]["id"],
                $data_Table[0]["Nombre"],
                $data_Table[0]["Apellido"],
                $data_Table[0]["Email"],
                $data_Table[0]["Usuario"],  
                $data_Table[0]["Password"],
                $data_Table[0]["Img_perfil"],
                $data_Table[0]["Administrador"],
                $data_Table[0]["Estado"]);
        }
        return $usuario;
    }
    public function editarUsuario($usuario){
        $data_Source=new DataSource();
        $stmt1="UPDATE usuario SET Nombre=:Nombre,Apellido=:Apellido,Usuario=:Usuario,Email=:Email,Password=:Password,Administrador=:Administrador,
        Img_perfil=:Img_perfil WHERE id=:idUsuario";
        $resultado=$data_Source->ejecutarActulizacion($stmt1, array(
        'Nombre'=>$usuario->getNombre(),
        'Apellido'=>$usuario->getApellido(),
        'Email'=>$usuario->getEmail(),
        'Usuario'=>$usuario->getUsuario(),
        'Password'=>$usuario->getPassword(),
        'Img_perfil'=>$usuario->getImg_perfil(),
        'Administrador'=>$usuario->getAdministrador(),
        'idUsuario'=>$usuario->getId()));
        return $resultado;

    }
    public function VerUsuario_Por_email($Email){
        $data_Source=new DataSource();
        $usuario=null;
        $data_Table= $data_Source->ejecutarConsulta("SELECT * FROM usuario WHERE email=:Email",array(':Email'=>$Email));

        if(count($data_Table)==1){
            $usuario=new usuario(
                $data_Table[0]["id"],
                $data_Table[0]["Nombre"],
                $data_Table[0]["Apellido"],
                $data_Table[0]["Email"],
                $data_Table[0]["Usuario"],  
                $data_Table[0]["Password"],
                $data_Table[0]["Img_perfil"],
                $data_Table[0]["Administrador"],
                $data_Table[0]["Estado"]);
            }
        return $usuario;
    }
    public function Actualizar_foto($id_usuario,$img){
        $data_Source=new DataSource();
        $stmt1="UPDATE usuario SET Img_perfil=:imgperfil WHERE id=:idUsuario";
        $resultado=$data_Source->ejecutarActulizacion($stmt1, array(
        'imgperfil'=>$img,
        'idUsuario'=>$id_usuario));
        return $resultado;

    }

    
    public function Validar_usuario($user){
        $data_Source=new DataSource();
        $usuario=null;
        $data_Table= $data_Source->ejecutarConsulta("SELECT * FROM usuario WHERE Usuario=:user ",array(':user'=>$user));

        if(count($data_Table)==1){
            $usuario=new Usuario(
                $data_Table[0]["id"],
                $data_Table[0]["Nombre"],
                $data_Table[0]["Apellido"],
                $data_Table[0]["Email"],
                $data_Table[0]["Usuario"],  
                $data_Table[0]["Password"],
                $data_Table[0]["Img_perfil"],
                $data_Table[0]["Administrador"],
                $data_Table[0]["Estado"]);
            }
        return $usuario;
    }
}
?>