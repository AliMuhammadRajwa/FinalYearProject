@extends('layouts.layout_hotels')
@section('content')

    <!-- ======= Hotel Section ======= -->

    {{--    <section id="contact" class="contact">--}}
    <div class="card-body">
        <form class="form" action="{{route('filter.hotel.gallary', $id)}}" method="get">

            <div class="row">
                <div class="col">
                    <input class="form-control" name="budget_range_min" placeholder="Please enter minimum budget"
                           required
                           style="font-family: 'century-gothic', sans-serif; font-size: 14px; margin-right: 0;"/>
                </div>

                <div class="col">
                    <input class="border-radius-text form-control" name="budget_range_max"
                           placeholder="Please enter maximum budget" required
                           style="font-family: 'century-gothic', sans-serif; font-size: 14px; margin-right: 0;"/>
                </div>

                <button type="submit" class="btn btn-primary  scrollto text-center"
                        style="width: 100px; font-size: 12px; height: 36px; border-radius: 6px; margin-right: 15px;">
                    Search
                </button>

            </div>
        </form>
    </div><br>
    {{--    </section><!-- End Contact Section -->--}}

    {{--    <section id="Hgallery" class="gallery">--}}

    {{--        <form action="{{route('hotel.gallary')}}" method="get">--}}
    <div class="container-fluid">

        <div class="section-title">
            <h2><span>Hotel Rooms And Description</span></h2>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas
                atque
                vitae autem.</p>
        </div>
        <br>

        <div class="row no-gutters">
            <!-- Carousel wrapper -->
            <div
                class="carousel-dark text-center">

                <!-- Inner -->
                <div class="carousel-inner">
                    <!-- Single item -->
                    <div class="carousel-item active">
                        <div class="container">

                            <div class="row">

                                @foreach($hotelRoomsGallary as $RoomsGallary)

                                    <div class="col-lg-3">
                                        <div class="card cart-rooms">

                                            @if($RoomsGallary->file_name != "")
                                                <img src="{{asset('img/' . $RoomsGallary->file_name)}}" alt=""
                                                     class="img-fluid"/></a>
                                            @else
                                                <img src="{{asset('img/noImage.jpg')}}" alt=""
                                                     class="img-fluid"/></a>
                                            @endif

                                            <div class="card-body">
                                                <div class="member-info">
                                                    <div class="social social-links-color-rooms">
                                                        <h5 class="card-title">
                                                            <strong>{{$RoomsGallary->room_title}}</strong></h5>

                                                        <p class="card-text">
                                                            {{$RoomsGallary->room_type}}<br>
                                                            {{$RoomsGallary->bed_type}}<br>
                                                            <strong
                                                                style="font-size: 15px;">{{'RS. ' . $RoomsGallary->total_price}}</strong>

                                                        </p>

                                                        <a href="" methods="get" class="room-gallary">
                                                            <button class="btn btn-dark form-control room-gallary"
                                                                    id="images-buttons">
                                                                <h4
                                                                    class="text-center"
                                                                    id="images-titles"> Reserve Now </h4></button>

                                                            {{--               Todo  This is Pop UP Start--}}

                                                        <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                                Launch demo modal
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            ...
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{--             This is Pop up end --}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!-- Inner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--        </form>--}}
    {{--    </section><!-- End Hotel Section -->--}}
    <br><br>



    <br><br>
@endsection
