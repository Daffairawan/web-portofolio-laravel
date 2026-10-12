<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revaliano Daffa Irawan | Full-Stack Developer & UI/UX Designer</title>
    <meta name="description" content="Portofolio Revaliano Daffa Irawan - Mahasiswa Informatika Universitas Teknokrat Indonesia, Full-Stack Developer dan UI/UX Designer modern.">
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (CDN dengan Custom Config) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        dark: {
                            DEFAULT: '#090d16',
                            card: '#0f172a',
                            subtle: '#1e293b',
                            border: '#334155',
                        },
                        primary: {
                            DEFAULT: '#f59e0b', // Amber / Gold
                            hover: '#d97706',
                            light: '#fbbf24',
                        },
                        secondary: {
                            DEFAULT: '#38bdf8', // Sky / Cyan
                            hover: '#0284c7',
                            light: '#7dd3fc',
                        },
                        accent: {
                            DEFAULT: '#818cf8', // Indigo / Purple
                            hover: '#6366f1',
                        }
                    },
                    animation: {
                        'typing': 'typing 3s steps(30, end) forwards, blink .75s step-end infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 5s ease-in-out infinite',
                        'spin-slow': 'spin 15s linear infinite',
                    },
                    keyframes: {
                        typing: {
                            '0%': { width: '0' },
                            '100%': { width: '100%' }
                        },
                        blink: {
                            '0%, 100%': { borderColor: 'transparent' },
                            '50%': { borderColor: '#f59e0b' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Ambient Background Grid Pattern */
        .bg-grid-pattern {
            background-size: 40px 40px;
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        }

        .typing-wrapper {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            border-right: 3px solid #f59e0b;
            animation: typing 3.5s steps(32, end) forwards, blink .8s step-end infinite;
        }

        /* Glassmorphism Classes */
        .glass-card {
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card:hover {
            border-color: rgba(245, 158, 11, 0.3);
            box-shadow: 0 10px 30px -10px rgba(245, 158, 11, 0.15);
        }

        /* Scroll Reveal Effect */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .scroll-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body 
    class="bg-dark text-slate-300 font-sans antialiased overflow-x-hidden selection:bg-primary selection:text-dark min-h-screen relative"
    x-data="{ 
        scrolled: false, 
        mobileMenuOpen: false, 
        activeCategory: 'all',
        projectModal: false,
        activeProject: null,
        openProjectDetail(p) {
            this.activeProject = p;
            this.projectModal = true;
        }
    }" 
    @scroll.window="scrolled = (window.pageYOffset > 40)"
>

    <!-- Background Ambient Lights -->
    <div class="fixed top-0 left-1/4 -z-10 w-96 h-96 bg-primary/10 rounded-full blur-3xl pointer-events-none animate-pulse-slow"></div>
    <div class="fixed top-1/3 right-10 -z-10 w-96 h-96 bg-secondary/10 rounded-full blur-3xl pointer-events-none animate-pulse-slow"></div>
    <div class="fixed bottom-10 left-10 -z-10 w-96 h-96 bg-accent/10 rounded-full blur-3xl pointer-events-none animate-pulse-slow"></div>

    <!-- NAVBAR -->
    <nav 
        :class="scrolled ? 'bg-dark/90 backdrop-blur-xl border-b border-slate-800/80 shadow-2xl py-3' : 'bg-transparent py-5'" 
        class="fixed w-full z-50 transition-all duration-300 top-0"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="#home" class="group flex items-center space-x-2 text-xl sm:text-2xl font-bold tracking-tight text-white">
                    <span class="w-9 h-9 rounded-xl bg-gradient-to-tr from-primary to-amber-200 flex items-center justify-center text-dark font-extrabold text-lg shadow-md group-hover:scale-105 transition-transform">
                        R
                    </span>
                    <span>Revaliano<span class="text-primary group-hover:text-secondary transition-colors">.dev</span></span>
                </a>

                <!-- Desktop Nav Links -->
                <div class="hidden lg:flex items-center space-x-1 bg-slate-900/60 border border-slate-800/80 px-4 py-1.5 rounded-full backdrop-blur-md">
                    <a href="#home" class="text-slate-300 hover:text-primary transition-colors px-3 py-1.5 text-sm font-medium rounded-full hover:bg-slate-800/60">Beranda</a>
                    <a href="#about" class="text-slate-300 hover:text-primary transition-colors px-3 py-1.5 text-sm font-medium rounded-full hover:bg-slate-800/60">Tentang</a>
                    <a href="#services" class="text-slate-300 hover:text-primary transition-colors px-3 py-1.5 text-sm font-medium rounded-full hover:bg-slate-800/60">Layanan</a>
                    <a href="#experience" class="text-slate-300 hover:text-primary transition-colors px-3 py-1.5 text-sm font-medium rounded-full hover:bg-slate-800/60">Pengalaman</a>
                    <a href="#portfolio" class="text-slate-300 hover:text-primary transition-colors px-3 py-1.5 text-sm font-medium rounded-full hover:bg-slate-800/60">Portofolio</a>
                    <a href="#certificates" class="text-slate-300 hover:text-primary transition-colors px-3 py-1.5 text-sm font-medium rounded-full hover:bg-slate-800/60">Sertifikat</a>
                    <a href="#contact" class="text-slate-300 hover:text-primary transition-colors px-3 py-1.5 text-sm font-medium rounded-full hover:bg-slate-800/60">Kontak</a>
                </div>

                <!-- Right Action Button -->
                <div class="hidden sm:flex items-center space-x-3">
                    <a href="#contact" class="inline-flex items-center text-sm font-semibold text-dark bg-primary hover:bg-primary-light px-5 py-2.5 rounded-full shadow-[0_0_20px_rgba(245,158,11,0.35)] hover:shadow-[0_0_25px_rgba(245,158,11,0.55)] transition-all transform hover:-translate-y-0.5">
                        <span>Hubungi Saya</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex lg:hidden">
                    <button 
                        @click="mobileMenuOpen = !mobileMenuOpen" 
                        type="button" 
                        class="p-2.5 rounded-xl bg-slate-900 border border-slate-800 text-slate-300 hover:text-white focus:outline-none"
                        aria-label="Toggle Navigation"
                    >
                        <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu Drawer -->
        <div 
            x-show="mobileMenuOpen" 
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="lg:hidden px-4 pt-3 pb-6 bg-slate-950/95 backdrop-blur-2xl border-b border-slate-800 space-y-2 mt-2 shadow-2xl"
        >
            <a @click="mobileMenuOpen = false" href="#home" class="block px-4 py-2.5 rounded-lg text-slate-200 hover:bg-slate-800 hover:text-primary font-medium">Beranda</a>
            <a @click="mobileMenuOpen = false" href="#about" class="block px-4 py-2.5 rounded-lg text-slate-200 hover:bg-slate-800 hover:text-primary font-medium">Tentang</a>
            <a @click="mobileMenuOpen = false" href="#services" class="block px-4 py-2.5 rounded-lg text-slate-200 hover:bg-slate-800 hover:text-primary font-medium">Layanan</a>
            <a @click="mobileMenuOpen = false" href="#experience" class="block px-4 py-2.5 rounded-lg text-slate-200 hover:bg-slate-800 hover:text-primary font-medium">Pengalaman</a>
            <a @click="mobileMenuOpen = false" href="#portfolio" class="block px-4 py-2.5 rounded-lg text-slate-200 hover:bg-slate-800 hover:text-primary font-medium">Portofolio</a>
            <a @click="mobileMenuOpen = false" href="#certificates" class="block px-4 py-2.5 rounded-lg text-slate-200 hover:bg-slate-800 hover:text-primary font-medium">Sertifikat</a>
            <a @click="mobileMenuOpen = false" href="#contact" class="block px-4 py-2.5 rounded-lg text-slate-200 hover:bg-slate-800 hover:text-primary font-medium">Kontak</a>
            <div class="pt-2">
                <a @click="mobileMenuOpen = false" href="#contact" class="block text-center w-full bg-primary hover:bg-primary-light text-dark font-bold py-2.5 rounded-lg shadow-lg">
                    Hubungi Saya
                </a>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="home" class="relative min-h-screen flex items-center justify-center pt-24 pb-16 bg-grid-pattern overflow-hidden">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col-reverse lg:flex-row items-center justify-between gap-12 lg:gap-16">
            
            <!-- Left Text Content -->
            <div class="w-full lg:w-7/12 text-center lg:text-left">
                
                <!-- Availability Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-900/90 border border-slate-700/80 text-xs sm:text-sm font-medium text-slate-300 mb-6 shadow-sm">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                    </span>
                    <span>Tersedia untuk Proyek Web, UI/UX & Kolaborasi</span>
                </div>

                <h2 class="text-secondary font-semibold tracking-wider uppercase text-sm sm:text-base mb-2">
                    Halo Semua, Saya
                </h2>
                
                <!-- Main Name Heading -->
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight mb-4 leading-tight">
                    Revaliano Daffa <span class="bg-gradient-to-r from-primary via-amber-300 to-secondary bg-clip-text text-transparent">Irawan</span>
                </h1>

                <!-- Dynamic Role Typing Subtitle -->
                <div class="text-lg sm:text-2xl font-light text-slate-300 mb-6 min-h-[40px] flex items-center justify-center lg:justify-start">
                    <span>Fokus:</span>&nbsp;
                    <span class="typing-wrapper text-primary font-bold">Full-Stack Developer & UI/UX Designer</span>
                </div>

                <p class="text-slate-400 text-base sm:text-lg mb-8 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                    Mahasiswa S1 Informatika <strong class="text-white">Universitas Teknokrat Indonesia</strong>. Berdedikasi merancang antarmuka web modern dengan performa tinggi, animasi halus, dan arsitektur kode terstruktur.
                </p>

                <!-- Action CTA Buttons -->
                <div class="flex flex-wrap justify-center lg:justify-start gap-4 mb-10">
                    <a href="#portfolio" class="bg-primary hover:bg-primary-light text-dark font-bold py-3.5 px-8 rounded-full shadow-[0_0_20px_rgba(245,158,11,0.4)] hover:shadow-[0_0_30px_rgba(245,158,11,0.6)] transition-all transform hover:-translate-y-1 flex items-center">
                        <span>Jelajahi Portofolio</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <a href="#contact" class="glass-card hover:bg-slate-800 text-white font-semibold py-3.5 px-8 rounded-full transition-all transform hover:-translate-y-1 flex items-center">
                        <span>Hubungi Saya</span>
                    </a>
                </div>

                <!-- Social Proof & Quick Tech Pills -->
                <div class="pt-4 border-t border-slate-800/70 flex flex-wrap items-center justify-center lg:justify-start gap-3 text-xs sm:text-sm text-slate-400">
                    <span class="text-slate-500 font-medium">Sosial Media:</span>
                    <a href="https://github.com/Daffairawan" target="_blank" class="px-3 py-1 rounded-full bg-slate-900 border border-slate-800 hover:border-primary hover:text-white transition-all flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        GitHub
                    </a>
                    <a href="mailto:daffairawan212@gmail.com" class="px-3 py-1 rounded-full bg-slate-900 border border-slate-800 hover:border-primary hover:text-white transition-all flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        daffairawan212@gmail.com
                    </a>
                </div>
            </div>

            <!-- Right Profile Avatar with Glowing Effect -->
            <div class="w-full lg:w-5/12 flex justify-center lg:justify-end">
                <div class="relative">
                    <!-- Spinning Glow Border -->
                    <div class="absolute -inset-3 bg-gradient-to-r from-primary via-secondary to-accent rounded-full blur-xl opacity-40 animate-spin-slow"></div>
                    
                    <div class="relative w-64 h-64 sm:w-80 sm:h-80 md:w-96 md:h-96 rounded-full p-2 bg-gradient-to-tr from-slate-900 via-slate-800 to-slate-950 border border-slate-700 shadow-2xl overflow-hidden flex items-center justify-center">
                        <img 
                            src="{{ asset('images/foto-saya.jpg') }}" 
                            alt="Revaliano Daffa Irawan" 
                            class="w-full h-full object-cover rounded-full filter contrast-105 hover:scale-105 transition-transform duration-500"
                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=800';"
                        >
                    </div>

                    <!-- Floating Badge 1: Web Dev -->
                    <div class="absolute -bottom-2 -left-4 sm:left-0 bg-slate-900/90 border border-slate-700 px-4 py-2 rounded-2xl shadow-xl backdrop-blur-md flex items-center space-x-2 animate-float">
                        <span class="w-3 h-3 rounded-full bg-primary animate-ping"></span>
                        <div class="text-left">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase">Framework</p>
                            <p class="text-xs font-bold text-white">Laravel & Tailwind</p>
                        </div>
                    </div>

                    <!-- Floating Badge 2: UI/UX Designer -->
                    <div class="absolute -top-3 -right-2 sm:right-2 bg-slate-900/90 border border-slate-700 px-4 py-2 rounded-2xl shadow-xl backdrop-blur-md flex items-center space-x-2 animate-float" style="animation-delay: 2.5s;">
                        <span class="text-secondary text-base">✦</span>
                        <div class="text-left">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase">Keahlian</p>
                            <p class="text-xs font-bold text-white">UI/UX & Frontend</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- STATS COUNTER STRIP -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 w-full">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6 glass-card rounded-2xl border border-slate-800/80">
                <div class="text-center p-3 border-r border-slate-800/60 last:border-none">
                    <p class="text-3xl sm:text-4xl font-extrabold text-primary">3+</p>
                    <p class="text-xs sm:text-sm text-slate-400 mt-1 font-medium">Tahun Studi & Eksplorasi</p>
                </div>
                <div class="text-center p-3 md:border-r border-slate-800/60 last:border-none">
                    <p class="text-3xl sm:text-4xl font-extrabold text-secondary">15+</p>
                    <p class="text-xs sm:text-sm text-slate-400 mt-1 font-medium">Proyek & Desain</p>
                </div>
                <div class="text-center p-3 border-r border-slate-800/60 last:border-none">
                    <p class="text-3xl sm:text-4xl font-extrabold text-amber-300">4+</p>
                    <p class="text-xs sm:text-sm text-slate-400 mt-1 font-medium">Sertifikasi & Program</p>
                </div>
                <div class="text-center p-3">
                    <p class="text-3xl sm:text-4xl font-extrabold text-emerald-400">100%</p>
                    <p class="text-xs sm:text-sm text-slate-400 mt-1 font-medium">Komitmen & Ketelitian</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section id="about" class="py-24 bg-slate-900/50 relative border-t border-slate-800/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-reveal">
            
            <!-- Section Title -->
            <div class="text-center mb-16">
                <span class="text-secondary text-xs sm:text-sm uppercase font-bold tracking-widest bg-secondary/10 px-4 py-1.5 rounded-full border border-secondary/20">
                    Tentang Saya
                </span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white mt-4 tracking-tight">
                    Menggabungkan Desain & <span class="text-primary">Rekayasa Kode</span>
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-primary to-secondary mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Story / Bio Column -->
                <div class="lg:col-span-7 space-y-6 text-slate-300 leading-relaxed text-base sm:text-lg">
                    <p>
                        Halo! Saya <strong class="text-white">Revaliano Daffa Irawan</strong>, mahasiswa Informatika di <span class="text-secondary font-semibold">Universitas Teknokrat Indonesia</span> yang berfokus mendalami Full-Stack Web Development dan UI/UX Design.
                    </p>
                    <p>
                        Saya terbiasa menggabungkan pola pikir rekayasa perangkat lunak dengan sensitivitas estetika desain visual. Mulai dari meriset persona pengguna di Figma, menyusun arsitektur basis data MySQL, hingga mengimplementasikan layout dinamis dengan framework Laravel dan Tailwind CSS.
                    </p>

                    <!-- Key Pillars -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4">
                        <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 hover:border-primary/40 transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center font-bold text-lg mb-2">
                                01
                            </div>
                            <h4 class="text-white font-bold text-sm mb-1">Clean Architecture</h4>
                            <p class="text-xs text-slate-400">Kode terstruktur, rapi, dan mudah dikembangkan lebih lanjut.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 hover:border-secondary/40 transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-secondary/10 text-secondary flex items-center justify-center font-bold text-lg mb-2">
                                02
                            </div>
                            <h4 class="text-white font-bold text-sm mb-1">User-Centric</h4>
                            <p class="text-xs text-slate-400">Tampilan intuitif dan berpusat pada kenyamanan pengguna.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 hover:border-accent/40 transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-accent/10 text-accent flex items-center justify-center font-bold text-lg mb-2">
                                03
                            </div>
                            <h4 class="text-white font-bold text-sm mb-1">Responsif & Cepat</h4>
                            <p class="text-xs text-slate-400">Performa optimal di berbagai perangkat smartphone hingga desktop.</p>
                        </div>
                    </div>
                </div>

                <!-- Interactive Tech Stack Card with Tabs -->
                <div class="lg:col-span-5" x-data="{ techTab: 'frontend' }">
                    <div class="glass-card rounded-2xl p-6 sm:p-8 border border-slate-800 shadow-xl">
                        <h3 class="text-xl font-bold text-white mb-4 flex items-center justify-between">
                            <span>Skills & Teknologi</span>
                            <span class="text-xs font-normal text-slate-400">Stack Terpilih</span>
                        </h3>

                        <!-- Tab Buttons -->
                        <div class="flex p-1 bg-slate-950/80 rounded-xl mb-6 border border-slate-800">
                            <button 
                                @click="techTab = 'frontend'" 
                                :class="techTab === 'frontend' ? 'bg-primary text-dark font-bold shadow-md' : 'text-slate-400 hover:text-white'"
                                class="flex-1 py-2 text-xs font-semibold rounded-lg transition-all"
                            >
                                Frontend
                            </button>
                            <button 
                                @click="techTab = 'backend'" 
                                :class="techTab === 'backend' ? 'bg-primary text-dark font-bold shadow-md' : 'text-slate-400 hover:text-white'"
                                class="flex-1 py-2 text-xs font-semibold rounded-lg transition-all"
                            >
                                Backend
                            </button>
                            <button 
                                @click="techTab = 'tools'" 
                                :class="techTab === 'tools' ? 'bg-primary text-dark font-bold shadow-md' : 'text-slate-400 hover:text-white'"
                                class="flex-1 py-2 text-xs font-semibold rounded-lg transition-all"
                            >
                                Tools & Design
                            </button>
                        </div>

                        <!-- Tab Content: Frontend -->
                        <div x-show="techTab === 'frontend'" class="space-y-3">
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="font-semibold text-white text-sm">Tailwind CSS</span>
                                <span class="text-xs text-secondary font-mono bg-secondary/10 px-2.5 py-1 rounded-full">Advanced Styling</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="font-semibold text-white text-sm">Alpine.js</span>
                                <span class="text-xs text-primary font-mono bg-primary/10 px-2.5 py-1 rounded-full">Interactive UI</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="font-semibold text-white text-sm">Laravel Blade Engine</span>
                                <span class="text-xs text-amber-300 font-mono bg-amber-500/10 px-2.5 py-1 rounded-full">Templating</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="font-semibold text-white text-sm">Responsive Web Design</span>
                                <span class="text-xs text-emerald-400 font-mono bg-emerald-500/10 px-2.5 py-1 rounded-full">Mobile-First</span>
                            </div>
                        </div>

                        <!-- Tab Content: Backend -->
                        <div x-show="techTab === 'backend'" x-cloak class="space-y-3">
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="font-semibold text-white text-sm">Laravel Framework</span>
                                <span class="text-xs text-red-400 font-mono bg-red-500/10 px-2.5 py-1 rounded-full">MVC Architecture</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="font-semibold text-white text-sm">PHP Modern</span>
                                <span class="text-xs text-indigo-400 font-mono bg-indigo-500/10 px-2.5 py-1 rounded-full">Backend Logic</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="font-semibold text-white text-sm">MySQL Database</span>
                                <span class="text-xs text-cyan-400 font-mono bg-cyan-500/10 px-2.5 py-1 rounded-full">Relational DB</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="font-semibold text-white text-sm">RESTful API Design</span>
                                <span class="text-xs text-emerald-400 font-mono bg-emerald-500/10 px-2.5 py-1 rounded-full">Data Integration</span>
                            </div>
                        </div>

                        <!-- Tab Content: Tools -->
                        <div x-show="techTab === 'tools'" x-cloak class="space-y-3">
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="font-semibold text-white text-sm">Figma & Canva</span>
                                <span class="text-xs text-pink-400 font-mono bg-pink-500/10 px-2.5 py-1 rounded-full">UI/UX Prototyping</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="font-semibold text-white text-sm">Git & GitHub</span>
                                <span class="text-xs text-slate-300 font-mono bg-slate-700 px-2.5 py-1 rounded-full">Version Control</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="font-semibold text-white text-sm">Google AI Studio</span>
                                <span class="text-xs text-blue-400 font-mono bg-blue-500/10 px-2.5 py-1 rounded-full">AI Prompt & APIs</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="font-semibold text-white text-sm">VS Code & Laragon</span>
                                <span class="text-xs text-amber-400 font-mono bg-amber-500/10 px-2.5 py-1 rounded-full">Dev Environment</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SERVICES SECTION (NEW TAILWIND COMPONENT) -->
    <section id="services" class="py-24 bg-slate-950 relative border-t border-slate-800/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <span class="text-primary text-xs sm:text-sm uppercase font-bold tracking-widest bg-primary/10 px-4 py-1.5 rounded-full border border-primary/20">
                    Layanan & Keahlian
                </span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white mt-4 tracking-tight">
                    Solusi yang Dapat Saya <span class="text-secondary">Wujudkan</span>
                </h2>
                <p class="text-slate-400 max-w-2xl mx-auto mt-4 text-sm sm:text-base">
                    Memberikan nilai tambah nyata pada setiap produk digital dengan standar kualitas industri.
                </p>
                <div class="w-20 h-1 bg-gradient-to-r from-primary to-secondary mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Service 1: Web Development -->
                <div class="glass-card rounded-2xl p-7 flex flex-col justify-between hover:-translate-y-2 transition-all duration-300 group scroll-reveal">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-primary/10 border border-primary/20 text-primary flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-primary transition-colors">Web Development</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">
                            Pembuatan website dinamis dan aplikasi web berbasis Laravel & Tailwind CSS dengan kode terstruktur dan aman.
                        </p>
                    </div>
                    <ul class="text-xs text-slate-400 space-y-2 border-t border-slate-800/80 pt-4">
                        <li class="flex items-center"><span class="text-primary mr-2">✓</span> CRUD & Sistem Manajemen</li>
                        <li class="flex items-center"><span class="text-primary mr-2">✓</span> Blade Components</li>
                        <li class="flex items-center"><span class="text-primary mr-2">✓</span> Desain Responsif Total</li>
                    </ul>
                </div>

                <!-- Service 2: UI/UX Design -->
                <div class="glass-card rounded-2xl p-7 flex flex-col justify-between hover:-translate-y-2 transition-all duration-300 group scroll-reveal" style="animation-delay: 0.1s;">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-secondary/10 border border-secondary/20 text-secondary flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-secondary transition-colors">UI/UX Design</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">
                            Perancangan antarmuka pengguna interaktif, wireframe, dan prototipe aplikasi yang estetik dan ramah pengguna di Figma.
                        </p>
                    </div>
                    <ul class="text-xs text-slate-400 space-y-2 border-t border-slate-800/80 pt-4">
                        <li class="flex items-center"><span class="text-secondary mr-2">✓</span> Figma Wireframe & Prototype</li>
                        <li class="flex items-center"><span class="text-secondary mr-2">✓</span> Design System & Tokens</li>
                        <li class="flex items-center"><span class="text-secondary mr-2">✓</span> Micro-interaction User Flow</li>
                    </ul>
                </div>

                <!-- Service 3: API & AI Integration -->
                <div class="glass-card rounded-2xl p-7 flex flex-col justify-between hover:-translate-y-2 transition-all duration-300 group scroll-reveal" style="animation-delay: 0.2s;">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-accent/10 border border-accent/20 text-accent flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-accent transition-colors">Integrasi AI & API</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">
                            Penyambungan layanan kecerdasan buatan seperti Google AI Studio (Gemini) dan integrasi REST API modern.
                        </p>
                    </div>
                    <ul class="text-xs text-slate-400 space-y-2 border-t border-slate-800/80 pt-4">
                        <li class="flex items-center"><span class="text-accent mr-2">✓</span> Google AI Studio API</li>
                        <li class="flex items-center"><span class="text-accent mr-2">✓</span> Smart Chatbot / Automation</li>
                        <li class="flex items-center"><span class="text-accent mr-2">✓</span> JSON REST Endpoints</li>
                    </ul>
                </div>

                <!-- Service 4: Website Optimization -->
                <div class="glass-card rounded-2xl p-7 flex flex-col justify-between hover:-translate-y-2 transition-all duration-300 group scroll-reveal" style="animation-delay: 0.3s;">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-emerald-400 transition-colors">Performa & SEO</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">
                            Optimasi kecepatan rendering halaman, asset bundling, serta penerapan standar SEO ramah mesin pencari.
                        </p>
                    </div>
                    <ul class="text-xs text-slate-400 space-y-2 border-t border-slate-800/80 pt-4">
                        <li class="flex items-center"><span class="text-emerald-400 mr-2">✓</span> Semantic HTML5 Tags</li>
                        <li class="flex items-center"><span class="text-emerald-400 mr-2">✓</span> Tailwind Utility Purging</li>
                        <li class="flex items-center"><span class="text-emerald-400 mr-2">✓</span> Fast Load Performance</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- EXPERIENCE & EDUCATION SECTION -->
    <section id="experience" class="py-24 bg-slate-900/60 relative border-t border-slate-800/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <span class="text-secondary text-xs sm:text-sm uppercase font-bold tracking-widest bg-secondary/10 px-4 py-1.5 rounded-full border border-secondary/20">
                    Jejak Langkah
                </span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white mt-4 tracking-tight">
                    Pengalaman & <span class="text-primary">Pendidikan</span>
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-primary to-secondary mx-auto mt-4 rounded-full"></div>
            </div>
            
            <div class="relative border-l-2 border-slate-800 max-w-4xl mx-auto pl-6 sm:pl-10 space-y-12">
                @forelse($experiences as $index => $exp)
                <div class="relative scroll-reveal group">
                    <!-- Timeline Glowing Node -->
                    <div class="absolute -left-[31px] sm:-left-[47px] mt-1.5 w-5 h-5 rounded-full bg-slate-900 border-4 border-primary group-hover:border-secondary transition-all duration-300 shadow-[0_0_15px_rgba(245,158,11,0.6)]"></div>
                    
                    <div class="glass-card p-6 sm:p-8 rounded-2xl border border-slate-800 hover:border-primary/50 transition-all duration-300 transform group-hover:-translate-y-1">
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                            <span class="inline-flex items-center px-3.5 py-1 rounded-full bg-primary/10 border border-primary/20 text-primary text-xs font-bold tracking-wide">
                                📅 {{ \Carbon\Carbon::parse($exp->start_date)->format('Y') }}
                            </span>
                            <span class="text-xs text-slate-500 font-medium">Pengalaman Terverifikasi</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-white mb-1 group-hover:text-primary transition-colors">
                            {{ $exp->title }}
                        </h3>
                        <h4 class="text-sm sm:text-base text-secondary font-semibold mb-4">
                            🏢 {{ $exp->organization }}
                        </h4>
                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                            {{ $exp->description }}
                        </p>
                    </div>
                </div>
                @empty
                <!-- Fallback item if database has not run seeder yet -->
                <div class="relative scroll-reveal group">
                    <div class="absolute -left-[31px] sm:-left-[47px] mt-1.5 w-5 h-5 rounded-full bg-slate-900 border-4 border-primary shadow-[0_0_15px_rgba(245,158,11,0.6)]"></div>
                    <div class="glass-card p-6 sm:p-8 rounded-2xl border border-slate-800">
                        <span class="inline-flex items-center px-3.5 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold mb-3">
                            2023 - Sekarang
                        </span>
                        <h3 class="text-xl sm:text-2xl font-bold text-white mb-1">Informatics Engineering</h3>
                        <h4 class="text-secondary font-semibold mb-2">Universitas Teknokrat Indonesia</h4>
                        <p class="text-slate-300 text-sm sm:text-base">Mempelajari rekayasa perangkat lunak, algoritma struktur data, pemrograman web, dan perancangan antarmuka.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CERTIFICATES & ACCOLADES SECTION (NEW TAILWIND COMPONENT) -->
    <section id="certificates" class="py-24 bg-slate-950 relative border-t border-slate-800/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <span class="text-accent text-xs sm:text-sm uppercase font-bold tracking-widest bg-accent/10 px-4 py-1.5 rounded-full border border-accent/20">
                    Pencapaian & Lisensi
                </span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white mt-4 tracking-tight">
                    Sertifikasi & <span class="text-primary">Penghargaan</span>
                </h2>
                <p class="text-slate-400 max-w-2xl mx-auto mt-4 text-sm sm:text-base">
                    Komitmen berkelanjutan dalam mengasah kemampuan teknis di berbagai kompetisi dan platform internasional.
                </p>
                <div class="w-20 h-1 bg-gradient-to-r from-primary to-accent mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Cert 1 -->
                <div class="glass-card rounded-2xl p-6 border border-slate-800 flex flex-col justify-between hover:border-primary/50 transition-all duration-300 group scroll-reveal">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl">🏆</span>
                            <span class="text-[10px] font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30 px-2.5 py-1 rounded-full">
                                Challenge Winner
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-white group-hover:text-primary transition-colors mb-2">
                            #JuaraVibeCoding
                        </h3>
                        <p class="text-xs text-secondary font-medium mb-3">Tech Community Challenge (2024)</p>
                        <p class="text-xs text-slate-400 leading-relaxed">
                            Penghargaan partisipasi aktif dalam coding challenge membuat aplikasi web canggih dan inovatif.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-400">
                        <span>Status: Verified</span>
                        <span class="text-primary font-semibold">2024</span>
                    </div>
                </div>

                <!-- Cert 2 -->
                <div class="glass-card rounded-2xl p-6 border border-slate-800 flex flex-col justify-between hover:border-secondary/50 transition-all duration-300 group scroll-reveal" style="animation-delay: 0.1s;">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl">☁️</span>
                            <span class="text-[10px] font-bold uppercase tracking-wider bg-sky-500/20 text-sky-300 border border-sky-500/30 px-2.5 py-1 rounded-full">
                                Verified Certificate
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-white group-hover:text-secondary transition-colors mb-2">
                            IBM SkillsBuild
                        </h3>
                        <p class="text-xs text-secondary font-medium mb-3">Dicoding & IBM Platform (2025)</p>
                        <p class="text-xs text-slate-400 leading-relaxed">
                            Sertifikasi penyelesaian program Cloud Computing, Artificial Intelligence, dan Cybersecurity fundamental.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-400">
                        <span>Penyelenggara: IBM</span>
                        <span class="text-secondary font-semibold">2025</span>
                    </div>
                </div>

                <!-- Cert 3 -->
                <div class="glass-card rounded-2xl p-6 border border-slate-800 flex flex-col justify-between hover:border-accent/50 transition-all duration-300 group scroll-reveal" style="animation-delay: 0.2s;">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl">⚡</span>
                            <span class="text-[10px] font-bold uppercase tracking-wider bg-indigo-500/20 text-indigo-300 border border-indigo-500/30 px-2.5 py-1 rounded-full">
                                Active Community
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-white group-hover:text-accent transition-colors mb-2">
                            Google Developer Program
                        </h3>
                        <p class="text-xs text-secondary font-medium mb-3">Google Developers (2024)</p>
                        <p class="text-xs text-slate-400 leading-relaxed">
                            Anggota aktif ekosistem Google Developer dalam mengeksplorasi Web Technologies dan Generative AI.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-400">
                        <span>Ekosistem: Google</span>
                        <span class="text-accent font-semibold">2024</span>
                    </div>
                </div>

                <!-- Cert 4 -->
                <div class="glass-card rounded-2xl p-6 border border-slate-800 flex flex-col justify-between hover:border-emerald-500/50 transition-all duration-300 group scroll-reveal" style="animation-delay: 0.3s;">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl">🎓</span>
                            <span class="text-[10px] font-bold uppercase tracking-wider bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 px-2.5 py-1 rounded-full">
                                Academic Honors
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-white group-hover:text-emerald-400 transition-colors mb-2">
                            Informatics Excellence
                        </h3>
                        <p class="text-xs text-secondary font-medium mb-3">Universitas Teknokrat Indonesia</p>
                        <p class="text-xs text-slate-400 leading-relaxed">
                            Eksplorasi akademik berkelanjutan dalam Rekayasa Web, Basis Data Lanjut, dan Pemrograman Terstruktur.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-400">
                        <span>Kampus: UTI</span>
                        <span class="text-emerald-400 font-semibold">Aktif</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- PORTFOLIO SECTION (WITH TAILWIND FILTER & MODAL POPUP) -->
    <section id="portfolio" class="py-24 bg-slate-900/60 relative border-t border-slate-800/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 scroll-reveal">
                <span class="text-primary text-xs sm:text-sm uppercase font-bold tracking-widest bg-primary/10 px-4 py-1.5 rounded-full border border-primary/20">
                    Karya Pilihan
                </span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white mt-4 tracking-tight">
                    Proyek & Eksplorasi <span class="text-primary">Terbaru</span>
                </h2>
                <p class="text-slate-400 max-w-xl mx-auto mt-4 text-sm sm:text-base">
                    Klik pada kartu proyek untuk melihat deskripsi detail, arsitektur, dan teknologi yang digunakan.
                </p>
                <div class="w-20 h-1 bg-gradient-to-r from-primary to-secondary mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Dynamic Category Filter Buttons (Alpine.js) -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 mb-14 scroll-reveal">
                <button 
                    @click="activeCategory = 'all'" 
                    :class="activeCategory === 'all' ? 'bg-primary text-dark font-bold shadow-lg shadow-primary/30' : 'bg-slate-900 text-slate-300 hover:text-white border border-slate-800'"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm transition-all duration-200"
                >
                    Semua Proyek
                </button>
                <button 
                    @click="activeCategory = 'web'" 
                    :class="activeCategory === 'web' ? 'bg-primary text-dark font-bold shadow-lg shadow-primary/30' : 'bg-slate-900 text-slate-300 hover:text-white border border-slate-800'"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm transition-all duration-200"
                >
                    Web Development
                </button>
                <button 
                    @click="activeCategory = 'uiux'" 
                    :class="activeCategory === 'uiux' ? 'bg-primary text-dark font-bold shadow-lg shadow-primary/30' : 'bg-slate-900 text-slate-300 hover:text-white border border-slate-800'"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm transition-all duration-200"
                >
                    UI/UX Design
                </button>
                <button 
                    @click="activeCategory = 'ai'" 
                    :class="activeCategory === 'ai' ? 'bg-primary text-dark font-bold shadow-lg shadow-primary/30' : 'bg-slate-900 text-slate-300 hover:text-white border border-slate-800'"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm transition-all duration-200"
                >
                    AI & Sistem Cerdas
                </button>
            </div>

            <!-- Project Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects as $project)
                @php
                    // Deteksi kategori otomatis dari judul/tech_stack
                    $lowerTitle = strtolower($project->title . ' ' . $project->tech_stack);
                    $categoryTag = 'web';
                    if (str_contains($lowerTitle, 'figma') || str_contains($lowerTitle, 'ui/ux') || str_contains($lowerTitle, 'canva')) {
                        $categoryTag = 'uiux';
                    } elseif (str_contains($lowerTitle, 'ai') || str_contains($lowerTitle, 'bot') || str_contains($lowerTitle, 'machine')) {
                        $categoryTag = 'ai';
                    }
                @endphp
                <div 
                    x-show="activeCategory === 'all' || activeCategory === '{{ $categoryTag }}'"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="scroll-reveal group glass-card rounded-2xl overflow-hidden border border-slate-800 hover:border-primary/50 transition-all duration-300 flex flex-col justify-between"
                >
                    <div>
                        <!-- Thumbnail Image -->
                        <div class="aspect-video relative overflow-hidden bg-slate-950">
                            <img 
                                src="{{ $project->image_path ?? 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80&w=800' }}" 
                                alt="{{ $project->title }}" 
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out opacity-85 group-hover:opacity-100"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-dark via-transparent to-transparent opacity-80"></div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-3 left-3">
                                <span class="text-[10px] font-bold uppercase tracking-wider bg-dark/80 backdrop-blur-md text-secondary border border-secondary/30 px-3 py-1 rounded-full">
                                    {{ strtoupper($categoryTag) }}
                                </span>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white group-hover:text-primary transition-colors mb-2">
                                {{ $project->title }}
                            </h3>
                            <p class="text-slate-400 text-sm line-clamp-3 mb-4 leading-relaxed">
                                {{ $project->description }}
                            </p>

                            <!-- Tech Stack Pills -->
                            <div class="flex flex-wrap gap-1.5 mb-2">
                                @php
                                    $techs = explode(',', $project->tech_stack);
                                @endphp
                                @foreach($techs as $tech)
                                    <span class="text-xs font-semibold bg-slate-800 text-slate-300 border border-slate-700 px-2.5 py-1 rounded-md">
                                        {{ trim($tech) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Footer Action -->
                    <div class="p-6 pt-0">
                        <button 
                            @click="openProjectDetail({
                                title: '{{ addslashes($project->title) }}',
                                description: '{{ addslashes($project->description) }}',
                                tech_stack: '{{ addslashes($project->tech_stack) }}',
                                image: '{{ $project->image_path }}',
                                category: '{{ strtoupper($categoryTag) }}'
                            })" 
                            type="button" 
                            class="w-full py-2.5 px-4 rounded-xl bg-slate-800/80 hover:bg-primary hover:text-dark text-slate-200 text-xs sm:text-sm font-semibold transition-all duration-300 flex items-center justify-center gap-2 border border-slate-700 hover:border-primary"
                        >
                            <span>Lihat Detail Proyek</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </button>
                    </div>
                </div>
                @empty
                <!-- Fallback Projects -->
                <div class="col-span-full text-center py-12 glass-card rounded-2xl">
                    <p class="text-slate-400">Proyek sedang dimuat atau diperbarui.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- MODAL DETAIL PROYEK (ALPHINE.JS & TAILWIND) -->
    <div 
        x-show="projectModal" 
        x-cloak 
        class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4"
        style="background: rgba(0, 0, 0, 0.85); backdrop-filter: blur(8px);"
    >
        <div 
            @click.away="projectModal = false"
            x-show="projectModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="glass-card bg-slate-900 border border-slate-700 rounded-3xl max-w-2xl w-full overflow-hidden shadow-2xl relative"
        >
            <!-- Close Button -->
            <button 
                @click="projectModal = false" 
                class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-slate-950/80 text-slate-300 hover:text-white border border-slate-700 flex items-center justify-center transition-colors"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <!-- Modal Image -->
            <div class="aspect-video w-full bg-slate-950 overflow-hidden relative">
                <img :src="activeProject ? activeProject.image : ''" :alt="activeProject ? activeProject.title : ''" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
            </div>

            <!-- Modal Content Body -->
            <div class="p-6 sm:p-8 space-y-4">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider bg-primary/20 text-primary border border-primary/30 px-3 py-1 rounded-full" x-text="activeProject ? activeProject.category : ''"></span>
                    <span class="text-xs text-slate-400">Proyek Unggulan</span>
                </div>
                
                <h3 class="text-2xl sm:text-3xl font-extrabold text-white" x-text="activeProject ? activeProject.title : ''"></h3>
                
                <p class="text-slate-300 leading-relaxed text-sm sm:text-base" x-text="activeProject ? activeProject.description : ''"></p>
                
                <div class="pt-4 border-t border-slate-800">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Teknologi yang Digunakan:</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="text-xs font-semibold bg-slate-800 text-secondary border border-slate-700 px-3 py-1.5 rounded-lg" x-text="activeProject ? activeProject.tech_stack : ''"></span>
                    </div>
                </div>

                <div class="pt-4 flex justify-end gap-3">
                    <button @click="projectModal = false" type="button" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-sm font-semibold transition-colors">
                        Tutup
                    </button>
                    <a href="#contact" @click="projectModal = false" class="px-5 py-2.5 rounded-xl bg-primary hover:bg-primary-light text-dark text-sm font-bold shadow-lg transition-colors">
                        Diskusikan Proyek Serupa
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTACT SECTION -->
    <section id="contact" class="py-24 bg-slate-950 relative border-t border-slate-800/60 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 scroll-reveal">
                <span class="text-primary text-xs sm:text-sm uppercase font-bold tracking-widest bg-primary/10 px-4 py-1.5 rounded-full border border-primary/20">
                    Terhubung
                </span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white mt-4 tracking-tight">
                    Hubungi <span class="text-primary">Saya</span>
                </h2>
                <p class="mt-4 text-slate-400 max-w-xl mx-auto text-sm sm:text-base">
                    Punya ide proyek, tawaran magang, atau ingin berdiskusi seputar web development? Kirimkan pesan Anda di bawah.
                </p>
                <div class="w-20 h-1 bg-gradient-to-r from-primary to-secondary mx-auto mt-4 rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start max-w-6xl mx-auto">
                
                <!-- Contact Info Cards (Left Column) -->
                <div class="lg:col-span-5 space-y-6 scroll-reveal">
                    
                    <div class="glass-card p-6 rounded-2xl border border-slate-800 flex items-start space-x-4">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 border border-primary/20 text-primary flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-slate-400 uppercase tracking-wide">Email</h4>
                            <p class="text-white font-bold mt-1">daffairawan212@gmail.com</p>
                            <p class="text-xs text-slate-500 mt-1">Balasan cepat dalam 24 jam</p>
                        </div>
                    </div>

                    <div class="glass-card p-6 rounded-2xl border border-slate-800 flex items-start space-x-4">
                        <div class="w-12 h-12 rounded-xl bg-secondary/10 border border-secondary/20 text-secondary flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-slate-400 uppercase tracking-wide">Lokasi & Kampus</h4>
                            <p class="text-white font-bold mt-1">Universitas Teknokrat Indonesia</p>
                            <p class="text-xs text-slate-500 mt-1">Bandar Lampung, Indonesia</p>
                        </div>
                    </div>

                    <div class="glass-card p-6 rounded-2xl border border-slate-800 flex items-start space-x-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-slate-400 uppercase tracking-wide">Status Kerja</h4>
                            <p class="text-white font-bold mt-1">Open to Intern & Freelance</p>
                            <p class="text-xs text-slate-500 mt-1">Siap berkontribusi remote / on-site</p>
                        </div>
                    </div>

                </div>

                <!-- Contact Form (Right Column) -->
                <div class="lg:col-span-7 glass-card p-8 sm:p-10 rounded-3xl border border-slate-800 shadow-2xl scroll-reveal">
                    
                    @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)" class="mb-6 bg-emerald-500/15 border border-emerald-500/50 text-emerald-300 px-4 py-3.5 rounded-xl flex items-center justify-between">
                        <div class="flex items-center text-sm font-semibold">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button @click="show = false" class="text-emerald-400 hover:text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Nama Lengkap</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    required 
                                    class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all text-sm" 
                                    placeholder="Contoh: Revaliano Daffa"
                                >
                            </div>
                            <div>
                                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Alamat Email</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    required 
                                    class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all text-sm" 
                                    placeholder="daffa@example.com"
                                >
                            </div>
                        </div>
                        <div>
                            <label for="content" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Pesan atau Diskusi Proyek</label>
                            <textarea 
                                name="content" 
                                id="content" 
                                rows="5" 
                                required 
                                class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all text-sm resize-none" 
                                placeholder="Tuliskan pesan Anda secara lengkap di sini..."
                            ></textarea>
                        </div>
                        <div class="text-right">
                            <button 
                                type="submit" 
                                class="w-full sm:w-auto bg-primary hover:bg-primary-light text-dark font-extrabold py-3.5 px-10 rounded-xl shadow-[0_0_20px_rgba(245,158,11,0.35)] hover:shadow-[0_0_30px_rgba(245,158,11,0.6)] transition-all transform hover:-translate-y-0.5 flex items-center justify-center"
                            >
                                <span>Kirim Pesan Sekarang</span>
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-slate-950 border-t border-slate-800/80 py-12 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <!-- Brand Info -->
                <div class="text-center md:text-left">
                    <a href="#home" class="text-2xl font-extrabold text-white tracking-wider">
                        Revaliano Daffa Irawan<span class="text-primary">.</span>
                    </a>
                    <p class="text-slate-500 text-xs sm:text-sm mt-1">
                        Informatics Student & Full-Stack Developer • Universitas Teknokrat Indonesia
                    </p>
                </div>

                <!-- Footer Nav Links -->
                <div class="flex flex-wrap justify-center gap-6 text-xs sm:text-sm text-slate-400">
                    <a href="#home" class="hover:text-primary transition-colors">Beranda</a>
                    <a href="#about" class="hover:text-primary transition-colors">Tentang</a>
                    <a href="#services" class="hover:text-primary transition-colors">Layanan</a>
                    <a href="#experience" class="hover:text-primary transition-colors">Pengalaman</a>
                    <a href="#portfolio" class="hover:text-primary transition-colors">Portofolio</a>
                    <a href="#certificates" class="hover:text-primary transition-colors">Sertifikat</a>
                    <a href="#contact" class="hover:text-primary transition-colors">Kontak</a>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-slate-900 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <p>&copy; {{ date('Y') }} Revaliano Daffa Irawan. Hak Cipta Dilindungi.</p>
                <p class="flex items-center gap-1">
                    Dibuat dengan <span class="text-red-500">♥</span> menggunakan 
                    <span class="text-slate-300 font-semibold">Laravel & Tailwind CSS</span>
                </p>
            </div>
        </div>
    </footer>

    <!-- FLOATING BACK TO TOP BUTTON (ALPHINE.JS) -->
    <button 
        x-show="scrolled" 
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })" 
        type="button" 
        class="fixed bottom-6 right-6 z-40 w-12 h-12 rounded-full bg-primary hover:bg-primary-light text-dark shadow-[0_0_20px_rgba(245,158,11,0.5)] flex items-center justify-center transition-all transform hover:scale-110 focus:outline-none"
        aria-label="Kembali ke atas"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
    </button>

    <!-- Scroll Reveal JavaScript Trigger -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const reveals = document.querySelectorAll('.scroll-reveal');
            
            const revealOnScroll = () => {
                for (let i = 0; i < reveals.length; i++) {
                    const windowHeight = window.innerHeight;
                    const elementTop = reveals[i].getBoundingClientRect().top;
                    const elementVisible = 90;
                    
                    if (elementTop < windowHeight - elementVisible) {
                        reveals[i].classList.add('active');
                    }
                }
            };
            
            window.addEventListener('scroll', revealOnScroll);
            revealOnScroll(); // Trigger initial on load
        });
    </script>
</body>
</html>
