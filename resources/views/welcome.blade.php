<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Sistem Pelaporan Kehilangan - Polres</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
             {{-- ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}} --}}
        </style>
    </head>
    <body class="font-sans antialiased bg-white dark:bg-slate-900">
        <!-- Navigation -->
        <nav class="sticky top-0 z-50 bg-white dark:bg-slate-800 shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <span class="flex items-center gap-2 text-2xl font-bold text-orange-600 dark:text-orange-400">
                            <img src="logo.png" alt="Polrestas Papua" class="w-15 h-10">
                            Laporan Kehilangan
                        </span>
                    </div>
                    <div class="hidden md:flex space-x-8">
                        <a href="#features" class="text-gray-700 dark:text-gray-300 hover:text-orange-400 dark:hover:text-orange-400 transition">Fitur</a>
                        <a href="#how-it-works" class="text-gray-700 dark:text-gray-300 hover:text-orange-400 dark:hover:text-orange-400 transition">Cara Kerja</a>
                        <a href="#faq" class="text-gray-700 dark:text-gray-300 hover:text-orange-400 dark:hover:text-orange-400 transition">FAQ</a>
                        <a href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-orange-400 dark:hover:text-orange-400 transition">Kontak</a>
                    </div>
                    <div class="flex space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 text-orange-400 border border-orange-600 rounded-lg hover:bg-orange-50 dark:hover:bg-slate-700 transition">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition">Daftar</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="bg-gradient-to-br from-orange-50 to-indigo-100 dark:from-slate-800 dark:to-slate-900 py-20 px-4">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-5xl font-bold text-gray-900 dark:text-white mb-6">Laporkan Barang Hilang Anda dengan Mudah</h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">Sistem pelaporan kehilangan barang yang terpercaya dan responsif. Lacak status laporan Anda secara real-time dan tingkatkan peluang menemukan barang berharga Anda.</p>
                    <div class="flex gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-semibold">Buat Laporan</a>
                        @else
                            <a href="{{ route('register') }}" class="px-6 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-semibold">Mulai Sekarang</a>
                            <a href="{{ route('login') }}" class="px-6 py-3 border-2 border-orange-600 text-orange-400 dark:text-orange-400 rounded-lg hover:bg-orange-50 dark:hover:bg-slate-700 transition font-semibold">Masuk</a>
                        @endauth
                    </div>
                </div>
                <div class="flex justify-center">
                    <img src="ilustration.svg" alt="ILustrasi Laporan Kehilangan" class="w-full h-auto max-w-md">
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="bg-white dark:bg-slate-800 py-16 px-4">
            <div class="max-w-6xl mx-auto grid md:grid-cols-4 gap-8 text-center">
                <div class="p-6">
                    <p class="text-4xl font-bold text-orange-400 dark:text-orange-400">2,500+</p>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Laporan Diterima</p>
                </div>
                <div class="p-6">
                    <p class="text-4xl font-bold text-green-600 dark:text-green-400">1,850+</p>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Barang Ditemukan</p>
                </div>
                <div class="p-6">
                    <p class="text-4xl font-bold text-purple-600 dark:text-purple-400">98%</p>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Kepuasan Pengguna</p>
                </div>
                <div class="p-6">
                    <p class="text-4xl font-bold text-orange-600 dark:text-orange-400">24/7</p>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Layanan Tersedia</p>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 px-4 bg-gray-50 dark:bg-slate-900">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white">Fitur Unggulan</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                        <div class="text-4xl mb-4">📝</div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Laporan Mudah</h3>
                        <p class="text-gray-600 dark:text-gray-400">Form laporan yang sederhana dan intuitif. Hanya butuh beberapa menit untuk melaporkan barang hilang Anda.</p>
                    </div>
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                        <div class="text-4xl mb-4">📊</div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Lacak Status</h3>
                        <p class="text-gray-600 dark:text-gray-400">Pantau status laporan Anda secara real-time. Dapatkan update terbaru tentang proses pencarian barang Anda.</p>
                    </div>
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                        <div class="text-4xl mb-4">🔒</div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Aman & Terpercaya</h3>
                        <p class="text-gray-600 dark:text-gray-400">Data Anda dilindungi dengan enkripsi tingkat tinggi. Sistem kami dikelola oleh Polres profesional.</p>
                    </div>
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                        <div class="text-4xl mb-4">🔔</div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Notifikasi Real-time</h3>
                        <p class="text-gray-600 dark:text-gray-400">Terima notifikasi instant ketika ada perkembangan terbaru pada laporan Anda.</p>
                    </div>
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                        <div class="text-4xl mb-4">⚡</div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Respons Cepat</h3>
                        <p class="text-gray-600 dark:text-gray-400">Tim kami siap membantu dengan respons cepat. Rata-rata waktu respons kurang dari 1 jam.</p>
                    </div>
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                        <div class="text-4xl mb-4">📱</div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Akses Mudah</h3>
                        <p class="text-gray-600 dark:text-gray-400">Akses dari mana saja, kapan saja. Platform kami responsif di semua perangkat.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="how-it-works" class="py-20 px-4 bg-white dark:bg-slate-800">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white">Cara Kerja</h2>
                <div class="space-y-8">
                    <div class="flex gap-6">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-orange-600 text-white font-bold text-lg">1</div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Buat Akun</h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-2">Daftar dengan email dan password Anda untuk membuat akun baru.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-orange-600 text-white font-bold text-lg">2</div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Isi Laporan</h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-2">Lengkapi data barang hilang, tempat hilang, dan deskripsi detail untuk membantu proses pencarian.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-orange-600 text-white font-bold text-lg">3</div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Verifikasi Petugas</h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-2">Petugas Polres akan memverifikasi laporan Anda dan memulai proses pencarian.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-orange-600 text-white font-bold text-lg">4</div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Terima Update</h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-2">Pantau progress melalui dashboard dan terima notifikasi untuk setiap perkembangan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="bg-gradient-to-r from-orange-500 to-red-800 py-16 px-4">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h2 class="text-4xl font-bold mb-6">Barang Anda Penting Bagi Kami</h2>
                <p class="text-xl mb-8 opacity-90">Jangan tunda lagi. Laporkan barang hilang Anda sekarang dan tingkatkan peluang menemukannya.</p>
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-8 py-3 bg-white text-orange-400 rounded-lg font-semibold hover:bg-gray-100 transition inline-block">Buat Laporan Sekarang</a>
                @else
                    <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-orange-400 rounded-lg font-semibold hover:bg-gray-100 transition inline-block">Daftar Gratis Sekarang</a>
                @endauth
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="py-20 px-4 bg-gray-50 dark:bg-slate-900">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white">Pertanyaan Umum</h2>
                <div class="space-y-4">
                    <details class="bg-white dark:bg-slate-800 p-6 rounded-lg cursor-pointer">
                        <summary class="flex justify-between items-center font-bold text-gray-900 dark:text-white">
                            <span>Apakah layanan ini gratis?</span>
                            <span>+</span>
                        </summary>
                        <p class="text-gray-600 dark:text-gray-400 mt-4">Ya, layanan pelaporan barang hilang kami sepenuhnya gratis. Kami berkomitmen melayani masyarakat tanpa biaya tambahan.</p>
                    </details>
                    <details class="bg-white dark:bg-slate-800 p-6 rounded-lg cursor-pointer">
                        <summary class="flex justify-between items-center font-bold text-gray-900 dark:text-white">
                            <span>Berapa lama waktu pemrosesan laporan?</span>
                            <span>+</span>
                        </summary>
                        <p class="text-gray-600 dark:text-gray-400 mt-4">Laporan Anda akan diverifikasi dalam waktu kurang lebih 24 jam setelah pengajuan. Setelah verifikasi, tim kami langsung memulai proses pencarian.</p>
                    </details>
                    <details class="bg-white dark:bg-slate-800 p-6 rounded-lg cursor-pointer">
                        <summary class="flex justify-between items-center font-bold text-gray-900 dark:text-white">
                            <span>Bagaimana cara saya melacak status laporan?</span>
                            <span>+</span>
                        </summary>
                        <p class="text-gray-600 dark:text-gray-400 mt-4">Anda dapat melacak status laporan melalui dashboard akun Anda. Setiap perubahan status akan dikirimkan melalui notifikasi ke email dan platform kami.</p>
                    </details>
                    <details class="bg-white dark:bg-slate-800 p-6 rounded-lg cursor-pointer">
                        <summary class="flex justify-between items-center font-bold text-gray-900 dark:text-white">
                            <span>Apa yang harus saya lakukan jika barang saya ditemukan?</span>
                            <span>+</span>
                        </summary>
                        <p class="text-gray-600 dark:text-gray-400 mt-4">Jika barang Anda ditemukan, kami akan menghubungi Anda melalui nomor telepon atau email yang terdaftar. Anda dapat mengambil barang Anda di kantor Polres dengan membawa bukti identitas.</p>
                    </details>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 px-4 bg-white dark:bg-slate-800">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white">Hubungi Kami</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="text-4xl mb-4">📞</div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Telepon</h3>
                        <p class="text-gray-600 dark:text-gray-400">(0274) 555-1234</p>
                        <p class="text-gray-600 dark:text-gray-400">Senin - Jumat, 08:00 - 16:00 WIB</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl mb-4">📧</div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Email</h3>
                        <p class="text-gray-600 dark:text-gray-400">laporan@polres.go.id</p>
                        <p class="text-gray-600 dark:text-gray-400">Respon dalam 1 jam kerja</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl mb-4">📍</div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Alamat</h3>
                        <p class="text-gray-600 dark:text-gray-400">Jl. Ahmad Yani No. 100</p>
                        <p class="text-gray-600 dark:text-gray-400">Yogyakarta, 55163</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12 px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Tentang Kami</h3>
                        <p class="text-gray-400">Platform resmi pelaporan kehilangan barang dari Polres. Melayani dengan sepenuh hati.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Layanan</h3>
                        <ul class="text-gray-400 space-y-2">
                            <li><a href="#" class="hover:text-white transition">Buat Laporan</a></li>
                            <li><a href="#" class="hover:text-white transition">Cek Status</a></li>
                            <li><a href="#" class="hover:text-white transition">Panduan</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Bantuan</h3>
                        <ul class="text-gray-400 space-y-2">
                            <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                            <li><a href="#" class="hover:text-white transition">Hubungi Kami</a></li>
                            <li><a href="#" class="hover:text-white transition">Kebijakan Privasi</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Ikuti Kami</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition">Facebook</a>
                            <a href="#" class="text-gray-400 hover:text-white transition">Twitter</a>
                            <a href="#" class="text-gray-400 hover:text-white transition">Instagram</a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                    <p>&copy; 2024 Sistem Pelaporan Kehilangan - Polres. Semua hak dilindungi.</p>
                </div>
            </div>
        </footer>

        <script>
            // Smooth scroll untuk anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });

            // Toggle details styling
            document.querySelectorAll('details').forEach(detail => {
                detail.addEventListener('toggle', function() {
                    const summary = this.querySelector('summary span:last-child');
                    if (this.open) {
                        summary.textContent = '−';
                    } else {
                        summary.textContent = '+';
                    }
                });
            });
        </script>
    </body>
</html>
