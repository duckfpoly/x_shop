CREATE DATABASE xshop

use xshop

CREATE TABLE tbl_categories (
    id_cate INT NULL AUTO_INCREMENT,
    name VARCHAR(255) NULL,
)

CREATE TABLE tbl_products (
    id_prd INT NULL AUTO_INCREMENT,
    name_prd VARCHAR(255) NULL,
    price FLOAT NULL,
    image VARCHAR(255) NULL,
    giam_gia FLOAT NULL,
    ngay_nhap DATE NULL,
    dac_biet TINYINT NULL,
    so_luot_xem INT NULL,
    description VARCHAR(255) NULL,
    so_luong INT NULL,
    ID_Cate INT NULL
)

CREATE TABLE tbl_comments ( 
    id_cmt INT NULL AUTO_INCREMENT,
    ID_Product INT NULL,
    ID_User INT NULL,
    time DATE NULL,
    content TEXT NULL
)

CREATE TABLE tbl_user (
    ID INT NULL AUTO_INCREMENT,
    username VARCHAR(255) NULL,
    name VARCHAR(255) NULL,
    email VARCHAR(255) NULL,
    password VARCHAR(255) NULL,
    image VARCHAR(255) NULL,
    active TINYINT 0,
    vaitro TINYINT 0
)

CREATE TABLE tbl_blogs (
    id_blog INT NULL AUTO_INCREMENT,
    user_post INT NULL,
    time_post DATETIME NULL,
    title TEXT NULL,
    content TEXT NULL,
    quote TEXT NULL,
    image VARCHAR(255) NULL,
)

CREATE TABLE tbl_comment_blog ( 
    id_cmt_blog INT NULL AUTO_INCREMENT,
    content INT NULL,
    id_user INT NULL,
    id_blog INT NULL,
    time DATETIME NULL,
)

ALTER TABLE tbl_products ADD CONSTRAINT 
FK_ID_CATE FOREIGN KEY (ID_Cate) 
REFERENCES tbl_categories (id_cate)

ALTER TABLE tbl_comments ADD CONSTRAINT 
FK_ID_PRD FOREIGN KEY (ID_Product) 
REFERENCES tbl_products (id_prd)

ALTER TABLE tbl_order_detail ADD CONSTRAINT 
FK_ORDER_CODE FOREIGN KEY (order_code) 
REFERENCES tbl_orders (order_code)

ALTER TABLE tbl_order_detail ADD CONSTRAINT 
FK_ID_PRDS FOREIGN KEY (product_id) 
REFERENCES tbl_products (id_prd)

ALTER TABLE tbl_custromer ADD CONSTRAINT 
FK_ID_CUSTOMER FOREIGN KEY (id_customer) 
REFERENCES tbl_custromer (id_customer)

ALTER TABLE tbl_comment_blog ADD CONSTRAINT 
FK_ID_BLOG FOREIGN KEY (id_blog) 
REFERENCES tbl_blogs (id_blog)

ALTER TABLE tbl_comment_blog ADD CONSTRAINT 
FK_ID_BLOG_USER FOREIGN KEY (id_user) 
REFERENCES tbl_user (ID)

ALTER TABLE tbl_blogs ADD CONSTRAINT 
FK_ID_BLOG_CATE FOREIGN KEY (id_category) 
REFERENCES tbl_categories (id_cate)


INSERT INTO `tbl_categories`(`name_cate`) VALUES 
('Laptop'), -- 1
('Mobile'), -- 2
('Tablet'), -- 3
('Headphones'), -- 4
('Keyboard'), -- 5
('Mouse') -- 6

INSERT INTO `tbl_products`(`name_prd`, `price`, `image`, `giam_gia`, `ngay_nhap`, `dac_biet`, `so_luot_xem`, `description`, `so_luong`, `ID_Cate`) VALUES 
('Laptop 1','1000','laptop1.jpg','10','2022-09-28',0,1,'description product 1',0,1),
('Laptop 2','2000','laptop2.jpg','20','2022-07-27',0,2,'description product 2',200,1),
('Laptop 3','3000','laptop3.jpg','30','2022-08-29',1,3,'description product 3',300,1),
('Laptop 4','4000','laptop4.jpg','40','2022-04-24',1,4,'description product 4',400,1),

('Mobile 1','1000','mobile1.jpg','10','2022-09-28',0,1,'description product 5',0,2),
('Mobile 2','2000','mobile2.jpg','20','2022-07-27',0,2,'description product 6',10,2),
('Mobile 3','3000','mobile3.jpg','30','2022-08-29',1,3,'description product 7',20,2),
('Mobile 4','4000','mobile4.jpg','40','2022-04-24',1,4,'description product 8',30,2),

('Tablet 1','1000','tablet1.jpg','10','2022-09-28',0,1,'description product 9',0,3),
('Tablet 2','2000','tablet2.jpg','20','2022-07-27',0,2,'description product 10',200,3),
('Tablet 3','3000','tablet3.jpg','30','2022-08-29',1,3,'description product 11',300,3),
('Tablet 4','4000','tablet4.jpg','40','2022-04-24',1,4,'description product 12',400,3),

('Headphone 1','1000','headphone1.jpg','10','2022-09-28',0,1,'description product 13',0,4),
('Headphone 2','2000','headphone2.jpg','20','2022-07-27',0,2,'description product 14',200,4),
('Headphone 3','3000','headphone3.jpg','30','2022-08-29',1,3,'description product 15',300,4),
('Headphone 4','4000','headphone4.jpg','40','2022-04-24',1,4,'description product 16',400,4)


INSERT INTO `tbl_user`(`name`, `email`, `password`, `image`, `active`, `vaitro`) VALUES 
('Nguyễn Đức','duc@gmail.com','$2y$10$/N6vxt2O9t0PIdlWyaq4jedfc7uXEE9ZmEcuBb/536u/o7wPX2WUe','image.jpg',0,1),
('Bùi Huy','huy@gmail.com','$2y$10$2d1ZgTKdis285hImgZbt.OgLu4OArF8QJ4v5YVcQbjV1Rfl1MFuZ2','user.png',0,0)


filter price
- desc: SELECT * FROM `tbl_products` ORDER BY price DESC
- asc: SELECT * FROM `tbl_products` ORDER BY price ASC
- range : SELECT * FROM `tbl_products` where price BETWEEN 1000000 AND 20000000
filter name 
- desc: SELECT * FROM `tbl_products` ORDER BY name DESC
- asc: SELECT * FROM `tbl_products` ORDER BY name ASC
