import React, { useState, useEffect } from 'react';
import { motion, AnimatePresence } from 'motion/react';
import { 
  Music, Users, HeartHandshake, Globe, Award, 
  Tv, Heart, MessageSquare, Flame, Check, Calendar, 
  Phone, UserCheck, CheckCircle2, ChevronRight, BookOpen
} from 'lucide-react';

interface PelayananProps {
  initialSubTab?: string;
}

interface MinistryItem {
  key: string;
  category: 'komisi' | 'liturgis' | 'sosial-misi' | 'sakramen-konseling';
  title: string;
  description: string;
  schedule: string;
  leader: string;
  contact: string;
  icon: React.ReactNode;
  details: string[];
}

export default function Pelayanan({ initialSubTab = 'ibadah-minggu' }: PelayananProps) {
  const [selectedFilter, setSelectedFilter] = useState<'all' | 'komisi' | 'liturgis' | 'sosial-misi' | 'sakramen-konseling'>('all');
  const [selectedMinistryKey, setSelectedMinistryKey] = useState<string>(initialSubTab);
  const [successContact, setSuccessContact] = useState<string | null>(null);

  useEffect(() => {
    if (initialSubTab) {
      setSelectedMinistryKey(initialSubTab);
      // Auto-focus category filter if matching subtab is chosen
      const item = ministries.find(m => m.key === initialSubTab);
      if (item) {
        setSelectedFilter('all'); // Clear filters or show matching one
      }
    }
  }, [initialSubTab]);

  const filters = [
    { key: 'all', label: 'Semua Pelayanan' },
    { key: 'komisi', label: 'Kategori Jemaat' },
    { key: 'liturgis', label: 'Pelayanan Ibadah' },
    { key: 'sosial-misi', label: 'Misi & Sosial' },
    { key: 'sakramen-konseling', label: 'Sakramen & Pastoral' },
  ];

  const ministries: MinistryItem[] = [
    {
      key: 'ibadah-minggu',
      category: 'liturgis',
      title: 'Ibadah Raya Minggu',
      description: 'Pusat perjumpaan jemaat mingguan untuk memuji, menyembah, dan merenungkan Kebenaran Firman Tuhan secara korporat.',
      schedule: 'Minggu, Pukul 09:00 WIT - Selesai',
      leader: 'Pdt. Yohanes Kogoya, M.Th.',
      contact: '0821-9876-0001',
      icon: <Flame className="w-6 h-6 text-blue-900" />,
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
      icon: <Award className="w-6 h-6 text-emerald-600" />,
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
      icon: <Users className="w-6 h-6 text-indigo-600" />,
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
      icon: <Users className="w-6 h-6 text-purple-600" />,
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
      icon: <Heart className="w-6 h-6 text-rose-500" />,
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
      icon: <Users className="w-6 h-6 text-amber-700" />,
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
      icon: <Music className="w-6 h-6 text-red-500" />,
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
      icon: <Tv className="w-6 h-6 text-slate-600" />,
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
      icon: <HeartHandshake className="w-6 h-6 text-teal-600" />,
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
      icon: <Globe className="w-6 h-6 text-blue-600" />,
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
      icon: <Check className="w-6 h-6 text-sky-500" />,
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
      icon: <BookOpen className="w-6 h-6 text-emerald-700" />,
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
      icon: <Heart className="w-6 h-6 text-rose-600" />,
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
      description: 'Layanan ruang aman curahan hati (curhat) and bimbingan pastoral bagi jemaat yang sedang mengalami stres berat, depresi, atau konflik keluarga.',
      schedule: 'By Appointment (Daftar Terlebih Dahulu)',
      leader: 'Pdt. Yohanes Kogoya, M.Th. / Tim Konselor',
      contact: '0821-9876-0014',
      icon: <MessageSquare className="w-6 h-6 text-blue-600" />,
      details: [
        'Kerahasiaan data dan cerita konseling dijamin 100% oleh kode etik pastoral.',
        'Sesi bimbingan yang ramah, hangat, bebas penghakiman, berlandaskan prinsip Alkitab.',
        'Dapat dikombinasikan dengan rujukan profesional jika memerlukan penanganan psikologis medis.'
      ]
    }
  ];

  // Filtering Logic
  const filteredMinistries = selectedFilter === 'all' 
    ? ministries 
    : ministries.filter(m => m.category === selectedFilter);

  const activeMinistry = ministries.find(m => m.key === selectedMinistryKey) || ministries[0];

  const handleContactReq = (ministryTitle: string) => {
    setSuccessContact(ministryTitle);
    setTimeout(() => {
      setSuccessContact(null);
    }, 5000);
  };

  return (
    <div className="font-sans min-h-screen bg-slate-50 py-12 lg:py-16">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center space-y-3 mb-10">
          <span className="text-amber-700 font-bold text-xs uppercase tracking-wider">Komitmen & Panggilan Melayani</span>
          <h1 className="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
            Komisi & Pelayanan Jemaat
          </h1>
          <p className="text-sm text-slate-500 max-w-xl mx-auto font-light">
            Menjangkau seluruh rentang usia jemaat, memperlengkapi talenta, dan menyembuhkan jiwa yang berbeban berat.
          </p>
        </div>

        {/* Filter Navigation Tabs */}
        <div className="flex flex-wrap justify-center gap-2 mb-8 border-b border-slate-200 pb-5">
          {filters.map((filter) => (
            <button
              key={filter.key}
              id={`filter-pelayanan-btn-${filter.key}`}
              onClick={() => {
                setSelectedFilter(filter.key as any);
                // Select the first item in the newly filtered list to avoid empty state view
                const matched = ministries.find(m => filter.key === 'all' || m.category === filter.key);
                if (matched) {
                  setSelectedMinistryKey(matched.key);
                }
              }}
              className={`px-4 py-2 text-xs font-bold uppercase tracking-wider rounded-full transition-all duration-150 cursor-pointer
                ${selectedFilter === filter.key
                  ? 'bg-blue-950 text-white shadow-md'
                  : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 hover:text-blue-950'
                }`}
            >
              {filter.label}
            </button>
          ))}
        </div>

        {/* Layout: Sidebar list of matched ministries + Detail panel */}
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
          
          {/* List Sidebar */}
          <div className="lg:col-span-4 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm max-h-[600px] overflow-y-auto space-y-1">
            <span className="text-[10px] font-bold text-slate-400 uppercase tracking-wider block px-3 mb-2">
              Daftar Komisi & Pelayanan
            </span>
            {filteredMinistries.map((m) => {
              const isSelected = selectedMinistryKey === m.key;
              return (
                <button
                  key={m.key}
                  id={`pelayanan-item-btn-${m.key}`}
                  onClick={() => setSelectedMinistryKey(m.key)}
                  className={`flex items-center space-x-3 w-full text-left px-3 py-2.5 rounded-xl text-xs font-semibold tracking-wide transition-all duration-150 cursor-pointer
                    ${isSelected
                      ? 'bg-blue-50 text-blue-950 border-l-4 border-blue-900 rounded-l-none'
                      : 'text-slate-600 hover:bg-slate-50 hover:text-blue-900'
                    }`}
                >
                  <div className={`p-1.5 rounded-lg shrink-0 ${isSelected ? 'bg-white' : 'bg-slate-50'}`}>
                    {m.icon}
                  </div>
                  <span className="truncate">{m.title}</span>
                </button>
              );
            })}
          </div>

          {/* Details Panel */}
          <div className="lg:col-span-8 bg-white p-6 sm:p-10 rounded-3xl border border-slate-100 shadow-sm">
            <AnimatePresence mode="wait">
              <motion.div
                key={activeMinistry.key}
                initial={{ opacity: 0, x: 10 }}
                animate={{ opacity: 1, x: 0 }}
                exit={{ opacity: 0, x: -10 }}
                transition={{ duration: 0.2 }}
                className="space-y-6 animate-fade-in"
              >
                {/* Header card info */}
                <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-slate-100 pb-5 gap-4">
                  <div className="flex items-center space-x-4">
                    <div className="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center shadow-inner">
                      {activeMinistry.icon}
                    </div>
                    <div>
                      <h2 className="text-xl sm:text-2xl font-bold font-display text-blue-950">{activeMinistry.title}</h2>
                      <span className="inline-block bg-blue-100 text-blue-900 text-[10px] font-bold px-2 py-0.5 rounded-md uppercase mt-1 tracking-wider">
                        {activeMinistry.category === 'komisi' ? 'Komisi Jemaat' : 
                         activeMinistry.category === 'liturgis' ? 'Pelayanan Liturgis' :
                         activeMinistry.category === 'sosial-misi' ? 'Misi & Sosial' : 'Sakramen & Pastoral'}
                      </span>
                    </div>
                  </div>
                </div>

                {/* Description */}
                <div className="space-y-2">
                  <h3 className="text-xs font-bold text-slate-400 uppercase tracking-wider">Deskripsi Pelayanan</h3>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-light">
                    {activeMinistry.description}
                  </p>
                </div>

                {/* Bullet details */}
                <div className="space-y-3 bg-slate-50 p-5 rounded-2xl border border-slate-100">
                  <h3 className="text-xs font-bold text-slate-700 uppercase tracking-wider">Poin & Program Utama</h3>
                  <ul className="space-y-2.5">
                    {activeMinistry.details.map((detail, idx) => (
                      <li key={idx} className="flex items-start space-x-2.5 text-xs text-slate-600 leading-relaxed">
                        <Check className="w-4 h-4 text-emerald-600 shrink-0 mt-0.5" />
                        <span>{detail}</span>
                      </li>
                    ))}
                  </ul>
                </div>

                {/* Schedule & Contact Info */}
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div className="p-4 bg-blue-50/50 rounded-xl border border-blue-100/50 flex items-start space-x-3">
                    <Calendar className="w-5 h-5 text-blue-900 shrink-0 mt-0.5" />
                    <div>
                      <h4 className="text-[10px] font-bold text-blue-900 uppercase">Jadwal Persekutuan</h4>
                      <p className="text-xs font-semibold text-slate-800 mt-0.5">{activeMinistry.schedule}</p>
                    </div>
                  </div>

                  <div className="p-4 bg-amber-50/50 rounded-xl border border-amber-100/50 flex items-start space-x-3">
                    <UserCheck className="w-5 h-5 text-amber-700 shrink-0 mt-0.5" />
                    <div>
                      <h4 className="text-[10px] font-bold text-amber-700 uppercase">Koordinator</h4>
                      <p className="text-xs font-semibold text-slate-800 mt-0.5">{activeMinistry.leader}</p>
                    </div>
                  </div>
                </div>

                {/* CTA Action button */}
                <div className="pt-4 border-t border-slate-100">
                  {successContact === activeMinistry.title ? (
                    <motion.div 
                      initial={{ opacity: 0, y: 5 }}
                      animate={{ opacity: 1, y: 0 }}
                      className="p-4 bg-emerald-50 rounded-xl border border-emerald-100 text-center flex items-center justify-center space-x-2 text-xs font-semibold text-emerald-800"
                    >
                      <CheckCircle2 className="w-4 h-4 text-emerald-600" />
                      <span>Permintaan Anda dikirim! Silakan hubungi WA {activeMinistry.contact} untuk respons cepat.</span>
                    </motion.div>
                  ) : (
                    <div className="flex flex-col sm:flex-row items-center justify-between gap-4">
                      <p className="text-xs text-slate-400 font-light text-center sm:text-left">
                        Tertarik bergabung pelayanan atau membutuhkan bantuan seputar komisi ini?
                      </p>
                      <button
                        id="contact-ministry-btn"
                        onClick={() => handleContactReq(activeMinistry.title)}
                        className="px-5 py-2.5 bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs rounded-xl tracking-wide uppercase transition-colors flex items-center space-x-2 shrink-0 cursor-pointer"
                      >
                        <Phone className="w-3.5 h-3.5" />
                        <span>Hubungi Sekretariat</span>
                      </button>
                    </div>
                  )}
                </div>

              </motion.div>
            </AnimatePresence>
          </div>

        </div>
      </div>
    </div>
  );
}
