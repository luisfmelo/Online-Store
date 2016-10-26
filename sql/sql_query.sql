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

/*Categorias
1- Ciência
2- Desporto
3- Romance
4- Tecnologia
5- Arte
6- Drama
*/

INSERT INTO categories VALUES(DEFAULT, 'Ciência');
INSERT INTO categories VALUES(DEFAULT, 'Desporto');
INSERT INTO categories VALUES(DEFAULT, 'Romance');
INSERT INTO categories VALUES(DEFAULT, 'Tecnologia');
INSERT INTO categories VALUES(DEFAULT, 'Arte');
INSERT INTO categories VALUES(DEFAULT, 'Drama');

/*Desporto*/
INSERT INTO books VALUES(DEFAULT, 00001, 'A Arte da Guerra para Treinadores', 'Rui Vitória', 10.99, 2, 'O terreno de jogo é o campo de batalha. Cada partida, um duelo onde aquele que comete menos erros vencerá. Como se organiza uma estratégia para vencer? Qual a táctica que permitirá derrotar o inimigo?', 0);
INSERT INTO books VALUES(DEFAULT, 00002, 'Prevenção de Lesões no Desporto', 'Luís Horta', 16.90, 2, 'A incidência de lesões na actividade desportiva tem aumentado nos últimos anos devido às grandes exigências físicas e psíquicas que essa actividade pressupõe. A prevenção de lesões é um tema fundamental na formação de todos os técnicos ligados ao fenómeno desportivo, assim como de todos os atletas. Prevenção de Lesões no Desporto será um livro fundamental para que treinadores, médicos, fisioterapeutas.', 0);
INSERT INTO books VALUES(DEFAULT, 00003, 'Running. Muito mais do que correr', 'José Soares', 14.40, 2, 'O exercício físico nunca esteve tanto na moda e a corrida, por ser uma atividade simples e acessível a todos, tem vindo a ganhar cada vez mais adeptos. Uns mais habituados à prática desportiva, outros que nunca tinham praticado exercício antes', 0);
INSERT INTO books VALUES(DEFAULT, 00004, 'Mitos do Futebol Português', 'Ricardo Serrado', 15.00, 2, 'Terá o Futebol Clube do Porto nascido em 1893 ou 1906? Cosme Damião terá sido mesmo o fundador do Sport Lisboa e Benfica? Fará sentido dizer que o Sporting é um clube de aristocratas? Qual é, afinal, a verdadeira história da criação dos três maiores clubes portugueses?', 0);
INSERT INTO books VALUES(DEFAULT, 00005, 'Do ABC da BTT até onde puderes...', 'Mário Alpiarça', 25.00, 2, '"O "ABC da BTT até onde puderes..." é o primeiro livro, do meu conhecimento, a abordar o BTT de uma forma tão acessível, didáctica e holística para todos os amantes desta modalidade, em português, de uma forma tão rica e, acima de tudo, actual. Sejam os leitores iniciantes, entusiastas ou experientes, este livro oferece-lhes um vasto conhecimento de uma forma simples com informação pertinente quanto aos mais variados tipos de técnica existentes.', 0);
INSERT INTO books VALUES(DEFAULT, 00006, 'A Tomada de Decisão no Futsal', 'Bruno Travassos', 12.00, 2, 'Bruno Travassos é docente e investigador do departamento de Ciências do Desporto da Universidade da Beira Interior e membro do Centro de Investigação CIDESD onde desenvolve os seus trabalhos de investigação no âmbito da tomada de decisão e análise de jogo no futsal. Autor de um largo número de artigos científicos e capítulos de livros de âmbito nacional e internacional.', 0);
INSERT INTO books VALUES(DEFAULT, 00007, 'Vai Correr Tudo Bem!', 'Eder ', 9.00, 2, 'De Portugal a Timor, milhões de telespectadores veem e nem acreditam. Numa das mais dramáticas finais de campeonatos europeus, Eder dispara um tiraço monumental de fora da área. É golo, é o golo impossível, o golo por que esperávamos há décadas. Uma bomba, o país explode, é o delírio. E naquele momento nasce um novo herói, chama-se Ederzito, e é um gigante, a correr como louco pelo relvado', 0);
INSERT INTO books VALUES(DEFAULT, 00008, 'Ganhar com as Apostas Desportivas', 'Paulo Rebelo', 16.50, 2, 'Ganhar Com as Apostas Desportivas, é um guia que pretende ser uma orientação e um curso prático para todos aqueles que querem arriscar e ganhar com as apostas desportivas nas várias vertentes. Com a vantagem de poder ser utilizado por quem já é um habitual apostador e por quem nunca fez uma única aposta na vida e quer aprender com fazê-lo com sucesso.', 0);

