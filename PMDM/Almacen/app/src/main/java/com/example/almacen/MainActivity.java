package com.example.almacen;

import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {
    private TextView texto;
    private int cont;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        texto = (TextView)findViewById(R.id.texto);
        SharedPreferences prefe = getSharedPreferences("preferencias", Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = prefe.edit();
        cont = prefe.getInt("Contador", 1);
        texto.setText("Se ha abierto " + String.valueOf(cont) + " veces");
        editor.putInt("Contador", ++cont);
        editor.commit();
    }
}