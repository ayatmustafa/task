<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;

class MainController extends Controller
{
    public function __invoke($class_name): JsonResponse
    {
        try {
            $class_name = 'App\\Http\\Controllers\\'.trim(ucfirst(strtolower($class_name)));
            $class_obj = app()->make($class_name);
                return Response::json([
                    'success' => true,
                    "class_name"=>$class_obj->getClassName()
                ], 200);
        } catch (\Throwable $th) {
            return Response::json([
                'success' => false,
                "Message"=>"the class not found plz check"
            ], 400);
        }

    }
}