/*Ciência*/
INSERT INTO books VALUES(DEFAULT, 00009, 'Demografia - A Ciência da População', 'J. Manuel Nazareth', 17.99, 2, 'O terreno de jogo é o campo de batalha. Cada partida, um duelo onde aquele que comete menos erros vencerá. Como se organiza uma estratégia para vencer? Qual a táctica que permitirá derrotar o inimigo?', 0);
INSERT INTO books VALUES(DEFAULT, 00010, 'A Minha Breve História ', 'Stephen Hawking', 12.00, 2, 'Autobiografia de um dos mais brilhantes cientistas do nosso tempo, que mostra um Hawking apenas entrevisto nos seus livros anteriores: o estudante curioso a quem os colegas alcunharam Einstein, o gracejador que apostou uma assinatura da Playboy sobre a existência de buracos negros e o jovem marido e pai lutando para conquistar um lugar no difícil mundo académico, sem esquecer o diagnóstico, aos 21 anos, da doença que o confinaria a uma cadeira de rodas. Um relato corajoso e sensível, uma mensagem de esperança e uma lição de vida.', 0);
INSERT INTO books VALUES(DEFAULT, 00011, 'A Teoria de Tudo - A Origem e o Destino do Universo', 'Stephen Hawking', 13.00, 2, 'A história de Stephen Hawking é contada pela luz da genialidade e do amor que não vê obstáculos. Quando Jane conhece Stephen, percebe que está entrando para uma família que é pelo menos diferente. Com grande sede de conhecimento, os Hawking possuíam o hábito de levar material de leitura para o jantar, ir a óperas e concertos e estimular o brilhantismo em seus filhos.', 0);
INSERT INTO books VALUES(DEFAULT, 00012, 'O Gene Egoísta', 'Richard Dawkins', 17.69, 2, 'O Gene Egoísta é o primeiro livro de Richard Dawkins, em que ele apresenta uma teoria que procura explicar a evolução das espécies na perspectiva do gene e não do organismo, ou da espécie.', 0);
INSERT INTO books VALUES(DEFAULT, 00013, 'O Erro de Descartes', 'António Damásio', 21.59, 2, 'Em "O Erro de Descartes", obra do neurologista português António Damásio, surge uma nova interpretação acerca do axioma cartesiano cogito, ergo sum. Em vez da plenitude da razão, abre-se espaço para a ética das emoções.', 0);
INSERT INTO books VALUES(DEFAULT, 00014, 'A Estrutura das Revoluções Científicas', 'Thomas Kuhn', 11.98, 2, 'A Estrutura das Revoluções Científicas é uma análise sobre a história da ciência. Sua publicação estabelece um marco na sociologia do conhecimento, popularizando os termos paradigma e mudança de paradigma.', 0);
INSERT INTO books VALUES(DEFAULT, 00015, 'A Origem das Espécies', 'Charles Darwin', 21.98, 2, 'A Origem das Espécies, do naturalista britânico Charles Darwin, apresenta a Teoria da Evolução. O nome completo da primeira edição é On the Origin of Species by Means of Natural Selection.', 0);
INSERT INTO books VALUES(DEFAULT, 00016, 'O Universo numa Casca de Noz', 'Stephen Hawking', 8.98, 2, 'O Universo numa Casca de Noz é um livro sobre física teórica escrito pelo renomado físico Stephen Hawking. Voltado explicitamente ao público leigo, apresenta, de forma clara e sem o uso de matemática, as principais ideias antes e hoje debatidas pelos físicos teóricos, abrangendo desde o microcosmo quântico até o macrocosmo universal.', 0);

