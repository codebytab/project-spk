<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SPK System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            border: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #f0f0f0;
            padding: 1.5rem;
            text-align: center;
        }

        .card-body {
            padding: 2rem;
        }

        .btn-primary {
            padding: 0.6rem 1.2rem;
            font-weight: 500;
        }

        .form-control {
            padding: 0.75rem;
        }
    </style>
</head>

<body>

    <div class="card login-card">
        <div class="card-header">
            <h4 class="mb-1 fw-bold text-primary">SPK SAW</h4>
            <p class="text-muted mb-0 small">Silahkan login untuk melanjutkan</p>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger py-2 small">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label class="form-label text-muted small fw-bold text-uppercase">Email Address</label>
                    <input type="email" name="email" class="form-control" required autofocus
                        placeholder="name@example.com">
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted small fw-bold text-uppercase">Password</label>
                    <input type="password" name="password" class="form-control" required placeholder="********">
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>

                <div class="text-center small">
                    <span class="text-muted">Belum punya akun?</span>
                    <a href="{{ route('register') }}" class="text-decoration-none">Daftar sekarang</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>