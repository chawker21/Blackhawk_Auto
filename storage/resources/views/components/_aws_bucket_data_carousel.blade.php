<div id="boxshd" class="col-md-3 carocent" style="margin-left:30px;">
    <div id="myCarousel" class="carousel slide container col-md-12" style="min-height:600px;" data-interval="5000"
         data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            @for($i=0;$i<=count($data);$i++)
                <li data-target="#myCarousel" data-slide-to="{{$i}}" class=""></li>
            @endfor;
        </ol>
        <!-- Wrapper for carousel items -->

        <div class="carousel-inner" style="margin: auto; display:block; width:100%;">
            <div class="item active">
                <div>
                    <img src="/images/cutlerauto.gif" alt="First Slide">
                </div>
                <div class="carousel-caption" style="color:#286090;">
                    <h3>Images for:</h3>
                    <p>{{$customer_info->First_Name}}  {{$customer_info->Last_Name}}</p>
                </div>
            </div>


            @foreach($data as $data)
                @if ($data->type === 'data')
                    <div class="item">
                        <div style="text-align:center; ">
                            <img src="https://s3-us-west-2.amazonaws.com/chawker21/{{ $data->data_name }}"
                                 class="img-responsive center-block" alt="Second Slide">
                        </div>

                        <div class="carousel-caption" style="color:#286090;">
                            @if ($data->job_description == "")
                                <h3>
                                    {{$data->created_at}}
                                </h3>
                            @elseif ($data->job_description !== "")
                                <h3>
                                    {{$data->job_description}}
                                </h3>
                                <p>{{ $data['type']}}</p>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach


        </div>


        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>

</div>