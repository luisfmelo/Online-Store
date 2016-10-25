DROP SCHEMA e_store CASCADE;
CREATE SCHEMA e_store;

CREATE TABLE categories(
  id SERIAL PRIMARY KEY,
  categoryName VARCHAR
);

CREATE TABLE books (
  id SERIAL PRIMARY KEY,
  ref INTEGER NOT NULL,
  title VARCHAR NOT NULL,
  author VARCHAR NOT NULL,
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

INSERT INTO categories VALUES(DEFAULT, 'Romance Histórico');

INSERT INTO books VALUES(DEFAULT, 12345, 'A Ira das Fúrias', 'Steven Saylor', 16.60, 1, 'No ano de 88 b.C., o mundo inteiro parece estar em guerra. No ocidente, os estados italianos rebelam-se contra Roma; para oriente, Mithridates está a marchar e a conquistar as províncias asiáticas romanas. Até mesmo em Alexandria, que continua relativamente calma, um golpe de estado levou ao poder um novo faraó, instalando o caos nas ruas. O jovem Gordiano tem estado à espera com Bethesda do fim do caos em Alexandria, mas é então que recebe uma mensagem cifrada do seu antigo tutor e amigo, Antipater. Agora em Éfeso, como membro da comitiva de Mithridates, Antipater está convicto de que a sua vida se encontra em perigo iminente.

Para o salvar, Gordiano concebe um esquema ousado e astuto para se pôr «atrás das fileiras dos inimigos» e deixar Antipater em segurança. Mas há ali ponderosas forças mortais, que têm os seus próprios planos para Gordiano. Este não sabe bem se ele próprio é um decisor ou um peão, mas terá de desvendar o mistério oculto na mensagem para se poder salvar a si e à pessoa que lhe é mais querida.', 0);


