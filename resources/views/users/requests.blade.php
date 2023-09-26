<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

     <!-- Css Styles -->
     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">

    <title>Leave</title>
</head>

<body>
<div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="{{route('rooms') }}">Home</a></li>
                                    <li class="active"><a href="{{route('rooms') }}">Rooms</a></li>
                                 <li><a href="">About Us</a></li>
                                  
                                    <li><a href="">News</a></li>
                                    <li><a href="">Contact</a></li>
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <center>
    <h2 style="text-align: center; 
                font-family: Arial, sans-serif; 
                font-size: 34px;
                font-weight:bold;
                margin-top:2% ;
                margin-bottom:2%">
     Request List</h2>
<table class="table table-hover" border="2" style="margin-top: 25px; width:70%" >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Hall Name</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Status</th>
                <th scope="col">Reason</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
        @foreach($bookingRequests as $request)
            <tr>
                <th scope="row">{{ $request->id}}</th>
                <td>{{ $request->hall->name }}</td>
                <td>{{ $request->start_time }}</td>
                <td>{{ $request->end_time }}</td>
                <td>{{ $request->status }}</td>
                <td>{{ $request->reason  ?? "___"}}</td>
                          <td>
                    <form method="get" action="{{ route('user.editRequest',[$request->hall,$request])}}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="{{route('user.deleteRequest',[$request->id,$request->hall->id])}}">
                        @csrf
                        @method('delete')
                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <form method="get" action="">
              <button type="submit" class="btn btn-dark" >Create Leave Request</button>
    </form> -->
    </center>
</div>
</body>