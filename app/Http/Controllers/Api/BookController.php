<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() 
    {
        $books = Buku::all();

        if (!$books) {
            return ApiResponse::error('Data not found', 404);
        }

        return ApiResponse::success($books, 'Success', 200);
    }
}
