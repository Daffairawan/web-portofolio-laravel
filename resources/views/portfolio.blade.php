<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revaliano Daffa Irawan - Portfolio</title>
    <!-- Tailwind CSS (via CDN for immediate styling, can be replaced with mix/vite in production) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: '#0f172a', // slate-900
                        primary: '#f59e0b', // amber-500 (gold)
                        secondary: '#38bdf8', // sky-400 (neon accent)
                    },
                    animation: {
                        'typing': 'typing 3s steps(30, end), blink .75s step-end infinite',
                        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                    },
                    keyframes: {
                        typing: {
                            '0%': { width: '0' },
                            '100%': { width: '27ch' }
                        },
                        blink: {
                            '0%, 100%': { borderColor: 'transparent' },
                            '50%': { borderColor: '#f59e0b' }
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .typing-container {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            border-right: 3px solid;
            width: 0;
            animation: typing 3s steps(30, end) forwards, blink .75s step-end infinite;
        }
        
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        .scroll-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-dark text-slate-300 font-sans antialiased overflow-x-hidden selection:bg-primary selection:text-dark" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 50)">

    <!-- Navbar -->
    <nav :class="scrolled ? 'bg-dark/90 backdrop-blur-md shadow-lg' : 'bg-transparent'" class="fixed w-full z-50 transition-all duration-300 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="#" class="text-2xl font-bold text-white tracking-wider">
                        Revaliano Daffa Irawan<span class="text-primary">.</span>
                    </a>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-slate-300 hover:text-primary transition-colors px-3 py-2 text-sm font-medium">Home</a>
                    <a href="#about" class="text-slate-300 hover:text-primary transition-colors px-3 py-2 text-sm font-medium">About</a>
                    <a href="#experience" class="text-slate-300 hover:text-primary transition-colors px-3 py-2 text-sm font-medium">Experience</a>
                    <a href="#portfolio" class="text-slate-300 hover:text-primary transition-colors px-3 py-2 text-sm font-medium">Portfolio</a>
                    <a href="#contact" class="text-slate-300 hover:text-primary transition-colors px-3 py-2 text-sm font-medium">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Parallax Background Element -->
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80')] bg-cover bg-center opacity-10 bg-fixed"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-dark/50 to-dark"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col-reverse md:flex-row items-center justify-between mt-16 md:mt-0">
            <div class="w-full md:w-3/5 text-center md:text-left mt-10 md:mt-0">
                <h2 class="text-secondary text-lg font-semibold tracking-wide uppercase mb-2">Halo, nama saya</h2>
                <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-4">Revaliano Daffa Irawan</h1>
                <div class="mb-6 text-xl md:text-3xl font-light text-slate-400 leading-snug">
                    Saya mahasiswa Universitas Teknokrat Indonesia <br>
                    <span class="typing-container text-primary font-bold mt-2 inline-block">Expert Full-Stack Developer</span>
                </div>
                <p class="text-lg text-slate-400 mb-10 max-w-2xl mx-auto md:mx-0 leading-relaxed">
                   Saya mahasiswa Informatika yang fokus di Web Development dan UI/UX. Saya suka bikin tampilan modern, animasi halus, dan pengalaman pengguna yang nyaman.
                </p>
                <div class="flex flex-col sm:flex-row justify-center md:justify-start gap-4">
                    <a href="#portfolio" class="bg-primary hover:bg-amber-600 text-dark font-bold py-3 px-8 rounded-full shadow-[0_0_15px_rgba(245,158,11,0.5)] transition-all transform hover:scale-105">
                        Lihat Portofolio
                    </a>
                    <a href="#contact" class="border-2 border-slate-600 hover:border-primary hover:text-primary text-white font-bold py-3 px-8 rounded-full transition-all transform hover:scale-105">
                        Hubungi Saya
                    </a>
                </div>
            </div>
            <div class="w-full md:w-2/5 flex justify-center md:justify-end">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-primary to-secondary rounded-full blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200 animate-pulse"></div>
                    <img src="{{ asset('images/foto-saya.jpg') }}" alt="Revaliano" class="relative rounded-full w-64 h-64 md:w-80 md:h-80 object-cover border-4 border-slate-800 shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 bg-slate-900 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-reveal">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">Tentang <span class="text-primary">Saya</span></h2>
                <div class="w-24 h-1 bg-gradient-to-r from-primary to-secondary mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-lg text-slate-400 space-y-6 leading-relaxed">
                    <p>
                        Saya adalah seorang <strong>Full-Stack Developer</strong> dan <strong>UI/UX Designer</strong> yang memiliki passion mendalam dalam membangun aplikasi web yang tidak hanya fungsional, tetapi juga memiliki desain estetis yang memukau.
                    </p>
                    <p>
                        Dengan keahlian di berbagai teknologi modern, saya berkomitmen untuk menghadirkan solusi digital yang inovatif dan memberikan pengalaman pengguna (UX) yang tak terlupakan. Saya selalu bersemangat mempelajari hal baru dan menyelesaikan tantangan kompleks.
                    </p>
                </div>
                
                <div class="space-y-6">
                    <h3 class="text-2xl font-bold text-white mb-6">Skills & Technologies</h3>
                    <div class="flex flex-wrap gap-3">
                        @php
                            $skills = ['Figma', 'Canva', 'Laravel', 'MySQL', 'GitHub', 'Google AI Studio', 'Cloud Databases', 'Tailwind CSS', 'Alpine.js'];
                        @endphp
                        @foreach($skills as $skill)
                        <span class="px-5 py-2 bg-slate-800 border border-slate-700 text-secondary rounded-full font-medium shadow-md hover:shadow-[0_0_10px_rgba(56,189,248,0.4)] hover:-translate-y-1 transition-all duration-300 cursor-default">
                            {{ $skill }}
                        </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience & Timeline Section -->
    <section id="experience" class="py-24 bg-slate-800 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">Pengalaman & <span class="text-primary">Pendidikan</span></h2>
                <div class="w-24 h-1 bg-gradient-to-r from-primary to-secondary mx-auto rounded-full"></div>
            </div>
            
            <div class="relative border-l-2 border-slate-700 ml-3 md:ml-1/2 mx-auto max-w-4xl">
                @foreach($experiences as $index => $exp)
                <div class="mb-10 ml-8 relative scroll-reveal group">
                    <div class="absolute -left-10 mt-1.5 w-4 h-4 rounded-full bg-slate-700 border-2 border-primary group-hover:bg-primary transition-colors duration-300 shadow-[0_0_10px_rgba(245,158,11,0.5)]"></div>
                    <div class="bg-slate-900/80 backdrop-blur border border-slate-700 p-6 rounded-xl hover:border-primary/50 transition-all duration-300 transform group-hover:-translate-y-1 shadow-lg hover:shadow-[0_10px_30px_rgba(0,0,0,0.5)]">
                        <span class="inline-block py-1 px-3 rounded-full bg-slate-800 text-secondary text-sm font-semibold mb-3">
                            {{ \Carbon\Carbon::parse($exp->start_date)->format('Y') }}
                        </span>
                        <h3 class="text-xl font-bold text-white">{{ $exp->title }}</h3>
                        <h4 class="text-md text-slate-400 font-medium mb-3">{{ $exp->organization }}</h4>
                        <p class="text-slate-400">{{ $exp->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-24 bg-slate-900 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">Proyek <span class="text-primary">Terbaru</span></h2>
                <div class="w-24 h-1 bg-gradient-to-r from-primary to-secondary mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="scroll-reveal group relative rounded-2xl overflow-hidden bg-slate-800 shadow-xl">
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ $project->image_path ?? 'https://via.placeholder.com/800x600' }}" alt="{{ $project->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out opacity-80 group-hover:opacity-100">
                    </div>
                    
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <h3 class="text-2xl font-bold text-white mb-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">{{ $project->title }}</h3>
                        <p class="text-slate-300 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100 line-clamp-2">
                            {{ $project->description }}
                        </p>
                        
                        <div class="flex flex-wrap gap-2 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-200">
                            @php
                                $techs = explode(',', $project->tech_stack);
                            @endphp
                            @foreach($techs as $tech)
                                <span class="text-xs font-semibold bg-primary/20 text-primary border border-primary/30 px-2 py-1 rounded">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                        
                        <a href="{{ $project->link ?? '#' }}" class="inline-flex items-center text-white hover:text-primary transition-colors opacity-0 group-hover:opacity-100 duration-300 delay-300">
                            Lihat Detail 
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-slate-800 relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">Hubungi <span class="text-primary">Saya</span></h2>
                <div class="w-24 h-1 bg-gradient-to-r from-primary to-secondary mx-auto rounded-full"></div>
                <p class="mt-6 text-slate-400">Tertarik untuk bekerja sama? Tinggalkan pesan Anda di bawah ini.</p>
            </div>
            
            <div class="bg-slate-900/50 backdrop-blur-xl border border-slate-700/50 p-8 md:p-10 rounded-2xl shadow-2xl scroll-reveal">
                
                @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="mb-6 bg-emerald-500/10 border border-emerald-500/50 text-emerald-400 px-4 py-3 rounded-lg flex items-center justify-between animate-fade-in-up">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        {{ session('success') }}
                    </div>
                    <button @click="show = false" class="text-emerald-400 hover:text-emerald-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-400 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" id="name" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="Revaliano Daffa">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-400 mb-2">Email Address</label>
                            <input type="email" name="email" id="email" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="revaliano@example.com">
                        </div>
                    </div>
                    <div>
                        <label for="content" class="block text-sm font-medium text-slate-400 mb-2">Pesan Anda</label>
                        <textarea name="content" id="content" rows="4" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="Tuliskan pesan Anda di sini..."></textarea>
                    </div>
                    <div class="text-center md:text-right">
                        <button type="submit" class="w-full md:w-auto bg-primary hover:bg-amber-600 text-dark font-bold py-3 px-10 rounded-lg shadow-[0_0_15px_rgba(245,158,11,0.3)] hover:shadow-[0_0_25px_rgba(245,158,11,0.6)] transition-all transform hover:-translate-y-1 flex items-center justify-center">
                            Kirim Pesan
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 border-t border-slate-800 py-8 text-center">
        <p class="text-slate-500">
            &copy; {{ date('Y') }} <span class="text-slate-300 font-semibold">Revaliano Daffa Irawan</span>. All rights reserved.
        </p>
    </footer>

    <!-- Scroll Reveal Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const reveals = document.querySelectorAll('.scroll-reveal');
            
            const revealOnScroll = () => {
                for (let i = 0; i < reveals.length; i++) {
                    const windowHeight = window.innerHeight;
                    const elementTop = reveals[i].getBoundingClientRect().top;
                    const elementVisible = 100;
                    
                    if (elementTop < windowHeight - elementVisible) {
                        reveals[i].classList.add('active');
                    }
                }
            };
            
            window.addEventListener('scroll', revealOnScroll);
            revealOnScroll(); // Trigger on load
        });
    </script>
</body>
</html>
