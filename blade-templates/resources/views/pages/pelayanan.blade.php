@extends('layouts.app')

@section('title', 'Pelayanan - Gereja Baptis Yohanes Entrop')

@section('content')
<div class="font-sans min-h-screen bg-slate-50 py-12 lg:py-16"
     x-data="{
        selectedFilter: 'all',
        selectedMinistryKey: new URLSearchParams(window.location.search).get('sub') || 'ibadah-minggu',
        successContact: null,
        
        ministries: [
            {
                key: 'ibadah-minggu',
                category: 'liturgis',
                title: 'Ibadah Raya Minggu',
                description: 'Pusat perjumpaan jemaat mingguan untuk memuji, menyembah, dan merenungkan Kebenaran Firman Tuhan secara korporat.',
                schedule: 'Minggu, Pukul 09:00 WIT - Selesai',
                leader: 'Pdt. Yohanes Kogoya, M.Th.',
                contact: '0821-9876-0001',
                icon: 'flame',
                iconColor: 'text-blue-900',
                details: [
                    'Liturgi ibadah yang tertib, hidup, dan beraliran Baptis Alkitabiah.',
                    'Pemberitaan Firman yang aplikatif, doktrinal, dan relevan dengan kehidupan praktis.',
                    'Dilengkapi pelayanan tumpangan tangan doa syafaat pasca-ibadah.'
                ]
            },
            {
                key: 'sekolah-minggu',
                category: 'komisi',
                title: 'Sekolah Minggu Anak',
                description: 'Wadah pembinaan kerohanian anak usia balita hingga sekolah dasar melalui cerita Alkitab, puji-pujian, dan aktivitas kreatif.',
                schedule: 'Minggu, Pukul 07:30 WIT',
                leader: 'Ibu Ester Wenda, S.Pd.',
                contact: '0821-9876-0002',
                icon: 'award',
                iconColor: 'text-emerald-600',
                details: [
                    'Kurikulum Alkitab berjenjang sesuai kapasitas umur anak.',
                    'Dibimbing oleh guru-guru Sekolah Minggu yang terlatih, sabar, dan penuh kasih.',
                    'Aktivitas tambahan berupa paduan suara anak, drama paskah, dan retreat anak.'
                ]
            },
            {
                key: 'pemuda',
                category: 'komisi',
                title: 'Komisi Pemuda (PPA)',
                description: 'Persekutuan pemuda-pemudi Baptis (Perhimpunan Pemuda Antara) untuk bertumbuh bersama dalam karakter, pertemanan kudus, dan pelayanan inovatif.',
                schedule: 'Sabtu, Pukul 17:00 WIT',
                leader: 'Sdr. David Kogoya',
                contact: '0821-9876-0003',
                icon: 'users',
                iconColor: 'text-indigo-600',
                details: [
                    'Sharing firman kelompok kecil (pemuridan) dan diskusi topikal seputar kepemudaan Kristen.',
                    'Latihan kepemimpinan, bakti sosial, olahraga bersama, dan malam ekspresi talenta.',
                    'Pelatihan kepemimpinan dasar rohani.'
                ]
            },
            {
                key: 'remaja',
                category: 'komisi',
                title: 'Persekutuan Remaja',
                description: 'Pendampingan rohani khusus bagi anak usia SMP - SMA dalam melewati masa transisi kritis pencarian jati diri.',
                schedule: 'Sabtu, Pukul 15:30 WIT',
                leader: 'Sdr. Nathan Wanma',
                contact: '0821-9876-0004',
                icon: 'users',
                iconColor: 'text-purple-600',
                details: [
                    'Penyampaian materi Alkitab yang interaktif, seru, dan relevan dengan tantangan sekolah remaja.',
                    'Konseling pribadi gratis bagi remaja menghadapi masalah keluarga atau studi.',
                    'Kegiatan kebersamaan outdoor (kebaktian padang) dan camping rohani.'
                ]
            },
            {
                key: 'wanita',
                category: 'komisi',
                title: 'Kaum Wanita (WBI)',
                description: 'Wadah persekutuan Ibu-Ibu (Wanita Baptis Indonesia) untuk saling menguatkan peran sebagai tiang doa dalam rumah tangga dan agen kasih di jemaat.',
                schedule: 'Selasa, Pukul 16:00 WIT',
                leader: 'Ibu Pdt. Maria Kogoya, S.Th.',
                contact: '0821-9876-0005',
                icon: 'heart',
                iconColor: 'text-rose-500',
                details: [
                    'Pendalaman Firman tematik, rantai doa syafaat keluarga, dan perkunjungan rumah jemaat sakit.',
                    'Pelatihan keterampilan praktis (memasak, menjahit, merangkai bunga, kerajinan tangan noken Papua).',
                    'Seminar peran ibu mendidik generasi milenial di era digital.'
                ]
            },
            {
                key: 'pria',
                category: 'komisi',
                title: 'Kaum Pria (PBI)',
                description: 'Wadah pembinaan bapak-bapak (Pria Baptis Indonesia) untuk menjadi imam, pemimpin teladan, dan penyedia yang bertanggung jawab bagi keluarga.',
                schedule: 'Kamis, Pukul 19:00 WIT',
                leader: 'Bpk. Dr. Yakob Wanma',
                contact: '0821-9876-0006',
                icon: 'users',
                iconColor: 'text-amber-700',
                details: [
                    'Pendalaman iman khusus bapak-bapak mendalami kepemimpinan Alkitabiah (servant leadership).',
                    'Pelayanan perkunjungan (besuk) jemaat pasif atau yang sedang menghadapi kedukaan.',
                    'Kegiatan kerja bakti gereja, pembangunan gedung, dan bimbingan kepemimpinan keluarga.'
                ]
            },
            {
                key: 'musik',
                category: 'liturgis',
                title: 'Komisi Musik & Pujian',
                description: 'Tim pelayan musik, penyanyi latar (backing vocal), dan pemandu pujian (Worship Leader) yang memimpin jemaat dalam aliran hadirat Tuhan.',
                schedule: 'Latihan Rutin: Jumat, Pukul 17:00 WIT',
                leader: 'Sdr. Filemon Waromi',
                contact: '0821-9876-0007',
                icon: 'music',
                iconColor: 'text-red-500',
                details: [
                    'Pelatihan vokal teratur, teknik memimpin pujian (Worship Leading), dan instrumen keyboard/gitar/drum.',
                    'Melayani pengiringan musik dalam Ibadah Raya, pernikahan, kedukaan, dan persekutuan komisi.',
                    'Audisi terbuka bagi jemaat bertalenta musik yang rindu melayani.'
                ]
            },
            {
                key: 'multimedia',
                category: 'liturgis',
                title: 'Multimedia & Sound System',
                description: 'Dukungan teknis visual slide presentasi, pencahayaan, kualitas suara kebaktian, serta siaran rekaman ibadah digital.',
                schedule: 'Bertugas Setiap Jadwal Ibadah Utama',
                leader: 'Bpk. Markus Pigome, S.Kom.',
                contact: '0821-9876-0008',
                icon: 'tv',
                iconColor: 'text-slate-600',
                details: [
                    'Mengoperasikan sound system mixer, proyektor slide lagu, dan kamera perekam kebaktian.',
                    'Mengelola penayangan informasi warta jemaat multimedia sebelum ibadah dimulai.',
                    'Melakukan maintenance berkala perangkat elektronik dan kabel kelistrikan gedung gereja.'
                ]
            },
            {
                key: 'diakonia',
                category: 'sosial-misi',
                title: 'Pelayanan Diakonia',
                description: 'Penyaluran uluran tangan jemaat berupa bantuan sembako, biaya pengobatan, serta beasiswa sekolah bagi jemaat yang kurang mampu.',
                schedule: 'Penyaluran Rutin: Awal Bulan',
                leader: 'Bpk. Barnabas Tabuni',
                contact: '0821-9876-0009',
                icon: 'heart-handshake',
                iconColor: 'text-teal-600',
                details: [
                    'Melakukan survey kebutuhan objektif keluarga jemaat prasejahtera secara berkala.',
                    'Mengelola lumbung sembako darurat bagi jemaat terdampak musibah/bencana alam.',
                    'Kerja sama dengan komisi wanita menyantuni janda-janda tua dan anak yatim jemaat.'
                ]
            },
            {
                key: 'misi',
                category: 'sosial-misi',
                title: 'Misi & Penginjilan (PI)',
                description: 'Mewujudkan amanat agung dengan mengirimkan logistik misi, obat-obatan, serta mengutus misionaris lokal ke pos-pos pedalaman terisolir.',
                schedule: 'Kunjungan Lapangan: 2 Kali Setahun',
                leader: 'Pdt. Yohanes Kogoya (Koordinator)',
                contact: '0821-9876-0010',
                icon: 'globe',
                iconColor: 'text-blue-600',
                details: [
                    'Membantu pembukaan pos-pos PI baru di daerah pegunungan tengah Papua yang sulit akses.',
                    'Mendistribusikan literatur rohani Alkitab berbahasa daerah dan buku bacaan anak.',
                    'Mengadakan kebaktian kebangunan rohani (KKR) penjangkauan jiwa baru.'
                ]
            },
            {
                key: 'baptisan',
                category: 'sakramen-konseling',
                title: 'Baptisan Kudus',
                description: 'Melaksanakan perintah Yesus Kristus berupa baptisan selam (immersion) bagi orang percaya sebagai simbol kematian dan kebangkitan bersama Kristus.',
                schedule: 'Pelaksanaan: 3 Kali Setahun (Paskah, HUT Gereja, Natal)',
                leader: 'Sidang Gembala & Dewan Penatua',
                contact: '0821-9876-0011',
                icon: 'check',
                iconColor: 'text-sky-500',
                details: [
                    'Wajib melalui kelas pembinaan khusus doktrin baptisan sebanyak 6 pertemuan.',
                    'Hanya dilaksanakan melalui metode selam utuh sesuai ketetapan Alkitabiah Baptis.',
                    'Menerima sertifikat resmi Surat Baptisan GBY Entrop yang diakui sinode.'
                ]
            },
            {
                key: 'sidi',
                category: 'sakramen-konseling',
                title: 'Sidi (Katekisasi)',
                description: 'Kelas pengajaran khusus pendalaman iman bagi remaja atau dewasa sebelum diteguhkan menjadi anggota jemaat penuh yang berhak mengikuti Perjamuan Kudus.',
                schedule: 'Setiap Hari Sabtu, Pukul 10:00 WIT',
                leader: 'Pdt. Yohanes Kogoya, M.Th.',
                contact: '0821-9876-0012',
                icon: 'book-open',
                iconColor: 'text-emerald-700',
                details: [
                    'Materi mencakup: Pengakuan Iman Rasul, Sejarah Gereja, Sakramen, dan Etika Kristen Praktis.',
                    'Diskusi interaktif langsung dibimbing oleh Gembala Sidang.',
                    'Pemberian kartu tanda keanggotaan gereja resmi (Sidi).'
                ]
            },
            {
                key: 'pernikahan',
                category: 'sakramen-konseling',
                title: 'Pernikahan Kudus',
                description: 'Pendampingan calon pasangan pengantin Kristen mulai dari konseling pra-nikah hingga peneguhan janji suci pernikahan di altar gereja.',
                schedule: 'Sesuai Pengajuan & Kesiapan Pasangan',
                leader: 'Gembala Sidang GBY Entrop',
                contact: '0821-9876-0013',
                icon: 'heart',
                iconColor: 'text-rose-600',
                details: [
                    'Wajib mengikuti minimal 4 sesi Bimbingan Pra-Nikah intensif (BPN).',
                    'Penyelesaian berkas administrasi gereja dan catatan sipil dikoordinasikan lengkap.',
                    'Peneguhan pernikahan sakral berpusat pada kekudusan perjanjian di hadapan Allah.'
                ]
            },
            {
                key: 'konseling',
                category: 'sakramen-konseling',
                title: 'Konseling Pastoral',
                description: 'Layanan ruang aman curahan hati (curhat) dan bimbingan pastoral bagi jemaat yang sedang mengalami stres berat, depresi, atau konflik keluarga.',
                schedule: 'By Appointment (Daftar Terlebih Dahulu)',
                leader: 'Pdt. Yohanes Kogoya, M.Th. / Tim Konselor',
                contact: '0821-9876-0014',
                icon: 'message-square',
                iconColor: 'text-blue-600',
                details: [
                    'Kerahasiaan data dan cerita konseling dijamin 100% oleh kode etik pastoral.',
                    'Sesi bimbingan yang ramah, hangat, bebas penghakiman, berlandaskan prinsip Alkitab.',
                    'Dapat dikombinasikan dengan rujukan profesional jika memerlukan penanganan psikologis medis.'
                ]
            }
        ],

        get filteredMinistries() {
            if (this.selectedFilter === 'all') return this.ministries;
            return this.ministries.filter(m => m.category === this.selectedFilter);
        },

        get activeMinistry() {
            return this.ministries.find(m => m.key === this.selectedMinistryKey) || this.ministries[0];
        },

        handleContactReq() {
            this.successContact = this.activeMinistry.title;
            setTimeout(() => {
                this.successContact = null;
            }, 5000);
        }
     }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center space-y-3 mb-10">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">Komitmen & Panggilan Melayani</span>
            <h1 class="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
                Komisi & Pelayanan Jemaat
            </h1>
            <p class="text-sm text-slate-500 max-w-xl mx-auto font-light">
                Menjangkau seluruh rentang usia jemaat, memperlengkapi talenta, dan menyembuhkan jiwa yang berbeban berat.
            </p>
        </div>

        <!-- Filter Navigation Tabs -->
        <div class="flex flex-wrap justify-center gap-2 mb-8 border-b border-slate-200 pb-5">
            <template x-for="filter in [
                { key: 'all', label: 'Semua Pelayanan' },
                { key: 'komisi', label: 'Kategori Jemaat' },
                { key: 'liturgis', label: 'Pelayanan Ibadah' },
                { key: 'sosial-misi', label: 'Misi & Sosial' },
                { key: 'sakramen-konseling', label: 'Sakramen & Pastoral' }
            ]" :key="filter.key">
                <button x-on:click="
                            selectedFilter = filter.key;
                            let matched = ministries.find(m => filter.key === 'all' || m.category === filter.key);
                            if (matched) {
                                selectedMinistryKey = matched.key;
                            }
                            $nextTick(() => lucide.createIcons());
                        "
                        class="px-4 py-2 text-xs font-bold uppercase tracking-wider rounded-full transition-all duration-150 cursor-pointer"
                        :class="selectedFilter === filter.key
                            ? 'bg-blue-950 text-white shadow-md'
                            : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 hover:text-blue-950'">
                    <span x-text="filter.label"></span>
                </button>
            </template>
        </div>

        <!-- Layout: Sidebar list of matched ministries + Detail panel -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- List Sidebar -->
            <div class="lg:col-span-4 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm max-h-[600px] overflow-y-auto space-y-1">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block px-3 mb-2">
                    Daftar Komisi & Pelayanan
                </span>
                
                <template x-for="m in filteredMinistries" :key="m.key">
                    <button x-on:click="selectedMinistryKey = m.key; window.history.replaceState(null, '', '?sub=' + m.key); $nextTick(() => lucide.createIcons());"
                            class="flex items-center space-x-3 w-full text-left px-3 py-2.5 rounded-xl text-xs font-semibold tracking-wide transition-all duration-150 cursor-pointer"
                            :class="selectedMinistryKey === m.key
                                ? 'bg-blue-50 text-blue-950 border-l-4 border-blue-900 rounded-l-none'
                                : 'text-slate-600 hover:bg-slate-50 hover:text-blue-900'">
                        <div class="p-1.5 rounded-lg shrink-0" :class="selectedMinistryKey === m.key ? 'bg-white shadow-sm' : 'bg-slate-50'">
                            <i :data-lucide="m.icon" class="w-5 h-5" :class="m.iconColor"></i>
                        </div>
                        <span class="truncate" x-text="m.title"></span>
                    </button>
                </template>
            </div>

            <!-- Details Panel -->
            <div class="lg:col-span-8 bg-white p-6 sm:p-10 rounded-3xl border border-slate-100 shadow-sm">
                
                <div class="space-y-6">
                    
                    <!-- Header card info -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-slate-100 pb-5 gap-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center shadow-inner">
                                <i :data-lucide="activeMinistry.icon" class="w-7 h-7" :class="activeMinistry.iconColor"></i>
                            </div>
                            <div>
                                <h2 class="text-xl sm:text-2xl font-bold font-display text-blue-950 animate-fade-in" x-text="activeMinistry.title"></h2>
                                <span class="inline-block bg-blue-100 text-blue-900 text-[10px] font-bold px-2 py-0.5 rounded-md uppercase mt-1 tracking-wider"
                                      x-text="activeMinistry.category === 'komisi' ? 'Komisi Jemaat' : 
                                             activeMinistry.category === 'liturgis' ? 'Pelayanan Liturgis' :
                                             activeMinistry.category === 'sosial-misi' ? 'Misi & Sosial' : 'Sakramen & Pastoral'">
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Deskripsi Pelayanan</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-light" x-text="activeMinistry.description">
                        </p>
                    </div>

                    <!-- Bullet details -->
                    <div class="space-y-3 bg-slate-50 p-5 rounded-2xl border border-slate-100">
                        <h3 class="text-xs font-bold text-slate-700 uppercase tracking-wider">Poin & Program Utama</h3>
                        <ul class="space-y-2.5">
                            <template x-for="(detail, idx) in activeMinistry.details" :key="idx">
                                <li class="flex items-start space-x-2.5 text-xs text-slate-600 leading-relaxed">
                                    <i data-lucide="check" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                                    <span x-text="detail"></span>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <!-- Schedule & Contact Info -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-4 bg-blue-50/50 rounded-xl border border-blue-100/50 flex items-start space-x-3">
                            <i data-lucide="calendar" class="w-5 h-5 text-blue-900 shrink-0 mt-0.5"></i>
                            <div>
                                <h4 class="text-[10px] font-bold text-blue-900 uppercase">Jadwal Persekutuan</h4>
                                <p class="text-xs font-semibold text-slate-800 mt-0.5" x-text="activeMinistry.schedule"></p>
                            </div>
                        </div>

                        <div class="p-4 bg-amber-50/50 rounded-xl border border-amber-100/50 flex items-start space-x-3">
                            <i data-lucide="user-check" class="w-5 h-5 text-amber-700 shrink-0 mt-0.5"></i>
                            <div>
                                <h4 class="text-[10px] font-bold text-amber-700 uppercase">Koordinator</h4>
                                <p class="text-xs font-semibold text-slate-800 mt-0.5" x-text="activeMinistry.leader"></p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Action button -->
                    <div class="pt-4 border-t border-slate-100">
                        <!-- Success message if clicked -->
                        <div x-show="successContact === activeMinistry.title" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform translate-y-1"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             class="p-4 bg-emerald-50 rounded-xl border border-emerald-100 text-center flex items-center justify-center space-x-2 text-xs font-semibold text-emerald-800"
                             x-cloak>
                            <i data-lucide="check-circle2" class="w-4 h-4 text-emerald-600"></i>
                            <span x-text="'Permintaan Anda dikirim! Silakan hubungi WA ' + activeMinistry.contact + ' untuk respons cepat.'"></span>
                        </div>
                        
                        <div x-show="successContact !== activeMinistry.title" class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            <p class="text-xs text-slate-400 font-light text-center sm:text-left">
                                Tertarik bergabung pelayanan atau membutuhkan bantuan seputar komisi ini?
                            </p>
                            <button x-on:click="handleContactReq()"
                                    class="px-5 py-2.5 bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs rounded-xl tracking-wide uppercase transition-colors flex items-center space-x-2 shrink-0 cursor-pointer">
                                <i data-lucide="phone" class="w-3.5 h-3.5"></i>
                                <span>Hubungi Sekretariat</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('alpine:initialized', () => {
        lucide.createIcons();
    });
</script>
@endsection
