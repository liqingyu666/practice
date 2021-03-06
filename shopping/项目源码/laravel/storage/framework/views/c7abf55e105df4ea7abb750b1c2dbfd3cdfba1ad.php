<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="<?php echo e(config('web.keywords')); ?>" />
       <meta name="description" content="<?php echo e(config('web.description')); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title><?php echo e(config("web.title")); ?></title>

		<link href="/style/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/style/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/style/home/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/style/home/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/style/home/css/skin.css" rel="stylesheet" type="text/css" />
		<script src="/style/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/style/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>
		<?php echo $__env->make("home.public.common", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides">
								<?php
					            $bannerNum=0
					           ?>
								<?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
					            $bannerNum++;
					            ?>
								<li class="banner<?php echo e($bannerNum); ?>"><a href="introduction.html"><img src="Uploads/lun/<?php echo e($value->img); ?>" /></a></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
						<div class="clear"></div>
			</div>
			<div class="shopNav">
				<div class="slideall">
					
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>					
		        				
						<!--侧边导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									
									<div class="category">
										<ul class="category-list" id="js_climit_li">
											<?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
											<li class="appliance js_toggle relative first">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="images/cake.png"></i><a class="ml-22" title="点心"><?php echo e($value->name); ?></a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																	 <?php $__currentLoopData = $value->zi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $two): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<dl class="dl-sort">
																		<dt><span><?php echo e($two->name); ?></span></dt>
																		<?php $__currentLoopData = $two->zi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $three): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																		<dd><a href="#"><span><?php echo e($three->name); ?></span></a></dd>
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	</dl>

																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

																</div>
															
															</div>
														</div>
													</div>
														<?php $__currentLoopData = $value->rightAds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rightAds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												
																<a href="">
																<img src="/Uploads/ads/<?php echo e($rightAds->img); ?>" style="width:200px;height:100px;margin-left: 560px"alt="" />
															</a>
															
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</div>
											<b class="arrow">11111</b>	
											</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									</div>
								</div>

							</div>
						</div>
						
						
						<!--轮播-->
						
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>



					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="/style/home/images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/style/home/images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/style/home/images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/style/home/images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src="images/TJ2.jpg"></img>
									<span>[特惠]</span>商城爆品1分秒								
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="images/TJ.jpg"></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">
							<div class="m-baseinfo">
								<a href="person/index.html">
									<img src="images/getAvatar.do.jpg">
								</a>
								<em>
									Hi,<span class="s-name">小叮当</span>
									<a href="#"><p>点击更多优惠活动</p></a>									
								</em>
							</div>
							<div class="member-logout">
								<a class="am-btn-warning btn" href="login.html">登录</a>
								<a class="am-btn-warning btn" href="register.html">注册</a>
							</div>
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>																	    
							    
								<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
								<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
								<li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>
								
							</ul>
                        <div class="advTip"><img src="/style/home/images/advTip.jpg"/></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->

					<div class="am-g am-g-fixed recommendation">
						<div class="clock am-u-sm-3" ">
							<img src="/style/home/images/2016.png "></img>
							<p>今日<br>推荐</p>
						</div>
						<?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						<div class="am-u-sm-4 am-u-lg-3 ">
								<div class="info ">
								<h3>真的有鱼</h3>
								<h4>开年福利篇</h4>
							</div>
							<div class="recommendationMain one">
								<a href="introduction.html"><img src="Uploads/ads/<?php echo e($value->img); ?> "></img></a>
							</div>
						</div>						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						

					</div>
					<div class="clear "></div>
					<!--热门活动 -->

					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>明星单品</h4>
							<h3>优惠享不停 </h3>
							<span class="more ">
                              <a href="# ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
						<?php
						$pice=0;
						?>
					  <div class="am-g am-g-fixed ">
						<?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php
						$pice++;
						?>
						<div class="am-u-sm-3 ">
							<div class="icon-sale three "></div>
							<?php if($pice==1): ?>
							<h4>特惠</h4>
							<?php elseif($pice==2): ?>
							<h4>秒杀</h4>
							<?php elseif($pice==3): ?>
							<h4>团购</h4>
                            <?php elseif($pice==4): ?>
							<h4>超值</h4>
							<?php endif; ?>


							<div class="activityMain ">
								<a href="/goods/<?php echo e($value->id); ?>"><img title="<?php echo e($value->title); ?>" src="/Uploads/goods/<?php echo e($value->img); ?> "></img></a>
							</div>
							<div class="info ">

								<a href="/goods/<?php echo e($value->id); ?>"><h3><?php echo e($value->title); ?></h3></a>
								<a href="/goods/<?php echo e($value->id); ?>" title="<?php echo e($value->title); ?>" style="color: purple"><h3><?php echo e($value->info); ?></h3></a>

								<a href="/goods/<?php echo e($value->id); ?>" title="<?php echo e($value->title); ?>"><h3 style="color: red">￥<?php echo e(number_format($value->price)); ?></h3></a>
							</div>							
						</div>						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </div>
					
					<?php
					$louNum=0
					?>
					<?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($lou->is_lou): ?>
					<?php
					$louNum++;
					?>
					
                    <div id="f<?php echo e($louNum); ?>">
					<!--甜点-->
					
					<div class="am-container ">
						<div class="shopTitle ">
							<h4><?php echo e($louNum); ?>F<?php echo e($lou->name); ?></h4>
							<h3>每一道甜品都有一个故事</h3>
							<div class="today-brands ">
								<?php $__currentLoopData = $lou->zi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<a href="#" title=""><?php echo e($zi->name); ?></a>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<span class="more ">
                    <a href="# ">更多<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
					</div>
					
					<div class="am-g am-g-fixed floodFour">
						<div class="am-u-sm-5 am-u-md-4 text-one list ">
							<div class="word">
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>	
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>									
							</div>
							<?php $__currentLoopData = $lou->leftAds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leftAds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="# ">
								<div class="outer-con ">
									<div class="title ">
									开抢啦！
									</div>
									<div class="sub-title ">
										零食大礼包
									</div>									
								</div>

                                  <img title="$leftAds->title" src='/Uploads/ads/<?php echo e($leftAds->img); ?>' />								
							</a>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<div class="triangle-topright"></div>						
						</div>
							<?php $__currentLoopData = $lou->goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goodslou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="am-u-sm-7 am-u-md-4 text-three" style="">
								<div class="outer-con ">
									<div class="title ">
										<a href="/goods/<?php echo e($goodslou->id); ?>"><?php echo e($goodslou->title); ?></a>
									</div>	
																	
									<div class="sub-title ">
										<a href="/goods/<?php echo e($goodslou->id); ?>">
										￥<?php echo e($goodslou->price); ?>

									    </a>
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
								<a href="/goods/<?php echo e($goodslou->id); ?>" title="$goodslou->title"><img src="/Uploads/goods/<?php echo e($goodslou->img); ?>" /></a>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
                 <div class="clear "></div>  
                 </div>
                 <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php echo $__env->make("home.public.foot", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</body>

</html>