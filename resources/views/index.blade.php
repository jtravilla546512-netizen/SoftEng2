<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoolSystem Specialist - Your Comfort, Our Priority</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Leaflet CSS for OpenStreetMap -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <!-- Leaflet JS for OpenStreetMap -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'lato': ['Lato', 'sans-serif'],
                        'roboto': ['Roboto', 'sans-serif'],
                    },
                    colors: {
                        'brand-blue': '#2B9DD1',
                        'brand-bg': '#F5EEE7',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-lato antialiased bg-brand-bg">
    <!-- Navigation Header -->
    <header class="bg-brand-bg fixed w-full top-0 z-50">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center h-16 md:h-20">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0">
                    <a href="#" class="flex items-center">
                        <img src="{{ asset('images/Logo.png') }}" alt="CoolSystem Specialist Logo" class="h-10 w-auto sm:h-11 md:h-12">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-6 lg:space-x-8 ml-8 lg:ml-12">
                    <a href="#about" class="text-brand-blue hover:text-blue-700 transition-colors duration-300 font-normal text-base lg:text-lg">
                        About Us
                    </a>
                    <a href="#services" class="text-brand-blue hover:text-blue-700 transition-colors duration-300 font-normal text-base lg:text-lg">
                        Services
                    </a>
                    <a href="#contact" class="text-brand-blue hover:text-blue-700 transition-colors duration-300 font-normal text-base lg:text-lg">
                        Contact
                    </a>
                </div>

                <!-- Spacer to push Admin Login to the right -->
                <div class="flex-grow"></div>

                <!-- Admin Login Button -->
                <div class="hidden md:flex md:justify-end">
                    <a href="#admin" class="text-brand-blue hover:text-blue-700 transition-colors duration-300 font-normal text-base lg:text-lg">
                        Admin Login
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-brand-blue hover:text-blue-700 hover:bg-white hover:bg-opacity-50 focus:outline-none ml-auto">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#about" class="text-brand-blue hover:text-blue-700 transition-colors duration-300 font-normal text-base px-3 py-2">
                        About Us
                    </a>
                    <a href="#services" class="text-brand-blue hover:text-blue-700 transition-colors duration-300 font-normal text-base px-3 py-2">
                        Services
                    </a>
                    <a href="#contact" class="text-brand-blue hover:text-blue-700 transition-colors duration-300 font-normal text-base px-3 py-2">
                        Contact
                    </a>
                    <a href="#admin" class="text-brand-blue hover:text-blue-700 transition-colors duration-300 font-normal text-base px-3 py-2">
                        Admin Login
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center bg-brand-bg pt-16 md:pt-20">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-no-repeat bg-center md:bg-left-center xl:bg-left" style="background-image: url('{{ asset('images/Background.png') }}');"></div>

        <div class="relative z-10 w-full">
            <div class="flex items-center justify-center min-h-[calc(100vh-4rem)] md:min-h-[calc(100vh-5rem)]">
                <!-- Content Container with same width as nav -->
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-center xl:justify-end">
                        <!-- Content with glassmorphism on mobile/tablet (up to 13" iPad Pro) -->
                        <div class="text-center xl:text-right flex flex-col justify-center py-6 sm:py-8 md:py-10 lg:py-12 xl:py-16 w-full sm:w-auto sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl backdrop-blur-sm bg-white/70 xl:bg-transparent rounded-2xl xl:rounded-none p-6 sm:p-8 md:p-10 xl:p-0 xl:backdrop-blur-none shadow-xl xl:shadow-none">
                            <h1 class="font-lato font-bold text-black leading-tight mb-1" style="font-size: 36px;">
                                Your Comfort, Our Priority.
                            </h1>

                            <h2 class="font-lato font-bold text-black mb-4 sm:mb-5 md:mb-6" style="font-size: 36px;">
                                Expert Appliance Services.
                            </h2>

                            <p class="font-roboto font-light text-black leading-relaxed mb-6 sm:mb-7 md:mb-8" style="font-size: 18px;">
                                Cool System Specialists provides top-tier <br class="hidden sm:inline">repair, installation, and maintenance services <br class="hidden sm:inline">for air-conditioners and refrigerators. <br class="hidden sm:inline">Experience reliable, prompt, and professional <br class="hidden sm:inline">service tailored to your needs.
                            </p>

                            <div class="flex justify-center xl:justify-end">
                                <button onclick="openBookingModal()" class="inline-block bg-brand-blue hover:bg-blue-600 text-white font-bold text-sm sm:text-base md:text-lg px-6 sm:px-7 md:px-8 py-2.5 sm:py-3 md:py-3.5 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                                    Book a Service
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-16 md:py-20 lg:py-24 bg-brand-bg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 xl:gap-16 items-start">
                <!-- Left Column - Image Placeholder -->
                <div class="flex justify-center lg:justify-start">
                    <div class="w-full max-w-md lg:max-w-lg">
                        <div class="aspect-[3/4] bg-gray-200 rounded-2xl overflow-hidden">
                            <!-- Image placeholder - technician image would go here -->
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Content -->
                <div class="flex flex-col justify-start">
                    <h2 class="font-lato font-bold text-brand-blue mb-6 md:mb-8" style="font-size: 36px; line-height: 1.2;">
                        Why Choose Cool System Specialist?
                    </h2>

                    <div class="space-y-6 md:space-y-8">
                        <p class="font-roboto font-normal text-black text-justify" style="font-size: 18px; line-height: 1.6;">
                            With almost 20 years of experience in the HVAC industry, Cool System Specialist has established itself as a trusted name in air conditioning and refrigerator services. Our team of certified technicians is dedicated to providing top-quality solutions for residential and commercial clients.
                        </p>

                        <p class="font-roboto font-normal text-black text-justify" style="font-size: 18px; line-height: 1.6;">
                            We pride ourselves on our professionalism, reliability, and commitment to customer satisfaction. Whether you need a new AC installation, emergency repairs, or regular maintenance, you can count on us to deliver exceptional service every time.
                        </p>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-12">
                        <!-- Card 1 -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="h-2 bg-brand-blue"></div>
                            <div class="p-6 text-center">
                                <div class="flex justify-center mb-4">
                                    <svg class="w-12 h-12 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-lato font-bold text-brand-blue text-4xl mb-2">15+</h3>
                                <p class="font-roboto font-normal text-black text-sm">Years of Experience</p>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="h-2 bg-brand-blue"></div>
                            <div class="p-6 text-center">
                                <div class="flex justify-center mb-4">
                                    <svg class="w-12 h-12 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-lato font-bold text-brand-blue text-4xl mb-2">5000+</h3>
                                <p class="font-roboto font-normal text-black text-sm">Happy Clients</p>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="h-2 bg-brand-blue"></div>
                            <div class="p-6 text-center">
                                <div class="flex justify-center mb-4">
                                    <svg class="w-12 h-12 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-lato font-bold text-brand-blue text-xl mb-2">Accessible</h3>
                                <p class="font-roboto font-normal text-black text-sm">Located at the heart<br>of the Davao City</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 md:py-20 lg:py-24 bg-brand-bg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Heading -->
            <div class="text-center mb-12 md:mb-16">
                <h2 class="font-lato font-bold text-brand-blue" style="font-size: 36px; line-height: 1.2;">
                    Our Services
                </h2>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10">
                <!-- Service Card 1 - AC Installation -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="h-2 bg-brand-blue"></div>
                    <div class="p-6 md:p-8">
                        <div class="flex justify-center mb-6">
                            <svg class="w-16 h-16 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-lato font-bold text-brand-blue text-2xl mb-4 text-center">AC Installation</h3>
                        <p class="font-roboto font-normal text-black text-center text-sm md:text-base leading-relaxed">
                            Enjoy hassle-free air conditioning setup from our certified techs. We ensure your unit is properly installed for maximum cooling efficiency and long-term performance.
                        </p>
                    </div>
                </div>

                <!-- Service Card 2 - AC Repair -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="h-2 bg-brand-blue"></div>
                    <div class="p-6 md:p-8">
                        <div class="flex justify-center mb-6">
                            <svg class="w-16 h-16 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-lato font-bold text-brand-blue text-2xl mb-4 text-center">AC Repair</h3>
                        <p class="font-roboto font-normal text-black text-center text-sm md:text-base leading-relaxed">
                            Stay comfortable all year round with our fast and reliable AC repair services. We troubleshoot and fix any issue. Big or small, to keep your cooling system running smoothly.
                        </p>
                    </div>
                </div>

                <!-- Service Card 3 - Refrigerator Repair -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="h-2 bg-brand-blue"></div>
                    <div class="p-6 md:p-8">
                        <div class="flex justify-center mb-6">
                            <svg class="w-16 h-16 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <h3 class="font-lato font-bold text-brand-blue text-2xl mb-4 text-center">Refrigerator Repair</h3>
                        <p class="font-roboto font-normal text-black text-center text-sm md:text-base leading-relaxed">
                            Keep your food fresh and your fridge in top shape. Our specialist handle all types of refrigerator issues, from cooling problems to component replacements, ensuring dependable performance.
                        </p>
                    </div>
                </div>

                <!-- Service Card 4 - AC Cleaning -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="h-2 bg-brand-blue"></div>
                    <div class="p-6 md:p-8">
                        <div class="flex justify-center mb-6">
                            <svg class="w-16 h-16 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </div>
                        <h3 class="font-lato font-bold text-brand-blue text-2xl mb-4 text-center">AC Cleaning</h3>
                        <p class="font-roboto font-normal text-black text-center text-sm md:text-base leading-relaxed">
                            Breathe cleaner air and improve your AC's efficiency with our professional cleaning service. We remove dirt, mold, and buildup that can affect your system's cooling power.
                        </p>
                    </div>
                </div>

                <!-- Service Card 5 - Refrigerator Cleaning -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="h-2 bg-brand-blue"></div>
                    <div class="p-6 md:p-8">
                        <div class="flex justify-center mb-6">
                            <svg class="w-16 h-16 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="font-lato font-bold text-brand-blue text-2xl mb-4 text-center">Refrigerator Cleaning</h3>
                        <p class="font-roboto font-normal text-black text-center text-sm md:text-base leading-relaxed">
                            We deep clean your refrigerator inside and out, eliminating odors, bacteria, and grime for a fresher, more hygienic kitchen environment.
                        </p>
                    </div>
                </div>

                <!-- Service Card 6 - Sales -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="h-2 bg-brand-blue"></div>
                    <div class="p-6 md:p-8">
                        <div class="flex justify-center mb-6">
                            <svg class="w-16 h-16 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-lato font-bold text-brand-blue text-2xl mb-4 text-center">Sales!</h3>
                        <p class="font-roboto font-normal text-black text-center text-sm md:text-base leading-relaxed">
                            Looking for a new air conditioner or refrigerator? We offer quality and energy-efficient units at affordable prices. With installation and after-sales support included for your convenience.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact" class="py-16 md:py-20 lg:py-24 bg-brand-bg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Heading -->
            <div class="text-center mb-12 md:mb-16">
                <h2 class="font-lato font-bold text-brand-blue" style="font-size: 36px; line-height: 1.2;">
                    Contact Us
                </h2>
            </div>

            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 xl:gap-16">
                <!-- Left Column - Contact Information -->
                <div class="bg-white/50 backdrop-blur-sm rounded-2xl shadow-lg p-8 md:p-10 lg:p-12">
                    <h3 class="font-lato font-bold text-brand-blue text-3xl mb-8 md:mb-10">
                        Contact Information
                    </h3>

                    <div class="space-y-8">
                        <!-- Our Location -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-brand-blue/10 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-lato font-bold text-brand-blue text-xl mb-2">Our Location</h4>
                                <p class="font-roboto font-normal text-black text-base">Door 4-B Lopez Jaen Street, Davao City</p>
                            </div>
                        </div>

                        <!-- Call Us -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-brand-blue/10 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-lato font-bold text-brand-blue text-xl mb-2">Call Us</h4>
                                <p class="font-roboto font-normal text-black text-base">(123) 456-7890</p>
                            </div>
                        </div>

                        <!-- Email Us -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-brand-blue/10 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-lato font-bold text-brand-blue text-xl mb-2">Email Us</h4>
                                <p class="font-roboto font-normal text-black text-base break-all">coolsystemspecialistservice@cooling.com</p>
                            </div>
                        </div>

                        <!-- Working Hours -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-brand-blue/10 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-lato font-bold text-brand-blue text-xl mb-2">Working Hours</h4>
                                <div class="font-roboto font-normal text-black text-base space-y-1">
                                    <p><span class="font-medium">Mon-Fri:</span> 8am-6pm</p>
                                    <p><span class="font-medium">Sat:</span> 9am-4pm</p>
                                    <p><span class="font-medium">Sunday:</span> <span class="text-red-600 font-medium">closed</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Map -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-[500px] md:h-[600px] lg:h-full lg:min-h-[500px]">
                    <!-- Interactive OpenStreetMap -->
                    <div id="map" class="w-full h-full relative">
                        <!-- Map will be rendered here by Leaflet -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Modal -->
    <div id="bookingModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-2 sm:p-4 md:p-6">
        <div class="bg-white rounded-lg sm:rounded-xl md:rounded-2xl shadow-2xl w-full max-w-[95%] sm:max-w-lg md:max-w-3xl lg:max-w-5xl xl:max-w-6xl" style="height: 750px; max-height: 95vh;">
            <!-- Modal Content with Fixed Layout -->
            <div class="relative h-full flex flex-col">
                <!-- Fixed Header: Progress Steps -->
                <div class="flex-shrink-0 px-3 sm:px-8 md:px-10 lg:px-12 xl:px-16 pt-4 sm:pt-8 md:pt-6 lg:pt-12 xl:pt-7 pb-3 sm:pb-6 md:pb-8">
                    <div class="flex items-center justify-between w-full">
                        <!-- Step 1 -->
                        <div class="flex flex-col items-center">
                            <div class="px-1.5 sm:px-3 md:px-3.5 lg:px-4 py-1 sm:py-1.5 md:py-2 rounded-md sm:rounded-lg md:rounded-xl flex items-center justify-center font-bold text-[8px] sm:text-xs md:text-sm lg:text-base whitespace-nowrap" style="background-color: #046C9C; color: white;">
                                STEP 1
                            </div>
                            <div class="text-[8px] sm:text-[10px] md:text-xs lg:text-sm font-normal text-center mt-1 sm:mt-2 whitespace-nowrap text-gray-700">
                                Appliance
                            </div>
                        </div>

                        <!-- Connector Line 1 -->
                        <div class="flex-1 h-0.5 bg-gray-300 mx-0.5 sm:mx-1 md:mx-2 self-center -mt-3 sm:-mt-4 md:-mt-5"></div>

                        <!-- Step 2 -->
                        <div class="flex flex-col items-center">
                            <div class="px-1.5 sm:px-3 md:px-3.5 lg:px-4 py-1 sm:py-1.5 md:py-2 bg-gray-300 text-gray-700 rounded-md sm:rounded-lg md:rounded-xl flex items-center justify-center font-bold text-[8px] sm:text-xs md:text-sm lg:text-base whitespace-nowrap">
                                STEP 2
                            </div>
                            <div class="text-[8px] sm:text-[10px] md:text-xs lg:text-sm font-normal text-center mt-1 sm:mt-2 whitespace-nowrap text-gray-700">
                                Service Type
                            </div>
                        </div>

                        <!-- Connector Line 2 -->
                        <div class="flex-1 h-0.5 bg-gray-300 mx-0.5 sm:mx-1 md:mx-2 self-center -mt-3 sm:-mt-4 md:-mt-5"></div>

                        <!-- Step 3 -->
                        <div class="flex flex-col items-center">
                            <div class="px-1.5 sm:px-3 md:px-3.5 lg:px-4 py-1 sm:py-1.5 md:py-2 bg-gray-300 text-gray-700 rounded-md sm:rounded-lg md:rounded-xl flex items-center justify-center font-bold text-[8px] sm:text-xs md:text-sm lg:text-base whitespace-nowrap">
                                STEP 3
                            </div>
                            <div class="text-[8px] sm:text-[10px] md:text-xs lg:text-sm font-normal text-center mt-1 sm:mt-2 whitespace-nowrap text-gray-700">
                                User Info
                            </div>
                        </div>

                        <!-- Connector Line 3 -->
                        <div class="flex-1 h-0.5 bg-gray-300 mx-0.5 sm:mx-1 md:mx-2 self-center -mt-3 sm:-mt-4 md:-mt-5"></div>

                        <!-- Step 4 -->
                        <div class="flex flex-col items-center">
                            <div class="px-1.5 sm:px-3 md:px-3.5 lg:px-4 py-1 sm:py-1.5 md:py-2 bg-gray-300 text-gray-700 rounded-md sm:rounded-lg md:rounded-xl flex items-center justify-center font-bold text-[8px] sm:text-xs md:text-sm lg:text-base whitespace-nowrap">
                                STEP 4
                            </div>
                            <div class="text-[8px] sm:text-[10px] md:text-xs lg:text-sm font-normal text-center mt-1 sm:mt-2 whitespace-nowrap text-gray-700">
                                Schedule
                            </div>
                        </div>

                        <!-- Connector Line 4 -->
                        <div class="flex-1 h-0.5 bg-gray-300 mx-0.5 sm:mx-1 md:mx-2 self-center -mt-3 sm:-mt-4 md:-mt-5"></div>

                        <!-- Step 5 -->
                        <div class="flex flex-col items-center">
                            <div class="px-1.5 sm:px-3 md:px-3.5 lg:px-4 py-1 sm:py-1.5 md:py-2 bg-gray-300 text-gray-700 rounded-md sm:rounded-lg md:rounded-xl flex items-center justify-center font-bold text-[8px] sm:text-xs md:text-sm lg:text-base whitespace-nowrap">
                                STEP 5
                            </div>
                            <div class="text-[8px] sm:text-[10px] md:text-xs lg:text-sm font-normal text-center mt-1 sm:mt-2 whitespace-nowrap text-gray-700">
                                Summary
                            </div>
                        </div>

                        <!-- Connector Line 5 -->
                        <div class="flex-1 h-0.5 bg-gray-300 mx-0.5 sm:mx-1 md:mx-2 self-center -mt-3 sm:-mt-4 md:-mt-5"></div>

                        <!-- Step 6 -->
                        <div class="flex flex-col items-center">
                            <div class="px-2 sm:px-4 md:px-5 lg:px-6 py-1.5 sm:py-2 md:py-2.5 lg:py-3 bg-gray-300 text-gray-700 rounded-md sm:rounded-lg md:rounded-xl flex items-center justify-center font-bold text-[8px] sm:text-xs md:text-sm lg:text-base whitespace-nowrap">
                                STEP 6
                            </div>
                            <div class="text-[8px] sm:text-[10px] md:text-xs lg:text-sm font-normal text-center mt-1 sm:mt-2 whitespace-nowrap text-gray-700">
                                Success
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flexible Middle: Step Content -->
                <div id="stepContent" class="flex-grow px-6 sm:px-8 md:px-10 lg:px-12 xl:px-16 overflow-y-auto">
                    <!-- Step 1: Select Appliance -->
                    <div id="step1" class="step-content">
                        <h2 class="font-lato font-bold text-xl sm:text-2xl md:text-3xl lg:text-4xl text-black mb-6 sm:mb-8 text-center">
                            Select Your Appliance
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 mb-8 sm:mb-10">
                            <!-- Air-conditioner Option -->
                            <button onclick="selectAppliance('air-conditioner')" class="appliance-option border-2 border-gray-300 rounded-lg sm:rounded-xl p-6 sm:p-8 md:p-10 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 flex flex-col items-center justify-center space-y-3 sm:space-y-4 min-h-[150px] sm:min-h-[180px]">
                                <svg class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                <span class="font-roboto font-medium text-base sm:text-lg md:text-xl text-black">
                                    Air-conditioner
                                </span>
                            </button>

                            <!-- Refrigerator Option -->
                            <button onclick="selectAppliance('refrigerator')" class="appliance-option border-2 border-gray-300 rounded-lg sm:rounded-xl p-6 sm:p-8 md:p-10 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 flex flex-col items-center justify-center space-y-3 sm:space-y-4 min-h-[150px] sm:min-h-[180px]">
                                <svg class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                <span class="font-roboto font-medium text-base sm:text-lg md:text-xl text-black">
                                    Refrigerator
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Select Service Type -->
                    <div id="step2" class="step-content hidden">
                        <h2 class="font-lato font-bold text-xl sm:text-2xl md:text-3xl text-black mb-2 sm:mb-3 text-center">
                            Select Service Type
                        </h2>
                        <p class="font-roboto text-sm sm:text-base text-gray-600 mb-6 sm:mb-8 text-center">
                            Choose the service that best suits your needs.
                        </p>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 md:gap-8 mb-8 sm:mb-10">
                            <!-- Repair Option -->
                            <button onclick="selectService('repair')" class="service-option border-2 border-gray-300 rounded-lg sm:rounded-xl p-6 sm:p-8 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 flex flex-col items-center justify-center space-y-3 sm:space-y-4 min-h-[200px] sm:min-h-[230px]">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 border-2 border-gray-700 rounded-lg flex items-center justify-center">
                                    <svg class="w-10 h-10 sm:w-12 sm:h-12 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-lato font-bold text-lg sm:text-xl text-black">Repair</h3>
                                <p class="font-roboto text-xs sm:text-sm text-gray-600 text-center leading-relaxed">
                                    Restore your appliance to optimal working condition with our expert technicians. We fix all major brands and models, ensuring reliable performance.
                                </p>
                            </button>

                            <!-- Installation Option -->
                            <button onclick="selectService('installation')" class="service-option border-2 border-gray-300 rounded-lg sm:rounded-xl p-6 sm:p-8 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 flex flex-col items-center justify-center space-y-3 sm:space-y-4 min-h-[200px] sm:min-h-[230px]">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 border-2 border-gray-700 rounded-lg flex items-center justify-center">
                                    <svg class="w-10 h-10 sm:w-12 sm:h-12 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                </div>
                                <h3 class="font-lato font-bold text-lg sm:text-xl text-black">Installation</h3>
                                <p class="font-roboto text-xs sm:text-sm text-gray-600 text-center leading-relaxed">
                                    Professional setup and integration of your new air conditioner or refrigerator. Our certified installers ensure safe and efficient operation.
                                </p>
                            </button>

                            <!-- Maintenance Option -->
                            <button onclick="selectService('maintenance')" class="service-option border-2 border-gray-300 rounded-lg sm:rounded-xl p-6 sm:p-8 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 flex flex-col items-center justify-center space-y-3 sm:space-y-4 min-h-[200px] sm:min-h-[230px]">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 border-2 border-gray-700 rounded-lg flex items-center justify-center">
                                    <svg class="w-10 h-10 sm:w-12 sm:h-12 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                    </svg>
                                </div>
                                <h3 class="font-lato font-bold text-lg sm:text-xl text-black">Maintenance</h3>
                                <p class="font-roboto text-xs sm:text-sm text-gray-600 text-center leading-relaxed">
                                    Regular check-ups and servicing to extend your appliance's lifespan and prevent costly breakdowns. Keep your units running smoothly.
                                </p>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: User Information -->
                <div id="step3" class="step-content hidden">
                    <div class="text-center mb-4 sm:mb-6">
                        <h2 class="font-lato font-bold text-xl sm:text-2xl md:text-3xl text-black mb-2">Enter Your Contact Information</h2>
                        <p class="font-roboto text-xs sm:text-sm md:text-base text-gray-600 px-4 sm:px-6">
                            Please provide your details so we can effectively reach you and prepare for your service appointment
                        </p>
                    </div>

                    <!-- Scrollable Form Area -->
                    <div class="max-w-2xl mx-auto overflow-y-auto pr-2" style="max-height: 320px;">
                        <div class="space-y-3 sm:space-y-4">
                            <!-- Full Name -->
                            <div>
                                <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1.5">Full Name</label>
                                <input
                                    type="text"
                                    id="fullName"
                                    placeholder="Your Full Name"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent text-sm transition-all duration-300"
                                >
                            </div>

                            <!-- Location -->
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 mb-1.5">Location</label>
                                <input
                                    type="text"
                                    id="location"
                                    placeholder="Your Address"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent text-sm transition-all duration-300"
                                >
                            </div>

                            <!-- Landmark (Optional) -->
                            <div>
                                <label for="landmark" class="block text-sm font-medium text-gray-700 mb-1.5">Landmark (Optional)</label>
                                <input
                                    type="text"
                                    id="landmark"
                                    placeholder="Nearby Landmark"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent text-sm transition-all duration-300"
                                >
                            </div>

                            <!-- Contact Number -->
                            <div>
                                <label for="contactNumber" class="block text-sm font-medium text-gray-700 mb-1.5">Contact Number</label>
                                <input
                                    type="tel"
                                    id="contactNumber"
                                    placeholder="Your Phone Number"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent text-sm transition-all duration-300"
                                >
                            </div>

                            <!-- Description of Appliance Issue -->
                            <div>
                                <label for="applianceIssue" class="block text-sm font-medium text-gray-700 mb-1.5">Description of Appliance Issue</label>
                                <textarea
                                    id="applianceIssue"
                                    rows="3"
                                    maxlength="100"
                                    placeholder="Please describe the problem with your appliance in detail (e.g., 'Refrigerator not cooling', 'Aircon making strange noises')."
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent text-sm transition-all duration-300 resize-none"
                                ></textarea>
                                <p class="text-xs text-gray-500 mt-1">Maximum 100 characters</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Schedule -->
                <div id="step4" class="step-content hidden">
                    <div class="text-center mb-4 sm:mb-6">
                        <h2 class="font-lato font-bold text-xl sm:text-2xl md:text-3xl text-black">Select Date</h2>
                    </div>

                    <!-- Calendar and Timeslot Container - Fixed Height -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                        <!-- Left Column: Calendar -->
                        <div class="flex flex-col">
                            <h3 class="font-lato font-semibold text-base sm:text-lg text-black mb-3">Select a Date</h3>
                            <div class="bg-white border border-gray-300 rounded-lg p-4" style="height: 350px;">
                                <!-- Calendar Header -->
                                <div class="flex items-center justify-between mb-4">
                                    <button onclick="previousMonth()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <span id="currentMonth" class="font-roboto font-medium text-base text-black">September 2025</span>
                                    <button onclick="nextMonth()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>

                                <!-- Calendar Grid -->
                                <div class="grid grid-cols-7 gap-1">
                                    <!-- Day Headers -->
                                    <div class="text-center text-xs font-medium text-gray-500 py-1.5">Su</div>
                                    <div class="text-center text-xs font-medium text-gray-500 py-1.5">Mo</div>
                                    <div class="text-center text-xs font-medium text-gray-500 py-1.5">Tu</div>
                                    <div class="text-center text-xs font-medium text-gray-500 py-1.5">We</div>
                                    <div class="text-center text-xs font-medium text-gray-500 py-1.5">Th</div>
                                    <div class="text-center text-xs font-medium text-gray-500 py-1.5">Fr</div>
                                    <div class="text-center text-xs font-medium text-gray-500 py-1.5">Sa</div>
                                    
                                    <!-- Calendar Days -->
                                    <div id="calendarDays" class="contents">
                                        <!-- Days will be populated by JavaScript -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Timeslots -->
                        <div class="flex flex-col">
                            <h3 class="font-lato font-semibold text-base sm:text-lg text-black mb-3">Select a Timeslot</h3>
                            <div class="grid grid-cols-3 gap-3 content-start" style="height: 350px; overflow-y: auto;">
                                <!-- Morning Slots -->
                                <button onclick="selectTimeslot('09:00 AM')" class="timeslot-option px-4 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 h-fit">
                                    09:00 AM
                                </button>
                                <button onclick="selectTimeslot('10:00 AM')" class="timeslot-option px-4 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 h-fit">
                                    10:00 AM
                                </button>
                                <button onclick="selectTimeslot('11:00 AM')" class="timeslot-option px-4 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 h-fit">
                                    11:00 AM
                                </button>
                                
                                <!-- Afternoon Slots -->
                                <button onclick="selectTimeslot('01:00 PM')" class="timeslot-option px-4 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 h-fit">
                                    01:00 PM
                                </button>
                                <button onclick="selectTimeslot('02:00 PM')" class="timeslot-option px-4 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 h-fit">
                                    02:00 PM
                                </button>
                                <button onclick="selectTimeslot('03:00 PM')" class="timeslot-option px-4 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 h-fit">
                                    03:00 PM
                                </button>
                                
                                <!-- Evening Slots -->
                                <button onclick="selectTimeslot('04:00 PM')" class="timeslot-option px-4 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 h-fit">
                                    04:00 PM
                                </button>
                                <button onclick="selectTimeslot('05:00 PM')" class="timeslot-option px-4 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 h-fit">
                                    05:00 PM
                                </button>
                                <button onclick="selectTimeslot('06:00 PM')" class="timeslot-option px-4 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:border-brand-blue hover:bg-blue-50 transition-all duration-300 h-fit">
                                    06:00 PM
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Booking Summary -->
                <div id="step5" class="step-content hidden">
                    <div class="text-center mb-6">
                        <h2 class="font-lato font-bold text-2xl sm:text-3xl text-black">Booking Summary</h2>
                    </div>

                    <!-- Summary Content - Single Border Container with margin -->
                    <div class="mx-4 sm:mx-6 md:mx-8 lg:mx-12 border border-gray-300 rounded-lg px-6 sm:px-8 py-6">
                        <!-- Two Column Layout -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12 gap-y-8">
                            <!-- Left Column: Your Information -->
                            <div>
                                <div class="flex items-center gap-2 mb-6">
                                    <svg class="w-5 h-5 text-black flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <h3 class="font-lato font-bold text-lg text-black">Your Information</h3>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <p class="font-roboto text-sm text-black mb-1">Full Name:</p>
                                        <p id="summaryFullName" class="font-roboto text-base text-black">-</p>
                                    </div>
                                    <div>
                                        <p class="font-roboto text-sm text-black mb-1">Contact Number:</p>
                                        <p id="summaryContactNumber" class="font-roboto text-base text-black">-</p>
                                    </div>
                                    <div>
                                        <p class="font-roboto text-sm text-black mb-1">Location:</p>
                                        <p id="summaryLocation" class="font-roboto text-base text-black">-</p>
                                    </div>
                                    <div id="summaryLandmarkContainer">
                                        <p class="font-roboto text-sm text-black mb-1">Landmark:</p>
                                        <p id="summaryLandmark" class="font-roboto text-base text-black">-</p>
                                    </div>
                                    <div>
                                        <p class="font-roboto text-sm text-black mb-1">Issue Description:</p>
                                        <p id="summaryIssue" class="font-roboto text-base text-black leading-relaxed break-words">-</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: Appliance & Service Details + Appointment Details -->
                            <div class="space-y-8">
                                <!-- Appliance & Service Details -->
                                <div>
                                    <div class="flex items-center gap-2 mb-6">
                                        <svg class="w-5 h-5 text-black flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                        <h3 class="font-lato font-bold text-lg text-black">Appliance & Service Details</h3>
                                    </div>
                                    <div class="grid grid-cols-2 gap-6">
                                        <div>
                                            <p class="font-roboto text-sm text-black mb-1">Appliance:</p>
                                            <p id="summaryAppliance" class="font-roboto text-base text-black capitalize">-</p>
                                        </div>
                                        <div>
                                            <p class="font-roboto text-sm text-black mb-1">Service Type:</p>
                                            <p id="summaryService" class="font-roboto text-base text-black capitalize">-</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Appointment Details -->
                                <div>
                                    <div class="flex items-center gap-2 mb-6">
                                        <svg class="w-5 h-5 text-black flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <h3 class="font-lato font-bold text-lg text-black">Appointment Details</h3>
                                    </div>
                                    <div class="grid grid-cols-2 gap-6">
                                        <div>
                                            <p class="font-roboto text-sm text-black mb-1">Date:</p>
                                            <p id="summaryDate" class="font-roboto text-base text-black">-</p>
                                        </div>
                                        <div>
                                            <p class="font-roboto text-sm text-black mb-1">Time:</p>
                                            <p id="summaryTime" class="font-roboto text-base text-black">-</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 6: Success -->
                <div id="step6" class="step-content hidden">
                    <div class="text-center mb-8">
                        <h2 class="font-lato font-bold text-2xl sm:text-3xl text-black">Booking Confirmed!</h2>
                    </div>

                    <!-- Success Message Content -->
                    <div class="mx-4 sm:mx-6 md:mx-8 lg:mx-12 space-y-6">
                        <div class="text-center space-y-4">
                            <p class="font-roboto text-base text-gray-700 leading-relaxed">
                                Thank you for choosing Cool System Specialist. Your service request has been successfully received.
                            </p>
                            <p class="font-roboto text-base text-gray-700 leading-relaxed">
                                We're thrilled to confirm your booking for an appliance service.<br>
                                Here's what happens next:
                            </p>
                        </div>

                        <!-- What Happens Next Section -->
                        <div class="space-y-5 max-w-2xl mx-auto">
                            <!-- Email Confirmation -->
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-roboto text-sm text-gray-700 leading-relaxed">
                                        A confirmation email with all your booking details has been sent to your registered email address.
                                    </p>
                                </div>
                            </div>

                            <!-- Technician Contact -->
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-roboto text-sm text-gray-700 leading-relaxed">
                                        Our technician will contact you within 24 hours to re-confirm the appointment time and address.
                                    </p>
                                </div>
                            </div>

                            <!-- Service Reminder -->
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-roboto text-sm text-gray-700 leading-relaxed">
                                        Please ensure someone is available at the provided location during the scheduled service time.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Closing Message -->
                        <div class="text-center mt-8">
                            <p class="font-roboto text-base text-gray-700 leading-relaxed">
                                We look forward to providing you with excellent service!
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Fixed Footer: Navigation Buttons -->
                <div class="flex-shrink-0 px-6 sm:px-8 md:px-10 lg:px-12 xl:px-16 pb-6 sm:pb-8 pt-4 sm:pt-5 mt-4">
                    <div id="normalButtons" class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3 sm:gap-4">
                        <button id="backButton" onclick="handleBackButton()" class="w-full sm:w-auto px-6 sm:px-8 md:px-10 py-2.5 sm:py-3 border-2 border-gray-300 text-gray-700 rounded-lg font-medium text-sm sm:text-base hover:bg-gray-50 transition-all duration-300">
                            Back
                        </button>
                        <button id="nextButton" onclick="nextStep()" class="w-full sm:w-auto px-6 sm:px-8 md:px-10 py-2.5 sm:py-3 bg-brand-blue text-white rounded-lg font-medium text-sm sm:text-base hover:bg-blue-600 transition-all duration-300">
                            Next
                        </button>
                    </div>
                    <!-- Alternative buttons for Step 6 -->
                    <div id="step6Buttons" class="hidden flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3 sm:gap-4">
                        <button onclick="resetAndOpenBooking()" class="w-full sm:w-auto px-6 sm:px-8 md:px-10 py-2.5 sm:py-3 bg-brand-blue text-white rounded-lg font-medium text-sm sm:text-base hover:bg-blue-600 transition-all duration-300">
                            Book Another Service
                        </button>
                        <button onclick="closeBookingModal()" class="w-full sm:w-auto px-6 sm:px-8 md:px-10 py-2.5 sm:py-3 border-2 border-gray-300 text-gray-700 rounded-lg font-medium text-sm sm:text-base hover:bg-gray-50 transition-all duration-300">
                            Go to Home
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[60] flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <h3 class="font-lato font-bold text-xl text-center text-white bg-brand-blue py-3 rounded-t-lg">Confirm Booking</h3>
            <div class="p-6">
                <p class="font-roboto text-base text-center text-gray-700 mb-6">Do you want to confirm this booking?</p>
                <div class="flex gap-4 justify-center">
                    <button onclick="cancelConfirmation()" class="px-8 py-2.5 border-2 border-gray-300 text-gray-700 rounded-lg font-medium text-base hover:bg-gray-50 transition-all duration-300">
                        No
                    </button>
                    <button onclick="confirmBooking()" class="px-8 py-2.5 bg-brand-blue text-white rounded-lg font-medium text-base hover:bg-blue-600 transition-all duration-300">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Modal JavaScript -->
    <script>
        let currentStep = 1;
        let bookingData = {
            appliance: '',
            serviceType: '',
            userInfo: {},
            schedule: {}
        };

        function openBookingModal() {
            document.getElementById('bookingModal').classList.remove('hidden');
            document.getElementById('bookingModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
            updateProgressBar();
            updateButtonVisibility();
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').classList.add('hidden');
            document.getElementById('bookingModal').classList.remove('flex');
            document.body.style.overflow = 'auto';
            // Reset to step 1
            currentStep = 1;
            bookingData = {
                appliance: '',
                serviceType: '',
                userInfo: {},
                schedule: {}
            };
            showStep(1);
            updateProgressBar();
            updateButtonVisibility();
            
            // Clear form inputs
            document.getElementById('fullName').value = '';
            document.getElementById('location').value = '';
            document.getElementById('landmark').value = '';
            document.getElementById('contactNumber').value = '';
            document.getElementById('applianceIssue').value = '';
            
            // Clear appliance and service selections
            document.querySelectorAll('.appliance-option').forEach(option => {
                option.classList.remove('border-brand-blue', 'bg-blue-50');
            });
            document.querySelectorAll('.service-option').forEach(option => {
                option.classList.remove('border-brand-blue', 'bg-blue-50');
            });
        }

        function selectAppliance(appliance) {
            bookingData.appliance = appliance;
            // Add visual feedback
            document.querySelectorAll('.appliance-option').forEach(option => {
                option.classList.remove('border-brand-blue', 'bg-blue-50');
            });
            event.target.closest('.appliance-option').classList.add('border-brand-blue', 'bg-blue-50');
        }

        function selectService(service) {
            bookingData.serviceType = service;
            // Add visual feedback
            document.querySelectorAll('.service-option').forEach(option => {
                option.classList.remove('border-brand-blue', 'bg-blue-50');
            });
            event.target.closest('.service-option').classList.add('border-brand-blue', 'bg-blue-50');
        }

        function showStep(stepNumber) {
            // Hide all steps
            document.querySelectorAll('.step-content').forEach(step => {
                step.classList.add('hidden');
            });
            // Show current step
            document.getElementById('step' + stepNumber).classList.remove('hidden');
        }

        function updateProgressBar() {
            // Update all steps and connector lines
            for (let i = 1; i <= 6; i++) {
                const stepElement = document.querySelector(`#bookingModal .flex.items-center.justify-between > div:nth-child(${i * 2 - 1}) > div:first-child`);
                const labelElement = document.querySelector(`#bookingModal .flex.items-center.justify-between > div:nth-child(${i * 2 - 1}) > div:last-child`);

                if (i === currentStep) {
                    // Active step - dark blue
                    stepElement.style.backgroundColor = '#046C9C';
                    stepElement.style.color = 'white';
                    stepElement.classList.remove('bg-gray-300', 'text-gray-700');
                    labelElement.style.color = '#046C9C';
                    labelElement.classList.remove('text-gray-700');
                } else if (i < currentStep) {
                    // Completed steps - light blue
                    stepElement.style.backgroundColor = '#2B9DD1';
                    stepElement.style.color = 'white';
                    stepElement.classList.remove('bg-gray-300', 'text-gray-700');
                    labelElement.style.color = '#2B9DD1';
                    labelElement.classList.remove('text-gray-700');
                } else {
                    // Future steps - gray color
                    stepElement.style.backgroundColor = '';
                    stepElement.style.color = '';
                    if (!stepElement.classList.contains('bg-gray-300')) {
                        stepElement.classList.add('bg-gray-300', 'text-gray-700');
                    }
                    labelElement.style.color = '';
                    if (!labelElement.classList.contains('text-gray-700')) {
                        labelElement.classList.add('text-gray-700');
                    }
                }

                // Update connector lines (between steps)
                if (i < 6) {
                    const connectorElement = document.querySelector(`#bookingModal .flex.items-center.justify-between > div:nth-child(${i * 2})`);
                    if (connectorElement) {
                        if (i <= currentStep) {
                            // Connector up to and including current step - light blue (active/completed)
                            connectorElement.style.backgroundColor = '#2B9DD1';
                            connectorElement.classList.remove('bg-gray-300');
                        } else {
                            // Connector after current step - gray
                            connectorElement.style.backgroundColor = '';
                            if (!connectorElement.classList.contains('bg-gray-300')) {
                                connectorElement.classList.add('bg-gray-300');
                            }
                        }
                    }
                }
            }
        }

        function nextStep() {
            if (currentStep === 1 && !bookingData.appliance) {
                alert('Please select an appliance');
                return;
            }
            if (currentStep === 2 && !bookingData.serviceType) {
                alert('Please select a service type');
                return;
            }
            if (currentStep === 3) {
                // Validate user info
                const fullName = document.getElementById('fullName').value.trim();
                const location = document.getElementById('location').value.trim();
                const contactNumber = document.getElementById('contactNumber').value.trim();
                const applianceIssue = document.getElementById('applianceIssue').value.trim();

                if (!fullName || !location || !contactNumber || !applianceIssue) {
                    alert('Please fill in all required fields');
                    return;
                }

                // Store user info
                bookingData.userInfo = {
                    fullName,
                    location,
                    landmark: document.getElementById('landmark').value.trim(),
                    contactNumber,
                    applianceIssue
                };
            }

            if (currentStep === 4) {
                // Validate schedule
                if (!bookingData.schedule.date || !bookingData.schedule.timeslot) {
                    alert('Please select both a date and timeslot');
                    return;
                }
            }

            // Show confirmation modal when on step 5
            if (currentStep === 5) {
                showConfirmationModal();
                return;
            }

            if (currentStep < 6) {
                currentStep++;
                showStep(currentStep);
                updateProgressBar();
                updateButtonVisibility();
                
                // Initialize calendar when entering step 4
                if (currentStep === 4) {
                    initializeCalendar();
                }
                
                // Populate summary when entering step 5
                if (currentStep === 5) {
                    populateSummary();
                }
            }
        }

        function showConfirmationModal() {
            document.getElementById('confirmationModal').classList.remove('hidden');
            document.getElementById('confirmationModal').classList.add('flex');
        }

        function cancelConfirmation() {
            document.getElementById('confirmationModal').classList.add('hidden');
            document.getElementById('confirmationModal').classList.remove('flex');
        }

        function confirmBooking() {
            // Hide confirmation modal
            cancelConfirmation();
            
            // Move to step 6
            currentStep = 6;
            showStep(currentStep);
            updateProgressBar();
            updateButtonVisibility();
        }

        function updateButtonVisibility() {
            const normalButtons = document.getElementById('normalButtons');
            const step6Buttons = document.getElementById('step6Buttons');
            
            if (currentStep === 6) {
                normalButtons.classList.add('hidden');
                step6Buttons.classList.remove('hidden');
                step6Buttons.classList.add('flex');
            } else {
                normalButtons.classList.remove('hidden');
                step6Buttons.classList.add('hidden');
                step6Buttons.classList.remove('flex');
            }
        }

        function resetAndOpenBooking() {
            // Reset booking data and go to step 1
            bookingData = {
                appliance: '',
                serviceType: '',
                userInfo: {},
                schedule: {}
            };
            currentStep = 1;
            showStep(1);
            updateProgressBar();
            updateButtonVisibility();
            
            // Clear form inputs
            document.getElementById('fullName').value = '';
            document.getElementById('location').value = '';
            document.getElementById('landmark').value = '';
            document.getElementById('contactNumber').value = '';
            document.getElementById('applianceIssue').value = '';
        }

        function populateSummary() {
            // Appliance & Service
            document.getElementById('summaryAppliance').textContent = bookingData.appliance || '-';
            document.getElementById('summaryService').textContent = bookingData.serviceType || '-';
            
            // Appointment Details
            document.getElementById('summaryDate').textContent = bookingData.schedule.date || '-';
            document.getElementById('summaryTime').textContent = bookingData.schedule.timeslot || '-';
            
            // Your Information
            document.getElementById('summaryFullName').textContent = bookingData.userInfo.fullName || '-';
            document.getElementById('summaryLocation').textContent = bookingData.userInfo.location || '-';
            document.getElementById('summaryContactNumber').textContent = bookingData.userInfo.contactNumber || '-';
            document.getElementById('summaryIssue').textContent = bookingData.userInfo.applianceIssue || '-';
            
            // Landmark (hide if empty)
            const landmark = bookingData.userInfo.landmark;
            const landmarkContainer = document.getElementById('summaryLandmarkContainer');
            if (landmark) {
                document.getElementById('summaryLandmark').textContent = landmark;
                landmarkContainer.style.display = 'block';
            } else {
                landmarkContainer.style.display = 'none';
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
                updateProgressBar();
                updateButtonVisibility();
            }
        }

        function handleBackButton() {
            if (currentStep === 1) {
                closeBookingModal();
            } else {
                prevStep();
            }
        }

        // Calendar functionality
        let currentDate = new Date();
        let selectedDate = null;

        function initializeCalendar() {
            renderCalendar();
        }

        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            
            // Update month display
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"];
            document.getElementById('currentMonth').textContent = `${monthNames[month]} ${year}`;
            
            // Get first day of month and number of days
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const daysInPrevMonth = new Date(year, month, 0).getDate();
            
            const calendarDays = document.getElementById('calendarDays');
            calendarDays.innerHTML = '';
            
            // Previous month's trailing days
            for (let i = firstDay - 1; i >= 0; i--) {
                const day = daysInPrevMonth - i;
                const dayBtn = document.createElement('button');
                dayBtn.className = 'p-1.5 text-center text-sm text-gray-400 cursor-not-allowed';
                dayBtn.textContent = day;
                dayBtn.disabled = true;
                calendarDays.appendChild(dayBtn);
            }
            
            // Current month's days
            const today = new Date();
            for (let day = 1; day <= daysInMonth; day++) {
                const dayBtn = document.createElement('button');
                const currentDateObj = new Date(year, month, day);
                const isPast = currentDateObj < new Date(today.getFullYear(), today.getMonth(), today.getDate());
                
                dayBtn.textContent = day;
                
                if (isPast) {
                    dayBtn.className = 'p-1.5 text-center text-sm text-gray-400 cursor-not-allowed';
                    dayBtn.disabled = true;
                } else {
                    dayBtn.className = 'p-1.5 text-center text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors cursor-pointer';
                    dayBtn.onclick = () => selectDate(year, month, day);
                    
                    // Highlight selected date
                    if (selectedDate && 
                        selectedDate.getDate() === day && 
                        selectedDate.getMonth() === month && 
                        selectedDate.getFullYear() === year) {
                        dayBtn.className = 'p-1.5 text-center text-sm bg-brand-blue text-white rounded-lg font-medium';
                    }
                }
                
                calendarDays.appendChild(dayBtn);
            }
            
            // Next month's leading days - Always fill to 42 total cells (6 rows)
            const totalCells = calendarDays.children.length;
            const targetCells = 42; // 6 rows x 7 days
            const remainingCells = targetCells - totalCells;
            
            for (let day = 1; day <= remainingCells; day++) {
                const dayBtn = document.createElement('button');
                dayBtn.className = 'p-1.5 text-center text-sm text-gray-400 cursor-not-allowed';
                dayBtn.textContent = day;
                dayBtn.disabled = true;
                calendarDays.appendChild(dayBtn);
            }
        }

        function selectDate(year, month, day) {
            selectedDate = new Date(year, month, day);
            bookingData.schedule.date = selectedDate.toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            renderCalendar();
        }

        function previousMonth() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        }

        function nextMonth() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        }

        function selectTimeslot(timeslot) {
            bookingData.schedule.timeslot = timeslot;
            // Add visual feedback
            document.querySelectorAll('.timeslot-option').forEach(option => {
                option.classList.remove('border-brand-blue', 'bg-blue-50', 'text-brand-blue');
                option.classList.add('border-gray-300', 'text-gray-700');
            });
            event.target.classList.remove('border-gray-300', 'text-gray-700');
            event.target.classList.add('border-brand-blue', 'bg-blue-50', 'text-brand-blue');
        }

        // Close modal when clicking outside - wait for DOM to load
        window.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('bookingModal');
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeBookingModal();
                    }
                });
            }
        });
    </script>

</body>
</html>
