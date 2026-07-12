<!-- navbar.blade.php -->
<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-md border-b border-slate-100 transition-all duration-200" 
     x-data="{ activeDropdown: null, mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            
            <!-- Logo and Brand -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 text-left focus:outline-none group">
                    <div class="w-12 h-12 rounded-full bg-blue-900 flex items-center justify-center shadow-md shadow-blue-900/10 transition-transform duration-300 group-hover:scale-105">
                        <i data-lucide="church" class="w-7 h-7 text-amber-400"></i>
                    </div>
                    <div>
                        <span class="block text-lg font-bold font-display tracking-tight text-blue-950 uppercase leading-none">
                            Gereja Baptis
                        </span>
                        <span class="block text-sm font-semibold text-amber-700 tracking-wider uppercase">
                            Yohanes Entrop
                        </span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-1">
                
                <!-- Beranda -->
                <div class="relative py-2">
                    <a href="{{ url('/') }}" 
                       class="flex items-center px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 focus:outline-none {{ request()->is('/') ? 'bg-blue-50 text-blue-900 font-semibold border-b-2 border-blue-900 rounded-b-none' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-950' }}">
                        Beranda
                    </a>
                </div>

                <!-- Profil Dropdown -->
                <div class="relative py-2" 
                     x-on:mouseenter="activeDropdown = 'profil'" 
                     x-on:mouseleave="activeDropdown = null">
                    <button class="flex items-center space-x-1 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 focus:outline-none cursor-pointer {{ request()->is('profil*') ? 'bg-blue-50 text-blue-900 font-semibold border-b-2 border-blue-900 rounded-b-none' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-950' }}">
                        <span>Profil</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': activeDropdown === 'profil' }"></i>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="activeDropdown === 'profil'" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 translate-y-1"
                         class="absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-slate-100 py-2 z-50 origin-top-left"
                         x-cloak>
                        <div class="grid grid-cols-1 gap-1 max-h-[80vh] overflow-y-auto px-1.5">
                            <a href="{{ url('/profil?sub=sejarah') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="info" class="w-4 h-4 text-amber-600"></i>
                                <span>Sejarah Gereja</span>
                            </a>
                            <a href="{{ url('/profil?sub=visi-misi') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="award" class="w-4 h-4 text-blue-600"></i>
                                <span>Visi & Misi</span>
                            </a>
                            <a href="{{ url('/profil?sub=logo') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="church" class="w-4 h-4 text-emerald-600"></i>
                                <span>Logo Gereja</span>
                            </a>
                            <a href="{{ url('/profil?sub=gembala') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="users" class="w-4 h-4 text-indigo-600"></i>
                                <span>Gembala Sidang</span>
                            </a>
                            <a href="{{ url('/profil?sub=struktur') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="users" class="w-4 h-4 text-indigo-600"></i>
                                <span>Struktur Organisasi</span>
                            </a>
                            <a href="{{ url('/profil?sub=pengurus') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="users" class="w-4 h-4 text-indigo-600"></i>
                                <span>Pengurus & Staff</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pelayanan Dropdown -->
                <div class="relative py-2" 
                     x-on:mouseenter="activeDropdown = 'pelayanan'" 
                     x-on:mouseleave="activeDropdown = null">
                    <button class="flex items-center space-x-1 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 focus:outline-none cursor-pointer {{ request()->is('pelayanan*') ? 'bg-blue-50 text-blue-900 font-semibold border-b-2 border-blue-900 rounded-b-none' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-950' }}">
                        <span>Pelayanan</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': activeDropdown === 'pelayanan' }"></i>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="activeDropdown === 'pelayanan'" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 translate-y-1"
                         class="absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-slate-100 py-2 z-50 origin-top-left"
                         x-cloak>
                        <div class="grid grid-cols-1 gap-1 max-h-[80vh] overflow-y-auto px-1.5">
                            <a href="{{ url('/pelayanan?sub=ibadah-minggu') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="church" class="w-4 h-4 text-blue-500"></i>
                                <span>Ibadah Raya Minggu</span>
                            </a>
                            <a href="{{ url('/pelayanan?sub=sekolah-minggu') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="award" class="w-4 h-4 text-emerald-600"></i>
                                <span>Sekolah Minggu Anak</span>
                            </a>
                            <a href="{{ url('/pelayanan?sub=pemuda') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="users" class="w-4 h-4 text-indigo-600"></i>
                                <span>Komisi Pemuda (PPA)</span>
                            </a>
                            <a href="{{ url('/pelayanan?sub=remaja') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="users" class="w-4 h-4 text-indigo-600"></i>
                                <span>Persekutuan Remaja</span>
                            </a>
                            <a href="{{ url('/pelayanan?sub=wanita') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="users" class="w-4 h-4 text-indigo-600"></i>
                                <span>Kaum Wanita (WBI)</span>
                            </a>
                            <a href="{{ url('/pelayanan?sub=pria') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="users" class="w-4 h-4 text-indigo-600"></i>
                                <span>Kaum Pria (PBI)</span>
                            </a>
                            <a href="{{ url('/pelayanan?sub=musik') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="music" class="w-4 h-4 text-red-500"></i>
                                <span>Musik & Pujian</span>
                            </a>
                            <a href="{{ url('/pelayanan?sub=multimedia') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="laptop" class="w-4 h-4 text-slate-500"></i>
                                <span>Multimedia & Sound</span>
                            </a>
                            <a href="{{ url('/pelayanan?sub=diakonia') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="heart-handshake" class="w-4 h-4 text-pink-500"></i>
                                <span>Diakonia & Sosial</span>
                            </a>
                            <a href="{{ url('/pelayanan?sub=misi') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="globe" class="w-4 h-4 text-teal-600"></i>
                                <span>Misi & Penginjilan</span>
                            </a>
                            <a href="{{ url('/pelayanan?sub=baptisan') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="church" class="w-4 h-4 text-blue-500"></i>
                                <span>Baptisan Kudus</span>
                            </a>
                            <a href="{{ url('/pelayanan?sub=sidi') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="church" class="w-4 h-4 text-blue-500"></i>
                                <span>Sidi (Katekisasi)</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Jadwal Dropdown -->
                <div class="relative py-2" 
                     x-on:mouseenter="activeDropdown = 'jadwal'" 
                     x-on:mouseleave="activeDropdown = null">
                    <button class="flex items-center space-x-1 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 focus:outline-none cursor-pointer {{ request()->is('jadwal*') ? 'bg-blue-50 text-blue-900 font-semibold border-b-2 border-blue-900 rounded-b-none' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-950' }}">
                        <span>Jadwal</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': activeDropdown === 'jadwal' }"></i>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="activeDropdown === 'jadwal'" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 translate-y-1"
                         class="absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-slate-100 py-2 z-50 origin-top-left"
                         x-cloak>
                        <div class="grid grid-cols-1 gap-1 max-h-[80vh] overflow-y-auto px-1.5">
                            <a href="{{ url('/jadwal?sub=jadwal-ibadah') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="calendar" class="w-4 h-4 text-amber-600"></i>
                                <span>Jadwal Ibadah</span>
                            </a>
                            <a href="{{ url('/jadwal?sub=sekolah-minggu') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="calendar" class="w-4 h-4 text-amber-600"></i>
                                <span>Sekolah Minggu</span>
                            </a>
                            <a href="{{ url('/jadwal?sub=pemuda') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="calendar" class="w-4 h-4 text-amber-600"></i>
                                <span>Pemuda & Remaja</span>
                            </a>
                            <a href="{{ url('/jadwal?sub=doa') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="calendar" class="w-4 h-4 text-amber-600"></i>
                                <span>Persekutuan Doa</span>
                            </a>
                            <a href="{{ url('/jadwal?sub=kalender') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="calendar" class="w-4 h-4 text-amber-600"></i>
                                <span>Kalender Gerejawi</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Berita Dropdown -->
                <div class="relative py-2" 
                     x-on:mouseenter="activeDropdown = 'berita'" 
                     x-on:mouseleave="activeDropdown = null">
                    <button class="flex items-center space-x-1 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 focus:outline-none cursor-pointer {{ request()->is('berita*') ? 'bg-blue-50 text-blue-900 font-semibold border-b-2 border-blue-900 rounded-b-none' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-950' }}">
                        <span>Berita</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': activeDropdown === 'berita' }"></i>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="activeDropdown === 'berita'" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 translate-y-1"
                         class="absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-slate-100 py-2 z-50 origin-top-left"
                         x-cloak>
                        <div class="grid grid-cols-1 gap-1 max-h-[80vh] overflow-y-auto px-1.5">
                            <a href="{{ url('/berita?sub=berita') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="book-open" class="w-4 h-4 text-emerald-600"></i>
                                <span>Berita Terbaru</span>
                            </a>
                            <a href="{{ url('/berita?sub=warta') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="book-open" class="w-4 h-4 text-emerald-600"></i>
                                <span>Warta Jemaat</span>
                            </a>
                            <a href="{{ url('/berita?sub=renungan') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="book-open" class="w-4 h-4 text-emerald-600"></i>
                                <span>Renungan Harian</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Galeri Dropdown -->
                <div class="relative py-2" 
                     x-on:mouseenter="activeDropdown = 'galeri'" 
                     x-on:mouseleave="activeDropdown = null">
                    <button class="flex items-center space-x-1 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 focus:outline-none cursor-pointer {{ request()->is('galeri*') ? 'bg-blue-50 text-blue-900 font-semibold border-b-2 border-blue-900 rounded-b-none' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-950' }}">
                        <span>Galeri</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': activeDropdown === 'galeri' }"></i>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="activeDropdown === 'galeri'" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 translate-y-1"
                         class="absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-slate-100 py-2 z-50 origin-top-left"
                         x-cloak>
                        <div class="grid grid-cols-1 gap-1 max-h-[80vh] overflow-y-auto px-1.5">
                            <a href="{{ url('/galeri?sub=foto') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="image" class="w-4 h-4 text-purple-600"></i>
                                <span>Foto Kegiatan</span>
                            </a>
                            <a href="{{ url('/galeri?sub=video') }}" class="flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 hover:text-blue-900">
                                <i data-lucide="image" class="w-4 h-4 text-purple-600"></i>
                                <span>Video Ibadah & Dokumenter</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Donasi -->
                <div class="relative py-2">
                    <a href="{{ url('/donasi') }}" 
                       class="flex items-center px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 focus:outline-none {{ request()->is('donasi*') ? 'bg-blue-50 text-blue-900 font-semibold border-b-2 border-blue-900 rounded-b-none' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-950' }}">
                        Donasi
                    </a>
                </div>

                <!-- Kontak -->
                <div class="relative py-2">
                    <a href="{{ url('/kontak') }}" 
                       class="flex items-center px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 focus:outline-none {{ request()->is('kontak*') ? 'bg-blue-50 text-blue-900 font-semibold border-b-2 border-blue-900 rounded-b-none' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-950' }}">
                        Kontak
                    </a>
                </div>

            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center lg:hidden">
                <button x-on:click="mobileMenuOpen = !mobileMenuOpen"
                        class="inline-flex items-center justify-center p-2 rounded-lg text-slate-500 hover:text-blue-900 hover:bg-slate-100 focus:outline-none transition-colors duration-150">
                    <span class="sr-only">Buka menu</span>
                    <i data-lucide="menu" class="h-6 w-6" x-show="!mobileMenuOpen"></i>
                    <i data-lucide="x" class="h-6 w-6" x-show="mobileMenuOpen" x-cloak></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Panel -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-4"
         class="lg:hidden border-t border-slate-100 bg-slate-50 max-h-[calc(100vh-5rem)] overflow-y-auto"
         x-cloak>
        <div class="px-2 pt-2 pb-6 space-y-1">
            
            <!-- Beranda -->
            <div class="border-b border-slate-100/50 pb-1">
                <a href="{{ url('/') }}" class="flex items-center justify-between w-full text-left px-4 py-2.5 rounded-lg text-sm font-semibold {{ request()->is('/') ? 'bg-blue-900 text-white' : 'text-slate-800 hover:bg-slate-100' }}">
                    <span>Beranda</span>
                </a>
            </div>

            <!-- Profil -->
            <div class="border-b border-slate-100/50 pb-1" x-data="{ open: {{ request()->is('profil*') ? 'true' : 'false' }} }">
                <button x-on:click="open = !open" class="flex items-center justify-between w-full text-left px-4 py-2.5 rounded-lg text-sm font-semibold text-slate-800 hover:bg-slate-100">
                    <span>Profil</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                </button>
                <div class="pl-4 mt-1 grid grid-cols-1 gap-1 border-l-2 border-slate-200 ml-4 py-1" x-show="open" x-cloak>
                    <a href="{{ url('/profil?sub=sejarah') }}" class="flex items-center space-x-2 text-left px-3 py-2 rounded-md text-xs font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                        <i data-lucide="info" class="w-3.5 h-3.5 text-amber-600"></i>
                        <span>Sejarah Gereja</span>
                    </a>
                    <a href="{{ url('/profil?sub=visi-misi') }}" class="flex items-center space-x-2 text-left px-3 py-2 rounded-md text-xs font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                        <i data-lucide="award" class="w-3.5 h-3.5 text-blue-600"></i>
                        <span>Visi & Misi</span>
                    </a>
                    <a href="{{ url('/profil?sub=logo') }}" class="flex items-center space-x-2 text-left px-3 py-2 rounded-md text-xs font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                        <i data-lucide="church" class="w-3.5 h-3.5 text-emerald-600"></i>
                        <span>Logo Gereja</span>
                    </a>
                    <a href="{{ url('/profil?sub=gembala') }}" class="flex items-center space-x-2 text-left px-3 py-2 rounded-md text-xs font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                        <i data-lucide="users" class="w-3.5 h-3.5 text-indigo-600"></i>
                        <span>Gembala Sidang</span>
                    </a>
                </div>
            </div>

            <!-- Pelayanan -->
            <div class="border-b border-slate-100/50 pb-1" x-data="{ open: {{ request()->is('pelayanan*') ? 'true' : 'false' }} }">
                <button x-on:click="open = !open" class="flex items-center justify-between w-full text-left px-4 py-2.5 rounded-lg text-sm font-semibold text-slate-800 hover:bg-slate-100">
                    <span>Pelayanan</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                </button>
                <div class="pl-4 mt-1 grid grid-cols-1 gap-1 border-l-2 border-slate-200 ml-4 py-1" x-show="open" x-cloak>
                    <a href="{{ url('/pelayanan?sub=ibadah-minggu') }}" class="flex items-center space-x-2 text-left px-3 py-2 rounded-md text-xs font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                        <i data-lucide="church" class="w-3.5 h-3.5 text-blue-500"></i>
                        <span>Ibadah Raya Minggu</span>
                    </a>
                    <a href="{{ url('/pelayanan?sub=sekolah-minggu') }}" class="flex items-center space-x-2 text-left px-3 py-2 rounded-md text-xs font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                        <i data-lucide="award" class="w-3.5 h-3.5 text-emerald-600"></i>
                        <span>Sekolah Minggu</span>
                    </a>
                    <a href="{{ url('/pelayanan?sub=pemuda') }}" class="flex items-center space-x-2 text-left px-3 py-2 rounded-md text-xs font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                        <i data-lucide="users" class="w-3.5 h-3.5 text-indigo-600"></i>
                        <span>Komisi Pemuda (PPA)</span>
                    </a>
                </div>
            </div>

            <!-- Jadwal -->
            <div class="border-b border-slate-100/50 pb-1" x-data="{ open: {{ request()->is('jadwal*') ? 'true' : 'false' }} }">
                <button x-on:click="open = !open" class="flex items-center justify-between w-full text-left px-4 py-2.5 rounded-lg text-sm font-semibold text-slate-800 hover:bg-slate-100">
                    <span>Jadwal</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                </button>
                <div class="pl-4 mt-1 grid grid-cols-1 gap-1 border-l-2 border-slate-200 ml-4 py-1" x-show="open" x-cloak>
                    <a href="{{ url('/jadwal?sub=jadwal-ibadah') }}" class="flex items-center space-x-2 text-left px-3 py-2 rounded-md text-xs font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                        <i data-lucide="calendar" class="w-3.5 h-3.5 text-amber-600"></i>
                        <span>Jadwal Ibadah</span>
                    </a>
                </div>
            </div>

            <!-- Donasi -->
            <div class="border-b border-slate-100/50 pb-1">
                <a href="{{ url('/donasi') }}" class="flex items-center justify-between w-full text-left px-4 py-2.5 rounded-lg text-sm font-semibold {{ request()->is('donasi*') ? 'bg-blue-900 text-white' : 'text-slate-800 hover:bg-slate-100' }}">
                    <span>Donasi</span>
                </a>
            </div>

            <!-- Kontak -->
            <div>
                <a href="{{ url('/kontak') }}" class="flex items-center justify-between w-full text-left px-4 py-2.5 rounded-lg text-sm font-semibold {{ request()->is('kontak*') ? 'bg-blue-900 text-white' : 'text-slate-800 hover:bg-slate-100' }}">
                    <span>Kontak</span>
                </a>
            </div>

        </div>
    </div>
</nav>
