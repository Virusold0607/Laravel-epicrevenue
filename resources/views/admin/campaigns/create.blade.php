@extends('admin.shared.layout')

@section('body')

<div class="page-header mb-4">
    <div class="row align-items-center">
        <div class="col-sm mb-2 mb-sm-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-no-gutter">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="#">Campaigns</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Campaign</li>
                </ol>
            </nav>

            <h1 class="page-header-title">Create Campaign</h1>

            <div class="mt-2">
                <a class="text-body" href="#">
                    <i class="bi-eye me-1"></i> Preview
                </a>
            </div>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>

{!! Form::model($campaign, array('url' => '/admin/campaigns/', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'addCamp')) !!}
    <div class="row">
        <div class="col-md-8">
            <div class="card p-3 mb-4">
                {{-- Was there an error? --}}
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
            <!-- !card -->
        </div>
        <!-- !col-md-8 -->
        <div class="col-md-4">

        </div>
        <!-- !col-md-4 -->
    </div>
    <!-- !row -->
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
                    <td>Featured image:</td>
                    <td>
                        {!! Form::file('feature_image', ['onchange' => 'loadFile(event, "featured_image_output")']) !!}
                        <img id="featured_image_output" class="img-responsive" style="max-height:300px;"/>
                        <script>
                            var loadFile = function(event, id) {
                                var output = document.getElementById(id);
                                output.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                    </td>
                </tr>


                <tr>
                    <td>Homepage Featured image:</td>
                    <td>
                        {!! Form::file('homepage_featured_image', ['onchange' => 'loadFile(event, "homepage_featured_image_output")']) !!}
                        <img id="homepage_featured_image_output" class="img-responsive" style="max-height:300px;"/>
                        <script>
                            var loadFile = function(event, id) {
                                var output = document.getElementById(id);
                                output.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                    </td>
                </tr>

                <tr>
                    <td>Homepage Featured Image Background:</td>
                    <td>
                        {!! Form::file('homepage_featured_image_background', ['onchange' => 'loadFile(event, "homepage_featured_image_background_output")']) !!}
                        <img id="homepage_featured_image_background_output" class="img-responsive" style="max-height:300px;"/>
                        <script>
                            var loadFile = function(event, id) {
                                var output = document.getElementById(id);
                                output.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                    </td>
                </tr>

                <tr>
                    <td>Mobile App Wall?:</td>
                    <td>
                        {!! Form::checkbox('mobile', null) !!} <small>Check this box to upload mobile icon</small>
                    </td>
                </tr>

                <tr>
                    <td>Incent?:</td>
                    <td>
                        {!! Form::checkbox('incent', null) !!} <small>Check this box to make incent</small>
                    </td>
                </tr>

                <tr>
                    <td>For Snapaid?:</td>
                    <td>
                        {!! Form::checkbox('is_for_snapaid', null) !!} <small>Check this box to make it available for snapaid</small>
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
                        {!! Form::select('category', $campaign_categories, null, ['placeholder' => 'Select Category', 'class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td valign="top">Cap:</td>
                    <td>
                        {!! Form::number('cap', 1000, array('class' => 'form-control')) !!}
                    </td>
                </tr>
                <tr>
                    <td valign="top">Daily Cap:</td>
                    <td>
                        {!! Form::number('daily_cap', 0, array('class' => 'form-control', 'min' => '1')) !!}
                    </td>
                </tr>
                <tr>
                    <td valign="top">Private Campaign:</td>
                    <td>
                        {!! Form::checkbox('private', null) !!} <small>Automatically set campaigns as private, and only allow specific publishers to run it.</small>
                    </td>
                </tr>
                <tr>
                    <td valign="top">Campaign rate:</td>
                    <td>
                        {!! Form::number('rate', '0.00', array('class' => 'form-control', 'min' => '0.01', 'step' => '0.01')) !!}
                    </td>
                </tr>
                <tr>
                    <td valign="top">Network rate:</td>
                    <td>
                        {!! Form::number('network_rate', '0.00', array('class' => 'form-control', 'min' => '0.01', 'step' => '0.01')) !!}
                    </td>
                </tr>
                <tr>
                    <td valign="top">Network:</td>
                    <td>
                        {!! Form::select('network_id', $networks, null, array('placeholder' => 'Select Network', 'class' => 'form-control')) !!}
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
                    <td valign="top">Postback URL:</td>
                    <td>
                        {!! Form::text('postback_url', null, array('class' => 'form-control', 'size' => '70')) !!}
                    </td>
                </tr>
                <tr>
                    <td valign="top">Targeting:</td>
                    <td>
                        <div id="entry1" class="clonedInput" style="display:none;">
                            <div style="margin-bottom:10px;float: left;width: 100%;">
                                <div class="col-md-2 alpha">
                                    <select class="form-control" name="tar_country[]">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $id => $name)
                                            <option value="{{ $name }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 alpha">
                                    <select class="form-control" name="tar_os[]">
                                        <option value="">Select OS</option>
                                        <option value="AndroidOS">Android</option>
                                        <option value="iOS">iOS</option>
                                    </select>
                                </div>
                                <div class="col-md-2 alpha">
                                    <select name="tar_device[]" class="form-control">
                                        <option value>Select Device</option>
                                        <option value="Desktop">Desktop</option>
                                        <option value="Mobile">Mobile</option>
                                        <option value="Tablet">Tablet</option>
                                    </select>
                                </div>
                                <div class="col-md-1 alpha">
                                    <input class="form-control" type="number" name="tar_rate[]" placeholder="Rate" value="" step='0.01' />
                                </div>
                                <div class="col-md-1 alpha">
                                    <input class="form-control" type="number" name="tar_network_rate[]" placeholder="Netwrok Rate" value="" step='0.01' />
                                </div>
                                <div class="col-md-3 alpha">
                                    <input class="form-control" type="text" name="tar_url[]" value="http://" />
                                </div>
                                <div class="col-md-1 alpha omega">
                                    <select name="tar_active[]" class="form-control">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
                            {!! Form::select('countries[]', $countries, null, array('id' => 'country', 'class' => 'form-control', 'multiple' => 'multiple')) !!}
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
                            {!! Form::submit('Add Campaign', array('class' => 'btn btn-default')) !!}
                        </td>
                    </tr>
            </table>
        
{!! Form::close() !!}

@endsection

@section('scripts')
    <script src="{{ url('/admin_assets/js/script_upload_images.js') }}"></script>
    <script src="{{ url('/admin_assets/js/clone-form-td.js') }}"></script>
@endsection
