@extends('layouts.app', [
    'path' => ['Beranda']
])

@section('style')
    <style>

    </style>
@endsection

@section('content')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
</head>
<body>
    <div class="relative min-h-[500px] overflow-hidden bg-white">
        <img 
            src="{{ asset('images/image1.png') }}" 
            alt="Image 1" 
            class="hidden md:block absolute top-4 left-4 w-md h-auto rounded-lg"
        />
        <img 
            src="{{ asset('images/image2.png') }}" 
            alt="Image 2" 
            class="hidden md:block absolute top-16 right-8 w-md h-auto rounded-lg"
        />
        <img 
            src="{{ asset('images/image3.png') }}" 
            alt="Image 3" 
            class="hidden md:block absolute bottom-8 left-16 w-sm h-auto rounded-lg"
        />
        <img 
            src="{{ asset('images/image4.png') }}" 
            alt="Image 4" 
            class="hidden md:block absolute bottom-0 right-16 w-md h-auto rounded-lg"
        />

        <!-- Hero Content -->
        <div class="mt-11 mb-11 pb-11 lg:mt-32 mx-auto text-center w-full max-w-[592px] min-h-[334px] flex flex-col justify-center">
            <p class="mb-6 text-[8px] lg:text-base text-[#5568CB]">Powering Tomorrow</p>
            <h1 class="mb-4 text-2xl lg:text-8xl font-bold leading-none tracking-tight text-gray-900 py-2.5 lg:py-8">
                Mari Melek<span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-[#0038FF] via-[#0038FF]/50 to-[#6D99DA]"><br>Prestasi</span>
            </h1>
            <p class="mx-10 mb-6 text-[8px] lg:text-base text-[#1F2937] font-regular lg:font-semibold">
                Temukan jalan menuju prestasi gemilang di UKM Genia—rumah bagi mahasiswa Teknik UNSRAT yang haus informasi, siap berkompetisi, dan gemar berdiskusi.
            </p>

            <!-- Buttons -->
            <div class="mt-8 grid grid-cols-2 gap-4 justify-items-center sm:flex sm:justify-center">
                <a href="#" 
                    class="bg-blue-600 text-white py-2 px-4 rounded-full text-xs sm:text-lg font-medium hover:bg-blue-700 transition duration-300 
                        w-[150px] h-[45px] sm:w-[187px] sm:h-[56px] flex items-center justify-center"
                >
                    See our Awarded
                </a>
                <a href="#" 
                    class="bg-white text-blue-600 border-2 border-blue-600 py-2 px-4 rounded-full text-xs sm:text-lg font-medium hover:bg-blue-600 hover:text-white transition duration-300 
                        w-[150px] h-[45px] sm:w-[187px] sm:h-[56px] flex items-center justify-center"
                >
                    Get in touch
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-col justify-center items-center w-full mt-2">
        <div class="w-full bg-orange-500 p-6 rounded-lg shadow-xl">
            <h2 class="text-black text-center text-2xl font-semibold mb-4">Fokus Kompetisi Kami</h2>

            <!-- Center the swiper -->
            <div class="flex justify-center">
                <div class="swiper mySwiper w-3/4">
                    <div class="swiper-wrapper">
                        <!-- Card Items -->
                        <div class="swiper-slide flex justify-center">
                            <div class="bg-orange-50 shadow-xl text-black text-center p-4 rounded-lg flex flex-col items-center justify-center w-72 h-28">
                                <img src="{{ asset("images/logo_onmipa.png") }}" alt="ON-MIPA" class="w-full h-20 object-cover"> 
                            </div>
                        </div>

                        <div class="swiper-slide flex justify-center">
                            <div class="bg-orange-50 shadow-xl text-black text-center p-4 rounded-lg flex flex-col items-center justify-center w-72 h-28">
                                <img src="{{ asset("images/logo_pkm.png") }}" alt="PKM" class="w-full h-20 object-cover"> 
                            </div>
                        </div>

                        <div class="swiper-slide flex justify-center">
                            <div class="bg-orange-50 shadow-xl text-black text-center p-4 rounded-lg flex flex-col items-center justify-center w-72 h-28">
                                <img src="{{ asset("images/logo_gemastik2.png") }}" alt="GELATIK" class="w-full h-20 object-cover"> 
                            </div>
                        </div>

                        <div class="swiper-slide flex justify-center">
                            <div class="bg-orange-50 shadow-xl text-black text-center p-4 rounded-lg flex flex-col items-center justify-center w-72 h-28">
                                <img src={{ asset("images/logo_lidm.png") }} alt="COMPETE" class="w-full h-20 object-cover"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center w-full my-20">
        <div class="w-1/2 mt-20">
            <p>
                Saya memandang dengan penuh harapan pada potensi luar biasa yang dimiliki oleh setiap mahasiswa Fakultas Teknik Universitas Sam Ratulangi
            </p>
            <p>
                Mari bersama-sama kita wujudkan visi Fakultas Teknik Universitas Sam Ratulangi untuk menjadi pusat keunggulan di Indonesia Timur.    
            </p>
        </div>
        <div>
            <img src="{{ asset("images/image 1.png") }}" class="w-60">
        </div>   
    </div>
    <!-- <div class="w-screen">
        <img src="{{ asset("images/f.png") }}" class="w-screen">
    </div> -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 8,
            centeredSlides: true, // Center the active slide
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
        });
    </script>
    </body>
@endsection