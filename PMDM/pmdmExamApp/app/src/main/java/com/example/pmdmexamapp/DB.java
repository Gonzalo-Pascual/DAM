package com.example.pmdmexamapp;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DB extends SQLiteOpenHelper {
    String crear = "CREATE TABLE android (id INTEGER PRIMARY KEY AUTOINCREMENT, nombre TEXT, version TEXT)";
    String datos = "INSERT INTO android (nombre, version) VALUES ('Cupcake', '1.5'), ('Donut', '1.6'), ('Eclair', '2.0'), ('Froyo', '2.2'), ('Gingerbread', '2.3'), ('Honeycomb', '3.0'), ('Ice Cream Sandwich', '4.0'), ('Jelly Bean', '4.1'), ('KitKat', '4.4'), ('Lollipop', '5.0'), ('Marshmallow', '6.0'), ('Nougat', '7.0'), ('Oreo', '8.0'), ('Pie', '9.0');";
    public DB(Context context, String name, SQLiteDatabase.CursorFactory factory, int version) {
        super(context, name, factory, version);
    }
    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(crear);
        db.execSQL(datos);
    }
    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXISTS android");
        db.execSQL(crear);
        db.execSQL(datos);
    }

}
