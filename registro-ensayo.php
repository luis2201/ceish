<?php 
include 'layouts/head.php'; 

?>

<body id="page-top">
  <!-- Navigation-->
  <?php include 'layouts/nav.php'; ?>
  <!-- Masthead-->
  <header class="" style="position: relative;">
    <div class="row">
      <img src="assets/img/banner/solicitud.png" alt="">
    </div>
  </header>
  <hr class="hr-orange">
  <!-- Contenido -->
  <section class="page-section bg-light" id="team" style="padding: 50px;">
    <div class="container">
      <div class="text-center">
        <h4>Investigación de Riesgo Mayor al Mínimo Art.45</h4>
        <h5 class="section-heading text-uppercase">Registrar Solicitud</h5>
        <h5 class="section-subheading text-muted">Debe llenar todos los campos para poder enviar su solicitud.</h5>
      </div>
      <div class="card col-8" style="padding: 2em; margin: auto;">
        <form id="frmAction" action="function/solicitudInsertAjax.php" method="POST" data-form="insert" enctype="multipart/form-data" autocomplete="off">
          <div id="opciones" class="mb-3">
            <label for="tipoinvestigacion" class="form-label h5">Seleccione el Tipo de Ensayo Cl&iacute;nico</label>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion1" value="Estudios cuasi-experimentales" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios1">
                Estudios cuasi-experimentales
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion2" value="Ensayo de campo" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Ensayo de campo
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion3" value="Ensayos controlados aleatorizados sin uso de medicamentos y/o dispositivos médicos" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Ensayos controlados aleatorizados sin uso de medicamentos y/o dispositivos médicos
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion4" value="Otros: Investigaciones que utilizan información, datos sensibles, muestras biológicas humanas y/o población vulnerable" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Otros: Investigaciones que utilizan información, datos sensibles, muestras biológicas humanas y/o población vulnerable.
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion5" value="Estudio de farmacología clínica fase 1 a III inclusive" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Estudio de farmacología clínica fase 1 a III inclusive.
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion6" value="Ensayos clínicos con medicamentos, vacunas, dispositivos médicos, innovación quirúrgica, productos biológicos y productos naturales procesados de uso medicinal que estén sujetos a registro sanitario" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Ensayos clínicos con medicamentos, vacunas, dispositivos médicos, innovación quirúrgica, productos biológicos y productos naturales procesados de uso medicinal que estén sujetos a registro sanitario.
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion7" value="Estudios experimentales con nuevos dispositivos, nuevos métodos diagnósticos invasivos, preventivos, de rehabilitación o nuevos procedimientos quirúrgicos" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Estudios experimentales con nuevos dispositivos, nuevos métodos diagnósticos invasivos, preventivos, de rehabilitación o nuevos procedimientos quirúrgicos.
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion8" value="Estudios psicológicos que implican manipulación de la conducta" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Estudios psicológicos que implican manipulación de la conducta.
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion9" value="Estudios realizados por primera vez en seres humanos" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Estudios realizados por primera vez en seres humanos.
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion10" value="Estudios de fármacos con margen estrecho" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Estudios de fármacos con margen estrecho.
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion11" value="Estudios de intervención social" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Estudios de intervención social.
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion12" value="Uso de procedimientos invasivos (anmiocentesis, punción lumbar, cateterismo, entre otros) pro fuera de indicación y frecuencia de la práctica estándar" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Uso de procedimientos invasivos (anmiocentesis, punción lumbar, cateterismo, entre otros) pro fuera de indicación y frecuencia de la práctica estándar.
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion13" value="Estudios que requieran abandono o retiro de la medicación habitual" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Estudios que requieran abandono o retiro de la medicación habitual.
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion14" value="Investigaciones en situación de emergencias sanitarias" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios2">
                Investigaciones en situación de emergencias sanitarias.
              </label>
            </div>
          </div>
          <div id="campos" class="mb-3 d-none">
            <div class="mb-3">
              <label id="etiqueta" class="form-label h6"></label>
            </div>
            <div class="mb-3">
              <label for="titulo" class="form-label">T&iacute;tulo de la Investigaci&oacute;n</label>
              <textarea id="titulo" name="titulo" class="form-control" rows="3" cols="60" required></textarea>
            </div>
            <div class="mb-3">
              <label for="investigador" class="form-label">Investigador Principal</label>
              <input type="text" id="investigador" name="investigador" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Tel&eacute;fono</label>
              <input type="text" id="telefono" name="telefono" class="form-control" required>
            </div>
            <div class="mb-3">
              <div class="card text-center">
                <strong>Todos los anexos deben estar firmados para posteriormente ser escaneados en formato PDF y subidos a la plataforma.</strong>
              </div>
            </div>
            <div class="mb-3">
              <label for="doc1" class="form-label">Carta de solicitud (<a href="assets/anexos/Anexo6.docx">Anexo 6</a>)</label>
              <input type="file" id="doc1" name="doc1" class="form-control" accept=".pdf" required>
            </div>
            <div class="mb-3">
              <label for="doc2" class="form-label">Ficha descriptiva (<a href="assets/anexos/Anexo7.docx">anexo 7</a>)</label>
              <input type="file" id="doc2" name="doc2" class="form-control" accept=".pdf" required>
            </div>
            <div class="mb-3">
              <label for="doc3" class="form-label">Formulario de consentimiento informado (<a href="assets/anexos/Anexo8.docx">anexo 8</a>)</label>
              <input type="file" id="doc3" name="doc3" class="form-control" accept=".pdf" required>
            </div>
            <div class="mb-3">
              <label for="doc4" class="form-label">Hoja de Vida de los investigadores (<a href="assets/anexos/Anexo9.docx">anexo 9</a>)</label>
              <input type="file" id="doc4" name="doc4" class="form-control" accept=".pdf" required>
            </div>
            <div class="mb-3">
              <label for="doc5" class="form-label">Carta compromiso (<a href="assets/anexos/Anexo10.docx">anexo 10</a>)</label>
              <input type="file" id="doc5" name="doc5" class="form-control" accept=".pdf" >
            </div>
            <div class="mb-3">
              <label for="protocolo" class="form-label">Protocolo de Investigaci&oacute;n</label>
              <input type="file" id="protocolo" name="protocolo" class="form-control" accept=".pdf" required>
            </div>
            <div class="mb-3">
              <label for="autorizacion" class="form-label">Certificaci&oacute;n de autorizaci&oacute;n para la realizaci&oacute;n de la investigaci&oacute;n en las instituciones u organizaciones</label>
              <input type="file" id="autorizacion" name="autorizacion" class="form-control" accept=".pdf" required>
            </div>
            <div class="mb-3">
              <label for="declaracion" class="form-label">Declaraci&oacute;n de Conflicto de intereses (<a href="assets/anexos/Anexo39.docx">anexo 39</a>)</label>
              <input type="file" id="declaracion" name="declaracion" class="form-control" accept=".pdf" required>
            </div>
            <div class="mb-3">
              <label for="cartainteres" class="form-label">Carta de interés de la  Institución donde se va a ejecutar la investigación</label>
              <input type="file" id="cartainteres" name="cartainteres" class="form-control" accept=".pdf" required>
            </div>
            <div class="mb-3">
              <label for="comprobante" class="form-label">Comprobante de Pago (<strong>Ensayos Clínicos $4.600,00</strong>)</label>            
              <input type="file" id="comprobante" name="comprobante" class="form-control" accept="image/image/png,image/jpeg" >            
            </div>          
            <div class="mb-3">
              <div class="row">
              <div class="col-6"> 
                 <img src="assets/img/bancos/bco_internacional.jpeg" alt="" style="width: 50%">
              </div>
              </div>
            </div>
            <button type="submit" class="btn btn-success boton-slider">Enviar Solicitud</button>
          </div>
        </form>
        <div id="RespuestaForm" class=""></div>
      </div>
    </div>
  </section>
  <!-- Footer-->
  <?php include 'layouts/footer.php' ?>
  <script src="function/solicitudInsert.js"></script>
  <script type="text/javascript">
    
  </script>
  <?php 

?>
</body>

</html>