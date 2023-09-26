@include('../layouts/header')
    <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
        <div class="booking-form">

            <h3>Add Room & Space</h3>
            <form action="{{ route('hall.update',$hall) }}" method="post">
                @csrf
                @method('put')
                <div class="check-date">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $hall->name }}">
                    @error('name') <div class="text-danger">{{$message}}</div> @enderror
                </div>
                <div class="select-option">
                    <label for="type">Type:</label>
                    <select id="type" name="type">
                        <option value="room" @selected($hall->type == 'room')>Room</option>
                        <option value="workspace" @selected($hall->type == 'work space')>Workspace</option>
                    </select>
                </div>
                <div class="check-date">
                    <label for="number_of_seats">Number of Seats:</label>
                    <input type="number" id="number_of_seats" name="number_of_seats" value="{{ $hall->number_of_seats }}">
                    @error('number_of_seats') <div class="text-danger">{{$message}}</div> @enderror
                </div>
                <div class="check-date">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" value="{{ $hall->location }}">
                    @error('location') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="select-option">
                    <label for="from_day"> FROM Days:</label>
                    <select id="from_day" name="from_day">
                        <option value="Sat" @selected($from_day=='Sat' )>Saterday</option>
                        <option value="Sun" @selected($from_day=='San' )>Sunday</option>
                        <option value="Mon" @selected($from_day=='Mon' )>Monday</option>
                        <option value="Tue" @selected($from_day=='Tue' )>Tuesday</option>
                        <option value="Wed" @selected($from_day=='Wed' )>Wednesday</option>
                        <option value="Thu" @selected($from_day=='Thu' )>Thursday</option>
                    </select>
                </div>
                <div class="select-option">
                    <label for="to_day">TO DAY:</label>
                    <select id="to_day" name="to_day">
                        <!-- <option value=""></option> -->
                        <option value="Sat" @selected($to_day=='Sat' )>Saterday</option>
                        <option value="Sun" @selected($to_day=='San' )>Sunday</option>
                        <option value="Mon" @selected($to_day=='Mon' )>Monday</option>
                        <option value="Tue" @selected($to_day=='The' )>Tuesday</option>
                        <option value="Wed" @selected($to_day=='Wed' )>Wednesday</option>
                        <option value="Thu" @selected($to_day=='Thu' )>Thursday</option>
                    </select>
                </div>
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>


    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>