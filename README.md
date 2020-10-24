## Your Pills

### Instalación

Debes tener una base de datos creada en mysql llamada `yourpills`, posteriormente debes ejecutar el comando `php artisan migrate` para la creación de la tabla.

La base de datos tiene este formato: 
```SQL
CREATE TABLE `yourpills`.`medicamento`(
    `ID` INT NOT NULL AUTO_INCREMENT,
    `Nombre` VARCHAR(255) NOT NULL,
    `Cantidad` INT NOT NULL,
    `Dias` INT NOT NULL,
    `Franja_Horas` INT NOT NULL,
PRIMARY KEY (`ID`));
```