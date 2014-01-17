#!/bin/bash
for i in *.md; do
    pandoc $i -t html5 -o ${i/%.md/.html} --toc -S
done

rm -f ../public/*.php
rm -f ../public/*.html

cp *.php ../public/
cp cours.html ../public/

rm *.html

exit 0
