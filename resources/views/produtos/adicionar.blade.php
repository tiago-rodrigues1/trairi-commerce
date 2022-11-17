<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Adicionar produto</title>

	<link rel="stylesheet" href="/styles/bootstrap.min.css">
	<link rel="stylesheet" href="/styles/globals.css">
</head>

<body>
	<x-navmenu />
	<main class="p-4 vstack align-items-center justify-content-center">
		<form class="col-12 col-md-10 col-xl-6 p-4 rounded-3 d-flex flex-column gap-4">
			<h1 class="fs-2 text-tc-green">Adicionar ao catálogo</h1>
			<fieldset>
				<legend class="fs-5">Você deseja adicionar um</legend>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="itemType" id="itemTypeProduct" value="1" checked>
					<label class="form-check-label" for="itemTypeProduct">
						Produto
					</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="itemType" id="itemTypeService" value="2">
					<label class="form-check-label" for="itemTypeService">
						Serviço
					</label>
				</div>
			</fieldset>
			<div>
				<label class="form-label" for="title">Título do produto</label>
				<input class="form-control" type="text" name="title" id="title">
			</div>
			<div>
				<label class="form-label" for="descricao">Descrição</label>
				<textarea class="form-control" name="" id="descricao" cols="30" rows="10"></textarea>
			</div>
			<div>
				<label class="form-label" for="price">Valor</label>
				<input class="form-control" type="text" name="price" id="price">
			</div>
			<div>
				<label class="form-label" for="deliveryPrice">Taxa de entrega</label>
				<input class="form-control" type="text" name="deliveryPrice" id="deliveryPrice">
			</div>
			<div class="row row-cols-2 g-2 m-0">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="payment" id="debito">
					<label class="form-check-label" for="debito">Débito</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="payment" id="credito">
					<label class="form-check-label" for="credito">Crédito</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="payment" id="dinheiro">
					<label class="form-check-label" for="dinheiro">Dinheiro</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="payment" id="pix">
					<label class="form-check-label" for="pix">Pix</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="payment" id="consultar">
					<label class="form-check-label" for="consultar">Consultar com anunciante</label>
				</div>
			</div>
			<div class="vstack gap-4">
				<div>
					<label class="form-label" for="imagens">Fotos</label>
					<input type="file" class="form-control" id="imagens">
				</div>
				<button class="btn btn-sm tc-dashed-btn w-100 text-tc-green">+</button>
			</div>
			<button class="btn tc-btn mt-3">Adicionar</button>
		</form>
	</main>
	<script src="/scripts/bootstrap.bundle.min.js"></script>
</body>

</html>