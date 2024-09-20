<?php include 'layouts/head.php'; ?>
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
        <h4>Investigación Sin Riesgo (Art.43 ACUERDO N° 00005 - 2022 MSP) </h4>
        <h5 class="section-heading text-uppercase">Registrar Solicitud</h5>
        <h5 class="section-subheading text-muted">Debe llenar todos los campos para poder enviar su solicitud.</h5>
      </div>
      <div class="card col-8" style="padding: 2em; margin: auto;">      
        <form id="frmAction" action="function/solicitudInsertAjax.php" method="POST" data-form="insert" enctype="multipart/form-data" autocomplete="off">
          <div class="mb-3">
            <p>Formato para la elaboración de los Procedimientos Estandarizados de trabajo - PET para evaluación de protocolos de investigación de estudios observacionales/de intervención/ensayos clínicos<a href="assets/anexos/Anexo42.docx"> Descargar</a></p>
          </div>
          <div id="opciones" class="mb-3">
            <label for="tipoinvestigacion" class="form-label h5">Seleccione el Tipo de Estudio</label>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion1" value="Investigaciones que no se realizan sobre seres humanos, sus datos o sus muestras biológicas" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios1">
                Investigaciones que no se realizan sobre seres humanos, sus datos o sus muestras biológicas
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion2" value="Estudios transversales" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios1">
                Investigaciones que utilizan datos abiertos o públicos
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion3" value="Análisis secundario de datos consolidados o bases de datos anonimizadas obtenidos registros de existentes, que reposan en instituciones o establecimientos públicos o privados que cuentan con procesos estandarizados de anonimización o seudonimización de información de acuerdo con la Ley Orgánica de Protección de Datos Personales" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios1">
                Análisis secundario de datos consolidados o bases de datos anonimizadas obtenidos registros de existentes, que reposan en instituciones o establecimientos públicos o privados que cuentan con procesos estandarizados de anonimización o seudonimización de información de acuerdo con la Ley Orgánica de Protección de Datos Personales
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion4" value="Revisiones de políticas públicas y reglamentación" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios1">
                Revisiones de políticas públicas y reglamentación
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion5" value="Investigaciones que utilizan fuentes secundarias de literatura científica" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios1">
                Investigaciones que utilizan fuentes secundarias de literatura científica
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion6" value="Investigaciones que evalúen anónimamente el sabor y/o calidad de alimentos, o estudios de aceptación del consumidor" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios1">
                Investigaciones que evalúen anónimamente el sabor y/o calidad de alimentos, o estudios de aceptación del consumidor
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion7" value="Investigaciones que evalúen anónimamente programas públicos o prácticas educativas" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios1">
                Investigaciones que evalúen anónimamente programas públicos o prácticas educativas
              </label>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="tipoinvestigacion" id="tipoinvestigacion8" value="Investigaciones con recopilación de información de forma anónima, como cuestionarios, entrevistas anónimas, donde se registren datos que permitan la identificación de los participantes (datos personales), datos sensibles, población vulnerable, no se traten aspectos sensibles de su conducta" onclick="showInput()">
              <label class="form-check-label" for="exampleRadios1">
                Investigaciones con recopilación de información de forma anónima, como cuestionarios, entrevistas anónimas, donde se registren datos que permitan la identificación de los participantes (datos personales), datos sensibles, población vulnerable, no se traten aspectos sensibles de su conducta
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
              <label for="doc1" class="form-label">Solicitud de evaluación del Proyecto (<a href="assets/anexos/Anexo8.docx">anexo 11</a>)</label>
              <input type="file" id="doc1" name="doc1" class="form-control" accept=".pdf" required>              
            </div>
            <div class="mb-3">
              <label for="doc2" class="form-label">Formulario de consentimiento informado (<a href="assets/anexos/Anexo13.docx">anexo 13</a>)</label>
              <input type="file" id="doc2" name="doc2" class="form-control" accept=".pdf" required>
            </div>
            <div class="mb-4">
              <label for="doc3" class="form-label">Proyecto de investigación Observacional (<a href="assets/anexos/Anexo12.xlsx">anexo 12</a>)</label>
              <input type="file" id="doc3" name="doc3" class="form-control" accept=".pdf" required>
            </div>            
            <div class="mb-3">
              <label for="doc4" class="form-label">Hoja de Vida de los investigadores (<a href="assets/anexos/Anexo14.docx">anexo 14</a>)</label>
              <input type="file" id="doc4" name="doc4" class="form-control" accept=".pdf" required>
            </div>
            <div class="mb-3">
              <label for="doc5" class="form-label">Carta compromiso (<a href="assets/anexos/Anexo16.docx">anexo 16</a>)</label>              
              <input type="file" id="doc5" name="doc5" class="form-control" accept=".pdf" required>
            </div>                        
            <div class="mb-3">
              <label for="cartainteres" class="form-label">Carta de interés Institucional para estudios observacionales, estudios de intervención y ensayos clínicos en seres humanos (<a href="assets/anexos/Anexo15.docx">anexo 15</a>)</label>
              <input type="file" id="cartainteres" name="cartainteres" class="form-control" accept=".pdf" required>
            </div>

            <!-- Adicionales que no se van a usar -->
            <input type="file" id="doc6" name="doc6" class="form-control d-none" accept=".pdf">
            <input type="file" id="doc7" name="doc7" class="form-control d-none" accept=".pdf">
            <input type="file" id="protocolo" name="protocolo" class="form-control d-none" accept=".pdf">
            <input type="file" id="autorizacion" name="autorizacion" class="form-control d-none" accept=".pdf">
            <input type="file" id="declaracion" name="declaracion" class="form-control d-none" accept=".pdf">
            <input type="file" id="declaracion" name="declaracion" class="form-control d-none" accept=".pdf">

            <div class="mb-3">
              <label for="comprobante" class="form-label">Comprobante de Pago (<strong>$460.00</strong>) Universidades con convenio 50% de descuento de un salario básico</label>
              <input type="file" id="comprobante" name="comprobante" class="form-control" accept="image/image/png,image/jpeg" required>
            </div>
            <div class="mb-3">
              <div class="row">
              <div class="col-12">
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
  <style>
    a {
      color: blue;
    }
  </style>
</body>

</html>