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
  <script src="assets/script.js"></script>
  <title>Claim o matic</title>
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
        Pide aquí las pelis, series o animes que quieres que Edu meta al Jellyfin
        <br>
        Tambien puedes pedir subs u otros idiomas, solo aclaralo en el campo extra
      </p>
      <!-- Notificaciones -->
      <div class="noti" id="noti-success">
        <div class="container">
          <div class="notification is-success">
            <button class="delete"></button>
            Formulario registrado.
          </div>
        </div>
      </div>
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

  <div class="container block">
    <div class="columns">
      <!-- Formulario -->
      <div class="column is-four-fifths">
        <form id="form">
          <div class="field">
            <label class="label">Usuario (Quién lo pide?)</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input" type="text" placeholder="EduFdezSoy" id="username" name="username" required>
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <label class="label">Tipo de contenido</label>
            <div class="control" id="type">
              <label class="radio">
                <input type="radio" name="type" value="film">
                Pelicula
              </label>
              <label class="radio">
                <input type="radio" name="type" value="show">
                Serie
              </label>
              <label class="radio">
                <input type="radio" name="type" value="anime">
                Anime
              </label>
              <label class="radio">
                <input type="radio" name="type" value="other">
                Otro?
              </label>
            </div>
          </div>

          <div class="field">
            <label class="label">Nombre del contenido</label>
            <div class="control">
              <input class="input" type="text" placeholder="Dr. Who" id="name" name="name">
            </div>
          </div>

          <div class="field">
            <label class="label">Idioma preferido</label>

            <div class="field is-grouped">
              <div class="control has-icons-left">
                <div class="select">
                  <select name="lang">
                    <option>Español</option>
                    <option>Inglés</option>
                    <option>VO</option>
                  </select>
                </div>
                <div class="icon is-small is-left">
                  <i class="fas fa-globe"></i>
                </div>
              </div>
              <div class="control has-icons-left">
                <div class="select">
                  <select name="subs">
                    <option>Sin subs / no necesarios</option>
                    <option>Sub español</option>
                    <option>Sub inglés</option>
                    <option>Sub es o en / indiferente</option>
                  </select>
                </div>
                <div class="icon is-small is-left">
                  <i class="fas fa-language"></i>
                </div>
              </div>
            </div>
          </div>


          <div class="field">
            <label class="label">Datos extra</label>
            <div class="control">
              <textarea class="textarea" placeholder="dejame aquí datos que aclaren qué estoy buscando, por ejemplo, si hay varias con el mismo nombre dame el año, el director o un enlace a Wikipedia / IMDb / AniList o cualquier otro" id="extra" name="extra"></textarea>
            </div>
            <p class="help">Recuerda que puedes añadirme cualquier cosa en este campo, idiomas, temporadas, subtitulos... O dejarlo completamente en blanco.</p>
          </div>

          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link" type="button" onclick="submitForm()" id="submit">Submit</button>
            </div>
            <div class="control">
              <button class="button is-link is-light" type="button" onclick="clearForm()">Reset</button>
            </div>
          </div>
        </form>
      </div>

      <!-- cola -->
      <div class="column">
        <div class="card">
          <div class="card-content">
            <div class="content">
              <div class="table-container">
                <table class="table is-striped">
                  <tr>
                    <th>En Cola</th>
                  </tr>
                  <?php
                  $row = 0;
                  while (($line = fgets($df)) !== false) {
                    if ($row == 0) {
                      $row++;
                      continue;
                    }
                    $values = str_getcsv($line);
                    if ($values[2] != '') {
                      echo "<tr><td>".$values[2]."</td></tr>";
                    }
                  }
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <!-- Footer -->
  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        Con <span title="amor">&#x1F496;</span> por <a href="https://edufdez.es">Eduardo Fernandez</a>
      </p>
      <p>
        Hecho con <a href="https://bulma.io/">Bulma</a> y <a href="https://fontawesome.com/">Font Awesome</a>
      </p>
    </div>
  </footer>

</body>

</html>