echo "Drop tables"
psql -h localhost -f drop_tables.sql -d testdb -U glad
echo "Create new tables"
psql -h localhost -f initialize_database.sql -d testdb -U glad
echo "Inserting initial values to tables"
psql -h localhost -f initial_values.sql -d testdb -U glad
