@extends('master')
@section('title', 'Dashboard')
@section('content')



<!-- <div class="  bg-cover bg-no-repeat bg-[url(https://png.pngtree.com/png-clipart/20230211/ourmid/pngtree-medical-device-border-ambulance-png-image_6597196.png)]"> -->

<div class="  flex items-center justify-center mt-26 py-10 px-4 sm:px-6 lg:px-8">
  <div class="max-w-7xl w-full grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

    <div class="text-center md:text-left">
      <h1 class="text-5xl font-extrabold tracking-tight text-gray-900 sm:text-6xl">
        Selamat Datang di Rumah Sakit Infor!
      </h1>
      <p class="mt-4 text-xl text-gray-600 leading-relaxed">
        Kamu dapat melihat data pegawai dan departemen di rumah sakit ini melalui menu di bawah ^^
      </p>
      <div class="mt-8 flex justify-center md:justify-start gap-4">
        <a href="/employees" class="px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-800 hover:bg-emerald-900 md:py-4 md:text-lg md:px-8 shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
          Pegawai
        </a>
        <a href="/departments" class="px-6 py-3 border border-emerald-600 text-base font-medium rounded-md text-emerald-800 bg-white hover:bg-emerald-300 md:py-4 md:text-lg md:px-8 shadow-sm transition duration-300 ease-in-out transform hover:-translate-y-1">
          Departemen
        </a>
      </div>
    </div>

    <div class="flex justify-center md:justify-end lg:px-6">
      <img src="https://png.pngtree.com/png-clipart/20250513/original/pngtree-healthcare-team-supporting-patient-during-blood-donation-process-png-image_20955261.png" alt="hostpital.png" class=" max-w-full h-auto object-cover transform transition duration-500 hover:scale-105">
    </div>


  </div>
</div>

<!-- </div> -->

@endsection