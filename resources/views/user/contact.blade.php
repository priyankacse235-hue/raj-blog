@extends('user.layout')
@section('title', 'About Us')
@section('content')

    <section class="contact-container my-5 wow fadeInDown">
        <div class="container">
            <div class="section-heading px-0 px-lg-5">
                <h2 class="text-center mb-5">Get In touch</h2>
                <form action="{{ url('/contact') }}" method="post">
                    @csrf
                    <div class="mx-5 contact-con shadow px-4 py-5">
                        <div class="row mx-2 my-2 text-capitalize">
                            <div class="col-12">
                                @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <strong>{!! \Session::get('success') !!}</strong>
                                    </div>
                                @endif
                                @if (\Session::has('error'))
                                    <div class="alert alert-danger">
                                        <strong>{!! \Session::get('error') !!}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset('client/images/contact.jpg') }}" class="img-fluid" />
                            </div>
                            <div class="col-lg-6">
                                @if (Session::has('success'))
                                    <p class="text-success text-center"> {{ Session::get('success') }} </p>
                                @endif
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" type="text" placeholder="Enter First Name"
                                                name="firstname" />
                                            @error('firstname')
                                                <span class="text-danger"> {{ 'Required' }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" placeholder="Enter Last Name"
                                                name="lastname" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" placeholder="Enter Email" name="email" />
                                    @error('email')
                                        <span class="text-danger"> {{ 'Required' }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input class="form-control" type="text" placeholder="Enter Company"
                                        name="company_name" />
                                </div>
                                <div class="form-group">
                                    <label>I’m Interested in learning about</label>
                                    <select class="form-control" name="intrest">
                                        <option>Manifestation Coaching</option>
                                        <option>Divine Healing</option>
                                        <option>Finding My Soulmate</option>
                                        <option>Healing My Sickness</option>
                                        <option>Booking a Speaker</option>
                                        <option>Helping my team</option>
                                        <option>Helping me</option>
                                    </select>
                                    @error('about')
                                        <span class="text-danger"> {{ 'Required' }}</span>
                                    @enderror
                                </div>

                                @if (Session::has('message'))
                                    <p class="text-success text-center"> {{ Session::get('message') }} </p>
                                @endif
                                <div class="send-btn text-center"><button class="btn btn-primary">Submit</button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
