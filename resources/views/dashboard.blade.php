<x-app-layout>
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg mb-3">
                <div class="px-6 py-4 text-cyan-700 text-2xl font-bold tracking-tight  uppercase text-center sm:text-left">
                    {{ __("Dashboard") }}
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm rounded-lg mb-3">
                    <div class="me-11 ms-5 bg-white rounded ">
                        {!! $chart->container() !!}
                    </div>
            </div>
            
            {{-- gaji dan pangkat --}}
            <div class="lg:flex mb-3 mt-10">
                <div class="lg:pe-2 w-full lg:w-1/2">
                    <div class="px-6 py-4 bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="font-semibold text-center text-cyan-700">
                            Daftar Kenaikan Gaji Pegawai Bulan Depan
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
                        <div class="font-semibold text-center text-cyan-700">
                            Daftar Kenaikan Pangkat Pegawai Tahun Ini
                        </div>
                        <div class="mt-7 ">
                            <ol class="relative border-l border-gray-200 dark:border-gray-700 ms-5">
                                @forelse ($pangkat as $pangkat)    
                                <li class="mb-10 ml-4">
                                    <div class="absolute w-3 h-3 bg-cyan-700 rounded-full mt-1.5 -left-1.5 border border-white "></div>
                                    <time class="mb-1 text-kg font-normal leading-none text-cyan-700">  
                                        <?php
                                        $angkaBulan = $pangkat->bulan;
                                        $namaBulan = date('F', mktime(0, 0, 0, $angkaBulan, 1));
                                        echo $namaBulan;
                                        ?> / {{ $pangkat->tahun }}
                                    </time>
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $pangkat->pegawai->nama_lengkap }}</h3>
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

            <div class="mb-3 mt-10  ">
                <div class=" bg-white rounded-lg w-full text-center ">
                    <div class="px-6 py-4 text-cyan-700 text-xl font-bold tracking-tight  uppercase text-center ">
                        {{ __("Pejabat DISDUKCAPIL Bontang") }}
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm rounded-lg mb-3">
                <div class="me-10 ms-5 bg-white rounded text-center">
                    <div class="my-16 sm:mx-16 mx-5">
                        @if ($kadis)   
                            @foreach ($kadis->pegawai as $pegawai)                            
                            <a href="{{ route('dtail',$pegawai->nip) }}" class="mb-5 flex flex-col items-center bg-gray-100 rounded-lg shadow lg:flex-row lg:max-w-xl hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mx-auto">
                                <img class="object-cover w-full rounded-t-lg h-96 lg:h-auto lg:w-48 lg:rounded-none lg:rounded-l-lg" src="{{ asset('foto_pegawai/'.$pegawai->foto) }}" alt="">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="text-left mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $pegawai->nama_lengkap}}</h5>
                                    <p class="mb-3 font-normal text-cyan-700 dark:text-gray-400 text-left">{{ $pegawai->jabatan->nama_jabatan }}</p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-left">NIP: {{ $pegawai->nip }}</p>
                                </div>
                            </a>

                            @endforeach
                       
                            
                        @endif
                       
                    
                        @if ($sekretaris)
                        @foreach ($sekretaris->pegawai as $pegawai)                            
                        <a href="{{ route('dtail',$pegawai->nip) }}" class="mb-5 flex flex-col items-center bg-gray-100 rounded-lg shadow lg:flex-row lg:max-w-xl hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mx-auto">
                            <img class="object-cover w-full rounded-t-lg h-96 lg:h-auto lg:w-48 lg:rounded-none lg:rounded-l-lg" src="{{ asset('foto_pegawai/'.$pegawai->foto) }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="text-left mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $pegawai->nama_lengkap}}</h5>
                                <p class="mb-3 font-normal text-cyan-700 dark:text-gray-400 text-left">{{ $pegawai->jabatan->nama_jabatan }}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-left">NIP: {{ $pegawai->nip }}</p>
                            </div>
                        </a>
                        @endforeach
                       
                            
                        @endif

                        @if ($kabidDaduk)
                        @foreach ($kabidDaduk->pegawai as $pegawai)                            
                        <a href="{{ route('dtail',$pegawai->nip) }}" class="mb-5 flex flex-col items-center bg-gray-100 rounded-lg shadow lg:flex-row lg:max-w-xl hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mx-auto">
                            <img class="object-cover w-full rounded-t-lg h-96 lg:h-auto lg:w-48 lg:rounded-none lg:rounded-l-lg" src="{{ asset('foto_pegawai/'.$pegawai->foto) }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="text-left mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $pegawai->nama_lengkap}}</h5>
                                <p class="mb-3 font-normal text-cyan-700 dark:text-gray-400 text-left">{{ $pegawai->jabatan->nama_jabatan }}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-left">NIP: {{ $pegawai->nip }}</p>
                            </div>
                        </a>
                        @endforeach 
                       
                            
                        @endif
                     

                        @if ($kabidCapil)
                        @foreach ($kabidCapil->pegawai as $pegawai)                            
                        <a href="{{ route('dtail',$pegawai->nip) }}" class="mb-5 flex flex-col items-center bg-gray-100 rounded-lg shadow lg:flex-row lg:max-w-xl hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mx-auto">
                            <img class="object-cover w-full rounded-t-lg h-96 lg:h-auto lg:w-48 lg:rounded-none lg:rounded-l-lg" src="{{ asset('foto_pegawai/'.$pegawai->foto) }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="text-left mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $pegawai->nama_lengkap}}</h5>
                                <p class="mb-3 font-normal text-cyan-700 dark:text-gray-400 text-left">{{ $pegawai->jabatan->nama_jabatan }}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-left">NIP: {{ $pegawai->nip }}</p>
                            </div>
                        </a>
                        @endforeach 
                       
                            
                        @endif
                        

                        @if ($kabidPiak)    
                        @foreach ($kabidPiak->pegawai as $pegawai)                            
                        <a href="{{ route('dtail',$pegawai->nip) }}" class="mb-5 flex flex-col items-center bg-gray-100 rounded-lg shadow lg:flex-row lg:max-w-xl hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mx-auto">
                            <img class="object-cover w-full rounded-t-lg h-96 lg:h-auto lg:w-48 lg:rounded-none lg:rounded-l-lg" src="{{ asset('foto_pegawai/'.$pegawai->foto) }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="text-left mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $pegawai->nama_lengkap}}</h5>
                                <p class="mb-3 font-normal text-cyan-700 dark:text-gray-400 text-left">{{ $pegawai->jabatan->nama_jabatan }}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-left">NIP: {{ $pegawai->nip }}</p>
                            </div>
                        </a>
                        @endforeach
                       
                       
                        @endif
                       
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
</x-app-layout>
