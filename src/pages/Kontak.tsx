import React, { useState } from 'react';
import { motion, AnimatePresence } from 'motion/react';
import { 
  Phone, Mail, MapPin, Clock, Send, HelpCircle, 
  ChevronDown, CheckCircle2, ShieldAlert, Compass, Map 
} from 'lucide-react';
import { FAQItem } from '../types';

export default function Kontak() {
  const [activeFaqIdx, setActiveFaqIdx] = useState<number | null>(null);
  const [contactSubmitted, setContactSubmitted] = useState(false);
  const [contactForm, setContactForm] = useState({ name: '', email: '', subject: '', message: '' });
  const [activeRouteInfo, setActiveRouteInfo] = useState<'airport' | 'port' | null>(null);

  const faqs: FAQItem[] = [
    {
      question: "Bagaimana cara mendaftarkan diri menjadi anggota jemaat tetap GBY Entrop?",
      answer: "Anda dapat berkunjung ke kantor sekretariat kami pada hari kerja, menyerahkan foto kopi KTP, Surat Baptisan Selam terdahulu (jika dari gereja sehobi), dan mengikuti wawancara singkat bersama Gembala Sidang."
    },
    {
      question: "Apakah GBY Entrop melayani baptisan bayi?",
      answer: "Sesuai teologi Baptis Alkitabiah, kami meyakini bahwa baptisan adalah tanda iman pribadi setelah seseorang sadar dan mengaku percaya kepada Kristus. Oleh sebab itu, kami tidak membaptis bayi. Namun, kami menyelenggarakan upacara Penyerahan Anak Kudus (dedication) bagi bayi/anak kecil untuk didoakan pemeliharaannya di depan jemaat."
    },
    {
      question: "Bagaimana cara memesan jadwal peneguhan Pernikahan Kudus?",
      answer: "Calon pengantin diharapkan mengajukan permohonan tertulis kepada sekretariat gereja minimal 3-6 bulan sebelum tanggal pernikahan. Pasangan wajib mengikuti minimal 4 sesi Bimbingan Pra-Nikah intensif bersama Gembala Sidang."
    },
    {
      question: "Apakah ada persekutuan kelompok sel (sektor) di lingkungan tempat tinggal?",
      answer: "Ya, GBY Entrop memiliki 12 kelompok sel/sektor yang tersebar di wilayah Entrop, Kotaraja, Jayapura Kota, dan Hamadi. Sektor-sektor ini mengadakan pertemuan ibadah rumah tangga berkala bergantian setiap pekan."
    }
  ];

  const handleContactSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setContactSubmitted(true);
    setTimeout(() => {
      setContactForm({ name: '', email: '', subject: '', message: '' });
    }, 500);
  };

  const handleRouteRequest = (type: 'airport' | 'port') => {
    setActiveRouteInfo(type);
  };

  return (
    <div className="font-sans min-h-screen bg-slate-50 py-12 lg:py-16">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center space-y-3 mb-10">
          <span className="text-amber-700 font-bold text-xs uppercase tracking-wider">Senantiasa Terbuka Bagi Anda</span>
          <h1 className="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
            Hubungi Kami & Lokasi
          </h1>
          <p className="text-sm text-slate-500 max-w-xl mx-auto font-light">
            Butuh informasi jemaat, rute gereja, atau ingin menanyakan perihal iman? Tim sekretariat kami siap membantu Anda.
          </p>
        </div>

        {/* Upper Grid: Contact Info + Contact Form */}
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start mb-16">
          
          {/* Sekretariat Details Card */}
          <div className="lg:col-span-5 space-y-6">
            <div className="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 sm:p-8 space-y-6">
              <h2 className="text-lg font-bold font-display text-blue-950 border-b border-slate-50 pb-2">
                Kantor Sekretariat GBY Entrop
              </h2>
              
              <div className="space-y-4 text-xs text-slate-600 leading-relaxed font-light">
                <div className="flex items-start space-x-3">
                  <MapPin className="w-5 h-5 text-blue-900 shrink-0 mt-0.5" />
                  <div>
                    <span className="font-bold text-slate-800 block">Alamat Gereja:</span>
                    <span>Jl. Raya Jayapura - Kotaraja, Entrop, Distrik Jayapura Selatan, Kota Jayapura, Papua 99224</span>
                    <span className="text-[10px] text-amber-700 font-semibold block mt-1">(Samping SPBU Entrop / Dekat Kompleks Perkantoran Distrik)</span>
                  </div>
                </div>

                <div className="flex items-center space-x-3">
                  <Phone className="w-5 h-5 text-blue-900 shrink-0" />
                  <div>
                    <span className="font-bold text-slate-800 block">Telepon / WhatsApp:</span>
                    <span className="font-semibold">+62 821-9876-5432 (Sekretaris Jemaat)</span>
                  </div>
                </div>

                <div className="flex items-center space-x-3">
                  <Mail className="w-5 h-5 text-blue-900 shrink-0" />
                  <div>
                    <span className="font-bold text-slate-800 block">E-mail Resmi:</span>
                    <span>info@baptisyohanesentrop.org</span>
                  </div>
                </div>

                <div className="flex items-start space-x-3">
                  <Clock className="w-5 h-5 text-blue-900 shrink-0 mt-0.5" />
                  <div>
                    <span className="font-bold text-slate-800 block">Jam Operasional Sekretariat:</span>
                    <span>Senin - Sabtu: Pukul 09:00 - 16:00 WIT</span>
                    <span className="block text-slate-400">Minggu: Tutup (Hanya pelayanan ibadah harian)</span>
                  </div>
                </div>
              </div>
            </div>

            {/* Quick Warning */}
            <div className="bg-amber-50 p-5 rounded-2xl border border-amber-100 flex items-start space-x-3 text-xs leading-relaxed text-amber-900 font-light">
              <ShieldAlert className="w-5 h-5 text-amber-600 shrink-0 mt-0.5" />
              <div>
                <span className="font-bold block">Urgensi Pastoral & Duka:</span>
                <span>Bagi jemaat yang memerlukan pelayanan kedukaan mendesak, doa pelepasan darurat, atau sakramen duka, silakan langsung menghubungi nomor WhatsApp darurat di atas agar langsung dilayani oleh tim penatua kami.</span>
              </div>
            </div>
          </div>

          {/* Contact Form Container */}
          <div className="lg:col-span-7 bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm">
            {contactSubmitted ? (
              <motion.div 
                initial={{ opacity: 0, scale: 0.95 }}
                animate={{ opacity: 1, scale: 1 }}
                className="text-center py-12 space-y-4"
              >
                <div className="w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto shadow-inner">
                  <CheckCircle2 className="w-10 h-10" />
                </div>
                <h3 className="text-xl font-bold font-display text-blue-950">Pesan Berhasil Terkirim</h3>
                <p className="text-xs text-slate-500 leading-relaxed font-light max-w-sm mx-auto">
                  Terima kasih telah menghubungi kami. Pesan Anda telah diteruskan ke staff administrasi gereja. Kami akan menghubungi Anda kembali via e-mail atau WhatsApp dalam kurun waktu 1x24 jam kerja.
                </p>
                <button
                  id="reset-contact-form-btn"
                  onClick={() => setContactSubmitted(false)}
                  className="mt-4 px-5 py-2.5 bg-blue-900 text-white font-bold text-xs rounded-xl hover:bg-blue-950 transition-colors cursor-pointer"
                >
                  Kirim Pesan Lain
                </button>
              </motion.div>
            ) : (
              <form onSubmit={handleContactSubmit} className="space-y-4">
                <span className="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Kirim Pesan Langsung</span>
                
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label className="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Lengkap</label>
                    <input
                      id="contact-name-input"
                      type="text"
                      required
                      placeholder="Masukkan nama"
                      value={contactForm.name}
                      onChange={(e) => setContactForm({ ...contactForm, name: e.target.value })}
                      className="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/10 focus:border-blue-900"
                    />
                  </div>
                  <div>
                    <label className="block text-xs font-bold text-slate-700 uppercase mb-1">E-mail / No. HP</label>
                    <input
                      id="contact-email-input"
                      type="text"
                      required
                      placeholder="Contoh: 0812xxxxxxxx / jhon@mail.com"
                      value={contactForm.email}
                      onChange={(e) => setContactForm({ ...contactForm, email: e.target.value })}
                      className="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/10 focus:border-blue-900"
                    />
                  </div>
                </div>

                <div>
                  <label className="block text-xs font-bold text-slate-700 uppercase mb-1">Subjek Pertanyaan</label>
                  <input
                    id="contact-subject-input"
                    type="text"
                    required
                    placeholder="Contoh: Tanya Kelas Sidi / Sumbangan Donasi"
                    value={contactForm.subject}
                    onChange={(e) => setContactForm({ ...contactForm, subject: e.target.value })}
                    className="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/10 focus:border-blue-900"
                  />
                </div>

                <div>
                  <label className="block text-xs font-bold text-slate-700 uppercase mb-1">Isi Pesan</label>
                  <textarea
                    id="contact-message-input"
                    rows={4}
                    required
                    placeholder="Tuliskan pesan detail Anda di sini..."
                    value={contactForm.message}
                    onChange={(e) => setContactForm({ ...contactForm, message: e.target.value })}
                    className="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/10 focus:border-blue-900"
                  ></textarea>
                </div>

                <button
                  id="submit-contact-btn"
                  type="submit"
                  className="w-full py-3 bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-colors flex items-center justify-center space-x-2 cursor-pointer"
                >
                  <Send className="w-4 h-4" />
                  <span>Kirim Pesan</span>
                </button>
              </form>
            )}
          </div>

        </div>

        {/* Lower Grid: Lokasi Map Mock + FAQs Accordion */}
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
          
          {/* Interactive Route/Map Block */}
          <div className="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 sm:p-8 space-y-6">
            <div className="flex items-center space-x-2">
              <Map className="w-5 h-5 text-blue-900" />
              <h2 className="text-lg font-bold font-display text-blue-950">Lokasi & Panduan Rute</h2>
            </div>
            
            {/* Visual Map Mockup */}
            <div className="aspect-video bg-blue-50 rounded-2xl border border-slate-100 relative overflow-hidden flex items-center justify-center p-4">
              <div className="absolute inset-0 opacity-15 bg-[linear-gradient(to_right,#1e3a8a_1px,transparent_1px),linear-gradient(to_bottom,#1e3a8a_1px,transparent_1px)] bg-[size:30px_30px]"></div>
              
              {/* Church Marker Visual */}
              <div className="bg-blue-900 text-white p-3 rounded-xl shadow-xl border border-blue-950 flex items-center space-x-2.5 z-10 scale-105">
                <div className="w-8 h-8 rounded-full bg-amber-400 flex items-center justify-center shrink-0 text-blue-950">
                  <MapPin className="w-5 h-5" />
                </div>
                <div className="text-left">
                  <span className="block text-[10px] font-extrabold uppercase tracking-wide">GBY ENTROP</span>
                  <span className="block text-[8px] opacity-80 leading-none">Jl. Raya Jayapura - Kotaraja</span>
                </div>
              </div>

              {/* SPBU Neighbor Visual */}
              <div className="absolute top-10 right-10 bg-white/80 p-1.5 rounded-md border border-slate-200 text-[8px] font-bold text-slate-500">
                ⛽ SPBU Entrop
              </div>

              {/* Distrik Office Visual */}
              <div className="absolute bottom-10 left-10 bg-white/80 p-1.5 rounded-md border border-slate-200 text-[8px] font-bold text-slate-500">
                🏢 Kantor Distrik
              </div>
            </div>

            {/* Interactive route chooser buttons */}
            <div className="space-y-3">
              <span className="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Panduan Rute Perjalanan</span>
              <div className="flex gap-2">
                <button
                  id="route-airport-btn"
                  onClick={() => handleRouteRequest('airport')}
                  className={`flex-1 py-2 text-center text-xs font-bold rounded-xl transition-all cursor-pointer
                    ${activeRouteInfo === 'airport'
                      ? 'bg-blue-900 text-white shadow-md'
                      : 'bg-slate-50 text-slate-600 border border-slate-200 hover:bg-slate-100'
                    }`}
                >
                  Dari Bandara Sentani
                </button>
                <button
                  id="route-port-btn"
                  onClick={() => handleRouteRequest('port')}
                  className={`flex-1 py-2 text-center text-xs font-bold rounded-xl transition-all cursor-pointer
                    ${activeRouteInfo === 'port'
                      ? 'bg-blue-900 text-white shadow-md'
                      : 'bg-slate-50 text-slate-600 border border-slate-200 hover:bg-slate-100'
                    }`}
                >
                  Dari Pelabuhan Jayapura
                </button>
              </div>

              {/* Dynamic route explanation text panel */}
              <AnimatePresence mode="wait">
                {activeRouteInfo && (
                  <motion.div
                    key={activeRouteInfo}
                    initial={{ opacity: 0, y: 5 }}
                    animate={{ opacity: 1, y: 0 }}
                    exit={{ opacity: 0, y: -5 }}
                    className="p-4 bg-slate-50 rounded-2xl border border-slate-150 text-xs text-slate-600 leading-relaxed font-light"
                  >
                    {activeRouteInfo === 'airport' ? (
                      <div>
                        <strong className="text-blue-950 font-bold text-xs block mb-1">Rute Dari Bandara Sentani (~45-60 menit):</strong>
                        <span>Ambil Jl. Raya Abepura menuju Kotaraja. Lanjutkan lurus melewati Skyline ke arah Jl. Raya Jayapura - Kotaraja (Entrop). Lewati lampu merah terminal Entrop. Gereja berada 200 meter setelah lampu merah di sebelah kiri jalan, tepat berdampingan dengan SPBU Entrop.</span>
                      </div>
                    ) : (
                      <div>
                        <strong className="text-blue-950 font-bold text-xs block mb-1">Rute Dari Pelabuhan Jayapura (~15-20 menit):</strong>
                        <span>Ambil Jl. Koti ke arah selatan, melewati daerah Hamadi. Naik ke jembatan Hamadi-Holtekamp atau langsung ambil arah Jl. Kelapa Dua Entrop. Teruskan menuju jalan raya utama Jayapura-Kotaraja. Lokasi gereja berada di seberang Kantor Distrik Jayapura Selatan (sebelah kanan jalan sebelum lampu merah Terminal Entrop).</span>
                      </div>
                    )}
                  </motion.div>
                )}
              </AnimatePresence>
            </div>
          </div>

          {/* FAQs Accordion Block */}
          <div className="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 sm:p-8 space-y-6">
            <div className="flex items-center space-x-2">
              <HelpCircle className="w-5 h-5 text-amber-600" />
              <h2 className="text-lg font-bold font-display text-blue-950">Pertanyaan Umum (FAQ)</h2>
            </div>

            <div className="space-y-3.5">
              {faqs.map((faq, idx) => {
                const isOpen = activeFaqIdx === idx;
                return (
                  <div 
                    key={idx}
                    className="border-b border-slate-100 pb-3 last:border-none"
                  >
                    <button
                      id={`faq-btn-${idx}`}
                      onClick={() => setActiveFaqIdx(isOpen ? null : idx)}
                      className="w-full flex items-center justify-between text-left focus:outline-none group py-1 cursor-pointer"
                    >
                      <span className="text-xs sm:text-sm font-bold text-slate-700 group-hover:text-blue-900 transition-colors pr-4">
                        {faq.question}
                      </span>
                      <ChevronDown className={`w-4 h-4 text-slate-400 group-hover:text-blue-900 transition-transform ${isOpen ? 'rotate-180' : ''}`} />
                    </button>

                    <AnimatePresence>
                      {isOpen && (
                        <motion.div
                          initial={{ opacity: 0, height: 0 }}
                          animate={{ opacity: 1, height: 'auto' }}
                          exit={{ opacity: 0, height: 0 }}
                          className="mt-2 text-xs text-slate-500 font-light leading-relaxed pr-6 overflow-hidden"
                        >
                          {faq.answer}
                        </motion.div>
                      )}
                    </AnimatePresence>
                  </div>
                );
              })}
            </div>
          </div>

        </div>

      </div>
    </div>
  );
}
