<section class="max-h-screen h-screen">
    <div class="gap-0 flex flex-wrap">
        <div class=" w-full sm:w-1/2 flex sm:h-screen justify-center sm:sticky sm:top-0 ">
            <div class="sm:my-auto mx-auto my-6 p-6">
                <div class="mx-auto h-72 bg-contain bg-no-repeat w-96 "  style="background-image: url('{{ asset('asset/img/home/teacher2.png') }}')"></div>
                <h1 class="text-center text-[#fabe0e] font-semibold text-3xl">
                    Rifaya Education
                </h1>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure reiciendis fuga, a quia sapiente, aut laboriosam quibusdam sed iusto corporis libero commodi. </p>
            </div>
        </div>
        <div class="w-full sm:w-1/2 sm:h-screen flex  overflow-y-auto sm:py-7 ">
            <div class="min-h-96 sm:my-auto w-11/12 sm:w-10/12 mx-auto rounded-2xl sm:py-6 card-bordered-yellow-octaclass shadow-md p-12">
                <h1 class="font-bold text-3xl mb-2">Form Registrasi Guru</h1>
                <p> Page ini dikhususkan bagi calon tutor/guru yang ingin bergabung bersama kami di <i class="text-[#fabe0e]">Rifaya education</i> , isi dulu form dibawah sini yaa 😊😊</p>
                <form class="w-full mt-4">
                    <div class="mb-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <input type="name" id="name" class="form-input-rifaya" placeholder="Nama Lengkap" required="">
                    </div>
                    <div class="mb-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" class="form-input-rifaya" placeholder="name@gmail.com" required="">
                    </div>
                    <div class="mb-2">
                        <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No telp / Wa</label>
                        <input type="no_telp" id="no_telp" class="form-input-rifaya" placeholder="no telp/wa" required="">
                    </div>
                    <div class="mb-2">
                        <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" class="form-input-rifaya" placeholder="no telp/wa" required="">
                    </div>
                    <div class="mb-2">
                        <label for="sosial_media" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  Akun Sosial Media</label>
                        <input type="sosial_media" id="sosial_media" class="form-input-rifaya" placeholder="Titkto/ig" required="">
                    </div>
                    <div class="mb-2">
                        <label for="domisili" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Domisili</label>
                        <textarea class="form-input-rifaya" placeholder="alamat domisili"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="pengalaman kerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengalaman Kerja</label>
                        <textarea class="form-input-rifaya" placeholder="deskripsi singkat pengalaman kerja"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metode Mengajar</label>
                        <textarea class="form-input-rifaya" placeholder="deskripsi singkat metode mengajar"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apakah Memiliki perangkat mendukung untuk pembelajaran online? Sebutkan</label>
                        <textarea class="form-input-rifaya" placeholder="deskripsi singkat perangkat yang dimiliki"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apakah Memiliki Kendaraan?</label>
                        <input type="email" id="email" class="form-input-rifaya" placeholder="motor/mobil/tidak" required="">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apakah Memiliki Sim?</label>
                        <div class="flex gap-5">
                            <div class="flex items-center  ">
                                <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya</label>
                            </div>
                            <div class="flex items-center">
                                <input checked="" id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                            </div>
                        </div>
                        <div class="mb-4 mt-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload Foto Terkini</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple="">
                        </div>
                        <div class="mb-4 mt-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload Cv *pdf </label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple="">
                        </div>
                    </div>
                    <div class="flex items-start mb-5">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required="">
                        </div>
                        <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrasi</button>
                </form>
            </div>
        </div>
    </div>
</section>
