package android.com.kuliahonlen;

import androidx.appcompat.app.AppCompatActivity;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    EditText mEdit;
    TextView mWelcome;
    public static final String MY_REF = "android.com.kuliahonlen";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        mEdit = findViewById(R.id.editText);
        mWelcome = findViewById(R.id.welcome);

        SharedPreferences pref = getSharedPreferences(MY_REF, MODE_PRIVATE);
        String nama = pref.getString("key", null);

        mWelcome.setText("Welcome "+nama+"!");
    }

    public void tampilNama(View view) {
        String isi = mEdit.getText().toString();
        mWelcome.setText("Welcome "+isi+"!");

        SharedPreferences.Editor prefEditor = getSharedPreferences(MY_REF, MODE_PRIVATE).edit();
        prefEditor.putString("key",isi);

        prefEditor.apply();
    }

    public void Hapus(View view) {
        SharedPreferences.Editor hap = getSharedPreferences(MY_REF, MODE_PRIVATE).edit();

        hap.clear();
        hap.apply();
    }
}
