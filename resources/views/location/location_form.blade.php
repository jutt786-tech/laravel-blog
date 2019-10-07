<div class="form-row">
    <div class="col-md-6">
        <h5 class="card-title">Company Social Acoount Links</h5>
    </div>
    <div class="col-md-6 text-right ">
        <a href="javascript:void(0);"
           class="btn-wide btn-shadow btn btn-info" id="btn-add" title="add location form">+</a>
        <a href="javascript:void(0);"
           class="btn-wide btn-shadow btn btn-danger" id="btn-remove" title="remove location form">-</a>
    </div>
</div>
<hr>

<div id="locationappend">
    @if(isset($companyinfo->location) && count($companyinfo->location)>0)
        @foreach($companyinfo->location as $location)
            <div class="text-info small"><strong>If You want to update company location then change the input value and press update button. </strong></div>
            <div class="form-row">
                <div class="col-md-10">
                    <div class="position-relative form-group">
                        <label for="address" class="">Address</label>
                        <input name="address[]" id="address_{{$location->id}}" placeholder="Address" type="text"
                               class="form-control"
                               value="@if(isset($location->address)){{$location->address}}@else{{old('address')}}@endif"
                        >
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="position-relative form-group">
                        <label for="zipcode" class="">Zip</label>
                        <input name="zipcode[]" id="zipcode_{{$location->id}}" type="text" class="form-control"
                               placeholder="Zipcode"
                               value="@if(isset($location->zipcode)){{$location->zipcode}}@else{{old('zipcode')}}@endif">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="city">City</label>
                        <input name="city[]" id="city_{{$location->id}}" type="text" class="form-control"
                               placeholder="City"
                               value="@if(isset($location->city)){{$location->city}}@else{{old('city')}}@endif">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="state" class="">State</label>
                        <input name="state[]" id="state_{{$location->id}}" type="text" class="form-control"
                               placeholder="State"
                               value="@if(isset($location->state)){{$location->state}}@else{{old('state')}}@endif">
                    </div>
                </div>

                <div class="col-md-1" style="margin-top: 32px">
                    <a href="javascript:void(0);" onclick="edit({{$location->id}})"
                       class="btn-wide btn-shadow btn btn-primary"
                       title="Update location that having address: {{$location->address}}">Update</a>
                </div>

                <div class="col-md-1 text-right" style="margin-top: 32px">
                    <a href="javascript:void(true);"
                       onclick='delRow("{{route('location.destroy',$location->id)}}")'
                       class="btn-wide btn-shadow btn btn-danger abc"
                       title="Delete location that having address: {{$location->address}}">Delete</a>
                </div>
            </div>

            <hr>
        @endforeach

    @elseif(session()->getOldInput() && !is_null(old('address')) && !is_null(old('city')) && !is_null(old('state')) && !is_null(old('zipcode')))
        <div class="form-row">
            @foreach(old('address') as $n => $address)
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <label for="address" class="">Address</label>
                        <input name="address[]" id="address" placeholder="Address" type="text"
                               class="form-control @error('address.'.$n) is-invalid @enderror"
                               value="{{old('address.'.$n)}}">
                        @error('address.'.$n)
                        <div class="small"><span class=" errorform" role="alert"><strong>{{ $message }}</strong></span>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="city">City</label>
                        <input name="city[]" id="city" type="text"
                               class="form-control @error('city.'.$n) is-invalid @enderror" placeholder="City"
                               value="{{old('city.'.$n)}}">
                        @error('city.'.$n)
                        <div class="small"><span class=" errorform" role="alert"><strong>{{ $message }}</strong></span>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="state" class="">State</label>
                        <input name="state[]" id="state" type="text"
                               class="form-control @error('state.'.$n) is-invalid @enderror" placeholder="State"
                               value="{{old('state.'.$n)}}">
                        @error('state.'.$n)
                        <div class="small"><span class=" errorform" role="alert"><strong>{{ $message }}</strong></span>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="position-relative form-group">
                        <label for="zipcode" class="">Zip</label>
                        <input name="zipcode[]" id="zipcode" type="text"
                               class="form-control @error('zipcode.'.$n) is-invalid @enderror" placeholder="Zipcode"
                               value="{{old('zipcode.'.$n)}}">
                        @error('zipcode.'.$n)
                        <div class="small"><span class=" errorform" role="alert"><strong>{{ $message }}</strong></span>
                        </div>
                        @enderror
                    </div>
                </div>

            @endforeach
        </div>
    @else
        <div class="form-row">
            <div class="col-md-12">
                <div class="position-relative form-group">
                    <label for="address" class="">Address</label>
                    <input name="address[]" id="address" placeholder="Address" type="text"
                           class="form-control @error('address.*') is-invalid @enderror"
                           value="{{old('address.*')}}"
                    >
                    @error('address.*')
                    <div class="small"><span class=" errorform" role="alert"><strong>{{ $message }}</strong></span>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label for="city">City</label>
                    <input name="city[]" id="city" type="text"
                           class="form-control @error('city.*') is-invalid @enderror" placeholder="City"
                           value="{{old('city.*')}}">
                    @error('city.*')
                    <div class="small"><span class=" errorform" role="alert"><strong>{{ $message }}</strong></span>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="position-relative form-group">
                    <label for="state" class="">State</label>
                    <input name="state[]" id="state" type="text"
                           class="form-control @error('state.*') is-invalid @enderror" placeholder="State"
                           value="{{old('state.*')}}">
                    @error('state.*')
                    <div class="small"><span class=" errorform" role="alert"><strong>{{ $message }}</strong></span>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="position-relative form-group">
                    <label for="zipcode" class="">Zip</label>
                    <input name="zipcode[]" id="zipcode" type="text"
                           class="form-control @error('zipcode.*') is-invalid @enderror" placeholder="Zipcode"
                           value="{{old('zipcode.*')}}">
                    @error('zipcode.*')
                    <div class="small"><span class=" errorform" role="alert"><strong>{{ $message }}</strong></span>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
    @endif
</div>
