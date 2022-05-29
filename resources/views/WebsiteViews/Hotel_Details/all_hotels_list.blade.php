@extends('layouts.layout_hotels')
@section('content')

    <!-- ======= Hotel Section ======= -->

    {{--    <section id="contact" class="contact">--}}
    <div class="card-body">
        <form class="form" action="{{route('filter.hotel.Details')}}" method="get">

            <div class="row">
                <div class="col">
                    <select class="form-control" name="country_id" id="country"
                            style="font-family: 'century-gothic', sans-serif; font-size: 14px; margin-right: 0;">
                        <option selected value="">Select Country...</option>

                        @forelse($countries as $country)
                            <option value="{{$country->id}}">{{$country->country_name}}</option>
                        @empty
                            <option value="">No Counties Added</option>
                        @endforelse
                    </select>
                </div>

                <div class="col">
                    <select class="border-radius-text form-control" name="province_id" id="province"
                            style="font-family: 'century-gothic', sans-serif; font-size: 14px; margin-right: 0;"></select>
                </div>

                <div class="col">
                    <select class="border-radius-text form-control" name="city_id" id="city"
                            style="font-family: 'century-gothic', sans-serif; font-size: 14px; margin-right: 0;"></select>
                </div>


                <button type="submit" class="btn btn-primary  scrollto text-center"
                        style="width: 100px; font-size: 12px; height: 36px; border-radius: 6px; margin-right: 15px;">
                    Search
                </button>

            </div>
        </form>
    </div>

    {{--    </section><!-- End Contact Section -->--}}


    {{--    <section id="Hgallery" class="gallery">--}}

    {{--        <form action="{{route('hotel.gallary')}}" method="get">--}}
    {{--            <div class="container-fluid">--}}

    {{--                <div class="section-title">--}}
    {{--                    <h2><span>Hotel Photos</span></h2>--}}
    {{--                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas--}}
    {{--                        atque--}}
    {{--                        vitae autem.</p>--}}
    {{--                </div>--}}

    {{--                <div class="row no-gutters">--}}

    {{--                    @foreach($hotelDetails as $hotelDetail)--}}
    {{--                        <div class="col-lg-3 col-md-4">--}}
    {{--                            <div class="gallery-item gallery-margins">--}}

    {{--                                <a href="{{asset('img/' . $hotelDetail->file_name)}}" class="gallery-lightbox ">--}}
    {{--                                    <img src="{{asset('img/' . $hotelDetail->file_name)}}" alt="" class="img-fluid">--}}

    {{--                                    <button class="btn btn-dark form-control"--}}
    {{--                                            id="images-buttons">--}}
    {{--                                        <h5 class="text-center" id="images-titles">{{$hotelDetail->hotel_title}}<a></a>--}}
    {{--                                        </h5>--}}
    {{--                                    </button>--}}
    {{--                                </a>--}}

    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @endforeach--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </form>--}}
    {{--    </section><!-- End Hotel Section -->--}}
    {{--    <br><br>--}}


    <section id="Hgallery" class="gallery">
        <div class="container-fluid">

            <div class="section-title">
                <h2><span>Hotel Photos</span></h2>
                <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas
                    atque
                    vitae autem.</p>
            </div>


            <div class="row no-gutters">
                <!-- Carousel wrapper -->
                <div
                    class="carousel-dark text-center">

                    <!-- Inner -->
                    <div class="carousel-inner py-4">
                        <!-- Single item -->
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row">
                                    @foreach($hotelDetails as $hotelDetail)
                                        <div class="col-lg-4">
                                            <div class="card">

                                                <a href="{{asset('img/' . $hotelDetail->file_name)}}"
                                                   class="gallery-lightbox ">

                                                    @if($hotelDetail->file_name != "")
                                                        <img src="{{asset('img/' . $hotelDetail->file_name)}}" alt=""
                                                             class="img-fluid"/></a>
                                                @else
                                                    <img src="{{asset('img/noImage.jpg')}}" alt=""
                                                         class="img-fluid"/></a>
                                                @endif

                                                <div class="card-body">
                                                    <div class="member-info">
                                                        <div class="social social-links-color">

                                                            <h5><strong>{{$hotelDetail->hotel_title}}</strong></h5>
                                                            <a href=""><i class="bi bi-twitter"></i></a>
                                                            <a href=""><i class="bi bi-facebook"></i></a>
                                                            <a href=""><i class="bi bi-instagram"></i></a>
                                                            <a href=""><i class="bi bi-linkedin"></i></a>
                                                        </div>

                                                        <a href="{{route('hotel.gallary', $hotelDetail->id)}}"
                                                           methods="get">
                                                            <button class="btn btn-dark form-control"
                                                                    id="images-buttons">
                                                                <h4 class="text-center" id="images-titles"> View </h4>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div>

{{--                                    {{$hotelDetails->links() }}--}}

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End Hotel Section -->
    <br><br>


@endsection
