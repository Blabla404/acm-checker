#!/bin/bash
pandoc public/cours.md -t html5 -o public/cours.html --toc -S
wget http://uhunt.felix-halim.net/api/p -O public/problem.json
