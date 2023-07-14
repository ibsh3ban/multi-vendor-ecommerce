@php
$banners = App\Models\Banner::orderBy('banner_title','ASC')->limit(3)->get();
@endphp


<section class="banners mb-25">
    <div class="container">
        <div class="row">

             @foreach ($banners as $item )

            <div class="col-lg-4 d-md-none d-lg-flex">
                <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <img src="{{ asset($item->banner_image) }}" alt="" />
                    <div class="banner-text">
                        <h4>{{ $item->banner_title }}</h4>
                        <a href="{{ $item->banner_url }}" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
