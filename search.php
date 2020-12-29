<?php
    include_once("connectionDataBase.php");
    /*$pesquisar = $_POST['picklist'];
    $result_cursos = "SELECT * FROM company";
    $resultado_cursos = mysqli_query($conn, $result_cursos);
    
    //if(($result_cursos) AND ($result_cursos->num_rows != 0)){
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
        ?>*/

        $keyword = $_POST['keyword']; 
// Load view.php
ob_start();
include "view.php";
// Put the contents of view.php into the $html variable
$html = ob_get_contents(); 
ob_end_clean();
// Create an array with the result index and its value $html
// Then convert to JSON
echo json_encode(array('result'=>$html));
?>
