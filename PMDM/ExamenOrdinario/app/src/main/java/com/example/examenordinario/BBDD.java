package com.example.examenordinario;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import androidx.annotation.Nullable;

public class BBDD extends SQLiteOpenHelper {

    //Creación de la base de datos
    String almacen = "create table Personas(" + "_id  integer primary key autoincrement," + "nombre text," + "apellido1 text," + "apellido2 text," + "direccion text,"+"telefono text)" ;

    //Constructor
    public BBDD(@Nullable Context context, @Nullable String name, @Nullable SQLiteDatabase.CursorFactory factory, int version) {
        super(context, name, factory, version);
    }

    @Override
    public void onCreate(SQLiteDatabase db)
    {
        db.execSQL(almacen);

    }


    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion)
    {
        db.execSQL("DROP TABLE IF EXISTS Personas");
        db.execSQL(almacen);
    }
}