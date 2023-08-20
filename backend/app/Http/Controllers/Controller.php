<?php

namespace App\Http\Controllers;

use App\Trait\ApiResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, ApiResponseTrait;


   
    public function getAllPath(Request $request)
    {
        $routeCollection = Route::getRoutes()->getRoutesByName();
        $apiRoutes = [];
        foreach ($routeCollection as $routeName => $route) {
            if (strpos($route->uri(), 'api/') === 0) {
                $apiRoutes[] = $route->uri();
            }
        }
        return $this->successResponse($apiRoutes,'Get Path Succsess!');
    }
}
