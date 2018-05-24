<?php
    require_once('../classes/Tabela_usuario_categoria.php');
    require_once('../dao/usuarioCategoriaDao.php');
    $opcao = (int)$_REQUEST['opcao'];
    session_start();
    if($opcao == 1){

        $dirname = $_SESSION['usuarioLogado']['login'] ;
        $dir = "../imagens/$dirname/";
        if(!is_dir($dir)){
            mkdir($dir,0777);
        }

        foreach ($_FILES['img-categoria']['name'] as $key => $value) {
            $format =  explode('/', $_FILES['img-categoria']['type'][$key]);
            $nome_arquivo = $_SESSION['usuarioLogado']['id'] . '-cat-' . date("YmdHisu") . '-' . $key . '.' . $format[1];
            $uploaddir = $dir;
            $uploadfile = $uploaddir . basename($nome_arquivo);
                

                echo '<pre>';
                print_r($_POST);
                echo '</pre>';

            if (move_uploaded_file($_FILES['img-categoria']['tmp_name'][$key], $uploadfile)) {
               
                $cat = new Tabela_usuario_categoria($_SESSION['usuarioLogado']['id'],$_POST['categoria'][$key],$nome_arquivo);
                $usuarioCategoriaDao = new usuarioCategoriaDao();
                $usuarioCategoriaDao->incluirCategoria($cat);

            } else {
                echo "Possível ataque de upload de arquivo!\n";
            }




        }
        exit;   
        header("Location:../tcc/lista_usuario");
        $_SESSION['msg'] = "Categoria incluida com sucesso";
        $_SESSION['tipo_msg'] = "ok";
    }
?>

