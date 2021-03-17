create database pizzeria;
use pizzeria;

create table if not exists newsletter (
	newsletter_id int not null auto_increment,
    newsletter_nickname varchar(255),
    newsletter_email varchar(255),
    primary key (newsletter_id)
) character set = utf8;

create table if not exists sizes (
	size_id int not null auto_increment,
    size_name varchar(255),
    primary key (size_id)
) character set = utf8;

-- Tabela zawierająca dane produktów. Kluczem głównym jest product_id. Jednocześnie kluczem obcym
-- jest category_id. Przyjąłem, że każdy produkt w mojej bazie musi mieć jasno określoną kategorię
-- w momencie jego tworzenia. Cena zapisywana jest jako float i nie może być nullem.
create table if not exists products (
	product_id int not null auto_increment,
    product_name varchar(255),
    size_id int not null,
    product_description varchar(255),
    price float not null,
    primary key (product_id),
    foreign key (size_id) references sizes(size_id)
) character set = utf8;

-- Tabela użytkowników - przechowuje id użytkownika, jego login, skrót hasła i sól, a poza tym imię
-- i nazwisko.
create table if not exists users (
	user_id int not null auto_increment,
    user_nickname varchar(255) not null,
    user_password_hash varchar(255) not null,
    user_email varchar(255) not null,
    primary key (user_id)
) character set = utf8;

-- Tabela adresów. 
create table if not exists addresses (
	address_id int not null auto_increment,
    address_line_1 varchar(255) not null,
    address_line_2 varchar(255) not null,
    city varchar(255) not null,
    postal_code varchar(16) not null,
    primary key (address_id)
) character set = utf8;

-- Tabela pomostowa łącząca poszczególnych użytkowników z adresami. Jeden użytkownik może mieć
-- kilka adresów np. domowy i firmowy, a każdy z adresów może mieć kilku użytkowników (np rodzina
-- mieszkająca w jednym domu).
create table if not exists user_address_mappings (
	mapping_id int not null auto_increment,
    user_id int not null,
    address_id int not null,
    primary key (mapping_id),
    foreign key (user_id) references users(user_id),
    foreign key (address_id) references addresses(address_id)
) character set = utf8;

-- Tabela z zamówieniami klientów. Data w tej tabeli pozwala na poprawne liczenie wartości zamówień
-- z przeszłości jeżeli ceny niektórych produktów uległy zmianie.
create table if not exists orders (
	order_id int not null auto_increment,
    user_id int not null,
    order_date timestamp not null,
    primary key (order_id),
    foreign key (user_id) references users(user_id)
) character set = utf8;

-- Tabela dzięki której możemy określić jakie produkty pojawiły się w danym zamówieniu oraz ilość
-- każdego z nich.
create table if not exists order_items (
	order_item_id int not null auto_increment,
    order_id int not null,
    product_id int not null,
    product_quantity int not null,
    primary key (order_item_id),
    foreign key (order_id) references orders(order_id),
    foreign key (product_id) references products(product_id)
) character set = utf8;



-- Przykładowe dane -----------------------------------------------------------------------------

insert into sizes (size_id, size_name) values
	(null, 'none'),
	(null, '30 cm'),
	(null, '40 cm'),
	(null, '50 cm'),
	(null, '250 ml'),
	(null, '500 ml');
    
