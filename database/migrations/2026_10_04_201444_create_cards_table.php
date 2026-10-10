<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->string('card_id')->primary();

            $table->string('name');
            $table->string('manufacturer')->nullable();
            $table->string('namemaufacturer_short')->nullable();

            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('signetta')->nullable();

            $table->unsignedSmallInteger('year')->nullable();
            $table->integer('card_count')->nullable();
            $table->integer('joker')->nullable();
            $table->integer('extra_cards')->nullable();

            $table->string('suit')->nullable();
            $table->string('index')->nullable();
            $table->string('size')->nullable();

            $table->string('type1')->nullable();
            $table->string('type2')->nullable();

            $table->string('cover_image')->nullable();

            $table->timestamps();
        });

        $columns = [
            'card_id',
            'name',
            'manufacturer',
            'namemaufacturer_short',
            'city',
            'country',
            'signetta',
            'year',
            'card_count',
            'joker',
            'extra_cards',
            'suit',
            'index',
            'size',
            'type1',
            'type2',
            'cover_image',
        ];

        $rows = [
            ['F 00146','Cartes Imperiales','Carta Mundi','CM','Turnhout','Belgium',null,1995,52,2,2,'francia',null,'59 x 91 mm','nem hagyományos','Whist','F_00146.jpg'],
            ['F 00324','Jeu Louis XV','B. P. Grimaud','Grimaud','Párizs','Franciaország','1890-1917 francia',1895,52,0,1,'francia','francia','60 x 92 mm','nem hagyományos','Whist','F_00324.jpg'],
            ['F 00357','Nemzeti Póker','Piatnik Nándor és fiai RT','Piatnik','Budapest','Magyarország','1932-1943 magyar',1936,104,4,2,'francia','német','63 x 92 mm','nem hagyományos','Römi','F_00357.jpg'],
            ['F 01032','Angol-amerikai kártyakép','Thomas De La Rue & Co.','De La Rue','London','Egyesült Királyság',null,1897,52,0,0,'francia','angol','62 x 90 mm','hagyományos','Whist','F_01032.jpg'],
            ['F 02038','Berlini kártyakép','Frommann & Bünte','Frommann','Darmstadt','Németország','1896-1903 német',1900,32,0,0,'francia',null,'60 x 93 mm','hagyományos','Skat','F_02038.jpg'],
            ['F 03017','Bécsi kártyakép (NK)','Piatnik Nándor és fiai','Piatnik','Budapest','Magyarország','1883-1905 magyar',1898,52,0,0,'francia',null,'64 x 96 mm','hagyományos','Whist','F_03017.jpg'],
            ['F 04029','Párizsi kártyakép 1816 Liliom','Ismretlen','Ismeretlen','Ismeretlen','Franciaország',null,1825,36,0,0,'francia',null,'54 x 84 mm','hagyományos','Piquet','F_04029.jpg'],
            ['F 05017','Dondorf rajnai kártyakép','B. Dondorf','Dondorf','Frankfurt','Németország','1890-1918 dán',1895,40,0,0,'francia','német','62 x 91 mm','hagyományos','L’hombre','F_05017.jpg'],
            ['F 06006','Holland kártyakép','Carta Mundi','CM','Turnhout','Belgium',null,1990,52,3,1,'francia','holland','56 x 87 mm','hagyományos','Whist','F_06006.jpg'],
            ['F 07002','Svéd kártyakép','J. O. Öberg & Son AB','Öberg','Eskiltuna','Svédország','1872-1960 svéd',1939,52,1,1,'francia','svéd','61 x 89 mm','hagyományos','Whist','F_07002.jpg'],
            ['F 08004','Dán kártyakép','Handa Spillekort','Handa','Koppenhága','Dánia',null,1956,52,1,0,'francia','dán','62 x 91 mm','hagyományos','Whist','F_08004.jpg'],
            ['F 09002','Orosz kártyakép','Ленинградский комбинат цветной печати','ГКМ','Szentpétervár','Oroszország',null,1990,52,2,1,'francia','orosz','58 x 90 mm','hagyományos','Whist','F_09002.jpg'],
            ['F 10010','Modern svájci kártyakép','J. Müller & Cie','Müller','Schaffhausen','Svájc','1920-1960 svájci Neuchâtel',1925,36,0,0,'francia',null,'54 x 85 mm','hagyományos','Piquet','F_10010.jpg'],
            ['F 11037','Belga/genovai kártyakép','Játékkártyagyár és Nyomda','Játékkártyagyár','Budapest','Magyarország',null,1970,52,2,0,'francia','angol','56 x 87 mm','hagyományos','Whist','F_11037.jpg'],
            ['F 12006','Piemonti kártyakép','Modiano S. p. A.','Modiano','Trieszt','Olaszország','1954-1972 olasz',1965,52,2,0,'francia',null,'54 x 83 mm','hagyományos','Whist','F_12006.jpg'],
            ['F 13011','Milánói kártyakép 1947','Dal Negro','Dal Negro','Treviso','Olaszország','1945-1947 olasz',1947,40,0,0,'francia',null,'51 x 94 mm','hagyományos','Scopa','F_13011.jpg'],
            ['F 14002','Toszkán kártyaké','Modiano','Modiano','Trieszt','Olaszország',null,1995,40,0,2,'francia',null,'67 x 101 mm','hagyományos','Scopa','F_14002.jpg'],
            ['F 20001','Darling','Bielefelder Spielkarten Fabrik GmbH','Joker','Bielefeld','Németország',null,1960,52,2,0,'francia','angol','60 x 91 mm','nem hagyományos','Pin-up','F_20001.jpg'],
            ['F 20020','Casanova','Editions Philibert','Philibert','Párizs','Franciaország',null,1960,52,2,1,'francia','angol/francia','63 x 95 mm','nem hagyományos','Pin-up','F_20020.jpg'],
            ['F 30008','Vallásellenes kártya','Государственная Карточная Монополия','ГКМ','Moszkva','Oroszország',null,1931,52,1,0,'francia','orosz','58 x 89 mm','nem hagyományos','Politikai kártya','F_30014.jpg'],
            ['F 30010',"Deakin's Political",'W. H. Willis & Co.','Willis','London','Egyesült Királyság',null,1886,32,0,0,'francia','angol','66 x 90 mm','nem hagyományos','Politikai kártya','F_30010.jpg'],
            ['F 40022','Baraja Taurina','Heraclio Fournier','Fournier','Vitoria','Spanyolország','1939-1956 spanyol',1951,52,2,0,'francia','angol','61 x 95 mm','nem hagyományos','Whist','F_40022.jpg'],
            ['L 06004','Aluette','B. P. Grimaud','Grimaud','Párizs','Franciaország','1890-1917 francia',1900,48,0,0,'latin',null,'56 x 86 mm','hagyományos','Aluette','L_06004.jpg'],
            ['L 17008','Trieszti kártyakép','Modiano S.A.I.C.','Modiano','Trieszt','Olaszország','1948-1954 olasz',1951,40,0,0,'latin','számozott','53 x 97 mm','hagyományos','Triestine','L_17008.jpg'],
            ['N 00028','Tell-kártya (IV.változat)','Játékkártyagyár és Nyomda','Játékkártyagyár','Budapest','Magyarország',null,1970,32,0,1,'német',null,'60 x 100 mm','hagyományos','Magyar kártya','N_00028.jpg'],
            ['N 00050','Tell-kártya (III. változat)','Ferdinand Piatnik & Söhne','Piatnik','Bécs','Ausztria',null,2006,32,0,1,'német',null,'63 x 100 mm','hagyományos','Magyar kártya','N_00050.jpg'],
            ['N 12040','Muenchner Jugend','Vereinigte Stralsunder Spielkartenfabriken AG','VSS','Stralsund','Németország','1903-1918 német',1898,36,0,0,'német',null,'67 x 119 mm','nem hagyományos','Schafkopf Tarock','N_12040.jpg'],
            ['P 00149','Rococo','Ferdinand Piatnik & Söhne','Piatnik','Bécs','Ausztria','1900-1920 osztrák',1910,104,0,0,'francia',null,'44 x 68 mm','nem hagyományos','Pasziánsz','P_00149.jpg'],
            ['P 00159','Hollandaises','B. P. Grimaud','Grimaud','Párizs','Franciaország','1922-1940 francia',1930,52,0,0,'francia','francia','31 x 44 mm','nem hagyományos','Mini kártya','P_00159.jpg'],
            ['P 00166','Baronesse','B. Dondorf GmbH','Dondorf','Frankfurt','Németország','1918-1940 dán',1925,52,1,0,'francia','német','43 x 65 mm','nem hagyományos','Pasziánsz','P_00166.jpg'],
            ['Q 00002','Wappen quartett','B. Dondorf','Dondorf','Frankfurt','Németország',null,1900,48,0,0,null,null,'56 x 90 mm','nem hagyományos','Kvartett','Q_00002.jpg'],
            ['S 00024','Deutschschweizer jass','J. Müller & Cie','Müller','Schaffhausen','Svájc',null,1921,36,0,0,'svájci','német','59 x 91 mm','hagyományos','Jass','S_00024.jpg'],
        ];

        $now = now();
        $data = [];

        foreach ($rows as $row) {
            $data[] = array_merge(
                array_combine($columns, $row),
                [
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }

        DB::table('cards')->insert($data);
    }

    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
