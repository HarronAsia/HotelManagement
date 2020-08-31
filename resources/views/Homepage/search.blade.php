<link href="{{ asset('css/HomePage/search.css') }}" rel="stylesheet" type="text/css">
<section class="search-sec">
    <form method="GET" action="{{route('room.search',app()->getLocale())}}">

        <div class="container-fluid">
            <h3>{{__('Where you want to stay?')}} </h3>
            <p>{{__('Choose these options and we will find a place for you')}}</p>
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-6 col-md-3 col-sm-12 p-0">
                            <div class="form_group ">
                                <select class="form-control search-slt" id="type_query" name="type_query">
                                    <option value="" name="type_query" selected hidden>{{__('Room Type')}}</option>
                                    <option value="Single" name="type_query">{{__('Single')}}</option>
                                    <option value="Couple" name="type_query">{{__('Couple')}}</option>
                                    <option value="Four People" name="type_query">{{__('Four People')}}</option>
                                    <option value="Family" name="type_query">{{__('Family')}}</option>
                                    <option value="Business" name="type_query">{{__('Business')}}</option>
                                    <option value="For Disabled" name="type_query">{{__('For Disabled')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-3 col-sm-12 p-0">
                            <div class="form_group ">
                                <select class="form-control search-slt" id="bed_query" name="bed_query">
                                    <option value="" name="bed_query" selected hidden>{{__('Bed Type')}}</option>
                                    <option value="Single Bed" name="bed_query">{{__('Single Bed')}}</option>
                                    <option value="Double Bed" name="bed_query">{{__('Double Bed')}}</option>
                                    <option value="Queen Size Bed" name="bed_query">{{__('Queen Size Bed')}}</option>
                                    <option value="King size Bed" name="bed_query">{{__('King size Bed')}}</option>
                                    <option value="Super Kind Size Bed" name="bed_query">{{__('Super Kind Size Bed')}}</option>
                                    <option value="California king bed" name="bed_query">{{__('California king bed')}}</option>
                                    <option value="Extra bed" name="bed_query">{{__('Extra bed')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-3 col-sm-12 p-0">
                            <div class="form_group ">
                                <input onfocus="(this.type='datetime-local')" class="form-control" name="checkin" placeholder="{{__('Checkin')}}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-3 col-sm-12 p-0">
                            <div class="form_group ">
                                <input onfocus="(this.type='datetime-local')" class="form-control" name="checkout" placeholder="{{__('Checkout')}}">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-3 col-sm-12 p-0">
                            <button type="submit" class="btn btn-success wrn-btn">{{__('Search')}}</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</section>