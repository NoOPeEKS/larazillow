<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    /* Middlewares can also be defined like this
    public function __construct() {
        $this->middleware("auth")->except(['index', 'show']);
    }*/

    public function __construct() {
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
                'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);



        return inertia("Listing/Index", [
            'filters' => $filters,
            'listings' => Listing::mostRecent()
                            ->filter($filters)
                            ->withoutSold()
                            ->paginate(10)
                            ->withQueryString(), 
        ]);
 
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        $listing->load(['images']);
        $offerMade = !Auth::user() ? 
                    null : $listing->offers()->byMe()->first();
        return inertia("Listing/Show", [
            'listings' => $listing,
            'offerMade' => $offerMade
        ]);
    }
}
