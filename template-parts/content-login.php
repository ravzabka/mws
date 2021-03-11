<?php

$text1 = get_field('form_text_login');
$text2 = get_field('form_text_logout');
$text3 = get_field('form_text_important');

$logindiv ='<div class="row" style="background-color:#f6f5f5">
	<div class="col-sm-12 text-center font-weight-bold">
        <h2 class="post__title">PANEL MWS</h2>

    </div>
	
    <div class="col-sm-12">
		<p class="">W <strong>panelu MWS</strong> są dostępne <strong>certyfikaty oraz materiały z webinarów</strong>, w których wzięłaś/eś udział. Dane webinaru dostępne są <strong>po 24 godzinach</strong> od spotkania – możesz pobrać je w dowolnym momencie. </p>
		<p class="">Jeśli posiadasz konto w panelu MWS – wystarczy się <strong>zalogować</strong>. </p>
		<p class="">Jeśli wzięłaś/eś udział w webinarze, ale nie zakładałaś/eś konta w naszym panelu – <strong>zarejestruj się</strong>.  
		<br>Pamiętaj, aby podczas rejestracji konta podać <strong>adres mailowy</strong>, z poziomu którego uczestniczyłaś/eś w webinarze. </p>
    </div>

    <div class="col-sm-12">
        <input autocomplete="off" type="checkbox" id="form-switch">

        <form id="login-form" action="" method="post" class="login__form">
            <div class="row">
			<div class="col-12 col-md-6"><input autocomplete="off" class="login__input" type="email" name="email" placeholder="email" required ></div>
            <div class="col-12 col-md-6"><input autocomplete="off" class="login__input" type="password" name="password" placeholder="hasło" required ></div>
            </div>
            
            <div class="row">
			<div class="col-12 col-md-6 col-lg-4 text-center"><button type="submit" class="login__btn btn btn--orange">Zaloguj się</button></div>
            <div class="col-12 col-md-6 col-lg-4 text-center"><label class="login__switch"><span><a href="'.site_url().'/webinary?passremember=1" class="login__switch">Nie pamiętam hasła</a></span></label></div>
			<div class="col-12 offset-md-3 col-md-6 offset-lg-0 col-lg-4 text-center"><label for="form-switch" class="login__switch"><span>Nie masz konta? Załóż konto</span></label></div>
			<input autocomplete="off" type="hidden" name="lfsendtype" value="login">
			</div>
        </form>

        <form id="register-form" action="" method="post" class="register__form">
			<div class="row">
			<div class="col-12 col-md-6"><input autocomplete="off" class="register__input" type="email" name="email" placeholder="email" required ></div>
			<div class="col-12 col-md-6 d-none d-md-block"> </div>
			<div class="col-12 col-md-6"><input autocomplete="off" class="register__input" type="text" name="username" placeholder="imię" required></div>
			<div class="col-12 col-md-6"><input autocomplete="off" class="register__input" type="text" name="username2" placeholder="nazwisko" required></div>
            <div class="col-12 col-md-6"><input autocomplete="off" class="register__input" type="password" name="password" placeholder="hasło" required ></div>
            <div class="col-12 col-md-6"><input autocomplete="off" class="register__input" type="password" name="password2" placeholder="powtórz hasło" required></div>
            </div>
			
			<label><input type="checkbox" name="zgoda_ok"><small> Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymywania od portalu MWS informacji, zaproszeń, ofert i ogłoszeń o produktach i programach edukacyjnych.</small></label>
			<label><input type="checkbox" name="przetwarzanie_ok" required><small> *Wyrażam zgodę na przetwarzanie moich danych osobowych zgodnie z ustawą o ochronie danych osobowych. Zostałem/am poinformowany/a, że przysługuje mi prawo dostępu do swoich danych, możliwości ich poprawiania, żądania zaprzestania ich przetwarzania. Więcej informacji:  <a href="https://mws.pl/polityka-prywatnosci/">polityka prywatności</a></small></label>
			
             <div class="row"><div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 text-center" ><button type="submit" class="register__btn btn btn--orange">Załóż konto</button></div></div>
            <label for="form-switch" class="register__switch">Jesteś użytkownikiem, zaloguj się</label>
			<input autocomplete="off" type="hidden" name="lfsendtype" value="reg">
		</form>
    </div>
	
	 <div class="col-sm-12 text-center">
		 <h4 class="post__title">'.$text3.'</h4><br>
    </div>
