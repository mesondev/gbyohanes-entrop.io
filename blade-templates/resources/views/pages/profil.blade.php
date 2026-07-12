@extends('layouts.app')

@section('title', 'Profil - Gereja Baptis Yohanes Entrop')

@section('content')
<div class="font-sans min-h-screen bg-slate-50 py-12 lg:py-16" 
     x-data="{ activeSubTab: new URLSearchParams(window.location.search).get('sub') || 'sejarah' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center space-y-3 mb-10">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">Mengenal Lebih Dekat</span>
            <h1 class="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
                Profil GBY Entrop
            </h1>
            <p class="text-sm text-slate-500 max-w-xl mx-auto font-light">
                Sejarah panjang, visi misi, kepemimpinan, dan nilai-nilai pelayanan di bawah bimbingan Roh Kudus.
            </p>
        </div>

        <!-- Layout: Sidebar Sub-Navigation + Content Panel -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Sub Navigation Sidebar -->
            <div class="lg:col-span-3 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm space-y-1">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider px-3 mb-2.5">Menu Profil</h3>
                
                <template x-for="item in [
                    { key: 'sejarah', label: 'Sejarah Gereja' },
                    { key: 'visi-misi', label: 'Visi & Misi' },
                    { key: 'logo', label: 'Logo Gereja' },
                    { key: 'gembala', label: 'Gembala Sidang' },
                    { key: 'struktur', label: 'Struktur Organisasi' },
                    { key: 'pengurus', label: 'Pengurus & Staff' }
                ]" :key="item.key">
                    <button x-on:click="activeSubTab = item.key; window.history.replaceState(null, '', '?sub=' + item.key);"
                            class="flex items-center justify-between w-full text-left px-4 py-3 rounded-xl text-xs font-semibold tracking-wide transition-all duration-150 cursor-pointer"
                            :class="activeSubTab === item.key 
                                ? 'bg-blue-900 text-white shadow-md shadow-blue-900/10' 
                                : 'text-slate-600 hover:bg-slate-50 hover:text-blue-950'">
                        <span x-text="item.label"></span>
                        <i data-lucide="chevron-right" 
                           class="w-4 h-4 opacity-70 transition-transform" 
                           :class="activeSubTab === item.key ? 'translate-x-1' : ''"></i>
                    </button>
                </template>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-9 bg-white p-6 sm:p-10 rounded-3xl border border-slate-100 shadow-sm min-h-[500px]">
                
                <!-- Subtab: Sejarah -->
                <div x-show="activeSubTab === 'sejarah'" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="space-y-6"
                     x-cloak>
                    <div class="border-b border-slate-100 pb-4">
                        <h2 class="text-2xl font-bold font-display text-blue-950">Sejarah Gereja</h2>
                        <p class="text-xs text-slate-400">Tonggak perjalanan iman jemaat di tanah Jayapura, Papua.</p>
                    </div>

                    <div class="prose text-xs sm:text-sm text-slate-600 leading-relaxed space-y-4 font-light">
                        <p>
                            <strong class="text-blue-950 font-bold text-sm">Awal Mula (1981):</strong> Pelayanan di daerah Entrop, Jayapura Selatan ini berakar dari sebuah kelompok persekutuan doa kecil rumah tangga (sektor) yang digumuli oleh beberapa kepala keluarga Baptis yang merantau dan menetap di Jayapura. Kerinduan untuk beribadah dalam persekutuan iman Baptis mendorong didirikannya Pos Pekabaran Injil (PI) perdana pada pertengahan tahun 1981.
                        </p>
                        
                        <div class="my-6 p-4 bg-amber-50 border-l-4 border-amber-500 rounded-r-xl">
                            <p class="italic text-amber-900 font-medium">
                                "Dari sebuah persekutuan rumah tangga kecil yang sederhana, Allah berkarya meluaskan pelayanan ini hingga menjangkau ratusan jemaat aktif di Kota Jayapura dan sekitarnya."
                            </p>
                        </div>

                        <p>
                            <strong class="text-blue-950 font-bold text-sm">Kemandirian Jemaat (1987):</strong> Atas bimbingan Tuhan Yesus Kristus dan kerja keras para perintis terdahulu, persekutuan doa ini resmi didewasakan menjadi gereja mandiri bernama <strong>Gereja Baptis Yohanes Entrop</strong> pada tanggal 12 November 1987. Peletakan batu pertama gedung ibadah permanen di lokasi strategis wilayah Entrop menjadi tanda komitmen pelayanan jemaat jangka panjang di ibu kota Papua.
                        </p>
                        <p>
                            <strong class="text-blue-950 font-bold text-sm">Perkembangan Pelayanan:</strong> Selama lebih dari empat dekade, gereja ini terus konsisten dalam melayani masyarakat melalui berbagai komitmen pelayanan: penjangkauan generasi muda (pemuda/remaja), pemberdayaan ekonomi kaum wanita jemaat, aksi diakonia tanggap bencana, serta pengutusan misionaris lokal ke daerah-daerah pedalaman terpencil di pegunungan tengah Papua.
                        </p>
                    </div>

                    <div class="pt-6 border-t border-slate-100 grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <h4 class="text-xs font-bold text-blue-900 uppercase">Tahun Berdiri</h4>
                            <p class="text-xl font-bold text-slate-800">1981</p>
                            <p class="text-[10px] text-slate-500 font-light">Perintisan Pos PI Perdana</p>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <h4 class="text-xs font-bold text-blue-900 uppercase">Dewasa Mandiri</h4>
                            <p class="text-xl font-bold text-slate-800">1987</p>
                            <p class="text-[10px] text-slate-500 font-light">Resmi Menjadi GBY Entrop</p>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <h4 class="text-xs font-bold text-blue-900 uppercase">Status Afiliasi</h4>
                            <p class="text-xs font-bold text-slate-800">PGBGP</p>
                            <p class="text-[10px] text-slate-500 font-light">Persatuan Gereja-Gereja Baptis Papua</p>
                        </div>
                    </div>
                </div>

                <!-- Subtab: Visi & Misi -->
                <div x-show="activeSubTab === 'visi-misi'" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="space-y-8"
                     x-cloak>
                    <div class="border-b border-slate-100 pb-4">
                        <h2 class="text-2xl font-bold font-display text-blue-950">Visi & Misi</h2>
                        <p class="text-xs text-slate-400">Arah, fondasi dasar, dan landasan operasional pelayanan gereja.</p>
                    </div>

                    <!-- Visi -->
                    <div class="p-6 bg-blue-50/50 rounded-2xl border border-blue-100/60 text-center space-y-3">
                        <span class="text-xs font-bold text-blue-900 uppercase tracking-widest block">VISI UTAMA GBY ENTROP</span>
                        <p class="text-lg sm:text-xl font-display font-medium text-slate-800 italic leading-relaxed max-w-2xl mx-auto">
                            "Terwujudnya jemaat yang berakar, bertumbuh, dan berbuah lebat di dalam Kristus Yesus demi kemuliaan Allah Bapa."
                        </p>
                        <p class="text-[10px] text-slate-400 font-medium">Berdasarkan amanat firman Tuhan dalam Kolose 2:7 dan Yohanes 15:8</p>
                    </div>

                    <!-- Misi -->
                    <div class="space-y-4">
                        <h3 class="text-sm font-bold text-slate-700 uppercase tracking-wider border-b border-slate-100 pb-2">Misi Pelayanan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-5 bg-slate-50 rounded-xl border border-slate-100/80 space-y-2">
                                <div class="text-lg font-bold text-amber-600 font-display">01</div>
                                <h4 class="text-sm font-bold text-blue-950">Pekabaran Injil</h4>
                                <p class="text-xs text-slate-500 leading-relaxed font-light">Mewartakan kabar keselamatan Yesus Kristus secara aktif kepada seluruh jiwa yang belum dijangkau di wilayah Papua dan sekitarnya.</p>
                            </div>
                            <div class="p-5 bg-slate-50 rounded-xl border border-slate-100/80 space-y-2">
                                <div class="text-lg font-bold text-amber-600 font-display">02</div>
                                <h4 class="text-sm font-bold text-blue-950">Pengajaran Firman</h4>
                                <p class="text-xs text-slate-500 leading-relaxed font-light">Mendidik jemaat melalui penelaahan Alkitab (PA) yang sistematis agar mandiri secara rohani dan berakar kuat dalam doktrin yang sehat.</p>
                            </div>
                            <div class="p-5 bg-slate-50 rounded-xl border border-slate-100/80 space-y-2">
                                <div class="text-lg font-bold text-amber-600 font-display">03</div>
                                <h4 class="text-sm font-bold text-blue-950">Persekutuan Kasih</h4>
                                <p class="text-xs text-slate-500 leading-relaxed font-light">Membina kasih persaudaraan sejati antarjemaat tanpa membeda-bedakan suku, klan, maupun strata sosial, saling menopang dalam kesulitan.</p>
                            </div>
                            <div class="p-5 bg-slate-50 rounded-xl border border-slate-100/80 space-y-2">
                                <div class="text-lg font-bold text-amber-600 font-display">04</div>
                                <h4 class="text-sm font-bold text-blue-950">Pengutusan & Pelayanan</h4>
                                <p class="text-xs text-slate-500 leading-relaxed font-light">Melatih serta mengutus kader-kader pelayanan, penatua, dan penginjil ke ladang pelayanan yang membutuhkan penanganan rohani khusus.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subtab: Logo -->
                <div x-show="activeSubTab === 'logo'" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="space-y-8"
                     x-cloak>
                    <div class="border-b border-slate-100 pb-4">
                        <h2 class="text-2xl font-bold font-display text-blue-950">Logo & Atribut Gereja</h2>
                        <p class="text-xs text-slate-400">Arti simbolik dan teologis di balik lambang resmi Gereja.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                        <!-- Visual Render of Logo Symbol -->
                        <div class="md:col-span-5 flex flex-col items-center justify-center p-6 bg-slate-50 rounded-2xl border border-slate-100">
                            <div class="w-40 h-40 rounded-full bg-blue-900 flex flex-col items-center justify-center p-4 shadow-lg text-center relative overflow-hidden border-4 border-amber-400">
                                <div class="absolute top-2 opacity-10 font-bold text-[80px] select-none text-white font-display">Y</div>
                                <i data-lucide="church" class="w-12 h-12 text-amber-400 z-10 mb-1"></i>
                                <span class="text-white font-bold text-[10px] tracking-wide uppercase z-10 leading-none">GEREJA BAPTIS</span>
                                <span class="text-amber-300 font-extrabold text-[12px] tracking-widest uppercase z-10 my-0.5">YOHANES</span>
                                <span class="text-slate-300 font-semibold text-[8px] tracking-wider uppercase z-10 leading-none">ENTROP</span>
                            </div>
                            <span class="text-[10px] text-slate-400 font-semibold mt-4 text-center">Lambang Resmi GBY Entrop - Papua</span>
                        </div>

                        <!-- Logo Symbol Explanation -->
                        <div class="md:col-span-7 space-y-4">
                            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wide">Makna Filosofis Lambang:</h3>
                            
                            <div class="space-y-3">
                                <div class="flex items-start space-x-3 text-xs leading-relaxed">
                                    <i data-lucide="check-circle2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                                    <div>
                                        <span class="font-bold text-blue-950 block">Warna Biru Tua (Latar Belakang)</span>
                                        <span class="text-slate-500 font-light">Melambangkan kedalaman iman, ketenangan rohani, kesetiaan jemaat, serta pengakuan kedaulatan mutlak Allah Bapa.</span>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3 text-xs leading-relaxed">
                                    <i data-lucide="check-circle2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                                    <div>
                                        <span class="font-bold text-blue-950 block">Lingkaran Emas / Kuning</span>
                                        <span class="text-slate-500 font-light">Melambangkan kemuliaan surgawi, kekudusan, keabadian janji Allah, serta penyertaan-Nya yang sempurna atas jemaat.</span>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3 text-xs leading-relaxed">
                                    <i data-lucide="check-circle2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                                    <div>
                                        <span class="font-bold text-blue-950 block">Salib & Alkitab Terbuka</span>
                                        <span class="text-slate-500 font-light">Melambangkan penebusan tuntas Kristus di kayu salib sebagai pusat pemberitaan Injil, serta Alkitab sebagai otoritas mutlak iman.</span>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3 text-xs leading-relaxed">
                                    <i data-lucide="check-circle2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                                    <div>
                                        <span class="font-bold text-blue-950 block">Nama 'Yohanes' (Yohanes Pembaptis)</span>
                                        <span class="text-slate-500 font-light">Representasi nama pelopor baptisan air pertobatan, meneladani komitmennya mempersiapkan jalan bagi kedatangan Tuhan Yesus.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subtab: Gembala -->
                <div x-show="activeSubTab === 'gembala'" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="space-y-8"
                     x-cloak>
                    <div class="border-b border-slate-100 pb-4">
                        <h2 class="text-2xl font-bold font-display text-blue-950">Gembala Sidang</h2>
                        <p class="text-xs text-slate-400">Kepemimpinan pastoral utama yang membimbing jemaat GBY Entrop.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                        
                        <!-- Photo Frame -->
                        <div class="md:col-span-4 flex flex-col items-center">
                            <div class="w-48 h-56 bg-slate-100 rounded-2xl border-4 border-slate-100 shadow-md overflow-hidden relative group">
                                <div class="absolute inset-0 bg-blue-950/10 group-hover:bg-transparent transition-all duration-300"></div>
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-900 to-blue-950 text-white">
                                    <i data-lucide="user" class="w-16 h-16 opacity-35"></i>
                                </div>
                                <div class="absolute bottom-3 left-3 right-3 bg-white/90 backdrop-blur-sm p-2 rounded-lg text-center">
                                    <span class="text-[10px] font-bold text-blue-950 block">Gembala Utama</span>
                                </div>
                            </div>
                            <div class="text-center mt-3 space-y-1">
                                <h4 class="text-xs font-bold text-slate-800">Pdt. Yohanes Kogoya, M.Th.</h4>
                                <p class="text-[10px] text-slate-400 font-medium">Gembala Sidang GBY Entrop</p>
                            </div>
                        </div>

                        <!-- Biography & Message -->
                        <div class="md:col-span-8 space-y-5">
                            <div class="space-y-1">
                                <span class="text-[10px] text-amber-700 font-bold uppercase tracking-wider">Salam Kasih Gembala</span>
                                <h3 class="text-xl font-bold font-display text-blue-950">Shalom, Damai di Hati!</h3>
                            </div>
                            
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-light italic bg-slate-50 p-4 rounded-xl border border-slate-100">
                                "Kami menyambut Anda sekalian dengan sukacita surgawi di website resmi GBY Entrop. Merupakan kehormatan besar bagi kami untuk melayani, mendoakan, dan berjalan bersama Anda sekalian dalam bertumbuh mengenal pengenalan Kristus yang benar. Jayapura butuh kebenaran Firman, dan gereja siap berdiri sebagai tiang penopang kebenaran tersebut."
                            </p>

                            <div class="space-y-3 text-xs leading-relaxed text-slate-500 font-light">
                                <p>
                                    <strong>Pdt. Yohanes Kogoya, M.Th.</strong> telah menggembalakan GBY Entrop sejak tahun 2012 setelah menyelesaikan studi Teologi Pascasarjana. Bersama sang istri, <strong>Ibu Pdt. Maria Kogoya, S.Th.</strong>, beliau berkomitmen membina kerohanian jemaat melalui metode pemuridan Alkitabiah serta mempererat kerukunan iman persaudaraan umat Kristen di tanah Papua.
                                </p>
                                <div class="pt-2 flex items-center space-x-4">
                                    <span class="flex items-center space-x-1 text-[11px] font-semibold text-blue-900">
                                        <i data-lucide="mail" class="w-3.5 h-3.5 text-slate-400 mr-1.5"></i>
                                        <span>pdt.yohanes@gbyentrop.org</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Subtab: Struktur -->
                <div x-show="activeSubTab === 'struktur'" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="space-y-8"
                     x-cloak>
                    <div class="border-b border-slate-100 pb-4">
                        <h2 class="text-2xl font-bold font-display text-blue-950">Struktur Organisasi</h2>
                        <p class="text-xs text-slate-400">Tata kelola administratif dan struktur kepemimpinan jemaat.</p>
                    </div>

                    <!-- Styled Org Chart -->
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col items-center justify-center space-y-6">
                        
                        <!-- Top Level: Gembala -->
                        <div class="bg-blue-900 text-white px-5 py-3 rounded-xl shadow-md text-center max-w-xs w-full">
                            <span class="text-[10px] text-amber-300 font-bold uppercase tracking-wider block">Pelindung & Pembina</span>
                            <span class="text-xs font-bold block mt-0.5">Gembala Sidang</span>
                            <span class="text-[10px] opacity-85 block italic">Pdt. Yohanes Kogoya, M.Th.</span>
                        </div>

                        <div class="w-0.5 h-6 bg-slate-300"></div>

                        <!-- Middle Level: Penasihat & BPH -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full max-w-lg">
                            <div class="bg-amber-500 text-blue-950 px-4 py-2.5 rounded-xl shadow-sm text-center">
                                <span class="text-[9px] font-bold uppercase block">Dewan Penasihat</span>
                                <span class="text-xs font-bold block">Majelis Jemaat</span>
                            </div>
                            <div class="bg-blue-550 border border-blue-200 bg-blue-50 text-blue-950 px-4 py-2.5 rounded-xl text-center">
                                <span class="text-[9px] text-blue-900 font-bold uppercase block">Badan Pengurus Harian</span>
                                <span class="text-xs font-bold block">BPH Jemaat GBY</span>
                            </div>
                        </div>

                        <div class="w-0.5 h-6 bg-slate-300"></div>

                        <!-- Operational: Sekr & Bend -->
                        <div class="grid grid-cols-2 gap-4 w-full max-w-md">
                            <div class="bg-white px-3 py-2 rounded-lg border border-slate-200 text-center">
                                <span class="text-[9px] text-slate-400 uppercase font-semibold block">Sekretaris</span>
                                <span class="text-xs font-bold text-slate-700">Stefanus Waromi, S.E.</span>
                            </div>
                            <div class="bg-white px-3 py-2 rounded-lg border border-slate-200 text-center">
                                <span class="text-[9px] text-slate-400 uppercase font-semibold block">Bendahara</span>
                                <span class="text-xs font-bold text-slate-700">Kristina Tabuni, S.E.</span>
                            </div>
                        </div>

                        <div class="w-0.5 h-6 bg-slate-300"></div>

                        <!-- Lower Level: Komisi-Komisi -->
                        <div class="bg-white p-4 rounded-xl border border-slate-200/80 w-full">
                            <span class="text-[10px] text-slate-400 font-bold uppercase text-center block mb-3">Bidang-Bidang Komisi Pelayanan</span>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                                <div class="bg-slate-50 p-2.5 rounded-lg border border-slate-100 text-center text-[10px] font-semibold text-slate-600">Sekolah Minggu</div>
                                <div class="bg-slate-50 p-2.5 rounded-lg border border-slate-100 text-center text-[10px] font-semibold text-slate-600">Komisi Pemuda</div>
                                <div class="bg-slate-50 p-2.5 rounded-lg border border-slate-100 text-center text-[10px] font-semibold text-slate-600">Komisi Wanita</div>
                                <div class="bg-slate-50 p-2.5 rounded-lg border border-slate-100 text-center text-[10px] font-semibold text-slate-600">Komisi Pria</div>
                                <div class="bg-slate-50 p-2.5 rounded-lg border border-slate-100 text-center text-[10px] font-semibold text-slate-600">Komisi Musik</div>
                                <div class="bg-slate-50 p-2.5 rounded-lg border border-slate-100 text-center text-[10px] font-semibold text-slate-600">Multimedia</div>
                                <div class="bg-slate-50 p-2.5 rounded-lg border border-slate-100 text-center text-[10px] font-semibold text-slate-600">Diakonia</div>
                                <div class="bg-slate-50 p-2.5 rounded-lg border border-slate-100 text-center text-[10px] font-semibold text-slate-600">Misi & PI</div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Subtab: Pengurus -->
                <div x-show="activeSubTab === 'pengurus'" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="space-y-6"
                     x-cloak>
                    <div class="border-b border-slate-100 pb-4">
                        <h2 class="text-2xl font-bold font-display text-blue-950">Daftar Pengurus & Staff</h2>
                        <p class="text-xs text-slate-400">Pelayan jemaat dan staff sekretariat yang melayani kepengurusan gereja harian.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-4 bg-slate-50 hover:bg-slate-100/50 rounded-xl border border-slate-150/80 flex items-center space-x-4 transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-white shadow-inner flex items-center justify-center shrink-0 border border-slate-200">
                                <i data-lucide="briefcase" class="w-5 h-5 text-blue-600"></i>
                            </div>
                            <div class="space-y-0.5">
                                <h4 class="text-xs font-bold text-slate-800">Bpk. Dr. Yakob Wanma</h4>
                                <p class="text-[10px] text-blue-900 font-bold uppercase">Ketua BPH Jemaat</p>
                                <p class="text-[10px] text-slate-400 font-light">Pengarah Umum</p>
                            </div>
                        </div>
                        <div class="p-4 bg-slate-50 hover:bg-slate-100/50 rounded-xl border border-slate-150/80 flex items-center space-x-4 transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-white shadow-inner flex items-center justify-center shrink-0 border border-slate-200">
                                <i data-lucide="mail" class="w-5 h-5 text-emerald-600"></i>
                            </div>
                            <div class="space-y-0.5">
                                <h4 class="text-xs font-bold text-slate-800">Bpk. Stefanus Waromi, S.E.</h4>
                                <p class="text-[10px] text-blue-900 font-bold uppercase">Sekretaris Jemaat</p>
                                <p class="text-[10px] text-slate-400 font-light">Administrasi & Surat Menyurat</p>
                            </div>
                        </div>
                        <div class="p-4 bg-slate-50 hover:bg-slate-100/50 rounded-xl border border-slate-150/80 flex items-center space-x-4 transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-white shadow-inner flex items-center justify-center shrink-0 border border-slate-200">
                                <i data-lucide="star" class="w-5 h-5 text-amber-500"></i>
                            </div>
                            <div class="space-y-0.5">
                                <h4 class="text-xs font-bold text-slate-800">Ibu Kristina Tabuni, S.E.</h4>
                                <p class="text-[10px] text-blue-900 font-bold uppercase">Bendahara Jemaat</p>
                                <p class="text-[10px] text-slate-400 font-light">Keuangan & Kas Gereja</p>
                            </div>
                        </div>
                        <div class="p-4 bg-slate-50 hover:bg-slate-100/50 rounded-xl border border-slate-150/80 flex items-center space-x-4 transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-white shadow-inner flex items-center justify-center shrink-0 border border-slate-200">
                                <i data-lucide="users" class="w-5 h-5 text-purple-600"></i>
                            </div>
                            <div class="space-y-0.5">
                                <h4 class="text-xs font-bold text-slate-800">Sdr. David Kogoya</h4>
                                <p class="text-[10px] text-blue-900 font-bold uppercase">Ketua Komisi Pemuda (PPA)</p>
                                <p class="text-[10px] text-slate-400 font-light">Pembinaan Generasi Muda</p>
                            </div>
                        </div>
                        <div class="p-4 bg-slate-50 hover:bg-slate-100/50 rounded-xl border border-slate-150/80 flex items-center space-x-4 transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-white shadow-inner flex items-center justify-center shrink-0 border border-slate-200">
                                <i data-lucide="trophy" class="w-5 h-5 text-rose-500"></i>
                            </div>
                            <div class="space-y-0.5">
                                <h4 class="text-xs font-bold text-slate-800">Ibu Ester Wenda, S.Pd.</h4>
                                <p class="text-[10px] text-blue-900 font-bold uppercase">Ketua Komisi Sekolah Minggu</p>
                                <p class="text-[10px] text-slate-400 font-light">Pembinaan Iman Anak</p>
                            </div>
                        </div>
                        <div class="p-4 bg-slate-50 hover:bg-slate-100/50 rounded-xl border border-slate-150/80 flex items-center space-x-4 transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-white shadow-inner flex items-center justify-center shrink-0 border border-slate-200">
                                <i data-lucide="shield" class="w-5 h-5 text-slate-600"></i>
                            </div>
                            <div class="space-y-0.5">
                                <h4 class="text-xs font-bold text-slate-800">Bpk. Markus Pigome, S.Kom.</h4>
                                <p class="text-[10px] text-blue-900 font-bold uppercase">Kepala Bidang Multimedia</p>
                                <p class="text-[10px] text-slate-400 font-light">Teknologi & Sound System</p>
                            </div>
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
