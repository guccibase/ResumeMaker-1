@extends('layouts.resume')
@section('title')
    Resueme
@stop
@section('content')

<style>

    .my-auto {
        margin-top: 0;
    }

</style>

<form method="post" enctype="multipart/form-data" name="resumeMakerForm" id="resumeMakerForm">

    {{ csrf_field() }}

    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">

            <h2 class="mb-5">About</h2>

            <h3 class="mb-0">Information</h3>

            <div class="row">

                <div class="col-xs-4 col-md-4">
                    <div class="form-group required">
                        <label for="first_name">First Name</label>
                        <input name="first_name" required type="text" class="form-control" id="first_name" placeholder="First Name">
                    </div>
                </div>

                {{--<div class="col-xs-4 col-md-4">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="middle_name">Middle Name</label>--}}
                        {{--<input name="middle_name" type="text" class="form-control" id="middle_name" placeholder="Middle Name">--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="col-xs-4 col-md-4">
                    <div class="form-group required">
                        <label for="last_name">Last Name</label>
                        <input name="last_name" required type="text" class="form-control" id="last_name" placeholder="Last Name">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-xs-12 col-md-12">
                    <div class="form-group">
                        <label for="image">Personal Image</label>
                        <input name="image" type="file" id="image" >
                        {{--<p class="help-block">Example block-level help text here.</p>--}}
                    </div>
                </div>

            </div>

            <h3 class="mb-0">Contact</h3>

            <div class="row">

                <div class="col-xs-4 col-md-4">
                    <div class="form-group required">
                        <label for="email">Email Address</label>
                        <input name="email" required type="email" class="form-control" id="email" placeholder="Email Address">
                    </div>
                </div>

                <div class="col-xs-4 col-md-4">
                    <div class="form-group required">
                        <label for="cellphone">Cellphone</label>
                        <input name="cellphone" required type="number" class="form-control" id="cellphone" placeholder="Cellphone">
                    </div>
                </div>

                <div class="col-xs-4 col-md-4">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input name="phone" type="number" class="form-control" id="phone" placeholder="Phone">
                    </div>
                </div>

            </div>

            <h3 class="mb-0">Address</h3>

            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <div class="form-group required">
                        <label for="country">Country</label>
                        <select name="country" required class="country js-states form-control" id="country">
                            @foreach(\App\Constants\Countries::$CountriesList as $country)
                                <option value="{{ $country }}">{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-4 col-md-4">
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input name="province" type="text" class="form-control" id="province" placeholder="Province">
                    </div>
                </div>
                <div class="col-xs-4 col-md-4">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input name="city" type="text" class="form-control" id="city" placeholder="City">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group required">
                        <label for="address">Address</label>
                        <textarea name="address" maxlength="250" required class="form-control" id="address" placeholder="Address"></textarea>
                    </div>
                </div>
            </div>

            <h3 class="mb-0">About You</h3>

            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group required">
                        <label for="about">About You</label>
                        <textarea name="about" required class="form-control" id="about" placeholder="About You"></textarea>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
            <h2 class="mb-5">Experience</h2>

            <button type="button" class="btn btn-info add-experience" data-toggle="modal" data-target="#add-experience">Add Experience</button>

            <span class="experiences-list"></span>

            <div class="modal fade" id="add-experience" tabindex="-1" role="dialog" aria-labelledby="add-experience">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Experience</h4>
                        </div>

                        <div class="modal-body">

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group required">
                                        <label for="title">Title</label>
                                        <input name="experience_title"  type="text" class="form-control" id="title" placeholder="Title">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group required">
                                        <label for="company">Company</label>
                                        <input name="experience_company"  type="text" class="form-control" id="company" placeholder="Company">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input name="experience_location" type="text" class="form-control" id="location" placeholder="Location">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <div class="form-group required">
                                        <label for="from">From</label>
                                        <span class="experience_from_year_span">
                                            <select name="experience_from_year"  class="experience_from_year js-states form-control" id="from">
                                                @for($i = 2018; $i >= 1900; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </span>
                                        <span class="experience_from_month_span">
                                            <select name="experience_from_month"  class="experience_from_month js-states form-control" id="">
                                                @foreach(\App\Constants\Month::$month as $month)
                                                    <option value="{{ $month }}">{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-6 experience_to_div">
                                    <div class="form-group required">
                                        <label for="to">To</label>
                                        <span class="experience_to_year_span">
                                            <select name="experience_to_year"  class="experience_to_year js-states form-control" id="to">
                                                @for($i = 2018; $i >= 1900; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </span>
                                        <span class="experience_to_month_span">
                                            <select name="experience_to_month"  class="experience_to_month js-states form-control" id="">
                                                @foreach(\App\Constants\Month::$month as $month)
                                                    <option value="{{ $month }}">{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input name="experience_to_present" class="to_present" type="checkbox"> I currently work here
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea maxlength="250" name="experience_description" class="form-control" id="description" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default add-experience-cancel" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success add-experience-submit">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto">
            <h2 class="mb-5">Education</h2>

            <button type="button" class="btn btn-info add-education" data-toggle="modal" data-target="#add-education">Add Education</button>

            <span class="educations-list"></span>

            <div class="modal fade" id="add-education" tabindex="-1" role="dialog" aria-labelledby="add-education">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Education</h4>
                        </div>

                        <div class="modal-body">

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group required">
                                        <label for="school">University</label>
                                        <input name="education_school" type="text" class="form-control" id="school" placeholder="University">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group required">
                                        <label for="degree">Degree</label>
                                        <input name="education_degree" type="text" class="form-control" id="degree" placeholder="Degree">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label for="field_of_study">Field of study</label>
                                        <input name="education_field_of_study" type="text" class="form-control" id="field_of_study" placeholder="Field of study">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label for="grade">Grade</label>
                                        <input name="education_grade" type="text" class="form-control" id="grade" placeholder="Grade">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label for="activities_and_societies">Activities and societies</label>
                                        <textarea maxlength="250" name="education_activities_and_societies" class="form-control" id="activities_and_societies" placeholder="Activities and societies"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <div class="form-group required">
                                        <label for="from">From Year</label>
                                        <select name="education_from_year" class="education_from_year js-states form-control" id="from">
                                            @for($i = 2018; $i >= 1900; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <div class="form-group required">
                                        <label for="to">To Year (or expected)</label>
                                        <select name="education_to_year" class="education_to_year js-states form-control" id="to">
                                            @for($i = 2026; $i >= 1900; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea maxlength="250" name="education_description" class="form-control" id="description" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default add-education-cancel" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success add-education-submit">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
            <h2 class="mb-5">Skills</h2>

            <div class="row">

                <div class="col-xs-4 col-md-4">
                    <div class="form-group required">
                        <label for="skill">Skill</label>
                        <input class="form-control skill-item" id="skill" placeholder="skill" type="text">
                    </div>
                </div>
                <div class="col-xs-4 col-md-4">
                    <div class="form-group">
                        <div style="margin-top: 30px"></div>
                        <button type="button" class="btn btn-info add-skill">Add Skill</button>
                    </div>
                </div>

            </div>

            <div class="subheading mb-3" style="margin-top: 50px">Skill List</div>

            <ul class="fa-ul mb-0 skill-list-ul">

            </ul>

        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
        <div class="my-auto">
            <h2 class="mb-5">Interests</h2>

            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group">
                        <label for="interests">Interests</label>
                        <asiaa rows="10" name="interests" class="form-control" id="interests" placeholder="Interests"></asiaa>
                    </div>
                </div>
            </div>

        </div>
    </section>.en

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">
        <div class="m-auto">
            <h2 class="mb-5">Awards &amp; Certifications</h2>

            <div class="row">

                <div class="col-xs-4 col-md-4">
                    <div class="form-group required">
                        <label for="award">Awards &amp; Certifications</label>
                        <input class="form-control award-item" id="award" placeholder="Awards &amp; Certifications" type="text">
                    </div>
                </div>
                <div class="col-xs-4 col-md-4">
                    <div class="form-group">
                        <div style="margin-top: 30px"></div>
                        <button type="button" class="btn btn-info add-award">Add Awards &amp; Certifications</button>
                    </div>
                </div>

            </div>

            <div class="subheading mb-3" style="margin-top: 50px">Awards &amp; Certifications List</div>

            <ul class="fa-ul mb-0 award-list-ul">

            </ul>

            <div class="row" style="margin-top: 50px;">

                <input type="submit" class="btn btn-success" value="Submit">

            </div>

        </div>
    </section>

</form>

@stop