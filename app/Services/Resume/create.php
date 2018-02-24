<?php

namespace App\Services\Resume;

use App\Services\Token\Token;

class create
{
    private $AwardRepository;
    private $EducationRepository;
    private $ExperienceRepository;
    private $InformationRepository;
    private $InterestRepository;
    private $SkillRepository;
    private $UserRepository;
    private $ResumeRepository;

    public function __construct()
    {
        $this->AwardRepository = app(\App\Repositories\AwardRepository::class);
        $this->EducationRepository = app(\App\Repositories\EducationRepository::class);
        $this->ExperienceRepository = app(\App\Repositories\ExperienceRepository::class);
        $this->InformationRepository = app(\App\Repositories\InformationRepository::class);
        $this->InterestRepository = app(\App\Repositories\InterestRepository::class);
        $this->SkillRepository = app(\App\Repositories\SkillRepository::class);
        $this->UserRepository = app(\App\Repositories\UserRepository::class);
        $this->ResumeRepository = app(\App\Repositories\ResumeRepository::class);
    }

    public function create($request, $userId)
    {
        $error = array();

        if (!$request->get('email')) {
            $error[] = 'email is required';

            return view('resume.main')->withErrors($error);
        }

        if (!$request->get('first_name'))
            $error[] = 'first name is required';
        if (!$request->get('last_name'))
            $error[] = 'last name is required';
        if (!$request->get('cellphone'))
            $error[] = 'cellphone is required';
        if (!$request->get('country'))
            $error[] = 'country is required';
        if (!$request->get('address'))
            $error[] = 'address is required';
        if (!$request->get('about'))
            $error[] = 'about is required';


        if ($error) {
            return view('resume.main')->withErrors($error);
        }


        $resume = $this->ResumeRepository->model->newInstance();
        $resume->user_id = $userId;
        $resume->save();

        $resumeId = $resume->id;

        $information = $this->InformationRepository->model->newInstance();
        $information->first_name = $request->get('first_name');
        $information->middle_name = $request->get('middle_name');
        $information->last_name = $request->get('last_name');
        $information->email = $request->get('email');
        $information->cellphone = $request->get('cellphone');
        $information->phone = $request->get('phone');
        $information->country = $request->get('country');
        $information->province = $request->get('province');
        $information->city = $request->get('city');
        $information->address = $request->get('address');
        $information->about = $request->get('about');

        $token = new Token();

        $filename = $token->getToken(4, false, false, true) . "_" . $token->getToken(8, true, false, true) . "_" . time();

        $path = public_path() . '/images/';

        if ($request->file('image')) {

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageRealPath = $image->getRealPath();

            $img = \Image::make($imageRealPath);

            //$images->crop(600, 600);
            $img->fit(400);
            $img->resize(intval(200), null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($path . $filename . "." . $extension);
            $pathImage = $filename . "." . $extension;
            $information->image = $pathImage;
        }
        $information->resume_id = $resumeId;
        $information->save();


        if ($request->get('t_experience_title')) {

            foreach ($request->get('t_experience_title') as $key => $value) {

                $experience = $this->ExperienceRepository->model->newInstance();
                $experience->experience_title = $request->get('t_experience_title')[$key];
                $experience->experience_company = $request->get('t_experience_company')[$key];
                $experience->experience_location = $request->get('t_experience_location')[$key];
                $experience->experience_from_year = $request->get('t_experience_from_year')[$key];
                $experience->experience_from_month = $request->get('t_experience_from_month')[$key];
                $experience->experience_to_year = $request->get('t_experience_to_year')[$key];
                $experience->experience_to_month = $request->get('t_experience_to_month')[$key];
                $experience->experience_to_present = $request->get('t_experience_to_present')[$key];
                $experience->experience_description = $request->get('t_experience_description')[$key];
                $experience->resume_id = $resumeId;
                $experience->save();

            }

        }


        if ($request->get('t_education_school')) {

            foreach ($request->get('t_education_school') as $key => $value) {

                $education = $this->EducationRepository->model->newInstance();
                $education->education_school = $request->get('t_education_school')[$key];
                $education->education_degree = $request->get('t_education_degree')[$key];
                $education->education_field_of_study = $request->get('t_education_field_of_study')[$key];
                $education->education_grade = $request->get('t_education_grade')[$key];
                $education->education_activities_and_societies = $request->get('t_education_activities_and_societies')[$key];
                $education->education_from_year = $request->get('t_education_from_year')[$key];
                $education->education_to_year = $request->get('t_education_to_year')[$key];
                $education->education_description = $request->get('t_education_description')[$key];
                $education->resume_id = $resumeId;
                $education->save();

            }

        }


        if ($request->get('skills')) {

            foreach ($request->get('skills') as $value) {
                $skill = $this->SkillRepository->model->newInstance();
                $skill->skill = $value;
                $skill->resume_id = $resumeId;
                $skill->save();
            }

        }

        if ($request->get('interests')) {
            $interest = $this->InterestRepository->model->newInstance();
            $interest->interest = $request->get('interests');
            $interest->resume_id = $resumeId;
            $interest->save();
        }


        if ($request->get('awards')) {

            foreach ($request->get('awards') as $value) {
                $award = $this->AwardRepository->model->newInstance();
                $award->award = $value;
                $award->resume_id = $resumeId;
                $award->save();
            }

        }

        return true;
    }

}