@extends('layouts.master')
@section('title')
    Contact Us -
@endsection
@section('breadcrump')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active"><a href="#"> Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="map">
            <div id="google-map" data-latitude="0.0098" data-longitude="37.6607"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2>Contact us
                        <small>get in touch with us by filling form below</small>
                    </h2>
                    <hr class="colorgraph">
                    <div id="sendmessage">Your message has been sent.We will get back to you. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                   data-rule="minlen:4" data-msg="Please enter at least 4 chars"/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                   data-rule="email" data-msg="Please enter a valid email"/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                   data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="text-area" rows="5" data-rule="required"
                                      data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                        </div>

                        <div class="text-center">
                            <button type="submit" id="send" class="btn btn-theme btn-block btn-md">Send Message</button>
                        </div>
                    </form>
                    <p id="sending"></p>
                    <hr class="colorgraph">

                </div>
                <div class="col-md-4>">
                    <h4 class="text-center">Quick Contacts</h4>
                    <address>
                        <strong>Meru Greens Horticulture Ltd, Headquarters</strong><br>
                        P.O BOX 1730 - 60200<br>
                        MERU, KENYA
                    </address>
                    <p><b>Location: </b>Gatimbi, Meru County, Kenya</p>
                    <p><b>Mobile Phone:</b> +254709751992</p>
                    <p><b>Email:</b> <a href="mailto:info@merugreens.com">info@merugreens.com</a></p>
                    <p><b>Email:</b> <a href="mailto:sales@merugreens.com">sales@merugreens.com</a></p>
                    <hr>
                    <address>
                        <strong>Meru Greens Horticulture Ltd, EPZ</strong><br>
                        P.O BOX 607 - 00242<br>
                        KITENGELA, KENYA
                    </address>
                    <p><b>Location: </b>EPZ, Athi River, Off Jacaranda Road,
                        Kenya</p>
                    <p><b>Telephone:</b> 0203559918</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZIWxcZkupSZWpSMEkOa7xi0th0wMCGqw"></script>
    <script src="{{asset('js/map.min.js')}}">
    </script>
@endpush