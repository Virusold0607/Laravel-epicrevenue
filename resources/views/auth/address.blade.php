@extends('shared/layout')

@section('body')
    <div class="hero hero-auth">
        <div class="container">
            <center>
                <h2>Become a Epic Revenue Affiliate</h2>
                <p>Start promoting some of the top products and brand in as soon as 24 hours!</p>
            </center>

        </div>
    </div><!-- End .hero -->
    <div class="clearfix"></div>
    <div class="container" style="height:60px;"></div>


    <div class="container">
        <!--
        <ul id='timeline'>
            <span id='timeline2' style="width:60%"></span>
            <li class='work'>
                <input class='radio' id='work5' name='works' type='radio' checked>
                <div class="relative">
                    <span class='date checked'>Account Details</span>
                    <span class='circle checked'>1</span>
                </div>
            </li>
            <li class='work'>
                <input class='radio' id='work4' name='works' type='radio'>
                <div class="relative">
                    <span class='date'>Address</span>
                    <span class='circle'>2</span>
                </div>
            </li>
            <li class='work'>
                <input class='radio' id='work3' name='works' type='radio'>
                <div class="relative">
                    <span class='date'>Payment Method</span>
                    <span class='circle'>3</span>
                </div>
            </li>
        </ul>
        -->
        {!! Form::model($user, array('url' => '/affiliate/apply/address', 'method' => 'post', 'class' => 'col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2','style' => '')) !!}
        <div class="panel panel-default networks">
            <div class="panel-heading">Address</div>
            <div class="panel-body">
                {{-- Was there an error? --}}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $errorr)
                                <li>{{ $errorr }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (isset($error))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($error as $e)
                                <li>{!! $e !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    {!! Form::label('address1', 'Address 1', array()) !!}
                    {!! Form::text('address1', null, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address2', 'Address 2', array()) !!}
                    {!! Form::text('address2', null, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'City', array()) !!}
                    {!! Form::text('city', null, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('state', 'State', array()) !!}
                    {!! Form::text('state', null, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('zip', 'Zip Code', array()) !!}
                    {!! Form::text('zip', null, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('phone', 'Phone Number', array()) !!}
                    {!! Form::text('phone', null, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('whatsapp', 'Whatsapp Number', array()) !!}
                    {!! Form::text('whatsapp', null, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('skype', 'Skype Id', array()) !!}
                    {!! Form::text('skype', null, array('class' => 'form-control')) !!}
                </div>

                <br /><br />
            </div>
        </div>
        {!! Form::submit('Next', array('class' => 'btn btn-primary btn-lg pull-right')) !!}
        {!! Form::close() !!}

    </div>
@endsection
