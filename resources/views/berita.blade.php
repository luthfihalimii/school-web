<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - SMKN 1 Surabaya</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Poppins --><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Header / Navbar -->
    <header id="header" class="bg-white shadow-md">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <svg class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v11.494m-9-5.747h18"/>
                        </svg>
                        <span class="text-xl font-bold text-gray-900">SMKN 1 SBY</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}#home" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Home</a>
                    <a href="{{ route('home') }}#sambutan" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Profil</a>
                    <a href="{{ route('home') }}#jurusan" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Jurusan</a>
                    <a href="{{ route('news.index') }}" class="text-red-600 font-bold">Berita</a>
                    <a href="{{ route('calendar') }}" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Calendar</a>
                    <a href="{{ route('gallery') }}" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Gallery</a>
                    <a href="{{ route('home') }}#kontak" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Kontak</a>
                </nav>

                <!-- CTA Button -->
                <div class="hidden md:block">
                    <a href="{{ route('home') }}#kontak" class="bg-red-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-red-700 transition-all shadow-sm">Hubungi Kami</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-800 hover:text-red-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden">
            <nav class="px-2 pt-2 pb-4 space-y-1 sm:px-3">
                <a href="{{ route('home') }}#home" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Home</a>
                <a href="{{ route('home') }}#sambutan" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Profil</a>
                <a href="{{ route('home') }}#jurusan" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Jurusan</a>
                <a href="{{ route('news.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-red-600">Berita</a>
                <a href="{{ route('calendar') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Calendar</a>
                <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Gallery</a>
                <a href="{{ route('home') }}#kontak" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Kontak</a>
            </nav>
        </div>
    </header>

    <main>
        <!-- Page Header -->
        <section class="bg-white pt-24 pb-12">
            <div class="container mx-auto px-4 text-center">
                <span class="text-red-600 font-semibold">KABAR SEKOLAH</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-2">Berita & Kegiatan Terbaru</h1>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Ikuti perkembangan, prestasi, dan semua kegiatan menarik dari lingkungan SMKN 1 Surabaya.</p>
            </div>
        </section>

        <!-- News Grid -->
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2">
                    @forelse ($articles as $article)
                        <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 flex flex-col" style="transition-delay: {{ $loop->iteration * 100 }}ms;">
                            <img class="w-full h-56 object-cover" src="{{ $article->image_url }}" alt="{{ $article->title }}">
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex-grow">
                                    @if ($article->category)
                                        <span class="text-sm font-semibold text-red-600">{{ $article->category }}</span>
                                    @endif
                                    <h3 class="mt-2 text-xl font-bold text-gray-900">{{ $article->title }}</h3>
                                    <p class="mt-3 text-gray-600 text-sm">{{ \Illuminate\Support\Str::limit($article->excerpt, 160) }}</p>
                                </div>
                                <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                                    <span class="text-xs text-gray-500">{{ $article->display_date }}</span>
                                    <a href="{{ route('news.show', $article->slug) }}" class="inline-block text-red-600 font-semibold hover:text-red-800 text-sm">Baca Selengkapnya &rarr;</a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="lg:col-span-3 bg-white rounded-2xl shadow-lg p-12 text-center text-gray-600">
                            Belum ada berita yang dipublikasikan. Silakan kunjungi kembali nanti.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

    </main>

    <!-- Footer --><footer class="bg-gray-900 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-bold">SMKN 1 Surabaya</h3>
                    <p class="mt-2 text-gray-400">Jl. Smea No.4, Wonokromo, Surabaya, Jawa Timur 60243</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold">Tautan Cepat</h3>
                    <ul class="mt-2 space-y-1">
                        <li><a href="{{ route('home') }}#sambutan" class="text-gray-400 hover:text-white">Profil Sekolah</a></li>
                        <li><a href="{{ route('home') }}#jurusan" class="text-gray-400 hover:text-white">Jurusan</a></li>
                        <li><a href="{{ route('news.index') }}" class="text-gray-400 hover:text-white">Berita</a></li>
                        <li><a href="{{ route('calendar') }}" class="text-gray-400 hover:text-white">Calendar</a></li>
                        <li><a href="{{ route('gallery') }}" class="text-gray-400 hover:text-white">Gallery</a></li>
                    </ul>
                </div>
                 <div>
                    <h3 class="text-lg font-bold">Ikuti Kami</h3>
                    <div class="flex space-x-4 mt-2">
                        <a href="#" class="text-gray-400 hover:text-white"><i data-lucide="facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i data-lucide="instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i data-lucide="youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-500 text-sm">
                <p>&copy; 2025 SMKN 1 Surabaya. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();

            // Mobile Menu Toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
