<?php

namespace App\Services\Resume;

class show
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

    public function show($userId)
    {

        $resumeId = $this->ResumeRepository->findUser($userId);


        $information = $this->InformationRepository->model->where('resume_id', $resumeId)->first();
        $experiences = $this->ExperienceRepository->model->where('resume_id', $resumeId)->get();
        $educations = $this->EducationRepository->model->where('resume_id', $resumeId)->get();
        $skills = $this->SkillRepository->model->where('resume_id', $resumeId)->get();
        $interest = $this->InterestRepository->model->where('resume_id', $resumeId)->first();
        $awards = $this->AwardRepository->model->where('resume_id', $resumeId)->get();

        return [
            'information' => $information,
            'experiences' => $experiences,
            'educations' => $educations,
            'skills' => $skills,
            'interest' => $interest,
            'awards' => $awards
        ];

    }

}