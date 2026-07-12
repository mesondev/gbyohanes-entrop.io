<!-- footer.blade.php -->
<footer class="bg-blue-950 text-slate-300 font-sans border-t border-blue-900">
    <!-- Upper Footer: Quick Info & Links -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            
            <!-- Column 1: Church Brand & Statement -->
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-amber-500 flex items-center justify-center">
                        <i data-lucide="church" class="w-6 h-6 text-blue-950"></i>
                    </div>
                    <span class="font-display font-bold text-lg text-white tracking-wide uppercase">
                        Gereja Baptis Yohanes
                    </span>
                </div>
                <p class="text-xs text-slate-400 leading-relaxed font-light">
                    Menjadi garam dan terang dunia di tanah Papua, memberitaan Injil keselamatan Yesus Kristus, mendidik jemaat dalam kebenaran Firman, dan bertumbuh dalam kasih persaudaraan yang sejati.
                </p>
                <div class="flex items-center space-x-2 text-xs text-amber-400 font-medium pt-2">
                    <i data-lucide="clock" class="w-4 h-4"></i>
                    <span>Ibadah Raya: Minggu, 09:00 WIT</span>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div>
                <h3 class="text-sm font-semibold font-display text-white uppercase tracking-wider mb-4 border-l-2 border-amber-500 pl-2">
                    Navigasi Cepat
                </h3>
                <ul class="space-y-2.5 text-xs font-medium">
                    <li>
                        <a href="{{ url('/') }}" class="hover:text-amber-400 transition-colors duration-150">
                            &raquo; Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/profil?sub=sejarah') }}" class="hover:text-amber-400 transition-colors duration-150">
                            &raquo; Tentang & Sejarah
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/pelayanan?sub=ibadah-minggu') }}" class="hover:text-amber-400 transition-colors duration-150">
                            &raquo; Pelayanan Jemaat
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/jadwal?sub=jadwal-ibadah') }}" class="hover:text-amber-400 transition-colors duration-150">
                            &raquo; Jadwal Kebaktian
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/berita?sub=warta') }}" class="hover:text-amber-400 transition-colors duration-150">
                            &raquo; Warta & Renungan
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/donasi') }}" class="hover:text-amber-400 transition-colors duration-150">
                            &raquo; Persembahan Kasih
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Contact & Address -->
            <div>
                <h3 class="text-sm font-semibold font-display text-white uppercase tracking-wider mb-4 border-l-2 border-amber-500 pl-2">
                    Sekretariat & Hubungi
                </h3>
                <ul class="space-y-3.5 text-xs leading-relaxed font-light">
                    <li class="flex items-start space-x-2.5">
                        <i data-lucide="map-pin" class="w-4 h-4 text-amber-500 shrink-0 mt-0.5"></i>
                        <span>
                            Jl. Raya Jayapura - Kotaraja, Entrop, Distrik Jayapura Selatan, Kota Jayapura, Papua 99224
                        </span>
                    </li>
                    <li class="flex items-center space-x-2.5">
                        <i data-lucide="phone" class="w-4 h-4 text-amber-500 shrink-0"></i>
                        <span>+62 821-9876-5432</span>
                    </li>
                    <li class="flex items-center space-x-2.5">
                        <i data-lucide="mail" class="w-4 h-4 text-amber-500 shrink-0"></i>
                        <span>info@baptisyohanesentrop.org</span>
                    </li>
                </ul>
            </div>

            <!-- Column 4: Quick Donation Info -->
            <div class="bg-blue-900/40 p-5 rounded-xl border border-blue-900/80 space-y-3">
                <h3 class="text-sm font-semibold font-display text-white flex items-center space-x-2">
                    <i data-lucide="heart" class="w-4 h-4 text-rose-500 animate-pulse"></i>
                    <span>Dukung Pelayanan</span>
                </h3>
                <p class="text-[11px] text-slate-400 leading-relaxed font-light">
                    Mari mengambil bagian dalam mendukung misi dan pelayanan pekabaran Injil melalui persembahan persepuluhan dan kasih jemaat.
                </p>
                <a href="{{ url('/donasi') }}" 
                   class="inline-flex items-center justify-center w-full px-4 py-2 bg-amber-500 hover:bg-amber-600 text-blue-950 font-bold rounded-lg text-xs tracking-wider uppercase transition-colors focus:outline-none">
                    Info Rekening Donasi
                </a>
            </div>

        </div>
    </div>

    <!-- Lower Footer: Copyright & Credits -->
    <div class="bg-blue-950 border-t border-slate-900 py-6 text-center text-xs font-light text-slate-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p>&copy; {{ date('Y') }} Gereja Baptis Yohanes Entrop, Jayapura - Papua. All Rights Reserved.</p>
            <p class="text-[10px] tracking-wide text-slate-600">
                Terang Kristus bagi Tanah Papua &bull; Member dari Persekutuan Gereja-Gereja Baptis Papua
            </p>
        </div>
    </div>
</footer>
