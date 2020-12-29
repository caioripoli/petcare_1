<?php
    include_once("connectionDataBase.php");
    $pesquisar = $_POST['picklist'];
    //$result_cursos = "SELECT * FROM company";
    //$resultado_cursos = mysqli_query($conn, $result_cursos);
    $result_cursos = "SELECT * FROM company";
    $resultado_cursos = mysqli_query($conn, $result_cursos);
    $no = 1; 
    while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
    ?>
    <div class="accordion-item">
              <button id="accordion-button" aria-expanded="false">
                <div class="accordion-header">
                  <span class="accordion-title"><?php echo $rows_cursos['name']; ?></span>
                  <span class="accordion-subtitle"><?php echo $rows_cursos['phone']; ?></span>
                </div>
                <span class="icon" aria-hidden="true">+</span>
              </button>
              <div class="accordion-content">
                <p class="accordion-info"><?php echo $rows_cursos['description']; ?></p>
              </div>
            </div>
    <?php
        }
    ?>