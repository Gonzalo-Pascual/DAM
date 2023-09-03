package com.example.pmdmexamapp;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.ArrayList;

public class GridViewAdapter extends BaseAdapter {
    private Context context;
    private ArrayList<Androidversion> androidversions;
    public GridViewAdapter(Context context, ArrayList<Androidversion> androidversions) {
        this.context = context;
        this.androidversions = androidversions;
    }
    @Override
    public int getCount() {
        return androidversions.size();
    }
    @Override
    public Object getItem(int position) {
        return androidversions.get(position);
    }
    @Override
    public long getItemId(int position) {
        return position;
    }
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        View view = convertView;
        if (view == null) {
            view = LayoutInflater.from(context).inflate(R.layout.gridviewitem, parent, false);
        }
        TextView name = view.findViewById(R.id.textVersionName);
        TextView version = view.findViewById(R.id.textVersionCode);
        name.setText(androidversions.get(position).getName());
        version.setText(androidversions.get(position).getVersion());
        return view;
    }
}


