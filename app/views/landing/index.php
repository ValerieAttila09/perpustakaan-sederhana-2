<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?> - Digital Library</title>
    
    <!-- Fonts: Plus Jakarta Sans for a modern, geometric tech feel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9', // Sky Blue
                            600: '#0284c7',
                            900: '#0c4a6e',
                        }
                    },
                    animation: {
                        'blob': 'blob 7s infinite',
                        'marquee': 'marquee 25s linear infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        },
                        marquee: {
                            '0%': { transform: 'translateX(0%)' },
                            '100%': { transform: 'translateX(-100%)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet" />

    <style>
        /* Custom Scrollbar for the page */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #fff; }
        ::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
    </style>
</head>
<body class="font-sans antialiased text-gray-600 bg-white overflow-x-hidden" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">

    <!-- Navbar -->
    <nav :class="scrolled ? 'bg-white/80 backdrop-blur-md shadow-sm' : 'bg-transparent'" class="fixed w-full z-50 transition-all duration-300 top-0">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="<?= BASEURL; ?>" class="flex items-center gap-2 group">
                <div class="w-10 h-10 bg-brand-600 rounded-xl flex items-center justify-center text-white text-xl font-bold shadow-lg shadow-brand-500/30 transition-transform group-hover:scale-110">
                    L
                </div>
                <span class="text-xl font-bold text-gray-900 tracking-tight">Library<span class="text-brand-600">Pro</span></span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#features" class="text-sm font-medium text-gray-500 hover:text-brand-600 transition">Features</a>
                <a href="#catalog" class="text-sm font-medium text-gray-500 hover:text-brand-600 transition">Catalog</a>
                <a href="#about" class="text-sm font-medium text-gray-500 hover:text-brand-600 transition">About Us</a>
            </div>

            <!-- CTA -->
            <div class="flex items-center gap-4">
                <a href="<?= BASEURL; ?>/auth/login" class="text-sm font-bold text-gray-900 hover:text-brand-600 transition hidden md:block">Log In</a>
                <a href="<?= BASEURL; ?>/auth/register" class="bg-gray-900 hover:bg-black text-white px-5 py-2.5 rounded-full text-sm font-bold transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Sign Up
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <!-- Background Blobs -->
        <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-brand-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <!-- Text Content -->
                <div class="lg:w-1/2 text-center lg:text-left" data-aos="fade-right" data-aos-duration="1000">
                    <div class="inline-flex items-center px-3 py-1 rounded-full border border-blue-100 bg-blue-50 text-brand-600 text-xs font-bold mb-6">
                        <span class="flex h-2 w-2 rounded-full bg-brand-600 mr-2"></span> New Collection Available
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-bold text-gray-900 leading-tight mb-6">
                        Unlock Your <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-purple-600">Knowledge</span> Power
                    </h1>
                    <p class="text-lg text-gray-500 mb-8 leading-relaxed max-w-lg mx-auto lg:mx-0">
                        Access thousands of premium books, research papers, and journals. Upgrade your learning journey with our state-of-the-art digital library.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#" class="bg-brand-600 text-white px-8 py-4 rounded-full font-bold text-lg shadow-xl shadow-brand-500/40 hover:bg-brand-700 transition transform hover:-translate-y-1">
                            Start Reading Now
                        </a>
                        <button class="flex items-center justify-center gap-2 px-8 py-4 rounded-full font-bold text-lg border border-gray-200 hover:bg-gray-50 transition text-gray-700">
                            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            View Demo
                        </button>
                    </div>
                    
                    <!-- Social Proof -->
                    <div class="mt-10 flex items-center justify-center lg:justify-start gap-4">
                        <div class="flex -space-x-3">
                            <img class="w-10 h-10 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Alex&background=random" alt="">
                            <img class="w-10 h-10 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Sarah&background=random" alt="">
                            <img class="w-10 h-10 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Mike&background=random" alt="">
                            <div class="w-10 h-10 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs font-bold text-gray-600">+2k</div>
                        </div>
                        <p class="text-sm font-medium text-gray-500">Trusted by <span class="text-gray-900 font-bold">2,000+</span> Students</p>
                    </div>
                </div>

                <!-- Visual Content (Complicated composition) -->
                <div class="lg:w-1/2 relative" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <!-- Main Card -->
                    <div class="relative z-10 bg-white p-6 rounded-3xl shadow-2xl animate-float max-w-md mx-auto transform rotate-2 hover:rotate-0 transition duration-500">
                        <!-- Pseudo Book Cover -->
                        <div class="h-64 rounded-2xl bg-gradient-to-br from-gray-900 to-gray-800 flex items-center justify-center relative overflow-hidden mb-6">
                            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1543002588-bfa74002ed7e?auto=format&fit=crop&q=80&w=800')] bg-cover bg-center opacity-40"></div>
                            <div class="text-center relative z-10 p-6">
                                <span class="bg-white/20 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-bold mb-2 inline-block">Bestseller</span>
                                <h3 class="text-2xl font-bold text-white mt-2">The Art of Innovation</h3>
                                <p class="text-gray-300 text-sm mt-1">Mastering the future of tech.</p>
                            </div>
                        </div>
                        
                        <!-- Player UI (Reference to SmartNurse Audio) -->
                        <div class="bg-gray-50 rounded-xl p-4 flex items-center gap-4">
                            <div class="w-10 h-10 bg-brand-600 rounded-full flex items-center justify-center text-white shrink-0 cursor-pointer hover:scale-105 transition">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                            <div class="flex-1">
                                <div class="h-1 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full w-1/3 bg-brand-600 rounded-full"></div>
                                </div>
                                <div class="flex justify-between mt-1.5">
                                    <span class="text-xs text-gray-500 font-medium">12:30</span>
                                    <span class="text-xs text-gray-500 font-medium">45:00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Elements -->
                    <div class="absolute top-10 -right-4 bg-white p-4 rounded-xl shadow-xl animate-float animation-delay-2000 hidden md:block z-20">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-bold uppercase">Status</p>
                                <p class="text-sm font-bold text-gray-800">Book Returned</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Infinite Marquee -->
    <div class="bg-gray-900 py-8 overflow-hidden">
        <div class="relative flex overflow-x-hidden group">
            <div class="py-2 animate-marquee whitespace-nowrap flex space-x-16 px-4">
                <span class="text-2xl font-bold text-gray-500">Science</span>
                <span class="text-2xl font-bold text-gray-500">Technology</span>
                <span class="text-2xl font-bold text-gray-500">History</span>
                <span class="text-2xl font-bold text-gray-500">Philosophy</span>
                <span class="text-2xl font-bold text-gray-500">Arts</span>
                <span class="text-2xl font-bold text-gray-500">Fiction</span>
                <span class="text-2xl font-bold text-gray-500">Business</span>
                <!-- Duplicate for smoother loop -->
                <span class="text-2xl font-bold text-gray-500">Science</span>
                <span class="text-2xl font-bold text-gray-500">Technology</span>
                <span class="text-2xl font-bold text-gray-500">History</span>
                <span class="text-2xl font-bold text-gray-500">Philosophy</span>
                <span class="text-2xl font-bold text-gray-500">Arts</span>
                <span class="text-2xl font-bold text-gray-500">Fiction</span>
                <span class="text-2xl font-bold text-gray-500">Business</span>
            </div>
        </div>
    </div>

    <!-- Features Section (SmartNurse Style) -->
    <section id="features" class="py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Features Overview</h2>
                <p class="text-gray-500">Everything you need to master your knowledge journey, all in one place.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white p-8 rounded-3xl" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 bg-pink-50 rounded-2xl flex items-center justify-center text-pink-500 mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Curated Collections</h3>
                    <p class="text-gray-500 leading-relaxed text-sm">
                        Access on-demand collections by top librarians, covering everything from fundamentals to advanced concepts.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-8 rounded-3xl" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-500 mb-6">
                       <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Smart Knowledge Test</h3>
                    <p class="text-gray-500 leading-relaxed text-sm">
                        Reinforce your learning with mock tests linked to each book chapter. Complete with real-time feedback.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-8 rounded-3xl" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-500 mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Join a Community</h3>
                    <p class="text-gray-500 leading-relaxed text-sm">
                        Connect with other students around the world in our supportive learning community. Share tips and stay motivated.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Parallax Image Divider -->
    <section class="py-20 relative bg-fixed bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&q=80&w=2000');">
        <div class="absolute inset-0 bg-gray-900/60"></div>
        <div class="container mx-auto px-6 relative z-10 text-center text-white" data-aos="zoom-in">
            <h2 class="text-4xl font-bold mb-4">"A room without books is like a body without a soul."</h2>
            <p class="text-xl opacity-80">- Marcus Tullius Cicero</p>
        </div>
    </section>

    <!-- Dynamic Catalog Section -->
    <section id="catalog" class="py-24 bg-white relative">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-16" data-aos="fade-up">
                <div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Latest Collection</h2>
                    <p class="text-gray-500">Explore the newest additions to our library.</p>
                </div>
                <a href="<?= BASEURL; ?>/auth/login" class="hidden md:flex items-center text-brand-600 font-bold hover:text-brand-700 transition">
                    View Full Catalog <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach($data['books'] as $book): ?>
                <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative bg-gray-100 rounded-2xl overflow-hidden mb-4 shadow-sm group-hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-2 aspect-[3/4]">
                        <?php if($book['cover_image'] && $book['cover_image'] != 'default.jpg'): ?>
                            <img src="<?= BASEURL; ?>/uploads/<?= $book['cover_image']; ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gray-200 text-gray-400">
                                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                <span class="text-xs">No Cover</span>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <a href="<?= BASEURL; ?>/auth/login" class="bg-white text-gray-900 px-6 py-2 rounded-full text-sm font-bold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                Borrow Now
                            </a>
                        </div>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg truncate group-hover:text-brand-600 transition"><?= $book['title']; ?></h3>
                    <p class="text-gray-500 text-sm"><?= $book['author']; ?></p>
                </div>
                <?php endforeach; ?>
                
                <?php if(empty($data['books'])): ?>
                    <div class="col-span-full py-10 text-center text-gray-400 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                        No books available yet.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-24 bg-brand-900 relative overflow-hidden text-white">
        <!-- Abstract Background -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-500 rounded-full mix-blend-overlay filter blur-[128px] opacity-20 animate-blob"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-purple-500 rounded-full mix-blend-overlay filter blur-[128px] opacity-20 animate-blob animation-delay-2000"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2" data-aos="fade-right">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&q=80&w=1000" class="rounded-3xl shadow-2xl relative z-10 w-full" alt="Library Interior">
                        <!-- Decorative border -->
                        <div class="absolute top-6 -right-6 w-full h-full border-2 border-white/20 rounded-3xl -z-0 hidden md:block"></div>
                    </div>
                </div>
                
                <div class="lg:w-1/2" data-aos="fade-left">
                    <span class="text-brand-300 font-bold tracking-widest text-sm uppercase mb-2 block">About Us</span>
                    <h2 class="text-4xl lg:text-5xl font-bold mb-6 leading-tight">Empowering Minds Through <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">Digital Literacy</span></h2>
                    <p class="text-gray-300 text-lg mb-8 leading-relaxed">
                        LibraryPro isn't just a place for books; it's a hub for innovation and learning. Established in 2023, we aim to digitize the learning experience, providing seamless access to knowledge for students and educators alike.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-8 mb-8">
                        <div>
                            <h4 class="text-3xl font-bold text-white mb-1">10k+</h4>
                            <p class="text-gray-400 text-sm">Digital Books</p>
                        </div>
                        <div>
                            <h4 class="text-3xl font-bold text-white mb-1">5k+</h4>
                            <p class="text-gray-400 text-sm">Active Members</p>
                        </div>
                        <div>
                            <h4 class="text-3xl font-bold text-white mb-1">24/7</h4>
                            <p class="text-gray-400 text-sm">Online Access</p>
                        </div>
                        <div>
                            <h4 class="text-3xl font-bold text-white mb-1">100%</h4>
                            <p class="text-gray-400 text-sm">Free to Use</p>
                        </div>
                    </div>

                    <a href="#" class="inline-flex items-center text-white font-bold border-b-2 border-brand-500 pb-1 hover:text-brand-300 transition">
                        Read Our Full Story <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24">
        <div class="container mx-auto px-6">
            <div class="bg-gray-50 rounded-[3rem] p-12 lg:p-20 relative overflow-hidden text-center">
                <!-- Decor -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-brand-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>

                <div class="relative z-10 max-w-2xl mx-auto" data-aos="fade-up">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Start Your Journey.</h2>
                    <p class="text-gray-500 text-lg mb-10">
                        Join thousands of students who are already mastering their studies with LibraryPro.
                    </p>
                    <a href="<?= BASEURL; ?>/auth/register" class="inline-block bg-gray-900 text-white px-10 py-5 rounded-full font-bold text-lg hover:bg-black transition shadow-xl transform hover:-translate-y-1">
                        Register Now
                    </a>
                </div>
            </div>
            
            <div class="mt-20 border-t border-gray-100 pt-10 flex flex-col md:flex-row justify-between items-center text-gray-400 text-sm">
                <p>&copy; <?= date('Y'); ?> LibraryPro School. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-gray-800">Privacy Policy</a>
                    <a href="#" class="hover:text-gray-800">Terms of Service</a>
                </div>
            </div>
        </div>
    </section>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        once: true,
        duration: 800,
        easing: 'ease-out-cubic',
      });
    </script>
</body>
</html>
