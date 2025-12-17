<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class SitemapController extends Controller
{
    /**
     * Generate sitemap.xml dynamically
     *
     * @return Response
     */
    public function index()
    {
        $content = view('sitemap');
        return response($content)->header('Content-Type', 'application/xml');
    }
}
