@php
    use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SMKN 1 Surabaya</title>

    <!-- Tailwind CSS --><script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Poppins --><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Lucide Icons --><script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Custom scrollbar for webkit browsers */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        /* Style for the active sidebar link */
        .sidebar-link.active {
            background-color: #DC2626; /* red-600 */
            color: white;
        }
    </style>
@php
    $activeTab = session('activeTab', session()->getOldInput('redirect_tab') ?? 'dashboard');
@endphp
</head>
<body class="bg-gray-100" data-active-tab="{{ $activeTab }}">

    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-white shadow-lg flex-shrink-0 flex flex-col transition-all duration-300 -translate-x-full md:translate-x-0">
            <!-- Logo -->
            <div class="flex items-center justify-center h-20 border-b">
                 <a href="#" class="flex items-center space-x-2">
                    <svg class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v11.494m-9-5.747h18"/>
                    </svg>
                    <span class="text-xl font-bold text-gray-900">Admin SMKN 1</span>
                </a>
            </div>
            <!-- Navigation Links -->
            <nav class="flex-grow px-4 py-6">
                <a href="#" data-page="dashboard" class="sidebar-link flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i> Dashboard
                </a>
                <a href="#" data-page="guru" class="sidebar-link mt-2 flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                    <i data-lucide="users" class="w-5 h-5 mr-3"></i> Guru
                </a>
                 <a href="#" data-page="siswa" class="sidebar-link mt-2 flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                    <i data-lucide="graduation-cap" class="w-5 h-5 mr-3"></i> Siswa
                </a>
                <a href="#" data-page="berita" class="sidebar-link mt-2 flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                    <i data-lucide="newspaper" class="w-5 h-5 mr-3"></i> Berita
                </a>
                <a href="#" data-page="gallery" class="sidebar-link mt-2 flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                    <i data-lucide="image" class="w-5 h-5 mr-3"></i> Galeri
                </a>
                <a href="#" data-page="absensi" class="sidebar-link mt-2 flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                    <i data-lucide="clipboard-check" class="w-5 h-5 mr-3"></i> Absensi Siswa
                </a>
                <a href="#" data-page="calendar" class="sidebar-link mt-2 flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                    <i data-lucide="calendar-days" class="w-5 h-5 mr-3"></i> Kalender Acara
                </a>
                <a href="#" data-page="pesan" class="sidebar-link mt-2 flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                    <i data-lucide="inbox" class="w-5 h-5 mr-3"></i> Pesan Masuk
                </a>
            </nav>
            <!-- Logout Button -->
            <div class="p-4 border-t">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-3 text-left text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        <i data-lucide="log-out" class="w-5 h-5 mr-3"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="flex justify-between items-center p-4 bg-white border-b">
                <div class="flex items-center">
                    <button id="menu-toggle" class="md:hidden text-gray-600">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    <h1 class="text-2xl font-bold text-gray-800 ml-4">Dashboard</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="font-semibold">Admin User</span>
                    <img src="https://placehold.co/40x40/e2e8f0/334155?text=A" class="w-10 h-10 rounded-full object-cover" alt="Admin Avatar">
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6 space-y-6">
                @if (session('status'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        <p class="font-semibold mb-2">Terjadi kesalahan:</p>
                        <ul class="list-disc list-inside space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Dashboard Page -->
                <div id="dashboard-page" class="admin-page">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Guru</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $teachers->count() }}</p>
                            </div>
                            <div class="bg-red-100 text-red-600 p-3 rounded-full">
                                <i data-lucide="users" class="w-6 h-6"></i>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Siswa</p>
                                <p class="text-3xl font-bold text-gray-800">1250</p>
                            </div>
                            <div class="bg-purple-100 text-purple-600 p-3 rounded-full">
                                <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                            </div>
                        </div>
                         <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Berita</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $newsItems->count() }}</p>
                            </div>
                            <div class="bg-green-100 text-green-600 p-3 rounded-full">
                                <i data-lucide="newspaper" class="w-6 h-6"></i>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Pesan Baru</p>
                                <p class="text-3xl font-bold text-gray-800">3</p>
                            </div>
                            <div class="bg-yellow-100 text-yellow-600 p-3 rounded-full">
                                <i data-lucide="inbox" class="w-6 h-6"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold text-gray-800">Aktivitas Terbaru</h2>
                        <ul class="mt-4 space-y-3">
                            <li class="flex items-center text-gray-600 text-sm"><span class="bg-green-500 w-2 h-2 rounded-full mr-3"></span>Admin menambahkan berita baru: "Lomba Coding Nasional".</li>
                            <li class="flex items-center text-gray-600 text-sm"><span class="bg-blue-500 w-2 h-2 rounded-full mr-3"></span>Profil guru "Endah W., M.T." telah diperbarui.</li>
                             <li class="flex items-center text-gray-600 text-sm"><span class="bg-red-500 w-2 h-2 rounded-full mr-3"></span>Anda memiliki 3 pesan baru yang belum dibaca.</li>
                        </ul>
                    </div>
                </div>

                <!-- Guru Page -->
                <div id="guru-page" class="admin-page hidden space-y-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center justify-between flex-wrap gap-3 mb-6">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Tambah Profil Guru</h2>
                                <p class="text-sm text-gray-500 mt-1">Lengkapi informasi di bawah ini untuk menampilkan guru di halaman utama.</p>
                            </div>
                        </div>
                        <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <input type="hidden" name="redirect_tab" value="guru">
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label for="teacher-name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                    <input type="text" id="teacher-name" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500" placeholder="Contoh: Bambang S., S.Kom">
                                </div>
                                <div>
                                    <label for="teacher-position" class="block text-sm font-medium text-gray-700 mb-1">Jabatan / Keahlian</label>
                                    <input type="text" id="teacher-position" name="position" value="{{ old('position') }}" required class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500" placeholder="Contoh: Guru RPL">
                                </div>
                            </div>
                            <div>
                                <label for="teacher-bio" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                                <textarea id="teacher-bio" name="bio" rows="4" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500" placeholder="Tuliskan pengalaman, prestasi, atau fokus pembelajaran">{{ old('bio') }}</textarea>
                            </div>
                            <div>
                                <label for="teacher-photo" class="block text-sm font-medium text-gray-700 mb-1">Foto Profil</label>
                                <input type="file" id="teacher-photo" name="photo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-600 hover:file:bg-red-100">
                                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, WEBP. Maksimal 4 MB.</p>
                            </div>
                            <div>
                                <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors shadow">
                                    <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i>
                                    Simpan Profil Guru
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Daftar Guru</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-200">
                                    <tr>
                                    <th class="py-3 px-4 text-left">Foto</th>
                                    <th class="py-3 px-4 text-left">Nama</th>
                                    <th class="py-3 px-4 text-left">Jabatan</th>
                                    <th class="py-3 px-4 text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($teachers as $teacher)
                                        <tr class="border-b">
                                            <td class="py-3 px-4">
                                                <img src="{{ $teacher->photo_url }}" alt="{{ $teacher->name }}" class="w-12 h-12 rounded-full object-cover border">
                                            </td>
                                            <td class="py-3 px-4">
                                                <p class="font-semibold text-gray-800">{{ $teacher->name }}</p>
                                                @if ($teacher->bio)
                                                    <p class="text-sm text-gray-500 mt-1">{{ Str::limit($teacher->bio, 120) }}</p>
                                                @endif
                                            </td>
                                            <td class="py-3 px-4 text-gray-700">{{ $teacher->position }}</td>
                                            <td class="py-3 px-4 space-y-2">
                                                <button type="button" class="w-full flex items-center justify-center px-3 py-2 text-sm font-medium text-blue-600 border border-blue-200 rounded-lg hover:bg-blue-50 transition-colors teacher-edit-toggle" data-target="teacher-edit-{{ $teacher->id }}">
                                                    <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                                                    Edit
                                                </button>
                                                <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" onsubmit="return confirm('Hapus profil {{ $teacher->name }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="redirect_tab" value="guru">
                                                    <button type="submit" class="w-full flex items-center justify-center px-3 py-2 text-sm font-medium text-red-600 border border-red-200 rounded-lg hover:bg-red-50 transition-colors">
                                                        <i data-lucide="trash-2" class="w-4 h-4 mr-2"></i>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr id="teacher-edit-{{ $teacher->id }}" class="hidden bg-gray-50">
                                            <td colspan="4" class="py-4 px-4">
                                                <form action="{{ route('teachers.update', $teacher) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="redirect_tab" value="guru">
                                                    <div class="grid md:grid-cols-2 gap-4">
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                                            <input type="text" name="name" value="{{ old('name', $teacher->name) }}" required class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan / Keahlian</label>
                                                            <input type="text" name="position" value="{{ old('position', $teacher->position) }}" required class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                                                        <textarea name="bio" rows="3" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500" placeholder="Tuliskan informasi terbaru mengenai guru">{{ old('bio', $teacher->bio) }}</textarea>
                                                    </div>
                                                    <div class="grid md:grid-cols-2 gap-4">
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Foto Saat Ini</label>
                                                            <img src="{{ $teacher->photo_url }}" alt="{{ $teacher->name }}" class="w-20 h-20 rounded-full object-cover border">
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Perbarui Foto (opsional)</label>
                                                            <input type="file" name="photo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100">
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end">
                                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                                                            <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                                                            Simpan Perubahan
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="py-6 px-4 text-center text-gray-500">
                                                Belum ada data guru. Tambahkan profil pertama Anda melalui formulir di atas.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Siswa Page -->
                <div id="siswa-page" class="admin-page hidden">
                     <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">Manajemen Siswa</h2>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Tambah Siswa</button>
                        </div>
                        <!-- Table for Siswa -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="py-3 px-4 text-left">NISN</th>
                                        <th class="py-3 px-4 text-left">Nama</th>
                                        <th class="py-3 px-4 text-left">Kelas</th>
                                        <th class="py-3 px-4 text-left">Jurusan</th>
                                        <th class="py-3 px-4 text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b">
                                        <td class="py-3 px-4">0012345678</td>
                                        <td class="py-3 px-4">Ahmad Budiarto</td>
                                        <td class="py-3 px-4">XII RPL 1</td>
                                        <td class="py-3 px-4">Rekayasa Perangkat Lunak</td>
                                        <td class="py-3 px-4 flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700"><i data-lucide="edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i data-lucide="trash-2"></i></button>
                                        </td>
                                    </tr>
                                     <tr class="border-b">
                                        <td class="py-3 px-4">0012345679</td>
                                        <td class="py-3 px-4">Citra Dewi Lestari</td>
                                        <td class="py-3 px-4">XII TKJ 2</td>
                                        <td class="py-3 px-4">Teknik Komputer & Jaringan</td>
                                        <td class="py-3 px-4 flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700"><i data-lucide="edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i data-lucide="trash-2"></i></button>
                                        </td>
                                    </tr>
                                     <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Berita Page -->
                <div id="berita-page" class="admin-page hidden space-y-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center justify-between flex-wrap gap-3 mb-6">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Publikasi Berita</h2>
                                <p class="text-sm text-gray-500 mt-1">Gunakan formulir ini untuk menambahkan berita terbaru ke situs sekolah.</p>
                            </div>
                            <a href="{{ route('news.index') }}" target="_blank" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-red-600 border border-red-200 rounded-lg hover:bg-red-50 transition-colors">
                                <i data-lucide="external-link" class="w-4 h-4 mr-2"></i>
                                Lihat Halaman Berita
                            </a>
                        </div>
                        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                            @csrf
                            <input type="hidden" name="redirect_tab" value="berita">

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label for="news-title" class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
                                    <input type="text" id="news-title" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500" placeholder="Contoh: Siswa Raih Juara 1...">
                                </div>
                                <div>
                                    <label for="news-category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                                    <input type="text" id="news-category" name="category" value="{{ old('category') }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500" placeholder="Contoh: Prestasi, Kegiatan, Pengumuman">
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label for="news-published-at" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Publikasi</label>
                                    <input type="datetime-local" id="news-published-at" name="published_at" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500">
                                </div>
                                <div>
                                    <label for="news-image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Utama</label>
                                    <input type="file" id="news-image" name="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-600 hover:file:bg-red-100">
                                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, WEBP. Maksimal 4 MB.</p>
                                    <img id="news-image-preview" src="#" alt="Preview gambar berita" class="hidden mt-3 h-32 w-full object-cover rounded-lg border">
                                </div>
                            </div>

                            <div>
                                <label for="news-excerpt" class="block text-sm font-medium text-gray-700 mb-1">Ringkasan Singkat</label>
                                <textarea id="news-excerpt" name="excerpt" rows="3" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500" placeholder="Tuliskan ringkasan berita (opsional)">{{ old('excerpt') }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Jika dikosongkan, ringkasan akan dibuat otomatis dari isi berita.</p>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-1">
                                    <label for="news-content" class="block text-sm font-medium text-gray-700">Isi Berita</label>
                                    <button id="generate-news-btn" type="button" class="text-sm text-red-600 font-semibold hover:text-red-800 flex items-center">
                                        <i data-lucide="sparkles" class="w-4 h-4 mr-1"></i>
                                        Buat dengan AI
                                    </button>
                                </div>
                                <textarea id="news-content" name="body" rows="12" required class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500" placeholder="Tulis konten berita di sini...">{{ old('body') }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Anda dapat menempelkan teks hasil AI, lalu melakukan penyesuaian seperlunya.</p>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors shadow">
                                    <i data-lucide="send" class="w-4 h-4 mr-2"></i>
                                    Simpan & Publikasikan
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Daftar Berita</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="py-3 px-4 text-left">Berita</th>
                                        <th class="py-3 px-4 text-left">Kategori</th>
                                        <th class="py-3 px-4 text-left">Dipublikasikan</th>
                                        <th class="py-3 px-4 text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($newsItems as $news)
                                        <tr class="border-b align-top">
                                            <td class="py-3 px-4">
                                                <div class="flex items-start space-x-3">
                                                    <img src="{{ $news->image_url }}" alt="{{ $news->title }}" class="w-16 h-16 rounded-lg object-cover border">
                                                    <div>
                                                        <p class="font-semibold text-gray-900">{{ $news->title }}</p>
                                                        <p class="text-sm text-gray-500 mt-1">{{ Str::limit($news->excerpt, 140) }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4 text-gray-700">{{ $news->category ?? 'Umum' }}</td>
                                            <td class="py-3 px-4 text-gray-700">{{ $news->display_date }}</td>
                                            <td class="py-3 px-4 space-y-2 min-w-[140px]">
                                                <button type="button" class="w-full flex items-center justify-center px-3 py-2 text-sm font-medium text-blue-600 border border-blue-200 rounded-lg hover:bg-blue-50 transition-colors news-edit-toggle" data-target="news-edit-{{ $news->id }}">
                                                    <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                                                    Edit
                                                </button>
                                                <form action="{{ route('admin.news.destroy', $news) }}" method="POST" onsubmit="return confirm('Hapus berita &quot;{{ $news->title }}&quot;?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="redirect_tab" value="berita">
                                                    <button type="submit" class="w-full flex items-center justify-center px-3 py-2 text-sm font-medium text-red-600 border border-red-200 rounded-lg hover:bg-red-50 transition-colors">
                                                        <i data-lucide="trash-2" class="w-4 h-4 mr-2"></i>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr id="news-edit-{{ $news->id }}" class="hidden bg-gray-50">
                                            <td colspan="4" class="py-4 px-4">
                                                <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="redirect_tab" value="berita">
                                                    <div class="grid md:grid-cols-2 gap-4">
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                                                            <input type="text" name="title" value="{{ old('title', $news->title) }}" required class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                                                            <input type="text" name="category" value="{{ old('category', $news->category) }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                                                        </div>
                                                    </div>
                                                    <div class="grid md:grid-cols-2 gap-4">
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Publikasi</label>
                                                            <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($news->published_at ?? $news->created_at)->format('Y-m-d\TH:i')) }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                                                            <div class="flex items-center space-x-4">
                                                                <img src="{{ $news->image_url }}" alt="{{ $news->title }}" class="w-20 h-20 rounded-lg object-cover border">
                                                                <input type="file" name="image" accept="image/*" class="news-image-input block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100" data-preview="news-image-preview-{{ $news->id }}">
                                                            </div>
                                                            <img id="news-image-preview-{{ $news->id }}" src="#" alt="Preview gambar baru" class="hidden mt-3 h-24 w-full object-cover rounded-lg border">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Ringkasan</label>
                                                        <textarea name="excerpt" rows="3" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">{{ old('excerpt', $news->excerpt) }}</textarea>
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Isi Berita</label>
                                                        <textarea name="body" rows="10" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">{{ old('body', $news->body) }}</textarea>
                                                    </div>
                                                    <div class="flex justify-end">
                                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                                                            <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                                                            Simpan Perubahan
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="py-6 px-4 text-center text-gray-500">
                                                Belum ada berita. Tambahkan berita pertama melalui formulir di atas.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                 <div id="gallery-page" class="admin-page hidden">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-gray-800">Manajemen Galeri</h2>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 flex items-center">
                                <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Unggah Foto
                            </button>
                        </div>
                        <!-- Gallery Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="py-3 px-4 text-left">Pratinjau</th>
                                        <th class="py-3 px-4 text-left">Caption</th>
                                        <th class="py-3 px-4 text-left">Tanggal Unggah</th>
                                        <th class="py-3 px-4 text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example Row 1 -->
                                    <tr class="border-b">
                                        <td class="py-3 px-4">
                                            <img src="https://placehold.co/100x100/fecaca/991b1b?text=Kegiatan" alt="Gallery preview" class="rounded-md object-cover h-16 w-16">
                                        </td>
                                        <td class="py-3 px-4 text-gray-700">Lomba Cerdas Cermat tingkat nasional.</td>
                                        <td class="py-3 px-4 text-gray-600">15 Oktober 2025</td>
                                        <td class="py-3 px-4 flex space-x-2 items-center h-full mt-6">
                                            <button class="text-blue-500 hover:text-blue-700"><i data-lucide="edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i data-lucide="trash-2"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Example Row 2 -->
                                    <tr class="border-b">
                                        <td class="py-3 px-4">
                                            <img src="https://placehold.co/100x100/fecaca/991b1b?text=Lab+RPL" alt="Gallery preview" class="rounded-md object-cover h-16 w-16">
                                        </td>
                                        <td class="py-3 px-4 text-gray-700">Suasana belajar di laboratorium Rekayasa Perangkat Lunak.</td>
                                        <td class="py-3 px-4 text-gray-600">12 Oktober 2025</td>
                                        <td class="py-3 px-4 flex space-x-2 items-center h-full mt-6">
                                            <button class="text-blue-500 hover:text-blue-700"><i data-lucide="edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i data-lucide="trash-2"></i></button>
                                        </td>
                                    </tr>
                                     <!-- Example Row 3 -->
                                    <tr class="border-b">
                                        <td class="py-3 px-4">
                                            <img src="https://placehold.co/100x100/fecaca/991b1b?text=Pramuka" alt="Gallery preview" class="rounded-md object-cover h-16 w-16">
                                        </td>
                                        <td class="py-3 px-4 text-gray-700">Kegiatan persami ekstrakurikuler Pramuka.</td>
                                        <td class="py-3 px-4 text-gray-600">10 Oktober 2025</td>
                                        <td class="py-3 px-4 flex space-x-2 items-center h-full mt-6">
                                            <button class="text-blue-500 hover:text-blue-700"><i data-lucide="edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i data-lucide="trash-2"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="absensi-page" class="admin-page hidden">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-gray-800">Data Absensi Siswa</h2>
                            <button id="export-excel-btn" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 flex items-center">
                                <i data-lucide="file-spreadsheet" class="w-4 h-4 mr-2"></i> Export ke Excel
                            </button>
                        </div>
                        <!-- Absensi Table -->
                        <div class="overflow-x-auto">
                            <table id="absensi-table" class="min-w-full bg-white">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="py-3 px-4 text-left">NISN</th>
                                        <th class="py-3 px-4 text-left">Nama</th>
                                        <th class="py-3 px-4 text-left">Kelas</th>
                                        <th class="py-3 px-4 text-left">Jurusan</th>
                                        <th class="py-3 px-4 text-left">Lokasi</th>
                                        <th class="py-3 px-4 text-left">Waktu</th>
                                        <th class="py-3 px-4 text-left">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example Row 1 -->
                                    <tr class="border-b">
                                        <td class="py-3 px-4">0012345678</td>
                                        <td class="py-3 px-4">Ahmad Budiarto</td>
                                        <td class="py-3 px-4">XII RPL 1</td>
                                        <td class="py-3 px-4">Rekayasa Perangkat Lunak</td>
                                        <td class="py-3 px-4">Gerbang Depan</td>
                                        <td class="py-3 px-4">06:45:12</td>
                                        <td class="py-3 px-4">17 Oktober 2025</td>
                                    </tr>
                                    <!-- Example Row 2 -->
                                    <tr class="border-b">
                                        <td class="py-3 px-4">0012345679</td>
                                        <td class="py-3 px-4">Citra Dewi Lestari</td>
                                        <td class="py-3 px-4">XII TKJ 2</td>
                                        <td class="py-3 px-4">Teknik Komputer & Jaringan</td>
                                        <td class="py-3 px-4">Gerbang Depan</td>
                                        <td class="py-3 px-4">06:50:02</td>
                                        <td class="py-3 px-4">17 Oktober 2025</td>
                                    </tr>
                                     <!-- Example Row 3 -->
                                    <tr class="border-b">
                                        <td class="py-3 px-4">0012345680</td>
                                        <td class="py-3 px-4">Eko Prasetyo</td>
                                        <td class="py-3 px-4">XII MM 1</td>
                                        <td class="py-3 px-4">Multimedia & Desain Grafis</td>
                                        <td class="py-3 px-4">Gerbang Depan</td>
                                        <td class="py-3 px-4">06:52:33</td>
                                        <td class="py-3 px-4">17 Oktober 2025</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="calendar-page" class="admin-page hidden">
                   <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                       <!-- Calendar View -->
                       <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
                           <div class="flex justify-between items-center mb-4">
                               <button id="prev-month-btn" class="p-2 rounded-full hover:bg-gray-100"><i data-lucide="chevron-left" class="w-5 h-5"></i></button>
                               <h2 id="calendar-month-year" class="text-xl font-semibold text-gray-800"></h2>
                               <button id="next-month-btn" class="p-2 rounded-full hover:bg-gray-100"><i data-lucide="chevron-right" class="w-5 h-5"></i></button>
                           </div>
                           <div class="grid grid-cols-7 gap-1 text-center text-sm text-gray-500 mb-2">
                               <div>Min</div><div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div>
                           </div>
                           <div id="calendar-grid" class="grid grid-cols-7 gap-1 text-center">
                               <!-- Calendar days will be generated dynamically by JavaScript -->
                           </div>
                       </div>
                       <!-- Add Event & Upcoming Events -->
                       <div class="space-y-6">
                           <div class="bg-white p-6 rounded-lg shadow-md">
                               <h3 class="text-lg font-semibold text-gray-800 mb-4">Tambah Acara Baru</h3>
                               <form class="space-y-4">
                                   <div>
                                       <label for="event-title" class="text-sm font-medium text-gray-700">Nama Acara</label>
                                       <input type="text" id="event-title" class="mt-1 w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-1 focus:ring-red-500">
                                   </div>
                                    <div>
                                       <label for="event-date" class="text-sm font-medium text-gray-700">Tanggal</label>
                                       <input type="date" id="event-date" class="mt-1 w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-1 focus:ring-red-500">
                                   </div>
                                   <button type="submit" class="w-full bg-red-600 text-white font-semibold py-2 rounded-lg hover:bg-red-700">Simpan Acara</button>
                               </form>
                           </div>
                            <div class="bg-white p-6 rounded-lg shadow-md">
                               <h3 class="text-lg font-semibold text-gray-800 mb-4">Acara Mendatang</h3>
                               <ul id="upcoming-events-list" class="space-y-3">
                                   <!-- Upcoming events will be populated by JavaScript -->
                               </ul>
                           </div>
                       </div>
                   </div>
                </div>
                 <div id="pesan-page" class="admin-page hidden">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-gray-800">Pesan Masuk</h2>
                            <span class="text-sm font-medium text-gray-600">Anda memiliki 2 pesan belum dibaca</span>
                        </div>

                        <!-- List of Messages -->
                        <div class="space-y-4">
                            <!-- Unread Message Example -->
                            <div class="border-l-4 border-red-600 bg-red-50 p-4 rounded-r-lg cursor-pointer hover:bg-red-100 transition-colors">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-bold text-gray-900">Budi Santoso</p>
                                        <p class="text-sm text-gray-600">budi.santoso@example.com</p>
                                    </div>
                                    <span class="text-xs text-gray-500">2 jam yang lalu</span>
                                </div>
                                <p class="mt-2 text-gray-800 truncate">
                                    Selamat pagi, saya ingin menanyakan informasi mengenai pendaftaran siswa baru untuk tahun ajaran depan. Apakah sudah dibuka?
                                </p>
                                <div class="mt-3 flex space-x-4">
                                    <button class="flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800">
                                        <i data-lucide="corner-up-left" class="w-4 h-4 mr-1"></i> Balas
                                    </button>
                                    <button class="flex items-center text-sm font-semibold text-red-600 hover:text-red-800">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Hapus
                                    </button>
                                </div>
                            </div>

                            <!-- Read Message Example -->
                            <div class="border border-gray-200 bg-white p-4 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold text-gray-800">Rina Amelia</p>
                                        <p class="text-sm text-gray-500">rina.amelia@example.com</p>
                                    </div>
                                    <span class="text-xs text-gray-500">Kemarin</span>
                                </div>
                                <p class="mt-2 text-gray-600 truncate">
                                    Terima kasih atas informasinya mengenai workshop AI. Sangat bermanfaat!
                                </p>
                                 <div class="mt-3 flex space-x-4">
                                    <button class="flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800">
                                        <i data-lucide="corner-up-left" class="w-4 h-4 mr-1"></i> Balas
                                    </button>
                                    <button class="flex items-center text-sm font-semibold text-red-600 hover:text-red-800">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Hapus
                                    </button>
                                </div>
                            </div>

                             <!-- Unread Message Example 2 -->
                            <div class="border-l-4 border-red-600 bg-red-50 p-4 rounded-r-lg cursor-pointer hover:bg-red-100 transition-colors">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-bold text-gray-900">PT. Maju Jaya</p>
                                        <p class="text-sm text-gray-600">hrd@majujaya.co.id</p>
                                    </div>
                                    <span class="text-xs text-gray-500">4 jam yang lalu</span>
                                </div>
                                <p class="mt-2 text-gray-800 truncate">
                                   Kami tertarik untuk menjalin kerja sama industri untuk program magang siswa jurusan TKJ. Mohon informasinya.
                                </p>
                                <div class="mt-3 flex space-x-4">
                                    <button class="flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800">
                                        <i data-lucide="corner-up-left" class="w-4 h-4 mr-1"></i> Balas
                                    </button>
                                    <button class="flex items-center text-sm font-semibold text-red-600 hover:text-red-800">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Hapus
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();

            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            const adminPages = document.querySelectorAll('.admin-page');
            const pageTitle = document.querySelector('header h1');
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const teacherEditToggles = document.querySelectorAll('.teacher-edit-toggle');
            const newsEditToggles = document.querySelectorAll('.news-edit-toggle');
            const newsImageInput = document.getElementById('news-image');
            const newsImagePreview = document.getElementById('news-image-preview');
            const newsImageInputs = document.querySelectorAll('.news-image-input');

            const updateImagePreview = (input, previewElement) => {
                if (!input || !previewElement) return;
                const file = input.files?.[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        previewElement.src = event.target?.result;
                        previewElement.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            };

            if (newsImageInput && newsImagePreview) {
                newsImageInput.addEventListener('change', () => updateImagePreview(newsImageInput, newsImagePreview));
            }

            newsImageInputs.forEach((input) => {
                input.addEventListener('change', () => {
                    const previewId = input.getAttribute('data-preview');
                    const previewElement = previewId ? document.getElementById(previewId) : null;
                    updateImagePreview(input, previewElement);
                });
            });

            teacherEditToggles.forEach((button) => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-target');
                    const target = document.getElementById(targetId);
                    if (target) {
                        target.classList.toggle('hidden');
                    }
                });
            });

            newsEditToggles.forEach((button) => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-target');
                    const target = document.getElementById(targetId);
                    if (target) {
                        target.classList.toggle('hidden');
                    }
                });
            });

            const setActiveTab = (tab) => {
                adminPages.forEach(page => page.classList.add('hidden'));
                sidebarLinks.forEach(link => link.classList.remove('active'));

                const targetPage = document.getElementById(`${tab}-page`) ?? document.getElementById('dashboard-page');
                if (targetPage) {
                    targetPage.classList.remove('hidden');
                }

                const activeLink = document.querySelector(`.sidebar-link[data-page="${tab}"]`) ?? document.querySelector('.sidebar-link[data-page="dashboard"]');
                if (activeLink) {
                    activeLink.classList.add('active');
                    pageTitle.textContent = activeLink.textContent.trim();
                }
            };

            const initialTab = document.body.dataset.activeTab || 'dashboard';
            setActiveTab(initialTab);

            sidebarLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const pageId = link.dataset.page;
                    setActiveTab(pageId);

                    if (window.innerWidth < 768) {
                        sidebar.classList.add('-translate-x-full');
                    }
                });
            });

            // Gemini AI News Generation
            const generateNewsBtn = document.getElementById('generate-news-btn');
            const newsTitleInput = document.getElementById('news-title');
            const newsContentTextarea = document.getElementById('news-content');

            if (generateNewsBtn && newsTitleInput && newsContentTextarea) {
                generateNewsBtn.addEventListener('click', async () => {
                    const title = newsTitleInput.value.trim();
                    if (!title) {
                        alert('Silakan masukkan judul berita terlebih dahulu.');
                        return;
                    }

                    const originalBtnContent = generateNewsBtn.innerHTML;
                    generateNewsBtn.disabled = true;
                    generateNewsBtn.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Membuat...
                    `;

                    try {
                        const generatedContent = await generateNewsWithGemini(title);
                        newsContentTextarea.value = generatedContent;
                    } catch (error) {
                        console.error("Error generating news content:", error);
                        alert("Gagal membuat konten. Silakan coba lagi.");
                    } finally {
                        generateNewsBtn.disabled = false;
                        generateNewsBtn.innerHTML = originalBtnContent;
                        lucide.createIcons(); // Re-render icons if they were replaced
                    }
                });
            }

            async function generateNewsWithGemini(title) {
                const apiKey = ""; // API Key will be provided by the environment at runtime
                const apiUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-09-2025:generateContent?key=${apiKey}`;

                const systemPrompt = "Anda adalah seorang penulis berita untuk website sekolah SMKN 1 Surabaya. Gaya tulisan Anda harus formal, informatif, dan mudah dipahami oleh siswa, orang tua, dan guru. Buatlah sebuah draf artikel berita dalam Bahasa Indonesia yang terdiri dari 3-4 paragraf berdasarkan judul yang diberikan.";

                const payload = {
                    systemInstruction: { parts: [{ text: systemPrompt }] },
                    contents: [{ parts: [{ text: `Judul Berita: "${title}"` }] }]
                };

                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });

                if (!response.ok) throw new Error(`API request failed with status ${response.status}`);

                const result = await response.json();
                const text = result.candidates?.[0]?.content?.parts?.[0]?.text;
                if (!text) throw new Error("Invalid API response structure.");

                return text.trim();
            }

            // Export to Excel Logic
            const exportBtn = document.getElementById('export-excel-btn');
            exportBtn.addEventListener('click', () => {
                const table = document.getElementById('absensi-table');
                let csv = [];
                for (let i = 0; i < table.rows.length; i++) {
                    let row = [], cols = table.rows[i].querySelectorAll('td, th');
                    for (let j = 0; j < cols.length; j++) {
                        let data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ');
                        data = data.replace(/"/g, '""');
                        row.push('"' + data + '"');
                    }
                    csv.push(row.join(','));
                }

                const csvContent = "data:text/csv;charset=utf-8," + csv.join('\n');
                const encodedUri = encodeURI(csvContent);
                const link = document.createElement('a');
                link.setAttribute('href', encodedUri);
                link.setAttribute('download', 'absensi_siswa.csv');
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });

            // --- DYNAMIC CALENDAR LOGIC ---
            const calendarMonthYear = document.getElementById('calendar-month-year');
            const calendarGrid = document.getElementById('calendar-grid');
            const prevMonthBtn = document.getElementById('prev-month-btn');
            const nextMonthBtn = document.getElementById('next-month-btn');
            const upcomingEventsList = document.getElementById('upcoming-events-list');
            const eventDateInput = document.getElementById('event-date');

            let date = new Date();
            let currentYear = date.getFullYear();
            let currentMonth = date.getMonth();

            // Sample events data
            const events = [
                { date: '2025-10-19', title: 'Lomba Cerdas Cermat', description: 'Tingkat Nasional' },
                { date: '2025-10-25', title: 'Rapat Wali Murid', description: 'Kelas XII' },
                { date: '2025-11-05', title: 'Workshop AI', description: 'Untuk Guru' },
            ];

            const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

            const renderCalendar = () => {
                date.setDate(1);
                date.setMonth(currentMonth);
                date.setFullYear(currentYear);

                const firstDayIndex = date.getDay();
                const lastDayIndex = new Date(currentYear, currentMonth + 1, 0).getDay();
                const lastDateOfMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
                const lastDateOfLastMonth = new Date(currentYear, currentMonth, 0).getDate();
                const nextDays = 7 - lastDayIndex - 1;

                calendarMonthYear.innerText = `${months[currentMonth]} ${currentYear}`;
                calendarGrid.innerHTML = "";

                // Previous month's days
                for (let x = firstDayIndex; x > 0; x--) {
                    calendarGrid.innerHTML += `<div class="text-gray-400 py-2">${lastDateOfLastMonth - x + 1}</div>`;
                }

                // Current month's days
                for (let i = 1; i <= lastDateOfMonth; i++) {
                    const today = new Date();
                    const isToday = i === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear();

                    const eventDateStr = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
                    const hasEvent = events.some(e => e.date === eventDateStr);

                    let dayClasses = "py-2 relative cursor-pointer hover:bg-gray-100 rounded-full";
                    if (isToday) {
                        dayClasses += " bg-red-600 text-white";
                    }

                    let eventDot = hasEvent ? `<span class="absolute bottom-1 left-1/2 -translate-x-1/2 w-1.5 h-1.5 bg-blue-500 rounded-full"></span>` : "";

                    calendarGrid.innerHTML += `
                        <div class="${dayClasses}" data-date="${eventDateStr}">
                            <span class="relative z-10 pointer-events-none">${i}</span>
                            ${eventDot}
                        </div>`;
                }

                // Next month's days
                for (let j = 1; j <= nextDays; j++) {
                     calendarGrid.innerHTML += `<div class="text-gray-400 py-2">${j}</div>`;
                }

                renderUpcomingEvents();
            };

            calendarGrid.addEventListener('click', (e) => {
                const dayElement = e.target.closest('[data-date]');
                if (dayElement) {
                    eventDateInput.value = dayElement.dataset.date;
                }
            });

            const renderUpcomingEvents = () => {
                const today = new Date();
                today.setHours(0,0,0,0);

                const upcoming = events
                    .filter(e => new Date(e.date.replace(/-/g, '\/')) >= today)
                    .sort((a,b) => new Date(a.date.replace(/-/g, '\/')) - new Date(b.date.replace(/-/g, '\/')))
                    .slice(0, 3); // Show max 3 upcoming events

                upcomingEventsList.innerHTML = "";
                if (upcoming.length > 0) {
                    upcoming.forEach(event => {
                        const eventDate = new Date(event.date.replace(/-/g, '\/'));
                        const day = eventDate.getDate();
                        const month = months[eventDate.getMonth()].substring(0, 3);

                        upcomingEventsList.innerHTML += `
                             <li class="flex items-start">
                                <div class="w-12 text-center mr-3">
                                    <p class="font-bold text-red-600 text-lg">${day}</p>
                                    <p class="text-xs text-gray-500">${month}</p>
                                </div>
                                <div>
                                     <p class="font-semibold text-gray-800">${event.title}</p>
                                     <p class="text-sm text-gray-600">${event.description}</p>
                                </div>
                            </li>`;
                    });
                } else {
                    upcomingEventsList.innerHTML = `<p class="text-sm text-gray-500">Tidak ada acara mendatang.</p>`;
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
            // Mobile menu toggle
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });
        });
    </script>
</body>
</html>
