<button type="button" class="{{$classprop}}" style="{{$float}}" data-toggle="modal" data-backdrop='false'
        data-target="#VehicleSelectionwithnote{{$customer_info->id}}">
    {{$addcheck}}

</button>
<div id="VehicleSelectionwithnote{{$customer_info->id}}" class="modal" tabindex="-2">
    <div class="modal-body col-md-5" style="margin-left:30%; background-color: #afc3dd;">
        <div class="card-group">
            <div class="modal-body">
                <div class="row fullform">

                    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-header">Vehicle Selection<br>
                            <small>which vehicle is this for?</small>
                        </div>
                        <div class="card-body">
                            @foreach($customer_info->customer_vehicles as $vehicle)
                                @include('modals._check_customer_in_note')
                                <br>
                            @endforeach

                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>