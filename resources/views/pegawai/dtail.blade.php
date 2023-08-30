<x-app-layout>
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-4 text-gray-900 text-xl font-bold tracking-tight  uppercase">
                    {{ __("$pegawai->nama_lengkap") }}
                </div>
            </div>
        </div>
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($pegawai->foto)    
                <div class="p-6">
                   <img src="{{ asset('foto_pegawai/'.$pegawai->foto) }}" alt="">
                </div>                  
                @else
                <div class="p-6">
                    Foto tidak ada
                 </div>    
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
