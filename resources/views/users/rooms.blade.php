<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halls</title>
    <link rel="stylesheet" href="{{ asset('css/your-styles.css') }}">
</head>
<body>
    <style>
        /* ستايل مربع البحث */
.search-form {
    margin: 20px 0;
    text-align: center;
}

.input-group {
    max-width: 400px;
    margin: 0 auto;
}

.input-group input[type="text"] {
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px 0 0 5px;
    width: 70%;
}

.input-group button {
    border: none;
    background-color: #007BFF;
    color: #fff;
    border-radius: 0 5px 5px 0;
    width: 100%;
    cursor: pointer;
}

.input-group button:hover {
    background-color: #0056b3;
}

    </style>
    @include('../layouts/header')
    <form action="{{ route('halls.search') }}" method="GET" class="search-form">
    <div class="input-group">
        <input type="text" name="keyword" class="form-control" placeholder="ابحث عن القاعة...">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">بحث</button>
        </div>
    </div>
</form>

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Halls</h2>
                        <div class="bt-option">
                            <span>Room & Workspace</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @foreach ($halls as $hall)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <div class="ri-text">
                            <h4>{{ $hall->name }}</h4>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Type:</td>
                                        <td>{{ $hall->type }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Number of Seats:</td>
                                        <td>{{ $hall->number_of_seats }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Location:</td>
                                        <td>{{ $hall->location }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Days:</td>
                                        <td>{{ $hall->days_of_works }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{{ route('appointment', $hall->id) }}" method="get">
                                <button type="submit" class="btn btn-info">
                                    <a class="primary-btn">Appointment</a>
                                </button>
                            </form>
                            @can('is_admin')
                            <form action="{{ route('hall.edit',$hall->id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-info">
                                    <a class="primary-btn">Edit</a>
                                </button>
                            </form>
                            <form action="{{ route('hall.destroy',$hall->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-info">
                                    <a class="primary-btn">Delete</a>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {{ $halls->links() }}
            </div>
        </div>
    </div>

    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                <img src="{{asset('img/gazaskygeeks.png') }}" alt="GazaSkyGee" style="width: 50%;">                                </a>
                            </div>
                            
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Contact Us</h6>
                            <ul>
                                <li>(12) 345 67890</li>
                                <li>info.colorlib@gmail.com</li>
                                <li>856 Cordia Extension Apt. 356, Lake, United State</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>New Latest</h6>
                            <p>Get the latest updates and offers.</p>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>