CREATE TABLE users(
    user_id NUMBER(9) PRIMARY_KEY,
    login VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE orders(
    order_id NUMBER(9) PRIMARY_KEY,
    user NUMBER(9),
    order_date VARCHAR(20),
    due_date VARCHAR(20),    -- TODO: use better data type for date
    time_window_length REAL,
    price NUMBER(9,2),
    address VARCHAR(100),
);
