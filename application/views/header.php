  <!DOCTYPE html>
  <html lang="en">

  <head>
     <!-- basic -->
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- mobile metas -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="initial-scale=1, maximum-scale=1">
     <!-- site metas -->
     <title>Epagal</title>
     <meta name="keywords" content="">
     <meta name="description" content="">
     <meta name="author" content="">
     <!-- site icon -->
     <link rel="icon" type="image/x-icon" href="../assets/images/epagal.jpeg" />

     <!-- site icon -->
     <link rel="icon" href="<?php echo base_url('assets/images/epagal.jpeg') ?>" type="image/png" />
     <!--TODO: Sweet alert-->
     <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
     <!--TODO: API GOOGLE -->
     <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxuIEYr6QvIHH0hRbPF6oHcpoc2dWpdG8&libraries=places&callback=initMap"></script>
     <script src="<?php echo base_url('assets/js/sweet.js') ?>"></script>
     <!--File input-->
     <link rel="stylesheet" href="<?php echo base_url('assets/library/file-input/file-input.min.css'); ?>" />
     <script src="<?php echo base_url('assets/library/file-input/file-input.min.js'); ?>"></script>

     <!-- Jquery Validate -->
     <script src="<?php echo base_url('assets/library/jquery-validate/jquery.validate.js'); ?>"></script>
     <!--data table -->
     <link rel="stylesheet" href="<?php echo base_url('assets/library/data-table/data-table.min.css'); ?>" />

     <!--Table data settings-->
     <script src="<?php echo base_url('assets/js/table.js'); ?>"></script>

     <!-- datatable reportes -->
     <script src="<?php echo base_url('assets/library/data-table/data-table.min.js'); ?>"></script>
     <script src="<?php echo base_url('assets/library/data-table/data-botones.min.js'); ?>"></script>
     <script src="<?php echo base_url('assets/library/data-table/data-print.min.js'); ?>"></script>
     <script src="<?php echo base_url('assets/library/data-table/data-pdf.min.js'); ?>"></script>
     <script src="<?php echo base_url('assets/library/data-table/data-pdf-make.min.js'); ?>"></script>
     <script src="<?php echo base_url('assets/library/data-table/data-botones-html.min.js'); ?>"></script>

     <!-- bootstrap css -->
     <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
     <!-- site css -->
     <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>" />
     <!-- responsive css -->
     <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css') ?>" />
     <!-- color css -->
     <link rel="stylesheet" href="<?php echo base_url('assets/css/colors.css') ?>" />
     <!-- select bootstrap -->
     <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-select.css') ?>" />
     <!-- scrollbar css -->
     <link rel="stylesheet" href="<?php echo base_url('assets/css/perfect-scrollbar.css') ?>" />
     <!-- custom css -->
     <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css') ?>" />
     <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css') ?>" />
     <link rel="stylesheet" href="<?php echo base_url('assets/css/flaticon.css') ?>" />
     <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



        <style>
            /* Cambiar el color de fondo del menú lateral */
            #sidebar {
                background-color: #00aaff; /* Color celeste */
            }

            /* Cambiar el color de fondo de la barra superior */
            .topbar {
                background-color: #00aaff; /* Color celeste */
            }

            /* Cambiar el color de fondo de la sección de usuario en el menú lateral */
            .sidebar_user_info {
                background-color: #00aaff; /* Color celeste */
            }

            /* Cambiar el color de fondo de los enlaces en el menú lateral al hacer hover */
            #sidebar ul li a:hover {
                background-color: #66ccff; /* Color celeste más claro */
            }

            /* Cambiar el color de fondo de los enlaces activos en el menú lateral */
            #sidebar ul li.active > a {
                background-color: #66ccff; /* Color celeste más claro */
            }

            /* Cambiar el color de fondo de la palabra "General" */
            .sidebar_blog_2 h4 {
                background-color: #00aaff; /* Color celeste */
                color: white; /* Color del texto en blanco para contraste */
                padding: 10px; /* Espaciado interno para mejorar la apariencia */
                margin: 0; /* Eliminar márgenes */
            }

            .sidebar_blog_2 h4 {
                background-color: #00aaff !important; /* Color celeste con !important */
                color: white;
                padding: 10px;
                margin: 0;
            }

            .rounded-circle {
                border-radius: 50%;
            }

            .notification {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background-color: #f44336; /* Color rojo */
                color: white;
                padding: 15px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
                z-index: 9999;
                display: none;
            }

            <style>
                /* Cambiar el color de fondo de la barra superior */
                .topbar {
                    background-color: #00aaff; /* Color celeste */
                    color: #fff; /* Color del texto para contraste */
                    padding: 0; /* Elimina el espaciado interno */
                    margin-left: 20px; /* Ajusta el margen izquierdo según tus necesidades */
                    margin-right: auto; /* Asegura que se alinee a la izquierda */
                    box-shadow: none; /* Elimina la sombra */
                    z-index: 1000; /* Asegura que esté encima de otros elementos */
                    max-width: 1200px; /* Ajusta el ancho máximo según tus necesidades */
                    width: 100%; /* Asegura que ocupe el ancho especificado */
                    box-sizing: border-box; /* Incluye padding y border en el ancho total */
                }

                .topbar .navbar {
                    background-color: transparent; /* Fondo transparente para que el color celeste de .topbar sea visible */
                    padding: 0; /* Elimina el padding predeterminado para mantener el espaciado de .topbar */
                    margin: 0; /* Elimina el margen */
                }

                .topbar .navbar .full {
                    display: flex; /* Usa flexbox para alinear elementos horizontalmente */
                    justify-content: space-between; /* Distribuye espacio entre elementos */
                    align-items: center; /* Alinea verticalmente al centro */
                    margin: 0; /* Elimina el margen */
                    padding: 0; /* Elimina el padding */
                }

                .topbar .logo_section img {
                    max-height: 50px; /* Ajusta el tamaño máximo de la imagen del logo */
                    margin: 0; /* Elimina el margen */
                    padding: 0; /* Elimina el padding */
                }

                .topbar .right_topbar {
                    display: flex; /* Usa flexbox para alinear elementos horizontalmente */
                    align-items: center; /* Alinea verticalmente al centro */
                    margin: 0; /* Elimina el margen */
                    padding: 0; /* Elimina el padding */
                }

                .topbar .user_profile_dd {
                    list-style: none; /* Elimina los puntos de la lista */
                    margin: 0; /* Elimina el margen */
                    padding: 0; /* Elimina el padding */
                }

                .topbar .user_profile_dd a {
                    color: #fff; /* Color del texto dentro del dropdown */
                    margin: 0; /* Elimina el margen */
                    padding: 0; /* Elimina el padding */
                }


                /* Cambiar el color de fondo del menú desplegable a celeste */
                .collapse {
                    background-color: #00aaff !important; /* Color celeste con !important para asegurar la prioridad */
                }

                /* Cambiar el color de los iconos a oscuro */
                .dark_icon {
                    color: #333; /* Color gris oscuro para los iconos */
                }

                /* Cambiar el color de fondo de los enlaces en el menú desplegable */
                ul.collapse li a {
                    color: #333; /* Color del texto en los enlaces del menú desplegable */
                    display: block; /* Asegura que el enlace ocupe todo el espacio del elemento */
                }

                /* Cambiar el color de fondo de los enlaces activos en el menú desplegable */
                ul.collapse li a:hover {
                    background-color: #66ccff; /* Color celeste más claro para hover */
                    color: #333; /* Color del texto al hacer hover */
                }


                /* Cambiar el color de fondo del menú desplegable a celeste */
                  .collapse {
                      background-color: #00aaff !important; /* Color celeste con !important para asegurar la prioridad */
                  }

                  /* Cambiar el color de los íconos a tonos oscuros */
                  .dark_blue_color {
                      color: #003366; /* Color azul oscuro */
                  }

                  .blue_color {
                      color: #003366; /* Color azul oscuro */
                  }

                  .green_color {
                      color: #003366; /* Color azul oscuro */
                  }

                  /* Cambiar el color de fondo de los enlaces en el menú desplegable */
                  ul.collapse li a {
                      color: #003366; /* Color del texto en los enlaces del menú desplegable */
                      display: block; /* Asegura que el enlace ocupe todo el espacio del elemento */
                  }

                  /* Cambiar el color de fondo de los enlaces activos en el menú desplegable */
                  ul.collapse li a:hover {
                      background-color: #66ccff; /* Color celeste más claro para hover */
                      color: #003366; /* Color del texto al hacer hover */
                  }


                  /* Cambiar el color de fondo del botón de la barra lateral a verde oscuro */
                  #sidebarCollapse {
                      background-color: #004d00; /* Verde oscuro */
                      color: #fff; /* Color del texto e íconos (blanco para contraste) */
                      border: none; /* Eliminar el borde del botón */
                  }

                  /* Eliminar el efecto de cambio de color al pasar el cursor */
                  #sidebarCollapse:hover {
                      background-color: #004d00; /* Mantener el verde oscuro */
                  }



        </style>


  </head>

  <body class="dashboard dashboard_1">
     <div class="full_container">
        <div class="inner_container">
           <!-- Sidebar  -->
           <nav id="sidebar">
              <div class="sidebar_blog_1">
                 <div class="sidebar-header">
                   <div class="logo_section">
                       <a href="index.html">
                           <img class="logo_icon img-responsive rounded-circle"
                                src="<?php echo base_url('assets/images/layout_img/logo_epa.jpeg') ?>"
                                alt="#" />
                       </a>
                   </div>

                 </div>
                 <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">
                       <div class="user_img"><img class="img-responsive"
                             src="<?php echo base_url('assets/images/layout_img/logo_epa.jpeg') ?>  " alt="#" /></div>
                       <div class="user_info">
                          <h6>Epagal</h6>
                          <p><span class="online_animation"></span> Online</p>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="sidebar_blog_2">
                 <h4>General</h4>
                 <ul class="list-unstyled components">
                    <li><a href="<?php echo site_url('inicio') ?>"><i class="fa fa-clock-o orange_color"></i>
                          <span>Inicio</span></a>
                    </li>
                    <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-road dark_icon"></i> <span>Rutas</span>
                        </a>
                        <ul class="collapse list-unstyled" id="element">
                            <li>
                                <a href="<?php echo site_url('rutas/index') ?>">
                                    <i class="fa fa-list dark_icon"></i> <span>Total Rutas</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('rutas/nuevo') ?>">
                                    <i class="fa fa-plus-circle dark_icon"></i> <span>Agregar</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                       <a href="#element2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                          <i class="fa fa-recycle dark_blue_color"></i> <span>Ecotachos</span>
                       </a>
                       <ul class="collapse list-unstyled" id="element2">
                          <li>
                             <a href="<?php echo site_url('ecotachos/index') ?>">
                                <i class="fa fa-list dark_blue_color"></i> <span>Total Ecotachos</span>
                             </a>
                          </li>

                          <li>
                              <a href="<?php echo site_url('occidental/occidental') ?>">
                                  <i class="fa fa-globe blue_color"></i> <span>Mapa Occidental</span>
                              </a>
                          </li>
                          <li>
                              <a href="<?php echo site_url('oriental/oriental') ?>">
                                  <i class="fa fa-map-signs blue_color"></i> <span>Mapa Oriental</span>
                              </a>
                          </li>
                          <li>
                              <a href="<?php echo site_url('nocturna/nocturna') ?>">
                                  <i class="fa fa-moon-o green_color"></i> <span>Mapa Nocturna</span>
                              </a>
                          </li>
                       </ul>
                    </li>


                    <li>
                       <a href="<?php echo site_url('ecotachos/mapa') ?>">
                          <i class="fa fa-map green_color"></i>
                          <span>Mapa General</span>
                       </a>
                    </li>
                 </ul>
              </div>
           </nav>
           <div id="content">
              <!-- topbar -->
              <div class="topbar custom-topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="full">
                       <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i
                             class="fa fa-bars"></i></button>
                       <div class="logo_section">
                          <a href="<?php echo site_url('inicio') ?>"><img class="img-responsive"
                                src="<?php echo base_url('uploads/cooperativas/logo_epagal.png') ?>" alt="#" /></a>
                       </div>
                       <div class="right_topbar">
                           <div class="icon_info">
                               <ul class="user_profile_dd d-block d-sm-block d-md-block d-lg-block d-xl-block">
                                   <li>
                                       <a class="dropdown-toggle" data-toggle="dropdown">
                                           <img class="img-responsive rounded-circle"
                                                src="<?php echo base_url('assets/images/layout_img/logo_epa.jpeg') ?>" alt="Epagal" />
                                           <span class="name_user">Epagal</span>
                                       </a>
                                       <div class="dropdown-menu">
                                           <a class="dropdown-item" href="<?php echo site_url('logout') ?>">
                                               <span>Salir</span> <i class="fa fa-sign-out"></i>
                                           </a>
                                       </div>
                                   </li>
                               </ul>
                           </div>
                       </div>

                    </div>
                 </nav>
              </div>

              <?php if ($this->session->flashdata('mensaje')): ?>
                 <script>
                    Swal.fire({
                       icon: "success",
                       title: "<b style='color:#000;'>Perfecto<b>",
                       text: "<?php echo $this->session->flashdata('mensaje'); ?>"
                    });
                 </script>
                 <?php $this->session->set_flashdata('mensaje'); ?>
              <?php endif ?>

                       <div class="notification" id="notification">
                           <!-- Notificación -->
                           <div id="notificationContent"></div>
                       </div>

              <!-- jQuery -->
          <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
          <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
          <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
          <!-- wow animation -->
          <script src="<?php echo base_url('assets/js/animate.js') ?>"></script>
          <!-- select country -->
          <script src="<?php echo base_url('assets/js/bootstrap-select.js') ?>"></script>
          <!-- owl carousel -->
          <script src="<?php echo base_url('assets/js/owl.carousel.js') ?>"></script>
          <!-- chart js -->
          <script src="<?php echo base_url('assets/js/Chart.min.js') ?>"></script>
          <script src="<?php echo base_url('assets/js/Chart.bundle.min.js') ?>"></script>
          <script src="<?php echo base_url('assets/js/utils.js') ?>"></script>
          <script src="<?php echo base_url('assets/js/analyser.js') ?>"></script>
          <!-- nice scrollbar -->
          <script src="<?php echo base_url('assets/js/perfect-scrollbar.min.js') ?>"></script>
          <script>
              var ps = new PerfectScrollbar('#sidebar');
          </script>
          <!-- custom js -->
          <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>

          <!-- Notificaciones -->
          <script>
              // Mostrar notificación si un ecotacho está lleno
              function showNotification(ecotacho) {
                  var notification = document.getElementById('notification');
                  var notificationContent = document.getElementById('notificationContent');
                  notificationContent.innerHTML = 'El ecotacho ' + ecotacho.codigo + ' está lleno en ' + ecotacho.direccion + '.';
                  notification.style.display = 'block';

                  // Ocultar notificación después de 5 segundos
                  setTimeout(function () {
                      notification.style.display = 'none';
                  }, 5000);
              }

              // Ejemplo de ecotacho lleno
              var ecotacho = {
                  codigo: '0001',
                  latitud: '-0.9237586383777363',
                  longuitud: '-78.61460742454449',
                  ruta: '1'
              };

              // Llamar a la función para mostrar la notificación (esto se puede cambiar según la lógica real)
              showNotification(ecotacho);
          </script>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script>
              $(document).ready(function() {
                  // Manejar clic en los enlaces del menú para abrir o cerrar los submenús
                  $('#sidebar a[data-toggle="collapse"]').on('click', function(e) {
                      e.preventDefault();
                      var target = $(this).attr('href');
                      $(target).collapse('toggle');
                  });

                  // Cerrar el panel si se hace clic fuera del mismo
                  $(document).on('click', function(e) {
                      if (!$(e.target).closest('#sidebar, #sidebarCollapse').length) {
                          $('.collapse').collapse('hide');
                      }
                  });

                  // Para asegurarse de que los elementos de los submenús no se cierren automáticamente
                  $('#sidebar').on('click', function(e) {
                      e.stopPropagation();
                  });
              });

              $(document).ready(function() {
              $('.dropdown-toggle').dropdown();

              $('.dropdown-toggle').on('click', function() {
                  $(this).next('.dropdown-menu').toggle();
              });
          });

            </script>


      </body>

      </html>
