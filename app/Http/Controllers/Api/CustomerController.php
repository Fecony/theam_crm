<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Customer endpoint
 *
 * Endpoint used to manage CRM customers.
 */
class CustomerController extends Controller
{
    /**
     * Get list of customers
     *
     * @responseFile storage/responses/customers.get.json
     */
    public function index(): AnonymousResourceCollection
    {
        return CustomerResource::collection(
            Customer::with(['photo', 'createdBy', 'updatedBy'])->apiPaginate()
        );
    }

    /**
     * Create new customer
     *
     * @apiResource App\Http\Resources\CustomerResource
     * @apiResourceModel App\Models\Customer
     *
     * @response status=422 scenario=error {
     *  "message": "The given data was invalid.",
     *   "errors": {
     *    "name": [
     *     "The name field is required."
     *    ],
     *    "surname": [
     *     "The surname field is required."
     *   ]
     *  }
     * }
     *
     * @param  StoreCustomerRequest  $request
     * @return CustomerResource
     */
    public function store(StoreCustomerRequest $request): CustomerResource
    {
        $customer = Customer::create($request->all());
        return new CustomerResource($customer);
    }

    /**
     * Get customer by id
     *
     * @urlParam customer int required Customer id to show.
     *
     * @apiResource App\Http\Resources\CustomerResource
     * @apiResourceModel App\Models\Customer
     *
     * @response status=404 scenario="not found" {
     *  "error": "Resource not found"
     * }
     *
     * @param  Customer  $customer
     * @return CustomerResource
     */
    public function show(Customer $customer): CustomerResource
    {
        return new CustomerResource($customer);
    }

    /**
     * Update customer
     *
     * @urlParam customer int required Customer id to update.
     *
     * @apiResource App\Http\Resources\CustomerResource
     * @apiResourceModel App\Models\Customer
     *
     * @response status=404 scenario="not found" {
     *  "error": "Resource not found"
     * }
     *
     * @param  Request  $request
     * @param  Customer  $customer
     * @return CustomerResource
     */
    public function update(Request $request, Customer $customer): CustomerResource
    {
        $customer->update($request->all());
        return new CustomerResource($customer);
    }

    /**
     * Delete customer
     *
     * @urlParam customer int required Customer id to remove.
     *
     * @response status=204 scenario=success {}
     *
     * @response status=404 scenario="not found" {
     *  "error": "Resource not found"
     * }
     *
     * @param  Customer  $customer
     * @return JsonResponse
     */
    public function destroy(Customer $customer): JsonResponse
    {
        $customer->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
