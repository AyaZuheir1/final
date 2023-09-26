<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Form HTML Template</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Alegreya:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    @if($errors->has('message'))
    <div class="alert alert-danger">
        {{ $errors->first('message') }}
    </div>
    @endif

    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="booking-form">
                            <form action="{{ route('user.storeRequest', $hall->id) }}" method="post">
                                @csrf
                                <div class="row no-margin">
                                    <div class="col-md-3">
                                        <div class="form-header">
                                            <h2>{{ $hall->name }}</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row no-margin">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="start_time" class="form-label">Start Time</label>
                                                    <input class="form-control" type="datetime-local" id="start_time" name="start_time">
                                                    @error('start_time') <p class="text-danger">{{ $message }}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="end_time" class="form-label">End Time</label>
                                                    <input class="form-control" type="datetime-local" id="end_time" name="end_time">
                                                    @error('end_time') <p class="text-danger">{{ $message }}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="comment" class="form-label">Comments</label>
                                                    <input class="form-control" type="text" id="comment" name="comment">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-btn">
                                            <button class="submit-btn" type="submit">Book</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>