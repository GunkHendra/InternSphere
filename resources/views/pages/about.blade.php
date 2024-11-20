@extends('layouts/layout')

@section('content')
<div class="bg-white py-16 px-4 sm:px-6 lg:px-8">
  <div class="max-w-7xl mx-auto text-center flex flex-col items-center">
    <!-- Judul Section -->
    <img src="/assets/logo.png" alt="Logo" class="w-36 h-36 mb-3">
    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
      About InternSphere
    </h2>
    <p class="mt-4 max-w-2xl text-lg text-gray-600 mx-auto">
      InternSphere is a platform designed to connect students and young professionals with valuable internship opportunities. We are dedicated to helping you gain real-world experience, develop your skills, and build your professional network.
    </p>
  </div>

  <div class="mt-12 grid gap-8 lg:grid-cols-2">
    <!-- Misi InternSphere -->
    <div class="bg-gray-50 rounded-lg p-8 shadow-lg">
      <h3 class="text-2xl font-semibold text-gray-900">Our Mission</h3>
      <p class="mt-4 text-gray-600">
        Our mission is to make internships accessible to students across all fields. We work closely with companies to offer a variety of positions, ensuring that every student finds an opportunity that aligns with their career goals.
      </p>
    </div>

    <!-- Visi InternSphere -->
    <div class="bg-gray-50 rounded-lg p-8 shadow-lg">
      <h3 class="text-2xl font-semibold text-gray-900">Our Vision</h3>
      <p class="mt-4 text-gray-600">
        We envision a world where every student has the chance to explore their potential through hands-on learning. InternSphere aims to be the leading internship platform, trusted by students and companies alike.
      </p>
    </div>
  </div>

  <!-- Keunggulan InternSphere -->
    <div class="mt-16">
        <h3 class="text-2xl font-semibold text-center text-gray-900">Why Choose InternSphere?</h3>
        <div class="mt-12 grid gap-8 lg:grid-cols-2">

        <div class="bg-gray-50 rounded-lg p-8 shadow-lg">
            <h3 class="text-2xl font-semibold text-gray-900">Wide Range of Internships</h3>
            <p class="mt-4 text-gray-600">
            Discover internships across a variety of fields offered by reputable companies worldwide. From tech and finance to media and education, InternSphere connects you with opportunities that align with your career goals. Start building valuable skills and real-world experience with companies committed to helping you grow.
            </p>
    
    </div>

    
    <div class="bg-gray-50 rounded-lg p-8 shadow-lg">
        <h3 class="text-2xl font-semibold text-gray-900">Student-Friendly Interface</h3>
        <p class="mt-4 text-gray-600">
            Our platform is thoughtfully designed to be user-friendly, making it simple for students to search and discover internship opportunities that match their interests and career goals. With intuitive navigation and personalized recommendations, finding the right internship has never been easier. From exploring options to submitting applications, InternSphere streamlines every step to help students connect with the opportunities that matter most.
        </p>
    </div>
    </div>
  </div>
</div>


@endsection