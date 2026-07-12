/**
 * @license
 * SPDX-License-Identifier: Apache-2.0
 */

import { useState, useEffect } from 'react';
import Navbar from './components/Navbar';
import Footer from './components/Footer';
import Beranda from './pages/Beranda';
import Profil from './pages/Profil';
import Pelayanan from './pages/Pelayanan';
import Jadwal from './pages/Jadwal';
import Berita from './pages/Berita';
import Galeri from './pages/Galeri';
import Donasi from './pages/Donasi';
import Kontak from './pages/Kontak';
import { ActiveTab } from './types';

export default function App() {
  const [activeTab, setActiveTab] = useState<ActiveTab>('beranda');
  const [activeSubTab, setActiveSubTab] = useState<string>('');

  const handleNavigate = (tab: ActiveTab, subTab?: string) => {
    setActiveTab(tab);
    setActiveSubTab(subTab || '');
    
    // Smooth scroll back to top of page on navigate
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  const renderActivePage = () => {
    switch (activeTab) {
      case 'beranda':
        return <Beranda onNavigate={handleNavigate} />;
      case 'profil':
        return <Profil initialSubTab={activeSubTab} />;
      case 'pelayanan':
        return <Pelayanan initialSubTab={activeSubTab} />;
      case 'jadwal':
        return <Jadwal initialSubTab={activeSubTab} />;
      case 'berita':
        return <Berita initialSubTab={activeSubTab} />;
      case 'galeri':
        return <Galeri />;
      case 'donasi':
        return <Donasi />;
      case 'kontak':
        return <Kontak />;
      default:
        return <Beranda onNavigate={handleNavigate} />;
    }
  };

  return (
    <div className="min-h-screen bg-slate-50 flex flex-col justify-between selection:bg-blue-900 selection:text-white">
      <div>
        {/* Main Header Navigation */}
        <Navbar 
          activeTab={activeTab} 
          activeSubTab={activeSubTab} 
          onNavigate={handleNavigate} 
        />

        {/* Dynamic Page Stage */}
        <main className="relative overflow-hidden min-h-[60vh]">
          {renderActivePage()}
        </main>
      </div>

      {/* Main Footer */}
      <Footer onNavigate={handleNavigate} />
    </div>
  );
}

