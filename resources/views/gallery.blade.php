<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - SMKN 1 Surabaya</title>

    <!-- Tailwind CSS --><script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Poppins --><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Lucide Icons --><script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .gallery-filter-btn.active {
            background-color: #DC2626; /* red-600 */
            color: white;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Header / Navbar --><header id="header" class="bg-white shadow-md">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo --><div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <svg class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v11.494m-9-5.747h18"/>
                        </svg>
                        <span class="text-xl font-bold text-gray-900">SMKN 1 SBY</span>
                    </a>
                </div>

                <!-- Desktop Navigation --><nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}#home" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Home</a>
                    <a href="{{ route('home') }}#sambutan" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Profil</a>
                    <a href="{{ route('home') }}#jurusan" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Jurusan</a>
                    <a href="{{ route('news.index') }}" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Berita</a>
                    <a href="{{ route('calendar') }}" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Calendar</a>
                    <a href="{{ route('gallery') }}" class="text-red-600 font-bold">Gallery</a>
                    <a href="{{ route('home') }}#kontak" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Kontak</a>
                </nav>

                <!-- CTA Button --><div class="hidden md:block">
                    <a href="{{ route('home') }}#kontak" class="bg-red-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-red-700 transition-all shadow-sm">Hubungi Kami</a>
                </div>

                <!-- Mobile Menu Button --><div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-800 hover:text-red-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu --><div id="mobile-menu" class="hidden md:hidden">
            <nav class="px-2 pt-2 pb-4 space-y-1 sm:px-3">
                <a href="{{ route('home') }}#home" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Home</a>
                <a href="{{ route('home') }}#sambutan" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Profil</a>
                <a href="{{ route('home') }}#jurusan" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Jurusan</a>
                <a href="{{ route('news.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Berita</a>
                 <a href="{{ route('calendar') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Calendar</a>
                 <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-red-600">Gallery</a>
                <a href="{{ route('home') }}#kontak" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Kontak</a>
            </nav>
        </div>
    </header>

    <main>
        <!-- Page Header --><section class="bg-white pt-24 pb-12">
            <div class="container mx-auto px-4 text-center">
                <span class="text-red-600 font-semibold">DOKUMENTASI</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-2">Galeri Kegiatan Sekolah</h1>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Momen-momen berharga dari berbagai kegiatan, prestasi, dan aktivitas di SMKN 1 Surabaya.</p>
            </div>
        </section>

        <!-- Gallery Section --><section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Filter Buttons -->
                <div id="gallery-filter" class="flex justify-center flex-wrap gap-2 mb-10">
                    <button class="gallery-filter-btn active px-4 py-2 text-sm font-semibold rounded-full bg-white text-gray-700 hover:bg-red-600 hover:text-white transition-colors" data-filter="all">Semua</button>
                    <button class="gallery-filter-btn px-4 py-2 text-sm font-semibold rounded-full bg-white text-gray-700 hover:bg-red-600 hover:text-white transition-colors" data-filter="kegiatan">Kegiatan</button>
                    <button class="gallery-filter-btn px-4 py-2 text-sm font-semibold rounded-full bg-white text-gray-700 hover:bg-red-600 hover:text-white transition-colors" data-filter="prestasi">Prestasi</button>
                    <button class="gallery-filter-btn px-4 py-2 text-sm font-semibold rounded-full bg-white text-gray-700 hover:bg-red-600 hover:text-white transition-colors" data-filter="fasilitas">Fasilitas</button>
                </div>

                <!-- Image Grid -->
                <div id="gallery-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <div class="gallery-item group relative overflow-hidden rounded-xl cursor-pointer" data-category="prestasi">
                        <img src="https://placehold.co/500x500/fecaca/991b1b?text=Juara+Lomba" alt="Juara Lomba" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 p-4 text-white">
                                <h3 class="font-bold">Juara Lomba Coding</h3>
                                <p class="text-sm">17 Oktober 2025</p>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item group relative overflow-hidden rounded-xl cursor-pointer" data-category="kegiatan">
                        <img src="https://placehold.co/500x500/fed7d7/9b2c2c?text=Pramuka" alt="Kegiatan Pramuka" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300">
                         <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 p-4 text-white">
                                <h3 class="font-bold">Perkemahan Sabtu Minggu</h3>
                                <p class="text-sm">10 Oktober 2025</p>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item group relative overflow-hidden rounded-xl cursor-pointer" data-category="fasilitas">
                        <img src="https://placehold.co/500x500/fbb6ce/97266d?text=Lab+RPL" alt="Lab RPL" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300">
                         <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 p-4 text-white">
                                <h3 class="font-bold">Laboratorium RPL</h3>
                                <p class="text-sm">Fasilitas Modern</p>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item group relative overflow-hidden rounded-xl cursor-pointer" data-category="kegiatan">
                        <img src="https://placehold.co/500x500/c3dafe/2a4365?text=Kunjungan+Industri" alt="Kunjungan Industri" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300">
                         <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 p-4 text-white">
                                <h3 class="font-bold">Kunjungan Industri</h3>
                                <p class="text-sm">15 Oktober 2025</p>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item group relative overflow-hidden rounded-xl cursor-pointer" data-category="fasilitas">
                        <img src="https://placehold.co/500x500/bce3f3/0d445c?text=Perpustakaan" alt="Perpustakaan" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300">
                         <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 p-4 text-white">
                                <h3 class="font-bold">Perpustakaan Digital</h3>
                                <p class="text-sm">Sumber Belajar</p>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item group relative overflow-hidden rounded-xl cursor-pointer" data-category="prestasi">
                        <img src="https://placehold.co/500x500/fefcbf/744210?text=Juara+Olimpiade" alt="Juara Olimpiade" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300">
                         <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 p-4 text-white">
                                <h3 class="font-bold">Medali Emas Olimpiade</h3>
                                <p class="text-sm">2 September 2025</p>
                            </div>
                        </div>
                    </div>
                     <div class="gallery-item group relative overflow-hidden rounded-xl cursor-pointer" data-category="kegiatan">
                        <img src="https://placehold.co/500x500/c6f6d5/22543d?text=Class+Meeting" alt="Class Meeting" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300">
                         <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 p-4 text-white">
                                <h3 class="font-bold">Class Meeting</h3>
                                <p class="text-sm">20 Juni 2025</p>
                            </div>
                        </div>
                    </div>
                     <div class="gallery-item group relative overflow-hidden rounded-xl cursor-pointer" data-category="fasilitas">
                        <img src="https://placehold.co/500x500/e9d8fd/44337a?text=Lab+TKJ" alt="Lab TKJ" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300">
                         <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 p-4 text-white">
                                <h3 class="font-bold">Laboratorium TKJ</h3>
                                <p class="text-sm">Praktik Jaringan</p>
                            </div>
                        </div>
                    </div>
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

            // Gallery Filter Logic
            const filterContainer = document.getElementById('gallery-filter');
            const filterBtns = filterContainer.querySelectorAll('.gallery-filter-btn');
            const galleryItems = document.querySelectorAll('.gallery-item');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Update active button
                    filterContainer.querySelector('.active').classList.remove('active');
                    btn.classList.add('active');

                    const filterValue = btn.dataset.filter;

                    galleryItems.forEach(item => {
                        if (filterValue === 'all' || item.dataset.category === filterValue) {
                            item.classList.remove('hidden');
                        } else {
                            item.classList.add('hidden');
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
