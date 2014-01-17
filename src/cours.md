#Workflow

Voyons une manière de s'organiser afin de travailler
efficacement. Nous illustrons notre exemple en résolvant le problème
suivant:

> Étant une liste de prénoms composés uniquement de \[a-zA-Z\], écrivez
> pour chaque prénom, **Bonjour _prénom_ !**

Commençons par créer le fichier contenant un exemple d'entrée dans un
fichier `hello.in`:

~~~
Luke
Leia
Han
Chewbacca
R2D2
~~~

Puis le fichier contenant la sortie attendue `hello.res`:

~~~
Bonjour Luke !
Bonjour Leia !
Bonjour Han !
Bonjour Chewbacca !
Bonjour R2D2 !
~~~

Nous pouvons maintenant commencer à coder dans un fichier `hello.cpp`:

~~~ cpp
#include<iostream>
#include<string>

using namespace std;
		
int main(){
	string s;
	while(cin >> s)
		cout << "Bonjour " << s << " !\n";
}
~~~

Quelques remarques sur ce code:

* `#include<iostream>` permet d'utiliser `cin` et `cout` afin de lire l'entrée et écrire la sortie.
* `#include<string>` permet d'utiliser les `string`
* `using namespace std` permet d'éviter de devoir prefixer les objets
  de la librairie standard de `std::`. Vu que les programme d'ACM sont
  court et ne peuvent rien inclure hors de la STL cela ne pose pas de
  problème.

Il faut ensuite compiler ce programme. À l'école le compilateur est
`g++`. Il est fortement conseiller d'*activer les warnings*, vous
compilez donc avec `g++ -Wall -Wextra hello.cpp` qui vous produit un
executable `a.out`.

Vous pouvez maintenant tester votre programme. Comme il lit sur
l'entrée standard il faut rediriger le contenu de votre fichier
d'entrée sur l'entrée standard `./a.out < hello.in`. La sortie est
alors affichée sur la sortie standard, vous pouvez alors regarder si
le programme vous semble correct.

Attention votre sortie doit être exactement la même que la sortie
attendue, vous pouvez donc utiliser `diff` pour vérifier que votre
sortie est exactement la bonne. `./a.out < hello.in > hello.out`
permet de rediriger la sortie dans votre programme dans le fichier
`hello.out`. Ensuite la commande `diff hello.out hello.res` vous
permet de vous assurer que les deux fichiers sont identiques et vous
affiche les différence dans le cas contraire.

Enfin votre programme doit s'executer assez rapidement, si vous avez
un jeu de données sensiblement de même taille que celui attendu vous
pouvez regarder le temps que mets votre programme à traiter ce jeu de
données. Pour cela compilez avec les optimisations `g++ -O2 -Wall
-Wextra hello.cpp`, puis vous pouvez utiliser
`time ./a.out < hello.in > hello.out`. Si votre programme est trop
lent vous pouvez le stopper en faisant `Ctrl + c`.

#Entrée Sortie

##Généralitées

##Lire caractère par caractère

##Parser une lignes contenant un nombre arbitraire d'entier

##Afficher exactement 6 chiffres après la virgule

##Mes entrées sorties sont trop lentes

#Nombres

Pour représenter les nombres, vous pouvez vous limiter à trois types:

* `double` dès que les nombres considéré ne sont pas entier, utilisez
  des doubles.
* `int` pour les entiers inférieurs à 10^9^.
* `long long` pour les entiers jusqu'à 10^18^.

Attention utiliser des `int` à la place de `long long` est
sensiblement plus rapide (i.e. certains problèmes ne valideront pas
avec des `long long`).

Attention également aux calculs intermédiaires qui ne doivent pas
dépasser la capacité du type. Par exemple si on prend cet extrait de
code d'une exponentiation modulaire rapide avec `a`,  `tmp` et `MOD`
des entiers inférieurs à 10^9^

~~~ cpp
long long a,tmp,MOD;
return (a*tmp*tmp)%MOD;
~~~

Donne un résultat faux, en effet le produit `a*tmp*tmp` peut dépasser
10^18^ même si on en prend ensuite le modulo, il faut donc prendre le
modulo des résultats intermédiaires.

~~~ cpp
int a,tmp,MOD;
return (a*((tmp*tmp)%MOD))%MOD;
~~~

Donne également un résultat incorrect car les produits intermédiaires
dépassent la capacité d'un `int`.

~~~ cpp
long long a,tmp,MOD;
return (a*((tmp*tmp)%MOD))%MOD;
~~~

est la version correct.

#Vector

Vector est un conteneur pour les tableaux dynamiques. Les fonctions
les plus utiles sont l'opérateur `[]` et la fonction
`push_back`. `push_back` permet d'insérer un fin de tableau une nouvelle
valeur, cela agrandi le tableau en temps constant amorti. L'opérateur
`[]` permet d'accéder à la n^ème^ valeur du tableau en temps
constant. Les indices commencent à partir de 0 jusqu'à la taille du
vector-1. Le tri de tableau existe dans la bibliothèque de template
`algorithm`.

Voici un exemple simple d'utilisation.

~~~ cpp
#include<iostream>
#include<vector>
#include<algorithm>

using namespace std;

int main(){
	//crée un tableau t de 5 entiers initialisés à la valauer par défaut
	//i.e. 0
	vector<int> t(5);
	//crée un tableau d de 12 flotants initialisés à 3.14
	vector<double> d(12,3.14);

	cout << d[0] << '\n';
	//crée un tableau p de char de taille 0
	vector<char> p;

	p.push_back('z');
	//p est maintenant de taille 1 et contient 'z';
	p.push_back('a');
	//p est maintenant de taille 2 et contient 'z' puis 'a';

	//affiche le tableau p
	for(int i=0;i<int(p.size());++i)
		cout << p[i] << ' ';
	cout << '\n';

	sort(p.begin(), p.end());
	//p est maintenant de taille 2 et contient 'a' puis 'z';

	//une autre manière d'afficher le tableau p
	for(vector<char>::iterator it=p.begin();it!=p.end();++it)
		cout << *it << ' ';
	cout << '\n';
}
~~~

Qui affiche:

~~~
3.14
z a
a z
~~~

#Map

Map est un conteneur permettant d'utiliser des tableaux associatifs
triés par clé supportant des opérations en O(lg(n)). L'opérateur le
plus utile est `[key]` qui permet d'accéder à la valeur stockée pour
key. Attention si cette valeur n'existe pas elle est crée avec
l'initialisateur par défaut (pour les `int` c'est 0).

Vous pouvez voir les autres fonctions utiles des `map` [ici](http://www.cplusplus.com/reference/map/map/)

Voici un exemple simple d'utilisation.

~~~ cpp
#include<iostream>
#include<map>
#include<string>

using namespace std;

int main(){
  map<char,string> mymap;

  mymap['b']="another element";
  mymap['a']="an element";
  mymap['c']=mymap['b'];

  cout << "mymap['a'] is " << mymap['a'] << '\n';
  cout << "mymap['b'] is " << mymap['b'] << '\n';
  cout << "mymap['c'] is " << mymap['c'] << '\n';
  cout << "mymap['d'] is " << mymap['d'] << '\n';

  for(map<char,string>::iterator it=mymap.begin();it!=mymap.end();++it)
    cout << "key: " << it->first << ", value: " << it->second << '\n';

}
~~~

qui affiche:

~~~
mymap['a'] is an element
mymap['b'] is another element
mymap['c'] is another element
mymap['d'] is 
key: a, value: an element
key: b, value: another element
key: c, value: another element
key: d, value: 
~~~

#Mes propres structures de données
