<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <title>Inovate</title>
  <link rel="stylesheet" href= "public/css/cguStyle.css">
  <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

  <?php 
  if(!isset($_SESSION['type_connexion']) || empty($_SESSION['type_connexion'])){
    require($_SERVER['DOCUMENT_ROOT'].'/app/view/homeHeader.php'); 
  } elseif ($_SESSION['type_connexion'] == "user") {
    require($_SERVER['DOCUMENT_ROOT'].'/app/view/user/header.php');
  } elseif ($_SESSION['type_connexion'] == "admin") {
    require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/header.php');
  }
  ?>
  
  <div class="container">

    <h1> Conditions Générales d'Utilisation (CGU) </h1>

    <h2> ARTICLE 1 : Objet </h2>

    <div class="art">

      <p>
        Les présentes « conditions générales d'utilisation » ont pour objet l'encadrement juridique des modalités de mise à disposition des services du site E-nova et leur utilisation par « l'Utilisateur ».
      </p>

      <p>
        Les conditions générales d'utilisation doivent être acceptées par tout Utilisateur souhaitant accéder au site. Elles constituent le contrat entre le site et l'Utilisateur. L’accès au site par l’Utilisateur signifie son acceptation des présentes conditions générales d’utilisation.
      </p>

      <p>Éventuellement :</p>

      <ul>
        <li><p>En cas de non-acceptation des conditions générales d'utilisation stipulées dans le présent contrat, l'Utilisateur se doit de renoncer à l'accès des services proposés par le site.</p></li>
        <li><p>E-nova se réserve le droit de modifier unilatéralement et à tout moment le contenu des présentes conditions générales d'utilisation.</p></li>
      </ul>

    </div>

    <h2> ARTICLE 2 : Définitions </h2>

    <div class="art">

      <p> La présente clause a pour objet de définir les différents termes essentiels du contrat :</p>

      <ul>
        <li><p>Utilisateur : ce terme désigne toute personne qui utilise le site ou l'un des services proposés par le site.</p></li>
        <li><p>Contenu utilisateur : ce sont les données transmises par l'Utilisateur au sein du site.</p></li>
        <li><p>Membre : l'Utilisateur devient membre lorsqu'il est identifié sur le site.</p></li>
        <li>Identifiant et mot de passe : c'est l'ensemble des informations nécessaires à l'identification d'un Utilisateur sur le site. L'identifiant et le mot de passe permettent à l'Utilisateur d'accéder à des services réservés aux membres du site. Le mot de passe est confidentiel.</li>
      </ul>

    </div>

    <h2> ARTICLE 3 : Propriété intellectuelle </h2>

    <div class="art">

      <p> Les marques, logos, signes et tout autre contenu du site font l'objet d'une protection par le Code de la propriété intellectuelle et plus particulièrement par le droit d'auteur.</p>

      <p>L'Utilisateur sollicite l'autorisation préalable du site pour toute reproduction, publication, copie des différents contenus.</p>

      <p>L'Utilisateur s'engage à une utilisation des contenus du site dans un cadre strictement privé. Une utilisation des contenus à des fins commerciales est strictement interdite.</p>

      <p>Tout contenu mis en ligne par l'Utilisateur est de sa seule responsabilité. L'Utilisateur s'engage à ne pas mettre en ligne de contenus pouvant porter atteinte aux intérêts de tierces personnes. Tout recours en justice engagé par un tiers lésé contre le site sera pris en charge par l'Utilisateur.</p>

      <p>Le contenu de l'Utilisateur peut être à tout moment et pour n'importe quelle raison supprimé ou modifié par le site. L'Utilisateur ne reçoit aucune justification et notification préalablement à la suppression ou à la modification du contenu Utilisateur.</p>

    </div>

    <h2> ARTICLE 4 : Données personelles </h2>

    <div class="art">

      <p>Les informations demandées à l’inscription au site sont nécessaires et obligatoires pour la création du compte de l'Utilisateur. En particulier, l'adresse électronique pourra être utilisée par le site pour l'administration, la gestion et l'animation du service.</p>

      <p>Le site assure à l'Utilisateur une collecte et un traitement d'informations personnelles dans le respect de la vie privée conformément à la loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux libertés</p>

      <p>En vertu des articles 39 et 40 de la loi en date du 6 janvier 1978, l'Utilisateur dispose d'un droit d'accès, de rectification, de suppression et d'opposition de ses données personnelles. L'Utilisateur exerce ce droit via :</p>

      <ul>
        <li><p>son espace personnel ;</p></li>
        <li><p>un formulaire de contact ;</p></li>
        <li>par mail à support.enova@gmail.com ;</li>
      </ul>

    </div>

    <h2> ARTCILE 5 : Evolultion du contrat </h2>

    <div class="art">
      <p>Le site se réserve à tout moment le droit de modifier les clauses stipulées dans le présent contrat.</p>
    </div>

    <h2> ARTCILE 6 : Durée</h2>

    <div class="art">
      <p>La durée du présent contrat est indéterminée. Le contrat produit ses effets à l'égard de l'Utilisateur à compter de l'utilisation du service.</p>
    </div>

    <h2> ARTICLE 7 : Droit applicable et juridiction compétente</h2>

    <div class="art">
      <p>La législation française s'applique au présent contrat. En cas d'absence de résolution amiable d'un litige né entre les parties, seuls les tribunaux du ressort de la Cour d'appel de Paris sont compétents.</p>
    </div>

    <h2> ARTICLE 8 : Publication par l’Utilisateur </h2>

    <div class="art">

      <p>Le site permet aux membres de publier des commentaires.</p>

      <p>Dans ses publications, le membre s’engage à respecter les règles de la Netiquette et les règles de droit en vigueur.</p>

      <p>Le site exerce une modération [a priori / a posteriori] sur les publications et se réserve le droit de refuser leur mise en ligne, sans avoir à s’en justifier auprès du membre.</p>

      <p>Le membre reste titulaire de l’intégralité de ses droits de propriété intellectuelle. Mais en publiant une publication sur le site, il cède à la société éditrice le droit non exclusif et gratuit de représenter, reproduire, adapter, modifier, diffuser et distribuer sa publication, directement ou par un tiers autorisé, dans le monde entier, sur tout support (numérique ou physique), pour la durée de la propriété intellectuelle. Le Membre cède notamment le droit d'utiliser sa publication sur internet et sur les réseaux de téléphonie mobile.</p>

      <p>La société éditrice s'engage à faire figurer le nom du membre à proximité de chaque utilisation de sa publication.</p>

    </div>

  </div>
  
  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>