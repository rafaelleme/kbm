CREATE TABLE IF NOT EXISTS addresses (
	id varchar(36) primary key not null,
	client_id varchar(36) not null,
	street varchar(255) not null,
	number varchar(255) not null,
	complement varchar(255) null,
	neighborhood varchar(255) not null,
	zip_code varchar(9) not null,
	city varchar(255) not null,
	state varchar(255) not null,
	created_at datetime not null,
	updated_at datetime not null,
	deleted_at datetime,
	FOREIGN KEY (client_id)
        REFERENCES clients(id)
        ON DELETE CASCADE
)
