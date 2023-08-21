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
                $apiRoute = [
                    'uri' => $route->uri(),
                    'method' => implode('|', $route->methods()),
                    'parameters' => []
                ];

                // Extract route parameters
                foreach ($route->parameterNames() as $paramName) {
                    $apiRoute['parameters'][] = $paramName;
                }

                $apiRoutes[] = $apiRoute;
            }
        }
        return $this->successResponse($apiRoutes,'Get Path Succsess!');
    }
}
