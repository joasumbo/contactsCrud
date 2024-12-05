<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Contato</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- /Including assets css-->

  @include('include.assets')
</head>
<style>

</style>

<body>

  <!-- Including navbar -->
  @include('include.navbar')
  <!-- /Including navbar -->

  <!-- Including progress bar -->
  @include('include.progress')
  <!-- /Including progress bar -->

  <div class="container mt-5">
    <h2 class="text-center">Adicionar Contato</h2>
    <form action="{{ route('salvar.contacto') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="name" placeholder="Digite o nome">
      </div>
      <div class="mb-3">
        <label for="contato" class="form-label">Contato</label>
        <input type="text" class="form-control" id="contato" name="phone" placeholder="Digite o contato">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email">
      </div>
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="/" class="btn btn-secondary">Voltar</a>
    </form>
  </div>

  
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
        "positionClass": "toast-top-end",
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
</body>

</html>