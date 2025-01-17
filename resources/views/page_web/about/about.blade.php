@extends('template_web.layout')

@section('content')

    <!-- slider_area_start -->
    <div class="bradcam_area">
        <div class="single_bradcam  d-flex align-items-center bradcam_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-9">
                        <div class="bradcam_text text-center">
                            <h3>About Us</h3>
                            <p>There are many variations of passages of lorem Ipsum available, but the majority have
                                suffered alteration unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->


    <!-- features_area_start  -->
    <div class="features_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-73">
                        <h3>Our Features</h3>
                        <p>There are many variations of passages of lorem Ipsum available, but the majority <br> have
                            suffered alteration.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_feature text-center mb-73">
                        <div class="icon">
                            <img src="{{ asset('web') }}/img/svg_icon/1.svg" alt="">
                        </div>
                        <h4>Weightlifting</h4>
                        <p>There are many variations of passages of lorem Ipsum available.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_feature text-center">
                        <div class="icon">
                            <img src="{{ asset('web') }}/img/svg_icon/2.svg" alt="">
                        </div>
                        <h4>Specific Muscles</h4>
                        <p>There are many variations of passages of lorem Ipsum available.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_feature text-center">
                        <div class="icon">
                            <img src="{{ asset('web') }}/img/svg_icon/3.svg" alt="">
                        </div>
                        <h4>Flex Your Muscles</h4>
                        <p>There are many variations of passages of lorem Ipsum available.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_feature text-center">
                        <div class="icon">
                            <img src="{{ asset('web') }}/img/svg_icon/4.svg" alt="">
                        </div>
                        <h4>Cardio Exercises</h4>
                        <p>There are many variations of passages of lorem Ipsum available.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features_area_end  -->

    <!-- gallery_start -->
    <div class="gallery_area">
        <div class="single_gallery big_img">
            <div class="hover_pop">
                <a class="popup-image" href="{{ asset('web') }}/img/gallery/1.png">
                    <i class="ti-plus"></i>
                </a>
            </div>
            <img src="{{ asset('web') }}/img/gallery/1.png" alt="">
        </div>
        <div class="single_gallery big_img">
            <div class="hover_pop">
                <a class="popup-image" href="{{ asset('web') }}/img/gallery/2.png">
                    <i class="ti-plus"></i>
                </a>
            </div>
            <img src="{{ asset('web') }}/img/gallery/2.png" alt="">
        </div>
        <div class="single_gallery small_img">
            <div class="hover_pop">
                <a class="popup-image" href="{{ asset('web') }}/img/gallery/3.png">
                    <i class="ti-plus"></i>
                </a>
            </div>
            <img src="{{ asset('web') }}/img/gallery/3.png" alt="">
        </div>
        <div class="single_gallery small_img">
            <div class="hover_pop">
                <a class="popup-image" href="{{ asset('web') }}/img/gallery/4.png">
                    <i class="ti-plus"></i>
                </a>
            </div>
            <img src="{{ asset('web') }}/img/gallery/4.png" alt="">
        </div>
        <div class="single_gallery big_img">
            <div class="hover_pop">
                <a class="popup-image" href="{{ asset('web') }}/img/gallery/5.png">
                    <i class="ti-plus"></i>
                </a>
            </div>
            <img src="{{ asset('web') }}/img/gallery/5.png" alt="">
        </div>
        <div class="single_gallery big_img">
            <div class="hover_pop">
                <a class="popup-image" href="{{ asset('web') }}/img/gallery/6.png">
                    <i class="ti-plus"></i>
                </a>
            </div>
            <img src="{{ asset('web') }}/img/gallery/6.png" alt="">
        </div>

    </div>
    <!-- gallery_area_end  -->
    <a href="#" class="view_pore boxed-btn3">View More</a>
    <!-- team_area_start  -->
    <div class="team_area team_bg_1 overlay2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-73">
                        <h3>Our Trainers</h3>
                        <p>There are many variations of passages of lorem Ipsum available, but the majority <br> have
                            suffered alteration.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_team">
                        <div class="team_thumb">
                            <img src="{{ asset('web') }}/img/team/1.png" alt="">
                            <div class="team_hover">
                                <div class="hover_inner text-center">
                                    <ul>
                                        <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="team_title text-center">
                            <h3>Jessica Mino</h3>
                            <p>Woman Trainer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_team">
                        <div class="team_thumb">
                            <img src="{{ asset('web') }}/img/team/2.png" alt="">
                            <div class="team_hover">
                                <div class="hover_inner text-center">
                                    <ul>
                                        <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="team_title text-center">
                            <h3>Amit Khan</h3>
                            <p>Men Trainer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_team">
                        <div class="team_thumb">
                            <img src="{{ asset('web') }}/img/team/3.png" alt="">
                            <div class="team_hover">
                                <div class="hover_inner text-center">
                                    <ul>
                                        <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="team_title text-center">
                            <h3>Paulo Rolac</h3>
                            <p>Men Trainer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team_area_end  -->

    <!-- big_offer_area start  -->
    <div class="big_offer_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="offter_text text-center">
                        <h3>A Big Offer for <br>
                            This Summer</h3>
                        <a href="#" class="boxed-btn3">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- big_offer_area end  -->
@endsection
