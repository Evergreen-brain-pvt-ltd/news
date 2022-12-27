@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <div class="form-row">

                        <div class="form-group">
                            <label for="firstname">{{ __('First Name') }} :</label>
                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}">
                            @error('firstname')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="lastname">{{ __('Last Name') }} :</label>
                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}">
                            @error('lastname')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="company_name">{{ __('Company Name') }} :</label>
                            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}">
                            @error('company_name')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="job_title">{{ __('Job Title') }} :</label>
                            <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}">
                            @error('job_title')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="industry_sector">{{ __('Industry Sector') }} :</label>
                            <!-- <input id="industry_sector" type="text" class="form-control @error('industry_sector') is-invalid @enderror" name="industry_sector" value="{{ old('industry_sector') }}"> -->
                            <select class="form-control select" name="industry_sector" id="industry_sector">
                            <option value="" selected disabled>All</option>
                            <option value="Academia, including students">Academia, including students</option>
                            <option value="Airlines &amp; Airports">Airlines &amp; Airports</option>
                            <option value="Associations, govt, non-profit">Associations, govt, non-profit</option>
                            <option value="Attractions">Attractions</option>
                            <option value="Car Rental">Car Rental</option>
                            <option value="Coach / Rail">Coach / Rail</option>
                            <option value="Cruise Line">Cruise Line</option>
                            <option value="Destination Management Company">Destination Management Company</option>
                            <option value="Job Recruitment">Job Recruitment</option>
                            <option value="Hotel/Resort (200+ rooms)">Hotel/Resort (200+ rooms)</option>
                            <option value="Hotel/Resort (less than 200 rooms)">Hotel/Resort (less than 200 rooms)</option>
                            <option value="Media, Press">Media, Press</option>
                            <option value="MICE Organizer &amp; Venues">MICE Organizer &amp; Venues</option>
                            <option value="Restaurant">Restaurant</option>
                            <option value="Technology">Technology</option>
                            <option value="Tour Operator">Tour Operator</option>
                            <option value="Tourist Board">Tourist Board</option>
                            <option value="Trade Services - Insurance, Payment &amp; similar">Trade Services - Insurance, Payment &amp; similar</option>
                            <option value="Travel Agent - Home based">Travel Agent - Home based</option>
                            <option value="Travel Agent - Cruise">Travel Agent - Cruise</option>
                            <option value="Travel Agent - Corporate">Travel Agent - Corporate</option>
                            <option value="Travel Agent - Groups &amp; MICE">Travel Agent - Groups &amp; MICE</option>
                            <option value="Travel Agent - Luxury">Travel Agent - Luxury</option>
                            <option value="Travel Agent - Retail &amp; Leisure">Travel Agent - Retail &amp; Leisure</option>
                            <option value="PR, Ad Agency, Marketing &amp; similar">PR, Ad Agency, Marketing &amp; similar</option>
                            <option value="Others-Non Travel Industry">Others-Non Travel Industry</option>
                            <option value="Others-Travel Industry">Others-Travel Industry</option>
                            <option value="Wholesaler/Consolidator - Air/Hotel">Wholesaler/Consolidator - Air/Hotel</option>	
                        </select>
                            @error('industry_sector')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="job_function">{{ __('Job Function') }} :</label>
                            <!-- <input id="job_function" type="text" class="form-control @error('job_function') is-invalid @enderror" name="job_function" value="{{ old('job_function') }}"> -->
                              <select class="form-control select" name="job_function" id="job_function">
                              <option value="" selected disabled>--Select Any--</option>
                              <option value="Sales, Business Develpment &amp; sim">Sales, Business Develpment &amp; sim</option>
                              <option value="Advertising , Social Media &amp; sim">Advertising , Social Media &amp; sim</option>
                              <option value="Reservations, Call Center &amp; sim">Reservations, Call Center &amp; sim</option>
                              <option value="Consultant">Consultant</option>
                              <option value="Tech, Digital, IT &amp; sim">Tech, Digital, IT &amp; sim</option>
                              <option value="Marketing, Partnership &amp; sim">Marketing, Partnership &amp; sim</option>
                              <option value="Operations, Customer Service &amp; sim">Operations, Customer Service &amp; sim</option>
                              <option value="Product, Contracting &amp; sim">Product, Contracting &amp; sim</option>
                              <option value="Public Relations">Public Relations</option>
                              <option value="Travel Agent at Travel Agency">Travel Agent at Travel Agency</option>
                              <option value="Travel Agent Home Based Independent">Travel Agent Home Based Independent</option>
                              <option value="Editor/Writer/Journalist">Editor/Writer/Journalist</option>
                              <option value="Management-CEO, MD, Director, VP">Management-CEO, MD, Director, VP</option>
                              <option value="Human Resource">Human Resource</option>
                              <option value="Admin, Finance, HR &amp; sim">Admin, Finance, HR &amp; sim</option>
                              <option value="eCommerce">eCommerce</option><option value="Others">Others</option>
                              <option value="Instructor/Researcher">Instructor/Researcher</option>
                              <option value="Student">Student</option>	
                              </select>
                            @error('job_function')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="job_level">{{ __('Job Level') }} :</label>
                            <!-- <input id="job_level" type="text" class="form-control @error('job_level') is-invalid @enderror" name="job_level" value="{{ old('job_level') }}"> -->
                            <select class="form-control select" name="job_level" id="job_level">
                             <option value="" selected disabled>--Select Any--</option>
                             <option value="Staff/Travel consultant/Team member">Staff/Travel consultant/Team member</option>
                             <option value="Head of Department or Manager">Head of Department or Manager</option>
                             <option value="Supervisor/Team leader">Supervisor/Team leader</option>
                             <option value="Sales /Marketing Manager">Sales /Marketing Manager</option>
                             <option value="Senior-Management (CEO/MD/Director/VP)">Senior-Management (CEO/MD/Director/VP)</option>
                             <option value="Owner">Owner</option>
                             <option value="Student / Academic">Student / Academic</option>
                             <option value="Other">Other</option>
                             </select>
                            @error('job_level')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone_number">{{ __('Phone Number') }} :</label>
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}">
                            @error('phone_number')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="country">{{ __('Country') }} :</label>
                            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}">
                            @error('country')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="city">{{ __('City') }} :</label>
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}">
                            @error('city')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="state">{{ __('State/Province *') }} :</label>
                            <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}">
                            @error('state')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="zip_code">{{ __('Zip code *') }} :</label>
                            <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}">
                            @error('zip_code')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }} :</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">

                            <small>Password must have at least 8 characters.</small>
                            @error('password')
                            <div>
                                <label class="error fail-alert  mt-1">{{ $message }}</label>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" type="text" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">

                        <small>Password must have at least 8 characters.</small>
                        @error('password_confirmation')
                        <div>
                            <label class="error fail-alert  mt-1">{{ $message }}</label>
                        </div>
                        @enderror
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="terms">
                        <label class="form-check-label" for="terms">I have read and agree to this site's <a href="">Privacy Policy.</label>
                    
                    @error('terms')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                    </div>
                 <button type="submit" class="btn btn-primary btn-block">Submit</button>


                </div>
            </div>
        </div>
    </div>
</div>
@push('footer_extras')
<script>
    $('.select').select2({
            placeholder: "Select",
        });
</script>
@endpush
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection