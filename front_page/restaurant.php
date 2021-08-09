<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <link rel="icon" type="image/png" href="img/fav.png">
    <title>Swiggiweb - Online Food Ordering Website Template</title>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.min.css" />
    <!-- Feather Icon-->
    <link href="vendor/icons/feather.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Sidebar CSS -->
    <link href="vendor/sidebar/demo.css" rel="stylesheet">
</head>

<body class="fixed-bottom-bar">
    <?php include 'asset/header.php'; 
    include '../asset/koneksi.php'; ?>

    <div class="d-none">
        <div class="bg-primary p-3 d-flex align-items-center">
            <a class="toggle togglew toggle-2" href="#"><span></span></a>
            <h4 class="font-weight-bold m-0 text-white">Osahan Bar</h4>
        </div>
    </div>
    <?php
    $id=$_GET['id_supplier'];
    $query = "SELECT * FROM tbl_supplier where id_supplier='$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    ?>
    <div class="offer-section py-4">
        <div class="container position-relative">
            <img alt="#" src="img/lazato logo.png" class="restaurant-pic">
            <div class="pt-3 text-white">
                <h2 class="font-weight-bold"><?php echo $data['nama_supplier'] ?></h2>
                <p class="text-white m-0"><?php echo $data['alamat'] ?></p>
                <div class="rating-wrap d-flex align-items-center mt-2">
                    <ul class="rating-stars list-unstyled">
                        <li>
                            <i class="feather-star text-warning"></i>
                            <i class="feather-star text-warning"></i>
                            <i class="feather-star text-warning"></i>
                            <i class="feather-star text-warning"></i>
                            <i class="feather-star"></i>
                        </li>
                    </ul>
                    <p class="label-rating text-white ml-2 small"> (245 Reviews)</p>
                </div>
            </div>
            <div class="pb-4">
                <div class="row">
                    <div class="col-6 col-md-2">
                        <p class="text-white-50 font-weight-bold m-0 small">Delivery</p>
                        <p class="text-white m-0">Free</p>
                    </div>
                    <div class="col-6 col-md-2">
                        <p class="text-white-50 font-weight-bold m-0 small">Open time</p>
                        <p class="text-white m-0">8:00 AM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="p-3 bg-primary bg-primary mt-n3 rounded position-relative">
            <div class="d-flex align-items-center">
                <div class="feather_icon">
                    <a href="#ratings-and-reviews" class="text-decoration-none text-dark"><i class="p-2 bg-light rounded-circle font-weight-bold  feather-upload"></i></a>
                    <a href="#ratings-and-reviews" class="text-decoration-none text-dark mx-2"><i class="p-2 bg-light rounded-circle font-weight-bold  feather-star"></i></a>
                    <a href="#ratings-and-reviews" class="text-decoration-none text-dark"><i class="p-2 bg-light rounded-circle font-weight-bold feather-map-pin"></i></a>
                </div>
                <a href="contact-us.html" class="btn btn-sm btn-outline-light ml-auto">Contact</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="">
            
            <!-- slider -->
            <div class="trending-slider rounded">
              <?php
              $id_supplier2=$_GET['id_supplier'];
              $query2 = "SELECT * FROM tbl_produk where id_supplier='$id_supplier2'";
              $result2 = mysqli_query($koneksi, $query2);
              while($data2 = mysqli_fetch_assoc($result2)){
              $id_produk=$data2['id_kategori'];
              ?>
              <div class="osahan-slider-item">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <a href="checkout.html">
                            <img alt="#" src="../pages/data_produk/upload/<?php echo $data2['gambar'] ?>" class="img-fluid item-img w-100">
                        </a>
                    </div>
                    <div class="p-3 position-relative">
                        <div class="list-card-body">
                            <h6 class="mb-1"><a href="" class="text-black"><b><?php echo $data2['jenis_produk']?></b></a>
                            </h6>
                            <?php
                            $query = "SELECT * FROM tbl_kategori where id_kategori='$id_produk'";
                            $result = mysqli_query($koneksi, $query);
                            $data = mysqli_fetch_assoc($result);
                            ?>
                            <p class="text-gray mb-3"><?php echo $data['jenis_kategori'] ?></p>
                            <p class="text-gray m-0"> <span class="text-black-50">Rp. <?php echo $data2['harga_produk']?></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
</div>
<!-- Menu -->
<div class="container position-relative">
    <div class="row">
        <div class="col-md-8 pt-3">
            <div class="shadow-sm rounded bg-white mb-3 overflow-hidden">
                <div class="d-flex item-aligns-center">
                    <p class="font-weight-bold h6 p-3 border-bottom mb-0 w-100">Menu</p>
                    <!-- <a class="small text-primary font-weight-bold ml-auto" href="#">View all <i class="feather-chevrons-right"></i></a> -->
                </div>
                <div class="row m-0">
                    <h6 class="p-3 m-0 bg-light w-100">Quick Bites <small class="text-black-50">3 ITEMS</small></h6>
                    <div class="col-md-12 px-0 border-top">
                        <div class="">
                        <?php
              $id_supplier2=$_GET['id_supplier'];
              $query3 = "SELECT * FROM tbl_produk where id_supplier='$id_supplier2'";
              $result3 = mysqli_query($koneksi, $query3);
              while($data3 = mysqli_fetch_assoc($result3)){
              $id_produk=$data3['id_kategori'];
              ?>
                            <div class="p-3 border-bottom gold-members">
                                <span class="float-right"><a href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</a></span>
                                <div class="media">
                                    <div class="mr-3 font-weight-bold text-danger non_veg">.</div>
                                    <div class="media-body">
                                        <h6 class="mb-1"><?php echo $data3['jenis_produk'] ?> <span class="badge badge-danger">BEST SELLER</span></h6>
                                        <p class="text-muted mb-0">Rp. <?php echo $data3['harga_produk'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
               
                <div class="row m-0">
                    <h6 class="p-3 m-0 bg-light w-100">Soups <small class="text-black-50">8 ITEMS</small></h6>
                    <div class="col-md-12 px-0 border-top">
                        <div class="bg-white">
                            <div class="p-3 border-bottom gold-members">
                                <span class="float-right"><a href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</a></span>
                                <div class="media">
                                    <div class="mr-3 font-weight-bold text-danger non_veg">.</div>
                                    <div class="media-body">
                                        <h6 class="mb-1">Chicken Tikka Sub </h6>
                                        <p class="text-muted mb-0">$250</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-bottom gold-members">
                                <span class="float-right"><a href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</a></span>
                                <div class="media">
                                    <div class="mr-3 font-weight-bold text-danger non_veg">.</div>
                                    <div class="media-body">
                                        <h6 class="mb-1">Cheese corn Roll <span class="badge badge-danger">BEST SELLER</span></h6>
                                        <p class="text-muted mb-0">$600</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-bottom gold-members">
                                <span class="float-right"><a href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</a></span>
                                <div class="media">
                                    <div class="mr-3 font-weight-bold text-success veg">.</div>
                                    <div class="media-body">
                                        <h6 class="mb-1">Chicken Tikka Sub <span class="badge badge-success">Pure Veg</span></h6>
                                        <p class="text-muted mb-0">$250</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-bottom gold-members">
                                <span class="float-right"><a href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</a></span>
                                <div class="media">
                                    <div class="mr-3 font-weight-bold text-success veg">.</div>
                                    <div class="media-body">
                                        <h6 class="mb-1">Chicken Tikka Sub </h6>
                                        <p class="text-muted mb-0">$250</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-bottom gold-members">
                                <span class="float-right"><a href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</a></span>
                                <div class="media">
                                    <div class="mr-3 font-weight-bold text-danger non_veg">.</div>
                                    <div class="media-body">
                                        <h6 class="mb-1">Cheese corn Roll <span class="badge badge-danger">BEST SELLER</span></h6>
                                        <p class="text-muted mb-0">$600</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 gold-members">
                                <span class="float-right"><a href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</a></span>
                                <div class="media">
                                    <div class="mr-3 font-weight-bold text-success veg">.</div>
                                    <div class="media-body">
                                        <h6 class="mb-1">Chicken Tikka Sub <span class="badge badge-success">Pure Veg</span></h6>
                                        <p class="text-muted mb-0">$250</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div id="ratings-and-reviews" class="bg-white shadow-sm d-flex align-items-center rounded p-3 mb-3 clearfix restaurant-detailed-star-rating">
                    <h6 class="mb-0">Rate this Place</h6>
                    <div class="star-rating ml-auto">
                        <div class="d-inline-block h6 m-0"><i class="feather-star text-warning"></i>
                            <i class="feather-star text-warning"></i>
                            <i class="feather-star text-warning"></i>
                            <i class="feather-star text-warning"></i>
                            <i class="feather-star"></i>
                        </div>
                        <b class="text-black ml-2">334</b>
                    </div>
                </div>
                <div class="bg-white rounded p-3 mb-3 clearfix graph-star-rating rounded shadow-sm">
                    <h6 class="mb-0 mb-1">Ratings and Reviews</h6>
                    <p class="text-muted mb-4 mt-1 small">Rated 3.5 out of 5</p>
                    <div class="graph-star-rating-body">
                        <div class="rating-list">
                            <div class="rating-list-left font-weight-bold small">5 Star</div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div role="progressbar" class="progress-bar bg-info" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%;"></div>
                                </div>
                            </div>
                            <div class="rating-list-right font-weight-bold small">56 %</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left font-weight-bold small">4 Star</div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div role="progressbar" class="progress-bar bg-info" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                                </div>
                            </div>
                            <div class="rating-list-right font-weight-bold small">23 %</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left font-weight-bold small">3 Star</div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div role="progressbar" class="progress-bar bg-info" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100" style="width: 11%;"></div>
                                </div>
                            </div>
                            <div class="rating-list-right font-weight-bold small">11 %</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left font-weight-bold small">2 Star</div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div role="progressbar" class="progress-bar bg-info" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                                </div>
                            </div>
                            <div class="rating-list-right font-weight-bold small">6 %</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left font-weight-bold small">1 Star</div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div role="progressbar" class="progress-bar bg-info" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100" style="width: 4%;"></div>
                                </div>
                            </div>
                            <div class="rating-list-right font-weight-bold small">4 %</div>
                        </div>
                    </div>
                    <div class="graph-star-rating-footer text-center mt-3"><button type="button" class="btn btn-primary btn-block btn-sm">Rate and Review</button></div>
                </div>
                <div class="bg-white p-3 mb-3 restaurant-detailed-ratings-and-reviews shadow-sm rounded">
                    <a class="text-primary float-right" href="#">Top Rated</a>
                    <h6 class="mb-1">All Ratings and Reviews</h6>
                    <div class="reviews-members py-3">
                        <div class="media">
                            <a href="#"><img alt="#" src="img/reviewer1.png" class="mr-3 rounded-pill"></a>
                            <div class="media-body">
                                <div class="reviews-members-header">
                                    <div class="star-rating float-right">
                                        <div class="d-inline-block" style="font-size: 14px;"><i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star"></i>
                                        </div>
                                    </div>
                                    <h6 class="mb-0"><a class="text-dark" href="#">Trump</a></h6>
                                    <p class="text-muted small">Tue, 20 Mar 2020</p>
                                </div>
                                <div class="reviews-members-body">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classNameical Latin literature from 45 BC, making it over 2000 years old.</p>
                                </div>
                                <div class="reviews-members-footer"><a class="total-like btn btn-sm btn-outline-primary" href="#"><i class="feather-thumbs-up"></i> 856M</a> <a class="total-like btn btn-sm btn-outline-primary" href="#"><i class="feather-thumbs-down"></i> 158K</a>
                                    <span class="total-like-user-main ml-2" dir="rtl">
                                       <a href="#" aria-describedby="tooltip-top0"><img alt="#"src="img/reviewer3.png" class="total-like-user rounded-pill"></a>
                                       <a href="#" aria-describedby="tooltip-top1"><img alt="#"src="img/reviewer4.png" class="total-like-user rounded-pill"></a>
                                       <a href="#"><img alt="#"src="img/reviewer5.png" class="total-like-user rounded-pill"></a>
                                       <a href="#" aria-describedby="tooltip-top3"><img alt="#"src="img/reviewer6.png" class="total-like-user rounded-pill"></a>
                                   </span>
                               </div>
                           </div>
                       </div>
                   </div>
                   <hr>
                   <div class="reviews-members py-3">
                    <div class="media">
                        <a href="#"><img alt="#" src="img/reviewer2.png" class="mr-3 rounded-pill"></a>
                        <div class="media-body">
                            <div class="reviews-members-header">
                                <div class="star-rating float-right">
                                    <div class="d-inline-block" style="font-size: 14px;"><i class="feather-star text-warning"></i>
                                        <i class="feather-star text-warning"></i>
                                        <i class="feather-star text-warning"></i>
                                        <i class="feather-star text-warning"></i>
                                        <i class="feather-star"></i>
                                    </div>
                                </div>
                                <h6 class="mb-0"><a class="text-dark" href="#">Jhon Smith</a></h6>
                                <p class="text-muted small">Tue, 20 Mar 2020</p>
                            </div>
                            <div class="reviews-members-body">
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            </div>
                            <div class="reviews-members-footer"><a class="total-like btn btn-sm btn-outline-primary" href="#"><i class="feather-thumbs-up"></i> 88K</a> <a class="total-like btn btn-sm btn-outline-primary" href="#"><i class="feather-thumbs-down"></i> 1K</a><span class="total-like-user-main ml-2"
                                dir="rtl"><a href="#"><img alt="#"src="img/reviewer3.png" class="total-like-user rounded-pill"></a><a href="#"><img alt="#"src="img/reviewer4.png" class="total-like-user rounded-pill"></a><a href="#"><img alt="#"src="img/reviewer5.png" class="total-like-user rounded-pill"></a><a href="#"><img alt="#"src="img/reviewer6.png" class="total-like-user rounded-pill"></a></span></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <a class="text-center w-100 d-block mt-3 font-weight-bold" href="#">See All Reviews</a>
                </div>
                <div class="bg-white p-3 rating-review-select-page rounded shadow-sm">
                    <h6 class="mb-3">Leave Comment</h6>
                    <div class="d-flex align-items-center mb-3">
                        <p class="m-0 small">Rate the Place</p>
                        <div class="star-rating ml-auto">
                            <div class="d-inline-block"><i class="feather-star text-warning"></i>
                                <i class="feather-star text-warning"></i>
                                <i class="feather-star text-warning"></i>
                                <i class="feather-star text-warning"></i>
                                <i class="feather-star"></i>
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="form-group"><label class="form-label small">Your Comment</label><textarea class="form-control"></textarea></div>
                        <div class="form-group mb-0"><button type="button" class="btn btn-primary btn-block"> Submit Comment </button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 pt-3">
            <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
                <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
                    <img alt="osahan" src="img/starter1.jpg" class="mr-3 rounded-circle img-fluid">
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 font-weight-bold">Spice Hut Indian Restaurant</h6>
                        <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> 2036 2ND AVE, NEW YORK, NY 10029</p>
                    </div>
                </div>
                <div class="bg-white border-bottom py-2">
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="media align-items-center">
                            <div class="mr-2 text-danger">&middot;</div>
                            <div class="media-body">
                                <p class="m-0">Chicken Tikka Sub</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i> </button><input class="count-number-input" type="text" readonly="" value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="media align-items-center">
                            <div class="mr-2 text-danger">&middot;</div>
                            <div class="media-body">
                                <p class="m-0">Methi Chicken Dry
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i> </button><input class="count-number-input" type="text" readonly="" value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="media align-items-center">
                            <div class="mr-2 text-danger">&middot;</div>
                            <div class="media-body">
                                <p class="m-0">Reshmi Kebab
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i> </button><input class="count-number-input" type="text" readonly="" value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="media align-items-center">
                            <div class="mr-2 text-success">&middot;</div>
                            <div class="media-body">
                                <p class="m-0">Lemon Cheese Dry
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i> </button><input class="count-number-input" type="text" readonly="" value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2">
                        <div class="media align-items-center">
                            <div class="mr-2 text-success">&middot;</div>
                            <div class="media-body">
                                <p class="m-0">Rara Paneer</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i> </button><input class="count-number-input" type="text" readonly="" value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-3 py-3 border-bottom clearfix">
                    <div class="input-group-sm mb-2 input-group">
                        <input placeholder="Enter promo code" type="text" class="form-control">
                        <div class="input-group-append"><button type="button" class="btn btn-primary"><i class="feather-percent"></i> APPLY</button></div>
                    </div>
                    <div class="mb-0 input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="feather-message-square"></i></span></div>
                        <textarea placeholder="Any suggestions? We will pass it on..." aria-label="With textarea" class="form-control"></textarea>
                    </div>
                </div>
                <div class="bg-white p-3 clearfix border-bottom">
                    <p class="mb-1">Item Total <span class="float-right text-dark">$3140</span></p>
                    <p class="mb-1">Restaurant Charges <span class="float-right text-dark">$62.8</span></p>
                    <p class="mb-1">Delivery Fee<span class="text-info ml-1"><i class="feather-info"></i></span><span class="float-right text-dark">$10</span></p>
                    <p class="mb-1 text-success">Total Discount<span class="float-right text-success">$1884</span></p>
                    <hr>
                    <h6 class="font-weight-bold mb-0">TO PAY <span class="float-right">$1329</span></h6>
                </div>
                <div class="p-3">
                    <a class="btn btn-success btn-block btn-lg" href="successful.html">PAY $1329<i class="feather-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
    <div class="row">
        <div class="col">
            <a href="home.html" class="text-dark small font-weight-bold text-decoration-none">
                <p class="h4 m-0"><i class="feather-home text-dark"></i></p>
                Home
            </a>
        </div>
        <div class="col selected">
            <a href="trending.html" class="text-danger small font-weight-bold text-decoration-none">
                <p class="h4 m-0"><i class="feather-map-pin"></i></p>
                Trending
            </a>
        </div>
        <div class="col bg-white rounded-circle mt-n4 px-3 py-2">
            <div class="bg-danger rounded-circle mt-n0 shadow">
                <a href="checkout.html" class="text-white small font-weight-bold text-decoration-none">
                    <i class="feather-shopping-cart"></i>
                </a>
            </div>
        </div>
        <div class="col">
            <a href="favorites.html" class="text-dark small font-weight-bold text-decoration-none">
                <p class="h4 m-0"><i class="feather-heart"></i></p>
                Favorites
            </a>
        </div>
        <div class="col">
            <a href="profile.html" class="text-dark small font-weight-bold text-decoration-none">
                <p class="h4 m-0"><i class="feather-user"></i></p>
                Profile
            </a>
        </div>
    </div>
</div>
</div>
<!-- footer -->
<footer class="section-footer border-top bg-dark">
    <div class="container">
        <section class="footer-top padding-y py-5">
            <div class="row pt-3">
                <aside class="col-md-4 footer-about">
                    <article class="d-flex pb-3">
                        <div><img alt="#" src="img/logo_web.png" class="logo-footer mr-3"></div>
                        <div>
                            <h6 class="title text-white">About Us</h6>
                            <p class="text-muted">Some short text about company like You might remember the Dell computer commercials in which a youth reports.</p>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Facebook" target="_blank" href="#"><i class="feather-facebook"></i></a>
                                <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Instagram" target="_blank" href="#"><i class="feather-instagram"></i></a>
                                <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Youtube" target="_blank" href="#"><i class="feather-youtube"></i></a>
                                <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Twitter" target="_blank" href="#"><i class="feather-twitter"></i></a>
                            </div>
                        </div>
                    </article>
                </aside>
                <aside class="col-sm-3 col-md-2 text-white">
                    <h6 class="title">Error Pages</h6>
                    <ul class="list-unstyled hov_footer">
                        <li> <a href="not-found.html" class="text-muted">Not found</a></li>
                        <li> <a href="maintence.html" class="text-muted">Maintence</a></li>
                        <li> <a href="coming-soon.html" class="text-muted">Coming Soon</a></li>
                    </ul>
                </aside>
                <aside class="col-sm-3 col-md-2 text-white">
                    <h6 class="title">Services</h6>
                    <ul class="list-unstyled hov_footer">
                        <li> <a href="faq.html" class="text-muted">Delivery Support</a></li>
                        <li> <a href="contact-us.html" class="text-muted">Contact Us</a></li>
                        <li> <a href="terms.html" class="text-muted">Terms of use</a></li>
                        <li> <a href="privacy.html" class="text-muted">Privacy policy</a></li>
                    </ul>
                </aside>
                <aside class="col-sm-3  col-md-2 text-white">
                    <h6 class="title">For users</h6>
                    <ul class="list-unstyled hov_footer">
                        <li> <a href="login.html" class="text-muted"> User Login </a></li>
                        <li> <a href="signup.html" class="text-muted"> User register </a></li>
                        <li> <a href="forgot_password.html" class="text-muted"> Forgot Password </a></li>
                        <li> <a href="profile.html" class="text-muted"> Account Setting </a></li>
                    </ul>
                </aside>
                <aside class="col-sm-3  col-md-2 text-white">
                    <h6 class="title">More Pages</h6>
                    <ul class="list-unstyled hov_footer">
                        <li> <a href="trending.html" class="text-muted"> Trending </a></li>
                        <li> <a href="most_popular.html" class="text-muted"> Most popular </a></li>
                        <li> <a href="restaurant.html" class="text-muted"> Restaurant Details </a></li>
                        <li> <a href="favorites.html" class="text-muted"> Favorites </a></li>
                    </ul>
                </aside>
            </div>
            <!-- row.// -->
        </section>
        <!-- footer-top.// -->
        <section class="footer-center border-top padding-y py-5">
            <h6 class="title text-white">Countries</h6>
            <div class="row">
                <aside class="col-sm-2 col-md-2 text-white">
                    <ul class="list-unstyled hov_footer">
                        <li> <a href="#" class="text-muted">India</a></li>
                        <li> <a href="#" class="text-muted">Indonesia</a></li>
                        <li> <a href="#" class="text-muted">Ireland</a></li>
                        <li> <a href="#" class="text-muted">Italy</a></li>
                        <li> <a href="#" class="text-muted">Lebanon</a></li>
                    </ul>
                </aside>
                <aside class="col-sm-2 col-md-2 text-white">
                    <ul class="list-unstyled hov_footer">
                        <li> <a href="#" class="text-muted">Malaysia</a></li>
                        <li> <a href="#" class="text-muted">New Zealand</a></li>
                        <li> <a href="#" class="text-muted">Philippines</a></li>
                        <li> <a href="#" class="text-muted">Poland</a></li>
                        <li> <a href="#" class="text-muted">Portugal</a></li>
                    </ul>
                </aside>
                <aside class="col-sm-2 col-md-2 text-white">
                    <ul class="list-unstyled hov_footer">
                        <li> <a href="#" class="text-muted">Australia</a></li>
                        <li> <a href="#" class="text-muted">Brasil</a></li>
                        <li> <a href="#" class="text-muted">Canada</a></li>
                        <li> <a href="#" class="text-muted">Chile</a></li>
                        <li> <a href="#" class="text-muted">Czech Republic</a></li>
                    </ul>
                </aside>
                <aside class="col-sm-2 col-md-2 text-white">
                    <ul class="list-unstyled hov_footer">
                        <li> <a href="#" class="text-muted">Turkey</a></li>
                        <li> <a href="#" class="text-muted">UAE</a></li>
                        <li> <a href="#" class="text-muted">United Kingdom</a></li>
                        <li> <a href="#" class="text-muted">United States</a></li>
                        <li> <a href="#" class="text-muted">Sri Lanka</a></li>
                    </ul>
                </aside>
                <aside class="col-sm-2 col-md-2 text-white">
                    <ul class="list-unstyled hov_footer">
                        <li> <a href="#" class="text-muted">Qatar</a></li>
                        <li> <a href="#" class="text-muted">Singapore</a></li>
                        <li> <a href="#" class="text-muted">Slovakia</a></li>
                        <li> <a href="#" class="text-muted">South Africa</a></li>
                        <li> <a href="#" class="text-muted">Green Land</a></li>
                    </ul>
                </aside>
                <aside class="col-sm-2 col-md-2 text-white">
                    <ul class="list-unstyled hov_footer">
                        <li> <a href="#" class="text-muted">Pakistan</a></li>
                        <li> <a href="#" class="text-muted">Bangladesh</a></li>
                        <li> <a href="#" class="text-muted">Bhutaan</a></li>
                        <li> <a href="#" class="text-muted">Nepal</a></li>
                    </ul>
                </aside>
            </div>
            <!-- row.// -->
        </section>
    </div>
    <!-- //container -->
    <section class="footer-copyright border-top py-3 bg-light">
        <div class="container d-flex align-items-center">
            <p class="mb-0"> © 2020 Company All rights reserved </p>
            <p class="text-muted mb-0 ml-auto d-flex align-items-center">
                <a href="#" class="d-block"><img alt="#" src="img/appstore.png" height="40"></a>
                <a href="#" class="d-block ml-3"><img alt="#" src="img/playmarket.png" height="40"></a>
            </p>
        </div>
    </section>
</footer>
<nav id="main-nav">
    <ul class="second-nav">
        <li><a href="home.html"><i class="feather-home mr-2"></i> Homepage</a></li>
        <li><a href="my_order.html"><i class="feather-list mr-2"></i> My Orders</a></li>
        <li>
            <a href="#"><i class="feather-edit-2 mr-2"></i> Authentication</a>
            <ul>
                <li><a href="login.html">Login</a></li>
                <li><a href="signup.html">Register</a></li>
                <li><a href="forgot_password.html">Forgot Password</a></li>
                <li><a href="verification.html">Verification</a></li>
                <li><a href="location.html">Location</a></li>
            </ul>
        </li>
        <li><a href="favorites.html"><i class="feather-heart mr-2"></i> Favorites</a></li>
        <li><a href="trending.html"><i class="feather-trending-up mr-2"></i> Trending</a></li>
        <li><a href="most_popular.html"><i class="feather-award mr-2"></i> Most Popular</a></li>
        <li><a href="restaurant.html"><i class="feather-paperclip mr-2"></i> Restaurant Detail</a></li>
        <li><a href="checkout.html"><i class="feather-list mr-2"></i> Checkout</a></li>
        <li><a href="successful.html"><i class="feather-check-circle mr-2"></i> Successful</a></li>
        <li><a href="map.html"><i class="feather-map-pin mr-2"></i> Live Map</a></li>
        <li>
            <a href="#"><i class="feather-user mr-2"></i> Profile</a>
            <ul>
                <li><a href="profile.html">Profile</a></li>
                <li><a href="favorites.html">Delivery support</a></li>
                <li><a href="contact-us.html">Contact Us</a></li>
                <li><a href="terms.html">Terms of use</a></li>
                <li><a href="privacy.html">Privacy & Policy</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="feather-alert-triangle mr-2"></i> Error</a>
            <ul>
                <li><a href="not-found.html">Not Found</a>
                    <li><a href="maintence.html"> Maintence</a>
                        <li><a href="coming-soon.html">Coming Soon</a>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="feather-link mr-2"></i> Navigation Link Example</a>
                        <ul>
                            <li>
                                <a href="#">Link Example 1</a>
                                <ul>
                                    <li>
                                        <a href="#">Link Example 1.1</a>
                                        <ul>
                                            <li><a href="#">Link</a></li>
                                            <li><a href="#">Link</a></li>
                                            <li><a href="#">Link</a></li>
                                            <li><a href="#">Link</a></li>
                                            <li><a href="#">Link</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Link Example 1.2</a>
                                        <ul>
                                            <li><a href="#">Link</a></li>
                                            <li><a href="#">Link</a></li>
                                            <li><a href="#">Link</a></li>
                                            <li><a href="#">Link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Link Example 2</a></li>
                            <li><a href="#">Link Example 3</a></li>
                            <li><a href="#">Link Example 4</a></li>
                            <li data-nav-custom-content>
                                <div class="custom-message">
                                    You can add any custom content to your navigation items. This text is just an example.
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="bottom-nav">
                    <li class="email">
                        <a class="text-danger" href="home.html">
                            <p class="h5 m-0"><i class="feather-home text-danger"></i></p>
                            Home
                        </a>
                    </li>
                    <li class="github">
                        <a href="faq.html">
                            <p class="h5 m-0"><i class="feather-message-circle"></i></p>
                            FAQ
                        </a>
                    </li>
                    <li class="ko-fi">
                        <a href="contact-us.html">
                            <p class="h5 m-0"><i class="feather-phone"></i></p>
                            Help
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- extras modal -->
            <div class="modal fade" id="extras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Extras</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <form>
                            <!-- extras body -->
                            <div class="recepie-body">
                                <div class="custom-control custom-radio border-bottom py-2">
                                    <input type="radio" id="customRadio1f" name="location" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="customRadio1f">Tuna <span class="text-muted">+$35.00</span></label>
                                </div>
                                <div class="custom-control custom-radio border-bottom py-2">
                                    <input type="radio" id="customRadio2f" name="location" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2f">Salmon <span class="text-muted">+$20.00</span></label>
                                </div>
                                <div class="custom-control custom-radio border-bottom py-2">
                                    <input type="radio" id="customRadio3f" name="location" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio3f">Wasabi <span class="text-muted">+$25.00</span></label>
                                </div>
                                <div class="custom-control custom-radio border-bottom py-2">
                                    <input type="radio" id="customRadio4f" name="location" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio4f">Unagi  <span class="text-muted">+$10.00</span></label>
                                </div>
                                <div class="custom-control custom-radio border-bottom py-2">
                                    <input type="radio" id="customRadio5f" name="location" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio5f">Vegetables  <span class="text-muted">+$5.00</span></label>
                                </div>
                                <div class="custom-control custom-radio border-bottom py-2">
                                    <input type="radio" id="customRadio6f" name="location" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio6f">Noodles  <span class="text-muted">+$30.00</span></label>
                                </div>
                                <h6 class="font-weight-bold mt-4">QUANTITY</h6>
                                <div class="d-flex align-items-center">
                                    <p class="m-0">1 Item</p>
                                    <div class="ml-auto">
                                        <span class="count-number"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i> </button><input class="count-number-input" type="text" readonly="" value="1"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer p-0 border-0">
                        <div class="col-6 m-0 p-0">
                            <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-6 m-0 p-0">
                            <button type="button" class="btn btn-primary btn-lg btn-block">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- slick Slider JS-->
        <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
        <!-- Sidebar JS-->
        <script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>
        <!-- Custom scripts for all pages-->
        <script type="text/javascript" src="js/osahan.js"></script>
    </body>

    </html>