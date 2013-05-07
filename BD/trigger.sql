 DELIMITER |
 CREATE TRIGGER update_total_cantidad AFTER INSERT ON ejemplares
	FOR EACH ROW
		BEGIN  
			update textos set cantidad_total = cantidad_total + 1 where textos.id = new.texto_id;
		END
|