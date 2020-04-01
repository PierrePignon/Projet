<link rel="stylesheet" href="public/css/footer.css">
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">

<div class="subnavbar">
	<div class="item">
		<button id="btn_cgu" onclick="location.href='index.php?page=footer&action=cgu'">Afficher les CGU</button>
	</div>
	<div class="item">
		<button id="btn_contact" class="btn_contact">Nous Contacter</button>
	</div>
	<div class="item">
		<button id="btn_quisommenous" onclick="location.href='index.php?page=footer&action=aboutUs'">Qui sommes nous ?</button>
	</div>
</div>

<div id ="overlay_contact" class="overlay_contact">
	<div id="popup" class="popup_contact"> 
		<div class="titre">Nous Contacter<span id="btnClose" class="btnClose">&times;</span>
		</div>
		<div class="part">
			<div class="subTitle">Par Mail : </div>
			<div class="corpus">support@enovateam.fr</div>
			<div class="subTitle">Par Téléphone :</div>
			<div class="corpus">+33 7 79 82 98 74</div>
			<div class="basdepage">Déjà Client ? <a href="index.php?action=logIn">Se Connecter</a></div>
		</div>
		<div class="part">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.76584454784!2d2.277664915553718!3d48.824528979284175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670797ea4730d%3A0xe0d3eb2ad501cb27!2sISEP!5e0!3m2!1sfr!2sfr!4v1557214756707!5m2!1sfr!2sfr" width="200" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>


<script >
	var btn_contact = document.getElementById('btn_contact');
	var overlay_contact = document.getElementById('overlay_contact');
	var btnClose = document.getElementById('btnClose');

	btn_contact.addEventListener('click',openModal);

	btnClose.addEventListener('click',closePopup);

	function closePopup() {
		overlay_contact.style.display='none';
	}

	function openModal() {
		overlay_contact.style.display ='block';
	}
</script>