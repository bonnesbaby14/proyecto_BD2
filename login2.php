<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Sistema escolar</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background: rgb(219, 226, 226);

        }.row{
            background: white;
            border-radius: 30px;
            box-shadow: 12px 12px 22px grey;
        }
        .img{
            display: block;
            margin: 0px auto;
        }
        .btn1{
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn1:hover{
            background: white;
            border: 1px solid;
            color: black;
        }

    </style>

  </head>
  <body>
   
  <section class="Form my-5 mx-4">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-5 pt-5">
                <img src="./images/logoceti.png" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7 px-5 pt-5">
                <h2 class="font-weight-bold py-3">Sistema Educativo ASE</h2>
                <h5>Inicia sesión con tu cuenta</h5>
                <form  action="veriflogin.php" method="post" class="formulario"> 
                <?php
                    if (isset($_GET['Message']))
                    echo $_GET['Message'];
                ?>

                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="text" name="txtCorreo" placeholder="Usuario" class="form-control my-3 p-4"> 
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password"  name="txtContra" placeholder="Contraseña" class="form-control my-3 p-4"> 
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-7">
                            <button type="submit" class="btn1 mt-3 mb-5">Iniciar Sesión</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
  </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>