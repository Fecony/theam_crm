<?php

namespace App\Observers;

use App\Models\Customer;

class CustomerObserver
{
    public function creating(Customer $customer): void
    {
        $customer->created_by_id = auth()->user()->id;
        $customer->updated_by_id = auth()->user()->id;
    }

    public function updating(Customer $customer): void
    {
        $customer->updated_by_id = auth()->user()->id;
    }
}
