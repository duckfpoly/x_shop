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
    discount FLOAT NULL,
    create_at DATE NULL,
    special TINYINT NULL,
    view INT NULL,
    description VARCHAR(255) NULL,
    quantity INT NULL,
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


CREATE TABLE tbl_comments ( 
    id_cmt INT NULL AUTO_INCREMENT,
    ID_Product INT NULL,
    image_client VARCHAR(255) NULL,
    name_client VARCHAR(255) NULL,
    time DATE NULL,
    content TEXT NULL
)
SELECT 
    `tbl_products`.id_prd,
    `tbl_products`.name_prd,
    `tbl_comments`.*
    FROM `tbl_comments`
    INNER JOIN `tbl_products` ON `tbl_products`.id_prd = `tbl_comments`.ID_Product
    WHERE tbl_comments.ID_Product = ?
    ORDER BY `tbl_comments`.id_cmt DESC

 `ID_Product` = ?,
`ID_User` = ?,
`time` = ?,
`content` = ?
SELECT 
`tbl_user`.name,
`tbl_user`.image,
`tbl_user`.username,
`tbl_products`.id_prd,
`tbl_products`.name_prd,
`tbl_comments`.*
FROM `tbl_comments`
INNER JOIN `tbl_products` ON `tbl_products`.id_prd = `tbl_comments`.ID_Product
INNER JOIN `tbl_user` ON `tbl_user`.ID = `tbl_comments`.ID_User 
WHERE tbl_comments.ID_Product = ?
ORDER BY `tbl_comments`.id_cmt DESC

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




SQL Query
1. Categories
    - SELECT * FROM `tbl_categories`
    - INSERT INTO `tbl_categories` SET `name_cate` = ?
    - UPDATE `tbl_categories` SET `name_cate`= ? WHERE id_cate = ?
    - DELETE FROM `tbl_categories` WHERE id_cate = ?
    - SELECT * FROM `tbl_categories` WHERE id_cate = ?
2. products
    - SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate ORDER BY RAND() LIMIT 8
    - SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate ORDER BY RAND()
    - INSERT INTO `tbl_products` SET 
        `name_prd`      = ?, 
        `price`         = ?, 
        `image`         = ?,
        `giam_gia`      = ?, 
        `ngay_nhap`     = ?,
        `dac_biet`      = ?,
        `description`   = ?,
        `id_cate`       = ?
    - UPDATE `tbl_products` SET `name_prd` = ?,`price` = ?,`image` = ?,`giam_gia` = ?,`dac_biet` = ?,`description` = ?,`so_luong` = ?,`ID_Cate` = ? WHERE id_prd = ? 
    - DELETE FROM `tbl_products` WHERE tbl_products.id_prd = ?
    - SELECT * FROM `tbl_products`
        INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
        WHERE `tbl_products`.id_prd = ?
    - SELECT * FROM `tbl_products` WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0,8
    - SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate WHERE `tbl_categories`.id_cate = ?
    - SELECT * FROM `tbl_products`  INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate  WHERE tbl_products.id_prd IN (?)
    - UPDATE `tbl_products` SET so_luot_xem = so_luot_xem + 1 WHERE `tbl_products`.id_prd = ?
    - SELECT * FROM `tbl_products`
        INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
        WHERE `tbl_categories`.name_cate LIKE '%$name%'
    - SELECT * FROM `tbl_products` WHERE tbl_products.name_prd LIKE '%$key%'
    - SELECT * FROM `tbl_products`ORDER BY price DESC
    - SELECT * FROM `tbl_products` ORDER BY price ASC
    - SELECT * FROM `tbl_products` WHERE price BETWEEN 1000000 AND 20000000
    - SELECT * FROM `tbl_products` ORDER BY name_prd DESC
    - SELECT * FROM `tbl_products` ORDER BY name_prd ASC
    - SELECT * FROM `tbl_products`
        INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
        WHERE `tbl_categories`.name_cate LIKE '%$key%'
        ORDER BY `tbl_products`.price DESC
    - SELECT * FROM `tbl_products`
        INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
        WHERE `tbl_categories`.name_cate LIKE '%$key%'
        ORDER BY `tbl_products`.price ASC
    - SELECT * FROM `tbl_products`
        INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
        WHERE `tbl_categories`.name_cate LIKE '%$key%'
        AND `tbl_products`.price BETWEEN $min_price AND $max_price
    - SELECT * FROM `tbl_products`
        INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
        WHERE `tbl_categories`.name_cate LIKE '%$key%'
        ORDER BY `tbl_products`.name_prd DESC
    - SELECT * FROM `tbl_products`
        INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
        WHERE `tbl_categories`.name_cate LIKE '%$key%'
        ORDER BY `tbl_products`.name_prd ASC
