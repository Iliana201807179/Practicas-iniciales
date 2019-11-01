create database if not exists Ventas;
use Ventas;

create table Producto(
idProducto int not null auto_increment primary key,
Nombre varchar(45) not null,
Precio int not null
);
alter table DetalleFactura add idDetalle_Factura int not null primary key auto_increment;
alter table DetalleFactura add constraint fk_idProducto foreign key (idProducto) references Producto(idProdu cto) on delete restrict on update cascade;
alter table DetalleFactura drop column idDetalle_Factura;

create table Vendedor(
Codigo int auto_increment primary key,
Nombre Varchar(100) not null,
Telefono int not null
);

create table Factura(
NoFactura int auto_increment primary key,
Nombre varchar(45) not null,
Nit int not null,
Fecha datetime not null
);

alter table Factura add Vendedor_Codigo int not null;
alter table Factura add constraint fk_Vendedor_Codigo foreign key (Vendedor_Codigo) references Vendedor(Codigo) on delete restrict on update cascade;

create table DetalleFactura(
Cantidad int not null,
Subtotal int not null

);
alter table DetalleFactura add Factura_NoFactura int not null;
alter table DetalleFactura add constraint fk_Factura_NoFactura foreign key (Factura_NoFactura) references Factura(NoFactura ) on delete restrict on update cascade;
alter table DetalleFactura  add Id_Producto int not null;
