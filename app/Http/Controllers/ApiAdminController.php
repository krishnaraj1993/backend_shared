<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

class ApiAdminController extends Controller
{
    
    public function index()
    {
        $path = Storage::path('avatar.png');
        
        $storagePath = storage_path('avatar.png');
        //$parent_cats=Category::where('is_parent',1)->orderBy('title','ASC')->get();
        return response()->json(['name' => 'Abigail', 'state' => $storagePath]);
    }
}
