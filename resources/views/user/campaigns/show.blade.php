@extends('shared.layout')
@section('body')
<div class="hero text-center border-bottom py-6">
    <div class="container">
        <h1 class="hero-heading">{{ $campaign->name }}</h1>
        @if( !is_null( $custom_rate ) )
            <p class="get-piad">Get paid <span style="text-decoration: line-through;">${{ $campaign->rate }} </span><b>${{ $custom_rate->rate }}</b> per lead.</p>
        @else
            <p class="get-piad">Get paid <b>${{ $campaign->rate }}</b> per lead. </p>
        @endif
    </div>
</div>
<div class="page-container py-6">
    <div class="container">
        @if($cap_daily_status)
            <div class="alert alert-danger">This campaign has reached its daily cap ({{ $campaign->cap_daily }} leads a day). It will reset at midnight.</div>
        @endif
        <div class="mb-2">
            <h2>Category: {{ $campaign->category->name }}</h2>
        </div>
        <div class="mb-2">
            <p>{{ $campaign->description }}</p>
        </div>
        <div class="mb-2">
            <h5><strong>Requirements:</strong></h5>
            <p>{{ $campaign->requirements }}</p>
        </div>

        @if(auth()->user()->role == 1 || auth()->user()->role ==2)
            @unless($cap_daily_status)

            <div class="input-group promotional-link">
                <span class="input-group-text d-none d-lg-flex">Promotional Link</span>
                <input type="text" id="copyTarget" class="form-control" value="{{ url('/track/'. $campaign->id . '/' . auth()->user()->id) }}">
                <span id="copyButton" class="input-group-addon btn btn-primary" title="Click to copy">
                    <i id="copiedText" class="bi bi-clipboard"></i>
                </span>
            </div>
            @endunless
        @endif


        @unless(is_null($images))
            <h5><strong>Promotional Images:</strong></h5>
            <div class="row">
                @foreach($images as $file)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">
                            <img src="/campaign/gallery/image/{!! $campaign->id . '/' . $file !!}" alt="...">
                        </div>
                    </div>
                @endforeach
            </div>
        @endunless

        <hr>

        <div>
            <a class="btn btn-primary btn-lg" href="{!! url('/campaigns')  !!}">Go Back</a>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
(function() {
  "use strict";

  function copyToClipboard(elem) {
    var target = elem;

    // select the content
    var currentFocus = document.activeElement;

    target.focus();
    target.setSelectionRange(0, target.value.length);

    // copy the selection
    var succeed;

    try {
      succeed = document.execCommand("copy");
    } catch (e) {
      console.warn(e);

      succeed = false;
    }

    // Restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
      currentFocus.focus();
    }

    if (succeed) {
        $('#copiedText').removeClass('bi-clipboard');
        $('#copiedText').addClass('bi-clipboard-check-fill');
        $('#copyButton').removeClass('btn-primary');
        $('#copyButton').addClass('btn-success');
    }

    return succeed;
  }

  $("#copyButton, #copyTarget").on("click", function() {
    copyToClipboard(document.getElementById("copyTarget"));
  });
})();
</script>
@endsection
