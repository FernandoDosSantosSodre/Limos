<?php
    include_once("../../objs/objetos.php");
    include_once("../loginChecker.php");
    include("../../layout/header.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/boot.css">
    <link rel="stylesheet" href="../../css/conta_cli/index.css">
    <title>Site de Busca de Restaurantes</title>
</head>
<body>
    <!-- HEADER-------------------------------- -->
    <header  class="main_header">
        <div class="main_header_content">
            <div class="img_logo">
                <a href="../../sbr/index.php" class="logo">
                    <img src="../../img/limos_vermelho.png" alt="Bem vindo ao projeto Limos"
                        title="Bem vindo ao projeto Limos"></a>
            </div>
    
            <nav class="main_header_content_menu">
                <div class="menu_a_inportant">
                        <a href="../../sbr/index.php" class="cadastro_menu">Início</a>
                    </div>
            </nav>
        </div>
    </header>
    <!-- FIM HEADER------------------------------ -->

    <!-- MAIN============================================ -->
    <main>
       <section class="main_content_dados">
           <header class="main_titulo_dados">
               <h1>Dados Pessoais</h1>
           </header>
           
            <div class='dados_cadastro_content'>
                <div class="dados_cadastro_input_box">
                    <label for="#">Nome:</label>
                    <span class="dado_php"><?php echo $_SESSION["cliente"]->nome;?></span>
                </div>
                <div class="dados_cadastro_input_box">
                    <label for="#">Email:</label>
                    <span class="dado_php"><?php echo $_SESSION['cliente']->email;?></span>
                </div>
                <div class="dados_cadastro_input_box">
                    <label for="#">Telefone:</label>
                    <span class="dado_php"><?php echo $_SESSION['cliente']->telefone;?></span>
                </div>
                <div class="dados_cadastro_input_box">
                    <label for="#">Cep:</label>
                    <span class="dado_php"><?php echo $_SESSION['endereco']->cep;?></span>
                </div>
                <div class="dados_cadastro_input_box">
                    <label for="#">Cidade:</label>
                    <span class="dado_php"><?php echo $_SESSION['endereco']->cidade;?></span>
                </div>
                <div class="dados_cadastro_input_box">
                    <label for="#">Bairro:</label>
                    <span class="dado_php"><?php echo $_SESSION['endereco']->bairro;?></span>
                </div>
                <div class="dados_cadastro_input_box">
                    <label for="#">Logradouro:</label>
                    <span class="dado_php"><?php echo $_SESSION['endereco']->logradouro;?></span>
                </div>
            </div>
            <div class="dados_butao_box">
                <div class="dados_butao_pessoais">
                    <a href="../cadastro/gostos.php">Mudar gostos</a>
                    <a href="alterar-dados.php" type="submit"  >Mudar Dados Pessoais</a>
                    <a href="recomendar.php">Recomende-me um restaurante</a>
                </div>
                <div class="dados_butao_sair">
                    <a href="../login/logout.php"  type="submit">Sair da Conta</a>
                    <a href="desativar.php">Desejo excluir minha conta</a>
                </div>
            </div>          
        </section>
    </main>
    <!-- MAIN============================================ -->

    <!-- FOOTER============================================= -->
    <section class="main_footer">
        <header>
            <h1>Quer saber mais?</h1>
        </header>
        <article class="main_footer_our_pages">
            <header>
                <h2>Nossas Páginas</h2>
            </header>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="../sbr/spanesquisa/index.php">Restaurantes</a></li>
            </ul>
        </article>

        <article class="main_footer_links">
            <header>
                <h2>Links Úteis</h2>
            </header>
            <ul>
                <li><a href="#">Política de Privacidade</a></li>
                <li><a href="#">Aviso Legal</a></li>
                <li><a href="#">Termos de Uso</a></li>
            </ul>
        </article>

        <article class="main_footer_about">
            <header>
                <h2>Sobre o Projeto</h2>
            </header>
            <p>Procure os melhores restaurantes com base em sua localização e gostos pessoais e divulgue sua experiência por meio dos comentários e da avaliação do resturante.</p>
        </article>
    </section>
    <footer class="main_footer_rights">
        <p>LIMOS - &copy;Todos os direitos reservados.</p>
    </footer>
    <!-- FIM FOOTER=================================== -->
</body>
</html>