
<!DOCTYPE html>
<html lang="en">

<head>
	@vite(['resources/css/app-admin.css', 'resources/js/app-admin.js', 'resources/js/datatables.js'])


	<title>@yield('title')</title>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
	<style>
		body {
			opacity: 0;
			font-family: 'Inter', sans-serif;
		}
		.sidebar [data-bs-toggle=collapse]::after {
			border: solid;
			border-width: 0 .075rem .075rem 0;
			content: " ";
			display: inline-block;
			padding: 2px;
			position: absolute;
			right: 1.5rem; /* Adjust position */
			top: 1.2rem;   /* Adjust position */
			transform: rotate(225deg); /* Right arrow (default) */
			transition: transform 0.2s ease-out;
		}

		/* Expanded state */
		.sidebar [data-bs-toggle=collapse].collapsed::after {
			transform: rotate(45deg); /* Downward arrow */
		}

		.sidebar-dropdown .sidebar-link::before {
			content: "→"; /* Right arrow */
			display: inline-block;
			position: relative;
			left: -14px; /* Adjust spacing */
			transform: translateX(0);
			transition: transform 0.1s ease, content 0.1s ease;
		}

		/* Downward arrow for expanded state */
		.sidebar-dropdown .sidebar-link.collapsed::before {
			content: "↓"; /* Downward arrow */
			transform: translateX(0); /* Keeps arrow in place */
		}

		.sidebar-dropdown{
			padding-left: 1.2rem;
			font-size: 0.8rem;
		}

		.btn-primary{
			background-color: #222E3C;
			color: white;
			border: 1px solid #222E3C;
			transition: 0.3s;
		}

		a.page-link{
			background-color: #fff !important;
			color: #222E3C !important;

			/* transition: 0.3s; */
		}

	</style>
	@yield('styles')
</head>
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	
	<div class="wrapper">
        @include('includes.sidebar')
		
		<div class="main">
			@include('includes.navbar')

			<main class="content">
				<div class="container-fluid p-0">

                <div class="d-flex justify-content-between align-items-center" style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="h3 mb-3" style="margin: 0; font-size: 1.5rem;">@yield('title')</h3>
                    <span style="font-size: .8rem; color: black;">
                        <strong style="font-weight: bold;">LoggedIn User:</strong> {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                    </span>
                </div>
				<div class="row">
					<div class="col-12">
						<div class="card content-card">
									<div class="card-body">
								@yield('content')
							</div>
						</div>
					</div>
				</div>
	
				</div>

			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a href="#" target="_blank" class="text-muted"><strong>First Vision</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
	<script>
		 	document.addEventListener("DOMContentLoaded", function() {
			// Datatables with Buttons
			var datatablesButtons = $(".data-table").DataTable({
				responsive: true,
				buttons: [
					{
						text: 'My button',
						action: function (e, dt, node, config) {
							alert('Button activated');
						}
					}
				]
			});
		});
	</script>

	@yield('scripts')
</body>
</html>
