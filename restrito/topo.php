<!DOCTYPE html>
<html>
    <head>
        <title>tcc</title>
        <meta charset="UTF-8">
        <!-- jQuery -->
        <script src="../tcc/lib/jquery/jquery-3.2.1.min.js"></script>
        
        <script src="../tcc/lib/js/scripts.js"></script>

        <!-- Bootstrap JavaScript -->
        <script src="../tcc/lib/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <!-- Owl JavaScript -->
        <script src="../tcc/lib/owlcarousel/docs/assets/owlcarousel/owl.carousel.min.js"></script>        
        
        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="../tcc/lib/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="../tcc/lib/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
        <!--Owl CSS -->
        <link rel="stylesheet" href="../tcc/lib/owlcarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../tcc/lib/owlcarousel/dist/assets/owl.theme.default.min.css">
        
        <!--site CSS -->
        <link rel="stylesheet" type="text/css" href="../tcc/css/style.css">
        
        <!-- fontes site -->
        <link rel="stylesheet" type="text/css" href="../tcc/lib/fonte/stylesheet.css">

        <!-- fontes icons  -->
        <link rel="stylesheet" href="../tcc/lib/fonte/font-awesome-4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <script type="text/javascript">
            verificaCompatibilidade();
        </script> 
        <?php
            if(empty($_SESSION['usuarioLogado'])) {
                include_once('login.php');
            } else {
                include_once('usuario.php');
            }
        ?>
        <div class="topo">
            <div>
                <div class="logo">Dynamic Display</div>
                <div class="login" data-toggle="modal" data-target=".bs-example-modal-lg">
                    <span class="glyphicon glyphicon-user"></span> Olá 
                    <?php
                    if(!empty($_SESSION['usuarioLogado'])) echo $_SESSION['usuarioLogado']['usuario'];
                    else echo "Visitante";
                    ?>
                </div>
            </div>
        </div>
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/tcc/index">Home</a></li>
                        <li><a href="/tcc/talk">Talk</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>      
                </div>
            </div>
        </nav>
        <div class="conteudo">
