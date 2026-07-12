import { Church, MapPin, Phone, Mail, Clock, Heart } from 'lucide-react';
import { ActiveTab } from '../types';

interface FooterProps {
  onNavigate: (tab: ActiveTab, subTab?: string) => void;
}

export default function Footer({ onNavigate }: FooterProps) {
  const currentYear = new Date().getFullYear();

  return (
    <footer className="bg-blue-950 text-slate-300 font-sans border-t border-blue-900">
      {/* Upper Footer: Quick Info & Links */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
          
          {/* Column 1: Church Brand & Statement */}
          <div className="space-y-4">
            <div className="flex items-center space-x-3">
              <div className="w-10 h-10 rounded-full bg-amber-500 flex items-center justify-center">
                <Church className="w-6 h-6 text-blue-950" />
              </div>
              <span className="font-display font-bold text-lg text-white tracking-wide uppercase">
                Gereja Baptis Yohanes
              </span>
            </div>
            <p className="text-xs text-slate-400 leading-relaxed font-light">
              Menjadi garam dan terang dunia di tanah Papua, memberitakan Injil keselamatan Yesus Kristus, mendidik jemaat dalam kebenaran Firman, dan bertumbuh dalam kasih persaudaraan yang sejati.
            </p>
            <div className="flex items-center space-x-2 text-xs text-amber-400 font-medium pt-2">
              <Clock className="w-4 h-4" />
              <span>Ibadah Raya: Minggu, 09:00 WIT</span>
            </div>
          </div>

          {/* Column 2: Quick Links */}
          <div>
            <h3 className="text-sm font-semibold font-display text-white uppercase tracking-wider mb-4 border-l-2 border-amber-500 pl-2">
              Navigasi Cepat
            </h3>
            <ul className="space-y-2.5 text-xs font-medium">
              {[
                { label: 'Beranda', tab: 'beranda' as ActiveTab },
                { label: 'Tentang & Sejarah', tab: 'profil' as ActiveTab, sub: 'sejarah' },
                { label: 'Pelayanan Jemaat', tab: 'pelayanan' as ActiveTab, sub: 'ibadah-minggu' },
                { label: 'Jadwal Kebaktian', tab: 'jadwal' as ActiveTab, sub: 'jadwal-ibadah' },
                { label: 'Warta & Renungan', tab: 'berita' as ActiveTab, sub: 'warta' },
                { label: 'Persembahan Kasih', tab: 'donasi' as ActiveTab, sub: 'persembahan' },
              ].map((link, index) => (
                <li key={index}>
                  <button
                    onClick={() => onNavigate(link.tab, link.sub)}
                    className="hover:text-amber-400 transition-colors duration-150 focus:outline-none cursor-pointer"
                  >
                    &raquo; {link.label}
                  </button>
                </li>
              ))}
            </ul>
          </div>

          {/* Column 3: Contact & Address */}
          <div>
            <h3 className="text-sm font-semibold font-display text-white uppercase tracking-wider mb-4 border-l-2 border-amber-500 pl-2">
              Sekretariat & Hubungi
            </h3>
            <ul className="space-y-3.5 text-xs leading-relaxed font-light">
              <li className="flex items-start space-x-2.5">
                <MapPin className="w-4 h-4 text-amber-500 shrink-0 mt-0.5" />
                <span>
                  Jl. Raya Jayapura - Kotaraja, Entrop, Distrik Jayapura Selatan, Kota Jayapura, Papua 99224
                </span>
              </li>
              <li className="flex items-center space-x-2.5">
                <Phone className="w-4 h-4 text-amber-500 shrink-0" />
                <span>+62 821-9876-5432</span>
              </li>
              <li className="flex items-center space-x-2.5">
                <Mail className="w-4 h-4 text-amber-500 shrink-0" />
                <span>info@baptisyohanesentrop.org</span>
              </li>
            </ul>
          </div>

          {/* Column 4: Quick Donation Info */}
          <div className="bg-blue-900/40 p-5 rounded-xl border border-blue-900/80 space-y-3">
            <h3 className="text-sm font-semibold font-display text-white flex items-center space-x-2">
              <Heart className="w-4 h-4 text-rose-500 animate-pulse" />
              <span>Dukung Pelayanan</span>
            </h3>
            <p className="text-[11px] text-slate-400 leading-relaxed font-light">
              Mari mengambil bagian dalam mendukung misi dan pelayanan pekabaran Injil melalui persembahan persepuluhan dan kasih jemaat.
            </p>
            <button
              onClick={() => onNavigate('donasi', 'persembahan')}
              className="inline-flex items-center justify-center w-full px-4 py-2 bg-amber-500 hover:bg-amber-600 text-blue-950 font-bold rounded-lg text-xs tracking-wider uppercase transition-colors focus:outline-none cursor-pointer"
            >
              Info Rekening Donasi
            </button>
          </div>

        </div>
      </div>

      {/* Lower Footer: Copyright & Credits */}
      <div className="bg-blue-950 border-t border-slate-900 py-6 text-center text-xs font-light text-slate-500">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
          <p>&copy; {currentYear} Gereja Baptis Yohanes Entrop, Jayapura - Papua. All Rights Reserved.</p>
          <p className="text-[10px] tracking-wide text-slate-600">
            Terang Kristus bagi Tanah Papua &bull; Member dari Persekutuan Gereja-Gereja Baptis Papua
          </p>
        </div>
      </div>
    </footer>
  );
}
