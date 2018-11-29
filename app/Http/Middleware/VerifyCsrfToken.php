<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     * CSRF 토큰을 확인하지 않는 URL 설정하려면 여기에 추가하면됨.
     * @var array
     */
    protected $except = [
        //
        'orders/*',
    ];
}
