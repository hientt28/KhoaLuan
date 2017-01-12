<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepository;
use Cloudder;
use Exception;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function edit($id)
    {
        $user = $this->userRepository->showById($id);

        return view('user.profile', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
         try {
            $user = $this->userRepository->showById($id);
            if ($request->hasFile('avatar')) {
                $filename = $request->avatar;
                Cloudder::upload($filename, config('common.path_cloud_avatar')."$user->name");
                $user->avatar = Cloudder::getResult()['url'];
            }
            $user->name = $request->get('name', '');
            $user->address = $request->get('address', '');
            $user->phone = $request->get('phone', '');
            $user->email = $request->get('email', '');
            $user->save();
        } catch (Exception $ex) {
            return redirect()->route('user.edit')->withError($ex->getMessage());
        }
        return redirect('home');
    }
}