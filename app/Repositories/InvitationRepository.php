<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/9/18
 * Time: 12:02 PM
 */

namespace App\Repositories;


use App\Invitation;

class InvitationRepository
{
    public function store($role,
                          $status,
                          array $data){

        if(Invitation::where('email', $data['email'])->exists()){

            $invitation = Invitation::where('email', $data['email'])->firstOrFail();

            $invitation->email = $data['email'];
            $invitation->role_id = $role->id;
            $invitation->status = $status;

            $invitation->save();

            return $invitation;
        }

        $invitation = new Invitation();

        $invitation->email = $data['email'];
        $invitation->role_id = $role->id;
        $invitation->status = $status;

        $invitation->save();

        return $invitation;
    }

    /**
     * @return mixed
     */
    public function indexInvitations(){

        return Invitation::latest()->get();
    }

    /**
     * @param $invitationId
     * @return mixed
     */
    public function showInvitationFromId($invitationId){

        return Invitation::where('id', $invitationId)
            ->where('status', 'invited')
            ->orWhere('status', 'revoked')
            ->firstOrFail();
    }

    /**
     * @param $invitationId
     * @return bool
     */
    public function checkIfAccepted($invitationId){

        if(Invitation::where('id', $invitationId)
            ->where('status', 'accepted')
            ->exists()){

            return true;
        }

        return false;
    }

    public function countUnacceptedInvitations($email){

        return Invitation::where('email', $email)
            ->where('status', 'invited')
            ->count();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function showForUser($email){

        return Invitation::where('email', $email)->latest()->get();
    }

    /**
     * @param $invitationId
     * @return mixed
     */
    public function show($invitationId){

        return Invitation::where('id', $invitationId)->firstOrFail();
    }
}