@extends('admin.shared.layout')

@section('styles')
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="{{ url('/admin_assets/js/script_upload_images.js') }}"></script>
    <script src="{{ url('/admin_assets/js/clone-form-td.js') }}"></script>
    <script type="text/javascript">
        $('#categories').select2({
            placeholder: "Select Categories"
        });
        $('#influencers').select2({
            placeholder: "Select Influencers"
        });
    </script>
@endsection

@section('body')
    <h3>Update Promotion Information</h3>
    {!! Form::model($promotion, array('url' => '/admin/promotions/'. $promotion->id, 'method' => 'put','class' => 'form-horizontal', 'files' => 'true')) !!}
        <div class="container">
            @if(Session::has('success'))
                {!! Session::get('success') !!}
            @else
                {!! Session::get('error') !!}
            @endif
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
                <td>Promotion name</td>
                <td>
                    {!! Form::text('name', null, array('class' => 'form-control', 'required'=>'required', 'size'=>'70' )) !!}
                </td>
            </tr>
            <tr>
                <td>Promotion description</td>
                <td>
                    {!! Form::textarea('description', null, array('class' => 'form-control', 'cols' => '30', 'rows' => '6' )) !!}
                </td>
            </tr>
            <tr>
                <td>Feature image:</td>
                <td>
                    <style>
                        .hiddenfile {
                            width: 0px;
                            height: 0px;
                            overflow: hidden;
                        }
                    </style>
                    <div class="div_full_width">
                        <button id="chooseFile" class="btn btn-default">
                            Choose file
                        </button>
                    </div>
                    <div class="hiddenfile">
                        <input id= "image_file_form" type="file"  data-clear-btn="false" name="feature_image" accept="image/*" multiple="false"  capture>
                    </div>

                    <div id="info" class="preview_image_box">
                        @unless(empty($promotion->featured_img))
                            <preview_image_box><div class="image_preview"><img src="{{ url('/promote/image/' . $promotion->id) }}"></div></preview_image_box>
                        @endunless
                    </div>
                </td>
            </tr>
            <tr>
                <td>Promotion category</td>
                <td>
                    {!! Form::select('categories[]', App\Models\PromotionCategory::orderBy('id', 'asc')->pluck('name', 'id') , $promotion->categories->pluck('id')->toArray(), array('id' => 'categories', 'class' => 'col-md-9 form-control', 'required'=>'required', 'multiple'=>'multiple' )) !!}
                </td>
            </tr>
            <tr>
                <td valign="top">Promotion URL:</td>
                <td>
                    {!! Form::text('url', null, array('class' => 'form-control', 'size' => '70')) !!}

                    <small>({pubid} = publisher id)</small>
                </td>
            </tr>
            <tr>
                <td>Allowed Influencers</td>
                <td>
                    {!! Form::select('influencers[]', App\Models\InstagramAccount::orderBy('user_id', 'asc')->pluck('username', 'id'),  $promotion->influencers->pluck('id')->toArray(), array('id' => 'influencers', 'class' => 'form-control', 'required'=>'required', 'multiple'=>'multiple' )) !!}
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    {!! Form::radio('status', 'yes', array('required'=>'required')) !!}Active
                    {!! Form::radio('status', 'no', array('required'=>'required' )) !!}Inactive
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    {!! Form::submit('Add Promotion', array('class' => 'btn btn-default')) !!}
                </td>
            </tr>
        </table>
    {!! Form::close() !!}
@endsection