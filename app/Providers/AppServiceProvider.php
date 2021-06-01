<?php

namespace App\Providers;

use App\Models\Customer;
use App\Observers\CustomerObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Customer::observe(CustomerObserver::class);

        Builder::macro('apiPaginate', function () {
            $perPage = request('perPage');
            $page = request('page');
            $paginator = $this->paginate($perPage, ['*'], 'page', $page);

            $paginator->setPageName('page');
            $paginator->appends(Arr::except(request()->input(), 'page'));

            return $paginator;
        });
    }
}
