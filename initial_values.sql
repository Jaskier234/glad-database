-- Produkty

INSERT INTO product (product_id, product_name, quantity, unit, price, depot) VALUES (1, 'jabłko', 10.5, 'kg.', 1.02, 1);
INSERT INTO product (product_id, product_name, quantity, unit, price, depot) VALUES (2, 'masło 200g', 123, 'szt.', 1.02, 1);
INSERT INTO product (product_id, product_name, quantity, unit, price, depot) VALUES (3, 'banany', 26.1, 'kg.', 1.02, 1);
INSERT INTO product (product_id, product_name, quantity, unit, price, depot) VALUES (4, 'mleko', 12, 'szt.', 2.49, 1);
INSERT INTO depot (depot_id, address, capacity) VALUES (1, 'Brussel', 10000);
INSERT INTO depot (depot_id, address, capacity) VALUES (2, 'Brussel 1', 10000);
INSERT INTO depot (depot_id, address, capacity) VALUES (3, 'Brussel 2', 10000);
INSERT INTO depot (depot_id, address, capacity) VALUES (4, 'Brussel 3', 10000);
INSERT INTO depot (depot_id, address, capacity) VALUES (5, 'Brussel 4', 10000);
INSERT INTO depot (depot_id, address, capacity) VALUES (6, 'Brussel 5', 10000);
INSERT INTO depot (depot_id, address, capacity) VALUES (7, 'Brussel 6', 10000);
INSERT INTO depot (depot_id, address, capacity) VALUES (8, 'Brussel 7', 10000);
INSERT INTO depot (depot_id, address, capacity) VALUES (9, 'Empty', 10000);
INSERT INTO collect_and_go (cag_id, address, capacity, used) VALUES (1, 'Asd 12', 25, 0); 
INSERT INTO collect_and_go (cag_id, address, capacity, used) VALUES (2, 'Asd 13', 35, 0); 
