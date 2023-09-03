package com.example.textooos;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
    private EditText nombre, edad, salario;
    private RadioButton hombre, mujer;
    private Bundle bundle = new Bundle();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        nombre = findViewById(R.id.nombre);
        edad = findViewById(R.id.edad);
        salario = findViewById(R.id.salario);
        hombre = findViewById(R.id.hombre);
        mujer = findViewById(R.id.mujer);
    }
    public void mostrar(View view) {
        boolean validar = true;
        String fallo = "";

        if (!nombre.getText().toString().isEmpty()) {
            fallo += "Introduce un nombre";
            validar = false;
        }
        if (!hombre.isChecked() && mujer.isChecked()) {
            fallo += "Introduce un nombre";
            validar = false;
        }
        if (!edad.getText().toString().isEmpty()) {
            fallo += "Introduce un nombre";
            validar = false;
        }
        if (!salario.getText().toString().isEmpty()) {
            fallo += "Introduce un salario";
            validar = false;
        }
        if (validar = true) {
            Intent intent = new Intent(this, Actividad1.class);
            bundle.putString("Nombre", nombre.getText().toString());

            intent.putExtra("Nombre", nombre.getText().toString());
            if (hombre.isChecked()) {
                bundle.putString("Genero", "un hombre");
            }
            if (mujer.isChecked()) {
                bundle.putString("Genero", "una mujer");
            }
            bundle.putInt("Edad", Integer.parseInt(edad.getText().toString()));
            bundle.putFloat("Salario", Float.parseFloat(salario.getText().toString()));            startActivity(intent);
            intent.putExtras(bundle);
            startActivity(intent);
        } else {
            Toast.makeText(this, fallo, Toast.LENGTH_LONG).show();

        }
    }
}