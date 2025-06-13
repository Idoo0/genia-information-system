@extends('layouts.app', [
    'path' => ['Beranda']
])

@section('style')
    <style>
        /* Scrollbar positioning */
        .testimonialSwiper .swiper-scrollbar {
            position: relative !important;
            bottom: auto !important;
            left: auto !important;
            width: 100% !important;
            margin-top: 2rem;
        }
    </style>
@endsection

@section('content')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
</head>
<body>
    <div class="relative md:min-h-[500px] lg:min-h-[750px] overflow-hidden bg-white">
        <img 
            src="{{ asset('images/image1.png') }}" 
            alt="Image 1" 
            class="hidden md:block absolute md:top-8 md:left-6 md:w-48 lg:top-4 lg:left-4 lg:w-auto h-auto rounded-lg"
        />
        <img 
            src="{{ asset('images/image2.png') }}" 
            alt="Image 2" 
            class="hidden md:block absolute md:top-16 md:right-6 md:w-48 lg:top-16 lg:right-8 lg:w-auto h-auto rounded-lg"
        />
        <img 
            src="{{ asset('images/image3.png') }}" 
            alt="Image 3" 
            class="hidden md:block absolute md:bottom-4 md:left-8 md:w-48 lg:bottom-8 lg:left-12 lg:w-auto h-auto rounded-lg"
        />
        <img 
            src="{{ asset('images/image4.png') }}" 
            alt="Image 4" 
            class="hidden md:block absolute md:bottom-2 md:right-10 md:w-36 lg:bottom-0 lg:right-20 lg:w-auto h-auto rounded-lg"
        />

        <!-- Hero Content -->
        <div class="mt-6 md:mt-16 lg:mt-32 mx-auto text-center w-full max-w-[592px] min-h-[250px] md:min-h-[300px] lg:min-h-[334px] flex flex-col justify-center px-4 md:px-8 lg:px-0 py-8">
            <p class="mb-2 text-[10px] md:text-sm lg:text-base text-[#5568CB]">Powering Tomorrow</p>
            <h1 class="mb-3 text-4xl md:text-6xl lg:text-8xl font-bold leading-none tracking-tight text-gray-900 py-1 md:py-4 lg:py-8">
                Mari Melek<span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-[#0038FF] via-[#0038FF]/50 to-[#6D99DA]"><br>Prestasi</span>
            </h1>
            <p class="md:max-w-[80%] lg:max-w-[100%] mx-auto lg:mx-10 mb-4 text-xs md:text-sm lg:text-base text-[#1F2937] font-regular md:font-medium lg:font-semibold">
                Temukan jalan menuju prestasi gemilang di UKM Genia—rumah bagi mahasiswa Teknik UNSRAT yang haus informasi, siap berkompetisi, dan gemar berdiskusi.
            </p>

            <!-- Buttons -->
            <div class="mt-2 md:mt-6 lg:mt-6 grid grid-cols-2 gap-3">
                <a href="{{ route('awarded') }}" 
                    class="bg-blue-600 text-white py-2 px-3 md:py-3 md:px-5 rounded-full text-xs md:text-md lg:text-lg font-medium hover:bg-blue-700 transition duration-300 
                        w-[120px] h-[40px] md:w-[160px] md:h-[50px] lg:w-[187px] lg:h-[56px] flex items-center justify-center justify-self-end"
                >
                    See our Awarded
                </a>
                <a href="#footer" 
                    class="bg-white text-blue-600 border-2 border-blue-600 py-2 px-3 md:py-3 md:px-5 rounded-full text-xs md:text-md lg:text-lg font-medium hover:bg-blue-600 hover:text-white transition duration-300 
                        w-[120px] h-[40px] md:w-[160px] md:h-[50px] lg:w-[187px] lg:h-[56px] flex items-center justify-center justify-self-start"
                >
                    Get in touch
                </a>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center items-center w-full my-6">
        <div class="w-full bg-[#E08300] py-12 sm:py-14 md:py-16">
            <h2 class="text-black text-center text-2xl sm:text-3xl md:text-4xl mb-8 sm:mb-12 md:mb-14">
                Fokus Kompetisi Kami
            </h2>

            <div class="flex justify-center px-[12%] md:px-0">
                <div class="swiper mySwiper w-[90%] sm:w-4/5 md:w-3/4">
                    <div class="swiper-wrapper">
                        <!-- Card Items -->
                        <div class="swiper-slide flex justify-center">
                            <div class="bg-[#E7A13D] shadow-xl text-black text-center p-2 rounded-lg flex flex-col items-center justify-center w-64 sm:w-72 h-24 sm:h-28">
                                <img src="{{ asset('images/onmipa2.svg') }}" alt="ON-MIPA" class="w-full h-20 sm:h-24 object-contain"> 
                            </div>
                        </div>

                        <div class="swiper-slide flex justify-center">
                            <div class="bg-[#E7A13D] shadow-xl text-black text-center p-2 rounded-lg flex flex-col items-center justify-center w-64 sm:w-72 h-24 sm:h-28">
                                <img src="{{ asset('images/logo_pkm.png') }}" alt="PKM" class="w-full h-20 sm:h-24 object-contain"> 
                            </div>
                        </div>

                        <div class="swiper-slide flex justify-center">
                            <div class="bg-[#E7A13D] shadow-xl text-black text-center p-2 rounded-lg flex flex-col items-center justify-center w-64 sm:w-72 h-24 sm:h-28">
                                <img src="{{ asset('images/logo_gemastik2.png') }}" alt="GELATIK" class="w-full h-16 sm:h-20 object-contain"> 
                            </div>
                        </div>

                        <div class="swiper-slide flex justify-center">
                            <div class="bg-[#E7A13D] shadow-xl text-black text-center p-2 rounded-lg flex flex-col items-center justify-center w-64 sm:w-72 h-24 sm:h-28">
                                <img src="{{ asset('images/logo_lidm.png') }}" alt="COMPETE" class="w-full h-16 sm:h-20 object-contain"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center items-center w-full mt-16 md:mt-32 mb-8 md:mb-16 py-8">
        <div class="mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-8 md:gap-16 lg:gap-0 px-4 md:px-16">
            <!-- Text Section -->
            <div class="space-y-6 text-center md:text-left lg:pl-16">
                <p class="text-lg md:text-xl lg:text-2xl text-gray-800 leading-relaxed">
                    Saya memandang dengan penuh harapan pada potensi
                    luar biasa yang dimiliki oleh setiap mahasiswa Fakultas
                    Teknik Universitas Sam Ratulangi
                </p>
                <p class="text-lg md:text-xl lg:text-2xl text-gray-800 leading-relaxed mt-8 md:mt-16">
                    Mari bersama-sama kita wujudkan visi Fakultas Teknik
                    Universitas Sam Ratulangi untuk menjadi pusat 
                    keunggulan di Indonesia Timur.
                </p>
            </div>

            <!-- Image Section -->
            <div class="flex flex-col items-center">
                <img 
                    src="{{ asset('images/mner-daniel.png') }}" 
                    alt="Daniel" 
                    class="w-28 h-auto md:w-auto mb-4"
                >
                <div class="text-center">
                    <p class="text-md md:text-lg lg:text-xl font-bold text-gray-900">
                        Ir. Daniel Febrian Sengkey, S.T., M.Eng
                    </p>
                    <p class="text-xs md:text-base text-[#646A69]">
                        Pembina UKM Genia Fakultas Teknik
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full flex justify-center p-4 sm:p-6 md:p-12 lg:p-16">
        <div class="w-full bg-[#FFF7ED] rounded-lg p-6 sm:p-8 md:p-12 lg:p-16">
            <div class="mb-6 sm:mb-8">
                <p class="text-sm text-gray-600 mb-2">About Us</p>
                <hr class="border-t border-gray-300">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-8 lg:grid-cols-12 gap-6 md:gap-16">
                <!-- Text -->
                <div class="max-w-full md:col-span-6 lg:col-span-8 md:max-w-[85%] lg:max-w-[75%]">
                    <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-gray-900 mb-4 sm:mb-6">
                        Committed to achieve higher
                    </h2>
                    <p class="text-gray-700 text-base sm:text-lg">
                        Dengan segala keterbatasan namun penuh semangat, kami bersatu membentuk UKM Genia sebagai wadah yang memudahkan mahasiswa mendapatkan informasi, 
                        mempersiapkan diri untuk berbagai kompetisi, dan berpartisipasi dalam diskusi yang memperkaya wawasan. Bersama UKM Genia, mari kita melangkah 
                        menuju masa depan yang lebih baik dengan optimisme dan kerendahan hati.
                    </p>
                </div>

                <!-- Statistics -->
                <div class="md:col-span-2 lg:col-span-4 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-1 gap-6 text-center md:text-left">
                    <div>
                      <h3 class="text-3xl sm:text-4xl text-gray-900">810</h3>
                        <p class="text-gray-600 text-sm sm:text-base">Kandidat <br> Mahasiswa Fakultas Teknik</p>
                    </div>
                    <div>
                        <h3 class="text-3xl sm:text-4xl text-gray-900">250+</h3>
                        <p class="text-gray-600 text-sm sm:text-base">Teams</p>
                    </div>
                    <div>
                        <h3 class="text-3xl sm:text-4xl text-gray-900">3</h3>
                        <p class="text-gray-600 text-sm sm:text-base">Finalist Team</p>
                    </div>
                    <div>
                        <h3 class="text-3xl sm:text-4xl text-gray-900">1,2%</h3>
                        <p class="text-gray-600 text-sm sm:text-base">Avg. National Team</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col text-center justify-center items-center gap-y-8 px-6 py-16 sm:px-8 sm:py-24 mt-8">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl">
            About Us
        </h1>
        <p class="text-base sm:text-lg lg:text-xl max-w-2xl">
            Dengan segala keterbatasan namun penuh semangat, kami bersatu membentuk UKM Genia sebagai wadah yang memudahkan mahasiswa mendapatkan informasi, mempersiapkan diri untuk berbagai kompetisi, dan berpartisipasi dalam diskusi yang memperkaya wawasan. Bersama UKM Genia, mari kita melangkah menuju masa depan yang lebih baik dengan optimisme dan kerendahan hati.
        </p>
        <a href="/about-us" 
            class="bg-white text-gray-900 border-2 border-gray-900 py-2 px-4 rounded-full text-xs sm:text-lg font-medium hover:bg-gray-900 hover:text-white transition duration-300 
                w-[150px] h-[45px] sm:w-[187px] sm:h-[56px] flex items-center justify-center"
        >
            Read More
        </a>
    </div>

    <div class="w-full flex flex-col items-center px-6 py-16 sm:px-8 sm:py-24 lg:px-16 lg:py-32">
        <h2 class="text-3xl sm:text-5xl lg:text-6xl text-gray-900">Meet our Team</h2>
        <p class="text-base sm:text-lg text-gray-600 mt-2 mb-12 text-center">
            Our team boasts to driving innovation in competitions.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-8 gap-y-16 w-full max-w-5xl py-12">
            <div class="flex flex-col items-center">
                <div class="bg-[#E98E1E] rounded-lg p-2">
                    <img src="{{ asset('images/team-regina.png') }}" alt="Regina Agusalim" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover">
                </div>
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mt-4">Regina Agusalim</h3>
                <p class="text-gray-600 text-sm sm:text-base">Sekretaris UKM Genia FT</p>
            </div>

            <div class="flex flex-col items-center">
                <div class="bg-[#E98E1E] rounded-lg p-2">
                    <img src="{{ asset('images/team-daffa.png') }}" alt="Daffa Nur Fiat" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover">
                </div>
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mt-4">Daffa Nur Fiat</h3>
                <p class="text-gray-600 text-sm sm:text-base">Ketua UKM Genia FT</p>
            </div>

            <div class="flex flex-col items-center">
                <div class="bg-[#E98E1E] rounded-lg p-2">
                    <img src="{{ asset('images/team-ridho.png') }}" alt="Ridho Aditya" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover">
                </div>
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mt-4">Ridho Aditya</h3>
                <p class="text-gray-600 text-sm sm:text-base">Wakil Ketua UKM Genia FT</p>
            </div>

            <div class="flex flex-col items-center">
                <div class="bg-[#E98E1E] rounded-lg p-2">
                    <img src="{{ asset('images/team-triadi.png') }}" alt="Triadi M" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover">
                </div>
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mt-4">Triadi M</h3>
                <p class="text-gray-600 text-sm sm:text-base">Koorbid Lomba</p>
            </div>

            <div class="flex flex-col items-center">
                <div class="bg-[#E98E1E] rounded-lg p-2">
                    <img src="{{ asset('images/team-selvi.png') }}" alt="Selvi Wulandari" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover">
                </div>
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mt-4">Selvi Wulandari</h3>
                <p class="text-gray-600 text-sm sm:text-base">Koorbid Humas</p>
            </div>

            <div class="flex flex-col items-center">
                <div class="bg-[#E98E1E] rounded-lg p-2">
                    <img src="{{ asset('images/team-roman.png') }}" alt="Roman Bojoh" class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover">
                </div>
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mt-4">Roman Bojoh</h3>
                <p class="text-gray-600 text-sm sm:text-base">Koorbid Kewirausahaan</p>
            </div>
        </div>
    </div>

    <div class="w-full bg-[#001D3D] p-6 sm:p-12 md:p-16 lg:p-24">
        <!-- Section Title -->
        <div class="mb-8">
            <p class="text-xs sm:text-sm text-gray-300 mb-2">Testimonials</p>
            <hr class="border-t border-gray-300">
        </div>

        <div class="mb-10 md:mb-18 lg:mb-24">
            <h2 class="text-3xl sm:text-5xl lg:text-6xl text-gray-100">What our students say</h2>
        </div>

        <!-- Swiper Container -->
        <div class="swiper testimonialSwiper relative overflow-visible pb-8">
            <div class="swiper-wrapper">
                <!-- Testimonial Slides -->
                <div class="swiper-slide !w-auto max-w-xs">
                    <div class="bg-[#E98E1E] rounded-lg p-8 h-full mx-2">
                        <p class="text-black text-base sm:text-lg font-medium">
                            “UKM Penalaran Genia adalah tempat yang membantu saya berpikir lebih kritis dan kreatif!”
                        </p>
                        <div class="py-4"></div>
                        <p class="text-black text-sm sm:text-base font-semibold mt-4">Mas Indra</p>
                        <p class="text-black text-xs sm:text-sm">Mahasiswa IT'22</p>
                    </div>
                </div>

                <div class="swiper-slide !w-auto max-w-xs">
                    <div class="bg-[#E98E1E] rounded-lg p-8 h-full mx-4">
                        <p class="text-black text-base sm:text-lg font-medium">
                            “Melalui Genia, saya banyak belajar dan berkembang secara akademik dan inovatif!”
                        </p>
                        <div class="py-4"></div>
                        <p class="text-black text-sm sm:text-base font-semibold mt-4">Rafa Monca</p>
                        <p class="text-black text-xs sm:text-sm">Mahasiswi Arsitektur'23</p>
                    </div>
                </div>

                <div class="swiper-slide !w-auto max-w-xs">
                    <div class="bg-[#E98E1E] rounded-lg p-8 h-full mx-4">
                        <p class="text-black text-base sm:text-lg font-medium">
                            “UKM Genia mendorong saya untuk menciptakan ide-ide baru yang bermanfaat.”
                        </p>
                        <div class="py-4"></div>
                        <p class="text-black text-sm sm:text-base font-semibold mt-4">Galnoel Peter</p>
                        <p class="text-black text-xs sm:text-sm">Mahasiswa Sipil'21</p>
                    </div>
                </div>

                <div class="swiper-slide !w-auto max-w-xs">
                    <div class="bg-[#E98E1E] rounded-lg p-8 h-full mx-4">
                        <p class="text-black text-base sm:text-lg font-medium">
                            “Genia benar-benar membuka wawasan dan pola pikir saya secara logis dan ilmiah!”
                        </p>
                        <div class="py-4"></div>
                        <p class="text-black text-sm sm:text-base font-semibold mt-4">Ahmad</p>
                        <p class="text-black text-xs sm:text-sm">Mahasiswa IT'21</p>
                    </div>
                </div>

                <div class="swiper-slide !w-auto max-w-xs">
                    <div class="bg-[#E98E1E] rounded-lg p-8 h-full mx-4">
                        <p class="text-black text-base sm:text-lg font-medium">
                            “Bergabung di UKM Genia memberi saya pengalaman luar biasa untuk berkembang!”
                        </p>
                        <div class="py-4"></div>
                        <p class="text-black text-sm sm:text-base font-semibold mt-4">Aditya</p>
                        <p class="text-black text-xs sm:text-sm">Mahasiswa IT'20</p>
                    </div>
                </div>
            </div>

            <!-- Scrollbar -->
            <div class="swiper-scrollbar !bg-white !h-0.5 !cursor-grab !rounded-full"></div>
        </div>
    </div>

    <div class="flex flex-col text-center justify-center items-center gap-y-12 sm:gap-y-16 md:gap-y-24 px-8 py-16 sm:py-24 md:py-36 mt-16">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl max-w-4xl">
            Our commitment is to boost students' energy to cultivate a medalist mentality.
        </h1>
        <a href="#footer" 
            class="bg-gray-800 text-white py-2 px-4 rounded-full text-xs sm:text-lg font-medium hover:bg-black transition duration-300 
                w-[150px] h-[45px] sm:w-[187px] sm:h-[56px] flex items-center justify-center"
        >
            Get in touch
        </a>
    </div>

    <div class="w-full flex justify-center p-6 sm:p-8 md:p-12 lg:p-16">
        <div class="w-full bg-[#FFF7ED] rounded-lg p-6 sm:p-8 md:p-12 lg:p-16">
            <div class="mb-6 sm:mb-8">
                <p class="text-sm text-gray-600 mb-2">FAQ</p>
                <hr class="border-t border-gray-300">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16">
                <div class="flex flex-col justify-between">
                    <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-gray-900 mb-4 sm:mb-6">
                        Answers to the frequently asked questions.
                    </h2>
                    <!-- Contact Us Button -->
                    <a href="#footer" 
                    class="mt-4 sm:mt-auto self-start px-4 py-2 border border-gray-900 text-gray-900 rounded-full 
                            hover:bg-gray-900 hover:text-white transition">
                        Contact us →
                    </a>
                </div>

                <div class="grid gap-y-6 sm:gap-y-8">
                    <div>
                        <h3 class="font-semibold text-lg sm:text-xl text-gray-900">Apa itu UKM Genia?</h3>
                        <p class="text-sm sm:text-base text-gray-600">
                            UKM Genia FT Unsrat adalah Unit Kegiatan Mahasiswa yang berfokus pada peningkatan akademik melalui kompetisi. UKM ini membina mahasiswa, khususnya di Fakultas Teknik, agar lebih kompetitif, kreatif, dan inovatif. Melalui pelatihan dan pembinaan, Genia mendorong prestasi, pemikiran kritis, serta persaingan sehat untuk mencetak individu yang unggul dan berdaya saing.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg sm:text-xl text-gray-900">Lomba Apa saja yang UKM Genia handle?</h3>
                        <p class="text-sm sm:text-base text-gray-600">
                            UKM Genia berfokus pada kompetisi akademik seperti PKM, Gemastik, Satria Data, dan LIDM. Untuk meningkatkan kesiapan mahasiswa, Genia juga aktif dalam berbagai lomba lain, baik swasta maupun negeri.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg sm:text-xl text-gray-900">Bagaimana cara mendaftar lomba?</h3>
                        <p class="text-sm sm:text-base text-gray-600">
                            Setiap tahunnya, Genia akan membuka pendaftaran berupa form untuk mahasiswa yang akan mengikuti lomba. Untuk bisa mendaftar, mahasiswa dapat mengisi form tersebut secara online dengan melampirkan data diri sesuai persyaratan yang ditentukan.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg sm:text-xl text-gray-900">Apa saja Event yang UKM Genia adakan?</h3>
                        <p class="text-sm sm:text-base text-gray-600">
                            Untuk mendukung kompetisi, UKM Genia akan mengadakan berbagai event persiapan, seperti sosialisasi, coaching clinic, sharing session, dan karantina. Kegiatan ini bertujuan membimbing mahasiswa dalam strategi, pengembangan ide, serta meningkatkan kesiapan mereka agar dapat berkompetisi dengan lebih percaya diri dan meraih hasil terbaik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full flex justify-center p-4 sm:p-8 md:p-12 lg:p-16">
        <div class="w-full rounded-lg p-6 sm:p-8 md:p-12 lg:p-16">

            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
                <div class="flex flex-col justify-between lg:max-w-[85%] px-4">
                    <div>
                        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-gray-900 mb-4 sm:mb-6">
                            Learn more from the winners
                        </h2>
                        <p class="text-gray-700 text-base sm:text-lg">
                            Dive into their stories and insights to inspire your own journey to excellence.
                        </p>
                    </div>
                    <!-- Contact Us Button -->
                    <a href="{{ route('blog') }}" class="mt-6 sm:mt-8 px-4 py-2 border border-gray-900 text-gray-900 rounded-full hover:bg-gray-900 hover:text-white transition mr-auto">
                        See all
                    </a>
                </div>

                <div class="grid gap-y-6 sm:gap-y-8">
                    <!-- Blog Card 1 -->
                    <a href="details_blog/bagaimana-bisa-antropometri-bisa-jadi-desain-fasilitas-publik" class="flex items-center gap-4 sm:gap-6 p-4 rounded-lg hover:bg-gray-100 transition">
                        <img src="{{ asset('images/preview-blog-1.png') }}" class="w-24 h-24 sm:w-28 sm:h-28 md:w-36 md:h-36 rounded-lg object-cover" alt="Blog Image">
                        <div>
                            <h3 class="text-md sm:text-lg font-semibold text-gray-900">
                                Bagaimana bisa Antropometri bisa jadi desain fasilitas publik?
                            </h3>
                            <div class="flex items-center text-gray-600 text-xs sm:text-sm mt-2">
                                <img src="{{ asset('images/blog-author.svg') }}" class="w-5 h-5 sm:w-6 sm:h-6 rounded-full mr-2" alt="Author Image">
                                <span>Regina George</span>
                                <span class="mx-2">•</span>
                                <span>7 min read</span>
                            </div>
                        </div>
                    </a>

                    <!-- Blog Card 2 -->
                    <a href="details_blog/ceplusplus-kami-masuk-10-besar" class="flex items-center gap-4 sm:gap-6 p-4 rounded-lg hover:bg-gray-100 transition">
                        <img src="{{ asset('images/preview-blog-2.png') }}" class="w-24 h-24 sm:w-28 sm:h-28 md:w-36 md:h-36 rounded-lg object-cover" alt="Blog Image">
                        <div>
                            <h3 class="text-md sm:text-lg font-semibold text-gray-900">
                                CEPLUSPLUS: Kami masuk 10 Besar!
                            </h3>
                            <div class="flex items-center text-gray-600 text-xs sm:text-sm mt-2">
                                <img src="{{ asset('images/blog-author.svg') }}" class="w-5 h-5 sm:w-6 sm:h-6 rounded-full mr-2" alt="Author Image">
                                <span>Ridho Aditya</span>
                                <span class="mx-2">•</span>
                                <span>12 min read</span>
                            </div>
                        </div>
                    </a>

                    <!-- Blog Card 3 -->
                    <a href="details_blog/bantu-lansia-dengan-aplikasi-monitoring-kami" class="flex items-center gap-4 sm:gap-6 p-4 rounded-lg hover:bg-gray-100 transition">
                        <img src="{{ asset('images/preview-blog-3.png') }}" class="w-24 h-24 sm:w-28 sm:h-28 md:w-36 md:h-36 rounded-lg object-cover" alt="Blog Image">
                        <div>
                            <h3 class="text-md sm:text-lg font-semibold text-gray-900">
                                Bantu Lansia dengan aplikasi monitoring kami!
                            </h3>
                            <div class="flex items-center text-gray-600 text-xs sm:text-sm mt-2">
                                <img src="{{ asset('images/blog-author.svg') }}" class="w-5 h-5 sm:w-6 sm:h-6 rounded-full mr-2" alt="Author Image">
                                <span>Triadi M</span>
                                <span class="mx-2">•</span>
                                <span>5 min read</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="w-screen">
        <img src="{{ asset("images/f.png") }}" class="w-screen">
    </div> -->

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 8,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    centeredSlides: false,
                },
                1024: {
                    slidesPerView: 3,
                    centeredSlides: false,
                },
                1280: {
                    slidesPerView: 3,
                    centeredSlides: true,
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var testimonialSwiper = new Swiper(".testimonialSwiper", {
                slidesPerView: 'auto',
                spaceBetween: 10,
                centeredSlides: false,
                scrollbar: {
                    el: ".swiper-scrollbar",
                    draggable: true,
                    snapOnRelease: true
                },
                breakpoints: {
                    640: { spaceBetween: 15 },
                    768: { spaceBetween: 20 },
                    1024: { spaceBetween: 25 }
                }
            });
        });
    </script>
    </body>
@endsection