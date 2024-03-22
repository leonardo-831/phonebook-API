<?php

namespace App\Providers;

use App\Models\Phone;
use App\Models\Contact;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Contact\ContactRepositoryInterface;
use App\Repositories\Phone\PhoneRepository;
use App\Repositories\Phone\PhoneRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ContactRepositoryInterface::class, function ($app) {
            return new ContactRepository(new Contact);
        });
        
        $this->app->bind(PhoneRepositoryInterface::class, function ($app) {
            return new PhoneRepository(new Phone);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        date_default_timezone_set('America/Sao_Paulo');
    }
}
