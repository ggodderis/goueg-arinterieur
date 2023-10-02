<?php

$moyen = 1.8;

$pourcent = ($moyen*2)*10;

echo '<style>
.gradient {
    fill : url(#gradient);
   }
.contour {
    fill : #f18624;
}
</style>';

echo '<b>'.($moyen*2).'</b>/10';

define('STARS','<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 178 28.53">
<defs>
<linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
  <stop offset="0%" stop-color="#f18624"/>
  <stop offset="'.$pourcent.'%" stop-color="#f18624"/>
  <stop offset="'.$pourcent.'%" stop-color="#ffffff"/>
  <stop offset="100%" stop-color="#ffffff"/>
</linearGradient>
</defs>
<path class="gradient" d="M24.3,28.5L15,22.9l-9.3,5.7L8.2,18L0,10.9L10.8,10L15,0l4.2,10L30,10.9l-8.2,7.1L24.3,28.5z M61.3,28.5L52,22.9l-9.3,5.7
	L45.2,18L37,10.9L47.8,10L52,0l4.2,10L67,10.9l-8.2,7.1L61.3,28.5z M98.3,28.5L89,22.9l-9.3,5.7L82.2,18L74,10.9L84.8,10L89,0
	l4.2,10l10.8,0.9l-8.2,7.1L98.3,28.5z M135.3,28.5l-9.3-5.7l-9.3,5.7l2.5-10.6l-8.2-7.1l10.8-0.9L126,0l4.2,10l10.8,0.9l-8.2,7.1
	L135.3,28.5z M172.3,28.5l-9.3-5.7l-9.3,5.7l2.5-10.6l-8.2-7.1l10.8-0.9L163,0l4.2,10l10.8,0.9l-8.2,7.1L172.3,28.5z"/>
<path class="contour" d="M89,2.6l3.2,7.8l0.2,0.6l0.6,0l8.4,0.7l-6.4,5.5l-0.5,0.4l0.1,0.6l2,8.2L89.5,22L89,21.7L88.5,22l-7.2,4.4l2-8.2l0.1-0.6
	l-0.5-0.4l-6.4-5.5l8.4-0.7l0.6,0l0.2-0.6L89,2.6 M52,2.6l3.2,7.8l0.2,0.6l0.6,0l8.4,0.7l-6.4,5.5l-0.5,0.4l0.1,0.6l2,8.2L52.5,22
	L52,21.7L51.5,22l-7.2,4.4l2-8.2l0.1-0.6l-0.5-0.4l-6.4-5.5l8.4-0.7l0.6,0l0.2-0.6L52,2.6 M15,2.6l3.2,7.8l0.2,0.6l0.6,0l8.4,0.7
	l-6.4,5.5l-0.5,0.4l0.1,0.6l2,8.2L15.5,22L15,21.7L14.5,22l-7.2,4.4l2-8.2l0.1-0.6l-0.5-0.4l-6.4-5.5l8.4-0.7l0.6,0l0.2-0.6L15,2.6
	 M163,2.6l3.2,7.8l0.2,0.6l0.6,0l8.4,0.7l-6.4,5.5l-0.5,0.4l0.1,0.6l2,8.2l-7.2-4.4l-0.5-0.3l-0.5,0.3l-7.2,4.4l2-8.2l0.1-0.6
	l-0.5-0.4l-6.4-5.5l8.4-0.7l0.6,0l0.2-0.6L163,2.6 M126,2.6l3.2,7.8l0.2,0.6l0.6,0l8.4,0.7l-6.4,5.5l-0.5,0.4l0.1,0.6l2,8.2
	l-7.2-4.4l-0.5-0.3l-0.5,0.3l-7.2,4.4l2-8.2l0.1-0.6l-0.5-0.4l-6.4-5.5l8.4-0.7l0.6,0l0.2-0.6L126,2.6 M89,0l-4.2,10L74,10.9
	l8.2,7.1l-2.5,10.6l9.3-5.7l9.3,5.6l-2.5-10.6l8.2-7.1L93.1,10L89,0L89,0z M52,0l-4.2,10L37,10.9l8.2,7.1l-2.5,10.6l9.3-5.7l9.3,5.6
	l-2.5-10.6l8.2-7.1L56.1,10L52,0L52,0z M15,0l-4.2,10L0,10.9L8.2,18L5.7,28.5l9.3-5.7l9.3,5.6l-2.5-10.6l8.2-7.1L19.1,10L15,0L15,0z
	 M163,0l-4.2,10L148,10.9l8.2,7.1l-2.5,10.6l9.3-5.7l9.3,5.6l-2.5-10.6l8.2-7.1L167.1,10L163,0L163,0z M126,0l-4.2,10L111,10.9
	l8.2,7.1l-2.5,10.6l9.3-5.7l9.3,5.6l-2.5-10.6l8.2-7.1L130.1,10L126,0L126,0z"/>
</svg>
</svg>
');

// define('STARS','<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 178 28.53">
// <defs>
// <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
//   <stop offset="0%"   stop-color="#f18624"/>
//   <stop offset="'.$pourcent.'%"   stop-color="#f18624"/>
//   <stop offset="'.$pourcent.'%"   stop-color="#cccccc"/>
//   <stop offset="100%" stop-color="#cccccc"/>
// </linearGradient>
// </defs>
// <path class="gradient" d="M34.29,36.65,25,31l-9.27,5.66,2.52-10.56L10,19l10.83-.87L25,8.12l4.17,10L40,19l-8.25,7.07Zm37,0L62,31l-9.27,5.66,2.52-10.56L47,19l10.83-.87L62,8.12l4.17,10L77,19l-8.25,7.07Zm37,0L99,31l-9.27,5.66,2.52-10.56L84,19l10.83-.87L99,8.12l4.17,10L114,19l-8.25,7.07Zm37,0L136,31l-9.27,5.66,2.52-10.56L121,19l10.83-.87,4.17-10,4.17,10L151,19l-8.25,7.07Zm37,0L173,31l-9.27,5.66,2.52-10.56L158,19l10.83-.87,4.17-10,4.17,10L188,19l-8.25,7.07Z" transform="translate(-10.02 -8.12)"/>
// </svg>
// ');



echo '<div style="width: 100px">'.STARS.'</div>';

// rdv sur : https://console.cloud.google.com/apis/credentials/key/992cc7bb-d7fd-4deb-be4c-5091e7ae183f?hl=fr&project=goueg-freelance
// pour récuperer la key API
/*
$url = "https://maps.googleapis.com/maps/api/place/details/json?key=&placeid=ChIJK9kCwuRbikcRynJgNYcF2g0&language=fr";
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec ($ch);
$res        = json_decode($result,true);
$reviews    = $res['result']['reviews'];
echo 'curl';
echo '<pre>';
print_r( $res );
echo '</pre>';
echo '<a href="https://search.google.com/local/writereview?placeid=ChIJK9kCwuRbikcRynJgNYcF2g0">Notez moi sur G</a>';
*/
// https://www.linkedin.com/sharing/share-offsite/?url=https://www.magtoo.fr/recettes-de-cuisine-egyptienne/

echo '<a href="https://www.linkedin.com/sharing/share-offsite/?url='.urlencode("https://www.magtoo.fr/recettes-de-cuisine-egyptienne/").'">partage</a>';


?>