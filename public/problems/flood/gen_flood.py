from random import randrange

print 500
for case in range(500):
	nbcolors = randrange(2,15)
	#colors = range(nbcolors)
	size = randrange(20,100)
	print ""
	print size, nbcolors
	print randrange(size), randrange(size)
	for i in range(size):
		line = ""
		for j in range(size):
			line+= str(randrange(nbcolors)) + " "
		print line
