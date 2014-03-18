#include<iostream>
#include <stdio.h>
#include<string>

using namespace std;


void prefix(int tab[], string P)
{
  int m = P.size();
  tab[0] = 0;
  tab[1] = 0;
  int k=0;
  for (int i=2; i < m; i++){
    if (P[k]==P[i])
      k++;
    else
      while(k > 0 && P[k]!=P[i]){
	k=tab[k];
    }
    //printf("%c %d\n",P[i],k);
    tab[i] = k;
  }
  
}


int main()
{
  string texte;
  string P;
  while(getline(cin,texte)){
    //cerr << texte << endl;
    getline(cin, P);
    //cerr <<   P << endl;
    //cout<<"taille du texte : "<<texte.size()<<"\n";
    //cout<<"taille du motif : "<<P.size()<<"\n";
    //cout << texte << " " << P << endl;
    int tab[P.size()];
    prefix(tab,P);
    /*for (unsigned int i = 0; i<P.size();i++)
	cout<<tab[i]<<" ";
    cout<<"\n";*/
    int n = texte.size();

    int i = 0, dec=0;
    int cpt=0;
    while (i<=n){
      //if(P[dec]==0) {/*printf("%d\n",i);*/ cpt++;}
      if (texte[i] == P[dec]){
	i++;
	dec++;

        if(P[dec]==0) {/*printf("%d\n",i);*/ cpt++; i--; dec--;dec = tab[dec];}
      }
      else{
	if (dec==0)
	  i++;
	else
	  dec = tab[dec];
      }
    }
    cout<<"nombre occurrences = "<<cpt<<'\n';
    //cout<<cpt<<'\n';
  }
  return 0;
}
