<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;

class MainController extends Controller
{
    public function __invoke($class_name=""): JsonResponse
    {
            $class_name = 'App\\Http\\Controllers\\'.trim(ucfirst(strtolower($class_name)));
            if(class_exists($class_name)){
                $class_obj = app()->make($class_name);
                return Response::json([
                    'success' => true,
                    "class_name"=>$class_obj->callAction('getClassName',[])
                ], 200);
        } else {
            return Response::json([
                'success' => false,
                "Message"=>"the class not found plz check"
            ], 400);
        }

    }
}
