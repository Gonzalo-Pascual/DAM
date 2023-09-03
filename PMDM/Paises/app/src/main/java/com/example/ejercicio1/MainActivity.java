package com.example.ejercicio1;

import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;



public class MainActivity extends Activity{

    private ListView listview;
    private TextView textView;
    private  String[] paises={"Alemania", "Andorra","Austria","España","Francia","Italia","Portugal","Reino Unido","Rusia","San Marino","Suiza","Vaticano"};
    private  String[] habitantes={"81.861.000", "77.000","8.457.000", "47.244.000","63.604.000","59.649.000","10.588.000" ,"63.214.000","143.184.000","32.000","7.986.000","800"};



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        textView = (TextView) findViewById(R.id.poblacion);
        listview = (ListView) findViewById(R.id.listapaises);
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,R.layout.formato_lista, paises);
        listview.setAdapter(adapter);
        listview.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View v, int posicion, long id) {
                textView.setText("La población de "+ listview.getItemAtPosition(posicion) + " es de "+ habitantes[posicion] + " habitantes.");
            }
        });
    }

    }

