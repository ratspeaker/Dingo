-----------------------------------------------------------------
-- POVEZIVANJE NA BAZU
-----------------------------------------------------------------


connect to dingo;


-----------------------------------------------------------------
-- RESTORAN
-----------------------------------------------------------------


create table restoran (

    id_restorana int not null generated always as identity (start with 1 increment by 1) primary key,
    naziv_restorana varchar(40) not null,
    ukupan_broj_stolova int not null,
    grad varchar(40) not null,
    adresa varchar(40) not null

);


-----------------------------------------------------------------
-- KORISNIK
-----------------------------------------------------------------


create table korisnik (

    id_korisnika int not null generated always as identity (start with 1 increment by 1) primary key,
    ime varchar(40) not null,
    prezime varchar(40) not null,
    broj_mobilnog varchar(40) not null,
    gmail varchar(40) not null

);


-----------------------------------------------------------------
-- REZERVACIJA
-----------------------------------------------------------------


create table rezervacija (
    
    id_rezervacije bigint not null generated always as identity (start with 1 increment by 1) primary key,
    id_restorana int not null,
    id_korisnika int not null,
    sat int not null constraint chk_sat check (sat between 0 and 24),
    datum date not null,
    broj_mesta int not null default 4,
    
    foreign key fk_rezervacija_restoran (id_restorana)
        references restoran,
    foreign key fk_rezervacija_korisnik (id_korisnika)
        references korisnik
);


-----------------------------------------------------------------
-- VRSTA HRANE
-----------------------------------------------------------------

create table vrsta_hrane (

    vrsta_hrane varchar(40) not null,
    id_restorana int not null,

    foreign key fk_vrsta_hrane_restoran (id_restorana)
        references restoran(id_restorana)
);
