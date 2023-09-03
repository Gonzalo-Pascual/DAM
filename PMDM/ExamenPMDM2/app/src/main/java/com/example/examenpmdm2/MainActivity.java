package com.example.examenpmdm2;


import static android.widget.Toast.LENGTH_SHORT;

import android.annotation.SuppressLint;
import android.content.ContentUris;
import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteConstraintException;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.GridView;
import android.widget.SimpleCursorAdapter;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {

    private BaseDatos datos;
    private SQLiteDatabase db;
    private EditText version, anio;
    private Button mostrar, añadir, eliminar;
    private GridView grid;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        version = findViewById(R.id.version);
        anio = findViewById(R.id.anio);
        añadir = findViewById(R.id.añadir);
        mostrar = findViewById(R.id.mostrar);
        eliminar = findViewById(R.id.eliminar);
        grid = findViewById(R.id.grid);
    }

    protected void onResume()
    {
        super.onResume();

        datos = new BaseDatos(this, "Datos", null, 1);
        db = datos.getWritableDatabase();
    }

    protected void onPause()
    {
        super.onPause();

        db.close();
        datos.close();
    }

    public void addAlumno(View view)
    {
        if(db != null)
        {
            if(comprobarDatos())
            {
                try
                {
                    db.execSQL("insert into Alumnos(NumMat, Nombre) values ('" + etMatri.getText().toString() + "', '" + etNombre.getText().toString() + "');");
                    Toast.makeText(this, "Alumno añadido", Toast.LENGTH_LONG).show();
                }
                catch(SQLiteConstraintException e)
                {
                    Toast.makeText(this, "El alumno ya existe", Toast.LENGTH_LONG).show();
                }
            }
        }
        else
        {
            Toast.makeText(this, "No se pudo acceder a la base de datos", Toast.LENGTH_LONG).show();
        }
    }

    public boolean comprobarDatos()
    {
        if(etMatri.getText().toString().isEmpty())
        {
            Toast.makeText(this, "Introduce un Nº de matrícula", Toast.LENGTH_LONG).show();
            return false;
        }

        if(etNombre.getText().toString().isEmpty())
        {
            Toast.makeText(this, "Introduce un nombre", Toast.LENGTH_LONG).show();
            return false;

        }

        return true;
    }


}

