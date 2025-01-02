<?php
session_start();

include("connection.php"); // Ensure this file exists and is correctly configured

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit; // Important to add exit to prevent further execution after redirect
}

// Fetch user details (replace with your actual database query)
$id = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
$result = mysqli_fetch_assoc($query); // Use mysqli_fetch_assoc for easier access
$res_username = $result['username'] ?? ''; // Use null coalescing operator for safety
$res_email = $result['email'] ?? '';
$res_id = $result['id'] ?? '';

//Error Handling for Database Connection:
if (!$query) {
    die("Error fetching user data: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Roberto Magalhães Silva - Médico de Família no Rio de Janeiro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css"> </head>

<body>

    <!-- navbar section -->
    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-chat"></i> Dr. Roberto Magalhães</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#inicio">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#servicos">Serviços</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sobre">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#consultorios">Consultórios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contato">Contato</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person"></i> <?php echo $res_username; ?>
                                </a>
                                <ul class="dropdown-menu mt-2 mr-0" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="edit.php?id=<?php echo $res_id; ?>">Editar Perfil</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!-- hero section  -->
        
    <header>
        <div class="container">
            <h1>Dr. Roberto Magalhães Silva</h1>
            <h2>Médico de Família e Comunidade</h2>
        </div>
    </header>

    <section id="inicio" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 text-content">
                    <h1>Médico de Família no Rio de Janeiro</h1>
                    <p>Sua saúde e bem-estar em boas mãos..
                    </p>
                    <button class="btn"><a href="#agendamento">Agende sua Consulta</a></button>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <img src="images/hero-image.png" alt="" class="img-fluid">
                </div>

            </div>
        </div>
    </section>

    <!-- services section  -->

    <section class="services-section" id="servicos">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-12 col-sm-12 services">

                    <div class="row row1">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="images/research.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Consulta Médica</h4>
                                    <p class="card-text">Atendimento individualizado para avaliação, diagnóstico e tratamento.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="images/brand.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Teleconsulta</h4>
                                    <p class="card-text">Consultas online para maior comodidade.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row row2">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="images/ux.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Atendimento Domiciliar</h4>
                                    <p class="card-text">Consultas em sua residência.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="images/app-development.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Consulta Clínico Geral</h4>
                                    <p class="card-text">Acompanhamento de condições crônicas.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 text-content">
                    <h3>Preços/h3>
                    <table>
                        <thead><tr><th>Serviço</th><th>Preço</th></tr></thead>
                        <tbody>
                            <tr><td>Consulta Médica</td><td>R$ 350</td></tr>
                            <tr><td>Teleconsulta</td><td>R$ 350</td></tr>
                            <tr><td>Atendimento Domiciliar</td><td>R$ 600</td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

    <!-- about section  -->

    <section class="about" id="sobre">
            <div class="container">
                <h2>Sobre o Dr. Roberto</h2>
                <p>O Dr. Roberto Magalhães Silva é um médico de família e comunidade apaixonado por cuidar da saúde integral de seus pacientes. Formado pela Universidade Federal de Viçosa (UFV) e com residência em Medicina de Família e Comunidade pela Secretaria Municipal de Saúde do Rio de Janeiro, ele possui ampla experiência no atendimento de pacientes de todas as idades.</p>
                <p>Com uma abordagem centrada na pessoa, o Dr. Roberto utiliza o método clínico centrado no paciente para entender as necessidades individuais de cada pessoa. Ele também é especialista em saúde mental, utilizando técnicas de psicoterapia breve, humanismo Rogeriano e Comunicação Não-Violenta para promover o bem-estar emocional de seus pacientes.</p>
                <p>Além disso, o Dr. Roberto é um prescritor qualificado de produtos à base de Cannabis, tendo recebido formação pela APEPI e certificação internacional pela WeCann Academy. Ele acredita no potencial terapêutico da Cannabis medicinal para o tratamento de diversas condições e está comprometido em oferecer essa opção de tratamento aos seus pacientes.</p>
                <h3>Experiência</h3>
                <ul>
                    <li>Eletivo na Rede de Atenção Psicossocial (RAPS) de Belo Horizonte</li>
                    <li>Residência na Clínica da Família Maria do Socorro (Rio de Janeiro)</li>
                </ul>
                <h3>Publicações</h3>
                <ul>
                    <li>"Fatores curriculares de maior impacto na qualidade de vida de estudantes de Medicina em uma Escola de Minas Gerais"</li>
                </ul>
            </div>
        </section>

    <!-- consultorios section  -->

    <section class="office-section" id="consultorios">
    <div class="container">
                <h2>Consultórios</h2>
                <!-- Office details -->
                <div class="office">
                    <h3>Saúde Humanista</h3>
                    <p>Rua General Olímpio Mourão Filho, Rio de Janeiro</p>
                    <!-- Google Maps iframe -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.169003256138!2d-43.20895248556144!3d-22.95191888501166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997f59b0416047%3A0x5b427e44279dd62f!2sR.%20Gen.%20Ol%C3%ADmpio%20Mour%C3%A3o%20Filho%2C%20Rio%20de%20Janeiro%20-%20RJ!5e0!3m2!1spt-BR!2sbr!4v1700775613820!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <p>Horário: Segunda a Sexta, das 9h às 18h</p>
                </div>
            </div>
    </section>

    <!-- contact section  -->

    <section class="contact-section" id="contato">
        <div class="container">

            <div class="row gy-4">

                <h1>contact us</h1>
                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Endereço</h3>
                                <p>Rua General Olímpio Mourão Filho, Rio de Janeiro</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Agendar Online</h3>
                                <p>+55 32 8860-1631<br>+55 32 8860-1631</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email</h3>
                                <p>contato@robertomagalhaesdoutor.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Horário</h3>
                                <p>Segunda a Sexta, das 9h às 18h</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 form">
                    <form action="contact.php" method="POST" class="php-email-form">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Seu Nome" required>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Seu Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Assunto" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="5" placeholder="Menssagem"
                                    required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" name="submit">Enviar Mensagem</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>

    <!-- footer section  -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <p class="logo"><i class="bi bi-chat"></i> Brag Spot</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <ul class="d-flex">
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#servicos">servicos</a></li>
                        <li><a href="#projetos">projetos</a></li>
                        <li><a href="#sobre">sobre</a></li>
                        <li><a href="#contato">contato</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-12 col-sm-12">
                    <p>&copy;2023_Dr. Roberto Magalhães</p>
                </div>

                <div class="col-lg-1 col-md-12 col-sm-12">
                    <!-- back to top  -->

                    <a href="#inicio" class="back-to-top d-flex align-items-center justify-content-center"><i
                            class="bi bi-arrow-up-short"></i></a>
                </div>

            </div>

        </div>

    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>
