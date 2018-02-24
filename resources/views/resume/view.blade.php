<!DOCTYPE html>
<html lang="en" class="htmlmin">
<head>
    <title>resume maker -  </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="{{ public_path('/assets/css/view.css') }}" rel="stylesheet">

</head>

<body>

    <page size="A4">

        <div class="container" >

            <div class="row">

                <div class="col-md-8">

                    <h2>{{ $information->first_name }} {{ $information->middle_name }} {{ $information->last_name }}</h2>

                    <p style="color: darkgray">{{ $information->email }}</p>
                    <p style="color: darkgray">{{ $information->cellphone }}</p>
                    @if($information->phone) <p style="color: darkgray">{{ $information->phone }}</p> @endif

                </div>


                <div class="col-md-4">@if($information->image) <img style="float: right; position: fixed;margin-right: 2cm; top: -.5cm;" src="{{ public_path('/images/' . $information->image ) }}" alt="" class="img-rounded img-responsive"> @endif</div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p>
                        {{ $information->country }}
                        @if($information->province )
                            - {{ $information->province }}
                        @endif
                        @if($information->city )
                            - {{ $information->city }}
                        @endif
                        - {{ $information->address }}
                    </p>
                </div>
            </div>

            <hr/>

            <div class="row">
                <div class="col-md-12">
                    <h3>About</h3>
                    <p>
                        {{ $information->about }}
                    </p>
                </div>
            </div>

            <hr/>

            @if($experiences && count($experiences))

                <div class="Experience">

                    <h3>Experience</h3>

                    @foreach($experiences as $val)

                        <div class="resume-item d-flex flex-column flex-md-row mb-5">
                            <div class="resume-content mr-auto" style="display: inline-block">
                                <h3 class="mb-0">{{ $val->experience_title }}</h3>
                                <div class="subheading mb-3">{{ $val->experience_company }}</div>
                                @if ($val->experience_location)
                                    <div class="subheading mb-3">{{ $val->experience_location }}</div>
                                @endif
                                @if ($val->experience_description)
                                    <p>{{ $val->experience_description }}</p>
                                @endif
                            </div>
                            <span class="text-primary" style="float: right; margin-right: 4cm; position: relative; display: inline-block;">
                                {{ $val->experience_from_month}} {{ $val->experience_from_year }} -
                                @if ($val->experience_to_present)
                                    Present
                                @else
                                    {{ $val->experience_to_month}}  {{ $val->experience_to_year }}
                                @endif
                            </span>
                        </div>

                    @endforeach

                </div>

                <hr/>

            @endif

            @if($educations && count($educations))

                <div class="Education">

                    <h3>Education</h3>

                    @foreach($educations as $val)

                        <div class="resume-item d-flex flex-column flex-md-row mb-5">
                            <div class="resume-content mr-auto" style="display: inline-block">
                                <h3 class="mb-0">{{ $val->education_school }}</h3>
                                <div class="subheading mb-3">{{ $val->education_degree }}</div>
                                @if ($val->education_field_of_study)
                                    <div class="subheading mb-3">{{ $val->education_field_of_study }}</div>
                                @endif
                                @if ($val->education_grade)
                                    <div class="subheading mb-3">{{ $val->education_grade }}</div>
                                @endif
                                @if ($val->education_activities_and_societies)
                                    <div class="subheading mb-3">{{ $val->education_activities_and_societies }}</div>
                                @endif
                                @if ($val->education_description)
                                    <div class="subheading mb-3">{{ $val->education_description }}</div>
                                @endif

                            </div>
                            <span class="text-primary" style="float: right; margin-right: 4cm; position: relative; display: inline-block;">
                                {{ $val->education_from_year}} - {{ $val->education_to_year }}
                            </span>
                        </div>

                    @endforeach

                </div>

                <hr/>

            @endif

            @if($skills && count($skills))

                <div class="Skills">

                    <h3>Skills</h3>

                    <ul class="fa-ul mb-0 skill-list-ul">
                        @foreach($skills as $val)

                            <li>
                                <i class="fa-li fa fa-check"></i>{{ $val->skill }}
                            </li>

                        @endforeach

                    </ul>

                </div>

                <hr/>

            @endif

            @if($interest)

                <div class="Interests">

                    <h3>Interests</h3>

                    <p>{{ $interest->interest }}</p>

                </div>

                <hr/>

            @endif

            @if($awards && count($awards))

                <div class="Awards">

                    <h3>Awards & Certifications</h3>

                    <ul class="fa-ul mb-0 award-list-ul">

                        @foreach($awards as $val)

                            <li>
                                <i class="fa-li fa fa-trophy text-warning"></i>{{ $val->award }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


        </div>

    </page>


</body>

</html>