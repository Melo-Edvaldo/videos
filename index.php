<?php
    $titulo = "Página Inicial";
    $logo = "./img/logoPHP.png";
    include "./layout/cabecalho.php";
?>


    <h1>Página Inicial</h1>
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label class="form-label">Endereçe de E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="mail@email.com">
            </div>
            <div class="mb-3">
                <label class="form-label">Digite sua reclamação aqui</label>
                <textarea name="reclamacao"  class="form-control" rows="3"></textarea>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Bem vindo ao sistema!
                </div>
                <div class="card-body">
                    <h5 class="card-title">Meu Título do Card</h5>
                    <p class="card-text">Este é o card para utilizar no sistema</p>
                    <a href="#" class="btn btn-primary">Clique aqui para saber mais</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">1</th>
                            <td>Edvaldo</td>
                            <td>123.456.789-01</td>
                            <td>
                                <a class="btn btn-warning">Editar</a>
                            </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php
    include "./layout/rodape.php";
?>