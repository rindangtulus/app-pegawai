@extends('master')
@section('title', 'Detail Pegawai')
@section('content')


<div class=" py-6 sm:py-16 lg:px-8 bg-white  rounded-lg shadow-md max-w-4xl mx-auto mt-5">

    <div class="pb-4 border-b border-gray-200">
        <h1 class="text-3xl font-bold text-gray-900">{{ $employee->nama_lengkap }}</h1>
        <p class="mt-1 text-md text-gray-500">
            {{ $employee->position->nama_jabatan ?? 'Belum ada jabatan' }}
        </p>
    </div>

    <div class="mt-6">
        <h2 class="text-lg font-semibold text-gray-800">Informasi Pekerjaan</h2>
        <dl class="mt-4 grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">

            <div>
                <dt class="text-sm font-medium text-gray-500">Departemen</dt>
                <dd class="mt-1 text-md text-gray-900">{{ $employee->department->nama_departemen ?? 'N/A' }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500">Tanggal Masuk</dt>
                <dd class="mt-1 text-md text-gray-900">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500">Status</dt>
                <dd class="mt-1 text-md text-gray-900">
                    @if($employee->status == 'Aktif' || $employee->status == 'aktif')
                    <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-0.5 text-sm font-medium text-green-800">
                        Aktif
                    </span>
                    @else
                    <span class="inline-flex items-center rounded-full bg-red-100 px-3 py-0.5 text-sm font-medium text-red-800">
                        Nonaktif
                    </span>
                    @endif
                </dd>
            </div>

            <div class="bg-emerald-50 p-4 rounded-lg">
                <dt class="text-sm font-medium text-emerald-800">Gaji Pokok (dari Jabatan)</dt>
                {{-- Mengambil Gaji Pokok dari relasi position --}}
                <dd class="mt-1 text-xl font-bold text-emerald-600">
                    Rp. {{ number_format($employee->position->gaji_pokok ?? 0, 0, ',', '.') }}
                </dd>
            </div>

        </dl>
    </div>

    <hr class="my-6 border-gray-200">
    <h2 class="text-lg font-semibold text-gray-800">Informasi Pribadi</h2>
    <div class="mt-4">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
            <div>
                <dt class="text-sm font-medium text-gray-500">Email</dt>
                <dd class="mt-1 text-md text-gray-900">{{ $employee->email }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Nomor Telepon</dt>
                <dd class="mt-1 text-md text-gray-900">{{ $employee->nomor_telepon }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Tanggal Lahir</dt>
                <dd class="mt-1 text-md text-gray-900">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}</dd>
            </div>
            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                <dd class="mt-1 text-md text-gray-900">{{ $employee->alamat }}</dd>
            </div>
        </dl>
    </div>

    {{-- ====== BAGIAN RIWAYAT GAJI (SALARIES) ====== --}}
    <hr class="my-6 border-gray-200">
    <h2 class="text-lg font-semibold text-gray-800">Riwayat Gaji</h2>
    <div class="mt-4 shadow-sm rounded-lg overflow-hidden border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bulan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gaji Pokok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tunjangan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Potongan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Diterima</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($employee->salaries as $salary)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salary->bulan }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp. {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp. {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600">Rp. {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">Rp. {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                        Pegawai ini belum memiliki riwayat gaji.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="flex justify-end gap-3 mt-6 border-t border-gray-200 pt-5">
        <a href="{{ route('employees.index') }}"
            class="rounded-lg bg-gray-200 px-4 py-2 text-sm font-semibold text-gray-700 transition hover:bg-gray-300">
            Kembali ke Daftar
        </a>
        <a href="{{ route('employees.edit', $employee->id) }}"
            class="inline-flex items-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-emerald-700">
            Edit Pegawai Ini
        </a>
    </div>
</div>
@endsection