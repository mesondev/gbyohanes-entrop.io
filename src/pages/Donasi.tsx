import React, { useState } from 'react';
import { motion } from 'motion/react';
import { 
  Heart, Copy, CheckCircle2, Download, Award, 
  HelpCircle, Gift, Calculator, Sparkles, BookOpen 
} from 'lucide-react';

export default function Donasi() {
  const [copiedBankId, setCopiedBankId] = useState<string | null>(null);
  const [successCalculator, setSuccessCalculator] = useState(false);
  const [calcForm, setCalcForm] = useState({ amount: '', allocation: 'persepuluhan', name: '' });

  const bankAccounts = [
    {
      id: 'bank-papua',
      bankName: 'BANK PAPUA',
      accountNumber: '102-03-04567',
      holderName: 'GEREJA BAPTIS YOHANES ENTROP',
      branch: 'KC Jayapura - Entrop'
    },
    {
      id: 'bank-mandiri',
      bankName: 'BANK MANDIRI',
      accountNumber: '154-00-9876543-2',
      holderName: 'GBY ENTROP JAYAPURA (KAS)',
      branch: 'KCP Jayapura Selatan'
    }
  ];

  const handleCopyAccount = (id: string, num: string) => {
    navigator.clipboard.writeText(num);
    setCopiedBankId(id);
    setTimeout(() => {
      setCopiedBankId(null);
    }, 4000);
  };

  const handleCalcSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!calcForm.amount || parseFloat(calcForm.amount) <= 0) return;
    setSuccessCalculator(true);
  };

  const getEncouragementVerse = () => {
    const verses = [
      { text: "Hendaklah masing-masing memberikan menurut kerelaan hatinya, jangan dengan sedih hati atau karena paksaan, sebab Allah mengasihi orang yang memberi dengan sukacita.", ref: "2 Korintus 9:7" },
      { text: "Muliakanlah TUHAN dengan hartamu dan dengan hasil pertama dari segala penghasilanmu, maka lumbung-lumbungmu akan diisi penuh sampai melimpah-limpah...", ref: "Amsal 3:9-10" },
      { text: "Bawalah seluruh persembahan persepuluhan itu ke dalam rumah perbendaharaan, supaya ada persediaan makanan di rumah-Ku dan ujilah Aku, firman TUHAN semesta alam...", ref: "Maleakhi 3:10" }
    ];
    return verses[Math.floor(Math.random() * verses.length)];
  };

  const verse = getEncouragementVerse();

  return (
    <div className="font-sans min-h-screen bg-slate-50 py-12 lg:py-16">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center space-y-3 mb-10">
          <span className="text-amber-700 font-bold text-xs uppercase tracking-wider">Persembahan Kasih & Persepuluhan</span>
          <h1 className="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
            Mendukung Pelayanan & Misi
          </h1>
          <p className="text-sm text-slate-500 max-w-xl mx-auto font-light">
            "Sebab di mana hartamu berada, di situ juga hatimu berada." (Matius 6:21). Dukung pekabaran Injil dan operasional gereja.
          </p>
        </div>

        {/* Layout: Info + Accounts Grid */}
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start mb-12">
          
          {/* Theological Basis Column */}
          <div className="lg:col-span-4 space-y-6">
            <div className="bg-blue-950 text-white p-6 sm:p-8 rounded-3xl space-y-4 border border-blue-900 shadow-lg relative overflow-hidden">
              <div className="absolute inset-0 opacity-5 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
              
              <div className="w-10 h-10 rounded-xl bg-amber-500 flex items-center justify-center">
                <Gift className="w-6 h-6 text-blue-950" />
              </div>
              
              <h3 className="text-lg font-bold font-display">Mengapa Kita Memberi?</h3>
              <p className="text-xs text-slate-300 leading-relaxed font-light">
                Persembahan dan persepuluhan bukanlah sekadar iuran kewajiban, melainkan ekspresi syukur terdalam atas berkat pemeliharaan Tuhan yang sempurna, sekaligus bukti ketaatan iman untuk mendukung perluasan Kerajaan Allah di tanah Papua.
              </p>
              
              <div className="border-t border-blue-900 pt-4 text-xs italic text-amber-300 font-medium">
                "{verse.text}" <br />
                <span className="text-[10px] text-slate-400 not-italic block mt-1">— {verse.ref}</span>
              </div>
            </div>

            {/* QRIS Card */}
            <div className="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 text-center space-y-4">
              <span className="bg-blue-50 text-blue-900 text-[9px] font-bold px-2 py-0.5 rounded-md uppercase tracking-wider inline-block">
                METODE TRANSFER DIGITAL
              </span>
              <h3 className="text-sm font-bold text-blue-950">Donasi Instan via QRIS</h3>
              
              {/* Dummy QR Block */}
              <div className="w-40 h-40 bg-slate-100 rounded-2xl mx-auto border-2 border-dashed border-slate-200 flex flex-col items-center justify-center p-3 relative overflow-hidden group">
                <div className="grid grid-cols-4 gap-1.5 w-full h-full opacity-60">
                  {Array.from({ length: 16 }).map((_, i) => (
                    <div key={i} className={`rounded-sm ${i % 3 === 0 ? 'bg-slate-800' : 'bg-slate-300'}`}></div>
                  ))}
                </div>
                <div className="absolute inset-0 bg-blue-950/20 backdrop-blur-xs flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                  <span className="text-[10px] font-bold text-white uppercase bg-blue-950 px-2.5 py-1 rounded-md">QRIS GBY ENTROP</span>
                </div>
              </div>
              <p className="text-[10px] text-slate-400 leading-relaxed max-w-xs mx-auto">
                Scan kode QRIS di atas menggunakan aplikasi dompet digital Anda (OVO, GoPay, Dana, LinkAja, Mobile Banking).
              </p>

              <button
                id="download-qris-btn"
                onClick={() => alert('Simulasi: Mengunduh gambar QRIS GBY Entrop (Mock)')}
                className="inline-flex items-center space-x-1.5 text-xs font-semibold text-blue-900 hover:text-blue-950 cursor-pointer"
              >
                <Download className="w-3.5 h-3.5" />
                <span>Unduh Gambar QRIS</span>
              </button>
            </div>
          </div>

          {/* Accounts Column */}
          <div className="lg:col-span-8 space-y-6">
            <h2 className="text-lg font-bold font-display text-blue-950 uppercase tracking-wide border-b border-slate-100 pb-2">
              Nomor Rekening Resmi Gereja
            </h2>
            
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
              {bankAccounts.map((acc) => (
                <div 
                  key={acc.id}
                  className="bg-white rounded-3xl border border-slate-150/80 shadow-sm p-6 sm:p-8 space-y-4 hover:shadow-md transition-shadow relative overflow-hidden group"
                >
                  <div className="flex items-center justify-between border-b border-slate-50 pb-3">
                    <span className="text-sm font-extrabold text-blue-900 tracking-wider font-display uppercase">{acc.bankName}</span>
                    <span className="text-[10px] text-slate-400 font-medium">{acc.branch}</span>
                  </div>

                  <div className="space-y-1">
                    <span className="text-[10px] text-slate-400 font-semibold uppercase tracking-wider block">Nomor Rekening</span>
                    <div className="flex items-center justify-between">
                      <span className="text-base sm:text-lg font-bold font-mono text-slate-800 tracking-wider">
                        {acc.accountNumber}
                      </span>
                      <button
                        id={`copy-bank-btn-${acc.id}`}
                        onClick={() => handleCopyAccount(acc.id, acc.accountNumber)}
                        className={`p-1.5 rounded-lg border transition-all duration-150 cursor-pointer
                          ${copiedBankId === acc.id
                            ? 'bg-emerald-50 border-emerald-200 text-emerald-600'
                            : 'bg-slate-50 border-slate-200 text-slate-400 hover:text-blue-900 hover:bg-slate-100'
                          }`}
                        title="Salin No. Rekening"
                      >
                        {copiedBankId === acc.id ? <CheckCircle2 className="w-4 h-4" /> : <Copy className="w-4 h-4" />}
                      </button>
                    </div>
                  </div>

                  <div className="space-y-0.5">
                    <span className="text-[10px] text-slate-400 font-semibold uppercase tracking-wider block">Atas Nama</span>
                    <span className="text-xs font-bold text-slate-700">{acc.holderName}</span>
                  </div>

                  <div className="text-[10px] text-slate-400 font-light leading-relaxed border-t border-slate-50 pt-3">
                    Harap mencantumkan deskripsi transfer (misal: "Persepuluhan" atau "Diakonia") demi kerapian pembukuan keuangan jemaat harian.
                  </div>
                </div>
              ))}
            </div>

            {/* INTERACTIVE DONATION/ALLOCATION WIDGET */}
            <div className="bg-white rounded-3xl border border-slate-150/80 p-6 sm:p-8 shadow-sm">
              <h3 className="text-base font-bold font-display text-blue-950 mb-4 flex items-center space-x-2">
                <Calculator className="w-5 h-5 text-amber-500" />
                <span>Simulasi & Alokasi Persembahan</span>
              </h3>

              {successCalculator ? (
                <motion.div 
                  initial={{ opacity: 0, scale: 0.95 }}
                  animate={{ opacity: 1, scale: 1 }}
                  className="text-center py-6 space-y-4"
                >
                  <div className="w-12 h-12 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto">
                    <CheckCircle2 className="w-8 h-8" />
                  </div>
                  <h4 className="font-bold text-blue-950 text-base">Alokasi Persembahan Berhasil Dihitung</h4>
                  
                  <div className="bg-slate-50 p-4 rounded-xl border border-slate-100 max-w-sm mx-auto text-xs text-slate-600 space-y-1 text-left">
                    <div className="flex justify-between">
                      <span>Nama Jemaat:</span>
                      <span className="font-semibold text-slate-800">{calcForm.name || 'Jemaat Umum (Hamba Allah)'}</span>
                    </div>
                    <div className="flex justify-between">
                      <span>Kategori Donasi:</span>
                      <span className="font-semibold text-blue-900 uppercase">{calcForm.allocation}</span>
                    </div>
                    <div className="flex justify-between border-t border-slate-200/60 pt-1 font-bold text-blue-950">
                      <span>Jumlah Nominal:</span>
                      <span>Rp {parseFloat(calcForm.amount).toLocaleString('id-ID')} ,-</span>
                    </div>
                  </div>

                  <p className="text-[10px] text-slate-400 font-light leading-relaxed max-w-md mx-auto">
                    Terima kasih atas kebaikan hati Anda mendukung pelayanan kami. Silakan lanjutkan ke transfer bank dengan nominal tersebut di atas. Konfirmasi transfer opsional dapat ditujukan ke No WA Sekretariat Bendahara.
                  </p>

                  <div className="flex justify-center space-x-2">
                    <button
                      id="reset-calc-btn"
                      onClick={() => {
                        setSuccessCalculator(false);
                        setCalcForm({ amount: '', allocation: 'persepuluhan', name: '' });
                      }}
                      className="px-4 py-1.5 bg-slate-100 text-slate-700 hover:bg-slate-200 font-bold text-xs rounded-xl cursor-pointer"
                    >
                      Hitung Baru
                    </button>
                  </div>
                </motion.div>
              ) : (
                <form onSubmit={handleCalcSubmit} className="space-y-4">
                  <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    
                    <div>
                      <label className="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Nama (Opsional / Hamba Allah)
                      </label>
                      <input
                        id="calc-name-input"
                        type="text"
                        placeholder="Masukkan nama"
                        value={calcForm.name}
                        onChange={(e) => setCalcForm({ ...calcForm, name: e.target.value })}
                        className="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/10 focus:border-blue-900"
                      />
                    </div>

                    <div>
                      <label className="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Kategori Persembahan
                      </label>
                      <select
                        id="calc-allocation-select"
                        value={calcForm.allocation}
                        onChange={(e) => setCalcForm({ ...calcForm, allocation: e.target.value })}
                        className="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/10 focus:border-blue-900 bg-white"
                      >
                        <option value="persepuluhan">Persepuluhan (Tithe)</option>
                        <option value="kasih">Persembahan Kasih (Umum)</option>
                        <option value="diakonia">Donasi Sosial Diakonia</option>
                        <option value="pembangunan">Dana Pembangunan Gedung</option>
                        <option value="misi">Dana Misi Pekabaran Injil</option>
                      </select>
                    </div>

                    <div>
                      <label className="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Jumlah Nominal (Rupiah)
                      </label>
                      <input
                        id="calc-amount-input"
                        type="number"
                        required
                        placeholder="Contoh: 150000"
                        value={calcForm.amount}
                        onChange={(e) => setCalcForm({ ...calcForm, amount: e.target.value })}
                        className="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/10 focus:border-blue-900"
                      />
                    </div>

                  </div>

                  <button
                    id="submit-calc-btn"
                    type="submit"
                    className="w-full py-2.5 bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-colors cursor-pointer"
                  >
                    Konfirmasi Simulasi Alokasi
                  </button>
                </form>
              )}
            </div>

          </div>

        </div>
      </div>
    </div>
  );
}
