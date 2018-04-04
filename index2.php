<!doctype html>
<?php
//This statement is to connect to the database
require_once('database.php');
// Get all categoryType
$queryAllcategorytype = 'SELECT * FROM itemcategory ORDER BY itemCatID';
$statement2 = $db->prepare($queryAllcategorytype);
$statement2->execute();
$categorytype = $statement2->fetchAll();
$statement2->closeCursor();
// Get categoryType ID
if (!isset($itemCategoryID)) {$itemCategoryID = filter_input(INPUT_GET, 'itemCategoryID', FILTER_VALIDATE_INT);
if ($itemCategoryID == NULL || $itemCategoryID == FALSE) {$itemCategoryID = 0;}}
// Get name for selected categoryType
$queryCategoryType = 'SELECT * FROM itemcategory WHERE itemCatID = :itemCategoryID';
$statement1 = $db->prepare($queryCategoryType);
$statement1->bindValue(':itemCategoryID', $itemCategoryID);
$statement1->execute();
$categoryType = $statement1->fetch();
$categoryType_name = $categoryType['itemCatName'];
$statement1->closeCursor();

//query to get the item
$queryAllItem = 'SELECT itemCategory.itemCatName, item.itemName, item.itemCatID, item.itemID, item.frontImg, item.backImg
FROM item INNER JOIN itemCategory ON itemCategory.itemCatID = item.itemCatID AND item.itemCatID = itemcategory.itemCatID';
$statement3= $db->prepare($queryAllItem);
$statement3->execute();
$item = $statement3->fetchAll();
$statement3->closeCursor();
 
