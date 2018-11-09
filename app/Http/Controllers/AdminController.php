<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitationRequest;
use App\Notifications\InvitationNotification;
use App\Repositories\InvitationRepository;
use App\Repositories\RolesRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
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
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function indexAdministrators(){

        return view('admin.index-administrators');
    }

    public function createAdministrator(RolesRepository $rolesRepository,
                                        InvitationRepository $invitationRepository){

        $roles = $rolesRepository->index();

        $invitations = $invitationRepository->indexInvitations();

        return view('admin.create-administrator', compact('roles', 'invitations'));
    }

    public function inviteAdministrator(InvitationRequest $invitationRequest,
                                        RolesRepository $rolesRepository,
                                        InvitationRepository $invitationRepository){

        $role = $rolesRepository->showFromName($invitationRequest->role);

        $invitation = $invitationRepository->store($role, 'invited', $invitationRequest->all());

        $invitation->notify(new InvitationNotification($role));

        flash()->overlay('User was invited successfully, an email was sent to them', 'Success');

        return redirect()->back();
    }

    public function resendInvitation($invitationId,
                                     InvitationRepository $invitationRepository){

        $invitation = $invitationRepository->showInvitationFromId($invitationId);

        $invitation->notify(new InvitationNotification($invitation->role));

        flash()->overlay('Invitation was resent successfully, an email was sent to them', 'Success');

        return redirect()->back();
    }

    public function revokeInvitation($invitationId,
                                      InvitationRepository $invitationRepository,
                                      UserRepository $userRepository){

        $invitation = $invitationRepository->show($invitationId);

        $user = $userRepository->showFromEmail($invitation->email);

        $invitationRepository->store($invitation->role, 'revoked', ['email' => $invitation->email]);

        $user->removeRole($invitation->role->name);

        flash()->overlay('The user role was revoked successfully', 'success');

        return redirect()->back();
    }
}
