<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;


final class BookController extends Controller
{
    public function combine(): JsonResponse
    {
        $firstJson = json_decode(File::get(resource_path('json/first_response.json')), true);
        $secondJson = json_decode(File::get(resource_path('json/second_response.json')), false);

        $data = array_merge($firstJson['data'], $secondJson);

        return response()->json(['data' => $data]);
    }
}
