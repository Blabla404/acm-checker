#include<iostream>
#include<vector>
#include<iomanip>

using namespace std;

int main(){
    int n;
    while(cin >> n){
      vector<vector<char> > t(n, vector<char>(n));
      for(int i=0;i<n;++i)
	for(int j=0;j<n;++j)
	  cin >> t[i][j];

      vector<double> p(n,0);
      vector<double> wp(n);
      vector<double> owp(n);
      vector<double> oowp(n);

      for(int i=0;i<n;++i)
	for(int j=0;j<n;++j)
	  if(t[i][j]!='.')
	    p[i]++;
      
      for(int i=0;i<n;++i){
	double w=0;
	for(int j=0;j<n;++j)
	  if(t[i][j]=='1')
	    w++;
	wp[i]=w/p[i];
      }
      
      for(int i=0;i<n;++i){
      double w=0;
      for(int j=0;j<n;++j)
	if(t[i][j]!='.')
	  w+=(wp[j]*p[j]-(t[j][i]-'0'))/(p[j]-1);
      
      
      owp[i]=w/p[i];
      }
      
    for(int i=0;i<n;++i){
      double w=0;
      for(int j=0;j<n;++j)
	if(t[i][j]!='.')
	  w+=owp[j];
      oowp[i]=w/p[i];
    }
    
    for(int i=0;i<n;++i)
      cout << fixed << setprecision(3) << .25*wp[i]+.5*owp[i]+.25*oowp[i] << '\n';
}
}