//query to get the item for new arrivar
$queryArrival = 'SELECT itemCategory.itemCatName, item.itemName, item.itemCatID, item.itemID, item.frontImg, item.backImg
FROM item 
INNER JOIN itemCategory ON itemCategory.itemCatID = item.itemCatID AND item.itemCatID = itemcategory.itemCatID
ORDER BY releaseDate DESC limit 10';
$statement4= $db->prepare($queryArrival);
$statement4->execute();
$arrival = $statement4->fetchAll();
$statement4->closeCursor();
?>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<title>Homepage | PhoneBits</title>
		<link rel="shortcut icon" href="images/favicon.ico">

		<link rel="stylesheet" href="css/settings.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/swatches-and-photos.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/jquery.selectBox.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic%7CCrimson+Text:400,400italic,600,600italic,700,700italic" type="text/css" media="all"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
		<link rel="stylesheet" href="css/elegant-icon.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/commerce.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/custom.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" media="all"/>
	</head>
	<body>
		<div class="offcanvas open">
			<div class="offcanvas-wrap">
				<div class="offcanvas-user clearfix">
					<a class="offcanvas-user-wishlist-link" href="wishlist.php">
						<i class="fa fa-heart-o"></i> My Wishlist
					</a>
					<a class="offcanvas-user-account-link" href="my-account.php">
						<i class="fa fa-user"></i> Login
					</a>
				</div>
				<nav class="offcanvas-navbar">
					<ul class="offcanvas-nav">
						<ul class="nav navbar-nav primary-nav">
													<li><a href="index.php"><span class="underline">Home</span></a></li>
													
													<li><a href="shop-by-category.php"><span class="underline">Shop</span></a></li>
													
													<li><a href="#"><span class="underline">Compare</span></a></li>
													
													<li><a href="contact-us.php"><span class="underline">Contact Us</span></a></li>
						</ul>
					</ul>
					
						
				</nav>
			</div>
		</div>
		<div id="wrapper" class="wide-wrap">
			<div class="offcanvas-overlay"></div>
			<header class="header-container header-type-classic header-navbar-classic header-scroll-resize">
				<div class="topbar">
					<div class="container topbar-wap">
						<div class="row">
							<div class="col-sm-6 col-left-topbar">
								
							</div>
							<div class="col-sm-6 col-right-topbar">
								<div class="right-topbar">
									<i class="fa fa-user"></i>    Hello, Andrea!  |  
 									<a href="#"><strong>My Account  </strong><i class="fa fa-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="navbar-container">
					<div class="navbar navbar-default navbar-scroll-fixed">
						<div class="navbar-default-wrap">
							<div class="container">
								<div class="row">
									<div class="navbar-default-col">
										<div class="navbar-wrap">
											<div class="navbar-header">
												<button type="button" class="navbar-toggle">
													<span class="sr-only">Toggle navigation</span>
													<span class="icon-bar bar-top"></span>
													<span class="icon-bar bar-middle"></span>
													<span class="icon-bar bar-bottom"></span>
												</button>
												<a class="navbar-search-button search-icon-mobile" href="#">
													<i class="fa fa-search"></i>
												</a>
												<a class="cart-icon-mobile" href="#">
													<i class="elegant_icon_bag"></i><span>0</span>
												</a>
												<a class="navbar-brand" href="./">
													<img class="logo" alt="logo" src="images/logo.png">
													<img class="logo-fixed" alt="logo" src="images/logo-fixed.png">
													<img class="logo-mobile" alt="logo" src="images/logo-mobile.png">
												</a>
											</div>
											<nav class="collapse navbar-collapse primary-navbar-collapse">
												<ul class="nav navbar-nav primary-nav">
													<li><a href="index.php"><span class="underline">Home</span></a></li>
													
													<li><a href="shop-by-category.php"><span class="underline">Shop</span></a></li>
													
													<li><a href="#"><span class="underline">Compare</span></a></li>
													
													<li><a href="contact-us.php"><span class="underline">Contact Us</span></a></li>
												</ul>	
											</nav>
													
											<div class="header-right">
												<div class="navbar-search">
													<a class="navbar-search-button" href="#">
														<i class="fa fa-search"></i>
													</a>
													<div class="search-form-wrap show-popup hide"></div>
												</div>
												<div class="navbar-minicart navbar-minicart-topbar">
													<div class="navbar-minicart">
														<a class="minicart-link" href="#">
															<span class="minicart-icon">
																<i class="fa fa-shopping-cart"></i>
																<span>0</span>
															</span>
														</a>
													</div>
												</div>
												<div class="navbar-wishlist">
													<a class="wishlist" href="wishlist.php">
														<i class="fa fa-heart-o"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="header-search-overlay hide">
							<div class="container">
								<div class="header-search-overlay-wrap">
									<form class="searchform">
										<input type="search" class="searchinput" name="s" autocomplete="off" value="" placeholder="Search..."/>
									</form>
									<button type="button" class="close">
										<span aria-hidden="true" class="fa fa-times"></span>
										<span class="sr-only">Close</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class="content-container no-padding">
				<div class="container-full">
					<div class="main-content">
						<div class="row row-fluid">
							<div class="col-sm-12">
								<div class="rev_slider_wrapper fullwidthbanner-container">
									<div id="rev_slider" class="rev_slider fullwidthabanner">
										<ul>  
											<li data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide">
 
												<img src="images/slideshow/dummy.png" alt="" width="1920" height="656" data-lazyload="images/slideshow/slider_1920x657.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg">
 
												<div class="tp-caption home1-small-black tp-resizeme" data-x="556" data-y="217" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];rZ:0deg;sX:0.7;sY:0.7;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="500" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05">
													best flagships in 2018
												</div>
 
												<div class="tp-caption primary-button rev-btn" data-x="588" data-y="342" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:0;e:Linear.easeNone;" data-style_hover="c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bs:solid;bw:1px;cursor:pointer;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power2.easeInOut;" data-transform_out="y:[100%];rZ:0deg;sX:0.7;sY:0.7;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-responsive="off">
													shop now
												</div>
 
												<div class="tp-caption home1-primary tp-resizeme" data-x="427" data-y="261" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];rZ:0deg;sX:0.7;sY:0.7;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="500" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05">
													time for an upgrade.      
												</div>
 
												<div class="tp-caption tp-resizeme" data-x="-251" data-y="21" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="x:[-100%];s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500" data-responsive_offset="on">
													<img src="images/slideshow/dummy.png" alt="" width="531" height="826" data-ww="354px" data-hh="550px" data-lazyload="images/slideshow/pixel2.png">
												</div>
 
												<div class="tp-caption tp-resizeme" data-x="172" data-y="311" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power2.easeInOut;" data-transform_out="y:[100%];s:1000;s:1000;" data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500" data-responsive_offset="on">
													<img src="images/slideshow/dummy.png" alt="" width="260" height="303" data-ww="260px" data-hh="303px" data-lazyload="images/slideshow/essential.webp">
												</div>
 
												<div class="tp-caption tp-resizeme" data-x="281" data-y="390" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power2.easeInOut;" data-transform_out="y:[100%];s:1000;s:1000;" data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500" data-responsive_offset="on">
													<img src="images/slideshow/dummy.png" alt="" width="221" height="228" data-ww="221px" data-hh="228px" data-lazyload="images/slideshow/samsung.png">
												</div>
 
												<div class="tp-caption tp-resizeme" data-x="768" data-y="356" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="x:[100%];s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500" data-responsive_offset="on">
													<img src="images/slideshow/dummy.png" alt="" width="1817" height="621" data-ww="605px" data-hh="207px" data-lazyload="images/slideshow/iphone.png">
												</div>
											</li>
 
											<li data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide">
 
												<img src="images/slideshow/dummy.png" alt="" data-lazyload="images/slideshow/slider_1920x657.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg">
 
 
												<div class="tp-caption tp-resizeme" data-x="-191" data-y="246" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="x:-50px;opacity:0;s:300;e:Power2.easeInOut;" data-transform_out="x:-50px;opacity:0;s:300;s:300;" data-start="500" data-responsive_offset="on">
													<img src="images/slideshow/dummy.png" alt="" width="704" height="248" data-ww="704px" data-hh="248px" data-lazyload="images/slideshow/essential.png">
												</div>
 
												<div class="tp-caption home1-small-black tp-resizeme" data-x="610" data-y="183" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeOut;" data-transform_out="y:[100%];rZ:0deg;sX:0.7;sY:0.7;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on">
													best flagships in 2018
												</div>
 
												<div class="tp-caption primary-button rev-btn" data-x="610" data-y="402" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:0;e:Linear.easeNone;" data-style_hover="c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bs:solid;bw:1px;cursor:pointer;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeOut;" data-transform_out="y:[100%];rZ:0deg;sX:0.7;sY:0.7;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-responsive="off">
													shop now
												</div>
 
												<div class="tp-caption home1-primary tp-resizeme" data-x="610" data-y="227" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeOut;" data-transform_out="y:[100%];rZ:0deg;sX:0.7;sY:0.7;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on">
													The Essential Phone
												</div>
 
												<div class="tp-caption home3-small-black tp-resizeme" data-x="610" data-y="296" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeOut;" data-transform_out="y:[100%];rZ:0deg;sX:0.7;sY:0.7;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on">
													Get the thinnest bazels ever<br> with the all new Essential Phone<br> today!
												</div>
											</li>
										</ul>
										<div class="tp-bannertimer tp-bottom"></div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="container">
							<div class="row shipping-policy">
								<div class="policy-featured-col col-md-4 col-sm-6">
									<i class="fa fa-money"></i>
									<h4 class="policy-featured-title">
										100% <br> Return Money
									</h4>
									Free return standard order in 30 days 
								</div>
								<div class="policy-featured-col col-md-4 col-sm-6">
									<i class="fa fa-globe"></i>
									<h4 class="policy-featured-title">
										World Wide <br> Delivery
									</h4>
									Free ship for payment over £100 
								</div>
								<div class="policy-featured-col col-md-4 col-sm-6">
									<i class="fa fa-clock-o"></i>
									<h4 class="policy-featured-title">
										24h <br> Shipment 
									</h4>
									For standard package 
								</div>
							</div>
						</div>
						<div class="container">
							<div class="row row-fluid mb-10">
								<div class="col-sm-12">
									<div class="caroufredsel product-slider nav-position-center" data-height="variable" data-visible-min="1" data-responsive="1" data-infinite="1" data-autoplay="0">
										<div class="product-slider-title">
											<h3 class="el-heading">New Arrivals</h3>
										</div>
										<div class="caroufredsel-wrap">
											<div class="commerce columns-4">
												<ul class="products columns-4" data-columns="4">
													<?php foreach ($arrival as $arrivals) : ?>
													<li class="product product-no-border style-2">
														<div class="product-container">
															<figure>
																<div class="product-wrap">
																	<div class="product-images">
																		<div class="shop-loop-thumbnail shop-loop-front-thumbnail">
																			<a href="shop-detail.php?item_id=<?php echo $arrivals['itemID'];?>&item_cat_id=<?php echo $arrivals['itemCatID'];?>"><img width="450" height="450" src="images/products/<?php echo $arrivals['frontImg'];?>" alt=""/></a>
																		</div>
																		<div class="shop-loop-thumbnail shop-loop-back-thumbnail">
																			<a href="shop-detail.php?item_id=<?php echo $arrivals['itemID'];?>&item_cat_id=<?php echo $arrivals['itemCatID'];?>"><img width="450" height="450" src="images/products/<?php echo $arrivals['backImg'];?>" alt=""/></a>
																		</div>
																	</div>
																</div>
																<figcaption>
																	<div class="shop-loop-product-info">
																		<div class="info-meta clearfix">
																			<div class="star-rating">
																				<span style="width:0%"></span>
																			</div>
																			<div class="loop-add-to-wishlist">
																				<div class="yith-wcwl-add-to-wishlist">
			                                                                        <div class="yith-wcwl-add-button">
			                                                                            <a href="#" class="add_to_wishlist">
			                                                                                Add to Wishlist
			                                                                            </a>
			                                                                        </div>
			                                                                    </div>
			                                                                </div>
																		</div>
																		<div class="info-content-wrap">
																			<h3 class="product_title">
																				<a href="shop-detail.php?item_id=<?php echo $arrivals['itemID'];?>&item_cat_id=<?php echo $arrivals['itemCatID'];?>"><?php echo $arrivals['itemCatName']; ?> <?php echo $arrivals['itemName']; ?></a>
																			</h3>
																			<div class="info-price">
																			<span class="price">
																				<span class="amount">&zwnj;</span> <!--temporary solution for button css problem (invisible character) -->
																			</span>
																		</div>
																			<div class="loop-action">
																				<div class="loop-add-to-cart">
																					<a href="#" class="add_to_cart_button">
																						Add to cart
																					</a>
																				</div>
																			</div>
																		</div>
																	</div>
																</figcaption>
															</figure>
														</div>
													</li>
													<?php endforeach ?>
												</ul>
											</div>
											<a href="#" class="caroufredsel-prev"></a>
											<a href="#" class="caroufredsel-next"></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="container-full">
							<div class="row row-fluid custom-bg-2 mb-5">
								<div class="container">
									<div class="col-sm-7 pt-9">
										<p class="white italic size-15 mb-0">The new</p>
										<h2 class="custom_heading white mt-0">Nokia 8 Sirrocco</h2>
										<p class="white">Nokia has, with the Nokia 8 Sirocco created a robust phone, which they say is unbendable. Having been carved out of a single piece of stainless steel, machined for hours into a solid, yet uniquely slim and compact shape. With this strength it is a phone you can depend on.<br><br>

