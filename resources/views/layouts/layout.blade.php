<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<title id="pagActual">@yield('title')</title>
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/datepicker3.css')}}" rel="stylesheet">
	<link href="{{asset('css/styles.css')}}" rel="stylesheet">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Icreai</span></a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
										<br /><small class="text-muted">1:24 pm - 25/03/2015</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
										<br /><small class="text-muted">12:27 pm - 25/03/2015</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
										<em class="fa fa-inbox"></em> <strong>All Messages</strong>
									</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-bell"></em><span class="label label-info">5</span>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
									<div><em class="fa fa-envelope"></em> 1 New Message
										<span class="pull-right text-muted small">3 mins ago</span>
									</div>
								</a></li>
							<li class="divider"></li>
							<li><a href="#">
									<div><em class="fa fa-heart"></em> 12 New Likes
										<span class="pull-right text-muted small">4 mins ago</span>
									</div>
								</a></li>
							<li class="divider"></li>
							<li><a href="#">
									<div><em class="fa fa-user"></em> 5 New Followers
										<span class="pull-right text-muted small">4 mins ago</span>
									</div>
								</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="{{ asset('uploads/avatars/'.Auth::user()->avatar) }}" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"> {{ Auth::user()->name }} </div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li id="focoIni"><a href="{{ route('inicio') }}"><em class="fa fa-home">&nbsp;</em>Inicio</a></li>

			<li id="focoPerfil"><a href="{{ route('user.profile') }}"><em class="fa fa-user-circle-o">&nbsp;</em>Perfil</a></li>
			<li> <a class="dropdown-item fa fa-window-close" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
					{{ __('Cerrar sesión') }}
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</li>
			<li><img width="230px" height="200px" src='/uploads/fondos/fondo1.jpg'></li>
		</ul>

	</div>


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li class="negrita">Opciones</li>

				<li class=""><a href="{{ route('moderador.index') }}">
						<button id="focoMod" class="btn btn-info">Moderar</button></a></li>

				<li class=""><a href="{{ route('administrador.index') }}">
						<button id="focoAdmin" class="btn btn-info">Administrar</button></a></li>
			</ol>
		</div>


		<div class="row justify-content-center mainContainer">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 class="page-header negrita">@yield('title_princ')</h1>
			</div>

			@yield('pp')
		</div>




	</div>
	<!--/.main-->
	<!--{{asset('js/custom.js')}}-->

	<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/chart.min.js')}}"></script>
	<script src="{{asset('js/chart-data.js')}}"></script>
	<script src="{{asset('js/easypiechart.js')}}"></script>
	<script src="{{asset('js/easypiechart-data.js')}}"></script>
	<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('js/custom.js')}}"></script>
	<script>
		window.onload = function() {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
				responsive: true,
				scaleLineColor: "rgba(0,0,0,.2)",
				scaleGridLineColor: "rgba(0,0,0,.05)",
				scaleFontColor: "#c5c7cc"
			});
		};
	</script>
	<script type="application/javascript">
		jQuery('input[type=file]').change(function() {
			var filename = jQuery(this).val().split('\\').pop();
			var idname = jQuery(this).attr('id');
			console.log(jQuery(this));
			console.log(filename);
			console.log(idname);
			jQuery('span.' + idname).next().find('span').html(filename);
		});
	</script>
	<!--<script>
		$('.nav li').click(function(e) {

			$(this).addClass('active');
			$(this).siblings().removeClass('active');
		});
	</script>
	-->
	<script>
		// En el onload
		$(function() {
			var pagina = document.getElementById("pagActual").innerHTML;

			if (pagina == "Icreai_Profile") {


				var elemento = document.getElementById("focoPerfil");
				elemento.className += " active";
			} else if (pagina == "Icreai_Inicio") {

				var elemento = document.getElementById("focoIni");
				elemento.className += " active";
			} else if (pagina == "Icreai_Mod") {

				var elemento = document.getElementById("focoMod");
				elemento.className += " active";
			} else if (pagina == "Icreai_Admin") {

				var elemento = document.getElementById("focoAdmin");
				elemento.className += " active";
			}



		});
	</script>

	<script>
		let $texto = document.getElementById("texto")
		let $caracteres = 0;
		document.getElementById('caracteres').innerHTML = 'llevas: ' + $caracteres + ' TwT';
		//El evento lo puedes reemplazar con keyup, keypress y el tiempo a tu necesidad
		$texto.addEventListener('keypress', () => {

			$caracteres += 1;
			if ($caracteres > 0 && $caracteres <= 60) {
				document.getElementById('caracteres').innerHTML = 'llevas: ' + $caracteres + ' Inspirate ;D';
			} else if ($caracteres > 60 && $caracteres <= 99) {
				document.getElementById('caracteres').innerHTML = 'llevas: ' + $caracteres + ' ¡Ya Falta poco!';
			} else {
				document.getElementById('caracteres').innerHTML = 'llevas: ' + $caracteres + ' ¡GENIAL!, ya puedes enviar el escrito';
			}

		})
		$($texto).on("keyup", function() { //Supervisamos cada vez que se presione una tecla dentro.

			if ($(this).val().length != $caracteres) {

				$caracteres = $(this).val().length;

				if ($caracteres >= 0 && $caracteres <= 60) {
					document.getElementById('caracteres').innerHTML = 'llevas: ' + $caracteres + ' Inspirate ;D';
				} else if ($caracteres > 60 && $caracteres <= 99) {
					document.getElementById('caracteres').innerHTML = 'llevas: ' + $caracteres + ' ¡Ya Falta poco!';
				} else {
					document.getElementById('caracteres').innerHTML = 'llevas: ' + $caracteres + ' ¡GENIAL!, ya puedes enviar el escrito';
				}
			}


		})
	</script>

	<script>
		window.onscroll = function(){
			if(document.documentElement.scrollTop > 100){
				document.querySelector('.go-top-container')
				.classList.add('showgotop');
			}else{
				document.querySelector('.go-top-container')
				.classList.remove('showgotop');
			}
		}

		document.querySelector('.go-top-container')
		.addEventListener('click', () =>{
			window.scrollTo({
				top:0,
				behavior: 'smooth'
			});
		});
		
	</script>
</body>

</html>