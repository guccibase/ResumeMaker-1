@extends('layouts.resume')
@section('title')
    Resueme
@stop
@section('content')

    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
            <h1 class="mb-0">{{ $res['information']->first_name }} {{ $res['information']->middle_name }}
                <span class="text-primary">{{ $res['information']->last_name }}</span>
            </h1>
            <div class="subheading mb-5">
                {{ $res['information']->address }},
                @if($res['information']->city)
                    {{ $res['information']->city }},
                @endif
                @if( $res['information']->province )
                    {{ $res['information']->province }},
                @endif
                {{ $res['information']->country }} -
                {{ $res['information']->cellphone }}
                @if( $res['information']->phone )
                    , {{ $res['information']->phone }}
                @endif
                <a href="mailto:name@email.com">{{ $res['information']->email }}</a>
            </div>
            <p class="mb-5">{{ $res['information']->about }}</p>
        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
            <h2 class="mb-5">Experience</h2>

            @foreach($res['experiences'] as $experiences)

                <div class="resume-item d-flex flex-column flex-md-row mb-5">
                    <div class="resume-content mr-auto">
                        <h3 class="mb-0">{{ $experiences->experience_title }}</h3>
                        <h3 class="mb-0">{{ $experiences->experience_location }}</h3>
                        <div class="subheading mb-3">{{ $experiences->experience_company }}</div>
                        <p>{{ $experiences->experience_description }}</p>
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary">
                            {{ $experiences->experience_from_month }} {{ $experiences->experience_from_year }} -
                            @if($experiences->experience_to_present)
                                Present
                            @else
                                {{ $experiences->experience_to_month }} {{ $experiences->experience_to_year }} -
                            @endif
                        </span>
                    </div>
                </div>

            @endforeach

        </div>

    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto">
            <h2 class="mb-5">Education</h2>

            @foreach($res['educations'] as $educations)

                <div class="resume-item d-flex flex-column flex-md-row mb-5">
                    <div class="resume-content mr-auto">
                        <h3 class="mb-0">{{ $educations->education_school }}</h3>
                        <div class="subheading mb-3">{{ $educations->education_degree }}</div>
                        <div>{{ $educations->education_field_of_study }}</div>
                        @if($educations->education_grade)
                            <p>GPA: {{ $educations->education_grade }}</p>
                        @endif
                        @if($educations->education_activities_and_societies)
                            <p>{{ $educations->education_activities_and_societies }}</p>
                        @endif
                        @if($educations->education_description)
                            <p>{{ $educations->education_description }}</p>
                        @endif
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary">{{ $educations->education_from_year }}
                            - {{ $educations->education_to_year }}</span>
                    </div>
                </div>

            @endforeach

        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
            <h2 class="mb-5">Skills</h2>

            <ul class="fa-ul mb-0">
                @foreach($res['skills'] as $skill)
                    <li>
                        <i class="fa-li fa fa-check"></i>
                        {{ $skill->skill }}
                    </li>

                @endforeach

            </ul>
        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
        <div class="my-auto">
            <h2 class="mb-5">Interests</h2>
            <p>{{ $res['interest'] }}</p>
        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">
        <div class="my-auto">
            <h2 class="mb-5">Awards &amp; Certifications</h2>
            <ul class="fa-ul mb-0">
                @foreach($res['awards'] as $awards)
                <li>
                    <i class="fa-li fa fa-trophy text-warning"></i>
                    {{ $awards->award }}
                </li>
                @endforeach

            </ul>

            <div class="row" style="margin-top: 50px;">

                <a href="{{ route('main.pdf') }}" target="_blank" class="btn btn-success">Export PDF</a>

            </div>
        </div>
    </section>


@stop