3. User
    - SELECT * FROM `tbl_user`
    - INSERT INTO `tbl_user`  SET `username` = ?, `name` = ?, `email` = ?,`password` = ?, `image` = ?,`active` = ?, `vaitro` = ?
    - UPDATE `tbl_user` SET `username` = ?, `name` = ?, `email` = ?, `image` = ?,`active` = ?, `vaitro` = ? WHERE ID = ?
    - DELETE FROM `tbl_user` WHERE ID = ?
    - SELECT * FROM `tbl_user` WHERE ID = ?
    - SELECT * FROM `tbl_user` WHERE username = ?
    - SELECT * FROM `tbl_user` WHERE email = ?
4. Comment
    - SELECT * FROM `tbl_comments`
    - SELECT `tbl_products`.id_prd, `tbl_products`.name_prd,
        COUNT(*) so_luong,
        MIN(`tbl_comments`.time) cu_nhat,
        MAX(`tbl_comments`.time) moi_nhat
        FROM tbl_comments 
        INNER JOIN tbl_products ON tbl_products.id_prd = tbl_comments.ID_Product
        GROUP BY `tbl_products`.id_prd, `tbl_products`.name_prd
        HAVING so_luong > 0
    - INSERT INTO `tbl_comments` SET `ID_Product` = ?, `ID_User` = ?, `time` = ?, `content` = ?
    - DELETE FROM `tbl_comments` WHERE id_cmt = ?
    - SELECT 
        `tbl_user`.name,
        `tbl_user`.image,
        `tbl_user`.username,
        `tbl_products`.name_prd,
        `tbl_products`.id_prd,
        `tbl_comments`.*
        FROM `tbl_comments`
        INNER JOIN `tbl_products` ON `tbl_products`.id_prd = `tbl_comments`.ID_Product
        INNER JOIN `tbl_user` ON `tbl_user`.ID = `tbl_comments`.ID_User 
        WHERE tbl_comments.ID_Product = ?
        ORDER BY `tbl_comments`.id_cmt DESC
5. Statisticals
    - SELECT 
        `tbl_categories`.id_cate,
        `tbl_categories`.name_cate,
        COUNT(*) so_luong,
        MIN(`tbl_products`.price) price_min,
        MAX(`tbl_products`.price) price_max,
        AVG(`tbl_products`.price) price_avg
        FROM tbl_products 
        INNER JOIN tbl_categories ON tbl_categories.id_cate = tbl_products.ID_Cate
        GROUP BY `tbl_categories`.id_cate, `tbl_categories`.name_cate
6. Orders
    - SELECT * FROM `tbl_order_detail`,`tbl_orders`,`tbl_custromer`,tbl_products
        WHERE `tbl_order_detail`.order_code = `tbl_orders`.order_code
        AND `tbl_order_detail`.product_id = `tbl_products`.id_prd
        AND `tbl_orders`.id_customer = `tbl_custromer`.id_customer
    - SELECT * FROM `tbl_orders`,`tbl_custromer`
        WHERE `tbl_orders`.id_customer = `tbl_custromer`.id_customer
        AND `tbl_order_detail`.product_id = `tbl_products`.id_prd
        AND `tbl_custromer`.id_customer = ?
    - SELECT * FROM `tbl_order_detail`,`tbl_orders`,`tbl_custromer`,tbl_products
        WHERE `tbl_order_detail`.order_code = `tbl_orders`.order_code
        AND `tbl_order_detail`.product_id = `tbl_products`.id_prd
        AND `tbl_orders`.id_customer = `tbl_custromer`.id_customer
        AND `tbl_custromer`.id_customer = ?
    - INSERT INTO `tbl_orders` SET
        `order_code`    = ?, 
        `order_date`    = ?, 
        `order_status`  = ?, 
        `order_pay`     = ?, 
        `order_method`  = ?,
        `total`         = ?
    - INSERT INTO `tbl_order_detail` SET
        `order_code`        = ?, 
        `product_id`        = ?, 
        `product_quantity`  = ?
    - INSERT INTO `tbl_custromer` SET
        `name`              = ?, 
        `email`             = ?, 
        `phone`             = ?, 
        `address`           = ?, 
        `address_detail`    = ?, 
        `message`           = ?, 
        `order_code`        = ?
7. Blogs
    - SELECT * FROM `tbl_blogs`
        INNER JOIN `tbl_user` ON `tbl_blogs`.`user_post` = `tbl_user`.ID
        INNER JOIN `tbl_categories` ON `tbl_blogs`.`id_category` = `tbl_categories`.id_cate
    - INSERT INTO `tbl_blogs` SET 
        `user_post`   = ? ,
        `time_post`   = ? ,
        `title`       = ? ,
        `content`     = ? ,
        `quote`       = ? ,
        `image`       = ? ,
        `id_category` = ? 
    - UPDATE `tbl_blogs` SET 
        `user_post`   = ? ,
        `time_post`   = ? ,
        `title`       = ? ,
        `content`     = ? ,
        `quote`       = ? ,
        `image`       = ? ,
        `id_category` = ?  
        WHERE id_blog = ? 
    - DELETE FROM `tbl_blogs` WHERE id_blog = ?
    - SELECT * FROM `tbl_blogs` WHERE id_blog = ?