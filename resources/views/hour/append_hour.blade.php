@if(request()->ajax())
    <hr>

    <div class="form-group row opt">
        <div class="col-md-8 ">
        <div class="position-relative form-group">
            <label for="hour" class="">Enter Hour</label>
            <input name="hour[]" id="hour_" placeholder="Hour" type="text"
                   class="form-control"
                   value="">
        </div>
    </div>
    </div>


    {{--    <div class="form-row opt">--}}
    {{--        <div class="col-md-8 col-md-offset-2">--}}
    {{--            <div class="position-relative form-group">--}}
    {{--                <label for="address" class=""> Enter Branche</label>--}}
    {{--                <input name="bname[]" id="branch" placeholder="Branches" type="text" class="form-control">--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="col-md-8 col-md-offset-2">--}}
    {{--            <div class="position-relative form-group">--}}
    {{--                <label for="location" class=""> Enter Location</label>--}}
    {{--                <input name="location[]" id="location" placeholder="Location" type="text" class="form-control">--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="col-md-6">--}}
    {{--            <div class="position-relative form-group">--}}
    {{--                <label for="city">City</label>--}}
    {{--                <input name="city[]" id="city" type="text" class="form-control" placeholder="City">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="col-md-4">--}}
    {{--            <div class="position-relative form-group">--}}
    {{--                <label for="state" class="">State</label>--}}
    {{--                <input name="state[]" id="state" type="text" class="form-control" placeholder="State">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="col-md-2">--}}
    {{--            <div class="position-relative form-group">--}}
    {{--                <label for="zipcode" class="">Zip</label>--}}
    {{--                <input name="zipcode[]" id="zipcode" type="text" class="form-control" placeholder="Zipcode">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@else
    <p class="alert alert-danger">You Can not Access Directly!!!!</p>
@endif


