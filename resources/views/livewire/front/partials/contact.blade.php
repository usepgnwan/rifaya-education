<div class="w-full p-5">
    <div class=" w-full sm:w-9/12 mx-auto grid grid-cols-1 gap-0 lg:flex lg:gap-6 sm:shadow-lg sm:rounded-xl sm:p-9 sm:border-t-2">
        <div class=" mt-2 lg:w-2/3 sm:px-8 mx-auto flex content-center flex-wrap">
            <h1 class="text-3xl font-bold text-center sm:text-left mb-2 w-full"> Tentang Penulis</h1>
            <p class="text-justify"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit atque unde quidem laboriosam facilis repellendus debitis dolor harum quae impedit dolorum hic sed incidunt perferendis tenetur ipsum animi. Tenetur commodi perspiciatis provident aliquid tempore beatae, assumenda pariatur fugit accusantium impedit,.</p>
            <form class="w-full mx-auto mt-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="email" name="floating_email" id="floating_email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:text-slate-400 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_email"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat Email</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <textarea name="message" id="message" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:text-slate-400 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required></textarea>
                    <label for="message"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pesan</label>
                </div>
                <button type="submit"
                    class="text-white   dark:bg-gray-800 bg-[#FABE0E] hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  dark:hover:bg-[#FABE0E] dark:focus:ring-[#FABE0E]">Kirim Pesan</button>
            </form>
        </div>
        <div class="col-start-1 row-start-1 lg:p-4 relative items-center  text-center mx-auto mt-5 h-56 w-56 rounded-full bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('asset/img/home/teacher-hai.png') }}')">
        </div>
    </div>
</div>
