#include <iostream>
#include <cassert>
#include <vector>

using namespace std;

typedef pair<int, int> pi;

int F(int p, int v, const vector<vector<pi>>& t, vector<int>& f, vector<int>& g);
int G(int p, int v, const vector<vector<pi>>& t, vector<int>& f, vector<int>& g);

int F(int p, int v, const vector<vector<pi>>& t, vector<int>& f, vector<int>& g){

    if(f[v]!=-1) return f[v];
    int res=0;

    res = max(res, G(p,v,t,f,g));
    for(const auto& x:t[v]){
        if(x.first==p) continue;
        res = max(res, F(v,x.first,t,f,g));
    }

    int m1=0, m2=0;
    for(const auto& x:t[v]){
        if(x.first==p) continue;
        int tmp = G(v,x.first,t,f,g) + x.second;
        if(tmp>m1){
            m2 = m1;
            m1 = tmp;
        }
        else if(tmp>m2)
            m2 = tmp;
    }

    res = max(res, m1+m2);

    return f[v]=res;
}

int G(int p, int v, const vector<vector<pi>>& t, vector<int>& f, vector<int>& g){

    if(g[v]!=-1) return g[v];
    int res=0;

    for(const auto& x:t[v]){
        if(x.first==p) continue;
        res = max(res, G(v,x.first,t,f,g) + x.second);
    }

    return g[v]=res;
}

int main() {
    int T;
    cin >> T;
    assert(T>=0);
    assert(T<=100);
    for(int icase=1;icase<=T;++icase) {
        cout << "Case #" << icase << ": ";
        int m;
        cin >> m;
        assert(m>=0);
        assert(m<=100000);
        int n=m+1;
        vector<vector<pi>> t(n);
        for(int i=0;i<m;++i){
            int a, b, v;
            cin >> a >> b >> v;
            assert(a>=0);
            assert(a<n);
            assert(b>=0);
            assert(b<n);
            assert(v>=-1000);
            assert(v<=1000);
            t[a].push_back(pi{b,v});
            t[b].push_back(pi{a,v});
        }

        vector<int> f(n, -1);
        vector<int> g(n, -1);

        cout << F(0, 0, t, f, g) << '\n';

    }
}
