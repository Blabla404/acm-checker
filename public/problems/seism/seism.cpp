#include <cmath>
#include <iostream>
#include <iomanip>
# define C_PI (3.14159265358979323846)
# define C_PRECISION (0.0001)

using namespace::std;

double cost(double depth, double tnt)
{
	double r = sqrt(pow(tnt,1.0/3.0)*pow(tnt,1.0/3.0)-depth*depth);
	return (pow(tnt,1.0/3.0)>=depth) ? C_PI*r*r*log10(tnt)+tnt : tnt ;
}

int main()
{
	int nbproblems;
	cin >> nbproblems;
	for (int i=0; i<nbproblems; i++)
	{
		double money, depth;
		cin >> money >> depth;

		//APPROXIMATION
		double tnt, tnt1, tnt2;
		tnt1 = 0;
		tnt2 = money;
		while ((tnt2-tnt1)>C_PRECISION)
		{
			tnt = (tnt2+tnt1)/2.0;
			if (cost(depth, tnt) > money)
				tnt2=tnt;
			else
				tnt1=tnt;
		}
		cout << fixed << setprecision(1) << (tnt2+tnt1)/2.0 << endl;
	}
}