/*Romance*/
INSERT INTO books VALUES(DEFAULT, 00017, 'A Ira das Fúrias', 'Steven Saylor', 16.60, 3, 'No ano de 88 b.C., o mundo inteiro parece estar em guerra. Até mesmo em Alexandria, que continua relativamente calma, um golpe de estado levou ao poder um novo faraó, instalando o caos nas ruas. O jovem Gordiano tem estado à espera com Bethesda do fim do caos em Alexandria, mas é então que recebe uma mensagem cifrada do seu antigo tutor e amigo, Antipater. Astuto para se pôr «atrás das fileiras dos inimigos» e deixar Antipater em segurança. Mas há ali ponderosas forças mortais, que têm os seus próprios planos para Gordiano.', 0);
INSERT INTO books VALUES(DEFAULT, 00018, 'Orgulho e Preconceito', 'Jane Austen', 11.02, 3, 'Pride and Prejudice é um romance da escritora britânica Jane Austen. Publicado pela primeira vez em 1813, na verdade havia sido terminado em 1797, antes de ela completar 21 anos, em Steventon, Hampshire, onde Jane morava com os pais.', 0);
INSERT INTO books VALUES(DEFAULT, 00019, 'Nineteen Eighty-Four', 'George Orwell', 19.92, 3, 'Nineteen Eighty-Four (em português: Mil Novecentos e Oitenta e Quatro ou 1984) é um romance distópico clássico do autor britânico George Orwell, pseudônimo de Eric Arthur Blair. Terminado de escrever no ano de 1948 e publicado em 8 de junho de 1949, retrata o cotidiano de um regime político totalitário e repressivo no ano homônimo. No livro, Orwell mostra como uma sociedade oligárquica coletivista é capaz de reprimir qualquer um que se opuser a ela.', 0);
INSERT INTO books VALUES(DEFAULT, 00020, 'A Tormenta de Espadas', 'George R. R. Martin', 8.99, 3, 'A Storm of Swords é o terceiro livro da série de fantasia épica As Crônicas de Gelo e Fogo, escrita pelo norte-americano George R. R. Martin e publicada pela editora Bantam Spectra. Foi publicado pela primeira vez em 8 de agosto de 2000 no Reino Unido, sendo lançado nos Estados Unidos em novembro do mesmo ano.[1] Como os dois volumes anteriores da saga, ele venceu o Prêmio Locus de Melhor Romance.', 0);
INSERT INTO books VALUES(DEFAULT, 00021, 'A Cabana', 'William P. Young', 11.99, 3, 'A Cabana é um livro do escritor canadense William P. Young, lançado em 2007 nos Estados Unidos. Chegou ao Brasil pela Editora Sextante em 2008. No ano de 2009 ganhou o Diamond Awards por ter vendido 10 milhões de cópias nos EUA.', 0);
INSERT INTO books VALUES(DEFAULT, 00022, 'Cem Anos de Solidão', 'Gabriel García Márquez', 13.44, 3, 'Cem Anos de Solidão é uma obra do escritor colombiano Gabriel García Márquez, Prémio Nobel da Literatura em 1982, e é atualmente considerada uma das obras mais importantes da literatura latino-americana.', 0);
INSERT INTO books VALUES(DEFAULT, 00023, 'A Culpa É das Estrelas', 'Ohn Green', 12.04, 3, 'Hazel Grace é uma jovem prestes a completar dezessete anos de idade e desde os treze anos sofre com um cancro na tiroide, que evoluiu para uma metástase no pulmão e faz com que ela tenha que andar com um cilindro de oxigênio e uma cânula no nariz para conseguir respirar. A mãe conclui que ela estava deprimida já que passava muito tempo pensando na morte, sendo assim instruída a frequentar um Grupo de Apoio liderado por Patrick (que sofreu cancro nos testiculos/bolas), o único membro adulto.', 0);
INSERT INTO books VALUES(DEFAULT, 00024, 'A Sombra do Vento', 'Carlos Ruiz Zafón', 16.94, 3, 'A história começa em Barcelona, em 1945. Daniel Sempere está completando 11 anos. Seu pai, ao ver Daniel triste por não conseguir mais se lembrar do rosto da mãe (já morta), lhe dá um presente: de madrugada, leva-o a um misterioso lugar no coração histórico da cidade, o Cemitério dos Livros Esquecidos. O lugar, conhecido por poucos na cidade, é uma biblioteca secreta e labiríntica que funciona como depósito para obras abandonadas pelo mundo, à espera de que alguém as descubra.', 0);

