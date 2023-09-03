package com.example.textooos;

import android.os.Bundle;
import android.widget.TextView;
import androidx.appcompat.app.AppCompatActivity;

public class Actividad1 extends AppCompatActivity {
    private TextView textofinal;
    private String nombre, genero;
    private int edad;
    private float salario;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.actividad1);

        Bundle bundle = getIntent().getExtras();
        textofinal = findViewById(R.id.textofinal);
        nombre = bundle.getString("Nombre");
        genero = bundle.getString("Genero");
        edad = bundle.getInt("Edad", 0);
        salario = bundle.getFloat("Salario", 0);

        textofinal.setText(nombre + " es "+genero + " de "+ edad + "años, con un salario de "+salario+"€");
    }
}
