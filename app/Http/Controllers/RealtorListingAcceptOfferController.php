<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer) {
        $listing = $offer->listing;
        $this->authorize("update", $listing);

        // Accept selected offer

        /* $offer->accepted_at = now();
         $offer->save(); or  */
        $offer->update(['accepted_at' => now()]);

        $listing->sold_at = now();
        $listing->save();

        // Reject all other offers
        $listing->offers()->accept($offer)
              ->update(['rejected_at'=> now()]);

        return redirect()->back()
                ->with(
                    'success',
                    "Offer #{$offer->id} accepted. Other offers rejected."
                );
    }
}
