#include<iostream>
#include<vector>
#include<algorithm>
#include<map>
#include<random>

using namespace std;

typedef long long ll;

default_random_engine generator;
uniform_int_distribution<ll> distribution(1,100000);
auto dice = bind ( distribution, generator );

int main(){
	ios::sync_with_stdio(false);
	cin.tie(nullptr);
	
	for(int i=0;i<50;++i){
		int N = dice(), low = dice(), high = dice();
		if(high < low) swap(low, high);
		cout << N << ' ' << low << ' ' << high << '\n';
	}

	for(int i=0;i<50;++i){
		int N = dice(), high = dice();
		cout << N << ' ' << 1 << ' ' << high << '\n';
	}


}