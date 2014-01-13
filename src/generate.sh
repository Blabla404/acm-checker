#!/bin/bash
for i in *.md; do
    pandoc  --toc $i -t html5 -H header.html -B body.html -o ../public/${i/%.md/.html}
done
exit 0
