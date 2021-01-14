<footer>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="box-footer info-contact">
								<h3>Thông tin</h3>
								<div class="content-contact">
								
									<p>
										<strong>Địa chỉ:</strong> 53 Võ Văn Ngân, Linh Chiểu, Thủ Đức, TP.HCM
									</p>
									<p>
										<strong>Email: </strong> nhom11@gmail.com
									</p>
									<p>
										<strong>Điện thoại: </strong> 0963111333
									</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
							<div class="box-footer info-contact">
								<h3>Thông tin khác</h3>
								<div class="content-list">
								<?php 
									wp_nav_menu(
										array(
											'theme_location' => 'footer-menu',
											'container' => 'false',
											'menu_id' => 'footer-menu',
											'menu_class' => 'footer-menu'
										)
									)
								?>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
							<div class="box-footer info-contact">
								<h3>Phương thức thanh toán</h3>
								<div class="content-contact">
								<i class="fa fa-cc-visa pay" style="font-size:24px"></i>
								<i class="fa fa-cc-paypal pay" style="font-size:24px"></i>
								<i class="fa fa-cc-mastercard pay" style="font-size:24px"></i>
								<i class="fa fa-credit-card pay" style="font-size:24px"></i>
								<i class="fa fa-google-wallet pay" style="font-size:24px"></i>
								<i class="fa fa-cc-jcb pay" style="font-size:24px"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="copyright">
					<p>Copyright © 2021 - Nhom 11</p>
				</div>
			</footer>
		</div>
		<script src="<?php bloginfo('stylesheet_directory')?>/libs/jquery-3.4.1.min.js"></script>
		<script src="<?php bloginfo('stylesheet_directory')?>/libs/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php bloginfo('stylesheet_directory')?>/js/main.js"></script>
		<?php wp_footer()?>
	</body>
</html>