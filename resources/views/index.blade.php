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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
        @foreach($datas as $data)
        <tr class="contact-row">
          <td>{{ $data->id }}</td>
          <td>{{ $data->name }}</td>
          <td>{{ $data->phone }}</td>
          <td>{{ $data->email }}</td>
          <td>
            <a href="{{ route('detalhe.contacto', $data->id) }}">
              <button class="btn btn-sm btn-primary">
                <i class="fas fa-eye"></i> Detalhes
              </button></a>
            <a href="{{ route('editar.contacto', $data->id) }}">
              <button class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i> Editar
              </button>
            </a>
            <a href="javascript:void(0)" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-href="{{ route('excluir.contacto', $data->id) }}">
              <i class="fas fa-trash"></i> Eliminar
            </a>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <a href="{{ route('adicionar.contacto') }}" class="btn btn-success">
      <i class="fas fa-plus"></i> Adicionar Novo Contato
    </a>
  </div>

  <script>
    // Captura o evento de abrir o modal
    const deleteButtons = document.querySelectorAll('a[data-bs-toggle="modal"][data-bs-target="#confirmDeleteModal"]');

    deleteButtons.forEach(button => {
      button.addEventListener('click', function() {
        // Pega o href do link de exclusão
        const href = this.getAttribute('data-href');

        // Define o link de exclusão no botão de confirmação
        const confirmBtn = document.getElementById('deleteConfirmBtn');
        confirmBtn.setAttribute('href', href);
      });
    });
  </script>


  <!-- Modal de Confirmação -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Você tem certeza que deseja excluir este item?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a id="deleteConfirmBtn" href="" class="btn btn-danger">Sim, excluir</a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="{{ asset('js/cmd.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  @if(session('success'))
  <script>
    toastr.success("{{ session('success') }}", "Sucesso!", {
      "closeButton": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "timeOut": "5000",
      "extendedTimeOut": "1000"
    });
  </script>
  @endif

  @if(session('error'))
  <script>
    toastr.error("{{ session('error') }}", "Erro!", {
      "closeButton": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "timeOut": "5000",
      "extendedTimeOut": "1000"
    });
  </script>
  @endif
  @if ($errors->any())
  @foreach ($errors->all() as $error)
  <script>
    toastr.error("{{ $error }}", "Erro de Validação!", {
      "closeButton": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "timeOut": "5000",
      "extendedTimeOut": "1000"
    });
  </script>
  @endforeach
  @endif

</body>

</html>