/*Tecnologia*/
INSERT INTO books VALUES(DEFAULT, 00025, 'O Dilema da Inovação', 'Clayton M. Christensen', 13.89, 3, 'O Dilema da Inovação: quando as novas tecnologias levam empresas ao fracasso, escrito pelo professor de Harvard Clayton Christensen, que pela segunda vez consecutiva (2012-2013), foi eleito o maior guru de negócios do mundo, marcou história por popularizar o termo “inovação disruptiva”', 0);
INSERT INTO books VALUES(DEFAULT, 00026, 'O Crescimento Pela Inovação', 'Clayton M. Christensen', 12.59, 3, 'Por que é tão difícil sustentar o sucesso? Neste livro os autores respondem o que aprenderam a respeito desse enigma. Não são apenas os erros de gestão que levam ao fracasso. A inobservância de certas práticas que são essenciais para o sucesso da empresa - como atender às necessidades dos melhores clientes e concentrar investimentos onde a rentabilidade é mais atraente - também é causa de fracasso. Dividido em 9 capítulos, o livro aborda os seguintes temas - Como vencer os concorrentes mais poderosos? Que produtos os clientes comprarão?', 0);
INSERT INTO books VALUES(DEFAULT, 00027, 'O que a Google Faria?', 'Jeff Jarvis', 9.59, 3, '“O que a Google Faria?”, livro escrito pelo jornalista Jeff Jarvis, mostra como pensar de maneira inovadora, enfrentar desafios, encontrar soluções novas para os problemas e perceber novas oportunidades, tudo isso inspirado nas práticas da gigante da internet, a Google.', 0);
INSERT INTO books VALUES(DEFAULT, 00028, 'O Guia Prático do AutoCAD 2002 a 3-Dimensões', 'Hugo Ferramacho', 16.90, 3, 'Este livro aborda todo o conjunto de ferramentas que envolvem as 3-Dimensões do AutoCAD, com uma lógica sequencial e não de consulta, mas sim de auto-aprendizagem - começando nas Vistas, passando pelos Planos, referindo as Superfícies bem como os Sólidos e terminando no Fotorealismo que o Render proporciona.', 0);
INSERT INTO books VALUES(DEFAULT, 00029, 'Personalização no Marketing', 'José Luís Reis', 20.88, 3, 'Com a globalização das Tecnologias de Informação e Comunicação (TIC) (deve-se essencialmente à forma como os serviços baseados na Internet/Web se disseminaram), a personalização passou a ser uma realidade em muitos sites Web e em alguns sistemas de informação das organizações.', 0);
INSERT INTO books VALUES(DEFAULT, 00030, 'Tecnologias de Informação', 'Sérgio Sousa', 26.89, 3, 'Desde a difusão dos computadores pessoais em meados da década de 80 do século XX, que as Tecnologias de Informação se tornaram uma realidade inerente à vida de todos nós. Das grandes multinacionais às pequenas empresas, das instituições públicas ao ensino e na nossa própria casa, termos como Informática, Computador, Tecnologias de Informação, Internet e Multimédia invadiram o nosso vocabulário. É esta, cada vez maior, multiplicidade de conceitos, técnicas, equipamentos e programas que pode tornar as Tecnologias de Informação em algo de "menos amigável".', 0);
INSERT INTO books VALUES(DEFAULT, 00031, 'O essencial sobre...O Computador', 'Pedro Amaral', 6.95, 3, 'Nos dias que correm, os computadores são um complemento essencial na grande maioria dos ambientes de trabalho e também nas nossas actividades do dia-a-dia. As Tecnologias da Informação e Comunicação tornaram-se acessíveis a quase toda a gente e, para além de contribuírem para o aumento da produtividade e do rendimento em diversas tarefas, constituem também um importante canal de comunicação de dados e conteúdos.', 0);
INSERT INTO books VALUES(DEFAULT, 00032, 'Dependências Online - O poder das tecnologias', 'Daniel Sampaio', 16.92, 3, 'Estudos recentes sobre as dependências online nos jovens e em adultos portugueses revelaram que a utilização problemática da Internet está associada a diversas alterações no estado de humor, no funcionamento familiar, nas relações sociais, entre outras. Tal como noutros comportamentos associados ao consumo, estar online também traz prazer e gratificação, e será neste limite que é importante fazer-se uma gestão dos riscos para a saúde em geral e para a segurança de cada um.', 0);

