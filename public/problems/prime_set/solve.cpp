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

ll count(int N, int low, int high, const vector<int>& p){
    ll res = 0;
    for(int i=1;i<100007;++i){
        ll v = high/i - (low+i-1)/i + 1;
        res = (res + (expMod(v, N)-v) * p[i])%MOD;
        res = (res + MOD) % MOD;
    }
    if(low == 1)
        res = (res+1) % MOD;
    return res;
}

int main(){
	ios::sync_with_stdio(false);
	cin.tie(nullptr);
	
	vector<int> p(100007,1);
    for(int i=2;i<100007;++i){
        p[i] *= -1;
        for(int j=i+i;j<100007;j+=i)
            p[j] += p[i];
    }

    int n, low, high;
    while(cin >> n >> low >> high){
    	cout << count(n, low, high, p) << '\n';
    }

}