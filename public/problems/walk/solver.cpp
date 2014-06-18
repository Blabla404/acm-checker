#include <iostream>
#include <string>
#include <cassert>
#include <sstream>
#include <vector>

using namespace std;

const int INF = 1000000000;

int F(int, int, int, const vector<vector<int>>&, vector<vector<vector<int>>>&, vector<vector<vector<int>>>&);
int G(int, int, int, const vector<vector<int>>&, vector<vector<vector<int>>>&, vector<vector<vector<int>>>&);

int F(int i, int j, int k, const vector<vector<int>>& t, vector<vector<vector<int>>>& f, vector<vector<vector<int>>>& g){
    if(i<0 || j<0 || k<0) return -INF;

    if(f[i][j][k]!=INF) return f[i][j][k];

    int res1 = (i>0 && k>j)?t[i][k] + G(i,j,k,t,f,g):-INF;
    int res2 = (k>j+1)?t[i][k] + F(i,j,k-1,t,f,g):-INF;
    return f[i][j][k] = max(res1, res2);
}

int G(int i, int j, int k, const vector<vector<int>>& t, vector<vector<vector<int>>>& f, vector<vector<vector<int>>>& g){
    if(i<=0 || j<0 || k<0) return -INF;

    if(g[i][j][k]!=INF) return g[i][j][k];

    int res1 = (i>0)?t[i][j] + F(i-1,j,k,t,f,g):-INF;
    int res2 = (j>0)?t[i][j] + G(i,j-1,k,t,f,g):-INF;
    return g[i][j][k] = max(res1, res2);
}

int main() {
    int T;
    cin >> T;
    assert(T>=0);
    assert(T<=150);
    for(int icase=1;icase<=T;++icase) {
        cout << "Case #" << icase << ": ";
        int n;
        cin >> n;
        assert(n>=2);
        assert(n<=100);
        vector<vector<int>> t(n, vector<int>(n));
        for(int i=0;i<n;++i)
            for(int j=0;j<n;++j){
                cin >> t[i][j];
                assert(t[i][j]>=-1000);
                assert(t[i][j]<=1000);
            }
        vector<vector<vector<int>>> f(n, vector<vector<int>>(n, vector<int>(n, INF)));
        vector<vector<vector<int>>> g(n, vector<vector<int>>(n, vector<int>(n, INF)));
        f[0][0][1] = t[0][0] + t[0][1];

        cout << F(n-1, n-2, n-1, t, f, g) << '\n';
    }
}
