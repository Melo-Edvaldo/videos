<?php
    $titulo = "Lista de Usuários";
    $logo = "./img/logoPHP.png";
    include "./layout/cabecalho.php";

    if(isset($_POST) && !empty($_POST)) {
        if(empty($_POST["Login"])) { // login está em name
            ?>
                <div class="alert alert-danger">
                    O campo login não pode estar vazio
                </div>
            <?php
        } else if(empty($_POST["Senha"])) {
            ?>
                <div class="alert alert-danger">
                    O campo senha não pode estar vazio
                </div>
            <?php
        } else {
            include "./conexao.php";
            // $conexao; // -> variável que representa a conexão com o banco de dados
            $nome = $_POST["Nome"];
            $login = $_POST["Login"];
            $senha = hash('sha512', $_POST["Senha"]);
            $ativo = $_POST["Ativo"] == "on" ? true : false ;
            
            $query = "INSERT INTO usuarios (nome, login, senha, ativo) VALUES ('$nome','$login','$senha','$ativo')";
            $resultado = mysqli_query($conexao, $query);
            if($resultado == 1) {
                ?>
                    <div class="alert alert-success">
                        Usuário inserido com sucesso
                    </div>
                <?php
            }
        }
    } else {
        
    }
?>

<div class="card">
    <div class="card-header">
        <h3>Cadastro de Usuários</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form action="./usuarios.php" method="post">
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

<?php
    include "./layout/rodape.php";
?>