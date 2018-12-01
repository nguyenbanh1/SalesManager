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











