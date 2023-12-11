<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PcExpress - Soluciones Tecnologicas</title>
    <link rel="icon" href="{{ asset('img/PC LOGO PX.png') }}" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const serviciosLink = document.querySelector(
          '.navbar-nav .nav-link[href="#Servicios"]'
        );
        const mrtiendaLink = document.querySelector(
          '.navbar-nav .nav-link[href="#MrTienda"]'
        );
        const mrtimbreLink = document.querySelector(
          '.navbar-nav .nav-link[href="#MrTimbre"]'
        );

        serviciosLink.addEventListener("click", function (event) {
          event.preventDefault();
          const serviciosSection = document.getElementById("servicios-section");
          serviciosSection.scrollIntoView({ behavior: "smooth" });
        });

        mrtiendaLink.addEventListener("click", function (event) {
          event.preventDefault();
          const mrtiendaSection = document.getElementById("mrtienda-section");
          mrtiendaSection.scrollIntoView({ behavior: "smooth" });
        });

        mrtimbreLink.addEventListener("click", function (event) {
          event.preventDefault();
          const mrtimbreSection = document.getElementById("mrtimbre-section");
          mrtimbreSection.scrollIntoView({ behavior: "smooth" });
        });
      });
    </script>

    <style>
      body {
        background-color: #1e1e1f;
      }
      .whatsapp-btn {
        position: fixed;
        bottom: 20px;
        left: 20px;
        background-color: #0c6efc; /* Color primario del botón de WhatsApp */
        color: #fff; /* Color del icono */
        width: 60px;
        height: 60px;
        border-radius: 50%;
        text-align: center;
        line-height: 60px;
        font-size: 24px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); /* Sombra */
        z-index: 1000; /* Para asegurarse de que esté por encima de otros elementos */
      }
      .navbar-dark .navbar-toggler-icon {
        background-color: #fff; /* Color del icono del botón del menú responsive */
      }
      .navbar-nav .nav-link {
        color: #fff; /* Color del texto del menú */
      }
      .navbar-nav .nav-link:hover {
        color: #0c6efc; /* Color del texto del menú al pasar el cursor */
      }
      .navbar-brand img {
        max-width: 100px; /* Ancho máximo del logo */
      }
      .bg-dark {
        background-color: #1e1e1f !important; /* Color de fondo del navbar */
      }
      .service-card .card-img-top {
        max-height: 200px; /* Altura máxima de la imagen de la tarjeta */
        object-fit: cover;
      }
      .service-card .card-title {
        color: #0c6efc; /* Color del título de la tarjeta */
      }
      .service-card .card-text {
        color: #1e1e1f; /* Color del texto de la tarjeta */
      }
      .text h2 a {
        color: #0c6efc; /* Color del enlace del título */
        text-decoration: none;
      }
      .text h2 a:hover {
        color: white; /* Color del enlace del título al pasar el cursor */
      }
      .container {
        background-color: #131312;
        padding: 1rem;
        border-radius: 1%;
      }
      .text p {
        color: white;
      }

      .card-body {
        background-color: #1e1e1f;
      }
      .accordion-body {
        background-color: #1e1e1f;
        color: white;
      }

      .accordion-item {
        background-color: #131312;
      }
      .accordion-button {
        background-color: #131312;
        color: white;
      }
      .accordion-button:not(.collapsed) {
        background-color: #1e1e1f;
        color: #0c6efc;
      }
      .accordion {
        --bs-border-color: black;
      }
      .card {
        --bs-card-bg: dddddd;
        padding: 1rem;
        margin: 1rem;
      }
      .navbar-dark .navbar-toggler-icon {
        background-color: #1e1e1f;
      }
    </style>
  </head>
  <body>
    <a
      href="https://api.whatsapp.com/send?phone=6121401985"
      target="_blank"
      class="whatsapp-btn"
    >
      <i class="fab fa-whatsapp"></i>
    </a>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img class="logo" src="{{ asset('img/PC LOGO PX.png') }}" alt="PC PcExpress" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#Servicios">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#MrTienda">MrTienda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#MrTimbre">MrTimbre</a>
          </li>
        </ul>
      </div>
      <div class="ml-auto">
        <a href="https://pcexpressadmin-wffil.ondigitalocean.app/">
          <button class="btn btn-outline-light" type="button">
            Iniciar Sesión
          </button>
        </a>
      </div>
    </nav>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            src="{{ asset('img/CORECCION FB.gif') }}"
            class="d-block w-100"
            alt="Placeholder Image 1"
          />
        </div>
        <div class="carousel-item">
          <img
            src="{{ asset('img/bannerpromo.gif') }}"
            class="d-block w-100"
            alt="Placeholder Image 2"
          />
        </div>
        <!-- Agrega más carousel-items según sea necesario -->
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExample"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExample"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div  class="container mt-4">
      <div class="row">
        <div class="col-12 text-center" style="color: #0c6efc">
          <h2>Productos en Venta</h2>
        </div>
        <div class="col-md-4">
          <div class="card service-card">
            <img src="{{asset('img/ASPIRE 3 GIF.gif')}}" class="img-fluid" alt="Service 1" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="card service-card">
            <img src="{{asset('img/ASUS.gif')}}" class="img-fluid" alt="Service 2" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="card service-card">
            <img src="{{asset('img/ASUS TUF.gif')}}" class="img-fluid" alt="Service 3" />
          </div>
        </div>
      </div>
    </div>

    <div id="mrtienda-section" class="container mt-4">
      <div class="row">
        <div class="col-md-6 bg-image">
          <img src="{{ asset('img/MR_TIENDA_TEXT.png') }}" class="img-fluid" alt="Imagen" />
        </div>
        <div class="col-md-6 text">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                >
                  Clientes
                </button>
              </h2>
              <div
                id="collapseOne"
                class="accordion-collapse"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <ul>
                    <li>Catalogo de clientes.</li>
                    <li>Clientes frecuentes.</li>
                    <li>Limite de Manejo de apartados y anticipos.</li>
                    <li>crédito a clientes.</li>
                    <li>Cotizaciones y re misiones.</li>
                    <li>Consulta de las ultimas compras del cliente.</li>
                    <li>Precios especiales a clientes</li>
                    <li>Acumulación de puntos en cada consumo</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  Operación
                </button>
              </h2>
              <div
                id="collapseTwo"
                class="accordion-collapse collapse"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <ul>
                    <li>100% amigable para el usuario.</li>
                    <li>Lectura de código de barras.</li>
                    <li>Manejo de monedas extranjeras.</li>
                    <li>Acepta múltiples formas de pago.</li>
                    <li>Consulta de precios y existencias.</li>
                    <li>Manejo de cuentas pendientes.</li>
                    <li>Recargas telefónicas.</li>
                    <li>Cobros de más de 200 servicios.</li>
                    <li>Lectura automática de básculas electrónicas.</li>
                    <li>Pago a proveedores.</li>
                    <li>Depósito de envases.</li>
                    <li>Cortes por cajero o cortes Z.</li>
                    <li>Devoluciones y cancelaciones.</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  Créditos por cobrar y pagar
                </button>
              </h2>
              <div
                id="collapseThree"
                class="accordion-collapse collapse"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <ul>
                    <li>Reporte de créditos por periodos.</li>
                    <li>Abonos por documentos.</li>
                    <li>Abonos al saldo total.</li>
                    <li>Permite agregar nuevos cargos.</li>
                    <li>Reporte de antigüedad de saldos.</li>
                    <li>Proyección de cobranza y pagos.</li>
                    <li>Generación de estados de cuenta.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="servicios-section" class="container mt-4">
      <div class="row">
      <div class="col-12 text-center" style="color: #0c6efc">
          <h2>Servicios</h2>
        </div>
        <div class="col-md-4">
          <div class="card service-card">
            <img
              src="{{ asset('img/FORMATEO CON RESPALDO.png') }}"
              class="img-fluid"
              alt="Service 1"
            />
            <div class="card-body">
              <h5 class="card-title">FORMATEO</h5>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card service-card">
            <img
              src="{{ asset('img/INSTALACION DE OFFICE.png') }}"
              class="img-fluid"
              alt="Service 2"
            />
            <div class="card-body">
              <h5 class="card-title">INSTALACION DE OFFICE</h5>

              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card service-card">
            <img
              src="{{ asset('img/INSTALACION DE WINDOWS.png') }}"
              class="img-fluid"
              alt="Service 3"
            />
            <div class="card-body">
              <h5 class="card-title">INSTALACION DE WINDOWS</h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="mrtimbre-section" class="container mt-4">
      <div class="row">
        <div class="col-md-6 text">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                >
                  Clientes
                </button>
              </h2>
              <div
                id="collapseOne"
                class="accordion-collapse"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <ul>
                    <li>Catalogo de clientes.</li>
                    <li>Clientes frecuentes.</li>
                    <li>Limite de Manejo de apartados y anticipos.</li>
                    <li>crédito a clientes.</li>
                    <li>Cotizaciones y re misiones.</li>
                    <li>Consulta de las ultimas compras del cliente.</li>
                    <li>Precios especiales a clientes</li>
                    <li>Acumulación de puntos en cada consumo</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  Operación
                </button>
              </h2>
              <div
                id="collapseTwo"
                class="accordion-collapse collapse"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <ul>
                    <li>100% amigable para el usuario.</li>
                    <li>Lectura de código de barras.</li>
                    <li>Manejo de monedas extranjeras.</li>
                    <li>Acepta múltiples formas de pago.</li>
                    <li>Consulta de precios y existencias.</li>
                    <li>Manejo de cuentas pendientes.</li>
                    <li>Recargas telefónicas.</li>
                    <li>Cobros de más de 200 servicios.</li>
                    <li>Lectura automática de básculas electrónicas.</li>
                    <li>Pago a proveedores.</li>
                    <li>Depósito de envases.</li>
                    <li>Cortes por cajero o cortes Z.</li>
                    <li>Devoluciones y cancelaciones.</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  Créditos por cobrar y pagar
                </button>
              </h2>
              <div
                id="collapseThree"
                class="accordion-collapse collapse"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <ul>
                    <li>Reporte de créditos por periodos.</li>
                    <li>Abonos por documentos.</li>
                    <li>Abonos al saldo total.</li>
                    <li>Permite agregar nuevos cargos.</li>
                    <li>Reporte de antigüedad de saldos.</li>
                    <li>Proyección de cobranza y pagos.</li>
                    <li>Generación de estados de cuenta.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 bg-image">
          <img src="{{ asset('img/MR timbre.png') }}" class="img-fluid" alt="Imagen" />
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
