#include<iostream>
#include<vector>
#include<string>
#include<sstream>
#include<limits>

using namespace std;

const int col=50;
const int INF=numeric_limits<int>::max();

int solve(int r, int c, const vector<vector<int> >& t, vector<vector<int> >& mem){
  if(mem[r][c]!=-1) return mem[r][c];
  int res=c;
  for(unsigned int i=0;i<t[r].size();++i){
    int tmp=INF;
    for(int cc=1;cc<col;++cc){
      if(cc==c) continue;
      tmp=min(tmp, solve(t[r][i], cc, t, mem));
    }
    res+=tmp;
  }

  return mem[r][c]=res;
}

int main(){
  int n;
  while(cin >> n){
    vector<vector<int> > t(n);
    vector<bool> racine(n,true);
    for(int i=0;i<n;++i){
      int nb_fils;
      cin >> nb_fils;
      for(int j=0;j<nb_fils;++j){
	int fils;
	cin >> fils;
	t[i].push_back(fils); 
	racine[fils]=false;
      }
    }

    int r=-1;
    for(int i=0;i<n;++i)
      if(racine[i]){
	r=i;
	break;
      }

    vector<vector<int> > mem(n, vector<int>(col, -1));
    int res=INF;
    for(int i=1;i<col;++i)
      res=min(res, solve(r, i, t, mem));
    cout << res << '\n';
      

  }
}
