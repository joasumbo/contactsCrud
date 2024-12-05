<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalhes do Contato</title>

  <!-- Including assets -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- /Including assets -->

</head>

<body>

  <!-- Including navbar -->
  @include('include.navbar')
  <!-- /Including navbar -->

  <!-- Including progress bar -->
  @include('include.progress')
  <!-- /Including progress bar -->

  <div class="container mt-5">
    <h2 class="text-center">Detalhes do Contato</h2>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Nome: João Silva</h5>
        <p class="card-text">Contato: 912345678</p>
        <p class="card-text">Email: joao@email.com</p>
        <a href="editar.html" class="btn btn-warning">Editar</a>
        <a href="/" class="btn btn-secondary">Voltar</a>
      </div>
    </div>
  </div>
</body>

</html>