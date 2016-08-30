<?php namespace App\Services\Validation;

use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
        public function register() {}

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        // Tell Laravel to use our custom created validator class. This class will extend the
        // normal validation class, so you can add methods and override methods.

        $this->app->validator->resolver(function ($translator, $data, $rules, $messages) {

            // We create our own validation class here, we will create that after this
            return new CustomValidation($translator, $data, $rules, $messages);
        });
    }
}
