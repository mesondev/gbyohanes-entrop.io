import React, { useState } from 'react';
import { motion } from 'motion/react';
import { 
  Church, Calendar, HeartHandshake, ArrowRight, BookOpen, 
  Sparkles, CheckCircle2, Send, Users, ShieldAlert, Award
} from 'lucide-react';
import { ActiveTab } from '../types';

interface BerandaProps {
  onNavigate: (tab: ActiveTab, subTab?: string) => void;
}

const VERSE_LIST = [
  { text: "Janganlah hendaknya kamu kuatir tentang apapun juga, tetapi nyatakanlah dalam segala hal keinginanmu kepada Allah dalam doa and permohonan dengan ucapan syukur.", ref: "Filipi 4:6" },
  { text: "Sebab Aku ini mengetahui rancangan-rancangan apa yang ada pada-Ku mengenai kamu, demikianlah firman TUHAN, yaitu rancangan damai sejahtera dan bukan rancangan kecelakaan, untuk memberikan kepadamu hari depan yang penuh harapan.", ref: "Yeremia 29:11" },
  { text: "Serahkanlah kuatirmu kepada TUHAN, maka Ia akan memelihara engkau! Tidak untuk selama-lamanya dibiarkan-Nya orang benar itu goyah.", ref: "Mazmur 55:23" },
  { text: "Tetapi orang-orang yang menanti-nantikan TUHAN mendapat kekuatan baru: mereka seumpama rajawali yang naik terbang dengan kekuatan sayapnya; mereka berlari dan tidak menjadi lesu, mereka berjalan dan tidak menjadi lelah.", ref: "Yesaya 40:31" },
  { text: "Kasihilah seorang akan yang lain dengan kasih persaudaraan yang tulus dan saling mendahuluilah dalam memberi hormat.", ref: "Roma 12:10" }
];

