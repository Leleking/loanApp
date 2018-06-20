Please login with your email and password after verifying your identification.To verify email <a href="{{route('sendEmailDone',["email"=>$user->email,"verifyToken"=>$user->verifyToken])}}">Click here</a>
<div>
    <p>Username: {{$user->name}}</p>
    <p>email: {{$user->email}}</p>
    <p>password: {{$password}}</p>
    <p>Administrative Level: @if($user->isAdmin == 1) Admin @elseif($user->admin == 2) Super-Admin @else Staff @endif</p>
</div>