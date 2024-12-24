<footer id="footer">
    <div class="container">
        <div class="row">

            <!-- Profile Newest -->
            <div class="col-md-4">
                <div class="footer-item">
                    <h4><strong>@lang('bahasa.profile')</strong></h4>
                    <p>@lang('bahasa.profile2')</p>
                    <img src="{{ asset('assets/img/logo-ne-trnsp.png') }}" alt="logo" class="footer-logo" style="width: 80px; margin-top: 10px;">
                </div>
            </div>

            <!-- Lokasi -->
            <div class="col-md-3">
                <div class="footer-item">
					<h4><strong>@lang('bahasa.lokasi')</strong></h4>
                    <p>Jl. Mawar No. 123, Kota Banjarmasin, Kalimantan Selatan</p>
                    <p>Email: <a href="mailto:info@newest.com" style="color: #f8b400;">info@newest.com</a></p>
                    <p>@lang('bahasa.phone'): <a href="tel:+6281234567890" style="color: #f8b400;"><br>+62 812-3456-7890</a></p>
                </div>
            </div>

            <!-- Sosial Media -->
            <div class="col-md-3">
                <div class="footer-item">
					<h4><strong>@lang('bahasa.follow')</strong></h4>
                    <ul style="list-style: none; padding: 0;">
                        <li>
                            <a href="https://facebook.com" target="_blank" style="color: #666; text-decoration: none;">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com" target="_blank" style="color: #666; text-decoration: none;">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com" target="_blank" style="color: #666; text-decoration: none;">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/6281234567890" target="_blank" style="color: #666; text-decoration: none;">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Kontak Kami -->
            <div class="col-md-2">
                <div class="footer-item">
					<h4><strong>@lang('bahasa.hub')</strong></h4>
                    <p>@lang('bahasa.phone'): <br>
                        <a href="tel:+6281234567890" style="color: #f8b400;">+62 812-3456-7890</a>
                    </p>
                    <p>@lang('bahasa.operating'): <br> @lang('bahasa.day'), 08:00 - 17:00</p>
                </div>
            </div>

        </div>
        <!-- Row End -->
    </div>
</footer>

	<footer id="footer">		
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="copyright">
						<div class="row">

							<div class="col-md-6">
								<p>© 2022 All rights reserved. Free HTML Template by 
									<a href="https://www.templatesjungle.com/" target="_blank">TemplatesJungle</a></p>
							</div> 

							<div class="col-md-6">
								<div class="social-links align-right">
									<ul>
										<li>
											<a href="#"><i class="icon icon-facebook"></i></a>
										</li>
										<li>
											<a href="#"><i class="icon icon-twitter"></i></a>
										</li>
										<li>
											<a href="#"><i class="icon icon-youtube-play"></i></a>
										</li>
										<li>
											<a href="#"><i class="icon icon-behance-square"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div><!--grid-->
				</div><!--footer-bottom-content-->
			</div>
		</div>
	</footer>		


	<script src="{{ asset('cust-assets/js/jquery-1.11.0.min.js') }}"></script>
	<script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="{{ asset('cust-assets/js/plugins.js') }}"></script>
	<script src="{{ asset('cust-assets/js/script.js') }}"></script>

</body>

</html