<?php include 'header.php'; ?>

<h1>Présentation du cours</h1> 
<p> L’écriture d’un programme est souvent l’objet d’un compromis entre
son temps d’exécution (efficacité algorithmique de la solution codée)
et son temps de développement (réflexion, implantation et
débuguage). Deux attitudes caricaturales sont : </p>
 <ul>
   <li>rechercher la solution la plus efficace théoriquement
(c.-à-d. quand n temps vers l’infini) même si elle est très compliquée
à implémenter</li>
<li>implémenter la première idée venue.</li>
 </ul>
<p> Le but de ce module est de s’entraîner à la résolution effective
de problèmes algorithmiques. Pour cela, il faudra trouver un équilibre
entre ces deux façons d’agir.  </p>
<p> Le choix de la solution à retenir repose typiquement sur le temps
disponible d’une part et les caractéristiques particulières des
instances à résoudre d’autre part (taille, décomposition
éventuelle,…). Le choix de la structure de données est également un
paramètre crucial d’efficacité.  </p>
<p> Dans ce module, nous étudierons différents problèmes
(algorithmiques purs) que nous cherchons à résoudre effectivement en
écrivant un programme (en C, C++, Java…) qui sera testé/validé sur des
jeux de données.  </p>
<p> Les objectifs sont les suivants : </p>
<ul>
<li>Mieux comprendre comment se comportent en pratique les algorithmes
classiques (de graphes, arithmétique, géométrie…)</li>
<li>S’exercer à écrire des programmes rapidement, mais surtout éviter
au maximum d’avoir à débuguer (notamment en écrivant d’abord un
pseudo-code)</li>
<li>Enfin, pour ceux qui le souhaitent, se préparer au concours de
programmation ACM-ICPC. La première étape de ce concours a lieu chaque
année fin octobre, en général deux équipes de 3 personnes y
participent à l’ENS Lyon.</li>
</ul>

<p>Ce module encadré par
<a href="http://perso.ens-lyon.fr/vincent.lanore/">Vincent Lanore</a>,
<a href="http://perso.ens-lyon.fr/arnaud.lefray/">Arnaud Lefray</a>,
<a href="http://perso.ens-lyon.fr/theophile.trunck/">Théophile Trunck</a> et
<a href="http://perso.ens-lyon.fr/petru.valicov/">Petru Valicov</a>
aura lieu en salle E001 les mercredis de 15h45 à 18h45.</p>

<h1>Organisation du cours</h1>

<p>Chaque semaine vous aurez un ensemble de problèmes à résoudre. Pour
cela il faudra trouver l'algorithme, le coder et le valider contre un
jeu de donnée en temps limité (il doit fournir exactement la sortie
attendue en un temps limité). Les codes résolvant ces problèmes seront
à envoyer (avec l'objet **[ACM]**) à vos TD-Men avant le dimanche de la
semaine suivant le TD (par exemple avant le 09/02/2014 pour le premier
TD). Le code de chaque problème devra être contenu dans un unique
fichier nommé suivant la convention <em>numéro_du_problème-login</em>
(par exemple pour le premier problème <code>10055-ttrunck.cpp</code>).
</p>

<p>La validation de ces problèmes vous donnera la note de controle
continu, il y aura également un partiel et un examen, la note finale
sera une pondération de ces trois notes (a priori
1/2CC+1/6Partiel+1/3Examen).</p>

<p> Même si le concours ACM a lieu en équipe ce cours sera
individuel. Chacun est donc tenu de rendre ses propres
problèmes. Toutefois quelques TD (et peut-être le partiel) auront lieu
en équipes.</p>

<h1>Pour démarrer</h1>

<p> Lors de ce cours nous utiliserons le site <a
  href="http://uva.onlinejudge.org/">UVA</a>. Commencez par y créer un
  compte. Une fois connecté au site UVA dans la barre de navigation à
  gauche il y a un lien <em>My uHunt with Virtual Contest Service</em>
  vers une adresse <em>http://uhunt.felix-halim.net/id/n</em> avec
  <code>n</code> un nombre, c'est ce que j'appelle votre idUva, nous
  l'utiliserons pour vérifier vos problèmes résolus.  </p>

<p> Maintenant que vous avez votre idUva vous pouvez vous inscrire sur
 ce site (en haut à droite).  Voici un aperçu de ce site: </p>

<ul>
  <li>La section <a href="td.php">TD</a> liste les problèmes et la
  deadline de chaque TD.</li>
  <li>Le <a href="scoreboard.php">scoreboard</a> vous permet de voir quels
  problèmes ont été resolus.</li>
  <li>La section <a href="cours.php">Cours</a> contient les notes de cours, que ce soit
  des algorithmes ou des astuces de programmation.</li>
<li>Le <a href="https://docs.google.com/spreadsheet/ccc?key=0ApMTqWB_E_MxdHZmUWZOeTVIeVoySGFOYUFxTHVJNVE&amp;usp=sharing">Google
  Doc</a> est un tableur collaboratif contenant pour chaque problème
  les causes idiotes de WRONG ANSWER. Vous venez de perdre 10 min car
  le problème requiert des <code>long long</code> au lieu de simple
  <code>int</code>, s'il vous plait ajoutez une remarque dans le
  tableau.</li>
<li>Les <a
href="https://drive.google.com/folderview?id=0B5MTqWB_E_MxZktYZmJjTFl0LWs&amp;usp=sharing">Testcases</a>
sont un dossier où vous trouverez pour certains problèmes un jeu de
données avec la sortie attendue. C'est une bonne façon de trouver le cas
qui ne marche pas dans votre algorithme</li> </ul>

<?php include 'footer.php'; ?>
