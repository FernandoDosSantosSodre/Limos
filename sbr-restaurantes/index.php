<?php
    include_once("../objs/objetos.php");
    include_once("loginChecker.php");
    include_once("../conexao.php");
    $imagem = $_SESSION["restaurante"]->fotos;
    $cardapio = $_SESSION["restaurante"]->cardapio;
    include ("../layout/header.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/boot.css">
    <link rel="stylesheet" href="../css/sbr_res/index.css">
    <title><?php echo $_SESSION["restaurante"]->nome; ?> - Administração Limos</title>
</head>

<body>
    <main>
        <section class="info_res">
            <article class="info_res_content">

                <header>
                    <h1>
                        <?php echo $_SESSION["restaurante"]->nome; ?>
                    </h1>
                </header>

                

                    <div class="main_info">

                        <div class="seila">

                            <div class="imgs">
                                <h2>Imagens</h2>
                                <?php echo '<a href="../img/restaurantes/' . $imagem . '"" class="mfp-img-mobile"><img src="../img/restaurantes/' . $imagem . '" alt="fotodorestaurante"></a>'; ?>
                                <?php echo '<a href="../img/restaurantes/' . $cardapio . '"" class="mfp-img-mobile"><img src="../img/restaurantes/' . $cardapio . '" alt="fotodocardapio"></a>'; ?>
                            </div>

                            <div class="informacoes">
                                <h2 class="esse">Dados Pessoais</h2>
                                <p>Nome: <?php echo $_SESSION["admres"]-> nome; ?></p>
                                <p>E-mail: <?php echo $_SESSION["admres"]-> email ; ?></p>
                                
                                <h2>Dados do Restaurante</h2>
                                <p>Nome:  <?php echo $_SESSION['restaurante']->nome ?></p>
                                <p>Nota: <?php echo  $_SESSION["restaurante"]->nota; ?> Estrelas</p>
                                

                                <h2>Endereço do Restaurante</h2>
                                <p>País: <?php echo $_SESSION["enderecoRes"]->pais; ?></p>
                                <p>UF: <?php echo $_SESSION["enderecoRes"]->uf; ?></p>
                                <p>CEP: <?php echo $_SESSION["enderecoRes"]->cep; ?></p>
                                <p>Cidade: <?php echo $_SESSION["enderecoRes"]->cidade; ?></p>
                                <p>Bairro: <?php echo $_SESSION["enderecoRes"]->bairro; ?></p>
                                <p>Logradouro: <?php echo $_SESSION["enderecoRes"]->logradouro; ?></p>
                                <p>Número: <?php echo $_SESSION["enderecoRes"]->numero; ?></p>
                            </div>
                            
                           
                        </div>
                    </div>
                    <div class="dados_content">
                                <h2>alterar Informações</h1>
                                <div class="butao_box">
                                    <a href="cadastro/modificarestaurante.php">Alterar dados do restaurante</a>
                                    <a href="alterar-dados-pessoais/index.php">Alterar dados pessoais do administrador</a>
                                    <a href="adicionar-admnistrador/index.php">Adicionar um novo administrador ao sistema</a>
                                    <a href="excluir-conta/index.php">Excluir sua conta como administrador</a>
                                    <a href="login/logout.php">Sair da conta</a>
                                </div>
                                <h2>Gerenciar Promoções</h2>
                                    <div class="butao_box">
                                        <a href="promocao/index.php">Promova o seu negócio na plataforma da Limos</a>
                                    </div>
                            </div>
                
            </article>

        </section>
        <section class="avaliacoes">
        <div class="avaliacao">
                            <h2>Últimos Comentários</h2>
                            <?php
                            $query = 'SELECT * FROM `coment` WHERE id_res = ' . $_SESSION["restaurante"]->id . ' ORDER BY data_coment, id_coment DESC LIMIT 3;';
                            $result = mysqli_query($conexao, $query);
                            $row = mysqli_num_rows($result);
                            if ($row >= 1) {
                                //Testa se retornou dados e abre um for para listar
                                echo '<div class="">';
                                foreach ($result as $com) {
                                    $comentario = new coment($com['id_coment'], $com['id_cli'], $com['id_res'], $com['coment_coment'], $com['data_coment'], $com['nota_coment']);
                                    # Consulta se o email e a senha digitados conhecidem com alguma entrada no banco de dados
                                    $idCliCom = $comentario->id_cli;
                                    $query = "SELECT nome_cli FROM `CLI` WHERE id_cli = '$idCliCom'";
                                    $result = mysqli_query($conexao, $query); # Armazena o resultado da consulta ao banco
                                    $nomeCli = mysqli_fetch_assoc($result); # Armazena todos os dados referentes ao resultado da consulta
                                    echo '<div class="">';
                                    echo '<div class="">';
                                    echo "<h3>" . $comentario->nota_coment . " Estrelas - " . $comentario->data_coment . "</h3>";
                                    echo '</div>';
                                    echo '<div class="">';
                                    echo '<p>' . $nomeCli["nome_cli"] . '</p>';
                                    echo '<p>' . $comentario->coment . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                echo '</div>';
                            } else {
                                echo "<p>Parece que nínguem ainda comentou o seu restaurante.</p>";
                            } ?>
                        </div>
        </section>
    </main>
    <?php include("../layout/footer.php") ?>
</body>

</html>