export default function Beranda({ onNavigate }: BerandaProps) {
  const [currentVerseIndex, setCurrentVerseIndex] = useState(0);
  const [prayerSubmitted, setPrayerSubmitted] = useState(false);
  const [prayerForm, setPrayerForm] = useState({ name: '', phone: '', request: '' });

  const getNewVerse = () => {
    let nextIndex = (currentVerseIndex + 1) % VERSE_LIST.length;
    setCurrentVerseIndex(nextIndex);
  };

  const handlePrayerSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!prayerForm.request.trim()) return;
    setPrayerSubmitted(true);
    setTimeout(() => {
      setPrayerForm({ name: '', phone: '', request: '' });
    }, 500);
  };

  return (
    <div className="font-sans min-h-screen bg-slate-50">
      
      {/* 1. HERO SECTION */}
      <section className="relative overflow-hidden bg-gradient-to-b from-blue-950 via-blue-900 to-blue-950 text-white py-20 lg:py-32">
        <div className="absolute inset-0 opacity-10 bg-[radial-gradient(#f59e0b_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div className="lg:col-span-7 space-y-6 text-center lg:text-left">
              <motion.div 
                initial={{ opacity: 0, y: 15 }}
                animate={{ opacity: 1, y: 0 }}
                className="inline-flex items-center space-x-2 bg-amber-500/10 text-amber-400 border border-amber-500/20 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider"
              >
                <Sparkles className="w-3.5 h-3.5" />
                <span>Terang Kristus Bagi Tanah Papua</span>
              </motion.div>
              
              <motion.h1 
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ delay: 0.1 }}
                className="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-display leading-tight tracking-tight text-white"
              >
                GEREJA BAPTIS <br />
                <span className="text-amber-400">YOHANES ENTROP</span>
              </motion.h1>
              
              <motion.p 
                initial={{ opacity: 0, y: 15 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ delay: 0.2 }}
                className="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-light"
              >
                Menjadi jemaat yang berakar di dalam Kristus, bertumbuh dalam kebenaran Firman Tuhan, dan berbuah lebat bagi kemuliaan Bapa serta sesama di Jayapura.
              </motion.p>
              
              <motion.div 
                initial={{ opacity: 0, y: 15 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ delay: 0.3 }}
                className="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-4"
              >
                <button
                  id="hero-schedule-btn"
                  onClick={() => onNavigate('jadwal', 'jadwal-ibadah')}
                  className="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-blue-950 font-bold rounded-xl text-sm transition-all duration-150 flex items-center justify-center space-x-2 shadow-lg shadow-amber-500/10 cursor-pointer"
                >
                  <Calendar className="w-4 h-4" />
                  <span>Jadwal Ibadah Minggu</span>
                </button>
                <button
                  id="hero-profile-btn"
                  onClick={() => onNavigate('profil', 'sejarah')}
                  className="px-6 py-3 bg-white/10 hover:bg-white/15 border border-white/20 text-white font-medium rounded-xl text-sm transition-all duration-150 flex items-center justify-center space-x-2 cursor-pointer"
                >
                  <span>Kenal Kami Lebih Dekat</span>
                  <ArrowRight className="w-4 h-4" />
                </button>
              </motion.div>
            </div>

            {/* Hero Card Visual */}
            <div className="lg:col-span-5 flex justify-center">
              <motion.div 
                initial={{ opacity: 0, scale: 0.95 }}
                animate={{ opacity: 1, scale: 1 }}
                transition={{ delay: 0.25 }}
                className="relative bg-white text-slate-800 p-6 sm:p-8 rounded-2xl shadow-2xl border border-slate-100 max-w-sm w-full"
              >
                <div className="absolute top-0 right-0 transform translate-x-3 -translate-y-3 bg-amber-500 text-blue-950 p-3 rounded-xl shadow-lg font-bold text-xs tracking-wider uppercase flex flex-col items-center">
                  <span>MINGGU</span>
                  <span className="text-xl leading-none">09:00</span>
                  <span>WIT</span>
                </div>
                
                <h3 className="font-display font-bold text-xl text-blue-950 mb-1 flex items-center space-x-2">
                  <Church className="w-5 h-5 text-amber-600" />
                  <span>Kebaktian Utama</span>
                </h3>
                <p className="text-xs text-slate-500 font-medium mb-4">Ibadah Raya Mingguan Jemaat</p>
                
                <div className="space-y-3 text-xs leading-relaxed text-slate-600 border-t border-slate-100 pt-4">
                  <div className="flex items-start space-x-2">
                    <span className="font-semibold text-blue-950">Tempat:</span>
                    <span>Gedung Kebaktian Utama GBY Entrop, Jayapura</span>
                  </div>
                  <div className="flex items-start space-x-2">
                    <span className="font-semibold text-blue-950">Pelayan:</span>
                    <span>Gembala Sidang & Pelayan Liturgi Jemaat</span>
                  </div>
                  <div className="flex items-start space-x-2">
                    <span className="font-semibold text-blue-950">Tema Bulan:</span>
                    <span className="text-amber-700 italic">"Kasih Persaudaraan yang Saling Menopang"</span>
                  </div>
                </div>

                <div className="mt-6">
                  <button
                    id="live-stream-shortcut-btn"
                    onClick={() => onNavigate('galeri', 'video')}
                    className="w-full py-2.5 bg-blue-50 hover:bg-blue-100 text-blue-950 font-semibold rounded-xl text-xs flex items-center justify-center space-x-2 transition-colors cursor-pointer"
                  >
                    <BookOpen className="w-3.5 h-3.5" />
                    <span>Lihat Rekaman Ibadah</span>
                  </button>
                </div>
              </motion.div>
            </div>

          </div>
        </div>
      </section>

      {/* 2. VERSE OF THE DAY SECTION */}
      <section className="py-10 bg-blue-50 border-y border-blue-100">
        <div className="max-w-4xl mx-auto px-4 text-center space-y-4">
          <div className="inline-flex items-center space-x-1.5 text-amber-700 font-bold text-xs uppercase tracking-wider">
            <Sparkles className="w-4 h-4" />
            <span>Ayat Alkitab Hari Ini</span>
          </div>
          <motion.div
            key={currentVerseIndex}
            initial={{ opacity: 0, y: 5 }}
            animate={{ opacity: 1, y: 0 }}
            className="space-y-3"
          >
            <p className="text-base sm:text-lg md:text-xl font-display font-medium text-slate-800 leading-relaxed italic">
              "{VERSE_LIST[currentVerseIndex].text}"
            </p>
            <p className="text-xs sm:text-sm text-blue-900 font-bold">
              — {VERSE_LIST[currentVerseIndex].ref}
            </p>
          </motion.div>
          <button
            id="next-verse-btn"
            onClick={getNewVerse}
            className="mt-2 px-4 py-1.5 bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-medium text-xs rounded-full transition-colors cursor-pointer"
          >
            Dapatkan Ayat Lain
          </button>
        </div>
      </section>

      {/* 3. KEY STATS */}
      <section className="py-16 bg-white border-b border-slate-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            {[
              { icon: <Users className="w-7 h-7 text-blue-800 mx-auto" />, count: "350+", label: "Jemaat Aktif" },
              { icon: <Church className="w-7 h-7 text-amber-600 mx-auto" />, count: "14+", label: "Komisi Pelayanan" },
              { icon: <HeartHandshake className="w-7 h-7 text-rose-500 mx-auto" />, count: "12+", label: "Wilayah Sel/Sektor" },
              { icon: <Award className="w-7 h-7 text-emerald-600 mx-auto" />, count: "45 Th", label: "Melayani di Papua" }
            ].map((stat, i) => (
              <div key={i} className="space-y-2 p-4 bg-slate-50 rounded-xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                {stat.icon}
                <div className="text-2xl sm:text-3xl font-extrabold text-slate-950 font-display">{stat.count}</div>
                <div className="text-xs text-slate-500 uppercase tracking-wider font-semibold">{stat.label}</div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 4. MAIN QUICK SERVICES GRID */}
      <section className="py-16 lg:py-20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          
          <div className="text-center space-y-3 max-w-2xl mx-auto mb-12">
            <h2 className="text-3xl font-bold font-display text-blue-950 tracking-tight">
              Fokus Utama Pelayanan Jemaat
            </h2>
            <p className="text-sm text-slate-500 leading-relaxed font-light">
              Gereja Baptis Yohanes Entrop berkomitmen mendampingi setiap tahapan pertumbuhan iman Anda dan keluarga melalui berbagai ibadah dan persekutuan.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {/* Kebaktian Anak & Sekolah Minggu */}
            <div className="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
              <div className="space-y-4">
                <div className="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                  K1
                </div>
                <h3 className="text-lg font-bold font-display text-blue-950">Komisi Anak & Sekolah Minggu</h3>
                <p className="text-xs text-slate-500 leading-relaxed font-light">
                  Membina karakter spiritual anak sejak usia dini dengan metode pembelajaran Alkitab yang kreatif, ceria, dan penuh kegembiraan kristiani.
                </p>
              </div>
              <button 
                id="btn-sc-sekolah-minggu"
                onClick={() => onNavigate('pelayanan', 'sekolah-minggu')}
                className="mt-6 inline-flex items-center space-x-1.5 text-xs font-semibold text-emerald-700 hover:text-emerald-800 cursor-pointer"
              >
                <span>Selengkapnya</span>
                <ArrowRight className="w-3.5 h-3.5" />
              </button>
            </div>

            {/* Pemuda & Remaja */}
            <div className="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
              <div className="space-y-4">
                <div className="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                  K2
                </div>
                <h3 className="text-lg font-bold font-display text-blue-950">Perhimpunan Pemuda & Remaja</h3>
                <p className="text-xs text-slate-500 leading-relaxed font-light">
                  Menjadi wadah berekspresi, berbagi, dan berdiskusi yang sehat bagi generasi muda di tengah tantangan zaman, berakar kuat di dalam nilai Alkitabiah.
                </p>
              </div>
              <button 
                id="btn-sc-pemuda"
                onClick={() => onNavigate('pelayanan', 'pemuda')}
                className="mt-6 inline-flex items-center space-x-1.5 text-xs font-semibold text-blue-700 hover:text-blue-800 cursor-pointer"
              >
                <span>Selengkapnya</span>
                <ArrowRight className="w-3.5 h-3.5" />
              </button>
            </div>

            {/* Kaum Pria & Wanita */}
            <div className="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
              <div className="space-y-4">
                <div className="w-12 h-12 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold">
                  K3
                </div>
                <h3 className="text-lg font-bold font-display text-blue-950">Persekutuan Bapak & Ibu</h3>
                <p className="text-xs text-slate-500 leading-relaxed font-light">
                  Mendampingi keluarga-keluarga Kristen agar harmonis, saling membangun, dan menjadi teladan pelayanan di gereja, lingkungan kerja, serta masyarakat sekitar.
                </p>
              </div>
              <div className="mt-6 flex space-x-4">
                <button 
                  id="btn-sc-pria"
                  onClick={() => onNavigate('pelayanan', 'pria')}
                  className="inline-flex items-center space-x-1.5 text-xs font-semibold text-amber-700 hover:text-amber-800 cursor-pointer"
                >
                  <span>Bapak (PBI)</span>
                  <ArrowRight className="w-3.5 h-3.5" />
                </button>
                <button 
                  id="btn-sc-wanita"
                  onClick={() => onNavigate('pelayanan', 'wanita')}
                  className="inline-flex items-center space-x-1.5 text-xs font-semibold text-amber-700 hover:text-amber-800 cursor-pointer"
                >
                  <span>Ibu (WBI)</span>
                  <ArrowRight className="w-3.5 h-3.5" />
                </button>
              </div>
            </div>
          </div>

        </div>
      </section>

      {/* 5. INTERACTIVE PRAYER REQUEST FORM */}
      <section className="py-16 bg-blue-950 text-white relative">
        <div className="absolute inset-0 opacity-5 bg-[linear-gradient(to_right,#808080_1px,transparent_1px),linear-gradient(to_bottom,#808080_1px,transparent_1px)] bg-[size:24px_24px]"></div>
        <div className="max-w-4xl mx-auto px-4 sm:px-6 relative z-10">
          
          <div className="grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
            
            <div className="md:col-span-5 space-y-4">
              <span className="text-amber-400 font-bold text-xs uppercase tracking-wider block">Pelayanan Syafaat</span>
              <h2 className="text-3xl font-bold font-display tracking-tight leading-tight">
                Apakah Anda Butuh Topangan Doa?
              </h2>
              <p className="text-xs text-slate-300 leading-relaxed font-light">
                Sebagai satu tubuh di dalam Kristus, kami rindu mendukung dan mendoakan pergumulan Anda. Silakan kirimkan permohonan doa Anda, tim pelayanan pendoa syafaat kami akan mendoakan Anda secara khusus.
              </p>
              <div className="bg-blue-900/40 p-4 rounded-xl border border-blue-900/60 flex items-start space-x-3 text-xs text-slate-300 font-light">
                <ShieldAlert className="w-5 h-5 text-amber-500 shrink-0 mt-0.5" />
                <span>Seluruh permohonan doa Anda akan dijaga kerahasiaannya dan hanya dibagikan kepada tim pendoa syafaat gereja.</span>
              </div>
            </div>

            {/* Prayer request dynamic container */}
            <div className="md:col-span-7 bg-white text-slate-800 p-6 sm:p-8 rounded-2xl shadow-xl border border-slate-800/10">
              {prayerSubmitted ? (
                <motion.div 
                  initial={{ opacity: 0, scale: 0.95 }}
                  animate={{ opacity: 1, scale: 1 }}
                  className="text-center py-8 space-y-4"
                >
                  <div className="w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto shadow-inner">
                    <CheckCircle2 className="w-10 h-10" />
                  </div>
                  <h3 className="text-xl font-bold font-display text-blue-950">Permohonan Doa Diterima</h3>
                  <p className="text-xs text-slate-500 leading-relaxed font-light max-w-sm mx-auto">
                    Terima kasih atas kepercayaan Anda. Tim Pendoa Syafaat Gereja Baptis Yohanes Entrop akan mendoakan pergumulan Anda dalam persekutuan doa berkala kami. Tuhan Yesus memberkati.
                  </p>
                  <button
                    id="submit-another-prayer-btn"
                    onClick={() => setPrayerSubmitted(false)}
                    className="mt-4 px-4 py-2 bg-blue-900 text-white font-bold text-xs rounded-xl hover:bg-blue-950 transition-colors cursor-pointer"
                  >
                    Kirim Permohonan Lain
                  </button>
                </motion.div>
              ) : (
                <form onSubmit={handlePrayerSubmit} className="space-y-4">
                  <div>
                    <label className="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                      Nama Lengkap / Inisial (Opsional)
                    </label>
                    <input
                      id="prayer-name-input"
                      type="text"
                      placeholder="Contoh: Jhon Doe"
                      value={prayerForm.name}
                      onChange={(e) => setPrayerForm({ ...prayerForm, name: e.target.value })}
                      className="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900 transition-colors"
                    />
                  </div>

                  <div>
                    <label className="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                      No. Kontak / WA (Opsional)
                    </label>
                    <input
                      id="prayer-phone-input"
                      type="tel"
                      placeholder="Contoh: 0812xxxxxxxx"
                      value={prayerForm.phone}
                      onChange={(e) => setPrayerForm({ ...prayerForm, phone: e.target.value })}
                      className="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900 transition-colors"
                    />
                  </div>

                  <div>
                    <label className="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                      Pergumulan / Pokok Doa (Wajib)
                    </label>
                    <textarea
                      id="prayer-request-input"
                      rows={4}
                      required
                      placeholder="Tuliskan pergumulan atau hal yang ingin didoakan di sini..."
                      value={prayerForm.request}
                      onChange={(e) => setPrayerForm({ ...prayerForm, request: e.target.value })}
                      className="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900 transition-colors"
                    ></textarea>
                  </div>

                  <button
                    id="submit-prayer-btn"
                    type="submit"
                    className="w-full py-3 bg-amber-500 hover:bg-amber-600 text-blue-950 font-bold rounded-xl text-xs uppercase tracking-wider transition-colors flex items-center justify-center space-x-2 cursor-pointer"
                  >
                    <Send className="w-4 h-4" />
                    <span>Kirim Pokok Doa</span>
                  </button>
                </form>
              )}
            </div>

          </div>
        </div>
      </section>

    </div>
  );
}
