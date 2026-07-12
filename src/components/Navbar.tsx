import { useState } from 'react';
import { motion, AnimatePresence } from 'motion/react';
import { 
  Menu, X, ChevronDown, Church, Users, Calendar, 
  BookOpen, Image, Heart, MapPin, Info, 
  Music, Laptop, HeartHandshake, Globe, Award, HelpCircle, Phone
} from 'lucide-react';
import { ActiveTab, NavItem } from '../types';

interface NavbarProps {
  activeTab: ActiveTab;
  activeSubTab: string;
  onNavigate: (tab: ActiveTab, subTab?: string) => void;
}

export default function Navbar({ activeTab, activeSubTab, onNavigate }: NavbarProps) {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const [activeDropdown, setActiveDropdown] = useState<ActiveTab | null>(null);

  const navItems: NavItem[] = [
    { key: 'beranda', label: 'Beranda' },
    { 
      key: 'profil', 
      label: 'Profil',
      subItems: [
        { key: 'sejarah', label: 'Sejarah' },
        { key: 'visi-misi', label: 'Visi & Misi' },
        { key: 'logo', label: 'Logo Gereja' },
        { key: 'gembala', label: 'Gembala Sidang' },
        { key: 'struktur', label: 'Struktur Organisasi' },
        { key: 'pengurus', label: 'Pengurus' },
      ]
    },
    { 
      key: 'pelayanan', 
      label: 'Pelayanan',
      subItems: [
        { key: 'ibadah-minggu', label: 'Ibadah Minggu' },
        { key: 'sekolah-minggu', label: 'Sekolah Minggu' },
        { key: 'pemuda', label: 'Pemuda (PPA)' },
        { key: 'remaja', label: 'Remaja' },
        { key: 'wanita', label: 'Kaum Wanita (WBI)' },
        { key: 'pria', label: 'Kaum Pria (PBI)' },
        { key: 'musik', label: 'Musik & Pujian' },
        { key: 'multimedia', label: 'Multimedia & Sound' },
        { key: 'diakonia', label: 'Diakonia' },
        { key: 'misi', label: 'Misi & Penginjilan' },
        { key: 'baptisan', label: 'Baptisan Kudus' },
        { key: 'sidi', label: 'Sidi (Katekisasi)' },
        { key: 'pernikahan', label: 'Pernikahan' },
        { key: 'konseling', label: 'Konseling Pastoral' },
      ]
    },
    { 
      key: 'jadwal', 
      label: 'Jadwal',
      subItems: [
        { key: 'jadwal-ibadah', label: 'Jadwal Ibadah' },
        { key: 'sekolah-minggu', label: 'Sekolah Minggu' },
        { key: 'pemuda', label: 'Pemuda & Remaja' },
        { key: 'doa', label: 'Persekutuan Doa' },
        { key: 'kalender', label: 'Kalender Gerejawi' },
      ]
    },
    { 
      key: 'berita', 
      label: 'Berita',
      subItems: [
        { key: 'berita', label: 'Berita Terbaru' },
        { key: 'warta', label: 'Warta Jemaat' },
        { key: 'renungan', label: 'Renungan Harian' },
      ]
    },
    { 
      key: 'galeri', 
      label: 'Galeri',
      subItems: [
        { key: 'foto', label: 'Foto Kegiatan' },
        { key: 'video', label: 'Video Ibadah & Dokumenter' },
      ]
    },
    { 
      key: 'donasi', 
      label: 'Donasi',
      subItems: [
        { key: 'persembahan', label: 'Persembahan & Persepuluhan' },
      ]
    },
    { 
      key: 'kontak', 
      label: 'Kontak',
      subItems: [
        { key: 'hubungi', label: 'Hubungi Kami' },
        { key: 'lokasi', label: 'Lokasi & Peta' },
        { key: 'faq', label: 'FAQ (Tanya Jawab)' },
      ]
    }
  ];

  const handleItemClick = (tabKey: ActiveTab, subKey?: string) => {
    onNavigate(tabKey, subKey);
    setMobileMenuOpen(false);
    setActiveDropdown(null);
  };

  // Get matching icon for navbar submenus
  const getSubItemIcon = (parentKey: ActiveTab, key: string) => {
    switch (parentKey) {
      case 'profil':
        if (key === 'sejarah') return <Info className="w-4 h-4 text-amber-600" />;
        if (key === 'visi-misi') return <Award className="w-4 h-4 text-blue-600" />;
        if (key === 'logo') return <Church className="w-4 h-4 text-emerald-600" />;
        if (key === 'gembala' || key === 'pengurus' || key === 'struktur') return <Users className="w-4 h-4 text-indigo-600" />;
        return <Info className="w-4 h-4" />;
      case 'pelayanan':
        if (key === 'musik') return <Music className="w-4 h-4 text-red-500" />;
        if (key === 'multimedia') return <Laptop className="w-4 h-4 text-slate-500" />;
        if (key === 'misi') return <Globe className="w-4 h-4 text-teal-600" />;
        if (key === 'diakonia') return <HeartHandshake className="w-4 h-4 text-pink-500" />;
        return <Church className="w-4 h-4 text-blue-500" />;
      case 'jadwal':
        return <Calendar className="w-4 h-4 text-amber-600" />;
      case 'berita':
        return <BookOpen className="w-4 h-4 text-emerald-600" />;
      case 'galeri':
        return <Image className="w-4 h-4 text-purple-600" />;
      case 'donasi':
        return <Heart className="w-4 h-4 text-red-500" />;
      case 'kontak':
        if (key === 'lokasi') return <MapPin className="w-4 h-4 text-red-600" />;
        if (key === 'faq') return <HelpCircle className="w-4 h-4 text-amber-600" />;
        return <Phone className="w-4 h-4 text-blue-600" />;
      default:
        return <Church className="w-4 h-4" />;
    }
  };

  return (
    <nav className="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-md border-b border-slate-100 transition-all duration-200">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex justify-between h-20">
          {/* Logo and Brand */}
          <div className="flex items-center">
            <button 
              id="brand-logo-btn"
              onClick={() => handleItemClick('beranda')}
              className="flex items-center space-x-3 text-left focus:outline-none group"
            >
              <div className="w-12 h-12 rounded-full bg-blue-900 flex items-center justify-center shadow-md shadow-blue-900/10 transition-transform duration-300 group-hover:scale-105">
                <Church className="w-7 h-7 text-amber-400" />
              </div>
              <div>
                <span className="block text-lg font-bold font-display tracking-tight text-blue-950 uppercase leading-none">
                  Gereja Baptis
                </span>
                <span className="block text-sm font-semibold text-amber-700 tracking-wider uppercase">
                  Yohanes Entrop
                </span>
              </div>
            </button>
          </div>

          {/* Desktop Navigation */}
          <div className="hidden lg:flex items-center space-x-1">
            {navItems.map((item) => {
              const isSelected = activeTab === item.key;
              const hasSubItems = !!item.subItems;

              return (
                <div 
                  key={item.key}
                  className="relative group py-2"
                  onMouseEnter={() => hasSubItems && setActiveDropdown(item.key)}
                  onMouseLeave={() => setActiveDropdown(null)}
                >
                  <button
                    id={`nav-item-${item.key}`}
                    onClick={() => !hasSubItems && handleItemClick(item.key)}
                    className={`flex items-center space-x-1 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 focus:outline-none cursor-pointer
                      ${isSelected 
                        ? 'bg-blue-50 text-blue-900 font-semibold border-b-2 border-blue-900 rounded-b-none' 
                        : 'text-slate-600 hover:bg-slate-50 hover:text-blue-950'
                      }`}
                  >
                    <span>{item.label}</span>
                    {hasSubItems && (
                      <ChevronDown className={`w-4 h-4 transition-transform duration-200 group-hover:rotate-180`} />
                    )}
                  </button>

                  {/* Dropdown Menu */}
                  {hasSubItems && (
                    <AnimatePresence>
                      {activeDropdown === item.key && (
                        <motion.div
                          initial={{ opacity: 0, y: 10 }}
                          animate={{ opacity: 1, y: 0 }}
                          exit={{ opacity: 0, y: 5 }}
                          transition={{ duration: 0.15 }}
                          className="absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-slate-100 py-2 z-50 origin-top-left"
                        >
                          <div className="grid grid-cols-1 gap-1 max-h-[80vh] overflow-y-auto px-1.5">
                            {item.subItems?.map((sub) => {
                              const isSubSelected = isSelected && activeSubTab === sub.key;
                              return (
                                <button
                                  key={sub.key}
                                  id={`sub-nav-item-${sub.key}`}
                                  onClick={() => handleItemClick(item.key, sub.key)}
                                  className={`flex items-center space-x-3 w-full text-left px-3 py-2 rounded-lg text-xs font-medium transition-all duration-150 cursor-pointer
                                    ${isSubSelected 
                                      ? 'bg-blue-50 text-blue-950 font-semibold' 
                                      : 'text-slate-600 hover:bg-slate-50 hover:text-blue-900'
                                    }`}
                                >
                                  {getSubItemIcon(item.key, sub.key)}
                                  <span>{sub.label}</span>
                                </button>
                              );
                            })}
                          </div>
                        </motion.div>
                      )}
                    </AnimatePresence>
                  )}
                </div>
              );
            })}
          </div>

          {/* Mobile menu button */}
          <div className="flex items-center lg:hidden">
            <button
              id="mobile-menu-toggle"
              onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
              className="inline-flex items-center justify-center p-2 rounded-lg text-slate-500 hover:text-blue-900 hover:bg-slate-100 focus:outline-none transition-colors duration-150"
              aria-expanded="false"
            >
              <span className="sr-only">Buka menu</span>
              {mobileMenuOpen ? <X className="block h-6 w-6" /> : <Menu className="block h-6 w-6" />}
            </button>
          </div>
        </div>
      </div>

      {/* Mobile Menu Panel */}
      <AnimatePresence>
        {mobileMenuOpen && (
          <motion.div
            initial={{ opacity: 0, height: 0 }}
            animate={{ opacity: 1, height: 'auto' }}
            exit={{ opacity: 0, height: 0 }}
            transition={{ duration: 0.25, ease: 'easeInOut' }}
            className="lg:hidden border-t border-slate-100 bg-slate-50 max-h-[calc(100vh-5rem)] overflow-y-auto"
          >
            <div className="px-2 pt-2 pb-6 space-y-1">
              {navItems.map((item) => {
                const isSelected = activeTab === item.key;
                const hasSubItems = !!item.subItems;

                return (
                  <div key={item.key} className="border-b border-slate-100/50 pb-1 last:border-none">
                    <button
                      id={`mobile-nav-${item.key}`}
                      onClick={() => !hasSubItems && handleItemClick(item.key)}
                      className={`flex items-center justify-between w-full text-left px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors
                        ${isSelected && !hasSubItems
                          ? 'bg-blue-900 text-white' 
                          : 'text-slate-800 hover:bg-slate-100'
                        }`}
                    >
                      <span>{item.label}</span>
                    </button>

                    {/* Subitems on Mobile */}
                    {hasSubItems && (
                      <div className="pl-4 mt-1 grid grid-cols-1 gap-1 border-l-2 border-slate-200 ml-4 py-1">
                        {item.subItems?.map((sub) => {
                          const isSubSelected = isSelected && activeSubTab === sub.key;
                          return (
                            <button
                              key={sub.key}
                              id={`mobile-sub-nav-${sub.key}`}
                              onClick={() => handleItemClick(item.key, sub.key)}
                              className={`flex items-center space-x-2 text-left px-3 py-2 rounded-md text-xs font-medium transition-colors
                                ${isSubSelected 
                                  ? 'bg-blue-50 text-blue-950 font-bold' 
                                  : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900'
                                }`}
                            >
                              {getSubItemIcon(item.key, sub.key)}
                              <span>{sub.label}</span>
                            </button>
                          );
                        })}
                      </div>
                    )}
                  </div>
                );
              })}
            </div>
          </motion.div>
        )}
      </AnimatePresence>
    </nav>
  );
}
