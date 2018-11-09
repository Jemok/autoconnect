<?php

namespace App\Http\Controllers;

use App\Repositories\InvitationRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function acceptInvitation($invitationId,
                                     InvitationRepository $invitationRepository,
                                     UserRepository $userRepository){

        if($invitationRepository->checkIfAccepted($invitationId)){

            return view('error.404');
        }

        $invitation = $invitationRepository->showInvitationFromId($invitationId);

        if($userRepository->checkIfExistsFromEmail($invitation->email)){

            if(Auth::check()){
                Auth::logout();
            }

            return redirect()->route('indexUserInvitations');
        }

        if(Auth::check()){
            Auth::logout();
        }

        return redirect('register');

    }

    public function indexUserInvitations(InvitationRepository $invitationRepository){

        $invitations = $invitationRepository->showForUser(Auth::user()->email);

        return view('invitations.index-for-user', compact('invitations'));
    }

    public function processUserInvitations($invitationId,
                                           InvitationRepository $invitationRepository){

        if($invitationRepository->checkIfAccepted($invitationId)){

            flash()->overlay('You have already accepted that invitation', 'Invalid');

            return redirect()->back();
        }

        $invitation = $invitationRepository->showInvitationFromId($invitationId);

        $invitationRepository->store($invitation->role, 'accepted', ['email' =>  $invitation->email] );

        Auth::user()->assignRole($invitation->role->name);

        flash()->overlay('You accepted the invitation successfully', 'Success');

        return redirect()->back();
    }
}
