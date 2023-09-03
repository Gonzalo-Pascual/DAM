package com.example.examen_2;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.ContentResolver;
import android.content.ContentValues;
import android.content.DialogInterface;
import android.database.Cursor;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.GridView;
import android.widget.SimpleCursorAdapter;
import android.widget.Toast;
import android.database.sqlite.SQLiteDatabase;

public class MainActivity extends AppCompatActivity {

    Button boton1, boton2, boton3;
    GridView miLista;
    SimpleCursorAdapter adaptador;
    int seleccionado;
    String[] from;
    int[] to;
    Cursor miCursor;
    ContentResolver miResolver;
    EditText texto1, texto2;
    String indice, nombre1, nombre2,nombre,fecha;
    TablaSqliteHelper datos;
    SQLiteDatabase db;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        boton1 = (Button) findViewById(R.id.boton1);
        boton2 = (Button) findViewById(R.id.boton2);
        boton3 = (Button) findViewById(R.id.boton3);
        texto1 = (EditText) findViewById(R.id.texto1);
        texto2 = (EditText) findViewById(R.id.texto2);
        miLista = findViewById(R.id.griView);


        miLista.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                seleccionado = position;
                miCursor.moveToPosition(seleccionado);
                indice = miCursor.getString(0);
                texto1.setText(miCursor.getString(1));
                texto2.setText(miCursor.getString(2));
                Toast.makeText(getApplicationContext(), "SELECCIONADO REGISTRO CON ÍNDICE " + indice, Toast.LENGTH_SHORT).show();

            }
        });

        boton1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                muestra();
            }
        });

        boton2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                nombre1 = texto1.getText().toString();
                nombre2 = texto2.getText().toString();
                if (nombre1.length() == 0 || nombre2.length() == 0) {
                    Toast.makeText(getApplicationContext(), "NO PUEDE HABER CAMPOS VACIOS", Toast.LENGTH_SHORT).show();
                } else {
                    ContentValues misContent = new ContentValues();
                    misContent.put("nombre", nombre1);
                    misContent.put("fecha", nombre2);
                    ContentResolver miResolver = getContentResolver();

                    db.insert("tabla",null,misContent);
                    Toast.makeText(getApplicationContext(), "REGISTRO AÑADIDO", Toast.LENGTH_SHORT).show();
                    muestra();
                }
            }
        });

        boton3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                AlertDialog.Builder alerDialogBuilder = new AlertDialog.Builder(MainActivity.this);
                alerDialogBuilder
                        .setTitle("ACTIVIDAD CONTENT PROVIDER?")
                        .setMessage("¿Desea borrar este registro?")
                        .setNegativeButton("NO BORRAR", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                dialog.cancel();
                                Toast.makeText(getApplicationContext(), "REGISTRO NO BORRADO", Toast.LENGTH_SHORT).show();
                            }
                        })
                        .setPositiveButton("SI BORRAR", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                String puntero = indice;
                                String args[]={puntero};


                                Toast.makeText(getApplicationContext(), indice, Toast.LENGTH_SHORT).show();
                                db.delete("tabla","_id=?",args);
                                 adaptador.notifyDataSetChanged();
                                Toast.makeText(getApplicationContext(), "REGISTRO BORRADO ", Toast.LENGTH_SHORT).show();
                                muestra();
                            }
                        })
                        .create()
                        .show();
            }
        });

    }
    public void onResume()
    {
      super.onResume();
      datos= new TablaSqliteHelper(this,"Datos",null,4);
      db= datos.getWritableDatabase();
    }

    public void muestra() {

        miCursor = db.rawQuery("Select * from tabla",null);
        from = new String[]{"nombre", "fecha"};
        to = new int[]{android.R.id.text1, android.R.id.text2};
        startManagingCursor(miCursor);
        adaptador = new SimpleCursorAdapter(this, android.R.layout.simple_list_item_2, miCursor, from, to, 0);
        adaptador.notifyDataSetChanged();
        miLista.setAdapter(adaptador);
    }
}