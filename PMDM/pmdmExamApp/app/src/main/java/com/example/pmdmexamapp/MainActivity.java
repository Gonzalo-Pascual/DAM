//@Author: Sergio Fernández Fernández
//@Date: 16/02/2023
package com.example.pmdmexamapp;

import androidx.appcompat.app.AppCompatActivity;

import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.widget.Button;
import android.widget.EditText;
import android.widget.GridView;
import android.widget.ListAdapter;
import android.widget.Toast;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {
    Button btnAdd, btnUpdate, btnDelete;
    EditText textName, textVersion;
    GridView gridView;
    DB ddbb;
    SQLiteDatabase db;
    ArrayList<Androidversion> androidversions;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        btnAdd = findViewById(R.id.addButton);
        btnUpdate = findViewById(R.id.showButton);
        btnDelete = findViewById(R.id.deleteButton);
        textName = findViewById(R.id.textVersionName);
        textVersion = findViewById(R.id.textVersionCode);
        gridView = findViewById(R.id.gridView);
        androidversions = new ArrayList<>();
        ddbb = new DB(this, "android", null, 1);

        btnDelete.setEnabled(false);
        btnAdd.setEnabled(false);

        btnUpdate.setOnClickListener(v -> {
            cargarDatos();
            btnAdd.setEnabled(true);
        });

        btnAdd.setOnClickListener(v -> {
            if (btnAdd.getText().toString().equals("Limpiar")) {
                textName.setText("");
                textVersion.setText("");
                btnAdd.setText("Añadir");
                btnDelete.setEnabled(false);
                textName.setEnabled(true);
                textVersion.setEnabled(true);
            } else {
                if (textName.getText().toString().equals("") || textVersion.getText().toString().equals("")) {
                    Toast.makeText(this, "Rellena todos los campos", Toast.LENGTH_SHORT).show();
                    return;
                }
                if (addRegistro(textName.getText().toString(), textVersion.getText().toString())) {
                    Toast.makeText(this, "Registro añadido", Toast.LENGTH_SHORT).show();
                } else {
                    Toast.makeText(this, "Ya existe un registro con esa versión", Toast.LENGTH_SHORT).show();
                }
                cargarDatos();
            }
        });

        btnDelete.setOnClickListener(v -> {
            deleteRegistro(textVersion.getText().toString());
            cargarDatos();
            textName.setText("");
            textVersion.setText("");
            btnDelete.setEnabled(false);
            textName.setEnabled(true);
            textVersion.setEnabled(true);
            btnAdd.setText("Añadir");
        });

        gridView.setOnItemClickListener((parent, view, position, id) -> {
            textName.setText(androidversions.get(position).getName());
            textVersion.setText(androidversions.get(position).getVersion());
            btnDelete.setEnabled(true);
            textName.setEnabled(false);
            textVersion.setEnabled(false);
            btnAdd.setText("Limpiar");
        });

    }

    public void cargarDatos() {
        androidversions.clear();
        db = ddbb.getWritableDatabase();
        Cursor cursor = db.rawQuery("SELECT * FROM android", null);
        if (cursor.moveToFirst()) {
            do {
                androidversions.add(new Androidversion(cursor.getString(1), cursor.getString(2)));
            } while (cursor.moveToNext());
        }
        cursor.close();
        db.close();
        ListAdapter adapter = new GridViewAdapter(this, androidversions);
        gridView.setAdapter(adapter);
    }

    public boolean addRegistro(String nombre, String version) {
        db = ddbb.getWritableDatabase();
        if (db.rawQuery("SELECT * FROM android WHERE version = '" + version + "'", null).moveToFirst()) return false;

        db.execSQL("INSERT INTO android (nombre, version) VALUES ('" + nombre + "', '" + version + "')");
        db.close();
        return true;
    }

    public void deleteRegistro(String version) {
        db = ddbb.getWritableDatabase();
        db.execSQL("DELETE FROM android WHERE version = '" + version + "'");
        db.close();
    }
}