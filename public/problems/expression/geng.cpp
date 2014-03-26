#include<iostream>
#include<vector>
#include<algorithm>
#include<map>
#include<random>
#include<sstream>
#include<set>

using namespace std;

typedef long long ll;

vector<char> op{'+', '*', '^'};

default_random_engine generator;
auto dice_int = bind ( uniform_int_distribution<int>(1, 1000000000), generator );
auto dice_char = bind ( uniform_int_distribution<int>(0, 25), generator );
auto dice_op = bind ( uniform_int_distribution<int>(0, 2), generator );
auto dice_bin = bind ( uniform_int_distribution<int>(0, 1), generator );

void expr(int n, ostringstream& s, set<char>& v){
	if(n==0){
		int tmp = dice_bin();
		if(tmp)
			s << dice_int();
		else{
			char at = 'a'+dice_char();
			v.insert(at);
			s << at;
		}
	}
	else{
		s << '(';
		expr(dice_int()%n, s, v);
		int tmp = dice_op();
		s << op[tmp];
		expr(tmp==2?0:dice_int()%n, s, v);
		s <<	')';
	}
}

int main(){
	ios::sync_with_stdio(false);
	cin.tie(nullptr);
	
	for(int i=0;i<1000;++i){
			ostringstream s;
			set<char> v;
			expr(1000, s, v);
			cout << v.size() << '\n';
			cout << s.str() << '\n';
			for(char x:v)
				cout << x << '=' << dice_int() << '\n';
		}


}