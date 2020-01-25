-- Produkty

INSERT INTO product (product_id, product_name, quantity, unit, price, depot) VALUES (1, 'jabłko', 10.5, 'kg.', 1.02, 1);
INSERT INTO product (product_id, product_name, quantity, unit, price, depot) VALUES (2, 'masło 200g', 123, 'szt.', 1.02, 1);
INSERT INTO product (product_id, product_name, quantity, unit, price, depot) VALUES (3, 'banany', 26.1, 'kg.', 1.02, 1);
INSERT INTO product (product_id, product_name, quantity, unit, price, depot) VALUES (4, 'mleko', 12, 'szt.', 2.49, 1);
INSERT INTO depot (depot_id, address, capacity) VALUES (1, 'Brussel', 1000);
INSERT INTO depot (depot_id, address, capacity) VALUES (2, 'Empty', 1000);
INSERT INTO collect_and_go (cag_id, address, capacity, used) VALUES (1, 'Asd 12', 25, 0); 
INSERT INTO collect_and_go (cag_id, address, capacity, used) VALUES (2, 'Asd 13', 35, 0); 