/*Arte*/
INSERT INTO books VALUES(DEFAULT, 00033, 'Outras Cores', 'Orhan Pamuk', 11.92, 3, 'A partir de uma perspectiva de memória, a presente obra recua ao passado nos últimos 30 anos, consagrando-se como uma espécie de diário do autor, actualizado a partir de blocos de notas. Nele encontramos um conjunto de textos desde apontamentos', 0);
INSERT INTO books VALUES(DEFAULT, 00034, 'Tarefas Infinitas - Quando a Arte e o Livro se Ilimitam', 'Orhan Pamuk', 20.44, 3, 'A exposição e o catálogo que a acompanha constituem uma proposta de reflexão sobre os limites permanentemente provocados e reconfigurados da arte e do livro por vir. Paulo Pires do Vale, comissário da exposição, é o autor do preâmbulo e dos cinco textos que correspondem ao mesmo número de núcleos que configuram o percurso expositivo: Com o infinito nas mãos.', 0);
INSERT INTO books VALUES(DEFAULT, 00036, 'A Arte De Amar - Livro De Colorir Antiestresse', 'Dulce Pinheiro', 23.92, 3, 'A Arte De Amar É Um Livro Diferente, Relaxante E Apaixonante. Deslumbre-Se Com Os Belos Desenhos E Com As Palavras Sobre O Amor Que Selecionamos Para Lhe Inspirar. Libere Sua Criatividade E Seu Romantismo. Cada Um Dos Desenhos Deste Livro É Impresso Em Uma Única Página, Com Uma Frase Encantadora No Verso E Com A Possibilidade De Destacar A Folha. Assim, Você Pode Usar A Sua Arte Para Presentear A Quem Ama De Um Jeito Original E Inesquecível. *Com Páginas Destacáveis.', 0);
INSERT INTO books VALUES(DEFAULT, 00037, 'República das Artes - Escultura', 'Francisco de Lacerda', 11.32, 3, 'Volume 4 de nove livros e CD que o levam pelas principais correntes artísticas no período da implantação da I República Portuguesa. Literatura, Teatro, Pintura, Escultura, Arquitectura, Fotografia, Cinema, Caricatura e Música em nove livros coordenados por Rui Vieira Nery, com textos de alguns dos maiores especialistas de cada uma destas áreas, e acompanhados por nove CD com obras dos melhores compositores da época.', 0);
INSERT INTO books VALUES(DEFAULT, 00038, 'O Futuro da Pintura', 'Wassily Kandinsky', 9.54, 3, 'Neste conjunto de ensaios publicados entre 1925 e 1943, Kandinsky expressa o seu pensamento sobre a pintura', 0);
INSERT INTO books VALUES(DEFAULT, 00039, 'Técnicas e Conservação de Pintura', 'Ana Calvo', 16.15, 3, 'Integrado numa colecção realizada em parceria com a Universidade Católica do Porto, da autoria de especialistas e docentes nas áreas da história da arte, património, conservação e restauro, este livro pretende dar a conhecer as novas teorias e políticas de actuação na área da conservação e restauro de pinturas. Está ilustrado com fotografias exemplificativas dos principais conceitos e temas abordados.', 0);
INSERT INTO books VALUES(DEFAULT, 00040, 'Pintura a Acrílico', 'Gabriel Martín Roig', 30.32, 3, 'O acrílico é, sem dúvida, o meio pictórico mais versátil que existe, conseguindo imitar, com excelentes resultados, qualquer outro meio, textura ou efeito plástico. Nas mãos de um artista profissional torna-se um poderoso instrumento, que se adapta a qualquer técnica e estilo, potenciando pela fácil utilização, uma grande pureza de cores e uma rápida secagem. Por estes motivos, muitos principiantes elegem o acrílico para se iniciarem no mundo da pintura.', 0);
INSERT INTO books VALUES(DEFAULT, 00041, 'Alexander von Humboldt', 'Alexander von Humboldt ', 14.00, 3, 'A publicação de uma antologia de textos de Alexander von Humboldt (1769-1859) tem por objectivo familiarizar o leitor português com a obra de uma das mais emblemáticas figuras europeias da passagem do século XVIII para o XIX. Emblemática a vários títulos: enquanto cientista que cruza vários ramos do saber; enquanto poliglota; enquanto viajante infatigável e espírito aberto às peculiaridades culturais dos diversos povos.', 0);

