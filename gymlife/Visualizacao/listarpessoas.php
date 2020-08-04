<!DOCTYPE html>
<html lang="zxx">
<head>
	<?php
		session_start();
		include_once('../Persistencia/ConexaoBD.php');
		include_once('../Modelo/Pessoa.php');
		include_once('../Controle/PessoaDAO.php');
		$conexao = new ConexaoBD();
		$conexao = $conexao->abreConexao();
		$pessoaDAO = new PessoaDAO();
		$pessoaDAO->implementaRestricao($_SESSION['login'], $_SESSION['cargo']);
	?>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | Listar Pessoas</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

	<!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script>
		function myFunction() {
			// Declare variables
			var input, filter, table, tr, td, i;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("myTable");
			tr = table.getElementsByTagName("tr");

			// Loop through all table rows, and hide those who don't match the search query
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[0];
				if (td) {
					if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}
			}
		}
	</script>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
	<div class="offcanvas-menu-overlay"></div>
	<div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
            <li><a href="./index.php">Início</a></li>
                <li><a href="./about-us.php">Sobre nós</a></li>
                <li><a href="./aulas.php">Aulas</a></li>
                <li><a href="./modalidades.php">Modalidades</a></li>
                <li><a href="./team.php">Nossa equipe</a></li>
                <li><a href="./imc.php">IMC</a></li>
                <li><a href="./menu.php">Menu</a></li>
				<?php
				   include_once('../Persistencia/ConexaoBD.php');
				   include_once('../Modelo/Pessoa.php');
				   include_once('../Controle/PessoaDAO.php');
				   $conexao = new ConexaoBD();
				   $conexao = $conexao->abreConexao();
				   $pessoaDAO = new PessoaDAO();
				   $pessoaDAO->implementaMenu($_SESSION['login'], $_SESSION['cargo']);
			   ?>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
			<a href="../Controle/logout.php">Log Out</a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
	<header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="../img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li><a href="./index.php">Início</a></li>
                            <li><a href="./about-us.php">Sobre nós</a></li>
                            <li><a href="./aulas.php">Aulas</a></li>
                            <li><a href="./modalidades.php">Modalidades</a></li>
                            <li><a href="./team.php">Nossa equipe</a></li>
                            <li><a href="./imc.php">IMC</a></li>
                            <li><a href="./menu.php">Menu</a></li>
							<?php
							   include_once('../Persistencia/ConexaoBD.php');
							   include_once('../Modelo/Pessoa.php');
							   include_once('../Controle/PessoaDAO.php');
							   $conexao = new ConexaoBD();
							   $conexao = $conexao->abreConexao();
							   $pessoaDAO = new PessoaDAO();
							   $pessoaDAO->implementaMenu($_SESSION['login'], $_SESSION['cargo']);
						   ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <div class="to-social">
							<a href="../Controle/logout.php">Log Out</a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="../img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>LISTAR PESSOAS</h2>
                        <div class="bt-option">
                            <a href="./index.php">Início</a>
                            <a href="./listar.php">Listar</a>
                            <span>Listar Pessoas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
			<div class="section-title contact-title">
						<span>Visualize as pessoas cadastradas</span>
					</div>
            <div class="row">
				<div class="col-lg-12 col-md-12">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="../img/clients-4.jpg" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="leave-comment">
                        <form action="#" method="post" name="frmLogin">
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Procurar por nome da Pessoa">
                        </form>
                        <div class="row">
							<div class="col-lg-12">
								<div class="class-timetable">
									<table id="myTable">
										<thead>
										<tr>
											<!--<th>Para ativar coluna diferente</th>-->
											<th>Nome</th>
											<th>Tipo do Cadastro</th>
											<th>CPF</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Data de Nascimento</th>
											<th>Alterar</th>
											<th>Excluir</th>
										</tr>
										</thead>
										<tbody>
												<?php
													require('../Persistencia/phpConexaoBD.php');                
													$sql = 'SELECT * FROM Pessoa ORDER BY Nome ASC';
													$tabela = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

													while($linha=mysqli_fetch_row($tabela)){
														if($linha[7]=='C'){
															$cargo = 'Cliente';
														}else{
															$cargo = 'Instrutor';
														}

														echo '<tr>
																<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[2]).'</h5></td>
																<td class="dark-bg hover-dp ts-meta"><h5>'.$cargo.'</h5></td>
																<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[1]).'</h5></td>
																<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[3]).'</h5></td>
																<td class="hover-dp ts-meta"><h5>'.htmlentities($linha[4]).'</h5></td>
																<td class="dark-bg hover-dp ts-meta"><h5>'.htmlentities($linha[5]).'</h5></td>
																<td class="hover-dp ts-meta"><h5><center><a href="alterarpessoa.php?codigo='.$linha[0].'"><b>&#9997;</b></a></h5></td>
																<td class="dark-bg hover-dp ts-meta"><h5><center><a href="phpExcluirPessoa.php?codigo='.$linha[0].'"><b>&#10006;</b></a></h5></td>
															</tr>';
													}
												?>
											</tr>-->
										</tbody>
									</table>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Get In Touch Section Begin -->
    <div class="gettouch-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-map-marker"></i>
                        <p>333 Middle Winchendon Rd, Rindge,<br/> NH 03461</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-mobile"></i>
                        <ul>
                            <li>125-711-811</li>
                            <li>125-668-886</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text email">
                        <i class="fa fa-envelope"></i>
                        <p>Support.gymcenter@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Get In Touch Section End -->

    <!-- Footer Section Begin -->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <a href="#"><img src="../img/logo.png" alt=""></a>
                        </div>
                        <p>Com você para uma vida mais saudável, feliz e de bem consigo mesmo.
                            Venha nos fazer um visita.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Links úteis</h4>
                        <ul>
                            <li><a href="./about-us.php">Sobre nós</a></li>
                            <li><a href="./aulas.php">Aulas</a></li>
                            <li><a href="./modalidades.php">Modalidades</a></li>
							<?php
								include_once('../Persistencia/ConexaoBD.php');
								include_once('../Modelo/Pessoa.php');
								include_once('../Controle/PessoaDAO.php');
								$conexao = new ConexaoBD();
								$conexao = $conexao->abreConexao();
								$pessoaDAO = new PessoaDAO();
								$pessoaDAO->implementaRodape($_SESSION['login']);
				            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
	<script src="../js/jquery-1.12.4.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/masonry.pkgd.min.js"></script>
    <script src="../js/jquery.barfiller.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
</html>
