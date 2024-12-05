<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciamento de Contatos</title>

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

  <!-- Content -->
  <div class="container mt-5">
    <h1 class="text-center">Lista de Contatos</h1>
    <table class="table table-hover mt-4">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Contato</th>
          <th>Email</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr class="contact-row" onclick="navigate('detalhes.html')">
          <td>1</td>
          <td>João Silva</td>
          <td>912345678</td>
          <td>joao@email.com</td>
          <td>
            <a href="detalhes.html">
              <button class="btn btn-sm btn-primary">
                <i class="fas fa-eye"></i> Detalhes
              </button></a>
            <button class="btn btn-sm btn-warning">
              <i class="fas fa-edit"></i> Editar
            </button>
            <button class="btn btn-sm btn-danger">
              <i class="fas fa-trash"></i> Eliminar
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <a href="adicionar.html" class="btn btn-success">
      <i class="fas fa-plus"></i> Adicionar Novo Contato
    </a>
  </div>

  <!-- Including javascript file -->
  <script src="{{ asset('js/cmd.js') }}"></script>
  <!-- /Including javascript file -->
</body>

</html>