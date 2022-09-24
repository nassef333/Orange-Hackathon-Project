<?php
session_start();
if(empty($_SESSION['login']))
    header('Location:pages/login.php');

    if (!file_exists("users/users.php")) include "controller3.php";

    include "users/follow.php";
    include "users/restaurants.php";
    include "users/reels.php";
// echo "<pre>";
// var_dump($_SESSION['login']);
// die;



$userId = $_SESSION['login']['id'];
$userName = $_SESSION['login']['username'];
$userImg = $_SESSION['login']['img'];
$userAbout = $_SESSION['login']['about'];
$followers = showFollowersCount($userId);
$following = showFollowingCount($userId);
$posts = showUserReelsCount($userId);

// echo $userImg;die;












?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>NIGO.ME</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/tiny-slider/dist/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/choices.js/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/vendor/glightbox-master/dist/css/glightbox.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/dropzone/dist/dropzone.css" />
    <link rel="stylesheet" type="text/css" href="assets/vendor/flatpickr/dist/flatpickr.css" />
    <link rel="stylesheet" type="text/css" href="assets/vendor/plyr/plyr.css" />

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GMKQ4P9YMZ"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-GMKQ4P9YMZ');
    </script>

</head>

<body>

    <!-- =======================
Header START -->
    <header class="navbar-light fixed-top header-static bg-mode">

        <!-- Logo Nav START -->
        <nav class="navbar navbar-expand-lg">
            <div class="container" style="padding-top: 5px;">

			</a>
                <!-- Logo END -->

                <!-- Responsive navbar toggler -->


                <!-- Main navbar START -->
                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <!-- Nav Search START -->
                    <div class="nav mt-3 mt-lg-0 flex-nowrap align-items-center px-4 px-lg-0">
                        <div class="nav-item w-100">
                            <form class="rounded position-relative" method="POST">
                                <input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search" name="search">
                                <button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Nav Search END -->


                </div>
                <!-- Main navbar END -->

                <!-- Nav right START -->
                <ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled">
                    

                    <!-- Notification dropdown END -->
                    <li>
                        <a href="pages/reels.php" class="btn btn-primary">REELS</a>
                    </li>
                    <li class="nav-item ms-2 dropdown">
                        <a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-2" src="assets/img/<?=$userImg?>" alt="">
					</a>
                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
                            <!-- Profile info -->
                            <li class="px-3">
                                <div class="d-flex align-items-center position-relative">
                                    <!-- Avatar -->
                                    <div class="avatar me-3">
                                        <img class="avatar-img rounded-circle" src="assets/img/<?=$userImg?>" alt="avatar">
                                    </div>
                                    <div>
                                        <a class="h6 stretched-link" href="#"><?=$userName?></a>
                                        <p class="small m-0"><?=$userAbout?></p>
                                    </div>
                                </div>
                            </li>
                            <!-- Links -->


                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item bg-danger-soft-hover" href="pages/logout.php"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!-- Dark mode switch START -->
                            <li>
                                <div class="modeswitch-wrap" id="">
                                    <div class="modeswitch-item">
                                        <div class="modeswitch-icon"></div>
                                    </div>
                                    <span>Dark mode</span>
                                </div>
                            </li>
                            <!-- Dark mode switch END -->
                        </ul>
                    </li>
                    <!-- Profile START -->

                </ul>
                <!-- Nav right END -->
            </div>
        </nav>
        <!-- Logo Nav END -->
    </header>
    <!-- =======================
