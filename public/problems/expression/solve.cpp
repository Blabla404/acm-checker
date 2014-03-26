#include <iostream>
#include <vector>
#include <algorithm>
#include <map>
#include <string>
#include <random>
#include <set>
#include <sstream>
#include <cassert>

using namespace std;

typedef long long ll;

const ll MOD = 1000000007;

ll expMod(ll a, ll b){
    ll res = 1;
    while(b){
    	if(b%2==1)
    		res = (a*res)%MOD;
    	a = (a*a)%MOD;
    	b/=2;
    }
    return res;
}

ll compute(int& pos, const string& s, map<char, ll>& m){
	if(s[pos]=='('){
		pos++;
		ll a = compute(pos, s, m);
		char op = s[pos];
		pos++;
		ll b = compute(pos, s, m);
		assert(s[pos] == ')');
		pos++;

		if(op == '+')
			return (a + b) % MOD;
		else if(op == '*')
			return (a * b) % MOD;
		else{
			assert(op == '^');
			return expMod(a, b);
		}
	}
	else{
		if(isalpha(s[pos])){
			char x = s[pos];
			pos++;
			return m[x];
		}
		else{
			ll res = 0;
			while(isdigit(s[pos])){
				res = res*10 + (s[pos]-'0');
				++pos;
			}
		return res;
		}
	}
}

int main(){
	ios::sync_with_stdio(false);
	cin.tie(nullptr);
	
	int n;
	while(cin >> n){
		cin.ignore();
		string s;
		getline(cin, s);
		map<char, ll> m;
		for(int i=0;i<n;++i){
			char x,tmp;
			ll v;
			cin >> x >> tmp >> v;
			m[x] = v;
		}

		// cerr << s << '\n';
		// for(auto& x:m)
		// 	cerr << x.first << ' ' << x.second << endl;

		int pos = 0;
		cout << compute(pos, s, m) << '\n';

	}


}