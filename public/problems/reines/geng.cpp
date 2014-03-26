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

const int N = 13; 

default_random_engine generator;
uniform_int_distribution<ll> distribution(0,N-1);
auto dice = bind ( distribution, generator );

void print(const vector<vector<char>>& t){
	for(auto& tt:t){
		for(auto& x:tt)
			cout << x;
		cout << '\n';
	}
}

int main(){
	ios::sync_with_stdio(false);
	cin.tie(nullptr);
	
	for(int i=1;i<=N;++i){
		cout << i << '\n';
		vector<vector<char>> t(i, vector<char>(i, '.'));
		print(t);
	}

	for(int i=0;i<20;++i){
		cout << N << '\n';
		vector<vector<char>> t(N, vector<char>(N, '.'));
		for(int j=0;j<20;++j)
			t[dice()][dice()] = '*';
		print(t);
	}
}