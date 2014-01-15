#!/bin/bash
for i in *.md; do
    pandoc $i -t html5 -o ${i/%.md/.html}
done

rm -f ../public/*.php
rm -f ../public/*.html

cp *.php ../public/

rm *.html

exit 0
