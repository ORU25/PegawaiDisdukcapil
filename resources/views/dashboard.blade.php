<x-app-layout>
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg mb-3">
                <div class="px-6 py-4 text-gray-900 text-xl font-bold tracking-tight  uppercase text-center sm:text-left">
                    {{ __("Dashboard") }}
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="me-10 ms-5 bg-white rounded shadow">
                        {!! $chart->container() !!}
                    </div>
            </div>
            <div class="lg:flex mt-3">
                <div class="lg:pe-2 w-full lg:w-1/2">
                    <div class="px-6 py-4 bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="font-semibold text-center">
                            Daftar Pegawai Naik Gaji Bulan Ini
                        </div>
                        <div class="mt-7 ">
                            <ol class="relative border-l border-gray-200 dark:border-gray-700 ms-5">
                                @forelse ($gaji as $gaji)    
                                <li class="mb-10 ml-4">
                                    <div class="absolute w-3 h-3 bg-cyan-700 rounded-full mt-1.5 -left-1.5 border border-white "></div>
                                    <time class="mb-1 text-kg font-normal leading-none text-cyan-700">{{ $gaji->tanggal }} /  
                                        <?php
                                        $angkaBulan = $gaji->bulan;
                                        $namaBulan = date('F', mktime(0, 0, 0, $angkaBulan, 1));
                                        echo $namaBulan;
                                        ?></time>
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $gaji->pegawai->nama_lengkap }}</h3>
                                </li>
                                @empty
                                    <div class="flex text-gray-500 font-semibold text-sm mt-1">
                                        <i class="fa-solid fa-file-circle-xmark  me-1"></i>
                                        Tidak ada
                                    </div>
                                @endforelse
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="lg:ps-2 w-full mt-3 lg:mt-0 lg:w-1/2">
                    <div class="px-6 py-4 bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="font-semibold text-center">
                            Daftar Pegawai Naik Jabatan Bulan Ini
                        </div>
                        <div class="mt-7 ">
                            <ol class="relative border-l border-gray-200 dark:border-gray-700 ms-5">
                                @forelse ($jabatan as $jabatan)    
                                <li class="mb-10 ml-4">
                                    <div class="absolute w-3 h-3 bg-cyan-700 rounded-full mt-1.5 -left-1.5 border border-white "></div>
                                    <time class="mb-1 text-kg font-normal leading-none text-cyan-700">{{ $jabatan->tanggal }} /  
                                        <?php
                                        $angkaBulan = $jabatan->bulan;
                                        $namaBulan = date('F', mktime(0, 0, 0, $angkaBulan, 1));
                                        echo $namaBulan;
                                        ?></time>
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $jabatan->pegawai->nama_lengkap }}</h3>
                                </li>
                                @empty
                                    <div class="flex text-gray-500 font-semibold text-sm mt-1">
                                        <i class="fa-solid fa-file-circle-xmark  me-1"></i>
                                        Tidak ada
                                    </div>
                                @endforelse
                               
                            </ol>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
</x-app-layout>
