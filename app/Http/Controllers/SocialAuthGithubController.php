<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialAuthGithubController extends Controller
{
    //
    public function __construct() {
        $this->middleware('guest');
    }

    public function execute(Request $request, $provider) {

        if(! $request0>has('code')) {
            return $this->redirectToProvider($provider);
        }

        return $this->handleProviderCallback($provider);
    }

    // 깃허브로 향하는 리디렉션 응답을 반환한다
    protected function redirectToProvider($provider) {
        return \Socialite::driver($provider)->redirect();
    }

    // 쿼리 스트링에 code 필드가 있을 때 동작하는 메서드.
    protected function handleProviderCallback($provider) {
        $uesr = \Socialite::driver($provider)->user();

        $user = (\App\User::whereEmail($user->getEmail())->first())?: \App\User::create([
            'name' => $user->getName() ?: 'unknown',
            'email' => $user->getEmail(),
            'activated' => 1,
        ]);
    }
}
