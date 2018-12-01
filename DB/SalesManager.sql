-- create database sales_manager
-- use sales_manager
create table product
(
	idProduct int not null primary key auto_increment,
	nameProduct nvarchar(45),
    description nvarchar(500),
    view int, -- lượng view client click vào
    price double,
    dateCreated datetime,
    imageName varchar(100),
    quantitySold int,
    quantity int,
    idCategory int,
    idProducer int
);
create table producer
(
	idProducer int not null primary key auto_increment,
    nameProducer nvarchar(45)
);
create table category
(
	idCategory int not null primary key auto_increment,
    nameCategory nvarchar(45)
);

create table slideImages
(
	idSlideImages int not null primary key auto_increment,
    nameSlideImages nvarchar(45),
    idCategory int
);

create table orders
(
	idOrder int primary key not null auto_increment,
    message nvarchar(200),
    deliveryDate datetime,
    dateCreated datetime,
    status int, -- 1 : delivered / 0 : not delivery
    amount double,
    idUser int
);

create table user
(
	idUser int not null primary key auto_increment,
    nameUser nvarchar(45),
    username nvarchar(45),
    password nvarchar(45),
    type nvarchar(20), -- customer or admin
    imageName varchar(20),
    dateOfBirth date,
    email varchar(20),
    phone varchar(11)
);

create table detailOrder
(
	idOrder int,
    idProduct int,
    dateCreated datetime,
    primary key(idOrder, idProduct)
);


-- =========================== Insert DATA ==========================

-- insert data product
select * from producer;
update producer set nameProducer = 'DELL' where idProducer = 1;
insert into producer(nameProducer) values('Apple');


-- insert data category
insert into category(nameCategory) values('Apple');

-- insert producer
select idProduct,nameProduct,price,quantity from product;
insert into Product(nameProduct,price,quantity) values('Iphone',10000000,100);

select nameCategory from Category;

insert into product(nameProduct, description, price, dateCreated, imageName, quantity, idCategory, idProducer)
					values ('Iphone','chất lượng cao',1000000,'2018-05-17','iphone.png',11,1,1);
select * from product;

insert into product(nameProduct, description, price, dateCreated, imageName, quantity, idCategory, idProducer)
values ('Samsung Galaxy Note 9','Mang lại sự cải tiến đặc biệt trong cây bút S-Pen, siêu phẩm Samsung Galaxy Note 9 còn sở hữu dung lượng pin khủng lên tới 4.000 mAh cùng hiệu năng mạnh mẽ vượt bậc, xứng đáng là một trong những chiếc điện thoại cao cấp nhất của Samsung',22990000,'2018-11-30','samsung-galaxy-tab-a-105-inch.png',20,1,4)
select *
from product p1, category c, producer p
where p1.idProduct = 2 and p1.idCategory = c.idCategory and p1.idProducer = p.idProducer;

update product set price = 11111111, quantity = 100 where idProduct = 1;


select * from producer limit 4 offset 10;