</div>';
/*
$__old__logindiv ='<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-7 text-center pt-4">
        <h4 class="post__title">'.$text1.'<br>'.$text2.'</h4><br>
        <h4 class="post__title">'.$text3.'</h4>

    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-5 align-right">
        <input autocomplete="off" type="checkbox" id="form-switch">

        <form id="login-form" action="" method="post" class="login__form">
            <input autocomplete="off" class="login__input" type="email" name="email" placeholder="email" required >
            <input autocomplete="off" class="login__input" type="password" name="password" placeholder="hasło" required >
            
            
            <button type="submit" class="login__btn btn btn--orange">Zaloguj się</button>
            <a href="'.site_url().'/webinary?passremember=1" class="login__switch">Zapomniałem hasła</a>
			<label for="form-switch" class="login__switch"><span>Załóż konto</span></label>
			<input autocomplete="off" type="hidden" name="lfsendtype" value="login">
        </form>

        <form id="register-form" action="" method="post" class="register__form">
            <input autocomplete="off" class="register__input" type="text" name="username" placeholder="imię" required><input autocomplete="off" class="register__input" type="text" name="username2" placeholder="nazwisko" required>
            <input autocomplete="off" class="register__input" type="email" name="email" placeholder="email" required >
            <input autocomplete="off" class="register__input" type="password" name="password" placeholder="hasło" required >
            <input autocomplete="off" class="register__input" type="password" name="password2" placeholder="powtórz hasło" required>
            
			<input type="checkbox" name="zgoda_ok">Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymywania od portalu MWS informacji, zaproszeń, ofert i ogłoszeń o produktach i programach edukacyjnych.
			<label><input type="checkbox" name="przetwarzanie_ok" > *Wyrażam zgodę na przetwarzanie moich danych osobowych zgodnie z ustawą o ochronie danych osobowych. Zostałem/am poinformowany/a, że przysługuje mi prawo dostępu do swoich danych, możliwości ich poprawiania, żądania zaprzestania ich przetwarzania. Więcej informacji:  <a href="https://mws.pl/polityka-prywatnosci/">polityka prywatności</a></label>
			
            <button type="submit" class="register__btn btn btn--orange">Załóż konto</button>
            <label for="form-switch" class="register__switch">Jesteś użytkownikiem, zaloguj się</label>
			<input autocomplete="off" type="hidden" name="lfsendtype" value="reg">
		</form>


    </div>
</div>';
*/

function EditU() {
	$type = $_POST['lfsendtype'];
	$zap = str_replace(' ','%20','https://apps.vidis.pl/api/mwsuser/edit?login='.$_SESSION['email'].'&name='.$_POST['uname'].'&obszary='.$_POST['obszary'].'&gender='.$_POST['gender']);
	//echo $zap;
	$jsondata = file_get_contents($zap);
}

function LogujU() {
	$logindiv ='<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-7 text-center pt-4">
        <h4 class="post__title">Aby uzyskać dostęp do webinarów, w których brałeś/aś udział - zaloguj się.<br><br>Jeśli nie masz jeszcze konta - zarejestruj się.</h4>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-5 align-right">
        <input autocomplete="off" type="checkbox" id="form-switch">

        <form id="login-form" action="" method="post" class="login__form">
            <input autocomplete="off" class="login__input" type="email" name="email" placeholder="email" required >
            <input autocomplete="off" class="login__input" type="password" name="password" placeholder="hasło" required >
            
            
            <button type="submit" class="login__btn btn btn--orange">Zaloguj się</button>
            <a href="'.site_url().'/webinary?passremember=1" class="login__switch">Zapomniałem hasła</a>
            <label for="form-switch" class="login__switch"><span>Załóż konto</span></label>
			<input autocomplete="off" type="hidden" name="lfsendtype" value="login">
        </form>

        <form id="register-form" action="" method="post" class="register__form">
            <input autocomplete="off" class="register__input" type="text" name="username" placeholder="imię" required>
			<input autocomplete="off" class="register__input" type="text" name="username2" placeholder="nazwisko" required>
            <input autocomplete="off" class="register__input" type="email" name="email" placeholder="email" required >
            <input autocomplete="off" class="register__input" type="password" name="password" placeholder="hasło" required >
            <input autocomplete="off" class="register__input" type="password" name="password2" placeholder="powtórz hasło" required>
            
			<input type="checkbox" name="zgoda_ok">Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymywania od portalu MWS informacji, zaproszeń, ofert i ogłoszeń o produktach i programach edukacyjnych." >Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymywania od portalu MWS informacji, zaproszeń, ofert i ogłoszeń o produktach i programach edukacyjnych.
			<label><input type="checkbox" name="przetwarzanie_ok" > *Wyrażam zgodę na przetwarzanie moich danych osobowych zgodnie z ustawą o ochronie danych osobowych. Zostałem/am poinformowany/a, że przysługuje mi prawo dostępu do swoich danych, możliwości ich poprawiania, żądania zaprzestania ich przetwarzania. Więcej informacji:  <a href="https://mws.pl/polityka-prywatnosci/">polityka prywatności</a></label>
			
			
            <button type="submit" class="register__btn btn btn--orange">Załóż konto</button>
            <label for="form-switch" class="register__switch">Jesteś użytkownikiem, zaloguj się</label>
			<input autocomplete="off" type="hidden" name="lfsendtype" value="reg">
		</form>


    </div>
</div>';
	
	$type = $_POST['lfsendtype'];
	if($type==='register') return RegisterU();
	
	$jsondata = file_get_contents('https://apps.vidis.pl/api/mwsuser/login?login='.$_POST['email'].'&password='.$_POST['password']);
	$arr = json_decode($jsondata,true);
	//print_r($arr);
	if($arr['code']>0) {
		$_SESSION['userLogged']=1;
		$_SESSION['userid'] = $arr['id'];
		$_SESSION['name'] = $arr['name'];
		$_SESSION['gender'] = $arr['gender'];
		$_SESSION['country'] = $arr['country'];
		$_SESSION['email'] = $_POST['email'];
		
		return true;
	} else {
		$logindiv = str_replace('</h4>','<br><br><span style="color:red">'.$arr['error'].'</span></h4>',$logindiv);
		echo $logindiv;
		return true; 
	}
	
	
}

