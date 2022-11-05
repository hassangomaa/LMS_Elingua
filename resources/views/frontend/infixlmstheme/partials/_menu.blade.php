<style>
    .header_area .main_menu ul li ul.leftcontrol_submenu {
        left: auto !important;
        right: 100% !important;
    }
</style>
<!-- HEADER::START -->

<header>
                        <!-- header__left__start  -->

                            <div class="logo_img translator-switch">

                                @if(Settings('frontend_language_translation') == 1)
                                    @php
                                        if (auth()->check()){
                                            $currentLang =auth()->user()->language_code;
                                        }else{
                                            $currentLang =app()->getLocale();
                                        }
                                    @endphp
                                    <select name="code" id="language_code" class="nice_Select"
                                            onchange="location = this.value;">
                                        @foreach (getLanguageList() as $key => $language)
                                            <option value="{{route('changeLanguage',$language->code)}}"
                                                    @if ($currentLang == $language->code) selected @endif>{{$language->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                @endif
                            </div>

                        <!-- header__left__start  -->

                            <!-- Navbar Start -->
                            <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
                                <a href="" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                                    <h2 class="m-0 text-primary">
                                        <i class="fa fa-book me-3"></i>Lingua
                                    </h2>
                                </a>
                                <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarCollapse">
                                    <div class="navbar-nav ms-auto p-4 p-lg-0">
                                        <a href="#" class="nav-item nav-link active">Home</a>
                                        <a href="#" class="nav-item nav-link">About</a>
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Courses</a>
                                            <div class="dropdown-menu fade-down m-0">
                                                <a href="#" class="dropdown-item">General Translation Program (GoPro)</a>
                                                <a href="#" class="dropdown-item">Interpretation Diploma</a>
                                                <a href="#" class="dropdown-item">Legal Translation Program</a>
                                                <a href="#" class="dropdown-item">Financial Translation Program</a>
                                                <a href="#" class="dropdown-item">Medical Translation Program</a>
                                            </div>
                                        </div>
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Workshops</a>
                                            <div class="dropdown-menu fade-down m-0">
                                                <a href="#" class="dropdown-item">CAT Tools</a>
                                                <a href="#" class="dropdown-item">Audio-Visual</a>
                                                <a href="#" class="dropdown-item">Localization</a>
                                                <a href="#" class="dropdown-item">Games Translation</a>
                                                <a href="#" class="dropdown-item">Content Writing</a>
                                                <a href="#" class="dropdown-item">Voiceover Workshop</a>
                                            </div>
                                        </div>
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Webinars</a>
                                            <div class="dropdown-menu fade-down m-0">
                                                <a href="#" class="dropdown-item">One</a>
                                                <a href="#" class="dropdown-item">Two</a>
                                            </div>
                                        </div>
                                        <a href="#" class="nav-item nav-link">News</a>
                                        <a href="{{route('courses')}}" class="nav-item nav-link">Enroll Course</a>
                                    </div>
                                    <!-- header__right_start  -->
                                    @auth()
                                        <div class="header__right login_user">
                                            <div class="profile_info collaps_part">
                                                <div class="profile_img collaps_icon     d-flex align-items-center">
                                                    <div class="studentProfileThumb"
                                                         style="background-image: url('{{getProfileImage(Auth::user()->image)}}')"></div>

                                                    <span class="">{{Auth::user()->name}}
                                                        <br style="display: block">
                                                      <small>
                                                          @if(showEcommerce())
                                                              @if(Auth::user()->role_id==3)
                                                                  @if(Auth::user()->balance==0)
                                                                      {{Settings('currency_symbol') ??'৳'}} 0
                                                                  @else
                                                                      {{getPriceFormat(Auth::user()->balance)}}
                                                                  @endif
                                                              @endif
                                                          @endif
                                                      </small>

                                                    </span>

                                                    </div>
                                                <div class="profile_info_iner collaps_part_content">
                                                    @if(Auth::user()->role_id==3)
                                                        <a href="{{route('studentDashboard')}}">{{__('dashboard.Dashboard')}}</a>
                                                        <a href="{{route('myProfile')}}">{{__('frontendmanage.My Profile')}}</a>
                                                        <a href="{{route('myAccount')}}">{{__('frontend.Account Settings')}}</a>
                                                        @if(isModuleActive('Affiliate') && auth()->user()->affiliate_request!=1)
                                                            <a href="{{routeIsExist('affiliate.users.request')?route('affiliate.users.request'):''}}">{{__('frontend.Join Affiliate Program')}}</a>
                                                        @endif
                                                    @else
                                                        <a href="{{route('dashboard')}}">{{__('dashboard.Dashboard')}}</a>
                                                        <a href="{{route('changePassword')}}">{{__('frontendmanage.My Profile')}}</a>
                                                    @endif
                                                    @if(isModuleActive('UserType'))
                                                        @foreach(auth()->user()->userRoles as $role)
                                                            @php
                                                                if ($role->id==auth()->user()->role_id){
                                                                    continue;
                                                                }
                                                            @endphp
                                                            <a href="{{route('usertype.changePanel',$role->id)}}">
                                                                {{__('common.Switch to')}} {{$role->name}}
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                    <a href="{{route('logout')}}">{{__('frontend.Log Out')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endauth
                                    @guest()
                                        <a href="{{url('login')}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i
                                                class="fa fa-arrow-right ms-3"></i> </a>
                                    @endguest

                                </div>
                            </nav>
                            <!-- Navbar End -->


                        <!-- header__right_end  -->
</header>

@if(Settings('show_cart')==1)
    <a href="#" class="float notification_wrapper">
        <div class="notify_icon cart_store" style="padding-top: 7px">
            <img style="max-width: 30px;" src="{{asset('/public/frontend/infixlmstheme/')}}/img/svg/cart_white.svg"
                 alt="">
        </div>
        <span class="notify_count">{{@cartItem()}}</span>
    </a>
@endif
<!--/ HEADER::END -->

