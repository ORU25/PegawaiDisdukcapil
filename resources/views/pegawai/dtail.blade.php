<x-app-layout>
    <div class="py-12">

        {{-- header --}}
        <div class=" mx-auto sm:px-6 lg:px-8 mb-3">
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

            {{-- pegawai header --}}
            <div class="bg-gray-100 overflow-hidden shadow-sm rounded-lg flex justify-between">
                <div class="px-6 py-4 text-gray-900 text-xl font-bold tracking-tight  uppercase">
                    {{ __("$pegawai->nama_lengkap") }}
                </div>
                <div class="px-6 py-4">
                    <div class="md:flex">
                        <button   data-modal-target="editPegawai" data-modal-toggle="editPegawai" type="button" class="w-20 flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-3 py-1.5 text-center mr-2 mb-2">
                            <i class="fa-solid fa-user-pen me-1 pt-0.5"></i>
                            <div>
                                Edit
                            </div>
                        </button>
                        <button  data-modal-target="delete_pegawai" data-modal-toggle="delete_pegawai" type="button" class="w-20 flex text-white bg-gradient-to-br from-red-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-3 py-1.5 text-center mr-2 mb-2">
                            <i class="fa-solid fa-trash me-1 pt-0.5"></i>
                            <div>
                                Hapus
                            </div>
                        </button>
                    </div>

                    <!-- edit pegawai modal -->
                    <div id="editPegawai" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Tambah Pegawai
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editPegawai">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <form action="{{ route('pegawai.update',$pegawai->id) }}" method="POST" class="" enctype="multipart/form-data">
                                    @method("PUT")
                                    @csrf
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <div class="relative">
                                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" value="{{  $pegawai->nama_lengkap  }}" required />
                                            <label for="nama_lengkap" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama Lengkap</label>
                                            
                                        </div>
                                        <div class="relative">
                                            <input type="text" id="nik" name="nik" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $pegawai->nik }}" />
                                            <label for="nik" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">NIK</label>
                                            
                                        </div>
                                        <div class="relative">
                                            <input type="text" id="nip" name="nip" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $pegawai->nip }}" required />
                                            <label for="nip" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">NIP</label>
                                            
                                        </div>
                                        <div class="relative">
                                            <label for="jabatan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Jabatan</label>
                                                <select id="jabatan" name="jabatan" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="{{ $pegawai->jabatan->id }}">{{ $pegawai->jabatan->nama_jabatan }}</option>
                                                    @foreach ($jabatan as $jabatan)
                                                    <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        @if ($pegawai->golongan)    
                                        <div class="relative">
                                            <input type="text" id="pangkat" name="pangkat" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $pegawai->golongan->pangkat }}" />
                                            <label for="pangkat" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Pangkat</label>
                                        </div> 
                                        <div class="relative">
                                            <input type="text" id="golongan" name="golongan" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $pegawai->golongan->golongan }}" />
                                            <label for="golongan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Golongan</label>
                                        </div> 
                                        @else   
                                        <div class="relative">
                                            <input type="text" id="golongan" name="golongan" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value=""  />
                                            <label for="golongan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Golongan</label>
                                        </div>                     
                                        <div class="relative">
                                            <input type="text" id="pangkat" name="pangkat" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value=""  />
                                            <label for="pangkat" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Pangkat</label>
                                        </div>                     
                                        @endif                             
                                        <div class="relative">
                                            <input type="email" id="email" name="email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $pegawai->email }}"/>
                                            <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Email</label>
                                            
                                        </div>
                                        <div class="relative">
                                            <input type="text" id="hp" name="hp" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $pegawai->hp }}" />
                                            <label for="hp" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">No HP</label>
                                            
                                        </div>
                                        <div class="relative">
                                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{ $pegawai->tempat_lahir }}"/>
                                            <label for="tempat_lahir" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Tempat Lahir</label>
                                            
                                        </div>
                                        <div class="flex flex-wrap sm:flex-none">
                                            <div class="relative me-3">
                                                <input max="MM-DD" min="MM-DD" type="date" id="tanggal_lahir" name="tanggal_lahir" class=" block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{ $pegawai->tanggal_lahir }}"/>
                                                <label for="tanggal_lahir" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Tanggal Lahir</label>   
                                            </div>
                                            <div class="relative me-3">
                                                <label for="jenis" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Jenis Karyawan</label>
                                                <select id="jenis" name="jenis" class="w-36 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="{{ $pegawai->jenis }}">{{ $pegawai->jenis }}</option>
                                                    <option value="ASN">ASN</option>
                                                    <option value="TKD">TKD</option>
                                                </select>

                                                
                                            </div>
                                            <div class="relative mt-3 sm:mt-0">
                                                <label for="jenis_pendidikan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Jenis Kelamin</label>
                                                <select id="jenis_kelamin" name="jenis_kelamin" class="w-36 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="{{ $pegawai->jenis_kelamin }}">{{ $pegawai->jenis_kelamin }}</option>
                                                    <option value="laki-laki">Laki-Laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="relative">
                                            <input type="text" id="alamat" name="alamat" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $pegawai->alamat }}"/>
                                            <label for="alamat" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alamat</label>
                                            
                                        </div>
                                        @if ($pegawai->foto)    
                                        <div>
                                            <img id="image-lama" class="mt-4 w-32 h-40" src="{{ asset('foto_pegawai/'.$pegawai->foto) }}" alt="Image Preview">
                                        </div>
                                        @endif
                                        
                                        <div class="flex items-center justify-center w-full md:w-1/3"> 
                                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <p class="text-lg text-gray-500">Foto Baru Pegawai</p>
                                                <div  id="foto"  class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Size 3x4</p>
                                                    <span class="font-semibold">Click to upload</span>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                                                    <input id="dropzone-file" name="foto" type="file" class="hidden" value=""/>
                                                    
                                                </div>
                                                <img id="image-preview" class="mt-4 hidden w-32 h-40" src="#" alt="Image Preview">
                                                <button type="button" id="cancel-button" class="mt-2 text-gray-500 hover:text-red-600 cursor-pointer hidden">Cancel</button>
                                            </label>
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
                                        <button data-modal-hide="editPegawai" type="button" class="flex text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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

                </div>
            </div>
        </div>
        <div class=" mx-auto sm:px-6 lg:px-8">

            {{-- bio pegawai --}}
            <div class="bg-gray-100 overflow-hidden shadow-sm rounded-lg">
                <div class="px-6 pt-6 md:flex flex-wrap">
                    @if ($pegawai->foto)    
                    <div class="w-56 mx-auto sm:mx-0 sm:me-10 mb-10  md:mb-0">
                        <img src="{{ asset('foto_pegawai/'.$pegawai->foto) }}" alt="" class="rounded-md">
                    </div>                  
                    @else
                    <div class="w-56 bg-gray-400 h-64 flex justify-center items-center mx-auto sm:mx-0 rounded-md sm:me-10 mb-10 sm:mb-0mb-10  md:mb-0 text-gray-100">
                        Foto tidak ada
                    </div>    
                    @endif
                    
                    <dl class=" text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        {{-- <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 text-sm dark:text-gray-400">Nama Lengkap</dt>
                            <dd class="text-sm font-semibold">{{ $pegawai->nama_lengkap }}</dd>
                        </div> --}}
                        <div class="flex flex-wrap">
                            <div class="flex flex-col pb-3 me-5">
                                <dt class="mb-1 text-gray-500 text-sm dark:text-gray-400">NIK</dt>
                                @if ($pegawai->nik)
                                <dd class="text-sm font-semibold">{{ $pegawai->nik }}</dd>
                                @else
                                <div class="flex text-gray-500 font-semibold text-sm mt-1">
                                    <i class="fa-solid fa-file-circle-xmark  me-1"></i>
                                    Data kosong
                                </div>
                                @endif
                            </div>
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 text-sm dark:text-gray-400">NIP</dt>
                                <dd class="text-sm font-semibold">{{ $pegawai->nip }}</dd>
                            </div>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 text-sm dark:text-gray-400">Jenis</dt>
                            <dd class="text-sm font-semibold">{{ $pegawai->jenis }}</dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 text-sm dark:text-gray-400">Jabatan</dt>
                            <dd class="text-sm font-semibold">{{ $pegawai->jabatan->nama_jabatan }}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 text-sm dark:text-gray-400">Pangkat dan Golongan</dt>
                            @if ($pegawai->golongan) 
                                <dd class="text-sm font-semibold">{{ $pegawai->golongan->pangkat }}</dd>
                                <dd class="text-sm font-semibold">{{ $pegawai->golongan->golongan }}</dd>
                            @else
                            <div class="flex text-gray-500 font-semibold text-sm mt-1">
                                <i class="fa-solid fa-file-circle-xmark  me-1"></i>
                                Data kosong
                            </div>

                            @endif
                        </div>
                        
                    </dl>
                    
                </div>
                <div class="px-6 pb-6 mt-3 ">
                    <dl class=" text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 text-sm dark:text-gray-400">Jenis Kelamin</dt>
                            <dd class="text-sm font-semibold">{{ $pegawai->jenis_kelamin}}</dd>
                        </div>
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 text-sm dark:text-gray-400">Email</dt>
                            @if ($pegawai->email)    
                                <dd class="text-sm font-semibold">{{ $pegawai->email }}</dd>
                            @else
                                <div class="flex text-gray-500 font-semibold text-sm mt-1">
                                    <i class="fa-solid fa-file-circle-xmark  me-1"></i>
                                    Data kosong
                                </div>
                            @endif
                        </div>
                        
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 text-sm dark:text-gray-400">No HP</dt>
                            @if ($pegawai->hp)    
                                <dd class="text-sm font-semibold">{{ $pegawai->hp }}</dd>
                            @else
                                <div class="flex text-gray-500 font-semibold text-sm mt-1">
                                    <i class="fa-solid fa-file-circle-xmark  me-1"></i>
                                    Data kosong
                                </div>
                            @endif
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 text-sm dark:text-gray-400">Alamat</dt>
                            @if ($pegawai->alamat)    
                                <dd class="text-sm font-semibold">{{ $pegawai->alamat }}</dd>
                            @else
                                <div class="flex text-gray-500 font-semibold text-sm mt-1">
                                    <i class="fa-solid fa-file-circle-xmark  me-1"></i>
                                    Data kosong
                                </div>
                            @endif
                        </div>
                    </dl>
                </div>
            </div>

            <div class="lg:flex mt-3">
                {{-- Riwayat Pendidikan --}}
                <div class="lg:pe-2 w-full lg:w-1/2">
                    <div class="px-6 py-4 bg-gray-100 overflow-hidden shadow-sm rounded-lg">
                        <div class="mb-3 flex justify-between">
                            <div class="font-semibold">
                                Riwayat Pendidikan
                            </div>
                            <div class="flex">
                                <button data-modal-target="tambah_pendidikan" data-modal-toggle="tambah_pendidikan" type="button" class="flex text-white bg-gradient-to-br from-green-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center mr-2 mb-2">
                                    <i class="fa-solid fa-plus me-1 pt-0.5"></i>
                                    <div>
                                        Tambah
                                    </div>
                                </button>
                                <a href="{{ route('pendidikan', $pegawai->nip) }}" type="button" class="flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center mr-2 mb-2">
                                    <i class="fa-solid fa-eye me-1 pt-0.5"></i>
                                    <div>
                                        More
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
                                {{-- <a href="#" class="font-medium text-sm text-blue-600 dark:text-blue-500 hover:underline me-1"><i class="fa-solid fa-pencil"></i></a>
                                <a href="#" class="font-medium text-sm text-red-600 dark:text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></a> --}}
                            </li>
                            @empty
                                <div class="flex text-gray-500 font-semibold text-sm mt-1">
                                    <i class="fa-solid fa-file-circle-xmark  me-1"></i>
                                    Data kosong
                                </div>
                            @endforelse
                        </ol>
                    </div>
                </div>

                {{-- Riwayat Diklat --}}
                <div class="lg:ps-2 w-full mt-3 lg:mt-0 lg:w-1/2">
                    <div class="px-6 py-4 bg-gray-100 overflow-hidden shadow-sm rounded-lg">
                        <div class="mb-3 flex justify-between">
                            <div class="font-semibold">
                                Riwayat Diklat
                            </div>
                            <div class="flex">
                                <button data-modal-target="tambah_diklat" data-modal-toggle="tambah_diklat" type="button" class="flex text-white bg-gradient-to-br from-green-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center mr-2 mb-2">
                                    <i class="fa-solid fa-plus me-1 pt-0.5"></i>
                                    <div>
                                        Tambah
                                    </div>
                                </button>
                                <a href="{{ route('diklat', $pegawai->nip) }}" type="button" class="flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center mr-2 mb-2">
                                    <i class="fa-solid fa-eye me-1 pt-0.5"></i>
                                    <div>
                                        More
                                    </div>
                                </a>
                            </div>
                        </div>
                        <ol class="relative border-l border-gray-200 dark:border-gray-700">
                            @forelse ($pegawai->riwayat_diklat->sortByDesc('tanggal_diklat')->take(4) as $diklat )    
                                <li class="mb-5 ml-4">
                                    <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $diklat ->tempat }}, {{ $diklat->tanggal_diklat }}</time>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $diklat ->nama_diklat }}</h3>
                                    {{-- <a href="#" class="font-medium text-sm text-blue-600 dark:text-blue-500 hover:underline me-1"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="#" class="font-medium text-sm text-red-600 dark:text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></a> --}}
                                </li>
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

            {{-- Anggota Keluarga --}}
            <div class="w-full mt-3">
                <div class="px-6 py-4 bg-gray-100 overflow-hidden shadow-sm rounded-lg">
                    <div class="mb-3 flex justify-between">
                        <div class="font-semibold">
                            Daftar Anggota Keluarga
                        </div>
                        <div class="">
                            <button  data-modal-target="tambah_keluarga" data-modal-toggle="tambah_keluarga" type="button" class="flex text-white bg-gradient-to-br from-green-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center mr-2 mb-2">
                                <i class="fa-solid fa-plus me-1 pt-0.5"></i>
                                <div>
                                    Tambah
                                </div>
                            </button>
                        </div>
                    </div>                 
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Hubungan Keluarga
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pegawai->keluarga as $keluarga)    
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $keluarga->nama_anggota_keluarga }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $keluarga->hubungan_keluarga }}
                                    </td>
                                    <td class="py-4 text-center">
                                        <button data-modal-target="edit_keluarga {{ $keluarga->id }}" data-modal-toggle="edit_keluarga {{ $keluarga->id }}" class="font-medium text-sm text-blue-600 dark:text-blue-500 hover:underline me-1"><i class="fa-solid fa-pencil"></i></button>
                                        <button data-modal-target="delete_keluarga {{ $keluarga->id }}" data-modal-toggle="delete_keluarga {{ $keluarga->id }}" class="font-medium text-sm text-red-600 dark:text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!--Edit Keluarga -->
                                <div id="edit_keluarga {{ $keluarga->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Edit {{ $keluarga->nama_anggota_keluarga }}
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit_keluarga {{ $keluarga->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('keluarga.update',$keluarga->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <!-- Modal body -->
                                                <div class="p-6 space-y-6">
                                                    <div class="relative">
                                                        <input type="text" id="nama_anggota_keluarga" name="nama_anggota_keluarga" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required value="{{ $keluarga->nama_anggota_keluarga }}" />
                                                        <label for="nama_anggota_keluarga" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama Anggota Keluarga</label>
                                                    </div>
                                                    <div class="relative mt-3 sm:mt-0">
                                                        <label for="hubungan_keluarga" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Hubungan Keluarga</label>
                                                        <select id="hubungan_keluarga" name="hubungan_keluarga" class="w-36 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            <option selected value="{{ $keluarga->hubungan_keluarga }}">{{ $keluarga->hubungan_keluarga }}</option>
                                                            <option value="Suami">Suami</option>
                                                            <option value="Istri">Istri</option>
                                                            <option value="Anak">Anak</option>
                                                        </select>
                                                        
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
                                                    <button data-modal-hide="edit_keluarga {{ $keluarga->id }}" type="button" class="flex text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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

                                {{-- delete keluarga --}}
                                <div id="delete_keluarga {{ $keluarga->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete_keluarga {{ $keluarga->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <form action="{{ route('keluarga.delete',$keluarga->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <div class="p-6 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah yakin menghapus <span class="font-semibold">{{ $keluarga->nama_anggota_keluarga }}</span></h3>
                                                <button  type="submit" class="text-white bg-gradient-to-br from-red-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    <i class="fa-solid fa-trash me-1 pt-0.5"></i>
                                                    <div>
                                                        Hapus
                                                    </div>
                                                </button>
                                                <button data-modal-hide="delete_keluarga {{ $keluarga->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @empty
                                <tr>
                                    <td colspan="2" class="flex text-gray-500 font-semibold text-sm mt-1 py-4 px-6">
                                        <i class="fa-solid fa-file-circle-xmark  me-1"></i>
                                        Data kosong
                                    </td>
                                </tr>
                                @endforelse
                                
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            
            <div class="lg:flex mt-3">
                {{-- Kenaikan Gaji --}}
                <div class="lg:pe-2 w-full lg:w-1/2">
                    <div class="px-6 py-4 bg-gray-100 overflow-hidden shadow-sm rounded-lg">
                        <div class="mb-3 flex justify-between">
                            <div class="font-semibold">
                                Tanggal Kenaikan Gaji
                            </div>
                            <div class="flex">
                                @if (!$pegawai->gaji)    
                                <button data-modal-target="tambah_gaji" data-modal-toggle="tambah_gaji" type="button" class="flex text-white bg-gradient-to-br from-green-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center mr-2 mb-2">
                                    <i class="fa-solid fa-plus me-1 pt-0.5"></i>
                                    <div>
                                        Tambah
                                    </div>
                                </button>
                                @else
                                <button data-modal-target="edit_gaji" data-modal-toggle="edit_gaji" type="button" class="flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center mr-2 mb-2">
                                    <i class="fa-solid fa-pencil me-1 pt-0.5"></i>
                                    <div>
                                        Edit
                                    </div>
                                </button>
                                <button data-modal-target="delete_gaji" data-modal-toggle="delete_gaji" type="button" class="flex text-white bg-gradient-to-br from-red-500 to-orange-400  hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center mr-2 mb-2">
                                    <i class="fa-solid fa-trash me-1 pt-0.5"></i>
                                    <div>
                                        Hapus
                                    </div>
                                </button>
                                @endif
                            </div>
                        </div>
                        @if ($pegawai->gaji)  
                        <div class="text-center py-10 bg-gray-50 rounded-lg border border-gray-200 ">
                            <h1 class="text-gray-700 text-4xl font-extrabold leading-none tracking-tigh">{{ $pegawai->gaji->tanggal }} / 
                                <?php
                                $angkaBulan = $pegawai->gaji->bulan;
                                $namaBulan = date('F', mktime(0, 0, 0, $angkaBulan, 1));
                                echo $namaBulan;
                                ?>
                            </h1>
                        </div>

                        {{-- Edit gaji --}}
                        <div id="edit_gaji" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Ubah Jadwal Kenaikan Gaji
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit_gaji">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('gaji.update',$pegawai->id) }}" method="POST" class="" enctype="multipart/form-data">
                                        @method("PUT")
                                        @csrf
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            <div class="flex justify-evenly">                           
                                                <div class="relative mt-3 sm:mt-0">
                                                    <label for="tanggal" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Tanggal</label>
                                                    <select id="tanggal" name="tanggal" class="sm:w-52 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                        <option selected value="{{ $pegawai->gaji->tanggal }}">{{ $pegawai->gaji->tanggal }}</option>
                                                        <?php
                                                        $pilihanHari = range(1, 31);
                                                        $tanggalAda = $pegawai->gaji->tanggal; // Simpan tanggal yang sudah ada

                                                        for ($hari = 1; $hari <= 31; $hari++) {
                                                            // Lewatkan tanggal yang sudah ada
                                                            if ($hari == $tanggalAda) {
                                                                continue;
                                                            }

                                                            echo '<option value="' . $hari . '">' . $hari . '</option>';
                                                        }
                                                        ?>
                                                    </select>                           
                                                </div>
                                                <div class="relative mt-3 sm:mt-0">
                                                    <label for="bulan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Bulan</label>
                                                    <select id="bulan" name="bulan" class="sm:w-52 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                        <option selected value="{{ $pegawai->gaji->bulan }}">
                                                            <?php
                                                            $angkaBulan = $pegawai->gaji->bulan;
                                                            $namaBulan = date('F', mktime(0, 0, 0, $angkaBulan, 1));
                                                            echo $namaBulan;
                                                            ?>
                                                        </option>
                                                        <option value="1">Januari</option>
                                                        <option value="2">Februari</option>
                                                        <option value="3">Maret</option>
                                                        <option value="4">April</option>
                                                        <option value="5">Mei</option>
                                                        <option value="6">Juni</option>
                                                        <option value="7">Juli</option>
                                                        <option value="8">Agustus</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>                           
                                                </div>
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
                                            <button data-modal-hide="edit_gaji" type="button" class="flex text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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

                        {{-- delete gaji --}}
                        <div id="delete_gaji" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete_gaji">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form action="{{ route('gaji.delete',$pegawai->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <div class="p-6 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah yakin menghapus jadwal kenaikan gaji <div class="font-semibold">{{ $pegawai->nama_lengkap }}</div></h3>
                                        <button data-modal-hide="delete_gaji" type="submit" class="text-white bg-gradient-to-br from-red-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            <i class="fa-solid fa-trash me-1 pt-0.5"></i>
                                            <div>
                                                Hapus
                                            </div>
                                        </button>
                                        <button data-modal-hide="delete_gaji" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>  
                        @else
                        <div class="flex text-gray-500 font-semibold text-sm mt-1">
                            <i class="fa-solid fa-file-circle-xmark  me-1"></i>
                            Data kosong
                        </div>
                        @endif
                    </div>

                </div>

                {{-- Kenaikan pangkat --}}
                <div class="lg:ps-2 w-full mt-3 lg:mt-0 lg:w-1/2">
                    <div class="px-6 py-4 bg-gray-100 overflow-hidden shadow-sm rounded-lg">
                        <div class="mb-3 flex justify-between">
                            <div class="font-semibold">
                                Tanggal Kenaikan Pangkat
                            </div>
                            <div class="flex">
                                @if (!$pegawai->kenaikanPangkat)    
                                <button data-modal-target="tambah_jabatan" data-modal-toggle="tambah_jabatan" type="button" class="flex text-white bg-gradient-to-br from-green-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center mr-2 mb-2">
                                    <i class="fa-solid fa-plus me-1 pt-0.5"></i>
                                    <div>
                                        Tambah
                                    </div>
                                </button>
                                @else
                                <button data-modal-target="edit_jabatan" data-modal-toggle="edit_jabatan" type="button" class="flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center mr-2 mb-2">
                                    <i class="fa-solid fa-pencil me-1 pt-0.5"></i>
                                    <div>
                                        Edit
                                    </div>
                                </button>
                                <button data-modal-target="delete_jabatan" data-modal-toggle="delete_jabatan" type="button" class="flex text-white bg-gradient-to-br from-red-500 to-orange-400  hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center mr-2 mb-2">
                                    <i class="fa-solid fa-trash me-1 pt-0.5"></i>
                                    <div>
                                        Hapus
                                    </div>
                                </button>
                                @endif
                            </div>
                        </div>
                        @if ($pegawai->kenaikanPangkat)  
                        <div class="text-center py-10 bg-gray-50 rounded-lg border border-gray-200 ">
                            <h1 class="text-gray-700 text-4xl font-extrabold leading-none tracking-tigh">
                                <?php
                                $angkaBulan = $pegawai->kenaikanPangkat->bulan;
                                $namaBulan = date('F', mktime(0, 0, 0, $angkaBulan, 1));
                                echo $namaBulan;
                                ?> / {{ $pegawai->kenaikanPangkat->tahun }}
                            </h1>
                        </div>

                         {{-- Edit pangkat--}}
                         <div id="edit_jabatan" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Ubah Jadwal Kenaikan Jabatan
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit_jabatan">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('pangkat.update',$pegawai->id) }}" method="POST" class="" enctype="multipart/form-data">
                                        @method("PUT")
                                        @csrf
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            <div class="flex justify-evenly">                           
                                                <div class="relative mt-3 sm:mt-0">
                                                    <label for="bulan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Bulan</label>
                                                    <select id="bulan" name="bulan" class="sm:w-52 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                        <option selected value="{{ $pegawai->kenaikanPangkat->bulan }}">
                                                            <?php
                                                            $angkaBulan = $pegawai->kenaikanPangkat->bulan;
                                                            $namaBulan = date('F', mktime(0, 0, 0, $angkaBulan, 1));
                                                            echo $namaBulan;
                                                            ?>
                                                        </option>
                                                        <option value="1">Januari</option>
                                                        <option value="2">Februari</option>
                                                        <option value="3">Maret</option>
                                                        <option value="4">April</option>
                                                        <option value="5">Mei</option>
                                                        <option value="6">Juni</option>
                                                        <option value="7">Juli</option>
                                                        <option value="8">Agustus</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>                           
                                                </div>
                                                <div class="relative mt-3 sm:mt-0">
                                                    <div class="relative sm:w-52">
                                                        <input type="number" id="tahun" name="tahun" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required  value="{{ $pegawai->kenaikanPangkat->tahun }}"/>
                                                        <label for="tahun" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Tahun</label>
                                                    </div>                      
                                                </div>
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
                                            <button data-modal-hide="edit_jabatan" type="button" class="flex text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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

                        {{-- delete pangkat --}}
                        <div id="delete_jabatan" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete_jabatan">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form action="{{ route('pangkat.delete',$pegawai->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <div class="p-6 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah yakin menghapus jadwal kenaikan jabatan <div class="font-semibold">{{ $pegawai->nama_lengkap }}</div></h3>
                                        <button data-modal-hide="delete_jabatan" type="submit" class="text-white bg-gradient-to-br from-red-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            <i class="fa-solid fa-trash me-1 pt-0.5"></i>
                                            <div>
                                                Hapus
                                            </div>
                                        </button>
                                        <button data-modal-hide="delete_jabatan" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="flex text-gray-500 font-semibold text-sm mt-1">
                            <i class="fa-solid fa-file-circle-xmark  me-1"></i>
                            Data kosong
                        </div>
                        @endif
                    </div>
                    
                </div>
            </div>


            <div class="float-right mt-5">
                <a href="{{ route('pegawai') }}" type="button" class="flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-3 py-1.5 text-center mr-2 mb-2">
                    <i class="fa-solid fa-backward me-1 pt-0.5"></i>
                    <div>
                        Kembali
                    </div>
                </a>
            </div>
        </div>
    </div>



    <!-- Tambah Pendidikan modal -->
    <div id="tambah_pendidikan" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Pendidikan
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tambah_pendidikan">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('pendidikan.store',$pegawai->id) }}" method="POST" class="" enctype="multipart/form-data">
                    @method("POST")
                    @csrf
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="relative mt-3 sm:mt-0">
                            <label for="jenis_pendidikan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Jenis Pendidikan</label>
                            <select id="jenis_pendidikan" name="jenis_pendidikan" class="w-36 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" >Pilih</option>
                                <option value="S2">S2</option>
                                <option value="S1/D4">S1/D4</option>
                                <option value="D3">D3</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="SMP">SMP</option>
                                <option value="SD">SD</option>
                            </select>
                            
                        </div>
                        <div class="relative">
                            <input type="text" id="institusi" name="institusi" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                            <label for="institusi" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Institusi</label>
                        </div>
                        <div class="relative me-3">
                            <input  type="number" id="tahun_lulus" name="tahun_lulus" class="w-1/3 block px-2.5 pb-2.5 pt-4  text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required"/>
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
                        <button data-modal-hide="tambah_pendidikan" type="button" class="flex text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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
    
    <!-- Tambah diklat modal -->
    <div id="tambah_diklat" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah diklat
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tambah_diklat">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('diklat.store',$pegawai->id) }}" method="POST" class="" enctype="multipart/form-data">
                    @method("POST")
                    @csrf
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="relative">
                            <input type="text" id="nama_diklat" name="nama_diklat" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                            <label for="nama_diklat" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama Diklat</label>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="relative">
                                <input type="text" id="tempat" name="tempat" class="block px-2.5 pb-2.5 pt-4 w-36 me-3 text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                                <label for="tempat" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Tempat</label>
                            </div>
                            <div class="relative me-3">
                                <input  type="date" id="tanggal_diklat" name="tanggal_diklat" class="w-36 block px-2.5 pb-2.5 pt-4  text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required"/>
                                <label for="tanggal_diklat" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Tanggal Diklat</label>   
                            </div>
                        </div>
                        <div class="relative">
                            <input type="text" id="deskripsi" name="deskripsi" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                            <label for="deskripsi" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Deskripsi</label>
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
                        <button data-modal-hide="tambah_diklat" type="button" class="flex text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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

    {{-- delete pegawai modal --}}
    <div id="delete_pegawai" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete_pegawai">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <form action="{{ route('pegawai.delete',$pegawai->nip) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah yakin menghapus <span class="font-semibold">{{ $pegawai->nama_lengkap }}</span></h3>
                    <button data-modal-hide="delete_pegawai" type="submit" class="text-white bg-gradient-to-br from-red-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        <i class="fa-solid fa-trash me-1 pt-0.5"></i>
                        <div>
                            Hapus
                        </div>
                    </button>
                    <button data-modal-hide="delete_pegawai" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--tambah Keluarga -->
    <div id="tambah_keluarga" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Anggota Keluarga
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tambah_keluarga">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('keluarga.store',$pegawai->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="relative">
                            <input type="text" id="nama_anggota_keluarga" name="nama_anggota_keluarga" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                            <label for="nama_anggota_keluarga" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama Anggota Keluarga</label>
                        </div>
                        <div class="relative mt-3 sm:mt-0">
                            <label for="hubungan_keluarga" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Hubungan Keluarga</label>
                            <select id="hubungan_keluarga" name="hubungan_keluarga" class="w-36 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option selected>Pilih</option>
                                <option value="Suami">Suami</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                            </select>
                            
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
                        <button data-modal-hide="tambah_keluarga" type="button" class="flex text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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

    {{-- tambah gaji --}}
    <div id="tambah_gaji" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Jadwal Kenaikan Gaji
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tambah_gaji">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('gaji.store',$pegawai->id) }}" method="POST" class="" enctype="multipart/form-data">
                    @method("POST")
                    @csrf
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="flex justify-evenly">                           
                            <div class="relative mt-3 sm:mt-0">
                                <label for="tanggal" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Tanggal</label>
                                <select id="tanggal" name="tanggal" class="w-52 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <?php
                                    $pilihanHari = range(1, 31);
                                    foreach ($pilihanHari as $hari) {
                                        echo '<option value="' . $hari . '">' . $hari . '</option>';
                                    }
                                    ?>
                                </select>                           
                            </div>
                            <div class="relative mt-3 sm:mt-0">
                                <label for="bulan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Bulan</label>
                                <select id="bulan" name="bulan" class="w-52 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">Pilih</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>                           
                            </div>
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
                        <button data-modal-hide="tambah_gaji" type="button" class="flex text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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
    
    {{-- tambah pangkat --}}
    <div id="tambah_jabatan" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Jadwal Kenaikan Jabatan 
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tambah_jabatan">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('pangkat.store',$pegawai->id) }}" method="POST" class="" enctype="multipart/form-data">
                    @method("POST")
                    @csrf
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="flex justify-evenly">                           
                            
                            <div class="relative mt-3 sm:mt-0">
                                <label for="bulan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2.5 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Bulan</label>
                                <select id="bulan" name="bulan" class="w-52 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option selected>Pilih</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>                           
                            </div>
                            <div class="relative mt-3 sm:mt-0">
                                <div class="relative w-52">
                                    <input type="number" id="tahun" name="tahun" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                                    <label for="tahun" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Tahun</label>
                                </div>                      
                            </div>
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
                        <button data-modal-hide="tambah_jabatan" type="button" class="flex text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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
  
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropzoneFile = document.getElementById("dropzone-file");
        const imagePreview = document.getElementById("image-preview");
        const cancelButton = document.getElementById("cancel-button");
        const fotoField = document.getElementById("foto");

        dropzoneFile.addEventListener("change", function() {
            const file = dropzoneFile.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    fotoField.classList.add("hidden")
                    imagePreview.classList.remove("hidden");
                    cancelButton.classList.remove("hidden");
                };

                reader.readAsDataURL(file);
            }
        });
        cancelButton.addEventListener("click", function() {
            dropzoneFile.value = null;
            imagePreview.src = "#";
            imagePreview.classList.add("hidden");
            cancelButton.classList.add("hidden");
            fotoField.classList.remove("hidden");
        });
    });
    
</script>