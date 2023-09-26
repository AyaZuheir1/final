<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Alegreya:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400" rel="stylesheet">

	<!-- Bootstrap -->
	<!-- <link type="text/css" rel="stylesheet" href="../../css/bootstrap.min.css" /> -->

	<!-- Custom stlylesheet -->
	<link rel="stylesheet" href="{{asset('assets/css/style.css') }}" />

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<form action="{{ route('user.updateRequest',[$hall,$bookingRequest]) }}" method="post">
							@csrf
                            @method('put')
							<div class="row no-margin">
								<div class="col-md-3">
									<div class="form-header">
										<h2> {{ $hall->name }}</h2>
									</div>
								</div>
								<div class="col-md-7">
									<div class="row no-margin">
										<div class="col-md-4">
											<div class="form-group">
												<span class="form-label">Start Time</span>
												<input class="form-control" type="datetime-local" name="start_time" value="{{ $bookingRequest->start_time }}">
												@error('start_time') <p class="text-danger"> {{ $message }}</p> @enderror
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<span class="form-label">End Time</span>
												<input class="form-control" type="datetime-local" name="end_time" value="{{ $bookingRequest->end_time }}">
												@error('end_time') <p class="text-danger"> {{ $message }}</p> @enderror
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<span class="form-label">Comments</span>
												<input class="form-control" name="comment" type="text" value="{{$bookingRequest->comment}}">
											</div>
										</div>


									</div>
								</div>

								<div class="col-md-2">
									<div class="form-btn">
										<button class="submit-btn" type="submit" name="submit">Update</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>