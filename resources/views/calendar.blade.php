<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Acara - SMKN 1 Surabaya</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
                    <a href="{{ route('calendar') }}" class="text-red-600 font-bold">Calendar</a>
                    <a href="{{ route('gallery') }}" class="text-gray-600 hover:text-red-600 font-medium transition-colors">Gallery</a>
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
                <a href="{{ route('calendar') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-red-600">Calendar</a>
                <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Gallery</a>
                <a href="{{ route('home') }}#kontak" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-red-600">Kontak</a>
            </nav>
        </div>
    </header>

    <main>
        <!-- Page Header --><section class="bg-white pt-24 pb-12">
            <div class="container mx-auto px-4 text-center">
                <span class="text-red-600 font-semibold">JADWAL KEGIATAN</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-2">Kalender Acara Sekolah</h1>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Jangan lewatkan berbagai kegiatan, acara, dan hari penting di lingkungan SMKN 1 Surabaya.</p>
            </div>
        </section>

        <!-- Calendar Section --><section class="py-16">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                 <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                       <!-- Calendar View -->
                       <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-lg">
                           <div class="flex justify-between items-center mb-4">
                               <button id="prev-month-btn" class="p-2 rounded-full hover:bg-gray-100 transition-colors"><i data-lucide="chevron-left" class="w-6 h-6 text-gray-600"></i></button>
                               <h2 id="calendar-month-year" class="text-2xl font-bold text-gray-800"></h2>
                               <button id="next-month-btn" class="p-2 rounded-full hover:bg-gray-100 transition-colors"><i data-lucide="chevron-right" class="w-6 h-6 text-gray-600"></i></button>
                           </div>
                           <div class="grid grid-cols-7 gap-1 text-center font-semibold text-gray-500 mb-2">
                               <div>Min</div><div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div>
                           </div>
                           <div id="calendar-grid" class="grid grid-cols-7 gap-1 text-center">
                               <!-- Calendar days will be generated dynamically by JavaScript -->
                           </div>
                       </div>
                       <!-- Upcoming Events -->
                       <div class="lg:col-span-1">
                            <div class="bg-white p-6 rounded-2xl shadow-lg h-full">
                               <h3 class="text-xl font-bold text-gray-900 mb-4">Acara Mendatang</h3>
                               <ul id="upcoming-events-list" class="space-y-4">
                                   <!-- Upcoming events will be populated by JavaScript -->
                               </ul>
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

            // --- DYNAMIC CALENDAR LOGIC ---
            const calendarMonthYear = document.getElementById('calendar-month-year');
            const calendarGrid = document.getElementById('calendar-grid');
            const prevMonthBtn = document.getElementById('prev-month-btn');
            const nextMonthBtn = document.getElementById('next-month-btn');
            const upcomingEventsList = document.getElementById('upcoming-events-list');

            let date = new Date();
            let currentYear = date.getFullYear();
            let currentMonth = date.getMonth();

            // Sample events data (You would fetch this from a database in a real application)
            const events = [
                { date: `${new Date().getFullYear()}-10-19`, title: 'Lomba Cerdas Cermat', description: 'Tingkat Nasional' },
                { date: `${new Date().getFullYear()}-10-25`, title: 'Rapat Wali Murid', description: 'Kelas XII' },
                { date: `${new Date().getFullYear()}-11-05`, title: 'Workshop AI', description: 'Untuk Guru & Staff' },
                { date: `${new Date().getFullYear()}-11-10`, title: 'Upacara Hari Pahlawan', description: 'Seluruh siswa' },
                { date: `${new Date().getFullYear()}-12-22`, title: 'Class Meeting', description: 'Akhir Semester Ganjil' },
            ];

            const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

            const renderCalendar = () => {
                date.setDate(1);
                date.setMonth(currentMonth);
                date.setFullYear(currentYear);

                const firstDayIndex = date.getDay();
                const lastDateOfMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
                const lastDateOfLastMonth = new Date(currentYear, currentMonth, 0).getDate();

                let lastDayIndexOfMonth = new Date(currentYear, currentMonth + 1, 0).getDay();
                let nextDays = 7 - lastDayIndexOfMonth -1;
                if(nextDays < 0) nextDays = 6;


                calendarMonthYear.innerText = `${months[currentMonth]} ${currentYear}`;
                calendarGrid.innerHTML = "";

                // Previous month's days
                for (let x = firstDayIndex; x > 0; x--) {
                    calendarGrid.innerHTML += `<div class="text-gray-300 py-2 h-12 flex items-center justify-center">${lastDateOfLastMonth - x + 1}</div>`;
                }

                // Current month's days
                for (let i = 1; i <= lastDateOfMonth; i++) {
                    const today = new Date();
                    const isToday = i === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear();

                    const eventDateStr = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
                    const hasEvent = events.some(e => e.date === eventDateStr);

                    let dayClasses = "py-2 h-12 flex items-center justify-center relative cursor-pointer hover:bg-red-50 rounded-full transition-colors";
                    if (isToday) {
                        dayClasses += " bg-red-600 text-white font-semibold";
                    }

                    let eventDot = hasEvent ? `<span class="absolute bottom-2 left-1/2 -translate-x-1/2 w-1.5 h-1.5 bg-blue-500 rounded-full"></span>` : "";

                    calendarGrid.innerHTML += `
                        <div class="${dayClasses}" data-date="${eventDateStr}">
                            <span class="relative z-10 pointer-events-none">${i}</span>
                            ${eventDot}
                        </div>`;
                }

                // Next month's days
                for (let j = 1; j <= nextDays; j++) {
                     calendarGrid.innerHTML += `<div class="text-gray-300 py-2 h-12 flex items-center justify-center">${j}</div>`;
                }

                renderUpcomingEvents();
            };

            const renderUpcomingEvents = () => {
                const today = new Date();
                today.setHours(0,0,0,0);

                const upcoming = events
                    .filter(e => new Date(e.date.replace(/-/g, '\/')) >= today)
                    .sort((a,b) => new Date(a.date.replace(/-/g, '\/')) - new Date(b.date.replace(/-/g, '\/')))
                    .slice(0, 5); // Show max 5 upcoming events

                upcomingEventsList.innerHTML = "";
                if (upcoming.length > 0) {
                    upcoming.forEach(event => {
                        const eventDate = new Date(event.date.replace(/-/g, '\/'));
                        const day = eventDate.getDate();
                        const month = months[eventDate.getMonth()].substring(0, 3);

                        upcomingEventsList.innerHTML += `
                             <li class="flex items-start p-3 rounded-lg hover:bg-gray-100">
                                <div class="w-14 text-center mr-4 flex-shrink-0">
                                    <p class="font-bold text-red-600 text-2xl">${day}</p>
                                    <p class="text-sm font-semibold text-gray-500 uppercase">${month}</p>
                                </div>
                                <div>
                                     <p class="font-semibold text-gray-800">${event.title}</p>
                                     <p class="text-sm text-gray-600">${event.description}</p>
                                </div>
                            </li>`;
                    });
                } else {
                    upcomingEventsList.innerHTML = `<p class="text-sm text-gray-500 p-3">Tidak ada acara mendatang.</p>`;
                }
            };

            prevMonthBtn.addEventListener("click", () => {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                renderCalendar();
            });

            nextMonthBtn.addEventListener("click", () => {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                renderCalendar();
            });

            renderCalendar();
        });
    </script>
</body>
</html>
