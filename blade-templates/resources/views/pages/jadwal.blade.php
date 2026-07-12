@extends('layouts.app')

@section('title', 'Jadwal - Gereja Baptis Yohanes Entrop')

@section('content')
<div class="font-sans min-h-screen bg-slate-50 py-12 lg:py-16"
     x-data="{
        selectedFilter: new URLSearchParams(window.location.search).get('sub') 
            ? (new URLSearchParams(window.location.search).get('sub') === 'jadwal-ibadah' ? 'ibadah' : new URLSearchParams(window.location.search).get('sub'))
            : 'all',
        toastMessage: null,

        schedules: [
            {
                day: 'Minggu',
                time: '09:00 - 11:30 WIT',
                name: 'Ibadah Raya Utama (Kebaktian Utama)',
                location: 'Gedung Utama (Lantai 1 & 2)',
                category: 'ibadah',
                description: 'Ibadah umum untuk seluruh anggota jemaat, persekutuan korporat dengan puji-pujian, penyembahan, dan pengkhotbah utama Gembala Sidang.'
            },
            {
                day: 'Minggu',
                time: '07:30 - 08:30 WIT',
                name: 'Sekolah Minggu Anak (Kelas Balita - Pratama)',
                location: 'Gedung Pembinaan Anak (Lantai 1)',
                category: 'sekolah-minggu',
                description: 'Ibadah dan pengajaran Alkitab interaktif bagi anak-anak usia 3-9 tahun, dibimbing oleh komisi guru Sekolah Minggu.'
            },
            {
                day: 'Minggu',
                time: '07:30 - 08:30 WIT',
                name: 'Sekolah Minggu Anak (Kelas Madya - Tunas)',
                location: 'Gedung Pembinaan Anak (Lantai 2)',
                category: 'sekolah-minggu',
                description: 'Ibadah, firman, dan games rohani seru untuk anak remaja prapemuda usia 10-14 tahun.'
            },
            {
                day: 'Sabtu',
                time: '17:00 - 19:00 WIT',
                name: 'Persekutuan Pemuda Antara (PPA)',
                location: 'Aula Pemuda GBY Entrop',
                category: 'pemuda',
                description: 'Kebaktian, puji-pujian, sharing kelompok (pemuridan), dan fellowship kreatif bagi pemuda/i usia mahasiswa hingga dewasa muda.'
            },
            {
                day: 'Sabtu',
                time: '15:30 - 17:00 WIT',
                name: 'Kebaktian Remaja Kristen GBY',
                location: 'Ruang Serbaguna Lantai 2',
                category: 'pemuda',
                description: 'Wadah persekutuan rohani seru khusus bagi siswa/i SMP dan SMA bertumbuh iman menghadapi tantangan studi dan pergaulan.'
            },
            {
                day: 'Selasa',
                time: '16:00 - 17:30 WIT',
                name: 'Ibadah Kaum Wanita (WBI)',
                location: 'Ruang Konsistori Utama',
                category: 'doa',
                description: 'Ibadah rutin, sharing iman, penelaahan Alkitab rumah tangga, dan doa syafaat bagi ibu-ibu jemaat.'
            },
            {
                day: 'Kamis',
                time: '19:00 - 20:30 WIT',
                name: 'Persekutuan Doa Syafaat Jemaat',
                location: 'Gedung Utama (Lantai 1)',
                category: 'doa',
                description: 'Kebaktian doa rutin pertengahan pekan. Jemaat berkumpul mendoakan pokok-pokok doa bangsa negara, gereja, misionaris, dan permohonan pribadi jemaat.'
            },
            {
                day: '12 November 2026',
                time: '16:00 WIT - Selesai',
                name: 'HUT GBY Entrop Ke-39 & Baptisan Massal',
                location: 'Kompleks GBY Entrop',
                category: 'kalender',
                description: 'Ibadah ucapan syukur ulang tahun gereja yang dirangkaikan dengan sakramen baptisan selam kudus jemaat baru.'
            },
            {
                day: '25 Desember 2026',
                time: '09:00 WIT',
                name: 'Ibadah Raya Natal Jemaat',
                location: 'Gedung Utama & Halaman Depan',
                category: 'kalender',
                description: 'Perayaan ibadah suci merayakan kelahiran Juruselamat Yesus Kristus, dilanjutkan dengan persekutuan kasih makan bersama seluruh jemaat.'
            },
            {
                day: '05 Februari 2026',
                time: '17:00 WIT',
                name: 'Peringatan Hari Pekabaran Injil (HPI) di Tanah Papua',
                location: 'Gedung Utama',
                category: 'kalender',
                description: 'Kebaktian khusus merefleksikan sejarah masuknya Injil keselamatan di Papua oleh Ottow dan Geissler, membakar semangat misi.'
            }
        ],

        get filteredSchedules() {
            if (this.selectedFilter === 'all') return this.schedules;
            return this.schedules.filter(s => s.category === this.selectedFilter);
        },

        getCategoryBadgeColor(cat) {
            switch (cat) {
                case 'ibadah': return 'bg-blue-100 text-blue-900 border-blue-200';
                case 'sekolah-minggu': return 'bg-emerald-100 text-emerald-900 border-emerald-200';
                case 'pemuda': return 'bg-indigo-100 text-indigo-900 border-indigo-200';
                case 'doa': return 'bg-amber-100 text-amber-900 border-amber-200';
                case 'kalender': return 'bg-rose-100 text-rose-900 border-rose-200';
                default: return 'bg-slate-100 text-slate-800 border-slate-200';
            }
        },

        getCategoryLeftBorder(cat) {
            switch (cat) {
                case 'ibadah': return 'bg-blue-900';
                case 'sekolah-minggu': return 'bg-emerald-600';
                case 'pemuda': return 'bg-indigo-600';
                case 'doa': return 'bg-amber-500';
                default: return 'bg-rose-500';
            }
        },

        getCategoryLabel(cat) {
            switch (cat) {
                case 'ibadah': return 'Ibadah Utama';
                case 'sekolah-minggu': return 'Sekolah Minggu';
                case 'pemuda': return 'Generasi Muda';
                case 'doa': return 'Syafaat & Persekutuan';
                default: return 'Hari Raya / Event';
            }
        },

        copySchedule(sched) {
            const text = `*JADWAL IBADAH GBY ENTROP*\n📌 Kegiatan: ${sched.name}\n📆 Hari/Tanggal: ${sched.day}\n⏰ Waktu: ${sched.time}\n📍 Lokasi: ${sched.location}\n\nTuhan Yesus Memberkati!`;
            navigator.clipboard.writeText(text);
            this.toastMessage = `Jadwal "${sched.name}" disalin ke clipboard!`;
            setTimeout(() => {
                this.toastMessage = null;
            }, 4000);
        }
     }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        
        <!-- Floating toast notification -->
        <div x-show="toastMessage" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-2 translate-x-2"
             x-transition:enter-end="opacity-100 transform translate-y-0 translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed bottom-6 right-6 z-50 bg-slate-900 text-white px-5 py-3 rounded-xl shadow-2xl flex items-center space-x-2.5 border border-slate-800 text-xs font-semibold"
             x-cloak>
            <i data-lucide="check-circle2" class="w-4 h-4 text-emerald-400"></i>
            <span x-text="toastMessage"></span>
        </div>

        <!-- Header -->
        <div class="text-center space-y-3 mb-10">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">Tertib & Teratur dalam Tuhan</span>
            <h1 class="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
                Jadwal Ibadah & Kegiatan
            </h1>
            <p class="text-sm text-slate-500 max-w-xl mx-auto font-light">
                Mari bersekutu dan melayani bersama dalam rangkaian jadwal peribadahan mingguan dan agenda tahunan GBY Entrop.
            </p>
        </div>

        <!-- Filter Chips -->
        <div class="flex flex-wrap justify-center gap-1.5 mb-10">
            <template x-for="tab in [
                { key: 'all', label: 'Semua Jadwal' },
                { key: 'ibadah', label: 'Ibadah Raya' },
                { key: 'sekolah-minggu', label: 'Sekolah Minggu' },
                { key: 'pemuda', label: 'Pemuda & Remaja' },
                { key: 'doa', label: 'Persekutuan Doa' },
                { key: 'kalender', label: 'Kalender Gerejawi' }
            ]" :key="tab.key">
                <button x-on:click="selectedFilter = tab.key; window.history.replaceState(null, '', '?sub=' + (tab.key === 'ibadah' ? 'jadwal-ibadah' : tab.key));"
                        class="px-4 py-2 text-xs font-bold rounded-xl transition-all duration-150 cursor-pointer"
                        :class="selectedFilter === tab.key
                            ? 'bg-blue-900 text-white shadow-md shadow-blue-900/10'
                            : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 hover:text-blue-950'">
                    <span x-text="tab.label"></span>
                </button>
            </template>
        </div>

        <!-- Schedule List Timeline -->
        <div class="max-w-3xl mx-auto space-y-6">
            <template x-if="filteredSchedules.length > 0">
                <div class="space-y-6">
                    <template x-for="(item, idx) in filteredSchedules" :key="idx">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8 hover:shadow-md transition-shadow relative overflow-hidden group">
                            
                            <!-- Accent side border based on category -->
                            <div class="absolute top-0 bottom-0 left-0 w-2" :class="getCategoryLeftBorder(item.category)"></div>

                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 pl-2">
                                <div class="space-y-3">
                                    <!-- Tags -->
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="bg-slate-100 text-slate-800 text-[10px] font-bold px-2 py-0.5 rounded-md uppercase" x-text="item.day"></span>
                                        <span class="text-[9px] font-bold px-2 py-0.5 rounded-md uppercase border" 
                                              :class="getCategoryBadgeColor(item.category)" 
                                              x-text="getCategoryLabel(item.category)">
                                        </span>
                                    </div>

                                    <h3 class="text-base sm:text-lg font-bold font-display text-blue-950 group-hover:text-blue-900 transition-colors" x-text="item.name"></h3>

                                    <!-- Metadata -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-500 font-light">
                                        <div class="flex items-center space-x-2">
                                            <i data-lucide="clock" class="w-4 h-4 text-slate-400 shrink-0"></i>
                                            <span x-text="item.time"></span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <i data-lucide="map-pin" class="w-4 h-4 text-slate-400 shrink-0"></i>
                                            <span class="truncate" x-text="item.location"></span>
                                        </div>
                                    </div>

                                    <p class="text-xs text-slate-500 leading-relaxed font-light border-t border-slate-50 pt-2.5" x-text="item.description"></p>
                                </div>

                                <!-- Actions (Clipboard Copy) -->
                                <div class="flex sm:flex-col gap-2 justify-end pt-3 sm:pt-0 shrink-0">
                                    <button x-on:click="copySchedule(item)"
                                            class="px-3 py-1.5 bg-slate-50 hover:bg-slate-100 border border-slate-200 rounded-lg text-[10px] font-bold text-slate-600 flex items-center justify-center space-x-1 cursor-pointer transition-colors"
                                            title="Salin rincian jadwal untuk dibagikan">
                                        <i data-lucide="copy" class="w-3.5 h-3.5"></i>
                                        <span>Salin Info</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </template>
                </div>
            </template>
            
            <template x-if="filteredSchedules.length === 0">
                <div class="text-center p-12 bg-white rounded-2xl border border-slate-100">
                    <i data-lucide="alert-circle" class="w-8 h-8 text-slate-400 mx-auto mb-2"></i>
                    <p class="text-xs text-slate-500 font-medium">Tidak ada jadwal yang cocok untuk filter ini.</p>
                </div>
            </template>
        </div>

        <!-- General Notes Card -->
        <div class="max-w-3xl mx-auto mt-8 bg-blue-50/50 p-5 rounded-2xl border border-blue-100 flex items-start space-x-3 text-xs leading-relaxed text-blue-900/90 font-light">
            <i data-lucide="bell" class="w-5 h-5 text-amber-500 shrink-0 mt-0.5 animate-bounce"></i>
            <div>
                <span class="font-bold block text-blue-950">Catatan Perubahan Jadwal:</span>
                <span>Perubahan jadwal ibadah situasional (misal: ibadah padang / gabungan sinode) akan diumumkan minimal seminggu sebelumnya melalui <strong>Warta Jemaat</strong> dan grup WhatsApp Sektor masing-masing. Silakan hubungi Sekretariat jika membutuhkan info khusus.</span>
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
