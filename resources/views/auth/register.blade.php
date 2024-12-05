<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <!-- Card de Login -->
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <div class="text-center mb-4">
                <i class="bi bi-person-circle" style="font-size: 50px; color: #007bff;"></i>
            </div>
            <h4 class="card-title text-center mb-4">Criar usuário</h4>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="name" class="form-control" name="name" id="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Criar Senha</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                    <i class="bi bi-eye-slash position-absolute" id="togglePassword" style="right: 10px; top: 38px; cursor: pointer;"></i>
                </div>

                <div class="mb-3 position-relative">
                    <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                    <input type="password_confirmation" class="form-control" name="password_confirmation" id="password_confirmation" required>
                    <i class="bi bi-eye-slash position-absolute" id="togglePassword2" style="right: 10px; top: 38px; cursor: pointer;"></i>
                </div>

                <button type="submit" class="btn btn-primary w-100">Criar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        toastr.error("{{ $error }}", "Erro de Autenticação!", {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
            "extendedTimeOut": "1000"
        });
    </script>
    @endforeach
    @endif


    <script>
        document.getElementById('togglePassword').addEventListener('click', function(e) {
            const passwordField = document.getElementById('password');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });

        document.getElementById('togglePassword2').addEventListener('click', function(e) {
            const passwordField = document.getElementById('password');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>
</body>

</html>