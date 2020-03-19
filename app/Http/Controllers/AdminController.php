<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitationRequest;
use App\Notifications\InvitationNotification;
use App\Repositories\AdStatusRepository;
use App\Repositories\BulkImportRepository;
use App\Repositories\InvitationRepository;
use App\Repositories\RolesRepository;
use App\Repositories\UserRepository;
use App\Repositories\VehicleVerificationsRepository;
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
     *  Show the admin dashboard.
     * @param RolesRepository $rolesRepository
     * @param InvitationRepository $invitationRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(RolesRepository $rolesRepository,
                          InvitationRepository $invitationRepository,
                          AdStatusRepository $adStatusRepository,
                          BulkImportRepository $bulkImportRepository,
                          VehicleVerificationsRepository $vehicleVerificationsRepository)
    {
        $dealer_role = $rolesRepository->showFromName('dealer');

        $dealer_roles = $rolesRepository->showAllUsersForRole($dealer_role->id);

        $roles = $rolesRepository->index();

        $invitations = $invitationRepository->indexInvitations();

        $online_ads_count = $adStatusRepository->countActiveAds();

        $expired_ads_count = $adStatusRepository->countExpiredAds();

        $bulk_pending_verification_count = $adStatusRepository->countPendingVerificationAds();

        $declined_ads_count = $adStatusRepository->countDeclinedAds();

//        return view('admin.home');

        return view('dashboards.main-admin', compact(
            'dealer_roles',
            'roles',
            'invitations',
            'online_ads_count',
            'expired_ads_count',
            'bulk_pending_verification_count',
            'declined_ads_count'));
    }

    public function indexAdministrators(){

        return view('admin.index-administrators');
    }

    public function createAdministrator(RolesRepository $rolesRepository,
                                        InvitationRepository $invitationRepository){

        $roles = $rolesRepository->index();

        $invitations = $invitationRepository->indexInvitations();

//        return view('admin.create-administrator', compact('roles', 'invitations'));

        return view('admin.index-administrators', compact('roles', 'invitations'));
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

        $invitationRepository->store($invitation->role, 'invited', ['email' => $invitation->email]);

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
