import './bootstrap';
import { Modal } from 'flowbite';
const baseUrl = process.env.BASE_URL;
import $ from 'jquery';
// Ensure jQuery is globally available
window.$ = window.jQuery = $;
import {createPopper} from '@popperjs/core';


import { initializeSwipers } from './swipper';
import { initTooltips } from './initTooltip';
import tinyEditor from './tinyEditor';
import purecounter from './purecounter';
import { select, on } from './custom';
import initSelect2 from './select2';

import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.min.css';

window.GLightbox = GLightbox;
// window.Swiper = Swiper;
// Initialize Swiper
document.addEventListener('livewire:initialized', function () {
    document.addEventListener('livewire:navigated', () => {


        setTimeout(() => {
            initTooltips()
        }, 1000)

        window.addEventListener('swiperInitialized', function (event) {
            setTimeout(() => {
                initializeSwipers()
                initTooltips()
            }, 10)

        });

        initializeSwipers();

        // var toggleOpen = document.getElementById('toggleOpen');
        var toggleClose = document.getElementById('toggleClose');
        var collapseMenu = document.getElementById('collapseMenu');

        function burgerMenu() {


            if (toggleClose.classList.contains('h-opened')) {
                toggleClose.classList.remove('h-opened')
                toggleClose.classList.remove('bg-[#FABE0E]')
                // toggleClose.classList.add('bg-slate-400')
                toggleClose.querySelector('.h-open').classList.add('hidden')
                toggleClose.querySelector('.h-close').classList.remove('hidden')
            } else {
                toggleClose.classList.add('h-opened')
                toggleClose.classList.add('bg-[#FABE0E]')
                // toggleClose.classList.remove('bg-slate-400')
                toggleClose.querySelector('.h-open').classList.remove('hidden')
                toggleClose.querySelector('.h-close').classList.add('hidden')
            }
            if (collapseMenu.querySelector('ul').classList.contains('max-lg:right-[-520px]')) {
                // collapseMenu.classList.remove('max-lg:hidden')
                collapseMenu.querySelector('ul').classList.remove('max-lg:right-[-520px]')
                collapseMenu.querySelector('ul').classList.add('right-0')
                collapseMenu.classList.add('max-lg:before:inset-0')

            } else {
                // collapseMenu.classList.toggle('max-lg:hidden')
                collapseMenu.querySelector('ul').classList.add('max-lg:right-[-520px]')
                collapseMenu.querySelector('ul').classList.remove('right-0')
                collapseMenu.classList.remove('max-lg:before:inset-0')
            }
        }

        // toggleOpen.addEventListener('click', handleClick);
        if (toggleClose != null) {
            toggleClose.addEventListener('click', burgerMenu);
        }


        // function toggleMenu (btn) {
        //     const el = btn.parentElement.querySelector('.subMenu')
        //     el.classList.toggle('hidden')
        //   }
        //   const btn = document.querySelector('.hasSubMenu')
        //   btn.addEventListener('click', function(){
        //     toggleMenu(btn)
        //   })

        (function () {
            "use strict";
            const html = select('html')

            on('click', '.sub-menu', function (e) {
                let mysub = this.closest('li').querySelector(".sub-menu-mobile")
                // let mysub =  select('.sub-menu-mobile').classList;
                if (mysub.classList.contains('max-lg:block')) {
                    mysub.classList.remove('max-lg:block')
                } else {
                    mysub.classList.add('max-lg:block')
                }
            }, true);

            on('click', '.menu-group-dashboard', function (e) {
                let list = this.querySelector('.icon-arrow').classList;
                console.log(list)
                if (list.contains('icon-[simple-line-icons--arrow-left]')) {
                    list.add('icon-[simple-line-icons--arrow-down]');
                    list.remove('icon-[simple-line-icons--arrow-left]');
                    list.remove('group-hover/rotate:-rotate-90');
                    list.add('group-hover/rotate:rotate-90');
                } else {
                    list.add('icon-[simple-line-icons--arrow-left]');
                    list.remove('icon-[simple-line-icons--arrow-down]');
                    list.add('group-hover/rotate:-rotate-90');
                    list.remove('group-hover/rotate:rotate-90');
                }
                console.log(list)
            });
            on('click', '.mce-accordion-summary', function (e) {
                let list = this.classList;
                if (list.contains('text-gray-500')) {
                    list.add('text-gray-900')
                    list.remove('text-gray-500')
                } else {
                    list.add('text-gray-500')
                    list.remove('text-gray-900')
                }
            }, true);

            on('click', '.dark-button', function (e) {
                const $this = this.classList;
                if ($this.contains('icon-[ph--sun-light]')) {
                    $this.add('icon-[line-md--moon-loop]');
                    $this.remove('icon-[ph--sun-light]');
                    html.classList.add('dark')
                    localStorage.theme = 'dark'
                } else {
                    $this.remove('icon-[line-md--moon-loop]');
                    $this.add('icon-[ph--sun-light]');
                    html.classList.remove('dark')
                    localStorage.theme = 'light'
                }
            });

            const darkbtn = select('.dark-button');

            if (localStorage.theme !== undefined) {
                if ((localStorage.theme !== '' && localStorage.theme === 'dark') || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    if (darkbtn != null) {

                        darkbtn.classList.add('icon-[line-md--moon-loop]');
                    }
                    html.classList.add('dark')
                } else {
                    if (darkbtn != null) {
                        darkbtn.classList.add('icon-[ph--sun-light]');
                    }
                    html.classList.remove('dark')
                }
            } else {
                if (darkbtn != null) {
                    darkbtn.classList.add('icon-[ph--sun-light]');
                }
                html.classList.remove('dark')
            }
            on('click', '.dropdown-toggle-button', function (e) {
                let nextElement = this.nextElementSibling;

                if (nextElement.classList.contains('hidden')) {
                    nextElement.classList.remove('hidden')
                } else {
                    nextElement.classList.add('hidden')
                }
            }, true);
            // on('click', '.more-mobile', function(e) {

            //     let more =  select('.more-mobile-sub').classList;
            //     console.log(more)
            //     if(more.contains('max-lg:block')){
            //         more.remove('max-lg:block')
            //     }else{
            //         more.add('max-lg:block')
            //     }
            // })

            window.addEventListener('scroll', function () {
                const header = document.getElementById('header');
                if (header != null) {
                    const Hlist = header.classList;
                    if (window.scrollY > 50) { // Change this value based on when you want the effect to start
                        Hlist.add('transition-all')
                        Hlist.add('ease-in-out')
                        Hlist.add('px-12');
                        Hlist.remove('sm:px-10');
                        Hlist.add('shadow-lg');

                    } else {
                        Hlist.remove('transition-all')
                        Hlist.remove('ease-in-out')
                        Hlist.remove('12x-9');
                        Hlist.add('sm:px-10');
                        Hlist.remove('shadow-lg');
                    }
                }
            });
            // Get references to elements
            const gallery = select('.gallery');
            const lightbox = select('#lightbox');
            const lightboxImage = select('#lightbox-image');
            const closeButton = select('#close');

            // Add event listener to each image
            if (select('.gallery') != null) {

                on('click', '.gallery', e => {
                    console.log(e)
                    if (e.target.classList.contains('gallery-image')) {
                        const imageSrc = e.target.src;
                        lightboxImage.src = imageSrc;
                        lightbox.style.display = 'flex';
                    }
                }, true)
                // gallery.addEventListener('click', e => {
                //     if (e.target.classList.contains('gallery-image')) {
                //     const imageSrc = e.target.src;
                //     lightboxImage.src = imageSrc;
                //     lightbox.style.display = 'flex';
                //     }
                // });
                // Close lightbox when close button is clicked
                closeButton.addEventListener('click', () => {
                    lightbox.style.display = 'none';
                });
                // Close lightbox when clicking outside the image
                lightbox.addEventListener('click', e => {
                    if (e.target === lightbox) {
                        lightbox.style.display = 'none';
                    }
                });
            }

            // document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            //     anchor.addEventListener('click', function(e) {
            //         // Prevent the default anchor click behavior
            //         e.preventDefault();

            //         // Get the target element using the href attribute
            //         const targetId = this.getAttribute('href');
            //         const targetElement = document.querySelector(targetId);

            //         // If the target element exists, scroll to it
            //         if (targetElement) {
            //             const headerOffset = 60; // Distance from top (jarak)
            //             const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
            //             const offsetPosition = elementPosition - headerOffset;

            //             // Smooth scroll to the target position
            //             window.scrollTo({
            //                 top: offsetPosition,
            //                 behavior: 'smooth'
            //             });
            //         }
            //     });
            // });

            on('click', 'a[href^="#"]', function () {
                // Get the target element using the href attribute
                const targetId = this.getAttribute('href');
                const targetElement = select(targetId);
                // If the target element exists, scroll to it
                if (targetElement) {
                    const headerOffset = select('#header').offsetHeight; // Distance from top (jarak)
                    const elementRect = targetElement.getBoundingClientRect().top;
                    //  const offsetPosition = elementPosition - headerOffset - 30;

                    //
                    const offset = 50 + 60;
                    const bodyRect = document.body.getBoundingClientRect().top;
                    const elementPosition = elementRect - bodyRect;
                    const offsetPosition = elementPosition - offset;

                    console.log(offsetPosition)
                    // Smooth scroll to the target position
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }

            }, true);
            on('click', '.button-menu', function () {
                let $this = this;
                let content = select('.octa-body-content')
                let menu = select('#drawer-disabled-backdrop')
                let footer = select('.octa-footer')
                if ($this.classList.contains('h-opened')) {
                    $this.classList.remove('h-opened')
                    $this.classList.remove('bg-[#FABE0E]')
                    // $this.classList.add('bg-slate-400')

                    content.classList.remove('w-4/5')
                    content.classList.add('w-full')
                    footer.classList.remove('sm:w-4/5')
                    menu.classList.add('-translate-x-full')
                    $this.querySelector('.h-open').classList.remove('hidden')
                    $this.querySelector('.h-close').classList.add('hidden')
                } else {
                    footer.classList.add('sm:w-4/5')
                    menu.classList.remove('-translate-x-full')
                    content.classList.add('w-4/5')
                    content.classList.remove('w-full')
                    $this.classList.add('h-opened')
                    $this.classList.add('bg-[#FABE0E]')
                    // $this.classList.remove('bg-slate-400')
                    $this.querySelector('.h-open').classList.add('hidden')
                    $this.querySelector('.h-close').classList.remove('hidden')
                }
            })
            const mediaQuery = window.matchMedia('(max-width: 992px)'); // max-lg breakpoint

            function changeMenu(e) {
                let menu = select('#drawer-disabled-backdrop')
                if (document.querySelector('.button-menu')) {

                    let menubtn = select('.button-menu')
                    if (e.matches) {
                        menubtn.classList.remove('h-opened')
                        menubtn.querySelector('.h-open').classList.remove('hidden')
                        menubtn.querySelector('.h-close').classList.add('hidden')
                        menu.classList.add('-translate-x-full')
                    } else {
                        menubtn.classList.add('h-opened')
                        menubtn.querySelector('.h-open').classList.add('hidden')
                        menubtn.querySelector('.h-close').classList.remove('hidden')
                        menu.classList.remove('-translate-x-full')
                    }
                }
            }
            changeMenu(mediaQuery)
            mediaQuery.addEventListener('change', (e) => {
                changeMenu(e);
            });


            function initDropdown(length = -30) {
                // const $triggerEls  = document.querySelectorAll('.dropdown-toggle-button-user');

                var dropdownElementList = [].slice.call(document.querySelectorAll('[data-dropdown-toggle]'));

                var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                    console.log(dropdownToggleEl)
                    let dropdown = new Dropdown(dropdownToggleEl);
                    dropdown.init();
                });


                return dropdownList;
                // $triggerEls.forEach($triggerEl => {
                //     const $targetId = $triggerEl.getAttribute('data-dropdown-toggle');
                //     const $targetEl = document.getElementById($targetId);

                //     if ($targetEl) {
                //         const options = {
                //             placement: 'bottom-start',
                //             triggerType: 'click',
                //             offsetSkidding: 50,
                //             offsetDistance: length,
                //             delay: 300,
                //             ignoreClickOutsideClass: false,
                //             onHide: (e) => {
                //                 let getID = e._targetEl.getAttribute('id');
                //                 let $target  = document.getElementById(getID);
                //                 // $target.classList.remove('show');
                //                 console.log('close')
                //                 $target.removeAttribute("style");
                //             },
                //             onShow: (e) => {
                //                 let getID = e._targetEl.getAttribute('id');
                //                 let $target  = document.getElementById(getID);
                //                 // $target.classList.add('show');
                //                 console.log('open')
                //                 $target.removeAttribute("style");
                //             },
                //             onToggle: (e) => {
                //                 let getID = e._targetEl.getAttribute('id');
                //                 let $target  = document.getElementById(getID);
                //                $target.removeAttribute("style");
                //             },
                //         };
                //     // instance options object
                //         const instanceOptions = {
                //         id: $targetId,
                //         override: true
                //         };

                //         const dropdown = new Dropdown($targetEl, $triggerEl, options, instanceOptions);
                //         console.log(dropdown)
                //         dropdown.init();
                //     }
                // });


            }

            initDropdown();

            // tinyEditor();
            initSelect2()
            window.addEventListener('postFilter', function (event) {
                setTimeout(() => {
                    // initSelect2()
                }, 10)
            });
            window.initSelect2 = function () {
                return initSelect2();
            }
            $('.select2-init').on('change', function (e) {
                let target = $(this).data('target');
                Livewire.dispatch(target, { value: e.target.value });
                // Livewire.dispatch("update", { value: e.target.value });
            })

            $.fn.extend({
                Modal: function (options, arg1) {
                    // if (options && typeof(options) == 'object') {
                    //     options = $.extend( {}, MyFunc.defaults, options );
                    // }
                    options = $.extend({}, $.Modal.defaults, options);
                    this.each(function () {
                        new $.Modal(this, options, arg1);
                    });
                    return this;
                }
            });
            $.Modal = function (url,title) {
                // set the modal menu element
                const $targetEl = document.getElementById('modalEl');

                // options with default values
                const options = {
                    placement: 'bottom-right',
                    backdrop: 'dynamic',
                    backdropClasses:
                        'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
                    closable: true,
                    onHide: () => {
                        console.log('modal is hidden');
                    },
                    onShow: ($e) => {
                        $.get(url, function (data) {
                            $($e._targetEl).find('.body-modal').html(data);
                        })

                        $('.hide-btn').click(function () {
                            $e.hide();
                        })

                        $('.accept-btn').click(function (e) {
                            e.preventDefault();
                            let form = new FormData($('#loginForm')[0]);
                            // Dispatch form data to Livewire component
                            Livewire.dispatch('form-modal', {value: Object.fromEntries(form)});
                                  // Handle file upload separately
                            let file = form.get('file');
                            if (file  && file.size > 0) {
                                let componentId = document.querySelector('[wire\\:id]').getAttribute('wire:id'); // Find the component ID
                                console.log(componentId);
                                Livewire.find(componentId).upload('file', file,
                                    (uploadedFilename) => {
                                        console.log('File uploaded successfully:', uploadedFilename);
                                        Livewire.find(componentId).uploadFile(); // Ensure this method handles storage
                                    },
                                    (error) => {
                                        console.error('Upload error:', error);
                                        // You can handle specific validation error messages here
                                        if (error && error.errors) {
                                            for (let key in error.errors) {
                                                console.error(`${key}: ${error.errors[key].join(', ')}`);
                                            }
                                        }
                                    }
                                );
                            }

                        })

                        console.log('modal is shown');
                    },
                    onToggle: () => {
                        console.log('modal has been toggled');
                    },
                };

                // instance options object
                const instanceOptions = {
                    id: 'modalEl',
                    override: true
                };

                const modal = new Modal($targetEl, options, instanceOptions);
                return modal;
            };
        })();

        window.addEventListener('popstate', () => {
            // $('.select2-init').on('change',function(e){
            //     var data = $(this).val();
            //     console.log(data)
            //     let target = $(this).data('target');
            //     Livewire.dispatch(target, { value: e.target.value });
            //     // Livewire.dispatch("update", { value: e.target.value });
            // })
            console.log('popstate')
            initTooltips();
            setTimeout(() => {
                tinyEditor();
            },1000)
        });
        tinyEditor();


        window.addEventListener('tiny:init', (v) => {

            setTimeout(() => {
                tinyEditor();
            },1000)
        });
        // purecounter('.purecounter');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const animate = () => {
                        document.addEventListener('DOMContentLoaded', purecounter('.purecounter'));
                    };

                    animate();
                }
            });
        }, {
            threshold: 1.0, // trigger when 100% of the element is in view
        });

        window.addEventListener('purecounterInitialized', function (event) {
            setTimeout(() => {
                const counterElements = document.querySelectorAll('.purecounter');
                counterElements.forEach((counter) => {
                    observer.observe(counter);
                });
            }, 10)
        })



        if( $('.whatsapp-button')){
            $('.whatsapp-button').click(function (e) {
                e.preventDefault();
                let whatsapp = '81312486388';
                // let whatsapp = '';
                        if(whatsapp !='' || whatsapp != 'null'){
                        var walink = 'https://web.whatsapp.com/send',
                                phone = whatsapp,
                                text = '%2AHallo Rifaya Education%2A';
                            /* Smartphone Support */
                            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                                var walink = 'whatsapp://send';
                            }
                            // var checkout_whatsapp = walink + '?phone=' + phone + '&text=' + text + '%0A%0A' +
                            var checkout_whatsapp = walink + '?phone=62'+ phone + '&text=' + text;
                            /* Whatsapp Window Open */
                            window.open(checkout_whatsapp, '_blank');
            }
            });
        }


    });
});
