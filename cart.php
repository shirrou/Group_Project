<?php
require_once('database.php');
//Select all the item from basket table
//query to get the item
$queryBasketItem = 'SELECT itemCategory.itemCatName, itemdetails.itemDetID, basket.itemID, item.itemName, itemdetails.itemPrice, basket.itemBasketQTY, color.colorName, basket.colorID, basket.itemCatID, basket.memoryID, memory.memorySize, basket.itemBasketPrice, basket.basketItemID, item.frontImg
FROM basket
INNER JOIN itemCategory ON itemCategory.itemCatID = basket.itemCatID
INNER JOIN item ON item.itemID = basket.itemID AND item.itemCatID = basket.itemCatID
INNER JOIN color ON color.colorID = basket.colorID
INNER JOIN MEMORY ON memory.memoryID = basket.memoryID
INNER JOIN itemDetails ON itemdetails.itemDetID = basket.itemDetID
WHERE userID = 1
GROUP BY basketItemID;';
$statement= $db->prepare($queryBasketItem);
$statement->execute();
$basket = $statement->fetchAll();
$statement->closeCursor();
?>

<!doctype html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<title>Cart | PhoneBits</title>
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
								<span>Cart</span>
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
								<div class="commerce">
									<form>
										<table class="table shop_table cart">
											<thead>
												<tr>
													<th class="product-remove hidden-xs">&nbsp;</th>
													<th class="product-thumbnail hidden-xs">&nbsp;</th>
													<th class="product-name">Product</th>
													<th class="product-price text-center">Price</th>
													<th class="product-quantity text-center">Quantity</th>
													<th class="product-subtotal text-center hidden-xs">Total</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($basket as $basketItem) : ?>
												<tr class="cart_item">
													<td class="product-remove hidden-xs">
														<form title="Remove this item" action="removeItem.php" method="post">&times;
															<input type="hidden" name="item_id" value="<?php echo $basketItem['itemID']; ?>">
															<input type="hidden" name="item_cat_id" value="<?php echo $basketItem['itemCatID']; ?>">
															<input type="hidden" name="memory_id" value="<?php echo $basketItem['memoryID']; ?>">
															<input type="hidden" name="color_id" value="<?php echo $basketItem['colorID']; ?>">
															<input type="hidden" name="item_det_id" value="<?php echo $basketItem['itemDetID']; ?>">
															<input type="hidden" name="basket_item_id" value="<?php echo $basketItem['basketItemID']; ?>">
															<input type="submit" value="&times;" class="remove">
														</form>
													</td>
													<td class="product-thumbnail hidden-xs">
														<a href="shop-detail.php?item_id=<?php echo $basketItem['itemID']; ?>&item_cat_id=<?php echo $basketItem['itemCatID']; ?>">
															<img width="100" height="150" src="images/products/<?php echo $basketItem['frontImg']; ?>" alt="Product-2"/>
														</a>
													</td>
													<td class="product-name">
														<a href="shop-detail.php?item_id=<?php echo $basketItem['itemID']; ?>&item_cat_id=<?php echo $basketItem['itemCatID']; ?>"><?php echo $basketItem['itemCatName']; ?> <?php echo $basketItem['itemName']; ?></a>
														<dl class="variation">
															<dt class="variation-Color">Color:</dt>
															<dd class="variation-Color"><p><?php echo $basketItem['colorName']; ?></p></dd>
															<dt class="variation-Size">Memory:</dt>
															<dd class="variation-Size"><p><?php echo $basketItem['memorySize']; ?> GB</p></dd>
														</dl>
													</td>
													<td class="product-price text-center">
														<span class="amount">&#36;<?php echo $basketItem['itemPrice']; ?></span>
													</td>
													<td class="product-quantity text-center">
														<div class="quantity">
															<input type="number" step="1" min="0" name="qunatity" value="<?php echo $basketItem['itemBasketQTY']; ?>" title="Qty" class="input-text qty text" size="4"/>
														</div>
													</td>
													<td class="product-subtotal hidden-xs text-center">
														<span class="amount">&#36;<?php echo $basketItem['itemBasketQTY']*$basketItem['itemPrice']; ?></span>
													</td>
												</tr>
												<?php endforeach; ?>
												<tr>
													<td colspan="6" class="actions">
														<div class="coupon">
															<label for="coupon_code">Coupon:</label> 
															<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code"/> 
															<input type="submit" class="button rounded" name="apply_coupon" value="Apply Coupon"/>
														</div>
														<input type="submit" class="button update-cart-button rounded" name="update_cart" value="Update Cart"/>
													</td>
												</tr>
											</tbody>
										</table>
									</form>
									<div class="cart-collaterals">
										
										<div class="cross-sells">
											<h2>Your Payment Details</h2>
											<div class="form-group">
								<label>Credit Card Number</label>
								<input type="text" id="username" name="number" required class="form-control" value="" placeholder="1234 5678 9012 3456">
							</div>
							<div class="form-group">
								<label for="name">Name on Card</label>
								<input type="text" id="username" required value="" name="name" class="form-control" placeholder="Surname Firstname">
							</div>
										<div class="form-group">
								<label for="expiry date">Expiry Date</label>
								<input type="text" id="username" required value="" name="expiry date" class="form-control" placeholder="MM/YYYY">
							</div>
										<div class="form-group">
								<label for="ccv">CCV</label>
								<input type="text" id="username" required value="" name="ccv" class="form-control" placeholder="123">
							</div>
											</ul>
										</div>
										
										<div class="cart_totals">
											<h2>Cart Totals</h2>
											<table>
												<tr class="cart-subtotal">
													<th>Subtotal</th>
													<td><span class="amount">£<?php echo $totalBasket; ?></span></td>
												</tr>
												<tr class="shipping">
													<th>Shipping</th>
													<td><span class="amount">£0.00</span></td>
												</tr>
												<tr class="order-total">
													<th>Total</th>
													<td><strong><span class="amount">£56.00</span></strong></td>
												</tr>
											</table><br>
											<div class="wc-proceed-to-checkout">
												<a href="#" class="checkout-button button alt wc-forward rounded">Submit Payment</a>
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
						2 items in the shopping cart
					</div>
					<div class="minicart-body">
						<div class="cart-product clearfix">
							<div class="cart-product-image">
								<a class="cart-product-img" href="#">
									<img width="300" height="300" src="images/products/product_80x80.jpg" alt=""/>
								</a>
							</div>
							<div class="cart-product-details">
								<div class="cart-product-title">
									<a href="#">Samsung Galaxy S9</a>
								</div>
								<div class="cart-product-quantity-price">
									1 x <span class="amount">&pound;699.00</span>
								</div>
							</div>
							<a href="#" class="remove" title="Remove this item">&times;</a>
						</div>
						<div class="cart-product clearfix">
							<div class="cart-product-image">
								<a class="cart-product-img" href="#">
									<img width="300" height="300" src="images/products/product_80x80.jpg" alt=""/>
								</a>
							</div>
							<div class="cart-product-details">
								<div class="cart-product-title">
									<a href="#">Huawei Mate 10</a>
								</div>
								<div class="cart-product-quantity-price">
									1 x <span class="amount">&pound;599.00</span>
								</div>
							</div>
							<a href="#" class="remove" title="Remove this item">&times;</a>
						</div>
					</div>
					<div class="minicart-footer">
						<div class="minicart-total">
							Cart Subtotal <span class="amount">&pound;378.00</span>
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
	</body>
</html>