function PassRem() {
	$info = 'Wpisz swój adres. Na wskazany adres e-mail zostanie wysłany link do resetowania hasła.';
	$info2 = 'Wygenerowany link został wysłany na adres: '.$_POST['email'].'.<br>Sprawdź swoją skrzynkę odbiorczą, a jeśli nie ma tam wiadomości od nas, sprawdź również folder spam.<br><br> <a href="'.site_url().'/webinary"><button type="button" class="login__btn btn btn--orange">Wróć do logowania</button></a>';
	
	$formht = '<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-7 text-center pt-4">
        <h4 class="post__title"></h4>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-5 align-right">
        <input autocomplete="off" type="checkbox" id="form-switch">

        <form id="login-form" action="" method="post" class="login__form">
            <input class="login__input" type="email" name="email" placeholder="email" required >    
			
            <button type="submit" class="login__btn btn btn--orange">Resetuj hasło</button>
			<input type="hidden" name="lfsendtype" value="passreset">
        </form>

    </div>
</div>';
	
	if(isset($_POST['lfsendtype']) && isset($_POST['email']) && $_POST['email']!=NULL && $_POST['lfsendtype']=='passreset') {
		$jsondata = file_get_contents('https://apps.vidis.pl/api/mwsuser/passreseta?login='.$_POST['email']);
		$arr = json_decode($jsondata,true);
		$formht = '<div class="row"><div class="col-sm-12 text-center pt-4"><h4 class="post__title">'.$info2.'</h4></div></div>';
	} else $formht = str_replace('<h4 class="post__title"></h4>', '<h4 class="post__title">'.$info.'</h4>',$formht);
	
	echo $formht;
}

function PassReset($token=NULL) {
	if(isset($_POST['token'])) $token = $_POST['token'];
	if(isset($_GET['token'])) $token = $_GET['token'];
	
	$logindiv ='<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-7 text-center pt-4">
        <h4 class="post__title">Wpisz swoje nowe hasło.</h4>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-5 align-right">

        <form id="passreset-form" action="" method="post" class="register__form">
            <input autocomplete="off" class="register__input" type="password" name="password" placeholder="hasło" required >
            <input autocomplete="off" class="register__input" type="password" name="password2" placeholder="powtórz hasło" required>
            
            <button type="submit" class="register__btn btn btn--orange">Resetuj hasło</button>
			<input type="hidden" name="lfsendtype" value="newpass">
			<input type="hidden" name="token" value="'.$token.'">
			
		</form>

    </div>
</div>';

	if(isset($_POST['lfsendtype']) && $_POST['lfsendtype']=='newpass') {
		if($_POST['password']!=$_POST['password2']) {
			 $logindiv = str_replace('</h4>','<br><br><span style="color:red">Wartości w polach <strong>hasło</strong> i <strong>powtórz hasło</strong> powinny być identyczne.</span></h4>',$logindiv);
		} else {
			$jsondata = file_get_contents('https://apps.vidis.pl/api/mwsuser/passresetb?token='.$_POST['token'].'&password='.$_POST['password']);
			$arr = json_decode($jsondata,true);
			$logindiv = str_replace('<h4 class="post__title">Wpisz swoje nowe hasło.</h4>','<h4 class="post__title">'.$arr['error'].'</h4>',$logindiv);
		}
	}
	
	echo $logindiv;
}

