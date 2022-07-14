<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Services\Helpers\UserService;

class UserController extends Controller {

    /**
     * @var \Soundboard\Services\Helpers\UserService
     */
    protected $userService;

    /**
     * UserController constructor.
     */
    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }


    public function index() {
        return view('index', [
            'users' => $this->userService->getSoundData()
        ]);
    }

    public function users() {
        return view('users', [
            'users' => $this->userService->getSoundData()
        ]);
    }

    public function projects() {
        return view('projects');
    }

    public function about() {
        return view('about');
    }
}