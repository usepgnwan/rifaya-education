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
- adding seo with sitemap
    ```
    composer require spatie/laravel-sitemap
    ```
    [x] on layout adding meta tag 
        ``` 
        <meta name="description" content="{{ isset($title) ? $title : config('app.name')  }}"> 
        ```
    [x] on web.php adding 
        ```
        use Spatie\Sitemap\SitemapGenerator;

        Route::get('/generate-sitemap', function () {
            SitemapGenerator::create(config('app.url'))
                ->writeToFile(public_path('sitemap.xml'));
            return "Sitemap generated successfully!";
        });
            
        ```
        note : first access this url domain.com/generate-sitemap for adding sitemap.xml
    [x] sitemap success generate change to :
        ```
        <?xml version="1.0" encoding="UTF-8"?>
            <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
                <url>
                    <loc>https://yourdomain.com</loc>
                    <lastmod>2024-01-01T00:00:00+00:00</lastmod>
                    <changefreq>daily</changefreq>
                    <priority>1.0</priority>
                </url>
                <!-- More URLs -->
            </urlset>  
        ```
    [x] Open or create a robots.txt file in the public directory and add the sitemap URL:
    ```
    Sitemap: https://yourdomain.com/sitemap.xml

    ```

## install slug 

```
composer require cviebrock/eloquent-sluggable
php artisan vendor:publish --provider="Cviebrock\EloquentSluggable\ServiceProvider"
```
set on model 
```
use Cviebrock\EloquentSluggable\Sluggable;
public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
```
