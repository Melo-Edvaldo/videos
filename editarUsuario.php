<?php
    $titulo = "Editar Usuário";
    include "./conexao.php";

    if(isset($_POST) && !empty($_POST))
    {
        $id = $_POST["Id"];
        $nome = $_POST["Nome"];
        $login = $_POST["Login"];
        // $senha = hash('sha512', $_POST["Senha"]);
        $ativo = $_POST["Ativo"] == "on" ? true : false;
        
        $query = "UPDATE usuarios SET nome = '$nome', login = '$login', ativo = $ativo WHERE id = ".$id;
        $resultado = mysqli_query($conexao, $query);

        header("Location: ./usuarios.php?mensagem=Usuário editado com sucesso");
        exit();

    } else if(isset($_GET["id"]) && !empty($_GET["id"]))
    {
        $query = "SELECT * FROM usuarios WHERE id = ".$_GET["id"];

        $resultado = mysqli_query($conexao, $query);

        $dados = mysqli_fetch_array($resultado);

        $id = $dados["id"];
        $nome = $dados["nome"];
        $login = $dados["login"];
        $ativo = $dados["ativo"];
        
    } else
    {
        header("Location: ./usuarios.php?mensagem=Selecione um usuário para editar");
        exit();
    }

    include "./layout/cabecalho.php";
?>

<div class="card">
    <div class="card-header">
        <h3>Editar Usuários</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form action="./editarUsuario.php" method="post">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" value="<?php echo $id; ?>" name="Id" readonly class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" value="<?php echo $nome; ?>" name="Nome" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" value="<?php echo $login; ?>" name="Login" class="form-control" />
                    </div>
                    <!--<div class="form-group">
                        <label>Senha</label>
                        <input type="password" value="<!-?php echo $senha; ?>" name="Senha" class="form-control" />
                    </div>-->
                    <div class="form-group">
                        <label>Ativo?</label>
                        <?php
                            if($ativo == 1)
                            {
                                ?>
                                    <input type="checkbox" name="Ativo" checked class="form-check" />
                                <?php
                            } else
                            {
                                ?>
                                    <input type="checkbox" name="Ativo" class="form-check" />
                                <?php
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">
                            Atualizar usuário
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include "./layout/rodape.php";
?>