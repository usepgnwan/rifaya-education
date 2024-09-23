<!DOCTYPE html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<style>
    #header {
        transition: background-color 0.3s, padding 0.3s;
    }

    #header.scrolled {
        background-color: #f8f9fa;
        /* Example background color change */
        padding: 0.5rem 1rem;
        /* Example padding change */
    }
</style>

<body>
    <header class='flex  border-b max-lg:py-4 max-lg:px-4 sm:px-10 bg-white font-[sans-serif] min-h-[70px] tracking-wide  sticky top-0 z-50' id="header">
        <div class='flex flex-wrap items-center gap-5 w-full'>
            <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo" class='lg:w-36 max-lg:w-20' />
            </a>
            <div id="collapseMenu" class=' md:w-[500px] ml-auto max-lg:min-w-[300px] lg:!block   max-lg:fixed max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 z-50'>
                <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3 h-opened mt-[2px]'>

                    <svg class="w-6 h-6 h-open" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-black h-close hidden  mt-[3px]" viewBox="0 0 320.591 320.591">
                        <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z" data-original="#000000"></path>
                        <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z" data-original="#000000"></path>
                    </svg>
                </button>

                <ul class='min-w-[300px] max-lg:transition-all max-lg:ease-in-out max-lg:delay-75 lg:flex lg:items-center lg:ml-14 lg:gap-x-3 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:right-[-520px] max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50 '>
                    <li class='mb-6 hidden max-lg:block'>
                        <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-36' />
                        </a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2 px-2 whitespace-nowrap'>
                        <a href='javascript:void(0)' class='lg:hover:text-[#007bff] text-sm text-[#007bff] block font-semibold text-[15px]'>Beranda</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2 px-2 whitespace-nowrap'>
                        <a href='javascript:void(0)' class='lg:hover:text-[#007bff] text-sm text-gray-500 block font-semibold text-[15px]'>Artikel</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2 px-2 whitespace-nowrap'>
                        <a href='javascript:void(0)' class='lg:hover:text-[#007bff] text-sm text-gray-500 block font-semibold text-[15px]'>Bank Soal</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2 px-2 whitespace-nowrap  group/sub-menu  group/rotate'>
                        <a href="#" class='lg:hover:text-[#007bff] text-sm text-gray-500 block font-semibold text-[15px]  group-hover:block  sub-menu'>Kelas Intensif <span class="text-[10px] icon-[simple-line-icons--arrow-down] group-hover/rotate:rotate-180 lg:group-hover/focus: ease-in duration-300"></span></a>
                        <ul class=" hidden lg:group-hover/sub-menu:block lg:absolute lg:top[70px] leading-10 shadow-lg lg:min-w-32  bg-white rounded-md sub-menu-mobile">
                            <li class="  pl-6 pr-6 pt-2">
                                <a href="#" class="lg:hover:text-[#007bff] text-sm text-gray-500 block font-semibold text-[15px] ">Web Design
                                </a>
                            </li>
                            <li class="more group/more  pl-6 pr-6 pt-2 more-mobile">
                                <span class="group-hover/more:block sub-menu">
                                    <a href="#" class="lg:hover:text-[#007bff]   text-sm text-gray-500 block font-semibold text-[15px] pt-1 pb-2 ">More
                                        <span class="text-[10px] icon-[simple-line-icons--arrow-down] group-hover/more:rotate-180 ease-in duration-300"> </span>
                                    </a>
                                    </a>
                                    <i class='bx bxs-chevron-right arrow more-arrow'></i>
                                </span>
                                <ul class=" hidden lg:group-hover/more:block sub-menu-mobile">
                                    <li><a href="#" class="pt-1 pb-2 lg:hover:text-[#007bff]  text-sm text-gray-500 block font-semibold text-[15px]">Neumorphism</a></li>
                                    <li><a href="#" class="pt-1 pb-2 lg:hover:text-[#007bff]  text-sm text-gray-500 block font-semibold text-[15px]">Pre-loader</a></li>
                                    <li><a href="#" class="pt-1 pb-2 lg:hover:text-[#007bff]  text-sm text-gray-500 block font-semibold text-[15px]">Glassmorphism</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2 px-2 whitespace-nowrap'>
                        <a href='javascript:void(0)' class='lg:hover:text-[#007bff] text-sm text-gray-500 block font-semibold text-[15px]'>Tentang</a>
                    </li>

                    <li class='max-lg:border-b max-lg:py-2 px-2 whitespace-nowrap'>
                        <a href='javascript:void(0)' class='lg:hover:text-white lg:hover:bg-sky-700  border-2 border-sky-700 rounded-full py-2 px-4 text-sm text-gray-500 block font-semibold text-[15px]'>Les Privat</a>
                    </li>
                </ul>
            </div>

            <div class='flex ml-auto min-w-[30px] mr-6 gap-3 max-lg:mr-12 z-10'>
                <span class="icon-[ion--search-outline] size-5 cursor-pointer fill-gray-400 my-auto max-lg:ml-auto web-mode"></span>
                <!-- <span class="icon-[ph--sun-light] size-4 cursor-pointer fill-gray-400 my-auto max-lg:ml-auto"></span> -->
                <span class="icon-[line-md--moon-loop] size-5 cursor-pointer fill-gray-400 my-auto max-lg:ml-auto"></span>
                <span class="icon-[solar--user-circle-bold] cursor-pointer size-6  my-auto max-lg:ml-auto" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start"></span>
                <!-- <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-7 h-w-7 rounded-full cursor-pointer " src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User"> -->
                <!-- Dropdown menu -->
                <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div>Bonnie Green</div>
                        <div class="font-medium truncate">name@flowbite.com</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                    </div>
                </div>


            </div>
        </div>
    </header>
    <section class="jumbotron max-lg:mt-1 lg:mt-5 p-5 lg:min-h-[80vh] max-lg:min-h-[100vh] lg:flex lg:gap-6 " >
            <div class="lg:flex-1 flex items-center px-14 text-center">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque asperiores doloribus beatae eos rerum blanditiis. Corporis cumque exercitationem est suscipit.</p>
            </div>
            <div class="hidden sm:block lg:w-1/2">time_sleep_until</div>
    </section>

    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded p-4 w-full    ">
            <h2 class="text-2xl font-bold mb-4">TinyMCE with Tailwind CSS</h2>
            <textarea id="editor" class="w-full h-64"></textarea>
        </div>
    </div>



    <div class="container mx-auto mt-6 mb-40 w-1/2">
        <div class="border rounded-xl shadow-sm relative mx-12 p-9">
            <div class="absolute h-8 w-8 rounded-full bg-sky-300 -mt-14  text-sm -translate-x-1/2 left-1/2 cursor-pointer flex">
                <span class="m-auto">🔝</span>
            </div>
            <div class=" w-full bg-gray-100 px-5 py-5 text-left text-gray-800 break-words max-w-md rounded">
                <h2 class="font-bold">Table of Contents</h2>
                <ul  class="mt-2 list-disc px-2 pl-6">
                    <li class="h-7"><a href="#mcetoc_1i2smeja76" class="block hover:bg-gray-200 px-2 py-1 rounded" data-mce-href="#mcetoc_1i2smeja76">hello tes</a><br data-mce-bogus="1"></li>
                    <li class="h-7"><a href="#mcetoc_1i2smeja77" class="block hover:bg-gray-200 px-2 py-1 rounded" data-mce-href="#mcetoc_1i2smeja77">ini tes</a><br data-mce-bogus="1"></li>
                </ul>
            </div>
            <br>
            <br>
            <details class="mce-accordion">
                <summary class="mce-accordion-summary flex items-center justify-between w-full p-5 rtl:text-right text-gray-500 border border-b-1 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3 font-bold">Accordion summary...</summary>
                <div data-mce-bogus="1" class="mce-accordion-body p-5 border border-b-1 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <p>Accordion body...</p>
                </div>
            </details>

            <br>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- <script src="{{ asset('/vendor/tiny_mce_wiris/tinymce/editor_plugin.js')}}"></script> -->
    <script src="{{ asset('/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('/vendor/tinymce_mathjax/plugin.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- MathType Plugin Script -->

    <script>

        tinymce.init({
            selector: '#editor',
            relative_urls: false,  // Disable relative URLs
            remove_script_host: false, // Prevent TinyMCE from removing the domain from the URL
            formats: {
                // Changes the default format for h1 to have a class of heading
                h1: { block: 'h1', classes: "text-5xl font-extrabold" },
                h2: { block: 'h2', classes: "text-4xl font-extrabold" },
                h3: { block: 'h3', classes: "text-3xl font-extrabold" },
                h4: { block: 'h4', classes: "text-2xl font-extrabold" },
                h5: { block: 'h5', classes: "text-xl font-extrabold" },
                h6: { block: 'h6', classes: "text-lg font-extrabold" }
            },
            table_class_list: [
                {title: 'None', value: ''},
                {title: 'Default Table', value: 'w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400'},
                { title: 'Borders',
                    menu: [
                        { title: 'Red borders', value: 'table_red_borders' },
                        { title: 'Blue borders', value: 'table_blue_borders' },
                        { title: 'Green borders', value: 'table_green_borders' }
                    ]
                }
            ],
            table_row_class_list: [
                { title: 'None', value: '' },
                { title: 'Heading', value: 'text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400' },
                { title: 'rows-style', value: 'bg-white border-b dark:bg-gray-800 dark:border-gray-700' },
            ],
            table_cell_class_list: [
                { title: 'None', value: '' },
                { title: 'column space', value: 'px-6 py-3' },
            ],
            images_upload_url: "/api/post/upload/image",
            plugins: [
                "toc","responsivefilemanager", "accordion", "pagebreak", "mathjax", "tiny_mce_wiris", "advlist", "anchor", "autolink", "charmap", "code", "codesample", "fullscreen",
                "help", "image", "insertdatetime", "link", "lists", "media",
                "preview", "searchreplace", "table", "visualblocks"
            ],
            toolbar: "undo redo | toc  | responsivefilemanager |charmap | mathjax |tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry | codesample | accordion| styles | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | pagebreak|link | image",
            paste_as_text: true,
            extended_valid_elements: '*[.*]',
            external_plugins: {
                "responsivefilemanager": "{{ asset('/vendor/tinymce/plugins/filemanager/plugin.js')}}",
                "mathjax": "{{ asset('/vendor/tinymce_mathjax/plugin.js')}}",
                // "toc": "{{ asset('/vendor/tableofcontents/plugin.js')}}",
                "tiny_mce_wiris": "{{ asset('/vendor/@wiris/mathtype-tinymce6/plugin.min.js')}}",

            },
            external_filemanager_path: "{{ asset('/vendor/responsive_filemanager/filemanager/')}}",
            filemanager_title: "RESPONSIVE FileManager",
            mathjax: {
                lib: "{{ asset('/vendor/mathjax/es5/tex-mml-chtml.js')}}", //required path to mathjax
                symbols: {
                    start: '\\(',
                    end: '\\)'
                }, //optional: mathjax symbols
                className: "math-tex", //optional: mathjax element class
                configUrl: "{{ asset('/vendor/dimakorotkov/config.js')}}", /// '/your-path-to-plugin/@dimakorotkov/tinymce-mathjax/config.js' //optional: mathjax config js
            },
            extended_valid_elements: "*[.*]",
            paste_block_drop: false,
            paste_data_images: true,
            paste_as_text: true,
            wirisimagebgcolor: '#FFFFFF',
            wirisimagesymbolcolor: '#000000',
            wiristransparency: 'true',
            wirisimagefontsize: '16',
            wirisimagenumbercolor: '#000000',
            wirisimageidentcolor: '#000000',
            wirisformulaeditorlang: 'es',
            setup: function(editor) {
                editor.on('init', function() {
                    editor.execCommand('mceTableOfContents');
                });
            },
        });
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            const Hlist = header.classList;
            if (window.scrollY > 50) { // Change this value based on when you want the effect to start
                Hlist.add('transition-all')
                Hlist.add('ease-in-out')
                Hlist.add('p-6');
            } else {
                Hlist.remove('transition-all')
                Hlist.remove('ease-in-out')
                Hlist.remove('p-6');
            }
        });
    </script>
    @vite('resources/js/app.js')
</body>

</html>
