@extends('layouts.app')

@section('title', 'Galeri - Gereja Baptis Yohanes Entrop')

@section('content')
<div class="font-sans min-h-screen bg-slate-50 py-12 lg:py-16"
     x-data="{
        activeTab: new URLSearchParams(window.location.search).get('sub') || 'foto',
        lightboxIndex: null,
        activeVideoUrl: null,

        galleryItems: [
            {
                id: 'photo-1',
                type: 'foto',
                title: 'Pelaksanaan Sakramen Baptisan Selam Kudus di Pantai Hamadi',
                description: 'Peneguhan baptisan kudus bagi 15 jemaat baru yang dibaptis oleh Gembala Sidang di pesisir Pantai Hamadi, Jayapura.',
                category: 'Ibadah',
                thumbnail: 'https://picsum.photos/seed/bapt/800/600'
            },
            {
                id: 'photo-2',
                type: 'foto',
                title: 'Kebersamaan Kelas Sekolah Minggu Anak - Kelas Pratama',
                description: 'Anak-anak Sekolah Minggu berfoto bersama usai membawakan vokal grup pujian anak dalam perayaan HUT gereja.',
                category: 'Komisi Anak',
                thumbnail: 'https://picsum.photos/seed/kidsclass/800/600'
            },
            {
                id: 'photo-3',
                type: 'foto',
                title: 'Paduan Suara Komisi Wanita (WBI) GBY Entrop',
                description: 'Persembahan pujian syukur paduan suara Ibu-Ibu jemaat dalam perayaan kebaktian padang Sektor Entrop Atas.',
                category: 'Paduan Suara',
                thumbnail: 'https://picsum.photos/seed/choir/800/600'
            },
            {
                id: 'photo-4',
                type: 'foto',
                title: 'Aksi Bersih Lingkungan Pemuda Kristen Sektor Jayapura Selatan',
                description: 'Komisi Pemuda (PPA) bergotong royong bersama komunitas warga sekitar membersihkan parit dan selokan jalan raya.',
                category: 'Sosial',
                thumbnail: 'https://picsum.photos/seed/clean/800/600'
            },
            {
                id: 'photo-5',
                type: 'foto',
                title: 'Ibadah Kebaktian Padang di Cagar Alam Cycloop',
                description: 'Suasana persekutuan ibadah padang keluarga jemaat di bawah teduhnya pepohonan lereng gunung Cycloop, Sentani.',
                category: 'Kebaktian Padang',
                thumbnail: 'https://picsum.photos/seed/nature/800/600'
            },
            {
                id: 'photo-6',
                type: 'foto',
                title: 'Rapat Koordinasi BPH Jemaat & Majelis Penatua',
                description: 'BPH merancang agenda rencana kerja tahunan dan pengutusan pos PI baru di ruang rapat sekretariat gereja.',
                category: 'Administrasi',
                thumbnail: 'https://picsum.photos/seed/board/800/600'
            },
            // Videos
            {
                id: 'video-1',
                type: 'video',
                title: 'Dokumenter Perjalanan Pelayanan Misi 40 Tahun GBY Entrop',
                description: 'Rangkuman sejarah perjuangan para perintis mendirikan gereja di wilayah rawa Entrop Jayapura tahun 1981.',
                category: 'Dokumenter',
                thumbnail: 'https://picsum.photos/seed/v1/800/450',
                url: 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            },
            {
                id: 'video-2',
                type: 'video',
                title: 'Ibadah Raya Mingguan Live Streaming - Minggu, 12 Juli 2026',
                description: 'Siaran ulang rekaman utuh Kebaktian Utama GBY Entrop. Pengkhotbah: Pdt. Yohanes Kogoya, M.Th. Tema: Berakar Dalam Kristus.',
                category: 'Ibadah Raya',
                thumbnail: 'https://picsum.photos/seed/v2/800/450',
                url: 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            },
            {
                id: 'video-3',
                type: 'video',
                title: 'Klip Persembahan Pujian Koor Pemuda Kristen \'Satu Tubuh di dalam Kasih\'',
                description: 'Vokal grup gabungan Pemuda dan Remaja GBY Entrop dalam ibadah syukuran pemuda triwulan se-Jayapura.',
                category: 'Musik',
                thumbnail: 'https://picsum.photos/seed/v3/800/450',
                url: 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            }
        ],

        get photos() {
            return this.galleryItems.filter(item => item.type === 'foto');
        },

        get videos() {
            return this.galleryItems.filter(item => item.type === 'video');
        },

        nextPhoto() {
            if (this.lightboxIndex === null) return;
            this.lightboxIndex = (this.lightboxIndex + 1) % this.photos.length;
        },

        prevPhoto() {
            if (this.lightboxIndex === null) return;
            this.lightboxIndex = (this.lightboxIndex - 1 + this.photos.length) % this.photos.length;
        }
     }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center space-y-3 mb-10">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">Dokumentasi & Memori</span>
            <h1 class="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
                Galeri GBY Entrop
            </h1>
            <p class="text-sm text-slate-500 max-w-xl mx-auto font-light">
                Potret sukacita, persekutuan doa, perayaan sakramen kudus, and pelayanan penjangkauan jemaat kami di Jayapura.
            </p>
        </div>

        <!-- Filter Subtab -->
        <div class="flex justify-center border-b border-slate-200 mb-10">
            <div class="flex space-x-8">
                <button x-on:click="activeTab = 'foto'; window.history.replaceState(null, '', '?sub=foto'); $nextTick(() => lucide.createIcons());"
                        class="pb-4 text-sm font-bold border-b-2 transition-colors cursor-pointer focus:outline-none"
                        :class="activeTab === 'foto' ? 'border-blue-900 text-blue-950 font-bold' : 'border-transparent text-slate-500 hover:text-blue-950'">
                    <span>Foto Kegiatan</span>
                </button>
                <button x-on:click="activeTab = 'video'; window.history.replaceState(null, '', '?sub=video'); $nextTick(() => lucide.createIcons());"
                        class="pb-4 text-sm font-bold border-b-2 transition-colors cursor-pointer focus:outline-none"
                        :class="activeTab === 'video' ? 'border-blue-900 text-blue-950 font-bold' : 'border-transparent text-slate-500 hover:text-blue-950'">
                    <span>Video Ibadah & Dokumenter</span>
                </button>
            </div>
        </div>

        <!-- PHOTO CONTAINER -->
        <div x-show="activeTab === 'foto'" x-cloak>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <template x-for="(photo, idx) in photos" :key="photo.id">
                    <div x-on:click="lightboxIndex = idx"
                         class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-shadow cursor-pointer group">
                        <div class="relative h-56 overflow-hidden bg-slate-100">
                            <img :src="photo.thumbnail" alt="Thumbnail" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300" />
                            <div class="absolute inset-0 bg-slate-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="p-3 bg-white/95 rounded-full text-blue-950 shadow-md">
                                    <i data-lucide="eye" class="w-5 h-5"></i>
                                </span>
                            </div>
                        </div>
                        <div class="p-5 space-y-2">
                            <span class="bg-blue-100 text-blue-950 text-[9px] font-bold px-2 py-0.5 rounded uppercase" x-text="photo.category"></span>
                            <h3 class="text-sm font-bold text-blue-950 font-display leading-tight" x-text="photo.title"></h3>
                            <p class="text-[11px] text-slate-500 font-light truncate" x-text="photo.description"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- VIDEO CONTAINER -->
        <div x-show="activeTab === 'video'" x-cloak>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <template x-for="vid in videos" :key="vid.id">
                    <div x-on:click="activeVideoUrl = vid.url"
                         class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-shadow cursor-pointer group">
                        <div class="relative h-48 overflow-hidden bg-slate-100">
                            <img :src="vid.thumbnail" alt="Thumbnail" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300" />
                            <div class="absolute inset-0 bg-slate-950/40 flex items-center justify-center">
                                <span class="p-4 bg-amber-500 text-blue-950 rounded-full shadow-lg transform group-hover:scale-110 transition-transform">
                                    <i data-lucide="play" class="w-6 h-6 fill-blue-950 text-blue-950 ml-0.5"></i>
                                </span>
                            </div>
                        </div>
                        <div class="p-5 space-y-2">
                            <span class="bg-purple-100 text-purple-950 text-[9px] font-bold px-2 py-0.5 rounded uppercase" x-text="vid.category"></span>
                            <h3 class="text-sm font-bold text-blue-950 font-display leading-tight" x-text="vid.title"></h3>
                            <p class="text-[11px] text-slate-500 font-light leading-relaxed" x-text="vid.description"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- PHOTO LIGHTBOX MODAL -->
        <div x-show="lightboxIndex !== null" 
             class="fixed inset-0 bg-slate-950/95 backdrop-blur-sm z-50 flex flex-col justify-between p-4"
             x-cloak>
            
            <!-- Header bar -->
            <div class="flex items-center justify-between text-white p-4">
                <span class="text-xs font-semibold" x-text="lightboxIndex !== null ? (lightboxIndex + 1) + ' / ' + photos.length : ''"></span>
                <button x-on:click="lightboxIndex = null" 
                        class="p-2 bg-white/10 hover:bg-white/20 rounded-full text-white cursor-pointer transition-colors">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <!-- Image Stage -->
            <div class="flex items-center justify-between w-full h-full max-h-[70vh] relative">
                <!-- Prev Button -->
                <button x-on:click="prevPhoto()" 
                        class="absolute left-2 p-3 bg-white/10 hover:bg-white/20 text-white rounded-full cursor-pointer z-10 transition-colors">
                    <i data-lucide="chevron-left" class="w-6 h-6"></i>
                </button>

                <!-- Centered Photo -->
                <div class="w-full h-full flex items-center justify-center px-12">
                    <template x-if="lightboxIndex !== null">
                        <img :src="photos[lightboxIndex].thumbnail" alt="Full Image" class="max-w-full max-h-full object-contain rounded-xl shadow-2xl" />
                    </template>
                </div>

                <!-- Next Button -->
                <button x-on:click="nextPhoto()" 
                        class="absolute right-2 p-3 bg-white/10 hover:bg-white/20 text-white rounded-full cursor-pointer z-10 transition-colors">
                    <i data-lucide="chevron-right" class="w-6 h-6"></i>
                </button>
            </div>

            <!-- Footer Details -->
            <div class="text-center text-white max-w-xl mx-auto p-6 space-y-2">
                <template x-if="lightboxIndex !== null">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold font-display" x-text="photos[lightboxIndex].title"></h3>
                        <p class="text-xs text-slate-400 font-light leading-relaxed mt-1" x-text="photos[lightboxIndex].description"></p>
                    </div>
                </template>
            </div>
        </div>

        <!-- VIDEO PLAYER MODAL -->
        <div x-show="activeVideoUrl !== null" 
             class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-50 flex items-center justify-center p-4"
             x-cloak>
            <div x-show="activeVideoUrl !== null" 
                 x-on:click.away="activeVideoUrl = null"
                 class="bg-black rounded-3xl overflow-hidden max-w-4xl w-full shadow-2xl relative aspect-video border border-slate-850">
                <button x-on:click="activeVideoUrl = null" 
                        class="absolute top-4 right-4 p-2 bg-slate-900/80 hover:bg-slate-950/90 rounded-full text-white z-50 cursor-pointer transition-colors">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
                <template x-if="activeVideoUrl !== null">
                    <iframe :src="activeVideoUrl + '?autoplay=1'" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