Header END -->

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- Container START -->
        <div class="container">
            <div class="row g-4">

                <!-- Sidenav START -->
                <div class="col-lg-3">

                    <!-- Advanced filter responsive toggler START -->
                    <div class="d-flex align-items-center d-lg-none">

                    </div>
                    <!-- Advanced filter responsive toggler END -->

                    <!-- Navbar START-->
                    <nav class="navbar navbar-expand-lg mx-0">
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
                            <!-- Offcanvas header -->
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>

                            <!-- Offcanvas body -->
                            <div class="offcanvas-body d-block px-2 px-lg-0">
                                <!-- Card START -->
                                <div class="card overflow-hidden">
                                    <!-- Cover image -->
                                    <div class="h-50px" style="background: white; background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                    <!-- Card body START -->
                                    <div class="card-body pt-0">
                                        <div class="text-center">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="#!"><img class="avatar-img rounded border border-white border-3" src="assets/img/<?=$userImg?>" alt=""></a>
                                            </div>
                                            <!-- Info -->
                                            <h5 class="mb-0"> <a href="#!"> <?=$userName?></a> </h5>
                                            <small><?=$userAbout?></small>
                                                <br><br>
                                            <!-- User stat START -->
                                            <div class="hstack gap-2 gap-xl-3 justify-content-center">
                                                <!-- User stat item -->
                                                <div>
                                                    <h6 class="mb-0"><?=$posts?></h6>
                                                    <small>Post</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- User stat item -->
                                                <div>
                                                    <h6 class="mb-0"><?=$followers?></h6>
                                                    <small>Followers</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- User stat item -->
                                                <div>
                                                    <h6 class="mb-0"><?=$following?></h6>
                                                    <small>Following</small>
                                                </div>
                                            </div>
                                            <!-- User stat END -->
                                        </div>

                                        <!-- Divider -->
                                        <hr>

                                        <!-- Side Nav START -->
                                        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="assets/img/icon/home-outline-filled.svg" alt=""><span>Feed </span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="assets/img/icon/person-outline-filled.svg" alt=""><span>Connections </span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="assets/img/icon/earth-outline-filled.svg" alt=""><span>Latest News </span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="assets/img/icon/calendar-outline-filled.svg" alt=""><span>Events </span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="assets/img/icon/chat-outline-filled.svg" alt=""><span>Groups </span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="assets/img/icon/notification-outlined-filled.svg" alt=""><span>Notifications </span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="assets/img/icon/cog-outline-filled.svg" alt=""><span>Settings </span></a>
                                            </li>
                                        </ul>
                                        <!-- Side Nav END -->
                                    </div>
                                    <!-- Card body END -->
                                    <!-- Card footer -->

                                </div>
                                <!-- Card END -->

                                <!-- Helper link START -->
                                <ul class="nav small mt-4 justify-content-center lh-1">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" target="_blank" href="#">Support </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" target="_blank" href="#">Docs </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Privacy & terms</a>
                                    </li>
                                </ul>
                                <!-- Helper link END -->
                                <!-- Copyright -->
                                <p class="small text-center mt-1">©2022 <a class="text-body" target="" href=""> all copyrights reseved </a></p>
                            </div>
                        </div>
                    </nav>
                    <!-- Navbar END-->
                </div>
                <!-- Sidenav END -->

                <!-- Main content START -->
                <div class="col-md-8 col-lg-6 vstack gap-4">




                    <!-- Header of Posts -->
                    <div class="card mb-3">
                        <h1 class="p-3">Top Rated Places</h1>
                    </div>

                    <?php


                        // echo "<pre>";
                        // var_dump($restaurants);die;
                        if(isset($_POST['search'])){
                            $restaurants = searchByAdress($_POST['search']);
                            // echo "<pre>";
                            // var_dump($restaurants);die;
                        }
                        else
                            $restaurants = fitchAllRestaurants();
                        
                        foreach ( $restaurants as $restaurant):
                        // echo "<pre>";
                        // var_dump($restaurant);die;

                        $rate = getRating($restaurant[0]);
                        
                    ?>

                        <a href="pages/restaurant.php?id=<?=$restaurant[0]?>">
                        <div class="card mb-3">
                      <img src="assets/img/<?=$restaurant[4]?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?=$restaurant[2]?></h5>
                        <h6 class="text-danger"><?=$restaurant[1]?></h6>
                        <b><span class="text-danger"><?=substr($rate, 0, 3);?><i class="bi bi-star-fill text-warning" style="font-size: 20px;"></i></span></b>

                        <p class="text-success"><?=$restaurant[5]?></p>

                        <p class="card-text text-dark"><?=$restaurant[3]?></p>
                      </div>
                    </div>
                        </a>
                    <?php endforeach; ?>




















                    





































                            












                  

                    <!-- Load more button START -->
                    <a href="#!" role="button" class="btn btn-loader btn-primary-soft" data-bs-toggle="button" aria-pressed="true">
            <span class="load-text"> Load more </span>
            <div class="load-icon">
              <div class="spinner-grow spinner-grow-sm" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          </a>
                    <!-- Load more button END -->

                </div>
                <!-- Main content END -->





































                
                <!-- Right sidebar START -->
                <div class="col-lg-3">
                    <div class="row g-4 scrollbarrr" style="max-height: 800px;overflow-y: auto;">
                        <style>
                            .scrollbarrr::-webkit-scrollbar{
                                width: 5px;
                            }
                        </style>
                        <!-- Card follow START -->
                        <div class="col-sm-6 col-lg-12">
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header pb-0 border-0">
                                    <h5 class="card-title mb-0">Who to follow</h5>
                                </div>
                                <!-- Card header END -->

                                <!-- Card body START -->
                                <div class="card-body">



                                    <!-- Connection item START -->
                                    <?php 
                                    $allUsers = getallUsers();
                                    foreach($allUsers as $user): 
                                    // echo "<pre>";
                                    // var_dump($user);die;
                                    ?>
                                    <div class="hstack gap-2 mb-3">
                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <a href="#!"><img class="avatar-img rounded-circle" src="assets/img/<?=$user[4]?>" alt=""></a>
                                        </div>
                                        <!-- Title -->
                                        <div class="overflow-hidden">
                                            <a class="h6 mb-0" href="#!"><?=$user[1]?></a>
                                            <p class="mb-0 small text-truncate"><?=$user[6]?></p>
                                        </div>
                                        <!-- Button -->
                                        <?php if($user[0] != $_SESSION['login']['id']):?>
                                        <?php if(isFollowed($userId,$user[0])):?>
                                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto bg-primary" href="pages/unfollow.php?id=<?=$user[0]?>"><i class="bi bi-person text-white" style="font-size: 20px;"></i></a>
                                        <?php else:?>
                                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="pages/pressFollow.php?id=<?=$user[0]?>"><i class="fa-solid fa-plus"> </i></a>
                                        <?php endif;?>
                                        <?php endif;?>

                                    </div>
                                    <?php endforeach; ?>
                                    <!-- Connection item END -->


                                    






                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>
                        <!-- Card follow START -->


                    </div>
                </div>
                <!-- Right sidebar END -->

            </div>
            <!-- Row END -->
        </div>
        <!-- Container END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <!-- Main Chat START -->
    <div class="d-none d-lg-block">
        <!-- Button -->
        <a class="icon-md btn btn-primary position-fixed end-0 bottom-0 me-5 mb-5" data-bs-toggle="offcanvas" href="#offcanvasChat" role="button" aria-controls="offcanvasChat">
    <i class="bi bi-chat-left-text-fill"></i>
  </a>
        <!-- Chat sidebar START -->
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasChat">
            <!-- Offcanvas header -->
            <div class="offcanvas-header d-flex justify-content-between">
                <h5 class="offcanvas-title">Messaging</h5>
                <div class="d-flex">
                    <!-- New chat box open button -->
                    <a href="#" class="btn btn-secondary-soft-hover py-1 px-2">
          <i class="bi bi-pencil-square"></i>
        </a>
                    <!-- Chat action START -->
                    <div class="dropdown">
                        <a href="#" class="btn btn-secondary-soft-hover py-1 px-2" id="chatAction" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots"></i>
          </a>
                        <!-- Chat action menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatAction">
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-check-square fa-fw pe-2"></i>Mark all as read</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Chat setting </a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bell fa-fw pe-2"></i>Disable notifications</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-up-fill fa-fw pe-2"></i>Message sounds</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block setting</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-2"></i>Create a group chat</a></li>
                        </ul>
                    </div>
                    <!-- Chat action END -->

                    <!-- Close  -->
                    <a href="#" class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="offcanvas" aria-label="Close">
          <i class="fa-solid fa-xmark"></i>
        </a>

                </div>
            </div>
            <!-- Offcanvas body START -->
            <div class="offcanvas-body pt-0 custom-scrollbar">
                <!-- Search contact START -->
                <form class="rounded position-relative">
                    <input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search" >
                    <button class="btn bg-transparent px-3 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
                </form>
                <!-- Search contact END -->
                <ul class="list-unstyled">

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast">
                        <!-- Avatar -->
                        <div class="avatar status-online">
                            <img class="avatar-img rounded-circle" src="assets/img/avatar/01.jpg" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Frances Guerrero </a>
                            <div class="small text-secondary text-truncate">Frances sent a photo.</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> Just now </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast2">
                        <!-- Avatar -->
                        <div class="avatar status-online">
                            <img class="avatar-img rounded-circle" src="assets/img/avatar/02.jpg" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Lori Ferguson </a>
                            <div class="small text-secondary text-truncate">You missed a call form Carolyn🤙</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 1min </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar status-offline">
                            <img class="avatar-img rounded-circle" src="assets/img/avatar/placeholder.jpg" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Samuel Bishop </a>
                            <div class="small text-secondary text-truncate">Day sweetness why cordially 😊</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 2min </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar">
                            <img class="avatar-img rounded-circle" src="assets/img/avatar/04.jpg" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Dennis Barrett </a>
                            <div class="small text-secondary text-truncate">Happy birthday🎂</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 10min </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar avatar-story status-online">
                            <img class="avatar-img rounded-circle" src="assets/img/avatar/05.jpg" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Judy Nguyen </a>
                            <div class="small text-secondary text-truncate">Thank you!</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 2hrs </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar status-online">
                            <img class="avatar-img rounded-circle" src="assets/img/avatar/06.jpg" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Carolyn Ortiz </a>
                            <div class="small text-secondary text-truncate">Greetings from Webestica.</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 1 day </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="flex-shrink-0 avatar">
                            <ul class="avatar-group avatar-group-four">
                                <li class="avatar avatar-xxs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/06.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xxs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/07.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xxs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/08.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xxs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/09.jpg" alt="avatar">
                                </li>
                            </ul>
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link text-truncate d-inline-block" href="#!">Frances, Lori, Amanda, Lawson </a>
                            <div class="small text-secondary text-truncate">Btw are you looking for job change?</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 4 day </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar status-offline">
                            <img class="avatar-img rounded-circle" src="assets/img/avatar/08.jpg" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Bryan Knight </a>
                            <div class="small text-secondary text-truncate">if you are available to discuss🙄</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 6 day </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar">
                            <img class="avatar-img rounded-circle" src="assets/img/avatar/09.jpg" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Louis Crawford </a>
                            <div class="small text-secondary text-truncate">🙌Congrats on your work anniversary!</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 1 day </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar status-online">
                            <img class="avatar-img rounded-circle" src="assets/img/avatar/10.jpg" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Jacqueline Miller </a>
                            <div class="small text-secondary text-truncate">No sorry, Thanks.</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 15, dec </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar">
                            <img class="avatar-img rounded-circle" src="assets/img/avatar/11.jpg" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Amanda Reed </a>
                            <div class="small text-secondary text-truncate">Interested can share CV at.</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 18, dec </div>
                    </li>

                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar status-online">
                            <img class="avatar-img rounded-circle" src="assets/img/avatar/12.jpg" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="#!">Larry Lawson </a>
                            <div class="small text-secondary text-truncate">Hope you're doing well and Safe.</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> 20, dec </div>
                    </li>
                    <!-- Button -->
                    <li class="mt-3 d-grid">
                        <a class="btn btn-primary-soft" href="messaging.html"> See all in messaging </a>
                    </li>

                </ul>
            </div>
            <!-- Offcanvas body END -->
        </div>
        <!-- Chat sidebar END -->

        <!-- Chat END -->

        <!-- Chat START -->
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container toast-chat d-flex gap-3 align-items-end">

                <!-- Chat toast START -->
                <div id="chatToast" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header bg-mode">
                        <!-- Top avatar and status START -->
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar me-2">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 mt-1">Frances Guerrero</h6>
                                    <div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <!-- Call button -->
                                <div class="dropdown">
                                    <a class="btn btn-secondary-soft-hover py-1 px-2" href="#" id="chatcoversationDropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
                                    </ul>
                                </div>
                                <!-- Card action END -->
                                <a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="#collapseChat" aria-expanded="false" aria-controls="collapseChat"><i class="bi bi-dash-lg"></i></a>
                                <button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>
                        <!-- Top avatar and status END -->

                    </div>
                    <div class="toast-body collapse show" id="collapseChat">
                        <!-- Chat conversation START -->
                        <div class="chat-conversation-content custom-scrollbar h-200px">
                            <!-- Chat time -->
                            <div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
                                            <div class="small my-2">6:15 AM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
                                            <!-- Files START -->
                                            <!-- Files END -->
                                            <div class="small my-2">12:16 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
                                            <div class="small my-2">3:22 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
                                        <!-- Images -->
                                        <div class="d-flex my-2">
                                            <div class="small text-secondary">5:35 PM</div>
                                            <div class="small ms-2"><i class="fa-solid fa-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat time -->
                            <div class="text-center small my-2">2 New Messages</div>
                            <!-- Chat Typing -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-3 rounded-2">
                                                <div class="typing d-flex align-items-center">
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat conversation END -->
                        <!-- Chat bottom START -->
                        <div class="mt-2">
                            <!-- Chat textarea -->
                            <textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
                            <!-- Button -->
                            <div class="d-sm-flex align-items-end mt-2">
                                <button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
                                <button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
                                <button class="btn btn-sm btn-success-soft me-2"> Gif </button>
                                <button class="btn btn-sm btn-primary ms-auto"> Send </button>
                            </div>
                        </div>
                        <!-- Chat bottom START -->
                    </div>
                </div>
                <!-- Chat toast END -->

                <!-- Chat toast 2 START -->
                <div id="chatToast2" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header bg-mode">
                        <!-- Top avatar and status START -->
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar me-2">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/02.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 mt-1">Lori Ferguson</h6>
                                    <div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <!-- Call button -->
                                <div class="dropdown">
                                    <a class="btn btn-secondary-soft-hover py-1 px-2" href="#" id="chatcoversationDropdown2" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown2">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
                                    </ul>
                                </div>
                                <!-- Card action END -->
                                <a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="#collapseChat2" role="button" aria-expanded="false" aria-controls="collapseChat2"><i class="bi bi-dash-lg"></i></a>
                                <button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>
                        <!-- Top avatar and status END -->

                    </div>
                    <div class="toast-body collapse show" id="collapseChat2">
                        <!-- Chat conversation START -->
                        <div class="chat-conversation-content custom-scrollbar h-200px">
                            <!-- Chat time -->
                            <div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/02.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
                                            <div class="small my-2">6:15 AM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/02.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
                                            <!-- Files START -->
                                            <!-- Files END -->
                                            <div class="small my-2">12:16 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/02.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
                                            <div class="small my-2">3:22 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
                                        <!-- Images -->
                                        <div class="d-flex my-2">
                                            <div class="small text-secondary">5:35 PM</div>
                                            <div class="small ms-2"><i class="fa-solid fa-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat time -->
                            <div class="text-center small my-2">2 New Messages</div>
                            <!-- Chat Typing -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/02.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-3 rounded-2">
                                                <div class="typing d-flex align-items-center">
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat conversation END -->
                        <!-- Chat bottom START -->
                        <div class="mt-2">
                            <!-- Chat textarea -->
                            <textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
                            <!-- Button -->
                            <div class="d-sm-flex align-items-end mt-2">
                                <button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
                                <button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
                                <button class="btn btn-sm btn-success-soft me-2"> Gif </button>
                                <button class="btn btn-sm btn-primary ms-auto"> Send </button>
                            </div>
                        </div>
                        <!-- Chat bottom START -->
                    </div>
                </div>
                <!-- Chat toast 2 END -->

            </div>
        </div>
        <!-- Chat END -->

    </div>
    <!-- Main Chat END -->

    <!-- Modal create Feed START -->
    <div class="modal fade" id="modalCreateFeed" tabindex="-1" aria-labelledby="modalLabelCreateFeed" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelCreateFeed">Create post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Add Feed -->
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                            <img class="avatar-img rounded-circle" src="assets/img/<?=$userImg?>" alt="">
                        </div>
                        <!-- Feed box  -->
                        <form class="w-100">
                            <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="4" placeholder="Share your thoughts..." autofocus></textarea>
                        </form>
                    </div>
                    <!-- Feed rect START -->
                    <div class="hstack gap-2">
                        <a class="icon-md bg-success bg-opacity-10 text-success rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Photo"> <i class="bi bi-image-fill"></i> </a>
                        <a class="icon-md bg-info bg-opacity-10 text-info rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Video"> <i class="bi bi-camera-reels-fill"></i> </a>
                        <a class="icon-md bg-danger bg-opacity-10 text-danger rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Events"> <i class="bi bi-calendar2-event-fill"></i> </a>
                        <a class="icon-md bg-warning bg-opacity-10 text-warning rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Feeling/Activity"> <i class="bi bi-emoji-smile-fill"></i> </a>
                        <a class="icon-md bg-light text-secondary rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Check in"> <i class="bi bi-geo-alt-fill"></i> </a>
                        <a class="icon-md bg-primary bg-opacity-10 text-primary rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Tag people on top"> <i class="bi bi-tag-fill"></i> </a>
                    </div>
                    <!-- Feed rect END -->
                </div>
                <!-- Modal feed body END -->

                <!-- Modal feed footer -->
                <div class="modal-footer row justify-content-between">
                    <!-- Select -->
                    <div class="col-lg-3">
                        <select class="form-select js-choice choice-select-text-none" data-position="top" data-search-enabled="false">
            <option value="PB">Public</option>
            <option value="PV">Friends</option>
            <option value="PV">Only me</option>
            <option value="PV">Custom</option>
          </select>
                        <!-- Button -->
                    </div>
                    <div class="col-lg-8 text-sm-end">
                        <button type="button" class="btn btn-danger-soft me-2"> <i class="bi bi-camera-video-fill pe-1"></i> Live video</button>
                        <button type="button" class="btn btn-success-soft">Post</button>
                    </div>
                </div>
                <!-- Modal feed footer -->

            </div>
        </div>
    </div>
    <!-- Modal create feed END -->

    <!-- Modal create Feed photo START -->
    <div class="modal fade" id="feedActionPhoto" tabindex="-1" aria-labelledby="feedActionPhotoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="feedActionPhotoLabel">Add post photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Add Feed -->
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                            <img class="avatar-img rounded-circle" src="assets/img/<?=$userImg?>" alt="">
                        </div>
                        <!-- Feed box  -->
                        <form class="w-100">
                            <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
                        </form>
                    </div>

                    <!-- Dropzone photo START -->
                    <div>
                        <label class="form-label">Upload attachment</label>
                        <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
                            <div class="dz-message">
                                <i class="bi bi-images display-3"></i>
                                <p>Drag here or click to upload photo.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Dropzone photo END -->

                </div>
                <!-- Modal feed body END -->

                <!-- Modal feed footer -->
                <div class="modal-footer ">
                    <!-- Button -->
                    <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success-soft">Post</button>
                </div>
                <!-- Modal feed footer -->
            </div>
        </div>
    </div>
    <!-- Modal create Feed photo END -->

    <!-- Modal create Feed video START -->
    <div class="modal fade" id="feedActionVideo" tabindex="-1" aria-labelledby="feedActionVideoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="feedActionVideoLabel">Add post video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Add Feed -->
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                            <img class="avatar-img rounded-circle" src="assets/img/<?=$userImg?>" alt="">
                        </div>
                        <!-- Feed box  -->
                        <form class="w-100">
                            <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
                        </form>
                    </div>

                    <!-- Dropzone photo START -->
                    <div>
                        <label class="form-label">Upload attachment</label>
                        <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
                            <div class="dz-message">
                                <i class="bi bi-camera-reels display-3"></i>
                                <p>Drag here or click to upload video.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Dropzone photo END -->

                </div>
                <!-- Modal feed body END -->

                <!-- Modal feed footer -->
                <div class="modal-footer">
                    <!-- Button -->
                    <button type="button" class="btn btn-danger-soft me-2"><i class="bi bi-camera-video-fill pe-1"></i> Live video</button>
                    <button type="button" class="btn btn-success-soft">Post</button>
                </div>
                <!-- Modal feed footer -->
            </div>
        </div>
    </div>
    <!-- Modal create Feed video END -->

    <!-- Modal create events START -->
    <div class="modal fade" id="modalCreateEvents" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelCreateAlbum">Create event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->
                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Form START -->
                    <form class="row g-4">
                        <!-- Title -->
                        <div class="col-12">
                            <label class="form-label">Title</label>
                            <input type="email" class="form-control" placeholder="Event name here">
                        </div>
                        <!-- Description -->
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="2" placeholder="Ex: topics, schedule, etc."></textarea>
                        </div>
                        <!-- Date -->
                        <div class="col-sm-4">
                            <label class="form-label">Date</label>
                            <input type="text" class="form-control flatpickr" placeholder="Select date">
                        </div>
                        <!-- Time -->
                        <div class="col-sm-4">
                            <label class="form-label">Time</label>
                            <input type="text" class="form-control flatpickr" data-enableTime="true" data-noCalendar="true" placeholder="Select time">
                        </div>
                        <!-- Duration -->
                        <div class="col-sm-4">
                            <label class="form-label">Duration</label>
                            <input type="email" class="form-control" placeholder="1hr 23m">
                        </div>
                        <!-- Location -->
                        <div class="col-12">
                            <label class="form-label">Location</label>
                            <input type="email" class="form-control" placeholder="Logansport, IN 46947">
                        </div>
                        <!-- Add guests -->
                        <div class="col-12">
                            <label class="form-label">Add guests</label>
                            <input type="email" class="form-control" placeholder="Guest email">
                        </div>
                        <!-- Avatar group START -->
                        <div class="col-12 mt-3">
                            <ul class="avatar-group list-unstyled align-items-center mb-0">
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/01.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/02.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/03.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/04.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/05.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/06.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/07.jpg" alt="avatar">
                                </li>
                                <li class="ms-3">
                                    <small> +50 </small>
                                </li>
                            </ul>
                        </div>
                        <!-- Upload Photos or Videos -->
                        <!-- Dropzone photo START -->
                        <div>
                            <label class="form-label">Upload attachment</label>
                            <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
                                <div class="dz-message">
                                    <i class="bi bi-file-earmark-text display-3"></i>
                                    <p>Drop presentation and document here or click to upload.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Dropzone photo END -->
                    </form>
                    <!-- Form END -->
                </div>
                <!-- Modal feed body END -->
                <!-- Modal footer -->
                <!-- Button -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal"> Cancel</button>
                    <button type="button" class="btn btn-success-soft">Create now</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal create events END -->

    <!-- =======================
JS libraries, plugins and custom scripts -->

    <!-- Bootstrap JS -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendors -->
    <script src="assets/vendor/tiny-slider/dist/tiny-slider.js"></script>
    <script src="assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js"></script>
    <script src="assets/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="assets/vendor/glightbox-master/dist/js/glightbox.min.js"></script>
    <script src="assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/vendor/plyr/plyr.js"></script>
    <script src="assets/vendor/dropzone/dist/min/dropzone.min.js"></script>

    <!-- Template Functions -->
    <script src="assets/js/functions.js"></script>


</body>

</html>