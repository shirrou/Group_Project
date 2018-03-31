<?php
require_once('database.php');
//Get Variable
$item_cat_id = $_GET['item_cat_id'];
$item_id = $_GET['item_id'];
// Get all categoryType
$queryAllcategorytype = 'SELECT * FROM itemcategory ORDER BY itemCatID';
$statement2 = $db->prepare($queryAllcategorytype);
$statement2->execute();
$categorytype = $statement2->fetchAll();
$statement2->closeCursor();
// Get name for selected categoryType
$queryCategoryType = 'SELECT * FROM itemcategory WHERE itemCatID = :item_cat_id';
$statement1 = $db->prepare($queryCategoryType);
$statement1->bindValue(':item_cat_id', $item_cat_id);
$statement1->execute();
$categoryType = $statement1->fetch();
$statement1->closeCursor();
// Get details item for selected categoryType and itemID
$queryItemType = 'SELECT * FROM item WHERE itemCatID = :item_cat_id AND itemID = :item_id';
$statement3 = $db->prepare($queryItemType);
$statement3->bindValue(':item_cat_id', $item_cat_id);
$statement3->bindValue(':item_id', $item_id);
$statement3->execute();
$itemType = $statement3->fetch();
$statement3->closeCursor();
//Get memory and price
$queryMemoAndPrice = 'SELECT memorySize, itemPrice FROM memory WHERE itemCatID = :item_cat_id AND itemID = :item_id';
$statement4 = $db->prepare($queryMemoAndPrice);
$statement4->bindValue(':item_cat_id', $item_cat_id);
$statement4->bindValue(':item_id', $item_id);
$statement4->execute();
$queryMeAndPrice = $statement4->fetchAll();
$statement4->closeCursor();
//Get Memory and Price And Color for specific Item (from Item Details that is the item available in stock!)
$queryDetMemAndPriceAndColor = 'SELECT memory.memorySize, itemdetails.memoryID, itemdetails.itemCatID, itemdetails.itemID, memory.itemPrice, color.colorName, itemdetails.colorID, itemdetails.itemDetID
FROM itemdetails
INNER JOIN memory ON memory.memoryID = itemdetails.memoryID 
INNER JOIN color ON color.colorID = itemdetails.colorID
WHERE itemdetails.itemCatID = :item_cat_id AND itemdetails.itemID = :item_id AND itemdetails.itemQty >0';
$stmt = $db->prepare($queryDetMemAndPriceAndColor);
$stmt->bindValue(':item_cat_id', $item_cat_id);
$stmt->bindValue(':item_id', $item_id);
$stmt->execute();
$queryDetMeAndCo = $stmt->fetchAll();
$stmt->closeCursor();	
//get colors for a specific item
$querycolor = 'SELECT * FROM color WHERE itemCatID = :item_cat_id AND itemID = :item_id';
$statement5 = $db->prepare($querycolor);
$statement5->bindValue(':item_cat_id', $item_cat_id);
$statement5->bindValue(':item_id', $item_id);
$statement5->execute();
$queryColors = $statement5->fetchAll();
$statement5->closeCursor();
//get memory
$state1 = 'SELECT itemDetails.memoryID, memory.memorySize, memory.itemPrice from itemDetails, memory
WHERE itemDetails.memoryID = memory.memoryID
AND itemCatID = :item_cat_id AND itemID = :item_id'
?>
<!doctype html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<title>Shop Detail 1 | HTML Commerce Template</title>
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

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	</head>
	<body>
		<div class="offcanvas open">
			<div class="offcanvas-wrap">
				<div class="offcanvas-user clearfix">
					<a class="offcanvas-user-wishlist-link" href="wishlist.html">
						<i class="fa fa-heart-o"></i> My Wishlist
					</a>
					<a class="offcanvas-user-account-link" href="my-account.html">
						<i class="fa fa-user"></i> Login
					</a>
				</div>
				<nav class="offcanvas-navbar">
					<ul class="offcanvas-nav">
						<li><a href="#">Home</a></li>
						
						<li class="menu-item-has-children dropdown">
							<a href="shop-by-category.html" class="dropdown-hover">Shop <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="menu-item-has-children dropdown-submenu">
									<a href="#">Category <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="shop-by-category.html">Thing 1?</a></li>
																	<li><a href="shop-by-category.html">Thing 2?</a></li>
																	<li><a href="shop-by-category.html">Thing 3?</a></li>
																	<li><a href="shop-by-category.html">Thing 4?</a></li>
									</ul>
								</li>
								<li class="menu-item-has-children dropdown-submenu">
									<a href="#">Brands/Flagships? <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="shop-by-category.html">Samsung</a></li>
																	<li><a href="shop-by-category.html">Nokia</a></li>
																	<li><a href="shop-by-category.html">Apple</a></li>
																	<li><a href="shop-by-category.html">LG</a></li>
									</ul>
								</li>
								<li class="menu-item-has-children dropdown-submenu">
									<a href="#">Features <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="shop-detail-1.html">Single Product</a></li>
																	<li><a href="shop-by-category.html">Multi Shoping</a></li>
																	<li><a href="my-account.html">My Account</a></li>
																	<li><a href="cart.html">Cart</a></li>
																	<li><a href="cart-empty.html">Empty Cart</a></li>
																	<li><a href="wishlist.html">Wishlist</a></li>
									</ul>
								</li>
								<li>
									<a title="Mega Menu" href="#">Mega Menu</a>
								</li>
							</ul>
						</li>
						
						<li class="menu-item-has-children dropdown">
							<a href="#" class="dropdown-hover">Pages <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="about-us.html">About us</a></li>
								<li><a href="contact-us.html">Contact Us</a></li>
								<li><a href="faq.html">FAQ</a></li>
								<li><a href="404.html">404</a></li>
							</ul>
						</li>
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
											<li><a data-rel="loginModal" href="#"> Login </a></li>
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
													<li><a href="index.html"><span class="underline">Home</span></a></li>
													
													<li class="menu-item-has-children megamenu megamenu-fullwidth dropdown">
														<a href="shop-by-category.html" class="dropdown-hover">
															<span class="underline">Shop</span> <span class="caret"></span>
														</a>
														<ul class="dropdown-menu">
															<li class="mega-col-3">
																<h3 class="megamenu-title">Category <span class="caret"></span></h3>
																<ul class="dropdown-menu">
																	<li><a href="shop-by-category.html">Thing 1?</a></li>
																	<li><a href="shop-by-category.html">Thing 2?</a></li>
																	<li><a href="shop-by-category.html">Thing 3?</a></li>
																	<li><a href="shop-by-category.html">Thing 4?</a></li>
																</ul>
															</li>
															<li class="mega-col-3">
																<h3 class="megamenu-title">Brands/Flagships? <span class="caret"></span></h3>
																<ul class="dropdown-menu">
																	<li><a href="shop-by-category.html">Samsung</a></li>
																	<li><a href="shop-by-category.html">Nokia</a></li>
																	<li><a href="shop-by-category.html">Apple</a></li>
																	<li><a href="shop-by-category.html">LG</a></li>
																</ul>
															</li>
															<li class="mega-col-3">
																<h3 class="megamenu-title">Features <span class="caret"></span></h3>
																<ul class="dropdown-menu">
																	<li><a href="shop-detail-1.html">Single Product</a></li>
																	<li><a href="shop-by-category.html">Multi Shoping</a></li>
																	<li><a href="my-account.html">My Account</a></li>
																	<li><a href="cart.html">Cart</a></li>
																	<li><a href="cart-empty.html">Empty Cart</a></li>
																	<li><a href="wishlist.html">Wishlist</a></li>
																</ul>
															</li>
															
														</ul>
													</li>
													
													<li class="menu-item-has-children dropdown">
														<a href="#" class="dropdown-hover">
															<span class="underline">Pages</span> <span class="caret"></span>
														</a>
														<ul class="dropdown-menu">
															<li><a href="about-us.html">About us</a></li>
															<li><a href="contact-us.html">Contact Us</a></li>
															<li><a href="faq.html">FAQ</a></li>
															<li><a href="404.html">404</a></li>
														</ul>
													</li>
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
													<a class="wishlist" href="wishlist.html">
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
								<span>Shop Detail 1</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="content-container no-padding">
				<div class="container-full">
					<div class="row">
						<div class="col-md-12">
							<div class="main-content">
								<div class="commerce">
									<div class="style-1 product">
										<div class="container">
											<div class="row summary-container">
												<div class="col-md-7 col-sm-6 entry-image">
													<div class="single-product-images">
														<div class="single-product-images-slider">
															<div class="caroufredsel product-images-slider" data-synchronise=".single-product-images-slider-synchronise" data-scrollduration="500" data-height="variable" data-scroll-fx="none" data-visible="1" data-circular="1" data-responsive="1">
																<div class="caroufredsel-wrap">
																	<ul class="caroufredsel-items">
																		<li class="caroufredsel-item">
																			<a src="images/products/detail/detail_800x800.jpg" data-rel="magnific-popup-verticalfit">
																				<img width="600" height="685" src="images/products/product_328x328.png" alt=""/>
																			</a>
																		</li>
																		<li class="caroufredsel-item">
																			<a href="images/products/detail/detail_800x800.jpg" data-rel="magnific-popup-verticalfit">
																				<img width="600" height="685" src="images/products/product_328x328alt.png" alt=""/>
																			</a>
																		</li>
																		<li class="caroufredsel-item">
																			<a href="images/products/detail/detail_800x800.jpg" data-rel="magnific-popup-verticalfit">
																				<img width="600" height="685" src="images/products/detail/detail_800x800.jpg" alt=""/>
																			</a>
																		</li>
																		<li class="caroufredsel-item">
																			<a href="images/products/detail/detail_800x800.jpg" data-rel="magnific-popup-verticalfit">
																				<img width="600" height="685" src="images/products/detail/detail_800x800.jpg" alt=""/>
																			</a>
																		</li>
																		<li class="caroufredsel-item">
																			<a href="images/products/detail/detail_800x800.jpg" data-rel="magnific-popup-verticalfit">
																				<img width="600" height="685" src="images/products/detail/detail_800x800.jpg" alt=""/>
																			</a>
																		</li>
																	</ul>
																	<a href="#" class="caroufredsel-prev"></a>
																	<a href="#" class="caroufredsel-next"></a>
																</div>
															</div>
														</div>
														<div class="single-product-thumbnails">
															<div class="caroufredsel product-thumbnails-slider" data-visible-min="2" data-visible-max="4" data-scrollduration="500" data-direction="up" data-height="100%" data-circular="1" data-responsive="0">
																<div class="caroufredsel-wrap">
																	<ul class="single-product-images-slider-synchronise caroufredsel-items">
																		<li class="caroufredsel-item selected">
																			<div class="thumb">
																				<a href="#" data-rel="0">
																					<img width="300" height="300" src="images/products/product_328x328.png" alt=""/>
																				</a>
																			</div>
																		</li>
																		<li class="caroufredsel-item">
																			<div class="thumb">
																				<a href="#" data-rel="1">
																					<img width="300" height="300" src="images/products/product_328x328alt.png" alt=""/>
																				</a>
																			</div>
																		</li>
																		<li class="caroufredsel-item">
																			<div class="thumb">
																				<a href="#" data-rel="2">
																					<img width="300" height="300" src="images/products/thumb/product_72x72.jpg" alt=""/>
																				</a>
																			</div>
																		</li>
																		<li class="caroufredsel-item">
																			<div class="thumb">
																				<a href="#" data-rel="3">
																					<img width="300" height="300" src="images/products/thumb/product_72x72.jpg" alt=""/>
																				</a>
																			</div>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-5 col-sm-6 entry-summary">
													<div class="summary">
														<h1 class="product_title entry-title"><?php echo $categoryType['itemCatName']; ?> <?php echo $itemType['itemName']; ?></h1>
														<p class="price">
														Phone Type
														</div>
														<!--put the following in a checkbox selection, with the quantity box (as input) on the side-->
													<?php foreach ($queryDetMeAndCo as $memoryAndPrice) : ?>
													<form class="cart" id="addToBasket" action="addToBasket.php" method="post">	
															<input type="hidden" name="user_id" id="user_id" value="1">
															<input type="hidden" name="item_id" id="item_id" value="<?php echo $memoryAndPrice['itemID']; ?>">
															<input type="hidden" name="item_cat_id" id="item_cat_id" value="<?php echo $memoryAndPrice['itemCatID']; ?>">
															<input type="hidden" name="item_det_id" id="item_det_id" value="<?php echo $memoryAndPrice['itemDetID']; ?>">
															<input type="hidden" name="memory_id" id="memory_id" value="<?php echo $memoryAndPrice['memoryID']; ?>">
															<input type="hidden" name="color_id" id="color_id" value="<?php echo $memoryAndPrice['colorID']; ?>">
															<input type="hidden" name="item_price" id="item_price" value="<?php echo $memoryAndPrice['itemPrice']; ?>">
															<span><?php echo $memoryAndPrice['memorySize']; ?>GB - <?php echo $memoryAndPrice['itemPrice']; ?> - <?php echo $memoryAndPrice['colorName']; ?></span><br>
															<input type="number" id="item_qty_basket" step="1" min="1" name="item_qty_basket" title="Qty" class="input-text qty text" size="4"/>
														<div class="add-to-cart-table">															
															<button type="submit" class="button">Add to cart</button>
														</div>
													</form>
													<?php endforeach; ?>
														<p><a href="#"><strong>Add to Wishlist</strong></a></p>
														<div class="clear"></div>
														<!--<div class="product_meta">
															<span class="posted_in">
																Categories: 
																<a href="#">Maecenas</a>, <a href="#">Nulla</a>
															</span>
															<span class="posted_in">
																Brand: 
																<a href="#">Barbour</a>, <a href="#">Carvela</a>, <a href="#">Crocs</a>.
															</span>
														</div>-->
														
														<div class="share-links">
															<div class="share-icons">
																<span class="facebook-share">
																	<a href="#" title="Share on Facebook">
																		<i class="fa fa-facebook"></i>
																	</a>
																</span>
																<span class="twitter-share">
																	<a href="#" title="Share on Twitter">
																		<i class="fa fa-twitter"></i>
																	</a>
																</span>
																<span class="google-plus-share">
																	<a href="#" title="Share on Google +">
																		<i class="fa fa-google-plus"></i>
																	</a>
																</span>
																<span class="linkedin-share">
																	<a href="#" title="Share on Linked In">
																		<i class="fa fa-linkedin"></i>
																	</a>
																</span>
															</div>
														</div> 
													</div> 
												</div>
											</div>
										</div>
										<div class="commerce-tab-container">
											<div class="container">
												<div class="col-md-12">
													<div class="tabbable commerce-tabs">
														<ul class="nav nav-tabs">
													    	<li class="vc_tta-tab active">
													    		<a data-toggle="tab" href="#tab-1">Description</a>
													    	</li>
													    	<!--<li class="vc_tta-tab">
													    		<a data-toggle="tab" href="#tab-2">Reviews</a>
													    	</li>-->
													  	</ul>
													  	<div class="tab-content">
													    	<div id="tab-1" class="tab-pane fade in active">
													    		<h3>Item Description: </h3><?php echo $itemType['itemDescription']; ?>
													    		<h3>Release Date: </h3><?php echo $itemType['releaseDate']; ?>
													    		<h3>Weight: </h3><?php echo $itemType['weight']; ?>
													    		<h3>Wide: </h3><?php echo $itemType['wide']; ?>
													    		<h3>Operating System: </h3><?php echo $itemType['operatingSystem']; ?>
													    		<h3>Screen Size: </h3><?php echo $itemType['screenSize']; ?>
													    		<h3>Camera: </h3><?php echo $itemType['camera']; ?>
													    		<h3>Ram Memory: </h3><?php echo $itemType['ramMemory']; ?>
													    		<h3>Battery: </h3><?php echo $itemType['battery']; ?>
													    		<h3>Resolution: </h3><?php echo $itemType['resolution']; ?>
													    		<h3>Processor: </h3><?php echo $itemType['processor']; 	 ?>
													    		<h3>Product Description: </h3>
																<h3>Nullam vulputate erat id enim lacinia</h3>
																<h3></h3>
																<p>Vel rutrum odio bibendum. Vestibulum quis metus euismod, porta odio et, lacinia eros. Vestibulum vel lobortis ligula, non mollis diam. Donec eu urna quis nibh consectetur pharetra eget vitae dolor. Duis volutpat orci at</p>
																<p>Curabitur rutrum tristique arcu eget tincidunt. Nullam cursus viverra condimentum. Fusce vel nisi sem. Suspendisse sit amet mauris laoreet velit pretium tempus in quis purus.</p>
																<h3></h3>
																<p>Nullam molestie vulputate magna ac tempus. Quisque ac nibh finibus, tempor nunc a, euismod nunc. Nunc lectus magna, mattis eget libero eu, pharetra dapibus tellus. Aliquam dignissim lacus arcu, eu gravida purus rhoncus nec. Aenean porta tempus diam sit amet consequat. Morbi condimentum hendrerit aliquam. Sed at neque faucibus</p>
																<h3></h3>
																<h3></h3>
																<h3>Aenean aliquet condimentum augue, ut tempor turpis sollicitudin in.</h3>
																<p>Nunc vitae odio mollis, euismod mauris at, finibus felis. Phasellus vestibulum, sem at varius imperdiet, velit risus laoreet tortor, in feugiat massa augue sed nibh. Ut fermentum, ligula eget dictum vulputate, orci risus viverra nulla, non posuere metus orci quis mauris. Vivamus aliquam, purus sit amet ultricies dignissim, libero massa rhoncus mi, et imperdiet mauris mi in leo. Ut viverra, erat non rutrum suscipit, nunc purus porta odio, sit amet egestas ex tellus quis nisl. Nullam vitae egestas lectus. Duis faucibus sagittis nunc non porta. Ut eget tempus justo. Donec iaculis id nibh at rhoncus. Nam sed ex lectus. Sed aliquam imperdiet libero ut sollicitudin.</p>
													    	</div>
													    	<!--<div id="tab-2" class="tab-pane fade">
													    		<div id="comments" class="comments-area">
																	<h2 class="comments-title">There are <span>3</span> Comments</h2>
																	<ol class="comments-list">
																		<li class="comment">
																			<div class="comment-wrap">
																				<div class="comment-img">
																					<img alt="" src="http://placehold.it/80x80" class='avatar' height='80' width='80'/>
																				</div>
																				<div class="comment-block">
																					<header class="comment-header">
																						<cite class="comment-author">
																							John Doe
																						</cite>
																						<div class="comment-meta">
																							<span class="time">10 days ago</span>
																						</div>
																					</header>
																					<div class="comment-content">
																						<p>
																							Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
																						</p>
																						<span class="comment-reply">
																							<a class='comment-reply-link' href='#'>Reply</a>
																						</span>
																					</div>
																				</div>
																			</div>
																			<ol class="children">
																				<li class="comment">
																					<div class="comment-wrap">
																						<div class="comment-img">
																							<img alt="" src="http://placehold.it/80x80" class='avatar' height='80' width='80'/>
																						</div>
																						<div class="comment-block">
																							<header class="comment-header">
																								<cite class="comment-author">
																									Jane Doe
																								</cite>
																								<div class="comment-meta">
																									<span class="time">10 days ago</span>
																								</div>
																							</header>
																							<div class="comment-content">
																								<p>
																									Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
																								</p>
																								<span class="comment-reply">
																									<a class='comment-reply-link' href='#'>Reply</a>
																								</span>
																							</div>
																						</div>
																					</div>
																				</li> 
																			</ol> 
																		</li> 
																		<li class="comment">
																			<div class="comment-wrap">
																				<div class="comment-img">
																					<img alt="" src="http://placehold.it/80x80" class='avatar' height='80' width='80'/>
																				</div>
																				<div class="comment-block">
																					<header class="comment-header">
																						<cite class="comment-author">
																							David Platt
																						</cite>
																						<div class="comment-meta">
																							<span class="time">5 days ago</span>
																						</div>
																					</header>
																					<div class="comment-content">
																						<p>
																							Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
																						</p>
																						<span class="comment-reply">
																							<a class='comment-reply-link' href='#'>Reply</a>
																						</span>
																					</div>
																				</div>
																			</div>
																		</li> 
																	</ol>
																	<div class="comment-respond">
																		<h3 class="comment-reply-title">
																			<span>Leave your thought</span>
																		</h3>
																		<form class="comment-form">
																			<div class="row">
																				<div class="comment-form-author col-sm-12">
																					<input id="author" name="author" type="text" placeholder="Your name" class="form-control" value="" size="30" />
																				</div>
																				<div class="comment-form-email col-sm-12">
																					<input id="email" name="email" type="text" placeholder="email@domain.com" class="form-control" value="" size="30" />
																				</div>
																				<div class="comment-form-comment col-sm-12">
																					<textarea class="form-control" placeholder="Comment" id="comment" name="comment" cols="40" rows="6" ></textarea>
																				</div>
																			</div>
																			<div class="form-submit">
																				<a class="btn btn-default-outline btn-outline" href="#">
																					<span>Post Comment</span>
																				</a>
																			</div>
																		</form>
																	</div>
																</div>
													    	</div>-->
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="container">
											<div class="row">
												<div class="col-sm-12">
													<div class="related products">
														<div class="related-title">
															<h3><span>We know you will love</span></h3>
														</div>
														<ul class="products columns-4" data-columns="4">
															<li class="product product-no-border style-2">
																<div class="product-container">
																	<figure>
																		<div class="product-wrap">
																			<div class="product-images">
																				<span class="onsale">Sale!</span>
																				<div class="shop-loop-thumbnail shop-loop-front-thumbnail">
																					<a href="shop-detail-1.html"><img width="450" height="450" src="images/products/product_328x328.jpg" alt=""/></a>
																				</div>
																				<div class="shop-loop-thumbnail shop-loop-back-thumbnail">
																					<a href="shop-detail-1.html"><img width="450" height="450" src="images/products/product_328x328alt.jpg" alt=""/></a>
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
																						<a href="shop-detail-1.html">Daniel Stromborg Round</a>
																					</h3>
																					<div class="info-price">
																						<span class="price">
																							<del><span class="amount">£23.00</span></del> <ins><span class="amount">£20.00</span></ins>
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
															<li class="product product-no-border style-2">
																<div class="product-container">
																	<figure>
																		<div class="product-wrap">
																			<div class="product-images">
																				<div class="shop-loop-thumbnail shop-loop-front-thumbnail">
																					<a href="shop-detail-1.html"><img width="450" height="450" src="images/products/product_328x328.jpg" alt=""/></a>
																				</div>
																				<div class="shop-loop-thumbnail shop-loop-back-thumbnail">
																					<a href="shop-detail-1.html"><img width="450" height="450" src="images/products/product_328x328alt.jpg" alt=""/></a>
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
																						<a href="shop-detail-1.html">Hans Wegner Shell Chair</a>
																					</h3>
																					<div class="info-price">
																						<span class="price">
																							<span class="amount">&pound;10.75</span>
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
															<li class="product product-no-border style-2">
																<div class="product-container">
																	<figure>
																		<div class="product-wrap">
																			<div class="product-images">
																				<span class="onsale">Sale!</span>
																				<div class="shop-loop-thumbnail shop-loop-front-thumbnail">
																					<a href="shop-detail-1.html"><img width="450" height="450" src="images/products/product_328x328.jpg" alt=""/></a>
																				</div>
																				<div class="shop-loop-thumbnail shop-loop-back-thumbnail">
																					<a href="shop-detail-1.html"><img width="450" height="450" src="images/products/product_328x328alt.jpg" alt=""/></a>
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
																						<a href="shop-detail-1.html">Hans Wegner Two Seat Sofa</a>
																					</h3>
																					<div class="info-price">
																						<span class="price">
																							<del><span class="amount">£20.50</span></del> 
																							<ins><span class="amount">£19.00</span></ins>
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
															<li class="product product-no-border style-2">
																<div class="product-container">
																	<figure>
																		<div class="product-wrap">
																			<div class="product-images">
																				<span class="onsale">Sale!</span>
																				<div class="shop-loop-thumbnail shop-loop-front-thumbnail">
																					<a href="shop-detail-1.html"><img width="450" height="450" src="images/products/product_328x328.jpg" alt=""/></a>
																				</div>
																				<div class="shop-loop-thumbnail shop-loop-back-thumbnail">
																					<a href="shop-detail-1.html"><img width="450" height="450" src="images/products/product_328x328alt.jpg" alt=""/></a>
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
																						<a href="shop-detail-1.html">Hans Wegner Desk</a>
																					</h3>
																					<div class="info-price">
																						<span class="price">
																							<del><span class="amount">£20.50</span></del> 
																							<ins><span class="amount">£19.00</span></ins>
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
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div> 
									<!--<div class="woo-instagram">
										<h3 class="heading-center-custom">
											<span>Instashop</span>
										</h3>
										<div class="instagram">
											<div class="instagram-wrap">
												<div class="caroufredsel caroufredsel-item-no-padding" data-height="variable" data-scroll-fx="scroll" data-scroll-item="1" data-visible-min="1" data-visible-max="4" data-responsive="1" data-infinite="1" data-autoplay="0" data-circular="1">
													<div class="caroufredsel-wrap">
														<ul class="caroufredsel-items row">
															<li class="caroufredsel-item col-sm-3 col-xs-6">
																<a href="//instagram.com/p/6T7HXbHJjB" title="Instagram Image" target="_blank">
																	<img src="images/instagram/thumb_320x320.jpg" alt="Instagram Image"/>
																</a>
															</li>
															<li class="caroufredsel-item col-sm-3 col-xs-6">
																<a href="//instagram.com/p/6T7GdlHJi-" title="Instagram Image" target="_blank">
																	<img src="images/instagram/thumb_320x320.jpg" alt="Instagram Image"/>
																</a>
															</li>
															<li class="caroufredsel-item col-sm-3 col-xs-6">
																<a href="//instagram.com/p/6T7F21HJi9" title="Instagram Image" target="_blank">
																	<img src="images/instagram/thumb_320x320.jpg" alt="Instagram Image"/>
																</a>
															</li>
															<li class="caroufredsel-item col-sm-3 col-xs-6">
																<a href="//instagram.com/p/6T7E8jHJi6" title="Instagram Image" target="_blank">
																	<img src="images/instagram/thumb_320x320.jpg" alt="Instagram Image"/>
																</a>
															</li>
															<li class="caroufredsel-item col-sm-3 col-xs-6">
																<a href="//instagram.com/p/6T7DlgnJi2" title="Instagram Image" target="_blank">
																	<img src="images/instagram/thumb_320x320.jpg" alt="Instagram Image"/>
																</a>
															</li>
															<li class="caroufredsel-item col-sm-3 col-xs-6">
																<a href="//instagram.com/p/6T7CicnJi1" title="Instagram Image" target="_blank">
																	<img src="images/instagram/thumb_320x320.jpg" alt="Instagram Image"/>
																</a>
															</li>
															<li class="caroufredsel-item col-sm-3 col-xs-6">
																<a href="//instagram.com/p/6T7AWbHJiz" title="Instagram Image" target="_blank">
																	<img src="images/instagram/thumb_320x320.jpg" alt="Instagram Image"/>
																</a>
															</li>
															<li class="caroufredsel-item col-sm-3 col-xs-6">
																<a href="//instagram.com/p/6T6_MAnJix" title="Instagram Image" target="_blank">
																	<img src="images/instagram/thumb_320x320.jpg" alt="Instagram Image"/>
																</a>
															</li>
															<li class="caroufredsel-item col-sm-3 col-xs-6">
																<a href="//instagram.com/p/6T6-PbnJiw" title="Instagram Image" target="_blank">
																	<img src="images/instagram/thumb_320x320.jpg" alt="Instagram Image"/>
																</a>
															</li>
															<li class="caroufredsel-item col-sm-3 col-xs-6">
																<a href="//instagram.com/p/6T69ipHJit" title="Instagram Image" target="_blank">
																	<img src="images/instagram/thumb_320x320.jpg" alt="Instagram Image"/>
																</a>
															</li>
															<li class="caroufredsel-item col-sm-3 col-xs-6">
																<a href="//instagram.com/p/6T68pOHJiq" title="Instagram Image" target="_blank">
																	<img src="images/instagram/thumb_320x320.jpg" alt="Instagram Image"/>
																</a>
															</li>
															<li class="caroufredsel-item col-sm-3 col-xs-6">
																<a href="//instagram.com/p/6T672znJip" title="Instagram Image" target="_blank">
																	<img src="images/instagram/thumb_320x320.jpg" alt="Instagram Image"/>
																</a>
															</li>
														</ul>
														<a href="#" class="caroufredsel-prev"></a>
														<a href="#" class="caroufredsel-next"></a>
													</div>
												</div>
											</div>
										</div>
									</div> -->
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
								free return standard order in 30 days 
							</div>
							<div class="footer-featured-col col-md-4 col-sm-6">
								<i class="fa fa-globe"></i>
								<h4 class="footer-featured-title">
									world wide <br> delivery
								</h4>
								free ship for payment over $100
							</div>
							<div class="footer-featured-col col-md-4 col-sm-6">
								<i class="fa fa-clock-o"></i>
								<h4 class="footer-featured-title">
									24h <br> shipment 
								</h4>
								for standard package 
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
													<p>123 Street, London</p>
												</li>
												<li>
													<i class="fa fa-mobile"></i>
													<h4>Phone:</h4>
													<p>(00) 123 456 789</p>
												</li>
												<li>
													<i class="fa fa-envelope"></i>
													<h4>Email:</h4>
													<p><a href="mailto:email@domain.com">email@domain.com</a></p>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="footer-widget-col col-md-3 col-sm-6">
									<div class="widget widget_nav_menu">
										<h3 class="widget-title">
											<span>infomation</span>
										</h3>
										<div class="menu-infomation-container">
											<ul class="menu">
												<li><a href="#">About Us</a></li>
												<li><a href="#">Contact Us</a></li>
												<li><a href="#">Term &#038; Conditions</a></li>
												
												
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
												<li><a href="#">Support</a></li>
												<li><a href="#">Sitemap</a></li>
												<li><a href="#">FAQ</a></li>
												<li><a href="#">Shipping</a></li>
												<li><a href="#">Returns</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="footer-widget-col col-md-3 col-sm-6">
									<div class="widget widget_text">
										<!--<h3 class="widget-title">
											<span>open house</span>
										</h3>
										<div class="textwidget">
											<ul class="open-time">
												<li><span>Mon - Fri:</span><span>8am - 5pm</span> </li>
												<li><span>Sat:</span><span>8am - 11am</span> </li>
												<li><span>Sun: </span><span>Closed</span></li>
											</ul>-->
											<h3 class="widget-title">
												<span>payment Menthod</span>
											</h3>
											<div class="payment">
												<a href="#"><i class="fa fa-cc-mastercard"></i></a>
												<a href="#"><i class="fa fa-cc-visa"></i></a>
												<a href="#"><i class="fa fa-cc-paypal"></i></a>
												<a href="#"><i class="fa fa-cc-discover"></i></a>
												<a href="#"><i class="fa fa-credit-card"></i></a>
												<a href="#"><i class="fa fa-cc-amex"></i></a>
											</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright text-center">
					© 2018 GROUP PROJECT
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

		<script type="text/javascript" src="js/core.min.js"></script>
		<script type="text/javascript" src="js/widget.min.js"></script>
		<script type="text/javascript" src="js/mouse.min.js"></script>
		<script type="text/javascript" src="js/slider.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-touch-punch.min.js"></script>
		<script type="text/javascript" src="js/price-slider.js"></script>
	</body>
</html>