@extends('layouts.app')

@section('title', 'Beranda - Gereja Baptis Yohanes Entrop')

@section('content')
<div class="font-sans min-h-screen bg-slate-50" x-data="{
    currentVerseIndex: 0,
    verses: [
        { text: 'Janganlah hendaknya kamu kuatir tentang apapun juga, tetapi nyatakanlah dalam segala hal keinginanmu kepada Allah dalam doa dan permohonan dengan ucapan syukur.', ref: 'Filipi 4:6' },
        { text: 'Sebab Aku ini mengetahui rancangan-rancangan apa yang ada pada-Ku mengenai kamu, demikianlah firman TUHAN, yaitu rancangan damai sejahtera dan bukan rancangan kecelakaan, untuk memberikan kepadamu hari depan yang penuh harapan.', ref: 'Yeremia 29:11' },
        { text: 'Serahkanlah kuatirmu kepada TUHAN, maka Ia akan memelihara engkau! Tidak untuk selama-lamanya dibiarkan-Nya orang benar itu goyah.', ref: 'Mazmur 55:23' },
        { text: 'Tetapi orang-orang yang menanti-nantikan TUHAN mendapat kekuatan baru: mereka seumpama rajawali yang naik terbang dengan kekuatan sayapnya; mereka berlari dan tidak menjadi lesu, mereka berjalan dan tidak menjadi lelah.', ref: 'Yesaya 40:31' },
        { text: 'Kasihilah seorang akan yang lain dengan kasih persaudaraan yang tulus dan saling mendahuluilah dalam memberi hormat.', ref: 'Roma 12:10' }
    ],
    getNewVerse() {
        this.currentVerseIndex = (this.currentVerseIndex + 1) % this.verses.length;
    },
    prayerForm: { name: '', phone: '', request: '' },
    prayerSubmitted: false,
    submitPrayer() {
        if (!this.prayerForm.request.trim()) return;
        this.prayerSubmitted = true;
        setTimeout(() => {
            this.prayerForm = { name: '', phone: '', request: '' };
        }, 500);
    }
}">
    
    <!-- 1. HERO SECTION -->
    <section class="relative overflow-hidden bg-gradient-to-b from-blue-950 via-blue-900 to-blue-950 text-white py-20 lg:py-32">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f59e0b_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center space-x-2 bg-amber-500/10 text-amber-400 border border-amber-500/20 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider">
                        <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
                        <span>Terang Kristus Bagi Tanah Papua</span>
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-display leading-tight tracking-tight text-white">
                        GEREJA BAPTIS <br />
                        <span class="text-amber-400">YOHANES ENTROP</span>
                    </h1>
                    
                    <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-light">
                        Menjadi jemaat yang berakar di dalam Kristus, bertumbuh dalam kebenaran Firman Tuhan, dan berbuah lebat bagi kemuliaan Bapa serta sesama di Jayapura.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-4">
                        <a href="{{ url('/jadwal?sub=jadwal-ibadah') }}"
                           class="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-blue-950 font-bold rounded-xl text-sm transition-all duration-150 flex items-center justify-center space-x-2 shadow-lg shadow-amber-500/10">
                            <i data-lucide="calendar" class="w-4 h-4"></i>
                            <span>Jadwal Ibadah Minggu</span>
                        </a>
                        <a href="{{ url('/profil?sub=sejarah') }}"
                           class="px-6 py-3 bg-white/10 hover:bg-white/15 border border-white/20 text-white font-medium rounded-xl text-sm transition-all duration-150 flex items-center justify-center space-x-2">
                            <span>Kenal Kami Lebih Dekat</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Hero Card Visual -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative bg-white text-slate-800 p-6 sm:p-8 rounded-2xl shadow-2xl border border-slate-100 max-w-sm w-full">
                        <div class="absolute top-0 right-0 transform translate-x-3 -translate-y-3 bg-amber-500 text-blue-950 p-3 rounded-xl shadow-lg font-bold text-xs tracking-wider uppercase flex flex-col items-center">
                            <span>MINGGU</span>
                            <span class="text-xl leading-none">09:00</span>
                            <span>WIT</span>
                        </div>
                        
                        <h3 class="font-display font-bold text-xl text-blue-950 mb-1 flex items-center space-x-2">
                            <i data-lucide="church" class="w-5 h-5 text-amber-600"></i>
                            <span>Kebaktian Utama</span>
                        </h3>
                        <p class="text-xs text-slate-500 font-medium mb-4">Ibadah Raya Mingguan Jemaat</p>
                        
                        <div class="space-y-3 text-xs leading-relaxed text-slate-600 border-t border-slate-100 pt-4">
                            <div class="flex items-start space-x-2">
                                <span class="font-semibold text-blue-950">Tempat:</span>
                                <span>Gedung Kebaktian Utama GBY Entrop, Jayapura</span>
                            </div>
                            <div class="flex items-start space-x-2">
                                <span class="font-semibold text-blue-950">Pelayan:</span>
                                <span>Gembala Sidang & Pelayan Liturgi Jemaat</span>
                            </div>
                            <div class="flex items-start space-x-2">
                                <span class="font-semibold text-blue-950">Tema Bulan:</span>
                                <span class="text-amber-700 italic">"Kasih Persaudaraan yang Saling Menopang"</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="{{ url('/galeri?sub=video') }}"
                               class="w-full py-2.5 bg-blue-50 hover:bg-blue-100 text-blue-950 font-semibold rounded-xl text-xs flex items-center justify-center space-x-2 transition-colors">
                                <i data-lucide="book-open" class="w-3.5 h-3.5"></i>
                                <span>Lihat Rekaman Ibadah</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 2. VERSE OF THE DAY SECTION -->
    <section class="py-10 bg-blue-50 border-y border-blue-100">
        <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
            <div class="inline-flex items-center space-x-1.5 text-amber-700 font-bold text-xs uppercase tracking-wider">
                <i data-lucide="sparkles" class="w-4 h-4"></i>
                <span>Ayat Alkitab Hari Ini</span>
            </div>
            <div class="space-y-3">
                <p class="text-base sm:text-lg md:text-xl font-display font-medium text-slate-800 leading-relaxed italic"
                   x-text="'“' + verses[currentVerseIndex].text + '”'">
                </p>
                <p class="text-xs sm:text-sm text-blue-900 font-bold"
                   x-text="'— ' + verses[currentVerseIndex].ref">
                </p>
            </div>
            <button x-on:click="getNewVerse()"
                    class="mt-2 px-4 py-1.5 bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-medium text-xs rounded-full transition-colors cursor-pointer">
                Dapatkan Ayat Lain
            </button>
        </div>
    </section>

    <!-- 3. KEY STATS -->
    <section class="py-16 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                
                <div class="space-y-2 p-4 bg-slate-50 rounded-xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <i data-lucide="users" class="w-7 h-7 text-blue-800 mx-auto"></i>
                    <div class="text-2xl sm:text-3xl font-extrabold text-slate-950 font-display">350+</div>
                    <div class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Jemaat Aktif</div>
                </div>

                <div class="space-y-2 p-4 bg-slate-50 rounded-xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <i data-lucide="church" class="w-7 h-7 text-amber-600 mx-auto"></i>
                    <div class="text-2xl sm:text-3xl font-extrabold text-slate-950 font-display">14+</div>
                    <div class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Komisi Pelayanan</div>
                </div>

                <div class="space-y-2 p-4 bg-slate-50 rounded-xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <i data-lucide="heart-handshake" class="w-7 h-7 text-rose-500 mx-auto"></i>
                    <div class="text-2xl sm:text-3xl font-extrabold text-slate-950 font-display">12+</div>
                    <div class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Wilayah Sel/Sektor</div>
                </div>

                <div class="space-y-2 p-4 bg-slate-50 rounded-xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <i data-lucide="award" class="w-7 h-7 text-emerald-600 mx-auto"></i>
                    <div class="text-2xl sm:text-3xl font-extrabold text-slate-950 font-display">45 Th</div>
                    <div class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Melayani di Papua</div>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. MAIN QUICK SERVICES GRID -->
    <section class="py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center space-y-3 max-w-2xl mx-auto mb-12">
                <h2 class="text-3xl font-bold font-display text-blue-950 tracking-tight">
                    Fokus Utama Pelayanan Jemaat
                </h2>
                <p class="text-sm text-slate-500 leading-relaxed font-light">
                    Gereja Baptis Yohanes Entrop berkomitmen mendampingi setiap tahapan pertumbuhan iman Anda dan keluarga melalui berbagai ibadah dan persekutuan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Kebaktian Anak & Sekolah Minggu -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold font-display">
                            K1
                        </div>
                        <h3 class="text-lg font-bold font-display text-blue-950">Komisi Anak & Sekolah Minggu</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-light">
                            Membina karakter spiritual anak sejak usia dini dengan metode pembelajaran Alkitab yang kreatif, ceria, dan penuh kegembiraan kristiani.
                        </p>
                    </div>
                    <a href="{{ url('/pelayanan?sub=sekolah-minggu') }}" 
                       class="mt-6 inline-flex items-center space-x-1.5 text-xs font-semibold text-emerald-700 hover:text-emerald-800">
                        <span>Selengkapnya</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>

                <!-- Pemuda & Remaja -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold font-display">
                            K2
                        </div>
                        <h3 class="text-lg font-bold font-display text-blue-950">Perhimpunan Pemuda & Remaja</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-light">
                            Menjadi wadah berekspresi, berbagi, dan berdiskusi yang sehat bagi generasi muda di tengah tantangan zaman, berakar kuat di dalam nilai Alkitabiah.
                        </p>
                    </div>
                    <a href="{{ url('/pelayanan?sub=pemuda') }}" 
                       class="mt-6 inline-flex items-center space-x-1.5 text-xs font-semibold text-blue-700 hover:text-blue-800">
                        <span>Selengkapnya</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>

                <!-- Kaum Pria & Wanita -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold font-display">
                            K3
                        </div>
                        <h3 class="text-lg font-bold font-display text-blue-950">Persekutuan Bapak & Ibu</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-light">
                            Mendampingi keluarga-keluarga Kristen agar harmonis, saling membangun, dan menjadi teladan pelayanan di gereja, lingkungan kerja, serta masyarakat sekitar.
                        </p>
                    </div>
                    <div class="mt-6 flex space-x-4">
                        <a href="{{ url('/pelayanan?sub=pria') }}" 
                           class="inline-flex items-center space-x-1.5 text-xs font-semibold text-amber-700 hover:text-amber-800">
                            <span>Bapak (PBI)</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                        <a href="{{ url('/pelayanan?sub=wanita') }}" 
                           class="inline-flex items-center space-x-1.5 text-xs font-semibold text-amber-700 hover:text-amber-800">
                            <span>Ibu (WBI)</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 5. INTERACTIVE PRAYER REQUEST FORM -->
    <section class="py-16 bg-blue-950 text-white relative">
        <div class="absolute inset-0 opacity-5 bg-[linear-gradient(to_right,#808080_1px,transparent_1px),linear-gradient(to_bottom,#808080_1px,transparent_1px)] bg-[size:24px_24px]"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 relative z-10">
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
                
                <div class="md:col-span-5 space-y-4">
                    <span class="text-amber-400 font-bold text-xs uppercase tracking-wider block">Pelayanan Syafaat</span>
                    <h2 class="text-3xl font-bold font-display tracking-tight leading-tight">
                        Apakah Anda Butuh Topangan Doa?
                    </h2>
                    <p class="text-xs text-slate-300 leading-relaxed font-light">
                        Sebagai satu tubuh di dalam Kristus, kami rindu mendukung dan mendoakan pergumulan Anda. Silakan kirimkan permohonan doa Anda, tim pelayanan pendoa syafaat kami akan mendoakan Anda secara khusus.
                    </p>
                    <div class="bg-blue-900/40 p-4 rounded-xl border border-blue-900/60 flex items-start space-x-3 text-xs text-slate-300 font-light">
                        <i data-lucide="shield-alert" class="w-5 h-5 text-amber-500 shrink-0 mt-0.5"></i>
                        <span>Seluruh permohonan doa Anda akan dijaga kerahasiaannya dan hanya dibagikan kepada tim pendoa syafaat gereja.</span>
                    </div>
                </div>

                <!-- Prayer request dynamic container -->
                <div class="md:col-span-7 bg-white text-slate-800 p-6 sm:p-8 rounded-2xl shadow-xl border border-slate-800/10">
                    
                    <!-- Success screen -->
                    <div x-show="prayerSubmitted" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         class="text-center py-8 space-y-4"
                         x-cloak>
                        <div class="w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto shadow-inner">
                            <i data-lucide="check-circle2" class="w-10 h-10"></i>
                        </div>
                        <h3 class="text-xl font-bold font-display text-blue-950">Permohonan Doa Diterima</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-light max-w-sm mx-auto">
                            Terima kasih atas kepercayaan Anda. Tim Pendoa Syafaat Gereja Baptis Yohanes Entrop akan mendoakan pergumulan Anda dalam persekutuan doa berkala kami. Tuhan Yesus memberkati.
                        </p>
                        <button x-on:click="prayerSubmitted = false"
                                class="mt-4 px-4 py-2 bg-blue-900 text-white font-bold text-xs rounded-xl hover:bg-blue-950 transition-colors cursor-pointer">
                            Kirim Permohonan Lain
                        </button>
                    </div>

                    <!-- Input form -->
                    <form x-show="!prayerSubmitted" x-on:submit.prevent="submitPrayer()" class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Nama Lengkap / Inisial (Opsional)
                            </label>
                            <input type="text"
                                   placeholder="Contoh: Jhon Doe"
                                   x-model="prayerForm.name"
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900 transition-colors"
                            />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                No. Kontak / WA (Opsional)
                            </label>
                            <input type="tel"
                                   placeholder="Contoh: 0812xxxxxxxx"
                                   x-model="prayerForm.phone"
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900 transition-colors"
                            />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Pergumulan / Pokok Doa (Wajib)
                            </label>
                            <textarea rows="4"
                                      required
                                      placeholder="Tuliskan pergumulan atau hal yang ingin didoakan di sini..."
                                      x-model="prayerForm.request"
                                      class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900 transition-colors"
                            ></textarea>
                        </div>

                        <button type="submit"
                                class="w-full py-3 bg-amber-500 hover:bg-amber-600 text-blue-950 font-bold rounded-xl text-xs uppercase tracking-wider transition-colors flex items-center justify-center space-x-2 cursor-pointer">
                            <i data-lucide="send" class="w-4 h-4"></i>
                            <span>Kirim Pokok Doa</span>
                        </button>
                    </form>
                    
                </div>

            </div>
        </div>
    </section>

</div>
@endsection

@section('scripts')
<script>
    // Anytime the state variables render inside Alpine, we ensure the new Lucide icons render successfully!
    document.addEventListener('alpine:initialized', () => {
        lucide.createIcons();
    });
</script>
@endsection
