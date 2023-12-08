<?php
    $titulo = "Lista de Usuários";
    $logo = "./img/logoPHP.png";
    include "./layout/cabecalho.php";
    include "./conexao.php";

    if(isset($_GET["mensagem"]) && !empty($_GET["mensagem"]))
    {
        ?>
            <div class="alert alert-warning">
                <?php echo $_GET["mensagem"]; ?>
            </div>
        <?php
    }

    if(isset($_POST) && !empty($_POST))
    {
        if(empty($_POST["Login"]))
        { // login está em name
            ?>
                <div class="alert alert-danger">
                    O campo login não pode estar vazio
                </div>
            <?php
        } else if(empty($_POST["Senha"]))
        {
            ?>
                <div class="alert alert-danger">
                    O campo senha não pode estar vazio
                </div>
            <?php
        } else
        {
            // include "./conexao.php";
            // $conexao; // -> variável que representa a conexão com o banco de dados
            $nome = $_POST["Nome"];
            $login = $_POST["Login"];
            $senha = hash('sha512', $_POST["Senha"]);
            $ativo = $_POST["Ativo"] == "on" ? true : false;

            if(isset($_FILES["Imagem"]) && !empty($_FILES["Imagem"]))
            {
                $imagem = "./img/" . $_FILES["Imagem"]["name"];
                move_uploaded_file($_FILES["Imagem"]["tmp_name"], $imagem);
                // echo "Upload realizado com sucesso";
            } else
            {
                $imagem = "";
            }
            
            $query = "INSERT INTO usuarios (nome, login, senha, ativo, imagem) VALUES ('$nome', '$login', '$senha', $ativo, '$imagem')";
            $resultado = mysqli_query($conexao, $query);
            if($resultado == 1)
            {
                ?>
                    <div class="alert alert-success">
                        Usuário inserido com sucesso
                    </div>
                <?php
            }
        }
    } else
    {
        
    }
?>

<div class="card">
    <div class="card-header">
        <h3>Cadastro de Usuários</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form action="./usuarios.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="Nome" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" name="Login" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="Senha" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Imagem</label>
                        <input type="file" name="Imagem" class="form-control" accept="image/*" />
                    </div>
                    <div class="form-group">
                        <label>Ativo?</label>
                        <input type="checkbox" name="Ativo" class="form-check" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">
                            Inserir usuário
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Ativo</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT id, nome, login, ativo, imagem FROM usuarios ORDER BY id ASC";
            $dados = mysqli_query($conexao, $query);
            if($dados)
            {
                while($linha = mysqli_fetch_assoc($dados))
                {
                    ?>
                        <tr>
                            <td> <?php echo $linha['id']; ?> </td>
                            <td> <?php echo $linha['nome']; ?></td>
                            <td> <?php echo $linha['login']; ?></td>
                            <td>
                                <?php
                                    if($linha['ativo'] == 1)
                                    {
                                        ?>
                                            <input type="checkbox" disabled checked />
                                        <?php
                                    } else
                                    {
                                        ?>
                                            <input type="checkbox" disabled />
                                        <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <img src="<?php echo $linha['imagem']; ?>" width="75" height="75" />
                            </td>
                            <td>
                                <a class="btn btn-warning" href="editarUsuario.php?id=<?php echo $linha["id"]; ?>">Editar</a>
                                <a class="btn btn-danger" href="excluirUsuario.php?id=<?php echo $linha["id"]; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php
                }
            }
        ?>
    </tbody>
</table>

<?php
    include "./layout/rodape.php";
?>