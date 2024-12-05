<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalhes do Contato</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
        <h5 class="card-title">Nome: {{ $information->name }}</h5>
        <p class="card-text">Contato: {{ $information->phone }}</p>
        <p class="card-text">Email: <a href="#">{{ $information->email }}</a></p>
        @if (Auth::check())
        <a href="{{ route('editar.contacto', $information->id) }}" class="btn btn-warning">Editar</a>
        @endif
        <a href="/" class="btn btn-secondary">Voltar</a>
      </div>
    </div>
  </div>
</body>

<!-- Including assets js -->
<script src="{{ asset('js/cmd.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<!-- Including alerts Toastr -->
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
<!-- Including alerts Toastr -->
</html>