<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Torneo Tenis' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #222;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 24px;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,.08);
        }
        .topbar {
            background: #1f2937;
            color: #fff;
            padding: 16px 24px;
        }
        .topbar-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: 0;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            background: #2563eb;
            color: #fff;
        }
        .btn-secondary {
            background: #6b7280;
        }
        .btn-danger {
            background: #dc2626;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 16px;
        }
        .menu-card {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 16px;
            background: #fff;
        }
        .form-group {
            margin-bottom: 16px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            box-sizing: border-box;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
        }
        select,
        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
        }      
        nav[role="navigation"] {
            margin-top: 16px;
        }          
        .error {
            color: #b91c1c;
            margin-top: 6px;
            font-size: 14px;
        }
        .alert {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 16px;
        }
        form.inline {
            display: inline;
        }
    </style>
</head>
<body>
    @auth
        <div class="topbar">
            <div class="topbar-inner">
                <div>
                    <strong>Torneo Tenis</strong>
                    <span style="margin-left: 12px;">
                        {{ auth()->user()->name }} ({{ auth()->user()->role }})
                    </span>
                </div>

                <div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    @endauth

    <div class="container">
        @yield('content')
    </div>
</body>
</html>