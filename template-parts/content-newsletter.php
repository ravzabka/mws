	<div class="newsletter-white newsletter-white__container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
						<img src="<?php echo get_template_directory_uri(); ?>/img/pics/newsletter.png" alt="" class="">
					</div>

					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-6 offset-lg-1 pt-xl-5">
						<h3 class="newsletter-white__title">Chcesz być na bieżąco?</h3>
						<p class="newsletter-white__desc">Zapisz się na listę odbiorców newslettera portalu MWS. Obiecujemy nie spamować!<br> Zapoznaj się z naszą <a href="./polityka-prywatnosci" class="link">polityką prywatności</a></p>
						<div class="newsletter-white__form-container">

							<form action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post" class="newsletter-white__form">
								<!-- Pole email (wymagane) -->
								<input type="text" name="email" class="newsletter-white__input" placeholder="wpisz adres email" />
								<!-- Token listy -->
								<!-- Pobierz token na: https://app.getresponse.com/campaign_list.html -->
								<input type="hidden" name="campaign_token" value="8S33w" />
								<!-- Strona z podziękowaniem (opcjonalnie) -->
								<input type="hidden" name="thankyou_url" value="http://mws.com.pl/podziekowanie/"/>
								<!-- Dodaj subskrybenta do cyklu follow up z określonego dnia (opcjonalnie) -->
								<input type="hidden" name="start_day" value="0" />
								<!-- Forward form data to your page (optional) -->
								<input type="hidden" name="forward_data" value="post" />
								<!-- Przycisk zapisu -->
								<input type="submit" value="zapisz się" class="newsletter-white__button"/>
							</form>
						</div>
					
						
					</div>

					
					
				</div>	
			
			</div>