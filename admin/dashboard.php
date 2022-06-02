<?php
/* session_start(); 
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');
} 


include("../config/db.php");  */ ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title>Dashboard</title>

    <style>

*{
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

h1{
  font-size: 2.5rem;
  font-family: 'Montserrat';
  font-weight: normal;
  color: #444;
  text-align: center;
  margin: 0rem 0;
}

.wrapper{
  width: 90%;
  margin: 0 auto;
  max-width: 80rem;
}

.cols{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}

.col{
  width: calc(25% - 2rem);
  margin: 1rem;
  cursor: pointer;
}

.container{
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
	-webkit-perspective: 1000px;
	        perspective: 1000px;
}

.front,
.back{
  background-size: cover;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.25);
  border-radius: 10px;
	background-position: center;
	-webkit-transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
	transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
	-o-transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
	transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
	transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1), -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
	-webkit-backface-visibility: hidden;
	        backface-visibility: hidden;
	text-align: center;
	min-height: 280px;
	height: auto;
	border-radius: 10px;
	color: #fff;
	font-size: 1.5rem;
}

.back{
  background: #cedce7;
  background: -webkit-linear-gradient(45deg,  #cedce7 0%,#596a72 100%);
  background: -o-linear-gradient(45deg,  #cedce7 0%,#596a72 100%);
  background: linear-gradient(45deg,  #cedce7 0%,#596a72 100%);
}

.front:after{
	position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    width: 100%;
    height: 100%;
    content: '';
    display: block;
    opacity: .6;
    background-color: #000;
    -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
    border-radius: 10px;
}
.container:hover .front,
.container:hover .back{
    -webkit-transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
    transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
    -o-transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
    transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
    transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1), -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
}

.back{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
}

.inner{
    -webkit-transform: translateY(-50%) translateZ(60px) scale(0.94);
            transform: translateY(-50%) translateZ(60px) scale(0.94);
    top: 50%;
    position: absolute;
    left: 0;
    width: 100%;
    padding: 2rem;
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
    outline: 1px solid transparent;
    -webkit-perspective: inherit;
            perspective: inherit;
    z-index: 2;
}

.container .back{
    -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
    -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
}

.container .front{
    -webkit-transform: rotateY(0deg);
            transform: rotateY(0deg);
    -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
}

.container:hover .back{
  -webkit-transform: rotateY(0deg);
          transform: rotateY(0deg);
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}

.container:hover .front{
  -webkit-transform: rotateY(-180deg);
          transform: rotateY(-180deg);
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}

.front .inner p{
  font-size: 2rem;
  margin-bottom: 2rem;
  position: relative;
}

.front .inner p:after{
  content: '';
  width: 4rem;
  height: 2px;
  position: absolute;
  background: #C6D4DF;
  display: block;
  left: 0;
  right: 0;
  margin: 0 auto;
  bottom: -.75rem;
}

.front .inner span{
  color: rgba(255,255,255,0.7);
  font-family: 'Montserrat';
  font-weight: 300;
}

@media screen and (max-width: 64rem){
  .col{
    width: calc(33.333333% - 2rem);
  }
}

@media screen and (max-width: 48rem){
  .col{
    width: calc(50% - 2rem);
  }
}

@media screen and (max-width: 32rem){
  .col{
    width: 100%;
    margin: 0 0 2rem 0;
  }
}
        /* Google Fonts Import Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.home-cards {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 20px;
  margin-bottom: 40px;
}

.home-cards img {
  width: 100%;
  margin-bottom: 20px;
}

.sidebar{
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 260px;
  background: #11101d;
  z-index: 100;
  transition: all 0.5s ease;
}
.sidebar.close{
  width: 78px;
}
.sidebar .logo-details{
  height: 60px;
  width: 100%;
  display: flex;
  align-items: center;
}
.sidebar .logo-details i{
  font-size: 30px;
  color: #fff;
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
}
.sidebar .logo-details .logo_name{
  font-size: 22px;
  color: #fff;
  font-weight: 600;
  transition: 0.3s ease;
  transition-delay: 0.1s;
}
.sidebar.close .logo-details .logo_name{
  transition-delay: 0s;
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links{
  height: 100%;
  padding: 30px 0 150px 0;
  overflow: auto;
}
.sidebar.close .nav-links{
  overflow: visible;
}
.sidebar .nav-links::-webkit-scrollbar{
  display: none;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  transition: all 0.4s ease;
}
.sidebar .nav-links li:hover{
  background: #1d1b31;
}
.sidebar .nav-links li .iocn-link{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sidebar.close .nav-links li .iocn-link{
  display: block
}
.sidebar .nav-links li i{
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.sidebar .nav-links li.showMenu i.arrow{
  transform: rotate(-180deg);
}
.sidebar.close .nav-links i.arrow{
  display: none;
}
.sidebar .nav-links li a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
.sidebar .nav-links li a .link_name{
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  transition: all 0.4s ease;
}
.sidebar.close .nav-links li a .link_name{
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links li .sub-menu{
  padding: 6px 6px 14px 80px;
  margin-top: -10px;
  background: #1d1b31;
  display: none;
}
.sidebar .nav-links li.showMenu .sub-menu{
  display: block;
}
.sidebar .nav-links li .sub-menu a{
  color: #fff;
  font-size: 15px;
  padding: 5px 0;
  white-space: nowrap;
  opacity: 0.6;
  transition: all 0.3s ease;
}
.sidebar .nav-links li .sub-menu a:hover{
  opacity: 1;
}
.sidebar.close .nav-links li .sub-menu{
  position: absolute;
  left: 100%;
  top: -10px;
  margin-top: 0;
  padding: 10px 20px;
  border-radius: 0 6px 6px 0;
  opacity: 0;
  display: block;
  pointer-events: none;
  transition: 0s;
}
.sidebar.close .nav-links li:hover .sub-menu{
  top: 0;
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
}
.sidebar .nav-links li .sub-menu .link_name{
  display: none;
}
.sidebar.close .nav-links li .sub-menu .link_name{
  font-size: 18px;
  opacity: 1;
  display: block;
}
.sidebar .nav-links li .sub-menu.blank{
  opacity: 1;
  pointer-events: auto;
  padding: 3px 20px 6px 16px;
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links li:hover .sub-menu.blank{
  top: 50%;
  transform: translateY(-50%);
}
.sidebar .profile-details{
  position: fixed;
  bottom: 0;
  width: 260px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #1d1b31;
  padding: 12px 0;
  transition: all 0.5s ease;
}
.sidebar.close .profile-details{
  background: none;
}
.sidebar.close .profile-details{
  width: 78px;
}
.sidebar .profile-details .profile-content{
  display: flex;
  align-items: center;
}
.sidebar .profile-details img{
  height: 52px;
  width: 52px;
  object-fit: cover;
  border-radius: 16px;
  margin: 0 14px 0 12px;
  background: #1d1b31;
  transition: all 0.5s ease;
}
.sidebar.close .profile-details img{
  padding: 10px;
}
.sidebar .profile-details .profile_name,
.sidebar .profile-details .job{
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  white-space: nowrap;
}
.sidebar.close .profile-details i,
.sidebar.close .profile-details .profile_name,
.sidebar.close .profile-details .job{
  display: none;
}
.sidebar .profile-details .job{
  font-size: 12px;
}
.home-section{
  position: relative;
  background: #FFFFFF;
  height: 100vh;
  left: 260px;
  width: calc(100% - 260px);
  transition: all 0.5s ease;
}
.sidebar.close ~ .home-section{
  left: 78px;
  width: calc(100% - 78px);
}
.home-section .home-content{
  height: 60px;
  display: flex;
  align-items: center;
}
.home-section .home-content .bx-menu,
.home-section .home-content .text{
  color: #11101d;
  font-size: 35px;
}
.home-section .home-content .bx-menu{
  margin: 0 15px;
  cursor: pointer;
}
.home-section .home-content .text{
  font-size: 26px;
  font-weight: 600;
}
@media (max-width: 400px) {
  .sidebar.close .nav-links li .sub-menu{
    display: none;
  }
  .sidebar{
    width: 78px;
  }
  .sidebar.close{
    width: 0;
  }
  .home-section{
    left: 78px;
    width: calc(100% - 78px);
    z-index: 100;
  }
  .sidebar.close ~ .home-section{
    width: 100%;
    left: 0;
  }
}

body {
  display: flex;
  min-height: 100vh;
  flex-direction: column;
} 

main {
  flex: 1 0 auto;
}

h1.title,
.footer-copyright a {
  font-family: 'Architects Daughter', cursive;
  text-transform: uppercase;
  font-weight: 900;
}



    </style>
</head>

<body>

<div class="sidebar close">
    <div class="logo-details">
    <i class='bx bxs-school' style='color:#fff'  ></i>
      <span class="logo_name">CETI</span>
    </div>
    <ul class="nav-links">

        <li>
        <a href="./maestros/maestros.php">
        <i class='bx bx-glasses'></i>
          <span class="link_name">Maestros</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="./maestros/maestros.php">Maestros</a></li>
        </ul>
      </li>
    
      <li>
        <a href="./alumnos/alumnos.php">
        <i class='bx bx-user'></i>
          <span class="link_name">Estudiantes</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="./alumnos/alumnos.php">Estudiantes</a></li>
        </ul>
      </li>

      <li>
        <a href="./materias/materias.php">
        <i class='bx bx-book-bookmark'></i>
          <span class="link_name">Materias</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="./materias/materias.php">Materias</a></li>
        </ul>
      </li>

      <li>
        <a href="./admin/admins.php">
        <i class='bx bx-mouse-alt'></i>
          <span class="link_name">Admin</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="./admin/admins.php">Admin</a></li>
        </ul>
      </li>

      <li>
        <a href="./categorias/categorias.php">
        <i class='bx bx-math'></i>
          <span class="link_name">Categorias</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="./categorias/categorias.php">Categorias</a></li>
        </ul>
      </li>

      <li>
        <a href="./grupos/grupos.php">
        <i class='bx bx-group'></i>
          <span class="link_name">Grupos</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="./grupos/grupos.php">Grupos</a></li>
        </ul>
      </li>

      <li>
        <a href="./asignaciones/asignaciones.php">
        <i class='bx bx-git-compare'></i>
          <span class="link_name">Asignaciones Grupos</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="">Asignaciones Grupos</a></li>
        </ul>
      </li>

      <li>
        <a href="./asignacionesAlumnos/asignaciones.php">
        <i class='bx bx-git-compare'></i>
          <span class="link_name">Asignaciones Alumnos</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="">Asignaciones Alumnos</a></li>
        </ul>
      </li>
      
     
    <div class="profile-details">
      <div class="profile-content">
        <!--<img src="image/profile.jpg" alt="profileImg">-->
      </div>
      <div class="name-job">
        <div class="profile_name">Sistema Educativo</div>
        <div class="job">Proyecto</div>
      </div>
      <a href="../salir.php"><i class='bx bx-log-out'style='color:#fff' ></i></a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
    </div>

    <div class="wrapper">
  <h1>Menú de administrador</h1>
  <div class="cols">
    <a href="./maestros/maestros.php">
			<div class="col" ontouchstart="this.classList.toggle('hover');">
				<div class="container">
					<div class="front" style="background-image: url(https://www.ceac.es/sites/default/files/2021-10/claves-para-ser-un-maestro-motivador_0.jpg)">
						<div class="inner">
							<p>Maestros</p>
						</div>
					</div>
					<div class="back">
						<div class="inner">
						  <p>Se puede ver, crear, editar y eliminar profesores</p>
						</div>
					</div>
				</div>
    </a>
	</div>

			<div class="col" ontouchstart="this.classList.toggle('hover');">
      <a href="./alumnos/alumnos.php">
				<div class="container">
					<div class="front" style="background-image: url(https://www.compartirpalabramaestra.org/sites/default/files/seis-tips-para-ser-un-excelente-estudiante.jpg)">
						<div class="inner">
							<p>Estudiantes</p>
						</div>
					</div>
					<div class="back">
						<div class="inner">
							<p>Se puede ver, crear, editar y eliminar alumnos</p>
						</div>
					</div>
				</div>
        </a>
			</div>

			<div class="col" ontouchstart="this.classList.toggle('hover');">
      <a href="./materias/materias.php">
				<div class="container">
					<div class="front" style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Books_HD_%288314929977%29.jpg/800px-Books_HD_%288314929977%29.jpg)">
						<div class="inner">
							<p>Materias</p>
						</div>
					</div>
					<div class="back">
						<div class="inner">
							<p>Se puede ver, crear, editar y eliminar materias.</p>
						</div>
					</div>
				</div>
        </a>
			</div>

			<div class="col" ontouchstart="this.classList.toggle('hover');">
      <a href="./admin/admins.php">
				<div class="container">
					<div class="front" style="background-image: url(https://uploads-ssl.webflow.com/5c0923437b3820198bab7be0/5fb428964311ac28bde416d0_administrador-de-condominios.jpg)">
						<div class="inner">
							<p>Admin</p>
						</div>
					</div>
					<div class="back">
						<div class="inner">
							<p>Se puede ver, crear, editar y eliminar administradores.</p>
						</div>
					</div>
				</div>
        </a>
			</div>

			<div class="col" ontouchstart="this.classList.toggle('hover');">
      <a href="./categorias/categorias.php">
				<div class="container">
					<div class="front" style="background-image: url(https://concepto.de/wp-content/uploads/2012/03/ciencia.jpeg)">
						<div class="inner">
							<p>Categorías</p>
						</div>
					</div>
					<div class="back">
						<div class="inner">
							<p>Se puede ver, crear, editar y eliminar categorías</p>
						</div>
					</div>
				</div>
      </a>
			</div>

			<div class="col" ontouchstart="this.classList.toggle('hover');">
      <a href="./grupos/grupos.php">
				<div class="container">
					<div class="front" style="background-image: url(https://profesor-particular.es/inter-content/uploads/2019/11/jvenes.png)">
						<div class="inner">
							<p>Grupos</p>
						</div>
					</div>
					<div class="back">
						<div class="inner">
							<p>Se puede ver, crear, editar y eliminar grupos.</p>
						</div>
					</div>
				</div>
      </a>
			</div>

			<div class="col" ontouchstart="this.classList.toggle('hover');">
      <a href="./asignaciones/asignaciones.php">
				<div class="container">
					<div class="front" style="background-image: url(https://mirincondeaprendizaje.com/wp-content/uploads/2019/08/classroom-2093744_960_720-1.jpg)">
						<div class="inner">
							<p>Asignaciones grupos</p>
						</div>
					</div>
					<div class="back">
						<div class="inner">
							<p>Se puede ver, crear, editar y eliminar asignaciones de grupos</p>
						</div>
					</div>
				</div>
      </a>
			</div>

			<div class="col" ontouchstart="this.classList.toggle('hover');">
      <a href="./asignacionesAlumnos/asignaciones.php">
				<div class="container">
					<div class="front" style="background-image: url(https://www.educalinkapp.com/blog/wp-content/uploads/2021/07/reglas-del-salon-de-clase-0-138539227_m.jpg)">
						<div class="inner">
							<p>Asignaciones alumnos</p>
						</div>
					</div>
					<div class="back">
						<div class="inner">
							<p>Se puede ver, crear, editar y eliminar asignaciones de alumnos.</p>
						</div>
					</div>
				</div>
      </a>
			</div>
		</div>
 </div>

    

  </section>
  
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>

</body>

</html>