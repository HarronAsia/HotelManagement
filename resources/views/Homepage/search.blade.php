<link href="{{ asset('css/HomePage/search.css') }}" rel="stylesheet" type="text/css">
<section class="search-sec">
    <form method="GET" action="{{route('room.search')}}">

        <div class="container-fluid">
            <h3>Where you want to stay? </h3>
            <p>Choose these options and we will find a place for you</p>
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-6 col-md-3 col-sm-12 p-0">
                            <div class="form_group ">
                                <select class="form-control search-slt" id="type_query" name="type_query">
                                    <option value="" name="type_query" selected hidden>Room Type</option>
                                    <option value="Single" name="type_query">Single</option>
                                    <option value="Couple" name="type_query">Couple</option>
                                    <option value="Four People" name="type_query">Four People</option>
                                    <option value="Family" name="type_query">Family</option>
                                    <option value="Business" name="type_query">Business</option>
                                    <option value="For Disabled" name="type_query">For Disabled</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-3 col-sm-12 p-0">
                            <div class="form_group ">
                                <select class="form-control search-slt" id="bed_query" name="bed_query">
                                    <option value="" name="bed_query" selected hidden>Bed Type</option>
                                    <option value="Single Bed" name="bed_query">Single Bed</option>
                                    <option value="Double Bed" name="bed_query">Double Bed</option>
                                    <option value="Queen Size Bed" name="bed_query">Queen Size Bed</option>
                                    <option value="King size Bed" name="bed_query">King size Bed</option>
                                    <option value="Super Kind Size Bed" name="bed_query">Super Kind Size Bed</option>
                                    <option value="California king bed" name="bed_query">California king bed</option>
                                    <option value="Extra bed" name="bed_query">Extra bed</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <div class="form_group ">
                                <input onfocus="(this.type='date')" class="form-control search-slt" name="start_date_query" placeholder="Checkin" value="">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <div class="form_group ">
                                <input onfocus="(this.type='date')" class="form-control search-slt" name="end_date_query" placeholder="Checkout" value="">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <div class="form_group ">
                                <input onfocus="(this.type='time')" class="form-control search-slt" name="start_time_query" placeholder="Time Start" value="">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <div class="form_group ">
                                <input onfocus="(this.type='time')" class="form-control search-slt" name="end_time_query" placeholder="Time End" value="">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-3 col-sm-12 p-0">
                            <button type="submit" class="btn btn-success wrn-btn">Search</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</section>