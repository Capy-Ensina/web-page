<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&family=Press+Start+2P&display=swap" rel="stylesheet">
  <title>Capy Ensina</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="assets/capycoin.svg" type="image/png">
</head>
<body>

  <header>
    <div class="topo">
        <div class="logo">
            <a href="#">
                <img src="assets/logo.capyensina.svg" alt="Logo do Capy Ensina">
            </a>
        </div> <!--fim logo-->

    <nav class="menu">
      <ul>
        <li><a href="#objetivo">Objetivo</a></li>
        <li><a href="#ranking">Ranking</a></li>
        <li><a href="#equipe">Equipe</a></li>
      </ul>
    </nav>
    <div>
      <a href="https://github.com/Capy-Ensina" target="_blank"><img width="42" height="42" src="https://img.icons8.com/material-outlined/42/github.png" alt="github"/></a>
      <a href="https://www.instagram.com/capy_ensina?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank"><img width="42" height="42" src="https://img.icons8.com/fluency/42/instagram-new.png" alt="instagram-new"/></a>
      <a href="https://www.linkedin.com/company/capy-ensina/?viewAsMember=true" target="_blank"><img width="42" height="42" src="https://img.icons8.com/color/42/linkedin.png" alt="linkedin"/></a>
    </div>
  </header>

  <main>
    <section class="conteudo">
        <div class="topo">
            <div class="flex">
                <div class="texto">
                    <h1>Capy Ensina</h1>
                    <p>é um jogo de simulação que ensina educação financeira.</p>
                </div>
                <div class="imagem-conteudo">
                    <img src="assets/capycoin.svg">
                </div>
            </div>
        </div>
    </section>

    <!--Segunda parte-->
    <section class="conteudo2" id="objetivo">
      <div class="imagem-conteudo2">
        <img src="assets/capydeouro.svg"/>
      </div>
      <div class="boxTitle-conteudo2">
        <p class="text-conteudo2">
                    O Capy quer transformar a vida de jovens de baixa renda que estão começando no mercado de trabalho.
        </p>
      </div>
    </section>

    <!--Rank-->
        <section class="rank" id="ranking">
      <div class="card-rank">
        <div class="card-title">
          <h1>Ranking</h1>
        </div>

          <ul class="list" id="ranking-list">    
        <?php
        // URL da API
        $url = "https://web-api-capyensina.up.railway.app/ranking";

        try {
            // Faz a requisição para a API
            $response = file_get_contents($url);
            if ($response === FALSE) {
                throw new Exception("Erro ao acessar a API.");
            }

            // Decodifica o JSON para um array PHP
            $data = json_decode($response, true);

            // Verifica se os dados foram retornados corretamente
            if (is_array($data)) {


                // Itera sobre os dados e exibe na tela
                foreach ($data as $index => $rank) {

                    $val_max = 5;

                    $val = $rank["pontuacao"];
                    $val = $val * 100 / $val_max;
                    
                    echo '
            <li class="list-item">
              <div class="list-item-header">
                <span class="list-item-header-bagde">' . $index + 1  . '</span>
                <div class="list-item-header-body-icon"><img src="assets/Ellipse 176.svg" class="list-item-icon"/></div>
              </div>
              <div class="list-item-body">
                <span class="list-item-title">
                 '. $rank['usuario'] .'  
                 <span style="color: black;">Tempo:
                 '. round($rank['tempo'], 2) .'s</span>
                </span>
                <span class="list-item-subtitle">
                  Pontos '. $rank['pontuacao'] .'/'.$val_max.'
                </span>
                <div class="list-item-progress-bar">
                  <span class="progress" style="width: '. $val .'%"></span>
                </div>
              </div>
            </li>';

                  if ($index >= 4) break;
                }
            } else {
                echo "<p class='error'>Os dados retornados não estão no formato esperado.</p>";
            }
        } catch (Exception $e) {
            // Exibe mensagens de erro, se houver
            echo "<p class='error'>Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
        ?>
        
        </ul>
        </div>
      </div>
      <img src="assets/Violettapiscandoumjoiaa2 1.svg" class="img-violeta"/>
    </section>

    <!--Membros-->
    <section class="membros" id="equipe">
      <div class="balao-membros">
        <img src="assets/balao.svg" class="img-balao-membros"/>
      </div>
      <div class="equipe-unida">
        <img src="assets/membros.png" class="img-equipe-unida"/>
      </div>
    </section>
    <footer>
      <p>2024 Capy Ensina. Todos os direitos reservados.</p>
    </footer>
  </main>




  </body>
</html>
