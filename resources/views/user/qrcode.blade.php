<!DOCTYPE html>
<html>
<head>
    <title>QR Code User</title>
</head>
<body>
    <h1>Profil {{Auth::user()->name}}</h1>
    <p>Email: {{Auth::user()->email}}</p>
    <div>
        <h2>QR Code Profil</h2>
        {!! $qrCode !!}
    </div>
</body>
</html>