<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Director</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .midde_cont {
            margin: 20px;
        }
        .container-fluid {
            padding: 0 15px;
        }
        .row {
            margin-bottom: 20px;
        }
        .blue_bg {
            background-color: #66ccff; /* Color celeste */
            padding: 20px;
            border-radius: 5px;
        }
        .green_bg {
            background-color: #004d00; /* Verde oscuro */
            padding: 20px;
            border-radius: 5px;
            color: #fff;
        }
        .heading1 h2 {
            font-weight: bold; /* Letras más gruesas */
            text-align: center; /* Centra el texto */
        }
        .icon {
            font-size: 24px; /* Tamaño del icono */
            color: #fff; /* Color del icono */
            margin-right: 10px; /* Espacio entre icono y texto */
        }
        .testimonial {
            font-weight: bold; /* Letras más gruesas */
        }
        .carousel-inner img {
            width: 100%;
            height: 600px; /* Ajusta según tus necesidades */
            object-fit: cover; /* Asegura que la imagen cubra el área sin distorsionarse */
        }
        .director_info {
            display: flex;
            align-items: flex-start;
            margin-top: 100px;
            justify-content: center; /* Centra horizontalmente el contenido */
            flex-wrap: wrap; /* Permite que el contenido se ajuste en pantallas pequeñas */
        }
        .director_image {
            border-radius: 10px;
            width: 300px; /* Ajusta según tus necesidades */
            height: 350px; /* Ajusta según tus necesidades */
            margin-right: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .director_text {
            background-color: #f9f9f9;
            padding: 20px;
            border: 2px solid #004d00;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 600px; /* Ajusta según tus necesidades */
            text-align: center; /* Centra el texto */
        }
        .director_info h1 {
            color: #004d00; /* Verde oscuro para el nombre */
            font-size: 2.5rem; /* Tamaño grande del texto */
            font-family: 'Arial', sans-serif; /* Fuente específica */
            margin-bottom: 10px;
        }
        .director_info h2 {
            color: #004d00; /* Verde oscuro para el título */
            font-size: 1.5rem; /* Tamaño moderado del texto */
            font-family: 'Arial', sans-serif; /* Fuente específica */
            font-style: italic; /* Cursiva */
            margin-bottom: 30px;
        }
        .director_info img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const directorData = [
                {
                    image: 'https://epagal.gob.ec/wp-content/uploads/2023/10/WhatsApp-Image-2023-10-30-at-12.25.25-1158x1536.jpeg',
                    name: 'EDISON AMILCAR PARRA PAZMIÑO',
                    title: 'Director de Epagal',
                    bio: `Edison Amílcar Parra Pazmiño, Latacungueño oriundo del Barrio Monte Redondo, con una mentalidad de ser parte de una Latacunga Bonita, una ciudad ¡A LA ALTURA DE NUESTROS SUEÑOS!<br>
                    Sus estudios secundarios los curso en el Colegio “Vicente León”, graduándose como Bachiller en la Especialidad de Físico Matemático.<br>
                    Es Licenciado en Administración, título superior alcanzado en la Universidad Central del Ecuador, cursó otra carrera obteniendo el título superior de: Ingeniero en Empresas.<br>
                    Master en Gestión de la Producción, título obtenido en la “Universidad Técnica de Cotopaxi”. Como logro académico, participó en el curso de: “Cambio Climático” de la Universidad de Chile.<br>
                    Curso de Lean Manofactury. Curso de Six sigma.`
                },
                {
                    image: 'https://www.latacunga.gob.ec/images/foto_alcalde_2023_2027-01.png',
                    name: 'Cristian Fabricio Tinajero Jiménez',
                    title: 'Alcalde de Latacunga',
                    bio: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkSDcziZmXPJR3RXPCmRJbEubr3U6qZv3PIA&s' /* URL de la imagen que se mostrará */
                }
            ];

            function updateDirectorInfo(index) {
                const director = directorData[index];
                document.querySelector('.director_image').src = director.image;
                document.querySelector('.director_text h1').textContent = director.name;
                document.querySelector('.director_text h2').textContent = director.title;

                // Si la biografía es una URL de imagen, mostrar la imagen
                const bioElement = document.querySelector('.director_text p');
                if (director.bio) {
                    if (director.bio.startsWith('http')) {
                        bioElement.innerHTML = `<img src="${director.bio}" alt="Imagen del Alcalde">`;
                    } else {
                        bioElement.innerHTML = director.bio;
                    }
                } else {
                    bioElement.innerHTML = '';
                }
            }

            $('#imageCarousel').on('slid.bs.carousel', function () {
                const activeIndex = $('#imageCarousel .carousel-item.active').index();
                updateDirectorInfo(activeIndex);
            });

            // Initialize with the first director info
            updateDirectorInfo(0);
        });
    </script>
</head>
<body>
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title text-center">
                        <h2>Bienvenidos a la página de Epagal <i class="fas fa-trash-alt"></i></h2>
                    </div>
                </div>
            </div>
            <div class="row column3">
                <!-- Carrusel de imágenes -->
                <div class="col-md-12">
                      <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                              <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                              <li data-target="#imageCarousel" data-slide-to="1"></li>
                              <li data-target="#imageCarousel" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <img src="https://scontent.fuio35-1.fna.fbcdn.net/v/t39.30808-6/451677908_461053413303900_2123175413742815834_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeGTe94MtGWNTpVkQNFiBMmaDH2Yo3OoLk8MfZijc6guT8FxTuVvbR-FoLnBnM3YFZWNy3G_Kbymbv55_yM82mMP&_nc_ohc=QZNOMtxDt50Q7kNvgGcrnWd&_nc_ht=scontent.fuio35-1.fna&oh=00_AYB5q3t0uxIP7x4Kzdp6fB0iePkeskkeLcLZxUk38F6XGw&oe=66B22B14" alt="Imagen 1">
                              </div>
                              <div class="carousel-item">
                                  <img src="https://scontent.fuio35-1.fna.fbcdn.net/v/t39.30808-6/451273216_461053379970570_2125149680507221789_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeHn7VdNWPrYopIIchTmMC6bTTeWyUhkxTxNN5bJSGTFPFEms-oo9bRaEkVYFBBy5luZyNouNxr-Yp364bClM5r0&_nc_ohc=sqSkkKWTw8MQ7kNvgHZeKX5&_nc_ht=scontent.fuio35-1.fna&oh=00_AYDGOP1RHd_VND7WxrrS3wXFSaEgS7ADztMsr14Aa3dGRg&oe=66B21786" alt="Imagen 2">
                              </div>
                              <div class="carousel-item">
                                  <img src="https://scontent.fuio35-1.fna.fbcdn.net/v/t39.30808-6/451688128_461048616637713_577301391104121379_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeGIhMJXXRYLcqxUCmUBjJVRLM8EaYug0E0szwRpi6DQTR6C5Unxic_XUZI_FiAk4L9Yp9_qbSG0bnsoQZjiO8EQ&_nc_ohc=Wj4Hm7j1VfgQ7kNvgGV7WWr&_nc_ht=scontent.fuio35-1.fna&oh=00_AYAQHSiKqW2GNS4jg5vgjgBTrGO5yMLGeGZX46J98iHQMQ&oe=66B23402" alt="Imagen 3">
                              </div>
                          </div>
                        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Información del Director -->
            <div class="row">
                <div class="col-md-12 director_info">
                    <img src="" class="director_image" alt="Imagen del Director">
                    <div class="director_text">
                        <h1></h1>
                        <h2></h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
