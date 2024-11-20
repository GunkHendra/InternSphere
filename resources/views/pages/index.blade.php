@php
    $star = ['Star_0.png', 'Star_1.png', 'Star_2.png', 'Star_3.png', 'Star_4.png', 'Star_Full.png'];
@endphp

@extends('layouts/layout')

@section('content')
    <div class="flex min-h-screen justify-center items-center mb-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-10">
            <img class="max-w-56 max-h-56" src="/assets/logo.png" alt="Logo">
            <div class="space-y-5 text-center">
                <a href="/" class="text-6xl md:text-8xl sm:text-center md:text-center font-bold">{{ config('app.name') }}</a>
                <p class="text-lg md:text-2xl">Where the internship waits for you.</p>
                <div class="block mb-3">
                    <form action="/internship" method="GET" class="flex items-center justify-center md:justify-between">
                        <input type="text" class="border border-gray-200 bg-white text-sm rounded-lg w-full ps-4 py-2.5" placeholder="Type &quot;internship&quot;" name="search" value="{{ request('search') }}"/>
                        <button type="submit" class="border border-gray-200 bg-white p-3 ml-2 text-sm rounded-lg">
                            <img class="w-4 h-4 " src="assets/search.png" alt="search-icon">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row h-auto lg:h-[100vh] justify-center items-center bg-black">
        <div class="flex justify-center lg:justify-start mb-6 lg:mb-0" data-aos="fade-right">
            <img class="w-[70%] lg:w-auto" src="assets/illustration/discus.png" alt="">
        </div>
        <div class="text-white p-6">
            <div class="space-y-10">
                <div class="flex flex-col md:flex-row items-center gap-4" data-aos="fade-left">
                    <img class="max-w-12 max-h-12" src="assets/icon/link.png" alt="">
                    <span class="text-lg md:text-4xl text-center md:text-left">Connects students with valuable internship opportunities.</span>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-4" data-aos="fade-left">
                    <img class="max-w-16 max-h-16" src="assets/icon/thumb.png" alt="">
                    <span class="text-lg md:text-4xl text-center md:text-left">Find the perfect internship to match your skills and ambitions.</span>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-4" data-aos="fade-left">
                    <img class="max-w-14 max-h-14" src="assets/icon/easy.png" alt="">
                    <span class="text-lg md:text-4xl text-center md:text-left">Easy access to internships.</span>
                </div>
            </div>
        </div>
    </div>

    <style>
    /* Tambahkan class untuk memperbesar card yang aktif */
    .active-card {
        transform: scale(1.10); /* Memperbesar sedikit */
        transition: transform 0.1s ease;

    }
    </style>

<div class="h-auto pt-16 lg:py-32 px-6">
    <div class="flex justify-center mb-20" data-aos="fade-up">
        <span class="text-2xl md:text-5xl font-bold">Check out some of our internships</span>
    </div>

    <!-- Swipeable Container -->
    <div class="relative mt-10" data-aos="fade-up">
        <div class="flex gap-8 px-8 transition-transform duration-300" id="internship-container">
            @foreach ($internship as $index => $intern)
                <div class="min-w-[400px] md:min-w-[450px] lg:min-w-[450px] p-4 bg-white shadow-md rounded-lg flex flex-col justify-between gap-4 {{ $index === 0 ? 'active-card' : '' }}">
                    <div>
                        <div class="flex items-center gap-4">
                            @if($intern->company && $intern->company->logo)
                                <img src="{{ asset('assets/logo/' . $intern->company->logo) }}" alt="{{ $intern->company->company_name }} logo" class="w-12 h-12">
                            @else
                                <img src="{{ asset('assets/logo/default_logo.png') }}" alt="Default logo" class="w-12 h-12">
                            @endif
                            <a href="/internship/{{ $intern->slug }}" class="font-medium text-xl md:text-2xl">{{ $intern->title }}</a>
                        </div>
                        <a href="/company/{{ $intern->company->slug }}" class="text-slate-500">By {{ $intern->company->company_name }}</a>
                        <p class="text-sm md:text-base line-clamp-3">{{ $intern->description }}</p>
                    </div>
                    <div>
                        <p class="flex items-center justify-left gap-1">
                            Rating: {{ $intern->averageRating() ? round($intern->averageRating(), 0) : 'No rating yet' }} / 5
                            <span>
                                <img src="{{ asset('assets/icon/' . $star[round($intern->averageRating(), 0)]) }}" alt="Star" class="inline w-35 h-10">
                            </span>
                        </p>
                        <p class="text-sm">{{ $intern->commentsCount() }} comments</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Swipe Buttons -->
        
        <button id="prev-button" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-lg hover:bg-gray-200 transition">
            <img src="{{ asset('assets/icon/Left.png') }}" alt="Left" class="w-6 h-6">
        </button>
        <button id="next-button" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-lg hover:bg-gray-200 transition">
            <img src="{{ asset('assets/icon/Right.png') }}" alt="Right" class="w-6 h-6">
        </button>
    </div>
</div>

<script>
    AOS.init();
    const container = document.getElementById('internship-container');
    const items = container.children;
    const itemWidth = items[0].offsetWidth + 24; // Including gap between items
    const visibleItems = Math.floor(window.innerWidth / itemWidth); // Number of items visible at once
    let currentIndex = 0;
    const maxIndex = items.length - visibleItems;
    let intervalId;
    let activeBoxIndex = 0; // Index untuk box yang membesar

    function updateActiveCard() {
        for (let i = 0; i < items.length; i++) {
            items[i].classList.remove('active-card');
        }
        items[activeBoxIndex].classList.add('active-card');
    }

    function swipeNext() {
        if (activeBoxIndex < currentIndex + 3) { // Perbesar box secara bertahap
            activeBoxIndex++;
        } else { // Setelah 4 box diperbesar, swipe ke kanan
            activeBoxIndex = currentIndex;
            currentIndex = (currentIndex < maxIndex) ? currentIndex + 1 : 0;
            container.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
        }
        updateActiveCard();
    }

    function swipePrev() {
        if (activeBoxIndex > currentIndex) {
            activeBoxIndex--;
        } else {
            activeBoxIndex = currentIndex + 2;
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : maxIndex;
            container.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
        }
        updateActiveCard();
    }

    function startAutoSwipe() {
        intervalId = setInterval(swipeNext, 3000); // Setiap 3 detik perbesar satu box, swipe setelah 3 box
    }

    function stopAutoSwipe() {
        clearInterval(intervalId);
    }

    document.getElementById('next-button').addEventListener('click', () => {
        stopAutoSwipe();
        swipeNext();
        startAutoSwipe();
    });

    document.getElementById('prev-button').addEventListener('click', () => {
        stopAutoSwipe();
        swipePrev();
        startAutoSwipe();
    });

    window.onload = startAutoSwipe;
    window.addEventListener('resize', () => {
        stopAutoSwipe();
        startAutoSwipe();
    });
</script>

@endsection
