package com.example.framgmentosfruta;

import static com.example.framgmentosfruta.R.id.tvManzanas;

import android.annotation.SuppressLint;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {
    private TextView tvmanzanas, tvperas, tvplatanos;
    private ImageView iv1;

    @SuppressLint("MissingInflatedId")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        tvmanzanas = (TextView)findViewById(R.id.tvManzanas);
        tvperas = (TextView)findViewById(R.id.tvPeras);
        tvplatanos = (TextView)findViewById(R.id.tvPlatanos);
        iv1 = (ImageView)findViewById(R.id.iv1);
    }

    public void manzanas(View v)
    {
        iv1.setImageResource(R.drawable.frutas);
    }

    public void peras(View v)
    {
        iv1.setImageResource(R.drawable.conferencia);
    }

    public void platanos(View v)
    {
        iv1.setImageResource(R.drawable.platanos);
    }
}