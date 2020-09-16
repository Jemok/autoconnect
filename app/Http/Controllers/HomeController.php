<?php

namespace App\Http\Controllers;

use App\Repositories\AdStatusRepository;
use App\Repositories\DealerProfileRepository;
use App\Repositories\InvitationRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * Check if its for Admin, Dealer or Buyer, then
     * return appropriate view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InvitationRepository $invitationRepository,
                          AdStatusRepository $adStatusRepository,
                          DealerProfileRepository $dealerProfileRepository)
    {
        $count_invitations = $invitationRepository->countUnacceptedInvitations(Auth::user()->email);

        if(Auth::user()->hasRole('dealer')){

//            return view('home', compact( 'count_invitations'));
            $online_ads_count = $adStatusRepository->countUserActiveAds(Auth::user()->id);

            $pending_ads_count = $adStatusRepository->countUserPendingAds(Auth::user()->id);

            $declined_ads_count = $adStatusRepository->countUserDeclinedAds(Auth::user()->id);

            $expired_ads_count = $adStatusRepository->countUserExpiredAds(Auth::user()->id);

            $check_if_profile_exists  = $dealerProfileRepository->checkIfUserProfileExists(Auth::user()->id);

            return view('dashboards.dealer', compact( 'count_invitations',
                'online_ads_count',
                'pending_ads_count',
                'declined_ads_count',
                'expired_ads_count',
            'check_if_profile_exists'));
        }

        if(Auth::user()->hasRole('super-admin')){

//            return view('admin.home');

            return redirect()->route('adminHome');
        }

        if(Auth::user()->hasRole('buyer')){

            return view('buyer.home', compact( 'count_invitations'));
        }

        if(Auth::user()->hasRole('administrator')){

            return redirect()->route('adminHome');
        }

//        return view('home', compact( 'count_invitations'));

        //            return view('home', compact( 'count_invitations'));
        $online_ads_count = $adStatusRepository->countUserActiveAds(Auth::user()->id);

        $pending_ads_count = $adStatusRepository->countUserPendingAds(Auth::user()->id);

        $declined_ads_count = $adStatusRepository->countUserDeclinedAds(Auth::user()->id);

        $expired_ads_count = $adStatusRepository->countUserExpiredAds(Auth::user()->id);

        return view('dashboards.dealer', compact( 'count_invitations',
            'online_ads_count',
            'pending_ads_count',
            'declined_ads_count',
            'expired_ads_count'));

//        return view('dashboards.dealer', compact( 'count_invitations'));
    }
}
