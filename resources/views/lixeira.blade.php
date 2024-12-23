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
    <h1 class="text-center">Contatos eliminados</h1>
    <div class="mt-4">
      <div class="row justify-content-start">
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text bg-light"><i class="fas fa-search"></i></span>
            <input type="text" id="searchInput" class="form-control" placeholder="Pesquisar..." aria-label="Pesquisar">
          </div>
        </div>
      </div>
    </div>

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
      <tbody id="tableBody">

        @if($datas->isEmpty())
        <div class="mt-4 text-center" style="display: none;">
          <div class="mt-4 mb-4">
            <center>
              <p>
                <img src="{{ asset('img/sem-resultados.png') }}" class="img-nFound" width="130" alt="">
              <p class="mt-4">Ups! Não encontramos nenhum contacto ainda...</p>
              </p>
            </center>
          </div>
        </div>
        @else

        @foreach($datas as $data)
        <tr class="contact-row">
          <td>{{ $data->id }}</td>
          <td>{{ $data->name }}</td>
          <td>{{ $data->phone }}</td>
          <td>{{ $data->email }}</td>
          <td>
            @if (Auth::check())
            <a href="{{ route('status.active', $data->id) }}">
              <button class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i> Restaurar
              </button>
            </a>
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}">
              <i class="fas fa-trash"></i> Eliminar permanentemente
            </button>
            @endif

            <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $data->id }}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $data->id }}">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Você tem certeza que deseja excluir este contato?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <a href="{{ route('excluir.contacto', $data->id) }}" class="btn btn-danger">Sim</a>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        @endforeach

        @endif
      </tbody>
    </table>

    <div id="noResultsMessage" class="mt-4 text-center" style="display: none;">
      <div class="mt-4 mb-4">
        <center>
          <p>
            <img src="{{ asset('img/sem-resultados.png') }}" class="img-nFound" width="130" alt="">
          <p class="mt-4">Ups! Não encontramos nenhum resultado...</p>
          </p>
        </center>
      </div>
    </div>

  </div>


  <div class="mt-4">
    <nav>
      <ul class="pagination justify-content-center">
        {{ $datas->links('pagination::bootstrap-4') }}
      </ul>
    </nav>
  </div>

  <script src="{{ asset('js/cmd.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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

</body>

</html>