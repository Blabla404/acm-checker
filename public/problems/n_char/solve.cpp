#include<iostream>
#include<vector>
#include<algorithm>
#include<map>
#include<string>
#include<sstream>
#include<cassert>

using namespace std;

typedef long long ll;


char n_char(ll n){

	ll taille = 1;
	ll nb = 9;

	while(n > taille * nb){
		n -= taille*nb;
		++taille;
		nb *= 10;
	}

	ll nombre = nb/9 + n/taille;
	ll pos = n%taille;

	ostringstream ss;
	ss << nombre;

	return ss.str()[pos];
}

int main(){
	ios::sync_with_stdio(false);
	cin.tie(nullptr);
	
	ostringstream ss;
	for(int i=1;i<10000;++i)
		ss << i;
	string s = ss.str();

	ll n;
	while(cin >> n){
		char res = n_char(n-1);
		if(n < int(s.size()))
			assert(res == s[n-1]);
		cout << res << '\n';
	}
}