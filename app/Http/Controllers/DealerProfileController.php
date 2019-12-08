<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDealerProfile;
use App\Http\Requests\UploadDealerProfile;
use App\Repositories\DealerProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealerProfileController extends Controller
{
    /**
     * DealerProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['uploadDealerFiles']);
    }

    public function showProfile(DealerProfileRepository $dealerProfileRepository){

        $check_if_profile_exists  = $dealerProfileRepository->checkIfUserProfileExists(Auth::user()->id);

        return view('dealer.profile', compact('check_if_profile_exists'));
    }

    public function uploadDealerProfile(UploadDealerProfile $uploadDealerProfile,
                                        DealerProfileRepository $dealerProfileRepository){

        $file_name = $uploadDealerProfile->file('profile_picture')->getClientOriginalName();

        $uploadDealerProfile->file('profile_picture')->storeAs('images/dealers', $file_name, 'public');

        $dealerProfileRepository->storeUserProfile(Auth::user()->id, $file_name);

        flash()->overlay('Your photo was uploaded successfully');

        return redirect()->back();
    }

    public function updateDealerProfile(UpdateDealerProfile $updateDealerProfile,
                                        DealerProfileRepository $dealerProfileRepository){

        $dealerProfileRepository->updateDealerProfile($updateDealerProfile->all(), Auth::user()->id);

        flash()->overlay('Your Profile has been updated Successfully');

        return redirect()->back();
    }

    public function uploadDealerFiles(Request $request,
                                      DealerProfileRepository $dealerProfileRepository){

        $extension = $request->file((string) $request->keyIdentifier)->extension();

        $imageRealName = $request->file((string) $request->keyIdentifier)->getClientOriginalName();

        $imageName = $request->imageArea.time().'-'.$request->userId.'.'.$extension;

        $request->file((string) $request->keyIdentifier)->storeAs('images/dealers', $imageName, 'public');

        $dealerProfileRepository->storeFile($request->userId, $request->imageArea, $imageName);

        return 'ok';

    }
}