It has a design which features 3D Corning Gorilla Glass 5 for a stunning look, which is captivating and robust. With an improved specification to exceed even the most demanding requirements. Including 6G RAM, 128GB internal storage and the latest version of Android Oreo in its pure form.</p>
									</div>
									<div class="col-sm-5">
										<div class="special-product">
											<div class="special-product-wrap">
												<div class="special-product-image">
													<a href="#">
														<img width="470" height="470" src="images/nokia8s.png" alt="special_product"/>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="container">
							<div class="row row-fluid mt-2">
								<div class="col-sm-12">
									<div data-layout="masonry" data-masonry-column="4" class="commerce products-masonry masonry">
										<div class="masonry-filter">
											<div class="filter-action filter-action-center">
												<ul data-filter-key="filter">
													<?php foreach ($categorytype as $categoryType) : ?>
													<li><a data-masonry-toogle="selected" href="#" data-filter-value=".<?php echo $categoryType['itemCatName']; ?>"><?php echo $categoryType['itemCatName']; ?>
													</a>											
													</li>
													<?php endforeach; ?>
												</ul>
											</div>
										</div>
										<div class="products-masonry-wrap">
											<ul class="products masonry-products row masonry-wrap">
												<?php foreach ($item as $allItems) : ?>
												<li class="product masonry-item product-no-border style-2 col-md-3 col-sm-6 flagships <?php echo $allItems['itemCatName']; ?>"><!--add instead of donec the code to extract the category of the code-->
													<div class="product-container">
														<figure>
															<div class="product-wrap">
																<div class="product-images">
																	<div class="shop-loop-thumbnail shop-loop-front-thumbnail">
																		<!--to add more value use &namevalue=value(that can be the phpcode-->
																		<a href="shop-detail.php?item_id=<?php echo $allItems['itemID']; ?>&item_cat_id=<?php echo $allItems['itemCatID']; ?>"><img width="450" height="450" src="images/products/<?php echo $allItems['frontImg']; ?>" alt=""/></a>
																	</div>
																	<div class="shop-loop-thumbnail shop-loop-back-thumbnail">
																		<a href="shop-detail-1.html"><img width="450" height="450" src="images/products/<?php echo $allItems['backImg']; ?>" alt=""/></a>
																	</div>
																</div>
															</div>
															<figcaption>
																<div class="shop-loop-product-info">
																	<div class="info-meta clearfix">
																		<div class="star-rating">
																			<span style="width:0%"></span>
																		</div>
																		<div class="loop-add-to-wishlist">
																			<div class="yith-wcwl-add-to-wishlist">
		                                                                        <div class="yith-wcwl-add-button">
		                                                                            <a href="#" class="add_to_wishlist">
		                                                                                Add to Wishlist
		                                                                            </a>
		                                                                        </div>
		                                                                    </div>
		                                                                </div>
																	</div>
																	<div class="info-content-wrap">
																		<h3 class="product_title">
																			<a href="shop-detail-1.html"><?php echo $allItems['itemCatName'] ?> <?php echo $allItems['itemName'] ?></a>
																		</h3>
																		
																		<div class="info-price">
																			<span class="price">
																				<span class="amount">&zwnj;</span> <!--temporary solution for button css problem (invisible character) -->
																			</span>
																		</div>
																		<div class="loop-action">
																			<div class="loop-add-to-cart">
																				<a href="#" class="add_to_cart_button">
																					Add to cart
																				</a>
																			</div>
																		</div>
																	</div>
																</div>
															</figcaption>
														</figure>
													</div>
												</li>
												<?php endforeach; ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="container">
							<div class="row row-fluid brands mb-3">
								<div class="col-sm-6">
									<h3 class="custom_heading">BRANDS</h3>
									<div class="client client-grid">
										<div class="row">
											<div class="col-md-4 col-sm-6">
												<div class="client-item">
													<a target="_blank" href="#">
														<img alt="" src="images/brand/nokia.png" class="grayscale">
													</a>
												</div>
											</div>
											<div class="col-md-4 col-sm-6">
												<div class="client-item">
													<a target="_blank" href="#">
														<img alt="" src="images/brand/samsung.png" class="grayscale">
													</a>
												</div>
											</div>
											<div class="col-md-4 col-sm-6">
												<div class="client-item">
													<a target="_blank" href="#">
														<img alt="" src="images/brand/apple.png" class="grayscale">
													</a>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 col-sm-6">
												<div class="client-item">
													<a target="_blank" href="#">
														<img alt="" src="images/brand/oneplus.png" class="grayscale">
													</a>
												</div>
											</div>
											<div class="col-md-4 col-sm-6">
												<div class="client-item">
													<a target="_blank" href="#">
														<img alt="" src="images/brand/lg.png" class="grayscale">
													</a>
												</div>
											</div>
											<div class="col-md-4 col-sm-6">
												<div class="client-item">
													<a target="_blank" href="#">
														<img alt="" src="images/brand/huawei.png" class="grayscale">
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h3 class="custom_heading">WHAT CLIENTS SAY</h3>
									<div class="testimonial style-2 mb-5">
										<div class="caroufredsel" data-visible-min="1" data-visible-max="2" data-scroll-fx="scroll" data-speed="5000" data-responsive="1" data-infinite="1" data-autoplay="0">
											<div class="caroufredsel-wrap">
												<ul class="caroufredsel-items">
													<li class="caroufredsel-item col-sm-12">
														<div class="testimonial-wrap">
															<div class="testimonial-text">
																<span>&ldquo;</span>
																When I need a new phone, I go straight to PhoneBits, because I know they are always reliable and fast.
																<span>&rdquo;</span>
															</div>
															<div class="clearfix">
																<div class="testimonial-avatar">
																	<img src="images/avatar/client1.jpeg" alt=""/>
																</div>
																<span class="testimonial-author">Alexander Mach</span>
																<span class="testimonial-company">Client</span>
															</div>
														</div>
													</li>
													<li class="caroufredsel-item col-sm-12">
														<div class="testimonial-wrap">
															<div class="testimonial-text">
																<span>&ldquo;</span>
																I love the PhoneBits website. It's so easy to buy new products from them.
																<span>&rdquo;</span>
															</div>
															<div class="clearfix">
																<div class="testimonial-avatar">
																	<img src="images/avatar/client2.jpg" alt=""/>
																</div>
																<span class="testimonial-author">Michael Hen</span>
																<span class="testimonial-company">Client</span>
															</div>
														</div>
													</li>
												</ul>
												<a href="#" class="caroufredsel-prev hide"></a>
												<a href="#" class="caroufredsel-next hide"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<footer id="footer" class="footer">
				<div class="footer-newsletter">
					<div class="container">
						<div class="footer-newsletter-wrap">
							<h3 class="footer-newsletter-heading">NEWSLETTER</h3>
							<form class="mailchimp-form">
								<div class="mailchimp-form-content clearfix">
									<label for="subscribe_email" class="hide">Subscribe</label>
									<input type="email" id="subscribe_email" class="form-control" required="required" placeholder="Enter your email..." name="email">
									<button type="submit" class="btn mailchimp-submit">sign up</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="footer-featured">
					<div class="container">
						<div class="row">
							<div class="footer-featured-col col-md-4 col-sm-6">
								<i class="fa fa-money"></i>
								<h4 class="footer-featured-title">
									100% <br> return money
								</h4>
								Free return standard order in 30 days 
							</div>
							<div class="footer-featured-col col-md-4 col-sm-6">
								<i class="fa fa-globe"></i>
								<h4 class="footer-featured-title">
									world wide <br> delivery
								</h4>
								Free ship for payment over £100
							</div>
							<div class="footer-featured-col col-md-4 col-sm-6">
								<i class="fa fa-clock-o"></i>
								<h4 class="footer-featured-title">
									24h <br> shipment 
								</h4>
								For standard package 
							</div>
						</div>
					</div>
				</div>
				<div class="footer-widget">
					<div class="container">
						<div class="footer-widget-wrap">
							<div class="row">
								<div class="footer-widget-col col-md-3 col-sm-6">
									<div class="widget widget_text">
										<div class="textwidget">
											<ul class="address">
												<li>
													<i class="fa fa-home"></i>
													<h4>Address:</h4>
													<p>St Mary's Rd, W5 5RF, London</p>
												</li>
												<li>
													<i class="fa fa-mobile"></i>
													<h4>Phone:</h4>
													<p>(00) 123 456 789</p>
												</li>
												<li>
													<i class="fa fa-envelope"></i>
													<h4>Email:</h4>
													<p><a href="mailto:email@domain.com">phonebits@uwl.co.uk</a></p>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="footer-widget-col col-md-3 col-sm-6">
									<div class="widget widget_nav_menu">
										<h3 class="widget-title">
											<span>information</span>
										</h3>
										<div class="menu-infomation-container">
											<ul class="menu">
												<li><a href="#">Contact Us</a></li>
												
												
												
											</ul>
										</div>
									</div>
								</div>
								<div class="footer-widget-col col-md-3 col-sm-6">
									<div class="widget widget_nav_menu">
										<h3 class="widget-title">
											<span>Customer Care</span>
										</h3>
										<div class="menu-customer-care-container">
											<ul class="menu">
												<li><a href="#">Sitemap</a></li>
												
											</ul>
										</div>
									</div>
								</div>
								<div class="footer-widget-col col-md-3 col-sm-6">
									<div class="widget widget_text">
										
											<h3 class="widget-title">
												<span>payment Method</span>
											</h3>
											<div class="payment">
												<a href="#"><i class="fa fa-cc-mastercard"></i></a>
												<a href="#"><i class="fa fa-cc-visa"></i></a>
												<a href="#"><i class="fa fa-cc-paypal"></i></a>
												<a href="#"><i class="fa fa-cc-amex"></i></a>
											</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright text-center">
					© 2018 PHONEBITS - Group Project 
				</div>
			</footer>
		</div>

		<div class="modal fade user-login-modal" id="userloginModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="userloginModalForm">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title">Login</h4>
						</div>
						<div class="modal-body">
							<div class="user-login-facebook">
								<button class="btn-login-facebook" type="button">
									<i class="fa fa-facebook"></i>Sign in with Facebook
								</button>
							</div>
							<div class="user-login-or"><span>or</span></div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" id="username" name="log" required class="form-control" value="" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" id="password" required value="" name="pwd" class="form-control" placeholder="Password">
							</div>
							<div class="checkbox clearfix">
								<label class="form-flat-checkbox pull-left">
									<input type="checkbox" name="rememberme" id="rememberme" value="forever">
									<i></i>&nbsp;Remember Me
								</label>
								<span class="lostpassword-modal-link pull-right">
									<a href="#lostpasswordModal" data-rel="lostpasswordModal">Lost your password?</a>
								</span>
							</div>
						</div>
						<div class="modal-footer">
							<span class="user-login-modal-register pull-left">
								<a data-rel="registerModal" href="#">Not a Member yet?</a>
							</span>
							<button type="submit" class="btn btn-default btn-outline">Sign in</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade user-register-modal" id="userregisterModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="userregisterModalForm" action="user_registration.php" method="post">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title">Register account</h4>
						</div>
						<div class="modal-body">
							<div class="user-login-facebook">
								<button class="btn-login-facebook" type="button">
									<i class="fa fa-facebook"></i>Sign in with Facebook
								</button>
							</div>
							<div class="user-login-or"><span>or</span></div>
							<div class="form-group">
								<label>First Name</label>
								<input type="text" id="firstName" name="firstName" required class="form-control" value="" placeholder="Username">
							</div>
							<div class="form-group">
								<label>Middle Name</label>
								<input type="text" id="middleName" name="middleName" required class="form-control" value="" placeholder="Username">
							</div>
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" id="lastName" name="lastName"  required class="form-control" value="" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="user_email">Email</label>
								<input type="email" id="email" name="email" required class="form-control" value="" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="user_password">Password</label>
								<input type="password" id="pass" required value="" name="pass" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="user_password">Retype password</label>
								<input type="password" id="cuser_password" required value="" name="cuser_password" class="form-control" placeholder="Retype password">
							</div>
						</div>
						<div class="modal-footer">
							<span class="user-login-modal-link pull-left">
								<a data-rel="loginModal" href="#loginModal">Already have an account?</a>
							</span>
							<button type="submit" class="btn btn-default btn-outline">Register</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade user-lostpassword-modal" id="userlostpasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="userlostpasswordModalForm">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title">Forgot Password</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Username or E-mail:</label>
								<input type="text" name="user_login" required class="form-control" value="" placeholder="Username or E-mail">
							</div>
						</div>
						<div class="modal-footer">
							<span class="user-login-modal-link pull-left">
								<a data-rel="loginModal" href="#loginModal">Already have an account?</a>
							</span>
							<button type="submit" class="btn btn-default btn-outline">Sign in</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="minicart-side">
			<div class="minicart-side-title">
				<h4>Shopping Cart</h4>
			</div>
			<div class="minicart-side-content">
				<div class="minicart">
					<div class="minicart-header no-items show">
						Your shopping bag is empty.
					</div>
					<div class="minicart-footer">
						<div class="minicart-actions clearfix">
							<a class="button no-item-button" href="#">
								<span class="text">Go to the shop</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-migrate.min.js"></script>
		<script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="js/easing.min.js"></script>
		<script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/superfish-1.7.4.min.js"></script>
		<script type="text/javascript" src="js/jquery.appear.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/swatches-and-photos.js"></script>
		<script type="text/javascript" src="js/jquery.cookie.min.js"></script>
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
		<script type="text/javascript" src="js/jquery.prettyPhoto.init.min.js"></script>
		<script type="text/javascript" src="js/jquery.selectBox.min.js"></script>
		<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" src="js/jquery.transit.min.js"></script>
		<script type="text/javascript" src="js/jquery.carouFredSel.js"></script>
		<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
		<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>

		<script type="text/javascript" src="js/extensions/revolution.extension.video.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.slideanims.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.actions.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.kenburn.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.navigation.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.migration.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.parallax.min.js"></script>
		<script type="text/javascript">

			var tpj=jQuery;
			
			var revapi7;
			tpj(document).ready(function() {
				if(tpj("#rev_slider").revolution == undefined){
					revslider_showDoubleJqueryError("#rev_slider");
				}else{
					revapi7 = tpj("#rev_slider").show().revolution({
						sliderType:"standard",
						sliderLayout:"fullwidth",
						dottedOverlay:"none",
						delay:9000,
						navigation: {
							keyboardNavigation:"off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation:"off",
							onHoverStop:"on",
							touch:{
								touchenabled:"on",
								swipe_threshold: 75,
								swipe_min_touches: 50,
								swipe_direction: "horizontal",
								drag_block_vertical: false
							}
							,
							arrows: {
								style:"gyges",
								enable:true,
								hide_onmobile:true,
								hide_under:600,
								hide_onleave:true,
								hide_delay:200,
								hide_delay_mobile:1200,
								tmp:'',
								left: {
									h_align:"left",
									v_align:"center",
									h_offset:30,
									v_offset:0
								},
								right: {
									h_align:"right",
									v_align:"center",
									h_offset:30,
									v_offset:0
								}
							}
							,
							bullets: {
								enable:true,
								hide_onmobile:true,
								hide_under:600,
								style:"hephaistos",
								hide_onleave:true,
								hide_delay:200,
								hide_delay_mobile:1200,
								direction:"horizontal",
								h_align:"center",
								v_align:"bottom",
								h_offset:0,
								v_offset:30,
								space:5,
								tmp:''
							}
						},
						gridwidth:1170,
						gridheight:600,
						lazyType:"smart",
						parallax: {
							type:"mouse",
							origo:"slidercenter",
							speed:2000,
							levels:[2,3,4,5,6,7,12,16,10,50],
						},
						shadow:0,
						spinner:"off",
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,
						shuffle:"off",
						autoHeight:"off",
						disableProgressBar:"on",
						hideThumbsOnMobile:"off",
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						startWithSlide:0,
						debugMode:false,
						fallbacks: {
							simplifyAll:"off",
							nextSlideOnWindowFocus:"off",
							disableFocusListener:false,
						}
					});
				}
			});	/*ready*/
		</script>
	</body>
</html>