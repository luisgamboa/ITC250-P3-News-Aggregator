create table p3_Categories(
	CategoryKey int not null auto_increment,
	CategoryName nvarchar(255) not null,
        Primary Key (CategoryKey)
);
create table p3_Feed(
	FeedKey int not null auto_increment,
        CategoryKey int not null,
        name nvarchar(255) not null,
        description nvarchar(255) not null,
	url nvarchar(255) not null,
        Primary Key (FeedKey),
	Foreign Key (CategoryKey) references p3_Categories(CategoryKey)
);
insert into p3_Categories (CategoryName)
values('Sports'), ('Entertainment'), ('Science');

#NOTE: if you put all of this into adminer, it should work