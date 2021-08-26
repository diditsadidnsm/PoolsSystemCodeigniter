<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="" class="w-6" src="<?= base_url('/images/logo/pools_logo.png') ?>">
            <span class="text-white text-lg ml-3"> Pools<span class="font-medium"> Admin</span> </span>
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-2 py-5 hidden">
        <li>
            <a href="<?= base_url('/administrator/dashboard') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">&nbsp; Dashboard </div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="<?= base_url('/administrator/memberdata') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title">&nbsp; Member Data </div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('/administrator/memberverify') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                <div class="side-menu__title">&nbsp; Member KYC </div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('/administrator/memberwithdrawal') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="user-plus"></i> </div>
                <div class="side-menu__title">&nbsp; Withdrawal Request </div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="<?= base_url('/administrator/historywithdrawal') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="shopping-bag"></i> </div>
                <div class="side-menu__title">&nbsp; History Withdrawal </div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('/administrator/historydeposit') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="shopping-cart"></i> </div>
                <div class="side-menu__title">&nbsp; History Deposit </div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="<?= base_url('/administrator/slider') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="maximize-2"></i> </div>
                <div class="side-menu__title">&nbsp; Slider Image </div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('/administrator/popup') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="minimize-2"></i> </div>
                <div class="side-menu__title">&nbsp; Popup Image </div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('/administrator/addnews') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title">&nbsp; News Text </div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('/administrator/buttonaccess') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="toggle-left"></i> </div>
                <div class="side-menu__title">&nbsp; Button Access </div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('/administrator/addfaq') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="help-circle"></i> </div>
                <div class="side-menu__title">&nbsp; FAQ </div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="<?= base_url('/administrator/problemsupport') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="alert-triangle"></i> </div>
                <div class="side-menu__title">&nbsp; Problem Support </div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="<?= base_url('/administrator/theme') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="copy"></i> </div>
                <div class="side-menu__title">&nbsp; Theme Setting </div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('/logout') ?>" class="menu">
                <div class="side-menu__icon"> <i data-feather="log-out"></i> </div>
                <div class="side-menu__title">&nbsp; Sign Out </div>
            </a>
        </li>
    </ul>
</div>
<div class="top-bar-boxed border-b border-theme-2 -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
    <div class="h-full flex items-center">
        <!-- BEGIN: Logo -->
        <a href="" class="-intro-x hidden md:flex">
            <img alt="" class="w-6" src="<?= base_url('/images/logo/pools_logo.png') ?>">
            <span class="text-white text-lg ml-3"> Pools<span class="font-medium"> Admin</span> </span>
        </a>
        <div class="-intro-x breadcrumb mr-auto"> <a href="<?= base_url('/administrator/dashboard') ?>">Dashboard</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active"><?= $title ?></a> </div>

        <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
                <input type="text" class="search__input form-control dark:bg-dark-1 border-transparent placeholder-theme-8" placeholder="Search...">
                <i data-feather="search" class="search__icon dark:text-gray-300"></i>
            </div>
            <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon dark:text-gray-300"></i> </a>
            <div class="search-result">
                <div class="search-result__content">
                    <div class="search-result__content__title">Pages</div>
                    <div class="mb-5">
                        <a href="<?= base_url('/administrator/dashboard') ?>" class="flex items-center">
                            <div class="w-8 h-8 bg-theme-29 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="home"></i> </div>
                            <div class="ml-3">Dashboard</div>
                        </a>
                        <a href="<?= base_url('/administrator/memberdata') ?>" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-30 text-theme-24 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="users"></i> </div>
                            <div class="ml-3">Member Data</div>
                        </a>
                        <a href="<?= base_url('/administrator/memberverify') ?>" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-31 text-theme-26 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="user-check"></i> </div>
                            <div class="ml-3">Member KYC</div>
                        </a>
                        <a href="<?= base_url('/administrator/memberwithdrawal') ?>" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-29 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="user-plus"></i> </div>
                            <div class="ml-3">Withdrawal Request</div>
                        </a>
                        <a href="<?= base_url('/administrator/historywithdrawal') ?>" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-30 text-theme-24 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="shopping-bag"></i> </div>
                            <div class="ml-3">History Withdrawal</div>
                        </a>
                        <a href="<?= base_url('/administrator/historydeposit') ?>" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-31 text-theme-26 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="shopping-cart"></i> </div>
                            <div class="ml-3">History Deposit</div>
                        </a>
                        <a href="<?= base_url('/administrator/slider') ?>" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-29 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="maximize-2"></i> </div>
                            <div class="ml-3">Slider Image</div>
                        </a>
                        <a href="<?= base_url('/administrator/popup') ?>" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-30 text-theme-24 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="minimize-2"></i> </div>
                            <div class="ml-3">Popup Image</div>
                        </a>
                        <a href="<?= base_url('/administrator/addnews') ?>" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-31 text-theme-26 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="file-text"></i> </div>
                            <div class="ml-3">News Text</div>
                        </a>
                        <a href="<?= base_url('/administrator/buttonaccess') ?>" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-30 text-theme-24 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="toggle-left"></i> </div>
                            <div class="ml-3">Button Access</div>
                        </a>
                        <a href="<?= base_url('/administrator/addfaq') ?>" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-29 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="help-circle"></i> </div>
                            <div class="ml-3">FAQ</div>
                        </a>
                        <a href="<?= base_url('/administrator/problemsupport') ?>" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-30 text-theme-24 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="alert-triangle"></i> </div>
                            <div class="ml-3">Problem Support</div>
                        </a>
                        <a href="<?= base_url('/administrator/theme') ?>" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-31 text-theme-26 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="copy"></i> </div>
                            <div class="ml-3">Theme Setting</div>
                        </a>
                    </div>
                    <div class="search-result__content__title">Shortcut</div>
                    <a href="<?= base_url('/administrator/slider/create') ?>" class="flex items-center">
                        <div class="w-8 h-8 bg-theme-29 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="image"></i> </div>
                        <div class="ml-3">Create New Slider</div>
                    </a>
                    <a href="<?= base_url('/administrator/popup/create') ?>" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-theme-30 text-theme-24 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="image"></i> </div>
                        <div class="ml-3">Create New Popup</div>
                    </a>
                    <a href="<?= base_url('/administrator/addfaq/create') ?>" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-theme-31 text-theme-26 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="edit"></i> </div>
                        <div class="ml-3">Create New FAQ</div>
                    </a>
                </div>
            </div>
        </div>
        <!-- END: Search -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false">
                <img alt="Photo profile administrator" src="https://i.stack.imgur.com/l60Hf.png">
            </div>
            <div class="dropdown-menu w-56">
                <div class="dropdown-menu__content box bg-theme-11 dark:bg-dark-6 text-white">
                    <div class="p-4 border-b border-theme-12 dark:border-dark-3">
                        <div class="font-medium"><?= $this->session->userdata('name') ?></div>
                        <div class="text-xs text-theme-13 mt-0.5 dark:text-gray-600"><?= $this->session->userdata('email') ?></div>
                    </div>
                    <div class="p-2 border-t border-theme-12 dark:border-dark-3">
                        <a href="<?= base_url('/logout') ?>" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
