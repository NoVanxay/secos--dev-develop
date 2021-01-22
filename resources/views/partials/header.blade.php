    <header id="header-part">
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact text-lg-left text-center">
                            <ul >
                               <span style="color: white"> <i class="fa fa-phone"></i> 02022618243</span>&nbsp;
                               <span style="color: white"> <i class="fa fa-envelope-o"></i>&nbsp;<a href="mailto:Inthapunya@gmail.com">Inthapunya@gmail.com</span>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header-opening-time text-lg-right text-center">
                            @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                             @auth
                               <a href="{{ url('/admin') }}" class="text-sm text-gray-700 underline">ເຂົ້າໜ້າແອັດມິນ</a>
                              @else
                              <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">ເຂົ້າສູ່ລະບົບ &nbsp;</a>
                             @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm text-gray-700 underline" >&nbsp; ລົງທະບຽນ</a>
                             @endif
                     @endif
                     @endif </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
     <!-- header top -->
        <div class="header-logo-support pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="logo">
                            <a href="{{ url('/') }}" >
                                <img src="{{ URL::to('/frontend/images/logo.png') }}">
                            </a>
                        </div>
                    </div>
                     {{--
                    <div class="col-lg-8 col-md-8">
                        <div class="support-button float-right d-none d-md-block">
                            <div class="support float-left">
                                <div class="icon">
                                    <img src="images/all-icon/support.png" alt="icon">
                                </div>
                              <div class="cont">
                                    <p>Need Help? call us free</p>
                                    <span>321 325 5678</span>
                                </div>
                            </div>
                             <div class="button float-left">
                                <a href="#" class="main-btn">Apply Now</a>
                            </div>
                        </div>
                    </div>  --}}
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header logo support -->

        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="active" href="{{ url('#') }}"> ໜ້າຫຼັກ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('frontend.annoucements.index') }}">
                                            {{ trans('cruds.annoucement.title') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('frontend.policies.index') }}">
                                            {{ trans('cruds.policy.title') }}
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.download.title') }}
                                        </a>
                                        <ul class="sub-menu">
                                            <li>  <a href="{{ route('frontend.textbooks.index') }}">
                                                {{ trans('cruds.textbook.title') }}
                                            </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.manuals.index') }}">
                                                    {{ trans('cruds.manual.title') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.templates.index') }}">
                                                    {{ trans('cruds.template.title') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('frontend.policies.index') }}">
                                            {{ trans('cruds.policy.title') }}
                                        </a>

                                    </li>

                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                {{--   <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <div class="right-icon text-right">
                            <ul>
                                <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>
                            </ul>
                        </div> <!-- right icon -->
                    </div> --}}
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>
