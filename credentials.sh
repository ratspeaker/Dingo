if [ $# != 2  ] ; then
    echo "Poziv funkcija mora da izgleda ovako: > ./credentials.sh username passwd \nGde username predstavlja korisnika koji koristi mysql bazu, a passwd sifru tog korisnika."
    exit 2
fi

find . -type f -name "*.php" -print0 | xargs -0 sed -i -E 's/[\t ]*\$username[\t ]*=[\t ]*"[a-zA-Z0-9_!#$%^&\*]*"[ \t\n]*;/$username="'$1'";/g'
find . -type f -name "*.php" -print0 | xargs -0 sed -i -E 's/[\t ]*\$password[\t ]*=[\t ]*"[a-zA-Z0-9_!#$%^&\*]*"[ \t\n]*;/$password="'$2'";/g';

echo "\nUspesno izvrseno!\n"

exit 1

 
