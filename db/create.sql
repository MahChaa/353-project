create table TableMany
(
    many_id     int auto_increment
        primary key,
    test_id     int  null,
    luresubject text not null,
    constraint TableMany_Test_test_id_fk
        foreign key (test_id) references test (test_id)
);

create table Test
(
    test_id   int auto_increment
        primary key,
    test_int  int default 3 null,
    test_str  text          null,
    test_date datetime      null
);