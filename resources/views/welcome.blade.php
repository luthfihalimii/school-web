<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 1 Surabaya - Sekolah Teknologi Unggulan</title>

    <!-- Tailwind CSS --><script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Poppins --><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Lucide Icons --><script src="https://unpkg.com/lucide@latest"></script>

    <!-- Swiper CSS --><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        /* Custom Styles & Animations */
        body {
            font-family: 'Poppins', sans-serif;
        }
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        .animate-fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .animate-fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .group:hover .group-hover-effect {
            transform: translateY(-5px);
        }
        @keyframes chat-fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .chat-message-animation {
            animation: chat-fade-in 0.4s ease-out forwards;
        }
        /* Custom styles for swiper navigation */
        .swiper-button-prev, .swiper-button-next {
            color: #DC2626 !important; /* Tailwind's red-600 */
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 9999px; /* Full rounded */
            width: 44px; /* Default Swiper size */
            height: 44px; /* Default Swiper size */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* Shadow */
        }
        .swiper-button-prev:hover, .swiper-button-next:hover {
            background-color: rgba(255, 255, 255, 1);
        }
        .swiper-button-prev::after, .swiper-button-next::after {
            font-size: 1.5rem !important; /* Adjust icon size */
            font-weight: bold;
        }
        .swiper-pagination-bullet-active {
            background-color: #DC2626 !important; /* Tailwind's red-600 */
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Header / Navbar --><header id="header" class="bg-white shadow-md">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo --><div class="flex-shrink-0">
                    <a href="#home" class="flex items-center space-x-2">
                        <svg class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v11.494m-9-5.747h18"/>
                        </svg>
                        <span class="text-xl font-bold text-gray-900">SMKN 1 SBY</span>
                    </a>
                </div>

                <!-- Desktop Navigation --><nav class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Home</a>
                    <a href="#sambutan" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Profil</a>
                    <a href="#jurusan" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Jurusan</a>
                    <a href="#berita" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Berita</a>
                    <a href="#kontak" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Kontak</a>
                </nav>

                <!-- CTA Button --><div class="hidden md:block">
                    <a href="#kontak" class="bg-red-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-red-700 transition-all shadow-sm">Hubungi Kami</a>
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
                <a href="#home" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Home</a>
                <a href="#sambutan" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Profil</a>
                <a href="#jurusan" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Jurusan</a>
                <a href="#berita" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Berita</a>
                <a href="#kontak" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Kontak</a>
            </nav>
        </div>
    </header>

    <main>
        <!-- Home Section --><section id="home" class="relative py-20 bg-white">
            <!-- Background Dot Pattern --><div class="absolute inset-0 -z-10 h-full w-full bg-white bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:24px_24px]"></div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative pt-12">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div class="animate-fade-in">
                        <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-relaxed">
                            Membentuk <span class="text-gradient bg-gradient-to-r from-red-600 to-red-800">Generasi Unggul</span> di Era Digital.
                        </h1>
                        <p class="mt-6 text-lg text-gray-600 max-w-xl">
                            SMKN 1 Surabaya berkomitmen untuk mencetak lulusan yang kompeten, kreatif, dan siap bersaing di dunia industri.
                        </p>

                        <!-- Poin Keunggulan (Social Proof) --><div class="mt-8 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6 text-gray-800">
                            <div class="flex items-center">
                                <i data-lucide="award" class="w-6 h-6 mr-2 text-red-600 flex-shrink-0"></i>
                                <span class="font-semibold">100+ Mitra Industri</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="briefcase" class="w-6 h-6 mr-2 text-red-600 flex-shrink-0"></i>
                                <span class="font-semibold">95% Lulusan Bekerja</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="star" class="w-6 h-6 mr-2 text-red-600 flex-shrink-0"></i>
                                <span class="font-semibold">Akreditasi A</span>
                            </div>
                        </div>

                        <div class="mt-10 flex flex-wrap gap-4">
                            <a href="#jurusan" class="bg-red-600 text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-red-700 transition-all transform hover:scale-105 shadow-lg">Lihat Jurusan</a>
                            <a href="#sambutan" class="bg-gray-200 text-gray-800 px-8 py-3 rounded-lg font-semibold text-lg hover:bg-gray-300 transition-all">Tentang Kami</a>
                        </div>
                    </div>
                    <div class="animate-fade-in" style="transition-delay: 200ms;">
                        <img src="https://placehold.co/600x500/f87171/ffffff?text=Ilustrasi+Siswa+Modern" alt="Siswa SMKN 1 Surabaya" class="rounded-2xl shadow-2xl mx-auto">
                    </div>
                </div>
            </div>
        </section>

        <!-- Sambutan Kepala Sekolah --><section id="sambutan" class="py-20">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="animate-fade-in">
                        <img src="https://placehold.co/500x600/e2e8f0/334155?text=Foto+Kepala+Sekolah" alt="Kepala Sekolah SMKN 1 Surabaya" class="rounded-2xl shadow-xl mx-auto w-full max-w-sm">
                    </div>
                    <div class="animate-fade-in" style="transition-delay: 200ms;">
                        <span class="text-red-600 font-semibold">SELAMAT DATANG</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Sambutan dari Kepala Sekolah</h2>
                        <p class="mt-6 text-gray-600">
                            Assalamualaikum Warahmatullahi Wabarakatuh.
                            <br><br>
                            Selamat datang di situs resmi SMKN 1 Surabaya. Kami bangga menjadi bagian dari perjalanan pendidikan anak bangsa, mempersiapkan mereka dengan keahlian teknologi terkini dan karakter yang kuat. Mari bersama-sama kita wujudkan masa depan cerah.
                        </p>
                        <div class="mt-8">
                            <h4 class="font-bold text-lg text-gray-900">Bpk. Dr. H. Ahmad Fauzi, M.Pd.</h4>
                            <p class="text-gray-500">Kepala SMKN 1 Surabaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Jurusan Section --><section id="jurusan" class="pt-20 pb-28 bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="animate-fade-in">
                    <span class="text-red-600 font-semibold">PROGRAM KEAHLIAN</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Jurusan Unggulan Kami</h2>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Kami menyediakan berbagai program keahlian yang relevan dengan kebutuhan industri 4.0 dan masa depan.
                    </p>
                </div>
                <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    <!-- Jurusan Card 1 --><div class="group bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 animate-fade-in" style="transition-delay: 100ms;">
                        <div class="bg-red-100 text-red-600 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover-effect transition-transform duration-300">
                           <i data-lucide="code-2" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Rekayasa Perangkat Lunak</h3>
                        <p class="mt-2 text-gray-600 text-sm">Pengembangan aplikasi, web, dan sistem.</p>
                    </div>
                    <!-- Jurusan Card 2 --><div class="group bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 animate-fade-in" style="transition-delay: 150ms;">
                        <div class="bg-red-100 text-red-600 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover-effect transition-transform duration-300">
                           <i data-lucide="server-cog" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Teknik Komputer & Jaringan</h3>
                        <p class="mt-2 text-gray-600 text-sm">Jaringan, keamanan siber, administrasi server.</p>
                    </div>
                    <!-- Jurusan Card 3 --><div class="group bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 animate-fade-in" style="transition-delay: 200ms;">
                        <div class="bg-red-100 text-red-600 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover-effect transition-transform duration-300">
                           <i data-lucide="film" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Multimedia & Desain Grafis</h3>
                        <p class="mt-2 text-gray-600 text-sm">Produksi video, animasi, desain visual.</p>
                    </div>
                    <!-- Jurusan Card 4 --><div class="group bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 animate-fade-in" style="transition-delay: 250ms;">
                        <div class="bg-red-100 text-red-600 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover-effect transition-transform duration-300">
                           <i data-lucide="cpu" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Teknik Elektronika Industri</h3>
                        <p class="mt-2 text-gray-600 text-sm">Sistem kendali otomatisasi industri.</p>
                    </div>
                    <!-- Jurusan Card 5 --><div class="group bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 animate-fade-in" style="transition-delay: 300ms;">
                        <div class="bg-red-100 text-red-600 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover-effect transition-transform duration-300">
                           <i data-lucide="wrench" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Teknik Pemesinan</h3>
                        <p class="mt-2 text-gray-600 text-sm">Manufaktur, perancangan komponen mesin.</p>
                    </div>
                    <!-- Jurusan Card 6 --><div class="group bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 animate-fade-in" style="transition-delay: 350ms;">
                        <div class="bg-red-100 text-red-600 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover-effect transition-transform duration-300">
                           <i data-lucide="car" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Teknik Otomotif</h3>
                        <p class="mt-2 text-gray-600 text-sm">Perawatan, perbaikan, dan modifikasi kendaraan.</p>
                    </div>
                     <!-- Jurusan Card 7 --><div class="group bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 animate-fade-in" style="transition-delay: 400ms;">
                        <div class="bg-red-100 text-red-600 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover-effect transition-transform duration-300">
                           <i data-lucide="factory" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Teknik Bisnis Konstruksi & Properti</h3>
                        <p class="mt-2 text-gray-600 text-sm">Perencanaan, pelaksanaan, dan pengawasan proyek.</p>
                    </div>
                     <!-- Jurusan Card 8 --><div class="group bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 animate-fade-in" style="transition-delay: 450ms;">
                        <div class="bg-red-100 text-red-600 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover-effect transition-transform duration-300">
                           <i data-lucide="building-2" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Akuntansi & Keuangan Lembaga</h3>
                        <p class="mt-2 text-gray-600 text-sm">Pembukuan, pelaporan keuangan, perpajakan.</p>
                    </div>
                     <!-- Jurusan Card 9 --><div class="group bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 animate-fade-in" style="transition-delay: 500ms;">
                        <div class="bg-red-100 text-red-600 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover-effect transition-transform duration-300">
                           <i data-lucide="briefcase" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Bisnis Daring & Pemasaran</h3>
                        <p class="mt-2 text-gray-600 text-sm">E-commerce, strategi pemasaran digital.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- News/Blog Section --><section id="berita" class="py-20">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center animate-fade-in">
                    <span class="text-red-600 font-semibold">KABAR SEKOLAH</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Berita & Kegiatan Terbaru</h2>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Ikuti perkembangan dan prestasi terbaru dari SMKN 1 Surabaya.</p>
                </div>
                <div class="mt-12 grid gap-8 lg:grid-cols-3">
                    <!-- Blog Post 1 --><div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 animate-fade-in flex flex-col" style="transition-delay: 100ms;">
                        <img class="w-full h-56 object-cover" src="https://placehold.co/600x400/fecaca/991b1b?text=Lomba+Coding" alt="Lomba Coding Nasional">
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex-grow">
                                <span class="text-sm font-semibold text-red-600">Prestasi</span>
                                <h3 class="mt-2 text-xl font-bold text-gray-900">Siswa SMKN 1 Surabaya Raih Juara 1 Lomba Coding Nasional</h3>
                                <p class="mt-3 text-gray-600">Tim programming sekolah berhasil mengungguli puluhan peserta dari seluruh Indonesia.</p>
                            </div>
                            <a href="#" class="mt-4 inline-block text-red-600 font-semibold hover:text-red-800">Baca Selengkapnya &rarr;</a>
                        </div>
                    </div>
                     <!-- Blog Post 2 --><div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 animate-fade-in flex flex-col" style="transition-delay: 200ms;">
                        <img class="w-full h-56 object-cover" src="https://placehold.co/600x400/fecaca/991b1b?text=Kunjungan+Industri" alt="Kunjungan Industri">
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex-grow">
                                <span class="text-sm font-semibold text-red-600">Kegiatan</span>
                                <h3 class="mt-2 text-xl font-bold text-gray-900">Kunjungan Industri ke Perusahaan Teknologi Terkemuka</h3>
                                <p class="mt-3 text-gray-600">Siswa jurusan RPL mendapatkan wawasan langsung dari para praktisi industri.</p>
                            </div>
                            <a href="#" class="mt-4 inline-block text-red-600 font-semibold hover:text-red-800">Baca Selengkapnya &rarr;</a>
                        </div>
                    </div>
                     <!-- Blog Post 3 --><div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 animate-fade-in flex flex-col" style="transition-delay: 300ms;">
                        <img class="w-full h-56 object-cover" src="https://placehold.co/600x400/fecaca/991b1b?text=Workshop+AI" alt="Workshop AI">
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex-grow">
                                <span class="text-sm font-semibold text-red-600">Event</span>
                                <h3 class="mt-2 text-xl font-bold text-gray-900">Workshop "Mengenal Artificial Intelligence" untuk Guru</h3>
                                <p class="mt-3 text-gray-600">Peningkatan kompetensi guru dalam menghadapi tantangan teknologi masa depan.</p>
                            </div>
                            <a href="#" class="mt-4 inline-block text-red-600 font-semibold hover:text-red-800">Baca Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimoni Alumni --><section id="testimoni" class="py-20 bg-red-700 text-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center animate-fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold">Apa Kata Alumni Kami?</h2>
                    <p class="mt-4 max-w-2xl mx-auto opacity-80">Lulusan kami telah berhasil berkarir di berbagai perusahaan ternama.</p>
                </div>
                <div class="mt-12 grid md:grid-cols-2 gap-8">
                    <!-- Testimonial 1 --><div class="bg-white/10 p-8 rounded-2xl animate-fade-in" style="transition-delay: 100ms;">
                        <p class="text-lg italic">"Pendidikan di SMKN 1 Surabaya benar-benar membekali saya dengan skill praktis yang sangat dibutuhkan di dunia kerja. Fondasi yang saya dapat di sini luar biasa."</p>
                        <div class="flex items-center mt-6">
                            <img class="h-14 w-14 rounded-full object-cover" src="https://placehold.co/100x100/ffffff/333333?text=AR" alt="Alumni 1">
                            <div class="ml-4">
                                <p class="font-bold text-white">Andi Rahman</p>
                                <p class="text-sm opacity-80">Software Engineer di Gojek</p>
                            </div>
                        </div>
                    </div>
                     <!-- Testimonial 2 --><div class="bg-white/10 p-8 rounded-2xl animate-fade-in" style="transition-delay: 200ms;">
                        <p class="text-lg italic">"Guru-gurunya sangat suportif dan fasilitas labnya lengkap. Saya tidak akan bisa menjadi seorang Network Engineer tanpa bimbingan mereka."</p>
                        <div class="flex items-center mt-6">
                            <img class="h-14 w-14 rounded-full object-cover" src="https://placehold.co/100x100/ffffff/333333?text=SN" alt="Alumni 2">
                            <div class="ml-4">
                                <p class="font-bold text-white">Siti Nurhaliza</p>
                                <p class="text-sm opacity-80">Network Engineer di Telkom Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visi & Misi --><section id="visi-misi" class="py-20 bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-12">
                <div class="animate-fade-in">
                    <h2 class="text-3xl font-bold text-gray-900 flex items-center"><i data-lucide="eye" class="w-8 h-8 mr-3 text-red-600"></i>Visi Kami</h2>
                    <p class="mt-4 text-gray-600 text-lg border-l-4 border-red-600 pl-4">"Menjadi lembaga pendidikan vokasi teknologi terdepan yang menghasilkan lulusan berakhlak mulia, kompeten, dan berdaya saing global."</p>
                </div>
                <div class="animate-fade-in" style="transition-delay: 100ms;">
                    <h2 class="text-3xl font-bold text-gray-900 flex items-center"><i data-lucide="target" class="w-8 h-8 mr-3 text-red-600"></i>Misi Kami</h2>
                    <ul class="mt-4 space-y-3">
                        <li class="flex items-start">
                            <i data-lucide="check-circle-2" class="w-6 h-6 mr-3 text-green-500 mt-1 flex-shrink-0"></i>
                            <span class="text-gray-600">Menyelenggarakan pendidikan berbasis teknologi informasi yang inovatif dan adaptif.</span>
                        </li>
                        <li class="flex items-start">
                             <i data-lucide="check-circle-2" class="w-6 h-6 mr-3 text-green-500 mt-1 flex-shrink-0"></i>
                            <span class="text-gray-600">Membentuk karakter siswa yang disiplin, jujur, dan bertanggung jawab.</span>
                        </li>
                        <li class="flex items-start">
                             <i data-lucide="check-circle-2" class="w-6 h-6 mr-3 text-green-500 mt-1 flex-shrink-0"></i>
                            <span class="text-gray-600">Menjalin kemitraan strategis dengan industri untuk sinkronisasi kurikulum dan penyaluran kerja.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Profil Guru Section (Slider) --><section id="guru" class="py-20">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                 <div class="animate-fade-in">
                    <span class="text-red-600 font-semibold">TENAGA PENGAJAR</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Guru Profesional & Berpengalaman</h2>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Dibimbing oleh para pengajar ahli di bidangnya masing-masing.</p>
                </div>

                <div class="mt-12 relative">
                    <!-- Swiper --><div class="swiper mySwiper">
                        <div class="swiper-wrapper pb-10">
                            <!-- Guru Card 1 --><div class="swiper-slide animate-fade-in flex" style="transition-delay: 100ms;">
                                <article class="bg-white p-8 rounded-2xl shadow-md w-full flex flex-col items-center text-center h-full min-h-[22rem]">
                                    <img src="https://placehold.co/200x200/e2e8f0/334155?text=Bambang" class="w-32 h-32 rounded-full shadow-lg object-cover">
                                    <div class="mt-6 space-y-1">
                                        <h4 class="font-bold text-lg text-gray-900">Bambang S., S.Kom</h4>
                                        <p class="text-red-600 font-medium">Guru RPL</p>
                                    </div>
                                    <p class="mt-auto pt-6 text-gray-600 text-sm leading-relaxed max-w-xs">Ahli dalam pengembangan web modern.</p>
                                </article>
                            </div>
                            <!-- Guru Card 2 --><div class="swiper-slide animate-fade-in flex" style="transition-delay: 200ms;">
                                <article class="bg-white p-8 rounded-2xl shadow-md w-full flex flex-col items-center text-center h-full min-h-[22rem]">
                                    <img src="https://placehold.co/200x200/e2e8f0/334155?text=Endah" class="w-32 h-32 rounded-full shadow-lg object-cover">
                                    <div class="mt-6 space-y-1">
                                        <h4 class="font-bold text-lg text-gray-900">Endah W., M.T.</h4>
                                        <p class="text-red-600 font-medium">Guru TKJ</p>
                                    </div>
                                    <p class="mt-auto pt-6 text-gray-600 text-sm leading-relaxed max-w-xs">Pakar keamanan jaringan, server, dan juga sering mengikuti lomba-lomba tingkat nasional.</p>
                                </article>
                            </div>
                            <!-- Guru Card 3 --><div class="swiper-slide animate-fade-in flex" style="transition-delay: 300ms;">
                                <article class="bg-white p-8 rounded-2xl shadow-md w-full flex flex-col items-center text-center h-full min-h-[22rem]">
                                    <img src="https://placehold.co/200x200/e2e8f0/334155?text=Citra" class="w-32 h-32 rounded-full shadow-lg object-cover">
                                    <div class="mt-6 space-y-1">
                                        <h4 class="font-bold text-lg text-gray-900">Citra Lestari, S.Ds</h4>
                                        <p class="text-red-600 font-medium">Guru Multimedia</p>
                                    </div>
                                    <p class="mt-auto pt-6 text-gray-600 text-sm leading-relaxed max-w-xs">Kreator konten digital dan animasi.</p>
                                </article>
                            </div>
                            <!-- Guru Card 4 --><div class="swiper-slide animate-fade-in flex" style="transition-delay: 400ms;">
                                <article class="bg-white p-8 rounded-2xl shadow-md w-full flex flex-col items-center text-center h-full min-h-[22rem]">
                                    <img src="https://placehold.co/200x200/e2e8f0/334155?text=Rizky" class="w-32 h-32 rounded-full shadow-lg object-cover">
                                    <div class="mt-6 space-y-1">
                                        <h4 class="font-bold text-lg text-gray-900">Rizky Pratama, S.Pd</h4>
                                        <p class="text-red-600 font-medium">Guru Produktif</p>
                                    </div>
                                    <p class="mt-auto pt-6 text-gray-600 text-sm leading-relaxed max-w-xs">Fokus pada inovasi dan kewirausahaan.</p>
                                </article>
                            </div>
                             <!-- Guru Card 5 --><div class="swiper-slide animate-fade-in flex" style="transition-delay: 500ms;">
                                <article class="bg-white p-8 rounded-2xl shadow-md w-full flex flex-col items-center text-center h-full min-h-[22rem]">
                                    <img src="https://placehold.co/200x200/e2e8f0/334155?text=Dewi" class="w-32 h-32 rounded-full shadow-lg object-cover">
                                    <div class="mt-6 space-y-1">
                                        <h4 class="font-bold text-lg text-gray-900">Dewi Anggraini, S.T.</h4>
                                        <p class="text-red-600 font-medium">Guru TEI</p>
                                    </div>
                                    <p class="mt-auto pt-6 text-gray-600 text-sm leading-relaxed max-w-xs">Spesialisasi di bidang elektronika industri.</p>
                                </article>
                            </div>
                            <!-- Guru Card 6 --><div class="swiper-slide animate-fade-in flex" style="transition-delay: 600ms;">
                                <article class="bg-white p-8 rounded-2xl shadow-md w-full flex flex-col items-center text-center h-full min-h-[22rem]">
                                    <img src="https://placehold.co/200x200/e2e8f0/334155?text=Joko" class="w-32 h-32 rounded-full shadow-lg object-cover">
                                    <div class="mt-6 space-y-1">
                                        <h4 class="font-bold text-lg text-gray-900">Joko Santoso, S.Pd</h4>
                                        <p class="text-red-600 font-medium">Guru Otomotif</p>
                                    </div>
                                    <p class="mt-auto pt-6 text-gray-600 text-sm leading-relaxed max-w-xs">Pakar di bidang perbaikan kendaraan.</p>
                                </article>
                            </div>
                        </div>
                        <!-- Add Pagination --><div class="swiper-pagination"></div>
                        <!-- Add Navigation --><div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sponsors Section --><section id="sponsor" class="py-20">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                 <div class="animate-fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Didukung Oleh Mitra Terpercaya</h2>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Kami berterima kasih kepada para mitra yang telah mendukung perjalanan pendidikan kami.</p>
                </div>
                <div class="mt-12 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 items-center">
                    <!-- Sponsor Logo 1 --><div class="animate-fade-in" style="transition-delay: 100ms;">
                        <img src="https://placehold.co/200x100/e2e8f0/a0aec0?text=Sponsor+1" alt="Logo Sponsor 1" class="mx-auto grayscale hover:grayscale-0 transition-all duration-300">
                    </div>
                    <!-- Sponsor Logo 2 --><div class="animate-fade-in" style="transition-delay: 200ms;">
                        <img src="https://placehold.co/200x100/e2e8f0/a0aec0?text=Sponsor+2" alt="Logo Sponsor 2" class="mx-auto grayscale hover:grayscale-0 transition-all duration-300">
                    </div>
                    <!-- Sponsor Logo 3 --><div class="animate-fade-in" style="transition-delay: 300ms;">
                        <img src="https://placehold.co/200x100/e2e8f0/a0aec0?text=Sponsor+3" alt="Logo Sponsor 3" class="mx-auto grayscale hover:grayscale-0 transition-all duration-300">
                    </div>
                    <!-- Sponsor Logo 4 --><div class="animate-fade-in" style="transition-delay: 400ms;">
                        <img src="https://placehold.co/200x100/e2e8f0/a0aec0?text=Sponsor+4" alt="Logo Sponsor 4" class="mx-auto grayscale hover:grayscale-0 transition-all duration-300">
                    </div>
                    <!-- Sponsor Logo 5 --><div class="animate-fade-in" style="transition-delay: 500ms;">
                        <img src="https://placehold.co/200x100/e2e8f0/a0aec0?text=Sponsor+5" alt="Logo Sponsor 5" class="mx-auto grayscale hover:grayscale-0 transition-all duration-300">
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section --><section id="kontak" class="py-20 bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center animate-fade-in">
                    <span class="text-red-600 font-semibold">HUBUNGI KAMI</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Punya Pertanyaan?</h2>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Kami siap membantu Anda untuk informasi lebih lanjut mengenai pendaftaran atau hal lainnya.</p>
                </div>
                <div class="mt-12 grid md:grid-cols-2 gap-8 bg-gray-50 p-8 rounded-2xl">
                    <div class="animate-fade-in" style="transition-delay: 100ms;">
                        <h3 class="text-2xl font-bold text-gray-900">Informasi Kontak</h3>
                        <p class="mt-2 text-gray-600">Kunjungi kami atau hubungi melalui detail di bawah ini.</p>
                        <ul class="mt-6 space-y-4 text-gray-700">
                            <li class="flex items-start">
                                <i data-lucide="map-pin" class="w-6 h-6 mr-3 text-red-600 mt-1"></i>
                                <span>Jl. Smea No.4, Wonokromo, Surabaya, Jawa Timur 60243</span>
                            </li>
                             <li class="flex items-start">
                                <i data-lucide="phone" class="w-6 h-6 mr-3 text-red-600 mt-1"></i>
                                <span>(031) 8292021</span>
                            </li>
                             <li class="flex items-start">
                                <i data-lucide="mail" class="w-6 h-6 mr-3 text-red-600 mt-1"></i>
                                <span>info@smkn1surabaya.sch.id</span>
                            </li>
                        </ul>
                         <div class="mt-6">
                            <img src="https://placehold.co/600x300/e2e8f0/334155?text=Peta+Lokasi+Sekolah" class="rounded-lg shadow-md w-full object-cover h-48">
                         </div>
                    </div>
                    <form class="space-y-4 animate-fade-in" style="transition-delay: 200ms;">
                        <div>
                            <label for="name" class="sr-only">Nama</label>
                            <input type="text" id="name" placeholder="Nama Anda" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition">
                        </div>
                        <div>
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" id="email" placeholder="Alamat Email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition">
                        </div>
                        <div>
                            <label for="message" class="sr-only">Pesan</label>
                            <textarea id="message" rows="5" placeholder="Pesan Anda" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-red-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-700 transition-all shadow-lg">Kirim Pesan</button>
                    </form>
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
                        <li><a href="#sambutan" class="text-gray-400 hover:text-white">Profil Sekolah</a></li>
                        <li><a href="#jurusan" class="text-gray-400 hover:text-white">Jurusan</a></li>
                        <li><a href="#berita" class="text-gray-400 hover:text-white">Berita</a></li>
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

    <!-- AI Chatbot --><div id="chatbot-container" class="fixed bottom-6 right-6 z-50">
        <!-- Chat Bubble --><button id="chatbot-toggle" class="bg-red-600 text-white w-16 h-16 rounded-full shadow-xl flex items-center justify-center transform hover:scale-110 transition-transform">
            <i data-lucide="message-circle" class="w-8 h-8"></i>
        </button>

        <!-- Chat Window --><div id="chatbot-window" class="hidden absolute bottom-20 right-0 w-80 sm:w-96 bg-white rounded-2xl shadow-2xl border border-gray-200 flex flex-col transition-all origin-bottom-right">
            <div class="bg-red-600 text-white p-4 rounded-t-2xl flex justify-between items-center">
                <h3 class="font-bold text-lg">Asisten AI SMKN 1</h3>
                <button id="chatbot-close" class="text-white opacity-80 hover:opacity-100">&times;</button>
            </div>
            <div id="chatbot-messages" class="flex-1 p-4 overflow-y-auto h-80">
                <!-- Bot welcome message --><div class="flex mb-4">
                    <div class="bg-gray-200 text-gray-800 p-3 rounded-lg rounded-bl-none max-w-xs">
                        Halo! Saya Asisten AI SMKN 1 Surabaya. Ada yang bisa saya bantu?
                    </div>
                </div>
            </div>
            <div class="p-4 border-t border-gray-200">
                <form id="chatbot-form" class="flex items-center space-x-2">
                    <input type="text" id="chatbot-input" placeholder="Ketik pertanyaanmu..." class="flex-1 min-w-0 px-4 py-2 rounded-full border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500" autocomplete="off">
                    <button type="submit" class="bg-red-600 text-white w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center">
                        <i data-lucide="send" class="w-5 h-5"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Swiper JS --><script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide Icons
            lucide.createIcons();

            // Mobile Menu Toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when a link is clicked
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });

            // Fade-in animation on scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.animate-fade-in').forEach(el => {
                observer.observe(el);
            });

            // Swiper for Guru Section
            const swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    640: { // sm
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: { // md
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1024: { // lg
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                },
            });

            // Chatbot Logic
            const chatbotToggle = document.getElementById('chatbot-toggle');
            const chatbotWindow = document.getElementById('chatbot-window');
            const chatbotClose = document.getElementById('chatbot-close');
            const chatbotForm = document.getElementById('chatbot-form');
            const chatbotInput = document.getElementById('chatbot-input');
            const chatbotMessages = document.getElementById('chatbot-messages');

            chatbotToggle.addEventListener('click', () => {
                chatbotWindow.classList.toggle('hidden');
            });

            chatbotClose.addEventListener('click', () => {
                chatbotWindow.classList.add('hidden');
            });

            chatbotForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const userInput = chatbotInput.value.trim();
                if (!userInput) return;

                appendMessage(userInput, 'user');
                chatbotInput.value = '';

                showLoadingIndicator();

                try {
                    const botResponse = await getGeminiResponse(userInput);
                    removeLoadingIndicator();
                    appendMessage(botResponse, 'bot');
                } catch (error) {
                    removeLoadingIndicator();
                    appendMessage('Maaf, terjadi kesalahan. Silakan coba lagi nanti.', 'bot');
                    console.error("Error fetching Gemini response:", error);
                }
            });

            function appendMessage(text, sender) {
                const messageDiv = document.createElement('div');
                messageDiv.classList.add('flex', 'mb-4', 'chat-message-animation');

                const messageBubble = document.createElement('div');
                messageBubble.textContent = text;

                if (sender === 'user') {
                    messageDiv.classList.add('justify-end');
                    messageBubble.classList.add('bg-red-600', 'text-white', 'p-3', 'rounded-lg', 'rounded-br-none', 'max-w-xs');
                } else {
                    messageBubble.classList.add('bg-gray-200', 'text-gray-800', 'p-3', 'rounded-lg', 'rounded-bl-none', 'max-w-xs');
                }

                messageDiv.appendChild(messageBubble);
                chatbotMessages.appendChild(messageDiv);
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
            }

            function showLoadingIndicator() {
                const loadingDiv = document.createElement('div');
                loadingDiv.id = 'loading-indicator';
                loadingDiv.classList.add('flex', 'mb-4');
                loadingDiv.innerHTML = `
                    <div class="bg-gray-200 text-gray-800 p-3 rounded-lg rounded-bl-none max-w-xs">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-gray-500 rounded-full animate-bounce" style="animation-delay: -0.3s;"></div>
                            <div class="w-2 h-2 bg-gray-500 rounded-full animate-bounce" style="animation-delay: -0.15s;"></div>
                            <div class="w-2 h-2 bg-gray-500 rounded-full animate-bounce"></div>
                        </div>
                    </div>
                `;
                chatbotMessages.appendChild(loadingDiv);
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
            }

            function removeLoadingIndicator() {
                const indicator = document.getElementById('loading-indicator');
                if (indicator) {
                    indicator.remove();
                }
            }

            async function getGeminiResponse(userQuery) {
                const apiKey = ""; // API Key akan disediakan oleh environment saat runtime
                const apiUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-09-2025:generateContent?key=${apiKey}`;

                const systemPrompt = `Anda adalah asisten AI yang ramah dan membantu untuk SMKN 1 Surabaya, sebuah sekolah menengah kejuruan teknologi di Surabaya, Indonesia. Tugas Anda adalah menjawab pertanyaan dari calon siswa, orang tua, atau siapa pun yang tertarik dengan sekolah. Berikan jawaban yang ringkas dan informatif dalam Bahasa Indonesia. Jika Anda tidak tahu jawabannya, katakan bahwa Anda tidak memiliki informasi tersebut dan sarankan untuk menghubungi sekolah langsung di (031) 8292021. Informasi kunci tentang sekolah:
- Nama: SMKN 1 Surabaya
- Lokasi: Jl. Smea No.4, Wonokromo, Surabaya, Jawa Timur 60243
- Jurusan Unggulan: Rekayasa Perangkat Lunak (RPL), Teknik Komputer & Jaringan (TKJ), Multimedia & Desain Grafis, Teknik Elektronika Industri (TEI), Teknik Pemesinan, Teknik Otomotif, Teknik Bisnis Konstruksi & Properti (TBKP), Akuntansi & Keuangan Lembaga (AKL), dan Bisnis Daring & Pemasaran (BDPM).`;

                const payload = {
                    systemInstruction: {
                        parts: [{ text: systemPrompt }]
                    },
                    contents: [{
                        parts: [{ text: userQuery }]
                    }]
                };

                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                if (!response.ok) {
                    throw new Error(`API request failed with status ${response.status}`);
                }

                const result = await response.json();
                let text = result.candidates?.[0]?.content?.parts?.[0]?.text;

                // Trim the response and check if it's empty
                text = text ? text.trim() : null;

                if (!text) {
                     throw new Error("Invalid or empty response structure from API.");
                }

                return text;
            }
        });
    </script>
</body>
</html>


