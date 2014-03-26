#include<iostream>
#include<vector>
#include<algorithm>
#include<map>
#include<random>

using namespace std;

typedef long long ll;

default_random_engine generator;
uniform_int_distribution<ll> distribution(1000,1000000000000000ll);
auto dice = bind ( distribution, generator );

int main(){
	ios::sync_with_stdio(false);
	cin.tie(nullptr);
	
	for(int i=0;i<1000;++i)
		cout << i << '\n';

	for(int i=0;i<4000;++i)
		cout << dice() << '\n';

}