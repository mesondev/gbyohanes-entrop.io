@extends('layouts.app')

@section('title', 'Persembahan & Donasi - Gereja Baptis Yohanes Entrop')

@section('content')
<div class="font-sans min-h-screen bg-slate-50 py-12 lg:py-16"
     x-data="{
        toastMessage: null,
        
        // Calculator state
        calc: {
            persepuluhan: 0,
            kolekte: 0,
            diakonia: 0,
            misi: 0
        },

        get totalDonation() {
            const p = parseFloat(this.calc.persepuluhan) || 0;
            const k = parseFloat(this.calc.kolekte) || 0;
            const d = parseFloat(this.calc.diakonia) || 0;
            const m = parseFloat(this.calc.misi) || 0;
            return p + k + d + m;
        },

        formatRupiah(amount) {
            return 'Rp ' + amount.toLocaleString('id-ID');
        },

        copyAccountNum(bankName, accNum) {
            navigator.clipboard.writeText(accNum);
            this.toastMessage = `Nomor Rekening ${bankName} (${accNum}) disalin!`;
            setTimeout(() => {
                this.toastMessage = null;
            }, 4000);
        },

        copySummaryText() {
            const totalStr = this.formatRupiah(this.totalDonation);
            const summary = `*RINCIAN DUKUNGAN PERSEMBAHAN*\n📌 Persepuluhan: ${this.formatRupiah(parseFloat(this.calc.persepuluhan) || 0)}\n📌 Kolekte: ${this.formatRupiah(parseFloat(this.calc.kolekte) || 0)}\n📌 Diakonia: ${this.formatRupiah(parseFloat(this.calc.diakonia) || 0)}\n📌 Misi: ${this.formatRupiah(parseFloat(this.calc.misi) || 0)}\n\n*TOTAL PERSEMBAHAN: ${totalStr}*\n\nTuhan Yesus memberkati persembahan sukarela Anda!`;
            navigator.clipboard.writeText(summary);
            this.toastMessage = 'Rincian kalkulasi donasi disalin ke clipboard!';
            setTimeout(() => {
                this.toastMessage = null;
            }, 4000);
        }
     }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        
        <!-- Floating toast notification -->
        <div x-show="toastMessage" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-2 translate-x-2"
             x-transition:enter-end="opacity-100 transform translate-y-0 translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed bottom-6 right-6 z-50 bg-slate-900 text-white px-5 py-3 rounded-xl shadow-2xl flex items-center space-x-2.5 border border-slate-800 text-xs font-semibold"
             x-cloak>
            <i data-lucide="check-circle2" class="w-4 h-4 text-emerald-400"></i>
            <span x-text="toastMessage"></span>
        </div>

        <!-- Header -->
        <div class="text-center space-y-3 mb-10">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">Persembahan Sukarela & Misi</span>
            <h1 class="text-3xl sm:text-4xl font-bold font-display text-blue-950 tracking-tight">
                Donasi & Persembahan Kasih
            </h1>
            <p class="text-sm text-slate-500 max-w-xl mx-auto font-light">
                Dukung pergerakan misi, pembangunan gedung peribadahan, and operasional sekretariat GBY Entrop melalui saluran resmi berikut.
            </p>
        </div>

        <!-- Layout Grid: Left Transfer Options + Right Interactive Calculator -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Bank Transfer & QRIS Options (lg:col-span-7) -->
            <div class="lg:col-span-7 space-y-6">
                
                <!-- QRIS Box -->
                <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm flex flex-col sm:flex-row items-center gap-6">
                    <div class="w-40 h-40 bg-slate-50 rounded-xl p-2.5 border border-slate-200 shrink-0 flex items-center justify-center relative group overflow-hidden">
                        <!-- Simulated QR Code visual pattern -->
                        <div class="w-full h-full bg-[radial-gradient(#1e3b8a_3px,transparent_3px)] [background-size:8px_8px] opacity-80"></div>
                        <div class="absolute inset-0 flex items-center justify-center bg-white/90 backdrop-blur-xs opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="text-[9px] font-bold text-blue-900 uppercase">QRIS GBY Entrop</span>
                        </div>
                    </div>
                    <div class="space-y-3 text-center sm:text-left">
                        <span class="bg-blue-100 text-blue-950 text-[9px] font-bold px-2 py-0.5 rounded uppercase">QRIS Multi-Payment</span>
                        <h3 class="text-base sm:text-lg font-bold font-display text-blue-950">Scan QRIS Resmi Jemaat GBY</h3>
                        <p class="text-xs text-slate-500 leading-relaxed font-light">
                            Mudah memberikan persembahan kolekte harian atau persepuluhan lewat m-Banking (BCA, Mandiri, BNI) atau dompet digital (GOPAY, OVO, Dana, LinkAja).
                        </p>
                        <button x-on:click="alert('QR Code QRIS resmi berhasil diunduh ke galeri perangkat Anda!')"
                                class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl flex items-center justify-center space-x-1.5 cursor-pointer mx-auto sm:mx-0 transition-colors">
                            <i data-lucide="download" class="w-3.5 h-3.5"></i>
                            <span>Download QR Code</span>
                        </button>
                    </div>
                </div>

                <!-- Bank Accounts list -->
                <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm space-y-4">
                    <h3 class="text-sm font-bold text-slate-700 uppercase tracking-wider border-b border-slate-100 pb-2">Transfer Rekening Bank</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        
                        <!-- Account 1: Bank Papua -->
                        <div class="p-5 bg-slate-50 rounded-2xl border border-slate-150 flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden">
                            <div class="space-y-2">
                                <span class="bg-amber-100 text-amber-900 text-[9px] font-bold px-1.5 py-0.5 rounded">BANK PAPUA</span>
                                <div class="space-y-0.5">
                                    <span class="block text-[10px] text-slate-400 uppercase font-semibold">Nomor Rekening:</span>
                                    <span class="block text-base font-mono font-bold text-slate-800 tracking-wide">1010-2030-4050</span>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="block text-[10px] text-slate-400 uppercase font-semibold">Atas Nama:</span>
                                    <span class="block text-xs font-bold text-slate-700">PANITIA PEMBANGUNAN GBY ENTROP</span>
                                </div>
                            </div>
                            <button x-on:click="copyAccountNum('Bank Papua', '101020304050')"
                                    class="mt-4 w-full py-2 bg-white hover:bg-slate-100 border border-slate-200 rounded-lg text-[10px] font-bold text-slate-600 flex items-center justify-center space-x-1 cursor-pointer transition-colors">
                                <i data-lucide="copy" class="w-3.5 h-3.5"></i>
                                <span>Salin No. Rekening</span>
                            </button>
                        </div>

                        <!-- Account 2: Bank Mandiri -->
                        <div class="p-5 bg-slate-50 rounded-2xl border border-slate-150 flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden">
                            <div class="space-y-2">
                                <span class="bg-blue-100 text-blue-900 text-[9px] font-bold px-1.5 py-0.5 rounded">BANK MANDIRI</span>
                                <div class="space-y-0.5">
                                    <span class="block text-[10px] text-slate-400 uppercase font-semibold">Nomor Rekening:</span>
                                    <span class="block text-base font-mono font-bold text-slate-800 tracking-wide">1540-0123-4567</span>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="block text-[10px] text-slate-400 uppercase font-semibold">Atas Nama:</span>
                                    <span class="block text-xs font-bold text-slate-700">GEREJA BAPTIS YOHANES ENTROP</span>
                                </div>
                            </div>
                            <button x-on:click="copyAccountNum('Bank Mandiri', '154001234567')"
                                    class="mt-4 w-full py-2 bg-white hover:bg-slate-100 border border-slate-200 rounded-lg text-[10px] font-bold text-slate-600 flex items-center justify-center space-x-1 cursor-pointer transition-colors">
                                <i data-lucide="copy" class="w-3.5 h-3.5"></i>
                                <span>Salin No. Rekening</span>
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Confirmation Alert -->
                <div class="bg-blue-50/50 p-5 rounded-2xl border border-blue-100 flex items-start space-x-3 text-xs leading-relaxed text-blue-900/90 font-light">
                    <i data-lucide="info" class="w-5 h-5 text-blue-900 shrink-0 mt-0.5"></i>
                    <div>
                        <span class="font-bold block text-blue-950">Konfirmasi Transfer Persembahan:</span>
                        <span>Setelah melakukan transfer bank, jemaat dimohon kesediaannya mengirim foto bukti transfer beserta keterangan (Persepuluhan / Diakonia / Misi) ke nomor WhatsApp Bendahara Gereja (<strong>Kristina Tabuni: 0821-9876-0002</strong>) demi tertib pembukuan administrasi.</span>
                    </div>
                </div>

            </div>

            <!-- Interactive Calculator Panel (lg:col-span-5) -->
            <div class="lg:col-span-5 bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm space-y-6">
                <div class="border-b border-slate-100 pb-4">
                    <h3 class="text-base sm:text-lg font-bold font-display text-blue-950">Kalkulator Persembahan</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Rencanakan rincian nominal persembahan Anda sebelum ditransfer.</p>
                </div>

                <!-- Calculator inputs -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Persepuluhan (Rp)</label>
                        <input type="number"
                               placeholder="Nominal persepuluhan..."
                               x-model.number="calc.persepuluhan"
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/20"
                        />
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Kolekte Raya Jemaat (Rp)</label>
                        <input type="number"
                               placeholder="Nominal kantong kolekte..."
                               x-model.number="calc.kolekte"
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/20"
                        />
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Diakonia Sosial (Rp)</label>
                        <input type="number"
                               placeholder="Nominal dana santunan..."
                               x-model.number="calc.diakonia"
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/20"
                        />
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Dana Misi Pedalaman (Rp)</label>
                        <input type="number"
                               placeholder="Nominal bantuan misionaris..."
                               x-model.number="calc.misi"
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-blue-900/20"
                        />
                    </div>
                </div>

                <!-- Summary Total Output -->
                <div class="bg-blue-950 text-white p-5 rounded-2xl border border-blue-900 flex items-center justify-between shadow-lg">
                    <div>
                        <span class="text-[9px] text-slate-400 font-bold uppercase tracking-wider block">Total Rencana Donasi</span>
                        <span class="text-lg sm:text-xl font-mono font-extrabold text-amber-400" x-text="formatRupiah(totalDonation)"></span>
                    </div>
                    <button x-on:click="copySummaryText()"
                            :disabled="totalDonation === 0"
                            class="px-3.5 py-2 bg-amber-500 hover:bg-amber-600 disabled:opacity-40 disabled:cursor-not-allowed text-blue-950 font-bold text-[10px] rounded-xl flex items-center space-x-1 cursor-pointer transition-colors">
                        <i data-lucide="copy" class="w-3.5 h-3.5"></i>
                        <span>Salin Rincian</span>
                    </button>
                </div>

                <p class="text-[10px] text-slate-400 leading-relaxed text-center font-light">
                    Kalkulator ini hanya merupakan alat bantu perencanaan pribadi, tidak ada data nominal keuangan Anda yang disimpan atau diunggah ke jaringan internet.
                </p>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('alpine:initialized', () => {
        lucide.createIcons();
    });
</script>
@endsection
