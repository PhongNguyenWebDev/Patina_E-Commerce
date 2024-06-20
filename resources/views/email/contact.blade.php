<div class="email-wrapper">
    <div class="header">
        <h1>Patina</h1>
    </div>
    <div class="content">
        <p><strong>Thông tin liên hệ:</strong></p>
        <p><strong>Tên:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Phản hồi:</strong></p>
        <p>{{ $note }}</p>
    </div>
    <div class="footer">
        <p>Email được gửi từ: <a href="{{ route('client.home-page') }}">anhlongdz.com</a></p>
    </div>
</div>
