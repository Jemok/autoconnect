<?php

namespace App\Http\Controllers;

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
    public function index(InvitationRepository $invitationRepository)
    {
        $count_invitations = $invitationRepository->countUnacceptedInvitations(Auth::user()->email);

        if(Auth::user()->hasRole('dealer')){

//            return view('home', compact( 'count_invitations'));

            return view('dashboards.dealer', compact( 'count_invitations'));
        }

        if(Auth::user()->hasRole('super-admin')){

//            return view('admin.home');

            return view('dashboards.main-admin');
        }

        if(Auth::user()->hasRole('buyer')){

            return view('buyer.home', compact( 'count_invitations'));
        }

//        return view('home', compact( 'count_invitations'));

        return view('dashboards.dealer', compact( 'count_invitations'));
    }
}
