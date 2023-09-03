package com.example.examenordinario;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
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

public class MainActivity extends AppCompatActivity {

    //variables que vamos a utilizar
    SQLiteDatabase db;
    private BBDD almacen;
    private EditText nombre, apellido1, apellido2, direccion, telefono;
    private Button mostrar, añadir;
    private String indice;
    private int seleccionado;
    SimpleCursorAdapter adaptador;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        //Creamos los elementos del activity_main
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        añadir = findViewById(R.id.añadir);
        mostrar = findViewById(R.id.mostrar);
        nombre = findViewById(R.id.nombre);
        apellido1 = findViewById(R.id.apellido1);
        apellido2 = findViewById(R.id.apellido2);
        direccion = findViewById(R.id.direccion);
        telefono = findViewById(R.id.telefono);


        //Llamada al botón añadir para que realice el método de abajo
        añadir.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                añadir();
            }
        });
    }

    //Método onResume
    protected void onResume()
    {
        super.onResume();
        almacen = new BBDD(this, "Datos", null, 1);
        db = almacen.getWritableDatabase();
    }

    //Método onPause
    protected void onPause()
    {
        super.onPause();

        db.close();
        almacen.close();
    }

    //Método para añadir la persona
    public void añadir() {
        if(db != null)
        {
            if(comprobarDatos())
            {
                try
                {
                    db.execSQL("insert into Personas( nombre, apellido1, apellido2, direccion, telefono) values ( '" + nombre.getText().toString() + "', '" + apellido1.getText().toString() + "','" + apellido2.getText().toString() + "','" + direccion.getText().toString() + "', '" + telefono.getText().toString() + "');");
                    Toast.makeText(this, "Dato añadido", Toast.LENGTH_LONG).show();
                    nombre.setText("");
                    apellido1.setText("");
                    apellido2.setText("");
                    direccion.setText("");
                    telefono.setText("");

                }
                catch(SQLiteConstraintException e) {
                    Toast.makeText(this, "No se ha podido añadir", Toast.LENGTH_LONG).show();
                }
            }
            else
            {
                Toast.makeText(this, "La persona no existe", Toast.LENGTH_LONG).show();
            }
        }
        else
        {
            Toast.makeText(this, "No se pudo acceder a la base de datos", Toast.LENGTH_LONG).show();
        }
    }

    //Validaciones para asegurarnos de que no se introducen campos vacios
    public boolean comprobarDatos()
    {
        if(nombre.getText().toString().isEmpty())
        {
            Toast.makeText(this, "Introduce el nombre", Toast.LENGTH_LONG).show();
            return false;
        }

        if(apellido1.getText().toString().isEmpty())
        {
            Toast.makeText(this, "Introduce el primer apellido", Toast.LENGTH_LONG).show();
            return false;
        }

        if(apellido2.getText().toString().isEmpty())
        {
            Toast.makeText(this, "Introduce el segundo", Toast.LENGTH_LONG).show();
            return false;
        }

        if(direccion.getText().toString().isEmpty())
        {
            Toast.makeText(this, "Introduce la direccion", Toast.LENGTH_LONG).show();
            return false;
        }

        if(telefono.getText().toString().isEmpty())
        {
            Toast.makeText(this, "Introduce el telefono", Toast.LENGTH_LONG).show();
            return false;
        }

        return true;
    }


    //Llamada al metodo mostrar mediante el Onclick del activity_main en su boton
    public void mostrar(View view)
    {
        Intent i = new Intent(this, mostrar.class);
        startActivity(i);
    }


}