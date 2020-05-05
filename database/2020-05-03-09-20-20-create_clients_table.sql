CREATE TABLE IF NOT EXISTS clients (
	id varchar(36) primary key not null,
	name varchar(191) not null,
	birthday date not null,
	cpf varchar(14) unique not null,
	rg varchar(20) null,
	tel varchar(15) not null,
	created_at datetime not null,
	updated_at datetime not null,
	deleted_at datetime
)
