<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use App\Services\StoreService;
use App\Trait\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    use ApiResponseTrait;
    private $storeService;

    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $stores = $this->storeService->fillterStore($user->id,$request->all());
        return $this->successResponse($stores, 'Stores retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $input = $request->all();
        $store = $this->storeService->create($input);
        return $this->successResponse($store, 'Store created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $store = $this->storeService->getStoreById($id);
        if (is_null($store)) {
            return $this->notFoundResponse('Store not found.');
        }
        $this->authorize('view', $store);
        return $this->successResponse($store, 'Product retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {
        $this->authorize('update', $store);
        $input = $request->all();
        $this->storeService->update($store,$input);
       
        return $this->successResponse($store, 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $this->authorize('delete', $store);
        $this->storeService->delete($store);
        return $this->successResponse([], 'Product deleted successfully.');
    }
}
