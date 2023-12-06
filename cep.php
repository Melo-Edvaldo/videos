<?php
    $titulo = "Consultar CEP";
    $logo = "./img/logoPHP.png";
    include "./layout/cabecalho.php";

    if(isset($_GET["cep"]) && !empty($_GET["cep"])) {
        $dados = file_get_contents("https://viacep.com.br/ws/" .$_GET["cep"]. "/json/"); // Informação colada do viacep.com.br
        $dados = json_decode($dados, true);
        // print_r($dados);
    } else {

    }
?>

<h1>Consultar CEP</h1>
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="mb-3">
            <form action="./cep.php" method="get">
                <label>Digite seu CEP</label>
                    <input class="form-control" onkeyup="formatarCep(this)" name="cep" placeholder="00000-000" maxlength="9">
                <button class="btn btn-success mt-3" type="submit">
                    Pesquisar CEP
                </button> 
            </form>

            <?php
                if(isset($dados)) {
                    if(isset($dados["erro"]) && $dados["erro"] == true) {
                        ?>
                            <div class="alert alert-danger">
                                Esse CEP não é válido
                            </div>
                        <?php   
                    } else {
            ?>

                <label>CEP Personalizado</label>
                    <input class="form-control" readonly value="<?php echo $dados["cep"]; ?>" />

                <label>Logradouro</label>
                    <input class="form-control" readonly value="<?php echo $dados["logradouro"]; ?>" />

                <label>Cidade</label>
                    <input class="form-control" readonly value="<?php echo $dados["localidade"]; ?>" />
            
                <?php
                }
            }
                ?>
            
        </div>
    </div>
</div>

<script>
    function formatarCep(input) {
    // Remove todos os caracteres não numéricos
    var cep = input.value.replace(/\D/g, '');

    // Insere os números e traço nos lugares corretos
    cep = cep.replace(/(\d{5})(\d)/, '$1-$2');

    // Atualiza o valor do campo de entrada com o telefone formatado
    input.value = cep;
    }
</script>

<?php
    include "./layout/rodape.php";
?>