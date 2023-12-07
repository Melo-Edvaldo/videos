<?php
    if(isset($_GET["id"]) && !empty($_GET["id"])) {
        include "./conexao.php";

        $query = "DELETE FROM usuarios WHERE id = ".$_GET["id"];
        $resultado = mysqli_query($conexao, $query);

        if($resultado) {
            header("Location: ./usuarios.php?mensagem=Usuário excluído com sucesso");
            exit();
        } else {
            header("Location: ./usuarios.php?mensagem=Ocorreu um erro");
            exit();
        }

    } else {
        header("Location: ./usuarios.php?mensagem=Selecione um usuário para apagar");
        exit();
    }

?>