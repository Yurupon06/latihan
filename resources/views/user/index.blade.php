<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary-subtle">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-body font-weight-bold px-0 ms-4">
                            <span>Log Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <h1>Anda Login Sebagai : <mark>{{Auth::user()->name}}</mark></h1>
        <p>page ini hanya bisa di akses oleh customer.</p>
        <br>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligend 
            modi nesciunt. Ut veritatis voluptates ratione quasi nam. A neque 
            deserunt placeat. Lorem ipsum, dolor sit amet consectetur 
            quas! Sit mollitia hic repudiandae blanditiis minus quibusdam! 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Eius nesciunt sit delectus neque cupiditate fugit ad pariatur 
            cumque necessitatibus nihil quam quaerat, esse, iste quas nulla! 
            Labore, repudiandae eligendi.
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
