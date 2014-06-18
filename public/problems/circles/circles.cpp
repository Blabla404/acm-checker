#include <iostream>
#include <stdio.h>
#include <vector>
#include <queue>
#include <limits>
#include <cmath>
#include <iomanip>

#define MIN(a,b) (((a)<(b))?(a):(b))
#define MAX(a,b) (((a)>(b))?(a):(b))

using namespace::std;

int g_n;
double g_result;

void compute(vector<double> picked)
{
	//debug
	/*cout << "ORDER = ";
	for (int i=0; i<picked.size(); i++)
		cout << picked[i] << " ";
	cout << endl;*/

	//fill
	vector<double> positions(g_n, 0);
	double rightwall = 0;
	for (unsigned int i=0; i<picked.size(); i++)
	{
		positions[i] = picked[i]; //my pos is my radius at least
		for (unsigned int j=0; j<i; j++) //check all the already placed cylinders
		{
			double r = picked[i];
			double R = picked[j];
			//cout << "r=" << r << ", R=" << R << endl;
			double tent_pos = positions[j] + sqrt((r+R)*(r+R)-(R-r)*(R-r));
			positions[i] = MAX(positions[i], tent_pos);
		} //my position is now fixed
		rightwall = MAX(rightwall, positions[i]+picked[i]);
	}

	//compare result
	g_result = MIN(g_result, rightwall);
	//cout << "result: " << rightwall << endl;
}

void pickone(vector<double> picked, vector<double> topick)
{
	if (topick.size()==0)
		compute(picked);
	else
		for (unsigned int i=0; i<topick.size(); i++)
		{
			vector<double> tmp_picked = picked;
			vector<double> tmp_topick = topick;
			tmp_picked.push_back(topick[i]);
			tmp_topick.erase(tmp_topick.begin()+i);
			pickone(tmp_picked, tmp_topick);
		}
}

int main()
{
	int nbcases;
	cin >> nbcases;
	for (int c=0; c<nbcases; c++)
	{
		//init
		int nbcyl;
		cin >> nbcyl;
		g_n = nbcyl;
		vector<double> cylindres(g_n, 0);
		for (int i=0; i<g_n; i++)
			cin >> cylindres[i];

		//algo
		g_result = std::numeric_limits<double>::max(); //+inf
		pickone(vector<double>(), cylindres);

		cout << fixed << setprecision(1)  << g_result << endl;

	}
}