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
typedef pair<int, int> pi;

const vector<int> dx{1,-1,0,0};
const vector<int> dy{0,0,1,-1};

void flood(const pi& dep, bool alpha, vector<vector<bool>>& visited, const vector<vector<int>>& t, vector<pi>& beta){
	int n = t.size();
	int c = t[dep.first][dep.second];
	for(int i=0;i<4;++i){
		int nx = dep.first + dx[i];
		int ny = dep.second + dy[i];
		if(nx<0 || nx>=n || ny<0 || ny>=n) continue;
		if(visited[nx][ny]) continue;
		if(c == t[nx][ny]){
			visited[nx][ny] = true;
			flood(pi{nx, ny}, alpha, visited, t, beta);
		}
		else if(alpha){
			beta.push_back(pi{nx, ny});
		}
	}
}

int main(){
	ios::sync_with_stdio(false);
	cin.tie(nullptr);
	int T;
	cin >> T;
	while(T--){
		int n, c;
		cin >> n >> c;
		pi dep;
		cin >> dep.first >> dep.second;

		vector<vector<int>> t(n, vector<int>(n));
		for(int i=0;i<n;++i)
			for(int j=0;j<n;++j)
				cin >> t[i][j];
		vector<vector<bool>> visited(n, vector<bool>(n, false));
		vector<pi> beta;
		visited[dep.first][dep.second] = true;
		flood(dep, true, visited, t, beta);

		for(const auto& p:beta){
			visited[p.first][p.second] = true;
			flood(p, false, visited, t, beta);
		}

		int res = 0;
		for(int i=0;i<n;++i)
			for(int j=0;j<n;++j)
				if(visited[i][j])
					++res;
		cout << res << '\n';
	}
}