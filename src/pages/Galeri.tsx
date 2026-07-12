import React, { useState } from 'react';
import { motion, AnimatePresence } from 'motion/react';
import { 
  Image as ImageIcon, Video as VideoIcon, Play, X, 
  Eye, Calendar, MapPin, Sparkles, AlertCircle 
} from 'lucide-react';
import { GalleryItem } from '../types';

export default function Galeri() {
  const [activeTab, setActiveTab] = useState<'foto' | 'video'>('foto');
  const [lightboxIndex, setLightboxIndex] = useState<number | null>(null);
  const [activeVideoUrl, setActiveVideoUrl] = useState<string | null>(null);

  const galleryItems: GalleryItem[] = [
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
      url: 'https://www.youtube.com/embed/dQw4w9WgXcQ' // Mock youtube URL
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
      title: 'Klip Persembahan Pujian Koor Pemuda Kristen "Satu Tubuh di dalam Kasih"',
      description: 'Vokal grup gabungan Pemuda dan Remaja GBY Entrop dalam ibadah syukuran pemuda triwulan se-Jayapura.',
      category: 'Musik',
      thumbnail: 'https://picsum.photos/seed/v3/800/450',
      url: 'https://www.youtube.com/embed/dQw4w9WgXcQ'
    }
  ];

  const photosOnly = galleryItems.filter(item => item.type === 'foto');
  const videosOnly = galleryItems.filter(item => item.type === 'video');

  const openLightbox = (index: number) => {
    setLightboxIndex(index);
  };

  const closeLightbox = () => {
    setLightboxIndex(null);
  };

  const nextPhoto = (e: React.MouseEvent) => {
    e.stopPropagation();
    if (lightboxIndex !== null) {
      setLightboxIndex((lightboxIndex + 1) % photosOnly.length);
    }
  };

  const prevPhoto = (e: React.MouseEvent) => {
    e.stopPropagation();
    if (lightboxIndex !== null) {
      setLightboxIndex((lightboxIndex - 1 + photosOnly.length) % photosOnly.length);
    }
  };

  return (
    <div className="font-sans min-h-screen bg-slate-50 py-12 lg:py-16">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center space-y-3 mb-10">
          <span className="text-amber-700 font-bold text-xs uppercase tracking-wider">Galeri Visual Jemaat</span>
          <h1 className="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
            Dokumentasi Foto & Video
          </h1>
          <p className="text-sm text-slate-500 max-w-xl mx-auto font-light">
            Saksikan rangkuman sukacita, persekutuan, aksi sosial, dan pelayanan ibadah jemaat GBY Entrop melalui lensa visual.
          </p>
        </div>

        {/* Gallery Type Switcher */}
        <div className="flex justify-center border-b border-slate-200 mb-10 max-w-xs mx-auto">
          {[
            { key: 'foto', label: 'Foto Kegiatan', icon: <ImageIcon className="w-4 h-4" /> },
            { key: 'video', label: 'Video Ibadah', icon: <VideoIcon className="w-4 h-4" /> },
          ].map((tab) => (
            <button
              key={tab.key}
              id={`gallery-tab-btn-${tab.key}`}
              onClick={() => {
                setActiveTab(tab.key as any);
                closeLightbox();
                setActiveVideoUrl(null);
              }}
              className={`flex-1 flex items-center justify-center space-x-1.5 py-3 text-xs font-bold uppercase tracking-wider border-b-2 transition-all cursor-pointer
                ${activeTab === tab.key
                  ? 'border-blue-900 text-blue-950 font-extrabold'
                  : 'border-transparent text-slate-400 hover:text-slate-600'
                }`}
            >
              {tab.icon}
              <span>{tab.label}</span>
            </button>
          ))}
        </div>

        {/* Dynamic Media Grids */}
        <div>
          {activeTab === 'foto' ? (
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
              {photosOnly.map((photo, index) => (
                <motion.div
                  key={photo.id}
                  initial={{ opacity: 0, y: 15 }}
                  animate={{ opacity: 1, y: 0 }}
                  transition={{ delay: index * 0.05 }}
                  onClick={() => openLightbox(index)}
                  className="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden cursor-pointer group hover:shadow-md transition-shadow"
                >
                  <div className="h-56 overflow-hidden relative">
                    <img 
                      src={photo.thumbnail} 
                      alt={photo.title} 
                      className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                      referrerPolicy="no-referrer"
                    />
                    <div className="absolute inset-0 bg-blue-950/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                      <div className="w-10 h-10 rounded-full bg-white/90 backdrop-blur-sm flex items-center justify-center text-blue-950 shadow-md">
                        <Eye className="w-5 h-5" />
                      </div>
                    </div>
                    <span className="absolute top-3 left-3 bg-white/95 backdrop-blur-sm text-slate-700 text-[9px] font-bold px-2 py-0.5 rounded-md uppercase tracking-wider shadow-sm">
                      {photo.category}
                    </span>
                  </div>
                  <div className="p-5 space-y-1.5">
                    <h3 className="text-xs sm:text-sm font-bold font-display text-blue-950 line-clamp-1">
                      {photo.title}
                    </h3>
                    <p className="text-[11px] text-slate-400 line-clamp-2 font-light leading-relaxed">
                      {photo.description}
                    </p>
                  </div>
                </motion.div>
              ))}
            </div>
          ) : (
            <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
              {videosOnly.map((vid, idx) => (
                <motion.div
                  key={vid.id}
                  initial={{ opacity: 0, y: 15 }}
                  animate={{ opacity: 1, y: 0 }}
                  transition={{ delay: idx * 0.05 }}
                  className="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"
                >
                  <div className="h-48 overflow-hidden relative bg-slate-900 flex items-center justify-center group">
                    <img 
                      src={vid.thumbnail} 
                      alt={vid.title} 
                      className="w-full h-full object-cover opacity-85 transition-transform duration-300 group-hover:scale-105"
                      referrerPolicy="no-referrer"
                    />
                    <button
                      id={`play-vid-btn-${idx}`}
                      onClick={() => setActiveVideoUrl(vid.url || null)}
                      className="absolute w-12 h-12 rounded-full bg-amber-500 hover:bg-amber-600 text-blue-950 flex items-center justify-center shadow-lg transition-transform duration-200 group-hover:scale-110 cursor-pointer"
                    >
                      <Play className="w-5 h-5 fill-blue-950 ml-0.5" />
                    </button>
                    <span className="absolute bottom-3 right-3 bg-slate-950/80 backdrop-blur-sm text-white text-[9px] font-medium px-2 py-0.5 rounded-md">
                      {vid.category}
                    </span>
                  </div>
                  <div className="p-5 space-y-1.5">
                    <h3 className="text-xs sm:text-sm font-bold font-display text-blue-950 line-clamp-1">
                      {vid.title}
                    </h3>
                    <p className="text-[11px] text-slate-500 line-clamp-2 font-light leading-relaxed">
                      {vid.description}
                    </p>
                  </div>
                </motion.div>
              ))}
            </div>
          )}
        </div>

        {/* Dynamic Lightbox Modal for Photos */}
        <AnimatePresence>
          {lightboxIndex !== null && (
            <motion.div
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              exit={{ opacity: 0 }}
              className="fixed inset-0 z-50 bg-slate-950/95 backdrop-blur-md flex flex-col items-center justify-center p-4 sm:p-8"
              onClick={closeLightbox}
            >
              {/* Close Button */}
              <button
                id="close-lightbox-btn"
                onClick={closeLightbox}
                className="absolute top-6 right-6 p-2 rounded-full bg-white/10 hover:bg-white/20 text-white cursor-pointer transition-colors focus:outline-none"
              >
                <X className="w-6 h-6" />
              </button>

              {/* Main image content container */}
              <div className="relative max-w-4xl w-full flex flex-col items-center justify-center space-y-4" onClick={(e) => e.stopPropagation()}>
                <img
                  src={photosOnly[lightboxIndex].thumbnail}
                  alt={photosOnly[lightboxIndex].title}
                  className="max-h-[70vh] rounded-xl object-contain border border-white/10 shadow-2xl"
                  referrerPolicy="no-referrer"
                />

                {/* Info Overlay */}
                <div className="bg-white/10 backdrop-blur-md p-4 sm:p-5 rounded-2xl border border-white/10 text-white text-center w-full">
                  <span className="bg-amber-500 text-blue-950 text-[9px] font-bold px-2 py-0.5 rounded-md uppercase tracking-wider inline-block mb-1.5">
                    {photosOnly[lightboxIndex].category}
                  </span>
                  <h3 className="text-sm sm:text-base font-bold font-display leading-tight">
                    {photosOnly[lightboxIndex].title}
                  </h3>
                  <p className="text-xs text-slate-300 font-light mt-1.5 leading-relaxed max-w-2xl mx-auto">
                    {photosOnly[lightboxIndex].description}
                  </p>
                </div>

                {/* Left & Right navigation buttons */}
                <button
                  id="prev-photo-btn"
                  onClick={prevPhoto}
                  className="absolute left-2 sm:-left-12 top-1/2 transform -translate-y-1/2 p-2 bg-white/10 hover:bg-white/20 rounded-full text-white cursor-pointer transition-colors focus:outline-none"
                >
                  <span className="sr-only">Sebelumnya</span>
                  &laquo;
                </button>
                <button
                  id="next-photo-btn"
                  onClick={nextPhoto}
                  className="absolute right-2 sm:-right-12 top-1/2 transform -translate-y-1/2 p-2 bg-white/10 hover:bg-white/20 rounded-full text-white cursor-pointer transition-colors focus:outline-none"
                >
                  <span className="sr-only">Selanjutnya</span>
                  &raquo;
                </button>
              </div>
            </motion.div>
          )}
        </AnimatePresence>

        {/* Dynamic Simulated Video Streaming Player */}
        <AnimatePresence>
          {activeVideoUrl && (
            <motion.div
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              exit={{ opacity: 0 }}
              className="fixed inset-0 z-50 bg-slate-950/90 backdrop-blur-md flex items-center justify-center p-4 sm:p-8"
              onClick={() => setActiveVideoUrl(null)}
            >
              <div className="bg-white rounded-3xl overflow-hidden shadow-2xl border border-slate-100 max-w-3xl w-full" onClick={(e) => e.stopPropagation()}>
                <div className="bg-blue-950 p-4 flex items-center justify-between text-white">
                  <span className="text-xs font-bold uppercase tracking-wider text-amber-400">Putar Video Khotbah / Dokumenter</span>
                  <button
                    id="close-video-btn"
                    onClick={() => setActiveVideoUrl(null)}
                    className="p-1 rounded-full bg-white/10 hover:bg-white/20 text-white cursor-pointer transition-colors"
                  >
                    <X className="w-5 h-5" />
                  </button>
                </div>
                
                {/* Embedded Video Mock */}
                <div className="aspect-video bg-black flex flex-col items-center justify-center text-slate-400 relative p-6 text-center space-y-4">
                  <div className="w-16 h-16 rounded-full bg-white/10 border border-white/20 flex items-center justify-center">
                    <Play className="w-6 h-6 text-amber-500 animate-pulse" />
                  </div>
                  <div className="space-y-1">
                    <p className="text-white font-bold text-sm">Streaming Ibadah GBY Entrop (Mock Player)</p>
                    <p className="text-xs font-light max-w-sm mx-auto text-slate-400">Menghubungkan ke server CDN gereja... Klik Tutup untuk kembali melihat galeri video lainnya.</p>
                  </div>
                  <button
                    id="close-player-btn"
                    onClick={() => setActiveVideoUrl(null)}
                    className="px-4 py-2 bg-amber-500 text-blue-950 font-bold text-xs rounded-xl hover:bg-amber-600 transition-colors cursor-pointer"
                  >
                    Kembali ke Galeri
                  </button>
                </div>
              </div>
            </motion.div>
          )}
        </AnimatePresence>

      </div>
    </div>
  );
}
