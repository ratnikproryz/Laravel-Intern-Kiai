<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('admin.home', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = $this->userRepository->create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make( $request->password),
        ]);
        return $user;
    }

    public function show($id)
    {
        $user = $this->userRepository->find($id);
        return $user;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->update($id, $request->all());
        return $user;
    }

    public function destroy($id)
    {
        $this->userRepository->delete($id);
    }
}
