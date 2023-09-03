package com.example.examenordinario;


import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.GridView;
import android.widget.SimpleCursorAdapter;
import androidx.appcompat.app.AppCompatActivity;

public class mostrar extends AppCompatActivity {
    //variables que vamos a utilizar
    SimpleCursorAdapter adaptador;
    String[] from;
    int[] to;
    Cursor miCursor;
    SQLiteDatabase db;
    private BBDD almacen;
    private EditText nombre, apellido1, apellido2, direccion, telefono;
    private Button mostrar, editar, eliminar;
    private GridView grid;
    private String indice;
    private int seleccionado;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        //Método onCreate con la asignación de las variables anteriores a los elementos del layout
        super.onCreate(savedInstanceState);
        setContentView(R.layout.mostrar);
        grid = findViewById(R.id.grid);
        editar = findViewById(R.id.editar);
        eliminar = findViewById(R.id.eliminar);
        mostrar = findViewById(R.id.mostrar);
        nombre = findViewById(R.id.nombre);
        apellido1 = findViewById(R.id.apellido1);
        apellido2 = findViewById(R.id.apellido2);
        direccion = findViewById(R.id.direccion);
        telefono = findViewById(R.id.telefono);


        //Método para seleccionar el elemento de la tabla de visualización
        grid.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                seleccionado = position;
                miCursor.moveToPosition(seleccionado);
                indice = miCursor.getString(0);
                nombre.setText(miCursor.getString(1));
                apellido1.setText(miCursor.getString(2));
                apellido2.setText(miCursor.getString(3));
                direccion.setText(miCursor.getString(4));
                telefono.setText(miCursor.getString(5));
            }
        });

        //Llamada al botón editar con el método editar
        editar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                editar();
            }
        });

        //Llamada al botón eliminar con el método eliminar
        eliminar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                eliminar();
            }
        });

        //Llamada al botón mostrar con el método mostrar
        mostrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                mostrar();
            }
        });

    }

    protected void onResume()
    {
        super.onResume();
        almacen = new BBDD(this, "Datos", null, 1);
        db = almacen.getWritableDatabase();
    }

    protected void onPause()
    {
        super.onPause();

        db.close();
        almacen.close();
    }

    //Método mostrar
    public void mostrar(){
        miCursor = db.rawQuery("Select * from Personas",null);
        from = new String[]{"nombre", "apellido1", "apellido2", "direccion", "telefono"};
        to = new int[]{android.R.id.text1, android.R.id.text2};
        startManagingCursor(miCursor);
        adaptador = new SimpleCursorAdapter(this, android.R.layout.simple_list_item_activated_2, miCursor, from, to, 0);
        adaptador.notifyDataSetChanged();
        grid.setAdapter(adaptador);
    }

    //Método eliminar
    private void eliminar(){
        String puntero = indice;
        String args[] ={puntero};
        db.delete("Personas", "_id=?", args);
        adaptador.notifyDataSetChanged();
        mostrar();
        nombre.setText("");
        apellido1.setText("");
        apellido2.setText("");
        direccion.setText("");
        telefono.setText("");
    }

    //Método editar
    private void editar(){
        String puntero = indice;
        String args[] ={puntero};
        db.execSQL("UPDATE Personas SET nombre='"+nombre.getText().toString()+"' WHERE _id='"+indice+"'");
        db.execSQL("UPDATE Personas SET apellido1='"+apellido1.getText().toString()+"' WHERE _id='"+indice+"'");
        db.execSQL("UPDATE Personas SET apellido2='"+apellido2.getText().toString()+"' WHERE _id='"+indice+"'");
        db.execSQL("UPDATE Personas SET direccion='"+direccion.getText().toString()+"' WHERE _id='"+indice+"'");
        db.execSQL("UPDATE Personas SET telefono='"+telefono.getText().toString()+"' WHERE _id='"+indice+"'");
        adaptador.notifyDataSetChanged();
        mostrar();
        nombre.setText("");
        apellido1.setText("");
        apellido2.setText("");
        direccion.setText("");
        telefono.setText("");
    }

}
