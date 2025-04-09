<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Admin Panel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script> <!-- Icon pack -->
    <!-- Inside <head> of your layout -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    aside a {
        text-decoration: none;
    }

    aside a:hover {
        text-decoration: none;
    }

    aside button {
        text-decoration: none;
    }
</style>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md border-r">
            <div class="p-6 border-b">
                <h1 class="text-xl font-semibold text-indigo-700">🛒 Admin Panel</h1>
            </div>

            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded transition">
                            <i class="ph ph-house mr-2 text-lg"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded transition">
                            <i class="ph ph-package mr-2 text-lg"></i> Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.cart.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded transition">
                            <i class="ph ph-shopping-cart mr-2 text-lg"></i> Cart
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 rounded transition">
                            <i class="ph ph-clipboard-text mr-2 text-lg"></i> Orders
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left flex items-center p-2 text-red-600 hover:bg-red-50 hover:text-red-800 rounded transition" type="submit">
                                <i class="ph ph-sign-out mr-2 text-lg"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
