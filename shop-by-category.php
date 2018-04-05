<!doctype html>
<?php
//connetion to database
require_once('database.php');
//query to get memorysize
$queryMemory = 'SELECT memorySize FROM memory GROUP BY memorySize';
$statement1= $db->prepare($queryMemory);
$statement1->execute();
$memory = $statement1->fetchAll();
$statement1->closeCursor();
//query to get color
$queryColor = 'SELECT colorName FROM color GROUP BY colorName';
$statement2= $db->prepare($queryColor);
$statement2->execute();
$color = $statement2->fetchAll();
$statement2->closeCursor();
//query to get brand
$queryBrands = 'SELECT itemCatName FROM itemcategory';
$statement3= $db->prepare($queryBrands);
$statement3->execute();
$brands = $statement3->fetchAll();
$statement3->closeCursor();
//query to get brand
$queryCountBrands = 'SELECT COUNT (itemDetID) FROM itemDetails GROUP BY itemCatID';
$statement4= $db->prepare($queryCountBrands);
$statement4->execute();
$brandsCount = $statement4->fetchAll();
$statement4->closeCursor();
//Get all item (from itemdetails because we need all the item)
//query to get the item
$queryItems = 'SELECT itemCategory.itemCatName, item.itemName, item.itemCatID, item.itemID, item.frontImg, item.backImg, itemdetails.itemPrice, itemdetails.memoryID, memory.memorySize, color.colorName
FROM itemdetails
INNER JOIN itemCategory ON itemCategory.itemCatID = itemdetails.itemCatID AND itemdetails.itemCatID = itemCategory.itemCatID 
INNER JOIN memory ON memory.memoryID = itemdetails.memoryID
INNER JOIN color ON color.colorID = itemdetails.colorID
INNER JOIN item ON item.itemID = itemdetails.itemID and itemdetails.itemCatID = item.itemCatID
GROUP BY itemDetID';
$statement= $db->prepare($queryItems);
$statement->execute();
$items = $statement->fetchAll();
$statement->closeCursor();
?>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<title>Shop | PhoneBits</title>
		<link rel="shortcut icon" href="images/favicon.ico">

		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/swatches-and-photos.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/jquery.selectBox.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic%7CCrimson+Text:400,400italic,600,600italic,700,700italic" type="text/css" media="all"/>
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
								<div class="left-topbar">
									Register for a faster checkout  |  
 									<a href="#">Register<i class="fa fa-long-arrow-right"></i></a>
								</div>
							</div>
							<div class="col-sm-6 col-right-topbar">
								<div class="right-topbar">
									<div class="user-login">
										<ul class="nav top-nav">
											<li><a data-rel="loginModal" href="#"> <strong>Login</strong> </a></li>
										</ul>
									</div>
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
			<div class="heading-container heading-resize heading-no-button">
				<div class="heading-background heading-parallax bg-shop">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="heading-wrap">
									<div class="page-title">
										<h1>SMARTPHONES</h1>
										<div class="page-breadcrumb">
											<ul class="breadcrumb">
												<li>
													<span><a class="home" href="#"><span>Home</span></a></span>
												</li>
												<li>
													<span><a href="#"><span>Shop</span></a></span> 
												</li>
												<li>
													<span>Smartphones</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content-container commerce page-layout-left-sidebar">
				<div class="container">
					<div class="row">
						<div class="col-md-9 main-wrap">
							<div class="main-content">
								<div class="shop-toolbar">
									<form class="commerce-ordering clearfix">
										<div class="commerce-ordering-select">
											<label class="hide">Sorting:</label>
											<div class="form-flat-select">
												<select name="orderby" class="orderby">
													<option value="" selected='selected'>Default sorting</option>
													<option value="">Sort by popularity</option>
													<option value="">Sort by average rating</option>
													<option value="">Sort by newness</option>
													<option value="">Sort by price: low to high</option>
													<option value="">Sort by price: high to low</option>
												</select>
												<i class="fa fa-angle-down"></i>
											</div>
										</div>
										<div class="commerce-ordering-select">
											<label class="hide">Show:</label>
											<div class="form-flat-select">
												<select name="per_page" class="per_page">
													<option value="" selected='selected'>12</option>
													<option value="">24</option>
													<option value="">36</option>
												</select>
												<i class="fa fa-angle-down"></i>
											</div>
										</div>
									</form>
								</div>
								<div class="shop-loop grid">
									<ul class="products">
										<?php foreach ($items as $itemDetails) :  ?>
										<li class="product product-no-border style-2 col-md-3 col-sm-6">
											<div class="product-container">		
												<figure>
													<div class="product-wrap">
														<div class="product-images">
															<div class="shop-loop-thumbnail shop-loop-front-thumbnail">
																<!--to add more value use &namevalue=value(that can be the phpcode-->
																<a href="shop-detail.php?item_id=<?php echo $itemDetails['itemID']; ?>&item_cat_id=<?php echo $itemDetails['itemCatID']; ?>"><img width="450" height="450" src="images/products/<?php echo $itemDetails['frontImg']; ?>" alt=""/></a>
															</div>
															<div class="shop-loop-thumbnail shop-loop-back-thumbnail">
																<a href="shop-detail-1.html"><img width="450" height="450" src="images/products/<?php echo $itemDetails['backImg']; ?>" alt=""/></a>
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
																	<a href="<?php echo $itemDetails['itemID']; ?>&item_cat_id=<?php echo $itemDetails['itemCatID']; ?>"><?php echo $itemDetails['itemCatName']; ?> <?php echo $itemDetails['itemName']; ?> - <?php echo $itemDetails['memorySize']; ?>GB - <?php echo $itemDetails['colorName']; ?></a>
																</h3>
																<div class="info-price">
																	<span class="price">
																		<span class="amount">£<?php echo $itemDetails['itemPrice']; ?></span>
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
						<div class="col-md-3 sidebar-wrap">
							<div class="main-sidebar">
								<div class="widget commerce widget_product_search">
									<h4 class="widget-title">
										<span>Product Search</span>
									</h4>
									<form class="commerce-product-search">
										<label class="screen-reader-text" for="s">Search for:</label>
										<input type="search" class="search-field rounded" placeholder="Search Products&hellip;" value="" name="s"/>
										<input type="submit" value="Search"/>
									</form>
								</div>
								<div class="widget widget_layered_nav">
									<h4 class="widget-title"><span>Brands</span></h4>
									<ul>
										<!--Adding selection for brand -->
										<?php foreach ($brands as $brandName) : ?>
										<li>
											<a href="#"><?php echo $brandName['itemCatName']; ?></a> <small class="count">0</small>
										</li>
										<?php endforeach ; ?>
									</ul>
								</div>
								<div class="widget widget_layered_nav">
									<h4 class="widget-title">
										<span>Filter by Color</span>
									</h4>
									<ul>
										<!--Adding selection for color -->
										<?php foreach ($color as $colorName) : ?>
										<li>
											<a href="#"><?php echo $colorName['colorName']; ?></a> 
											<span class="count">(1)</span>
										</li>
										<?php endforeach ; ?>
									</ul>
								</div>
								<div class="widget widget_price_filter">
									<h4 class="widget-title"><span>Price</span></h4>
									<form>
										<div class="price_slider_wrapper">
											<div class="price_slider"></div>
											<div class="price_slider_amount">
												<input type="text" id="min_price" name="min_price" value="" data-min="10" placeholder="Min price"/>
												<input type="text" id="max_price" name="max_price" value="" data-max="732" placeholder="Max price"/>
												<button type="submit" class="button">Filter</button>
												<div class="price_label">
													Price: <span class="from"></span> &mdash; <span class="to"></span>
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</form>
								</div>
								
								<div class="widget widget_product_categories">
									<h4 class="widget-title"><span>Memory</span></h4>
									<ul class="product-categories">
										<!--Adding selection for memory -->
										<?php foreach ($memory as $memorySize) : ?>
										<li><a href="#"><?php echo $memorySize['memorySize']; ?> GB</a></li>
										<?php endforeach; ?>
									</ul>
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
					<form id="userregisterModalForm">
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
								<label>Username</label>
								<input type="text" name="user_login" required class="form-control" value="" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="user_email">Email</label>
								<input type="email" id="user_email" name="user_email" required class="form-control" value="" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="user_password">Password</label>
								<input type="password" id="user_password" required value="" name="user_password" class="form-control" placeholder="Password">
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
		<script type="text/javascript" src="js/jquery.parallax.js"></script>

		<script type="text/javascript" src="js/core.min.js"></script>
		<script type="text/javascript" src="js/widget.min.js"></script>
		<script type="text/javascript" src="js/mouse.min.js"></script>
		<script type="text/javascript" src="js/slider.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-touch-punch.min.js"></script>
		<script type="text/javascript" src="js/price-slider.js"></script>
	</body>
</html>