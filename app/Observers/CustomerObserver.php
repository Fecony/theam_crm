<?php

namespace App\Observers;

use App\Models\Customer;
use App\Models\User;

class CustomerObserver
{
    public function creating(Customer $customer): void
    {
        if (config()->get('seeding') === true) {
            auth()->setUser(User::admin()->inRandomOrder()->first());
        }

        $customer->created_by_id = auth()->id();
        $customer->updated_by_id = auth()->id();
    }

    public function updating(Customer $customer): void
    {
        $customer->updated_by_id = auth()->id();
    }
}
