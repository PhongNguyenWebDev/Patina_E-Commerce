<h3>Hi: {{ $account->name }}</h3>
<p>Đây là mail xác thực để kích hoạt tài khoản của bạn</p>
<p><a href="{{ route('verify', $account->email) }}">Vui lòng click vào đây</a></p>
