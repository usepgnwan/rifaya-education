<?php

use Illuminate\Support\Facades\Crypt;

function auth_user() {

        // Include Composer's autoload file
        require_once __DIR__ . '/../../../../../vendor/autoload.php';

        // Bootstrap the Laravel application
        $app = require_once __DIR__ . '/../../../../../bootstrap/app.php';
        // Make the kernel and handle the request
        $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
        $app->register(\Illuminate\Auth\AuthServiceProvider::class);
        $request = Illuminate\Http\Request::capture();
        $response = $kernel->handle($request);
    // dd($response);
        $sessionCookieName = $app['config']['session.cookie'];
        $sessionCookieValue = $_COOKIE[$sessionCookieName] ?? null;

        if ($sessionCookieValue && is_string($sessionCookieValue)) {
            try {
                // Attempt to decrypt the session cookie
                // $decryptedData = $app['encrypter']->decrypt($sessionCookieValue, true);
                $decryptString = Crypt::decryptString($sessionCookieValue);

                $app['session']->driver()->setId( $app['session']->id());
                $app['session']->driver()->start();
                // Refresh the session
                $app['session']->regenerate();

            } catch (Illuminate\Contracts\Encryption\DecryptException $e) {
                var_dump("Decryption error: " . $e->getMessage());
                return null;
            } catch (Exception $e) {
                var_dump("Error: " . $e->getMessage());
                return null;
            }
        } else {
            $app['session']->start();
        }
        $_SESSION['_path'] =  $app['auth']->check() ? strtolower(str_replace(' ', '_', $app['auth']->user()->name))  . '/': '';

            // Change to set a cookie instead of using session
        if ($app['auth']->check()) {
            $path = strtolower(str_replace(' ', '_', $app['auth']->user()->name)) . '/';
            // Set the cookie with a name of your choice, e.g., '_path_cookie'
            setcookie('_path_cookie', $path, time() + (86400 * 30), "/"); // Cookie expires in 30 days
        } else {
            // Optionally, you can unset the cookie if the user is not authenticated
            setcookie('_path_cookie', '', time() - 3600, "/"); // Unset the cookie
        }


        return $app['auth'];
    }




?>
