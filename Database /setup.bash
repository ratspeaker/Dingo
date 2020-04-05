echo Creating database
db2 -t -f CreateDingo.sql
echo Success

echo Creating tables 
db2 -t -f CreateTables.sql
echo Success

echo Filling tables
db2 -t -f filler.sql
echo Success