/*Drama*/
INSERT INTO books VALUES(DEFAULT, 00042, 'A Peste', 'Albert Camus', 10.21 , 3, 'A Peste é considerada a Magnum opus de Albert Camus, publicado 1947, que conta a história de trabalhadores que descobrem a solidariedade em meio a uma peste que assola a cidade de Oran na Argelia.', 0);
INSERT INTO books VALUES(DEFAULT, 00043, 'Hamlet Romeo Y Julieta', 'William Shakespeare', 15.55, 3, 'Hamlet é uma tragédia de William Shakespeare, escrita entre 1599 e 1601. A peça, situada na Dinamarca, reconta a história de como o Príncipe Hamlet tenta vingar a morte de seu pai, Hamlet, o rei, executado por Cláudio, seu irmão que o envenenou e em seguida tomou o trono casando-se com a rainha. A peça traça um mapa do curso de vida na loucura real e na loucura fingida — do sofrimento opressivo à raiva fervorosa — e explora temas como a traição, vingança, incesto, corrupção e moralidade.', 0);
INSERT INTO books VALUES(DEFAULT, 00044, 'Lolita', 'Vladimir Nabokov', 11.54, 3, 'Lolita é um romance de Vladimir Nabokov, escrito em inglês e publicado em 1955 em Paris, em 1958 na Cidade de Nova Iorque, e em 1959 em Londres.', 0);
INSERT INTO books VALUES(DEFAULT, 00045, 'Édipo Rei', 'Sófocles', 9.04, 3, 'Édipo Rei é uma peça de teatro grega, em particular uma tragédia, escrita por Sófocles por volta de 427 a.C.. Aristóteles, na sua Poética, considerou esta obra o mais perfeito exemplo de tragédia grega.', 0);
INSERT INTO books VALUES(DEFAULT, 00046, 'On the Road', 'Jack Kerouac', 19.04, 3, 'On the Road (no Brasil, lançado como On the road – Pé na Estrada; em Portugal, Pela Estrada Fora) um livro do escritor estadunidense Jack Kerouac. Considerada a obra-prima de Kerouac, um dos principais expoentes da geração beatnik dos Estados Unidos, sendo uma grande influência para a juventude dos anos 60, que colocava a mochila nas costas e botava o pé na estrada. Foi lançado nos Estados Unidos da América pela primeira vez em 1957.', 0);
INSERT INTO books VALUES(DEFAULT, 00047, 'A Trágica História do Doutor Fausto', 'Christopher Marlowe ', 21.94, 3, 'The Tragical History of Doctor Faustus é uma peça de teatro escrita por Christopher Marlowe em 1588 ou 1592, com base na história do Dr. Fausto,1587, recolha anônima alemã de contos sobre praticantes de ciências ocultas.', 0);
INSERT INTO books VALUES(DEFAULT, 00048, 'O Processo', 'Franz Kafka', 11.94, 3, 'O Processo é um romance do escritor checo Franz Kafka, que conta a história de Josef K., que acorda certa manhã, e é preso e sujeito a longo e incompreensível processo por um crime não especificado.', 0);
INSERT INTO books VALUES(DEFAULT, 00049, 'Mrs Dalloway', 'Virginia Woolf', 21.43, 3, 'Mrs. Dalloway é um romance de Virginia Woolf publicado em 14 de maio de 1925 que narra um dia na vida de Clarissa Dalloway, uma socialite ficcional que vive na Inglaterra pós-Primeira Guerra Mundial. É um dos romances mais famosos de Woolf.', 0);
