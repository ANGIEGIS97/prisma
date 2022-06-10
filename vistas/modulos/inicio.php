<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PRISMA | MOVIMIENTOS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link rel="icon" href="../img/prisma.png" />
	<style>
	.figure{
		margin-top: 100px;
	}

	.btn{
		background-color: black;
		color:white;
		border-style:none;
		border-radius:0px;
	}

	.btn:hover{
		color:white;
	}
</style>
</head>
<body>
	<div class="container-fluid">

		<div class="container col-6">

			<figure class="figure">
				<img src="../img/prisma.png" class="figure-img img-fluid rounded" alt="">
			</figure>

			<table class="table table-borderless movimientos"></table>

			<input type="hidden" id="usuario" value="<?php echo $_SESSION["usuario"]; ?>">

			<!-- Button trigger modal -->
			<div class="text-center">
				<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #2F0480; color: white;">+</button>				
			</div>	

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog">
			    	<div class="modal-content">

			      		<div class="modal-header">
			        		<h5 class="modal-title">Registro de Movimiento</h5>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>

			      		<div class="modal-body">

			        		<h6>Descripcion</h6>
							<div class="form-floating">
								<textarea class="form-control" id="descripcion" name="descripcion"></textarea>
							</div>
							<br>

							<h6>Tipo de Movimiento</h6>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="ingreso" id="ingreso">
								<label class="form-check-label" for="Ingreso">Ingreso</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gasto" id="gasto">
								<label class="form-check-label" for="Gasto">Gasto</label>
							</div>

							<h6>Valor</h6>
							<input class="form-control" type="text" name="valor" id="valor">
							<br>

							<div class="text-center">

								<button id="adicionar" type="button" class="btn" style="background-color: #2F0480; color: white;">Registrar</button>

						        <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: transparent; color: #2F0480;">Cancelar</button>				
							</div>

			      		</div>
			    	</div>
			  	</div>
			</div><!-- fin modal -->

			<a href="salir.php">Salir</a>

		</div>
	</div>

	<script>

		$("#adicionar").on("click", function() {

			console.log(usuario)

			//tipo = $('#ingreso').val()
			descripcion = $('#descripcion').val()
			valor = $('#valor').val()

			$.post('../../ajax/plantilla.ajax.php', {'registro':usuario, 'descripcion':descripcion, 'valor':valor}, function(enviar) {
				console.log(enviar)
			});

		});
		
		$(document).ready( function() {

			usuario = $('#usuario').val();

			//console.log(usuario)

			$.post('../../ajax/plantilla.ajax.php', {'usuario':usuario}, function(data) {

				console.log(data)

				for (var i = 0; i<data.length; i++) {		

					d =	'<tr>'+
								'<th scope="col"></th>'+
								'<th scope="col"></th>'+
								'<th scope="col"></th>'+
							'</tr>'+
						'</thead>';

					var dt = new Date(data[i]['date_bill'])

					date_bill = data[i]['date_bill']
					observation = data[i]['observation']
					value = data[i]['value']

					d += '<tbody>'+
							'<tr>'+
								'<td>'+dt.getDate()+'/'+dt.getMonth()+'/'+dt.getFullYear()+'</td>'+
								'<td>'+observation+'</td>'+
								'<td>'+formatter.format(value)+'</td>'+
							'</tr>'+
						'</tbody>';

					$('.movimientos').append(d);

				}

			}, 'JSON');

		});

		const formatter = new Intl.NumberFormat('en-US', {
			style: 'currency',
			currency: 'USD',
			minimumFractionDigits: 0
		})

	</script>

</body>
</html>