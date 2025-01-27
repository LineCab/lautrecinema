<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="../src/css/reset.css" rel="stylesheet">
  <link href="../src/css/style.css" rel="stylesheet">
  <link href="../src/css/episodes.css" rel="stylesheet">
</head>

<body>
  <div id="loader"></div>

  <script>
    window.addEventListener('load', function() {
      var loader = document.getElementById('loader');
      loader.style.display = 'none';
      document.querySelector('main').style.visibility = 'visible'; // Sélectionnez la balise main correctement
    });
  </script>
  <?php
  require_once '../config.php';

  $recents = mysqli_query($connexion, "SELECT * FROM video Where idVid = 1");
  ?>
  <main class="grid">
    <div class="flex-icon-top">
      <svg id="arrowDown" width="28" height="16" viewBox="0 0 28 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M26 2L14 14L2 2" stroke="#2D2D2D" stroke-width="4" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
      </svg>

      <svg id="shareIcon" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M25.6369 8.94354L15.887 0.27694C15.7312 0.137025 15.5383 0.0453285 15.3314 0.0129834C15.1246 -0.0193617 14.9128 0.00903626 14.7218 0.0947293C14.5308 0.180422 14.3688 0.319724 14.2554 0.495722C14.1421 0.671719 14.0823 0.876842 14.0832 1.08618V4.56041C10.8289 5.43357 0 9.49821 0 24.9193C0.000396642 25.1708 0.0882867 25.4144 0.248597 25.6082C0.408907 25.802 0.631648 25.9339 0.878618 25.9814C1.12559 26.029 1.3814 25.9891 1.60218 25.8686C1.82296 25.7482 1.99495 25.5547 2.08865 25.3213C5.30071 17.2906 11.5623 15.6147 14.0821 15.2647V18.4194C14.0819 18.6285 14.1423 18.8333 14.2558 19.0089C14.3694 19.1845 14.5314 19.3235 14.7222 19.409C14.9131 19.4946 15.1246 19.5231 15.3313 19.4911C15.538 19.4591 15.731 19.3679 15.887 19.2286L25.6369 10.562C25.7511 10.4604 25.8425 10.3357 25.9051 10.1963C25.9676 10.0568 26 9.90566 26 9.75279C26 9.59992 25.9676 9.44878 25.9051 9.3093C25.8425 9.16983 25.7511 9.04518 25.6369 8.94354Z" fill="#2D2D2D" />
      </svg>
    </div>

    <script>
      document.getElementById('arrowDown').addEventListener('click', function() {
        document.body.style.transition = "transform 0.5s ease";
        document.body.style.transform = "translateY(100%)";
        setTimeout(function() {
          window.location.href = "../videos.php"; // Redirige vers video.php après la transition
        }, 500); // Temps de la transition en millisecondes
      });
    </script>




    <div class="overlay" id="overlay"></div>

    <div id="modal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>Partager sur </p>
        <div class="card-modal">
          <button id="facebookButton" class="socialContainer containerOne" href="#">
            <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="socialSvg">
              <path d="M6.80799 2.65602H8.31199V0.112024C7.58379 0.0363015 6.85211 -0.00108342 6.11999 2.38913e-05C3.94399 2.38913e-05 2.456 1.32802 2.456 3.76002V5.85601H0V8.70401H2.456V16H5.39999V8.70401H7.84799L8.21599 5.85601H5.39999V4.04002C5.39999 3.20002 5.62399 2.65602 6.80799 2.65602Z" fill="#FFF" />
            </svg>
          </button>

          <button id="twitterButton" class="socialContainer containerTwo" href="#">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="socialSvg">
              <path d="M10.2667 6.72L16.5333 0H14.9333L9.54667 5.76L5.33333 0H0L6.56 8.96L0 16H1.6L7.28 9.92L11.7333 16H17.0667L10.2667 6.72ZM2.37333 1.06667H4.50667L14.6667 14.9333H12.5333L2.37333 1.06667Z" fill="white" />
            </svg>
          </button>

          <button id="emailButton" class="socialContainer containerThree" href="#">
            <svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="socialSvg">
              <path d="M11.1999 7.048L21.4239 0.48C21.0129 0.171691 20.5138 0.00344084 19.9999 0H2.39995C1.88614 0.00344084 1.387 0.171691 0.975952 0.48L11.1999 7.048Z" fill="#FFF" />
              <path d="M11.632 8.6721L11.496 8.7361H11.432C11.3583 8.76901 11.2801 8.79059 11.2 8.8001C11.1336 8.80847 11.0664 8.80847 11 8.8001H10.936L10.8 8.7361L0.0799999 1.80811C0.0287825 2.00134 0.00190776 2.20021 0 2.4001V13.6001C0 14.2366 0.252856 14.8471 0.702943 15.2972C1.15303 15.7472 1.76348 16.0001 2.4 16.0001H20C20.6365 16.0001 21.247 15.7472 21.697 15.2972C22.1471 14.8471 22.4 14.2366 22.4 13.6001V2.4001C22.3981 2.20021 22.3712 2.00134 22.32 1.80811L11.632 8.6721Z" fill="#FFF" />
            </svg>
          </button>

          <button id="whatsappButton" class="socialContainer containerFour" href="#">
            <svg viewBox="0 0 16 16" class="socialSvg">
              <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
            </svg>
          </button>
          <button id="copyButton" class="socialContainer containerFive" href="#">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="socialSvg">
              <g clip-path="url(#clip0_342_152)">
                <path d="M10.6667 0.666748H2.66671C1.93004 0.666748 1.33337 1.26341 1.33337 2.00008V11.3334H2.66671V2.00008H10.6667V0.666748ZM12.6667 3.33341H5.33337C4.59671 3.33341 4.00004 3.93008 4.00004 4.66675V14.0001C4.00004 14.7367 4.59671 15.3334 5.33337 15.3334H12.6667C13.4034 15.3334 14 14.7367 14 14.0001V4.66675C14 3.93008 13.4034 3.33341 12.6667 3.33341ZM12.6667 14.0001H5.33337V4.66675H12.6667V14.0001Z" fill="#FFF" />
              </g>
              <defs>
                <clipPath id="clip0_342_152">
                  <rect width="16" height="16" fill="white" />
                </clipPath>
              </defs>
            </svg>

          </button>
        </div>
      </div>
    </div>

    <script>
      var modal = document.getElementById("modal");
      var overlay = document.getElementById("overlay");
      var twitterButton = document.getElementById("twitterButton");
      var whatsappButton = document.getElementById("whatsappButton");
      var copyButton = document.getElementById("copyButton");
      var facebookButton = document.getElementById("facebookButton");
      var emailButton = document.getElementById("emailButton");
      var shareUrl = window.location.href;

      document.getElementById('shareIcon').addEventListener('click', function() {
        modal.style.display = "block";
        overlay.style.display = "block";
      });

      twitterButton.addEventListener('click', function() {
        // Ouvrir la fenêtre de partage avec l'URL spécifiée pour Twitter
        window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(shareUrl), '_blank');
        modal.style.display = "none";
        overlay.style.display = "none";
      });

      whatsappButton.addEventListener('click', function() {
        // Ouvrir la fenêtre de partage avec l'URL spécifiée pour WhatsApp
        window.open('https://api.whatsapp.com/send?text=' + encodeURIComponent(shareUrl), '_blank');
        modal.style.display = "none";
        overlay.style.display = "none";
      });
      facebookButton.addEventListener('click', function() {
        // Ouvrir la fenêtre de partage avec l'URL spécifiée pour Facebook
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(shareUrl), '_blank');
        modal.style.display = "none";
        overlay.style.display = "none";
      });

      emailButton.addEventListener('click', function() {
        // Ouvrir la fenêtre de partage avec l'URL spécifiée pour l'e-mail
        window.open('mailto:?subject=Check%20this%20out&body=' + encodeURIComponent(shareUrl), '_blank');
        modal.style.display = "none";
        overlay.style.display = "none";
      });

      copyButton.addEventListener('click', function() {
        // Copier l'adresse de la page dans le presse-papiers
        navigator.clipboard.writeText(shareUrl);
        // Afficher l'icône de vérification
        copyButton.innerHTML = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="socialSvg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.66667 12.3333L2.66667 8.33333L4 7L6.66667 9.66667L12 4.33333L13.3333 5.66667L6.66667 12.3333Z" fill="#57BB4E"/></svg>';
        // Masquer l'icône après 2 secondes
        setTimeout(function() {
          copyButton.innerHTML = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="socialSvg"><g clip-path="url(#clip0_342_152)"><path d="M10.6667 0.666748H2.66671C1.93004 0.666748 1.33337 1.26341 1.33337 2.00008V11.3334H2.66671V2.00008H10.6667V0.666748ZM12.6667 3.33341H5.33337C4.59671 3.33341 4.00004 3.93008 4.00004 4.66675V14.0001C4.00004 14.7367 4.59671 15.3334 5.33337 15.3334H12.6667C13.4034 15.3334 14 14.7367 14 14.0001V4.66675C14 3.93008 13.4034 3.33341 12.6667 3.33341ZM12.6667 14.0001H5.33337V4.66675H12.6667V14.0001Z" fill="#FFF"/></g><defs><clipPath id="clip0_342_152"><rect width="16" height="16" fill="white" /></clipPath></defs></svg>';
        }, 2000);
      });
      document.querySelector('.close').addEventListener('click', function() {
        modal.style.display = "none";
        overlay.style.display = "none";
      });
      window.onclick = function(event) {
        if (event.target == overlay) {
          modal.style.display = "none";
          overlay.style.display = "none";
        }

      }
    </script>
    <?php
    foreach ($recents as $recent) {
      $title = $recent["titleVid"];
      $description = $recent["descriptionVid"];
      $img = $recent["imgVid"];
      $sources = $recent["sourcesVid"];
      $duree = $recent["timeVid"];
      $duree_timestamp = strtotime($duree);
      $duree_datetime = new DateTime("@$duree_timestamp");
      $url = $recent["urlVid"];
      $idVid = $recent["idVid"];
    ?>
      <div class="col-episode">
        <div class="video">
          <video id="videoPlayer" src="../src/video/episode2.mov" height="100%" style="display: none;"></video>
          <div class="infos title-video">
            <h3><?php echo $title; ?></h3>
          </div>
          <div class="infos duree-video">
            <svg width="25" height="25" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0064 0C6.29065 0 0 6.28174 0 13.9962C0 21.7106 6.29192 28 14.0064 28C21.7208 28 28 21.7106 28 13.9962C28 6.28174 21.7208 0 14.0064 0ZM14.0064 2.54476C15.5108 2.54225 17.0009 2.83675 18.3912 3.41138C19.7816 3.986 21.0448 4.82945 22.1084 5.89335C23.1721 6.95725 24.0153 8.22066 24.5896 9.61113C25.1639 11.0016 25.4581 12.4918 25.4552 13.9962C25.4583 15.501 25.1643 16.9916 24.5901 18.3826C24.0159 19.7736 23.1729 21.0375 22.1093 22.1021C21.0457 23.1666 19.7825 24.0108 18.392 24.5862C17.0015 25.1616 15.5112 25.4569 14.0064 25.4552C12.5009 25.4571 11.0099 25.162 9.61861 24.5868C8.22736 24.0116 6.96322 23.1676 5.89858 22.1032C4.83394 21.0388 3.9897 19.7749 3.4142 18.3837C2.83871 16.9926 2.54325 15.5016 2.54476 13.9962C2.54476 7.65718 7.66736 2.54476 14.0064 2.54476ZM13.986 5.07171C13.8178 5.07336 13.6516 5.10833 13.4971 5.17461C13.3425 5.24089 13.2026 5.33716 13.0854 5.45785C12.9683 5.57853 12.8762 5.72125 12.8146 5.87774C12.753 6.03423 12.723 6.20138 12.7263 6.36954V13.9962C12.727 14.1636 12.7608 14.3293 12.8256 14.4836C12.8905 14.638 12.9852 14.778 13.1042 14.8958L18.1938 19.9878C18.3115 20.109 18.4522 20.2055 18.6076 20.2717C18.763 20.3379 18.93 20.3725 19.099 20.3734C19.2679 20.3744 19.4353 20.3417 19.5915 20.2773C19.7476 20.2129 19.8894 20.118 20.0085 19.9982C20.1276 19.8785 20.2217 19.7362 20.2852 19.5796C20.3488 19.4231 20.3805 19.2555 20.3786 19.0866C20.3766 18.9177 20.3411 18.7508 20.274 18.5958C20.2069 18.4408 20.1096 18.3006 19.9878 18.1836L15.2737 13.4694V6.36954C15.2771 6.19902 15.2462 6.02956 15.1828 5.87122C15.1194 5.71288 15.0249 5.5689 14.9048 5.44783C14.7847 5.32676 14.6414 5.23108 14.4836 5.16646C14.3258 5.10185 14.1565 5.06963 13.986 5.07171Z" fill="#FCF4F0" />
            </svg>
            <p id="timeDisplay"><?php echo $duree_datetime->format('i:s'); ?></p>
          </div>
        </div>

        <div class="controllers">
          <div class="volume-icon">
            <svg class="controller-icon" width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M17.4809 9.47233C17.4809 11.2045 16.7658 12.7937 15.6216 13.9697L14.5568 12.9049C15.4309 12.015 15.9712 10.8231 15.9712 9.47233C15.9712 8.12153 15.4309 6.91376 14.5568 6.03972L15.6216 4.97497C16.2124 5.56522 16.6808 6.26638 16.9999 7.03817C17.3189 7.80996 17.4824 8.63718 17.4809 9.47233ZM10.6792 0.350481L4.76752 6.2622H1.58917C0.715127 6.2622 0 6.97733 0 7.85137V11.0297C0 11.9038 0.715127 12.6189 1.58917 12.6189H4.76752L10.6792 18.5306C11.4261 19.2775 12.7134 18.7531 12.7134 17.6883V1.19274C12.7134 0.127997 11.4261 -0.39643 10.6792 0.350481ZM20.1189 0.477615L19.0542 1.54236C20.096 2.57956 20.9217 3.81308 21.4837 5.17152C22.0456 6.52996 22.3325 7.98636 22.3279 9.45644C22.3279 12.5394 21.0883 15.3364 19.0542 17.3705L20.1189 18.4353C21.3011 17.2551 22.2382 15.8529 22.8764 14.3092C23.5146 12.7655 23.8412 11.1109 23.8376 9.44054C23.8376 5.91258 22.4232 2.73424 20.1189 0.445831V0.477615ZM17.8782 2.71835L16.7817 3.78309C17.5289 4.52992 18.1213 5.41692 18.5249 6.39322C18.9285 7.36951 19.1353 8.41589 19.1336 9.47233C19.1336 11.6813 18.2437 13.6995 16.7817 15.1298L17.8782 16.1945C18.7611 15.3121 19.4613 14.264 19.9385 13.1105C20.4157 11.957 20.6606 10.7207 20.6592 9.47233C20.6592 6.85019 19.5945 4.45054 17.8782 2.71835Z" fill="#2D2D2D" />
            </svg>

          </div>
          <a href="./episode<?php echo ($idVid - 1) ?>.php">
            <svg class="controller-icon" width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.66638 20.2501C2.10841 20.2501 2.53233 20.0789 2.84489 19.7741C3.15745 19.4694 3.33305 19.056 3.33305 18.6251L3.33305 12.4176L3.56638 12.6613L12.0664 19.5026C12.5781 19.9023 13.1947 20.1539 13.8459 20.2286C14.4972 20.3033 15.1568 20.1981 15.7497 19.9251C16.2494 19.6918 16.6712 19.3253 16.9661 18.8681C17.2611 18.4108 17.4172 17.8815 17.4164 17.3413L17.4164 3.65881C17.4172 3.11864 17.2611 2.58929 16.9661 2.13203C16.6712 1.67478 16.2494 1.30831 15.7497 1.07506C15.2733 0.863811 14.7564 0.753061 14.233 0.750057C13.4442 0.749138 12.6791 1.0131 12.0664 1.49755L3.56638 8.33881L3.33305 8.58256V2.37506C3.33305 1.94408 3.15745 1.53075 2.84489 1.22601C2.53233 0.921261 2.10841 0.750057 1.66638 0.750057C1.22435 0.750057 0.800426 0.921261 0.487865 1.22601C0.175304 1.53075 -0.00028801 1.94408 -0.00028801 2.37506L-0.00028801 18.6251C-0.00028801 19.056 0.175304 19.4694 0.487865 19.7741C0.800426 20.0789 1.22435 20.2501 1.66638 20.2501Z" fill="#2D2D2D" />
            </svg>
          </a>

          <div class="circle" id="playButton">
            <svg width="19" height="21" viewBox="0 0 19 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 1.70103V19.299C0 20.6409 1.57578 21.4562 2.7893 20.7258L17.5328 11.9269C18.6557 11.2644 18.6557 9.73561 17.5328 9.05615L2.7893 0.274169C1.57578 -0.456248 0 0.359101 0 1.70103Z" fill="#FCF4F0" />
            </svg>
          </div>

          <a href="./episode<?php echo ($idVid + 1) ?>.php">
            <svg class="controller-icon" width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.1665 0.249945C15.7245 0.249945 15.3006 0.42115 14.988 0.725897C14.6754 1.03064 14.4998 1.44397 14.4998 1.87494V8.08244L14.2665 7.83869L5.76651 0.997445C5.25479 0.597685 4.63818 0.346122 3.98695 0.271422C3.33573 0.196723 2.67608 0.301892 2.08317 0.574944C1.58347 0.8082 1.16173 1.17466 0.866772 1.63192C0.571816 2.08917 0.415705 2.61852 0.416507 3.15869V16.8412C0.415705 17.3814 0.571816 17.9107 0.866772 18.368C1.16173 18.8252 1.58347 19.1917 2.08317 19.4249C2.55962 19.6362 3.07645 19.7469 3.59984 19.7499C4.38869 19.7509 5.15381 19.4869 5.76651 19.0024L14.2665 12.1612L14.4998 11.9174V18.1249C14.4998 18.5559 14.6754 18.9692 14.988 19.274C15.3006 19.5787 15.7245 19.7499 16.1665 19.7499C16.6085 19.7499 17.0325 19.5787 17.345 19.274C17.6576 18.9692 17.8332 18.5559 17.8332 18.1249V1.87494C17.8332 1.44397 17.6576 1.03064 17.345 0.725897C17.0325 0.42115 16.6085 0.249945 16.1665 0.249945Z" fill="#2D2D2D" />
            </svg>
          </a>
          <svg class="controller-icon" id="fullscreen" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.57143 11.5714H0V18H6.42857V15.4286H2.57143V11.5714ZM0 6.42857H2.57143V2.57143H6.42857V0H0V6.42857ZM15.4286 15.4286H11.5714V18H18V11.5714H15.4286V15.4286ZM11.5714 0V2.57143H15.4286V6.42857H18V0H11.5714Z" fill="#2D2D2D" />
          </svg>

        </div>
        <script>
          const playButton = document.getElementById('playButton');
          const videoPlayer = document.getElementById('videoPlayer');
          const videoContainer = document.querySelector('.video');
          let isPlaying = false;

          playButton.addEventListener('click', () => {
            playVideo(); // Appeler la fonction pour lire ou mettre en pause la vidéo
          });
          document.addEventListener('keydown', (event) => {
            if (event.code === 'Space') {
              event.preventDefault(); // Empêche le comportement par défaut de la barre d'espace (défilement de la page)
              playVideo(); // Appelle la fonction pour lire ou mettre en pause la vidéo
            }
          });

          // Fonction pour lire ou mettre en pause la vidéo
          function playVideo() {
            if (isPlaying) {
              videoPlayer.pause(); // Mettre en pause la vidéo si elle est en cours de lecture
              playButton.innerHTML = `
            <svg width="19" height="21" viewBox="0 0 19 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 1.70103V19.299C0 20.6409 1.57578 21.4562 2.7893 20.7258L17.5328 11.9269C18.6557 11.2644 18.6557 9.73561 17.5328 9.05615L2.7893 0.274169C1.57578 -0.456248 0 0.359101 0 1.70103Z" fill="#FCF4F0" />
            </svg>`;
              videoContainer.style.background = 'url(\'/src/image/episode2.png\') center center/cover'; // Ajouter un fond flou lors de la lecture de la vidéo
            } else {
              videoPlayer.style.display = 'block'; // Afficher la vidéo si elle est cachée
              // videoContainer.style.background = 'none';
              videoPlayer.play(); // Lancer la lecture de la vidéo
              playButton.innerHTML = `
            <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.625 0C1.92881 0 1.26113 0.276562 0.768845 0.768845C0.276562 1.26113 0 1.92881 0 2.625L0 18.375C0 19.0712 0.276562 19.7389 0.768845 20.2312C1.26113 20.7234 1.92881 21 2.625 21C3.32119 21 3.98887 20.7234 4.48116 20.2312C4.97344 19.7389 5.25 19.0712 5.25 18.375V2.625C5.25 1.92881 4.97344 1.26113 4.48116 0.768845C3.98887 0.276562 3.32119 0 2.625 0ZM15.75 2.625V18.375C15.75 19.0712 15.4734 19.7389 14.9812 20.2312C14.4889 20.7234 13.8212 21 13.125 21C12.4288 21 11.7611 20.7234 11.2688 20.2312C10.7766 19.7389 10.5 19.0712 10.5 18.375V2.625C10.5 1.92881 10.7766 1.26113 11.2688 0.768845C11.7611 0.276562 12.4288 0 13.125 0C13.8212 0 14.4889 0.276562 14.9812 0.768845C15.4734 1.26113 15.75 1.92881 15.75 2.625Z" fill="white"/>
            </svg>`;
            }
            isPlaying = !isPlaying; // Inverser l'état de lecture
          }


          const fullscreenButton = document.getElementById('fullscreen');

          fullscreenButton.addEventListener('click', () => {
            if (videoPlayer.requestFullscreen) {
              videoPlayer.requestFullscreen();
              playVideo(); // Lancer la vidéo lorsque vous passez en mode plein écran
            } else if (videoPlayer.mozRequestFullScreen) {
              /* Firefox */
              videoPlayer.mozRequestFullScreen();
              playVideo(); // Lancer la vidéo lorsque vous passez en mode plein écran
            } else if (videoPlayer.webkitRequestFullscreen) {
              /* Chrome, Safari and Opera */
              videoPlayer.webkitRequestFullscreen();
              playVideo(); // Lancer la vidéo lorsque vous passez en mode plein écran
            } else if (videoPlayer.msRequestFullscreen) {
              /* IE/Edge */
              videoPlayer.msRequestFullscreen();
              playVideo(); // Lancer la vidéo lorsque vous passez en mode plein écran
            }
          });
          const volumeIcon = document.querySelector('.volume-icon');
          let isMuted = false;

          volumeIcon.addEventListener('click', () => {
            if (isMuted) {
              videoPlayer.volume = 1; // Remettre le volume à 100%
              volumeIcon.innerHTML = `
              <svg class="controller-icon" width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M17.4809 9.47233C17.4809 11.2045 16.7658 12.7937 15.6216 13.9697L14.5568 12.9049C15.4309 12.015 15.9712 10.8231 15.9712 9.47233C15.9712 8.12153 15.4309 6.91376 14.5568 6.03972L15.6216 4.97497C16.2124 5.56522 16.6808 6.26638 16.9999 7.03817C17.3189 7.80996 17.4824 8.63718 17.4809 9.47233ZM10.6792 0.350481L4.76752 6.2622H1.58917C0.715127 6.2622 0 6.97733 0 7.85137V11.0297C0 11.9038 0.715127 12.6189 1.58917 12.6189H4.76752L10.6792 18.5306C11.4261 19.2775 12.7134 18.7531 12.7134 17.6883V1.19274C12.7134 0.127997 11.4261 -0.39643 10.6792 0.350481ZM20.1189 0.477615L19.0542 1.54236C20.096 2.57956 20.9217 3.81308 21.4837 5.17152C22.0456 6.52996 22.3325 7.98636 22.3279 9.45644C22.3279 12.5394 21.0883 15.3364 19.0542 17.3705L20.1189 18.4353C21.3011 17.2551 22.2382 15.8529 22.8764 14.3092C23.5146 12.7655 23.8412 11.1109 23.8376 9.44054C23.8376 5.91258 22.4232 2.73424 20.1189 0.445831V0.477615ZM17.8782 2.71835L16.7817 3.78309C17.5289 4.52992 18.1213 5.41692 18.5249 6.39322C18.9285 7.36951 19.1353 8.41589 19.1336 9.47233C19.1336 11.6813 18.2437 13.6995 16.7817 15.1298L17.8782 16.1945C18.7611 15.3121 19.4613 14.264 19.9385 13.1105C20.4157 11.957 20.6606 10.7207 20.6592 9.47233C20.6592 6.85019 19.5945 4.45054 17.8782 2.71835Z" fill="#2D2D2D"/>
              </svg>`;
            } else {
              videoPlayer.volume = 0; // Mettre le volume à 0
              volumeIcon.innerHTML = `
              <svg class="controller-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M17.4809 12.4723C17.4809 14.2045 16.7658 15.7937 15.6216 16.9697L14.5568 15.9049C15.4309 15.015 15.9712 13.8231 15.9712 12.4723C15.9712 11.1215 15.4309 9.91376 14.5568 9.03972L15.6216 7.97497C16.2124 8.56522 16.6808 9.26638 16.9999 10.0382C17.3189 10.81 17.4824 11.6372 17.4809 12.4723ZM10.6792 3.35048L4.76752 9.2622H1.58917C0.715127 9.2622 0 9.97733 0 10.8514V14.0297C0 14.9038 0.715127 15.6189 1.58917 15.6189H4.76752L10.6792 21.5306C11.4261 22.2775 12.7134 21.7531 12.7134 20.6883V4.19274C12.7134 3.128 11.4261 2.60357 10.6792 3.35048ZM20.1189 3.47761L19.0542 4.54236C20.096 5.57956 20.9217 6.81308 21.4837 8.17152C22.0456 9.52996 22.3325 10.9864 22.3279 12.4564C22.3279 15.5394 21.0883 18.3364 19.0542 20.3705L20.1189 21.4353C21.3011 20.2551 22.2382 18.8529 22.8764 17.3092C23.5146 15.7655 23.8412 14.1109 23.8376 12.4405C23.8376 8.91258 22.4232 5.73424 20.1189 3.44583V3.47761ZM17.8782 5.71835L16.7817 6.78309C17.5289 7.52992 18.1213 8.41692 18.5249 9.39322C18.9285 10.3695 19.1353 11.4159 19.1336 12.4723C19.1336 14.6813 18.2437 16.6995 16.7817 18.1298L17.8782 19.1945C18.7611 18.3121 19.4613 17.264 19.9385 16.1105C20.4157 14.957 20.6606 13.7207 20.6592 12.4723C20.6592 9.85019 19.5945 7.45054 17.8782 5.71835Z" fill="#2D2D2D"/>
              <line x1="1.70711" y1="1.29289" x2="23.352" y2="22.9378" stroke="#2D2D2D" stroke-width="2"/>
              </svg>`;
            }
            isMuted = !isMuted; // Inverser l'état du son
          });



          // Récupère la durée totale de la vidéo
          var duration = videoPlayer.duration;

          // Met à jour le temps toutes les secondes
          // Met à jour le temps toutes les secondes
          var timer = setInterval(() => {
            // Vérifie si la vidéo est chargée
            if (!isNaN(videoPlayer.duration)) {
              // Récupère la durée totale de la vidéo
              var duration = videoPlayer.duration;

              // Récupère le temps écoulé de la vidéo
              var currentTime = videoPlayer.currentTime;

              // Calcule le temps restant
              var timeLeft = duration - currentTime;

              // Convertit le temps restant en minutes et secondes
              var minutes = Math.floor(timeLeft / 60);
              var seconds = Math.floor(timeLeft % 60);

              // Ajoute un zéro en tête si nécessaire
              var formattedTime = (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

              // Met à jour le contenu de l'élément HTML pour afficher le temps restant
              document.getElementById('timeDisplay').textContent = formattedTime;

              // Vérifie si la vidéo est terminée
              if (timeLeft <= 0) {
                // Arrête la mise à jour du temps
                clearInterval(timer);
              }
            }
          }, 1000); // Met à jour toutes les secondes
        </script>
        <h3>Description</h3>
        <p><?php echo $description ?></p>
        <h3>Sources</h3>
        <p><?php echo $sources ?></p>
      </div>



      <!-- <iframe width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe> -->

    <?php
    }
    ?>
  </main>

  <?php
  include_once '../footer.php';
  ?>

</body>

</html>
