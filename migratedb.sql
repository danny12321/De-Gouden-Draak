START TRANSACTION;

INSERT INTO dev_gouden_draak.menuitem_types (type) SELECT distinct soortgerecht from gouden_draak.menu;
INSERT INTO dev_gouden_draak.menuitems (menunumber, name, price,description,specialty, menuitem_type_id) SELECT CONCAT_WS('', m.menunummer, m.menu_toevoeging), m.naam, CAST(m.price AS DECIMAL(6,2)), m.beschrijving, false, (select id from dev_gouden_draak.menuitem_types mt WHERE mt.type = soortgerecht) FROM gouden_draak.menu m;

COMMIT;