<?php

namespace App\Providers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class MacroResponseApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @param Illuminate\Contracts\Routing\ResponseFactory
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $this->macroApi($factory);
    }

    /**
     * Macro API.
     *
     * @param Illuminate\Contracts\Routing\ResponseFactory
     * @return void
     */
    private function macroApi($factory) {
        $factory->macro('api', function ($data = null, $statusCode = 200) use ($factory) {
            $error = false;
            $platform = request()->header('Platform');

            if($statusCode != 200) {
                $error = $data;
                $data = null;
            }

            $executionTime = number_format((float)((microtime(true) - LARAVEL_START)), 5, '.', '');
            
            $customFormat = [
                'meta' => [
                    'executionTime' => $executionTime.'s',
                    'status' => [
                        'code' => $statusCode,
                        'error' => $error
                    ]
                ]
            ];

            if(!is_null($platform)) {
                $customFormat['meta']['platform'] = $platform;
            }

            if($statusCode === 200) {
                $customFormat['data'] = (is_null($data)) ? (object) null : ((is_array($data)) ? (array) $data : (object) $data);
            }

            return $factory->make($customFormat, $statusCode)->withHeaders([
                'Content-Type' => 'application/json'
            ]);
        });
    }
}
