<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SEO Agency' }}</title>
    <meta name="description" content="Web design, development, and SEO services">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
    <style>
        body { font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">
    <header class="bg-white border-b">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-bold text-xl">SEO Agency</a>
            <nav class="space-x-6">
                <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
                <a href="{{ route('services') }}" class="hover:text-blue-600">Services</a>
                <a href="{{ route('contact') }}" class="hover:text-blue-600">Contact</a>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-10">
        {{ $slot }}
    </main>

    <footer class="bg-white border-t">
        <div class="max-w-6xl mx-auto px-4 py-6 text-sm text-gray-600">
            <p>&copy; {{ date('Y') }} SEO Agency. All rights reserved.</p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>