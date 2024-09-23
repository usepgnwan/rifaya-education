## Start to using laravel livewire
- install laravel
    ```
    composer create-project laravel/laravel example-app
    ```
- install livewire
    ```
    composer require livewire/livewire
    ```
    - basic command livewire
        * [x] php artisan list
            checking all list command
        * [x] php artisan livewire:make / php artisan make:livewire
        * [x] php artisan livewire:layout  (adding this before using livewire)
        * [x] php artisan livewire:publish --config
            get config livewire : repository/config/livewire.php


- rule 
    after make livewire change on web.php to setup route
    example :
    ```
    Route::get('/', \App\Livewire\About::class)->name('home');
    ```
    then create layout 
    ```
    php artisan livewire:layout
    ```
    remove all class unused
    ```
    ./vendor/bind/pint
    ```
- install flash for alert session
    ```
    composer require spatie/laravel-flash
    ```
- set pagination
    publish 
    ```
    livewire:pagination
    ```
    change on config/livewire.php
    ```
      'pagination_theme' => 'tailwind',
    ```