insert into products (product_id, product_name, size_id, product_description, price) values
	(null, 'Margherita', '2', 'sos pomidorowy, ser mozzarella, oregano', '18.00'),
	(null, 'Margherita', '3', 'sos pomidorowy, ser mozzarella, oregano', '25.00'),
	(null, 'Margherita', '4', 'sos pomidorowy, ser mozzarella, oregano', '32.00'),
	(null, 'Funghi', '2', 'sos pomidorowy, ser mozzarella, pieczarki, oregano', '20.00'),
	(null, 'Funghi', '3', 'sos pomidorowy, ser mozzarella, pieczarki, oregano', '37.00'),
	(null, 'Funghi', '4', 'sos pomidorowy, ser mozzarella, pieczarki, oregano', '34.00'),
	(null, 'Vesuvio', '2', 'sos pomidorowy, ser mozzarella, szynka, oregano', '21.00'),
	(null, 'Vesuvio', '3', 'sos pomidorowy, ser mozzarella, szynka, oregano', '28.00'),
	(null, 'Vesuvio', '4', 'sos pomidorowy, ser mozzarella, szynka, oregano', '35.00'),
	(null, 'Salami', '2', 'sos pomidorowy, ser mozzarella, salami, oregano', '21.00'),
	(null, 'Salami', '3', 'sos pomidorowy, ser mozzarella, salami, oregano', '28.00'),
	(null, 'Salami', '4', 'sos pomidorowy, ser mozzarella, salami, oregano', '35.00'),
	(null, 'Capri', '2', 'sos pomidorowy, ser mozzarella, pieczarki, szynka, oregano', '22.00'),
	(null, 'Capri', '3', 'sos pomidorowy, ser mozzarella, pieczarki, szynka, oregano', '29.00'),
	(null, 'Capri', '4', 'sos pomidorowy, ser mozzarella, pieczarki, szynka, oregano', '36.00'),
	(null, 'Napoli', '2', 'sos pomidorowy, ser mozzarella, pieczarki, salami, oregano', '22.00'),
	(null, 'Napoli', '3', 'sos pomidorowy, ser mozzarella, pieczarki, salami, oregano', '29.00'),
	(null, 'Napoli', '4', 'sos pomidorowy, ser mozzarella, pieczarki, salami, oregano', '36.00'),
	(null, 'Czosnek', '2', 'sos czosnkowy, pieczarki, kurczak, szczypiorek, pomidor', '22.00'),
	(null, 'Czosnek', '3', 'sos czosnkowy, pieczarki, kurczak, szczypiorek, pomidor', '29.00'),
	(null, 'Czosnek', '4', 'sos czosnkowy, pieczarki, kurczak, szczypiorek, pomidor', '36.00'),
	(null, 'Oliwka', '2', 'sos pomidorowy, ser mozzarella, pieczarki, salami, czarne oliwki, czosnek, oregano', '23.00'),
	(null, 'Oliwka', '3', 'sos pomidorowy, ser mozzarella, pieczarki, salami, czarne oliwki, czosnek, oregano', '30.00'),
	(null, 'Oliwka', '4', 'sos pomidorowy, ser mozzarella, pieczarki, salami, czarne oliwki, czosnek, oregano', '37.00'),
	(null, 'Roma', '2', 'sos pomidorowy, ser mozzarella, salami, czerwona cebula, kukurydza, oregano', '23.00'),
	(null, 'Roma', '3', 'sos pomidorowy, ser mozzarella, salami, czerwona cebula, kukurydza, oregano', '30.00'),
	(null, 'Roma', '4', 'sos pomidorowy, ser mozzarella, salami, czerwona cebula, kukurydza, oregano', '37.00'),
	(null, 'Wenecja', '2', 'sos pomidorowy, ser mozzarella, pieczarki, szynka, kukurydza, kurczak, czosnek, oregano', '24.00'),
	(null, 'Wenecja', '3', 'sos pomidorowy, ser mozzarella, pieczarki, szynka, kukurydza, kurczak, czosnek, oregano', '31.00'),
	(null, 'Wenecja', '4', 'sos pomidorowy, ser mozzarella, pieczarki, szynka, kukurydza, kurczak, czosnek, oregano', '38.00'),
	(null, 'Chili', '2', 'sos pomidorowy chili, ser mozzarella, boczek, cebula biała, pomidor, papryka', '24.00'),
	(null, 'Chili', '3', 'sos pomidorowy chili, ser mozzarella, boczek, cebula biała, pomidor, papryka', '31.00'),
	(null, 'Chili', '4', 'sos pomidorowy chili, ser mozzarella, boczek, cebula biała, pomidor, papryka', '38.00'),
	(null, 'Mexico', '2', 'sos pomidorowy pikantny, ser mozzarella, salami, szynka, wołowina, czerwona fasola, papryka jalapeno, oregano', '25.00'),
	(null, 'Mexico', '3', 'sos pomidorowy pikantny, ser mozzarella, salami, szynka, wołowina, czerwona fasola, papryka jalapeno, oregano', '32.00'),
	(null, 'Mexico', '4', 'sos pomidorowy pikantny, ser mozzarella, salami, szynka, wołowina, czerwona fasola, papryka jalapeno, oregano', '39.00'),
	(null, 'Chłopska', '2', 'sos pomidorowy, ser mozzarella, kiełbasa, boczek, kabanos, czerwona cebula, ogórek kiszony, jajko, oregano', '25.00'),
	(null, 'Chłopska', '3', 'sos pomidorowy, ser mozzarella, kiełbasa, boczek, kabanos, czerwona cebula, ogórek kiszony, jajko, oregano', '32.00'),
	(null, 'Chłopska', '4', 'sos pomidorowy, ser mozzarella, kiełbasa, boczek, kabanos, czerwona cebula, ogórek kiszony, jajko, oregano', '39.00'),
	(null, 'Sycyliana', '2', 'sos pomidorowy, ser mozzarella, tuńczyk, czerwona cebula, zapieczony sos majonezowy', '25.00'),
	(null, 'Sycyliana', '3', 'sos pomidorowy, ser mozzarella, tuńczyk, czerwona cebula, zapieczony sos majonezowy', '32.00'),
	(null, 'Sycyliana', '4', 'sos pomidorowy, ser mozzarella, tuńczyk, czerwona cebula, zapieczony sos majonezowy', '39.00'),
	(null, 'Hawajska', '2', 'sos pomidorowy, ser mozzarella, szynka, ananas, oregano', '26.00'),
	(null, 'Hawajska', '3', 'sos pomidorowy, ser mozzarella, szynka, ananas, oregano', '33.00'),
	(null, 'Hawajska', '4', 'sos pomidorowy, ser mozzarella, szynka, ananas, oregano', '40.00'),
	(null, 'Cztery Sery', '2', 'sos pomidorowy, ser mozzarella, ser pleśniowy, camembert, feta, oregano', '26.00'),
	(null, 'Cztery Sery', '3', 'sos pomidorowy, ser mozzarella, ser pleśniowy, camembert, feta, oregano', '33.00'),
	(null, 'Cztery Sery', '4', 'sos pomidorowy, ser mozzarella, ser pleśniowy, camembert, feta, oregano', '40.00'),
	(null, 'Sos czosnkowy', '1', '80 ml', '3.00'),
	(null, 'Sos pomidorowy', '1', '80 ml', '3.00'),
	(null, 'Sos bazyliowy', '1', '80 ml', '3.00'),
	(null, 'Sos BBQ', '1', '80 ml', '3.00'),
	(null, 'Ketchup', '1', '80 ml', '3.00'),
	(null, 'Sos serowy chili', '1', '80 ml', '3.00'),
	(null, 'Sos ostry sambal', '1', '80 ml', '3.00'),
	(null, 'Frytki', '1', '300 g', '7.00'),
	(null, 'Frytki belgijskie', '1', '300 g', '8.00'),
	(null, 'Krążki cebulowe', '1', '10 szt.', '8.00'),
	(null, 'Nuggetsy', '1', '6 szt.', '11.00'),
	(null, 'Sok pomarańczowy', '5', '250 ml', '4.00'),
	(null, 'Sok jabłkowy', '5', '250 ml', '4.00'),
	(null, 'Nektar czarna porzeczka', '5', '250 ml', '4.00'),
	(null, 'Nektar z grejpfruta', '5', '250 ml', '4.00'),
	(null, 'Coca-cola', '6', '500 ml', '6.00'),
	(null, 'Cola zero', '6', '500 ml', '6.00'),
	(null, 'Fuze Tea cytrynowa', '6', '500 ml', '6.00'),
	(null, 'Fuze Tea brzoskwiniowa', '6', '500 ml', '6.00'),
	(null, 'Fuze Tea mango', '6', '500 ml', '6.00'),
	(null, 'Kropla Beskidu gazowana', '6', '500 ml', '5.00'),
	(null, 'Kropla Beskidu niegazowana', '6', '500 ml', '5.00');
    



