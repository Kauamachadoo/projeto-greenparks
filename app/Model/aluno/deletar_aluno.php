<?php
$deletar_r = "DELETE FROM responsavel WHERE id_responsavel=".$_REQUEST["id"];

$deletar_u = "DELETE FROM usuario WHERE id_usuario=".$_REQUEST["id"];

            $res = $conexaoMysqli->query($sql); 

            if($deletar_r && $deletar_u==true){
                print "<script>alert('Excluido com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel excluir');</script>"; 
                print "<script>location.href='?page=listar';</script>";
            }
?>