@include('../layouts/header')
    <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
        <div class="booking-form">
            <h3>Add Room & Space</h3>
            <form action="{{ route('hall.store') }}" method="post">
                @csrf
                <div class="check-date">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    @error('name') <div class="text-danger">{{$message}}</div> @enderror
                </div>
                <div class="select-option">
                    <label for="type">Type:</label>
                    <select id="type" name="type">
                        <option value="room">Room</option>
                        <option value="workspace">Workspace</option>
                    </select>
                </div>
                <div class="check-date">
                    <label for="number_of_seats">Number of Seats:</label>
                    <input type="number" id="number_of_seats" name="number_of_seats">
                    @error('number_of_seats') <p class="text-danger"> {{ $message }}</p> @enderror

                </div>
                <div class="check-date">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location">
                    @error('location') <p class="text-danger"> {{ $message }}</p> @enderror
                </div>
                <div class="select-option">
                    <label for="from_day"> FROM Days:</label>
                    <select id="from_day" name="from_day">
                        <option value="Sat">Saterday</option>
                        <option value="Sun">Sunday</option>
                        <option value="Mon">Monday</option>
                        <option value="Tue">Tuesday</option>
                        <option value="Wed">Wednesday</option>
                        <option value="Th">Thursday</option>
                    </select>
                </div>
                <div class="select-option">
                    <label for="to_day">TO DAY:</label>
                    <select id="to_day" name="to_day">
                        <!-- <option value=""></option> -->
                        <option value="Sat">Saterday</option>
                        <option value="Sun">Sunday</option>
                        <option value="Mon">Monday</option>
                        <option value="Tue">Tuesday</option>
                        <option value="Wed">Wednesday</option>
                        <option value="Th">Thursday</option>
                    </select>
                </div>
                    <button type="submit" name="submit">Store</button>
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