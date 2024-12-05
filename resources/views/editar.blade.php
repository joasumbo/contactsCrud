<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Contato</title>

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
    <h2 class="text-center">Editar Contato</h2>
    <form action="{{ route('atualizar.contacto', $information->id) }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="name" value="{{ $information->name }}">
      </div>
      <div class="mb-3">
        <label for="contato" class="form-label">Contato</label>
        <input type="text" class="form-control" id="contato" name="phone" value="{{ $information->phone }}">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $information->email }}">
      </div>
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="/" class="btn btn-secondary">Voltar</a>
    </form>
  </div>

  <!-- Including javascript file -->
  <script src="{{ asset('js/cmd.js') }}"></script>
  <!-- /Including javascript file -->
</body>

</html>