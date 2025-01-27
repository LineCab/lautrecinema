<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="./src/css/reset.css" rel="stylesheet">
  <link href="./src/css/style.css" rel="stylesheet">

</head>

<body>
  <?php include_once './header.php'; ?>
  <main class="grid">
    <section class="showtime-section">
      <img src="/src/image/showtime-deco.jpg">
      <div class="showtime-box">
        <h2>Qu’est-ce que ShowTime ?</h2>
        <p>Notre projet en tant qu'étudiants en MMI est de créer un épisode pilote d'une émission télévisée. Divisés en groupes de dix, nous sommes chargés d'imaginer et de produire cet épisode avec le soutien de deux intervenants. Notre objectif est de présenter 15 minutes de contenu, incluant le générique, des interviews, des chroniques et un invité en plateau.
          <br>Ce projet met en pratique diverses compétences telles que la rédaction, la gestion de projet, l'audiovisuel, le montage et la communication. Avec seulement douze jours de travail intensif, nous sommes prêts à relever le défi. C'est showtime !
        </p>
      </div>
    </section>
    <section class="number-section">
      <h2>Chiffres clés</h2>
      <div class="number-flex">
        <div class="box-number">
          <p class="number">15</p>
          <p>min</p>
        </div>
        <div class="box-number">
          <p class="number">10</p>
          <p>étudiants</p>
        </div>
        <div class="box-number">
          <p class="number">12</p>
          <p>jours</p>
        </div>
        <div class="box-number">
          <p class="number">5e</p>
          <p>édition</p>
        </div>
      </div>
    </section>
    <section class="gallery">
      <div class="parent">
        <div class="div1"><img src="./src/image/gallery1.jpg" onclick="openImage(this)"></div>
        <div class="div2"><img src="./src/image/gallery2.jpg" onclick="openImage(this)"></div>
        <div class="div3"><img src="./src/image/gallery3.jpg" onclick="openImage(this)"></div>
        <div class="div4"><img src="./src/image/gallery4.jpg" onclick="openImage(this)"></div>
        <div class="div5"><img src="./src/image/gallery5.jpg" onclick="openImage(this)"></div>
      </div>
    </section>
    <div class="popup" id="popup" onclick="closePopup()">
      <span class="close" onclick="closePopup()">&times;</span>
      <img src="" id="popupImage" alt="Popup Image">
    </div>
    <script>
      function openImage(element) {
        document.getElementById("popup").style.display = "flex";
        document.getElementById("popupImage").src = element.src;
      }

      function closePopup() {
        document.getElementById("popup").style.display = "none";
      }
    </script>
  </main>
  <?php require_once 'footer.php' ?>
</body>

</html>