function RegisterU() {
	$logindiv ='<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-7 text-center pt-4">
        <h4 class="post__title">Aby uzyskać dostęp do webinarów, w których brałeś/aś udział - zaloguj się.<br><br> Jeśli nie masz jeszcze konta - zarejestruj się.</h4>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-5 align-right">
        <input autocomplete="off" type="checkbox" id="form-switch">

        <form id="login-form" action="" method="post" class="login__form">
            <input autocomplete="off" class="login__input" type="email" name="email" placeholder="email" required >
            <input autocomplete="off" class="login__input" type="password" name="password" placeholder="hasło" required >
            
            
            <button type="submit" class="login__btn btn btn--orange">Zaloguj się</button>
            <label for="form-switch" class="login__switch"><span>Załóż konto</span></label>
            <a href="'.site_url().'/webinary?passremember=1" class="login__switch">Zapomniałem hasła</a>
			<input autocomplete="off" type="hidden" name="lfsendtype" value="login">
        </form>

        <form id="register-form" action="" method="post" class="register__form">
            <input autocomplete="off" class="register__input" type="text" name="username" placeholder="imię" required>
			<input autocomplete="off" class="register__input" type="text" name="username2" placeholder="nazwisko" required>
            <input autocomplete="off" class="register__input" type="email" name="email" placeholder="email" required >
            <input autocomplete="off" class="register__input" type="password" name="password" placeholder="hasło" required >
            <input autocomplete="off" class="register__input" type="password" name="password2" placeholder="powtórz hasło" required>
            
			<input class="register__input" type="checkbox" name="zgoda_ok">Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymywania od portalu MWS informacji, zaproszeń, ofert i ogłoszeń o produktach i programach edukacyjnych." >Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymywania od portalu MWS informacji, zaproszeń, ofert i ogłoszeń o produktach i programach edukacyjnych.
			<label><input class="register__input" type="checkbox" name="przetwarzanie_ok" > *Wyrażam zgodę na przetwarzanie moich danych osobowych zgodnie z ustawą o ochronie danych osobowych. Zostałem/am poinformowany/a, że przysługuje mi prawo dostępu do swoich danych, możliwości ich poprawiania, żądania zaprzestania ich przetwarzania. Więcej informacji: <a href="https://mws.pl/polityka-prywatnosci/">polityka prywatności</a></label>
			
            <button type="submit" class="register__btn btn btn--orange">Załóż konto</button>
            <label for="form-switch" class="register__switch">Jesteś użytkownikiem, zaloguj się</label>
			<input autocomplete="off" type="hidden" name="lfsendtype" value="reg">
		</form>


    </div>
</div>';

	if($_POST['password']!=$_POST['password2']) {
		 $logindiv = str_replace('</h4>','<br><br><span style="color:red">Wartości w polach <strong>hasło</strong> i <strong>powtórz hasło</strong> powinny być identyczne.</span></h4>',$logindiv);
	
		echo $logindiv;
		return true; 
	}
	
	$jsondata = file_get_contents('https://apps.vidis.pl/api/mwsuser/register?login='.$_POST['email'].'&password='.$_POST['password'].'&name='.$_POST['username'].'%20'.$_POST['username2']);
	$arr = json_decode($jsondata,true);
	//print_r($arr);
	if($arr['code']!=0) $logindiv = str_replace('</h4>','<br><br><span style="color:green">Rejestracja przebiegła pomyślnie. Możesz użyć podanego maila i hasła do zalogowania się.</span></h4>',$logindiv);
	else $logindiv = str_replace('</h4>','<br><br><span style="color:red">'.$arr['error'].'</span></h4>',$logindiv);
	
	echo $logindiv;
	return true; 
}



////////////////////////////////////////////////////////////////////////////////////////////////////
//echo print_r($_POST, true);
$wyswietlony = false;

if(isset($_POST['lfsendtype']) && $_POST['lfsendtype']!=NULL) {
	if($_POST['lfsendtype']==='reg') $wyswietlony = RegisterU();
	else if($_POST['lfsendtype']==='login') $wyswietlony = LogujU();
	else if($_POST['lfsendtype']==='logout') session_unset();
	else if($_POST['lfsendtype']==='personaldata') EditU();
} 

if(!isset($_GET['token']) && isset($_POST['token'])) $_GET['token'] = $_POST['token'];

if(isset($_GET['token']) && $_GET['token']!=NULL) {
	$wyswietlony = true;
	PassReset();
} else if(isset($_SESSION['userLogged'])) {
	echo file_get_contents('https://apps.vidis.pl/api/webinar/mwscontent/'.$_SESSION['email']);
} else if(isset($_GET['passremember']) && $_GET['passremember']==1) {
	$wyswietlony = true;
	PassRem();
}  else if(!$wyswietlony) echo $logindiv;

if($_SESSION['email']==='marcin.waszak@vidis.pl') {
	echo '<pre>'.print_r($_SESSION,true).'</pre>';
	echo '<pre>'.print_r($_POST,true).'</pre>';
}
?>