<!-- END: Top Bar -->
<div class="wrapper">
    <div class="wrapper-box">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <ul>
                <li>
                    <a href="<?= base_url('/administrator/dashboard') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>
                </li>
                <li class="side-nav__devider my-6"></li>
                <li>
                    <a href="<?= base_url('/administrator/memberdata') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title"> Member Data </div>
                    </a>
                </li>
<!--                <li>-->
<!--                    <a href="--><?//= base_url('/administrator/membernetworks') ?><!--" class="side-menu">-->
<!--                        <div class="side-menu__icon"> <i data-feather="user-x"></i> </div>-->
<!--                        <div class="side-menu__title"> Member Networks </div>-->
<!--                    </a>-->
<!--                </li>-->
                <li>
                    <a href="<?= base_url('/administrator/memberverify') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                        <div class="side-menu__title"> Member KYC </div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/administrator/memberwithdrawal') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="user-plus"></i> </div>
                        <div class="side-menu__title"> Withdrawal Request </div>
                    </a>
                </li>
                <li class="side-nav__devider my-6"></li>
                <li>
                    <a href="<?= base_url('/administrator/historywithdrawal') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="shopping-bag"></i> </div>
                        <div class="side-menu__title"> History Withdrawal </div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/administrator/historydeposit') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="shopping-cart"></i> </div>
                        <div class="side-menu__title"> History Deposit </div>
                    </a>
                </li>
                <li class="side-nav__devider my-6"></li>
                <li>
                    <a href="<?= base_url('/administrator/slider') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="maximize-2"></i> </div>
                        <div class="side-menu__title"> Slider Image </div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/administrator/popup') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="minimize-2"></i> </div>
                        <div class="side-menu__title"> Popup Image </div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/administrator/addnews') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                        <div class="side-menu__title"> News Text </div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/administrator/buttonaccess') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="toggle-left"></i> </div>
                        <div class="side-menu__title"> Button Access </div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/administrator/addfaq') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="help-circle"></i> </div>
                        <div class="side-menu__title"> FAQ </div>
                    </a>
                </li>
                <li class="side-nav__devider my-6"></li>
                <li>
                    <a href="<?= base_url('/administrator/problemsupport') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="alert-triangle"></i> </div>
                        <div class="side-menu__title"> Problem Support </div>
                    </a>
                </li>
                <li class="side-nav__devider my-6"></li>
                <li>
                    <a href="<?= base_url('/administrator/theme') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="copy"></i> </div>
                        <div class="side-menu__title"> Theme Setting </div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/logout') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="log-out"></i> </div>
                        <div class="side-menu__title"> Sign Out </div>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- END: Side Menu -->