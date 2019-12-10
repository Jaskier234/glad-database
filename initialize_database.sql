CREATE TABLE users(
    user_id SERIAL PRIMARY KEY,
    login CHAR(255) NOT NULL UNIQUE,
    password CHAR(255) NOT NULL
);

CREATE TABLE orders(
    order_id INT PRIMARY KEY,
    user_name INT,
    order_date TIMESTAMP,
    due_date TIMESTAMP,    -- TODO: use better data type for date
    time_window_length FLOAT,
    price NUMERIC(9,2),
    address CHAR(100)
);
