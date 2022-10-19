@extends(theme('layouts.master'))
@section('title'){{Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'}} | {{__('frontendmanage.Home')}} @endsection
@section('css') @endsection
@section('js') @endsection

@section('mainContent')
{{--    @foreach($blocks as $block)--}}
{{--        @if($block->id==1)--}}
{{--                <x-home-page-banner :homeContent="$homeContent"/>--}}
{{--        @elseif($block->id==3)--}}
{{--            @if($homeContent->show_category_section==1)--}}
{{--                <x-home-page-category-section :homeContent="$homeContent" :categories="$categories"/>--}}
{{--            @endif--}}
{{--        @elseif($block->id==4)--}}
{{--            @if($homeContent->show_instructor_section==1)--}}
{{--                <x-home-page-instructor-section :homeContent="$homeContent"/>--}}
{{--            @endif--}}
{{--        @elseif($block->id==5)--}}
{{--            @if($homeContent->show_course_section==1)--}}
{{--                <x-home-page-course-section :homeContent="$homeContent"/>--}}
{{--            @endif--}}
{{--        @elseif($block->id==6)--}}
{{--            @if($homeContent->show_best_category_section==1)--}}
{{--                <x-home-page-best-category-section :homeContent="$homeContent" :categories="$categories"/>--}}
{{--            @endif--}}
{{--        @elseif($block->id==7)--}}
{{--            @if($homeContent->show_quiz_section==1)--}}
{{--                <x-home-page-quiz-section :homeContent="$homeContent"/>--}}
{{--            @endif--}}
{{--        @elseif($block->id==8)--}}
{{--            @if($homeContent->show_testimonial_section==1)--}}
{{--                <x-home-page-testimonial-section :homeContent="$homeContent"/>--}}
{{--            @endif--}}
{{--        @elseif($block->id==9)--}}
{{--            @if($homeContent->show_sponsor_section==1)--}}
{{--                <x-home-page-brand-section :homeContent="$homeContent"/>--}}
{{--            @endif--}}
{{--        @elseif($block->id==10)--}}
{{--            @if($homeContent->show_article_section==1)--}}
{{--                <x-home-page-blog-section :homeContent="$homeContent"/>--}}
{{--            @endif--}}
{{--        @elseif($block->id==11)--}}
{{--            @if($homeContent->show_become_instructor_section==1)--}}
{{--                @if(@Settings('instructor_reg') )--}}
{{--                    <x-home-page-become-instructor-section :homeContent="$homeContent"/>--}}
{{--                @endif--}}
{{--            @endif--}}
{{--        @elseif($block->id==16)--}}
{{--            @if($homeContent->show_how_to_buy==1)--}}
{{--                <x-home-page-how-to-buy :homeContent="$homeContent"/>--}}
{{--            @endif--}}
{{--        @elseif($block->id==17)--}}
{{--            @if($homeContent->show_home_page_faq==1)--}}
{{--                <x-home-page-faq :homeContent="$homeContent"/>--}}
{{--            @endif--}}
{{--        @endif--}}
{{--    @endforeach--}}

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="public/img/carousel-1.jpg" alt="" />
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, 0.7)">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">
                                    Best Online Courses
                                </h5>
                                <h1 class="display-3 text-white animated slideInDown">
                                    The Best Online Learning Platform99999999
                                </h1>
                                <p class="fs-5 text-white mb-4 pb-2">
                                    Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elitr.
                                </p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read
                                    More</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="public/img/carousel-2.jpg" alt="" />
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, 0.7)">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">
                                    Best Online Courses
                                </h5>
                                <h1 class="display-3 text-white animated slideInDown">
                                    Get Educated Online From Your Home
                                </h1>
                                <p class="fs-5 text-white mb-4 pb-2">
                                    Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elitr.
                                </p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read
                                    More</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Popular Courses Highlight Start -->
    <section class="cources_highlight">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="latest_blog_carousel">
                        <div class="single_item single_item_first">
                            <div class="blog-img">
                                <a href="#" title=""><img src="public/img/features/features_1.jpg" alt=""
                                                          class="img-fluid" /></a>
                            </div>
                            <div class="blog_title">
                                <span>Lingualise</span>
                                <h3>
                                    <a href="#" title="">Your Skills</a>
                                </h3>
                                <p>
                                    With classes available from essentials to professional level, you can choose the level that works best for you.
                                </p>
                            </div>
                        </div>

                        <div class="single_item single_item_center">
                            <div class="blog-img">
                                <a href="#" title=""><img src="public/img/features/features_2.jpg" alt=""
                                                          class="img-fluid" /></a>
                            </div>
                            <div class="blog_title">
                                <span>Learn</span>
                                <h3>
                                    <a href="#" title="">Live and Online</a>
                                </h3>
                                <p>
                                    Our online classes are live, from 60-90 minute long lessons with experienced Linguists.
                                </p>
                            </div>
                        </div>

                        <div class="single_item single_item_last">
                            <div class="blog-img">
                                <a href="#" title=""><img src="public/img/features/features_3.jpg" alt=""
                                                          class="img-fluid" /></a>
                            </div>
                            <div class="blog_title">
                                <span>Classes</span>
                                <h3>
                                    <a href="#" title="">Group or Private</a>
                                </h3>
                                <p>
                                    Learn in small groups of 7-12 students or in 1-on-1 private coaching for extra intensity.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Courses Highlight End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="public/img/about.jpg" alt="" style="object-fit: cover" />
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">
                        About Us
                    </h6>
                    <h1 class="mb-4">Welcome to eLEARNING</h1>
                    <p class="mb-4">
                        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.
                    </p>
                    <p class="mb-4">
                        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                    </p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0">
                                <i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0">
                                <i class="fa fa-arrow-right text-primary me-2"></i>Online Classes
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0">
                                <i class="fa fa-arrow-right text-primary me-2"></i>International Certificate
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0">
                                <i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0">
                                <i class="fa fa-arrow-right text-primary me-2"></i>Online Classes
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0">
                                <i class="fa fa-arrow-right text-primary me-2"></i>International Certificate
                            </p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Intro Start -->
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <h1 class="mb-4 ps-4">Why is Lingua right for me?</h1>
            <div class="row justify-content-center align-items-center my-5">
                <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s" ">
                <div class=" px-4 ">
                    <h4 class="text-primary ">
                        Flexible Fixtures
                    </h4>
                    <p>
                        We offer 550k classes per year. That means
                        over 60 classes start every hour around the
                        clock.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-3 wow zoomIn ">
                <img class="img-fluid rounded " src="public/img/intro/courses.png " alt="courses " />
            </div>
        </div>
        <div class="row justify-content-center align-items-center my-5 ">
            <div class="col-12 col-md-6 wow fadeInUp order-md-2 " data-wow-delay="0.1s ">
                <div class="px-4 ">
                    <h4 class="text-primary ">
                        Professional Teachers
                    </h4>
                    <p>
                        Our native-level teachers are located
                        worldwide so you get to know cultural
                        differences in a language.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-3 wow zoomIn order-md-1 ">
                <img class="img-fluid rounded " src="public/img/intro/teacher.png " alt="courses " />
            </div>
        </div>
        <div class="row justify-content-center align-items-center my-5 ">
            <div class="col-12 col-md-6 wow fadeInUp " data-wow-delay="0.1s "">
            <div class=" px-4">
                <h4 class="text-primary">
                    Hit the road confidently
                </h4>
                <p>
                    Trainers will mainly train your brain on market-oriented contents so you get comfy with the market requirements and get ready to start your professional career.
                </p>
            </div>
        </div>
        <div class="col-12 col-md-3 wow zoomIn">
            <img class="img-fluid rounded" src="public/img/intro/marketing.png" alt="courses" />
        </div>
    </div>
    </div>
    </div>
    <!-- Intro End -->

    <!-- How Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">
                    Learn
                </h6>
                <h1 class="mb-5">How does Lingua work?</h1>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="p-4">
                        <img class="img-fluid" src="public/img/learn/time.png" alt="time to practice">
                    </div>
                    <div class="pt-4 px-1">
                        <h4 class="text-primary mb-4">Time to Practice</h4>
                        <p>Our classes are learner-centric designed, so you have time to learn and practice.</p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="p-4">
                        <img class="img-fluid" src="public/img/learn/feedback.png" alt="feedback">
                    </div>
                    <div class="pt-4 px-1">
                        <h4 class="text-primary mb-4">Receive Personalized Feedback</h4>
                        <p>The best way to learn is from your mistakes. Maximize each lesson with customized feedback from your trainers.</p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="p-4">
                        <img class="img-fluid" src="public/img/learn/skills.png" alt="skills">
                    </div>
                    <div class="pt-4 px-1">
                        <h4 class="text-primary mb-4">Discover More Skills</h4>
                        <p>Train your brain on real-life interactions with access to over 1000 certified trainers & counterparts.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How End -->

    <!-- Steps Start -->
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5 ps-4">How to get started learning?</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 wow fadeInUp py-2" data-wow-delay="0.1s">
                    <h4 class="mb-2">
                        Step One: Sign Up to Lingua
                    </h4>
                    <p class="ps-2">
                        <i class="fas fa-check pe-2 text-primary"></i> Select your course that match your profession goals
                    </p>
                </div>
                <div class="col-md-4 wow fadeInUp py-2" data-wow-delay="0.1s">
                    <h4 class="mb-2">
                        Step Two: Book Your Fixtures
                    </h4>
                    <p class="ps-2">
                        <i class="fas fa-check pe-2 text-primary"></i> Select the day & time that suits your availability
                    </p>
                </div>
                <div class="col-md-4 wow fadeInUp py-2" data-wow-delay="0.1s">
                    <h4 class="mb-2">
                        Step Three: Start Learning NOW
                    </h4>
                    <p class="ps-2">
                        <i class="fas fa-check pe-2 text-primary"></i> Prepare for your class by downloading the course outline in advance.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Steps End -->

    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">
                    Categories
                </h6>
                <h1 class="mb-5">Courses Categories</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="public/img/cat-1.jpg" alt="" />
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                     style="margin: 1px">
                                    <h5 class="m-0">Web Design</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="public/img/cat-2.jpg" alt="" />
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                     style="margin: 1px">
                                    <h5 class="m-0">Graphic Design</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="public/img/cat-3.jpg" alt="" />
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                     style="margin: 1px">
                                    <h5 class="m-0">Video Editing</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="public/img/cat-4.jpg" alt=""
                             style="object-fit: cover" />
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                             style="margin: 1px">
                            <h5 class="m-0">Online Marketing</h5>
                            <small class="text-primary">49 Courses</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->

    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">
                    Courses
                </h6>
                <h1 class="mb-5">Popular Courses</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="public/img/course-1.jpg" alt="" />
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px">Read More</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">$149.00</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4">
                                Web Design & Development Course for Beginners
                            </h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="public/img/course-2.jpg" alt="" />
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px">Read More</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">$149.00</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4">
                                Web Design & Development Course for Beginners
                            </h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="public/img/course-3.jpg" alt="" />
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px">Read More</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">$149.00</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4">
                                Web Design & Development Course for Beginners
                            </h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Students</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">
                    Instructors
                </h6>
                <h1 class="mb-5">Expert Instructors</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="public/img/team-1.jpg" alt="" />
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="public/img/team-2.jpg" alt="" />
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="public/img/team-3.jpg" alt="" />
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="public/img/team-4.jpg" alt="" />
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">
                    Testimonial
                </h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="public/img/testimonial-1.jpg" style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="public/img/testimonial-2.jpg" style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="public/img/testimonial-3.jpg" style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="public/img/testimonial-4.jpg" style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
