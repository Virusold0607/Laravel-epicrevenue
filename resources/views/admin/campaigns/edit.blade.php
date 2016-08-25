@extends('admin.shared.layout')

@section('styles')

@endsection

@section('scripts')
    <script src="{{ url('/admin_assets/js/script_upload_images.js') }}"></script>
    <script src="{{ url('/admin_assets/js/clone-form-td-2.js') }}"></script>
@endsection

@section('body')
    {!! Form::model($campaign, array('url' => '/admin/campaigns/' . $campaign->id, 'method' => 'put', 'enctype' => 'multipart/form-data', 'id' => 'addCamp')) !!}
    <div class="container">
        {{-- Was there an error? --}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <table class="table table-striped table-bordered">
        <tr>
            <td>Campaign name:</td>
            <td>
                {!! Form::text('name', null, array('class' => 'form-control' ,'size' => '70')) !!}
            </td>
        </tr>
        <tr>
            <td valign="top">Campaign description:</td>
            <td>
                {!! Form::textarea('description', null, array('cols' => '30', 'rows' => '6', 'class' => 'form-control')) !!}
            </td>
        </tr>

        <tr>
            <td>Feature image:</td>
            <td>
                {!! Form::file('feature_image') !!}
            </td>
        </tr>

        <tr>
            <td>Mobile App Wall?:</td>
            <td>
                @if($campaign->mobile === 'yes')
                    {!! Form::checkbox('mobile', 'yes', true) !!} <small>Check this box to upload mobile icon</small>
                @else
                    {!! Form::checkbox('mobile', 'yes', false) !!} <small>Check this box to upload mobile icon</small>
                @endif
            </td>
        </tr>

        <tr>
            <td>Incent?:</td>
            <td>
                @if($campaign->incent === 'yes')
                    {!! Form::checkbox('incent', 'yes', true) !!} <small>Check this box to upload mobile icon</small>
                @else
                    {!! Form::checkbox('incent', 'yes', false) !!} <small>Check this box to upload mobile icon</small>
                @endif
            </td>
        </tr>

        <tr>
            <td valign="top">Campaign requirements:</td>
            <td>
                {!! Form::textarea('requirements', null, array('class' => 'form-control', 'cols' => '30', 'rows' => '6')) !!}
            </td>
        </tr>
        <tr>
            <td valign="top">Campaign category:</td>
            <td>
                {!! Form::select('category', $campaign_categories, $campaign->category->id, ['placeholder' => 'Select Category', 'class' => 'form-control']) !!}
            </td>
        </tr>
        <tr>
            <td valign="top">Cap:</td>
            <td>
                {!! Form::number('cap', null, array('class' => 'form-control')) !!}
            </td>
        </tr>
        <tr>
            <td valign="top">Daily Cap:</td>
            <td>
                {!! Form::number('daily_cap', null, array('class' => 'form-control')) !!}
            </td>
        </tr>
        <tr>
            <td valign="top">Private Campaign:</td>
            <td>
                @if($campaign->private === 'yes')
                    {!! Form::checkbox('private', 'yes', true) !!} <small>Check this box to upload mobile icon</small>
                @else
                    {!! Form::checkbox('private', 'yes', false) !!} <small>Check this box to upload mobile icon</small>
                @endif
            </td>
        </tr>
        <tr>
            <td valign="top">Campaign rate:</td>
            <td>
                {!! Form::number('rate', null, array('class' => 'form-control', 'min' => '0.01', 'step' => '0.01')) !!}
            </td>
        </tr>
        <tr>
            <td valign="top">Network rate:</td>
            <td>
                {!! Form::number('network_rate', null, array('class' => 'form-control', 'min' => '0.01', 'step' => '0.01')) !!}
            </td>
        </tr>
        <tr>
            <td valign="top">Network:</td>
            <td>
                {!! Form::select('network_id', $networks, $campaign->network_id, array('placeholder' => 'Select Network', 'class' => 'form-control')) !!}
            </td>
        </tr>
        <tr>
            <td valign="top">Campaign URL:</td>
            <td>
                {!! Form::text('url', null, array('class' => 'form-control', 'size' => '70')) !!} <a href="#" onclick="addCamp.url.value=addCamp.url.value + '{hash}'; return false;">Add Credit Hash</a> | <a href="#" onclick="addCamp.url.value=addCamp.url.value + '{pubid}'; return false;">Add PubID</a>

                <small>({hash} = credit hash, {pubid} = publisher id), {email} = email for prepop</small>
            </td>
        </tr>
        <tr>
            <td valign="top">Targeting:</td>
            <td>
                <div id="entry1" class="clonedInput" style="display:none;">
                    <div style="margin-bottom:10px;float: left;width: 100%;">
                        {{--<input type="hidden" name="tar_id[]" value="0">--}}
                        <div class="col-md-2 alpha">
                            <select class="form-control" name="tar_country[]">
                                <option value="">Select Country</option>
                                @foreach($countries as $id => $name)
                                    <option value="{{ $name }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="tar_os[]">
                                <option value="">Select OS</option>
                                <option value="AndroidOS">Android</option>
                                <option value="iOS">iOS</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="tar_device[]" class="form-control">
                                <option value>Select Device</option>
                                <option value="Desktop">Desktop</option>
                                <option value="Mobile">Mobile</option>
                                <option value="Tablet">Tablet</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <input class="form-control" type="number" name="tar_rate[]" placeholder="Rate" value="" step='0.01' />
                        </div>
                        <div class="col-md-1">
                            <input class="form-control" type="number" name="tar_network_rate[]" placeholder="Network Rate" value="" step='0.01' />
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="tar_url[]" value="http://" />
                        </div>
                        <div class="col-md-1">
                            <select name="tar_active[]" class="form-control">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <?php $a = 2; ?>
                @foreach($campaign_targets as $c)
                    <div id="entry{{ $a }}" class="clonedInput" style="display:block;">
                        <div style="margin-bottom:10px;float: left;width: 100%;">
                            {{--<input type="hidden" name="tar_id[]" value="{{ $c->id }}">--}}
                            <div class="col-md-2">
                                <select class="form-control" name="tar_country[]">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $id => $name)
                                        <option value="{{ $name }}"@if($c->country == $name) selected @endif>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" name="tar_os[]">
                                    <option value="">Select OS</option>
                                    <option value="AndroidOS" @if($c->operating_system === 'AndroidOS') selected @endif>Android</option>
                                    <option value="iOS" @if($c->operating_system == 'iOS') selected @endif>iOS</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="tar_device[]" class="form-control">
                                    <option value>Select Device</option>
                                    <option value="desktop" @if($c->device === 'Desktop') selected @endif>Desktop</option>
                                    <option value="mobile" @if($c->device === 'Mobile') selected @endif>Mobile</option>
                                    <option value="tablet" @if($c->device === 'Tablet') selected @endif>Tablet</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <input class="form-control" type="number" name="tar_rate[]" placeholder="Rate" step='0.01' value="{{ $c->rate }}" />
                            </div>
                            <div class="col-md-1">
                                <input class="form-control" type="number" name="tar_network_rate[]" placeholder="Network Rate" value="{{ $c->network_rate }}" step='0.01' />
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="text" name="tar_url[]" value="{{ $c->url }}" />
                            </div>
                            <div class="col-md-1">
                                <select name="tar_active[]" class="form-control">
                                    <option value="yes" @if($c->active === 'yes') selected @endif>Yes</option>
                                    <option value="no" @if($c->active === 'no') selected @endif>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php $a = $a + 1; ?>
                @endforeach
                <div id="addDelButtons">
                    <input type="button" class= "btn btn-default" id="btnAdd" value="Add rule"> <input type="button" class= "btn btn-default" id="btnDel" value="Remove rule above">
                </div>
            </td>
        </tr>

        <tr>
            <td valign="top">Tracking Pixel:</td>
            <td>
                {!! Form::textarea('tracking', null, array('class' => 'form-control', 'rows' => '6', 'cols' => '30')) !!}
            </td>
        </tr>
        <tr>
            <td valign="top">Allowed countries:</td>
            <td>
                {!! Form::select('countries[]', $countries, $campaign->countries->lists('id')->toArray(), array('id' => 'country', 'class' => 'form-control', 'multiple', 'style' => 'height:300px;')) !!}
            </td>
        </tr>
        <tr>
            <td valign="top">Active ?</td>
            <td>
                {!! Form::radio('active', 'yes', true) !!} Yes
                {!! Form::radio('active', 'no', false) !!} No
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                {!! Form::submit('Update Campaign', array('class' => 'btn btn-default')) !!}
            </td>
        </tr>
    </table>
    {!! Form::close() !!}

@endsection