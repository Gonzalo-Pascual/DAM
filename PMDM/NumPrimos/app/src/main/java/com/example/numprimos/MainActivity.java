package com.example.numprimos;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.GridView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
    private EditText etNumero;
    private GridView grid;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        etNumero = findViewById(R.id.etNumero);
        grid = findViewById(R.id.grid);


}

    public void Calcular(View v) {

        int numero = Integer.parseInt(etNumero.getText().toString());
        // Toast.makeText(this, "aqui viene el " + numero, Toast.LENGTH_SHORT).show();

        String numeroVeces[] = new String[numero];

        // numeroVeces = Integer.parseInt(String.valueOf(etNumero.getText().length()));

        for (int i = 0; i < numeroVeces.length ; i++) {
            if(esPrimo(i)){
                numeroVeces[i] = ""+i;
            }else{
                numeroVeces[i] = "";
            }
        }
        ArrayAdapter<String> adapter = new ArrayAdapter<>(this, android.R.layout.simple_list_item_1, numeroVeces);
        grid.setAdapter(adapter);
    }

    public static boolean esPrimo(int numero){
        int contador = 2;
        boolean primo=true;
        while ((primo) && (contador!=numero)){
            if (numero % contador == 0)
                primo = false;
            contador++;
        }
        return primo;
    }




   }



