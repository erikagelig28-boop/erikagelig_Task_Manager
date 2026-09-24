<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Task Manager' }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #F7FAF8;
            color: #1F2937;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        textarea,
        select {
            font-family: inherit;
        }

        /* NAVBAR */

        .navbar {
            height: 72px;
            background: #FFFFFF;
            border-bottom: 1px solid #E5E7EB;
            display: flex;
            align-items: center;
            padding: 0 45px;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 19px;
            font-weight: bold;
            color: #166534;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #16A34A;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav a {
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 14px;
            color: #6B7280;
            transition: 0.2s;
        }

        .nav a:hover {
            background: #DCFCE7;
            color: #166534;
        }

        .nav a.active {
            background: #DCFCE7;
            color: #166534;
            font-weight: bold;
        }

        /* MAIN */

        .main {
            max-width: 1200px;
            margin: auto;
            padding: 40px 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 30px;
            font-weight: bold;
            color: #1F2937;
        }

        .page-subtitle {
            color: #6B7280;
            font-size: 14px;
            margin-top: 6px;
        }

        .add-button {
            background: #16A34A;
            color: white;
            padding: 12px 18px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .add-button:hover {
            background: #166534;
        }

        /* RESPONSIVE */

        @media (max-width: 700px) {

            .navbar {
                padding: 0 18px;
            }

            .brand span {
                display: none;
            }

            .nav {
                gap: 2px;
            }

            .nav a {
                padding: 9px 8px;
                font-size: 12px;
            }

            .main {
                padding: 25px 18px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                gap: 18px;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">

        <a href="{{ route('dashboard') }}" class="brand">

            <div class="brand-icon">
                ✓
            </div>

            <span>
                Task Manager
            </span>

        </a>

        <nav class="nav">

            <a
                href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
                Dashboard
            </a>

            <a
                href="{{ route('tasks.create') }}"
                class="{{ request()->routeIs('tasks.create') ? 'active' : '' }}"
            >
                Add Task
            </a>

            <a
                href="{{ route('tasks.index') }}"
                class="{{ request()->routeIs('tasks.index') ? 'active' : '' }}"
            >
                Tasks
            </a>

        </nav>

    </header>

    <main class="main">

        @yield('content')

    </main>

</body>
</html>