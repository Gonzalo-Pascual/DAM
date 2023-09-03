package com.example.spinner;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.Toast;

import java.util.List;

public class MainActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener{

    private Spinner spinner;
    private ImageView imageView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        imageView = (ImageView)findViewById(R.id.gt3);
        spinner = (Spinner) findViewById(R.id.spinner);

        Spinner spinner = findViewById(R.id.spinner);
        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this, R.array.Coches, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(adapter);
        spinner.setOnItemSelectedListener(this);


    }


    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long l) {

        String text = parent.getItemAtPosition(position).toString();
        Toast.makeText(parent.getContext(), text, Toast.LENGTH_SHORT).show();

        if (parent.getItemAtPosition(position).toString().equals("911 GT3")){
            imageView.setImageDrawable(getDrawable(R.drawable.gt3azul));
        }else if(parent.getItemAtPosition(position).toString().equals("911 Turbo S")){
            imageView.setImageDrawable(getDrawable(R.drawable.turbo));
        }else if(parent.getItemAtPosition(position).toString().equals("718 GT4 RS")){
            imageView.setImageDrawable(getDrawable(R.drawable.gt4rs));
        }else if(parent.getItemAtPosition(position).toString().equals("Taycan Turbo S")){
            imageView.setImageDrawable(getDrawable(R.drawable.taycanturbos));
        }
    }

    @Override
    public void onNothingSelected(AdapterView<?> adapterView) {

    }
}