package com.example.examenpmdm2;

import android.content.ContentProvider;
import android.content.ContentUris;
import android.content.ContentValues;
import android.content.UriMatcher;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.net.Uri;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

public class ProviderClase extends ContentProvider {

    private static final String AUTHORITY = "com.example.androidversions.provider";
    private static final String BASE_PATH = "android_versions";
    public static final Uri CONTENT_URI = Uri.parse("content://" + AUTHORITY + "/" + BASE_PATH);

    private static final int ALL_ROWS = 1;
    private static final int SINGLE_ROW = 2;

    private static final UriMatcher uriMatcher = new UriMatcher(UriMatcher.NO_MATCH);

    static {
        uriMatcher.addURI(AUTHORITY, BASE_PATH, ALL_ROWS);
        uriMatcher.addURI(AUTHORITY, BASE_PATH + "/#", SINGLE_ROW);
    }

    private BaseDatos database;

    @Override
    public boolean onCreate() {
        database = new BaseDatos(getContext());
        return true;
    }

    @Override
    public Cursor query(@NonNull Uri uri, @Nullable String[] projection, @Nullable String selection,
                        @Nullable String[] selectionArgs, @Nullable String sortOrder) {
        SQLiteDatabase db = database.getWritableDatabase();
        Cursor cursor;

        switch (uriMatcher.match(uri)) {
            case ALL_ROWS:
                cursor = db.query(BaseDatos.tabla, projection, selection, selectionArgs, null, null, sortOrder);
                break;
            case SINGLE_ROW:
                String id = uri.getLastPathSegment();
                cursor = db.query(BaseDatos.version, projection,
                        BaseDatos.anio + "=" + id, null, null, null, sortOrder);
                break;
            default:
                throw new IllegalArgumentException("Unknown URI: " + uri);
        }
        cursor.setNotificationUri(getContext().getContentResolver(), uri);

        return cursor;
    }

    @Nullable
    @Override
    public String getType(@NonNull Uri uri) {
        switch (uriMatcher.match(uri)) {
            case ALL_ROWS:
                return "vnd.android.cursor.dir/vnd.com.example.androidversions.provider.android_versions";
            case SINGLE_ROW:
                return "vnd.android.cursor.item/vnd.com.example.androidversions.provider.android_versions";
            default:
                throw new IllegalArgumentException("URI: " + uri);
        }
    }

    @Nullable
    @Override
    public Uri insert(@NonNull Uri uri, @Nullable ContentValues values) {
        SQLiteDatabase db = database.getWritableDatabase();
        long id = db.insert(BaseDatos.tabla, null, values);
        Uri newUri = ContentUris.withAppendedId(CONTENT_URI, id);
        getContext().getContentResolver().notifyChange(newUri, null);
        return newUri;
    }

    @Override
    public int delete(@NonNull Uri uri, @Nullable String selection, @Nullable String[] selectionArgs) {
        return 0;
    }

    @Override
    public int update(@NonNull Uri uri, @Nullable ContentValues values, @Nullable String selection, @Nullable String[] selectionArgs) {
        return 0;
    }
}