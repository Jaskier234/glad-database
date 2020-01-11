CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    login CHAR(255) NOT NULL UNIQUE,
    password CHAR(255) NOT NULL,
    is_admin BOOLEAN NOT NULL
);

CREATE TABLE orders (
    order_id SERIAL PRIMARY KEY,
    user_name INT,
    order_date TIMESTAMP,
    due_date TIMESTAMP,
    time_window_length FLOAT,
    price NUMERIC(9,2),
    address VARCHAR(100)
);

CREATE TABLE orders_archive (
    order_id INT PRIMARY KEY,
    user_name INT,
    order_date TIMESTAMP,
    due_date TIMESTAMP,
    time_window_length FLOAT,
    price NUMERIC(9,2),
    address VARCHAR(100)
);

-- TODO dodać trigger, który usuwa puste produkty
-- TODO ewentualnie po dostawie łączy takie same(na podstawie unikalnego kodu)
CREATE TABLE product (
    product_id INT PRIMARY KEY,
    product_name VARCHAR(255),
    quantity FLOAT CHECK (quantity >= 0),
    unit CHAR(4) NOT NULL, -- TODO check if value is correct szt./kg.
    price NUMERIC(9,2),
    depot INT
);

CREATE TABLE product_in_order (
    prod_in_ord_id SERIAL PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity FLOAT NOT NULL
);

CREATE TABLE product_in_order_archive (
    prod_in_ord_id INT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity FLOAT NOT NULL
);

CREATE TABLE depot (
    depot_id SERIAL PRIMARY KEY,
    address CHAR(255)
);

CREATE TABLE collect_and_go (
    cag_id SERIAL PRIMARY KEY,
    address CHAR(255),
    rsa_public_key CHAR(255)
);
