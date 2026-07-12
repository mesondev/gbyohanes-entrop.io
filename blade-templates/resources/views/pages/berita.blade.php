@extends('layouts.app')

@section('title', 'Berita & Renungan - Gereja Baptis Yohanes Entrop')

@section('content')
<div class="font-sans min-h-screen bg-slate-50 py-12 lg:py-16"
     x-data="{
        activeCategory: new URLSearchParams(window.location.search).get('sub') || 'berita',
        activeBulletinId: null,
        reflectionSubmitted: false,
        newReflection: { name: '', text: '' },
        
        reflections: [
            { name: 'Sdr. David K.', date: 'Hari ini, 09:30 WIT', text: 'Sangat menguatkan! Kadang di tengah kesibukan kerja di Jayapura, kita lupa pentingnya berakar dalam Firman terlebih dahulu sebelum bertindak.' },
            { name: 'Ibu Ester W.', date: 'Kemarin, 14:15 WIT', text: 'Renungan yang sangat indah tentang pentingnya berbuah lebat bagi kemuliaan Bapa di Surga. Mengingatkan tugas kita mendidik anak Sekolah Minggu.' }
        ],

        newsData: [
            {
                id: 'news-1',
                title: 'Aksi Kasih Diakonia GBY Entrop Membantu Korban Kebakaran Pasar Sentral',
                category: 'berita',
                date: '10 Juli 2026',
                author: 'Markus Pigome (Komisi Humas)',
                excerpt: 'Pemberian santunan sembako, pakaian layak pakai, dan bantuan dana darurat dari persembahan kasih jemaat untuk keluarga korban kebakaran.',
                content: 'JAYAPURA - Menindaklanjuti musibah kebakaran hebat yang melanda kawasan pemukiman padat dekat Pasar Sentral Jayapura pekan lalu, Gereja Baptis Yohanes Entrop bergerak cepat melangsungkan Aksi Kasih Diakonia. Melalui koordinasi Komisi Diakonia dan perwakilan BPH Jemaat, terkumpul donasi sukarela berupa 150 paket sembako, pakaian pantas pakai, serta bantuan uang tunai darurat yang diserahkan langsung oleh Gembala Sidang, Pdt. Yohanes Kogoya, M.Th., di posko pengungsian utama. Kami mengucapkan terima kasih mendalam bagi kebaikan seluruh jemaat yang telah tulus berpartisipasi menopang sesama kita yang sedang berduka.',
                image: 'https://picsum.photos/seed/action/800/450'
            },
            {
                id: 'news-2',
                title: 'Rapat Persiapan HUT Ke-39 GBY Entrop & Penerimaan Katekisasi Sidi Baru',
                category: 'berita',
                date: '05 Juli 2026',
                author: 'Stefanus Waromi (Sekretaris)',
                excerpt: 'Pembentukan panitia pelaksana HUT ke-39 yang jatuh pada bulan November, disusul pembukaan kelas bimbingan katekisasi Sidi baru.',
                content: 'ENTROP - Dalam rangka menyongsong Hari Ulang Tahun ke-39 berdirinya Gereja Baptis Yohanes Entrop, BPH Jemaat bersama Majelis Penasihat mengadakan rapat perdana pembentukan panitia pelaksana. HUT tahun ini akan mengusung tema \'Sehati Berakar dan Melayani Bagi Papua\'. Selain ibadah syukur bersama, HUT kali ini juga dirangkaikan dengan peneguhan Sidi baru serta Sakramen Baptisan Kudus massal. Bagi pemuda/remaja atau jemaat dewasa yang belum mengikuti sidi, pendaftaran kelas katekisasi resmi dibuka mulai minggu ini di ruang sekretariat gereja.',
                image: 'https://picsum.photos/seed/meeting/800/450'
            },
            {
                id: 'news-3',
                title: 'Undangan Ibadah Raya Gabungan Pemuda Baptis se-Jayapura di Aula Entrop',
                category: 'berita',
                date: '28 Juni 2026',
                author: 'David Kogoya (Ketua Pemuda)',
                excerpt: 'GBY Entrop dipercayakan menjadi tuan rumah Ibadah Gabungan Pemuda-Pemudi Baptis Triwulan se-Kota Jayapura.',
                content: 'JAYAPURA - Syalom pemuda-pemudi kekasih Kristus! Komisi Pemuda GBY Entrop mengundang dengan hangat seluruh rekan-rekan Pemuda dan Remaja Baptis dari berbagai pos PI dan gereja cabang se-Kota Jayapura untuk menghadiri Ibadah Raya Gabungan Triwulan. Ibadah gabungan ini akan diisi dengan puji-pujian bertema kontemporer, kesaksian pujian dari masing-masing gereja, serta pembicara spesial Pdt. Dr. Simon Tabuni yang akan membawakan firman bertema \'Generasi Millennial Papua yang Bersinar di dalam Kristus\'. Ibadah akan ditutup dengan makan malam fellowship bersama.',
                image: 'https://picsum.photos/seed/youth/800/450'
            }
        ],

        bulletins: [
            {
                id: 'warta-1',
                title: 'Warta Jemaat - Minggu, 12 Juli 2026',
                date: '12 Juli 2026',
                downloads: '124x diunduh',
                size: '1.2 MB',
                pokokDoa: [
                    'Kesehatan Gembala Sidang, BPH Jemaat, dan seluruh pelayan liturgis.',
                    'Proses studi anak-anak jemaat yang memasuki tahun ajaran baru sekolah.',
                    'Kedamaian dan kerukunan beragama di tanah Papua khususnya kota Jayapura.'
                ],
                keuangan: {
                    pemasukan: 'Rp 14.530.000,- (Persepuluhan & Kantong Kolekte)',
                    pengeluaran: 'Rp 8.200.000,- (Operasional & Listrik Air Sekretariat)',
                    saldo: 'Rp 6.330.000,-'
                },
                petugasMingguDepan: {
                    pengkhotbah: 'Pdt. Yohanes Kogoya, M.Th.',
                    worshipLeader: 'Sdr. Filemon Waromi',
                    singers: 'Ibu Ester W., Sdr. David K., Sdri. Lidia T.',
                    soundman: 'Sdr. Ronald P.'
                }
            },
            {
                id: 'warta-2',
                title: 'Warta Jemaat - Minggu, 05 Juli 2026',
                date: '05 Juli 2026',
                downloads: '98x diunduh',
                size: '1.1 MB',
                pokokDoa: [
                    'Keluarga jemaat yang sedang dalam pemulihan pasca sakit.',
                    'Persiapan panitia HUT GBY Entrop ke-39.',
                    'Pelayanan Misi penginjilan pos PI pedalaman.'
                ],
                keuangan: {
                    pemasukan: 'Rp 12.110.000,-',
                    pengeluaran: 'Rp 9.150.000,-',
                    saldo: 'Rp 2.960.000,-'
                },
                petugasMingguDepan: {
                    pengkhotbah: 'Pdt. Yohanes Kogoya, M.Th.',
                    worshipLeader: 'Sdri. Lidia Tabuni',
                    singers: 'Sdr. Nathan W., Ibu Maria K.',
                    soundman: 'Sdr. Ronald P.'
                }
            }
        ],

        get activeBulletin() {
            return this.bulletins.find(b => b.id === this.activeBulletinId);
        },

        submitReflection() {
            if (!this.newReflection.name.trim() || !this.newReflection.text.trim()) return;
            this.reflections.unshift({
                name: this.newReflection.name,
                date: 'Baru saja',
                text: this.newReflection.text
            });
            this.newReflection = { name: '', text: '' };
            this.reflectionSubmitted = true;
            setTimeout(() => {
                this.reflectionSubmitted = false;
            }, 4000);
        }
     }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center space-y-3 mb-10">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">Kabar Jemaat & Santapan Rohani</span>
            <h1 class="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
                Berita, Warta & Renungan
            </h1>
            <p class="text-sm text-slate-500 max-w-xl mx-auto font-light">
                Ikuti perkembangan kegiatan, download lembaran Warta Mingguan resmi, dan bertumbuh dalam kebenaran Firman Tuhan melalui renungan harian.
            </p>
        </div>

        <!-- Category Menu Tabs -->
        <div class="flex justify-center border-b border-slate-200 mb-10">
            <div class="flex space-x-8">
                <template x-for="cat in [
                    { key: 'berita', label: 'Berita Gereja' },
                    { key: 'warta', label: 'Warta Jemaat' },
                    { key: 'renungan', label: 'Renungan Harian' }
                ]" :key="cat.key">
                    <button x-on:click="activeCategory = cat.key; window.history.replaceState(null, '', '?sub=' + cat.key); $nextTick(() => lucide.createIcons());"
                            class="pb-4 text-sm font-bold border-b-2 transition-colors cursor-pointer focus:outline-none"
                            :class="activeCategory === cat.key
                                ? 'border-blue-900 text-blue-950 font-bold'
                                : 'border-transparent text-slate-500 hover:text-blue-950'">
                        <span x-text="cat.label"></span>
                    </button>
                </template>
            </div>
        </div>

        <!-- 1. TAB: BERITA GEREJA -->
        <div x-show="activeCategory === 'berita'" class="space-y-10" x-cloak>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <template x-for="news in newsData" :key="news.id">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden hover:shadow-md transition-all flex flex-col justify-between">
                        <div>
                            <div class="relative h-48 bg-slate-100 overflow-hidden">
                                <img :src="news.image" alt="Thumbnail" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" />
                                <div class="absolute top-3 left-3 bg-blue-900 text-white text-[9px] font-bold px-2 py-0.5 rounded-md uppercase">
                                    Berita Kasih
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <div class="flex items-center space-x-3 text-[10px] text-slate-400 font-medium">
                                    <div class="flex items-center space-x-1">
                                        <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                                        <span x-text="news.date"></span>
                                    </div>
                                    <span>&bull;</span>
                                    <div class="flex items-center space-x-1">
                                        <i data-lucide="user" class="w-3.5 h-3.5"></i>
                                        <span x-text="news.author"></span>
                                    </div>
                                </div>
                                <h3 class="text-sm sm:text-base font-bold font-display text-blue-950 leading-tight hover:text-blue-900 transition-colors" x-text="news.title"></h3>
                                <p class="text-xs text-slate-500 leading-relaxed font-light" x-text="news.excerpt"></p>
                            </div>
                        </div>
                        <div class="p-6 pt-0">
                            <!-- Toggle full body text in pop-up accordion, simplified to a neat expander inside card or alert -->
                            <div x-data="{ expanded: false }" class="border-t border-slate-50 pt-3">
                                <button x-on:click="expanded = !expanded" 
                                        class="text-[11px] font-bold text-blue-900 hover:text-blue-950 flex items-center space-x-1 cursor-pointer">
                                    <span x-text="expanded ? 'Tutup Rincian' : 'Baca Selengkapnya &raquo;'"></span>
                                </button>
                                <div x-show="expanded" class="mt-3 text-xs text-slate-600 bg-slate-50 p-4 rounded-xl border border-slate-100 leading-relaxed font-light space-y-2" x-cloak>
                                    <p x-text="news.content"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- 2. TAB: WARTA JEMAAT -->
        <div x-show="activeCategory === 'warta'" class="max-w-4xl mx-auto space-y-6" x-cloak>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <template x-for="item in bulletins" :key="item.id">
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-start justify-between gap-4 hover:shadow-md transition-shadow">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center shrink-0 border border-amber-100">
                                <i data-lucide="file-text" class="w-6 h-6 text-amber-600"></i>
                            </div>
                            <div class="space-y-1">
                                <h3 class="text-sm sm:text-base font-bold font-display text-blue-950" x-text="item.title"></h3>
                                <div class="flex items-center space-x-2 text-[10px] text-slate-400 font-medium">
                                    <span>PDF</span>
                                    <span>&bull;</span>
                                    <span x-text="item.size"></span>
                                    <span>&bull;</span>
                                    <span x-text="item.downloads"></span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 shrink-0">
                            <!-- View warta detail modal button -->
                            <button x-on:click="activeBulletinId = item.id; $nextTick(() => lucide.createIcons());"
                                    class="px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-900 font-bold text-[10px] rounded-lg cursor-pointer flex items-center justify-center space-x-1 transition-colors">
                                <i data-lucide="eye" class="w-3.5 h-3.5"></i>
                                <span>Lihat Isi</span>
                            </button>
                            <a href="#" x-on:click.prevent="alert('Warta Jemaat resmi berhasil diunduh ke folder perangkat Anda!')"
                               class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-[10px] rounded-lg cursor-pointer flex items-center justify-center space-x-1 transition-colors">
                                <i data-lucide="download" class="w-3.5 h-3.5"></i>
                                <span>Download</span>
                            </a>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Bulletins Detail Modal Popup Backdrop -->
            <div x-show="activeBulletinId" 
                 class="fixed inset-0 bg-slate-950/50 backdrop-blur-sm z-50 flex items-center justify-center p-4"
                 x-cloak>
                <div x-show="activeBulletinId" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-on:click.away="activeBulletinId = null"
                     class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6 sm:p-8 space-y-6 relative border border-slate-100">
                    
                    <button x-on:click="activeBulletinId = null" 
                            class="absolute top-4 right-4 p-2 rounded-full hover:bg-slate-100 text-slate-400 hover:text-slate-600 transition-colors cursor-pointer">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>

                    <template x-if="activeBulletin">
                        <div class="space-y-6">
                            <!-- Header -->
                            <div class="border-b border-slate-100 pb-4">
                                <span class="bg-blue-100 text-blue-900 text-[9px] font-bold px-2 py-0.5 rounded-md uppercase">Lembaran Warta</span>
                                <h3 class="text-xl font-bold font-display text-blue-950 mt-1" x-text="activeBulletin.title"></h3>
                                <p class="text-[10px] text-slate-400 mt-0.5" x-text="'Dipublikasikan khusus bagi jemaat GBY Entrop pada ' + activeBulletin.date"></p>
                            </div>

                            <!-- 1. Pokok Syafaat Doa -->
                            <div class="space-y-2">
                                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider flex items-center space-x-1.5">
                                    <i data-lucide="heart" class="w-4 h-4 text-rose-500"></i>
                                    <span>Pokok Doa Syafaat Jemaat:</span>
                                </h4>
                                <ul class="space-y-1.5 pl-5 list-disc text-xs text-slate-600 leading-relaxed font-light">
                                    <template x-for="(doa, i) in activeBulletin.pokokDoa" :key="i">
                                        <li x-text="doa"></li>
                                    </template>
                                </ul>
                            </div>

                            <!-- 2. Ringkasan Keuangan Kas -->
                            <div class="space-y-2">
                                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider flex items-center space-x-1.5">
                                    <i data-lucide="dollar-sign" class="w-4 h-4 text-emerald-600"></i>
                                    <span>Laporan Keuangan Kas (Mingguan):</span>
                                </h4>
                                <div class="grid grid-cols-3 gap-3 bg-slate-50 p-4 rounded-xl border border-slate-100 text-xs">
                                    <div class="space-y-0.5 text-center">
                                        <span class="block text-[9px] text-slate-400 font-bold uppercase">Total Pemasukan</span>
                                        <span class="font-bold text-emerald-600" x-text="activeBulletin.keuangan.pemasukan"></span>
                                    </div>
                                    <div class="space-y-0.5 text-center border-x border-slate-200">
                                        <span class="block text-[9px] text-slate-400 font-bold uppercase">Pengeluaran</span>
                                        <span class="font-bold text-rose-500" x-text="activeBulletin.keuangan.pengeluaran"></span>
                                    </div>
                                    <div class="space-y-0.5 text-center">
                                        <span class="block text-[9px] text-slate-400 font-bold uppercase">Saldo Kas</span>
                                        <span class="font-extrabold text-blue-900" x-text="activeBulletin.keuangan.saldo"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. Pelayan Liturgi Minggu Depan -->
                            <div class="space-y-2">
                                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider flex items-center space-x-1.5">
                                    <i data-lucide="user" class="w-4 h-4 text-blue-600"></i>
                                    <span>Petugas Liturgis Ibadah Minggu Depan:</span>
                                </h4>
                                <div class="grid grid-cols-2 gap-3 text-xs leading-relaxed border border-slate-100 p-4 rounded-xl font-light">
                                    <div>
                                        <span class="font-semibold text-slate-500 block">Pengkhotbah Utama:</span>
                                        <span class="font-bold text-blue-950" x-text="activeBulletin.petugasMingguDepan.pengkhotbah"></span>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-slate-500 block">Worship Leader:</span>
                                        <span class="font-bold text-blue-950" x-text="activeBulletin.petugasMingguDepan.worshipLeader"></span>
                                    </div>
                                    <div class="col-span-2">
                                        <span class="font-semibold text-slate-500 block">Tim Singer Pujian:</span>
                                        <span class="font-bold text-blue-950" x-text="activeBulletin.petugasMingguDepan.singers"></span>
                                    </div>
                                </div>
                            </div>

                            <button x-on:click="activeBulletinId = null"
                                    class="w-full py-2.5 bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs rounded-xl uppercase tracking-wider cursor-pointer transition-colors text-center block">
                                Tutup Isi Warta
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- 3. TAB: RENUNGAN HARIAN -->
        <div x-show="activeCategory === 'renungan'" class="max-w-4xl mx-auto space-y-10" x-cloak>
            
            <!-- Core Devotional Content -->
            <div class="bg-white p-6 sm:p-10 rounded-3xl border border-slate-100 shadow-sm space-y-6">
                <div class="space-y-2 border-b border-slate-100 pb-5">
                    <div class="flex items-center space-x-2 text-xs text-amber-700 font-bold uppercase tracking-wider">
                        <i data-lucide="bookmark" class="w-4 h-4"></i>
                        <span>Renungan Hari Ini</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold font-display text-blue-950 leading-tight">
                        Berakar di Dalam Kristus, Berbuah di Dalam Pelayanan
                    </h2>
                    <div class="flex items-center space-x-3 text-[10px] text-slate-400 font-medium pt-1">
                        <span>Pdt. Yohanes Kogoya, M.Th.</span>
                        <span>&bull;</span>
                        <span>12 Juli 2026</span>
                    </div>
                </div>

                <div class="prose text-xs sm:text-sm text-slate-600 leading-relaxed font-light space-y-4">
                    <p>
                        <em>“Hendaklah kamu berakar di dalam Dia dan dibangun di atas Dia, hendaklah kamu bertambah teguh dalam iman yang telah diajarkan kepadamu, dan hendaklah hatimu melimpah dengan syukur.”</em> &mdash; <strong>Kolose 2:7</strong>
                    </p>
                    <p>
                        Kehidupan rohani yang sehat sering diibaratkan Alkitab seperti pohon yang ditanam di tepi aliran air. Guna menghasilkan buah lebat yang manis sepanjang musim, pohon tersebut wajib memprioritaskan pertumbuhan akar yang menjalar jauh menembus tanah subur terdalam.
                    </p>
                    <p>
                        Hal serupa berlaku bagi perjalanan iman kita di tengah riuhnya kesibukan harian kota Jayapura ini. Di hadapan tantangan ekonomi, pekerjaan, dan masa depan, seberapa dalam 'akar rohani' kita tertanam kuat dalam Firman Tuhan? Sebelum rindu melayani orang lain atau membuahkan prestasi, pastikan diri kita terus dipelihara oleh kedalaman hubungan pribadi yang intim dengan Tuhan Yesus Kristus melalui doa dan perenungan Alkitab harian.
                    </p>
                    <div class="my-5 p-4 bg-blue-50/60 rounded-xl border-l-4 border-blue-900 text-blue-950 italic font-medium">
                        "Akar rohani yang sehat dan dalam merupakan jaminan mutlak bagi kokohnya dahan dan lebatnya buah kehidupan iman di tengah terpaan angin badai pergumulan."
                    </div>
                    <p>
                        Mari luangkan waktu sejenak di tengah pergulatan pekan ini untuk kembali menyuburkan persekutuan pribadi kita dengan Sang Sumber Air Hidup. Biarlah hati kita selalu dipenuhi ucapan syukur atas limpahnya pemeliharaan-Nya yang tiada bertepi. Amin.
                    </p>
                </div>
            </div>

            <!-- Reflections Feed and Discussion Box -->
            <div class="space-y-6">
                <h3 class="text-sm font-bold text-slate-700 uppercase tracking-wider border-b border-slate-100 pb-2 flex items-center space-x-2">
                    <i data-lucide="clock" class="w-4.5 h-4.5 text-slate-400"></i>
                    <span>Tanggapan & Sharing Jemaat:</span>
                </h3>

                <!-- Input sharing form -->
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm space-y-4">
                    <h4 class="text-xs font-bold text-blue-950 uppercase tracking-wide">Tuliskan Bagian Firman yang Menguatkan Anda:</h4>
                    
                    <div x-show="reflectionSubmitted" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         class="p-3 bg-emerald-50 rounded-lg border border-emerald-100 text-xs font-semibold text-emerald-800 flex items-center space-x-1.5"
                         x-cloak>
                        <i data-lucide="check-circle2" class="w-4 h-4 text-emerald-600"></i>
                        <span>Terima kasih! Sharing tanggapan iman Anda berhasil diterbitkan di bawah ini.</span>
                    </div>

                    <form x-on:submit.prevent="submitReflection()" class="space-y-3">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <input type="text"
                                   required
                                   placeholder="Nama Anda..."
                                   x-model="newReflection.name"
                                   class="px-4 py-2 border border-slate-200 text-xs rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-900/20"
                            />
                        </div>
                        <textarea rows="3"
                                  required
                                  placeholder="Tuliskan berkat renungan atau pergumulan syafaat Anda..."
                                  x-model="newReflection.text"
                                  class="w-full px-4 py-2 border border-slate-200 text-xs rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-900/20"
                        ></textarea>
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs rounded-xl uppercase tracking-wider transition-colors flex items-center space-x-1.5 cursor-pointer">
                                <i data-lucide="send" class="w-3.5 h-3.5"></i>
                                <span>Kirim Tanggapan</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Discussion list stream -->
                <div class="space-y-4">
                    <template x-for="(ref, i) in reflections" :key="i">
                        <div class="p-4 bg-white rounded-xl border border-slate-100 shadow-sm flex items-start space-x-3.5">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-900 flex items-center justify-center font-bold text-xs shrink-0" 
                                 x-text="ref.name.charAt(0)">
                            </div>
                            <div class="space-y-1 leading-relaxed">
                                <div class="flex items-center space-x-2 text-[10px] font-semibold">
                                    <span class="text-blue-950" x-text="ref.name"></span>
                                    <span class="text-slate-400">&bull;</span>
                                    <span class="text-slate-400 font-light" x-text="ref.date"></span>
                                </div>
                                <p class="text-xs text-slate-600 font-light leading-relaxed" x-text="ref.text"></p>
                            </div>
                        </div>
                    </template>
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
