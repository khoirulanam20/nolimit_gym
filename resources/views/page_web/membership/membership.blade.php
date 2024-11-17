@extends('template_web.layout')

@section('content')
    <!-- bradcam_area -->
    <div class="bradcam_area">
        <div class="single_bradcam  d-flex align-items-center bradcam_bg_2 overlay">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-9">
                        <div class="bradcam_text text-center">
                            <h3>Membership</h3>
                            <p>There are many variations of passages of lorem Ipsum available, but the majority have
                                suffered alteration unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area end -->

    <div class="priscing_area">
        <div class="container">
            <div class="row">
                @foreach($kategori as $kat)
                <div class="col-lg-4 col-md-6">
                    <div class="single_prising text-center">
                        <div class="prising_header">
                            <h3>{{ $kat->name }}</h3>
                            <span>Rp {{ number_format($kat->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="pricing_body">
                            <ul>
                                <li>{{ $kat->description }}</li>
                                <li>24h unlimited access</li>
                                <li>Trainer Advice</li>
                                <li>Locker + Bathroom</li>
                            </ul>
                        </div>
                        <div class="pricing_btn">
                            <a href="#" class="boxed-btn3" data-bs-toggle="modal" data-bs-target="#joinMembershipModal">Join Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="offer_area offer_bg">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="offer_text">
                        <h4>A Big Offer for <br>
                            This Summer</h4>
                        <h3>50% Off</h3>
                        <p>There are many variations of passages of lorem Ipsum available, but the majority have suffered
                            alteration.</p>
                        <a href="#" class="boxed-btn3">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Join Membership Modal -->
    <div class="modal fade" id="joinMembershipModal" tabindex="-1" aria-labelledby="joinMembershipModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="joinMembershipModalLabel">Join Membership</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('membership.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="kategori_id" id="kategori_id">
                        <input type="hidden" name="price" id="price">
                        
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <label for="duration" class="form-label">Durasi</label>
                        <div class="mb-3">
                            <select class="form-control" id="duration" name="duration" required>
                                <option value="1">1 Bulan</option>
                                <option value="3">3 Bulan</option>
                                <option value="6">6 Bulan</option>
                                <option value="12">12 Bulan</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Join</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
