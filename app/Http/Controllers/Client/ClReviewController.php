<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Illuminate\Support\Facades\Session;

class ClReviewController extends Controller
{
    public function review(Request $request)
    {
        $rating = Review::findOrFail(1);

        return route('client.review', compact('rating'));
    }
}
