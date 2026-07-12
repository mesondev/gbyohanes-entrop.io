import React, { useState, useEffect } from 'react';
import { motion } from 'motion/react';
import { 
  BookOpen, Compass, Award, Shield, Users, Trophy, 
  MapPin, CheckCircle2, Star, Mail, Briefcase, ChevronRight, Church
} from 'lucide-react';

interface ProfilProps {
  initialSubTab?: string;
}

export default function Profil({ initialSubTab = 'sejarah' }: ProfilProps) {
  const [activeSubTab, setActiveSubTab] = useState(initialSubTab);

  // Update subtab if parent passes a new initialSubTab
  useEffect(() => {
    if (initialSubTab) {
      setActiveSubTab(initialSubTab);
    }
  }, [initialSubTab]);

  const menuItems = [
    { key: 'sejarah', label: 'Sejarah Gereja' },
    { key: 'visi-misi', label: 'Visi & Misi' },
    { key: 'logo', label: 'Logo Gereja' },
    { key: 'gembala', label: 'Gembala Sidang' },
    { key: 'struktur', label: 'Struktur Organisasi' },
    { key: 'pengurus', label: 'Pengurus & Staff' },
  ];

  return (
    <div className="font-sans min-h-screen bg-slate-50 py-12 lg:py-16">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center space-y-3 mb-10">
          <span className="text-amber-700 font-bold text-xs uppercase tracking-wider">Mengenal Lebih Dekat</span>
          <h1 className="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
            Profil GBY Entrop
          </h1>
          <p className="text-sm text-slate-500 max-w-xl mx-auto font-light">
            Sejarah panjang, visi misi, kepemimpinan, dan nilai-nilai pelayanan di bawah bimbingan Roh Kudus.
          </p>
        </div>

        {/* Layout: Sidebar Sub-Navigation + Content Panel */}
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
          
          {/* Sub Navigation Sidebar */}
          <div className="lg:col-span-3 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm space-y-1">
            <h3 className="text-xs font-bold text-slate-400 uppercase tracking-wider px-3 mb-2.5">Menu Profil</h3>
            {menuItems.map((item) => {
              const isSelected = activeSubTab === item.key;
              return (
                <button
                  key={item.key}
                  id={`profil-subtab-btn-${item.key}`}
                  onClick={() => setActiveSubTab(item.key)}
                  className={`flex items-center justify-between w-full text-left px-4 py-3 rounded-xl text-xs font-semibold tracking-wide transition-all duration-150 cursor-pointer
                    ${isSelected 
                      ? 'bg-blue-900 text-white shadow-md shadow-blue-900/10' 
                      : 'text-slate-600 hover:bg-slate-50 hover:text-blue-950'
                    }`}
                >
                  <span>{item.label}</span>
                  <ChevronRight className={`w-4 h-4 opacity-70 transition-transform ${isSelected ? 'translate-x-1' : ''}`} />
                </button>
              );
            })}
          </div>

          {/* Main Content Area */}
          <div className="lg:col-span-9 bg-white p-6 sm:p-10 rounded-3xl border border-slate-100 shadow-sm min-h-[500px]">
            {activeSubTab === 'sejarah' && (
              <motion.div 
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                className="space-y-6"
              >
                <div className="border-b border-slate-100 pb-4">
                  <h2 className="text-2xl font-bold font-display text-blue-950">Sejarah Gereja</h2>
                  <p className="text-xs text-slate-400">Tonggak perjalanan iman jemaat di tanah Jayapura, Papua.</p>
                </div>

                <div className="prose text-xs sm:text-sm text-slate-600 leading-relaxed space-y-4 font-light">
                  <p>
                    <strong className="text-blue-950 font-bold text-sm">Awal Mula (1981):</strong> Pelayanan di daerah Entrop, Jayapura Selatan ini berakar dari sebuah kelompok persekutuan doa kecil rumah tangga (sektor) yang digumuli oleh beberapa kepala keluarga Baptis yang merantau dan menetap di Jayapura. Kerinduan untuk beribadah dalam persekutuan iman Baptis mendorong didirikannya Pos Pekabaran Injil (PI) perdana pada pertengahan tahun 1981.
                  </p>
                  
                  <div className="my-6 p-4 bg-amber-50 border-l-4 border-amber-500 rounded-r-xl">
                    <p className="italic text-amber-900 font-medium">
                      "Dari sebuah persekutuan rumah tangga kecil yang sederhana, Allah berkarya meluaskan pelayanan ini hingga menjangkau ratusan jemaat aktif di Kota Jayapura dan sekitarnya."
                    </p>
                  </div>

                  <p>
                    <strong className="text-blue-950 font-bold text-sm">Kemandirian Jemaat (1987):</strong> Atas bimbingan Tuhan Yesus Kristus dan kerja keras para perintis terdahulu, persekutuan doa ini resmi didewasakan menjadi gereja mandiri bernama <strong>Gereja Baptis Yohanes Entrop</strong> pada tanggal 12 November 1987. Peletakan batu pertama gedung ibadah permanen di lokasi strategis wilayah Entrop menjadi tanda komitmen pelayanan jemaat jangka panjang di ibu kota Papua.
                  </p>
                  <p>
                    <strong className="text-blue-950 font-bold text-sm">Perkembangan Pelayanan:</strong> Selama lebih dari empat dekade, gereja ini terus konsisten dalam melayani masyarakat melalui berbagai komitment pelayanan: penjangkauan generasi muda (pemuda/remaja), pemberdayaan ekonomi kaum wanita jemaat, aksi diakonia tanggap bencana, serta pengutusan misionaris lokal ke daerah-daerah pedalaman terpencil di pegunungan tengah Papua.
                  </p>
                </div>

                <div className="pt-6 border-t border-slate-100 grid grid-cols-1 sm:grid-cols-3 gap-4">
                  <div className="p-4 bg-slate-50 rounded-xl border border-slate-100">
                    <h4 className="text-xs font-bold text-blue-900 uppercase">Tahun Berdiri</h4>
                    <p className="text-xl font-bold text-slate-800">1981</p>
                    <p className="text-[10px] text-slate-500 font-light">Perintisan Pos PI Perdana</p>
                  </div>
                  <div className="p-4 bg-slate-50 rounded-xl border border-slate-100">
                    <h4 className="text-xs font-bold text-blue-900 uppercase">Dewasa Mandiri</h4>
                    <p className="text-xl font-bold text-slate-800">1987</p>
                    <p className="text-[10px] text-slate-500 font-light">Resmi Menjadi GBY Entrop</p>
                  </div>
                  <div className="p-4 bg-slate-50 rounded-xl border border-slate-100">
                    <h4 className="text-xs font-bold text-blue-900 uppercase">Status Afiliasi</h4>
                    <p className="text-xs font-bold text-slate-800">PGBGP</p>
                    <p className="text-[10px] text-slate-500 font-light">Persatuan Gereja-Gereja Baptis Papua</p>
                  </div>
                </div>
              </motion.div>
            )}

            {activeSubTab === 'visi-misi' && (
              <motion.div 
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                className="space-y-8"
              >
                <div className="border-b border-slate-100 pb-4">
                  <h2 className="text-2xl font-bold font-display text-blue-950">Visi & Misi</h2>
                  <p className="text-xs text-slate-400">Arah, fondasi dasar, dan landasan operasional pelayanan gereja.</p>
                </div>

                {/* Visi */}
                <div className="p-6 bg-blue-50/50 rounded-2xl border border-blue-100/60 text-center space-y-3">
                  <span className="text-xs font-bold text-blue-900 uppercase tracking-widest block">VISI UTAMA GBY ENTROP</span>
                  <p className="text-lg sm:text-xl font-display font-medium text-slate-800 italic leading-relaxed max-w-2xl mx-auto">
                    "Terwujudnya jemaat yang berakar, bertumbuh, dan berbuah lebat di dalam Kristus Yesus demi kemuliaan Allah Bapa."
                  </p>
                  <p className="text-[10px] text-slate-400 font-medium">Berdasarkan amanat firman Tuhan dalam Kolose 2:7 dan Yohanes 15:8</p>
                </div>

                {/* Misi */}
                <div className="space-y-4">
                  <h3 className="text-sm font-bold text-slate-700 uppercase tracking-wider border-b border-slate-100 pb-2">Misi Pelayanan</h3>
                  <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {[
                      { num: "01", title: "Pekabaran Injil", desc: "Mewartakan kabar keselamatan Yesus Kristus secara aktif kepada seluruh jiwa yang belum dijangkau di wilayah Papua dan sekitarnya." },
                      { num: "02", title: "Pengajaran Firman", desc: "Mendidik jemaat melalui penelaahan Alkitab (PA) yang sistematis agar mandiri secara rohani dan berakar kuat dalam doktrin yang sehat." },
                      { num: "03", title: "Persekutuan Kasih", desc: "Membina kasih persaudaraan sejati antarjemaat tanpa membeda-bedakan suku, klan, maupun strata sosial, saling menopang dalam kesulitan." },
                      { num: "04", title: "Pengutusan & Pelayanan", desc: "Melatih serta mengutus kader-kader pelayanan, penatua, dan penginjil ke ladang pelayanan yang membutuhkan penanganan rohani khusus." }
                    ].map((misi, i) => (
                      <div key={i} className="p-5 bg-slate-50 rounded-xl border border-slate-100/80 space-y-2 hover:bg-white hover:shadow-md transition-all duration-200">
                        <div className="text-lg font-bold text-amber-600 font-display">{misi.num}</div>
                        <h4 className="text-sm font-bold text-blue-950">{misi.title}</h4>
                        <p className="text-xs text-slate-500 leading-relaxed font-light">{misi.desc}</p>
                      </div>
                    ))}
                  </div>
                </div>
              </motion.div>
            )}

            {activeSubTab === 'logo' && (
              <motion.div 
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                className="space-y-8"
              >
                <div className="border-b border-slate-100 pb-4">
                  <h2 className="text-2xl font-bold font-display text-blue-950">Logo & Atribut Gereja</h2>
                  <p className="text-xs text-slate-400">Arti simbolik dan teologis di balik lambang resmi Gereja.</p>
                </div>

                <div className="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                  {/* Visual Render of Logo Symbol */}
                  <div className="md:col-span-5 flex flex-col items-center justify-center p-6 bg-slate-50 rounded-2xl border border-slate-100">
                    <div className="w-40 h-40 rounded-full bg-blue-900 flex flex-col items-center justify-center p-4 shadow-lg text-center relative overflow-hidden border-4 border-amber-400">
                      <div className="absolute top-2 opacity-10 font-bold text-[80px] select-none text-white font-display">Y</div>
                      <Church className="w-12 h-12 text-amber-400 z-10" />
                      <span className="text-white font-bold text-[10px] tracking-wide mt-2 uppercase z-10">GEREJA BAPTIS</span>
                      <span className="text-amber-300 font-extrabold text-[12px] tracking-widest uppercase z-10">YOHANES</span>
                      <span className="text-slate-300 font-semibold text-[8px] tracking-wider uppercase z-10">ENTROP</span>
                    </div>
                    <span className="text-[10px] text-slate-400 font-semibold mt-4 text-center">Lambang Resmi GBY Entrop - Papua</span>
                  </div>

                  {/* Logo Symbol Explanation */}
                  <div className="md:col-span-7 space-y-4">
                    <h3 className="text-sm font-bold text-slate-800 uppercase tracking-wide">Makna Filosofis Lambang:</h3>
                    
                    <div className="space-y-3">
                      {[
                        { title: "Warna Biru Tua (Latar Belakang)", desc: "Melambangkan kedalaman iman, ketenangan rohani, kesetiaan jemaat, serta pengakuan kedaulatan mutlak Allah Bapa." },
                        { title: "Lingkaran Emas/Kuning", desc: "Melambangkan kemuliaan surgawi, kekudusan, keabadian janji Allah, serta penyertaan-Nya yang sempurna atas jemaat." },
                        { title: "Salib & Alkitab Terbuka", desc: "Melambangkan penebusan tuntas Kristus di kayu salib sebagai pusat pemberitaan Injil, serta Alkitab sebagai otoritas mutlak iman." },
                        { title: "Nama 'Yohanes' (Yohanes Pembaptis)", desc: "Representasi nama pelopor baptisan air pertobatan, meneladani komitmennya mempersiapkan jalan bagi kedatangan Tuhan Yesus." }
                      ].map((item, index) => (
                        <div key={index} className="flex items-start space-x-3 text-xs leading-relaxed">
                          <CheckCircle2 className="w-4 h-4 text-emerald-600 shrink-0 mt-0.5" />
                          <div>
                            <span className="font-bold text-blue-950 block">{item.title}</span>
                            <span className="text-slate-500 font-light">{item.desc}</span>
                          </div>
                        </div>
                      ))}
                    </div>
                  </div>
                </div>
              </motion.div>
            )}

            {activeSubTab === 'gembala' && (
              <motion.div 
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                className="space-y-8"
              >
                <div className="border-b border-slate-100 pb-4">
                  <h2 className="text-2xl font-bold font-display text-blue-950">Gembala Sidang</h2>
                  <p className="text-xs text-slate-400">Kepemimpinan pastoral utama yang membimbing jemaat GBY Entrop.</p>
                </div>

                <div className="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                  
                  {/* Photo Frame */}
                  <div className="md:col-span-4 flex flex-col items-center">
                    <div className="w-48 h-56 bg-slate-100 rounded-2xl border-4 border-slate-100 shadow-md overflow-hidden relative group">
                      <div className="absolute inset-0 bg-blue-950/10 group-hover:bg-transparent transition-all duration-300"></div>
                      <div className="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-900 to-blue-950 text-white">
                        <Users className="w-16 h-16 opacity-30" />
                      </div>
                      <div className="absolute bottom-3 left-3 right-3 bg-white/90 backdrop-blur-sm p-2 rounded-lg text-center">
                        <span className="text-[10px] font-bold text-blue-950 block">Gembala Utama</span>
                      </div>
                    </div>
                    <div className="text-center mt-3 space-y-1">
                      <h4 className="text-xs font-bold text-slate-800">Pdt. Yohanes Kogoya, M.Th.</h4>
                      <p className="text-[10px] text-slate-400 font-medium">Gembala Sidang GBY Entrop</p>
                    </div>
                  </div>

                  {/* Biography & Message */}
                  <div className="md:col-span-8 space-y-5">
                    <div className="space-y-1">
                      <span className="text-[10px] text-amber-700 font-bold uppercase tracking-wider">Salam Kasih Gembala</span>
                      <h3 className="text-xl font-bold font-display text-blue-950">Shalom, Damai di Hati!</h3>
                    </div>
                    
                    <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-light italic bg-slate-50 p-4 rounded-xl border border-slate-100">
                      "Kami menyambut Anda sekalian dengan sukacita surgawi di website resmi GBY Entrop. Merupakan kehormatan besar bagi kami untuk melayani, mendoakan, dan berjalan bersama Anda sekalian dalam bertumbuh mengenal pengenalan Kristus yang benar. Jayapura butuh kebenaran Firman, dan gereja siap berdiri sebagai tiang penopang kebenaran tersebut."
                    </p>

                    <div className="space-y-3 text-xs leading-relaxed text-slate-500 font-light">
                      <p>
                        <strong>Pdt. Yohanes Kogoya, M.Th.</strong> telah menggembalakan GBY Entrop sejak tahun 2012 setelah menyelesaikan studi Teologi Pascasarjana. Bersama sang istri, <strong>Ibu Pdt. Maria Kogoya, S.Th.</strong>, beliau berkomitmen membina kerohanian jemaat melalui metode pemuridan Alkitabiah serta mempererat kerukunan iman persaudaraan umat Kristen di tanah Papua.
                      </p>
                      <div className="pt-2 flex items-center space-x-4">
                        <span className="flex items-center space-x-1 text-[11px] font-semibold text-blue-900">
                          <Mail className="w-3.5 h-3.5 text-slate-400" />
                          <span>pdt.yohanes@gbyentrop.org</span>
                        </span>
                      </div>
                    </div>
                  </div>

                </div>
              </motion.div>
            )}

            {activeSubTab === 'struktur' && (
              <motion.div 
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                className="space-y-8"
              >
                <div className="border-b border-slate-100 pb-4">
                  <h2 className="text-2xl font-bold font-display text-blue-950">Struktur Organisasi</h2>
                  <p className="text-xs text-slate-400">Tata kelola administratif dan struktur kepemimpinan jemaat.</p>
                </div>

                {/* Styled Org Chart */}
                <div className="bg-slate-50 p-6 rounded-2xl border border-slate-100 flex flex-col items-center justify-center space-y-6">
                  
                  {/* Top Level: Gembala */}
                  <div className="bg-blue-900 text-white px-5 py-3 rounded-xl shadow-md text-center max-w-xs w-full">
                    <span className="text-[10px] text-amber-300 font-bold uppercase tracking-wider block">Pelindung & Pembina</span>
                    <span className="text-xs font-bold block mt-0.5">Gembala Sidang</span>
                    <span className="text-[10px] opacity-85 block italic">Pdt. Yohanes Kogoya, M.Th.</span>
                  </div>

                  <div className="w-0.5 h-6 bg-slate-300"></div>

                  {/* Middle Level: Penasihat & BPH */}
                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full max-w-lg">
                    <div className="bg-amber-500 text-blue-950 px-4 py-2.5 rounded-xl shadow-sm text-center">
                      <span className="text-[9px] font-bold uppercase block">Dewan Penasihat</span>
                      <span className="text-xs font-bold block">Majelis Jemaat</span>
                    </div>
                    <div className="bg-blue-50 text-blue-950 px-4 py-2.5 rounded-xl border border-blue-100 text-center">
                      <span className="text-[9px] text-blue-900 font-bold uppercase block">Badan Pengurus Harian</span>
                      <span className="text-xs font-bold block">BPH Jemaat GBY</span>
                    </div>
                  </div>

                  <div className="w-0.5 h-6 bg-slate-300"></div>

                  {/* Operational: Sekr & Bend */}
                  <div className="grid grid-cols-2 gap-4 w-full max-w-md">
                    <div className="bg-white px-3 py-2 rounded-lg border border-slate-200 text-center">
                      <span className="text-[9px] text-slate-400 uppercase font-semibold block">Sekretaris</span>
                      <span className="text-xs font-bold text-slate-700">Stefanus Waromi</span>
                    </div>
                    <div className="bg-white px-3 py-2 rounded-lg border border-slate-200 text-center">
                      <span className="text-[9px] text-slate-400 uppercase font-semibold block">Bendahara</span>
                      <span className="text-xs font-bold text-slate-700">Kristina Tabuni</span>
                    </div>
                  </div>

                  <div className="w-0.5 h-6 bg-slate-300"></div>

                  {/* Lower Level: Komisi-Komisi */}
                  <div className="bg-white p-4 rounded-xl border border-slate-200/80 w-full">
                    <span className="text-[10px] text-slate-400 font-bold uppercase text-center block mb-3">Bidang-Bidang Komisi Pelayanan</span>
                    <div className="grid grid-cols-2 sm:grid-cols-4 gap-2">
                      {[
                        "Sekolah Minggu",
                        "Komisi Pemuda",
                        "Komisi Wanita",
                        "Komisi Pria",
                        "Komisi Musik",
                        "Multimedia",
                        "Diakonia",
                        "Misi & PI"
                      ].map((komisi, idx) => (
                        <div key={idx} className="bg-slate-50 p-2.5 rounded-lg border border-slate-100 text-center text-[10px] font-semibold text-slate-600">
                          {komisi}
                        </div>
                      ))}
                    </div>
                  </div>

                </div>
              </motion.div>
            )}

            {activeSubTab === 'pengurus' && (
              <motion.div 
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                className="space-y-6"
              >
                <div className="border-b border-slate-100 pb-4">
                  <h2 className="text-2xl font-bold font-display text-blue-950">Daftar Pengurus & Staff</h2>
                  <p className="text-xs text-slate-400">Pelayan jemaat dan staff sekretariat yang melayani kepengurusan gereja harian.</p>
                </div>

                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  {[
                    { name: "Bpk. Dr. Yakob Wanma", role: "Ketua BPH Jemaat", field: "Pengarah Umum", icon: <Briefcase className="w-5 h-5 text-blue-600" /> },
                    { name: "Bpk. Stefanus Waromi, S.E.", role: "Sekretaris Jemaat", field: "Administrasi & Surat Menyurat", icon: <Mail className="w-5 h-5 text-emerald-600" /> },
                    { name: "Ibu Kristina Tabuni, S.E.", role: "Bendahara Jemaat", field: "Keuangan & Kas Gereja", icon: <Star className="w-5 h-5 text-amber-500" /> },
                    { name: "Sdr. David Kogoya", role: "Ketua Komisi Pemuda (PPA)", field: "Pembinaan Generasi Muda", icon: <Users className="w-5 h-5 text-purple-600" /> },
                    { name: "Ibu Ester Wenda, S.Pd.", role: "Ketua Komisi Sekolah Minggu", field: "Pembinaan Iman Anak", icon: <Trophy className="w-5 h-5 text-rose-500" /> },
                    { name: "Bpk. Markus Pigome, S.Kom.", role: "Kepala Bidang Multimedia", field: "Teknologi & Sound System", icon: <Shield className="w-5 h-5 text-slate-600" /> },
                  ].map((p, idx) => (
                    <div key={idx} className="p-4 bg-slate-50 hover:bg-slate-50/40 rounded-xl border border-slate-150/80 flex items-center space-x-4 transition-colors">
                      <div className="w-10 h-10 rounded-lg bg-white shadow-inner flex items-center justify-center shrink-0 border border-slate-200">
                        {p.icon}
                      </div>
                      <div className="space-y-0.5">
                        <h4 className="text-xs font-bold text-slate-800">{p.name}</h4>
                        <p className="text-[10px] text-blue-900 font-bold uppercase">{p.role}</p>
                        <p className="text-[10px] text-slate-400 font-light">{p.field}</p>
                      </div>
                    </div>
                  ))}
                </div>
              </motion.div>
            )}

          </div>

        </div>
      </div>
    </div>
  );
}
