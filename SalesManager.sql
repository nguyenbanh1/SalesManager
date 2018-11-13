-- create database sales_manager
-- use sales_manager

create table product
(
	idProduct nchar(10) not null primary key,
	nameProduct nvarchar(45),
    description nvarchar(500),
    view int,
    price double,
    dateCreated datetime,
    proceducer nvarchar(45),
    imageName varchar(20),
    status int, -- 1 : stocking / 0 : out of stocking
    quantitySold int,
    idCategory nchar(10)    
);

create table category
(
	idCategory nchar(10) not null primary key,
    nameCategory nvarchar(45),
    parentOfCategory nchar(10)
);

create table slideImages
(
	idSlideImages nchar(10),
    nameSlideImages nchar(45),
    idCategory nchar(10)
);

create table orders
(
	idOrder nchar(10),
    message nvarchar(200),
    deliveryDate datetime,
    dateCreated datetime,
    status int, -- 1 : delivered / 0 : not delivery
    amount double,
    idUser nchar(10)
);

create table user
(
	idUser nchar(10),
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
	idOrder nchar(10),
    idProduct nchar(10),
    dateCreated datetime
)










