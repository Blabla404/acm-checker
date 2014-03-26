#include<iostream>
#include<string>
#include<map>
#include<vector>
#include<cstring>


using namespace std;
int tab[1001][1001];
char rep[1001][1001];
/*int computeLengthPal(int i, int j, string S)
{   //cout<< "i="<<i<<", j="<<j<<"\n";
    if(i>=j){
      tab[i][j]=0;
      return 0;
    }
    
    if(S[i]==S[j])
    {
        tab[i][j]= computeLengthPal(i+1,j-1,S);
 
    }
    
    else
    {   int v1=computeLengthPal(i,j-1,S);
        int v2=computeLengthPal(i+1,j,S);
        tab[i][j]=min(v1,v2)+1;
        //tab[i][j]=min(computeLengthPal(i,j-1,S),computeLengthPal(i+1,j,S))+1;
    }
      
    return tab[i][j];
}*/


void computeLengthPal(string S, int n)
{   //cout<< "i="<<i<<", j="<<j<<"\n";
    memset(rep, 0, sizeof(rep));
    string s;
    for (int i = 1; i < n; i++)
      for (int j = 0; j+i < n; j++) {
        int k = i+j;
        if(S[j] == S[k]){
          tab[j][k]=tab[j+1][k-1];
          rep[j][k]='e';
        }
        else
          if (tab[j][k-1] < tab[j+1][k]) {
             tab[j][k] = tab[j][k-1] + 1;
             rep[j][k]='f';
          }
          else{
             tab[j][k] = tab[j+1][k] + 1;
             rep[j][k]='v';
          }
      }
      cout<<tab[0][n-1];//<<" ";
      int r = 0;
      int k = n-1;
      int t = 0;
      int i = 0;
      while (rep[r][k]) {
         if (rep[r][k] == 'e') {
            r = r+1;
            k = k-1;
            //printf("%c", S[i]);
            s[t] = S[i];
            t++;
            i++;
         } else if (rep[r][k] == 'v') {
            r = r+1;
            //printf("%c", S[i]);
            s[t] = S[i];
            t++;
            i++;
         } else if (rep[r][k] == 'f') {
            //printf("%c", S[k]);
            s[t] = S[k];
            t++;
            k = k-1;
         }
      }

      // if (r==k) {
      //    cout<<S[i];
      // }

      // while (--t >= 0) {
      //    cout<<s[t];
      // }
      cout<<"\n";
}


int main(){
  string s;
  int n;
  while(cin >> s){
    n = s.size();
    memset(tab,0,sizeof tab);
    computeLengthPal(s,n);
    //cout << tab[0][n-1]<<" ";
    
	string mot = "";
	int i = 0, j=n-1;
    
   /*while(i <= j)
    {
      if (tab[i][j] == tab[i+1][j-1])
      {
        mot = mot + s[i];
        i++;
        j--;
      }
      else
      if (tab[i][j] == tab[i+1][j]+1)
      {
        mot = mot + s[i];
        i++;
      }
      else
      {
        mot = s[j] + mot;
        j--;
      }
    }
    
    if (tab[0][n-1] == 0)
      cout<<s;
    else{
      cout<<mot;
      int k;
      if ((tab[0][n-1]+n)%2==0)
        k=mot.size()-1;
      else
        k=mot.size()-2;
      for (int l=k;k>=0;k--)
        cout<<mot[k];
    }
    cout<<"\n";*/
  }
}
