<?php
//get total per ID USER
$queryTotBasket = 'SELECT SUM(itemBasketQTY*itemBasketPrice) AS total
FROM basket
WHERE userID = 1;';
$statement1= $db->prepare($queryTotBasket);
$statement1->execute();
$totalBasket = $statement1->fetch();
$statement1->closeCursor();
//get total item in the basket ID USER
$queryTotItemBasket = 'SELECT sum(itemBasketQTY) AS totItem
FROM basket
WHERE userID = 1;';
$statement9= $db->prepare($queryTotItemBasket);
$statement9->execute();
$totalItemBasket = $statement9->fetch();
$statement9->closeCursor();
?>

<!doctype html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<title>Contact Us | HTML Commerce Template</title>
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
					<a class="offcanvas-user-account-link" href="my-account.html">
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
													<i class="elegant_icon_bag"></i><span><?php echo $totalItemBasket['totItem']; ?></span>
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
													
													<li><a href="contact-us.html"><span class="underline">Contact Us</span></a></li>
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
																<span><?php echo $totalItemBasket['totItem']; ?></span>
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
			<div class="heading-container">
				<div class="container heading-standar">
					<div class="page-breadcrumb">
						<ul class="breadcrumb">
							<li>
								<span>
									<a class="home" href="#">
										<span>Home</span>
									</a>
								</span>
							</li>
							<li>
								<span>My Wishlist</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="content-container">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="main-content">
								<form class="commerce">
									<div class="wishlist-title ">
										<h2>My wishlist</h2>
									</div>
									<table class="shop_table cart wishlist_table">
										<thead>
											<tr>
												<th class="product-remove"></th>
												<th class="product-thumbnail"></th>
												<th class="product-name"><span class="nobr">Phone Name</span></th>
												<th class="product-price"><span class="nobr">Color </span></th>
												<th class="product-price"><span class="nobr">Memory </span></th>
												<th class="product-price"><span class="nobr">Price </span></th>
												<th class="product-stock-stauts"><span class="nobr">Stock Status </span></th>
												<th class="product-add-to-cart"></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="product-remove">
													<a href="#" class="remove remove_from_wishlist">&times;</a>
												</td>
												<td class="product-thumbnail">
													<a href="shop-detail-1.html">
														<img width="100" height="150" src="images/products/product_328x328.png" alt="Product-1"/>
													</a>
												</td>
												<td class="product-name">
													<a href="shop-detail-1.html">Samsung Galaxy S9</a>
												</td>
												<td class="product-price">
													<span class="amount">
														Black</span>
												</td>
												<td class="product-price">
													<span class="amount">
														64GB</span>
												</td>
												<td class="product-price">
													<span class="amount">
														£699</span>
												</td>
												<td class="product-stock-status">
													<span class="wishlist-in-stock">In Stock</span>
												</td>
												<td class="product-add-to-cart">
											 		<a href="#" class="add_to_cart_button button rounded"> Add to cart</a>
												</td>
											</tr>
											<tr>
												<td class="product-remove">
													<a href="#" class="remove remove_from_wishlist">&times;</a>
												</td>
												<td class="product-thumbnail">
													<a href="shop-detail-1.html">
														<img width="100" height="150" src="images/products/huaweiMate10Front.png" alt="Product-2"/>
													</a>
												</td>
												<td class="product-name">
													<a href="shop-detail-1.html">Huawei Mate 10</a>
												</td>
												<td class="product-price">
													<span class="amount">
														Black</span>
												</td>
												<td class="product-price">
													<span class="amount">
														64GB</span>
												</td>
												<td class="product-price">
													<span class="amount">
														£599</span>
													
												</td>
												<td class="product-stock-status">
													<span class="wishlist-in-stock">In Stock</span>
												</td>
												<td class="product-add-to-cart">
											 		<a href="#" class="add_to_cart_button button rounded"> Add to cart</a>
												</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="6">&nbsp;</td>
											</tr>
										</tfoot>
									</table>
								</form>
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
					<div class="minicart-header">
						<?php echo $totalItemBasket['totItem']; ?> items in the shopping cart
					</div>
					<div class="minicart-body">
						<?php foreach($basket as $basketItem) :?>
						<div class="cart-product clearfix">
							<div class="cart-product-image">
								<a class="cart-product-img" href="#">
									<img width="300" height="300" src="images/products/<?php echo $basketItem['frontImg']; ?>" alt=""/>
								</a>
							</div>
							<div class="cart-product-details">
								<div class="cart-product-title">
									<a href="#"><?php echo $basketItem['itemCatName']; ?>  <?php echo $basketItem['itemName']; ?></a>
								</div>
								<div class="cart-product-quantity-price">
									<?php echo $basketItem['itemBasketQTY']; ?> x <span class="amount">&pound;<?php echo $basketItem['itemBasketPrice']; ?></span>
								</div>
							</div>
							<form title="Remove this item" action="removeItem.php" method="post">&times;
								<input type="hidden" name="item_id" value="<?php echo $basketItem['itemID']; ?>">
								<input type="hidden" name="item_cat_id" value="<?php echo $basketItem['itemCatID']; ?>">
								<input type="hidden" name="memory_id" value="<?php echo $basketItem['memoryID']; ?>">
								<input type="hidden" name="color_id" value="<?php echo $basketItem['colorID']; ?>">
								<input type="hidden" name="item_det_id" value="<?php echo $basketItem['itemDetID']; ?>">
								<input type="hidden" name="basket_item_id" value="<?php echo $basketItem['basketItemID']; ?>">
								<input type="submit" value="&times;" class="remove">
							</form>
						</div>
						<?php endforeach; ?>
					</div>
					<div class="minicart-footer">
						<div class="minicart-total">
							Cart Subtotal <span class="amount">&pound;<?php echo $totalBasket['total']; ?></span>
						</div>
						<div class="minicart-actions clearfix">
							<a class="viewcart-button button" href="#">
								<span class="text">View Cart</span>
							</a>
							<a class="checkout-button button" href="#">
								<span class="text">Checkout</span>
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
		<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
	</body>
</html>