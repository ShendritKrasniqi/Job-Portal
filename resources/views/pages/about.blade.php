@extends('layouts.app')

@section('content')

<section class="section-hero overlay inner-page bg-image" style="background-image: url({{ asset('assets/images/hero_1.jpg') }}" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">About Us</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>About Us</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-5 bg-image overlay-primary fixed overlay" id="next-section" style="background-image: url({{ asset('assets/images/hero_1.jpg') }})">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2 text-white">JobBoard Site Stats</h2>
                <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita unde officiis recusandae sequi excepturi corrupti.</p>
            </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">
            <div class="col-6 col-md-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="1930">0</strong>
                </div>
                <span class="caption">Candidates</span>
            </div>

            <div class="col-6 col-md-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="54">0</strong>
                </div>
                <span class="caption">Jobs Posted</span>
            </div>

            <div class="col-6 col-md-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="120">0</strong>
                </div>
                <span class="caption">Jobs Filled</span>
            </div>

            <div class="col-6 col-md-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="550">0</strong>
                </div>
                <span class="caption">Companies</span>
            </div>
        </div>
    </div>
</section>

<section class="site-section" id="about-project">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title mb-3">About This Project</h2>
        </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="image-box">
                    <img src="{{ asset('assets/images/front.png') }}" alt="Front Image" class="image-box-img front">
                    <img src="{{ asset('assets/images/back.png') }}" alt="Back Image" class="image-box-img back">
                </div>
            </div>
            <div class="col-md-6">
                <h3>Project Overview</h3>
                <p>This project is a modern JobBoard platform designed to connect job seekers with employers in an easy and efficient manner. It features user-friendly interfaces, robust functionalities, and a smooth workflow for both applicants and employers.</p>
                <h4>Key Features:</h4>
                <ul>
                    <li>Search and filter job listings based on skills and location.</li>
                    <li>Create and manage profiles for both candidates and employers.</li>
                    <li>Real-time job posting and application updates.</li>
                    <li>Easy-to-use dashboard for tracking job applications.</li>
                </ul>
            </div>
       </div>
    </div>
</section>
<section class="site-section text-center">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-12">
                <h2 class="section-title mb-3">About The Creator</h2>
            </div>
             </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <div class="profile-image-container mb-4">
                        <img src="{{ asset('assets/images/profilepic.jpg') }}" alt="Shendrit Krasniqi" class="card-img-top rounded-circle profile-img">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Shendrit Krasniqi</h3>
                        <p class="text-muted">Fullstack Developer</p>
                        <p class="card-text">I am a passionate and motivated fullstack developer with experience in creating efficient and scalable web applications. I enjoy solving complex problems and delivering user-friendly solutions while continuously learning and adopting new technologies. For more information, feel free to check out my GitHub and LinkedIn profiles below.</p>
                        <div class="about-social-icon mt-4">
                            <a href="https://www.linkedin.com/in/shendrit-krasniqi-a668b8214/" target="_blank" class="mx-2"><span class="icon-linkedin"></span></a>
                            <a href="https://github.com/shendritkrasniqi" target="_blank" class="mx-2"><span class="icon-github"></span></a>
                            <a href="https://shendritkrasniqi.com" target="_blank" class="mx-2"><span class="bi bi-globe2"></span></a>
                        </div>
                    </div>
                </div>
                       </div>
        </div>
    </div>
</section>
@endsection
