export type ActiveTab = 
  | 'beranda'
  | 'profil'
  | 'pelayanan'
  | 'jadwal'
  | 'berita'
  | 'galeri'
  | 'donasi'
  | 'kontak';

export interface NavItem {
  key: ActiveTab;
  label: string;
  subItems?: {
    key: string;
    label: string;
  }[];
}

export interface NewsItem {
  id: string;
  title: string;
  category: 'berita' | 'warta' | 'renungan';
  date: string;
  author: string;
  excerpt: string;
  content: string;
  image?: string;
  pdfUrl?: string; // For Warta Jemaat
}

export interface GalleryItem {
  id: string;
  type: 'foto' | 'video';
  title: string;
  description: string;
  category?: string;
  thumbnail: string;
  url?: string; // YouTube embed or video source
}

export interface FAQItem {
  question: string;
  answer: string;
  category?: string;
}

export interface ScheduleItem {
  day: string;
  time: string;
  name: string;
  location: string;
  category: 'ibadah' | 'sekolah-minggu' | 'pemuda' | 'doa' | 'kalender';
  description?: string;
}

export interface ProfileSection {
  id: string;
  title: string;
  content: string;
}
