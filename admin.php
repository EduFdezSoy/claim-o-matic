<?php
$df = fopen("petitions.csv", 'r');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/bulma/bulma.min.css">
  <link rel="stylesheet" href="assets/styles.css">
  <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
  <script src="assets/admin.js"></script>
  <title>Document</title>
</head>

<body>
  <!--______________________________________________________________________________________-->
  <!--__________________,,_________________,...____,,_______________________________________-->
  <!--________________`7MM_______________.d'_""__`7MM_______________________________________-->
  <!--__________________MM_______________dM`_______MM_______________________________________-->
  <!--___.gP"Ya____,M""bMM_`7MM__`7MM___mMMmm_,M""bMM__.gP"Ya__M"""MMV_____.gP"Ya__,pP"Ybd__-->
  <!--__,M'___Yb_,AP____MM___MM____MM____MM_,AP____MM_,M'___Yb_'__AMV_____,M'___Yb_8I___`"__-->
  <!--__8M""""""_8MI____MM___MM____MM____MM_8MI____MM_8M""""""___AMV______8M""""""_`YMMMa.__-->
  <!--__YM.____,_`Mb____MM___MM____MM____MM_`Mb____MM_YM.____,__AMV__,_,,_YM.____,_L.___I8__-->
  <!--___`Mbmmd'__`Wbmd"MML._`Mbod"YML..JMML.`Wbmd"MML.`Mbmmd'_AMMmmmM_db__`Mbmmd'_M9mmmP'__-->
  <!--______________________________________________________________________________________-->
  <!--__________________________________________________________________________edufdez.es__-->

  <!-- Titulo -->
  <div class="hero is-info block">
    <div class="hero-body">
      <p class="title">
        Claim o matic
      </p>
      <p class="subtitle">
        Admin
      </p>
      <!-- Notificaciones -->
      <div class="noti" id="noti-error">
        <div class="container">
          <div class="notification is-danger">
            <button class="delete"></button>
            Error al enviar el formulario. Prueba de nuevo o gritale a Edu.
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tabla de contenidos -->
  <div class="container block">
    <table class="table is-striped is-fullwidth">
      <thead>

        <?php
        $header = true;
        $row = 0;
        while (($line = fgets($df)) !== false) {
          if ($row != 0) {
            echo "<tr onmouseover='trOver(this)' onmouseout='trOverOut(this)'>";
          } else {
            echo "<tr>";
          }

          foreach (str_getcsv($line) as $val) {
            if ($header == true) {
              echo "<th>";
              echo $val;
              echo "</th>";
            } else {
              echo "<td>";
              echo $val;
              echo "</td>";
            }
          }

          if ($row != 0) {
            echo "<td><div onclick='removeRow($row, this)' style='cursor:pointer'><i class='fas fa-broom'></i></div></td>";
          } else {
            echo "<td></td>";
          }
          echo "</tr>";
          $row++;
          if ($header == true) {
            $header = false;
            echo "</thead><tbody>";
          }
        }
        ?>

        </tbody>
    </table>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        Hecho con <span title="amor">&#x1F496;</span> por <a href="https://edufdez.es">Eduardo Fernandez</a>
      </p>
      <p>
        Hecho con <a href="">Bulma</a> y <a href="">Fontawesome</a>
      </p>
    </div>
  </footer>

</body>

</html>

<?php

fclose($df);

?>