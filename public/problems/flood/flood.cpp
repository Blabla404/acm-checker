#include <iostream>
#include <stdio.h>
#include <vector>
#include <queue>

using namespace::std;
typedef pair<int,int> point;

vector<int> g_grille, g_marques;
queue<point> g_visit;
int g_n, g_count;

//USE GLOBAL VARIABLES FOR READABILITY
//USE DIFFERENT VECTOR FOR MARKS

void ifpush(int x, int y, int color, int souche)
{
	int samecolor = (color==g_grille[x*g_n+y]) ? 1:0;
	if (x>=0 && y>=0 && x<g_n && y<g_n && g_marques[x*g_n+y]==0 &&(souche or samecolor)) // in the grid, unvisited, infectable
	{
		g_visit.push(point(x,y));
		//printf("Souche = %d, samecolor = %d\n", souche, samecolor );
		if (samecolor and souche)
			g_marques[x*g_n+y] = 1;
		else
			g_marques[x*g_n+y] = 3;
		//cout << "Added point (" << x << ", " << y << ") with color " << g_grille[x*g_n+y] << " and mark " << g_marques[x*g_n+y] << endl;
	}
}

void printe(vector<int> &table, int size)
{
	for (int ii=0; ii<size; ii++)
		{
			for (int ij=0; ij<size; ij++)
				cout << " " << table[ii*size+ij] ;
			cout << endl;
		}
	for (int i=0; i<size; i++)
		cout << "==";
	cout << endl;
}

void visiter(point p)
{
	int x = p.first;
	int y = p.second;
	int color = g_grille[x*g_n+y];
	int souche = (g_marques[x*g_n+y] == 1) ? 1:0; //alpha:beta
	if (souche) // souche alpha
		g_marques[x*g_n+y] = 2; //visited, alpha
	else
		g_marques[x*g_n+y] = 4; //visited, beta
	g_count++;
	ifpush(x+1,y,color,souche);
	ifpush(x,y+1,color,souche);
	ifpush(x-1,y,color,souche);
	ifpush(x,y-1,color,souche);
}

int main()
{
	int nbcases;
	cin >> nbcases;
	for (int i=0; i<nbcases; i++)
	{
		int n, c, xi, xj;
		cin >> n >> c >> xi >> xj;
		g_n = n;
		g_count = 0;

		g_grille = vector<int>(g_n*g_n, -1);
		g_marques = vector<int>(g_n*g_n, 0);
		for (int j=0; j<g_n*g_n; j++)
			cin >> g_grille[j];

		//test
		//printe(g_grille,g_n);

		g_visit.push(point(xi,xj));
		g_marques[xi*g_n+xj] = 1;
		while (g_visit.size() != 0)
		{
			visiter(g_visit.front());
			g_visit.pop();
			//printe(g_grille, n);
			//sleep(1);
		}

		//printe(g_grille,g_n);
		printf("%d\n", g_count);
	}
}