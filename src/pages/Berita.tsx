import React, { useState } from 'react';
import { motion, AnimatePresence } from 'motion/react';
import { 
  BookOpen, FileText, Download, Calendar, User, 
  Send, CheckCircle2, ChevronRight, Eye, DollarSign,
  Heart, Bookmark, Clock, Share2, HelpCircle
} from 'lucide-react';
import { NewsItem } from '../types';

interface BeritaProps {
  initialSubTab?: string;
}

export default function Berita({ initialSubTab = 'berita' }: BeritaProps) {
  const [activeCategory, setActiveCategory] = useState<'berita' | 'warta' | 'renungan'>(
    initialSubTab === 'warta' ? 'warta' : initialSubTab === 'renungan' ? 'renungan' : 'berita'
  );
  
  // Reflection/Devotional State
  const [reflections, setReflections] = useState([
    { name: 'Sdr. David K.', date: 'Hari ini, 09:30 WIT', text: 'Sangat menguatkan! Kadang di tengah kesibukan kerja di Jayapura, kita lupa pentingnya berakar dalam Firman terlebih dahulu sebelum bertindak.' },
    { name: 'Ibu Ester W.', date: 'Kemarin, 14:15 WIT', text: 'Renungan yang sangat indah tentang pentingnya berbuah lebat bagi kemuliaan Bapa di Surga. Mengingatkan tugas kita mendidik anak Sekolah Minggu.' }
  ]);
  const [newReflection, setNewReflection] = useState({ name: '', text: '' });
  const [reflectionSubmitted, setReflectionSubmitted] = useState(false);

  // Bulletin details modal trigger
  const [activeBulletinId, setActiveBulletinId] = useState<string | null>(null);

  const newsData: NewsItem[] = [
    {
      id: 'news-1',
      title: 'Aksi Kasih Diakonia GBY Entrop Membantu Korban Kebakaran Pasar Sentral',
      category: 'berita',
      date: '10 Juli 2026',
      author: 'Markus Pigome (Komisi Humas)',
      excerpt: 'Pemberian santunan sembako, pakaian layak pakai, and bantuan dana darurat dari persembahan kasih jemaat untuk keluarga korban kebakaran.',
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
      content: 'ENTROP - Dalam rangka menyongsong Hari Ulang Tahun ke-39 berdirinya Gereja Baptis Yohanes Entrop, BPH Jemaat bersama Majelis Penasihat mengadakan rapat perdana pembentukan panitia pelaksana. HUT tahun ini akan mengusung tema "Sehati Berakar dan Melayani Bagi Papua". Selain ibadah syukur bersama, HUT kali ini juga dirangkaikan dengan peneguhan Sidi baru serta Sakramen Baptisan Kudus massal. Bagi pemuda/remaja atau jemaat dewasa yang belum mengikuti sidi, pendaftaran kelas katekisasi resmi dibuka mulai minggu ini di ruang sekretariat gereja.',
      image: 'https://picsum.photos/seed/meeting/800/450'
    },
    {
      id: 'news-3',
      title: 'Undangan Ibadah Raya Gabungan Pemuda Baptis se-Jayapura di Aula Entrop',
      category: 'berita',
      date: '28 Juni 2026',
      author: 'David Kogoya (Ketua Pemuda)',
      excerpt: 'GBY Entrop dipercayakan menjadi tuan rumah Ibadah Gabungan Pemuda-Pemudi Baptis Triwulan se-Kota Jayapura.',
      content: 'JAYAPURA - Syalom pemuda-pemudi kekasih Kristus! Komisi Pemuda GBY Entrop mengundang dengan hangat seluruh rekan-rekan Pemuda dan Remaja Baptis dari berbagai pos PI dan gereja cabang se-Kota Jayapura untuk menghadiri Ibadah Raya Gabungan Triwulan. Ibadah gabungan ini akan diisi dengan puji-pujian bertema kontemporer, kesaksian pujian dari masing-masing gereja, serta pembicara spesial Pdt. Dr. Simon Tabuni yang akan membawakan firman bertema "Generasi Millennial Papua yang Bersinar di dalam Kristus". Ibadah akan ditutup dengan makan malam fellowship bersama.',
      image: 'https://picsum.photos/seed/youth/800/450'
    }
  ];

  const bulletins = [
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
        pengkhotbah: 'Ev. Markus Pigome',
        worshipLeader: 'Sdri. Sarah Wanma',
        singers: 'Sdr. Nathan, Sdr. Jhon, Sdri. Maria',
        soundman: 'Sdr. Albert K.'
      }
    }
  ];

  const handleReflectionSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!newReflection.name.trim() || !newReflection.text.trim()) return;
    
    const submitted = {
      name: newReflection.name,
      date: 'Hari ini, Baru saja',
      text: newReflection.text
    };
    
    setReflections([submitted, ...reflections]);
    setReflectionSubmitted(true);
    setNewReflection({ name: '', text: '' });
    
    setTimeout(() => {
      setReflectionSubmitted(false);
    }, 4000);
  };

  return (
    <div className="font-sans min-h-screen bg-slate-50 py-12 lg:py-16">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center space-y-3 mb-10">
          <span className="text-amber-700 font-bold text-xs uppercase tracking-wider">Sumber Informasi & Pertumbuhan Iman</span>
          <h1 className="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
            Berita, Warta & Renungan
          </h1>
          <p className="text-sm text-slate-500 max-w-xl mx-auto font-light">
            Ikuti warta mingguan terupdate, dokumentasi berita pelayanan, serta siraman rohani renungan harian GBY Entrop.
          </p>
        </div>

        {/* Category switcher */}
        <div className="flex justify-center border-b border-slate-200 mb-8 max-w-md mx-auto">
          {[
            { key: 'berita', label: 'Berita Terbaru', icon: <Calendar className="w-4 h-4" /> },
            { key: 'warta', label: 'Warta Jemaat', icon: <FileText className="w-4 h-4" /> },
            { key: 'renungan', label: 'Renungan Harian', icon: <BookOpen className="w-4 h-4" /> },
          ].map((cat) => (
            <button
              key={cat.key}
              id={`news-category-btn-${cat.key}`}
              onClick={() => setActiveCategory(cat.key as any)}
              className={`flex items-center space-x-1.5 px-4 py-3 text-xs font-bold uppercase tracking-wider border-b-2 transition-all cursor-pointer
                ${activeCategory === cat.key
                  ? 'border-blue-900 text-blue-950 font-extrabold'
                  : 'border-transparent text-slate-400 hover:text-slate-600'
                }`}
            >
              {cat.icon}
              <span>{cat.label}</span>
            </button>
          ))}
        </div>

        {/* Main Sections Content switching */}
        <div className="max-w-4xl mx-auto">
          
          {/* 1. BERITA UTAMA SECTION */}
          {activeCategory === 'berita' && (
            <div className="space-y-8 animate-fade-in">
              {newsData.map((news) => (
                <motion.article 
                  key={news.id}
                  initial={{ opacity: 0, y: 10 }}
                  animate={{ opacity: 1, y: 0 }}
                  className="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden grid grid-cols-1 md:grid-cols-12 gap-6 p-4 sm:p-6"
                >
                  <div className="md:col-span-4 rounded-2xl overflow-hidden bg-slate-100 h-48 md:h-full relative">
                    <img 
                      src={news.image} 
                      alt={news.title} 
                      className="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                      referrerPolicy="no-referrer"
                    />
                  </div>
                  <div className="md:col-span-8 flex flex-col justify-between py-2">
                    <div className="space-y-3">
                      <div className="flex items-center space-x-3 text-[10px] text-slate-400 font-semibold uppercase">
                        <span className="flex items-center space-x-1">
                          <Calendar className="w-3.5 h-3.5" />
                          <span>{news.date}</span>
                        </span>
                        <span>&bull;</span>
                        <span className="flex items-center space-x-1">
                          <User className="w-3.5 h-3.5" />
                          <span>{news.author}</span>
                        </span>
                      </div>
                      
                      <h3 className="text-base sm:text-lg font-bold font-display text-blue-950 leading-snug">
                        {news.title}
                      </h3>
                      <p className="text-xs text-slate-500 font-light leading-relaxed">
                        {news.content}
                      </p>
                    </div>
                  </div>
                </motion.article>
              ))}
            </div>
          )}

          {/* 2. WARTA JEMAAT SECTION */}
          {activeCategory === 'warta' && (
            <div className="space-y-6 animate-fade-in">
              <div className="bg-blue-50 p-5 rounded-2xl border border-blue-100 mb-4 text-xs font-light text-blue-950 flex items-start space-x-3">
                <FileText className="w-5 h-5 text-blue-900 shrink-0 mt-0.5" />
                <div>
                  <span className="font-bold block">Digitalisasi Warta Jemaat:</span>
                  <span>Setiap hari Minggu pagi, BPH mengupload file lembaran Warta Jemaat resmi di sini. Jemaat dapat mengunduh atau mengkliknya untuk melihat ringkasan keuangan mingguan serta petugas liturgi ibadah selanjutnya.</span>
                </div>
              </div>

              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                {bulletins.map((bulletin) => {
                  const isExpanded = activeBulletinId === bulletin.id;
                  return (
                    <motion.div
                      key={bulletin.id}
                      initial={{ opacity: 0, scale: 0.98 }}
                      animate={{ opacity: 1, scale: 1 }}
                      className="bg-white rounded-2xl border border-slate-150/80 shadow-sm p-6 space-y-4 hover:shadow-md transition-shadow relative overflow-hidden"
                    >
                      <div className="flex items-start justify-between">
                        <div className="space-y-1">
                          <span className="bg-blue-50 text-blue-900 text-[9px] font-bold px-2 py-0.5 rounded-md uppercase">
                            BULLETIN RESMI
                          </span>
                          <h3 className="text-sm font-bold font-display text-blue-950 mt-1">{bulletin.title}</h3>
                          <p className="text-[10px] text-slate-400">Dirilis pada: {bulletin.date} &bull; {bulletin.size}</p>
                        </div>
                        <div className="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center border border-slate-100">
                          <FileText className="w-5 h-5 text-slate-500" />
                        </div>
                      </div>

                      <div className="flex flex-wrap gap-2 pt-2 border-t border-slate-50">
                        <button
                          id={`view-warta-btn-${bulletin.id}`}
                          onClick={() => setActiveBulletinId(isExpanded ? null : bulletin.id)}
                          className="px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-950 font-bold text-[10px] uppercase tracking-wider rounded-lg flex items-center space-x-1 transition-colors cursor-pointer"
                        >
                          <Eye className="w-3.5 h-3.5" />
                          <span>{isExpanded ? 'Tutup Rincian' : 'Lihat Warta'}</span>
                        </button>
                        <a
                          id={`dl-warta-btn-${bulletin.id}`}
                          href="#download"
                          onClick={(e) => { e.preventDefault(); alert(`Mengunduh file PDF: ${bulletin.title}.pdf (Mock)`); }}
                          className="px-3 py-1.5 bg-slate-50 hover:bg-slate-100 text-slate-600 border border-slate-200 font-bold text-[10px] uppercase tracking-wider rounded-lg flex items-center space-x-1 transition-colors"
                        >
                          <Download className="w-3.5 h-3.5" />
                          <span>Download PDF</span>
                        </a>
                      </div>

                      {/* Expanded interactive bulletin content */}
                      <AnimatePresence>
                        {isExpanded && (
                          <motion.div
                            initial={{ opacity: 0, height: 0 }}
                            animate={{ opacity: 1, height: 'auto' }}
                            exit={{ opacity: 0, height: 0 }}
                            className="pt-4 border-t border-slate-100 space-y-4 text-xs text-slate-600 leading-relaxed font-light overflow-hidden"
                          >
                            {/* Pokok doa */}
                            <div>
                              <h4 className="font-bold text-blue-950 text-[11px] mb-1.5 uppercase tracking-wide">1. Pokok Syafaat Minggu Ini</h4>
                              <ul className="space-y-1 pl-4 list-decimal">
                                {bulletin.pokokDoa.map((doa, i) => (
                                  <li key={i}>{doa}</li>
                                ))}
                              </ul>
                            </div>

                            {/* Keuangan */}
                            <div>
                              <h4 className="font-bold text-blue-950 text-[11px] mb-1.5 uppercase tracking-wide flex items-center space-x-1">
                                <DollarSign className="w-3.5 h-3.5 text-emerald-600" />
                                <span>2. Kas Keuangan Jemaat</span>
                              </h4>
                              <div className="bg-slate-50 p-3 rounded-xl border border-slate-100 space-y-1">
                                <div className="flex justify-between">
                                  <span>Total Pemasukan:</span>
                                  <span className="font-semibold text-emerald-700">{bulletin.keuangan.pemasukan}</span>
                                </div>
                                <div className="flex justify-between text-rose-700">
                                  <span>Total Pengeluaran:</span>
                                  <span>{bulletin.keuangan.pengeluaran}</span>
                                </div>
                                <div className="flex justify-between border-t border-slate-200/60 pt-1 font-bold text-blue-950">
                                  <span>Sisa Kas Bersih:</span>
                                  <span>{bulletin.keuangan.saldo}</span>
                                </div>
                              </div>
                            </div>

                            {/* Petugas Liturgi */}
                            <div>
                              <h4 className="font-bold text-blue-950 text-[11px] mb-1.5 uppercase tracking-wide">3. Petugas Kebaktian Minggu Depan</h4>
                              <div className="grid grid-cols-2 gap-2 text-[11px]">
                                <div>
                                  <span className="text-slate-400 block">Pengkhotbah:</span>
                                  <span className="font-medium text-slate-800">{bulletin.petugasMingguDepan.pengkhotbah}</span>
                                </div>
                                <div>
                                  <span className="text-slate-400 block">Worship Leader:</span>
                                  <span className="font-medium text-slate-800">{bulletin.petugasMingguDepan.worshipLeader}</span>
                                </div>
                                <div className="col-span-2">
                                  <span className="text-slate-400 block">Penyanyi Latar (Singers):</span>
                                  <span className="font-medium text-slate-800">{bulletin.petugasMingguDepan.singers}</span>
                                </div>
                              </div>
                            </div>
                          </motion.div>
                        )}
                      </AnimatePresence>
                    </motion.div>
                  );
                })}
              </div>
            </div>
          )}

          {/* 3. RENUNGAN HARIAN SECTION */}
          {activeCategory === 'renungan' && (
            <div className="space-y-8 animate-fade-in">
              <motion.article 
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                className="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 sm:p-8 space-y-5"
              >
                {/* Devotional Meta */}
                <div className="flex items-center space-x-3 text-[10px] text-slate-400 font-semibold uppercase border-b border-slate-100 pb-3">
                  <span className="flex items-center space-x-1 bg-amber-50 text-amber-700 px-2 py-0.5 rounded-md font-bold">
                    RENUNGAN HARI INI
                  </span>
                  <span>&bull;</span>
                  <span className="flex items-center space-x-1">
                    <Calendar className="w-3.5 h-3.5" />
                    <span>12 Juli 2026</span>
                  </span>
                  <span>&bull;</span>
                  <span className="flex items-center space-x-1">
                    <User className="w-3.5 h-3.5" />
                    <span>Pdt. Yohanes Kogoya, M.Th.</span>
                  </span>
                </div>

                {/* Devotional content */}
                <div className="space-y-4">
                  <h2 className="text-xl sm:text-2xl font-bold font-display text-blue-950">
                    Berakar dalam Firman, Berbuah lebat dalam Kasih
                  </h2>
                  <div className="text-xs text-blue-900 font-bold italic bg-blue-50/50 px-4 py-2.5 rounded-xl border-l-4 border-blue-900">
                    "Kamu telah menerima Kristus Yesus, Tuhan kita. Karena itu hendaklah hidupmu tetap di dalam Dia. Hendaklah kamu berakar di dalam Dia dan dibangun di atas Dia, hendaklah kamu bertambah teguh dalam iman yang telah diajarkan kepadamu, dan hendaklah hatimu melimpah dengan syukur." (Kolose 2:6-7)
                  </div>
                  
                  <div className="text-xs sm:text-sm text-slate-600 leading-relaxed space-y-4 font-light">
                    <p>
                      Syalom bapak, ibu, dan pemuda kekasih Kristus. Di tengah gemerlap dan kesibukan kota Jayapura, khususnya di wilayah Entrop yang padat dengan geliat ekonomi, sangatlah mudah bagi kita sebagai manusia untuk terdistraksi dan hanyut dalam rutinitas harian. Kita bekerja keras, mendidik anak, melayani di masyarakat, namun adakalanya jiwa kita terasa kering, lelah, dan hampa. Mengapa hal ini bisa terjadi?
                    </p>
                    <p>
                      Rasul Paulus dalam suratnya kepada jemaat di Kolose memberikan wejangan berharga mengenai rahasia hidup kristiani yang berkemenangan: yaitu <strong>tetap berakar dan dibangun di dalam Kristus Yesus</strong>. Ibarat sebatang pohon noken atau kelapa di tepi pantai Jayapura, kekuatannya menghadapi hantaman badai angin laut tidak ditentukan oleh rindang daunnya, melainkan oleh seberapa dalam akar-akarnya menembus tanah untuk menyerap sumber air kehidupan.
                    </p>
                    <p>
                      Ketika iman kita tidak berakar kuat di dalam kebenaran Firman Tuhan, maka ketika badai pergumulan hidup — baik itu masalah finansial, krisis kesehatan, maupun keretakan rumah tangga — melanda, kita akan mudah goyah, putus asa, dan terjatuh. Namun sebaliknya, jiwa yang setia merenungkan Firman Tuhan setiap pagi akan dipenuhi ketenangan surgawi. Hatinyapun melimpah dengan ucapan syukur sejati dalam kondisi apa pun. Mari hari ini kita berkomitmen meluangkan waktu bersaat teduh mendalami Alkitab, agar hidup kita berakar kuat and menghasilkan buah kasih sejati bagi kemuliaan Bapa di surga. Amin.
                    </p>
                  </div>
                </div>

                <div className="flex items-center justify-between border-t border-slate-100 pt-4 text-xs text-slate-400 font-light">
                  <span className="flex items-center space-x-1">
                    <Heart className="w-4 h-4 text-rose-500 fill-rose-500" />
                    <span>Disukai oleh 45 Jemaat</span>
                  </span>
                  <span>Bacaan: Kolose 2:1-15</span>
                </div>
              </motion.article>

              {/* Dynamic Interactive Comments & Reflections Feed */}
              <div className="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 sm:p-8 space-y-6">
                <h3 className="text-sm font-bold text-slate-700 uppercase tracking-wider border-b border-slate-50 pb-2">
                  Kolom Refleksi & Respon Jemaat ({reflections.length})
                </h3>

                {/* Submit Form */}
                {reflectionSubmitted ? (
                  <motion.div 
                    initial={{ opacity: 0, scale: 0.95 }}
                    animate={{ opacity: 1, scale: 1 }}
                    className="p-4 bg-emerald-50 rounded-2xl border border-emerald-100 text-center text-xs font-semibold text-emerald-800 flex items-center justify-center space-x-2"
                  >
                    <CheckCircle2 className="w-4 h-4 text-emerald-600" />
                    <span>Refleksi Anda berhasil diposting di bawah! Terima kasih telah berbagi berkat rohani.</span>
                  </motion.div>
                ) : (
                  <form onSubmit={handleReflectionSubmit} className="space-y-4 bg-slate-50 p-4 sm:p-5 rounded-2xl border border-slate-100">
                    <span className="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Bagikan Refleksi Anda</span>
                    <div className="grid grid-cols-1 sm:grid-cols-3 gap-3">
                      <div className="sm:col-span-1">
                        <input
                          id="comment-name-input"
                          type="text"
                          required
                          placeholder="Nama Anda"
                          value={newReflection.name}
                          onChange={(e) => setNewReflection({ ...newReflection, name: e.target.value })}
                          className="w-full px-3.5 py-2 rounded-xl bg-white border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/10 focus:border-blue-900 transition-colors"
                        />
                      </div>
                      <div className="sm:col-span-2">
                        <input
                          id="comment-text-input"
                          type="text"
                          required
                          placeholder="Tulis respon / refleksi singkat Anda..."
                          value={newReflection.text}
                          onChange={(e) => setNewReflection({ ...newReflection, text: e.target.value })}
                          className="w-full px-3.5 py-2 rounded-xl bg-white border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/10 focus:border-blue-900 transition-colors"
                        />
                      </div>
                    </div>
                    <div className="flex justify-end">
                      <button
                        id="submit-reflection-btn"
                        type="submit"
                        className="px-4 py-2 bg-blue-900 hover:bg-blue-950 text-white font-bold text-[10px] uppercase tracking-wider rounded-xl transition-colors flex items-center space-x-1.5 cursor-pointer"
                      >
                        <Send className="w-3 h-3" />
                        <span>Kirim Respon</span>
                      </button>
                    </div>
                  </form>
                )}

                {/* Reflections Feed */}
                <div className="space-y-4">
                  {reflections.map((ref, i) => (
                    <div key={i} className="flex items-start space-x-3 text-xs border-b border-slate-50 pb-3.5 last:border-none last:pb-0">
                      <div className="w-8 h-8 rounded-full bg-blue-50 text-blue-900 font-bold flex items-center justify-center border border-blue-100 uppercase shrink-0 text-[10px]">
                        {ref.name.substring(0, 2)}
                      </div>
                      <div className="space-y-1">
                        <div className="flex items-center space-x-2">
                          <span className="font-bold text-slate-800">{ref.name}</span>
                          <span className="text-[9px] text-slate-400 font-light">{ref.date}</span>
                        </div>
                        <p className="text-slate-500 font-light leading-relaxed">{ref.text}</p>
                      </div>
                    </div>
                  ))}
                </div>

              </div>
            </div>
          )}

        </div>
      </div>
    </div>
  );
}
