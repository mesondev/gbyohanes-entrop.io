@extends('layouts.app')

@section('title', 'Hubungi Kami - Gereja Baptis Yohanes Entrop')

@section('content')
<div class="font-sans min-h-screen bg-slate-50 py-12 lg:py-16"
     x-data="{
        activeFaqIdx: null,
        formSubmitted: false,
        form: { name: '', email: '', subject: '', message: '' },
        
        faqs: [
            { q: 'Kapan jadwal Ibadah Raya utama mingguan diadakan?', a: 'Ibadah Raya utama diadakan setiap hari Minggu pagi pukul 09:00 WIT sampai selesai (sekitar pukul 11:30 WIT), bertempat di Gedung Utama Lantai 1 & 2.' },
            { q: 'Bagaimana cara mendaftarkan anak saya ke Sekolah Minggu?', a: 'Pendaftaran Sekolah Minggu anak sangatlah mudah dan gratis. Jemaat dapat langsung membawa putra/putrinya pada hari Minggu pagi pukul 07:30 WIT di Gedung Pembinaan Anak. Petugas guru Sekolah Minggu kami akan dengan senang hati membantu proses registrasi kelas.' },
            { q: 'Apakah ada kelas persiapan peneguhan Sidi baru?', a: 'Ya, kelas katekisasi Sidi resmi diadakan secara berkala sepanjang tahun, khususnya menjelang Hari Raya Natal, Paskah, atau HUT GBY Entrop di bulan November. Kelas ini dibimbing langsung oleh Gembala Sidang.' },
            { q: 'Bagaimana cara mengajukan permohonan Pernikahan Kudus di gereja?', a: 'Calon pengantin Kristen dimohon mengajukan berkas tertulis ke ruang sekretariat gereja minimal 3 bulan sebelum tanggal peneguhan pernikahan, guna menjadwalkan 4 sesi Bimbingan Pra-Nikah (BPN) intensif bersama Gembala Sidang.' }
        ],

        submitForm() {
            if (!this.form.name.trim() || !this.form.message.trim()) return;
            this.formSubmitted = true;
            setTimeout(() => {
                this.form = { name: '', email: '', subject: '', message: '' };
            }, 500);
        }
     }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center space-y-3 mb-10">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">Komunikasi & Pelayanan Jemaat</span>
            <h1 class="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
                Hubungi Kami & Lokasi
            </h1>
            <p class="text-sm text-slate-500 max-w-xl mx-auto font-light">
                Ada pertanyaan seputar pelayanan jemaat, permohonan doa, atau rindu bertamu? Silakan hubungi sekretariat kami di Jayapura.
            </p>
        </div>

        <!-- Upper Grid: Contact Card details + Form submission -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start mb-16">
            
            <!-- Contact details column (lg:col-span-5) -->
            <div class="lg:col-span-5 space-y-6">
                
                <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm space-y-6">
                    <h3 class="text-sm font-bold text-slate-700 uppercase tracking-wider border-b border-slate-100 pb-2">Informasi Sekretariat</h3>
                    
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3 text-xs leading-relaxed">
                            <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center shrink-0 border border-blue-100">
                                <i data-lucide="map-pin" class="w-4 h-4 text-blue-900"></i>
                            </div>
                            <div>
                                <span class="font-bold text-blue-950 block">Alamat Fisik:</span>
                                <span class="text-slate-500 font-light">Jl. Raya Jayapura - Kotaraja, Entrop, Distrik Jayapura Selatan, Kota Jayapura, Papua 99224</span>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3 text-xs leading-relaxed">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center shrink-0 border border-emerald-100">
                                <i data-lucide="phone" class="w-4 h-4 text-emerald-600"></i>
                            </div>
                            <div>
                                <span class="font-bold text-blue-950 block">No. Telepon / WA:</span>
                                <span class="text-slate-500 font-light">+62 821-9876-5432 (Sekretariat Jemaat GBY)</span>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3 text-xs leading-relaxed">
                            <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center shrink-0 border border-amber-100">
                                <i data-lucide="mail" class="w-4 h-4 text-amber-600"></i>
                            </div>
                            <div>
                                <span class="font-bold text-blue-950 block">E-mail Resmi:</span>
                                <span class="text-slate-500 font-light">info@baptisyohanesentrop.org</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Google Maps Placeholder Image Frame with real Link -->
                <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm space-y-3">
                    <div class="h-44 bg-slate-100 rounded-xl overflow-hidden relative border border-slate-200">
                        <div class="w-full h-full bg-[radial-gradient(#cbd5e1_1px,transparent_1px)] [background-size:16px_16px] flex items-center justify-center">
                            <div class="text-center p-4">
                                <i data-lucide="map-pin" class="w-8 h-8 text-rose-500 mx-auto animate-bounce"></i>
                                <span class="block text-[11px] font-bold text-slate-600 mt-2">Kompleks GBY Entrop - Jayapura</span>
                            </div>
                        </div>
                    </div>
                    <a href="https://maps.google.com" target="_blank" rel="noopener noreferrer"
                       class="w-full py-2 bg-blue-50 hover:bg-blue-100 text-blue-900 font-bold text-[10px] rounded-lg cursor-pointer flex items-center justify-center space-x-1.5 transition-colors">
                        <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
                        <span>Buka Penunjuk Arah Google Maps &raquo;</span>
                    </a>
                </div>

            </div>

            <!-- Form Submission Column (lg:col-span-7) -->
            <div class="lg:col-span-7 bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm">
                
                <!-- Success view -->
                <div x-show="formSubmitted" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     class="text-center py-10 space-y-4"
                     x-cloak>
                    <div class="w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto shadow-inner">
                        <i data-lucide="check-circle2" class="w-10 h-10"></i>
                    </div>
                    <h3 class="text-xl font-bold font-display text-blue-950">Pesan Anda Terkirim</h3>
                    <p class="text-xs text-slate-500 leading-relaxed font-light max-w-sm mx-auto">
                        Terima kasih telah menghubungi kami. Pesan atau laporan Anda telah diteruskan ke petugas administrasi kesekretariatan GBY Entrop. Kami akan merespons melalui email atau nomor telepon yang Anda sediakan dalam waktu maksimal 2x24 jam kerja.
                    </p>
                    <button x-on:click="formSubmitted = false"
                            class="mt-4 px-4 py-2 bg-blue-900 text-white font-bold text-xs rounded-xl hover:bg-blue-950 transition-colors cursor-pointer">
                        Kirim Pesan Lain
                    </button>
                </div>

                <!-- Input form -->
                <form x-show="!formSubmitted" x-on:submit.prevent="submitForm()" class="space-y-4">
                    <h3 class="text-sm font-bold text-slate-700 uppercase tracking-wider border-b border-slate-100 pb-2">Kirim Formulir Pesan</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Lengkap (Wajib)</label>
                            <input type="text"
                                   required
                                   placeholder="Contoh: Maria Kogoya"
                                   x-model="form.name"
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/20"
                            />
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Alamat Email (Opsional)</label>
                            <input type="email"
                                   placeholder="Contoh: maria@gbyentrop.org"
                                   x-model="form.email"
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/20"
                            />
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Subjek / Perihal</label>
                        <input type="text"
                               placeholder="Contoh: Pertanyaan seputar jadwal sidi..."
                               x-model="form.subject"
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/20"
                        />
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Pesan / Laporan Anda (Wajib)</label>
                        <textarea rows="5"
                                  required
                                  placeholder="Tuliskan isi pesan, masukan, kritik membangun, atau pertanyaan Anda di sini..."
                                  x-model="form.message"
                                  class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/20"
                        ></textarea>
                    </div>

                    <button type="submit"
                            class="w-full py-3 bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-colors flex items-center justify-center space-x-2 cursor-pointer">
                        <i data-lucide="send" class="w-4 h-4"></i>
                        <span>Kirim Formulir Kontak</span>
                    </button>
                </form>

            </div>

        </div>

        <!-- FAQ collapsible accordion section -->
        <div class="max-w-4xl mx-auto space-y-6">
            <h3 class="text-sm font-bold text-slate-700 uppercase tracking-wider border-b border-slate-100 pb-2 text-center flex items-center justify-center space-x-2">
                <i data-lucide="help-circle" class="w-4.5 h-4.5 text-slate-400"></i>
                <span>Pertanyaan yang Sering Diajukan (FAQ)</span>
            </h3>

            <div class="space-y-4">
                <template x-for="(faq, idx) in faqs" :key="idx">
                    <div class="bg-white rounded-2xl border border-slate-150/80 shadow-sm overflow-hidden transition-all">
                        
                        <!-- Toggle Button -->
                        <button x-on:click="activeFaqIdx = (activeFaqIdx === idx ? null : idx)"
                                class="w-full px-6 py-4 text-left flex items-center justify-between text-blue-950 font-bold text-xs sm:text-sm cursor-pointer hover:bg-slate-50 transition-colors">
                            <span x-text="faq.q"></span>
                            <i data-lucide="chevron-down" 
                               class="w-4 h-4 text-slate-400 transition-transform duration-200"
                               :class="activeFaqIdx === idx ? 'rotate-180 text-blue-900' : ''"></i>
                        </button>

                        <!-- Answer body -->
                        <div x-show="activeFaqIdx === idx" 
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 transform scale-y-95 origin-top"
                             x-transition:enter-end="opacity-100 transform scale-y-100 origin-top"
                             class="px-6 pb-5 pt-1 text-xs text-slate-600 leading-relaxed font-light border-t border-slate-50"
                             x-cloak>
                            <p x-text="faq.a"></p>
                        </div>

                    </div>
                </template>
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
