 <h1>Hello {{ $user->name }}</h1>
 <h1>Welcome to {{ config('app.name') }}</h1>

 <h1>Hey {{ $user->name }},</h1>

 <p>The {{ config('app.name') }} account associated with {{ $user->email }} was activated, Enjoy the {{ config('app.name') }} now by login to the
     Website.</p>

 <p>If you were not the one who activated this account, please visit our <a href=""> Help Center</a>.</p>




 <h6>This message was sent to {{ $user->email }} at your request.</h6>
 <h6>To help keep your account secure, please don't forward this email. Learn more</h6>
