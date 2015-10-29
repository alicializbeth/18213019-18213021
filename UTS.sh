wget -nd -r -l 1 -P \input -A jpg -e robots=off http://www.itb.ac.id
rsync -a /input /backup
