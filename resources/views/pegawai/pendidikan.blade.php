<x-app-layout>
    <div class="py-12">
        
        <div class=" mx-auto sm:px-6 lg:px-8">
            @if (session('sukses'))
            <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                 {{ session('sukses') }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </button>
              </div>

            @elseif(session('errors'))
                <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ session('errors') }}
                    {{-- @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach --}}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
                </div>
            
            @endif
            <div class="bg-white overflow-hidden shadow-sm rounded-lg mb-3">
                <div class="px-6 py-4 text-gray-900 text-xl font-bold tracking-tight  uppercase text-center sm:text-left">
                    {{ __("RIwayat Pendidikan $pegawai->nama_lengkap") }}
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="w-full ">
                    <div class="px-6 py-4 bg-gray-100 overflow-hidden shadow-sm rounded-lg">
                        <div class="mb-3 flex justify-between">
                            <div class="font-semibold">
                                Riwayat Pendidikan
                            </div>
                            <div class="">
                                <a href="{{ route('dtail', $pegawai->nip) }}" type="button" class="flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center mr-2 mb-2">
                                    <i class="fa-solid fa-backward me-1 pt-0.5"></i>
                                    <div>
                                        Kembali
                                    </div>
                                </a>
                            </div>  
                        </div>
                        <ol class="relative border-l border-gray-200 dark:border-gray-700">   
                            @forelse ($pegawai->riwayat_pendidikan->sortByDesc('tahun_lulus') as $pendidikan)    
                            <li class="mb-5 ml-4">
                                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $pendidikan->tahun_lulus }}</time>
                                <span class="text-sm font-normal text-gray-400">{{ $pendidikan->jenis_pendidikan }}</span>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $pendidikan->institusi }}</h3>
                                <button data-modal-target="edit {{ $pendidikan->id }}" data-modal-toggle="edit {{ $pendidikan->id }}" href="#" class="font-medium text-sm text-blue-600 dark:text-blue-500 hover:underline me-1"><i class="fa-solid fa-pencil"></i></button>
                                <button data-modal-target="hapus {{ $pendidikan->id }}" data-modal-toggle="hapus {{ $pendidikan->id }}" href="#" class="font-medium text-sm text-red-600 dark:text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></button>
                            </li>
                             
                            <!-- Edit modal -->
                            <div id="edit {{ $pendidikan->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Edit Lulusan {{ $pendidikan->institusi }}
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit {{ $pendidikan->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="{{ route('pendidikan.update',$pendidikan->id) }}" method="POST" class="" enctype="multipart/form-data">
                                            @method("PUT")
                                            @csrf
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                                <div class="relative mt-3 sm:mt-0">
                                                    <label for="jenis_pendidikan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Jenis Pendidikan</label>
                                                    <select id="jenis_pendidikan" name="jenis_pendidikan" class="w-36 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                        <option selected value="{{ $pendidikan->jenis_pendidikan }}">{{ $pendidikan->jenis_pendidikan }}</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S1/D4">S1/D4</option>
                                                        <option value="D3">D3</option>
                                                        <option value="SMA/SMK">SMA/SMK</option>
                                                        <option value="SMP">SMP</option>
                                                        <option value="SD">SD</option>
                                                    </select>
                                                    
                                                </div>
                                                <div class="relative">
                                                    <input type="text" id="institusi" name="institusi" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required value="{{ $pendidikan->institusi }}"/>
                                                    <label for="institusi" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Institusi</label>
                                                </div>
                                                <div class="relative me-3">
                                                    <input  type="number" id="tahun_lulus" name="tahun_lulus" class="w-1/3 block px-2.5 pb-2.5 pt-4  text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{ $pendidikan->tahun_lulus }}""/>
                                                    <label for="tahun_lulus" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Tahun Lulus</label>   
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            
                                                <button type="submit" class="flex text-white bg-gradient-to-br from-green-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                                                    <i class="fa-solid fa-floppy-disk me-1 pt-0.5"></i>
                                                    <div>
                                                        Simpan
                                                    </div>
                                                </button>
                                                <button data-modal-hide="edit {{ $pendidikan->id }}" type="button" class="flex text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    <i class="fa-solid fa-x me-1 pt-0.5"></i>
                                                    <div>
                                                        Batal
                                                    </div>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- delete pendidikan
                             modal --}}
                            <div id="hapus {{ $pendidikan->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="hapus {{ $pendidikan->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <form action="{{ route('pendidikan.delete',$pendidikan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah yakin menghapus lulusan <span class="font-semibold">{{ $pendidikan->institusi }}</span></h3>
                                            <button data-modal-hide="hapus {{ $pendidikan->id }}" type="submit" class="text-white bg-gradient-to-br from-red-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            <i class="fa-solid fa-trash me-1 pt-0.5"></i>
                                            <div>
                                                Hapus
                                            </div>
                                            </button>
                                            <button data-modal-hide="hapus {{ $pendidikan->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
  
                            @empty
                                <div class="flex text-gray-500 font-semibold text-sm mt-1">
                                    <i class="fa-solid fa-file-circle-xmark  me-1"></i>
                                    Data kosong
                                </div>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
