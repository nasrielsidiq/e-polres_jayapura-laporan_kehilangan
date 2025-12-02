<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin SPKT</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- gunakan Tailwind dari app.css, hilangkan styling inline yang konflik -->
</head>

<body class="bg-gray-100 min-h-screen">

    {{-- NAVBAR --}}
    @include('layouts.admin.partials.navbar')

    {{-- SIDEBAR --}}
    @include('layouts.admin.partials.sidebar')

    {{-- MAIN CONTENT
         - beri padding-top setara tinggi navbar (h-16 -> pt-16)
         - pada layar md+ geser konten ke kanan sebesar lebar sidebar (w-64 -> md:ml-64)
    --}}
    <main class="flex-1 min-h-screen mt-16 md:ml-64 p-4 md:p-6">
         @yield('content')
     </main>

 </body>
 </html>
