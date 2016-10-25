CREATE TABLE categories(
  id SERIAL PRIMARY KEY,
  categoryName VARCHAR
);

CREATE TABLE books (
  id SERIAL PRIMARY KEY,
  ref INTEGER NOT NULL,
  title VARCHAR NOT NULL,
  author INTEGER,
  price NUMERIC(6,2) NOT NULL,
  category INTEGER REFERENCES categories,
  decription VARCHAR,
  stock INTEGER DEFAULT 0
);

CREATE TABLE users(
  id SERIAL PRIMARY KEY,
  username VARCHAR NOT NULL,
  password VARCHAR NOT NULL,
  name VARCHAR NOT NULL,
  email VARCHAR NOT NULL,
  phone VARCHAR,
  address VARCHAR,
  admin BOOLEAN
);

CREATE TABLE orders(
  id SERIAL PRIMARY KEY,
  ref INTEGER NOT NULL,
  userId INTEGER NOT NULL REFERENCES users,
  state VARCHAR DEFAULT 'PENDING',
  orderDate timestamp DEFAULT now(),
  deliveryDate timestamp
);

CREATE TABLE productsOrdered (
  id SERIAL PRIMARY KEY,
  bookId INTEGER NOT NULL REFERENCES books,
  orderId INTEGER NOT NULL REFERENCES orders
);

INSERT INTO users VALUES(DEFAULT, 'admin', 'admin', 'admin', 'admin@gmail.com', NULL, NULL, true);
