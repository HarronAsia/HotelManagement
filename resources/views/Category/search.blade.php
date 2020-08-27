<div class="row mb-3">
    <div class="col-md-12">
        <div class="card bg-warning">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>{{__('Search')}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <form method="GET" action="{{route('category.search',['locale' => app()->getLocale(),'category'=>$bed])}}">

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="{{__('Enter the name of the Room')}}" id="name_query" name="name_query">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="floor_query" name="floor_query">
                                    <option name="floor_query" value="" hidden>{{__('Floor')}}</option>
                                    <option name="floor_query" value="1">1</option>
                                    <option name="floor_query" value="2">2</option>
                                    <option name="floor_query" value="3">3</option>
                                    <option name="floor_query" value="4">4</option>
                                    <option name="floor_query" value="5">5</option>
                                    <option name="floor_query" value="6">6</option>
                                    <option name="floor_query" value="7">7</option>
                                    <option name="floor_query" value="8">8</option>
                                    <option name="floor_query" value="9">9</option>
                                    <option name="floor_query" value="10">10</option>
                                    <option name="floor_query" value="11">11</option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <div class="form-group search-slt" id="type_query" name="type_query">
                                    <label for="room_type">{{__('Room Type')}}:</label>
                                    <select class="form-control " name="type_query" id="type_query">
                                        <option value="" name="type_query" selected>{{__('Type')}}</option>
                                        <option value="Single" name="type_query">{{__('Single')}}</option>
                                        <option value="Couple" name="type_query">{{__('Couple')}}</option>
                                        <option value="Three or Four People" name="type_query">{{__('Four People')}}</option>
                                        <option value="Family" name="type_query">{{__('Family')}}</option>
                                        <option value="Business" name="type_query">{{__('Business')}}</option>
                                        <option value="For Disabled" name="type_query">{{__('For Disabled')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group search-slt">
                                <label for="price">
                                    <h4>{{__('Price')}}</h4>
                                    <div class="row">
                                        <div class="col">
                                            <input type="number" value="100000" min=100000 max="1000000" id="min_price" class="form-control" name="min_price" />
                                        </div>
                                        <div class="col">
                                            <input type="number" value="999999" min=100000 max="1000000" id="max_price" class="form-control" name="max_price" />
                                        </div>
                                    </div>
                                </label>
                            </div>


                            <hr>
                            <button type="submit" class="btn btn-primary">{{__('Find Now')}}</button>
                            <button type="reset" class="btn btn-primary">{{__('Reset All')}}</button>
                            <div class="pb-3"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>