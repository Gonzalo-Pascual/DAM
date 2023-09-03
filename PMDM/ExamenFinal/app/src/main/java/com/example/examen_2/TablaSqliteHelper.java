package com.example.examen_2;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class TablaSqliteHelper extends SQLiteOpenHelper {
    String sqlCreate = "CREATE TABLE Tabla " + "(_id INTEGER PRIMARY KEY AUTOINCREMENT, " +
            " nombre TEXT, " + " fecha TEXT)";


    public TablaSqliteHelper(Context contexto, String nombre, SQLiteDatabase.CursorFactory factory, int version) {
        super(contexto, nombre, factory, version);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(sqlCreate);
        //se rellena la tabla con versiones de Android

        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Apple Pie" + "', '" + "2008" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Banana" + "', '" + "2009" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Cupcake" + "', '" + "2008" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Donut" + "', '" + "2009" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Eclair" + "', '" + "2009" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Froyo" + "', '" + "2010" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Gingerbread" + "', '" + "2010" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Honeycomb2" + "', '" + "2011" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Ice Cream Sandwich" + "', '" + "2011" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Jelly Bean" + "', '" + "2012" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "KitKat" + "', '" + "2013" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Lollipop" + "', '" + "2014" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Marshmallow" + "', '" + "2015" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Nougat" + "', '" + "2016" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Oreo" + "', '" + "2017" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Pie" + "', '" + "2018" + "')");
        db.execSQL("INSERT INTO Tabla (nombre, fecha)" + "VALUES ('" + "Android 10" + "', '" + "2019" + "')");
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int versionAnterior, int versionNueva) {
        db.execSQL("DROP TABLE IF EXISTS Tabla");
        db.execSQL(sqlCreate);
    }
}
