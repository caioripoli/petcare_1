<?php
  include_once("connectionDataBase.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sua Pet Care</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css" />
</head>

<body>
  <!-- Header -->
  <header>
    <div class="container">
      <div class="header">
        <div class="logo">
          Pet Care
        </div>

        <nav class="menu">
          <ul>
            <li><a href="#profissionais">Profissionais</a></li>
            <li><a href="#noticia">Noticias</a></li>
            <li><a href="#parceiro">Parceiros</a></li>
            <li><a href="#sobre">Sobre</a></li>
            <li><a href="#contato">Contato</a></li>
          </ul>
        </nav>

        <div id="burger" class="burger" onclick="toggleNav()">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>

      </div>
    </div>
  </header>
  <section id="home">
    <div class="img-wrapper">
      <img src="images/LogoPet.jpg" alt="">
    </div>
    <div class="chamada">
      <h1>Pet Care</h1>
      <p>O jeito mais facil de contratar um serviço pro seu pet</p>
    </div>
  </section>
  <section id="profissionais" class="profissionais">
    <div class="container">
      <div class="grids">
        <div class="grid">
          <h1> Encontrar Profissionais </h1>
          <form id="form" class="form-container" method="post" name="formAccount" action="">
            <!-- <input placeholder="Nome" type="text" name="name">
            <input placeholder="E-mail" type="email" name="email">
            <input placeholder="Telefone" type="text" name="telefone"> -->

            <select name="select" id="picklist">
              <option value="Raça / Pet" selected disabled>Raça / Pet</option>
              <?php
                $result_category = "SELECT * FROM category";
                $category_result = mysqli_query($conn, $result_category);
                while($row_category = mysqli_fetch_assoc($category_result)){?>
                  <option value="<?php echo $row_category['categoryId']; ?>"><?php echo $row_category ['name']; ?>
                  </option><?php
                }
              ?>
            </select>

            <div class="checkbox-area">
              <input id="termosUso" type="checkbox" name="termosUso">
              <span>Concordo com os <a href="/SamplePDF.pdf" target="_blank">termos de uso</a></span>
            </div>
            <button id="sendForm" class="button-base" disabled > Procurar...</button>
          </form>
        </div>

        <div class="grid">
          <div class="accordion">

            <!--<div class="accordion-item">
              <button id="accordion-button" aria-expanded="false">
                <div class="accordion-header">
                  <span class="accordion-title">Nome da Pessoa</span>
                  <span class="accordion-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit,
                    quia!</span>
                </div>
                <span class="icon" aria-hidden="true">+</span>
              </button>
              <div class="accordion-content">
                <p class="accordion-info">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi, reiciendis!
                </p>
              </div>
            </div>

            <div class="accordion-item">
              <button id="accordion-button" aria-expanded="false">
                <div class="accordion-header">
                  <span class="accordion-title">Nome da Pessoa</span>
                  <span class="accordion-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit,
                    quia!</span>
                </div>
                <span class="icon" aria-hidden="true">+</span>
              </button>
              <div class="accordion-content">
                <p class="accordion-info">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi, reiciendis!
                </p>
              </div>
            </div>-->
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="noticia">
  </section>

  <section id="parceiro">
    <div class="container">
      <h1>Parceiros</h1>
      <p>
      <div class="carousel">
        <div><img src="https://i.imgur.com/3aIutJi.png" alt="js" /></div>
        <div><img src="https://i.imgur.com/rWtGeQ0.png" alt="java" /></div>
        <div><img src="https://i.imgur.com/8946bSF.png" alt="python" /></div>
        <div><img src="https://i.imgur.com/9Hc7hjb.png" alt="kotlin" /></div>
        <div><img src="https://i.imgur.com/uZDEpjX.png" alt="scala" /></div>
        <div><img src="https://i.imgur.com/eQoyQjy.png" alt="C#" /></div>
        <div><img src="https://i.imgur.com/ko3iAbu.png" alt="PHP" /></div>
        <div><img src="https://i.imgur.com/Afkz5od.png" alt="dotnet" /></div>
      </div>
      </p>
    </div>
  </section>
  <section id="sobre">
    <div class="container">
      <h1>Sobre Pet</h1>
      <p>
        Olá meu nome é pet e somos uma empresa nova.<br>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum nostrum quidem ut quia culpa at doloribus amet
        cupiditate dolorum deserunt, enim sed nesciunt molestias tempore deleniti exercitationem illum harum provident!
        Possimus ducimus libero inventore tenetur dolores, quae laborum, nulla laudantium, culpa voluptatem explicabo.
        Inventore consectetur reiciendis vel eaque quaerat. Numquam incidunt harum sequi, debitis exercitationem hic
        commodi a eaque. Inventore quas temporibus ducimus repellat sapiente non repellendus! Quam id quos quisquam
        maxime recusandae, sapiente saepe ipsam alias, dignissimos, hic ut. Debitis laboriosam velit praesentium fuga
        nobis, assumenda illo numquam! At, eum tempora molestiae ratione voluptates delectus obcaecati quis corrupti
        tenetur?
      </p>
    </div>
  </section>
  <section id="contato">
    <div class="container">
      <div class="form-grid">
        <div class="grid">
          <h1>ENVIE SUA MENSAGEM</h1>
          <p>
            Entre em contato com a equipe Sua Pet Care através do nosso e-mail <a
              href="mailto:contato@suapetcare.com">contato@suapetcare.com</a> ou preenchendo o
            formulário de contato ao lado.</p>
        </div>
        <div class="grid">
          <form action="./send.php" class="send-contact-form"  method="POST" >
            <input name="nome" class="input" type="text" placeholder="Seu nome">
            <input name="email" class="input" type="email" placeholder="Seu email">
            <select name="select" id="select">
              <option value="Raça / Pet" selected disabled>Assunto</option>
              <option value="value1">Reportar erro</option>
              <option value="value2">Anúncios</option>
              <option value="value3">Outro</option>
            </select>
            <textarea name="mensagem" id="" cols="20" rows="5" placeholder="Deixe aqui sua mensagem"></textarea>
            <button id="formContactSend" class="button-base" id="contact-form" type="submit"> Entrar em Contato </button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="footer">
        <p>&copy; Copyright 2020, ETECIA DS - As diversas marcas comerciais pertencem a seus respectivos proprietários.
        </p>
      </div>
    </div>
  </footer>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>
  <script src="app.js"></script>
</body>

</html>