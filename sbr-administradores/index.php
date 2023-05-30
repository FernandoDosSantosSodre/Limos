<?php
    include_once("../objs/objetos.php");
    include_once("loginChecker.php");
    include_once("../conexao.php");
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
    <title>Administração do Sistema Limos</title>
</head>

<body>
    <main>
        <section class="info_res">
            <article class="info_res_content">
                <header>
                    <h1>
                        Administrador(a) <?php echo $_SESSION["admsis"]->nome_admsis; ?>
                    </h1>
                </header>
                    <div class="main_info">

                        <div class="seila">


                            <div class="informacoes">
                                <h2 class="esse">Dados Pessoais</h2>
                                <p>Nome: <?php echo $_SESSION["admsis"]-> nome_admsis; ?></p>
                                <p>E-mail: <?php echo $_SESSION["admsis"]-> email_admsis; ?></p>
                            </div>
                            
                           
                        </div>
                    </div>
                    <div class="dados_content">
                                <h2>alterar Informações</h1>
                                <div class="butao_box">
                                    <a href="alterar-dados-pessoais/index.php">Alterar dados pessoais do administrador</a>
                                    <a href="adicionar-admnistrador/index.php">Adicionar um novo administrador ao sistema</a>
                                    <a href="login/logout.php">Sair da conta</a>
                                </div>
                                <h2>Moderar</h2>
                                    <div class="butao_box">
                                        <a href="moderar/index.php?status=1&filtro=">Moderar os clientes</a>
                                        <a href="moderar/index.php?status=2&filtro=">Moderar os comentários</a>
                                        <a href="moderar/index.php?status=3&filtro=">Moderar os restaurantes</a>
                                    </div>
                            </div>
            </article>

        </section>
    </main>
    <?php include("../layout/footer.php") ?>
</body>

</html>