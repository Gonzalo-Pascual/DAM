package com.example.menus;

import androidx.appcompat.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.SubMenu;
import android.widget.ImageView;

public class MainActivity extends AppCompatActivity {
    private static final int mnuopc1=1;
    private static final int mnuopc2=2;
    private static final int mnuopc3=3;
    private static final int SMNU_OPC1=11;
    private static final int SMNU_OPC2=12;
    private static final int SMNU_OPC3=31;
    private static final int SMNU_OPC4=32;
    private ImageView img;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        img = (ImageView)findViewById(R.id.imagen);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        super.onCreateOptionsMenu(menu);
        SubMenu smnu1 = menu.addSubMenu(Menu.NONE, mnuopc1, Menu.NONE, "Manzanas");
        smnu1.add(Menu.NONE,SMNU_OPC1,Menu.NONE,"Golden");
        smnu1.add(Menu.NONE,SMNU_OPC2,Menu.NONE,"Verde Doncella");
        menu.add(Menu.NONE,mnuopc2,Menu.NONE,"Plátanos");
        SubMenu smnu2 = menu.addSubMenu(Menu.NONE, mnuopc3, Menu.NONE, "Peras");
        smnu2.add(Menu.NONE,SMNU_OPC3,Menu.NONE,"Conferencia");
        smnu2.add(Menu.NONE,SMNU_OPC4,Menu.NONE,"Limonera");
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case SMNU_OPC1: {
                img.setImageResource(R.drawable.golden);
                return true;
            }


            case SMNU_OPC2: {
                img.setImageResource(R.drawable.verdedoncella);
                return true;
            }

            case mnuopc2: {
                img.setImageResource(R.drawable.platanos);
                return true;
            }

            case SMNU_OPC3: {
                img.setImageResource(R.drawable.peras);
                return true;
            }

            case SMNU_OPC4: {
                img.setImageResource(R.drawable.frutas);
                return true;
            }

            default:
                return super.onOptionsItemSelected(item);
        }
    }

}